<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\User;

class NotificationController extends Controller
{
    public function index() {
        $notifications = Notification::all();

        return view('pages.notifications.index', compact('notifications'));
    }

    public function create() {
        return view('pages.notifications.create');
    }

    public function store(Request $request){
        $rules = [
            'title' => 'required',
            'text' => 'required',
            'image' => 'required',
        ];

        $messages = [
            'required' => 'form ini harus diisi'
        ];

        $this->validate($request, $rules, $messages);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/notifications'), $imageName);

        Notification::create([
            'title' => $request->title,
            'text' => $request->text,
            'image' => "/uploads/notifications/".$imageName,
        ]);

        return redirect()->route('notifications.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit($id){
        $notification = Notification::findOrFail($id);

        return view('pages.notifications.edit', compact('notification'));
    }

    public function update(Request $request, $id){
        $notification = Notification::findOrFail($id);

        if($request->image){
            $image = $notification->image;
            $imagePath = public_path('/uploads/notifications/');
            if($image){
                $imagePath = public_path('/uploads/notifications/') .explode("/", $image)[3];
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/notifications'), $imageName);

            if(\File::exists($imagePath)){
                \File::delete($imagePath);
            }
        }

        $notification->update([
            'title' => $request->title,
            'text' => $request->text,
            'image' => $request->image ? "/uploads/notifications/".$imageName : $notification->image
        ]);

        return redirect()->route('notifications.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id){
        $notification = Notification::findOrFail($id);
        $image = $notification->image;

        if($image){
            $imagePath = public_path('/uploads/notifications/') .explode("/", $image)[3];

            if(\File::exists($imagePath)){
                \File::delete($imagePath);
            }
        }

        $notification->delete();
        return redirect()->route('notifications.index')->with('success', 'Data berhasil dihapus');
    }

    public function sendNotification($id){
        $notification = Notification::findOrFail($id);

        $deviceToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $data = [
            'title' => $notification->title,
            'body' => $notification->text,
        ];

        

        $payload = [
            'registration_ids' => $deviceToken,
            'notification' => $data
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "Content-type: application/json",
                "Authorization: key=AAAAfwGYXGc:APA91bFFvhtwq40bskxBIw1M32mpgztEJ7g4lFN0IBXMqURRAU-l2BLefwGVrMJBogSOvCSpiDFG2hwpK7YpHWtHlEydV6gsu8Dm1hlEfWoUGRsSTAF3oWGdlib8N5lGMhEoXZtsBEK-"
            ),
        ));

        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));

        $response = curl_exec($curl);
        curl_close($curl);
        
        return redirect()->route('notifications.index')->with('success', 'Notifikasi berhasil terkirim');
    }
}

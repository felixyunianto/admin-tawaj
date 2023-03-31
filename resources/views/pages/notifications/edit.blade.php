@extends('layouts.app')
@section('title')
    Edit Notifikasi
@endsection
@section('content')
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <p class="mb-0">Edit Notifikasi</p>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{ route('notifications.update', $notification->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Title Notifikasi</label>
                            <input name="title" class="form-control" type="text"
                                placeholder="Isikan title notifikasi" value="{{$notification->title}}">

                            @error('title')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Text Notifikasi</label>
                            <textarea name="text" id="" cols="30" rows="10" class="form-control"
                                placeholder="Isikan text notifikasi">{{$notification->text}}</textarea>
                            @error('text')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Gambar</label>
                            <input type="file" class="form-control" name="image" id="exampleFormControlFile1">
                            @error('image')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        @if ($notification->image)
                            <div class="col-md-12 pt-2 pb-2">
                                <div class="">
                                    <span>Gambar Lama</span>
                                </div>
                                <img src="{{ $notification->image }}" alt="" width="50" height="50">
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <button class="form-control btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('title')
    Notifikasi
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Tabel Kategori Notifikasi</h6>
                    <a href="{{ route('notifications.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        Tambah Notifikasi
                    </a>

                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-4">
                        <table class="table align-items-center mb-0" id="notification-table">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Title Notifikasi</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Text Notifikasi</th>
                                    <th class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notifications as $item)
                                    <tr>
                                        <td class="" style="padding-left: 24px;">
                                            <div class="d-flex px-1 pl-4 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm ml-3">{{ $loop->iteration }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                            style="padding-left: 24px;">
                                            {{ $item->title }}
                                        </td>
                                        <td class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                            style="padding-left: 24px;">
                                            {{ $item->text }}
                                        </td>
                                        <td class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7 d-flex align-items-center"
                                            style="padding-left: 24px; ">

                                            <form action="{{ route('notifications.destroy', $item->id) }}" method="post"
                                                class="d-flex align-items-center gap-2 pt-2">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <a class="btn btn-sm btn-primary mt-2"
                                                    href="{{ route('notifications.sendNotif', $item->id) }}">
                                                    <i class="fa fa-bell"></i>
                                                    Send Notification</a>
                                                <a class="btn btn-sm btn-warning mt-2"
                                                    href="{{ route('notifications.edit', $item->id) }}">
                                                    <i class="fa fa-edit"></i>
                                                    Edit</a>
                                                <button type="submit" class="btn btn-sm btn-danger  mt-2">
                                                    <i class="fa fa-trash"></i>
                                                    Hapus</button>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#notification-table').DataTable();
        });
    </script>
@endsection

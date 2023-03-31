@extends('layouts.app')
@section('title')
    Tambah Notifikasi
@endsection
@section('content')
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <p class="mb-0">Tambah Notifikasi</p>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{ route('notifications.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Title Notifikasi</label>
                            <input name="title" class="form-control" type="text" value=""
                                placeholder="Isikan title notifikasi">

                            @error('title')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Text Notifikasi</label>
                            <textarea name="text" id="" cols="30" rows="10" class="form-control"
                                placeholder="Isikan text notifikasi"></textarea>
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
                    </div>
                    <div class="col-md-12">
                        <button class="form-control btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

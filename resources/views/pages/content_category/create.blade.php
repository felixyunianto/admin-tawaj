@extends('layouts.app')
@section('title')
    Tambah Kategori
@endsection
@section('content')
    <div class="">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <p class="mb-0">Tambah Data</p>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="{{route('content-category.store')}}" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Kategori</label>
                                <input name="content_category_name" class="form-control" type="text" value=""
                                    placeholder="Isikan nama kategori konten">
    
                                @error('content_category_name')
                                    <span class="text-danger text-sm">{{$message}}</span>
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

@extends('layouts.app')
@section('title')
    Edit Kategori
@endsection
@section('content')
    <div class="">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <p class="mb-0">Edit Data</p>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('content-category.update', $category->id) }}" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Kategori</label>
                                <input name="content_category_name" class="form-control" type="text"
                                    value="{{ $category->content_category_name }}"
                                    placeholder="Isikan nama kategori konten">

                                @error('content_category_name')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="form-control btn btn-primary" type="submit">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

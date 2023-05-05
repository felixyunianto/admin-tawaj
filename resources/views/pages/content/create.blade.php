@extends('layouts.app')
@section('title')
    Tambah Konten
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
                    <form action="{{ route('content.store') }}" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <input type="hidden" name="category_id" value="{{ app('request')->input('category') }}">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Indonesia</label>
                                <input name="title_indo" class="form-control" type="text" value=""
                                    placeholder="Isikan nama">

                                @error('title_indo')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Arab</label>
                                <input name="title_arab" class="form-control" type="text" value=""
                                    placeholder="Isikan nama">

                                @error('title_arab')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Kategori <span
                                    style="font-weight: 400">(Kosongkan bila ini parent)</span></label>
                            <select name="content_category_id" id="content_category_id" class="form-control">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->content_category_name }}</option>
                                @endforeach
                            </select>

                            @error('content_category_id')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3" id="body-content">


                        </div>
                        <div class="" id="container-add-button">
                            <button class="btn btn-success form-control" type="button" id="button-add">
                                <i class="fa fa-plus"></i>
                                Tambah</button>
                        </div>
                        <div class="col-md-12">
                            <button class="form-control btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script>
            let bodyContent = document.querySelector('#body-content');
            let buttonAdd = document.querySelector('#button-add');

            buttonAdd.addEventListener('click', function() {
                $('#body-content').append(`
                        <div class="mb-3" id="input-field-ayat">
                                <div class="from-group border p-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="example-text-input" class="form-control-label">Indonesia</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" id="content_indo" name="content_indo[]"
                                                    class="form-control" type="text" value="{{ old('content_indo[]') }}"
                                                    placeholder="Isikan ayat dalam bahasa indonesia">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="example-text-input" class="form-control-label">Arab</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" id="content_arab" name="content_arab[]"
                                                    class="form-control" type="text" value=""
                                                    placeholder="Isikan ayat dalam bahasa arab">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="example-text-input" class="form-control-label">Latin</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" id="content_latin" name="content_latin[]"
                                                    class="form-control" type="text" value=""
                                                    placeholder="Isikan ayat dalam latin">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" id="button-remove" class="btn btn-danger form-control" >
                                        <i class="fa fa-trash"></i>
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        `)
            })

            $('#body-content').on('click', '#button-remove',function() {
                $(this).closest('#input-field-ayat').remove();
            })
        </script>
    @endsection

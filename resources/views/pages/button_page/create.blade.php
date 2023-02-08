@extends('layouts.app')
@section('title')
    Tambah Button Page
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
                    <form action="{{ route('button_page.store') }}" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Title</label>
                                <input name="title" class="form-control" type="text" value=""
                                    placeholder="Isikan nama title button page">

                                @error('title')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Title 2</label>
                                <input name="title2" class="form-control" type="text" value=""
                                    placeholder="Isikan nama title button page">

                                @error('title2')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Deskripsi</label>
                                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"
                                    placeholder="Isikan deskripsi"></textarea>

                                @error('title2')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Parent <span style="font-weight: 400">(Kosongkan bila ini parent)</span></label>
                                <select name="button_page_id" id="button_page_id" class="form-control">
                                    <option value="">Pilih parent link</option>
                                    @foreach ($button_pages as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                </select>

                                @error('button_page_id')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Tipe Link</label>
                                        <select name="link_type" id="link_type" class="form-control">
                                            <option value="article">Artikel</option>
                                            <option value="content">Content</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Link</label>
                                        <div id="link-body">
                                            <input type="text" class="form-control" name="link" placeholder="isikan link">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="form-control btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const linkType = document.querySelector('#link_type');
        const linkBody = document.querySelector('#link-body')
        linkType.addEventListener('change', function(){
            let valueLinkType = linkType.value;

            let html = '';

            if(valueLinkType === 'content'){
                html = `
                <select name="link" id="link" class="form-control">
                                                <option value="">Pilih link</option>
                                                @foreach ($button_pages as $item)
                                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                                @endforeach
                                            </select>`
            }else{
                html = `<input type="text" class="form-control" name="link" placeholder="isikan link">`
            }

            linkBody.innerHTML = html
        })

        let buttonPageIdSelect = document.querySelector('#button_page_id');
        buttonPageIdSelect.addEventListener('change', () => {
            console.log(buttonPageIdSelect.value)
        })
    </script>
@endsection

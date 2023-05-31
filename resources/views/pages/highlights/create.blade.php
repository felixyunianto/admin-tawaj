@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/custom/highlight.css')}}">
@endsection
@section('title')
    Tambah Highlight
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
                    <form action="{{ route('highlight.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Judul Highlight</label>
                                <input name="title" class="form-control" type="text" value=""
                                    placeholder="Isikan judul highlight">

                                @error('title')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Deskripsi Highlight</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="10"
                                    placeholder="Isikan deskripsi highlight"></textarea>

                                @error('description')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tipe Link</label>
                                    <select name="link_type" id="link_type" class="form-control">
                                        <option value="article">Artikel</option>
                                        <option value="content">Content</option>
                                        <option value="button_page">Button Page</option>
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
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Gambar</label>
                            <input type="file" class="form-control" name="image" id="exampleFormControlFile1">
                            @error('image')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
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
    var valueLinkType = linkType.value;
    linkType.addEventListener('change', function(){
        valueLinkType = linkType.value
        changeLinkBody();
    })

    function changeLinkBody() {
        let html = '';
        console.log();
        if(valueLinkType === 'button_page'){
            html = `
            <select name="link" class="form-control">
                <option value="">Pilih link button page</option>
                @foreach ($button_pages as $item)
                    <option value="{{$item->id}}">{{$item->title}}</option>
                    @if (count($item->children) > 0)
                        <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;Child">
                    @endif
                        @foreach ($item->children as $child)
                            <option value="{{$child->id}}">{{$child->title}}</option>
                            @if (count($child->children) > 0)
                                <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sub Child">
                            @endif
                                @foreach ($child->children as $subchild)
                                    <option value="{{$subchild->id}}">&nbsp;&nbsp;&nbsp;&nbsp;{{$subchild->title}}</option>
                                @endforeach
                            @if (count($child->children) > 0)
                                </optgroup>
                            @endif
                        @endforeach
                    @if (count($button_pages) > 0)
                        </optgroup>
                    @endif
                    
                @endforeach
            </select>
            `
        }else if(valueLinkType === 'content'){
            html = `
            <select name="link" class="form-control">
                <option value="">Pilih link content</option>
                @foreach ($contents as $item)
                    <option value="{{$item->id}}">{{$item->title_arab}} <span>({{$item->title_indo}})</span></option>
                @endforeach
            </select>
            `
        }else{
            html = `<input type="text" class="form-control" name="link" placeholder="isikan link">`
        }

        linkBody.innerHTML = html
    }
</script>
@endsection

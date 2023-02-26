@extends('layouts.app')
@section('title')
    Tambah Big Button
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
                    <form action="{{ route('big-button.update', $big_button->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Button</label>
                                <input name="title" class="form-control" type="text" value="{{ $big_button->title }}"
                                    placeholder="Isikan nama button">

                                @error('title')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Gambar</label>
                            <input type="file" class="form-control" name="image" id="exampleFormControlFile1">
                            @error('image')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 pt-2 pb-4 pl-2">
                            <div class="">
                                <label for="">Gambar lama</label>
                            </div>
                            <img src="{{ $big_button->image }}" alt="" width="50" height="50" class="">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tipe Link</label>
                                    <select name="link_type" id="link_type" class="form-control">
                                        <option value="article" @if ($big_button->link_type === 'article') selected @endif>Artikel
                                        </option>
                                        <option value="content" @if ($big_button->link_type === 'content') selected @endif>Content
                                        </option>
                                        <option value="button_page" @if ($big_button->link_type === 'button_page') selected @endif>Button
                                            Page</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Link</label>
                                    <div id="link-body">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Status</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="is_showed" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault" @if ($big_button->is_showed == 1) checked @endif>
                                    <label class="form-check-label" for="flexSwitchCheckDefault" id="labelSwitchStatus">
                                        @if ($big_button->is_showed == 1)
                                            Ditampilkan
                                        @else
                                            Tidak ditampilkan
                                        @endif
                                    </label>
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
        var valueLinkType = linkType.value;
        changeLinkBody();

        linkType.addEventListener('change', function() {
            valueLinkType = linkType.value
            changeLinkBody();
        })

        function changeLinkBody() {
            let html = '';

            if (valueLinkType === 'button_page') {
                html = `
            <select name="link" class="form-control">
                <option value="">Pilih link button page</option>
                @foreach ($button_pages as $item)
                    <option value="{{ $item->id }}" @if ($item->id == $big_button->link && $big_button->link_type == 'button_page') selected @endif>{{ $item->title }}</option>
                    @if (count($item->children) > 0)
                        <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;Child">
                    @endif
                        @foreach ($item->children as $child)
                            <option value="{{ $child->id }}" @if ($child->id == $big_button->link && $big_button->link_type == 'button_page') selected @endif>{{ $child->title }}</option>
                            @if (count($child->children) > 0)
                                <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sub Child">
                            @endif
                                @foreach ($child->children as $subchild)
                                    <option value="{{ $subchild->id }}" @if ($subchild->id == $big_button->link && $big_button->link_type == 'button_page') selected @endif>&nbsp;&nbsp;&nbsp;&nbsp;{{ $subchild->title }}</option>
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
            } else if (valueLinkType === 'content') {
                html = `
            <select name="link" class="form-control">
                <option value="">Pilih link content</option>
                @foreach ($contents as $content)
                    <option value="{{ $content->id }}" @if ($content->id == $big_button->link && $big_button->link_type == 'content') selected @endif>{{ $content->title_arab }}</option>
                @endforeach
            </select>
            `
            } else {
                html =
                    `<input type="text" class="form-control" name="link" placeholder="isikan link" value="{{ $big_button->link }}">`
            }

            linkBody.innerHTML = html
        }

        const switchStatus = document.querySelector('#flexSwitchCheckDefault');
        const labelSwitchStatus = document.querySelector('#labelSwitchStatus');
        switchStatus.addEventListener('change', function(e) {
            let valueSwitch = e.target.checked
            labelSwitchStatus.innerHTML = valueSwitch ? "Ditampilkan" : "Tidak ditampilkan"
        })
    </script>
@endsection

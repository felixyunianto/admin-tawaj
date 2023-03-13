@extends('layouts.app')
@section('title')
    Edit Button Page
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
                    <form action="{{ route('button_page.update', $button_page->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Title</label>
                                <input name="title" class="form-control" type="text" value="{{ $button_page->title }}"
                                    placeholder="Isikan nama title button page">

                                @error('title')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Title 2</label>
                                <input name="title2" class="form-control" type="text" value="{{ $button_page->title2 }}"
                                    placeholder="Isikan nama title button page">

                                @error('title2')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Deskripsi</label>
                                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"
                                    placeholder="Isikan deskripsi">{{ $button_page->deskripsi }}</textarea>

                                @error('deskripsi')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Parent <span
                                        style="font-weight: 400">(Kosongkan bila ini parent)</span></label>
                                <select name="button_page_id" id="button_page_id" class="form-control">
                                    <option value="">Pilih parent link</option>
                                    @foreach ($button_pages as $item)
                                        <option
                                            value="{{ $item->id }}" @if ($item->id == $button_page->button_page_id) selected @endif>
                                            {{ $item->title }}</option>
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
                                            <option value="">Pilih tipe link</option>
                                            <option value="content" @if ($button_page->link_type === 'content') selected @endif>
                                                Content</option>
                                            <option value="article" @if ($button_page->link_type === 'article') selected @endif>
                                                Artikel</option>
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
            if (valueLinkType === 'content') {
                html = `
            <select name="link" class="form-control">
                <option value="">Pilih link content</option>
                @foreach ($contents as $content)
                    <option value="{{ $content->id }}" @if ($content->id == $button_page->link && $button_page->link_type == 'content') selected @endif>{{ $content->title_arab }}</option>
                @endforeach
            </select>
            `
            } else {
                html =
                    `<input type="text" class="form-control" name="link" placeholder="isikan link" value="{{ $button_page->link }}">`
            }

            linkBody.innerHTML = html
        }
    </script>
@endsection

@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/home.css') }}">
@endsection
@section('content')
    <div class="d-flex flex-column gap-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; padding-bottom: 8px">
                        <span>
                            {{ __('Highlight') }}
                        </span>
                        <button onclick="javsacript: window.location.href='{{ route('highlight.create') }}'"
                            class="btn btn-primary">Tambah Highlight</button>
                    </div>

                    <div class="card-body">
                        <div class="owl-carousel" id="highlight-carousel">
                            @foreach ($highlights as $highlight)
                                <div class="card-highlight"
                                    style="background-image: url('{{ $highlight->images }}');
                                background-size: cover">
                                    <div class="card-highlight-body">
                                        <span class="card-highlight-title">{{ $highlight->title }}</span>
                                        <p class="card-highlight-desc">{{ $highlight->description }}</p>
                                    </div>
                                    <div class="card-action">
                                        <a class="card-btn-action card-edit"
                                            href="{{ route('highlight.edit', $highlight->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button
                                            onclick="return onDelete('form-highlight-{{ $highlight->id }}', {{ $highlight->id }})"
                                            class="card-btn-action card-delete" href="">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>

                                    <form action="{{ route('highlight.destroy', $highlight->id) }}" method="POST"
                                        id="form-highlight-{{ $highlight->id }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">

                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; padding-bottom: 8px">
                        <span>
                            {{ __('Big Button') }}
                        </span>
                        <button onclick="javsacript: window.location.href='{{ route('big-button.create') }}'"
                            class="btn btn-primary">Tambah Big Button</button>
                    </div>

                    <div class="card-body">
                        <div class="owl-carousel" id="big-button-owl-carousel">
                            @foreach ($big_buttons as $big_button)
                                <div class="big-button-container">

                                    <div class="big-button-image-container">
                                        <img class="big-button-image" src="{{ $big_button->image }}" alt="">
                                        <div class="big-button-action">
                                            <a href="{{ route('big-button.edit', $big_button->id) }}"
                                                class="big-button-action-list">Edit</a>
                                            <div onclick="return onDelete('form-big-button-{{ $big_button->id }}', {{ $big_button->id }})"
                                                class="big-button-action-list">Hapus</div>
                                        </div>
                                    </div>
                                    <span class="big-button-text">{{ $big_button->title }}</span>
                                    <form action="{{ route('big-button.destroy', $big_button->id) }}" method="POST"
                                        id="form-big-button-{{ $big_button->id }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">

                                    </form>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; padding-bottom: 8px">
                        <span>
                            {{ __('Big Tab') }}
                        </span>
                        <button onclick="javsacript: window.location.href='{{ route('big-tab.create') }}'"
                            class="btn btn-primary">Tambah Big Tab</button>
                    </div>

                    <div class="card-body">
                        <div class="owl-carousel" id="big-tab-owl-carousel">
                            @foreach ($big_tabs as $big_tab)
                                @if ($big_tab->type_button == 1)
                                    <div class="big-tab-container type-1">
                                        <form action="{{ route('big-tab.destroy', $big_tab->id) }}" method="POST"
                                            id="form-big-tab-{{ $big_tab->id }}" class="d-none">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
        
                                        </form>
                                        <div class="big-tab-text">
                                            <div class="big-tab-title">
                                                {{ $big_tab->title }}
                                            </div>
                                            <div class="big-tab-body">
                                                {{ $big_tab->description }}
                                            </div>
                                        </div>

                                        <div class="big-tab-button">
                                            Klik Disini
                                        </div>
                                        <div class="form-action">
                                            <a class="card-btn-action card-edit"
                                                href="{{ route('big-tab.edit', $big_tab->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button
                                                onclick="return onDelete('form-big-tab-{{ $big_tab->id }}', {{ $highlight->id }})"
                                                class="card-btn-action card-delete" href="">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @elseif($big_tab->type_button == 2)
                                    <div class="big-tab-container type-2">
                                        <div class="big-tab-text">
                                            <div class="big-tab-title">
                                                {{ $big_tab->title }}
                                            </div>
                                            <div class="big-tab-body">
                                                {{ $big_tab->description }}
                                            </div>
                                        </div>
                                        <div class="form-action">
                                            <a class="card-btn-action card-edit"
                                                href="{{ route('big-tab.edit', $big_tab->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button
                                                onclick="return onDelete('form-big-tab-{{ $big_tab->id }}', {{ $highlight->id }})"
                                                class="card-btn-action card-delete" href="">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                        <form action="{{ route('big-tab.destroy', $big_tab->id) }}" method="POST"
                                            id="form-big-tab-{{ $big_tab->id }}" class="d-none">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
        
                                        </form>
                                    </div>
                                @else
                                    <div class="big-tab-container type-3">
                                        <div class="img-container">
                                            @if ($big_tab->image)
                                                <img src="{{ $big_tab->image }}" alt="" width="25"
                                                    height="25">
                                            @else
                                                <img src="https://cdn-icons-png.flaticon.com/512/477/477406.png"
                                                    alt="" width="25" height="25">
                                            @endif
                                        </div>
                                        <div class="big-tab-button">
                                            {{ $big_tab->title }}
                                        </div>
                                        <div class="form-action">
                                            <a class="card-btn-action card-edit"
                                                href="{{ route('big-tab.edit', $big_tab->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button
                                                onclick="return onDelete('form-big-tab-{{ $big_tab->id }}', {{ $highlight->id }})"
                                                class="card-btn-action card-delete" href="">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                        <form action="{{ route('big-tab.destroy', $big_tab->id) }}" method="POST"
                                            id="form-big-tab-{{ $big_tab->id }}" class="d-none">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
        
                                        </form>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#highlight-carousel").owlCarousel({
                items: 4,
                margin: 16,
                responsive: {
                    600: {
                        items: 4
                    }
                }
            });

            $("#big-button-owl-carousel").owlCarousel({
                // center: true,
                items: 12,
                mergeFit: true,
                margin: 10,
            });

            $("#big-tab-owl-carousel").owlCarousel({
                // center: true,
                items: 3,
                mergeFit: true,
                margin: 16,
            });
        });

        function onDelete(formId, id) {
            let confirmDelete = confirm("Apakah anda yakin?");
            if (confirmDelete) {
                $(`#${formId}`).submit();
            }
        }
    </script>
@endsection

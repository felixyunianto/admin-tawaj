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
                                        <a class="card-btn-action card-edit" href="">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="card-btn-action card-delete" href="">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
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
                            @foreach ($big_buttons as $item)
                                <div class="big-button-container">
                                    <div class="big-button-image-container">
                                        <img class="big-button-image"
                                            src="{{$item->image}}"
                                            alt="">
                                    </div>
                                    <span class="big-button-text">{{$item->title}}</span>
                                </div>
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
        });
    </script>
@endsection

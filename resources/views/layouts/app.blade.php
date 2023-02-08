<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials.__head')
@yield('style')

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('layouts.partials.__sidebar')

    <main class="main-content position-relative border-radius-lg ">
        @include('layouts.partials.__navbar')
        <div class="container-fluid py-4">
            @if (Session::has('success'))
                <div id="success-alert" class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </div>
    </main>

    @include('layouts.partials.__script')
    <script>
        $("#success-alert").fadeTo(1500, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
        });
    </script>
</body>

</html>

@include('include.header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('page-styles')
<body>
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill">
            </div>
        </div>
    </div>
    @include('template.profesional.menu')
    @include('template.profesional.header')

    @yield('content')

    @include('template.include.nocomplatible')

</body>

@yield('page-script')
@include('include.script')
</html>

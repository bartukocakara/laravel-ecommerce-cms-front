@section('header')
    @include('front-layouts._header')
@show

@section('topbar')
    @include('front-layouts._topbar')
@show

@section('navbar')
    @include('front-layouts._navbar')
@show

    @yield('content')


@section('footer')
    @include('front-layouts._footer')
@show

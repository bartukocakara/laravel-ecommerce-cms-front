@section('header')
    @include('admin-layouts._header')
@show

@section('sidebar')
    @include('admin-layouts._sidebar')
@show

@section('navbar')
    @include('admin-layouts._navbar')
@show

    @yield('content')


@section('footer')
    @include('admin-layouts._footer')
@show

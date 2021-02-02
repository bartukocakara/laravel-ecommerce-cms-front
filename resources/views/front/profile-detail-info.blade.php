@extends('front-layouts.app')

@section('title', 'Profil Düzenle')

@section('navbar')
    @parent
@endsection

@section('content')

    @section('products')
        @include('front-layouts._profile-detail-info')
    @show

@endsection

@section('footer')
    @parent
@endsection

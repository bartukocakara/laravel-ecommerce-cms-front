
@extends('front-layouts.app')

@section('title', 'Ürünler')

@section('navbar')
    @parent
@endsection

@section('content')

    @include('front-layouts._products')
@endsection

@section('footer')
    @parent
@endsection

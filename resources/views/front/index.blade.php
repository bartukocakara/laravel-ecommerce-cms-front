@extends('front-layouts.app')

@section('title', 'Ana Sayfa')

@section('navbar')
    @parent
@endsection

@section('content')

    @section('products')
        @include('front-layouts._products')
    @show

@endsection

@section('footer')
    @parent
@endsection

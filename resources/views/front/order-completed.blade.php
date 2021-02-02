@extends('front-layouts.app')

@section('title', 'Ana Sayfa')

@section('navbar')
    @parent
@endsection

@section('content')

    @section('products')
        @include('front-layouts._order-completed')
    @show

@endsection

@section('footer')
    @parent
@endsection

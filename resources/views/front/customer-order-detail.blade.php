@extends('front-layouts.app')

@section('title', 'Sipariş Detay')

@section('navbar')
    @parent
@endsection

@section('content')

    @section('products')
        @include('front-layouts._customer-order-detail')
    @show

@endsection

@section('footer')
    @parent
@endsection

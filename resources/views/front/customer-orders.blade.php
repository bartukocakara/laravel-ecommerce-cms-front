@extends('front-layouts.app')

@section('title', 'Siparişlerim')

@section('navbar')
    @parent
@endsection

@section('content')

    @include('front-layouts._customer-orders')
@endsection

@section('footer')
    @parent
@endsection

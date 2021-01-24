
@extends('front-layouts.app')

@section('title', 'Detay')

@section('navbar')
    @parent
@endsection

@section('content')

    @include('front-layouts._product-detail')
@endsection

@section('footer')
    @parent
@endsection

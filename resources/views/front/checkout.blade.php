
@extends('front-layouts.app')

@section('title', 'Ödeme')

@section('navbar')
    @parent
@endsection

@section('content')

    @include('front-layouts._checkout')

@endsection

@section('footer')
    @parent
@endsection

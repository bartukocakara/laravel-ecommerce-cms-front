
@extends('front-layouts.app')

@section('title', 'Sepetim')

@section('navbar')
    @parent
@endsection

@section('content')

    @include('front-layouts._cart')
@endsection

@section('footer')
    @parent
@endsection

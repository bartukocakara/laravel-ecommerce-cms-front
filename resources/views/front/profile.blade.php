@extends('front-layouts.app')

@section('title', 'Hakkımızda')

@section('navbar')
    @parent
@endsection

@section('content')

    @include('front-layouts._profile')
@endsection

@section('footer')
    @parent
@endsection

@extends('front-layouts.app')

@section('title', 'Kategori')

@section('navbar')
    @parent
@endsection

@section('content')

    @include('front-layouts._categories')
@endsection

@section('footer')
    @parent
@endsection

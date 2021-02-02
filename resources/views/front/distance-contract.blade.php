@extends('front-layouts.app')

@section('title', 'Mesafeli Satış Sözleşmesi')

@section('navbar')
    @parent
@endsection

@section('content')

    @include('front-layouts._distance-contract')
@endsection

@section('footer')
    @parent
@endsection

@extends('front-layouts.app')
@section('title', 'Şifremi Unuttum')
@section('content')
<div class="contact-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="contact-form-right">
                    <h2>Şifremi Yenile</h2>
                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissable fade show" role="alert">
                        <strong>{{ $error }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                    @if(session('error'))
                        <div class="alert alert-warning alert-dismissable fade show" role="alert">
                        <strong>{{ session('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form action="{{ url('sifremi-yenile') }}" method="post">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Email adresiniz" id="email" class="form-control" name="email" required data-error="Lütfn email adresinizi giriniz.">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Yeni şifreniz" id="password" class="form-control" name="password" required data-error="Lütfn şifrenizi giriniz.">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Yeni şifreniz tekrar" id="email" class="form-control" name="password_confirmation" required data-error="Lütfn şifrelerinizi aynı yazınız.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="text-center row mx-auto">
                                    <button class="btn text-white go-checkout mr-3" type="submit">Yenile</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

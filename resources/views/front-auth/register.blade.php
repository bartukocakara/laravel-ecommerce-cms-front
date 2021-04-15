@extends('front-layouts.app')

@section('title', 'Kayıt Ol')

@section('content')
<div class="contact-box-main">
    <div class="container">
        <div class="row border">
            <div class="col-lg-8 col-sm-12">
                <div class="contact-form-right">
                    <h2>Kayıt Olunuz</h2>
                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissable fade show" role="alert">
                        <strong>{{ $error }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                    @endif
                    <form action="{{ route('front.register-submit') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">İsminiz : </label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Lütfen isminizi yazınız..." required data-error="Lütfen isminizi yazınız">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Soyisminiz : </label>
                                    <input type="text" placeholder="Lütfen email adresinizi yazınız..." id="email" class="form-control" name="email" required data-error="Lütfen email adresinizi yazınız">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Şifreniz : </label>
                                    <input type="password" class="form-control" id="password1" name="password" placeholder="Şifreniz" required data-error="Lütfen şifrenizi yazınız...">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Şifreniz Tekrar: </label>
                                    <input type="password" class="form-control" id="password-2" name="password-2" placeholder="Şifreniz tekrar" required data-error="Lütfen şifrelerinizin eşleştiğinden emin olunuz...">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="text-center row mx-auto">
                                    <button class="btn text-white go-checkout mr-3" id="submit" type="submit">Kaydet</button>
                                    <a class="btn text-white go-checkout mr-3" href="{{ route('front.login') }}">Giriş Yap</a>
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

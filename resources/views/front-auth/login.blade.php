@extends('front-layouts.app')

@section('title', 'Giriş Yap')


@section('content')
<div class="contact-box-main">
    <div class="container">
        <div class="row border">
            <div class="col-lg-8 col-sm-12">
                <div class="contact-form-right">
                    <h2>Giriş Yapınız</h2>
                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-warning alert-dismissable fade show" role="alert">
                        <strong>{{ $error }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach

                    @endif
                    @if(session('error'))
                        <div class="alert alert-warning alert-dismissable fade show" role="alert">
                        <strong>{{ session('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif(session('reset'))
                    <div class="alert alert-success alert-dismissable fade show" role="alert">
                        <strong>{{ session('reset') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form action="{{ route('front.login-submit') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Email adresiniz : </label>
                                    <input type="text" placeholder="Email adresiniz" id="email" class="form-control" name="email" required data-error="Lütfn email adresinizi giriniz.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Şifreniz : </label>
                                    <input type="password" class="form-control" id="subject" name="password" placeholder="Şifreniz" required data-error="Lütfen şifrenizi giriniz.">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="text-center row mx-auto">
                                    <button class="btn text-white go-checkout mr-3" type="submit">Giriş Yap</button>
                                    <a class="btn text-white go-checkout mr-3" href="{{ route('front.register') }}">Kayıt Ol</a>
                                    <a class="btn btn-primary" href="{{ route('front.forgot-password') }}">Şifrenizi mi unuttunuz ?</a>
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

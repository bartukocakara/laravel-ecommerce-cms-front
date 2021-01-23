@extends('front-layouts.app')

@section('title', 'Giriş Yap')


@section('content')
<div class="contact-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="contact-form-right">
                    <h2>Giriş Yapınız</h2>
                    @if($errors->any())
                        <div class="alert alert-warning alert-dismissable fade show" role="alert">
                        <strong>{{ implode('', $errors->all(':message')) }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-warning alert-dismissable fade show" role="alert">
                        <strong>{{ session('error') }}</strong>
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
                                    <input type="text" placeholder="Email adresiniz" id="email" class="form-control" name="email" required data-error="Lütfn email adresinizi giriniz.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" id="subject" name="password" placeholder="Şifreniz" required data-error="Lütfen şifrenizi giriniz.">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="submit-button text-center">
                                    <button class="btn go-checkout" type="submit">Giriş Yap</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
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

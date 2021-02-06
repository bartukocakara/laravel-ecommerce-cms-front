@extends('front-layouts.app')
@section('title', 'Şifremi Unuttum')
@section('content')
<div class="contact-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="contact-form-right">
                    <h2>Şifremi Unuttum</h2>
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
                    <form action="{{ route('front.submit-forgot-password') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                    <input type="text" placeholder="Email adresiniz" id="email" class="form-control" name="email" required data-error="Lütfn email adresinizi giriniz.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="text-center row mx-auto">
                                    <button class="btn text-white go-checkout mr-3" type="submit">Link Gönder</button>
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

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            @if (isset($success))
                    <div class="alert alert-success alert-dismissable fade show" role="alert">
                    <strong>{{ $success }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Kişisel Bilgileriniz</h2>
                        <form action="{{ route('front.profile-update') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}" placeholder="Adınız" required data-error="Lütfen adınızı yazınız">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="surname" value="{{ $customer->surname }}" placeholder="Soyadınız" required data-error="Lütfen soyadınızı yazınız">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" placeholder="Email adresiniz" id="email" class="form-control" name="email" value="{{ $customer->email }}" required data-error="Lütfen email adresi yazınız">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button class="btn go-checkout" id="submit" type="submit">Kaydet</button>
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
    <!-- End Cart -->
    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            @if (isset($cart) && isset($products))
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Fatura Adresi : </h3>
                        </div>
                        <form class="needs-validation" action="" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Adınız : *</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                    <div class="invalid-feedback"> Lütfen geçerli bir isim yazınız. </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Soyadınız :  *</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                    <div class="invalid-feedback"> Lütfen geçerli soyisim yazınız. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email Adresiniz : *</label>
                                <input type="email" class="form-control" id="email" placeholder="">
                                <div class="invalid-feedback"> Lütfen geçerli email adresi yazınız. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Adresiniz :  *</label>
                                <input type="text" class="form-control" id="address" placeholder="" required>
                                <div class="invalid-feedback"> Lütfen adresinizi yazınız. </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="country">İl : *</label>
                                    <select class="wide w-100" id="country">
									<option value="Choose..." data-display="Select">---İl seçiniz---</option>
									<option value="United States">United States</option>
								</select>
                                    <div class="invalid-feedback"> Please select a valid country. </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">İlçe : *</label>
                                    <select class="wide w-100" id="state">
									<option data-display="Select">---İlçe seçiniz---</option>
									<option>California</option>
								</select>
                                    <div class="invalid-feedback"> Please provide a valid state. </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">Posta Kodunuz</label>
                                    <input type="text" class="form-control" id="zip" placeholder="" required>
                                    <div class="invalid-feedback"> Zip code required. </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="same-address">
                                <label class="custom-control-label" for="same-address">Gönderim adresim fatura adresiyle aynı olacak.</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="save-info">
                                <label class="custom-control-label" for="save-info">Bu bilgileri bir sonraki alışverişim için sakla</label>
                            </div>
                            <hr class="mb-4">
                            <div class="title"> <span>Ödeme : </span> </div>
                            <div class="d-block my-3">
                                @foreach ($payment_types as $key => $value)
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="payment_type" type="radio" class="custom-control-input" required>
                                    <label class="custom-control-label" value="{{ $key }}" for="credit">{{ $value }}</label>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cc-name">Kart Adnınız : </label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="" required> <small class="text-muted">Full name as displayed on card</small>
                                    <div class="invalid-feedback"> Kart adınızı yazınız! </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cc-number">Kart Numaranız : </label>
                                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                    <div class="invalid-feedback"> Kart numaranızı yazınız! </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="cc-expiration">S. K. T.</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <select class="form-control" name='expireMM' id='expireMM'>
                                        <option value='01'>01</option>
                                        <option value='02'>02</option>
                                        <option value='03'>03</option>
                                        <option value='04'>04</option>
                                        <option value='05'>05</option>
                                        <option value='06'>06</option>
                                        <option value='07'>07</option>
                                        <option value='08'>08</option>
                                        <option value='09'>09</option>
                                        <option value='10'>10</option>
                                        <option value='11'>11</option>
                                        <option value='12'>12</option>
                                    </select>
                                    <select class="form-control" name='expireYY' id='expireYY'>
                                        <option value='21'>2021</option>
                                        <option value='22'>2022</option>
                                        <option value='23'>2023</option>
                                        <option value='24'>2024</option>
                                        <option value='25'>2025</option>
                                        <option value='26'>2026</option>
                                        <option value='27'>2027</option>
                                        <option value='28'>2028</option>
                                        <option value='29'>2029</option>
                                        <option value='30'>2030</option>
                                    </select>
                                    <input class="inputCard" type="hidden" name="expiry" id="expiry" maxlength="4"/>
                                    <div class="invalid-feedback"> Expiration date required </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">CVV</label>
                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                    <div class="invalid-feedback"> Security code required </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="payment-icon">
                                        <ul>
                                            <li><img class="img-fluid" src="{{ asset('front-assets/images/payment-icon/1.png') }}" alt=""></li>
                                            <li><img class="img-fluid" src="{{ asset('front-assets/images/payment-icon/2.png') }}" alt=""></li>
                                            <li><img class="img-fluid" src="{{ asset('front-assets/images/payment-icon/3.png') }}" alt=""></li>
                                            <li><img class="img-fluid" src="{{ asset('front-assets/images/payment-icon/5.png') }}" alt=""></li>
                                            <li><img class="img-fluid" src="{{ asset('front-assets/images/payment-icon/7.png') }}" alt=""></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-1"> </form>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="shipping-method-box">
                                <div class="title-left">
                                    <h3>Gönderim günü</h3>
                                </div>
                                <div class="mb-4">
                                    @foreach ($delivery_times as $key => $value)
                                        <div>
                                            <input id="shippingOption1" name="delivery_time" value="{{ $key }}" type="radio">
                                            <label class="custom-control-label" for="shippingOption1">{{ $value }}</label> <span class="float-right font-weight-bold">x ₺</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Sepetiniz</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                    @foreach ($products as $product)
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="detail.html">{{ $product['name'] }}</a>
                                            <div class="small text-muted">Ücret: {{ $product['price'] }} <span class="mx-2">|</span> Miktar: {{ $product['quantity'] }} <span class="mx-2">|</span>Alt Toplam : {{ $product['price']*$product['quantity'] }}</div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Toplam Ücret</h5>
                                    <div class="ml-auto h5"> {{ $checkout->total_price }} ₺</div>
                                </div>
                                <hr> </div>
                        </div>
                        <div class="col-12 d-flex shopping-box"> <button type="submit" class="ml-auto btn btn-success">Siparişi Tamamla</button> </div>
                    </div>
                </div>
            </div>
            @else
            <strong>Önce ürün eklemelisiniz</strong>
            @endif


        </div>
    </div>
    <!-- End Cart -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            @php
                if(session()->has('customer'))
                    {
                        $sessionCart = App\Models\Cart::where('customer_id', Session::get('customer')['id'])->first();
                    }
            @endphp
            @if (isset($sessionCart))
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Fatura Adresi : </h3>
                        </div>
                        <form class="needs-validation" action="{{ route('front.complete-order') }}" method="post">
                            @csrf
                            <input type="hidden" name="customer_id" value="{{ session('customer')['id'] }}" >
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Adınız : *</label>
                                    <input type="text" class="form-control" id="firstName" name="customer_name" value="{{ $customer->name }}" required>
                                    <div class="invalid-feedback"> Lütfen geçerli bir isim yazınız. </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Soyadınız :  *</label>
                                    <input type="text" class="form-control" id="lastName" name="customer_surname" value="{{ $customer->surname }}" required>
                                    <div class="invalid-feedback"> Lütfen geçerli soyisim yazınız. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email Adresiniz : *</label>
                                <input type="email" class="form-control" id="email" value="{{ $customer->email }}" name="customer_email">
                                <div class="invalid-feedback"> Lütfen geçerli email adresi yazınız. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Adresiniz :  *</label>
                                <textarea name="address" class="form-control" id="address" cols="30" rows="5">{{ $customer->address }}</textarea>
                                <div class="invalid-feedback"> Lütfen adresinizi yazınız. </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <input type="hidden" id="address_url" value="{{ route('front.get-districts') }}">
                                    <label for="country">İl : *</label>
                                    <select class="wide w-100" name="city_id" id="city-dropdown" required>
                                        <option value="Choose..." data-display="Select">---İl seçiniz---</option>
                                        @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
								    </select>
                                    <div class="invalid-feedback"> Lütfen geçerli il seçiniz. </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">İlçe : *</label>
                                    <select class="wide w-100" name="district_id" id="district-dropdown" required>
								    </select>
                                    <div class="invalid-feedback"> Lütfen geçerli ilçe seçiniz. </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">Posta Kodunuz</label>
                                    <input type="text" class="form-control" id="zip" name="zip" required>
                                    <div class="invalid-feedback"> Posta kodu gereklidir. </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="same-address" value="YES" name="same_address">
                                <label class="custom-control-label" for="same-address">Gönderim adresim fatura adresiyle aynı olacak.</label>
                            </div>
                            <hr class="mb-4">
                            <div class="title"> <span>Ödeme Türü : *</span> </div>
                            <label for="">Geçici olarak sadece havale türü ile ödeme alıyoruz</label>

                            <div class="d-block my-3">
                                <input type="checkbox" name="payment_type" value="HAVALE" disabled checked>
                                <label for="">Havale</label>
                            </div>
                            {{-- <div class="d-block my-3">
                                <fieldset id="payment">
                                @foreach ($payment_types as $key => $value)
                                    <div class="custom-radio">
                                        <input name="payment_type" type="radio" value="{{ $key }}" required>
                                        <label  value="{{ $key }}" for="credit">{{ $value }}</label>
                                    </div>
                                @endforeach
                                </fieldset>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cc-name">Ticari Hesabımız : </label>
                                    <label class="form-control" for="">Ayşe</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cc-number">IBAN Numaramız : </label>
                                    <label class="form-control" for="">TR09 0011 1000 0000 0098 6323 71</label>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="payment-icon">
                                        <ul>
                                            <li><img class="img-fluid" src="{{ asset('front-assets/images/payment-icon/1.png') }}" alt=""></li>
                                            <li><img class="img-fluid" src="{{ asset('front-assets/images/payment-icon/2.png') }}" alt=""></li>
                                            <li><img class="img-fluid" src="{{ asset('front-assets/images/payment-icon/3.png') }}" alt=""></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-1"> --}}
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
                                    <label for="">Minimum 7 gün - Maksimum 14 gün</label>
                                    <input type="hidden" name="delivery_time" value="3-7_DAY">
                                    {{-- <fieldset id="delivery">
                                    @foreach ($delivery_times as $key => $value)
                                        <div>
                                            <input id="shippingOption1" name="delivery_time" value="{{ $key }}" type="radio" required>
                                            <label for="shippingOption1">{{ $value }}</label> <span class="float-right font-weight-bold">x TRY</span>
                                        </div>
                                    @endforeach
                                    </fieldset> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <label for="">Notunuz : </label>
                            <textarea class="form-control" name="note" id="" cols="30" rows="5"></textarea><br>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Sepetiniz</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                    @php
                                        $total_quantity = 0;
                                        $i = 0;
                                    @endphp
                                    @foreach (json_decode($sessionCart->products, true) as $product)
                                    @php
                                        $total_quantity += $product["quantity"];
                                    @endphp
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a target="_blank" href="{{ route('front.product-detail', $product['product_slug']) }}">{{ $product['name'] }}</a>
                                            <img src="{{ asset("storage/product-images/".$product['image_1']) }}" width="50" alt="">
                                            <div class="small text-muted">Ücret: {{ $product['price'] }} <span class="mx-2">|</span> Miktar: {{ $product['quantity'] }} <span class="mx-2">|</span>Alt Toplam : {{ $product['price']*$product['quantity'] }}</div>
                                            <input type="hidden" name="products[{{ $i }}][product_id]" value="{{ $product["product_id"] }}" type="text">
                                            <input type="hidden" name="products[{{ $i }}][name]" value="{{ $product["name"] }}" type="text">
                                            <input type="hidden" name="products[{{ $i }}][price]" value="{{ $product["price"] }}" type="text">
                                            <input type="hidden" name="products[{{ $i }}][quantity]" value="{{ $product["quantity"] }}" type="text">
                                            <input type="hidden" name="products[{{ $i }}][size]" value="{{ $product["size"] }}" type="text">
                                            <input type="hidden" name="products[{{ $i }}][image_1]" value="{{ $product["image_1"] }}" type="text">
                                            <input type="hidden" name="products[{{ $i }}][product_slug]" value="{{ $product["product_slug"] }}" type="text">
                                            <input type="hidden" name="total_quantity" value="{{ $total_quantity }}">

                                           @php
                                               $i++
                                           @endphp
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="d-flex gr-total">
                                    <h5>Kargo ücreti</h5>
                                    <div class="ml-auto h5"> +5 TRY</div>
                                    <input type="hidden" name="sub_total" value="{{ $check->total_price }}">
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Vergi</h5>
                                    <div class="ml-auto h5"> 0 TRY</div>
                                    <input type="hidden" name="tax" value="0">
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Net Ücret</h5>
                                    <div class="ml-auto h5"> + {{ $check->total_price }} TRY</div>
                                </div>
                                <hr>

                                <div class="d-flex gr-total">
                                    <h5>Brüt Ücret</h5>
                                    <div class="ml-auto h5"> {{ $check->total_price + 5 }} TRY</div>
                                    <input type="hidden" name="grand_total" value="{{ $check->total_price + 5 + 0 }}">
                                </div>
                                <hr>

                            </div>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="accept_contract" value="YES">
                            <label><a target="_blank" href="{{ route('front.distance-contract') }}">Mesafeli Satış Sözleşmesi'ni </a> okudum ve kabul ediyorum.</label>
                        </div>
                        <div class="col-1 d-flex shopping-box">

                        <button type="submit" class="ml-auto btn btn-success go-checkout">Siparişi Tamamla</button>

                        </div><br>
                        @if($errors->any())

                            <h4 class="text-danger">   {{ implode('', $errors->all(':message')) }} </h4>
                        @endif
                    </form>
                    </div>
                </div>
            </div>
            @else
            <h1 class="border-bottom border-black">Önce ürün eklemelisiniz!</h1 >
            @endif


        </div>
    </div>
    <!-- End Cart -->

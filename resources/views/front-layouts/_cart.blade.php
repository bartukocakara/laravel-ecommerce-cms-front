    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Görsel</th>
                                    <th>Ürün Adı</th>
                                    <th>Ücret</th>
                                    <th>Miktar</th>
                                    <th>Toplam</th>
                                    <th>Kaldır</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($cart->products))
                                @php
                                    $i = 0
                                @endphp
                                @foreach ($products as $product)
                                <tr id="product {{ $i++ }}">
                                    <td class="thumbnail-img">
                                        <a href="{{ route('front.product-detail', $product->product_slug) }}">
									<img class="img-fluid" src="{{ asset('storage/product-images/'.$product->image_1) }}" alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        {{ $product->name }}
                                    </td>
                                    <td class="price-pr">
                                        {{ $product->price }} ₺
                                    </td>
                                    <td class="quantity-box">
                                        <input type="hidden" id="product_id" value="{{ $product->product_id  }}">
                                        <input type="hidden" id="price" value="{{ $product->price }}">
                                        <a class="cart_quantity_down" style="cursor: pointer;" value="{{ route('front.decrease-quantity') }}"> - </a>
                                        <div class="h6" id="quantity"> {{ $product->quantity }}</div>
                                        <a class="cart_quantity_up" style="cursor: pointer;" value="{{ route('front.increase-quantity') }}"> + </a>
                                    </td>
                                    <td class="total-pr">
                                        {{ $product->price * $product->quantity }} ₺
                                    </td>
                                    <td class="remove-pr">
                                        <a href="{{ route('front.remove-from-cart', $product->product_id) }}">
									        <i class="fas fa-times"></i>
								        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <h1>Sepetiniz Boş.</h1>
                                @php
                                @endphp
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        @if (isset($cart))
                        <div class="d-flex gr-total">
                            <h5>Toplam Ücret : </h5>
                            <div class="ml-auto h5" id="total_price_show"> {{ $cart->total_price }} ₺</div>
                            <input type="hidden" value="{{ $cart->total_quantity }}" id="total_quantity">
                            <input type="hidden" value="{{ $cart->total_price }}" id="total_price">
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="{{ route('front.checkout') }}" class="ml-auto btn hvr-hover">Ödemeye git</a> </div>
                @endif
            </div>

        </div>
    </div>
    <!-- End Cart -->
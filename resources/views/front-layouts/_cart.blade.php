    <!-- Start Cart  -->
    <div class="cart-box-main">
        @php
            if(session()->has('customer'))
            {
                $sessionCart = App\Models\Cart::where('customer_id', Session::get('customer')['id'])->first();
            }
        @endphp
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-black font-weight-bold text-center">Sepetiniz : </h1>
                    <div class="table-main table-responsive">
                        <table class="table">
                            @if(isset($sessionCart->products))
                            <thead>
                                <tr>
                                    <th>Görsel</th>
                                    <th>Ürün Adı</th>
                                    <th>Ücret</th>
                                    <th>Miktar</th>
                                    <th>Ürün Toplam</th>
                                    <th>Kaldır</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $i = 0
                                @endphp
                                @foreach (json_decode($sessionCart->products, true) as $product)
                                <tr id="product {{ $i++ }}">
                                    <td class="thumbnail-img">
                                        <a href="{{ route('front.product-detail', $product['product_slug']) }}">
									<img class="img-fluid" src="{{ asset('storage/product-images/'.$product['image_1']) }}" alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        {{ $product['name'] }}
                                    </td>
                                    <td class="price-pr">
                                        {{ $product['price'] }} TRY
                                    </td>
                                    <td class="quantity-box">
                                        <input type="hidden" id="product_id" value="{{ $product['product_id']  }}">
                                        <input type="hidden" id="price" value="{{ $product['price'] }}">
                                        <a class="cart_quantity_down" style="cursor: pointer;" value="{{ route('front.decrease-quantity') }}"> - </a>
                                            <input type="hidden" id="decrease-qty" value="{{ route('front.decrease-quantity') }}">
                                            <input type="number" class="h6" id="quantity" mix="0" max="30" value="{{ $product['quantity'] }}" disabled>
                                            <input type="hidden" id="increase-qty" value="{{ route('front.increase-quantity') }}">
                                        <a class="cart_quantity_up" style="cursor: pointer;" value="{{ route('front.increase-quantity') }}"> + </a>
                                    </td>
                                    <td id="total-pr" id="{{ $i }}" value="{{ $i }}">
                                        {{ $product['price'] * $product['quantity'] }} TRY
                                    </td>
                                    <td class="remove-pr">
                                        <form action="{{ route('front.remove-from-cart', $product['product_id']) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger remove-from-cart"><i class="fas fa-times"></i></button>
                                        </a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <h1 class="border-bottom border-black">Sepetiniz Boş!</h1>

                            </tbody>
                            @endif
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
                            <div class="ml-auto h5" id="total_price_show"> {{ $cart->total_price }}  TRY</div>
                            <input type="hidden" value="{{ $cart->total_quantity }}" id="total_quantity">
                            <input type="hidden" value="{{ $cart->total_price }}" id="total_price">
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="{{ route('front.checkout') }}" class="ml-auto btn go-checkout">Ödemeye git</a> </div>
                @endif
            </div>

        </div>
    </div>
    <!-- End Cart -->

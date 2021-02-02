<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-success font-weight-bold text-center overflow-hidden">Bizi tercih ettiğiniz için teşekkür ederiz.Sipariş Özetiniz : </h1>

            <div class="table-main table-responsive">
                <table class="table">
                    @if(isset($order->products))
                    <thead>
                        <tr>
                            <th>Görsel</th>
                            <th>Ürün Adı</th>
                            <th>Ücret</th>
                            <th>Miktar</th>
                            <th>Ürün Toplam</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $i = 0
                        @endphp
                        @foreach (json_decode($order->products, true) as $product)
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
                                <input type="number" class="h6 rounded " id="quantity" mix="0" max="30" value="{{ $product['quantity'] }}" disabled>
                            </td>
                            <td id="total-pr" id="{{ $i }}" value="{{ $i }}">
                                {{ $product['price'] * $product['quantity'] }} TRY
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
</div>

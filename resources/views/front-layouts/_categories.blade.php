
    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>
                            {{ $cat1->name ." / ". $cat2->name }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row special-list">
                @if (count($products) > 0)
                @foreach ($products as $product)
                <div class="col-lg-3 col-md-6 special-grid">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            @if ($product->stock_status == 1)
                            <div class="type-lb">
                                <p class="sale bg-success">Stokta</p>
                            </div>
                            @else
                            <div class="type-lb">
                                <p class="sale">Stokta değil</p>
                            </div>
                            @endif

                            <img src="{{ asset('storage/product-images/'.$product->image_1) }}" alt="Image" width="200" height="300">
                        </div>
                        <div class="why-text">
                            <form action="{{ route('front.add-to-cart') }}" method="post">
                                @csrf
                                <input type="hidden" name="products[product_id]" value="{{ $product->id }}" type="text">
                                <input type="hidden" name="products[name]" value="{{ $product->name }}" type="text">
                                <input type="hidden" name="products[price]" value="{{ $product->price }}" type="text">
                                <input type="hidden" name="products[quantity]" value="1" type="text">
                                <input type="hidden" name="products[size]" value="{{ $product->size }}" type="text">
                                <input type="hidden" name="products[image_1]" value="{{ $product->image_1 }}" type="text">
                                <input type="hidden" name="products[product_slug]" value="{{ $product->product_slug }}" type="text">
                                <button type="submit" class="btn @if($product->stock_status == 1) btn-success @else btn-danger @endif cart " @if($product->stock_status == 0) disabled title="Stoğu tükenmiş" @endif >Sepete Ekle</button>
                                <a class="btn" href="{{ route('front.product-detail', $product->product_slug) }}" data-toggle="tooltip" data-placement="right" title="göster">Ürün detayı</i></a>
                            </form>
                            <br>
                            <h4>{{ $product->name ." - " .$product->size }}</h4>
                            <h5>{{ $product->price }} TRY</h5>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                    <h1>Bu kategorideki ürünlerimizin stokları tükenmiştir.</h1>
                @endif

            </div>
        </div>
    </div>
    <!-- End Products  -->

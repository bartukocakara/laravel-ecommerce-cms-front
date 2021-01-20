    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Kategori ürünleri</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">Hepsi</button>
                            @foreach ($categories as $category)
                            <button data-filter=".{{ $category->name }}">{{ $category->name }}</button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row special-list"> --}}
                {{-- @if (isset($products))
                @foreach ($products as $product)
                <div class="col-lg-3 col-md-6 special-grid @foreach($categories as $category) @if($product->category_id == $category->id) {{ $category->name }} @endif @endforeach">
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
                            <img src="{{ asset('storage/product-images/'.$product->image_1) }}" class="img-fluid" alt="Image">
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
                                <a class="btn btn-info show" href="{{ route('front.product-detail', $product->product_slug) }}" data-toggle="tooltip" data-placement="right" title="göster">Ürün detayı</i></a>
                            </form>
                            <h4>{{ $product->name ." - " .$product->size }}</h4>
                            <h5>{{ $product->price }} ₺</h5>
                        </div>
                    </div>
                </div>

                @endforeach
                @endif --}}
                <div class="row my-5">
                    <div class="col-lg-12">
                        <div class="title-all text-center">
                            <h1>Featured Products</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                        </div>
                        <div class="featured-products-box owl-carousel owl-theme">
                            @if (isset($products))
                            @foreach ($products as $product)
                            <div class="item">
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
                                        <img src="{{ asset('storage/product-images/'.$product->image_1) }}" class="img-fluid" alt="Image">
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
                                            <a class="btn btn-info show" href="{{ route('front.product-detail', $product->product_slug) }}" data-toggle="tooltip" data-placement="right" title="göster">Ürün detayı</i></a>
                                        </form>
                                        <h4>{{ $product->name ." - " .$product->size }}</h4>
                                        <h5>{{ $product->price }} ₺</h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
    <!-- End Products  -->

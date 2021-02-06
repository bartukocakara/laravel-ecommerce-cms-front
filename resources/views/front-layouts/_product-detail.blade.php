    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">

        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div @if ($product->image_2 != null && $product->image_2 != null) id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel" @endif  >
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="{{ asset('storage/product-images/'.$product->image_1) }}" height="450" alt="First slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="{{ asset('storage/product-images/'.$product->image_2) }}" height="450" alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="{{ asset('storage/product-images/'.$product->image_3) }}" height="450" alt="Third slide"> </div>
                        </div>
                    @if ($product->image_2 != null && $product->image_3 != null)
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span>
					</a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
						<span class="sr-only">Next</span>
                    </a>

                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="{{ asset('storage/product-images/'.$product->image_1) }}" alt="" />
                            </li>

                            <li data-target="#carousel-example-1" data-slide-to="1">
                                <img class="d-block w-100 img-fluid" src="{{ asset('storage/product-images/'.$product->image_2) }}" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="2">
                                <img class="d-block w-100 img-fluid" src="{{ asset('storage/product-images/'.$product->image_3) }}" alt="" />
                            </li>

                        </ol>
                    @endif
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{ $product->name }}</h2>
                        <h5> {{ $product->price }} TRY</h5>
                            <p>
                                <h4>Ürün Açıklaması</h4>
                                <p>{{ $product->description }} </p>
                                <ul>
                                    <li>
                                        <div class="form-group size-st">
                                            <label class="size-label">Beden</label>
                                            <input type="text" class="form-control" value="{{ $product->size }}" disabled>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group quantity-box">
                                            <label class="control-label">Stok Miktarı</label>
                                            <input class="form-control" value="{{ $product->quantity }}" min="0" max="20" type="number" disabled>
                                        </div>
                                    </li>
                                </ul>

                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn">
                                        <form action="{{ route('front.add-to-cart') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="products[product_id]" value="{{ $product->id }}" >
                                            <input type="hidden" name="products[name]" value="{{ $product->name }}" >
                                            <input type="hidden" name="products[price]" value="{{ $product->price }}" >
                                            <input type="hidden" name="products[quantity]" value="1" >
                                            <input type="hidden" name="products[size]" value="{{ $product->size }}" >
                                            <input type="hidden" name="products[image_1]" value="{{ $product->image_1 }}" >
                                            <input type="hidden" name="products[product_slug]" value="{{ $product->product_slug }}" >
                                            <button class="btn @if (session("customer")) go-checkout text-white @else btn-danger" disabled @endif data-fancybox-close="" href="#">Sepete Ekle</button>
                                        </form>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

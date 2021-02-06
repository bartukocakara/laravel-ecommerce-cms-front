<header class="main-header">
    @php
        if(session()->has('customer'))
            {
                $sessionCart = App\Models\Cart::where('customer_id', Session::get('customer')['id'])->first();
            }
    @endphp
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav on no-full">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
                <a class="navbar-brand" href="{{ route('front.home') }}"><h1><b> Mona Tasarım </b></h1></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="nav-item {{ Route::currentRouteName() == "front.home" ? 'active' : '' }}"><a class="nav-link" href="{{ route('front.home') }}">Ana Sayfa</a></li>
                    @php
                        $categories = App\Models\Category::all();
                        $subCategories = App\Models\SubCategory::all();
                    @endphp
                    @foreach ($categories as $category)
                    <li class="dropdown">
                        <a href="" class="nav-link" data-toggle="dropdown">{{ $category->name }}</a>
                        <ul class="dropdown-menu animated">
                            @foreach ($subCategories as $subCategory)
                                <li><a href="{{ route('front.category', ['category' => Str::lower($category->name), 'subCategory' => Str::lower($subCategory->name)]) }}">{{ $subCategory->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                    @if (session('customer'))
                    <li class="dropdown">
                        <a href="" class="nav-link" data-toggle="dropdown">İşlemler</a>
                        <ul class="dropdown-menu animated">
                            <li><a href="{{ route('front.cart') }}">Sepetim</a></li>
                            <li><a href="{{ route('front.checkout') }}">Ödeme Sayfası</a></li>
                        </ul>
                    </li>
                    @endif

                    <li class="nav-item {{ Route::currentRouteName() == "front.contact" ? 'active' : '' }}"><a class="nav-link" href="{{ route('front.contact') }}">İletişim</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

            <!-- Start Atribute Navigation -->
            @if (isset($sessionCart) && Session::get('customer'))
            <div class="attr-nav">
                <ul>
                    <li class="side-menu">
                        <a href="#"> <i class="fa fa-shopping-bag"></i>
                        <span class="badge">{{ $sessionCart->total_quantity }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->
            @else
            <div class="attr-nav">
                <ul>
                    <li class="side-menu" >
                        <a style="pointer-events:none"> <i class="fa fa-shopping-bag"></i>
                        <span class="badge">0</span>
                        </a>
                    </li>
                </ul>
            </div>
            @endif

        </div>
        <!-- Start Side Menu -->
        @if (Session::get('customer') && isset($sessionCart))
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <li class="cart-box">
                <ul class="cart-list">
                    @foreach (json_decode($sessionCart->products) as $product)
                    <li>
                        <a href="#" class="photo"><img src="{{ asset('storage/product-images/'.$product->image_1) }}" class="cart-thumb" alt=""></a>
                        <h6><a href="#">{{ $product->name }} </a></h6>
                        <input type="number" class="input-quantity" name="quantity" max="99" min="1" class="controlNumber" style="width: 35px;" id="input-quantity-{{ $product->quantity }}" value="{{ $product->quantity }}" disabled>
                        <h4 class="d-inline"> * {{ $product->price }} = {{ $product->price*$product->quantity }} TRY</h4>
                    </li>
                    @endforeach
                </ul>
                <div class="btn-group ml-4">
                    <a href="{{ route('front.cart') }}" class="btn btn-success go-checkout">Sepete git</a>
                    <form action="{{ route('front.empty-cart', $sessionCart->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger clear-cart empty-cart">Sepeti boşalt</button>
                    </form>
                </div>
                <h3 class="card-footer">Toplam ücret:{{ $sessionCart->total_price }} TRY </h3>
            </li>

        </div>
        @else
        @endif

        <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
</header>


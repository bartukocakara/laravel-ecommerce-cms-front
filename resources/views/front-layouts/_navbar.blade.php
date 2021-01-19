<header class="main-header">
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
                    @foreach ($categories as $category)
                    <li class="dropdown">
                        <a href="" class="nav-link" data-toggle="dropdown">@if ($category->id == 1) Kadın @else Erkek @endif</a>
                        <ul class="dropdown-menu animated">
                            @foreach ($subCategories as $subCategory)
                                <li><a href="{{ route('front.category', ['category' => $category->id, 'subCategory' => $subCategory->name]) }}">{{ $subCategory->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                    @if (Auth::check())
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
            @if (isset($cart) && Auth::check())
            <div class="attr-nav">
                <ul>
                    <li class="side-menu">
                        <a href="#"> <i class="fa fa-shopping-bag"></i>
                        <span class="badge">{{ $cart->total_quantity }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->
            @else
            <div class="attr-nav">
                <ul>
                    <li class="side-menu">
                        <a href="#"> <i class="fa fa-shopping-bag"></i>
                        <span class="badge">0</span>
                        </a>
                    </li>
                </ul>
            </div>
            @endif

        </div>
        <!-- Start Side Menu -->
        @if (Auth::check() && isset($cart->products))
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <li class="cart-box">
                <ul class="cart-list">
                    @foreach (json_decode($cart->products) as $product)
                    <li>
                        <a href="#" class="photo"><img src="{{ asset('storage/product-images/'.$product->image_1) }}" class="cart-thumb" alt=""></a>
                        <h6><a href="#">{{ $product->name }} </a></h6>
                        <input type="number" class="input-quantity" name="quantity" max="99" min="1" class="controlNumber" style="width: 35px;" id="input-quantity-{{ $product->quantity }}" value="{{ $product->quantity }}">
                        <h4 class="d-inline"> x {{ $product->price }} ₺ = {{ $product->price*$product->quantity }}</h4>
                    </li>
                    @endforeach
                </ul>
                <div class="btn-group">
                    <a href="{{ route('front.cart') }}" class="btn btn-sm ml-3 btn-info my-auto">Sepete git</a>
                    <form action="{{ route('front.empty-cart', $cart->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger ml-5 my-auto" onclick="confirm('Sepetinizi boşaltmak istiyor musunuz istiyor musunuz ?')">Sepeti boşalt</button>
                    </form>
                </div>
                <h3 class="card-footer">Toplam ücret:{{ $cart->total_price }}
            </li>

        </div>
        @else
        @endif

        <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
</header>


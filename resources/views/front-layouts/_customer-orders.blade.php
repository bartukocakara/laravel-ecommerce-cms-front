
    <!-- Start My Account  -->
    <h2 class="font-weight-bold text-center p-2">Siparişleriniz :</h2>
    <div class="my-account-box-main">
        @if (session('success'))
            <div class="alert alert-success alert-dismissable fade show" role="alert">
            <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif (session('fail'))
            <div class="alert alert-dange alert-dismissable fade show" role="alert">
            <strong>{{ session('fail') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="container">
            @if (count($orders))
            <div class="my-account-page">
                @foreach ($orders as $order)
                <h2 class="font-weight-bold text-center p-2">Sipariş kodu : {{ $order->order_code }}</h2>
                <form action="{{ route('front.cancel-order', $order->order_code) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm cancel-order">Siparişi iptal et</button>
                </form>
                <div class="row border rounded p-2">
                    @foreach (json_decode($order->products, true) as $product)
                        <div class="col-lg-4 col-md-12">
                            <div class="account-box mh-50">
                                <div class="service-box">
                                    <img src="{{ asset('storage/product-images/'.$product['image_1']) }}"  class="img-fluid" width="300" height="300" alt="">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endforeach
            </div>
            @else
            <h1 class="border-bottom">Henüz siparişiniz yok...</h1>
            @endif

        </div>
    </div>
    <!-- End My Account -->

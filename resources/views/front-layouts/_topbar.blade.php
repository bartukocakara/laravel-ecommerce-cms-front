<div class="wrapper">
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    @if (session('added'))
                    <div class="alert alert-success alert-dismissable fade show" role="alert">
                    <strong>{{ session('added') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @elseif(session('notLoggedIn'))
                    <div class="alert alert-danger alert-dismissable fade show" role="alert">
                        <strong>{{ session('notLoggedIn') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif(session('emptyCart'))
                    <div class="alert alert-warning alert-dismissable fade show" role="alert">
                        <strong>{{ session('emptyCart') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    @endif

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="our-link">
                        <ul>
                            <li><a style="color:#fff;
                                background:
                                radial-gradient(#25d366 56%,transparent 0);" href=""><i class="fab fa-whatsapp"></i></a></li>
                            @if (Session::get('customer'))
                            <li><a href="{{ route('front.profile') }}">{{ Session::get('customer')['name'] }}</a></li>
                            <li><a href="{{ route('front.logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış Yap</a></li>
                                <form id="logout-form" action="{{ route('front.logout') }}" method="GET" class="d-none">
                                    @csrf
                                </form>
                            @else
                            <li><a href="{{ route('front.login') }}">Giriş Yap</a></li>
                            <li><a href="{{ route('front.register') }}">Kayıt Ol</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

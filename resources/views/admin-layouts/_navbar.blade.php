<!-- ########## START: HEAD PANEL ########## -->
@if (Auth::check())
<div class="sl-header">
    <div class="sl-header-left">
      <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
      <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
      <nav class="nav">
        <div class="dropdown">
          <a href="" class="nav-link nav-link-profile dropdown-toggle" data-toggle="dropdown">
            <span class="logged-name">{{ Auth::user()->name }}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-header mr-2 wd-100">
            <ul class="list-unstyled user-profile-nav">
              <li><a class="dropdown-item text-center" href="{{ route('logout') }}" --}}
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    Çıkış Yap
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </li>
            </ul>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
      </nav>
    </div><!-- sl-header-right -->
  </div><!-- sl-header -->
  <!-- ########## END: HEAD PANEL ########## -->

@endif

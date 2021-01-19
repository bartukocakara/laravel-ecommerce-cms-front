<!-- ########## START: LEFT PANEL ########## -->
@if (Auth::check())
<div class="sl-logo"><a href="{{ route('admin.home') }}">Mona Tasarım</a></div>
<div class="sl-sideleft">
  <div class="input-group input-group-search">
    <input type="search" name="search" class="form-control" placeholder="Search">
    <span class="input-group-btn">
      <button class="btn"><i class="fa fa-search"></i></button>
    </span><!-- input-group-btn -->
  </div><!-- input-group -->

  <label class="sidebar-label">Navigation</label>
  <div class="sl-sideleft-menu">
    <a href="{{ route('admin.home') }}" class="sl-menu-link{{ Route::currentRouteName() == "admin.home" ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-briefcase tx-22"></i>
        <span class="menu-item-label">Dashboard</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->

    <a href="{{ route('categories.index') }}" class="sl-menu-link{{ Route::currentRouteName() == "categories.index" ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-grid tx-20"></i>
        <span class="menu-item-label">Kategoriler</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->

    <a href="{{ route('sub-categories.index') }}" class="sl-menu-link{{ Route::currentRouteName() == "sub-categories.index" ? 'active' : '' }}">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-grid tx-20"></i>
          <span class="menu-item-label">Alt Kategoriler</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

    <a href="{{ route('products.index') }}" class="sl-menu-link{{ Route::currentRouteName() == "products.index" ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon fa fa-tags tx-20"></i>
        <span class="menu-item-label">Ürünler</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->

    <a href="{{ route('customers.index') }}" class="sl-menu-link{{ Route::currentRouteName() == "customers.index" ? 'active' : '' }}">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-person-stalker tx-20"></i>
          <span class="menu-item-label">Müşteriler</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="{{ route('orders.index') }}" class="sl-menu-link{{ Route::currentRouteName() == "orders.index" ? 'active' : '' }}">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-cart-plus tx-20"></i>
          <span class="menu-item-label">Siparişler</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
    <a href="{{ route('messages.index') }}" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
        <span class="menu-item-label">Mesajlar</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->

  </div><!-- sl-sideleft-menu -->

  <br>
</div><!-- sl-sideleft -->
@endif

<!-- ########## END: LEFT PANEL ########## -->

@extends('admin-layouts.app')

@section('title', 'Sipariş Düzenle')

@section('sidebar')
    @parent
@endsection

@section('navbar')
    @parent
@endsection

@section('content')
<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="row row-sm">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sipariş Düzenle</div>
                        <div class="body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissable fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form action="{{ route('orders.update', $order->id) }}" method="post" role="form">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Adı : </label>
                                        <input type="text" class="form-control" name="name"
                                        @error('name')
                                        is-invalid
                                        @enderror placeholder="İsim yazınız" value="{{ $order->customer_name }}"><br>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Soyadı : </label>
                                        <input type="text" class="form-control" name="surname"
                                        @error('surname')
                                        is-invalid
                                        @enderror placeholder="Soyisim yazınız" value="{{ $order->customer_surname }}"><br>
                                        @error('surname')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Email : </label>
                                        <input type="email" class="form-control" name="email"
                                        @error('email')
                                        is-invalid
                                        @enderror placeholder="Email yazınız" value="{{ $order->customer_email }}"><br>
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">İl : </label>
                                        <select class="form-control" name="city" id="">
                                            <option value="">---İl seçiniz---</option>
                                            <option value=""></option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">İlçe : </label>
                                        <select class="form-control" name="district" id="">
                                            <option value="">---İlçe seçiniz---</option>
                                            <option value=""></option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Posta kodu : </label>
                                        <input type="text" class="form-control" name="zip"
                                        @error('zip')
                                        is-invalid
                                        @enderror placeholder="Posta kodu yazınız" value="{{ $order->zip }}"><br>
                                        @error('zip')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <label for="">Ürünler : </label>
                                    <button class="btn btn-sm btn-info" id="addProduct">Ürün Ekle</button>

                                    <div class="col-md-12 row">
                                        <div class="col-md-6">
                                            <select class="form-control" name="products" id="">
                                                <option value="">---Ürün</option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control" name="products" id="">
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control" name="products" id="">
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control" name="products" id="">
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <label for="">İndirim : </label>
                                        <input type="text" class="form-control" name="discount"
                                        @error('discount')
                                        is-invalid
                                        @enderror placeholder="İsim yazınız" value="{{ $order->discount }}"><br>
                                        @error('discount')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Taşıma ücreti : </label>
                                        <input type="text" class="form-control" name="shipping_cost"
                                        @error('shipping_cost')
                                        is-invalid
                                        @enderror placeholder="Taşıma ücreti yazınız" value="{{ $order->shipping_cost }}"><br>
                                        @error('shipping_cost')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Vergi : </label>
                                        <input type="text" class="form-control" name="tax"
                                        @error('tax')
                                        is-invalid
                                        @enderror placeholder="Vergi miktarı yazınız" value="{{ $order->tax }}"><br>
                                        @error('tax')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Net ödeme : </label>
                                        <input type="text" class="form-control" name="grand_total"
                                        @error('grand_total')
                                        is-invalid
                                        @enderror placeholder="Net ödeme" value="{{ $order->grand_total }}"><br>
                                        @error('grand_total')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Brüt ödeme : </label>
                                        <input type="text" class="form-control" name="sub_total"
                                        @error('name')
                                        is-invalid
                                        @enderror placeholder="Brüt ödeme" value="{{ $order->sub_total }}"><br>
                                        @error('sub_total')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Toplam ürün miktarı : </label>
                                        <input type="text" class="form-control" name="total_quantity"
                                        @error('name')
                                        is-invalid
                                        @enderror placeholder="Ürün miktarı" value="{{ $order->total_quantity }}"><br>
                                        @error('total_quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Notu : </label>
                                        <input type="text" class="form-control" name="note"
                                        @error('name')
                                        is-invalid
                                        @enderror placeholder="Not yazınız" value="{{ $order->note }}"><br>
                                        @error('note')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Kargo : </label>
                                        <select class="form-control" name="shipping_company" id="">
                                            <option value="">---Kargo firması---</option>
                                            <option value=""></option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Toplam ürün miktarı : </label>
                                        <input type="text" class="form-control" name="total_quantity"
                                        @error('name')
                                        is-invalid
                                        @enderror placeholder="Toplam miktar" value="{{ $order->total_quantity }}"><br>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Ulaştırma günü : </label>
                                        <select class="form-control" name="delivery_time" id="">
                                            <option value="">---Ulaştırma günü---</option>
                                            <option value=""></option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Ödeme türü : </label>
                                        <select class="form-control" name="" id="">
                                            <option value="">---Ödeme Türü---</option>
                                            <option value=""></option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Sipariş durumu : </label>
                                        <select class="form-control" name="status" id="">
                                            <option value="">---Sipariş Durumu---</option>
                                            <option value="">Sipariş Durumu</option>
                                        </select>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-info">Güncelle</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->

  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->
@endsection

@section('footer')
    @parent
@endsection

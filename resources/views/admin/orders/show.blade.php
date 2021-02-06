@extends('admin-layouts.app')

@section('title', 'Sipariş Göster')

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
                <div class="card pd-20 pd-sm-40">
                    <div class="card-header">Sipariş Göster</div>
                        <div class="body">
                            {{-- @if(session('success'))
                                <div class="alert alert-success alert-dismissable fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if($errors->any())

                            <h4 class="text-danger">   {{ implode('', $errors->all(':message')) }} </h4>
                            @endif --}}
                            <form action="" role="form">
                                @csrf
                                {{-- @method('PUT') --}}
                                <input type="hidden" name="accept_contract" value="YES">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Adı : </label>
                                        <input type="text" class="form-control" name="customer_name"
                                        @error('customer_name')
                                        is-invalid
                                        @enderror placeholder="İsim yazınız" value="{{ $order->customer_name }}" disabled><br>
                                        @error('customer_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Soyadı : </label>
                                        <input type="text" class="form-control" name="customer_surname"
                                        @error('custmer_surname')
                                        is-invalid
                                        @enderror placeholder="Soyisim yazınız" value="{{ $order->customer_surname }}" disabled><br>
                                        @error('custmer_surname')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Email : </label>
                                        <input type="email" class="form-control" name="customer_email"
                                        @error('customer_email')
                                        is-invalid
                                        @enderror placeholder="Email yazınız" value="{{ $order->customer_email }}" disabled><br>
                                        @error('customer_email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Adres Detay : </label>
                                        <textarea class="form-control" @error('note') is-invalid @enderror placeholder="Adres yazınız..." name="address" id="" cols="20" rows="5" disabled>{{ $order->address }}</textarea>
                                        @error('note')
                                        <span class="text-danger" disabled>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="city">İller:</label>
                                        <select class="form-control" name="city_id" id="city-dropdown" disabled>
                                            <option value="">---İl seçiniz---</option>
                                            @foreach ($cities as $city)
                                                <option @if ($city->id == $order->city_id) selected @endif value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="district">İlçeler</label>
                                        <select class="form-control" name="district_id" id="district-dropdown" disabled>
                                            @foreach ($districts as $district)
                                            <option @if($order->district_id == $district->id) selected @endif value="{{ $district->id }}">{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Posta kodu : </label>
                                        <input type="text" class="form-control" name="zip"
                                        @error('zip')
                                        is-invalid
                                        @enderror placeholder="Posta kodu yazınız" value="{{ $order->zip }}" disabled><br>
                                        @error('zip')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Ürünler  --}}
                                    <div class="col-md-12">
                                    <label for="">Ürünler : </label>
                                    </div>
                                    <div class="col-md-12 row border">
                                        {{-- @php
                                            $i = 0;
                                        @endphp --}}
                                        @foreach ($productsOrdered as $ordered)
                                        <div class="col-md-4 border text-center mt-2 mb-2">
                                            {{-- <form action="{{ route('admin.remove-product-from-order') }}" method="post"> --}}
                                                @csrf
                                                <img src="{{ asset('storage/product-images/'.$ordered['image_1']) }}" width="200" alt="">
                                                <input class="form-control text-center mt-1 mb-1" name="products[name]" type="text" value="{{ $ordered['name'] }}" disabled>
                                                <input class="form-control text-center mt-1 mb-1" name="products[price]" type="number" value="{{ $ordered['price'] }}" disabled>
                                                {{-- <input type="hidden" name="products[{{ $i }}][product_id]" value="{{ $ordered['product_id'] }}" >
                                                <input type="hidden" name="products[{{ $i }}][quantity]" value="{{ $ordered['quantity'] }}">
                                                <input type="hidden" name="products[{{ $i }}][size]" value="{{ $ordered['size'] }}">
                                                <input type="hidden" name="products[{{ $i }}][image_1]" value="{{ $ordered['image_1'] }}">
                                                <input type="hidden" name="products[{{ $i }}][product_slug]" value="{{ $ordered['product_slug'] }}">
                                                <button type="submit" class="btn btn-danger">Ürünü iptal et</button> --}}
                                            {{-- </form> --}}
                                        </div>
                                        {{-- @php
                                            $i++;
                                        @endphp --}}
                                        @endforeach
                                    </div>

                                        {{-- <input type="hidden" value="{{ route('admin.add-product') }}" id="add-product-url"> --}}
                                            {{-- @foreach ($productsOrdered as $ordered) --}}
                                                {{-- <div class="col-md-6 mb-4">
                                                        <input type="text"  value="{{ $ordered['name'] ." - " .$ordered['size']  . " - " . $ordered['price'] . " TRY"}}" disabled>
                                                    </select>
                                                </div> --}}
                                            {{-- @endforeach --}}
                                    {{-- <input type="button" class="btn btn-sm btn-info ml-4" id="addProduct" value="Ürün Ekle"> --}}

                                    {{-- ürünler Eklenecek --}}
                                    {{-- <div class="col-md-12 row" id="buildOrders">

                                    </div>
                                    <br> --}}

                                    <div class="col-md-6">
                                        <label for="">Taşıma ücreti : </label>
                                        <input type="text" class="form-control" name="shipping_cost"
                                        @error('shipping_cost')
                                        is-invalid
                                        @enderror placeholder="Taşıma ücreti yazınız" value="{{ $order->shipping_cost }}" disabled><br>
                                        @error('shipping_cost')
                                        <span class="text-danger" disabled>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Vergi : </label>
                                        <input type="text" class="form-control" name="tax"
                                        @error('tax')
                                        is-invalid
                                        @enderror placeholder="Vergi miktarı yazınız" value="{{ $order->tax }}" disabled><br>
                                        @error('tax')
                                        <span class="text-danger" disabled>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Net ödeme : </label>
                                        <input type="text" class="form-control" name="grand_total"
                                        @error('grand_total')
                                        is-invalid
                                        @enderror placeholder="Net ödeme" value="{{ $order->grand_total }}" disabled><br>
                                        @error('grand_total')
                                        <span class="text-danger" disabled>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Brüt ödeme : </label>
                                        <input type="text" class="form-control" name="sub_total"
                                        @error('sub_total')
                                        is-invalid
                                        @enderror placeholder="Brüt ödeme" value="{{ $order->sub_total }}" disabled ><br>
                                        @error('sub_total')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Toplam ürün miktarı : </label>
                                        <input type="text" class="form-control" name="total_quantity"
                                        @error('total_quantity')
                                        is-invalid
                                        @enderror placeholder="Ürün miktarı" value="{{ $order->total_quantity }}" disabled><br>
                                        @error('total_quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Notu : </label>
                                        <textarea class="form-control" @error('note') is-invalid @enderror placeholder="Not yazınız" name="note" id="" cols="20" rows="5" disabled>{{ $order->note }}</textarea>
                                        @error('note')
                                        <span class="text-danger" disabled>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Kargo : </label>
                                        <select class="form-control" name="shipping_company" id="" disabled>
                                            <option value="">---Kargo firması---</option>
                                            @foreach ($shipping_companies as $key => $value)
                                            <option @if($order->shipping_company == $key) selected @endif value="{{ $key }}" >{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Toplam ürün miktarı : </label>
                                        <input type="number" class="form-control" name="total_quantity"
                                        @error('total_quantity')
                                        is-invalid
                                        @enderror placeholder="Toplam miktar" value="{{ $order->total_quantity }}" disabled><br>
                                        @error('total_quantity')
                                        <span class="text-danger" disabled>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Ulaştırma günü : </label>
                                        <select class="form-control" name="delivery_time" id="" disabled>
                                            <option value="">---Ulaştırma günü---</option>
                                            @foreach ($delivery_times as $key => $value)
                                            <option @if($order->delivery_time == $key) selected @endif value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Ödeme türü : </label>
                                        <select class="form-control" name="payment_type" id="" disabled>
                                            <option value="">---Ödeme Türü---</option>
                                            @foreach ($payment_types as $key => $value)
                                            <option @if($order->payment_type == $key) selected @endif value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Sipariş durumu : </label>
                                        <select class="form-control" name="status" id="" disabled>
                                            <option value="">---Sipariş Durumu---</option>
                                            @foreach ($order_status as $key => $value)
                                            <option @if($order->status == $key) selected @endif value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                {{-- <button type="submit" class="btn btn-info mt-3">Güncelle</button> --}}
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

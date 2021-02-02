@extends('admin-layouts.app')

@section('title', 'Sipariş Oluştur')

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
                    <div class="card-header">Sipariş Oluştur</div>
                        <div class="body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissable fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if($errors->any())

                            <h4 class="text-danger"> {{ implode('', $errors->all(':message')) }} </h4>
                            @endif
                            <form action="{{ route('orders.store') }}" method="post" role="form">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Adı : </label>
                                        <input type="text" class="form-control" name="customer_name"
                                        @error('customer_name')
                                        is-invalid
                                        @enderror placeholder="İsim" value="{{ old('customer_name')  }}"><br>
                                        @error('customer_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Soyadı : </label>
                                        <input type="text" class="form-control" name="custmer_surname"
                                        @error('custmer_surname')
                                        is-invalid
                                        @enderror placeholder="Soyisim" value="{{ old('custmer_surname')  }}"><br>
                                        @error('custmer_surname')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Email : </label>
                                        <input type="email" class="form-control" name="customer_email"
                                        @error('customer_email')
                                        is-invalid
                                        @enderror placeholder="Email" value="{{ old('customer_email')  }}"><br>
                                        @error('customer_email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Adres Detay : </label>
                                        <textarea class="form-control" @error('address') is-invalid @enderror placeholder="Adres..." name="address" id="" cols="20" rows="5">{{ old('address')  }}</textarea>
                                        @error('note')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="city">İller:</label>
                                        <select class="form-control" name="city" id="city-dropdown">
                                            <option value="">---İl seçiniz---</option>
                                            @foreach ($cities as $city)
                                                <option  value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="district">İlçeler</label>
                                        <select class="form-control" name="district" id="district-dropdown">
                                            @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Posta kodu : </label>
                                        <input type="text" class="form-control" name="zip"
                                        @error('zip')
                                        is-invalid
                                        @enderror placeholder="Posta kodu" value="{{ old('zip')  }}"><br>
                                        @error('zip')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Ürünler  --}}
                                    <div class="col-md-12 row">
                                        <div class="col-md-12">
                                            <label for="" style="margin-left:20px">Ürünler : </label>
                                        <input type="button" class="btn btn-sm btn-info ml-4" id="addProduct" value="Ürün Ekle">

                                        {{-- ürünler Eklenecek --}}

                                        <div class="col-md-12 row" id="buildOrders">

                                        </div>
                                    </div>
                                    <br>

                                    <div class="col-md-6">
                                        <label for="">Taşıma ücreti : </label>
                                        <input type="text" class="form-control" name="shipping_cost"
                                        @error('shipping_cost')
                                        is-invalid
                                        @enderror placeholder="Taşıma ücreti" value="{{ old('shipping_cost')  }}"><br>
                                        @error('shipping_cost')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Vergi : </label>
                                        <input type="text" class="form-control" name="tax"
                                        @error('tax')
                                        is-invalid
                                        @enderror placeholder="Vergi miktarı" value="{{ old('tax')  }}"><br>
                                        @error('tax')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Net ödeme : </label>
                                        <input type="text" class="form-control" name="grand_total"
                                        @error('grand_total')
                                        is-invalid
                                        @enderror placeholder="Net ödeme" value="{{ old('grand_total')  }}"><br>
                                        @error('grand_total')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Brüt ödeme : </label>
                                        <input type="text" class="form-control" name="sub_total"
                                        @error('sub_total')
                                        is-invalid
                                        @enderror placeholder="Brüt ödeme" value="{{ old('sub_total')  }}"><br>
                                        @error('sub_total')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Toplam ürün miktarı : </label>
                                        <input type="text" class="form-control" name="total_quantity"
                                        @error('total_quantity')
                                        is-invalid
                                        @enderror placeholder="Ürün miktarı" value="{{ old('total_quantity')  }}"><br>
                                        @error('total_quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Notu : </label>
                                        <textarea class="form-control" @error('note') is-invalid @enderror placeholder="Not" name="note" id="" cols="20" rows="5">{{ old('note')  }}</textarea>
                                        @error('note')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Kargo : </label>
                                        <select class="form-control" name="shipping_company" id="">
                                            <option value="">---Kargo firması---</option>
                                            @foreach ($shipping_companies as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Toplam ürün miktarı : </label>
                                        <input type="number" class="form-control" name="total_quantity"
                                        @error('total_quantity')
                                        is-invalid
                                        @enderror placeholder="Toplam miktar" value="{{ old('total_quantity')  }}"><br>
                                        @error('total_quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Ulaştırma günü : </label>
                                        <select class="form-control" name="delivery_time" id="">
                                            <option value="">---Ulaştırma günü---</option>
                                            @foreach ($delivery_times as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Ödeme türü : </label>
                                        <select class="form-control" name="payment_type" id="">
                                            <option value="">---Ödeme Türü---</option>
                                            @foreach ($payment_types as $key => $value)
                                            <option  value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Sipariş durumu : </label>
                                        <select class="form-control" name="status" id="">
                                            <option value="">---Sipariş Durumu---</option>
                                            @foreach ($order_status as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
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

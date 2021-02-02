@extends('admin-layouts.app')

@section('title', 'Müşteri Düzenle')

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

            <div class="col-md-8">
                <div class="card pd-20 pd-sm-40">
                    <div class="card-header">Müşteri Düzenle Ekle</div>
                    <div class="body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('customers.update', $customer->id) }}" method="post" role="form">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Adı : </label>
                                    <input type="text" class="form-control" name="name"
                                    @error('name')
                                    is-invalid
                                    @enderror placeholder="İsim yazınız" value="{{ $customer->name }}"><br>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="">Soyadı : </label>
                                    <input type="text" class="form-control" name="surname"
                                    @error('surname')
                                    is-invalid
                                    @enderror placeholder="Soyisim yazınız" value="{{ $customer->surname }}"><br>
                                    @error('surname')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="">Email adresi : </label>
                                    <input type="email" class="form-control" name="email"
                                    @error('email')
                                    is-invalid
                                    @enderror placeholder="Email yazınız" value="{{ $customer->email }}"><br>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="">Telefon numarası : </label>
                                    <input type="text" class="form-control" name="phone"
                                    @error('phone')
                                    is-invalid
                                    @enderror placeholder="Telefon numarası yazınız" value="{{ $customer->phone }}"><br>
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="">Adresi : </label>
                                    <input type="text" class="form-control" name="address"
                                    @error('address')
                                    is-invalid
                                    @enderror placeholder="Adres yazınız" value="{{ $customer->address }}"><br>
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="">2. Adresi : </label>
                                    <input type="text" class="form-control" name="second_address"
                                    @error('second_address')
                                    is-invalid
                                    @enderror placeholder="İkinci adres yazınız(varsa)" value="{{ $customer->second_address }}"><br>
                                    @error('second_address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="">Siparişleri : </label>
                                    <select class="form-control" name="" id="">
                                        <option value=""><a href="">Sipariş Kodu - Ürün listesi</a></option>
                                    </select>
                                </div>
                            <button type="submit" class="btn btn-info">Güncelle</button>
                            </div>
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

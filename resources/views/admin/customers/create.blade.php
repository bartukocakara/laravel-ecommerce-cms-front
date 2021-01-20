@extends('admin-layouts.app')

@section('title', 'Müşteri Oluştur')

@section('sidebar')
    @parent
@endsection


@section('navbar')
    @parent
@endsection




@section('content')
<div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Ürün Ekle</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">

        <div class="form-layout">
            <form action="{{ route('customers.index') }}" method="post" role="form">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Adı : </label>
                        <input type="text" class="form-control" name="name"
                        @error('name')
                        is-invalid
                        @enderror placeholder="İsim yazınız" value=""><br>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="">Soyadı : </label>
                        <input type="text" class="form-control" name="surname"
                        @error('surname')
                        is-invalid
                        @enderror placeholder="Soyisim yazınız" value=""><br>
                        @error('surname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="">Email adresi : </label>
                        <input type="email" class="form-control" name="email"
                        @error('email')
                        is-invalid
                        @enderror placeholder="Email yazınız" value=""><br>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="">Telefon numarası : </label>
                        <input type="text" class="form-control" name="phone"
                        @error('phone')
                        is-invalid
                        @enderror placeholder="Telefon numarası yazınız" value=""><br>
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="">Adresi : </label>
                        <input type="text" class="form-control" name="address"
                        @error('address')
                        is-invalid
                        @enderror placeholder="Adres yazınız" value=""><br>
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="">2. Adresi : </label>
                        <input type="text" class="form-control" name="second_address"
                        @error('second_address')
                        is-invalid
                        @enderror placeholder="İkinci adres yazınız(varsa)" value=""><br>
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
        </div><!-- form-layout -->
      </div><!-- card -->

  </div>
@endsection

@section('footer')
    @parent
@endsection

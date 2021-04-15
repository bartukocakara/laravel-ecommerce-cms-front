@extends('admin-layouts.app')

@section('title', 'Müşteri Ekle')

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
        <h5>Müşteri Ekle</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        @if(session('success'))
        <div class="alert alert-success alert-dismissable fade show" role="alert">
        <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissable fade show" role="alert">
                        <strong>{{ $error }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
        @endif
        <div class="form-layout">
            <form action="{{ route('customers.index') }}" method="post" role="form">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Ad : </label>
                        <input type="text" class="form-control" name="name"
                        @error('name')
                        is-invalid
                        @enderror placeholder="İsim yazınız" value="{{ old('name') }}"><br>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="">Soyad : </label>
                        <input type="text" class="form-control" name="surname"
                        @error('surname')
                        is-invalid
                        @enderror placeholder="Soyisim yazınız" value="{{ old('surname') }}"><br>
                        @error('surname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="">Email adres : </label>
                        <input type="email" class="form-control" name="email"
                        @error('email')
                        is-invalid
                        @enderror placeholder="Email yazınız" value="{{ old('email') }}"><br>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="">Şifre : </label>
                        <input type="password" class="form-control" name="password"
                        @error('password')
                        is-invalid
                        @enderror placeholder="Şifre yazınız" value="{{ old('password') }}"><br>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="">Telefon numarası : </label>
                        <input type="text" class="form-control" name="phone"
                        @error('phone')
                        is-invalid
                        @enderror placeholder="Telefon numarası yazınız" value="{{ old('phone') }}"><br>
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="">Adresi : </label>
                        <textarea class="form-control" name="address" id="" @error('address')
                        is-invalid
                        @enderror placeholder="Adres yazınız" cols="30" rows="10">{{ old('address') }}</textarea>
                        <br>
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <button type="submit" class="btn btn-info">Güncelle</button>
            </form>
        </div><!-- form-layout -->
      </div><!-- card -->

  </div>
@endsection

@section('footer')
    @parent
@endsection

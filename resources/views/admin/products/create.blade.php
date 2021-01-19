@extends('admin-layouts.app')

@section('title', 'Ürün Oluştur')

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
        <h5>Ürün Oluştur</h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">

        <div class="form-layout">
            <form action="{{ route('products.store') }}" method="post" role="form">
                @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Ad : </label>
                            <input type="text" class="form-control" name="name"
                            @error('name')
                            is-invalid
                            @enderror placeholder="İsim yazınız" value=""><br>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="">Kategori : </label>
                            <select class="form-control" name="" id="">
                                <option value="">---Kategori seçiniz---</option>
                                <option value=""></option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="">Alt kategori : </label>
                            <select class="form-control" name="" id="">
                                <option value="">---Alt Kategori seçiniz---</option>
                                <option value=""></option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="">Boyut : </label>
                            <select class="form-control" name="" id="">
                                <option value="">---Alt Kategori seçiniz---</option>
                                <option value=""></option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="">Renk : </label>
                            <select class="form-control" name="" id="">
                                <option value="">---Renk seçiniz---</option>
                                <option value=""></option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="">Ücret : </label>
                            <input type="number" class="form-control" name="price"
                            @error('price')
                            is-invalid
                            @enderror placeholder="Ücret yazınız" value=""><br>
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="">Açıklama : </label>
                            <input type="text" class="form-control" name="description"
                            @error('description')
                            is-invalid
                            @enderror placeholder="Açıklama yazınz" value=""><br>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="">Miktarı : </label>
                            <input type="number" class="form-control" name="quantity"
                            @error('quantity')
                            is-invalid
                            @enderror placeholder="Miktar yazınız" value=""><br>
                            @error('quantity')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="">Görsel-1 : </label>
                            <input type="file" class="form-control" name="image_1"
                            @error('image_1')
                            is-invalid
                            @enderror placeholder="İsim yazınız" value=""><br>
                            @error('image_1')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="">Görsel-2 : </label>
                            <img src="{{ asset('storage/product-images}" width="200" alt="">
                            <input type="file" class="form-control" name="image_2"
                            @error('image_2')
                            is-invalid
                            @enderror placeholder="İsim yazınız" value=""><br>
                            @error('image_2')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="">Görsel-3 : </label>
                            <img src="{{ asset('storage/product-images}" width="200" alt="">
                            <input type="file" class="form-control" name="image_3"
                            @error('image_3')
                            is-invalid
                            @enderror placeholder="İsim yazınız" value=""><br>
                            @error('image_3')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="">Stok durumu : </label>
                            <input type="text" class="form-control" name="status"
                            @error('status')
                            is-invalid
                            @enderror placeholder="İsim yazınız" value=""><br>
                            @error('status')
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

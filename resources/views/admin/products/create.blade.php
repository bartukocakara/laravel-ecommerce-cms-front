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
        @if($errors->any())
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
            <form action="{{ route('products.store') }}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <input type="hidden" name="stock_status" value="1">
                        <div class="col-md-6">
                            <label for="">Ad : </label>
                            <input type="text" class="form-control" name="name"
                             placeholder="İsim yazınız" value=""><br>
                        </div>

                        <div class="col-md-6">
                            <label for="">Kategori : </label>
                            <select class="form-control" name="category_id" value="{{ old('category_id') }}" id="">
                                <option value="">---Kategori seçiniz---</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="">Alt kategori : </label>
                            <select class="form-control" name="sub_category_id" value="{{ old('sub_category_id') }}" id="">
                                <option value="">---Alt Kategori seçiniz---</option>
                                @foreach ($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="">Beden : </label>
                            <select class="form-control" name="size" value="{{ old('sub_category_id') }}" id="">
                                <option value="">---Beden seçiniz---</option>
                                @foreach ($sizes as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="">Renk : </label>
                            <select class="form-control" name="color" id="">
                                <option value="">---Renk seçiniz---</option>
                                @foreach ($colors as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="">Ücret : </label>
                            <input type="number" class="form-control" name="price"
                            placeholder="Ücret yazınız" value="{{ old('price') }}"><br>
                        </div>

                        <div class="col-md-6">
                            <label for="">Açıklama : </label>
                            <input type="text" class="form-control" name="description"
                             placeholder="Açıklama yazınz" value="{{ old('description') }}"><br>

                        </div>

                        <div class="col-md-6">
                            <label for="">Miktarı : </label>
                            <input type="number" class="form-control" name="quantity"
                           placeholder="Miktar yazınız" value="{{ old('quantity') }}"><br>

                        </div>

                        <div class="col-md-6">
                            <label for="">Görsel-1 : </label>
                            <input type="file" class="form-control" name="image_1"
                             placeholder="İsim yazınız" value=""><br>

                        </div>

                        <div class="col-md-6">
                            <label for="">Görsel-2 : </label>
                            <input type="file" class="form-control" name="image_2"
                             placeholder="İsim yazınız" value=""><br>

                        </div>

                        <div class="col-md-6">
                            <label for="">Görsel-3 : </label>
                            <input type="file" class="form-control" name="image_3"
                            placeholder="İsim yazınız" value=""><br>

                        </div>

                    </div>
                <button type="submit" class="btn btn-info">Oluştur</button>
            </form>
        </div><!-- form-layout -->
      </div><!-- card -->

  </div>
@endsection

@section('footer')
    @parent
@endsection

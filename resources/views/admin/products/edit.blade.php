@extends('admin-layouts.app')

@section('title', 'Ürün Düzenle')

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
                    <div class="card-header mb-4">Ürün Düzenle</div>
                    <div class="body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('products.update', $product->id) }}" method="post" role="form">
                            @csrf
                            @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Ad : </label>
                                        <input type="text" class="form-control" name="name"
                                        @error('name')
                                        is-invalid
                                        @enderror placeholder="İsim yazınız" value="{{ $product->name }}"><br>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Kategori : </label>
                                        <select class="form-control" name="" id="">
                                            <option value="">---Kategori seçiniz---</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Alt kategori : </label>
                                        <select class="form-control" name="" id="">
                                            <option value="">---Alt Kategori seçiniz---</option>
                                            @foreach ($subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Beden : </label>
                                        <select class="form-control" name="size" id="">
                                            <option value="">---Beden seçiniz---</option>
                                            @foreach ($sizes as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Renk : </label>
                                        <select class="form-control" name="" id="">
                                            <option value="">---Renk seçiniz---</option>
                                            @foreach ($colors as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Ücret : </label>
                                        <input type="number" class="form-control" name="price"
                                        @error('price')
                                        is-invalid
                                        @enderror placeholder="Ücret yazınız" value="{{ $product->price }}"><br>
                                        @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Açıklama : </label>
                                        <input type="text" class="form-control" name="description"
                                        @error('description')
                                        is-invalid
                                        @enderror placeholder="Açıklama yazınz" value="{{ $product->description }}"><br>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Miktarı : </label>
                                        <input type="number" class="form-control" name="quantity"
                                        @error('quantity')
                                        is-invalid
                                        @enderror placeholder="Miktar yazınız" value="{{ $product->quantity }}"><br>
                                        @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Görsel-1 : </label>
                                        <img src="{{ asset('storage/product-images/'.$product->image_1) }}" width="200" alt="">
                                        <input type="file" class="form-control" name="image_1"
                                        @error('image_1')
                                        is-invalid
                                        @enderror placeholder="İsim yazınız" value="{{ $product->image_1 }}"><br>
                                        @error('image_1')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Görsel-2 : </label>
                                        <img src="{{ asset('storage/product-images/'.$product->image_2) }}" width="200" alt="">
                                        <input type="file" class="form-control" name="image_2"
                                        @error('image_2')
                                        is-invalid
                                        @enderror placeholder="İsim yazınız" value="{{ $product->image_2 }}"><br>
                                        @error('image_2')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Görsel-3 : </label>
                                        <img src="{{ asset('storage/product-images/'.$product->image_3) }}" width="200" alt="">
                                        <input type="file" class="form-control" name="image_3"
                                        @error('image_3')
                                        is-invalid
                                        @enderror placeholder="İsim yazınız" value="{{ $product->image_3 }}"><br>
                                        @error('image_3')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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

@extends('admin-layouts.app')

@section('title', 'Ürünler')

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
                    <h3 class="card-body-title">Ürünler</h3>
                    <a href="{{ route('products.create') }}" style="width:200px" class="btn btn-success">Yeni Ürün Ekle +</a>
                    @if (session('success'))
                            <div class="alert alert-success alert-dismissable fade show m-2" role="alert">
                            <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    @endif
                    @if (session('proUpdated'))
                            <div class="alert alert-success alert-dismissable fade show m-2" role="alert">
                            <strong>{{ session('proUpdated') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    @endif
                    @if (session('proDeleted'))
                            <div class="alert alert-success alert-dismissable fade show m-2" role="alert">
                            <strong>{{ session('proDeleted') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    @endif
                    <div class="table-wrapper">
                    <table id="datatable1" class="table display table-bordered responsive nowrap">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Görsel</th>
                                <th>Ad</th>
                                <th>Ücret</th>
                                <th>Miktar</th>
                                <th>Stok Durumu</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><img src="{{ asset('storage/product-images/'.$product->image_1) }}" width="100" alt=""></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ number_format($product->price,2) }} TRY</td>
                                <td class="quantity">{{ $product->quantity }}</td>
                                <td id="stockStatus {{ $i++ }}">

                                    @foreach ($stock_status as $key => $value)
                                        @if ($product->stock_status == $key)
                                        <span id="newstatus"> {{ $value }} </span>
                                        @endif
                                    @endforeach
                                    <select class="form-control s-change h-25 float-right" name="status" id="s-change">
                                        @foreach ($stock_status as $key => $value)
                                            <option @if($product->stock_status == $key) selected @endif value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" id="idChangeProductStatus">
                                    <input type="hidden" value="{{ route('admin.change-product-status') }}" id="urlChangeProductStatus">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-success mr-1"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="post" role="form" class="mr-3">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete-data"><i class="icon ion-trash-b"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>

                    </table>

                    </div><!-- table-wrapper -->
                </div><!-- card -->
            </div>
        </div>
    </div><!-- sl-pagebody -->

  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

@endsection

@section('footer')
    @parent
@endsection

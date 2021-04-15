@extends('admin-layouts.app')

@section('title', 'Alt Kategoriler')

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
                    <h3 class="card-body-title">Alt Kategoriler</h3>
                    @if (session('subCatUpdated'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong>{{ session('subCatUpdated') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    @endif
                    @if (session('subCatDeleted'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong>{{ session('subCatDeleted') }}</strong>
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
                                <th>Adı</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($subCategories as $subCategory)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $subCategory->name }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('sub-categories.edit', $subCategory->id) }}" class="btn btn-sm btn-success mr-1"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('sub-categories.destroy', $subCategory->id) }}" method="post" role="form" class="mr-3">
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
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="card-header">Yeni Kategori Ekle</div>
                    <div class="body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @elseif($errors->any())
                            <h4 class="text-danger"> {{ implode('', $errors->all(':message')) }} </h4>
                        @endif
                        <form action="{{ route('sub-categories.store') }}" method="post" role="form">
                            @csrf
                            <label for="">Alt kategori adı : </label>
                            <input type="text" class="form-control" name="name" placeholder="İsim yazınız"><br>
                            <button type="submit" class="btn btn-info">Kaydet</button>
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

@extends('admin-layouts.app')

@section('title', 'Kategoriler')

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
                    <h3 class="card-body-title">Kategoriler</h3>
                    @if (session('catUpdated'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong>{{ session('catUpdated') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    @endif
                    @if (session('catDeleted'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong>{{ session('catDeleted') }}</strong>
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
                                <th>Ana kategorisi</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if ($category->parent_id ==1)
                                        Kadın
                                    @elseif($category->parent_id ==2)
                                        Erkek
                                    @else

                                    @endif
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="post" role="form" class="mr-3">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="confirm('Silmek istiyor musunuz ?')"><i class="icon ion-trash-b"></i></button>
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
                <div class="card">
                    <div class="card-header">Yeni Kategori Ekle</div>
                    <div class="body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('categories.store') }}" method="post" role="form">
                            @csrf
                            <label for="">Kategori adı : </label>
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

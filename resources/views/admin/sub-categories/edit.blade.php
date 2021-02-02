@extends('admin-layouts.app')

@section('title', 'Alt kategori Düzenle')

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
                    <div class="card-header">Kategori Düzenle</div>
                    <div class="body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('categories.update', $category->id) }}" method="post" role="form">
                            @csrf
                            @method('PUT')
                            <label for="">Ana kategori :  </label>
                            @if ($category->parent_id != 0)
                            <select class="form-control" name="parent_id" id="">
                                <option value="1">Kadın</option>
                                <option value="2">Erkek</option>
                            </select>
                            @else
                            <select class="form-control" name="parent_id" id="" disabled>
                            </select>
                            @endif

                            <label for="">Kategori adı :  </label>
                            <input type="text" class="form-control" name="name" @error('name') is-invalid @enderror placeholder="İsim yazınız" value="{{ $category->name }}"><br>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
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

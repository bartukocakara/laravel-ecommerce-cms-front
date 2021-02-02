@extends('admin-layouts.app')

@section('title', 'Müşteriler')

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
                    <h3 class="card-body-title">Müşteriler</h3>
                    <a href="{{ route('customers.create') }}" style="width:200px" class="btn btn-success">Yeni Müşteri Ekle</a>
                    @if (session('cusUpdated'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong>{{ session('cusUpdated') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    @endif
                    @if (session('cusDeleted'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong>{{ session('cusDeleted') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    @endif
                    @if (session('cusActive'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong>{{ session('cusActive') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    @endif
                    @if (session('cusInactive'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong>{{ session('cusInactive') }}</strong>
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
                                <th>Ad</th>
                                <th>Soyad</th>
                                <th>Email</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->surname }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="post" role="form" class="mr-3">
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

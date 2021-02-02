@extends('admin-layouts.app')

@section('title', 'Siparişler')

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
                    <h3 class="card-body-title">Siparişler</h3>
                    <a href="{{ route('orders.create') }}" style="width:200px" class="btn btn-success">Yeni Sipariş Ekle +</a>
                    @if (session('ordUpdated'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong>{{ session('ordUpdated') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    @endif
                    @if (session('ordDeleted'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong>{{ session('ordDeleted') }}</strong>
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
                                <th>Sipariş Kodu</th>
                                <th>Müşteri Adı</th>
                                <th>Şehir</th>
                                <th>Toplam Ücret</th>
                                <th>Sipariş durumu</th>
                                <th>İşlemler </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $order->order_code }}</td>
                                <td>{{ $order->customer_id }}</td>
                                <td>{{ $order->city }}</td>
                                <td>{{ $order->sub_total }} TRY</td>
                                <td>
                                @foreach ($order_status as $key => $value)
                                    @if ($order->status == $key)
                                    {{ $value }}
                                    @endif
                                @endforeach
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="post" role="form" class="mr-3">
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

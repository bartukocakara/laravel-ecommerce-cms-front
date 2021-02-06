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
                    {{-- <a href="{{ route('orders.create') }}" style="width:200px" class="btn btn-success">Yeni Sipariş Ekle +</a> --}}
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
                                $i = 0;
                            @endphp
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->order_code }}</td>
                                <td>{{ $order->customer->name }}</td>
                                <td>{{ $order->city->name }}</td>
                                <td>{{ $order->sub_total }} TRY</td>
                                <td id="orderStatus {{ $i++ }}">

                                    @foreach ($order_status as $key => $value)
                                        @if ($order->status == $key)
                                        <span id="newstatus">{{ $value }}</span>
                                        @endif
                                    @endforeach

                                    <select class="form-control w-change h-25 d-inline float-right" name="status" id="w-change">
                                        @foreach ($order_status as $key => $value)
                                            <option @if( $order->status == $key) selected @endif value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @csrf
                                    <input type="hidden" value="{{ $order->id }}" id="idChangeStatus">
                                    <input type="hidden" value="{{ route('admin.change-status') }}" id="urlChangeStatus">
                                    <input type="hidden" value="{{ $order->customer->email }}" id="email">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-success mr-1"><i class="fa fa-eye"></i></a>
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

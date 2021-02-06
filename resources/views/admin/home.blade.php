@extends('admin-layouts.app')

@section('title', 'Ana Sayfa')

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
            <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 bg-primary">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Aylık Satışlar</h6>
                            </div><!-- card-header -->
                        <div class="d-flex align-items-center justify-content-between">
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ $monthlyOrders }} TRY</h3>
                        </div><!-- card-body -->
                        <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                </div><!-- -->
            </div><!-- card -->
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="card pd-20 bg-info">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                    <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Yıllık Satışlar</h6>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ $yearlyOrders }} TRY</h3>
                </div><!-- card-body -->
                <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                    <div>
                    </div>
                </div><!-- -->
            </div><!-- card -->
        </div><!-- row -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="card pd-20 bg-info">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                    <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">İptal Olan Siparişler</h6>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ $canceledOrders }} TRY</h3>
                </div><!-- card-body -->
                <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                    <div>
                    </div>
                </div><!-- -->
            </div><!-- card -->
        </div><!-- row -->


      </div><!-- sl-pagebody -->
    </div>
@endsection

@section('footer')
    @parent
@endsection

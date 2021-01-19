@extends('admin-layouts.app')

@section('title', 'Mesaj Görüntüle')

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
                <div class="card">
                    <div class="card-header">Mesaj Görüntüle</div>
                    <div class="body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="" method="post" role="form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Gönderen :  </label>
                                    <input class="form-control" type="text" value="{{ $message->name }}" disabled >
                                </div>
                                <div class="col-md-6">
                                    <label for="">Başlığı :  </label>
                                    <input class="form-control" type="text" value="{{ $message->title }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="">İçerik :  </label>
                                    <textarea class="form-control" name="" id="" cols="30" rows="10" disabled>{{ $message->content }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Türü :  </label>
                                    <input class="form-control" type="text" value="{{ $message->type }}" disabled>
                                </div>
                            </div>
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

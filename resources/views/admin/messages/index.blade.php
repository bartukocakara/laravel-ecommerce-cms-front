@extends('admin-layouts.app')

@section('title', 'Mesajlar')

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
                    <h3 class="card-body-title">Mesajlar</h3>
                    @if (session('mesDeleted'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                            <strong>{{ session('mesDeleted') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    @endif
                    <div class="table-wrapper">
                    <table id="datatable" class="table display table-bordered responsive nowrap">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Gönderen</th>
                                <th>Başlık</th>
                                <th>Türü</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($messages as $message)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->title }}</td>
                                <td>
                                    @foreach ($types as $key => $value)
                                    @if ($message->type == $key)
                                        {{ $value }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    <div class="btn-group">
                                        @if ($message->status == 'UNREAD')
                                        <a href="{{ route('messages.show', $message->id) }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                        @else
                                        <a href="{{ route('messages.show', $message->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-eye-slash"></i></a>

                                        @endif
                                        <form action="{{ route('messages.destroy', $message->id) }}" method="post" role="form" class="mr-3">
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

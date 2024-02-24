@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <h2 class="mb-1">Data Enrolments</h2>
                    <a class="btn mb-1 btn-primary text-white" href="{{route('enrolments.create')}}">Tambah <span class="btn-icon-right"><i class="fa fa-plus"></i></span></a>
                </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Deskripsi</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($enrol as $a => $item)
                                <tr>
                                    <td>{{$a+1}}</td>
                                    <td>{{$item->username}}</td>
                                    <td>
                                            <span class="badge badge-primary">{{ $item->role_name }}</span> 
                                    </td>
                                    <td>
                                        {{ $item->description }} </td>
                                    <td>
                                        {{-- <a href="/enrolments/{{$item->id}}" class="btn mb-1 btn-rounded btn-outline-info">Detail</a> --}}
                                        <form method="POST" action="{{ route('enrolments.delete', $item->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <a href="/enrolments/{{$item->id}}/edit" class="btn mb-1 btn-rounded btn-outline-warning">Edit</a>
                                            <button type="submit" class="btn mb-1 btn-rounded btn-outline-danger show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                    
                                @empty
                                    
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection



@push('style')
    <link href="{{asset('theme/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('theme/plugins/sweetalert/css/sweetalert.css')}}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{asset('theme/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('theme/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('theme/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
    <script src="{{asset('theme/plugins/sweetalert/js/sweetalert.min.js')}}"></script>
    <script>
        $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
            title: "Are you sure to delete ?",
            text: "Ini akan menghapus Enrolments tersebut!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it !!",
            cancelButtonText: "No, cancel it !!",
            closeOnConfirm: !1,
            closeOnCancel: !1
            }, function(e) {
                e ? form.submit() : swal("Cancelled !!", "Hey, mantap !!", "error")
            }) 
      });
    </script>
@endpush
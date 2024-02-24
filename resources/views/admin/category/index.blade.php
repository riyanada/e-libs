@extends('layout.master')
@section('content')

{{-- modal add category --}}
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategory" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="categoryInput">Category</label>
                        <input type="text" name="name" class="form-control" id="categoryInput"
                            aria-describedby="categoryInput" placeholder="Enter Category">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

@if(isset($edit))
@push('scripts')
<script>
    $('#editcategory').modal('show');
</script>
@endpush

{{-- modal edit category --}}
<div class="modal fade" id="editcategory" tabindex="-1" role="dialog" aria-labelledby="exampleeditcategory"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.update', $category_old_id ) }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="categoryInput">Category</label>
                        <input type="text" name="name" class="form-control" id="categoryInput"
                            aria-describedby="categoryInput" placeholder="Enter Category"
                            value="{{ $category_old->name }}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <h2 class="mb-1">Books Category</h2>
                    <button type="button" class="btn mb-1 btn-primary text-white" data-toggle="modal"
                        data-target="#addCategory">
                        Tambah <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                    </button>


                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Total Books</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @forelse ($categories as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->books->count() }}</td>
                                {{-- <a href="/enrolments/{{$item->id}}"
                                    class="btn mb-1 btn-rounded btn-outline-info">Detail</a> --}}
                                <td>
                                    <form method="POST" action="{{ route('categories.delete', $item->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <a href="/categories/{{$item->id}}/edit"
                                            class="btn mb-1 btn-rounded btn-outline-warning">Edit</a>
                                        <button type="submit"
                                            class="btn mb-1 btn-rounded btn-outline-danger show_confirm"
                                            data-toggle="tooltip" title='Delete'>Delete</button>
                                    </form>
                                </td>
                            </tr>
                            {{-- @endforeach --}}

                            @empty

                            @endforelse
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
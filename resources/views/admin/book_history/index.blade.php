@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3>Book History</h3>
                </div><br>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>User</th>
                                <th>Book</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach($book_histories as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->book->title }}</td>
                                <td>{{ $item->action }}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('style')
<link href="{{asset('theme/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{asset('theme/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('theme/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('theme/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
@endpush
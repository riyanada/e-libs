@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3>Detail Role {{$role->name}}</h3>
                    <a class="btn mb-1 btn-primary btn-xm text-white" href="{{route('role.index')}}">Kembali <span class="btn-icon-right"><i class="fa fa-arrow-left"></i></span></a>
                </div><br>
                <hr>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Nama
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="iname" value="{{$role->name}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Code
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="icode" value="{{$role->code}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Deskripsi
                    </label>
                    <div class="col-lg-6">
                        <textarea class="form-control" name="idescription" rows="5" disabled>{{$role->description}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
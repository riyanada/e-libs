@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <h3 class="mb-1">Update Data Role</h3>
                </div><br><br>
                <div class="form-validation">
                    <form class="form-valide" action="/role/{{$role->id}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nama <span class="text-danger" >*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="iname" placeholder="Enter a role.." value="{{$role->name}}">
                                @error('iname')
                                    <span id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Code <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="icode" placeholder="Enter a code role.." value="{{$role->code}}">
                                @error('icode')
                                    <span id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Deskripsi <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <textarea class="form-control" name="idescription" rows="5" placeholder="Description a Role">{{$role->description}}</textarea>
                                @error('idescription')
                                    <span id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('role.index')}}" class="btn btn-light">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
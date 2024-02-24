@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <h3 class="mb-1">Create Role</h3>
                </div><br><br>
                <div class="form-validation">
                    <form class="form-valide" action="{{route('role.store')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nama <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="iname" value="{{ old('iname') }}" placeholder="Enter a role..">
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
                                <input type="text" class="form-control" name="icode" value="{{ old('iname') }}" placeholder="Enter a code role..">
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
                                <textarea class="form-control" name="idescription" value="{{ old('iname') }}" rows="5" placeholder="Description a Role"></textarea>
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
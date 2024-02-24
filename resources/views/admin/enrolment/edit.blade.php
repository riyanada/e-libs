@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <h3 class="mb-1">Update Enrolments</h3>
                </div><br><br>
                <div class="form-validation">
                    <form class="form-valide" action="{{ route('enrolments.update', $enrol->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Username <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" name="iname">
                                    <option value="">Please select</option>
                                    @foreach ($user as $a)
                                    <option value="{{$a->id}}" {{ $a->id == $enrol->users_id ? "selected" : "" }}>{{$a->name}}</option>
                                    @endforeach
                                </select>
                                @error('iname')
                                    <span id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Role <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" name="irole">
                                    <option value="">Please select</option>
                                    @foreach ($role as $b)
                                    <option value="{{$b->id}}" {{ $b->id == $enrol->role_id ? "selected" : "" }} >{{$b->name}}</option>
                                    @endforeach
                                </select>
                                @error('irole')
                                    <span id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('enrolments.index')}}" class="btn btn-light">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
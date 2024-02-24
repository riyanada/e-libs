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
                    <form class="form-valide" action="{{route('users.store')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Username <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-8">
                                <input id="name" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus placeholder="Username">

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Email <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Password <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Confirm Password <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nama <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">No Telp <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-8">
                                <input id="name" type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ old('no_telp') }}" required autocomplete="+62" autofocus placeholder="No Telp">

                                @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Alamat <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('iname') }}" rows="5" placeholder="Alamat Rumah"></textarea>
                                @error('idescription')
                                    <span id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Role <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-8">
                                <select class="form-control" name="role">
                                    <option value="">Please select</option>
                                    @foreach ($role as $b)
                                    <option value="{{$b->id}}">{{$b->name}}</option>
                                    @endforeach
                                </select>
                                @error('irole')
                                    <span id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('users.index')}}" class="btn btn-light">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
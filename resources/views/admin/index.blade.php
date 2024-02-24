@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1">
            <div class="card-body">
                <h3 class="card-title text-white">Categori</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{$totalCategory}}</h2>
                    <p class="text-white mb-0"></p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-bookmark"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-2">
            <div class="card-body">
                <h3 class="card-title text-white">Total Buku</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{$totalBooks}}</h2>
                    <p class="text-white mb-0"></p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-book"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-4">
            <div class="card-body">
                <h3 class="card-title text-white">Buku yang Terbaca</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">99%</h2>
                    <p class="text-white mb-0"></p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-list-alt"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-3">
            <div class="card-body">
                <h3 class="card-title text-white">Anggota</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{$totalUser}}</h2>
                    <p class="text-white mb-0"></p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3>Selamat Datang Admin {{$user->name}}</h3>
            </div>
        </div>
    </div>
</div>
@endsection
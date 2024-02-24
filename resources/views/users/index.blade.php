@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1>Selamat Datang {{$user->name}}</h1>
            </div>
        </div>
    </div>
</div>
<h2>Hot List E-Book</h2>
<div class="row">
@forelse ($books as $item)
    <div class="col-md-8 col-lg-4">
        <div class="card">
            <img src="{{asset('images/')}}/{{$item->thumbnail}}" class="img-fluid" style="height: 30%" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$item->title}}</h5>
                <p class="card-text">{!!Str::limit($item->abstrak, 160)!!}</p>
            </div>
            <div class="card-footer">
                <p class="card-text d-inline"><small class="text-muted">Last updated {{$item->created_at->diffForHumans()}}</small>
                </p><a href="{{route('books.show', $item->id)}}" class="card-link float-right"><small>Lanjut Baca</small></a>
            </div>
        </div>
    </div>
@empty
    <h2>Belum ada E- Book</h2>
@endforelse
</div>    
@endsection
@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1>Selamat Datang {{$user->name}} {{Auth::user()->alamat}}</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Asperiores repellendus molestiae exercitationem voluptatem tempora quo dolore nostrum dolor consequuntur itaque, alias fugit. Architecto rerum animi velit, beatae corrupti quos nam saepe asperiores aliquid quae culpa ea reiciendis ipsam numquam laborum aperiam. Id tempore consequuntur velit vitae corporis, aspernatur praesentium ratione!</p>
            </div>
        </div>
    </div>
</div>
@endsection
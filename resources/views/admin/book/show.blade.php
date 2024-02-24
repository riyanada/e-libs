@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3>Detail Books {{$book->name}}</h3>
                    <a class="btn mb-1 btn-primary btn-xm text-white" href="{{route('books.index')}}">Kembali <span
                            class="btn-icon-right"><i class="fa fa-arrow-left"></i></span></a>
                </div><br>
                <hr>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Title
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="iname" value="{{$book->title}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Author
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="icode" value="{{$book->author}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Tahun Terbit
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="icode" value="{{$book->tahun_terbit}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Penerbit
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="icode" value="{{$book->penerbit}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Abstrak
                    </label>
                    <div class="col-lg-6">
                        {{-- <input class="form-control" name="idescription" rows="5" value="{!!
                            $book->abstrak !!}" disabled> --}}
                        <p>{!! $book->abstrak !!}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Thumbnail
                    </label>
                    <div class="col-lg-6">
                        <img src="{{asset('images/')}}/{{$book->thumbnail}}" class="img-thumbnail" alt="...">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Category
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="icode" value="{{$book->categories->name}}"
                            disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3>Lihat Buku</h3>
                </div><br>
                <div class="form-group row">
                    <embed src="{{asset('ebook/')}}/{{$book->file_ebook}}#toolbar=0&navpanes=0&scrollbar=0" width="100%" height="1000px">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
    $('#summernote').summernote();
});
</script>
@endpush
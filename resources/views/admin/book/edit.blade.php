@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <h3 class="mb-1">Edit Books Data</h3>
                </div><br><br>

                {{-- all error notivication --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="form-validation">
                    <form class="form-valide" action="{{ route('books.update', $books->id) }}" method="post"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Title <span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input class="form-control" name="title" type="text" value="{{ $books->title }}"
                                    placeholder="Input yout title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Author<span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input class="form-control" name="author" type="text" value="{{ $books->author }}"
                                    placeholder="Input Author">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Tahun Terbit<span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input class="date-own form-control" id="year" name="tahun_terbit"
                                    value="{{ $books->tahun_terbit }}" type="text" placeholder="Input Tahun Terbit">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Penerbit<span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input class="form-control" name="penerbit" type="text" value="{{ $books->penerbit }}"
                                    placeholder="Input Penerbit">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Abstrak<span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <textarea id="summernote" class="form-control" name="abstrak" type="text"
                                    placeholder="Input Abstrak">{{ $books->abstrak }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Thumbnail<span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="hidden" name="oldThumbnail" value="{{ $books->thumbnail }}">
                                <input type="file" name="thumbnail" class="dropify"
                                    data-default-file="/images/{{ $books->thumbnail }}" data-height="300" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Thumbnail<span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="hidden" name="oldEbook" value="{{ $books->file_ebook }}">
                                <input type="file" name="ebook" class="dropify"
                                    data-default-file="/ebook/{{ $books->file_ebook }}" data-height="300" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Category<span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" name="categories_id">
                                    {{-- default id category --}}
                                    <option value="{{ $books->categories_id }}">{{ $books->categories->name }}</option>
                                    {{-- looping category --}}
                                    @foreach ($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
    integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.dropify').dropify();
</script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
    $('#summernote').summernote();
});
</script>
@endpush

@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
    integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
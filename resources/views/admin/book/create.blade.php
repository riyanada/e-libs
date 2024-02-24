@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body pb-0 d-flex justify-content-between">
                    <h3 class="mb-1">Create Books Data</h3>
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
                    <form class="form-valide" action="{{route('books.store')}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Title <span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input class="form-control" name="title" value="{{ old('title') }}" type="text" placeholder="Input yout title">
                                @error('title')
                                <span id="val-username-error" class="invalid-feedback animated fadeInDown"
                                    style="display: block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Author<span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input class="form-control" name="author" value="{{ old('author') }}" type="text" placeholder="Input Author">
                                @error('author')
                                <span id="val-username-error" class="invalid-feedback animated fadeInDown"
                                    style="display: block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Tahun Terbit<span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input class="date-own form-control" id="year" value="{{ old('tahun_terbit') }}" name="tahun_terbit" type="text"
                                    placeholder="Input Tahun Terbit">
                                @error('tahun_terbit')
                                <span id="val-username-error" class="invalid-feedback animated fadeInDown"
                                    style="display: block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Penerbit<span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input class="form-control" name="penerbit" type="text" value="{{ old('penerbit') }}" placeholder="Input Penerbit">
                                @error('penerbit')
                                <span id="val-username-error" class="invalid-feedback animated fadeInDown"
                                    style="display: block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Abstrak<span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <textarea id="summernote" class="form-control" name="abstrak" type="text"
                                    placeholder="Input Abstrak">{{ old('username') }}</textarea>
                                @error('abstrak')
                                <span id="val-username-error" class="invalid-feedback animated fadeInDown"
                                    style="display: block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Thumbnail<span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="file" name="thumbnail" class="dropify" data-height="300" />
                                @error('thumbnail')
                                <span id="val-username-error" class="invalid-feedback animated fadeInDown"
                                    style="display: block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Ebook<span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="file" name="ebook" class="dropify" data-height="300" />
                                @error('ebook')
                                <span id="val-username-error" class="invalid-feedback animated fadeInDown"
                                    style="display: block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Category<span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" name="categories_id">
                                    <option value="">Please select</option>
                                    @foreach ($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <span id="val-username-error" class="invalid-feedback animated fadeInDown"
                                    style="display: block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
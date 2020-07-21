@extends('template_backend/home')
@section('sub-judul', 'Add Post')
@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Judul</label>
                    <input type="text" class="form-control form-control-sm @error('judul') is-invalid @enderror" value="{{ old('judul') }}" name="judul">
                        @error('judul')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control form-control-sm @error('category_id') is-invalid @enderror">
                            <option selected disabled>-- Choise Category--</option>
                            @foreach ($category as $result)
                                <option value="{{ $result->id }}" {{ (collect(old('category_id'))->contains($result->id)) ? 'selected':'' }} >{{ $result->name }}</option> 
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control form-control-sm @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                        @error('content')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tag</label>
                        <select name="tags[]" class="form-control select2" multiple="">
                            @foreach ($tags as $result)
                                <option value="{{ $result->id }}" {{in_array($result->id, old("tags") ?: []) ? "selected": ""}}>{{ $result->name }}</option> 
                            @endforeach
                        </select>
                        @error('tag_id')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Thumnail</label>
                        <input type="file" class="form-control form-control-sm @error('gambar') is-invalid @enderror" name="gambar">
                        @error('gambar')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
        CKEDITOR.replace( 'content' );
</script>
@endsection

@extends('template_backend/home')
@section('sub-judul', 'Update Category')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('category.update', $category->id )}}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}">
                        @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

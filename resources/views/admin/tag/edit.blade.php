@extends('template_backend/home')
@section('sub-judul', 'Update Tag')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('tag.update', $tags->id )}}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>Tag</label>
                        <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ $tags->name }}">
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

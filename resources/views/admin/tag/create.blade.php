@extends('template_backend/home')
@section('sub-judul', 'Add Tag')
@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('tag.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tag</label>
                        <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name">
                        @error('name')
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

@endsection

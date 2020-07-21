@extends('template_backend/home')
@section('sub-judul', 'Update User')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>Name</label>
                    <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" value="{{  $user->name }}" name="name">
                        @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" value="{{ $user->email }}" name="email">
                        @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select name="type" class="form-control @error('type') is-invalid @enderror">
                            <option disabled selected>--Choise Type--</option>
                            <option value="1" @if ($user->type == '1') {{ 'selected' }} @endif>Admin</option>
                            <option value="0" @if ($user->type == '0') {{ 'selected' }} @endif>Penulis</option>
                        </select>
                        @error('type')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password">
                        @error('password')
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

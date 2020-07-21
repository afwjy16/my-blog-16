@extends('template_backend/home')
@section('sub-judul', 'Users')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Users
            </div>
            <div class="card-body">
                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary float-right my-3"><i class="fa fa-plus"></i> Add User</a>
                @include('admin/partial/message')
                @include('admin/user/table')
            </div>
        </div>
    </div>
</div>

@endsection

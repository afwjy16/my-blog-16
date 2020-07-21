@extends('template_backend/home')
@section('sub-judul', 'Post')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Post
            </div>
            <div class="card-body">
                <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary float-right my-3"><i class="fa fa-plus"></i> Add Post</a>
                @include('admin/partial/message')
                <div class="table-responsive">
                    @include('admin/post/table')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

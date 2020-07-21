@extends('template_backend/home')
@section('sub-judul', 'Tags')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Tags
            </div>
            <div class="card-body">
                <a href="{{ route('tag.create') }}" class="btn btn-sm btn-primary float-right my-3"><i class="fa fa-plus"></i> Add Tags</a>
                @include('admin/partial/message')
                @include('admin/tag/table')
            </div>
        </div>
    </div>
</div>

@endsection

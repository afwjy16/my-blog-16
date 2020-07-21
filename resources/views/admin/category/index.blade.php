@extends('template_backend/home')
@section('sub-judul', 'Category')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Category
            </div>
            <div class="card-body">
                <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary float-right my-3"><i class="fa fa-plus"></i> Add Category</a>
                @include('admin/partial/message')
                @include('admin/category/table')
            </div>
        </div>
    </div>
</div>

@endsection

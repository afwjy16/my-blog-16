@extends('template_backend/home')
@section('sub-judul', 'Trash Post')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Trash Post
            </div>
            <div class="card-body">
                @include('admin/partial/message')
                <table class="table table-sm table-bordered table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Category</th>
                            <th>Daftar Tag</th>
                            <th>Seo</th>
                            <th>Thumbnail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $result => $hasil)
                        <tr>
                            <td>{{ $result + $post->firstitem() }}</td>
                            <td>{{ $hasil->judul }}</td>
                            <td>{{ $hasil->category->name }}</td>
                            <td>
                                @foreach ($hasil->tags as $tag)
                                <ul>
                                    <li style="list-style: none;"><h6><span class="badge badge-sm badge-info">{{ $tag->name }}</span></h6></li>
                                </ul>
                                @endforeach
                            </td>
                            <td>{{ $hasil->users->name }}</td>
                            <td><img src="{{ asset($hasil->gambar) }}" class="rounded" width="55"  alt="{{ $hasil->judul }}"> </td>
                            <td>
                                <form action="{{ route('post.kill', $hasil->id) }}" method="POST">
                                    <a href="{{ route('post.restore', $hasil->id) }}" class="btn btn-sm btn-success"><i class="fa fa-spinner"></i></a>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $post->links() }}
            </div>
        </div>
    </div>
</div>

@endsection


<table class="table table-sm table-bordered table-striped table-hover ">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Category</th>
            <th>Daftar Tag</th>
            <th>Seo</th>
            <th>Thumbnail</th>
            <th>Publish</th>
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
                @if($hasil->is_publish)
                <h6><span class="badge badge-sm badge-secondary">Publish</span></h6>
                @else 
                <h6><span class="badge badge-sm badge-info">No Publish</span></h6>
                @endif
            </td>
            <td>
                <form action="{{ route('post.destroy', $hasil->id) }}" method="POST">
                    <a href="{{ route('post.edit', $hasil-> id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
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
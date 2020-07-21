
<table class="table table-sm table-bordered table-striped table-hover ">
    <thead>
        <tr>
            <th>No</th>
            <th>Name User</th>
            <th>Email</th>
            <th>Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $result => $hasil)
        <tr>
            <td>{{ $result + $users->firstitem() }}</td>
            <td>{{ $hasil->name }}</td>
            <td>{{ $hasil->email }}</td>
            <td>
                @if($hasil->type)
                <h6><span class="badge badge-sm badge-secondary">Administrator</span></h6>
                @else 
                <h6><span class="badge badge-sm badge-info">Writer</span></h6>
                @endif
            </td>
            <td>
                <form action="{{ route('user.destroy', $hasil->id) }}" method="POST">
                    <a href="{{ route('user.edit', $hasil->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $users->links() }}
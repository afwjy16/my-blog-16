
<table class="table table-sm table-bordered table-striped table-hover ">
    <thead>
        <tr>
            <th>No</th>
            <th>Name Category</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($category as $result => $hasil)
        <tr>
            <td>{{ $result + $category->firstitem() }}</td>
            <td>{{ $hasil->name }}</td>
            <td>
                <form action="{{ route('category.destroy', $hasil-> id) }}" method="POST">
                    <a href="{{ route('category.edit', $hasil-> id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $category->links() }}
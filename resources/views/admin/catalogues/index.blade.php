@extends('admin.layouts.master')
@section('title')
    Danh sách danh mục sản phẩm
@endsection
@section('content')
    <a href="{{ route('admin.catalogues.create') }}" class="btn btn-success m-3">Thêm mới</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Cover</th>
            <th>Is Active</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Action</th>
        </tr>

        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <img src="{{ \Storage::url($item->cover) }}" alt="" width="50px">
                </td>
                <td>{!! $item->is_active
                    ? ' <span class="badge bg-danger">No</span>'
                    : ' <span class="badge bg-success">Yes</span>' !!}
                </td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.catalogues.edit', $item) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('admin.catalogues.show', $item) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('admin.catalogues.destroy', $item->id) }}"
                    onclick="return confirm('Are you sure?')"
                    class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $data->links() }}
@endsection

@extends('admin.layouts.master')
@section('title')
Thêm mới danh mục sản phẩm
@endsection
@section('content')
<a href="{{ route('admin.catalogues.index') }}" class="btn btn-secondary m-3">Quay lại</a>
    <form action="{{ route('admin.catalogues.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="m-3">
            <label for="" class="form-label">Name: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="m-3">
            <label for="" class="form-label">File:</label>
            <input type="file" class="form-control" name="cover">
        </div>
        <div class="m-3">
            <label for="" class="form-label">Is Active:</label>
            <input type="checkbox" class="form-check-input" name="is_active" value="1" checked>
        </div>
        <div class="m-3">
            <button type="submit" class="btn btn-success">Thêm</button>
        </div>
    </form>
@endsection

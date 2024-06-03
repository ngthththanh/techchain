@extends('admin.layouts.master')
@section('title')
    Danh sách danh mục sản phẩm
@endsection
@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        <div class="m-3">
            <label for="" class="form-label">Name: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ $model->name }}">
        </div>
        <div class="m-3">
            <label for="" class="form-label">File:</label>
            <img src="{{ \Storage::url($model->cover)}}" alt="" width="100px">
        </div>
        <div class="m-3">
            <label for="" class="form-label">Is Active:</label>
            {!! $model->is_active
                ? ' <span class="badge bg-danger">No</span>'
                : ' <span class="badge bg-success">Yes</span>' !!}
        </div>
        <div class="m-3">
            <a href="{{ route('admin.catalogues.index') }}" class="btn btn-secondary">Quay lại</a>
            <a href="{{ route('admin.catalogues.edit', $model) }}" type="submit" class="btn btn-warning">Sửa</a href="{{ route('admin.catalogues.edit', $model) }}">
        </div>
    </form>
@endsection

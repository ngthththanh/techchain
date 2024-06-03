@extends('admin.layouts.master')
@section('title')
Sửa danh mục sản phẩm {{ $model->name }}
@endsection
@section('content')
    <form action="{{ route('admin.catalogues.update', $model -> id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="m-3">
            <label for="" class="form-label">Name: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ $model->name }}">
        </div>
        <div class="m-3">
            <label for="" class="form-label">File:</label>
            <input type="file" class="form-control" name="cover">
            <img src="{{ \Storage::url($model->cover)}}" alt="" width="100px">
        </div>
        <div class="m-3">
            <label for="" class="form-label">Is Active:</label>
            <input type="checkbox" class="form-check-input" value="1" @if($model->is_active) checked @endif name="is_active">
        </div>
        <div class="m-3">
            <a href="{{ route('admin.catalogues.index') }}" class="btn btn-secondary">Quay lại</a>
            <button type="submit" class="btn btn-warning">Sửa</button>
        </div>
    </form>
@endsection

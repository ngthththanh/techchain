<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit danh mục {{ $brand->name }}</h1>
    @if (session('msg'))
    <h2>{{ session('msg') }}</h2>
@endif
<form action="{{ route('brands.update', $brand) }}" method="post" enctype="multipart/form-data">
    @csrf
        @method ('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $brand->name }}">
        <input type="file" name="image">
        <img src="{{ asset($brand->image) }}" width="100px">
        <button type="submit">Update</button>
    </form>
</body>
</html>

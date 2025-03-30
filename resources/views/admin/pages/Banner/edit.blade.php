@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Chỉnh sửa Banner</h2>
        <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-group">
                <label>Tiêu đề:</label>
                <input type="text" name="title" class="form-control" value="{{ $banner->title }}" required>
            </div>
            <div class="form-group">
                <label>Hình ảnh hiện tại:</label>
                <img src="{{ asset('storage/' . $banner->image) }}" width="100">
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
        </form>
    </div>
@endsection

@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Thêm Banner</h2>
        <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tiêu đề:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Hình ảnh:</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Vị trí:</label>
                <select name="position" class="form-control">
                    <option value="top">Trên cùng</option>
                    <option value="middle">Giữa</option>
                    <option value="bottom">Dưới cùng</option>
                </select>
            </div>
            <div class="form-group">
                <label>Trạng thái:</label>
                <select name="status" class="form-control">
                    <option value="active">Hoạt động</option>
                    <option value="inactive">Không hoạt động</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Lưu</button>
        </form>
    </div>
@endsection

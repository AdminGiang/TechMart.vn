@extends('admin.layouts.masterad')
@section('title', 'Chỉnh Sửa Danh Mục')
@section('content')

    <div class="content" id="content">
        <h1>Chỉnh Sửa Danh Mục</h1>
        <div>
            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" id="id" name="id" value="{{ $category->id }}" readonly>
                </div>

                <div class="form-group">
                    <label for="name">Tên Danh Mục</label>
                    <input type="text" id="name" name="name" value="{{ $category->name }}"
                        placeholder="Nhập Tên Danh Mục" required>
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug" value="{{ $category->slug }}"
                        placeholder="Nhập Slug">
                </div>

                <div class="form-group">
                    <label for="created_at">Ngày Tạo</label>
                    <input type="datetime-local" id="created_at" name="created_at"
                        value="{{ $category->created_at->format('Y-m-d\TH:i') }}" readonly>
                </div>

                <div class="form-group">
                    <label for="updated_at">Ngày Cập Nhật</label>
                    <input type="datetime-local" id="updated_at" name="updated_at" value="{{ now()->format('Y-m-d\TH:i') }}"
                        readonly>
                </div>

                <div class="form-group">
                    <label for="status">Trạng Thái</label>
                    <select id="status" name="status" required>
                        <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                        <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Ẩn</option>
                    </select>
                </div>

                <div class="form-group" style="position: relative;right:0;top:0;">
                    <label for="image">Hình Ảnh</label>
                    <input type="file" id="image" name="image" onchange="previewImage(event)">
                    <div id="image-preview" style="margin-top: 10px;">
                        @if ($category->image)
                            <img src="{{ asset('assets/images/' . $category->image) }}" alt="Hình ảnh danh mục" width="100">
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Mô Tả</label>
                    <textarea class="noidung-descrip" id="description" name="description" placeholder="Nhập Mô Tả">{{ $category->description }}</textarea>
                </div>




                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>
@endsection

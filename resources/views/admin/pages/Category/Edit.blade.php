@extends('admin.layouts.masterad')
@section('title', 'Chỉnh Sửa Danh Mục')
@section('content')

    <div class="content" id="content">
            <h2>Sửa danh mục</h2>
            <form action="{{ route('admin.pages.Category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('admin.pages.Category.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
    </div>
@endsection

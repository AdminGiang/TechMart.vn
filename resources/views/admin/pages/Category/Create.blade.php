@extends('admin.layouts.masterad')
@section('title', 'Danh Mục')
@section('content')

<div class="content">
    <h1 class="text-center">Quản lý danh mục</h1>
    <form action="{{ route('admin.pages.Category.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="edit-btn" href="{{ route('admin.pages.Category.index') }}">Lưu</button>
        <a href="{{ route('admin.pages.Category.index') }}" class="delete-btn">Hủy</a>
    </form>
</div>

    
@endsection

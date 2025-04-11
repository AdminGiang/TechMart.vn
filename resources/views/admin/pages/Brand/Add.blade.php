@extends('admin.layouts.masterad')
@section('title', 'Thêm Thương Hiệu')
@section('content')

<div class="content">
    <h1 class="text-center">Quản lý Thương Hiệu</h1>
    <form action="{{ route('admin.pages.Brand.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên Thương Hiệu</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="edit-btn" href="{{ route('admin.pages.Brand.index') }}">Lưu</button>
        <a href="{{ route('admin.pages.Brand.index') }}" class="delete-btn">Hủy</a>
    </form>
</div>


@endsection

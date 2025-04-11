@extends('admin.layouts.masterad')
@section('title', 'Thêm Mã Giảm Giá')
@section('content')

<div class="content">
    <h1 class="text-center">Thêm Mã Giảm Giá</h1>
    <form action="{{ route('admin.pages.Coupon.store') }}" method="POST">
        @csrf

        <!-- Mã CODE -->
        <div class="mb-3">
            <label for="code" class="form-label">Mã CODE</label>
            <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}" placeholder="Nhập mã CODE" required>
            @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tên CODE -->
        <div class="mb-3">
            <label for="name" class="form-label">Tên CODE</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Nhập tên CODE" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <!-- Mô Tả CODE -->
        <div class="mb-3">
            <label for="description" class="form-label">Mô Tả </label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}" placeholder="Nhập mô tả" required>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Dạng Giảm Giá -->
        <div class="mb-3">
            <label for="type" class="form-label">Dạng Giảm Giá</label>
            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                <option value="" disabled selected>Chọn dạng giảm giá</option>
                <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Giảm giá cố định</option>
                <option value="percentage" {{ old('type') == 'percentage' ? 'selected' : '' }}>Giảm giá theo phần trăm</option>
            </select>
            @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Giá Trị Giảm -->
        <div class="mb-3">
            <label for="value" class="form-label">Giá Trị Giảm</label>
            <input type="number" class="form-control @error('value') is-invalid @enderror" id="value" name="value" value="{{ old('value') }}" placeholder="Nhập giá trị giảm" required>
            @error('value')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Số Lượng -->
        <div class="mb-3">
            <label for="quantity" class="form-label">Số Lượng</label>
            <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}" placeholder="Nhập số lượng" required>
            @error('quantity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Số Tiền Tối Thiểu -->
        <div class="mb-3">
            <label for="min_order_amount" class="form-label">Số Tiền Tối Thiểu</label>
            <input type="number" class="form-control @error('min_order_amount') is-invalid @enderror" id="min_order_amount" name="min_order_amount" value="{{ old('min_order_amount') }}" placeholder="Nhập số tiền tối thiểu">
            @error('min_order_amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

          <!-- Số Lần Sử Dụng Đối với mỗi kách hàng -->
          <div class="mb-3">
            <label for="usage_limit_per_user" class="form-label">Số Lượng</label>
            <input type="number" class="form-control @error('usage_limit_per_user') is-invalid @enderror" id="usage_limit_per_user" name="usage_limit_per_user" value="{{ old('usage_limit_per_user') }}" placeholder="Số lần sủ của mã đối với mỗi khách hàng" required>
            @error('usage_limit_per_user')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Ngày Bắt Đầu -->
        <div class="mb-3">
            <label for="start_date" class="form-label">Ngày Bắt Đầu</label>
            <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}">
            @error('start_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Ngày Hết Hạn -->
        <div class="mb-3">
            <label for="end_date" class="form-label">Ngày Hết Hạn</label>
            <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date') }}">
            @error('end_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Trạng Thái -->
        <div class="mb-3">
            <label for="is_active" class="form-label">Trạng Thái</label>
            <select name="is_active" id="is_active" class="form-control @error('is_active') is-invalid @enderror" required>
                <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Đã kích hoạt</option>
                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Chưa kích hoạt</option>
            </select>
            @error('is_active')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nút lưu và hủy -->
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('admin.pages.Coupon.index') }}" class="btn btn-danger">Hủy</a>
    </form>
</div>

@endsection

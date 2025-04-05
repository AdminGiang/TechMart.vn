@extends('admin.layouts.masterad')
@section('title', 'Chi tiết sản phẩm')
@section('content')

<div class="content" id="content">
    <h1 class="mt-4 mb-4">Chi tiết sản phẩm</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            @if ($product->image)
                <img src="{{ asset('products/images/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid mb-3">
            @else
                <p class="mb-3">Không có hình ảnh</p>
            @endif
            <p class="card-text"><strong>Mô tả:</strong> {{ $product->description ?? 'Không có mô tả' }}</p>
            <p class="card-text"><strong>Danh mục:</strong> {{ $product->category->name ?? 'N/A' }}</p>
            <p class="card-text"><strong>Thương hiệu:</strong> {{ $product->brand->name ?? 'N/A' }}</p>
            <p class="card-text"><strong>Giá:</strong> {{ number_format($product->price) }} VND</p>
            <p class="card-text"><strong>Số lượng:</strong> {{ $product->stock }}</p>
            <p class="card-text"><strong>Trạng thái:</strong> {{ $product->stock_status }}</p>
            <p class="card-text"><strong>Ngày tạo:</strong> {{ $product->created_at->format('Y-m-d H:i:s') }}</p>
            <p class="card-text"><strong>Ngày cập nhật:</strong> {{ $product->updated_at->format('Y-m-d H:i:s') }}</p>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
@endsection

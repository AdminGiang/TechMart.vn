@extends('admin.layouts.masterad')
@section('title', 'Sản Phẩm')
@section('content')

<div class="content" id="content">
    <h1>Danh Sách Sản Phẩm</h1>
    <a href="{{route('admin.products.create')}}"><button class="addbtn">Thêm Sản Phẩm</button></a>
    <div class="table-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>

            <tbody>
                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
                @if(isset($products) && count($products) > 0)
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td><img src="{{ asset($product->image) }}" width="100"></td>
                            <td>Danh mục</td>
                            <td>{{ number_format($product->price) }} VND</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->created_at }}</td>
                            <td> {{ $product->stock_status}}</td>
                            <td>
                                <a href=""><button class="edit-btn">Sửa</button></a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')" class="delete-btn">Xóa</button>
                                </form>
                                <a href="#"><button class="detail-btn">Chi Tiết</button></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">Không có sản phẩm nào.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

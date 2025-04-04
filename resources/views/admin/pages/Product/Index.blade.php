@extends('admin.layouts.masterad')
@section('title', 'Sản Phẩm')
@section('content')

<div class="content" id="content">
    <h1>Danh Sách Sản Phẩm</h1>
    <a href="#"><button class="addbtn">Thêm Sản Phẩm</button></a>
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
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td><img src="{{$product->image}}" ></td>
                    <td> Danh muc</td>
                    <td>{{ number_format($product->price) }}VND</td>
                    <td>{{ $product->quantity }}</td>
                    <td>Ngày tạo </td>
                    <td>Hiển thị</td>
                    <td>
                        <a href="{{ route('admin.Product.Edit') }}"><button class="edit-btn">Sửa</button></a>
                        <a href=""><button class="delete-btn">Xóa</button></a>
                        <a href="{{ route('admin.Product.Detail') }}"><button class="detail-btn">Chi Tiết</button></a>
                    </td>
                </tr>
                @endforeach 
            </tbody>
            <tbody>
                @if(isset($products) && count($products) > 0)
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td><img src="{{ $product->image }}" width="100"></td>
                            <td>Danh mục</td>
                            <td>{{ number_format($product->price) }} VND</td>
                            <td>{{ $product->quantity }}</td>
                            <td>Ngày tạo</td>
                            <td>Hiển thị</td>
                            <td>
                                <a href=""><button class="edit-btn">Sửa</button></a>
                                <a href="#"><button class="delete-btn">Xóa</button></a>
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

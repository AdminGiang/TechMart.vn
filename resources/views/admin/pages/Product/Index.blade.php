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
                    <th>Bảo hành</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>

            <tbody>
                {{-- @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif --}}
            @if (session('success'))
            <div class="notification-centered">
                <strong>Thành công!</strong> {{ session('success') }}
            </div>
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
                            <td>{{ $product->warranty_period }}</td>
                            <td>{{ $product->created_at }}</td>
                            <td> {{ $product->stock_status}}</td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}"><button class="edit-btn">Sửa</button></a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')" class="delete-btn">Xóa</button>
                                </form>
                                <a href="{{ route('admin.products.show', $product->id) }}"><button class="detail-btn">Chi Tiết</button></a>
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

@section('styles')
<style>
    .overlay { /* Class cho phần tử cha bao bọc */
        display: flex;
        justify-content: center; /* Căn giữa theo chiều ngang */
        align-items: center; /* Căn giữa theo chiều dọc */
        position: fixed; /* Để nó nằm trên cùng và ở giữa màn hình */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Tùy chọn: lớp phủ mờ */
        z-index: 1000; /* Đảm bảo nó ở trên các phần tử khác */
    }

    .notification { /* Class cho thông báo */
        background-color: #d4edda; /* Màu nền thành công */
        color: #155724; /* Màu chữ thành công */
        border: 1px solid #c3e6cb;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
    }
</style>
@endsection

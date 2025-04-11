@extends('admin.layouts.masterad')
@section('title', 'Thương Hiệu')
@section('content')


<div class="content" id="content">
    <h1> Quản lý Thương Hiệu</h1>
    <a href="{{route('admin.pages.Brand.create')}}"><button class="addbtn">Thêm danh mục</button></a>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
    <div class="table-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Thương Hiệu</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>{{ $brand->created_at }}</td>
                        <td>{{ $brand->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.pages.Brand.edit', $brand->id) }}"><button class="edit-btn">Sửa</button></a>
                                <form action="{{ route('admin.pages.Brand.destroy', $brand->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa thương hiệu này?')" class="delete-btn">Xóa</button>
                                </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5">Không có danh mục nào.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

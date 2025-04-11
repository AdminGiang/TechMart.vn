@extends('admin.layouts.masterad')
@section('title', 'Danh Mục')
@section('content')


<div class="content" id="content">
    <h1> Quản lý Sản Phẩm</h1>
    <div class="search-bar">
        <form method="GET" action="{{ route('admin.pages.Banners.index') }}">
            <input type="text" name="search" placeholder="Tìm kiếm..." value="{{ request('search') }}">
            <button type="submit">Tìm kiếm</button>
        </form>
    </div>
    <a href="{{route('admin.pages.Category.create')}}"><button class="addbtn">Thêm danh mục</button></a>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
    <div class="table-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.pages.Category.edit', $category->id) }}"><button class="edit-btn">Sửa</button></a>
                                <form action="{{ route('admin.pages.Category.destroy', $category->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')" class="delete-btn">Xóa</button>
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

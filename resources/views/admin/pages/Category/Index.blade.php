@extends('admin.layouts.masterad')
@section('title', 'Danh Mục')
@section('content')

    <div class="content" id="content">
        <h1>Danh Mục Sản Phẩm</h1>
        <a href="{{ route('categories.create') }}"><button class="addbtn">Thêm Danh Mục</button></a>
        <div class="table-container">
            <table class="product-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Slug</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Thao tác</th>

                    </tr>
                </thead>
                <tbody>
                    @if (isset($categories) && count($categories) > 0)
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    @if ($category->image)
                                        <img src="{{ asset('assets/images/' . $category->image) }}" width="30px">
                                    @else
                                        Không có ảnh
                                    @endif
                                </td>
                                <td class="descrip-foarall">{{ $category->description }}</td>
                                <td>{{ $category->status ? 'Hoạt động' : 'Không hoạt động' }}</td>
                                <td>{{ $category->created_at }}</td>

                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}"><button class="edit-btn">Sửa</button></a>
                                    {{-- <a href=""><button class="delete-btn">Xóa</button></a> --}}
                                    {{-- <a href="{{ route('categories.detail') }}"><button class="detail-btn">Chi
                                            Tiết</button></a> --}}
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="delete-btn" type="submit">Xóa</button>
                                            </form>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">Không có danh mục nào.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

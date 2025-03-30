@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Danh sách Banner</h2>
        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary mb-3">Thêm Banner</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Hình ảnh</th>
                    <th>Vị trí</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banners as $banner)
                    <tr>
                        <td>{{ $banner->title }}</td>
                        <td><img src="{{ asset('storage/' . $banner->image) }}" width="100"></td>
                        <td>{{ ucfirst($banner->position) }}</td>
                        <td>{{ ucfirst($banner->status) }}</td>
                        <td>
                            <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

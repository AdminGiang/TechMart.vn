@extends('admin.layouts.masterad')
@section('title', 'Quản lý Tài khoản Admin')

@section('content')
<div class="content">
    <div class="content-header">
        <h1 class="content-title">Quản lý Tài khoản Admin</h1>
        <div class="content-actions">
            <a href="{{ route('admin.accounts.create') }}" class="btn btn-primary">Thêm mới Admin</a>
            <a href="{{ route('admin.accounts.inactive') }}" class="btn btn-warning">Admin Bị Vô Hiệu Hóa</a>
        </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->role }}</td>
                    <td>{!! $admin->is_active ? '<span class="badge bg-success">Đã kích hoạt</span>' : '<span class="badge bg-danger">Vô hiệu hóa</span>' !!}</td>
                    <td>
                        <a href="{{ route('admin.accounts.edit', $admin->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                        <a href="{{ route('admin.accounts.edit_role', $admin->id) }}" class="btn btn-sm btn-warning">Phân quyền</a>
                        @if (!$admin->is_active)
                            <form action="{{ route('admin.accounts.activate', $admin->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-success">Kích hoạt</button>
                            </form>
                        @else
                            <form action="{{ route('admin.accounts.deactivate', $admin->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn vô hiệu hóa?')">Vô hiệu hóa</button>
                            </form>
                        @endif
                        <form action="{{ route('admin.accounts.destroy', $admin->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">Không có tài khoản Admin nào.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
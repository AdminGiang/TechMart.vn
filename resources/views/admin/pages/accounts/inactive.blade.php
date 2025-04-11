@extends('admin.layouts.masterad')
@section('title', 'Tài khoản Admin Bị Vô Hiệu Hóa')

@section('content')

<div class="content">
    <div class="content-header">
        <h1 class="content-title">Tài khoản Admin Bị Vô Hiệu Hóa</h1>
        <div class="content-actions">
            <a href="{{ route('admin.pages.accounts.index') }}" class="btn btn-primary">Quay lại danh sách Admin</a>
        </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inactiveAdmins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <form action="{{ route('admin.accounts.activate', $admin->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-success">Kích hoạt</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Không có tài khoản Admin nào bị vô hiệu hóa.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
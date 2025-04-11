@extends('admin.layouts.masterad')
@section('title', 'Phân quyền cho Admin')

@section('content')
<div class="content">
    <div class="content-header">
        <h1 class="content-title">Phân quyền cho Admin  {{ $admin->username }}</h1>
        <div class="content-actions">
            <a href="{{ route('admin.pages.accounts.index') }}" class="btn btn-primary">Quay lại danh sách Admin</a>
        </div>

    <form action="{{ route('admin.accounts.update_role', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="role" class="form-label">Vai trò</label>
            <input type="text" class="form-control" id="role" name="role" value="{{ $admin->role }}">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật Vai trò</button>
        <a href="{{ route('admin.pages.accounts.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
    </div>
@endsection
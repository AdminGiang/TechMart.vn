@extends('admin.layouts.masterad')
@section('title', 'Nhân Viên')
@section('content')

<div class="content" id="content">
    <h1>Nhân Viên</h1>
    <a href="{{ route('admin.pages.Admin.create') }}"><button class="addbtn">Thêm Nhân Viên</button></a>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
    <div class="table-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th class="hyliketh">Quyền</th>
                    <th>Số Điện Thoại</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($adms as $adm )
                <tr>
                    <td>{{ $adm->id }}</td>
                    <td>{{ $adm->name }}</td>
                    <td class="hyliketh">Admin</td>
                    <td>{{ $adm->phone }}</td>
                    <td>
                        {{-- <a href="{{ route('admin.pages.Admin.edit') }}"><button class="edit-btn">Sửa</button></a> --}}
                        <a href=""><button class="delete-btn">Xóa</button></a>
                        {{-- <a href="{{ route('admin.pages.Admin.detail') }}"><button class="detail-btn">Chi Tiết</button></a> --}}
                    </td>
                </tr>
                @empty
                <tr><td colspan="5">Không có tài khoản admin nào</td></tr>

                @endforelse

            </tbody>
        </table>
    </div>
</div>
@endsection

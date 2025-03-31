@extends('admin.layouts.masterad')
@section('title', 'Vai trò')
@section('content')

<div class="content" id="content">
    <h1>Phân Quyền Roles</h1>
    <a href="{{ route('admin.Role.Add') }}"><button class="addbtn">Thêm Quyền</button></a>
    <div class="table-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Role</th>
                    <th>Số lượng</th>
                    <th>Ngày tạo</th>
                    <th>Mô Tả</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Admin</td>
                    <td>2</td>
                    <td>24/03/2025</td>
                    <td>Nắm GIữ trang web</td>
                    <td>Hiển thị</td>
                    <td>
                        <a href="{{ route('admin.Role.Edit') }}"><button class="edit-btn">Sửa</button></a>
                        <a href=""><button class="delete-btn">Xóa</button></a>
                        <a href="{{ route('admin.Role.Detail') }}"><button class="detail-btn">Chi Tiết</button></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@extends('admin.layouts.masterad')
@section('title', 'Người Dùng')
@section('content')

<div class="content" id="content">
    <h1>Người Dùng</h1>
    <div class="table-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Người Dùng</th>
                    <th >Email</th>
                    <th>Mật Khẩu</th>
                    <th>Số Điện Thoại</th>
                    <th>Địa Chỉ</th>
                    <th>Quyền</th>
                    <th>Ngày Tạo</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Thành Sứ</td>
                    <td>Sunguyen@gmail.com</td>
                    <td>asd1234556</td>
                    <td>0545646544</td>
                    <td>22 Mia anh Đào Đà lạt</td>
                    <td class="hyliketh">Admin</td>
                    <td>24/03/2025</td>
                    <td>
                        <a href=""><button class="delete-btn">Khóa User</button></a>
                        <a href="{{ route('admin.User.Detail') }}"><button class="detail-btn">Chi Tiết</button></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

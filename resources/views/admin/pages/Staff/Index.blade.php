{{-- @extends('admin.layouts.masterad')
@section('title', 'Nhân Viên')
@section('content')

<div class="content" id="content">
    <h1>Nhân Viên</h1>
    <a href="{{ route('admin.staff.add') }}"><button class="addbtn">Thêm Nhân Viên</button></a>
    <div class="table-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Nhân Viên</th>
                    <th class="hyliketh">Quyền</th>
                    <th>Số Điện Thoại</th>
                    <th>Ngày Vào Làm</th>
                    <th>Ngày Nghỉ</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Thành Sứ</td>
                    <td class="hyliketh">Admin</td>
                    <td>0545646544</td>
                    <td>24/03/2025</td>
                    <td>24/03/2025</td>
                    <td>
                        <a href="{{ route('admin.staff.edit') }}"><button class="edit-btn">Sửa</button></a>
                        <a href=""><button class="delete-btn">Xóa</button></a>
                        <a href="{{ route('admin.staff.detail') }}"><button class="detail-btn">Chi Tiết</button></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection --}}

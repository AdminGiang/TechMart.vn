@extends('admin.layouts.masterad')
@section('title', 'Chỉnh Sửa Role')
@section('content')

    <div class="content" id="content">
        <h1>Chỉnh Sửa Nhân Viên</h1>
        <div >
            <form action="" method="" enctype="multipart/form-data">
                @csrf
                @method('')

                <div class="form-group">
                    <label for="name">Tên Nhân Viên</label>
                    <input type="text" id="" name="" value="Nguyễn Thành Sứ" placeholder="Nhập tên  Nhân Viên" required>
                </div>

                <div class="form-group">
                    <label for="name">Số Điện Thoại</label>
                    <input type="text" id="" name="" value="0234656" placeholder="Nhập Số Điện Thoại" required>
                </div>

                <div class="form-group">
                    <label for="status">Quyền Hạn</label>
                    <select id="status" name="status" required>
                        <option value="1" {{--{{ $product->status == 1 ? 'selected' : '' }}--}}>***Admin </option>
                        <option value="0" {{--{{ $product->status == 0 ? 'selected' : '' }}--}}>*Seller</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="quantity">Ngày Vào Làm</label>
                    <input type="datetime-local" id="" name="" value="" placeholder="DD/MM/YYYY" required>
                </div>

                <div class="form-group">
                    <label for="quantity">Ngày Nghỉ</label>
                    <input type="datetime-local" id="" name="" value="" placeholder="DD/MM/YYYY" required>
                </div>

                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select id="status" name="status" required>
                        <option value="1" {{--{{ $product->status == 1 ? 'selected' : '' }}--}}>*Hoạt Động </option>
                        <option value="0" {{--{{ $product->status == 0 ? 'selected' : '' }}--}}> Đuổi Việc</option>
                    </select>
                </div>


                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    <a href="{{ route('admin.Staff') }}" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>

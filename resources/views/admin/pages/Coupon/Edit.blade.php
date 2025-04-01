@extends('admin.layouts.masterad')
@section('title', 'Chỉnh Sửa Mã Giảm Giá')
@section('content')

    <div class="content" id="content">
        <h1>Chỉnh Sửa Danh Mục</h1>
        <div >
            <form action="" method="" enctype="multipart/form-data">
                @csrf
                @method('')

                <div class="form-group">
                    <label for="">ID</label>
                    <input type="text" id="" name=""  placeholder="1" readonly>
                </div>

                <div class="form-group">
                    <label for="">Mã </label>
                    <input type="text" id="" name="" value="2ET456DD" placeholder="Nhập Danh Mục" required>
                </div>

                <div class="form-group">
                    <label for="">Ngày Hết Hạn</label>
                    <input type="datetime-local" id="" name="" value="" placeholder="DD/MM/YYYY" required>
                </div>

                <div class="form-group">
                    <label for="">Ngày Tạo</label>
                    <input type="datetime-local" id="" name="" value="" placeholder="DD/MM/YYYY" required>
                </div>

                <div class="form-group">
                    <label for="">Ngày Cập Nhật</label>
                    <input type="datetime-local" id="" name="" value="" placeholder="DD/MM/YYYY" required>
                </div>

                <div class="form-group">
                    <label for="">Giá Trị</label>
                    <input type="text" id="" name="" value="400.000" placeholder="Nhập Danh Mục" required>
                </div>

                <div class="form-group">
                    <label for="">Đươn Vị Áp Dụng</label>
                    <select id="" name="" required>
                        <option value="1" {{--{{ $product->status == 1 ? 'selected' : '' }}--}}>VNĐ</option>
                        <option value="0" {{--{{ $product->status == 0 ? 'selected' : '' }}--}}>%</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Mô Tả</label>
                    <input type="text" id="" name="" value="" placeholder="Mô Tả" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    <a href="{{ route('admin.Coupon') }}" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>
    @endsection

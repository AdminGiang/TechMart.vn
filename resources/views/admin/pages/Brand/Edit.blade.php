@extends('admin.layouts.masterad')
@section('title', 'Chỉnh Sửa Sản Phẩm')
@section('content')

    <div class="content" id="content">
        <h1>Chỉnh Sửa Thương Hiệu</h1>
        <div >
            <form action="" method="" enctype="multipart/form-data">
                @csrf
                @method('')

                <div class="form-group">
                    <label for="">ID</label>
                    <input type="text" id="" name="" value="1" placeholder="ID Thương Hiệu" readonly>
                </div>

                <div class="form-group">
                    <label for="">Tên Thương Hiệu</label>
                    <input type="text" id="" name="" value="Apple" placeholder="Nhập Thương Hiệu" required>
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
                    <label for="">Trạng thái</label>
                    <select id="" name="" required>
                        <option value="1" {{--{{ $product->status == 1 ? 'selected' : '' }}--}}>*Hiển thị</option>
                        <option value="0" {{--{{ $product->status == 0 ? 'selected' : '' }}--}}>Ẩn</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    <a href="{{ route('admin.Brand') }}" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>
    @endsection

@extends('admin.layouts.masterad')
@section('title', 'Chỉnh Sửa Sản Phẩm')
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
                    <label for="">Tên Danh Mục</label>
                    <input type="text" id="" name="" value="SmartPhone" placeholder="Nhập Danh Mục" required>
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

                <div class="form-group">
                    <label for="">Mô Tả</label>
                    <input type="text" id="" name="" value="" placeholder="Mô Tả" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    <a href="{{ route('admin.Category') }}" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>
    @endsection

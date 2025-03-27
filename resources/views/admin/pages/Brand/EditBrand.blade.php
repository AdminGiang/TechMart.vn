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
                    <label for="name">ID</label>
                    <input type="text" id="name" name="name" value="Apple" placeholder="ID Thương Hiệu" required>
                </div>

                <div class="form-group">
                    <label for="name">Tên Thương Hiệu</label>
                    <input type="text" id="name" name="name" value="Apple" placeholder="Nhập Thương Hiệu" required>
                </div>

                <div class="form-group">
                    <label for="quantity">Ngày Tạo</label>
                    <input type="datetime-local" id="quantity" name="quantity" value="" placeholder="DD/MM/YYYY" required>
                </div>

                <div class="form-group">
                    <label for="datetime">Ngày Cập Nhật</label>
                    <input type="datetime-local" id="quantity" name="quantity" value="" placeholder="DD/MM/YYYY" required>
                </div>

                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select id="status" name="status" required>
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

@extends('admin.layouts.masterad')
@section('title', 'Danh Mục')
@section('content')

<div class="content" id="content">
    <h1>Thêm Mã Giảm Giá</h1>
    <form class="form-container">
        <div class="form-group">
            <label for="">Tên Mã :</label>
            <input type="text" id="" name="" placeholder="SmartPhone" required>
        </div>

        <div class="form-group">
            <label for="">Giá Trị :</label>
            <input type="text" id="" name="" required>
        </div>

        <div class="form-group">
            <label for="status">Đơn Vị Áp Dụng :</label>
            <select id="status" name="status" required>
                <option value="1" {{--{{ $product->status == 1 ? 'selected' : '' }}--}}>VNĐ </option>
                <option value="0" {{--{{ $product->status == 0 ? 'selected' : '' }}--}}>%</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Ngày Tạo :</label>
            <input type="date" id="" name="" required>
        </div>

        <div class="form-group">
            <label for="">Ngày Hết Hạn :</label>
            <input type="date" id="" name="" required>
        </div>

        <div class="form-group">
            <label for="status">Trạng Thái</label>
            <select id="status" name="status" required>
                <option value="1" {{--{{ $product->status == 1 ? 'selected' : '' }}--}}>Hiển Thị  </option>
                <option value="0" {{--{{ $product->status == 0 ? 'selected' : '' }}--}}>Ẩn</option>
            </select>
        </div>

        <hr>
        <div class="button-container">
            <button class="submit-button-add" type="submit">THÊM</button>
            <a href="{{ route('admin.Coupon') }}" class="submit-button-destroy">HỦY</a>
        </div>

    </form>
</div>
@endsection

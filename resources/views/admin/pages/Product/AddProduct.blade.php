@extends('admin.layouts.masterad')
@section('title', 'Thêm Sản Phẩm')
@section('content')

<div class="content" id="content">
    <h1>Thêm Sản Phẩm</h1>
    <form class="form-container">
        <div class="form-group">
            <label for="">Hình ảnh Sản Phẩm</label>
            <input type="file" id="" name="">
            <img src=" " alt="Hình ảnh Thương Hiệu" class="preview-image">

        </div>
        <div class="form-group">
            <label for="">Tên Sản Phẩm :</label>
            <input type="text" id="" name="" placeholder="Tên Sản Phẩm" value="Iphoen 16 promax" required>
        </div>

        <div class="form-group">
            <label for="status">Danh Mục</label>
            <select id="status" name="status" required>
                <option value="1" {{--{{ $product->status == 1 ? 'selected' : '' }}--}}>SmartPhone </option>
                <option value="0" {{--{{ $product->status == 0 ? 'selected' : '' }}--}}>Laptop</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Thương Hiệu</label>
            <select id="status" name="status" required>
                <option value="1" {{--{{ $product->status == 1 ? 'selected' : '' }}--}}>Samsung </option>
                <option value="0" {{--{{ $product->status == 0 ? 'selected' : '' }}--}}>Apple</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Giá Nhập</label>
            <input type="text" id="" name="" placeholder="Giá Nhập" value="23.000.000VNĐ" required>
        </div>

        <div class="form-group">
            <label for="">Giá Bán</label>
            <input type="text" id="" name="" placeholder="Giá Bán" value="23.000.000VNĐ" required>
        </div>

        <div class="form-group">
            <label for="">Ngày Tạo:</label>
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
            <a href="{{ route('admin.Product') }}" class="submit-button-destroy">HỦY</a>
        </div>

    </form>
</div>

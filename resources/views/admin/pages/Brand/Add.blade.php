@extends('admin.layouts.masterad')
@section('title', 'Thương Hiệu')
@section('content')

<div class="content" id="content">
    <h1>Thêm Thương Hiệu</h1>
    <form class="form-container">
        <div class="form-group">
            <label for="">Hình ảnh Thương Hiệu</label>
            <input type="file" id="" name="">
            <img src=" " alt="Hình ảnh Thương Hiệu" class="preview-image">

        </div>
        <div class="form-group">
            <label for="name">Tên Thương Hiệu :</label>
            <input type="text" id="" name="" placeholder="Iphone" required>
        </div>
        <div class="form-group">
            <label for="">Ngày Tạo:</label>
            <input type="date" id="" name="" required>
        </div>
        <div class="form-group">
            <label for="">Ngày Cập Nhật:</label>
            <input type="date" id="" name="" required>
        </div>
        <hr>
        <div class="button-container">
            <button class="submit-button-add" type="submit">THÊM</button>
            <a href="{{ route('admin.Brand') }}" class="submit-button-destroy">HỦY</a>
        </div>

    </form>
</div>
@endsection

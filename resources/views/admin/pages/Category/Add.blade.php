@extends('admin.layouts.masterad')
@section('title', 'Danh Mục')
@section('content')

<div class="content" id="content">
    <h1>Thêm Danh Mục</h1>
    <form class="form-container">
        <div class="form-group">
            <label for="">Tên Danh Mục :</label>
            <input type="text" id="" name="" placeholder="SmartPhone" required>
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
            <button class="submit-button-add" type="submit">Submit</button>
            <a href="{{ route('admin.Category') }}" class="submit-button-destroy">HỦY</a>
        </div>

    </form>
</div>
@endsection

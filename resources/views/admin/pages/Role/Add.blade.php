@extends('admin.layouts.masterad')
@section('title', 'Thêm Roles')
@section('content')

<div class="content" id="content">
    <h1>Thêm Roles</h1>
    <form class="form-container">
        <div class="form-group">
            <label for="">Tên Roles </label>
            <input type="text" id="" name="" placeholder="Tên Roles" value="Admin" required>
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
            <a href="{{ route('admin.Role') }}" class="submit-button-destroy">HỦY</a>
        </div>

    </form>
</div>
@endsection

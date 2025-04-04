@extends('admin.layouts.masterad')
@section('title', 'Danh Mục')
@section('content')

    <div class="content" id="content">
        <h1>Thêm Danh Mục</h1>
        <form class="form-container" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Tên danh mục:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="slug">Slug:</label>
                <input type="text" id="slug" name="slug">
            </div>

            <div class="form-group">
                <label for="image">Ảnh:</label>
                <input type="file" id="image" name="image">
            </div>

            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea id="description" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="status">Trạng thái:</label>
                <select id="status" name="status">
                    <option value="1">Hoạt động</option>
                    <option value="0">Không hoạt động</option>
                </select>
            </div>

            <hr>
            <div class="button-container">
                <button class="submit-button-add" type="submit">Submit</button>
                <a href="{{ route('categories.index') }}" class="submit-button-destroy">HỦY</a>
            </div>

        </form>
    </div>
@endsection

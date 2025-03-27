@extends('admin.layouts.masterad')
@section('title', 'Chỉnh Sửa Sản Phẩm')
@section('content')

    <div class="content" id="content">
        <h1>Chỉnh sửa sản phẩm</h1>
        <div >
            <form action="" method="" enctype="multipart/form-data">
                @csrf
                @method('')

                <div class="form-group">
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" id="name" name="name" value="iphoens 16 max pro" placeholder="Nhập tên sản phẩm" required>
                </div>

                <div class="form-group">
                    <label for="category">Danh mục</label>
                    <select id="category" name="category_id" required>
                            <option value="1">
                                Iphone
                            </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="brand">Thương Hiệu</label>
                    <select id="brand" name="brand_id" required>
                            <option value="1">
                                Apple
                            </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Giá Trị Nhập (VNĐ)</label>
                    <input type="number" id="price" name="price" value="21,000,000" placeholder="Giá Trị Nhập (VNĐ)" required>
                </div>

                <div class="form-group">
                    <label for="price">Giá Bán (VNĐ)</label>
                    <input type="number" id="price" name="price" value="21,000,000" placeholder="Giá Bán (VNĐ)" required>
                </div>

                <div class="form-group">
                    <label for="quantity">Số lượng</label>
                    <input type="number" id="quantity" name="quantity" value="12" placeholder="Số lượng" required>
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

                <div class="form-group">
                    <label for="image">Hình ảnh sản phẩm</label>
                    <input type="file" id="image" name="image">

                    <img src=" " alt="Hình ảnh sản phẩm" class="preview-image">

                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    <a href="" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>

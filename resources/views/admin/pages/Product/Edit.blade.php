@extends('admin.layouts.masterad')
@section('title', 'Chỉnh Sửa Sản Phẩm')
@section('content')

    <div class="content" id="content">
        <h1>Chỉnh Sửa Sản Phẩm</h1>
        <div >
            <form action="" method="" enctype="multipart/form-data">
                @csrf
                @method('')

                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" id="" name="" value="iphoens 16 max pro" placeholder="Nhập tên sản phẩm" required>
                </div>

                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select id="" name="category_id" required>
                            <option value="1">
                                Iphone
                            </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Thương Hiệu</label>
                    <select id="" name="brand_id" required>
                            <option value="1">
                                Apple
                            </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Giá Trị Nhập (VNĐ)</label>
                    <input type="number" id="" name="" value="21,000,000" placeholder="Giá Trị Nhập (VNĐ)" required>
                </div>

                <div class="form-group">
                    <label for="">Giá Bán (VNĐ)</label>
                    <input type="number" id="" name="" value="21,000,000" placeholder="Giá Bán (VNĐ)" required>
                </div>

                <div class="form-group">
                    <label for="">Số lượng</label>
                    <input type="number" id="" name="" value="12" placeholder="Số lượng" required>
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
                    <label for="">Mô Tả</label>
                    <input type="text" id="" name="" value="msmsms" placeholder="Mo tả sản phẩm" required>
                </div>

                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select id="" name="" required>
                        <option value="1" {{--{{ $product->status == 1 ? 'selected' : '' }}--}}>*Hiển thị</option>
                        <option value="0" {{--{{ $product->status == 0 ? 'selected' : '' }}--}}>Ẩn</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Hình ảnh sản phẩm</label>
                    <input type="file" id="" name="">

                    <img src=" " alt="Hình ảnh sản phẩm" class="preview-image">

                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    <a href="{{ route('admin.Product') }}" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>
    @endsection

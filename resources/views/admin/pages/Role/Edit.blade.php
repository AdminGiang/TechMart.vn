@extends('admin.layouts.masterad')
@section('title', 'Chỉnh Sửa Role')
@section('content')

    <div class="content" id="content">
        <h1>Chỉnh Sửa Role</h1>
        <div >
            <form action="" method="" enctype="multipart/form-data">
                @csrf
                @method('')

                <div class="form-group">
                    <label for="name">Tên Role</label>
                    <input type="text" id="" name="" value="admin" placeholder="Nhập tên Role" required>
                </div>

                <div class="form-group">
                    <label for="quantity">Ngày Tạo</label>
                    <input type="datetime-local" id="" name="" value="" placeholder="DD/MM/YYYY" required>
                </div>

                <div class="form-group">
                    <label for="quantity">Mô Tả</label>
                    <input type="text" id="" name="" value="msmsms" placeholder="Mo tả sản phẩm" required>
                </div>

                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select id="status" name="status" required>
                        <option value="1" {{--{{ $product->status == 1 ? 'selected' : '' }}--}}>*Hoạt Động </option>
                        <option value="0" {{--{{ $product->status == 0 ? 'selected' : '' }}--}}>Ẩn</option>
                    </select>
                </div>


                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    <a href="{{ route('admin.Role') }}" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>
    @endsection

@extends('admin.layouts.masterad')
@section('title', 'Phiếu Giảm Giá')
@section('content')

<div class="content" id="content">
    <h1>Phiếu Giảm Giá</h1>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
    <a href="{{ route('admin.pages.Coupon.add') }}"><button class="addbtn">Thêm Mã Giảm Giá</button></a>
    <div class="table-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã CODE</th>
                    <th>Dạng</th>
                    <th>Giá Trị Giảm</th>
                    <th>Số Lượng</th>
                    <th>Ngày Hết Hạn</th>
                    <th>Ngày Tạo</th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->id }}</td>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->type === 'fixed' ? 'Cố định' : 'Phần trăm' }}</td>
                    <td>{{ $coupon->type === 'fixed' ? number_format($coupon->value) . ' VND' : $coupon->value . '%' }}</td>
                    <td>{{ $coupon->quantity ?? 'Không giới hạn' }}</td>
                    <td>{{ $coupon->end_date ? \Carbon\Carbon::parse($coupon->end_date)->format('d/m/Y') : '' }}</td>
                    <td>{{ $coupon->created_at->format('d/m/Y') }}</td>
                    <td> {{ $coupon->is_active ? 'Hoạt Động' : 'Hết Hiệu Lực' }}
                    </td>
                    <td>
                        <a href="{{ route('admin.pages.Coupon.edit',$coupon->id) }}"><button class="edit-btn">Sửa</button></a>
                        <form action="{{ route('admin.pages.Coupon.destroy', $coupon->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa mã này?')" class="delete-btn">Xóa</button>
                        </form>
                        <a href=""><button class="detail-btn">Áp Dụng</button></a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="9">Không có mã giãm giá nào.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

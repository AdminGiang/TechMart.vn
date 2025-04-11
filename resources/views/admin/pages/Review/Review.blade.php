@extends('admin.layouts.masterad')
@section('title', 'Quản lý bình luận')
@section('content')

<div class="content p-4">
    <h2 class="mb-4">Quản lý bình luận</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Thanh tìm kiếm và lọc -->
    <div class="row mb-4 g-3">
        <div class="col-md-4">
            <div class="search-box position-relative">
                <input type="text" class="form-control" placeholder="Tìm kiếm">
                <i class="fas fa-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
            </div>
        </div>
        <div class="col-md-3">
            <select class="form-select">
                <option value="">Tất cả trạng thái</option>
                <option value="pending">Chờ duyệt</option>
                <option value="approved">Đã duyệt</option>
                <option value="rejected">Từ chối</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="date" class="form-control" placeholder="Tất cả thời gian">
        </div>
        <div class="col-md-2">
            <button class="btn btn-success w-100">Lọc</button>
        </div>
    </div>

    <!-- Bảng dữ liệu -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>NGƯỜI DÙNG</th>
                    <th>SẢN PHẨM</th>
                    <th>NỘI DUNG</th>
                    <th>ĐÁNH GIÁ</th>
                    <th>TRẠNG THÁI</th>
                    <th>HÀNH ĐỘNG</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $review)
                <tr class="align-middle">
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="avatar-circle bg-info text-white me-2">
                                {{ strtoupper(substr($review->user->name, 0, 2)) }}
                            </div>
                            <span>{{ $review->user->name }}</span>
                        </div>
                    </td>
                    <td>{{ $review->product->name }}</td>
                    <td>{{ $review->comment }}</td>
                    <td>
                        <div class="rating">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $review->rating)
                                    <i class="fas fa-star text-warning"></i>
                                @else
                                    <i class="far fa-star text-warning"></i>
                                @endif
                            @endfor
                            {{ $review->rating }}
                        </div>
                    </td>
                    <td>
                        @if($review->status === 'pending')
                            <span class="badge bg-warning text-dark">Chờ duyệt</span>
                        @elseif($review->status === 'approved')
                            <span class="badge bg-success">Đã duyệt</span>
                        @else
                            <span class="badge bg-danger">Từ chối</span>
                        @endif
                    </td>
                    <td>
                        @if($review->status === 'pending')
                            <form action="{{ route('admin.reviews.approve', $review->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm me-1">Duyệt</button>
                            </form>
                            <form action="{{ route('admin.reviews.reject', $review->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm me-1">Từ chối</button>
                            </form>
                        @endif
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reviewModal{{ $review->id }}">
                            Xem chi tiết
                        </button>

                        <!-- Modal Chi tiết -->
                        <div class="modal fade" id="reviewModal{{ $review->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Chi tiết đánh giá #{{ $review->id }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <strong>Người dùng:</strong>
                                            <div class="d-flex align-items-center mt-1">
                                                <div class="avatar-circle bg-info text-white me-2">
                                                    {{ strtoupper(substr($review->user->name, 0, 2)) }}
                                                </div>
                                                <span>{{ $review->user->name }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <strong>Sản phẩm:</strong>
                                            <p class="mt-1">{{ $review->product->name }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <strong>Đánh giá:</strong>
                                            <div class="rating mt-1">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $review->rating)
                                                        <i class="fas fa-star text-warning"></i>
                                                    @else
                                                        <i class="far fa-star text-warning"></i>
                                                    @endif
                                                @endfor
                                                ({{ $review->rating }} sao)
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <strong>Nội dung:</strong>
                                            <p class="mt-1">{{ $review->comment }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <strong>Trạng thái:</strong>
                                            <div class="mt-1">
                                                @if($review->status === 'pending')
                                                    <span class="badge bg-warning text-dark">Chờ duyệt</span>
                                                @elseif($review->status === 'approved')
                                                    <span class="badge bg-success">Đã duyệt</span>
                                                @else
                                                    <span class="badge bg-danger">Từ chối</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div>
                                            <strong>Thời gian:</strong>
                                            <p class="mt-1">{{ $review->created_at->format('H:i d/m/Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        @if($review->status === 'pending')
                                            <form action="{{ route('admin.reviews.approve', $review->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Duyệt đánh giá</button>
                                            </form>
                                            <form action="{{ route('admin.reviews.reject', $review->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Từ chối đánh giá</button>
                                            </form>
                                        @endif
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
.search-box {
    position: relative;
}

.search-box input {
    padding-left: 35px;
}

.avatar-circle {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: bold;
}

.badge {
    font-weight: normal;
    padding: 6px 12px;
}

.btn-sm {
    padding: 5px 10px;
    font-size: 0.875rem;
}

.rating {
    color: #ffc107;
}

.table th {
    font-weight: 600;
    color: #666;
}

.table td {
    vertical-align: middle;
}

.modal-body .rating {
    font-size: 1.2rem;
}
</style>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
@endsection

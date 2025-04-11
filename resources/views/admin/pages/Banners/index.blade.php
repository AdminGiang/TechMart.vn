@extends('admin.layouts.masterad')
@section('title', 'Danh sách Banner')

@section('content')
<div class="content" id="content">
    <h1>Quản lý Banner trang chủ</h1>
    <div class="search-bar">
        <form method="GET" action="{{ route('admin.pages.Banners.index') }}">
            <input type="text" name="search" placeholder="Tìm kiếm..." value="{{ request('search') }}">
            <button type="submit">Tìm kiếm</button>
        </form>
    </div>
<a href="{{ route('admin.pages.Banners.create') }}">Thêm mới Banner mới</a>
<table>
    <thead>
        <tr>
            <th>Tiêu đề</th>
            <th>Hình ảnh</th>
            {{-- <th>Vị trí</th> --}}
            <th>Trạng thái</th>
            <th>Thời gian</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($banners as $banner)
        <tr>
            <td>{{ $banner->title }}</td>
            <td><img src="{{ asset('banner/image/' . $banner->image) }}" width="100"></td>
            {{-- <td>{{ $banner->position }}</td> --}}
            <td> {{ $banner->status }}</td>
            <td>{{ $banner->start_date }} đến {{ $banner->end_date }}</td>
            <td>
                <a href="{{ route('admin.pages.Banners.edit', $banner->id) }}">Sửa</a>
                <form method="POST" action="{{ route('admin.pages.Banners.destroy', $banner->id) }}">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Xóa banner này?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    document.querySelectorAll('.toggle-status').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const id = this.dataset.id;
            fetch(`/admin/Banners/${id}/toggle-status`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                console.log('Trạng thái:', data.status);
        });
    });
</script>
</div>
@endsection

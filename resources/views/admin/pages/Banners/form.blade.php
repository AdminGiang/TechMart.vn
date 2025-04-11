<div>
    <label>Tiêu đề</label>
    <input type="text" name="title" value="{{ old('title', $banner->title ?? '') }}">

    <label>Mô tả</label>
    <textarea name="description">{{ old('description', $banner->description ?? '') }}</textarea>

    <label>Hình ảnh</label>
    <input type="file" name="image">
    @if(!empty($banner->image)) <img src="{{ asset($banner->image) }}" width="100"> @endif

    <label>Link</label>
    <input type="text" name="link" value="{{ old('link', $banner->link ?? '') }}">

    <label>Vị trí</label>
    <input type="text" name="position" value="{{ old('position', $banner->position ?? '') }}">

    <label>Trạng thái</label>
    <input type="checkbox" name="status" {{ old('status', $banner->status ?? true) ? 'checked' : '' }}> Hiển thị

    <label>Ngày bắt đầu</label>
    <input type="date" name="start_date" value="{{ old('start_date', $banner->start_date ?? '') }}">

    <label>Ngày kết thúc</label>
    <input type="date" name="end_date" value="{{ old('end_date', $banner->end_date ?? '') }}">

    <button type="submit">Lưu</button>
</div>
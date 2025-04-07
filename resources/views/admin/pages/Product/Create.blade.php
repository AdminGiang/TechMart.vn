@extends('admin.layouts.masterad')
@section('title', 'Thêm Sản Phẩm')
@section('content')
<div class="content" id="content">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md space-y-4">
        @csrf
        {{-- Tên sản phẩm --}}
        <div>
            <label class="block font-medium">Tên sản phẩm:</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        {{-- Mô tả --}}
        <div>
            <label class="block font-medium">Mô tả:</label>
            <textarea name="description" rows="3" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Danh mục --}}
        <div>
            <label class="block font-medium">Danh mục:</label>
            <select name="category_id" class="w-full border rounded px-3 py-2">
                <option value="">-- Chọn danh mục --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Thương hiệu --}}
        <div>
            <label class="block font-medium">Thương hiệu:</label>
            <select name="brand_id" class="w-full border rounded px-3 py-2">
                <option value="">-- Chọn thương hiệu --</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
            @error('brand_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Giá --}}
        <div>
            <label class="block font-medium">Giá (VNĐ):</label>
            <input type="number" name="price" step="0.01" value="{{ old('price') }}" class="w-full border rounded px-3 py-2">
            @error('price')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Giảm giá --}}
        <div>
            <label class="block font-medium">Giảm giá (%):</label>
            <input type="number" name="discount" value="{{ old('discount', 0) }}" class="w-full border rounded px-3 py-2">
            @error('discount')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Hình ảnh + Preview --}}
        <div>
            <label class="block font-medium">Hình ảnh:</label>
            <input type="file" name="image" accept="image/*" onchange="previewImage(event)" class="block w-full text-sm text-gray-500">
            <img id="imagePreview" class="mt-2 w-32 h-32 object-cover hidden border rounded" />
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Số lượng --}}
        <div>
            <label class="block font-medium">Số lượng trong kho:</label>
            <input type="number" name="stock" value="{{ old('stock', 0) }}" class="w-full border rounded px-3 py-2">
            @error('stock')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Bảo hành --}}
        <div>
            <label class="block font-medium">Thời hạn bảo hành:</label>
            <input type="text" name="warranty_period" value="{{ old('warranty_period') }}" class="w-full border rounded px-3 py-2">
            @error('warranty_period')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Trạng thái --}}
        <div>
            <label class="block font-medium">Trạng thái:</label>
            <select name="stock_status" class="w-full border rounded px-3 py-2">
                <option value="in_stock" {{ old('stock_status') == 'in_stock' ? 'selected' : '' }}>Còn hàng</option>
                <option value="out_of_stock" {{ old('stock_status') == 'out_of_stock' ? 'selected' : '' }}>Hết hàng</option>
            </select>
            @error('stock_status')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Nút submit --}}
        <div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Thêm sản phẩm</button>
        </div>
    </form>
</div>


    @endsection

    @section('scripts')
    {{-- Include any additional scripts here --}}
    <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    {{-- Preview ảnh script --}}
    <script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.classList.remove('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>


@endsection

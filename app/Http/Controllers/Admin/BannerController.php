<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.pages.Banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.pages.Banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $data = $request->except('image');
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('banner/image'), $filename);
            $data['image'] = $filename;
        }
    
        $data['status'] = $request->has('status') ? 'active' : 'inactive';
    
        Banner::create($data);
    
        return redirect()->route('admin.pages.Banners.index')->with('success', 'Thêm banner thành công!');
    }

    public function edit(Banner $banner)
    {
        return view('admin.pages.Banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status') ? 'active' : 'inactive';


        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu tồn tại
            if (!empty($banner->image) && file_exists(public_path('banner/image/' . $banner->image))) {
                unlink(public_path('banner/image/' . $banner->image));
            }
        
            // Xử lý ảnh mới
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('banner/image'), $filename);
        
            // Lưu tên ảnh vào DB
            $data['image'] = $filename;
        }

        $banner->update($data);

        return redirect()->route('admin.pages.Banners.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('admin.pages.Banners.index')->with('success', 'Đã xóa banner!');
    }

    public function toggleStatus($id)
    {
        $banner = Banner::findOrFail($id);

        $banner->status = $banner->status === 'active' ? 'inactive' : 'active';
        $banner->save();

        return response()->json(['status' => $banner->status]);
    }
}
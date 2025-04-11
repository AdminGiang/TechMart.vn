<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.pages.Category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.Category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.pages.Category.index')->with('success', 'Thêm danh mục thành công!');
    }

    public function edit(Category $category)
    {
        return view('admin.pages.Category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id . '|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.pages.Category.index')->with('success', 'Cập nhật danh mục thành công!');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.pages.Category.index')->with('success', 'Xóa danh mục thành công!');
    }

}

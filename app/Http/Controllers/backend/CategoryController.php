<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorys = Category::where('status','=',1)
        ->orderBy('created_at','DESC')
        ->select("id","name","slug","image","status")
        ->paginate(8);
        return view('backend.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorys = Category::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order")
            ->get();
        return view('backend.category.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('images/category'), $filename);
            $category->image = $filename;

            $category->name = $request->name;
            $category->slug = Str::slug($category->name, '-');
            $category->parent_id = $request->parent_id;
            $category->description = $request->description;
            $category->sort_order = $request->sort_order;
            $category->created_by = Auth::id() ?? 1;
            $category->created_at = date('Y-m-d H:i:s');
            $category->status = $request->status;
            $category->save();

            return redirect()
                ->route('admin.category.index')
                ->with('success', 'Thêm thành công');
        } else {
            return back()->with('error', 'Chưa chọn hình');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $category = Category::where('id', $id)->first();

    if ($category === null) {
        return redirect()->back()->with('error', 'Không tồn tại mẫu tin');
    }

    return view('backend.category.show', compact('category'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::where('id', $id)->first();
        $categorys = Category::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order", "status")
            ->get();
        return view('backend.category.edit', compact('category', 'categorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::where('id', $id)->first();
        $category->name = $request->name;
        $category->slug = Str::slug($category->name, '-');
        $category->parent_id = $request->parent_id;

        // Upload file
        if ($request->hasFile('image')) {
            // Xóa hình cũ
            if ($category->image && File::exists(public_path("images/category/" . $category->image))) {
                File::delete(public_path("images/category/" . $category->image));
            }

            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path("images/category"), $filename);
            $category->image = $filename;
        }
        // End upload file
        $category->description = $request->description;
        $category->sort_order = $request->sort_order;
        //$category->updated_by = auth()->id() ?? 1;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->status = $request->status;

        if ($category->save()) {
            return redirect()->route('category.index')->with('success', 'category update successfully');
        }

        return redirect()->back()->with('error', 'Failed to update category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $category = Category::find($id);
        if ($category != null) {
            $category->delete();
            return redirect()->route("admin.category.index")
                ->with('success', "Xóa vào thùng rác thành công");
        }

        return redirect()->route("admin.category.index")
            ->with('error', 'Mẫu tin không tồn tại');
    }

    public function restore(string $id)
    {
        $category = Category::withTrashed()->where('id', $id);
        if ($category->first() != null) {
            $category->restore();
            return redirect()->route("admin.category.trash")
                ->with('success', 'Khôi phục thành công');
        }

        return redirect()->route("admin.category.trash")
            ->with('error', 'Mẫu tin không tồn tại');
    }


    public function destroy(string $id)
    {
        $category = Category::withTrashed()->where('id', $id)->first();
        if ($category != null) {
            // Xóa hình
            if ($category->image && File::exists(public_path("images/category/" . $category->image))) {
                File::delete(public_path("images/category/" . $category->image));
            }

            $category->forceDelete();
            return redirect()->route("category.trash")->with('success', 'Xóa thành công');
        }

        return redirect()->route("category.trash")->with('error', 'Mẫu tin không tồn tại');
    }

    public function status(string $id)
    {
        $category = Category::find($id);

        if ($category) {
            $category->status = !$category->status;
            $category->save();

            return redirect()->route('admin.category.index')
                ->with('success', 'Trạng thái đã được thay đổi thành công');
        }

        return redirect()->route('admin.category.index')
            ->with('error', 'Mẫu tin không tồn tại');
    }
}

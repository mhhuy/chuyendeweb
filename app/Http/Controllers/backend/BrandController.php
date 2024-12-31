<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::where('status', '=', 1)
            ->orderBy('created_at', 'DESC')
            ->select("id", "name", "image", "slug", "status")
            ->paginate(8);
        return view('backend.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order")
            ->get();
        return view('backend.brand.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $brand = new Brand();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('images/brand'), $filename);
            $brand->image = $filename;

            $brand->name = $request->name;
            $brand->slug = Str::slug($brand->name, '-');
            $brand->description = $request->description;
            $brand->sort_order = $request->sort_order;
            $brand->created_by = Auth::id() ?? 1;
            $brand->created_at = date('Y-m-d H:i:s');
            $brand->status = $request->status;
            $brand->save();

            return redirect()
                ->route('admin.brand.index')
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
    $brand = Brand::where('id', $id)->first();

    if ($brand === null) {
        return redirect()->back()->with('error', 'Không tồn tại mẫu tin');
    }

    return view('backend.brand.show', compact('brand'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::where('id', $id)->first();
        $brands = Brand::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order", "status")
            ->get();
        return view('backend.brand.edit', compact('brand', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, string $id)
    {
        $brand = Brand::where('id', $id)->first();
        $brand->name = $request->name;
        $brand->slug = Str::slug($brand->name, '-');

        // Upload file
        if ($request->hasFile('image')) {
            // Xóa hình cũ
            if ($brand->image && File::exists(public_path("images/brand/" . $brand->image))) {
                File::delete(public_path("images/brand/" . $brand->image));
            }

            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path("images/brand"), $filename);
            $brand->image = $filename;
        }
        // End upload file
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order;
        //$brand->updated_by = auth()->id() ?? 1;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->status = $request->status;

        if ($brand->save()) {
            return redirect()->route('brand.index')->with('success', 'brand update successfully');
        }

        return redirect()->back()->with('error', 'Failed to update brand');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $brand = Brand::find($id);
        if ($brand != null) {
            $brand->delete();
            return redirect()->route("admin.brand.index")
                ->with('success', "Xóa vào thùng rác thành công");
        }

        return redirect()->route("admin.brand.index")
            ->with('error', 'Mẫu tin không tồn tại');
    }

    public function restore(string $id)
    {
        $brand = Brand::withTrashed()->where('id', $id);
        if ($brand->first() != null) {
            $brand->restore();
            return redirect()->route("admin.brand.trash")
                ->with('success', 'Khôi phục thành công');
        }

        return redirect()->route("admin.brand.trash")
            ->with('error', 'Mẫu tin không tồn tại');
    }


    public function destroy(string $id)
    {
        $brand = Brand::withTrashed()->where('id', $id)->first();
        if ($brand != null) {
            // Xóa hình
            if ($brand->image && File::exists(public_path("images/brand/" . $brand->image))) {
                File::delete(public_path("images/brand/" . $brand->image));
            }

            $brand->forceDelete();
            return redirect()->route("brand.trash")->with('success', 'Xóa thành công');
        }

        return redirect()->route("brand.trash")->with('error', 'Mẫu tin không tồn tại');
    }

    public function status(string $id)
    {
        $brand = Brand::find($id);

        if ($brand) {
            $brand->status = !$brand->status;
            $brand->save();

            return redirect()->route('admin.brand.index')
                ->with('success', 'Trạng thái đã được thay đổi thành công');
        }

        return redirect()->route('admin.brand.index')
            ->with('error', 'Mẫu tin không tồn tại');
    }
}

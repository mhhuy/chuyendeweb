<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorebannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{

    public function index()
    {
        $banners = Banner::where('status', '=', 1)
            ->orderBy('created_at', 'DESC')
            ->select("id", "name", "link", "image", "position", "status")
            ->paginate(8);
        return view('backend.banner.index', compact('banners'));
    }
    public function create()
    {
        $banners = Banner::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order")
            ->get();
        return view('backend.banner.create', compact('banners'));
    }
    public function store(StorebannerRequest $request)
    {
        $banner = new Banner();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('images/banner'), $filename);
            $banner->image = $filename;
            $banner->name = $request->name;
            $banner->link = $request->link;
            $banner->position = $request->position;
            $banner->description = $request->description;
            $banner->sort_order = $request->sort_order;
            $banner->created_by = Auth::id() ?? 1;
            $banner->created_at = date('Y-m-d H:i:s');
            $banner->status = $request->status;
            $banner->save();

            return redirect()
                ->route('admin.banner.index')
                ->with('success', 'Thêm thành công');
        } else {
            return back()->with('error', 'Chưa chọn hình');
        }
    }

    public function show(string $id)
    {
        $banner = Banner::where('id', $id)->first();

        if ($banner === null) {
            return redirect()->back()->with('error', 'Không tồn tại mẫu tin');
        }

        return view('backend.banner.show', compact('banner'));
    }
    public function edit(string $id)
    {
        $banner = Banner::where('id', $id)->first();
        $banners = Banner::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order", "status")
            ->get();
        return view('backend.banner.edit', compact('banner', 'banners'));
    }
    public function update(UpdateBannerRequest $request, string $id)
    {
        $banner = Banner::where('id', $id)->first();
        $banner->name = $request->name;
        $banner->link = $request->link;

        // Upload file
        if ($request->hasFile('image')) {
            // Xóa hình cũ
            if ($banner->image && File::exists(public_path("images/banner/" . $banner->image))) {
                File::delete(public_path("images/banner/" . $banner->image));
            }

            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path("images/banner"), $filename);
            $banner->image = $filename;
        }
        // End upload file

        $banner->position = $request->position;
        $banner->description = $request->description;
        $banner->sort_order = $request->sort_order;
        //$banner->updated_by = auth()->id() ?? 1;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->status = $request->status;

        if ($banner->save()) {
            return redirect()->route('admin.banner.index')->with('success', 'Banner update successfully');
        }

        return redirect()->back()->with('error', 'Failed to update banner');
    }


    public function delete(string $id)
    {
        $banner = Banner::find($id);
        if ($banner != null) {
            $banner->delete();
            return redirect()->route("admin.banner.index")
                ->with('success', "Xóa vào thùng rác thành công");
        }

        return redirect()->route("admin.banner.index")
            ->with('error', 'Mẫu tin không tồn tại');
    }

    public function restore(string $id)
    {
        $banner = Banner::withTrashed()->where('id', $id);
        if ($banner->first() != null) {
            $banner->restore();
            return redirect()->route("admin.banner.trash")
                ->with('success', 'Khôi phục thành công');
        }

        return redirect()->route("admin.banner.trash")
            ->with('error', 'Mẫu tin không tồn tại');
    }


    public function destroy(string $id)
    {
        $banner = Banner::withTrashed()->where('id', $id)->first();
        if ($banner != null) {
            // Xóa hình
            if ($banner->image && File::exists(public_path("images/banner/" . $banner->image))) {
                File::delete(public_path("images/banner/" . $banner->image));
            }

            $banner->forceDelete();
            return redirect()->route("banner.trash")->with('success', 'Xóa thành công');
        }

        return redirect()->route("banner.trash")->with('error', 'Mẫu tin không tồn tại');
    }

    public function status(string $id)
    {
        $banner = Banner::find($id);

        if ($banner) {
            $banner->status = !$banner->status;
            $banner->save();

            return redirect()->route('admin.banner.index')
                ->with('success', 'Trạng thái đã được thay đổi thành công');
        }

        return redirect()->route('admin.banner.index')
            ->with('error', 'Mẫu tin không tồn tại');
    }
}

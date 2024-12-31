<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('status', '=', '1')
            ->orderBy('created_at', 'Desc')
            ->select('id', 'name', 'category_id', 'product_id', 'slug', 'thumbnail', 'status')
            ->with('category', 'product')
            ->paginate(18);
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order")
            ->get();
        return view('backend.product.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('images/product'), $filename);
            $product->thumbnail = $filename;

            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->product_id = $request->product_id;
            $product->content = $request->content;
            $product->price_buy = $request->price_buy;
            $product->price_sale = $request->price_sale;
            $product->qty = $request->qty;
            $product->slug = Str::slug($product->name, '-');
            $product->description = $request->description;
            $product->created_by = Auth::id() ?? 1;
            $product->created_at = date('Y-m-d H:i:s');
            $product->status = $request->status;
            $product->save();

            return redirect()
                ->route('admin.product.index')
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
    $product = Product::where('id', $id)->first();

    if ($product === null) {
        return redirect()->back()->with('error', 'Không tồn tại mẫu tin');
    }

    return view('backend.product.show', compact('product'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::where('id', $id)->first();
        $products = Product::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order", "status")
            ->get();
        return view('backend.product.edit', compact('product', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::where('id', $id)->first();

        // Upload file
        if ($request->hasFile('image')) {
            // Xóa hình cũ
            if ($product->image && File::exists(public_path("images/product/" . $product->image))) {
                File::delete(public_path("images/product/" . $product->image));
            }

            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path("images/product"), $filename);
            $product->thumbnail = $filename;
        }
        // End upload file
        $product->category_id = $request->category_id;
        $product->product_id = $request->product_id;
        $product->content = $request->content;
        $product->price_buy = $request->price_buy;
        $product->price_sale = $request->price_sale;
        $product->qty = $request->qty;
        $product->slug = Str::slug($product->name, '-');
        $product->description = $request->description;
        //$product->updated_by = auth()->id() ?? 1;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->status = $request->status;

        if ($product->save()) {
            return redirect()->route('product.index')->with('success', 'product update successfully');
        }

        return redirect()->back()->with('error', 'Failed to update product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $product = Product::find($id);
        if ($product != null) {
            $product->delete();
            return redirect()->route("admin.product.index")
                ->with('success', "Xóa vào thùng rác thành công");
        }

        return redirect()->route("admin.product.index")
            ->with('error', 'Mẫu tin không tồn tại');
    }

    public function restore(string $id)
    {
        $product = Product::withTrashed()->where('id', $id);
        if ($product->first() != null) {
            $product->restore();
            return redirect()->route("admin.product.trash")
                ->with('success', 'Khôi phục thành công');
        }

        return redirect()->route("admin.product.trash")
            ->with('error', 'Mẫu tin không tồn tại');
    }


    public function destroy(string $id)
    {
        $product = Product::withTrashed()->where('id', $id)->first();
        if ($product != null) {
            // Xóa hình
            if ($product->image && File::exists(public_path("images/product/" . $product->image))) {
                File::delete(public_path("images/product/" . $product->image));
            }

            $product->forceDelete();
            return redirect()->route("product.trash")->with('success', 'Xóa thành công');
        }

        return redirect()->route("product.trash")->with('error', 'Mẫu tin không tồn tại');
    }

    public function status(string $id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->status = !$product->status;
            $product->save();

            return redirect()->route('admin.product.index')
                ->with('success', 'Trạng thái đã được thay đổi thành công');
        }

        return redirect()->route('admin.product.index')
            ->with('error', 'Mẫu tin không tồn tại');
    }
}

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('status', '=', '1')
            ->with('orderdetail')
            ->orderBy('created_at', 'DESC')
            ->select('id', 'user_id', 'name', 'email', 'phone', 'address')
            ->paginate(10);

        return view('backend.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $order = Order::find($id);
        if ($order != null) {
            $order->delete();
            return redirect()->route("admin.order.index")
                ->with('success', "Xóa vào thùng rác thành công");
        }

        return redirect()->route("admin.order.index")
            ->with('error', 'Mẫu tin không tồn tại');
    }

    public function restore(string $id)
    {
        $order = Order::withTrashed()->where('id', $id);
        if ($order->first() != null) {
            $order->restore();
            return redirect()->route("admin.order.trash")
                ->with('success', 'Khôi phục thành công');
        }

        return redirect()->route("admin.order.trash")
            ->with('error', 'Mẫu tin không tồn tại');
    }


    public function destroy(string $id)
    {
        $order = Order::withTrashed()->where('id', $id)->first();

        if ($order != null) {
            $order->forceDelete();
            return redirect()->route("admin.order.trash")->with('success', 'Xóa thành công');
        }

        return redirect()->route("admin.order.trash")->with('error', 'Mẫu tin không tồn tại');
    }

    public function status(string $id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->status = !$order->status;
            $order->save();

            return redirect()->route('admin.order.index')
                ->with('success', 'Trạng thái đã được thay đổi thành công');
        }

        return redirect()->route('admin.order.index')
            ->with('error', 'Mẫu tin không tồn tại');
    }
}

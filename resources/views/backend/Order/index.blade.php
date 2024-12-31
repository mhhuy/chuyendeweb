<div class="container mx-auto my-5">
    <h1 class="text-2xl font-bold mb-4">Danh Sách Đơn Hàng</h1>

    <table class="table-auto border-collapse border border-slate-400 w-full">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Tên Người Mua</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Số Điện Thoại</th>
                <th class="border px-4 py-2">Địa Chỉ</th>
                <th class="border px-4 py-2">Chi Tiết Đơn Hàng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td class="border px-4 py-2">{{ $order->id }}</td>
                    <td class="border px-4 py-2">{{ $order->name }}</td>
                    <td class="border px-4 py-2">{{ $order->email }}</td>
                    <td class="border px-4 py-2">{{ $order->phone }}</td>
                    <td class="border px-4 py-2">{{ $order->address }}</td>
                    <td class="border px-4 py-2">
                        <!-- Hiển thị chi tiết đơn hàng -->
                        <ul>
                            @foreach ($order->orderDetails as $detail)
                                <li>
                                    <strong>Sản phẩm ID:</strong> {{ $detail->product_id }}<br>
                                    <strong>Số Lượng:</strong> {{ $detail->qty }}<br>
                                    <strong>Giá:</strong> {{ number_format($detail->price, 2) }} VNĐ<br>
                                    <strong>Giảm Giá:</strong> {{ number_format($detail->discount, 2) }} VNĐ<br>
                                    <strong>Thành Tiền:</strong> {{ number_format($detail->amount, 2) }} VNĐ
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>

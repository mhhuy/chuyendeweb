<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('status', '=', 1)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'username', 'fullname', 'gender', 'email', 'phone', 'address', 'roles', 'status')
            ->paginate(10);

        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select("id", "name")
            ->get();
        return view('backend.user.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('images/user'), $filename);
            $user->thumnail = $filename;

            $user->fullname = $request->fullname;
            $user->username = $request->username;
            $user->password = $request->password;
            $user->gender = $request->gender;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->roles = $request->roles;
            $user->created_by = Auth::id() ?? 1;
            $user->created_at = date('Y-m-d H:i:s');
            $user->status = $request->status;
            $user->save();

            return redirect()
                ->route('admin.user.index')
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
    $user = User::where('id', $id)->first();

    if ($user === null) {
        return redirect()->back()->with('error', 'Không tồn tại mẫu tin');
    }

    return view('backend.user.show', compact('user'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();
        $users = User::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order", "status")
            ->get();
        return view('backend.user.edit', compact('user', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::where('id', $id)->first();

        // Upload file
        if ($request->hasFile('image')) {
            // Xóa hình cũ
            if ($user->image && File::exists(public_path("images/user/" . $user->image))) {
                File::delete(public_path("images/user/" . $user->image));
            }

            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path("images/user"), $filename);
            $user->thumbnail = $filename;
        }
        // End upload file
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->roles = $request->roles;
        //$user->updated_by = auth()->id() ?? 1;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->status = $request->status;

        if ($user->save()) {
            return redirect()->route('user.index')->with('success', 'user update successfully');
        }

        return redirect()->back()->with('error', 'Failed to update user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $user = User::find($id);
        if ($user != null) {
            $user->delete();
            return redirect()->route("admin.user.index")
                ->with('success', "Xóa vào thùng rác thành công");
        }

        return redirect()->route("admin.user.index")
            ->with('error', 'Mẫu tin không tồn tại');
    }

    public function restore(string $id)
    {
        $user = User::withTrashed()->where('id', $id);
        if ($user->first() != null) {
            $user->restore();
            return redirect()->route("admin.user.trash")
                ->with('success', 'Khôi phục thành công');
        }

        return redirect()->route("admin.user.trash")
            ->with('error', 'Mẫu tin không tồn tại');
    }


    public function destroy(string $id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        if ($user != null) {
            // Xóa hình
            if ($user->image && File::exists(public_path("images/user/" . $user->image))) {
                File::delete(public_path("images/user/" . $user->image));
            }

            $user->forceDelete();
            return redirect()->route("user.trash")->with('success', 'Xóa thành công');
        }

        return redirect()->route("user.trash")->with('error', 'Mẫu tin không tồn tại');
    }

    public function status(string $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->status = !$user->status;
            $user->save();

            return redirect()->route('admin.user.index')
                ->with('success', 'Trạng thái đã được thay đổi thành công');
        }

        return redirect()->route('admin.user.index')
            ->with('error', 'Mẫu tin không tồn tại');
    }
}

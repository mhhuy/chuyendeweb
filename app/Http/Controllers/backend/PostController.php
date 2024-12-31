<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('status', '=', '1')
            ->with('topic')
            ->orderBy('created_at', 'DESC')
            ->select('id', 'topic_id', 'title', 'slug', 'content', 'description', 'thumbnail', 'type')
            ->paginate(10);

        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order")
            ->get();
        return view('backend.post.create', compact('posts'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('images/post'), $filename);
            $post->thumbnail = $filename;

            $post->title = $request->title;
            $post->topic_id = $request->topic_id;
            $post->slug = Str::slug($post->title, '-');
            $post->content = $request->content;
            $post->description = $request->description;
            $post->sort_order = $request->sort_order;
            $post->created_by = Auth::id() ?? 1;
            $post->created_at = date('Y-m-d H:i:s');
            $post->status = $request->status;
            $post->save();

            return redirect()
                ->route('admin.post.index')
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
    $post = Post::where('id', $id)->first();

    if ($post === null) {
        return redirect()->back()->with('error', 'Không tồn tại mẫu tin');
    }

    return view('backend.post.show', compact('post'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::where('id', $id)->first();
        $posts = Post::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order", "status")
            ->get();
        return view('backend.post.edit', compact('post', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $post = Post::where('id', $id)->first();
        $post->name = $request->name;
        $post->topic_id = $request->topic_id;
        $post->slug = Str::slug($post->title, '-');
        $post->content = $request->content;

        // Upload file
        if ($request->hasFile('image')) {
            // Xóa hình cũ
            if ($post->image && File::exists(public_path("images/post/" . $post->image))) {
                File::delete(public_path("images/post/" . $post->image));
            }

            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path("images/post"), $filename);
            $post->image = $filename;
        }
        // End upload file
        $post->description = $request->description;
        //$post->updated_by = auth()->id() ?? 1;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->status = $request->status;

        if ($post->save()) {
            return redirect()->route('post.index')->with('success', 'post update successfully');
        }

        return redirect()->back()->with('error', 'Failed to update post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $post = Post::find($id);
        if ($post != null) {
            $post->delete();
            return redirect()->route("admin.post.index")
                ->with('success', "Xóa vào thùng rác thành công");
        }

        return redirect()->route("admin.post.index")
            ->with('error', 'Mẫu tin không tồn tại');
    }

    public function restore(string $id)
    {
        $post = Post::withTrashed()->where('id', $id);
        if ($post->first() != null) {
            $post->restore();
            return redirect()->route("admin.post.trash")
                ->with('success', 'Khôi phục thành công');
        }

        return redirect()->route("admin.post.trash")
            ->with('error', 'Mẫu tin không tồn tại');
    }


    public function destroy(string $id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        if ($post != null) {
            // Xóa hình
            if ($post->image && File::exists(public_path("images/post/" . $post->image))) {
                File::delete(public_path("images/post/" . $post->image));
            }

            $post->forceDelete();
            return redirect()->route("post.trash")->with('success', 'Xóa thành công');
        }

        return redirect()->route("post.trash")->with('error', 'Mẫu tin không tồn tại');
    }

    public function status(string $id)
    {
        $post = Post::find($id);

        if ($post) {
            $post->status = !$post->status;
            $post->save();

            return redirect()->route('admin.post.index')
                ->with('success', 'Trạng thái đã được thay đổi thành công');
        }

        return redirect()->route('admin.post.index')
            ->with('error', 'Mẫu tin không tồn tại');
    }
}

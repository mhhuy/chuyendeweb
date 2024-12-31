<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics = Topic::where('status', '=', 1)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name', 'slug', 'sort_order', 'description', 'created_by', 'updated_by', 'status')
            ->paginate(10);
        return view('backend.topic.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topics = Topic::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order")
            ->get();
        return view('backend.topic.create', compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request)
    {
        $topic = new Topic();

        $topic->name = $request->name;
        $topic->slug = Str::slug($topic->name, '-');
        $topic->description = $request->description;
        $topic->sort_order = $request->sort_order;
        $topic->created_by = Auth::id() ?? 1;
        $topic->created_at = date('Y-m-d H:i:s');
        $topic->status = $request->status;
        $topic->save();

        return redirect()
            ->route('admin.topic.index')
            ->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $topic = Topic::where('id', $id)->first();

    if ($topic === null) {
        return redirect()->back()->with('error', 'Không tồn tại mẫu tin');
    }

    return view('backend.topic.show', compact('topic'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic = Topic::where('id', $id)->first();
        $topics = Topic::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order", "status")
            ->get();
        return view('backend.topic.edit', compact('topic', 'topics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, string $id)
    {
        $topic = Topic::where('id', $id)->first();
        $topic->name = $request->name;
        $topic->slug = Str::slug($topic->name, '-');
        $topic->description = $request->description;
        $topic->sort_order = $request->sort_order;
        //$topic->updated_by = auth()->id() ?? 1;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->status = $request->status;

        if ($topic->save()) {
            return redirect()->route('admin.topic.index')->with('success', 'topic update successfully');
        }

        return redirect()->back()->with('error', 'Failed to update topic');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $topic = Topic::find($id);
        if ($topic != null) {
            $topic->delete();
            return redirect()->route("admin.topic.index")
                ->with('success', "Xóa vào thùng rác thành công");
        }

        return redirect()->route("admin.topic.index")
            ->with('error', 'Mẫu tin không tồn tại');
    }

    public function restore(string $id)
    {
        $topic = Topic::withTrashed()->where('id', $id);
        if ($topic->first() != null) {
            $topic->restore();
            return redirect()->route("admin.topic.trash")
                ->with('success', 'Khôi phục thành công');
        }

        return redirect()->route("admin.topic.trash")
            ->with('error', 'Mẫu tin không tồn tại');
    }


    public function destroy(string $id)
    {
        $topic = Topic::withTrashed()->where('id', $id)->first();
        if ($topic != null) {
            $topic->forceDelete();
            return redirect()->route("topic.trash")->with('success', 'Xóa thành công');
        }

        return redirect()->route("topic.trash")->with('error', 'Mẫu tin không tồn tại');
    }

    public function status(string $id)
    {
        $topic = Topic::find($id);

        if ($topic) {
            $topic->status = !$topic->status;
            $topic->save();

            return redirect()->route('admin.topic.index')
                ->with('success', 'Trạng thái đã được thay đổi thành công');
        }

        return redirect()->route('admin.topic.index')
            ->with('error', 'Mẫu tin không tồn tại');
    }
}

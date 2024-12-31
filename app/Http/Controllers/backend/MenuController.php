<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::orderBy('created_at', 'DESC')
        ->select(
            'id',
            'name',
            'link',
            'type',
            'position',
            'table_id',
            'sort_order',
            'parent_id',
            'created_by',
            'updated_by',
            'created_at',
            'status'
        )
        ->paginate(10); // Phân trang 10 mục mỗi lần

    return view('backend.menu.index', compact('menus'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        if ($request->has('ADDmenu')) {
            $listId = $request->menuId;
            foreach ($listId as $id) {
                $menu = menu::find($id);
                $menu = new Menu();
                $menu->name = $menu->name;
                $menu->link = $menu->slug;
                $menu->type = 'menu';
                $menu->position = $request->position;
                $menu->parent_id = 0;
                $menu->table_id = $id;
                $menu->sort_order = 0;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->created_by = Auth::id() ?? 1;
                $menu->status = 2;

                $menu->save();
            }

            return redirect()->route('menus.index')->with('success', 'Created menu successfully!');
        }

        if ($request->has('ADDCATEGORY')) {
            $listId = $request->categoryId;
            foreach ($listId as $id) {
                $category = Category::find($id);
                $menu = new Menu();
                $menu->name = $category->name;
                $menu->link = $category->slug;
                $menu->type = 'category';
                $menu->position = $request->position;
                $menu->parent_id = 0;
                $menu->table_id = $id;
                $menu->sort_order = 0;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->created_by = Auth::id() ?? 1;
                $menu->status = 2;

                $menu->save();
            }

            return redirect()->route('menus.index')->with('success', 'Created menu successfully!');
        }

        if ($request->has('ADDPAGE')) {
            $listId = $request->pageId;
            foreach ($listId as $id) {
                $page = Post::find($id);
                $menu = new Menu();
                $menu->name = $page->title;
                $menu->link = $page->slug;
                $menu->type = 'page';
                $menu->position = $request->position;
                $menu->parent_id = 0;
                $menu->table_id = $id;
                $menu->sort_order = 0;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->created_by = Auth::id() ?? 1;
                $menu->status = 2;

                $menu->save();
            }

            return redirect()->route('menus.index')->with('success', 'Created menu successfully!');
        }

        if ($request->has('ADDTOPIC')) {
            $listId = $request->topicId;
            foreach ($listId as $id) {
                $topic = Topic::find($id);
                $menu = new Menu();
                $menu->name = $topic->name;
                $menu->link = $topic->slug;
                $menu->type = 'topic';
                $menu->position = $request->position;
                $menu->parent_id = 0;
                $menu->table_id = $id;
                $menu->sort_order = 0;
$menu->created_at = date('Y-m-d H:i:s');
                $menu->created_by = Auth::id() ?? 1;
                $menu->status = 2;

                $menu->save();
            }

            return redirect()->route('menus.index')->with('success', 'Created menu successfully!');
        }

        if ($request->has('ADDCUSTOM')) {
            $menu = new Menu();

            $menu->name = $request->name;
            $menu->link = $request->link;
            $menu->position = $request->position;
            $menu->type = 'custom';
            $menu->parent_id = 0;
            $menu->sort_order = 0;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = Auth::id() ?? 1;
            $menu->status = 2;

            $menu->save();

            return redirect()->route('menus.index')->with('success', 'Created menu successfully!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $menu = Menu::where('id', $id)->first();

    if ($menu === null) {
        return redirect()->back()->with('error', 'Không tồn tại mẫu tin');
    }

    return view('backend.menu.show', compact('menu'));
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
    public function update(UpdateMenuRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $menu = Menu::find($id);
        if ($menu != null) {
            $menu->delete();
            return redirect()->route("admin.menu.index")
                ->with('success', "Xóa vào thùng rác thành công");
        }

        return redirect()->route("admin.menu.index")
            ->with('error', 'Mẫu tin không tồn tại');
    }

    public function restore(string $id)
    {
        $menu = Menu::withTrashed()->where('id', $id);
        if ($menu->first() != null) {
            $menu->restore();
            return redirect()->route("admin.menu.trash")
                ->with('success', 'Khôi phục thành công');
        }

        return redirect()->route("admin.menu.trash")
            ->with('error', 'Mẫu tin không tồn tại');
    }


    public function destroy(string $id)
    {
        $menu = Menu::withTrashed()->where('id', $id)->first();

        if ($menu != null) {
            $menu->forceDelete();
            return redirect()->route("admin.menu.trash")->with('success', 'Xóa thành công');
        }

        return redirect()->route("admin.menu.trash")->with('error', 'Mẫu tin không tồn tại');
    }

    public function status(string $id)
    {
        $menu = Menu::find($id);

        if ($menu) {
            $menu->status = !$menu->status;
            $menu->save();

            return redirect()->route('admin.menu.index')
                ->with('success', 'Trạng thái đã được thay đổi thành công');
        }

        return redirect()->route('admin.menu.index')
            ->with('error', 'Mẫu tin không tồn tại');
    }
}

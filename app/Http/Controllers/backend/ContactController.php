<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::where('status', '=', 1)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name', 'email', 'phone', 'title', 'content', 'reply_id', 'user_id', 'created_by', 'updated_by', 'created_at', 'status')
            ->paginate(10);
        return view('backend.contact.index', compact('contacts'));
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
        $contact = Contact::where('id', $id)->first();

        if ($contact === null) {
            return redirect()->back()->with('error', 'Không tồn tại mẫu tin');
        }

        return view('backend.contact.show', compact('contact'));
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
    public function update(UpdateContactRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $contact = Contact::find($id);
        if ($contact != null) {
            $contact->delete();
            return redirect()->route("admin.contact.index")
                ->with('success', "Xóa vào thùng rác thành công");
        }

        return redirect()->route("admin.contact.index")
            ->with('error', 'Mẫu tin không tồn tại');
    }

    public function restore(string $id)
    {
        $contact = Contact::withTrashed()->where('id', $id);
        if ($contact->first() != null) {
            $contact->restore();
            return redirect()->route("admin.contact.trash")
                ->with('success', 'Khôi phục thành công');
        }

        return redirect()->route("admin.contact.trash")
            ->with('error', 'Mẫu tin không tồn tại');
    }


    public function destroy(string $id)
    {
        $contact = Contact::withTrashed()->where('id', $id)->first();

        if ($contact != null) {
            $contact->forceDelete();
            return redirect()->route("admin.contact.trash")->with('success', 'Xóa thành công');
        }

        return redirect()->route("admin.contact.trash")->with('error', 'Mẫu tin không tồn tại');
    }


    public function status(string $id)
    {
        $contact = Contact::find($id);

        if ($contact) {
            $contact->status = !$contact->status;
            $contact->save();

            return redirect()->route('admin.contact.index')
                ->with('success', 'Trạng thái đã được thay đổi thành công');
        }

        return redirect()->route('admin.contact.index')
            ->with('error', 'Mẫu tin không tồn tại');
    }
}

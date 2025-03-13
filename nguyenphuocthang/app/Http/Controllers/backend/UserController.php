<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = User::where('status', '!=', 0)
            ->select("id", "name", "username", "password", "gender", "phone", "email")
            ->orderBy('created_at', 'DESC')
            ->get();
        return view("backend.user.index", compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = User::where('status', '!=', 0)
            ->select("id", "name", "username", "password", "gender", "phone", "email")
            ->orderBy('created_at', 'DESC')
            ->get();
        return view("backend.user.create", compact('list'));
    }

    /**
     * Store a newly created resource in storge.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->status = $request->status;
        $user->roles = $request->roles;
        $user->email = $request->email;
        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["jpg", "png", "gif", "webp"])) {
                $filename = $user->username . "." . $exten;
                $request->image->move(public_path("images/products"), $filename);
                $user->image = $filename;
            }
        }
        $user->address = $request->address;
        $user->remember_token = $request->remember_token;
        $user->created_at = date('Y-m-d H:i:s');
        $user->created_by = Auth::id() ?? 1;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1;
        $user->save();
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('backend.user.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.user.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->status = $request->status;
        $user->email = $request->email;
        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["jpg", "png", "gif", "webp"])) {
                $filename = $user->username . "." . $exten;
                $request->image->move(public_path("images/products"), $filename);
                $user->image = $filename;
            }
        }
        $user->address = $request->address;
        $user->remember_token = $request->remember_token;
        $user->created_at = date('Y-m-d H:i:s');
        $user->created_by = Auth::id() ?? 1;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1;
        $user->save();
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->delete();
        return redirect()->route('admin.user.trash');
    }
    public function delete(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->status = 0;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1;
        $user->save();
        return redirect()->route('admin.user.index');
    }
    //status
    public function status(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->status = ($user->status == 1) ? 2 : 1;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1;
        $user->save();
        return redirect()->route('admin.user.index');
    }
    public function trash()
    {
        $list = User::where('status', '!=', 0)
            ->select("id", "name", "username", "password", "gender", "phone", "email")
            ->orderBy('created_at', 'DESC')
            ->get();
        return view("backend.user.trash", compact('list'));
    }
    public function restore(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->status = 2;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id() ?? 1;
        $user->save();
        return redirect()->route('admin.user.trash');
    }
}
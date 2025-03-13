<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Banner::where('status', '!=', 0)
            ->select("id", "image", "name", "status", "created_by", "link", "position")
            ->orderBy('created_at', 'DESC')
            ->get();
        return view("backend.banner.index", compact('list'));

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

        $banner = new Banner();
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->position = $request->position;
        $banner->description = $request->description;
        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["jpg", "png", "gif", "webp"])) {
                $filename = $banner->name . "." . $exten;
                $request->image->move(public_path("images/banners"), $filename);
                $banner->image = $filename;
            }
        }
        $banner->status = $request->status;
        $banner->created_at = $request = date('Y-m-d H:i:s');
        $banner->created_by = Auth::id() ?? 1;
        $banner->save();
        return redirect()->route('admin.banner.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        return view('backend.banner.show', compact("banner"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $list = Banner::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select("id", "name", "link", "position")
            ->get();
        $htmlposition = "";
        foreach ($list as $row) {
            if ($banner->position == $row->id) {
                $htmlposition .= "<option selected value='" . $row->id . "'>" .
                    $row->name . "</option>";
            } else {
                $htmlposition .= "<option value='" . $row->id . "'>" . $row->name . "</option>";
            }
        }

        return view('backend.banner.edit', compact("list", "banner", "htmlposition"));
    }
    public function trash()
    {

        $list = Banner::where('status', '=', 0)
            ->orderBy('created_at', 'DESC')
            ->select("id", "name", "link", "status")
            ->get();


        return view('backend.banner.trash', compact("list"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->name = $request->name;
        $banner->description = $request->description;

        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["jpg", "png", "gif", "webp"])) {
                $filename = $banner->slug . "." . $exten;
                $request->image->move(public_path("images/banners"), $filename);
                $banner->image = $filename;
            }
        }
        $banner->updated_at = $request = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;
        $banner->save();
        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->delete();
        return redirect()->route('admin.banner.trash');
    }
    public function status(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->status = ($banner->status == 1) ? 2 : 1;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;
        $banner->save();
        return redirect()->route('admin.banner.index');
    }
    public function delete(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->status = 0;
        $banner->updated_at = $request = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;
        $banner->save();

        return redirect()->route('admin.banner.index');
    }
    public function restore(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->status = 2;
        $banner->updated_at = $request = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;
        $banner->save();

        return redirect()->route('admin.banner.trash');
    }


}
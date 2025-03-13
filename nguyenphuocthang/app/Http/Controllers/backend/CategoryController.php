<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $list = Category::where('status', '!=', 0)
            ->select("id", "image", "name", "slug", "sort_order", "status", "description")
            ->orderBy('created_at', 'DESC')
            ->get();
        $htmlsortorder = "";
        foreach ($list as $item) {
            $htmlsortorder .= "<option value='" . ($item->sort_order + 1) . "'>sau: " . $item->name . "</option>";
        }
        $htmlparentid = "";
        foreach ($list as $item) {
            $htmlparentid .= "<option value='" . ($item->parent_id + 1) . "'>sau: " . $item->name . "</option>";
        }
        return view('backend.category.index', compact('list', 'htmlsortorder', 'htmlparentid'));
    }

    public function trash()
    {
        $list = Category::where('status', '=', 0)
            ->select("id", "image", "name", "slug", "sort_order", "status", "description")
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('backend.category.trash', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;
        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["jpg", "png", "gif", "webp"])) {
                $filename = $category->slug . "." . $exten;
                $request->image->move(public_path("images/categorys"), $filename);
                $category->image = $filename;
            }
        }
        $category->status = $request->status;
        $category->slug = Str::of($request->name)->slug('-');
        $category->created_at = date('Y-m-d H:i:s');
        $category->created_by = Auth::id() ?? 1;
        $category->save();
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        return view('backend.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $list = Category::where('status', '!=', 0)
            ->select("id", "name", "sort_order")
            ->orderBy('created_at', 'DESC')
            ->get();
        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $row) {
            if ($category->parent_id == $row->id) {
                $htmlparentid .= "<option selected value='" . $row->id . "'>sau: " . $row->name . "</option>";
            } else {
                $htmlparentid .= "<option value='" . $row->id . "'>sau: " . $row->name . "</option>";
            }

            if ($category->sort_order - 1 == $row->sort_order) {
                $htmlsortorder .= "<option selected value='" . ($row->sort_order + 1) . "'>sau: " . $row->name . "</option>";

            } else {
                $htmlsortorder .= "<option value='" . ($row->parent_id + 1) . "'>sau: " . $row->name . "</option>";

            }
        }
        return view('backend.category.edit', compact('category', 'list', 'htmlsortorder', 'htmlparentid'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;
        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["jpg", "png", "gif", "webp"])) {
                $filename = $category->slug . "." . $exten;
                $request->image->move(public_path("images/categorys"), $filename);
                $category->image = $filename;
            }
        }
        $category->status = $request->status;
        $category->slug = Str::of($request->name)->slug('-');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        $category->save();
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->delete();
        return redirect()->route('admin.category.trash');
    }
    //status
    public function status(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->status = ($category->status == 1) ? 2 : 1;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        $category->save();
        return redirect()->route('admin.category.index');
    }
    //delete
    public function delete(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->status = 0;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        $category->save();
        return redirect()->route('admin.category.index');
    }
    //restore
    public function restore(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->status = 2;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        $category->save();
        return redirect()->route('admin.category.trash');
    }
}
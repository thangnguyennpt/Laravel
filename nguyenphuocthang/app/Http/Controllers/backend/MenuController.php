<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Post;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Menu::where('status', '!=', 0)
            ->select("id", "name", "link", "type", "position", "table_id", "parent_id")
            ->orderBy('created_at', 'DESC')
            ->get();
        $list_category = Category::where('status', '!=', 0)
            ->select("id", "name")
            ->orderBy('created_at', 'DESC')
            ->get();
        $list_brand = Brand::where('status', '!=', 0)
            ->select("id", "name")
            ->orderBy('created_at', 'DESC')
            ->get();
        $list_topic = Topic::where('status', '!=', 0)
            ->select("id", "name")
            ->orderBy('created_at', 'DESC')
            ->get();
        $list_page = Post::where([['status', '!=', 0],['type', '=', 'page']])
            ->select("id", "title")
            ->orderBy('created_at', 'DESC')
            ->get();
        return view("backend.menu.index", compact('list', 'list_category', 'list_brand', 'list_topic', 'list_page'));
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
        if (isset($request->createCategory)) {
            $listid = $request->categoryid;

            if ($listid) {
                foreach ($listid as $id) {
                    $category = Category::find($id);

                    if ($category != null) {
                        $menu = new Menu();
                        $menu->name = $category->name;
                        $menu->link = 'danh-muc/' . $category->slug;
                        $menu->sort_order = '0';
                        $menu->parent_id = '0';
                        $menu->type = 'category';
                        $menu->position = $request->postion; // Fixing the missing position field
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            } else {
                echo "none";
            }
        }

        if (isset($request->createBrand)) {
            $listid = $request->brandid;

            if ($listid) {
                foreach ($listid as $id) {
                    $brand = Brand::find($id);

                    if ($brand != null) {
                        $menu = new Menu();
                        $menu->name = $brand->name;
                        $menu->link = 'thuong-hieu/' . $brand->slug;
                        $menu->sort_order = '0';
                        $menu->parent_id = '0';
                        $menu->type = 'brand';
                        $menu->position = $request->postion; // Fixing the missing position field
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            } else {
                echo "none";
            }
        }

        if (isset($request->createTopic)) {
            $listid = $request->topicid;
            if ($listid) {
                foreach ($listid as $id) {
                    $topic = Topic::find($id);
                    if ($topic != null) {
                        $menu = new Menu();
                        $menu->name = $topic->name;
                        $menu->link = 'topic/' . $topic->slug;
                        $menu->sort_order = '0';
                        $menu->parent_id = '0';
                        $menu->type = 'topic';
                        $menu->position = $request->postion;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            } else {
                echo "none";
            }
        }
        if (isset($request->createPage)) {
            $listid = $request->pageid;
            if ($listid) {
                foreach ($listid as $id) {
                    $page = Post::where([['id', '=', $id], ['type', '=', 'page']])->first();
                    if ($page != null) {
                        $menu = new Menu();
                        $menu->name = $page->title;
                        $menu->link = 'page/' . $page->slug;
                        $menu->sort_order = '0';
                        $menu->parent_id = '0';
                        $menu->type = 'page';
                        $menu->position = $request->postion;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            } else {
                echo "none";
            }
        }
        if (isset($request->createCustom)) {
            if (isset($request->createCustom)) {
                $menu = new Menu();
                $menu->name = $request->name;
                $menu->link = $request->link;
                $menu->sort_order = '0';
                $menu->parent_id = '0';
                $menu->type = 'custom';
                $menu->position = $request->postion;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->created_by = Auth::id() ?? 1;
                $menu->status = $request->status;
                $menu->save();
    
                return redirect()->route('admin.menu.index');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('backend.menu.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.menu.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
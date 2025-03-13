<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $list = Product::where('product.status', '!=', 0)
            ->join('category', 'product.category_id', '=', 'category.id')
            ->join('brand', 'product.brand_id', '=', 'brand.id')
            ->select("product.id", "product.image", "product.name", "product.detail", "product.description", "product.price", "product.slug", "product.status", "category.name as categoryname", "brand.name as brandname")
            ->orderBy('product.created_at', 'DESC')
            ->get();

        return view('backend.product.index', compact('list'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Product::where('product.status', '!=', 0)
            ->join('category', 'product.category_id', '=', 'category.id')
            ->join('brand', 'product.brand_id', '=', 'brand.id')
            ->select("product.id", "product.image", "product.name", "product.detail", "product.description", "product.price", "product.slug", "product.status", "category.name as categoryname", "brand.name as brandname")
            ->orderBy('product.created_at', 'DESC')
            ->get();

        $list_category = Category::where('status', '!=', 0)
            ->select("id", "name")
            ->orderBy('created_at', 'DESC')
            ->get();

        $list_brand = Brand::where('status', '!=', 0)
            ->select("id", "name")
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('backend.product.create', compact('list', 'list_category', 'list_brand'));
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
                        $product = new Product();
                        $product->name = $category->name;
                        $product->link = 'danh-muc/' . $category->slug;
                        $product->sort_order = '0';
                        $product->parent_id = '0';
                        $product->type = 'category';
                        $product->position = $request->postion; // Fixing the missing position field
                        $product->table_id = $id;
                        $product->created_at = date('Y-m-d H:i:s');
                        $product->created_by = Auth::id() ?? 1;
                        $product->status = $request->status;
                        $product->save();
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
                        $product = new Product();
                        $product->name = $brand->name;
                        $product->link = 'thuong-hieu/' . $brand->slug;
                        $product->sort_order = '0';
                        $product->parent_id = '0';
                        $product->type = 'brand';
                        $product->position = $request->postion; // Fixing the missing position field
                        $product->table_id = $id;
                        $product->created_at = date('Y-m-d H:i:s');
                        $product->created_by = Auth::id() ?? 1;
                        $product->status = $request->status;
                        $product->save();
                    }
                }
                return redirect()->route('admin.menu.index');
            } else {
                echo "none";
            }
        }

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->slug = Str::of($request->name)->slug('-');
        $product->detail = $request->detail;

        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["jpg", "png", "gif", "webp"])) {
                $filename = $product->slug . "." . $exten;
                $request->image->move(public_path("images/products"), $filename);
                $product->image = $filename;
            }
        }
        $product->status = $request->status;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = Auth::id() ?? 1;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
        $product->save();
        return redirect()->route('admin.product.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        return view('backend.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $list = Product::where('status', '!=', 0)
            ->select("id", "name")
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('backend.product.edit', compact('product', 'list'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->slug = Str::of($request->name)->slug('-');
        $product->detail = $request->detail;

        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["jpg", "png", "gif", "webp", "jfif"])) {
                $filename = $product->slug . "." . $exten;
                $request->image->move(public_path("images/products"), $filename);
                $product->image = $filename;
            }
        }
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
        $product->save();
        return redirect()->route('admin.product.index');
    }

    public function trash()
    { 
        $list=Product::where('status','=',0)
        ->orderBy('created_at','DESC')
        ->select("product.id", "product.image", "product.name", "product.detail", "product.description", "product.price", "product.slug", "product.status")
        ->get();
        return view('backend.product.trash',compact("list"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->delete();
        return redirect()->route('admin.product.trash');
    }
    //status
    public function status(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->status = ($product->status == 1) ? 2 : 1;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
        $product->save();
        return redirect()->route('admin.product.index');
    }
    //delete
    public function delete(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->status = 0;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
        $product->save();
        return redirect()->route('admin.product.index');
    }
    //restore
    public function restore(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->status = 2;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
        $product->save();
        return redirect()->route('admin.product.trash');
    }
}
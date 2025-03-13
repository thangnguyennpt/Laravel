<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Menu;

class ProductController extends Controller
{
    //product all
    public function index()
    {
        $list_menu = Menu::get();
        $list_product = Product::where('status', '=', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        return view('frontend.product', compact('list_product', 'list_menu'));
    }
    //get list category
    public function getlistcategoryid($rowid)
    {
        $listcaid = [];

        array_push($listcaid, $rowid);
        $list1 = Category::where([['parent_id', '=', $rowid], ['status', '=', 1]])
            ->select("id")
            ->get();
        if (count($list1) > 0) {
            foreach ($list1 as $row1) {
                array_push($listcaid, $row1->id);
                $list2 = Category::where([['parent_id', '=', $row1->id], ['status', '=', 1]])
                    ->select("id")
                    ->get();
                if (count($list1) > 0) {
                    foreach ($list2 as $row2) {
                        array_push($listcaid, $row2->id);
                    }
                }
            }
        }
        return $listcaid;
    }
    //product category
    public function category($slug)
    {
        $list_menu = Menu::get();
        $row = Category::where([['slug', '=', $slug], ['status', '=', 1]])
            ->select("id", "name", "slug")
            ->first();
        $listcaid = [];
        if ($row != null) {
            $listcaid = $this->getlistcategoryid($row->id);
        }
        $list_product = Product::where('status', '=', 1)
            ->whereIn("category_id", $listcaid)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        return view('frontend.product_category', compact('list_product', 'row', 'listcaid', 'list_menu'));
    }
    public function product_detail($slug)
    {
        $product = Product::where([['status', '=', 1], ['slug', '=', $slug]])->first();
        $listcaid = $this->getlistcategoryid($product->category_id);

        $list_product = Product::where([['status', '=', 1], ['id', '!=', $product->id]])
            ->whereIn("category_id", $listcaid)
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();
        return view('frontend.product_detail', compact('product', 'list_product'));
    }
    public function getlistbrandid($rowid)
    {
        return [$rowid];
    }

    //product brand
    public function brand($slug)
    {
        $list_menu = Menu::get();

        $row = Brand::where([['slug', '=', $slug], ['status', '=', 1]])
            ->select("id", "name", "slug")
            ->first();
        $listbraid = [];
        if ($row != null) {
            $listbraid = $this->getlistbrandid($row->id);
        }
        $list_product = Product::where('status', '=', 1)
            ->whereIn("brand_id", $listbraid)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        return view('frontend.product_brand', compact('list_product', 'row', 'listbraid', 'list_menu'));
    }

    public function search(Request $request)
    {
        $productName = $request->input('product'); // Assuming 'product' is the name attribute of your search input

        $list_product = Product::where('status', '=', 1)
            ->where('name', 'like', '%' . $productName . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('frontend.product_search', compact('list_product'));
    }

}
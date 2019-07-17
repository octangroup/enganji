<?php

namespace App\Http\Controllers\Admin;

use App\Events\Admin\ProductApproved;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    /*
     * This function displays the index page of products in admin side
     */
    public function index()
    {
        $products = Product::get();
        $categories = Category::get();
        $conditions = Condition::get();
        $brands = Brand::get();
        return view('admin.products.index', compact('products', 'categories', 'conditions', 'brands'));
    }

    /*
     * This method changes the status of a product
     */
    public function changeStatus($id)
    {
        $product = Product::findorfail($id);

        if (!$product->isActive()) {
            $product->activate();
            event(new ProductApproved($product));
            Session::flash('success', 'The Product has been activated');
            return back();
        }
        $product->deactivate();
        Session::flash('success', 'The Product has been deactivated');
        return back();
    }

    public function search(Request $request)
    {     // function to search product according to the keyword which will be input

        $keyword = $request->keyword;
        $conditions = Condition::get();
        $categories = Category::get();
        $subcategories = SubCategory::get();
        $brands = Brand::get();
        $currencies = Currency::get();
        $products = Product::where('name', 'like', '%' . $keyword . '%')->get();
        return view('admin.products.index', compact('products', 'keyword', 'conditions', 'subcategories', 'brands', 'currencies', 'categories'));
    }

    public function filter(Request $request)
    {    // function which will filter according to the brand, categories, price and condition of product
        $this->validate($request, [
            'categories' => 'nullable',
            'categories.*' => 'int|exists:categories,id',
            'price' => 'nullable',
            'price.*' => 'price',
            'conditions' => 'nullable',
            'conditions.*' => 'int|exists:conditions,id',
            'brands' => 'nullable',
            'brands.*' => 'int|exists:brands,id'
        ]);

        $categories = Category::get();
        $conditions = Condition::get();
        $brands = Brand::get();
        $query = Product::query();

        if ($request->categories) {
            foreach ($request->categories as $category) {
                $query = $query->whereHas('subcategory', function ($q) use ($category) {
                    $q->where('category_id', $category);
                });
            }
        }

        if ($request->conditions) {
            foreach ($request->conditions as $condition) {
                $query = $query->where('condition_id', $condition);
            }
        }

        if ($request->brands) {
            foreach ($request->brands as $brand) {
                $query = $query->where('brand_id', $brand);
            }
        }

        if ($request->price) {
            foreach ($request->price as $price) {
                $query = $query->where('price', $price);
            }
        }
        $products = $query->get();

        return view('admin.products.index', compact('products', 'brands', 'conditions', 'categories'));

    }
}

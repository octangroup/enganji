<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProductFilterForm;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;


class ProductsController extends Controller
{
    //

    public function index(ProductFilterForm $filterForm, $categoryName, $categoryId, $subcategoryName = null, $subcategoryId = null)
    {

        $query = Product::query();
        $category = Category::with('subcategories')->findOrFail($categoryId);

        if ($subcategoryId) {
            Subcategory::whereHas('category')->findOrFail($subcategoryId);
            $query = $query->where('subcategory_id', $subcategoryId);
        } else {
            $query = $query->whereHas(
                'subcategory', function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            }
            );
        }
        $query = $query->whereActive();
        $brands = $this->findBrands($query);
        $conditions = $this->findConditions($query);
        $query = $filterForm->handle($query);
        $products = $query->with('currency', 'brand', 'affiliate')->get();
        $attributes = $filterForm;

        return view('product.index', compact('products', 'brands', 'conditions', 'attributes', 'category'));
    }


    /**
     * @param ProductFilterForm $filterForm
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(ProductFilterForm $filterForm)
    {
        $categories = Category::get();
        $query = Product::query();
        $query = $query->whereActive();
        $brands = $this->findBrands($query);
        $query = $filterForm->handle($query);
        $products = $query->with('currency', 'brand', 'affiliate')->paginate(25);
        $attributes = $filterForm;
        $keyword = $filterForm->keyword;
        $attributes_mobile = json_encode($filterForm->toArray());
        return view(
            'product.index', compact(
                'products',
                'brands', 'attributes',
                'attributes_mobile',
                'categories', 'keyword'
            )
        );
    }

    /*
     * function to each product that is clicked on
     */
    public function show($id)
    {

        $product = Product::with(
            'affiliate',
            'currency',
            'reviews.user'
        )->with(
            ['category.subcategory.products' => function ($q) {
                $q->whereActive();
            }],
            ['subcategory.products' => function ($q) {
                $q->whereActive();
            }]
        )
            ->findOrFail($id);
        $medias = collect();
        $thumbnails = collect();
        foreach ($product->getMedia() as $media) {
            $medias->push($media->getFullUrl('main'));
            $thumbnails->push($media->getFullUrl('thumb'));
        }

        $similar_products = $product->subcategory->products()->with('currency', 'brand')->where('id', '!=', $product->id)->get()->take(15);
        return view('product.view', compact('product', 'medias', 'thumbnails', 'similar_products'))
            ->with('hot_products', Product::latest()->with('currency')->where('id', '!=', $product->id)->get()->take(8));
    }

    /*
     *  the function which is in charge of retrieving products which belongs to a certain brand
     */

    private function findBrands($query)
    {
        $products = $query->get()->groupBy('brand_id');
        $brands = collect();
        foreach ($products as $product) {
            if ($product->first() && $product->first()->brand) {
                $brands->push($product->first()->brand);
            }
        }
        return $brands;
    }

    /*
     *  the function which is in charge of retrieving products which belongs to a certain category
     */


    private function findCategories($query)
    {
        $products = $query->get()->groupBy('category_id');
        $categories = collect();
        foreach ($products as $product) {
            if ($product->first() && $product->first()->subcategory) {
                $categories->push($product->first()->subcategory);
            }
        }
        return $categories;
    }

    /*
     *  the function which is in charge of retrieving products which belongs to a certain condition
     */


    private function findConditions($query)
    {
        $products = $query->get()->groupBy('condition_id');
        $conditions = collect();
        foreach ($products as $product) {
            if ($product->first() && $product->first()->condition) {
                $conditions->push($product->first()->condition);
            }
        }
        return $conditions;
    }


}

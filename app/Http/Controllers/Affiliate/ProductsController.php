<?php

namespace App\Http\Controllers\Affiliate;

use App\Brand;
use App\Category;
use App\Condition;
use App\Currency;
use App\Events\Affiliate\ProductUploaded;
use App\Http\Requests\ProductForm;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('affiliate.auth');
    }
    public function index()
    {
        //
        $conditions = Condition::get();
        $categories = Category::get();
        $subcategories = SubCategory::get();
        $brands = Brand::get();
        $currencies = Currency::get();
        $products = Product::get();
        return view('affiliate.product.index', compact('conditions','subcategories','brands','currencies','products', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $conditions = Condition::get();
        $categories = Category::with('subcategories')->get();
        $brands = Brand::get();
        $currencies = Currency::get();
        $products = Product::get();
        return view('affiliate.product.create', compact('products','categories','brands','currencies','conditions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductForm $form)
    {
        $product = $form->createProduct();
//        if ($product) {
//            Session::flash('message', 'Your Product will be uploaded by the admin');
//            event(new ProductUploaded($product));
//        }
        return redirect()->action('Affiliate\ProductsController@picturesPage', [$product->id]);

    }

    public function search(Request $request){     // function to search product according to the keyword which will be input

        $keyword = $request->keyword;
        $conditions = Condition::get();
        $categories = Category::get();
        $subcategories = SubCategory::get();
        $brands = Brand::get();
        $currencies = Currency::get();
        $products = Product::where('name', 'like', '%' . $keyword . '%')->get();
        return view('affiliate.product.index', compact('products', 'keyword', 'conditions', 'subcategories', 'brands', 'currencies', 'categories'));
    }

    public function filter(Request $request){  // function which will filter according to the brand, categories, price and condition of product
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

        if ($request->conditions)
        {
            foreach ($request->conditions as $condition) {
                $query = $query->where('condition_id', $condition);
            }
        }

        if ($request->brands) {
            foreach ($request->brands as $brand) {
                $query = $query->where('brand_id', $brand);
            }
        }

        if ($request->price)
        {
            foreach ($request->price as $price){
            $query = $query->where('price', $price);
            }
        }
            $products = $query->get();

        return view('affiliate.product.index', compact('products','brands', 'conditions', 'categories'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with(
            'affiliate',
            'currency',
            'reviews.user'
        )->forAffiliate()->findOrFail($id);
        $medias = collect();
        $thumbnails = collect();
        foreach ($product->getMedia() as $media) {
            $medias->push($media->getFullUrl('main'));
            $thumbnails->push($media->getFullUrl('thumb'));
        }
        return view(
            'affiliate.product.view',
            compact('product', 'medias', 'thumbnails')
        );

    }

    public function picturesPage($id)
    {
        $product = Product::findOrFail($id);

        return view('form.pictureForm',compact('product'));
    }

    public function addPictures($id){
        $product = Product::findorFail($id);

        $product->clearMediaCollection();
        $product->addAllMediaFromRequest('files')
            ->each(
                function ($fileAdder) {
                    $fileAdder->usingFileName(
                        time()
                        . '-' .
                        random_int(1, 999999999)
                    )->toMediaCollection();
                }
            );

        return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $conditions = Condition::get();
        $categories = Category::with('subcategories')->get();
        $brands = Brand::get();
        $currencies = Currency::get();
        $product = Product::findorfail($id);
        return view('affiliate.product.edit', compact('product','conditions','categories','brands','currencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductForm $form, Product $product)  // function to update product
    {
        //
        $form->update($product);
        return redirect()->action([self::class, 'show'],[$product->id,$product->name]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Product::find($id)->delete();
        return redirect()->action([self::class, 'index']);
    }
}

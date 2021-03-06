<?php

namespace App\Http\Requests;

use App\Events\Affiliate\ProductUploaded;
use App\Models\Product;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category' => 'required|int',
            'subcategory' => 'required|int',
            'currency' => 'required_if:type,1|int',
            'brand' => 'nullable|int',
            'condition' => 'required_if:type,1|int',
            'name' => 'required|string',
            'quantity' => 'required_if:type,1|numeric',
            'type' => 'required|in:1,2',
            'price' => 'required_if:type,1|numeric',
            'color' => 'nullable|string',
            'size' => 'nullable|string',
            'description' => 'required|string',
        ];
    }

    public function createProduct()
    {
        $product = new Product();
        $product->affiliate_id = Auth::guard('affiliate')->user()->id;
        $product = $this->store($product);
        event(new ProductUploaded($product));

        return $product;

    }

    public function update(Product $product)
    {
        return $this->store($product);
    }

    protected function store(Product $product)
    {
        $product->name = $this->name;
        $product->subcategory_id = $this->subcategory;
        if ($this->type == 1) {
            $product->currency_id = $this->currency;
            $product->brand_id = $this->brand;
            $product->condition_id = $this->condition;
            $product->quantity = $this->quantity;
            $product->price = $this->price;
            $product->color = $this->color;
            $product->size = $this->size;
            $product->is_service = false;
        } else {
            $product->is_service = true;
            $product->currency_id = null;
            $product->brand_id = null;
            $product->condition_id = null;
            $product->quantity = null;
            $product->price = null;
            $product->color = null;
            $product->size = null;
        }
        $product->description = $this->description;
        $product->save();

        $this->uploadPictures($product);

        return $product;
    }

    private function uploadPictures(Product $product): void
    {
        if ($this->fileToUpload) {
            $product->clearMediaCollection();
            $product->addMediaFromRequest('fileToUpload')
                ->withCustomProperties(['mime-type' => 'image/jpeg'])
                ->preservingOriginal()
                ->toMediaCollection();
        }

    }


}

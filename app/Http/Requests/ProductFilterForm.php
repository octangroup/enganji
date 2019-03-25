<?php

namespace App\Http\Requests;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Http\FormRequest;

class ProductFilterForm extends FormRequest
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
            'brands' => 'nullable',
            'brands.*' => 'nullable|int',
            'min' => 'nullable|required_with:max',
            'max' => 'nullable|required_with:min',
            'conditions' => 'nullable',
            'conditions.*' => 'nullable|int',
            'keyword' => 'nullable|string'
        ];
    }

    public function handle(Builder $query)
    {

        $query = $this->search($query);
        $query = $this->filterByBrand($query);
        $query = $this->filterByCondition($query);
        $query = $this->filterByPrice($query);
        $query = $this->sort($query);
        return $query;
    }

    private function sort(Builder $query)
    {
        if ($this->input('sort-by')) {
            if ($this->input('sort-by') === 'price-asc') {
                $query = $query->orderBy('price');
            }
            if ($this->input('sort-by') === 'price-desc') {
                $query = $query->orderBy('price', 'desc');
            }
            if ($this->input('sort-by') === 'newest') {
                $query = $query->orderBy('created_at', 'desc');
            }
        }
        return $query;
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    private function filterByBrand(Builder $query)
    {
        if ($this->brands) {
            $query = $query->whereIn('brand_id', $this->brands);
        }
        return $query;
    }


    /**
     * @param Builder $query
     * @return Builder
     */
    private function filterByCondition(Builder $query)
    {
        if ($this->conditions) {
            $query = $query->whereIn('condition_id', $this->cconditiond);
        }
        return $query;
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    private function filterByPrice(Builder $query)
    {
        if ($this->min && $this->max) {
            $query = $query->where('price', '>=', $this->min);
            $query = $query->where('price', '<=', $this->max);
        }
        return $query;
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    private function search(Builder $query)
    {
        $keyword = $this->keyword;
        if ($keyword) {
            $query = $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%')
                    ->orWhereHas('subcategory', function ($q) use ($keyword) {
                        $q->where('name', 'like', '%' . $keyword . '%');
                    })
                    ->orWhereHas('subcategory.category', function ($q) use ($keyword) {
                        $q->where('name', 'like', '%' . $keyword . '%');
                    });
            });
        }
        return $query;
    }

}

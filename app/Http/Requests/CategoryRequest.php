<?php

namespace App\Http\Requests;

use App\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string'
        ];
    }

    public function createCategory(){

        $category = new Category();
        return $this->store($category);
    }

    protected function store(Category $category){
        $category->name = $this->name;
        $category->save();

        $this->uploadPicture($category);

        return true;
    }

    public function update($id){
        $category = Category::findorfail($id);
        return $this->store($category);
    }

    public function uploadPicture(Category $category)  : void
    {

        if ($this->fileToUpload) {
            $category->clearMediaCollection();
            $category->addMediaFromRequest('fileToUpload')
                ->withCustomProperties(['mime-type' => 'image/jpeg'])
                ->preservingOriginal()
                ->toMediaCollection();
        }
    }
}

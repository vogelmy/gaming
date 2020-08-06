<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryEdit extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $id = request()->category;
        return [
            'name' => 'required|min:2|regex:/^[\d\w -]+$/',
            'slug' => 'required|min:2|alpha_dash|unique:categories,slug,' . $id,
            'image' => 'image',
        ];
    }

}

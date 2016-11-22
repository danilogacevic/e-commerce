<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            //
        'product_title'=>'required',
        'category_id'=>'required',
        'is_active' => 'required',
        'product_price'=>'required',
        'product_quantity'=>'required',
        'product_description'=>'required',
        'short_description'=>'required'

        ];
    }
}

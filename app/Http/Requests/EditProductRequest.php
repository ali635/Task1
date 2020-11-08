<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'product_name'=> 'required|max:100',
            'price'       => 'required|numeric',
            'suppliers'   => 'array|min:1',
            'suppliers.*' => 'numeric|exists:suppliers,id',
            'varietie_id' => 'required|exists:varieties,id',
        ];
    }
    public function messages()
    {
        return[
            'product_name.required'          => 'يجب ادخال الاسم المنتج ',
            'price.required'                 => 'يجب ادخال سعر المنتج ',
        ];
    }
}

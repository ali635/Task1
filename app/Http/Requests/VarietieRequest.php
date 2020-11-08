<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VarietieRequest extends FormRequest
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
            'name' => 'required|max:50|unique:varieties,name,'.$this -> id,
            'description' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'يرجي ادخال اسم الصنف',
            'name.unique'   =>'اسم الصنف مسجل مسبقا',
            
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'supplier_name' => 'required|max:60|unique:suppliers,supplier_name,'.$this -> id,
            'address'       => 'required|max:255|min:50',
            'tele_number'   => 'required|min:4|numeric|unique:suppliers,tele_number,'.$this -> id,
        ];
    }
    public function messages()
    {
        return [
            'supplier_name.required' => 'يرجي ادخال اسم المورد',
            'supplier_name.unique'   => 'اسم المورد مسجل مسبقا',
            'address.required'       => 'يرجي ادخال عنوان المورد',
            'tele_number.required'   => 'يرجي ادخال رقم هاتف المورد',
            'tele_number.unique'     => 'اسم المورد مسجل مسبقا',
            'tele_number.numeric'   => 'يجب ادخال رقم هاتف المورد مكون من ارقام',
        ];
    }
}

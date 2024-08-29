<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'satus'=> 'required',
            'address' => 'required',
            'mobile_no' => 'required',
            'addition_info'=> 'required',
            'product_name' => 'required',
            'quantity' => 'required',
            'price'=> 'required',
            'prescription_image' => 'required',
            'delivery_system'=> 'required',
        
        ];
    }
}

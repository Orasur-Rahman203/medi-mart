<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicineRequest extends FormRequest
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
            'medicine_name'=> 'required',
            'medicine_image' => 'required',
            'medicine_description'=> 'required',
            'prescription_image' => 'required',
            'medicine_price' => 'required',
            'vendor_id'=> 'required',
            'category_id' => 'required',
           
        ];
    }
}

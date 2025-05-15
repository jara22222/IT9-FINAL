<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'product' => 'required|string|unique:products,product_name',
            'price' => 'required|numeric|min:0',
            'supplier' => 'required',
            'category' => 'required',
            'description' => 'required|string',
            'stock' => 'required|numeric|min:0',
            'image' => ' required|mimes:jpg,jpeg,png,gif,webp,svg,bmp,tiff',
            
           
        ];
    }
}
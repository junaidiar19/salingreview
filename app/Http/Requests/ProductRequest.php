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
        $rules = [
            'code' => 'required|unique:products',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ];

        // if the request is for updating a product
        if ($this->isMethod('PUT')) {
            $rules['code'] = 'required|unique:products,code,' . $this->product->id;
        }

        return $rules;
    }
}

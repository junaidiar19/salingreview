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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'total' => 'required',
            'order_date' => 'required|date',
            'proof' => 'required|image|mimes:jpg,jpeg,png,pdf|max:2000',
        ];

        // if the request is for updating a order
        if ($this->isMethod('PUT')) {
            $rules['proof'] = 'nullable|image|mimes:jpg,jpeg,png,pdf|max:2000';
        }

        return $rules;
    }
}

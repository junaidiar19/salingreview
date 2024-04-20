<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'order_code' => 'required|exists:orders,code',
            'order_id' => 'nullable',
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quota' => 'required|integer',
            'daily_quota' => 'required|integer',
            'commission' => 'required|numeric',
            'instructions' => 'required',
            'criteria' => 'required',
            'task_link' => 'required',
            'is_published' => 'boolean',
        ];
    }

    /**
     * Handle a passed validation attempt.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'order_id' => Order::where('code', $this->order_code)->first()?->id,
        ]);
    }
}

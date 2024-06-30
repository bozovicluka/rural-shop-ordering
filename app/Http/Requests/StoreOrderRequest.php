<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'street' => 'required|string|max:255',
            'flat_number' => 'nullable|string|max:12',
            'city' => 'required|string|max:255',
            'phone_number' => 'required|string|max:12',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'note' => 'nullable|string',
            'order' => 'required|array',
            'order.*.ad_id' => 'required|integer',
            'order.*.ad_title' => 'required|string',
            'order.*.price' => 'required|string',
            'order.*.quantity' => 'required|integer',
            'order.*.seller.id' => 'required|integer',
            'order.*.seller.name' => 'required|string',
            'order.*.seller.email' => 'required|email',
            'order.*.seller.address' => 'required|string',
            'order.*.seller.city' => 'nullable|string',
            'order.*.seller.phone' => 'required|string',
        ];
    }
}

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
            'ad_id' => 'required|integer',
            'user_id' => 'required|integer',
            'user_name' => 'required|string',
            'price' => 'required|string',
            'user_email' => 'required|email',
            'ad_title' => 'required|string',
            'comment' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'name' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'postal_code' => 'required|string',
        ];
    }
}

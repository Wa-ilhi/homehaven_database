<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RealEstatePropertyRequest extends FormRequest
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
            'real_estate_id' => 'required|exists:real_estate,real_estate_id',
            'property_type' => 'required|string',
            'address' => 'required|string',
            'bedrooms' => 'required|integer',
            'status' => 'required|string',
            'bathrooms' => 'required|integer',
            'squarefootage' => 'required|integer',
            'image_path' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'listing_price' => [
                'required',
                'numeric',
                'regex:/^\d+(\.\d{1,2})?$/',
            ],
        ];
    }
}

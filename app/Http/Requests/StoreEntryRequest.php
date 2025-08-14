<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntryRequest extends FormRequest
{
    public function authorize(): bool
    {
        // If you want everyone to submit entries, return true
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'email', 'max:255'],
            'mobile'      => ['required', 'string', 'max:20', 'regex:/^\+?[0-9\s\-]+$/'],
            'terms'       => ['accepted'],
            'outlet_id'   => ['required', 'exists:outlets,id'],
            'bill_number' => ['nullable', 'string', 'max:50'],
            'bill_image'  => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => 'Please enter your full name.',
            'email.required'       => 'We need your email address to contact you.',
            'mobile.required'      => 'Mobile number is required.',
            'mobile.regex'         => 'Please enter a valid phone number.',
            'terms.accepted'       => 'You must agree to the terms and conditions.',
            'outlet_id.required'   => 'Outlet ID is missing.',
            'outlet_id.exists'     => 'Invalid outlet selected.',
            'bill_number.max'      => 'Bill number should not exceed 50 characters.',
            'bill_image.image'     => 'The bill must be a valid image file.',
            'bill_image.mimes'     => 'Only JPG, JPEG, PNG, or WEBP files are allowed.',
            'bill_image.max'       => 'Bill image size cannot exceed 2MB.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSessionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Replace with your authorization logic, e.g., check user roles
        return true; // Allow all users for now (adjust as needed)
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // Adjust validation rules as needed based on your update scenario
            //'Program' => 'nullable|integer|exists:programs,id', // Optional, program ID must exist if provided
            //'Counselor' => 'nullable|integer|exists:counselors,id', // Optional, counselor ID must exist if provided
            //'Date' => 'nullable|date|after:today', // Optional, valid date and future date if provided
            //'Duration' => 'nullable|numeric|min:1', // Optional, numerical duration and minimum of 1 if provided
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSessionsRequest extends FormRequest
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
            //'Program' => 'required|integer|exists:programs,id', // Ensure program ID exists
            //'Counselor' => 'required|integer|exists:counselors,id', // Ensure counselor ID exists
            //'Date' => 'required|date|after:today', // Ensure valid date and future date
            //'Duration' => 'required|numeric|min:1', // Ensure numerical duration and minimum of 1
        ];
    }
}

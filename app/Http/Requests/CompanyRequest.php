<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return true; // Adjust authorization logic as needed
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $companyId = $this->route('company'); 

        return [
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:50',
            'website' => 'nullable|url|max:255',
            'registration_number' => [
                'nullable',
                'string',
                'max:100',
                Rule::unique('companies')->ignore($companyId),
            ],
            'founded_at' => 'nullable|date',
            'number_of_employees' => 'nullable|integer',
        ];
    }
}

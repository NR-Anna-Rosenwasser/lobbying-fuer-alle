<?php

namespace App\Filament\Resources\Concerns\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormConcernRequest extends FormRequest
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
            'constituentFname' => 'required|string',
            'constituentLname' => 'required|string',
            'constituentEmail' => 'required|email',
            'constituentPhone' => 'string',
            'constituentPronouns' => 'nullable|string',
            'concernTitle' => 'required|string',
            'concernDescription' => 'required|string',
            'concernParlchChecked' => 'required|boolean',
            'concernPastConcerns' => 'required|boolean',
            'concernPastConcernsTimespan' => 'boolean',
            'concernPastConcernsDetails' => 'nullable|string',
            'concernExperts' => 'nullable|string',
            'concernFurtherInformation' => 'nullable|string',
		];
    }
}

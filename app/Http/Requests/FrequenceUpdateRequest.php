<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrequenceUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'libelle' => ['required', 'max:255', 'string'],
            'heure' => ['required', 'date_format:H:i:s'],
            'jours' => ['required', 'max:255', 'json'],
            'caisse_id' => ['required', 'exists:caisses,id'],
        ];
    }
}

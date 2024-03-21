<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModePaiementUpdateRequest extends FormRequest
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
            'numero' => ['required', 'max:255', 'string'],
            'utilisateur_id' => ['required', 'exists:utilisateurs,id'],
        ];
    }
}

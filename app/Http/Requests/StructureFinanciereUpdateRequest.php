<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StructureFinanciereUpdateRequest extends FormRequest
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
            'identifiant' => ['required', 'max:255'],
            'denomination' => ['required', 'max:255', 'string'],
            'date_creation' => ['required', 'date'],
            'immatriculation' => ['required', 'max:255', 'json'],
            'email' => ['required', 'email'],
            'siege_social' => ['required', 'max:255', 'string'],
            'agrement' => ['required', 'max:255', 'string'],
            'site_internet' => ['nullable', 'max:255', 'string'],
            'statut_juridique' => ['required', 'max:255', 'string'],
            'numero_inscription' => ['required', 'max:255', 'string'],
            'boite_postal' => ['required', 'max:255', 'string'],
            'phone' => ['nullable', 'max:255', 'json'],
            'cellulaire' => ['required', 'max:255', 'json'],
            'fax' => ['required', 'max:255', 'json'],
            'taux_interet' => ['required', 'numeric'],
            'delai_retrait_fond' => ['required', 'max:255', 'string'],
            'avatar' => ['nullable', 'file'],
        ];
    }
}

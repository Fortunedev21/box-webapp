<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaisseUpdateRequest extends FormRequest
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
            'intitule' => ['required', 'max:255', 'string'],
            'date_debut' => ['required', 'date'],
            'date_echeance' => ['nullable', 'date'],
            'solde_actuel' => ['required', 'numeric'],
            'status' => ['nullable', 'max:255', 'string'],
            'utilisateur_id' => ['required', 'exists:utilisateurs,id'],
            'type_caisse_id' => ['required', 'exists:type_caisses,id'],
            'structure_financiere_id' => [
                'required',
                'exists:structure_financieres,id',
            ],
        ];
    }
}

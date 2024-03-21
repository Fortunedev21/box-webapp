<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UtilisateurUpdateRequest extends FormRequest
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
            'nom' => ['required', 'max:255', 'string'],
            'prenom' => ['required', 'max:255', 'string'],
            'email' => [
                'required',
                Rule::unique('utilisateurs', 'email')->ignore(
                    $this->utilisateur
                ),
                'email',
            ],
            'password' => ['nullable'],
            'lieu_naissance' => ['required', 'max:255', 'string'],
            'profession' => ['required', 'max:255', 'string'],
            'identifiant_perso' => ['nullable', 'max:255', 'string'],
            'avatar' => ['nullable', 'file'],
            'sexe' => ['required', 'max:255', 'string'],
            'ville_residence' => ['required', 'max:255', 'string'],
            'code_parainage' => ['nullable', 'max:255', 'string'],
            'preference' => ['nullable', 'max:255', 'json'],
            'piece_identite' => ['required', 'max:255', 'string'],
            'cni' => ['nullable', 'max:255', 'string'],
            'numero_imatriculation' => ['nullable', 'max:255', 'string'],
            'roles' => 'array',
        ];
    }
}

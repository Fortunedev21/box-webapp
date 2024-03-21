<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionUpdateRequest extends FormRequest
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
            'montant' => ['required', 'numeric'],
            'identifiant_transation' => ['required', 'max:255'],
            'identifiant_paiement' => ['required', 'max:255', 'string'],
            'date_transaction' => ['required', 'date'],
            'status' => ['nullable', 'max:255', 'string'],
            'caisse_id' => ['required', 'exists:caisses,id'],
        ];
    }
}

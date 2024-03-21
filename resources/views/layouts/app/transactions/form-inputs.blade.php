@php $editing = isset($transaction) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.number
            name="montant"
            label="Montant"
            :value="old('montant', ($editing ? $transaction->montant : ''))"
            max="255"
            step="0.01"
            placeholder="Montant"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="identifiant_transation"
            label="Identifiant Transation"
            :value="old('identifiant_transation', ($editing ? $transaction->identifiant_transation : ''))"
            maxlength="255"
            placeholder="Identifiant Transation"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="identifiant_paiement"
            label="Identifiant Paiement"
            :value="old('identifiant_paiement', ($editing ? $transaction->identifiant_paiement : ''))"
            maxlength="255"
            placeholder="Identifiant Paiement"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.datetime
            name="date_transaction"
            label="Date Transaction"
            value="{{ old('date_transaction', ($editing ? optional($transaction->date_transaction)->format('Y-m-d\TH:i:s') : '')) }}"
            max="255"
            required
        ></x-inputs.datetime>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="status"
            label="Status"
            :value="old('status', ($editing ? $transaction->status : ''))"
            maxlength="255"
            placeholder="Status"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="caisse_id" label="Caisse" required>
            @php $selected = old('caisse_id', ($editing ? $transaction->caisse_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Caisse</option>
            @foreach($caisses as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>

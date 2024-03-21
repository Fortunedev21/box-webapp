@php $editing = isset($modePaiement) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="libelle"
            label="Libelle"
            :value="old('libelle', ($editing ? $modePaiement->libelle : ''))"
            maxlength="255"
            placeholder="Libelle"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="numero"
            label="Numero"
            :value="old('numero', ($editing ? $modePaiement->numero : ''))"
            maxlength="255"
            placeholder="Numero"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="utilisateur_id" label="Utilisateur" required>
            @php $selected = old('utilisateur_id', ($editing ? $modePaiement->utilisateur_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Utilisateur</option>
            @foreach($utilisateurs as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>

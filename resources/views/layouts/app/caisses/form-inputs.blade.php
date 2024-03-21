@php $editing = isset($caisse) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="identifiant"
            label="Identifiant"
            :value="old('identifiant', ($editing ? $caisse->identifiant : ''))"
            maxlength="255"
            placeholder="Identifiant"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="intitule"
            label="Intitule"
            :value="old('intitule', ($editing ? $caisse->intitule : ''))"
            maxlength="255"
            placeholder="Intitule"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.datetime
            name="date_debut"
            label="Date Debut"
            value="{{ old('date_debut', ($editing ? optional($caisse->date_debut)->format('Y-m-d\TH:i:s') : '')) }}"
            max="255"
            required
        ></x-inputs.datetime>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.datetime
            name="date_echeance"
            label="Date Echeance"
            value="{{ old('date_echeance', ($editing ? optional($caisse->date_echeance)->format('Y-m-d\TH:i:s') : '')) }}"
            max="255"
        ></x-inputs.datetime>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="solde_actuel"
            label="Solde Actuel"
            :value="old('solde_actuel', ($editing ? $caisse->solde_actuel : ''))"
            max="255"
            step="0.01"
            placeholder="Solde Actuel"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="status"
            label="Status"
            :value="old('status', ($editing ? $caisse->status : ''))"
            maxlength="255"
            placeholder="Status"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="utilisateur_id" label="Utilisateur" required>
            @php $selected = old('utilisateur_id', ($editing ? $caisse->utilisateur_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Utilisateur</option>
            @foreach($utilisateurs as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="type_caisse_id" label="Type Caisse" required>
            @php $selected = old('type_caisse_id', ($editing ? $caisse->type_caisse_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Type Caisse</option>
            @foreach($typeCaisses as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select
            name="structure_financiere_id"
            label="Structure Financiere"
            required
        >
            @php $selected = old('structure_financiere_id', ($editing ? $caisse->structure_financiere_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Structure Financiere</option>
            @foreach($structureFinancieres as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>

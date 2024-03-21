@php $editing = isset($frequence) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="libelle"
            label="Libelle"
            :value="old('libelle', ($editing ? $frequence->libelle : ''))"
            maxlength="255"
            placeholder="Libelle"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="heure"
            label="Heure"
            :value="old('heure', ($editing ? $frequence->heure : ''))"
            maxlength="255"
            placeholder="Heure"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="jours" label="Jours" maxlength="255" required
            >{{ old('jours', ($editing ? json_encode($frequence->jours) : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="caisse_id" label="Caisse" required>
            @php $selected = old('caisse_id', ($editing ? $frequence->caisse_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Caisse</option>
            @foreach($caisses as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>

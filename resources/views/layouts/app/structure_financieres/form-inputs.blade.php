@php $editing = isset($structureFinanciere) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="identifiant"
            label="Identifiant"
            :value="old('identifiant', ($editing ? $structureFinanciere->identifiant : ''))"
            maxlength="255"
            placeholder="Identifiant"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="denomination"
            label="Denomination"
            :value="old('denomination', ($editing ? $structureFinanciere->denomination : ''))"
            maxlength="255"
            placeholder="Denomination"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.date
            name="date_creation"
            label="Date Creation"
            value="{{ old('date_creation', ($editing ? optional($structureFinanciere->date_creation)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="immatriculation"
            label="Immatriculation"
            maxlength="255"
            required
            >{{ old('immatriculation', ($editing ?
            json_encode($structureFinanciere->immatriculation) : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $structureFinanciere->email : ''))"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="siege_social"
            label="Siege Social"
            :value="old('siege_social', ($editing ? $structureFinanciere->siege_social : ''))"
            maxlength="255"
            placeholder="Siege Social"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="agrement"
            label="Agrement"
            :value="old('agrement', ($editing ? $structureFinanciere->agrement : ''))"
            maxlength="255"
            placeholder="Agrement"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="site_internet"
            label="Site Internet"
            :value="old('site_internet', ($editing ? $structureFinanciere->site_internet : ''))"
            maxlength="255"
            placeholder="Site Internet"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="statut_juridique"
            label="Statut Juridique"
            :value="old('statut_juridique', ($editing ? $structureFinanciere->statut_juridique : ''))"
            maxlength="255"
            placeholder="Statut Juridique"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="numero_inscription"
            label="Numero Inscription"
            :value="old('numero_inscription', ($editing ? $structureFinanciere->numero_inscription : ''))"
            maxlength="255"
            placeholder="Numero Inscription"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="boite_postal"
            label="Boite Postal"
            :value="old('boite_postal', ($editing ? $structureFinanciere->boite_postal : ''))"
            maxlength="255"
            placeholder="Boite Postal"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="phone" label="Phone" maxlength="255"
            >{{ old('phone', ($editing ?
            json_encode($structureFinanciere->phone) : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="cellulaire"
            label="Cellulaire"
            maxlength="255"
            required
            >{{ old('cellulaire', ($editing ?
            json_encode($structureFinanciere->cellulaire) : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="fax" label="Fax" maxlength="255" required
            >{{ old('fax', ($editing ? json_encode($structureFinanciere->fax) :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="taux_interet"
            label="Taux Interet"
            :value="old('taux_interet', ($editing ? $structureFinanciere->taux_interet : ''))"
            max="255"
            placeholder="Taux Interet"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="delai_retrait_fond"
            label="Delai Retrait Fond"
            :value="old('delai_retrait_fond', ($editing ? $structureFinanciere->delai_retrait_fond : ''))"
            maxlength="255"
            placeholder="Delai Retrait Fond"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <div
            x-data="imageViewer('{{ $editing && $structureFinanciere->avatar ? \Storage::url($structureFinanciere->avatar) : '' }}')"
        >
            <x-inputs.partials.label
                name="avatar"
                label="Avatar"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="avatar"
                    id="avatar"
                    @change="fileChosen"
                />
            </div>

            @error('avatar') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>
</div>

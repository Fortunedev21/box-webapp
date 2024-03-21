@php $editing = isset($utilisateur) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="nom"
            label="Nom"
            :value="old('nom', ($editing ? $utilisateur->nom : ''))"
            maxlength="255"
            placeholder="Nom"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="prenom"
            label="Prenom"
            :value="old('prenom', ($editing ? $utilisateur->prenom : ''))"
            maxlength="255"
            placeholder="Prenom"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $utilisateur->email : ''))"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.password
            name="password"
            label="Password"
            maxlength="255"
            placeholder="Password"
            :required="!$editing"
        ></x-inputs.password>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="lieu_naissance"
            label="Lieu Naissance"
            :value="old('lieu_naissance', ($editing ? $utilisateur->lieu_naissance : ''))"
            maxlength="255"
            placeholder="Lieu Naissance"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="profession"
            label="Profession"
            :value="old('profession', ($editing ? $utilisateur->profession : ''))"
            maxlength="255"
            placeholder="Profession"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="identifiant_perso"
            label="Identifiant Perso"
            :value="old('identifiant_perso', ($editing ? $utilisateur->identifiant_perso : ''))"
            maxlength="255"
            placeholder="Identifiant Perso"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <div
            x-data="imageViewer('{{ $editing && $utilisateur->avatar ? \Storage::url($utilisateur->avatar) : '' }}')"
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

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="sexe"
            label="Sexe"
            :value="old('sexe', ($editing ? $utilisateur->sexe : ''))"
            maxlength="255"
            placeholder="Sexe"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="ville_residence"
            label="Ville Residence"
            :value="old('ville_residence', ($editing ? $utilisateur->ville_residence : ''))"
            maxlength="255"
            placeholder="Ville Residence"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="code_parainage"
            label="Code Parainage"
            :value="old('code_parainage', ($editing ? $utilisateur->code_parainage : ''))"
            maxlength="255"
            placeholder="Code Parainage"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea name="preference" label="Preference" maxlength="255"
            >{{ old('preference', ($editing ?
            json_encode($utilisateur->preference) : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="piece_identite"
            label="Piece Identite"
            :value="old('piece_identite', ($editing ? $utilisateur->piece_identite : ''))"
            maxlength="255"
            placeholder="Piece Identite"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="cni"
            label="Cni"
            :value="old('cni', ($editing ? $utilisateur->cni : ''))"
            maxlength="255"
            placeholder="Cni"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="numero_imatriculation"
            label="Numero Imatriculation"
            :value="old('numero_imatriculation', ($editing ? $utilisateur->numero_imatriculation : ''))"
            maxlength="255"
            placeholder="Numero Imatriculation"
        ></x-inputs.text>
    </x-inputs.group>

    <div class="px-4 my-4">
        <h4 class="font-bold text-lg text-gray-700">
            Assign @lang('crud.roles.name')
        </h4>

        <div class="py-2">
            @foreach ($roles as $role)
            <div>
                <x-inputs.checkbox
                    id="role{{ $role->id }}"
                    name="roles[]"
                    label="{{ ucfirst($role->name) }}"
                    value="{{ $role->id }}"
                    :checked="isset($utilisateur) ? $utilisateur->hasRole($role) : false"
                    :add-hidden-value="false"
                ></x-inputs.checkbox>
            </div>
            @endforeach
        </div>
    </div>
</div>

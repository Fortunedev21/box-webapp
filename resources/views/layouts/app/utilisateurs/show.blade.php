<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.utilisateurs.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('utilisateurs.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.utilisateurs.inputs.nom')
                        </h5>
                        <span>{{ $utilisateur->nom ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.utilisateurs.inputs.prenom')
                        </h5>
                        <span>{{ $utilisateur->prenom ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.utilisateurs.inputs.email')
                        </h5>
                        <span>{{ $utilisateur->email ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.utilisateurs.inputs.lieu_naissance')
                        </h5>
                        <span>{{ $utilisateur->lieu_naissance ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.utilisateurs.inputs.profession')
                        </h5>
                        <span>{{ $utilisateur->profession ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.utilisateurs.inputs.identifiant_perso')
                        </h5>
                        <span
                            >{{ $utilisateur->identifiant_perso ?? '-' }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.utilisateurs.inputs.avatar')
                        </h5>
                        <x-partials.thumbnail
                            src="{{ $utilisateur->avatar ? \Storage::url($utilisateur->avatar) : '' }}"
                            size="150"
                        />
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.utilisateurs.inputs.sexe')
                        </h5>
                        <span>{{ $utilisateur->sexe ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.utilisateurs.inputs.ville_residence')
                        </h5>
                        <span>{{ $utilisateur->ville_residence ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.utilisateurs.inputs.code_parainage')
                        </h5>
                        <span>{{ $utilisateur->code_parainage ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.utilisateurs.inputs.preference')
                        </h5>
                        <pre>
{{ json_encode($utilisateur->preference) ?? '-' }}</pre
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.utilisateurs.inputs.piece_identite')
                        </h5>
                        <span>{{ $utilisateur->piece_identite ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.utilisateurs.inputs.cni')
                        </h5>
                        <span>{{ $utilisateur->cni ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.utilisateurs.inputs.numero_imatriculation')
                        </h5>
                        <span
                            >{{ $utilisateur->numero_imatriculation ?? '-'
                            }}</span
                        >
                    </div>
                </div>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.roles.name')
                        </h5>
                        <div>
                            @forelse ($utilisateur->roles as $role)
                            <div
                                class="
                                    inline-block
                                    p-1
                                    text-center text-sm
                                    rounded
                                    bg-blue-400
                                    text-white
                                "
                            >
                                {{ $role->name }}
                            </div>
                            <br />
                            @empty - @endforelse
                        </div>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('utilisateurs.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Utilisateur::class)
                    <a href="{{ route('utilisateurs.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>

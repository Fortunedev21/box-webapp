<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.utilisateurs.index_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <div class="mb-5 mt-4">
                    <div class="flex flex-wrap justify-between">
                        <div class="md:w-1/2">
                            <form>
                                <div class="flex items-center w-full">
                                    <x-inputs.text
                                        name="search"
                                        value="{{ $search ?? '' }}"
                                        placeholder="{{ __('crud.common.search') }}"
                                        autocomplete="off"
                                    ></x-inputs.text>

                                    <div class="ml-1">
                                        <button
                                            type="submit"
                                            class="button button-primary"
                                        >
                                            <i class="icon ion-md-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="md:w-1/2 text-right">
                            @can('create', App\Models\Utilisateur::class)
                            <a
                                href="{{ route('utilisateurs.create') }}"
                                class="button button-primary"
                            >
                                <i class="mr-1 icon ion-md-add"></i>
                                @lang('crud.common.create')
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="block w-full overflow-auto scrolling-touch">
                    <table class="w-full max-w-full mb-4 bg-transparent">
                        <thead class="text-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.utilisateurs.inputs.nom')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.utilisateurs.inputs.prenom')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.utilisateurs.inputs.email')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.utilisateurs.inputs.lieu_naissance')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.utilisateurs.inputs.profession')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.utilisateurs.inputs.identifiant_perso')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.utilisateurs.inputs.avatar')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.utilisateurs.inputs.sexe')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.utilisateurs.inputs.ville_residence')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.utilisateurs.inputs.code_parainage')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.utilisateurs.inputs.preference')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.utilisateurs.inputs.piece_identite')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.utilisateurs.inputs.cni')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.utilisateurs.inputs.numero_imatriculation')
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($utilisateurs as $utilisateur)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-left">
                                    {{ $utilisateur->nom ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $utilisateur->prenom ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $utilisateur->email ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $utilisateur->lieu_naissance ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $utilisateur->profession ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $utilisateur->identifiant_perso ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    <x-partials.thumbnail
                                        src="{{ $utilisateur->avatar ? \Storage::url($utilisateur->avatar) : '' }}"
                                    />
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $utilisateur->sexe ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $utilisateur->ville_residence ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $utilisateur->code_parainage ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <pre>
{{ json_encode($utilisateur->preference) ?? '-' }}</pre
                                    >
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $utilisateur->piece_identite ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $utilisateur->cni ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $utilisateur->numero_imatriculation ??
                                    '-' }}
                                </td>
                                <td
                                    class="px-4 py-3 text-center"
                                    style="width: 134px;"
                                >
                                    <div
                                        role="group"
                                        aria-label="Row Actions"
                                        class="
                                            relative
                                            inline-flex
                                            align-middle
                                        "
                                    >
                                        @can('update', $utilisateur)
                                        <a
                                            href="{{ route('utilisateurs.edit', $utilisateur) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i
                                                    class="icon ion-md-create"
                                                ></i>
                                            </button>
                                        </a>
                                        @endcan @can('view', $utilisateur)
                                        <a
                                            href="{{ route('utilisateurs.show', $utilisateur) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                        @endcan @can('delete', $utilisateur)
                                        <form
                                            action="{{ route('utilisateurs.destroy', $utilisateur) }}"
                                            method="POST"
                                            onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                        >
                                            @csrf @method('DELETE')
                                            <button
                                                type="submit"
                                                class="button"
                                            >
                                                <i
                                                    class="
                                                        icon
                                                        ion-md-trash
                                                        text-red-600
                                                    "
                                                ></i>
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="15">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="15">
                                    <div class="mt-10 px-4">
                                        {!! $utilisateurs->render() !!}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>

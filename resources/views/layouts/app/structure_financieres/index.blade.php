<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.structure_financieres.index_title')
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
                            @can('create',
                            App\Models\StructureFinanciere::class)
                            <a
                                href="{{ route('structure-financieres.create') }}"
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
                                    @lang('crud.structure_financieres.inputs.identifiant')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.structure_financieres.inputs.denomination')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.structure_financieres.inputs.date_creation')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.structure_financieres.inputs.immatriculation')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.structure_financieres.inputs.email')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.structure_financieres.inputs.siege_social')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.structure_financieres.inputs.agrement')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.structure_financieres.inputs.site_internet')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.structure_financieres.inputs.statut_juridique')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.structure_financieres.inputs.numero_inscription')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.structure_financieres.inputs.boite_postal')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.structure_financieres.inputs.phone')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.structure_financieres.inputs.cellulaire')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.structure_financieres.inputs.fax')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.structure_financieres.inputs.taux_interet')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.structure_financieres.inputs.delai_retrait_fond')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.structure_financieres.inputs.avatar')
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($structureFinancieres as
                            $structureFinanciere)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-left">
                                    {{ $structureFinanciere->identifiant ?? '-'
                                    }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $structureFinanciere->denomination ?? '-'
                                    }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $structureFinanciere->date_creation ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <pre>
{{ json_encode($structureFinanciere->immatriculation) ?? '-' }}</pre
                                    >
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $structureFinanciere->email ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $structureFinanciere->siege_social ?? '-'
                                    }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $structureFinanciere->agrement ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $structureFinanciere->site_internet ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $structureFinanciere->statut_juridique ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $structureFinanciere->numero_inscription
                                    ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $structureFinanciere->boite_postal ?? '-'
                                    }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <pre>
{{ json_encode($structureFinanciere->phone) ?? '-' }}</pre
                                    >
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <pre>
{{ json_encode($structureFinanciere->cellulaire) ?? '-' }}</pre
                                    >
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <pre>
{{ json_encode($structureFinanciere->fax) ?? '-' }}</pre
                                    >
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $structureFinanciere->taux_interet ?? '-'
                                    }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $structureFinanciere->delai_retrait_fond
                                    ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    <x-partials.thumbnail
                                        src="{{ $structureFinanciere->avatar ? \Storage::url($structureFinanciere->avatar) : '' }}"
                                    />
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
                                        @can('update', $structureFinanciere)
                                        <a
                                            href="{{ route('structure-financieres.edit', $structureFinanciere) }}"
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
                                        @endcan @can('view',
                                        $structureFinanciere)
                                        <a
                                            href="{{ route('structure-financieres.show', $structureFinanciere) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                        @endcan @can('delete',
                                        $structureFinanciere)
                                        <form
                                            action="{{ route('structure-financieres.destroy', $structureFinanciere) }}"
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
                                <td colspan="18">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="18">
                                    <div class="mt-10 px-4">
                                        {!! $structureFinancieres->render() !!}
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

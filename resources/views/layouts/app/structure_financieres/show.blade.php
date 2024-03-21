<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.structure_financieres.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a
                        href="{{ route('structure-financieres.index') }}"
                        class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.structure_financieres.inputs.identifiant')
                        </h5>
                        <span
                            >{{ $structureFinanciere->identifiant ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.structure_financieres.inputs.denomination')
                        </h5>
                        <span
                            >{{ $structureFinanciere->denomination ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.structure_financieres.inputs.date_creation')
                        </h5>
                        <span
                            >{{ $structureFinanciere->date_creation ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.structure_financieres.inputs.immatriculation')
                        </h5>
                        <pre>
{{ json_encode($structureFinanciere->immatriculation) ?? '-' }}</pre
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.structure_financieres.inputs.email')
                        </h5>
                        <span>{{ $structureFinanciere->email ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.structure_financieres.inputs.siege_social')
                        </h5>
                        <span
                            >{{ $structureFinanciere->siege_social ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.structure_financieres.inputs.agrement')
                        </h5>
                        <span>{{ $structureFinanciere->agrement ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.structure_financieres.inputs.site_internet')
                        </h5>
                        <span
                            >{{ $structureFinanciere->site_internet ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.structure_financieres.inputs.statut_juridique')
                        </h5>
                        <span
                            >{{ $structureFinanciere->statut_juridique ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.structure_financieres.inputs.numero_inscription')
                        </h5>
                        <span
                            >{{ $structureFinanciere->numero_inscription ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.structure_financieres.inputs.boite_postal')
                        </h5>
                        <span
                            >{{ $structureFinanciere->boite_postal ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.structure_financieres.inputs.phone')
                        </h5>
                        <pre>
{{ json_encode($structureFinanciere->phone) ?? '-' }}</pre
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.structure_financieres.inputs.cellulaire')
                        </h5>
                        <pre>
{{ json_encode($structureFinanciere->cellulaire) ?? '-' }}</pre
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.structure_financieres.inputs.fax')
                        </h5>
                        <pre>
{{ json_encode($structureFinanciere->fax) ?? '-' }}</pre
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.structure_financieres.inputs.taux_interet')
                        </h5>
                        <span
                            >{{ $structureFinanciere->taux_interet ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.structure_financieres.inputs.delai_retrait_fond')
                        </h5>
                        <span
                            >{{ $structureFinanciere->delai_retrait_fond ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.structure_financieres.inputs.avatar')
                        </h5>
                        <x-partials.thumbnail
                            src="{{ $structureFinanciere->avatar ? \Storage::url($structureFinanciere->avatar) : '' }}"
                            size="150"
                        />
                    </div>
                </div>

                <div class="mt-10">
                    <a
                        href="{{ route('structure-financieres.index') }}"
                        class="button"
                    >
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\StructureFinanciere::class)
                    <a
                        href="{{ route('structure-financieres.create') }}"
                        class="button"
                    >
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>

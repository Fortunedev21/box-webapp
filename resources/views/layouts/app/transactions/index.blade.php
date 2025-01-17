<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.transactions.index_title')
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
                            @can('create', App\Models\Transaction::class)
                            <a
                                href="{{ route('transactions.create') }}"
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
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.transactions.inputs.montant')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.transactions.inputs.identifiant_transation')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.transactions.inputs.identifiant_paiement')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.transactions.inputs.date_transaction')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.transactions.inputs.status')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.transactions.inputs.caisse_id')
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($transactions as $transaction)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-right">
                                    {{ $transaction->montant ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $transaction->identifiant_transation ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $transaction->identifiant_paiement ?? '-'
                                    }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $transaction->date_transaction ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $transaction->status ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ optional($transaction->caisse)->intitule
                                    ?? '-' }}
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
                                        @can('update', $transaction)
                                        <a
                                            href="{{ route('transactions.edit', $transaction) }}"
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
                                        @endcan @can('view', $transaction)
                                        <a
                                            href="{{ route('transactions.show', $transaction) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                        @endcan @can('delete', $transaction)
                                        <form
                                            action="{{ route('transactions.destroy', $transaction) }}"
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
                                <td colspan="7">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="mt-10 px-4">
                                        {!! $transactions->render() !!}
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

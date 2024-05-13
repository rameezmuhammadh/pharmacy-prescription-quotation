<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quoation Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-wrap justify-around mt-24 gap-4">
                      
                        <div class="w-1/2  mb-12 ml-8 flex-1 justify-center">
                            <div class="">

                                <table class="items-center bg-transparent w-full border-collapse">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Drug Name</th>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Amount </th>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Sub total </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($quotations as $quotation)
                                        <tr>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                                {{ $quotation->drug->name }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                                {{ $quotation->drug->price }} * {{ $quotation->quantity }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700">
                                                {{ $quotation->total_price }}

                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                        <tr class="flex justify-end" colspan="4">
                                            <td class="text-bold">
                                                <hr class="my-4 bg-slate-600 h-1">
                                                Total:
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex justify-end">
                                <form action="{{ route('quotation.update', $quotation->id) }}" method="POST">

                                    @csrf
                                    @method('PUT')
                                    <div class="mt-4 ">
                                        <x-input-label for="drug_id" :value="__('Drug')" />
                                        <select name="drug_id" id=""
                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                            <option value="">Accept / Reject</option>
                                            <option value="accept">Accept </option>
                                            <option value="reject">Reject</option>
                                        </select>
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
                                        <x-primary-button class="ms-4">
                                            {{ __('Update Status') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Prescription') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-wrap justify-around mt-24 gap-4">
                        <div class="w-1/2 min-w-[300px] mb-12">
                            @foreach(json_decode($prescription->images) as $key => $image)
                            @if($key == 0)
                            <!-- Large Image -->
                            <img src="/images/{{ $image }}" alt="" class="" id="product-img"
                                style="width: 600px; height: 400px;">

                            @endif
                            @endforeach
                            <div class="flex gap-2 mt-2">
                                <!-- Small Images -->
                                @foreach(json_decode($prescription->images) as $image)
                                <div class="w-1/5 cursor-pointer">
                                    <img src="/images/{{ $image }}" alt="" class="w-20 h-20 small-img"
                                        onclick="updateLargeImage(this)">
                                </div>
                                @endforeach
                            </div>
                        </div>
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
                                        <!-- Add this code at the top of your Blade file -->
                                        @php
                                        $totalPrice = 0;
                                        foreach($quotations as $quotation) {
                                        // Check if the current quotation belongs to the desired prescription ID
                                        if ($quotation->prescription_id == $prescription->id) {
                                        // Add the total price of the current quotation to the total price
                                        $totalPrice += $quotation->total_price;
                                        }
                                        }
                                        @endphp

                                        <tr class="flex justify-end" colspan="4">
                                            <td class="text-bold">
                                                <hr class="my-4 bg-slate-600 h-1">
                                                Total:{{$totalPrice}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex justify-end">
                                <form action="{{ route('admin.quotation.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $prescription->id }}" name="prescription_id">
                                    <input type="hidden" value="{{ $prescription->user_id }}" name="user_id">
                                    <div class="mt-4 ">
                                        <x-input-label for="drug_id" :value="__('Drug')" />
                                        <select name="drug_id" id=""
                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                            <option value="">Select Drug</option>
                                            @foreach($drugs as $drug)
                                            <option value="{{ $drug->id }}">{{ $drug->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-4">
                                        <x-input-label for="quantity" :value="__('Qty')" />
                                        <x-text-input id="quantity" class="block mt-1 w-full" type="number"
                                            name="quantity" :value="old('quantity')" required autocomplete="quantity" />
                                        <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
                                        <x-primary-button class="ms-4">

                                            {{ __('Add') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <hr class="h-2 bg-slate-500">
                                <form action="{{ route('admin.quotation.send') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $prescription->id }}" name="prescription_id">
                                    <x-primary-button class="ms-4">

                                        {{ __('Send Quations') }}
                                    </x-primary-button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateLargeImage(image) {
            // Get the source of the clicked small image
            var newSrc = image.src;
            
            // Update the source of the large image
            document.getElementById('product-img').src = newSrc;
        }
    </script>
</x-app-layout>
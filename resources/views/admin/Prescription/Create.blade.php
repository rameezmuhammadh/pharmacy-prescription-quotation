<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Upload Prescription') }}
            </h2>
            <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                href="{{ route('prescription.index') }}">
                {{ __('Prescription List') }}
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('prescription.store') }}" enctype="multipart/form-data">
                        @csrf

                        <x-text-input id="user_id" class="block mt-1 w-full" type="hidden" name="user_id"
                            :value="old('user_id', auth()->user()->id)" required autofocus autocomplete="user_id" />

                        <!-- Name -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        {{-- Image Upload --}}
                        <div class="mt-4">
                            <x-input-label for="images" :value="__('Images')" />
                            {{-- <x-text-input id="images" class="block mt-1 w-full" type="file" name="images[]"
                                :value="old('images')" required autofocus autocomplete="" multiple /> --}}
                            
                                <x-text-input id="images" class="block mt-1 w-full" type="file" name="images[]" :value="old('images')" required autofocus autocomplete="" multiple />

                            <x-input-error :messages="$errors->get('images')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="note" :value="__('Note')" />
                            <x-text-area id="note" class="block mt-1 w-full" type="text" name="note"
                                :value="old('note')" required autofocus autocomplete="note" />
                            <x-input-error :messages="$errors->get('note')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="delivery_address" :value="__('Delivery Address')" />
                            <x-text-input id="delivery_address" class="block mt-1 w-full" type="text"
                                name="delivery_address" :value="old('delivery_address')" required autofocus
                                autocomplete="delivery_address" />
                            <x-input-error :messages="$errors->get('delivery_address')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="delivery_time" :value="__('Delivery Time')" />
                            <x-text-input id="delivery_time" class="block mt-1 w-full" type="time" name="delivery_time"
                                :value="old('delivery_time')" required autofocus autocomplete="delivery_time" />
                            <x-input-error :messages="$errors->get('delivery_time')" class="mt-2" />
                        </div>

                        <x-primary-button class="ms-4">
                            {{ __('Save') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
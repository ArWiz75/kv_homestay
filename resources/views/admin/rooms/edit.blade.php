<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kamar') }}: {{ $room->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.rooms.update', $room) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Nama Kamar')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $room->name)" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <x-input-label for="description" :value="__('Deskripsi')" />
                            <textarea id="description" name="description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" rows="4" required>{{ old('description', $room->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <x-input-label for="price" :value="__('Harga Harian (Rp)')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price', $room->price)" required />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Weekly Price -->
                        <div class="mb-4">
                            <x-input-label for="price_weekly" :value="__('Harga Mingguan (Rp) - Opsional')" />
                            <x-text-input id="price_weekly" class="block mt-1 w-full" type="number" name="price_weekly" :value="old('price_weekly', $room->price_weekly)" />
                            <x-input-error :messages="$errors->get('price_weekly')" class="mt-2" />
                        </div>

                        <!-- Monthly Price -->
                        <div class="mb-4">
                            <x-input-label for="price_monthly" :value="__('Harga Bulanan (Rp) - Opsional')" />
                            <x-text-input id="price_monthly" class="block mt-1 w-full" type="number" name="price_monthly" :value="old('price_monthly', $room->price_monthly)" />
                            <x-input-error :messages="$errors->get('price_monthly')" class="mt-2" />
                        </div>

                        <!-- Amenities -->
                        <div class="mb-4">
                            <x-input-label for="amenities" :value="__('Fasilitas (Pisahkan dengan koma, contoh: WiFi, AC, TV)')" />
                            <x-text-input id="amenities" class="block mt-1 w-full" type="text" name="amenities" :value="old('amenities', implode(', ', $room->amenities ?? []))" />
                            <x-input-error :messages="$errors->get('amenities')" class="mt-2" />
                        </div>

                        <!-- Image -->
                        <div class="mb-4">
                            <x-input-label for="image" :value="__('Foto Kamar (Abaikan jika tidak ingin diubah)')" />
                            @if($room->image)
                                <div class="mt-2 mb-2">
                                    <img src="{{ asset($room->image) }}" alt="{{ $room->name }}" class="h-32 object-cover rounded">
                                </div>
                            @endif
                            <input id="image" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" type="file" name="image" accept="image/*">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <!-- Is Popular -->
                        <div class="block mt-4 mb-6">
                            <label for="is_popular" class="inline-flex items-center">
                                <input id="is_popular" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="is_popular" value="1" {{ old('is_popular', $room->is_popular) ? 'checked' : '' }}>
                                <span class="ms-2 text-sm text-gray-600">{{ __('Tandai sebagai Populer') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.rooms.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <x-primary-button>
                                {{ __('Perbarui') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaturan Web Dinamis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Bagian Hero (Atas)</h3>
                        
                        <div class="mb-4">
                            <x-input-label for="hero_title" :value="__('Judul Utama')" />
                            <x-text-input id="hero_title" class="block mt-1 w-full" type="text" name="hero_title" :value="old('hero_title', $settings['hero_title'] ?? '')" required />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="hero_subtitle" :value="__('Subjudul (Teks Kecil di bawah judul)')" />
                            <textarea id="hero_subtitle" name="hero_subtitle" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" rows="3" required>{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}</textarea>
                        </div>

                        <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Bagian Tentang Kami</h3>
                        
                        <div class="mb-6">
                            <x-input-label for="about_text" :value="__('Deskripsi Singkat')" />
                            <textarea id="about_text" name="about_text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" rows="4" required>{{ old('about_text', $settings['about_text'] ?? '') }}</textarea>
                        </div>

                        <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Informasi Kontak & Footer</h3>

                        <div class="mb-4">
                            <x-input-label for="address" :value="__('Alamat')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address', $settings['address'] ?? '')" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="phone" :value="__('Nomor HP / WhatsApp')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', $settings['phone'] ?? '')" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="email" :value="__('Alamat Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email', $settings['email'] ?? '')" required />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="footer_text" :value="__('Teks Footer')" />
                            <textarea id="footer_text" name="footer_text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" rows="2" required>{{ old('footer_text', $settings['footer_text'] ?? '') }}</textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Simpan Pengaturan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

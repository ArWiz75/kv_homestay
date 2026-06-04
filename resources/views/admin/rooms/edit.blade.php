<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.rooms.index') }}" class="text-white hover:text-gray-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            </a>
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Edit Kamar') }}: {{ $room->name }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="admin-card">
                <div class="admin-card-body">
                    <form action="{{ route('admin.rooms.update', $room) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="admin-form-section">
                            <div class="admin-form-section-title">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                Informasi Dasar Kamar
                            </div>
                            
                            <!-- Name -->
                            <div class="admin-form-group">
                                <label for="name">Nama Kamar <span class="text-red-500">*</span></label>
                                <input id="name" type="text" name="name" value="{{ old('name', $room->name) }}" required autofocus>
                                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
                            </div>

                            <!-- Description -->
                            <div class="admin-form-group">
                                <label for="description">Deskripsi <span class="text-red-500">*</span></label>
                                <textarea id="description" name="description" rows="4" required>{{ old('description', $room->description) }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2 text-red-500 text-sm" />
                            </div>

                            <!-- Amenities -->
                            <div class="admin-form-group">
                                <label for="amenities">Fasilitas Lengkap <span class="text-xs text-gray-500 font-normal">(Pisahkan dengan koma)</span></label>
                                <input id="amenities" type="text" name="amenities" value="{{ old('amenities', implode(', ', $room->amenities ?? [])) }}">
                                <x-input-error :messages="$errors->get('amenities')" class="mt-2 text-red-500 text-sm" />
                            </div>
                        </div>

                        <div class="admin-form-section">
                            <div class="admin-form-section-title">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
                                Pengaturan Harga
                            </div>
                            
                            <div class="admin-form-row">
                                <!-- Price -->
                                <div class="admin-form-group">
                                    <label for="price">Harga Harian (Rp) <span class="text-red-500">*</span></label>
                                    <input id="price" type="number" name="price" value="{{ old('price', $room->price) }}" required>
                                    <x-input-error :messages="$errors->get('price')" class="mt-2 text-red-500 text-sm" />
                                </div>

                                <!-- Weekly Price -->
                                <div class="admin-form-group">
                                    <label for="price_weekly">Harga Mingguan (Rp) <span class="text-xs text-gray-500 font-normal">(Opsional)</span></label>
                                    <input id="price_weekly" type="number" name="price_weekly" value="{{ old('price_weekly', $room->price_weekly) }}">
                                    <x-input-error :messages="$errors->get('price_weekly')" class="mt-2 text-red-500 text-sm" />
                                </div>
                                
                                <!-- Monthly Price -->
                                <div class="admin-form-group" style="grid-column: 1 / -1;">
                                    <label for="price_monthly">Harga Bulanan (Rp) <span class="text-xs text-gray-500 font-normal">(Opsional)</span></label>
                                    <input id="price_monthly" type="number" name="price_monthly" value="{{ old('price_monthly', $room->price_monthly) }}">
                                    <x-input-error :messages="$errors->get('price_monthly')" class="mt-2 text-red-500 text-sm" />
                                </div>
                            </div>
                        </div>

                        <div class="admin-form-section">
                            <div class="admin-form-section-title">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                Media & Status
                            </div>
                            
                            <!-- Image -->
                            <div class="admin-form-group">
                                <label>Foto Utama Kamar <span class="text-xs text-gray-500 font-normal">(Abaikan jika tidak ingin mengubah foto saat ini)</span></label>
                                
                                <div class="flex flex-col sm:flex-row gap-4 mt-2 mb-4">
                                    @if($room->image)
                                        <div class="admin-image-preview shrink-0 m-0 w-48">
                                            <img src="{{ asset($room->image) }}" alt="{{ $room->name }}" class="w-full">
                                            <div class="text-center text-xs mt-1 text-gray-500">Foto Saat Ini</div>
                                        </div>
                                    @endif
                                    
                                    <div class="w-full">
                                        <label class="admin-file-upload h-full flex flex-col justify-center">
                                            <div class="admin-file-upload-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                                                Klik untuk mengganti foto (JPG, PNG)
                                            </div>
                                            <input type="file" name="image" accept="image/*" id="imageInput">
                                        </label>
                                    </div>
                                </div>
                                <div class="admin-image-preview" id="imagePreview" style="display: none;">
                                    <img src="" alt="Preview" id="previewImg">
                                    <div class="text-center text-xs mt-1 font-semibold text-green-600">Foto Baru Yang Akan Diunggah</div>
                                </div>
                                <x-input-error :messages="$errors->get('image')" class="mt-2 text-red-500 text-sm" />
                            </div>

                            <!-- Is Popular -->
                            <div class="mt-6 pt-4 border-t" style="border-color: var(--admin-border-light);">
                                <label for="is_popular" class="inline-flex items-center cursor-pointer">
                                    <div class="admin-toggle-wrapper">
                                        <input id="is_popular" type="checkbox" class="admin-toggle-input" name="is_popular" value="1" {{ old('is_popular', $room->is_popular) ? 'checked' : '' }}>
                                        <div class="admin-toggle-bg">
                                            <div class="admin-toggle-dot"></div>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <span class="text-sm font-semibold" style="color: var(--admin-text);">Tandai sebagai Kamar Populer</span>
                                        <p class="text-xs text-gray-500">Kamar populer akan tampil dengan badge khusus di halaman depan.</p>
                                    </div>
                                </label>
                            </div>

                            <!-- Is Available -->
                            <div class="mt-4 pt-4 border-t" style="border-color: var(--admin-border-light);">
                                <label for="is_available" class="inline-flex items-center cursor-pointer">
                                    <div class="admin-toggle-wrapper">
                                        <input id="is_available" type="checkbox" class="admin-toggle-input" name="is_available" value="1" {{ old('is_available', $room->is_available) ? 'checked' : '' }}>
                                        <div class="admin-toggle-bg">
                                            <div class="admin-toggle-dot"></div>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <span class="text-sm font-semibold" style="color: var(--admin-text);">Kamar Tersedia</span>
                                        <p class="text-xs text-gray-500">Jika dinonaktifkan, kamar akan ditandai "Tidak Tersedia" di halaman depan dan tamu tidak bisa memesan.</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 gap-3">
                            <a href="{{ route('admin.rooms.index') }}" class="admin-btn admin-btn-delete px-5 py-2">
                                Batal
                            </a>
                            <button type="submit" class="admin-btn-primary">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('imagePreview').style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                document.getElementById('imagePreview').style.display = 'none';
            }
        });
    </script>
</x-app-layout>

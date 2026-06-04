<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Pengaturan Teks Website Publik') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="admin-alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="admin-card">
                <div class="admin-card-body p-0">
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Section: Hero -->
                        <div class="admin-form-section" style="border: none; border-radius: 0; border-bottom: 1px solid var(--admin-border-light); margin: 0;">
                            <div class="admin-form-section-title">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                                Bagian Utama (Hero/Paling Atas)
                            </div>
                            
                            <div class="admin-form-group">
                                <label for="hero_title">Judul Utama <span class="text-xs text-gray-500 font-normal">(Muncul besar di atas gambar)</span></label>
                                <input id="hero_title" type="text" name="hero_title" value="{{ old('hero_title', $settings['hero_title'] ?? '') }}" required>
                            </div>

                            <div class="admin-form-group">
                                <label for="hero_subtitle">Subjudul Deskripsi</label>
                                <textarea id="hero_subtitle" name="hero_subtitle" rows="3" required>{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- Section: About -->
                        <div class="admin-form-section" style="border: none; border-radius: 0; border-bottom: 1px solid var(--admin-border-light); margin: 0;">
                            <div class="admin-form-section-title">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                                Bagian Tentang Kami
                            </div>
                            
                            <div class="admin-form-group mb-0">
                                <label for="about_text">Paragraf Deskripsi Singkat</label>
                                <textarea id="about_text" name="about_text" rows="4" required>{{ old('about_text', $settings['about_text'] ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- Section: Contact & Footer -->
                        <div class="admin-form-section" style="border: none; border-radius: 0; border-bottom: 1px solid var(--admin-border-light); margin: 0;">
                            <div class="admin-form-section-title">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                Informasi Kontak & Footer
                            </div>
                            
                            <div class="admin-form-group">
                                <label for="address">Alamat Lengkap</label>
                                <input id="address" type="text" name="address" value="{{ old('address', $settings['address'] ?? '') }}" required>
                            </div>

                            <div class="admin-form-row">
                                <div class="admin-form-group">
                                    <label for="phone">Nomor HP / WhatsApp <span class="text-xs text-gray-500 font-normal">(Contoh: 081234567890)</span></label>
                                    <input id="phone" type="text" name="phone" value="{{ old('phone', $settings['phone'] ?? '') }}" required>
                                </div>

                                <div class="admin-form-group">
                                    <label for="email">Alamat Email</label>
                                    <input id="email" type="email" name="email" value="{{ old('email', $settings['email'] ?? '') }}" required>
                                </div>
                            </div>

                            <div class="admin-form-group mb-0">
                                <label for="footer_text">Slogan / Teks Kecil Footer</label>
                                <textarea id="footer_text" name="footer_text" rows="2" required>{{ old('footer_text', $settings['footer_text'] ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- Section: Social Media -->
                        <div class="admin-form-section" style="border: none; border-radius: 0; margin: 0;">
                            <div class="admin-form-section-title">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                                Link Media Sosial <span class="text-xs text-gray-500 font-normal ml-2">(Kosongkan jika tidak ada)</span>
                            </div>
                            
                            <div class="admin-form-group">
                                <label for="instagram">Link Profil Instagram</label>
                                <input id="instagram" type="url" name="instagram" value="{{ old('instagram', $settings['instagram'] ?? '') }}" placeholder="https://instagram.com/username">
                            </div>

                            <div class="admin-form-group">
                                <label for="facebook">Link Profil Facebook</label>
                                <input id="facebook" type="url" name="facebook" value="{{ old('facebook', $settings['facebook'] ?? '') }}" placeholder="https://facebook.com/username">
                            </div>

                            <div class="admin-form-group mb-0">
                                <label for="tiktok">Link Profil TikTok</label>
                                <input id="tiktok" type="url" name="tiktok" value="{{ old('tiktok', $settings['tiktok'] ?? '') }}" placeholder="https://tiktok.com/@username">
                            </div>
                        </div>

                        <div class="p-6 bg-gray-50 border-t" style="border-color: var(--admin-border-light);">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('dashboard') }}" class="admin-btn admin-btn-delete px-5 py-2">
                                    Batal
                                </a>
                                <button type="submit" class="admin-btn-primary">
                                    Simpan Pengaturan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>

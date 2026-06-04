<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6">
                <h3 class="text-lg font-bold mb-4" style="color: var(--admin-text);">Overview</h3>
                <div class="admin-stat-grid">
                    <!-- Total Rooms -->
                    <div class="admin-stat-card">
                        <div class="admin-stat-icon green">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                        </div>
                        <div class="admin-stat-info">
                            <h3>{{ \App\Models\Room::count() ?? 0 }}</h3>
                            <p>Total Kamar</p>
                        </div>
                    </div>

                    <!-- Popular Rooms -->
                    <div class="admin-stat-card">
                        <div class="admin-stat-icon amber">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        </div>
                        <div class="admin-stat-info">
                            <h3>{{ \App\Models\Room::where('is_popular', true)->count() ?? 0 }}</h3>
                            <p>Kamar Populer</p>
                        </div>
                    </div>

                    <!-- Available Rooms -->
                    <div class="admin-stat-card">
                        <div class="admin-stat-icon green">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        </div>
                        <div class="admin-stat-info">
                            <h3>{{ \App\Models\Room::where('is_available', true)->count() ?? 0 }} / {{ \App\Models\Room::count() }}</h3>
                            <p>Kamar Tersedia</p>
                        </div>
                    </div>

                    <!-- Settings Status -->
                    <div class="admin-stat-card">
                        <div class="admin-stat-icon blue">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                        </div>
                        <div class="admin-stat-info">
                            <h3 style="font-size: 1.2rem; line-height: 1.4;">Active</h3>
                            <p>Web Settings</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h3 class="text-lg font-bold mb-4" style="color: var(--admin-text);">Aksi Cepat</h3>
                <div class="admin-quick-actions">
                    <a href="{{ route('admin.rooms.create') }}" class="admin-quick-action">
                        <div class="admin-quick-action-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                        </div>
                        <span>Tambah Kamar Baru</span>
                    </a>
                    
                    <a href="{{ route('admin.settings.index') }}" class="admin-quick-action">
                        <div class="admin-quick-action-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                        </div>
                        <span>Ubah Teks Homepage</span>
                    </a>
                    
                    <a href="{{ route('welcome') }}" target="_blank" class="admin-quick-action">
                        <div class="admin-quick-action-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                        </div>
                        <span>Pratinjau Website</span>
                    </a>
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-body flex items-start gap-4">
                    <div style="width: 48px; height: 48px; background: #eef2ff; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#4f46e5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-1">Selamat Datang, {{ Auth::user()->name }}!</h4>
                        <p class="text-sm text-gray-600">Anda berhasil masuk ke panel admin KV Homestay. Anda dapat mengelola data kamar, mengubah pengaturan website publik, serta melihat pemesanan masuk. Gunakan menu navigasi di atas untuk berpindah halaman.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

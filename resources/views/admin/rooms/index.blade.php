<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Katalog Kamar') }}
            </h2>
            <a href="{{ route('admin.rooms.create') }}" class="admin-btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Tambah Kamar
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            


            <div class="admin-card">
                <!-- Desktop Table View -->
                <div class="overflow-x-auto admin-desktop-table">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th style="width: 80px;">Gambar</th>
                                <th>Nama Kamar</th>
                                <th>Harga Harian</th>
                                <th>Ketersediaan</th>
                                <th>Populer</th>
                                <th style="text-align: right;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rooms as $room)
                                <tr>
                                    <td>
                                        @if($room->image)
                                            <img src="{{ asset($room->image) }}" alt="{{ $room->name }}" class="admin-thumb">
                                        @else
                                            <div class="admin-thumb" style="background: #f3f4f6; display: flex; align-items: center; justify-content: center;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="font-bold">{{ $room->name }}</div>
                                        @if($room->amenities && count($room->amenities) > 0)
                                            <div class="text-xs mt-1" style="color: var(--admin-text-muted);">
                                                {{ implode(', ', array_slice($room->amenities, 0, 3)) }}...
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="font-bold" style="color: var(--admin-primary-dark);">Rp {{ number_format($room->price, 0, ',', '.') }}</div>
                                    </td>
                                    <td>
                                        @if($room->is_available)
                                            <span class="admin-badge admin-badge-success">Tersedia</span>
                                        @else
                                            <span class="admin-badge admin-badge-danger">Tidak Tersedia</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($room->is_popular)
                                            <span class="admin-badge admin-badge-success">Populer</span>
                                        @else
                                            <span class="admin-badge admin-badge-gray">-</span>
                                        @endif
                                    </td>
                                    <td style="text-align: right;">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('admin.rooms.edit', $room) }}" class="admin-btn admin-btn-edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kamar ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="admin-btn admin-btn-delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align: center; padding: 3rem 1rem;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--admin-text-muted)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin: 0 auto 1rem; opacity: 0.5;"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                        <p style="color: var(--admin-text-muted);">Belum ada data kamar. Silakan tambah kamar pertama Anda.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Mobile Card View -->
            <div class="admin-mobile-cards mt-4">
                @forelse ($rooms as $room)
                    <div class="admin-mobile-card">
                        <div class="admin-mobile-card-header">
                            @if($room->image)
                                <img src="{{ asset($room->image) }}" alt="{{ $room->name }}" class="admin-thumb">
                            @else
                                <div class="admin-thumb" style="background: #f3f4f6; display: flex; align-items: center; justify-content: center;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                </div>
                            @endif
                            <div class="font-bold text-lg" style="color: var(--admin-text);">{{ $room->name }}</div>
                        </div>
                        
                        <div class="admin-mobile-card-body">
                            <div class="admin-mobile-card-row">
                                <span class="admin-mobile-card-label">Harga</span>
                                <span class="admin-mobile-card-value" style="color: var(--admin-primary-dark);">Rp {{ number_format($room->price, 0, ',', '.') }}</span>
                            </div>
                            <div class="admin-mobile-card-row">
                                <span class="admin-mobile-card-label">Ketersediaan</span>
                                <span>
                                    @if($room->is_available)
                                        <span class="admin-badge admin-badge-success">Tersedia</span>
                                    @else
                                        <span class="admin-badge admin-badge-danger">Tidak Tersedia</span>
                                    @endif
                                </span>
                            </div>
                            <div class="admin-mobile-card-row">
                                <span class="admin-mobile-card-label">Status</span>
                                <span>
                                    @if($room->is_popular)
                                        <span class="admin-badge admin-badge-success">Populer</span>
                                    @else
                                        <span class="admin-badge admin-badge-gray">Biasa</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                        
                        <div class="admin-mobile-card-actions">
                            <a href="{{ route('admin.rooms.edit', $room) }}" class="admin-btn admin-btn-edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                Edit
                            </a>
                            <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" class="inline-flex" style="flex:1;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kamar ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="admin-btn admin-btn-delete" style="width:100%; justify-content:center;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="admin-card text-center p-8">
                        <p style="color: var(--admin-text-muted);">Belum ada data kamar.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>

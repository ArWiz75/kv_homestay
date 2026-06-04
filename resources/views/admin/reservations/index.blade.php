<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Daftar Reservasi Masuk') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="admin-alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="admin-card">
                <!-- Desktop Table View -->
                <div class="overflow-x-auto admin-desktop-table">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Info Tamu</th>
                                <th>Kamar & Harga</th>
                                <th>Jadwal Menginap</th>
                                <th>Status</th>
                                <th style="text-align: right;">Aksi Cepat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reservations as $res)
                                <tr>
                                    <td>
                                        <div class="font-bold text-gray-900" style="color: var(--admin-text);">{{ $res->guest_name }}</div>
                                        <div class="text-sm mt-0.5 flex items-center gap-1" style="color: var(--admin-text-muted);">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', str_starts_with($res->guest_phone, '0') ? '62'.substr($res->guest_phone, 1) : $res->guest_phone) }}" target="_blank" class="hover:text-green-600 hover:underline">{{ $res->guest_phone }}</a>
                                        </div>
                                        <div class="text-sm mt-0.5 flex items-center gap-1" style="color: var(--admin-text-muted);">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                            <a href="mailto:{{ $res->guest_email }}" class="hover:text-blue-600 hover:underline">{{ $res->guest_email }}</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="font-bold" style="color: var(--admin-text);">{{ $res->room->name }}</div>
                                        <div class="text-sm mt-1 font-semibold" style="color: var(--admin-primary-dark);">Rp {{ number_format($res->room->price, 0, ',', '.') }} <span class="font-normal text-gray-500">/malam</span></div>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="text-xs font-semibold px-2 py-0.5 bg-gray-100 rounded" style="color: var(--admin-text-secondary);">IN</span>
                                            <span class="font-medium" style="color: var(--admin-text);">{{ $res->check_in->format('d M Y') }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="text-xs font-semibold px-2 py-0.5 bg-gray-100 rounded" style="color: var(--admin-text-secondary);">OUT</span>
                                            <span class="font-medium" style="color: var(--admin-text);">{{ $res->check_out->format('d M Y') }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        @if($res->status == 'pending')
                                            <span class="admin-badge admin-badge-warning">Menunggu</span>
                                        @elseif($res->status == 'confirmed')
                                            <span class="admin-badge admin-badge-success">Dikonfirmasi</span>
                                        @else
                                            <span class="admin-badge admin-badge-danger">Dibatalkan</span>
                                        @endif
                                    </td>
                                    <td style="text-align: right;">
                                        <form action="{{ route('admin.reservations.update', $res) }}" method="POST" class="inline-flex">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" onchange="this.form.submit()" class="text-sm font-medium border border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 transition-colors" style="background-color: {{ $res->status == 'pending' ? '#fef9c3' : ($res->status == 'confirmed' ? '#dcfce7' : '#fee2e2') }}; padding: 0.4rem 1.8rem 0.4rem 0.8rem; cursor: pointer;">
                                                <option value="pending" {{ $res->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="confirmed" {{ $res->status == 'confirmed' ? 'selected' : '' }}>Konfirmasi</option>
                                                <option value="cancelled" {{ $res->status == 'cancelled' ? 'selected' : '' }}>Batalkan</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="text-align: center; padding: 3rem 1rem;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--admin-text-muted)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin: 0 auto 1rem; opacity: 0.5;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                        <p style="color: var(--admin-text-muted);">Belum ada data reservasi masuk.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Mobile Card View -->
            <div class="admin-mobile-cards mt-4">
                @forelse ($reservations as $res)
                    <div class="admin-mobile-card">
                        <div class="admin-mobile-card-header" style="justify-content: space-between; align-items: flex-start;">
                            <div>
                                <div class="font-bold text-lg mb-1" style="color: var(--admin-text);">{{ $res->guest_name }}</div>
                                <div class="text-sm font-medium" style="color: var(--admin-primary-dark);">{{ $res->room->name }}</div>
                            </div>
                            <div>
                                @if($res->status == 'pending')
                                    <span class="admin-badge admin-badge-warning">Menunggu</span>
                                @elseif($res->status == 'confirmed')
                                    <span class="admin-badge admin-badge-success">Dikonfirmasi</span>
                                @else
                                    <span class="admin-badge admin-badge-danger">Dibatalkan</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="admin-mobile-card-body pb-3 mb-3 border-b" style="border-color: var(--admin-border-light);">
                            <div class="admin-mobile-card-row">
                                <span class="admin-mobile-card-label">WhatsApp</span>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', str_starts_with($res->guest_phone, '0') ? '62'.substr($res->guest_phone, 1) : $res->guest_phone) }}" class="admin-mobile-card-value text-green-600 font-bold underline flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                    {{ $res->guest_phone }}
                                </a>
                            </div>
                            <div class="admin-mobile-card-row">
                                <span class="admin-mobile-card-label">Email</span>
                                <span class="admin-mobile-card-value text-sm">{{ $res->guest_email }}</span>
                            </div>
                            <div class="admin-mobile-card-row mt-2">
                                <span class="admin-mobile-card-label">Check-In</span>
                                <span class="admin-mobile-card-value">{{ $res->check_in->format('d M Y') }}</span>
                            </div>
                            <div class="admin-mobile-card-row">
                                <span class="admin-mobile-card-label">Check-Out</span>
                                <span class="admin-mobile-card-value">{{ $res->check_out->format('d M Y') }}</span>
                            </div>
                        </div>
                        
                        <div class="">
                            <form action="{{ route('admin.reservations.update', $res) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <label class="block text-xs font-semibold mb-1 text-gray-500">Ubah Status:</label>
                                <select name="status" onchange="this.form.submit()" class="w-full text-sm font-medium border border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 transition-colors" style="background-color: {{ $res->status == 'pending' ? '#fef9c3' : ($res->status == 'confirmed' ? '#dcfce7' : '#fee2e2') }}; padding: 0.5rem;">
                                    <option value="pending" {{ $res->status == 'pending' ? 'selected' : '' }}>Pending (Menunggu)</option>
                                    <option value="confirmed" {{ $res->status == 'confirmed' ? 'selected' : '' }}>Konfirmasi</option>
                                    <option value="cancelled" {{ $res->status == 'cancelled' ? 'selected' : '' }}>Batalkan</option>
                                </select>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="admin-card text-center p-8">
                        <p style="color: var(--admin-text-muted);">Belum ada data reservasi masuk.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>

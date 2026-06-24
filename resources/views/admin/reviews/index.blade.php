<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold text-white leading-tight">
                    Kelola Ulasan Tamu
                </h2>
                <p class="text-sm text-green-100 mt-1">Setujui atau hapus ulasan tamu yang masuk</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="admin-card">
                <div class="p-0 overflow-x-auto">
                    <table class="admin-table w-full">
                        <thead>
                            <tr>
                                <th>Nama Tamu</th>
                                <th>Penilaian</th>
                                <th>Ulasan</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th class="text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reviews as $review)
                                <tr>
                                    <td class="font-medium text-gray-900">{{ $review->guest_name }}</td>
                                    <td>
                                        <div class="flex items-center text-yellow-500">
                                            @for($i=1; $i<=5; $i++)
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="{{ $i <= $review->rating ? 'currentColor' : '#e5e7eb' }}"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                            @endfor
                                        </div>
                                    </td>
                                    <td style="max-width: 300px;">
                                        <p class="truncate" title="{{ $review->comment }}">{{ $review->comment }}</p>
                                    </td>
                                    <td>
                                        @if($review->is_approved)
                                            <span class="admin-badge admin-badge-success">Disetujui</span>
                                        @else
                                            <span class="admin-badge admin-badge-warning">Menunggu</span>
                                        @endif
                                    </td>
                                    <td class="text-sm text-gray-500">{{ $review->created_at->format('d M Y') }}</td>
                                    <td class="text-right">
                                        <div class="flex justify-end gap-2">
                                            @if(!$review->is_approved)
                                                <form action="{{ route('admin.reviews.approve', $review->id) }}" method="POST" onsubmit="return confirm('Setujui ulasan ini agar tampil di halaman utama?');">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="admin-btn admin-btn-edit" style="background:#ecfdf5; color:#059669;">
                                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                                        Setujui
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="admin-btn admin-btn-delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-8 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-3 text-gray-300"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                        Belum ada ulasan yang masuk.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($reviews->hasPages())
                    <div class="p-4 border-t" style="border-color: var(--admin-border-light);">
                        {{ $reviews->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

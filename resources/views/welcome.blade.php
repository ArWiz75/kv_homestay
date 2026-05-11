<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KV HOMESTAY | Penginapan Nyaman Bernuansa Alam</title>
    <meta name="description" content="Temukan kenyamanan menginap di KV HOMESTAY. Nikmati fasilitas lengkap dengan nuansa alam yang menenangkan.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    @php
        $waPhone = preg_replace('/[^0-9]/', '', $settings['phone'] ?? '6281234567890');
        if (str_starts_with($waPhone, '0')) {
            $waPhone = '62' . substr($waPhone, 1);
        }
    @endphp

    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="container nav-container">
            <a href="#" class="logo">KV Homestay.</a>
            <ul class="nav-links">
                <li><a href="#home">Beranda</a></li>
                <li><a href="#about">Tentang Kami</a></li>
                <li><a href="#rooms">Katalog Kamar</a></li>
                <li><a href="#contact">Hubungi Kami</a></li>
                <li>
                    <a href="{{ Auth::check() ? route('dashboard') : route('login') }}" class="btn-primary-outline" style="padding: 0.5rem 1rem; border-color: var(--clr-primary); color: var(--clr-primary); font-weight: 200;">
                        {{ Auth::check() ? 'Dashboard' : 'Login Admin' }}
                    </a>
                </li>
            </ul>
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header id="home" class="hero">
        <div class="hero-image" style="background-image: url('{{ asset('assets/images/hero.png') }}');"></div>
        <div class="hero-overlay"></div>
        <div class="container hero-content fade-in">
            <h1>{!! nl2br(e($settings['hero_title'] ?? 'Ketenangan Alam dalam Kenyamanan Rumah')) !!}</h1>
            <p>{{ $settings['hero_subtitle'] ?? 'Lepaskan penat dan temukan kedamaian di KV Homestay.' }}</p>
            <div class="hero-buttons">
                <a href="#rooms" class="btn-primary">Lihat Katalog</a>
                <a href="#contact" class="btn-secondary">Pesan Sekarang</a>
            </div>
        </div>
    </header>

    <!-- About / Features Section -->
    <section id="about" class="about section">
        <div class="container">
            <div class="about-grid">
                <div class="about-text fade-in">
                    <h2 class="section-title">Harmoni Sempurna</h2>
                    <p>{{ $settings['about_text'] ?? 'KV Homestay dirancang untuk memberikan pengalaman menginap yang tak terlupakan.' }}</p>
                    
                    <div class="features-list">
                        <div class="feature-item">
                            <div class="feature-icon">🌿</div>
                            <div class="feature-desc">
                                <h3>Lingkungan Asri</h3>
                                <p>Dikelilingi taman hijau yang menyegarkan.</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">✨</div>
                            <div class="feature-desc">
                                <h3>Kebersihan Terjamin</h3>
                                <p>Standar kebersihan premium untuk kenyamanan Anda.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-image fade-in">
                    <img src="{{ asset('assets/images/exterior.png') }}" alt="Eksterior KV Dashboardstay">
                </div>
            </div>
        </div>
    </section>

    <!-- Room Catalog Section -->
    <section id="rooms" class="rooms section bg-light">
        <div class="container">
            <div class="section-header fade-in">
                <h2 class="section-title">Pilihan Kamar</h2>
                <p class="section-subtitle">Temukan ruangan yang paling sesuai dengan kebutuhan istirahat Anda.</p>
            </div>

            <div class="room-grid">
                @forelse ($rooms as $index => $room)
                    <div class="room-card fade-in" style="transition-delay: {{ $index * 0.2 }}s;">
                        <div class="room-img-wrapper">
                            @if($room->image)
                                <img src="{{ asset($room->image) }}" alt="{{ $room->name }}" class="room-img">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                            @endif
                            
                            @if($room->is_popular)
                                <div class="room-badge">Terpopuler</div>
                            @endif
                        </div>
                        <div class="room-info">
                            <h3 class="room-title">{{ $room->name }}</h3>
                            <p class="room-desc">{{ $room->description }}</p>
                            <div class="room-amenities">
                                @if(is_array($room->amenities) && count($room->amenities) > 0)
                                    @foreach($room->amenities as $amenity)
                                        <span>✓ {{ $amenity }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <div class="room-pricing-details" style="margin-bottom: 1.5rem; background: #fafafa; padding: 1rem; border-radius: 8px;">
                                <div style="display: flex; justify-content: space-between; font-size: 0.95rem; margin-bottom: 0.4rem; padding-bottom: 0.4rem; border-bottom: 1px dashed #e2e8f0;">
                                    <span style="color: var(--clr-text-light);">Harian:</span>
                                    <span style="font-weight: 600; color: var(--clr-primary);">Rp {{ number_format($room->price, 0, ',', '.') }}</span>
                                </div>
                                @if($room->price_weekly)
                                <div style="display: flex; justify-content: space-between; font-size: 0.95rem; margin-bottom: 0.4rem; padding-bottom: 0.4rem; border-bottom: 1px dashed #e2e8f0;">
                                    <span style="color: var(--clr-text-light);">Mingguan:</span>
                                    <span style="font-weight: 600; color: var(--clr-primary);">Rp {{ number_format($room->price_weekly, 0, ',', '.') }}</span>
                                </div>
                                @endif
                                @if($room->price_monthly)
                                <div style="display: flex; justify-content: space-between; font-size: 0.95rem;">
                                    <span style="color: var(--clr-text-light);">Bulanan:</span>
                                    <span style="font-weight: 600; color: var(--clr-primary);">Rp {{ number_format($room->price_monthly, 0, ',', '.') }}</span>
                                </div>
                                @endif
                            </div>
                            <div class="room-footer" style="justify-content: center; padding-top: 0; border-top: none;">
                                <a href="https://wa.me/{{ $waPhone }}?text=Halo,%20saya%20tertarik%20untuk%20memesan%20{{ urlencode($room->name) }}" target="_blank" class="btn-primary-outline btn-sm" style="width: 100%; text-align: center;">Pesan via WA</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-500">
                        Belum ada kamar yang ditambahkan.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="footer">
        <div class="container footer-container">
            <div class="footer-brand fade-in">
                <a href="#" class="logo footer-logo">KV Homestay.</a>
                <p>{{ $settings['footer_text'] ?? 'Menyediakan pengalaman menginap dengan kenyamanan seperti di rumah sendiri.' }}</p>
            </div>
            <div class="footer-contact fade-in">
                <h3>Hubungi Kami</h3>
                <p>{{ $settings['address'] ?? '📍 Jl. Alam Sari No. 12, Bali, Indonesia' }}</p>
                <p>{{ $settings['phone'] ?? '📞 +62 812 3456 7890' }}</p>
                <p>{{ $settings['email'] ?? '✉️ hello@kvhomestay.com' }}</p>
            </div>
            <div class="footer-social fade-in">
                <h3>Ikuti Kami</h3>
                <div class="social-links">
                    <a href="#">Instagram</a>
                    <a href="#">Facebook</a>
                    <a href="#">TikTok</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 KV_Homestay. All rights reserved.</p>
        </div>
    </footer>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>

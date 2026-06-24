<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n-title="page_title">KV HOMESTAY | Penginapan Nyaman Bernuansa Alam</title>
    <meta name="description" content="Temukan kenyamanan menginap di KV HOMESTAY. Nikmati fasilitas lengkap dengan nuansa alam yang menenangkan.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}?v={{ time() }}">
    <style>
        .lp-reviews { padding: 5rem 0; background: #f8fafc; }
        .lp-reviews__grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        .lp-review-card {
            background: #fff;
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            border: 1px solid rgba(0,0,0,0.02);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .lp-review-card:hover { transform: translateY(-5px); }
        .lp-review-stars { margin-bottom: 1rem; display: flex; gap: 0.25rem; }
        .lp-review-comment { font-size: 0.95rem; color: #4b5563; line-height: 1.6; margin-bottom: 1.5rem; font-style: italic; }
        .lp-review-name { font-weight: 600; font-size: 1rem; color: #111827; margin: 0; }
    </style>
</head>
<body>
    @php
        $waPhone = preg_replace('/[^0-9]/', '', $settings['phone'] ?? '6281234567890');
        if (str_starts_with($waPhone, '0')) {
            $waPhone = '62' . substr($waPhone, 1);
        }
    @endphp

    <!-- ===== NAVBAR (Minimal Floating) ===== -->
    <nav class="lp-nav" id="lp-nav">
        <div class="lp-nav__inner">
            <a href="#" class="lp-nav__logo">KV<span>Homestay</span></a>
            <div class="lp-nav__links" id="lp-nav-links">
                <a href="#rooms" data-i18n="nav_rooms">Kamar</a>
                <a href="#features" data-i18n="nav_features">Fasilitas</a>
                <a href="#contact" data-i18n="nav_contact">Kontak</a>
            </div>

            <!-- Language Toggle -->
            <div class="lp-lang-toggle" id="lp-lang-toggle" role="button" tabindex="0" aria-label="Switch Language">
                <div class="lp-lang-toggle__track">
                    <span class="lp-lang-toggle__option" data-lang="id">ID</span>
                    <span class="lp-lang-toggle__option" data-lang="en">EN</span>
                    <div class="lp-lang-toggle__slider"></div>
                </div>
            </div>

            <a href="https://wa.me/{{ $waPhone }}?text=Halo,%20saya%20ingin%20bertanya%20tentang%20KV%20Homestay" target="_blank" class="lp-nav__cta" id="lp-wa-nav" data-wa-base="https://wa.me/{{ $waPhone }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                <span data-i18n="nav_chat_wa">Chat WA</span>
            </a>
            <button class="lp-nav__burger" id="lp-burger" aria-label="Toggle Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </nav>

    <!-- ===== HERO SECTION ===== -->
    <header class="lp-hero" id="home">
        <div class="lp-hero__bg" style="background-image: url('{{ asset('assets/images/hero.png') }}');"></div>
        <div class="lp-hero__overlay"></div>

        <!-- Floating particles -->
        <div class="lp-hero__particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>

        <div class="lp-hero__content">
            <div class="lp-hero__badge anim-fade" style="--delay: 0.1s">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                <span data-i18n="hero_badge">Penginapan Bernuansa Alam</span>
            </div>
            <h1 class="lp-hero__title anim-fade" style="--delay: 0.3s">
                <span data-i18n="hero_title" data-i18n-html="true">{!! nl2br(e($settings['hero_title'] ?? 'Ketenangan Alam dalam Kenyamanan Rumah')) !!}</span>
            </h1>
            <p class="lp-hero__subtitle anim-fade" style="--delay: 0.5s">
                <span data-i18n="hero_subtitle">{{ $settings['hero_subtitle'] ?? 'Lepaskan penat dan temukan kedamaian di KV Homestay. Nikmati suasana alam yang menenangkan dengan fasilitas modern.' }}</span>
            </p>
            <div class="lp-hero__actions anim-fade" style="--delay: 0.7s">
                <a href="#rooms" class="lp-btn lp-btn--white">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    <span data-i18n="hero_btn_rooms">Lihat Kamar</span>
                </a>
                <a href="https://wa.me/{{ $waPhone }}?text=Halo,%20saya%20ingin%20bertanya%20tentang%20KV%20Homestay" target="_blank" class="lp-btn lp-btn--glass lp-wa-link" data-wa-base="https://wa.me/{{ $waPhone }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    <span data-i18n="hero_btn_contact">Hubungi Kami</span>
                </a>
            </div>
        </div>

        <!-- Stats chips overlay at bottom of hero -->
        <div class="lp-hero__stats anim-fade" style="--delay: 0.9s">
            <div class="lp-stat-chip">
                <span class="lp-stat-chip__number" data-target="{{ $rooms->where('is_available', true)->count() }}">0</span>
                <span class="lp-stat-chip__label" data-i18n="stat_rooms">Kamar Tersedia</span>
            </div>
            <div class="lp-stat-chip__divider"></div>
            <div class="lp-stat-chip">
                <span class="lp-stat-chip__number" data-target="500">0</span>
                <span class="lp-stat-chip__label" data-i18n="stat_guests">Tamu Puas</span>
            </div>
            <div class="lp-stat-chip__divider"></div>
            <div class="lp-stat-chip">
                <span class="lp-stat-chip__number" data-target="5">0</span>
                <span class="lp-stat-chip__label" data-i18n="stat_years">Tahun Beroperasi</span>
            </div>
        </div>

        <div class="lp-hero__scroll">
            <div class="lp-scroll-dot"></div>
        </div>
    </header>

    <!-- ===== ROOMS SECTION ===== -->
    <section id="rooms" class="lp-rooms">
        <div class="lp-container">
            <div class="lp-section-head">
                <div class="lp-section-head__label anim-slide" data-i18n="rooms_label">Katalog Kamar</div>
                <h2 class="lp-section-head__title anim-slide">
                    <span data-i18n="rooms_title_prefix">Temukan</span> <span class="lp-gradient-text" data-i18n="rooms_title_highlight">Kamar Impian.</span>
                </h2>
                <p class="lp-section-head__desc anim-slide" data-i18n="rooms_desc">Kenyamanan tak tertandingi dengan desain yang memanjakan mata.</p>
            </div>

            <div class="lp-rooms__grid">
                @forelse ($rooms as $index => $room)
                    <div class="lp-room-card anim-slide" style="--delay: {{ $index * 0.12 }}s">
                        <div class="lp-room-card__img">
                            @if($room->image)
                                <img src="{{ asset($room->image) }}" alt="{{ $room->name }}" loading="lazy">
                            @else
                                <div class="lp-room-card__placeholder">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
                                </div>
                            @endif
                            @if($room->is_popular)
                                <div class="lp-room-card__badge">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                    <span data-i18n="room_popular">Populer</span>
                                </div>
                            @endif
                            @if(!$room->is_available)
                                <div class="lp-room-card__unavailable" data-i18n="room_unavailable">Tidak Tersedia</div>
                            @endif
                        </div>
                        <div class="lp-room-card__body">
                            <h3 class="lp-room-card__name">{{ $room->name }}</h3>
                            <p class="lp-room-card__desc">{{ $room->description }}</p>

                            @if(is_array($room->amenities) && count($room->amenities) > 0)
                            <div class="lp-room-card__amenities">
                                @foreach($room->amenities as $amenity)
                                    <span class="lp-amenity-tag">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                        {{ $amenity }}
                                    </span>
                                @endforeach
                            </div>
                            @endif

                            <div class="lp-room-card__pricing">
                                <div class="lp-price-row lp-price-row--main">
                                    <span class="lp-price-label" data-i18n="price_daily">Harian</span>
                                    <span class="lp-price-value">Rp {{ number_format($room->price, 0, ',', '.') }}</span>
                                </div>
                                @if($room->price_weekly)
                                <div class="lp-price-row">
                                    <span class="lp-price-label" data-i18n="price_weekly">Mingguan</span>
                                    <span class="lp-price-value">Rp {{ number_format($room->price_weekly, 0, ',', '.') }}</span>
                                </div>
                                @endif
                                @if($room->price_monthly)
                                <div class="lp-price-row">
                                    <span class="lp-price-label" data-i18n="price_monthly">Bulanan</span>
                                    <span class="lp-price-value">Rp {{ number_format($room->price_monthly, 0, ',', '.') }}</span>
                                </div>
                                @endif
                            </div>

                            @if($room->is_available)
                            <a href="https://wa.me/{{ $waPhone ?? '' }}?text=Halo,%20saya%20tertarik%20untuk%20memesan%20{{ urlencode($room->name) }}" target="_blank" class="lp-room-card__cta lp-wa-link" data-wa-base="https://wa.me/{{ $waPhone ?? '' }}" data-room-name="{{ $room->name }}">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                <span data-i18n="room_book_wa">Pesan via WhatsApp</span>
                            </a>
                            @else
                            <div class="lp-room-card__cta lp-room-card__cta--disabled">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>
                                <span data-i18n="room_unavailable">Tidak Tersedia</span>
                            </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="lp-rooms__empty">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                        <p data-i18n="rooms_empty">Belum ada kamar yang ditambahkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ===== FEATURES (Compact Bento Grid) ===== -->
    <section id="features" class="lp-features">
        <div class="lp-container">
            <div class="lp-section-head lp-section-head--center">
                <div class="lp-section-head__label anim-slide" data-i18n="features_label">Mengapa Kami</div>
                <h2 class="lp-section-head__title anim-slide"><span data-i18n="features_title_prefix">Pengalaman</span> <span class="lp-gradient-text" data-i18n="features_title_highlight">Terbaik.</span></h2>
            </div>
            <div class="lp-bento">
                <div class="lp-bento__card lp-bento__card--lg anim-slide" style="--delay: 0.1s">
                    <div class="lp-bento__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 8C8 10 5.9 16.17 3.82 21.34l1.89.66.95-2.3c.48.17.98.3 1.34.3C19 20 22 3 22 3c-1 2-8 2.25-13 3.25S2 11.5 2 13.5s1.75 3.75 1.75 3.75"/></svg>
                    </div>
                    <h3 data-i18n="feature_nature_title">Lingkungan Asri</h3>
                    <p data-i18n="feature_nature_desc">Dikelilingi taman hijau yang menyegarkan pikiran dan jiwa. Udara segar dan pemandangan alam memanjakan setiap tamu.</p>
                </div>
                <div class="lp-bento__card anim-slide" style="--delay: 0.2s">
                    <div class="lp-bento__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <h3 data-i18n="feature_clean_title">Kebersihan Terjamin</h3>
                    <p data-i18n="feature_clean_desc">Standar kebersihan premium untuk kenyamanan Anda.</p>
                </div>
                <div class="lp-bento__card anim-slide" style="--delay: 0.3s">
                    <div class="lp-bento__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                    </div>
                    <h3 data-i18n="feature_facility_title">Fasilitas Lengkap</h3>
                    <p data-i18n="feature_facility_desc">WiFi cepat, AC, dan perlengkapan modern.</p>
                </div>
                <div class="lp-bento__card anim-slide" style="--delay: 0.35s">
                    <div class="lp-bento__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <h3 data-i18n="feature_location_title">Lokasi Strategis</h3>
                    <p data-i18n="feature_location_desc">Mudah dijangkau dari pusat kota dan wisata.</p>
                </div>
                <div class="lp-bento__card lp-bento__card--accent anim-slide" style="--delay: 0.4s">
                    <div class="lp-bento__img">
                        <img src="{{ asset('assets/images/exterior.png') }}" alt="Eksterior KV Homestay" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== REVIEWS SECTION ===== -->
    <section id="reviews" class="lp-reviews">
        <div class="lp-container">
            <div class="lp-section-head lp-section-head--center">
                <div class="lp-section-head__label anim-slide" data-i18n="reviews_label">Testimoni</div>
                <h2 class="lp-section-head__title anim-slide"><span data-i18n="reviews_title_prefix">Kata</span> <span class="lp-gradient-text" data-i18n="reviews_title_highlight">Mereka.</span></h2>
            </div>

            @if(session('success'))
                <div class="lp-alert lp-alert--success" style="background: #dcfce7; color: #166534; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; text-align: center; border: 1px solid #bbf7d0;">
                    {{ session('success') }}
                </div>
            @endif

            <div class="lp-reviews__grid">
                @forelse($reviews as $review)
                    <div class="lp-review-card anim-slide">
                        <div>
                            <div class="lp-review-stars">
                                @for($i=1; $i<=5; $i++)
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="{{ $i <= $review->rating ? '#f59e0b' : '#e5e7eb' }}"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                @endfor
                            </div>
                            <p class="lp-review-comment">"{{ $review->comment }}"</p>
                        </div>
                        <h4 class="lp-review-name">- {{ $review->guest_name }}</h4>
                    </div>
                @empty
                    <div class="lp-reviews__empty" style="text-align: center; grid-column: 1 / -1; color: #6b7280; background: #fff; padding: 2rem; border-radius: 16px; border: 1px solid rgba(0,0,0,0.05);" data-i18n="reviews_empty">
                        Belum ada ulasan saat ini. Jadilah yang pertama!
                    </div>
                @endforelse
            </div>

            <div class="lp-reviews__actions" style="text-align: center; margin-top: 3rem;">
                <button onclick="document.getElementById('reviewModal').style.display='flex'" class="lp-btn lp-btn--primary" data-i18n="review_btn_write">Tulis Ulasan Anda</button>
            </div>
        </div>
    </section>

    <!-- ===== ABOUT COMPACT ===== -->
    <section class="lp-about">
        <div class="lp-container">
            <div class="lp-about__inner anim-slide">
                <div class="lp-about__text">
                    <h2><span data-i18n="about_title_prefix">Tentang</span> <span class="lp-gradient-text" data-i18n="about_title_highlight">Kami</span></h2>
                    <p data-i18n="about_desc">{{ $settings['about_text'] ?? 'KV Homestay dirancang untuk memberikan pengalaman menginap yang tak terlupakan. Dengan lokasi strategis dan suasana alam yang asri, kami menjamin kenyamanan terbaik untuk setiap tamu.' }}</p>
                    <a href="https://wa.me/{{ $waPhone }}?text=Halo,%20saya%20ingin%20bertanya%20tentang%20KV%20Homestay" target="_blank" class="lp-btn lp-btn--primary lp-wa-link" data-wa-base="https://wa.me/{{ $waPhone }}">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        <span data-i18n="about_btn_wa">Hubungi via WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== FOOTER (Slim) ===== -->
    <footer id="contact" class="lp-footer">
        <div class="lp-container">
            <div class="lp-footer__grid">
                <div class="lp-footer__brand">
                    <a href="#" class="lp-nav__logo lp-nav__logo--light">KV<span>Homestay</span></a>
                    <p data-i18n="footer_desc">{{ $settings['footer_text'] ?? 'Menyediakan pengalaman menginap dengan kenyamanan seperti di rumah sendiri.' }}</p>
                </div>
                <div class="lp-footer__contact">
                    <h4 data-i18n="footer_contact">Kontak</h4>
                    <ul>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            {{ $settings['address'] ?? 'Jl. Alam Sari No. 12, Bali, Indonesia' }}
                        </li>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            {{ $settings['phone'] ?? '+62 812 3456 7890' }}
                        </li>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            {{ $settings['email'] ?? 'hello@kvhomestay.com' }}
                        </li>
                    </ul>
                </div>
                <div class="lp-footer__social">
                    <h4 data-i18n="footer_follow">Ikuti Kami</h4>
                    <div class="lp-social-row">
                        @if(!empty($settings['instagram']))
                            <a href="{{ $settings['instagram'] }}" target="_blank" class="lp-social-icon" aria-label="Instagram">
                                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                        @endif
                        @if(!empty($settings['facebook']))
                            <a href="{{ $settings['facebook'] }}" target="_blank" class="lp-social-icon" aria-label="Facebook">
                                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385h-3.047v-3.47h3.047v-2.642c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953h-1.514c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385c5.738-.9 10.126-5.864 10.126-11.854z"/></svg>
                            </a>
                        @endif
                        @if(!empty($settings['tiktok']))
                            <a href="{{ $settings['tiktok'] }}" target="_blank" class="lp-social-icon" aria-label="TikTok">
                                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                            </a>
                        @endif
                        @if(empty($settings['instagram']) && empty($settings['facebook']) && empty($settings['tiktok']))
                            <a href="#" class="lp-social-icon" aria-label="Instagram">
                                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                            <a href="#" class="lp-social-icon" aria-label="Facebook">
                                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385h-3.047v-3.47h3.047v-2.642c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953h-1.514c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385c5.738-.9 10.126-5.864 10.126-11.854z"/></svg>
                            </a>
                            <a href="#" class="lp-social-icon" aria-label="TikTok">
                                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="lp-footer__bottom">
                <p>&copy; {{ date('Y') }} KV Homestay. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/{{ $waPhone }}?text=Halo,%20saya%20ingin%20bertanya%20tentang%20KV%20Homestay" target="_blank" class="lp-wa-fab lp-wa-link" aria-label="Chat WhatsApp" data-wa-base="https://wa.me/{{ $waPhone }}">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
    </a>

    <!-- Review Modal -->
    <div id="reviewModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999; align-items:center; justify-content:center; backdrop-filter:blur(4px);">
        <div style="background:#fff; padding:2rem; border-radius:16px; width:90%; max-width:500px; position:relative; box-shadow:0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);">
            <button onclick="document.getElementById('reviewModal').style.display='none'" style="position:absolute; top:1rem; right:1rem; background:none; border:none; cursor:pointer; color:#6b7280;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
            <h3 style="margin-top:0; font-size:1.5rem; margin-bottom:1.5rem; color:#111827;" data-i18n="review_modal_title">Bagikan Pengalaman Anda</h3>
            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf
                <div style="margin-bottom:1.2rem;">
                    <label style="display:block; margin-bottom:.5rem; font-weight:500; font-size:0.9rem; color:#374151;" data-i18n="review_modal_name">Nama Anda</label>
                    <input type="text" name="guest_name" required style="width:100%; padding:.8rem 1rem; border:1px solid #d1d5db; border-radius:8px; font-family:inherit; transition:border-color 0.2s;" onfocus="this.style.borderColor='#6B8F71'; this.style.outline='none'" onblur="this.style.borderColor='#d1d5db'">
                </div>
                <div style="margin-bottom:1.2rem;">
                    <label style="display:block; margin-bottom:.5rem; font-weight:500; font-size:0.9rem; color:#374151;" data-i18n="review_modal_rating">Penilaian (1-5 Bintang)</label>
                    <select name="rating" required style="width:100%; padding:.8rem 1rem; border:1px solid #d1d5db; border-radius:8px; font-family:inherit; background-color:#fff;">
                        <option value="5" data-i18n="review_rating_5">5 Bintang - Luar Biasa</option>
                        <option value="4" data-i18n="review_rating_4">4 Bintang - Sangat Bagus</option>
                        <option value="3" data-i18n="review_rating_3">3 Bintang - Bagus</option>
                        <option value="2" data-i18n="review_rating_2">2 Bintang - Cukup</option>
                        <option value="1" data-i18n="review_rating_1">1 Bintang - Kurang</option>
                    </select>
                </div>
                <div style="margin-bottom:1.5rem;">
                    <label style="display:block; margin-bottom:.5rem; font-weight:500; font-size:0.9rem; color:#374151;" data-i18n="review_modal_comment">Ulasan Anda</label>
                    <textarea name="comment" rows="4" required style="width:100%; padding:.8rem 1rem; border:1px solid #d1d5db; border-radius:8px; font-family:inherit; resize:vertical; transition:border-color 0.2s;" onfocus="this.style.borderColor='#6B8F71'; this.style.outline='none'" onblur="this.style.borderColor='#d1d5db'"></textarea>
                </div>
                <button type="submit" class="lp-btn lp-btn--primary" style="width:100%; justify-content:center; padding:1rem;" data-i18n="review_modal_submit">Kirim Ulasan</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/js/landing.js') }}?v={{ time() }}"></script>
</body>
</html>

    <!-- Hero Section -->
    <header id="home" class="hero">
        <div class="hero-image" style="background-image: url('{{ asset('assets/images/hero.png') }}');"></div>
        <div class="hero-overlay"></div>
        <div class="container hero-content fade-in">
            <h1>{!! nl2br(e($settings['hero_title'] ?? 'Ketenangan Alam dalam Kenyamanan Rumah')) !!}</h1>
            <p>{{ $settings['hero_subtitle'] ?? 'Lepaskan penat dan temukan kedamaian di KV Homestay. Nikmati suasana alam yang menenangkan dengan fasilitas modern.' }}</p>
            <div class="hero-buttons">
                <a href="#rooms" class="btn-primary">Lihat Katalog</a>
                <a href="#contact" class="btn-secondary">Hubungi Kami</a>
            </div>
        </div>
        <div class="scroll-indicator">
            <span>Scroll</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M19 12l-7 7-7-7"/></svg>
        </div>
    </header>

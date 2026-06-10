    <!-- About / Features Section -->
    <section id="about" class="about section">
        <div class="container">
            <div class="about-grid">
                <div class="about-text fade-in-left">
                    <h2 class="section-title">Harmoni Sempurna</h2>
                    <p>{{ $settings['about_text'] ?? 'KV Homestay dirancang untuk memberikan pengalaman menginap yang tak terlupakan. Dengan lokasi strategis dan suasana alam yang asri, kami menjamin kenyamanan terbaik untuk setiap tamu.' }}</p>
                    
                    <div class="features-list">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 8C8 10 5.9 16.17 3.82 21.34l1.89.66.95-2.3c.48.17.98.3 1.34.3C19 20 22 3 22 3c-1 2-8 2.25-13 3.25S2 11.5 2 13.5s1.75 3.75 1.75 3.75"/></svg>
                            </div>
                            <div class="feature-desc">
                                <h3>Lingkungan Asri</h3>
                                <p>Dikelilingi taman hijau yang menyegarkan pikiran dan jiwa.</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            </div>
                            <div class="feature-desc">
                                <h3>Kebersihan Terjamin</h3>
                                <p>Standar kebersihan premium untuk kenyamanan Anda.</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                            </div>
                            <div class="feature-desc">
                                <h3>Fasilitas Lengkap</h3>
                                <p>WiFi cepat, AC, dan perlengkapan modern di setiap kamar.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-image fade-in-right">
                    <img src="{{ asset('assets/images/exterior.png') }}" alt="Eksterior KV Homestay">
                </div>
            </div>
        </div>
    </section>

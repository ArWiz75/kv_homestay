document.addEventListener('DOMContentLoaded', () => {

    // =========================================
    //  TRANSLATION SYSTEM (ID ↔ EN)
    // =========================================
    const translations = {
        id: {
            // Page
            page_title: 'KV HOMESTAY | Penginapan Nyaman Bernuansa Alam',

            // Nav
            nav_rooms: 'Kamar',
            nav_features: 'Fasilitas',
            nav_contact: 'Kontak',
            nav_chat_wa: 'Chat WA',

            // Hero
            hero_badge: 'Penginapan Bernuansa Alam',
            hero_title: 'Ketenangan Alam dalam\nKenyamanan Rumah',
            hero_subtitle: 'Lepaskan penat dan temukan kedamaian di KV Homestay. Nikmati suasana alam yang menenangkan dengan fasilitas modern.',
            hero_btn_rooms: 'Lihat Kamar',
            hero_btn_contact: 'Hubungi Kami',

            // Stats
            stat_rooms: 'Kamar Tersedia',
            stat_guests: 'Tamu Puas',
            stat_years: 'Tahun Beroperasi',

            // Rooms
            rooms_label: 'Katalog Kamar',
            rooms_title_prefix: 'Temukan',
            rooms_title_highlight: 'Kamar Impian.',
            rooms_desc: 'Kenyamanan tak tertandingi dengan desain yang memanjakan mata.',
            rooms_empty: 'Belum ada kamar yang ditambahkan.',
            room_popular: 'Populer',
            room_unavailable: 'Tidak Tersedia',
            room_book_wa: 'Pesan via WhatsApp',
            price_daily: 'Harian',
            price_weekly: 'Mingguan',
            price_monthly: 'Bulanan',

            // Features
            features_label: 'Mengapa Kami',
            features_title_prefix: 'Pengalaman',
            features_title_highlight: 'Terbaik.',
            feature_nature_title: 'Lingkungan Asri',
            feature_nature_desc: 'Dikelilingi taman hijau yang menyegarkan pikiran dan jiwa. Udara segar dan pemandangan alam memanjakan setiap tamu.',
            feature_clean_title: 'Kebersihan Terjamin',
            feature_clean_desc: 'Standar kebersihan premium untuk kenyamanan Anda.',
            feature_facility_title: 'Fasilitas Lengkap',
            feature_facility_desc: 'WiFi cepat, AC, dan perlengkapan modern.',
            feature_location_title: 'Lokasi Strategis',
            feature_location_desc: 'Mudah dijangkau dari pusat kota dan wisata.',

            // About
            about_title_prefix: 'Tentang',
            about_title_highlight: 'Kami',
            about_desc: 'KV Homestay dirancang untuk memberikan pengalaman menginap yang tak terlupakan. Dengan lokasi strategis dan suasana alam yang asri, kami menjamin kenyamanan terbaik untuk setiap tamu.',
            about_btn_wa: 'Hubungi via WhatsApp',

            // Reviews
            reviews_label: 'Testimoni',
            reviews_title_prefix: 'Kata',
            reviews_title_highlight: 'Mereka.',
            reviews_empty: 'Belum ada ulasan saat ini. Jadilah yang pertama!',
            review_btn_write: 'Tulis Ulasan Anda',
            review_modal_title: 'Bagikan Pengalaman Anda',
            review_modal_name: 'Nama Anda',
            review_modal_rating: 'Penilaian (1-5 Bintang)',
            review_modal_comment: 'Ulasan Anda',
            review_modal_submit: 'Kirim Ulasan',
            review_rating_5: '5 Bintang - Luar Biasa',
            review_rating_4: '4 Bintang - Sangat Bagus',
            review_rating_3: '3 Bintang - Bagus',
            review_rating_2: '2 Bintang - Cukup',
            review_rating_1: '1 Bintang - Kurang',

            // Footer
            footer_desc: 'Menyediakan pengalaman menginap dengan kenyamanan seperti di rumah sendiri.',
            footer_contact: 'Kontak',
            footer_follow: 'Ikuti Kami',

            // WA messages
            wa_general: 'Halo, saya ingin bertanya tentang KV Homestay',
            wa_booking: 'Halo, saya tertarik untuk memesan',
        },
        en: {
            // Page
            page_title: 'KV HOMESTAY | Comfortable Nature-Inspired Stay',

            // Nav
            nav_rooms: 'Rooms',
            nav_features: 'Amenities',
            nav_contact: 'Contact',
            nav_chat_wa: 'Chat WA',

            // Hero
            hero_badge: 'Nature-Inspired Accommodation',
            hero_title: 'Nature\'s Tranquility in\nHome Comfort',
            hero_subtitle: 'Unwind and discover peace at KV Homestay. Enjoy the soothing atmosphere of nature with modern facilities.',
            hero_btn_rooms: 'View Rooms',
            hero_btn_contact: 'Contact Us',

            // Stats
            stat_rooms: 'Rooms Available',
            stat_guests: 'Happy Guests',
            stat_years: 'Years Operating',

            // Rooms
            rooms_label: 'Room Catalog',
            rooms_title_prefix: 'Find Your',
            rooms_title_highlight: 'Dream Room.',
            rooms_desc: 'Unmatched comfort with eye-pleasing design.',
            rooms_empty: 'No rooms have been added yet.',
            room_popular: 'Popular',
            room_unavailable: 'Unavailable',
            room_book_wa: 'Book via WhatsApp',
            price_daily: 'Daily',
            price_weekly: 'Weekly',
            price_monthly: 'Monthly',

            // Features
            features_label: 'Why Choose Us',
            features_title_prefix: 'The Best',
            features_title_highlight: 'Experience.',
            feature_nature_title: 'Lush Surroundings',
            feature_nature_desc: 'Surrounded by green gardens that refresh your mind and soul. Fresh air and natural scenery pamper every guest.',
            feature_clean_title: 'Guaranteed Cleanliness',
            feature_clean_desc: 'Premium hygiene standards for your comfort.',
            feature_facility_title: 'Full Amenities',
            feature_facility_desc: 'Fast WiFi, AC, and modern equipment.',
            feature_location_title: 'Strategic Location',
            feature_location_desc: 'Easy to reach from the city center and tourist attractions.',

            // About
            about_title_prefix: 'About',
            about_title_highlight: 'Us',
            about_desc: 'KV Homestay is designed to provide an unforgettable stay experience. With a strategic location and lush natural surroundings, we guarantee the best comfort for every guest.',
            about_btn_wa: 'Contact via WhatsApp',

            // Reviews
            reviews_label: 'Testimonials',
            reviews_title_prefix: 'What They',
            reviews_title_highlight: 'Say.',
            reviews_empty: 'No reviews yet. Be the first!',
            review_btn_write: 'Write a Review',
            review_modal_title: 'Share Your Experience',
            review_modal_name: 'Your Name',
            review_modal_rating: 'Rating (1-5 Stars)',
            review_modal_comment: 'Your Review',
            review_modal_submit: 'Submit Review',
            review_rating_5: '5 Stars - Excellent',
            review_rating_4: '4 Stars - Very Good',
            review_rating_3: '3 Stars - Good',
            review_rating_2: '2 Stars - Fair',
            review_rating_1: '1 Star - Poor',

            // Footer
            footer_desc: 'Providing a stay experience with the comfort of being at home.',
            footer_contact: 'Contact',
            footer_follow: 'Follow Us',

            // WA messages
            wa_general: 'Hello, I would like to inquire about KV Homestay',
            wa_booking: 'Hello, I am interested in booking',
        }
    };

    let currentLang = localStorage.getItem('kv_lang') || 'id';

    // Store original Indonesian text from server (dynamic content from DB)
    const originalTexts = {};
    document.querySelectorAll('[data-i18n]').forEach(el => {
        const key = el.getAttribute('data-i18n');
        if (el.getAttribute('data-i18n-html') === 'true') {
            originalTexts[key] = el.innerHTML;
        } else {
            originalTexts[key] = el.textContent;
        }
    });

    // Store original ID texts as fallback (from server-rendered Blade)
    // This ensures dynamic content from the database is preserved for 'id' mode
    Object.keys(originalTexts).forEach(key => {
        if (!translations.id[key] || translations.id[key] !== originalTexts[key]) {
            translations.id[key] = originalTexts[key];
        }
    });

    function applyLanguage(lang) {
        currentLang = lang;
        localStorage.setItem('kv_lang', lang);
        document.documentElement.lang = lang;

        // Update page title
        if (translations[lang].page_title) {
            document.title = translations[lang].page_title;
        }

        // Translate all elements with data-i18n
        document.querySelectorAll('[data-i18n]').forEach(el => {
            const key = el.getAttribute('data-i18n');
            const text = translations[lang][key];
            if (text) {
                if (el.getAttribute('data-i18n-html') === 'true') {
                    el.innerHTML = text.replace(/\n/g, '<br>');
                } else {
                    el.textContent = text;
                }
            }
        });

        // Update WhatsApp links with localized greeting
        const waGeneralMsg = encodeURIComponent(translations[lang].wa_general);
        const waBookingPrefix = translations[lang].wa_booking;

        document.querySelectorAll('.lp-wa-link').forEach(link => {
            const base = link.getAttribute('data-wa-base');
            if (!base) return;

            const roomName = link.getAttribute('data-room-name');
            if (roomName) {
                const msg = encodeURIComponent(waBookingPrefix + ' ' + roomName);
                link.href = base + '?text=' + msg;
            } else {
                link.href = base + '?text=' + waGeneralMsg;
            }
        });

        // Also update the nav WA link
        const navWa = document.getElementById('lp-wa-nav');
        if (navWa) {
            const base = navWa.getAttribute('data-wa-base');
            if (base) {
                navWa.href = base + '?text=' + waGeneralMsg;
            }
        }

        // Also update the floating WA FAB
        const waFab = document.querySelector('.lp-wa-fab');
        if (waFab) {
            const base = waFab.getAttribute('data-wa-base');
            if (base) {
                waFab.href = base + '?text=' + waGeneralMsg;
            }
        }

        // Update toggle UI
        updateToggleUI(lang);
    }

    function updateToggleUI(lang) {
        const toggle = document.getElementById('lp-lang-toggle');
        if (!toggle) return;

        const slider = toggle.querySelector('.lp-lang-toggle__slider');
        const options = toggle.querySelectorAll('.lp-lang-toggle__option');

        options.forEach(opt => {
            opt.classList.toggle('is-active', opt.getAttribute('data-lang') === lang);
        });

        if (lang === 'en') {
            slider.style.transform = 'translateX(100%)';
        } else {
            slider.style.transform = 'translateX(0)';
        }
    }

    // Language toggle event
    const langToggle = document.getElementById('lp-lang-toggle');
    if (langToggle) {
        langToggle.addEventListener('click', () => {
            const newLang = currentLang === 'id' ? 'en' : 'id';
            applyLanguage(newLang);
        });

        langToggle.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                const newLang = currentLang === 'id' ? 'en' : 'id';
                applyLanguage(newLang);
            }
        });
    }

    // Apply saved language on load
    applyLanguage(currentLang);


    // =========================================
    //  MOBILE NAVIGATION TOGGLE
    // =========================================
    const burger = document.getElementById('lp-burger');
    const navLinks = document.getElementById('lp-nav-links');

    if (burger && navLinks) {
        burger.addEventListener('click', () => {
            navLinks.classList.toggle('is-active');
            burger.classList.toggle('is-active');
            document.body.style.overflow = navLinks.classList.contains('is-active') ? 'hidden' : '';
        });

        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('is-active');
                burger.classList.remove('is-active');
                document.body.style.overflow = '';
            });
        });
    }

    // =========================================
    //  SMOOTH SCROLL FOR ANCHOR LINKS
    // =========================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const target = document.querySelector(targetId);
            if (target) {
                const navH = document.querySelector('.lp-nav')?.offsetHeight || 60;
                const pos = target.getBoundingClientRect().top + window.pageYOffset - navH;
                window.scrollTo({ top: pos, behavior: 'smooth' });
            }
        });
    });

    // =========================================
    //  NAVBAR SCROLL EFFECT
    // =========================================
    const nav = document.getElementById('lp-nav');
    if (nav) {
        let scrollTick = false;
        const onScroll = () => {
            if (window.scrollY > 80) {
                nav.classList.add('lp-nav--scrolled');
            } else {
                nav.classList.remove('lp-nav--scrolled');
            }
        };
        onScroll();

        window.addEventListener('scroll', () => {
            if (!scrollTick) {
                window.requestAnimationFrame(() => {
                    onScroll();
                    scrollTick = false;
                });
                scrollTick = true;
            }
        });
    }

    // =========================================
    //  HERO PARALLAX
    // =========================================
    const heroBg = document.querySelector('.lp-hero__bg');
    if (heroBg) {
        let parTick = false;
        window.addEventListener('scroll', () => {
            if (!parTick) {
                window.requestAnimationFrame(() => {
                    const scrolled = window.scrollY;
                    if (scrolled < window.innerHeight) {
                        heroBg.style.transform = `translateY(${scrolled * 0.25}px) scale(1.05)`;
                    }
                    parTick = false;
                });
                parTick = true;
            }
        });
    }

    // =========================================
    //  COUNTER ANIMATION
    // =========================================
    const animateCounters = () => {
        const counters = document.querySelectorAll('.lp-stat-chip__number[data-target]');
        counters.forEach(counter => {
            if (counter.dataset.animated) return;

            const target = parseInt(counter.getAttribute('data-target'));
            const duration = 1800;
            const startTime = performance.now();

            const update = (now) => {
                const elapsed = now - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                const current = Math.round(eased * target);

                counter.textContent = current + '+';

                if (progress < 1) {
                    requestAnimationFrame(update);
                } else {
                    counter.textContent = target + '+';
                    counter.dataset.animated = 'true';
                }
            };

            requestAnimationFrame(update);
        });
    };

    // =========================================
    //  INTERSECTION OBSERVER FOR ANIMATIONS
    // =========================================
    const animEls = document.querySelectorAll('.anim-fade, .anim-slide');

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;

            entry.target.classList.add('is-visible');

            if (entry.target.closest('.lp-hero__stats') || entry.target.querySelector('.lp-stat-chip__number')) {
                animateCounters();
            }

            obs.unobserve(entry.target);
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -30px 0px'
    });

    animEls.forEach(el => observer.observe(el));

    // Trigger hero animations immediately on load
    setTimeout(() => {
        document.querySelectorAll('.lp-hero .anim-fade').forEach(el => {
            el.classList.add('is-visible');
        });
        setTimeout(animateCounters, 900);
    }, 100);

});

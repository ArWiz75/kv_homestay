document.addEventListener('DOMContentLoaded', () => {
    
    // --- Mobile Navigation Toggle ---
    const mobileMenu = document.getElementById('mobile-menu');
    const navLinks = document.getElementById('nav-links') || document.querySelector('.nav-links');

    if (mobileMenu && navLinks) {
        mobileMenu.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            mobileMenu.classList.toggle('is-active');
            // Prevent body scroll when menu is open
            document.body.style.overflow = navLinks.classList.contains('active') ? 'hidden' : '';
        });

        // Close menu on link click
        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
                mobileMenu.classList.remove('is-active');
                document.body.style.overflow = '';
            });
        });
    }

    // --- Smooth Scrolling for Anchor Links ---
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                const navHeight = document.querySelector('.navbar')?.offsetHeight || 70;
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - navHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // --- Navbar Scroll Effect (Transparent → Solid) ---
    const navbar = document.getElementById('navbar');
    if (navbar) {
        const updateNavbar = () => {
            if (window.scrollY > 80) {
                navbar.classList.remove('navbar--transparent');
                navbar.classList.add('navbar--solid');
            } else {
                navbar.classList.add('navbar--transparent');
                navbar.classList.remove('navbar--solid');
            }
        };
        
        // Initial check
        updateNavbar();
        
        // Throttled scroll listener
        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    updateNavbar();
                    ticking = false;
                });
                ticking = true;
            }
        });
    }

    // --- Counter Animation ---
    const animateCounters = () => {
        const counters = document.querySelectorAll('.stat-number[data-target]');
        
        counters.forEach(counter => {
            if (counter.dataset.animated) return;
            
            const target = parseInt(counter.getAttribute('data-target'));
            const duration = 2000; // ms
            const startTime = performance.now();
            
            const updateCounter = (currentTime) => {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                
                // Ease-out cubic
                const eased = 1 - Math.pow(1 - progress, 3);
                const current = Math.round(eased * target);
                
                counter.textContent = current + (target >= 100 ? '+' : '+');
                
                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target + '+';
                    counter.dataset.animated = 'true';
                }
            };
            
            requestAnimationFrame(updateCounter);
        });
    };

    // --- Intersection Observer for All Animations ---
    const animElements = document.querySelectorAll('.fade-in, .fade-in-left, .fade-in-right, .scale-in');
    
    const appearOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -40px 0px"
    };

    const appearOnScroll = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;

            entry.target.classList.add('appear');
            
            // Check if this is a stat section — trigger counter
            if (entry.target.closest('.stats-section') || entry.target.classList.contains('stat-item')) {
                animateCounters();
            }
            
            observer.unobserve(entry.target);
        });
    }, appearOptions);

    animElements.forEach(el => {
        appearOnScroll.observe(el);
    });

    // --- Parallax Effect on Hero Image ---
    const heroImage = document.querySelector('.hero-image');
    if (heroImage) {
        let parallaxTicking = false;
        window.addEventListener('scroll', () => {
            if (!parallaxTicking) {
                window.requestAnimationFrame(() => {
                    const scrolled = window.scrollY;
                    if (scrolled < window.innerHeight) {
                        heroImage.style.transform = `translateY(${scrolled * 0.3}px)`;
                    }
                    parallaxTicking = false;
                });
                parallaxTicking = true;
            }
        });
    }

});

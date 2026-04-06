/**
 * MyPass LMS Theme — Main JavaScript
 * Handles: sticky header, mobile nav, dropdowns, testimonial slider, scroll animations
 */

(function () {
    'use strict';

    /* ----------------------------------------------------------------
       Sticky Header — add .scrolled class on scroll
    ---------------------------------------------------------------- */
    const header = document.getElementById('site-header');
    if (header) {
        const onScroll = () => {
            header.classList.toggle('scrolled', window.scrollY > 10);
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    /* ----------------------------------------------------------------
       Mobile Navigation Toggle
    ---------------------------------------------------------------- */
    const mobileToggle = document.getElementById('mobile-menu-toggle');
    const primaryNav   = document.getElementById('primary-nav');

    if (mobileToggle && primaryNav) {
        mobileToggle.addEventListener('click', () => {
            const isOpen = primaryNav.classList.toggle('nav--open');
            mobileToggle.setAttribute('aria-expanded', String(isOpen));
            document.body.style.overflow = isOpen ? 'hidden' : '';

            // Animate hamburger → X
            const lines = mobileToggle.querySelectorAll('.hamburger__line');
            if (isOpen) {
                lines[0].style.transform = 'translateY(7px) rotate(45deg)';
                lines[1].style.opacity  = '0';
                lines[2].style.transform = 'translateY(-7px) rotate(-45deg)';
            } else {
                lines.forEach(l => { l.style.transform = ''; l.style.opacity = ''; });
            }
        });

        // Close on outside click
        document.addEventListener('click', (e) => {
            if (!header.contains(e.target) && primaryNav.classList.contains('nav--open')) {
                mobileToggle.click();
            }
        });
    }

    /* ----------------------------------------------------------------
       Mobile Dropdown Accordions
    ---------------------------------------------------------------- */
    const dropdownTriggers = document.querySelectorAll('.nav__dropdown-trigger');
    dropdownTriggers.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            // Only handle accordion behavior on mobile
            if (window.innerWidth > 1024) return;

            e.preventDefault();
            const dropdown = trigger.nextElementSibling;
            if (!dropdown) return;

            const isExpanded = trigger.getAttribute('aria-expanded') === 'true';
            // Close all others
            dropdownTriggers.forEach(t => {
                if (t !== trigger) {
                    t.setAttribute('aria-expanded', 'false');
                    const d = t.nextElementSibling;
                    if (d) d.classList.remove('dropdown--open');
                }
            });
            trigger.setAttribute('aria-expanded', String(!isExpanded));
            dropdown.classList.toggle('dropdown--open', !isExpanded);
        });
    });

    /* ----------------------------------------------------------------
       Testimonials Slider
    ---------------------------------------------------------------- */
    const track     = document.getElementById('testimonials-track');
    const dotsWrap  = document.getElementById('testimonials-dots');
    const prevBtn   = document.getElementById('testimonials-prev');
    const nextBtn   = document.getElementById('testimonials-next');

    if (track && dotsWrap) {
        const cards       = Array.from(track.children);
        const perPage     = () => window.innerWidth <= 768 ? 1 : window.innerWidth <= 1024 ? 2 : 3;
        let current       = 0;
        let totalPages    = Math.ceil(cards.length / perPage());
        let autoplayTimer = null;

        function buildDots() {
            dotsWrap.innerHTML = '';
            totalPages = Math.ceil(cards.length / perPage());
            for (let i = 0; i < totalPages; i++) {
                const btn = document.createElement('button');
                btn.className = `testimonials__dot${i === current ? ' testimonials__dot--active' : ''}`;
                btn.setAttribute('role', 'tab');
                btn.setAttribute('aria-label', `Go to slide ${i + 1}`);
                btn.setAttribute('aria-selected', String(i === current));
                btn.addEventListener('click', () => goTo(i));
                dotsWrap.appendChild(btn);
            }
        }

        function goTo(index) {
            current = Math.max(0, Math.min(index, totalPages - 1));
            const pp   = perPage();
            const gap  = 24; // --space-6 in px
            const cardW = track.querySelector('.testimonial-card')?.offsetWidth || 0;
            const offset = current * (cardW + gap);

            track.style.transform   = `translateX(-${offset}px)`;
            track.style.transition  = 'transform 350ms cubic-bezier(0.4,0,0.2,1)';

            dotsWrap.querySelectorAll('.testimonials__dot').forEach((dot, i) => {
                dot.classList.toggle('testimonials__dot--active', i === current);
                dot.setAttribute('aria-selected', String(i === current));
            });
        }

        function setupSlider() {
            buildDots();
            // On mobile/tablet: make track overflow hidden, cards flex
            if (perPage() < 3) {
                track.style.display   = 'flex';
                track.style.flexWrap  = 'nowrap';
                cards.forEach(c => {
                    c.style.flex      = `0 0 calc(${100 / perPage()}% - 12px)`;
                    c.style.minWidth  = '0';
                });
                goTo(current);
            } else {
                // Desktop: reset to grid
                track.style.display   = '';
                track.style.transform = '';
                cards.forEach(c => { c.style.flex = ''; c.style.minWidth = ''; });
            }
        }

        function autoplay() {
            autoplayTimer = setInterval(() => {
                if (perPage() < 3) {
                    goTo(current + 1 < totalPages ? current + 1 : 0);
                }
            }, 5000);
        }

        if (prevBtn) prevBtn.addEventListener('click', () => { clearInterval(autoplayTimer); goTo(current - 1); });
        if (nextBtn) nextBtn.addEventListener('click', () => { clearInterval(autoplayTimer); goTo(current + 1 < totalPages ? current + 1 : 0); });

        // Swipe support
        let touchStartX = 0;
        track.addEventListener('touchstart', e => { touchStartX = e.touches[0].clientX; }, { passive: true });
        track.addEventListener('touchend', e => {
            const diff = touchStartX - e.changedTouches[0].clientX;
            if (Math.abs(diff) > 50) {
                clearInterval(autoplayTimer);
                goTo(diff > 0 ? current + 1 : current - 1);
            }
        });

        setupSlider();
        autoplay();

        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                current = 0;
                setupSlider();
            }, 200);
        });
    }

    /* ----------------------------------------------------------------
       Scroll Reveal Animation
    ---------------------------------------------------------------- */
    const revealEls = document.querySelectorAll(
        '.feature-block, .platform-feature-card, .testimonial-card, .comparison__row'
    );

    if ('IntersectionObserver' in window && revealEls.length) {
        // Set initial state via JS (avoids FOUC if CSS is loaded after)
        revealEls.forEach(el => {
            el.style.opacity    = '0';
            el.style.transform  = 'translateY(20px)';
            el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        });

        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity   = '1';
                    entry.target.style.transform = 'translateY(0)';
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        revealEls.forEach((el, i) => {
            el.style.transitionDelay = `${(i % 3) * 80}ms`;
            revealObserver.observe(el);
        });
    }

    /* ----------------------------------------------------------------
       Smooth Anchor Scroll with header offset
    ---------------------------------------------------------------- */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', e => {
            const target = document.querySelector(anchor.getAttribute('href'));
            if (!target) return;
            e.preventDefault();
            const offset = (header?.offsetHeight || 72) + 16;
            window.scrollTo({ top: target.offsetTop - offset, behavior: 'smooth' });
        });
    });

})();

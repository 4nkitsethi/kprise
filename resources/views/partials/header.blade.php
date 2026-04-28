{{--
    Partial: Header / Navigation — TalentLMS-style mega menu
    Usage: @include('partials.header')

    Features:
    - Full-width mega menu dropdowns with grouped sections + icons
    - Smooth open/close with CSS transitions
    - Active route highlighting
    - Accessible: keyboard nav, aria attributes, focus trap
    - Mobile: full-screen slide-in with accordion submenus
    - Uses app.css design tokens throughout
--}}

{{-- ── Backdrop (closes mega on click) ── --}}
<div class="mega-backdrop" id="mega-backdrop" aria-hidden="true"></div>

{{-- ── Mobile Nav ── --}}
<nav class="mobile-nav" id="mobile-nav" aria-label="Mobile navigation" aria-hidden="true">

    {{-- Solutions --}}
    <div class="mobile-nav__item" data-mobile-item>
        <button class="mobile-nav__trigger" aria-expanded="false">
            Solutions
            <svg class="mobile-nav__chevron" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="4 6 8 10 12 6"/></svg>
        </button>
        <div class="mobile-nav__panel" aria-hidden="true">
            <div class="mobile-nav__sub-title">Training Solutions</div>
            <a href="{{ route('solutions.nonprofit-volunteer-training') }}" class="mobile-nav__sub-link">Nonprofit & Volunteer Training</a>
            <a href="{{ route('solutions.employee-onboarding') }}" class="mobile-nav__sub-link">Employee Onboarding</a>
            <a href="{{ route('solutions.compliance-training') }}" class="mobile-nav__sub-link">Compliance & Regulatory Training</a>
            <a href="{{ route('solutions.continuous-learning-upskilling') }}" class="mobile-nav__sub-link">Continuous Learning & Upskilling</a>
            <a href="{{ route('solutions.customer-training-education') }}" class="mobile-nav__sub-link">Customer Training & Education</a>
            <a href="{{ route('solutions.partner-channel-training') }}" class="mobile-nav__sub-link">Partner & Channel Training</a>
            <a href="{{ route('solutions.academic-education-institutions') }}" class="mobile-nav__sub-link">Academic & Education Institutions</a>
            <a href="{{ route('solutions.sales-enablement') }}" class="mobile-nav__sub-link">Sales Enablement</a>
            <a href="{{ route('solutions.operational-process-training') }}" class="mobile-nav__sub-link">Operational & Process Training</a>
            <a href="{{ route('solutions.extended-enterprise-training') }}" class="mobile-nav__sub-link">Extended Enterprise Training</a>
        </div>
    </div>

    {{-- Courses --}}
    <div class="mobile-nav__item" data-mobile-item>
        <button class="mobile-nav__trigger" aria-expanded="false">
            Courses
            <svg class="mobile-nav__chevron" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="4 6 8 10 12 6"/></svg>
        </button>
        <div class="mobile-nav__panel" aria-hidden="true">
            <a href="{{ route('courses')}}" class="mobile-nav__sub-link">Compliance Courses</a>
            <a href="{{ route('courses')}}" class="mobile-nav__sub-link">Workplace Safety</a>
            <a href="{{ route('courses')}}" class="mobile-nav__sub-link">HR & Soft Skills</a>
            <a href="{{ route('courses')}}" class="mobile-nav__sub-link">Industry Training</a>
        </div>
    </div>

    {{-- Product --}}
    <div class="mobile-nav__item" data-mobile-item>
        <button class="mobile-nav__trigger" aria-expanded="false">
            Product
            <svg class="mobile-nav__chevron" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="4 6 8 10 12 6"/></svg>
        </button>
        <div class="mobile-nav__panel" aria-hidden="true">
            <a href="{{ route('product.features') }}" class="mobile-nav__sub-link">Features</a>            
            <a href="{{ route('product.integrations') }}" class="mobile-nav__sub-link">Integrations</a>
            <a href="{{ route('product.ai-capabilities') }}" class="mobile-nav__sub-link">AI Capabilities</a>
            <a href="#" class="mobile-nav__sub-link">Mobile Learning</a>
        </div>
    </div>

    {{-- Industries --}}
    <div class="mobile-nav__item" data-mobile-item>
        <button class="mobile-nav__trigger" aria-expanded="false">
            Industries
            <svg class="mobile-nav__chevron" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="4 6 8 10 12 6"/></svg>
        </button>
        <div class="mobile-nav__panel" aria-hidden="true">
            <a href="{{ route('industries.nonprofit') }}" class="mobile-nav__sub-link">Nonprofits</a>
            <a href="#" class="mobile-nav__sub-link">Healthcare</a>
            <a href="#" class="mobile-nav__sub-link">Manufacturing</a>
            <a href="#" class="mobile-nav__sub-link">Finance</a>
            <a href="#" class="mobile-nav__sub-link">Software</a>
            <a href="#" class="mobile-nav__sub-link">Consulting</a>
            <a href="#" class="mobile-nav__sub-link">Retail</a>
        </div>
    </div>

    {{-- Pricing --}}
    <div class="mobile-nav__item">
        <a href="{{ route('pricing') }}" class="mobile-nav__link">Pricing</a>
    </div>

    {{-- Company --}}
    <div class="mobile-nav__item" data-mobile-item>
        <button class="mobile-nav__trigger" aria-expanded="false">
            Company
            <svg class="mobile-nav__chevron" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="4 6 8 10 12 6"/></svg>
        </button>
        <div class="mobile-nav__panel" aria-hidden="true">
            <a href="{{ route('company.about') }}" class="mobile-nav__sub-link">About Us / Company Overview</a>
            <a href="#" class="mobile-nav__sub-link">Contact Us</a>
        </div>
    </div>

    {{-- Resources --}}
    <div class="mobile-nav__item" data-mobile-item>
        <button class="mobile-nav__trigger" aria-expanded="false">
            Resources
            <svg class="mobile-nav__chevron" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="4 6 8 10 12 6"/></svg>
        </button>
        <div class="mobile-nav__panel" aria-hidden="true">
            <a href="#" class="mobile-nav__sub-link">Blog</a>
            <a href="#" class="mobile-nav__sub-link">Case Studies</a>
            <a href="#" class="mobile-nav__sub-link">LMS Comparisons</a>
            <a href="#" class="mobile-nav__sub-link">Learning Insights Hub</a>
            <a href="#" class="mobile-nav__sub-link">Calculator</a>
            <a href="#" class="mobile-nav__sub-link" target="_blank" rel="noopener">Help Center</a>
        </div>
    </div>

    {{-- Mobile CTAs --}}
    <div class="mobile-nav__actions">
        <a href="https://mypasslms.us/login#register" class="btn btn--ghost" target="_blank" rel="noopener" style="justify-content:center;">Sign Up</a>
        <a href="{{ config('services.demo_url', '#') }}" class="btn btn--primary" target="_blank" rel="noopener" style="justify-content:center;">Book Demo</a>
    </div>

</nav>

{{-- ================================================================
     MAIN HEADER
================================================================ --}}
<header class="site-header" role="banner" id="site-header">
    <div class="container header__inner">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="header__logo" aria-label="{{ config('app.name') }} - Home">
            <img
                src="{{ asset('assets/images/logo-color.png') }}"
                alt="{{ config('app.name') }} Logo"
                width="140"
                height="40"
                loading="eager"
            >
        </a>

        {{-- Primary Navigation --}}
        <nav class="header__nav" id="primary-nav" aria-label="Primary navigation">
            <ul class="nav__list" role="list">

                {{-- ── SOLUTIONS — Mega Menu (2 cols, 5 items each) ── --}}
                <li class="nav__item nav__item--dropdown" data-mega-item>
                    <button class="nav__link nav__dropdown-trigger"
                            aria-haspopup="true" aria-expanded="false"
                            aria-controls="mega-solutions">
                        Solutions
                        <svg class="nav__chevron" width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                            <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <div class="nav__mega" id="mega-solutions" role="region" aria-label="Solutions menu" style="min-width:700px;max-width:780px;">
                        <div class="mega__inner">
                            <div class="mega__grid mega__grid--2" style="gap:var(--space-6);">
                                {{-- Left col --}}
                                <div>
                                    <div class="mega__group-title">Workforce Training</div>
                                    <div style="display:flex;flex-direction:column;gap:2px;">
                                        <a href="{{ route('solutions.nonprofit-volunteer-training') }}" class="mega__link">
                                            <div class="mega__icon" style="background:#F0F0FF;">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="#6366F1" stroke-width="2" stroke-linecap="round"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
                                            </div>
                                            <div class="mega__link-text">
                                                <div class="mega__link-title">Nonprofit & Volunteer Training</div>
                                                <div class="mega__link-desc">Empower mission-driven teams affordably</div>
                                            </div>
                                        </a>
                                        <a href="{{ route('solutions.employee-onboarding') }}" class="mega__link">
                                            <div class="mega__icon" style="background:var(--color-primary-light);">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
                                            </div>
                                            <div class="mega__link-text">
                                                <div class="mega__link-title">Employee Onboarding</div>
                                                <div class="mega__link-desc">Get new hires productive from day one</div>
                                            </div>
                                        </a>
                                        <a href="{{ route('solutions.compliance-training') }}" class="mega__link">
                                            <div class="mega__icon" style="background:#FEF3F2;">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="#E04F5F" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                            </div>
                                            <div class="mega__link-text">
                                                <div class="mega__link-title">Compliance & Regulatory Training</div>
                                                <div class="mega__link-desc">Stay audit-ready and risk-free</div>
                                            </div>
                                        </a>
                                        <a href="{{ route('solutions.continuous-learning-upskilling') }}" class="mega__link">
                                            <div class="mega__icon" style="background:#EEF9F5;">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2" stroke-linecap="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                                            </div>
                                            <div class="mega__link-text">
                                                <div class="mega__link-title">Continuous Learning & Upskilling</div>
                                                <div class="mega__link-desc">Build skills that grow with your business</div>
                                            </div>
                                        </a>
                                        <a href="{{ route('solutions.sales-enablement') }}" class="mega__link">
                                            <div class="mega__icon" style="background:#FFF8E6;">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="#D97706" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                            </div>
                                            <div class="mega__link-text">
                                                <div class="mega__link-title">Sales Enablement</div>
                                                <div class="mega__link-desc">Train reps to close more, faster</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                {{-- Right col --}}
                                <div>
                                    <div class="mega__group-title">Extended Training</div>
                                    <div style="display:flex;flex-direction:column;gap:2px;">
                                        <a href="{{ route('solutions.customer-training-education') }}" class="mega__link">
                                            <div class="mega__icon" style="background:#F0F0FF;">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="#6366F1" stroke-width="2" stroke-linecap="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
                                            </div>
                                            <div class="mega__link-text">
                                                <div class="mega__link-title">Customer Training & Education</div>
                                                <div class="mega__link-desc">Reduce churn with great product training</div>
                                            </div>
                                        </a>
                                        <a href="{{ route('solutions.partner-channel-training') }}" class="mega__link">
                                            <div class="mega__icon" style="background:#FFF3EA;">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="#F97316" stroke-width="2" stroke-linecap="round"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
                                            </div>
                                            <div class="mega__link-text">
                                                <div class="mega__link-title">Partner & Channel Training</div>
                                                <div class="mega__link-desc">Align your resellers and partners</div>
                                            </div>
                                        </a>
                                        <a href="{{ route('solutions.academic-education-institutions') }}" class="mega__link">
                                            <div class="mega__icon" style="background:#EEF9F5;">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2" stroke-linecap="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                                            </div>
                                            <div class="mega__link-text">
                                                <div class="mega__link-title">Academic & Education Institutions</div>
                                                <div class="mega__link-desc">Purpose-built for schools & universities</div>
                                            </div>
                                        </a>
                                        <a href="{{ route('solutions.operational-process-training') }}" class="mega__link">
                                            <div class="mega__icon" style="background:var(--color-primary-light);">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                                            </div>
                                            <div class="mega__link-text">
                                                <div class="mega__link-title">Operational & Process Training</div>
                                                <div class="mega__link-desc">Standardize workflows across your org</div>
                                            </div>
                                        </a>
                                        <a href="{{ route('solutions.extended-enterprise-training') }}" class="mega__link">
                                            <div class="mega__icon" style="background:#FEF3F2;">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="#E04F5F" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20"/></svg>
                                            </div>
                                            <div class="mega__link-text">
                                                <div class="mega__link-title">Extended Enterprise Training</div>
                                                <div class="mega__link-desc">Train beyond your four walls at scale</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                {{-- ── COURSES — Mega Menu ── --}}
                <li class="nav__item nav__item--dropdown" data-mega-item>
                    <button class="nav__link nav__dropdown-trigger"
                            aria-haspopup="true" aria-expanded="false"
                            aria-controls="mega-courses">
                        Courses
                        <svg class="nav__chevron" width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                            <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <div class="nav__mega" id="mega-courses" role="region" aria-label="Courses menu" style="min-width:520px;max-width:600px;">
                        <div class="mega__inner">
                            <div class="mega__group-title">Ready-Made Course Libraries</div>
                            <div style="display:flex;flex-direction:column;gap:2px;">
                                <a href="{{ route('courses') }}" class="mega__link">
                                    <div class="mega__icon" style="background:#FEF3F2;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="#E04F5F" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                    </div>
                                    <div class="mega__link-text">
                                        <div class="mega__link-title">Compliance Courses</div>
                                        <div class="mega__link-desc">Stay compliant with pre-built regulatory content</div>
                                    </div>
                                </a>
                                <a href="{{ route('courses') }}" class="mega__link">
                                    <div class="mega__icon" style="background:#FFF8E6;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="#D97706" stroke-width="2" stroke-linecap="round"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                                    </div>
                                    <div class="mega__link-text">
                                        <div class="mega__link-title">Workplace Safety</div>
                                        <div class="mega__link-desc">Reduce incidents with essential safety training</div>
                                    </div>
                                </a>
                                <a href="{{ route('courses') }}" class="mega__link">
                                    <div class="mega__icon" style="background:var(--color-primary-light);">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
                                    </div>
                                    <div class="mega__link-text">
                                        <div class="mega__link-title">HR & Soft Skills</div>
                                        <div class="mega__link-desc">Communication, leadership & people skills</div>
                                    </div>
                                </a>
                                <a href="{{ route('courses') }}" class="mega__link">
                                    <div class="mega__icon" style="background:#EEF9F5;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2" stroke-linecap="round"><path d="M2 20h20M4 20V10l6-6 6 6v10"/><rect x="9" y="14" width="6" height="6"/></svg>
                                    </div>
                                    <div class="mega__link-text">
                                        <div class="mega__link-title">Industry Training</div>
                                        <div class="mega__link-desc">Sector-specific courses for your field</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

                {{-- ── PRODUCT — Mega Menu ── --}}
                <li class="nav__item nav__item--dropdown" data-mega-item>
                    <button class="nav__link nav__dropdown-trigger"
                            aria-haspopup="true" aria-expanded="false"
                            aria-controls="mega-product">
                        Product
                        <svg class="nav__chevron" width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                            <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <div class="nav__mega" id="mega-product" role="region" aria-label="Product menu" style="min-width:560px;max-width:640px;">
                        <div class="mega__inner">
                            <div class="mega__grid mega__grid--2" style="gap:var(--space-4);">
                                <a href="{{ route('product.features') }}" class="mega__link">
                                    <div class="mega__icon" style="background:var(--color-primary-light);">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                                    </div>
                                    <div class="mega__link-text">
                                        <div class="mega__link-title">Features</div>
                                        <div class="mega__link-desc">Everything the platform can do for you</div>
                                    </div>
                                </a>
                                <a href="{{ route('product.integrations') }}" class="mega__link">
                                    <div class="mega__icon" style="background:#F0F0FF;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="#6366F1" stroke-width="2" stroke-linecap="round"><circle cx="18" cy="18" r="3"/><circle cx="6" cy="6" r="3"/><path d="M13 6h3a2 2 0 012 2v7M11 18H8a2 2 0 01-2-2V9"/></svg>
                                    </div>
                                    <div class="mega__link-text">
                                        <div class="mega__link-title">Integrations</div>
                                        <div class="mega__link-desc">Connect to the tools your team already uses</div>
                                    </div>
                                </a>
                                <a href="{{ route('product.ai-capabilities') }}" class="mega__link">
                                    <div class="mega__icon" style="background:#EEF9F5;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2" stroke-linecap="round"><path d="M12 2a2 2 0 012 2c0 .74-.4 1.38-1 1.73V7h1a7 7 0 017 7h1a1 1 0 110 2h-1v1a2 2 0 01-2 2H5a2 2 0 01-2-2v-1H2a1 1 0 110-2h1a7 7 0 017-7h1V5.73A2 2 0 0110 4a2 2 0 012-2z"/></svg>
                                    </div>
                                    <div class="mega__link-text">
                                        <div class="mega__link-title">AI Capabilities</div>
                                        <div class="mega__link-desc">Smart automation for content and learners</div>
                                    </div>
                                </a>
                                <a href="#" class="mega__link">
                                    <div class="mega__icon" style="background:#FFF8E6;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="#D97706" stroke-width="2" stroke-linecap="round"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
                                    </div>
                                    <div class="mega__link-text">
                                        <div class="mega__link-title">Mobile Learning</div>
                                        <div class="mega__link-desc">Learn anywhere, on any device</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

                {{-- ── INDUSTRIES — Mega Menu ── --}}
                <li class="nav__item nav__item--dropdown" data-mega-item>
                    <button class="nav__link nav__dropdown-trigger"
                            aria-haspopup="true" aria-expanded="false"
                            aria-controls="mega-industries">
                        Industries
                        <svg class="nav__chevron" width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                            <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <div class="nav__mega" id="mega-industries" role="region" aria-label="Industries menu" style="min-width:560px;max-width:640px;">
                        <div class="mega__inner">
                            <div class="mega__group-title" style="margin-bottom:var(--space-3);">Industries We Serve</div>
                            <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:2px;">
                                <a href="{{ route('industries.nonprofit') }}" class="mega__link">
                                    <div class="mega__icon" style="background:#FEF3F2;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="#E04F5F" stroke-width="2" stroke-linecap="round"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
                                    </div>
                                    <div class="mega__link-text">
                                        <div class="mega__link-title">Nonprofits</div>
                                        <div class="mega__link-desc">Flexible training for mission-led orgs</div>
                                    </div>
                                </a>
                                <a href="#" class="mega__link">
                                    <div class="mega__icon" style="background:#EEF9F5;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2" stroke-linecap="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                                    </div>
                                    <div class="mega__link-text">
                                        <div class="mega__link-title">Healthcare</div>
                                        <div class="mega__link-desc">Compliant training for clinical teams</div>
                                    </div>
                                </a>
                                <a href="#" class="mega__link">
                                    <div class="mega__icon" style="background:#FFF8E6;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="#D97706" stroke-width="2" stroke-linecap="round"><path d="M2 20h20M4 20V10l6-6 6 6v10"/><rect x="9" y="14" width="6" height="6"/></svg>
                                    </div>
                                    <div class="mega__link-text">
                                        <div class="mega__link-title">Manufacturing</div>
                                        <div class="mega__link-desc">Safety and skills on the factory floor</div>
                                    </div>
                                </a>
                                <a href="#" class="mega__link">
                                    <div class="mega__icon" style="background:var(--color-primary-light);">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
                                    </div>
                                    <div class="mega__link-text">
                                        <div class="mega__link-title">Finance</div>
                                        <div class="mega__link-desc">Regulatory-ready training for finance teams</div>
                                    </div>
                                </a>
                                <a href="#" class="mega__link">
                                    <div class="mega__icon" style="background:#F0F0FF;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="#6366F1" stroke-width="2" stroke-linecap="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                                    </div>
                                    <div class="mega__link-text">
                                        <div class="mega__link-title">Software</div>
                                        <div class="mega__link-desc">Onboard users and train dev teams fast</div>
                                    </div>
                                </a>
                                <a href="#" class="mega__link">
                                    <div class="mega__icon" style="background:#EEF9F5;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2" stroke-linecap="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
                                    </div>
                                    <div class="mega__link-text">
                                        <div class="mega__link-title">Consulting</div>
                                        <div class="mega__link-desc">Sharpen expertise across every engagement</div>
                                    </div>
                                </a>
                                <a href="#" class="mega__link">
                                    <div class="mega__icon" style="background:#FFF3EA;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="#F97316" stroke-width="2" stroke-linecap="round"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
                                    </div>
                                    <div class="mega__link-text">
                                        <div class="mega__link-title">Retail</div>
                                        <div class="mega__link-desc">Train frontline staff at every location</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

                {{-- Pricing — simple link --}}
                <li class="nav__item">
                    <a href="{{ route('pricing') }}"
                       class="nav__link {{ request()->routeIs('pricing') ? 'nav__link--active' : '' }}">
                        Pricing
                    </a>
                </li>

                {{-- ── COMPANY — Mega Menu ── --}}
                <li class="nav__item nav__item--dropdown" data-mega-item>
                    <button class="nav__link nav__dropdown-trigger"
                            aria-haspopup="true" aria-expanded="false"
                            aria-controls="mega-company">
                        Company
                        <svg class="nav__chevron" width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                            <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <div class="nav__mega" id="mega-company" role="region" aria-label="Company menu" style="min-width:440px;max-width:500px;">
                        <div class="mega__inner">
                            <div style="display:flex;flex-direction:column;gap:2px;">
                                <a href="{{ route('company.about') }}" class="mega__link">
                                    <div class="mega__icon" style="background:var(--color-primary-light);">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                    </div>
                                    <div class="mega__link-text">
                                        <div class="mega__link-title">About Us / Company Overview</div>
                                        <div class="mega__link-desc">Our story, mission, and the team behind the platform</div>
                                    </div>
                                </a>
                                <a href="#" class="mega__link">
                                    <div class="mega__icon" style="background:#EEF9F5;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2" stroke-linecap="round"><path d="M22 16.92v3a2 2 0 01-2.18 2A19.79 19.79 0 013.07 9.8 19.79 19.79 0 011.18 1.82 2 2 0 013.16 0h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L7.09 7a16 16 0 006 6l.7-.7a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 14.92z"/></svg>
                                    </div>
                                    <div class="mega__link-text">
                                        <div class="mega__link-title">Contact Us</div>
                                        <div class="mega__link-desc">Talk to our team — we're happy to help</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

                {{-- ── RESOURCES — Mega Menu ── --}}
                <li class="nav__item nav__item--dropdown" data-mega-item>
                    <button class="nav__link nav__dropdown-trigger"
                            aria-haspopup="true" aria-expanded="false"
                            aria-controls="mega-resources">
                        Resources
                        <svg class="nav__chevron" width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                            <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <div class="nav__mega" id="mega-resources" role="region" aria-label="Resources menu" style="min-width:580px;max-width:660px;">
                        <div class="mega__inner">
                            <div class="mega__grid mega__grid--2" style="gap:var(--space-6);">
                                {{-- Left --}}
                                <div>
                                    <div class="mega__group-title">Learn & Explore</div>
                                    <div style="display:flex;flex-direction:column;gap:2px;">
                                        <a href="#" class="mega__link">
                                            <div class="mega__icon" style="background:var(--color-primary-light);">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                                            </div>
                                            <div class="mega__link-text">
                                                <div class="mega__link-title">Blog</div>
                                                <div class="mega__link-desc">Tips, trends & L&D insights</div>
                                            </div>
                                        </a>
                                        <a href="#" class="mega__link">
                                            <div class="mega__icon" style="background:#FFF8E6;">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="#D97706" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
                                            </div>
                                            <div class="mega__link-text">
                                                <div class="mega__link-title">Case Studies</div>
                                                <div class="mega__link-desc">Real results from real teams</div>
                                            </div>
                                        </a>
                                        <a href="#" class="mega__link">
                                            <div class="mega__icon" style="background:#EEF9F5;">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2" stroke-linecap="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                                            </div>
                                            <div class="mega__link-text">
                                                <div class="mega__link-title">Learning Insights Hub</div>
                                                <div class="mega__link-desc">Data-driven L&D research & reports</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                {{-- Right --}}
                                <div>
                                    <div class="mega__group-title">Tools & Support</div>
                                    <div style="display:flex;flex-direction:column;gap:2px;">
                                        <a href="#" class="mega__link">
                                            <div class="mega__icon" style="background:#F0F0FF;">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="#6366F1" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="3" y1="15" x2="21" y2="15"/><line x1="9" y1="3" x2="9" y2="21"/></svg>
                                            </div>
                                            <div class="mega__link-text">
                                                <div class="mega__link-title">LMS Comparisons</div>
                                                <div class="mega__link-desc">See how we stack up against the rest</div>
                                            </div>
                                        </a>
                                        <a href="#" class="mega__link">
                                            <div class="mega__icon" style="background:#FEF3F2;">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="#E04F5F" stroke-width="2" stroke-linecap="round"><rect x="4" y="2" width="16" height="20" rx="2"/><line x1="8" y1="6" x2="16" y2="6"/><line x1="8" y1="10" x2="16" y2="10"/><line x1="8" y1="14" x2="12" y2="14"/></svg>
                                            </div>
                                            <div class="mega__link-text">
                                                <div class="mega__link-title">Calculator</div>
                                                <div class="mega__link-desc">Estimate your ROI in minutes</div>
                                            </div>
                                        </a>
                                        <a href="#" class="mega__link" target="_blank" rel="noopener">
                                            <div class="mega__icon" style="background:var(--color-gray-100);">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="var(--color-gray-600)" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                                            </div>
                                            <div class="mega__link-text">
                                                <div class="mega__link-title">Help Center</div>
                                                <div class="mega__link-desc">Docs, guides & hands-on support</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </nav>

        {{-- Header CTA Buttons --}}
        <div class="header__actions">
            <a href="https://mypasslms.us/login#register"
               class="btn btn--ghost btn--sm"
               target="_blank" rel="noopener">
                Sign Up
            </a>
            <a href="{{ config('services.demo_url', '#') }}"
               class="btn btn--primary btn--sm"
               target="_blank" rel="noopener">
                Book Demo
            </a>
        </div>

        {{-- Mobile Hamburger --}}
        <button
            class="header__hamburger"
            id="mobile-menu-toggle"
            aria-controls="mobile-nav"
            aria-expanded="false"
            aria-label="Toggle navigation menu"
        >
            <span class="hamburger__line"></span>
            <span class="hamburger__line"></span>
            <span class="hamburger__line"></span>
        </button>

    </div>
</header>

{{-- ================================================================
     JAVASCRIPT — Mega menu + mobile nav
================================================================ --}}
<script>
(function () {
    'use strict';

    const header   = document.getElementById('site-header');
    const backdrop = document.getElementById('mega-backdrop');
    const mobileNav= document.getElementById('mobile-nav');
    const mobileBtn= document.getElementById('mobile-menu-toggle');
    const megaItems= document.querySelectorAll('[data-mega-item]');
    let   openItem = null;
    let   mobileOpen = false;

    /* ── Scroll: sticky shadow ── */
    window.addEventListener('scroll', () => {
        header.classList.toggle('is-scrolled', window.scrollY > 8);
    }, { passive: true });

    /* ── Open a mega item ── */
    function openMega(item) {
        if (openItem && openItem !== item) closeMega(openItem);
        openItem = item;
        item.classList.add('is-open');
        header.classList.add('mega-open');
        backdrop.classList.add('is-visible');
        const trigger = item.querySelector('.nav__dropdown-trigger');
        if (trigger) trigger.setAttribute('aria-expanded', 'true');
    }

    /* ── Close a mega item ── */
    function closeMega(item) {
        if (!item) return;
        item.classList.remove('is-open');
        header.classList.remove('mega-open');
        backdrop.classList.remove('is-visible');
        const trigger = item.querySelector('.nav__dropdown-trigger');
        if (trigger) trigger.setAttribute('aria-expanded', 'false');
        openItem = null;
    }

    /* ── Close all ── */
    function closeAll() {
        if (openItem) closeMega(openItem);
    }

    /* ── Attach mega events ── */
    let hoverTimer = null;

    function clearHoverTimer() {
        if (hoverTimer) { clearTimeout(hoverTimer); hoverTimer = null; }
    }

    megaItems.forEach(item => {
        const trigger = item.querySelector('.nav__dropdown-trigger');
        if (!trigger) return;

        /* Click toggle */
        trigger.addEventListener('click', (e) => {
            e.stopPropagation();
            item.classList.contains('is-open') ? closeMega(item) : openMega(item);
        });

        /* Keyboard: Enter / Space */
        trigger.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                item.classList.contains('is-open') ? closeMega(item) : openMega(item);
            }
            if (e.key === 'Escape') closeAll();
        });

        /* Hover: open immediately, close with delay so cursor can reach the panel */
        item.addEventListener('mouseenter', () => {
            clearHoverTimer();
            openMega(item);
        });
        item.addEventListener('mouseleave', () => {
            clearHoverTimer();
            hoverTimer = setTimeout(() => closeMega(item), 120);
        });

        /* Keep open when cursor is inside the mega panel itself */
        const mega = item.querySelector('.nav__mega');
        if (mega) {
            mega.addEventListener('mouseenter', clearHoverTimer);
            mega.addEventListener('mouseleave', () => {
                clearHoverTimer();
                hoverTimer = setTimeout(() => closeMega(item), 120);
            });
        }
    });

    /* Backdrop click closes */
    backdrop.addEventListener('click', closeAll);

    /* Escape key closes */
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeAll();
    });

    /* Click outside closes */
    document.addEventListener('click', (e) => {
        if (openItem && !openItem.contains(e.target)) closeAll();
    });

    /* ── Mobile menu ── */
    function toggleMobile() {
        mobileOpen = !mobileOpen;
        mobileBtn.classList.toggle('is-open', mobileOpen);
        mobileNav.classList.toggle('is-open', mobileOpen);
        mobileNav.setAttribute('aria-hidden', String(!mobileOpen));
        mobileBtn.setAttribute('aria-expanded', String(mobileOpen));
        document.body.style.overflow = mobileOpen ? 'hidden' : '';
    }

    mobileBtn.addEventListener('click', toggleMobile);

    /* Mobile accordion items */
    document.querySelectorAll('[data-mobile-item]').forEach(item => {
        const trigger = item.querySelector('.mobile-nav__trigger');
        const panel   = item.querySelector('.mobile-nav__panel');
        if (!trigger || !panel) return;

        trigger.addEventListener('click', () => {
            const isOpen = item.classList.toggle('is-open');
            trigger.setAttribute('aria-expanded', String(isOpen));
            panel.setAttribute('aria-hidden', String(!isOpen));
        });
    });

    /* Close mobile nav on link click */
    mobileNav.querySelectorAll('a').forEach(a => {
        a.addEventListener('click', () => {
            if (mobileOpen) toggleMobile();
        });
    });

})();
</script>
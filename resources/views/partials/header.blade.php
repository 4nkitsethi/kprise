{{--
    Partial: Header / Navigation
    Usage: @include('partials.header')
--}}
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

                <li class="nav__item">
                    <a href="{{ route('pricing') }}" class="nav__link {{ request()->routeIs('pricing') ? 'nav__link--active' : '' }}">
                        Pricing
                    </a>
                </li>

                {{-- About Us Dropdown --}}
                <li class="nav__item nav__item--dropdown">
                    <button class="nav__link nav__dropdown-trigger" aria-haspopup="true" aria-expanded="false">
                        About Us
                        <svg class="nav__chevron" width="12" height="12" viewBox="0 0 12 12" aria-hidden="true">
                            <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <ul class="nav__dropdown" role="list">
                        <li><a href="{{ route('about.company') }}" class="nav__dropdown-link">Company Overview</a></li>
                        <li><a href="{{ route('about.platform') }}" class="nav__dropdown-link">About Platform</a></li>
                        <li><a href="{{ route('contact') }}" class="nav__dropdown-link">Contact Us</a></li>
                    </ul>
                </li>

                {{-- Use Cases Dropdown --}}
                <li class="nav__item nav__item--dropdown">
                    <button class="nav__link nav__dropdown-trigger" aria-haspopup="true" aria-expanded="false">
                        Use Cases
                        <svg class="nav__chevron" width="12" height="12" viewBox="0 0 12 12" aria-hidden="true">
                            <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <ul class="nav__dropdown" role="list">
                        <li><a href="{{ route('use-cases.onboarding') }}" class="nav__dropdown-link">Onboard Training</a></li>
                        <li><a href="{{ route('use-cases.sales') }}" class="nav__dropdown-link">Sales Training</a></li>
                        <li><a href="{{ route('use-cases.employee') }}" class="nav__dropdown-link">Employee Training</a></li>
                        <li><a href="{{ route('use-cases.cybersecurity') }}" class="nav__dropdown-link">Cybersecurity Training</a></li>
                        <li><a href="{{ route('use-cases.partner') }}" class="nav__dropdown-link">Partner Training</a></li>
                        <li><a href="{{ route('use-cases.compliance') }}" class="nav__dropdown-link">Compliance Training</a></li>
                    </ul>
                </li>

                {{-- Corporate Solutions Dropdown --}}
                <li class="nav__item nav__item--dropdown">
                    <button class="nav__link nav__dropdown-trigger" aria-haspopup="true" aria-expanded="false">
                        Corporate Solutions
                        <svg class="nav__chevron" width="12" height="12" viewBox="0 0 12 12" aria-hidden="true">
                            <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <ul class="nav__dropdown" role="list">
                        <li><a href="{{ route('solutions.enterprise') }}" class="nav__dropdown-link">Enterprise</a></li>
                        <li><a href="{{ route('solutions.education') }}" class="nav__dropdown-link">Educational Institutions</a></li>
                    </ul>
                </li>

                {{-- Industries Dropdown --}}
                <li class="nav__item nav__item--dropdown">
                    <button class="nav__link nav__dropdown-trigger" aria-haspopup="true" aria-expanded="false">
                        Industries
                        <svg class="nav__chevron" width="12" height="12" viewBox="0 0 12 12" aria-hidden="true">
                            <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <ul class="nav__dropdown" role="list">
                        <li><a href="{{ route('industries.software') }}" class="nav__dropdown-link">Software</a></li>
                        <li><a href="{{ route('industries.manufacturing') }}" class="nav__dropdown-link">Manufacturing</a></li>
                        <li><a href="{{ route('industries.healthcare') }}" class="nav__dropdown-link">Healthcare</a></li>
                        <li><a href="{{ route('industries.financial') }}" class="nav__dropdown-link">Financial Services</a></li>
                        <li><a href="{{ route('industries.consulting') }}" class="nav__dropdown-link">Consulting</a></li>
                        <li><a href="{{ route('industries.nonprofit') }}" class="nav__dropdown-link">Non-profit</a></li>
                        <li><a href="{{ route('industries.retail') }}" class="nav__dropdown-link">Retail</a></li>
                    </ul>
                </li>

                {{-- Resources Dropdown --}}
                <li class="nav__item nav__item--dropdown">
                    <button class="nav__link nav__dropdown-trigger" aria-haspopup="true" aria-expanded="false">
                        Resources
                        <svg class="nav__chevron" width="12" height="12" viewBox="0 0 12 12" aria-hidden="true">
                            <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <ul class="nav__dropdown" role="list">
                        <li><a href="{{ route('blog.index') }}" class="nav__dropdown-link">Blog</a></li>
                        <li><a href="{{ route('resources.lms-comparisons') }}" class="nav__dropdown-link">LMS Comparisons</a></li>
                        <li><a href="{{ route('resources.insights') }}" class="nav__dropdown-link">Learning Insights Hub</a></li>
                        <li><a href="{{ config('services.help_center_url', '#') }}" class="nav__dropdown-link" target="_blank" rel="noopener">Help Center</a></li>
                        <li><a href="{{ route('resources.calculator') }}" class="nav__dropdown-link">Calculator</a></li>
                        <li><a href="{{ route('resources.case-study') }}" class="nav__dropdown-link">Case Study</a></li>
                    </ul>
                </li>

            </ul>
        </nav>

        {{-- Header CTA Buttons --}}
        <div class="header__actions">
            <a href="{{ config('services.lms_login_url', '#') }}" class="btn btn--ghost btn--sm" target="_blank" rel="noopener">
                Sign In
            </a>
            <a href="{{ config('services.demo_url', '#') }}" class="btn btn--primary btn--sm" target="_blank" rel="noopener">
                Book Demo
            </a>
        </div>

        {{-- Mobile Hamburger --}}
        <button
            class="header__hamburger"
            id="mobile-menu-toggle"
            aria-controls="primary-nav"
            aria-expanded="false"
            aria-label="Toggle navigation menu"
        >
            <span class="hamburger__line"></span>
            <span class="hamburger__line"></span>
            <span class="hamburger__line"></span>
        </button>

    </div>
</header>

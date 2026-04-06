{{--
    Partial: Footer
    Usage: @include('partials.footer')
--}}

    <style>
        /* ── Bottom bar ────────────────────────────────────────────────── */
.lms-footer__bottom {
    padding: 18px 48px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 14px;
}
.lms-footer__copy {
    font-size: 13px;
    color: #6b7280;
    display: flex;
    align-items: center;
    gap: 5px;
}
.lms-footer__copy a {
    color: #4f6ef7;
    font-weight: 600;
    text-decoration: none;
}
.lms-footer__copy a:hover { text-decoration: underline; }
.lms-footer__copy-heart {
    width: 14px;
    height: 14px;
    color: #ff4757;
    flex-shrink: 0;
}

.lms-footer__legal {
    display: flex;
    gap: 24px;
    list-style: none;
}
.lms-footer__legal a {
    font-size: 13px;
    color: #6b7280;
    text-decoration: none;
    transition: color 150ms;
}
.lms-footer__legal a:hover { color: #4f6ef7; }

.lms-footer__social {
    display: flex;
    align-items: center;
    gap: 8px;
}
.lms-footer__social-btn {
    width: 34px;
    height: 34px;
    border-radius: 8px;
    border: 1px solid #dde1ea;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: border-color 150ms, background 150ms, transform 150ms;
    text-decoration: none;
    color: #6b7280;
}
.lms-footer__social-btn:hover {
    border-color: #4f6ef7;
    background: #eef1ff;
    color: #4f6ef7;
    transform: translateY(-1px);
}
.lms-footer__social-btn svg {
    width: 16px;
    height: 16px;
}

.footer-divider {
    position: relative;
    height: 1px;
    margin: 24px 0;
}

.footer-divider::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to right,
        transparent 0%,
        #e5e7eb 20%,
        #e5e7eb 80%,
        transparent 100%
    );
}

.footer__aws img{
    margin-top: 2em;
    margin-bottom: 0em;
    background: #f5f5f5;  
    width: 150px;
    height: auto;
}

/* ── Responsive ────────────────────────────────────────────────── */
@media (max-width: 1100px) {
    .lms-footer__main {
        grid-template-columns: 200px 260px repeat(4, 1fr);
        gap: 24px;
        padding: 40px 28px 32px;
    }
}
@media (max-width: 900px) {
    .lms-footer__main {
        grid-template-columns: 1fr 1fr;
        padding: 36px 24px 28px;
    }
    .lms-footer__bottom {
        flex-direction: column;
        align-items: flex-start;
        padding: 20px 24px;
    }
}
@media (max-width: 540px) {
    .lms-footer__main { grid-template-columns: 1fr; }
    .lms-footer__legal { flex-wrap: wrap; gap: 14px; }
}

.footer-brand p {
    color: var(--muted);
    font-size: 14px;
    line-height: 1.65;
    max-width: 300px;
    margin-top: 12px;
}

</style>


<footer class="site-footer" role="contentinfo">

    {{-- Footer CTA Band 
    <div class="footer-cta">
        <div class="container footer-cta__inner">
            <div class="footer-cta__text">
                <h2 class="footer-cta__heading">Start Using MyPass LMS Free for 90 or 180 Days</h2>
                <p class="footer-cta__sub">Unlimited features. No restrictions. No credit card.</p>
            </div>
            <a
                href="{{ config('services.lms_register_url', '#') }}"
                class="btn btn--white btn--lg"
                target="_blank"
                rel="noopener"
            >
                Sign Up For Free
            </a>
        </div>
        <p class="footer-cta__note">Limited Offer: 5,000 Free Credits + 90-Day Access → Start Free</p>
    </div>

    --}}

    {{-- Footer Main --}}
    <div class="footer__main">
        <div class="container footer__grid">

            {{-- Brand Column --}}
            <div class="footer__brand">
                <a href="{{ route('home') }}" aria-label="{{ config('app.name') }} Home">
                    <img
                        src="{{ asset('assets/images/mypass-logo-white.png') }}"
                        alt="MyPass LMS"
                        width="180"
                        height="52"
                        loading="lazy"
                    >
                </a>

                
                <address class="footer__address">
                    MyPass LMS is a training management platform that cuts admin work by up to 70%, built for associations, enterprises, and growing teams.<br><br>
                    3905 National Drive, Suite 330<br>
                    Burtonsville MD, 20866
                </address>
                <a href="tel:+12403164903" class="footer__phone">(240) 316-4903</a>
                
                <a href="https://www.instagram.com/kprisellc/" class="footer__aws" target="_blank" rel="noopener noreferrer" aria-label="AWS">
                    <img class="img-with-animation skip-lazy" data-delay="0"  data-animation="none" src="{{ asset('assets/images/powerByAWS.png') }}" alt="Powered by AWS" />
                </a>
                
            </div>

            {{-- Footer Nav Columns --}}
            <div class="footer__nav-col">
                <h3 class="footer__nav-heading">Home</h3>
                <ul class="footer__nav-list" role="list">
                    <li><a href="{{ route('home') }}" class="footer__nav-link">Home</a></li>
                    <li><a href="{{ route('pricing') }}" class="footer__nav-link">Pricing</a></li>
                </ul>

                <h3 class="footer__nav-heading">Corporate Solutions</h3>
                <ul class="footer__nav-list" role="list">
                    <li><a href="{{ route('solutions.enterprise') }}" class="footer__nav-link">Enterprises</a></li>
                    <li><a href="{{ route('solutions.education') }}" class="footer__nav-link">Educational Institutions</a></li>
                </ul>
            </div>

            <div class="footer__nav-col">
                <h3 class="footer__nav-heading">Use Cases</h3>
                <ul class="footer__nav-list" role="list">
                    <li><a href="{{ route('use-cases.onboarding') }}" class="footer__nav-link">Onboarding Training</a></li>
                    <li><a href="{{ route('use-cases.employee') }}" class="footer__nav-link">Employee Training</a></li>
                    <li><a href="{{ route('use-cases.compliance') }}" class="footer__nav-link">Compliance Training</a></li>
                    <li><a href="{{ route('use-cases.sales') }}" class="footer__nav-link">Sales Training</a></li>
                    <li><a href="{{ route('use-cases.cybersecurity') }}" class="footer__nav-link">Cybersecurity Training</a></li>
                    <li><a href="{{ route('use-cases.partner') }}" class="footer__nav-link">Partner Training</a></li>
                </ul>
            </div>

            <div class="footer__nav-col">
                <h3 class="footer__nav-heading">Industries</h3>
                <ul class="footer__nav-list" role="list">
                    <li><a href="{{ route('industries.software') }}" class="footer__nav-link">Software</a></li>
                    <li><a href="{{ route('industries.manufacturing') }}" class="footer__nav-link">Manufacturing</a></li>
                    <li><a href="{{ route('industries.healthcare') }}" class="footer__nav-link">Healthcare</a></li>
                    <li><a href="{{ route('industries.consulting') }}" class="footer__nav-link">Consulting</a></li>
                    <li><a href="{{ route('industries.financial') }}" class="footer__nav-link">Financial Services</a></li>
                    <li><a href="{{ route('industries.nonprofit') }}" class="footer__nav-link">Non-Profit</a></li>
                    <li><a href="{{ route('industries.retail') }}" class="footer__nav-link">Retail</a></li>
                </ul>
            </div>

            <div class="footer__nav-col">
                <h3 class="footer__nav-heading">About Us</h3>
                <ul class="footer__nav-list" role="list">
                    <li><a href="{{ route('about.company') }}" class="footer__nav-link">Company Overview</a></li>
                    <li><a href="{{ route('about.platform') }}" class="footer__nav-link">About Platform</a></li>
                </ul>

                <h3 class="footer__nav-heading">Resources</h3>
                <ul class="footer__nav-list" role="list">
                    <li><a href="{{ route('blog.index') }}" class="footer__nav-link">Blog</a></li>
                    <li><a href="{{ route('sitemap') }}" class="footer__nav-link">Site Map</a></li>
                </ul>
            </div>

        </div>
    </div>

    {{-- Footer Bottom Bar --}}
    <div class="footer__bottom">
        <div class="container footer__bottom-inner">
            {{-- Copyright --}}
            <p class="lms-footer__copy">
                &copy; {{ date('Y') }}
                <a href="{{ route('home') }}">{{ 'Mypass LMS' }}</a>
            </p>

            {{-- Legal links --}}
            <nav aria-label="Legal">
                <ul class="lms-footer__legal">
                    <li><a href="{{ route('legal.privacy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('legal.terms') }}">Terms &amp; Conditions</a></li>
                </ul>
            </nav>

            {{-- Social icons --}}
            <div class="lms-footer__social" aria-label="Social media">

                <a href="https://www.linkedin.com/company/kprise/" class="lms-footer__social-btn" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>

                <a href="https://www.facebook.com/kprisellc/" class="lms-footer__social-btn" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>

                <a href="https://x.com/kprisel" class="lms-footer__social-btn" target="_blank" rel="noopener noreferrer" aria-label="X (Twitter)">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.259 5.629L18.244 2.25zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77z"/>
                    </svg>
                </a>

                <a href="https://www.instagram.com/kprisellc/" class="lms-footer__social-btn" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </a>

                <a href="https://youtube.com/" class="lms-footer__social-btn" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </a>

            </div>
        </div>
    </div>

</footer>

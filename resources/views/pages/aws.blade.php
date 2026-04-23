@extends('layouts.app')

@push('styles')
  <style>
    /* ── Page-specific additions ── */

    /* Hero overrides for FedRAMP page */
    .fedramp-hero {
      padding: var(--space-20) 0 var(--space-16);
      background: linear-gradient(135deg, #F8F6FF 0%, #FFFFFF 60%, #F0FDFA 100%);
      position: relative;
      overflow: hidden;
      text-align: center;
    }
    .fedramp-hero::before {
      content: '';
      position: absolute;
      top: -120px; right: -120px;
      width: 700px; height: 700px;
      background: radial-gradient(circle, rgba(89,50,234,0.07) 0%, transparent 70%);
      pointer-events: none;
    }
    .fedramp-hero::after {
      content: '';
      position: absolute;
      bottom: -80px; left: -80px;
      width: 500px; height: 500px;
      background: radial-gradient(circle, rgba(0,194,168,0.06) 0%, transparent 70%);
      pointer-events: none;
    }
    .fedramp-hero__badge {
      display: inline-flex;
      align-items: center;
      gap: var(--space-2);
      padding: var(--space-1) var(--space-4) var(--space-1) var(--space-2);
      background: var(--color-primary-light);
      color: var(--color-primary);
      border-radius: var(--radius-full);
      font-size: var(--text-xs);
      font-weight: var(--weight-semibold);
      letter-spacing: 0.08em;
      text-transform: uppercase;
      margin-bottom: var(--space-5);
    }
    .fedramp-hero__badge-dot {
      width: 8px; height: 8px;
      background: var(--color-primary);
      border-radius: var(--radius-full);
      animation: pulse-dot 2s infinite;
    }
    .fedramp-hero h1 {
      font-family: var(--font-display);
      font-size: clamp(var(--text-3xl), 5vw, var(--text-5xl));
      font-weight: var(--weight-bold);
      line-height: var(--leading-tight);
      color: var(--color-gray-900);
      margin-bottom: var(--space-5);
    }
    .fedramp-hero__sub {
      font-size: var(--text-xl);
      font-weight: var(--weight-semibold);
      color: var(--color-primary);
      margin-bottom: var(--space-6);
    }
    .fedramp-hero__desc {
      font-size: var(--text-lg);
      color: var(--color-text-secondary);
      line-height: var(--leading-relaxed);
      max-width: 66ch;
      margin: 0 auto var(--space-10);
    }

    /* Security cards section */
    .security-section {
      padding: var(--section-gap) 0;
      background: var(--color-white);
    }
    .security-section__intro {
      font-size: var(--text-sm);
      font-weight: var(--weight-semibold);
      color: var(--color-primary);
      text-transform: uppercase;
      letter-spacing: 0.08em;
      margin-bottom: var(--space-4);
      display: block;
    }
    .security-cards {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: var(--space-6);
      margin-top: var(--space-10);
    }
    .security-card {
      background: var(--color-white);
      border: 1px solid var(--color-border);
      border-radius: var(--radius-xl);
      padding: var(--space-8);
      transition: box-shadow var(--transition-base), border-color var(--transition-base), transform var(--transition-base);
      position: relative;
      overflow: hidden;
    }
    .security-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 4px;
      background: linear-gradient(90deg, var(--color-primary), var(--color-accent));
    }
    .security-card:hover {
      box-shadow: var(--shadow-lg);
      border-color: var(--color-primary-light);
      transform: translateY(-3px);
    }
    .security-card__icon {
      width: 52px; height: 52px;
      background: var(--color-primary-light);
      border-radius: var(--radius-lg);
      display: flex; align-items: center; justify-content: center;
      margin-bottom: var(--space-5);
      color: var(--color-primary);
    }
    .security-card__title {
      font-family: var(--font-display);
      font-size: var(--text-xl);
      font-weight: var(--weight-bold);
      color: var(--color-gray-900);
      margin-bottom: var(--space-3);
    }
    .security-card__body {
      font-size: var(--text-base);
      color: var(--color-text-secondary);
      line-height: var(--leading-relaxed);
    }

    /* Highlight strip */
    .highlight-strip {
      padding: var(--space-16) 0;
      background: linear-gradient(135deg, var(--color-primary) 0%, #7C3AED 100%);
      color: var(--color-white);
    }
    .highlight-strip__inner {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: var(--space-16);
      align-items: center;
    }
    .highlight-strip__heading {
      font-family: var(--font-display);
      font-size: clamp(var(--text-2xl), 3.5vw, var(--text-4xl));
      font-weight: var(--weight-bold);
      line-height: var(--leading-tight);
      margin-bottom: var(--space-5);
    }
    .highlight-strip__sub {
      font-size: var(--text-lg);
      opacity: 0.85;
      line-height: var(--leading-relaxed);
      margin-bottom: var(--space-8);
    }
    .highlight-strip__bullets {
      display: flex;
      flex-direction: column;
      gap: var(--space-4);
      margin-bottom: var(--space-8);
    }
    .highlight-strip__bullet {
      display: flex;
      align-items: center;
      gap: var(--space-3);
      font-size: var(--text-base);
      font-weight: var(--weight-medium);
    }
    .highlight-strip__bullet-icon {
      width: 32px; height: 32px;
      background: rgba(255,255,255,0.18);
      border-radius: var(--radius-full);
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
    }
    .highlight-strip__visual {
      background: rgba(255,255,255,0.10);
      border: 1px solid rgba(255,255,255,0.2);
      border-radius: var(--radius-2xl);
      padding: var(--space-10);
      text-align: center;
      backdrop-filter: blur(10px);
    }
    .highlight-strip__logo-label {
      font-size: var(--text-sm);
      opacity: 0.7;
      margin-bottom: var(--space-4);
      text-transform: uppercase;
      letter-spacing: 0.08em;
    }
    .highlight-strip__aws-badge {
      display: inline-block;
      background: rgba(255,255,255,0.95);
      border-radius: var(--radius-xl);
      padding: var(--space-6) var(--space-10);
      margin-bottom: var(--space-6);
    }
    .aws-badge-inner {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: var(--space-2);
    }
    .aws-badge-inner svg { color: #FF9900; }
    .aws-badge-inner span {
      font-size: var(--text-sm);
      font-weight: var(--weight-bold);
      color: var(--color-gray-900);
      letter-spacing: 0.05em;
    }
    .highlight-strip__stats {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: var(--space-4);
    }
    .highlight-stat {
      background: rgba(255,255,255,0.12);
      border-radius: var(--radius-lg);
      padding: var(--space-4);
      text-align: center;
    }
    .highlight-stat__number {
      font-size: var(--text-2xl);
      font-weight: var(--weight-bold);
      display: block;
      margin-bottom: var(--space-1);
    }
    .highlight-stat__label {
      font-size: var(--text-xs);
      opacity: 0.75;
      text-transform: uppercase;
      letter-spacing: 0.06em;
    }

    /* Compliance badges */
    .compliance-section {
      padding: var(--section-gap) 0;
      background: var(--color-gray-50);
    }
    .compliance-badges {
      display: flex;
      flex-wrap: wrap;
      gap: var(--space-4);
      justify-content: center;
      margin-top: var(--space-10);
    }
    .compliance-badge {
      display: flex;
      align-items: center;
      gap: var(--space-3);
      background: var(--color-white);
      border: 1px solid var(--color-border);
      border-radius: var(--radius-full);
      padding: var(--space-3) var(--space-6);
      font-weight: var(--weight-semibold);
      color: var(--color-gray-800);
      font-size: var(--text-sm);
      box-shadow: var(--shadow-sm);
      transition: box-shadow var(--transition-base), transform var(--transition-base);
    }
    .compliance-badge:hover {
      box-shadow: var(--shadow-md);
      transform: translateY(-2px);
    }
    .compliance-badge__dot {
      width: 10px; height: 10px;
      border-radius: var(--radius-full);
      background: var(--color-accent);
      flex-shrink: 0;
    }

    /* Note callout */
    .note-callout {
      margin-top: var(--space-10);
      background: var(--color-primary-light);
      border-left: 4px solid var(--color-primary);
      border-radius: var(--radius-lg);
      padding: var(--space-5) var(--space-6);
      font-size: var(--text-sm);
      color: var(--color-gray-800);
      line-height: var(--leading-relaxed);
      max-width: 72ch;
      margin-inline: auto;
    }
    .note-callout strong { color: var(--color-primary); }

    /* Responsive tweaks */
    @media (max-width: 768px) {
      .security-cards { grid-template-columns: 1fr; }
      .highlight-strip__inner { grid-template-columns: 1fr; gap: var(--space-10); }
      .fedramp-hero { text-align: left; }
    }
  </style>
@endpush

@section('content')
  <!-- ── HEADER ── -->

  <!-- ── MAIN ── -->
  <main id="main-content">

    <!-- HERO -->
    <section class="fedramp-hero">
      <div class="container">
        <div class="fedramp-hero__badge">
          <span class="fedramp-hero__badge-dot"></span>
          Security &amp; Compliance
        </div>
        <h1>AWS FedRAMP-Authorized Infrastructure</h1>
        <p class="fedramp-hero__sub">Security &amp; Compliance You Can Trust</p>
        <p class="fedramp-hero__desc">
          At MyPass LMS, safeguarding your data is our highest priority. Our platform is built on
          <strong>Amazon Web Services (AWS)</strong>, which is authorized at the
          <strong>FedRAMP Moderate and High baselines</strong>, meeting the strict security standards
          required by U.S. government agencies and global enterprises.
        </p>
        <div style="display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
          <a href="https://calendly.com/onlinesales-kprise/30min" class="btn btn--primary btn--lg">Book a Demo</a>
          <a href="https://kprise.com/about-platform/" class="btn btn--outline btn--lg">Learn More</a>
        </div>
      </div>
    </section>

    <!-- SECURITY FOUNDATION CARDS -->
    <section class="security-section">
      <div class="container">
        <span class="security-section__intro">Our security foundation includes</span>
        <h2 class="section-heading">Enterprise-Grade Protection<br>at Every Layer</h2>
        <p class="section-subtext">
          We've built MyPass LMS on infrastructure that meets the most rigorous compliance requirements
          so your teams can focus on learning — not security concerns.
        </p>

        <div class="security-cards">

          <!-- Card 1 -->
          <div class="security-card">
            <div class="security-card__icon">
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
              </svg>
            </div>
            <h3 class="security-card__title">FedRAMP-Compliant Hosting</h3>
            <p class="security-card__body">
              MyPass LMS runs on AWS infrastructure that meets FedRAMP requirements for secure cloud services,
              covering both Moderate and High baselines required by U.S. government agencies and enterprise clients.
            </p>
          </div>

          <!-- Card 2 -->
          <div class="security-card">
            <div class="security-card__icon">
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
              </svg>
            </div>
            <h3 class="security-card__title">End-to-End Encryption</h3>
            <p class="security-card__body">
              All data is encrypted at rest and in transit using industry-leading protocols.
              Your learner data, course content, and analytics remain fully protected throughout every interaction.
            </p>
          </div>

          <!-- Card 3 -->
          <div class="security-card">
            <div class="security-card__icon">
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
                <polyline points="17 6 23 6 23 12"/>
              </svg>
            </div>
            <h3 class="security-card__title">High Availability &amp; Reliability</h3>
            <p class="security-card__body">
              99.9% uptime backed by AWS's secure and scalable cloud environment. Our infrastructure
              is designed for zero-downtime deployments, automatic failover, and global redundancy.
            </p>
          </div>

          <!-- Card 4 -->
          <div class="security-card">
            <div class="security-card__icon">
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/>
                <line x1="2" y1="12" x2="22" y2="12"/>
                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
              </svg>
            </div>
            <h3 class="security-card__title">Global Standards Alignment</h3>
            <p class="security-card__body">
              Infrastructure compliant with SOC 2, ISO 27001, and GDPR, ensuring your data is safe
              and private regardless of where your organization or learners are located.
            </p>
          </div>

        </div><!-- /.security-cards -->
      </div>
    </section>

    <!-- HIGHLIGHT STRIP -->
    <section class="highlight-strip">
      <div class="container">
        <div class="highlight-strip__inner">
          <div>
            <h2 class="highlight-strip__heading">Built on AWS FedRAMP-Authorized Infrastructure</h2>
            <p class="highlight-strip__sub">
              Every component of MyPass LMS is designed to meet the highest government-grade security
              requirements while keeping your training programs running smoothly.
            </p>
            <ul class="highlight-strip__bullets">
              <li class="highlight-strip__bullet">
                <span class="highlight-strip__bullet-icon">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                </span>
                End-to-end encryption for all data at rest and in transit
              </li>
              <li class="highlight-strip__bullet">
                <span class="highlight-strip__bullet-icon">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                </span>
                99.9% uptime reliability with automatic failover
              </li>
              <li class="highlight-strip__bullet">
                <span class="highlight-strip__bullet-icon">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                </span>
                SOC 2, ISO 27001, and GDPR compliance
              </li>
              <li class="highlight-strip__bullet">
                <span class="highlight-strip__bullet-icon">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                </span>
                FedRAMP Moderate and High baseline coverage
              </li>
            </ul>
            <a href="https://calendly.com/onlinesales-kprise/30min" class="btn btn--white btn--lg">Book a Demo</a>
          </div>

          <div>
            <div class="highlight-strip__visual">
              <p class="highlight-strip__logo-label">Powered by</p>
              <div class="highlight-strip__aws-badge">
                <div class="aws-badge-inner">
                  <!-- AWS logo SVG approximation -->
                  <svg width="80" height="48" viewBox="0 0 80 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <text x="0" y="30" font-family="Arial, sans-serif" font-size="28" font-weight="900" fill="#FF9900">aws</text>
                  </svg>
                  <span>FedRAMP Authorized</span>
                </div>
              </div>
              <div class="highlight-strip__stats">
                <div class="highlight-stat">
                  <span class="highlight-stat__number">99.9%</span>
                  <span class="highlight-stat__label">Uptime SLA</span>
                </div>
                <div class="highlight-stat">
                  <span class="highlight-stat__number">256-bit</span>
                  <span class="highlight-stat__label">AES Encryption</span>
                </div>
                <div class="highlight-stat">
                  <span class="highlight-stat__number">SOC 2</span>
                  <span class="highlight-stat__label">Type II Aligned</span>
                </div>
                <div class="highlight-stat">
                  <span class="highlight-stat__number">ISO</span>
                  <span class="highlight-stat__label">27001 Compliant</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- COMPLIANCE BADGES -->
    <section class="compliance-section">
      <div class="container" style="text-align:center;">
        <span class="section-label">Certifications &amp; Standards</span>
        <h2 class="section-heading">Compliance You Can Count On</h2>
        <p class="section-subtext" style="margin-inline:auto;">
          MyPass LMS infrastructure is aligned with the world's leading security and data privacy frameworks,
          giving your organization the assurance it needs.
        </p>

        <div class="compliance-badges">
          <div class="compliance-badge">
            <span class="compliance-badge__dot"></span>
            FedRAMP Moderate
          </div>
          <div class="compliance-badge">
            <span class="compliance-badge__dot"></span>
            FedRAMP High
          </div>
          <div class="compliance-badge">
            <span class="compliance-badge__dot"></span>
            SOC 2 Type II
          </div>
          <div class="compliance-badge">
            <span class="compliance-badge__dot"></span>
            ISO 27001
          </div>
          <div class="compliance-badge">
            <span class="compliance-badge__dot"></span>
            GDPR
          </div>
          <div class="compliance-badge">
            <span class="compliance-badge__dot"></span>
            AWS GovCloud Ready
          </div>
        </div>

        <div class="note-callout">
          <strong>Note:</strong> MyPass LMS leverages AWS FedRAMP-authorized services. MyPass LMS itself is not currently FedRAMP certified.
        </div>
      </div>
    </section>

    <!-- CTA BAND -->
    <section class="cta-band cta-band--gradient">
      <div class="container">
        <div class="cta-band__inner">
          <h2 class="cta-band__heading">Ready to Build on a Secure Foundation?</h2>
          <p class="cta-band__subtext">
            Join organizations that trust MyPass LMS to deliver learning at scale — safely and compliantly.
          </p>
          <div style="display:flex; gap:1rem; flex-wrap:wrap; justify-content:center;">
            <a href="https://calendly.com/onlinesales-kprise/30min" class="btn btn--white btn--lg">Book a Demo</a>
            <a href="https://kprise.com/contact-us-2/" class="btn btn--outline btn--lg" style="color:white;border-color:rgba(255,255,255,0.5);">Contact Us</a>
          </div>
          <p class="cta-band__note">No credit card required · Setup in minutes</p>
        </div>
      </div>
    </section>

  </main>


@endsection

@push('schema')
@verbatim

@endverbatim
@endpush

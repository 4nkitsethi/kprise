@extends('layouts.app')

@php
    /**
    * index.php — MyPass LMS Homepage
    * Last updated: 2026-03-26 | Version 1.0
    */

    // ── Page Meta ──
    $page_title       = 'MyPass LMS by Kprise — Training Management Platform That Cuts Admin Work by 70%';
    $page_description = 'MyPass LMS automates enrollments, compliance tracking, and course creation so training teams spend less time on admin. Built-in SCORM authoring, AMS integration for associations, and audit-ready reporting. Plans from $79/mo.';
    $page_canonical   = 'https://kprise.com/';
    $page_slug        = 'home';
    $page_updated     = '2026-03-26';

    // ── Page-Specific Schema: WebPage ──
    $page_schema = json_encode([
    "@context" => "https://schema.org",
    "@type" => "WebPage",
    "name" => "MyPass LMS — Training Management Platform",
    "description" => "MyPass LMS reduces LMS admin work by up to 70% with automated enrollments, built-in SCORM authoring, compliance tracking, and AMS integration for associations.",
    "url" => "https://kprise.com/",
    "dateModified" => "2026-03-26",
    "publisher" => [
        "@type" => "Organization",
        "name" => "Kprise",
        "url" => "https://kprise.com"
    ]
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

    // ── Page CSS ──
    $page_css = <<<'CSS'
    /* ── HERO ── */
    .hero {
        padding: 52px 0 0;
        background: linear-gradient(180deg, #ffffff 0%, #f6f8fc 100%);
    }
    .hero-text {
        text-align: center;
        max-width: 760px;
        margin: 0 auto 36px;
    }
    .eyebrow .dot {
        width: 7px; height: 7px; border-radius: 50%; background: var(--primary);
        animation: pulse 2s infinite;
    }
    @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:.35} }
    h1 {
        font-size: clamp(36px, 5vw, 56px); line-height: 1.08; margin: 0 0 20px;
        letter-spacing: -0.035em; font-weight: 800;
    }
    .hero-sub {
        color: var(--light-text); font-size: 17px; line-height: 1.7;
        margin: 0 auto 28px; max-width: 620px;
    }
    .hero-actions { display: flex; align-items: center; justify-content: center; gap: 14px; flex-wrap: wrap; margin-bottom: 12px; }
    .hero-note { color: var(--muted); font-size: 13px; font-weight: 600; }
    /* Keyword pills — visible context, not naked text */
    .hero-tags {
        display: flex; justify-content: center; gap: 8px; flex-wrap: wrap;
        margin-bottom: 20px;
    }
    .hero-tags span {
        padding: 5px 12px; font-size: 12px; font-weight: 700; color: var(--light-text);
        background: var(--bg-subtle); border: 1px solid var(--line); border-radius: var(--radius-pill);
        letter-spacing: .02em;
    }
    /* Trust strip — compact credibility row */
    .hero-trust {
        display: flex; align-items: center; justify-content: center; gap: 24px; flex-wrap: wrap;
        margin-top: 16px; padding-top: 16px; border-top: 1px solid var(--line);
    }
    .hero-trust-item {
        display: flex; align-items: center; gap: 6px;
        font-size: 13px; font-weight: 700; color: var(--muted);
    }
    .hero-trust-item svg { flex-shrink: 0; }
    .hero-trust-item .ht-val { color: var(--text); font-weight: 800; }
    .hero-showcase {
        background: var(--text); border-radius: 24px 24px 0 0;
        position: relative; overflow: hidden;
        max-width: 1080px; margin: 0 auto;
    }
    .hero-video-wrap { position: relative; width: 100%; overflow: hidden; padding: 24px 24px 0; }
    .hero-video-inner {
        border-radius: 16px 16px 0 0; overflow: hidden; position: relative;
        box-shadow: 0 -4px 40px rgba(0,0,0,.3);
    }
    .hero-video-inner video { width: 100%; display: block; aspect-ratio: 16 / 9; object-fit: cover; }
    .hero-video-badge {
        position: absolute; top: 16px; left: 16px; z-index: 2;
        display: inline-flex; align-items: center; gap: 7px;
        padding: 7px 14px; background: rgba(0,0,0,.5); backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,.12); border-radius: var(--radius-pill);
        font-size: 12px; font-weight: 700; color: rgba(255,255,255,.9);
    }
    .hero-video-badge .live-dot {
        width: 7px; height: 7px; border-radius: 50%; background: #ef4444;
        animation: pulse 1.5s infinite;
    }
    .hero-stats-bar {
        display: flex; position: relative; z-index: 2;
        border-top: 1px solid rgba(255,255,255,.06);
    }
    .hero-stat-item {
        flex: 1; padding: 20px 18px; text-align: center;
        border-right: 1px solid rgba(255,255,255,.06);
    }
    .hero-stat-item:last-child { border-right: none; }
    .hero-stat-item .stat-value { font-size: 26px; font-weight: 800; letter-spacing: -0.03em; color: #fff; }
    .hero-stat-item .stat-value.blue { color: #60a5fa; }
    .hero-stat-item .stat-value.green { color: #34d399; }
    .hero-stat-item .stat-value.amber { color: #fbbf24; }
    .hero-stat-item .stat-value.purple { color: #a78bfa; }
    .hero-stat-item .stat-label {
        font-size: 12px; font-weight: 700; color: rgba(255,255,255,.4);
        text-transform: uppercase; letter-spacing: .05em; margin-top: 4px;
    }

    /* ── PROOF BAR ── */
    .proof-bar { padding: 36px 0; border-bottom: 1px solid var(--line); background: #fff; overflow: hidden; }
    .proof-bar-label {
        text-align: center; font-size: 13px; font-weight: 700; text-transform: uppercase;
        letter-spacing: .08em; color: var(--muted); margin-bottom: 24px;
    }
    .marquee-wrap {
        position: relative; width: 100%; overflow: hidden;
        mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
        -webkit-mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
    }
    .marquee-track {
        display: flex; align-items: center; gap: 48px; width: max-content;
        animation: marquee 80s linear infinite;
    }
    .marquee-track img {
        height: 80px; width: auto; flex-shrink: 0;
        border-radius: 12px; background: #fff; padding: 8px 10px;
        border: 1px solid var(--line); box-shadow: 0 2px 10px rgba(0,0,0,.05);
    }
    @keyframes marquee { 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }
    .marquee-wrap:hover .marquee-track { animation-play-state: paused; }

    /* ── TESTIMONIALS ── */
    .testimonials-section { padding: 72px 0; background: var(--bg-subtle); }
    .tc-carousel { position: relative; margin-top: 36px; }
    .tc-slide {
        display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px;
        opacity: 0; position: absolute; top: 0; left: 0; right: 0;
        pointer-events: none; transition: opacity .45s ease;
    }
    .tc-slide.active { opacity: 1; position: relative; pointer-events: all; }
    .tc-card {
        background: #fff; border: 1px solid var(--line); border-radius: 20px;
        padding: 30px 26px; display: flex; flex-direction: column;
        box-shadow: 0 4px 20px rgba(15,23,42,.05); transition: box-shadow .2s, transform .2s;
    }
    .tc-card:hover { box-shadow: var(--shadow); transform: translateY(-3px); }
    .tc-quote { font-size: 48px; line-height: 1; font-weight: 800; color: var(--primary); opacity: .2; margin-bottom: 4px; font-family: Georgia, serif; }
    .tc-text { font-size: 15px; line-height: 1.7; color: var(--light-text); flex: 1; margin-bottom: 20px; }
    .tc-name { font-size: 15px; font-weight: 800; color: var(--text); }
    .tc-title { font-size: 13px; color: var(--muted); margin-top: 2px; line-height: 1.4; }
    .tc-stars { color: #f59e0b; font-size: 15px; letter-spacing: 1px; margin-top: 10px; }
    .tc-controls { display: flex; justify-content: center; align-items: center; gap: 16px; margin-top: 32px; }
    .tc-dot {
        width: 10px; height: 10px; border-radius: 50%; border: none; cursor: pointer;
        background: #cbd5e1; transition: background .2s, transform .2s; padding: 0;
    }
    .tc-dot.active { background: var(--primary); transform: scale(1.3); }
    .tc-arrow {
        width: 40px; height: 40px; border-radius: 50%; border: 1px solid var(--line);
        background: #fff; cursor: pointer; display: flex; align-items: center;
        justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,.06); transition: box-shadow .15s;
    }
    .tc-arrow:hover { box-shadow: var(--shadow); }

    /* ── FEATURES GRID ── */
    .feature-compact-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 44px; }
    .feature-card {
        background: #fff; border: 1px solid var(--line); border-radius: var(--radius);
        padding: 28px 24px; transition: box-shadow .2s, border-color .2s;
    }
    .feature-card:hover { box-shadow: var(--shadow); border-color: #cbd5e1; }
    .feature-icon {
        width: 44px; height: 44px; border-radius: 12px; display: flex;
        align-items: center; justify-content: center; margin-bottom: 16px;
    }

    /* ── USE CASES ── */
    .usecases-section { padding: 80px 0; background: linear-gradient(180deg, #f6f8fc 0%, #fff 100%); }
    .usecase-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 48px; }
    .usecase-card {
        background: #fff; border: 1px solid var(--line); border-radius: var(--radius);
        padding: 30px 26px; display: flex; flex-direction: column; transition: box-shadow .2s, border-color .2s;
    }
    .usecase-card:hover { box-shadow: var(--shadow); border-color: var(--primary-border); }
    .usecase-tag {
        display: inline-flex; align-self: flex-start; padding: 5px 10px;
        border-radius: var(--radius-pill); font-size: 11px; font-weight: 800;
        text-transform: uppercase; letter-spacing: .06em; margin-bottom: 16px;
    }
    .usecase-tag.assoc { background: var(--primary-light); color: var(--primary-dark); border: 1px solid var(--primary-border); }
    .usecase-tag.compliance { background: var(--amber-bg); color: var(--amber); border: 1px solid var(--amber-border); }
    .usecase-tag.onboard { background: var(--green-bg); color: var(--green); border: 1px solid var(--green-border); }
    .usecase-card h3 { font-size: 18px; font-weight: 800; margin: 0 0 12px; }
    .usecase-card > p { color: var(--light-text); font-size: 14px; line-height: 1.7; margin: 0 0 16px; flex: 1; }
    .usecase-card .uc-details { margin: 0 0 20px; }
    .usecase-card .uc-details li {
        display: flex; gap: 8px; align-items: flex-start; padding: 6px 0;
        font-size: 13px; color: var(--text); line-height: 1.5; font-weight: 600;
    }
    .usecase-card .uc-details li svg { flex-shrink: 0; color: var(--primary); margin-top: 2px; }
    .usecase-link {
        display: inline-flex; align-items: center; gap: 6px; font-size: 14px;
        font-weight: 700; color: var(--primary); transition: gap .15s; margin-top: auto;
    }
    .usecase-link:hover { gap: 10px; }

    /* ── COMPARISON ── */
    .compare-section { padding: 80px 0; background: #fff; }
    .compare-box {
        margin-top: 40px; background: #fff; border: 1px solid var(--line);
        border-radius: var(--radius); box-shadow: var(--shadow); overflow: auto;
    }
    .compare-box table { width: 100%; border-collapse: collapse; min-width: 700px; }
    .compare-box th, .compare-box td { padding: 16px 20px; border-bottom: 1px solid #edf2f7; text-align: left; font-size: 14px; }
    .compare-box thead th {
        background: var(--bg-subtle); font-size: 13px; text-transform: uppercase;
        letter-spacing: .06em; color: var(--light-text); font-weight: 800;
    }
    .compare-box thead th:nth-child(3) { color: var(--primary); }
    .compare-box tbody td:first-child { font-weight: 700; color: var(--text); width: 30%; }
    .compare-box tbody td:nth-child(3) { color: var(--text); font-weight: 700; }
    .compare-box tbody td:nth-child(2) { color: var(--muted); }

    /* ── CTA SECTION ── */
    .cta-section { padding: 80px 0; background: var(--bg-subtle); }
    .cta-box {
        background: var(--text); border-radius: var(--radius); padding: 64px 48px;
        text-align: center; color: #fff; position: relative; overflow: hidden;
    }
    .cta-box::before {
        content: ''; position: absolute; top: -40%; right: -8%; width: 420px; height: 420px;
        border-radius: 50%; background: rgba(37,99,235,.1); pointer-events: none;
    }
    .cta-box h2 {
        font-size: clamp(26px, 3.5vw, 38px); line-height: 1.15; margin: 0 0 14px;
        letter-spacing: -0.03em; font-weight: 800; position: relative;
    }
    .cta-box > p { color: #94a3b8; font-size: 16px; line-height: 1.7; max-width: 560px; margin: 0 auto 28px; position: relative; }
    .cta-actions { display: flex; align-items: center; justify-content: center; gap: 14px; flex-wrap: wrap; position: relative; }
    .cta-box .btn-primary { padding: 16px 36px; font-size: 16px; }
    .cta-box .btn-outline-light {
        display: inline-flex; align-items: center; padding: 16px 36px; font-size: 15px;
        font-weight: 800; color: #fff; background: transparent; border: 2px solid rgba(255,255,255,.2);
        border-radius: var(--radius-sm); cursor: pointer; transition: border-color .15s;
    }
    .cta-box .btn-outline-light:hover { border-color: rgba(255,255,255,.4); }
    .cta-sub { margin-top: 14px; font-size: 13px; color: #64748b; font-weight: 600; position: relative; }

    /* ── RESPONSIVE ── */
    @media (max-width: 1024px) {
        .feature-compact-grid { grid-template-columns: repeat(2, 1fr) !important; }
        .usecase-grid { grid-template-columns: repeat(2, 1fr); }
        .tc-slide { grid-template-columns: repeat(2, 1fr); }
        .tc-slide .tc-card:nth-child(3) { display: none; }
        .hero-video-wrap { padding: 16px 16px 0; }
    }
    @media (max-width: 640px) {
        .hero { padding: 40px 0 0; }
        h1 { font-size: clamp(30px, 7vw, 40px); }
        .hero-sub { font-size: 16px; }
        .feature-compact-grid, .usecase-grid { grid-template-columns: 1fr !important; }
        .tc-slide { grid-template-columns: 1fr; }
        .tc-slide .tc-card:nth-child(2), .tc-slide .tc-card:nth-child(3) { display: none; }
        .hero-actions { flex-direction: column; }
        .hero-actions a { width: 100%; text-align: center; }
        .hero-stats-bar { flex-wrap: wrap; }
        .hero-stat-item { flex: 1 1 45%; border-bottom: 1px solid rgba(255,255,255,.06); }
        .hero-stat-item:nth-child(2) { border-right: none; }
        .hero-video-wrap { padding: 12px 12px 0; }
        .hero-showcase { border-radius: 20px 20px 0 0; }
        .cta-box { padding: 40px 24px; }
        .cta-actions { flex-direction: column; }
    }
    CSS;

@endphp

@section('content')

<!-- ═══════════════════ HERO ═══════════════════ -->
<section class="hero">
  <div class="container">
    <div class="hero-text">
      <div class="eyebrow"><span class="dot"></span> Trusted by 35,000+ learners</div>
      <h1>Stop Managing Your LMS.<br>Start Running Training.</h1>
      <!-- GEO: Keyword-rich H2, visually hidden but crawlable by search/AI engines -->
      <h2 class="sr-only">Training management platform for associations, enterprises, and compliance teams — with AMS integration, automated enrollments, and audit-ready reporting</h2>
      <!-- GEO: Keyword cluster as styled pills — not naked text -->
      <div class="hero-tags" role="list" aria-label="Key capabilities">
        <span role="listitem">Associations &amp; AMS</span>
        <span role="listitem">Compliance &amp; Audit</span>
        <span role="listitem">Onboarding</span>
        <span role="listitem">Enterprise Training</span>
      </div>
      <p class="hero-sub">
        MyPass LMS replaces the spreadsheets, manual follow-ups, and disconnected tools slowing down your training program. Create courses from any file, automate enrollments and reminders, and get audit-ready compliance reports — all from one platform your team can set up in a day.
      </p>
      <div class="hero-actions">
        <a class="btn-primary lg" href="https://calendly.com/onlinesales-kprise/30min">Book a Demo</a>
        <a class="btn-outline" href="https://mypasslms.us/login#register">Start Free Trial</a>
      </div>
      <div class="hero-note">No credit card required · No contracts · 90 days full access</div>
      <!-- Trust strip — adds density and credibility to hero -->
      <div class="hero-trust">
        <div class="hero-trust-item">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2.5" stroke-linecap="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          <span><span class="ht-val">70%</span> less admin work</span>
        </div>
        <div class="hero-trust-item">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#047857" stroke-width="2.5" stroke-linecap="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
          <span><span class="ht-val">4x</span> faster course creation</span>
        </div>
        <div class="hero-trust-item">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2.5" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          <span><span class="ht-val">4.8★</span> on Capterra</span>
        </div>
        <div class="hero-trust-item">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2.5" stroke-linecap="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          <span><span class="ht-val">35K+</span> active learners</span>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="hero-showcase">
      <div class="hero-video-wrap">
        <div class="hero-video-inner">
          <span class="hero-video-badge"><span class="live-dot"></span> Live product walkthrough · 2 min</span>
          <video
            src="https://kprise.com/wp-content/uploads/2025/10/WhatsApp-Video-2025-10-06-at-12.39.50_fe04276f.mp4"
            autoplay muted loop playsinline
            aria-label="MyPass LMS platform walkthrough showing course creation, enrollment automation, and compliance reporting"
          ></video>
        </div>
      </div>
      <div class="hero-stats-bar">
        <div class="hero-stat-item"><div class="stat-value blue">70%</div><div class="stat-label">Less admin work</div></div>
        <div class="hero-stat-item"><div class="stat-value green">4x</div><div class="stat-label">Faster courses</div></div>
        <div class="hero-stat-item"><div class="stat-value amber">+35%</div><div class="stat-label">Compliance rates</div></div>
        <div class="hero-stat-item"><div class="stat-value purple">35K+</div><div class="stat-label">Active learners</div></div>
      </div>
    </div>
  </div>
</section>


<!-- ═══════════════════ PROOF BAR ═══════════════════ -->
<section class="proof-bar" aria-label="Industry recognition badges">
  <div class="container">
    <div class="proof-bar-label">Recognized across top software directories</div>
  </div>
  <div class="marquee-wrap">
    <div class="marquee-track">
      <img src="https://kprise.com/wp-content/uploads/2025/12/1.webp" alt="MyPass LMS rated on Capterra 2024" loading="lazy" width="120" height="80" />
      <img src="https://kprise.com/wp-content/uploads/2025/12/2.webp" alt="MyPass LMS listed as GetApp Leader 2024" loading="lazy" width="120" height="80" />
      <img src="https://kprise.com/wp-content/uploads/2025/12/3.webp" alt="MyPass LMS named Software Advice FrontRunner 2024" loading="lazy" width="120" height="80" />
      <img src="https://kprise.com/wp-content/uploads/2025/12/4.png" alt="MyPass LMS Best LMS Award 2024" loading="lazy" width="120" height="80" />
      <img src="https://brand-assets.capterra.com/badge/65ccdf80-7500-42bf-8e6f-aaa875f7613c.svg" alt="MyPass LMS Capterra verified badge" loading="lazy" width="120" height="80" />
      <img src="https://brand-assets.getapp.com/badge/f7329061-8cc8-4015-8dbd-9c68980f086d.png" alt="MyPass LMS GetApp verified badge" loading="lazy" width="120" height="80" />
      <img src="https://brand-assets.softwareadvice.com/badge/6aeb2175-cd8d-4d46-b212-ddd1b623365b.png" alt="MyPass LMS Software Advice verified badge" loading="lazy" width="120" height="80" />
      <img src="https://elearningindustry.com/content/product-listings/399529/badges/rating" alt="MyPass LMS eLearning Industry rating badge" loading="lazy" width="120" height="80" />
      <img src="https://www.softwaresuggest.com/award_logo/highly-recommended-winter-2025.png" alt="SoftwareSuggest Highly Recommended Winter 2025" loading="lazy" width="120" height="80" />
      <img src="https://www.softwaresuggest.com/award_logo/easy-usability-winter-2025.png" alt="SoftwareSuggest Easy Usability Award" loading="lazy" width="120" height="80" />
      <img src="https://www.softwaresuggest.com/award_logo/best-support-winter-2025.png" alt="SoftwareSuggest Best Support Award" loading="lazy" width="120" height="80" />
      <img src="https://www.softwareworld.co/customer-choice.png" alt="SoftwareWorld Customer Choice Award" loading="lazy" width="120" height="80" />
      <!-- duplicate set for seamless loop -->
      <img src="https://kprise.com/wp-content/uploads/2025/12/1.webp" alt="Capterra 2024" loading="lazy" width="120" height="80" />
      <img src="https://kprise.com/wp-content/uploads/2025/12/2.webp" alt="GetApp Leaders 2024" loading="lazy" width="120" height="80" />
      <img src="https://kprise.com/wp-content/uploads/2025/12/3.webp" alt="Software Advice Front Runners 2024" loading="lazy" width="120" height="80" />
      <img src="https://kprise.com/wp-content/uploads/2025/12/4.png" alt="Best LMS 2024" loading="lazy" width="120" height="80" />
      <img src="https://brand-assets.capterra.com/badge/65ccdf80-7500-42bf-8e6f-aaa875f7613c.svg" alt="Capterra Badge" loading="lazy" width="120" height="80" />
      <img src="https://brand-assets.getapp.com/badge/f7329061-8cc8-4015-8dbd-9c68980f086d.png" alt="GetApp Badge" loading="lazy" width="120" height="80" />
      <img src="https://brand-assets.softwareadvice.com/badge/6aeb2175-cd8d-4d46-b212-ddd1b623365b.png" alt="Software Advice Badge" loading="lazy" width="120" height="80" />
      <img src="https://elearningindustry.com/content/product-listings/399529/badges/rating" alt="eLearning Industry" loading="lazy" width="120" height="80" />
      <img src="https://www.softwaresuggest.com/award_logo/highly-recommended-winter-2025.png" alt="SoftwareSuggest Recommended" loading="lazy" width="120" height="80" />
      <img src="https://www.softwaresuggest.com/award_logo/easy-usability-winter-2025.png" alt="SoftwareSuggest Usability" loading="lazy" width="120" height="80" />
      <img src="https://www.softwaresuggest.com/award_logo/best-support-winter-2025.png" alt="SoftwareSuggest Support" loading="lazy" width="120" height="80" />
      <img src="https://www.softwareworld.co/customer-choice.png" alt="SoftwareWorld Customer Choice" loading="lazy" width="120" height="80" />
    </div>
  </div>
</section>


<!-- ═══════════════════ TESTIMONIALS ═══════════════════ -->
<section class="testimonials-section" aria-label="Customer testimonials">
  <div class="container">
    <div class="text-center">
      <h2 class="section-title mx-auto" style="font-size:clamp(20px,2.5vw,24px);">Chosen by teams who value reliable, results-driven training.</h2>
      <p class="section-desc mx-auto" style="margin-bottom:0;">Real feedback from our amazing customers.</p>
    </div>
    <div class="tc-carousel">
      <div class="tc-slide active" data-slide="0">
        <div class="tc-card">
          <div class="tc-quote">&ldquo;</div>
          <div class="tc-text">We have been a Kprise client for over four years and Kprise has constantly been there to support our needs.</div>
          <div class="tc-name">Shawn</div>
          <div class="tc-title"><b>Founder &amp; Director</b> — American Board for Certification of Teacher Excellence</div>
          <div class="tc-stars">★★★★★</div>
        </div>
        <div class="tc-card">
          <div class="tc-quote">&ldquo;</div>
          <div class="tc-text">MyPass LMS integrated smoothly, offering deep customization, CRM, and easy lead management to streamline training and learner tracking.</div>
          <div class="tc-name">Varun S.</div>
          <div class="tc-title"><b>CEO</b> — Information Technology and Services</div>
          <div class="tc-stars">★★★★★</div>
        </div>
        <div class="tc-card">
          <div class="tc-quote">&ldquo;</div>
          <div class="tc-text">Training 200 people used to feel impossible — so many moving parts, spreadsheets, emails, reminders. With MyPass, we launched training for 200+ employees in just one day.</div>
          <div class="tc-name">Aditya</div>
          <div class="tc-title"><b>Operations Lead</b> — AI Recruitment</div>
          <div class="tc-stars">★★★★★</div>
        </div>
      </div>
      <div class="tc-slide" data-slide="1">
        <div class="tc-card">
          <div class="tc-quote">&ldquo;</div>
          <div class="tc-text">MyPass LMS streamlined client onboarding with custom branding, multilingual support, and integrations — backed by a skilled team for smooth implementation.</div>
          <div class="tc-name">Kiran H.</div>
          <div class="tc-title"><b>Training Manager</b> — E-Learning</div>
          <div class="tc-stars">★★★★★</div>
        </div>
        <div class="tc-card">
          <div class="tc-quote">&ldquo;</div>
          <div class="tc-text">MyPass LMS is extremely customizable, and the team are very supportive in making the LMS your own. Their customer support is beyond helpful.</div>
          <div class="tc-name">Ashleigh</div>
          <div class="tc-title"><b>Senior Career and Learning Partner</b> — United Arab Emirates</div>
          <div class="tc-stars">★★★★★</div>
        </div>
        <div class="tc-card">
          <div class="tc-quote">&ldquo;</div>
          <div class="tc-text">MyPass LMS scaled with us quickly. The branded portals helped deliver training to clients and partners globally.</div>
          <div class="tc-name">Deepak</div>
          <div class="tc-title"><b>Director</b> — AI Workflow Industry</div>
          <div class="tc-stars">★★★★★</div>
        </div>
      </div>
      <div class="tc-controls">
        <button class="tc-arrow" onclick="tcSlide(-1)" aria-label="Previous testimonials"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--text)" stroke-width="2.5" stroke-linecap="round"><path d="M15 18l-6-6 6-6"/></svg></button>
        <button class="tc-dot active" data-dot="0" onclick="tcGo(0)" aria-label="Slide 1"></button>
        <button class="tc-dot" data-dot="1" onclick="tcGo(1)" aria-label="Slide 2"></button>
        <button class="tc-arrow" onclick="tcSlide(1)" aria-label="Next testimonials"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--text)" stroke-width="2.5" stroke-linecap="round"><path d="M9 18l6-6-6-6"/></svg></button>
      </div>
    </div>
  </div>
</section>


<!-- ═══════════════════ PLATFORM FEATURES ═══════════════════ -->
<section class="features-section" style="padding:80px 0;background:#fff;" aria-label="MyPass LMS platform features">
  <div class="container">
    <div class="text-center">
      <div class="section-label" style="display:inline-flex">Platform</div>
      <h2 class="section-title mx-auto">One platform for the entire training lifecycle</h2>
      <p class="section-desc mx-auto">From creating the course to certifying the learner to proving it to auditors — MyPass covers every step without bolt-ons.</p>
    </div>
    <div class="feature-compact-grid reveal">
      <div class="feature-card">
        <div class="feature-icon" style="background:var(--primary-light);color:var(--primary);">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <h3 style="font-size:16px;font-weight:800;margin:0 0 8px;">Built-in SCORM authoring</h3>
        <p style="color:var(--light-text);font-size:14px;line-height:1.7;margin:0;">Upload PPTs, PDFs, videos, or SCORM packages — the platform converts them into structured courses with modules, quizzes, and tracking. No external authoring tools needed.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon" style="background:var(--green-bg);color:var(--green);">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        </div>
        <h3 style="font-size:16px;font-weight:800;margin:0 0 8px;">Automated enrollments &amp; reminders</h3>
        <p style="color:var(--light-text);font-size:14px;line-height:1.7;margin:0;">Set enrollment rules by group, role, or department. Reminders, deadlines, escalations, and certificate renewals all run automatically — cutting admin work by up to 70%.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon" style="background:var(--amber-bg);color:var(--amber);">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
        </div>
        <h3 style="font-size:16px;font-weight:800;margin:0 0 8px;">Compliance &amp; audit reports</h3>
        <p style="color:var(--light-text);font-size:14px;line-height:1.7;margin:0;">Real-time dashboards show completion rates and compliance gaps. Generate audit-ready reports filtered by group, program, or date range — one click, no spreadsheets.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon" style="background:var(--primary-light);color:var(--primary);">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
        </div>
        <h3 style="font-size:16px;font-weight:800;margin:0 0 8px;">Assessments &amp; certifications</h3>
        <p style="color:var(--light-text);font-size:14px;line-height:1.7;margin:0;">Quizzes, exams, scenario-based evaluations with automated scoring. Certificates generate on completion and renewal notices fire automatically when they expire.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon" style="background:var(--green-bg);color:var(--green);">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
        </div>
        <h3 style="font-size:16px;font-weight:800;margin:0 0 8px;">Learning paths &amp; ILT</h3>
        <p style="color:var(--light-text);font-size:14px;line-height:1.7;margin:0;">Chain courses into guided journeys by role or membership tier. Manage live sessions with Zoom and Teams sync, attendance tracking, and calendar integration.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon" style="background:var(--amber-bg);color:var(--amber);">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
        </div>
        <h3 style="font-size:16px;font-weight:800;margin:0 0 8px;">Integrations &amp; API</h3>
        <p style="color:var(--light-text);font-size:14px;line-height:1.7;margin:0;">Connects with Zoom, Teams, BambooHR, TalentHR, OpenSesame, Stripe, PayPal, and your AMS via custom API. Data flows without manual exports.</p>
      </div>
    </div>
  </div>
</section>


<!-- ═══════════════════ USE CASES ═══════════════════ -->
<section class="usecases-section" aria-label="Training use cases">
  <div class="container">
    <div class="text-center">
      <div class="section-label" style="display:inline-flex">Built for your world</div>
      <h2 class="section-title mx-auto">Purpose-built for the way you actually train</h2>
      <p class="section-desc mx-auto">MyPass works across industries and organization types — but we go especially deep for the verticals that need it most.</p>
    </div>
    <div class="usecase-grid reveal">
      <div class="usecase-card">
        <span class="usecase-tag assoc">Associations</span>
        <h3>LMS with native AMS integration</h3>
        <p>Associations run on their AMS. MyPass connects directly so member records, CE credits, renewal dates, and training completions stay in sync — automatically. No more exporting member lists, manually assigning courses, or reconciling data between two systems.</p>
        <ul class="uc-details">
          <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M20 6L9 17l-5-5"/></svg> Sync members and groups from your AMS</li>
          <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M20 6L9 17l-5-5"/></svg> Track and report CE/CPE credits automatically</li>
          <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M20 6L9 17l-5-5"/></svg> Automate certification renewals and reminders</li>
          <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M20 6L9 17l-5-5"/></svg> Custom branding for your association</li>
        </ul>
        <a class="usecase-link" href="/lms-for-associations/">Learn more <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M3 7h8m0 0L8 4m3 3L8 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
      </div>
      <div class="usecase-card">
        <span class="usecase-tag compliance">Compliance training</span>
        <h3>Audit-ready compliance programs that don't need babysitting</h3>
        <p>From OSHA and HIPAA to GDPR and internal policies — MyPass handles the full compliance lifecycle. Assign required training, track completions with time-stamped records, and pull audit reports on demand.</p>
        <ul class="uc-details">
          <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M20 6L9 17l-5-5"/></svg> Policy acknowledgments with digital signatures</li>
          <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M20 6L9 17l-5-5"/></svg> Automated deadline alerts and escalations</li>
          <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M20 6L9 17l-5-5"/></svg> Time-stamped completion records for auditors</li>
          <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M20 6L9 17l-5-5"/></svg> One-click audit report generation</li>
        </ul>
        <a class="usecase-link" href="/compliance-training/">Learn more <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M3 7h8m0 0L8 4m3 3L8 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
      </div>
      <div class="usecase-card">
        <span class="usecase-tag onboard">Onboarding</span>
        <h3>Structured onboarding that scales with your hiring</h3>
        <p>New hires get role-specific learning paths from day one — automatically assigned based on their department, location, or team. They progress through orientation, policy training, and assessments without manual management.</p>
        <ul class="uc-details">
          <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M20 6L9 17l-5-5"/></svg> Auto-assign learning paths by role and department</li>
          <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M20 6L9 17l-5-5"/></svg> Track first-90-day completion and readiness</li>
          <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M20 6L9 17l-5-5"/></svg> Mobile-friendly for remote and hybrid teams</li>
          <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M20 6L9 17l-5-5"/></svg> Manager dashboards for onboarding visibility</li>
        </ul>
        <a class="usecase-link" href="/onboard-training/">Learn more <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M3 7h8m0 0L8 4m3 3L8 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
      </div>
    </div>
  </div>
</section>


<!-- ═══════════════════ COMPARISON ═══════════════════ -->
<section class="compare-section" aria-label="MyPass LMS vs traditional LMS comparison">
  <div class="container">
    <div class="text-center">
      <div class="section-label" style="display:inline-flex">Why MyPass</div>
      <h2 class="section-title mx-auto">How MyPass compares to a traditional LMS</h2>
      <p class="section-desc mx-auto">Most LMS platforms were built to store content. MyPass was built to run your training program end-to-end — with far less manual work.</p>
    </div>
    <div class="compare-box reveal">
      <table>
        <thead><tr><th>Capability</th><th>Traditional LMS</th><th>MyPass LMS</th></tr></thead>
        <tbody>
          <tr><td>Course creation</td><td>Requires external authoring tools (Articulate, Captivate)</td><td>Built-in SCORM authoring + AI-assisted generation</td></tr>
          <tr><td>Content import</td><td>SCORM upload only — manual conversion needed</td><td>Upload PPT, PDF, video, SCORM — auto-converted</td></tr>
          <tr><td>User enrollment</td><td>Manual, one-by-one assignment</td><td>Auto-enroll by role, group, department, or region</td></tr>
          <tr><td>Reminders &amp; follow-ups</td><td>Manual emails, easy to forget</td><td>Automated sequences with escalation rules</td></tr>
          <tr><td>Compliance tracking</td><td>Spreadsheets and manual cross-referencing</td><td>Real-time dashboards with one-click audit reports</td></tr>
          <tr><td>Certificate management</td><td>Manual issuance, no renewal tracking</td><td>Auto-generated with expiration and renewal alerts</td></tr>
          <tr><td>Admin workload</td><td>5–10+ hours/week on LMS operations</td><td>Reduced by up to 70%</td></tr>
          <tr><td>ILT / live sessions</td><td>Separate tool (Zoom admin, calendar sync)</td><td>Built-in with Zoom/Teams sync and attendance</td></tr>
          <tr><td>Time to go live</td><td>Weeks to months with IT involvement</td><td>Same-day setup, no IT required</td></tr>
          <tr><td>Pricing</td><td>Per-seat — pay for unused licenses</td><td>Flexible tiers based on active learners</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>


<!-- ═══════════════════ FINAL CTA ═══════════════════ -->
<section class="cta-section">
  <div class="container">
    <div class="cta-box reveal">
      <h2>See how MyPass replaces busywork<br>with a training program that runs itself</h2>
      <p>Get a live walkthrough tailored to your organization. We'll show you how MyPass handles your specific use case — whether it's member training, compliance, onboarding, or all three. No pressure, no generic deck.</p>
      <div class="cta-actions">
        <a class="btn-primary" href="https://calendly.com/onlinesales-kprise/30min">Book a 30-Minute Demo</a>
        <a class="btn-outline-light" href="https://mypasslms.us/login#register">Start Free Trial</a>
      </div>
      <div class="cta-sub">90 days full access · 5,000 free credits · No credit card required</div>
    </div>
  </div>
</section>


<!-- Page-specific scripts -->
<script>
  // Testimonial carousel
  let tcIdx = 0;
  const tcSlides = document.querySelectorAll('.tc-slide');
  const tcDots = document.querySelectorAll('.tc-dot');
  function tcGo(i) {
    tcIdx = ((i % tcSlides.length) + tcSlides.length) % tcSlides.length;
    tcSlides.forEach(s => s.classList.remove('active'));
    tcDots.forEach(d => d.classList.remove('active'));
    tcSlides[tcIdx].classList.add('active');
    tcDots[tcIdx].classList.add('active');
  }
  function tcSlide(dir) { tcGo(tcIdx + dir); }
  let tcTimer = setInterval(() => tcSlide(1), 4000);
  document.querySelector('.tc-carousel').addEventListener('mouseenter', () => clearInterval(tcTimer));
  document.querySelector('.tc-carousel').addEventListener('mouseleave', () => { tcTimer = setInterval(() => tcSlide(1), 4000); });
</script>

@endsection
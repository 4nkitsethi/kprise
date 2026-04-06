<?php
/**
 * header.php — Shared header for all Kprise pages
 * 
 * USAGE: Before including this file, define these variables:
 * 
 *   $page_title       — (string) Full <title> tag content
 *   $page_description — (string) Meta description (max 160 chars)
 *   $page_canonical   — (string) Full canonical URL e.g. https://kprise.com/pricing/
 *   $page_slug        — (string) Current page slug for nav highlighting: 'home', 'pricing', 'associations'
 *   $page_schema      — (string|null) Optional JSON-LD schema block (raw JSON, no <script> wrapper)
 *   $page_css         — (string) Page-specific <style> block content (no <style> tags)
 *   $page_og_title    — (string|null) OG title override (falls back to $page_title)
 *   $page_og_image    — (string|null) OG image URL
 *   $page_updated     — (string) Last updated date in ISO format e.g. 2026-03-26
 *
 * Last updated: 2026-03-26 | Version 1.0
 */

if (!isset($page_title))       $page_title = 'MyPass LMS by Kprise — Training Management Platform';
if (!isset($page_description)) $page_description = 'MyPass LMS cuts admin work by 70%. Create courses from files, automate enrollments, track compliance — built for associations, enterprises, and growing teams.';
if (!isset($page_canonical))   $page_canonical = 'https://kprise.com/';
if (!isset($page_slug))        $page_slug = 'home';
if (!isset($page_schema))      $page_schema = null;
if (!isset($page_css))         $page_css = '';
if (!isset($page_og_title))    $page_og_title = $page_title;
if (!isset($page_og_image))    $page_og_image = 'https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/logo-color.png?fit=998%2C281&ssl=1';
if (!isset($page_updated))     $page_updated = '2026-03-26';

// Organization schema — injected on every page for GEO entity recognition
$org_schema = json_encode([
  "@context" => "https://schema.org",
  "@type" => "Organization",
  "name" => "Kprise",
  "alternateName" => "MyPass LMS",
  "url" => "https://kprise.com",
  "logo" => "https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/logo-color.png?fit=998%2C281&ssl=1",
  "description" => "MyPass LMS by Kprise is a training management platform that reduces LMS administration by up to 70% with automated enrollments, built-in SCORM authoring, compliance tracking, and AMS integration for associations.",
  "foundingDate" => "2020",
  "address" => [
    "@type" => "PostalAddress",
    "streetAddress" => "3905 National Drive, Suite 330",
    "addressLocality" => "Burtonsville",
    "addressRegion" => "MD",
    "postalCode" => "20866",
    "addressCountry" => "US"
  ],
  "contactPoint" => [
    "@type" => "ContactPoint",
    "telephone" => "+1-240-316-4903",
    "contactType" => "sales"
  ],
  "sameAs" => [
    "https://www.linkedin.com/company/kprise",
    "https://www.facebook.com/kprisellc/",
    "https://www.capterra.com/p/200742/MyPass-LMS/",
    "https://elearningindustry.com/directory/elearning-software/mypass-lms"
  ]
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

// SoftwareApplication schema — injected on every page for product entity recognition
$product_schema = json_encode([
  "@context" => "https://schema.org",
  "@type" => "SoftwareApplication",
  "name" => "MyPass LMS",
  "applicationCategory" => "BusinessApplication",
  "operatingSystem" => "Web",
  "url" => "https://kprise.com",
  "description" => "MyPass LMS is a training management platform built for associations, enterprises, and growing teams. Features include built-in SCORM authoring, AMS integration, automated enrollments, compliance tracking, CE/CPE credit management, and audit-ready reporting.",
  "offers" => [
    "@type" => "Offer",
    "price" => "79",
    "priceCurrency" => "USD",
    "priceValidUntil" => "2026-12-31",
    "description" => "Launch plan starting at $79/month for 1-40 active users. All core LMS features included."
  ],
  "aggregateRating" => [
    "@type" => "AggregateRating",
    "ratingValue" => "4.8",
    "ratingCount" => "45",
    "bestRating" => "5"
  ],
  "featureList" => "Built-in SCORM authoring, Automated enrollments, Compliance tracking, CE/CPE credit management, AMS integration, Learning paths, Assessment engine, ILT scheduling, Certificate management, API integrations"
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- SEO: Primary Meta -->
  <title><?php echo htmlspecialchars($page_title); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
  <link rel="canonical" href="<?php echo htmlspecialchars($page_canonical); ?>">
  
  <!-- SEO: Freshness signal for GEO -->
  <meta name="last-modified" content="<?php echo $page_updated; ?>">
  <meta name="article:modified_time" content="<?php echo $page_updated; ?>T00:00:00+00:00">
  
  <!-- SEO: Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo htmlspecialchars($page_og_title ?? $page_title); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
  <meta property="og:url" content="<?php echo htmlspecialchars($page_canonical); ?>">
  <meta property="og:image" content="<?php echo htmlspecialchars($page_og_image); ?>">
  <meta property="og:site_name" content="MyPass LMS by Kprise">
  
  <!-- SEO: Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo htmlspecialchars($page_og_title ?? $page_title); ?>">
  <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
  <meta name="twitter:image" content="<?php echo htmlspecialchars($page_og_image); ?>">
  
  <!-- GEO: Structured Data — Organization (every page) -->
  <script type="application/ld+json"><?php echo $org_schema; ?></script>
  
  <!-- GEO: Structured Data — Product (every page) -->
  <script type="application/ld+json"><?php echo $product_schema; ?></script>
  
  <?php if ($page_schema): ?>
  <!-- GEO: Page-Specific Structured Data -->
  <script type="application/ld+json"><?php echo $page_schema; ?></script>
  <?php endif; ?>
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <style>
    /* ═══════════════════════════════════════════════════
       SHARED DESIGN SYSTEM — Used by all pages
       ═══════════════════════════════════════════════════ */
    :root {
      --card: #ffffff;
      --text: #0f172a;
      --muted: #64748b;
      --light-text: #475569;
      --line: #e2e8f0;
      --bg-subtle: #f8fafc;
      --bg-tinted: #f1f5f9;
      --primary: #2563eb;
      --primary-dark: #1d4ed8;
      --primary-light: #eff6ff;
      --primary-border: #dbeafe;
      --shadow: 0 10px 30px rgba(15,23,42,.08);
      --shadow-lg: 0 20px 50px rgba(15,23,42,.10);
      --green: #047857;
      --green-bg: #ecfdf5;
      --green-border: #bbf7d0;
      --amber: #92400e;
      --amber-bg: #fffbeb;
      --amber-border: #fde68a;
      --red-bg: #fef2f2;
      --red: #dc2626;
      --red-border: #fecaca;
      --radius: 20px;
      --radius-sm: 14px;
      --radius-pill: 999px;
    }
    *, *::before, *::after { box-sizing: border-box; margin: 0; }
    body {
      font-family: 'Inter', -apple-system, sans-serif;
      background: #ffffff;
      color: var(--text);
      -webkit-font-smoothing: antialiased;
      overflow-x: hidden;
      line-height: 1.5;
    }
    img { max-width: 100%; height: auto; display: block; }
    a { text-decoration: none; color: inherit; }
    ul { list-style: none; padding: 0; }
    .container { width: min(1200px, calc(100% - 40px)); margin: 0 auto; }

    /* ── BUTTONS ── */
    .btn-primary {
      display: inline-flex; align-items: center; justify-content: center; gap: 8px;
      padding: 13px 26px; font-size: 14px; font-weight: 700; color: #fff;
      background: var(--primary); border: none; border-radius: var(--radius-sm);
      cursor: pointer; transition: background .15s, transform .1s; font-family: inherit;
    }
    .btn-primary:hover { background: var(--primary-dark); }
    .btn-primary:active { transform: scale(.98); }
    .btn-primary.lg { padding: 16px 34px; font-size: 15px; font-weight: 800; }
    .btn-outline {
      display: inline-flex; align-items: center; justify-content: center;
      padding: 16px 34px; font-size: 15px; font-weight: 800; color: var(--text);
      background: #fff; border: 2px solid var(--line); border-radius: var(--radius-sm);
      cursor: pointer; transition: border-color .15s; font-family: inherit;
    }
    .btn-outline:hover { border-color: #cbd5e1; }
    .btn-ghost {
      padding: 10px 18px; font-size: 14px; font-weight: 700; color: #334155;
      border-radius: var(--radius-sm); transition: background .15s;
    }
    .btn-ghost:hover { background: var(--bg-tinted); }

    /* ── HEADER ── */
    .site-header {
      position: sticky; top: 0; z-index: 100;
      background: rgba(255,255,255,.94);
      backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);
      border-bottom: 1px solid var(--line);
    }
    .header-inner {
      display: flex; align-items: center; justify-content: space-between; height: 68px;
    }
    .logo-link { display: flex; align-items: center; }
    .logo-img { height: 34px; width: auto; }
    .nav-desktop { display: flex; align-items: center; gap: 4px; }
    .nav-desktop a,
    .nav-desktop .nav-drop-trigger {
      padding: 8px 14px; font-size: 14px; font-weight: 600; color: var(--light-text);
      border-radius: 10px; transition: background .15s, color .15s; cursor: pointer;
      border: none; background: none; font-family: inherit;
    }
    .nav-desktop a:hover,
    .nav-desktop .nav-drop-trigger:hover { background: var(--bg-tinted); color: var(--text); }
    .nav-desktop a.active { color: var(--primary); font-weight: 700; }
    .nav-dropdown { position: relative; }
    .nav-drop-trigger { display: inline-flex; align-items: center; gap: 4px; }
    .nav-drop-trigger svg { transition: transform .2s; }
    .nav-dropdown:hover .nav-drop-trigger svg { transform: rotate(180deg); }
    .nav-drop-menu {
      position: absolute; top: calc(100% + 8px); left: 50%; transform: translateX(-50%) translateY(6px);
      background: #fff; border: 1px solid var(--line); border-radius: 16px;
      box-shadow: var(--shadow-lg); padding: 8px; min-width: 230px;
      opacity: 0; pointer-events: none; transition: opacity .2s, transform .2s;
    }
    .nav-dropdown:hover .nav-drop-menu {
      opacity: 1; pointer-events: all; transform: translateX(-50%) translateY(0);
    }
    .nav-drop-menu a {
      display: block; padding: 10px 14px; font-size: 14px; font-weight: 600;
      color: var(--light-text); border-radius: 10px;
    }
    .nav-drop-menu a:hover { background: var(--primary-light); color: var(--primary-dark); }
    .header-actions { display: flex; align-items: center; gap: 10px; }
    .nav-toggle {
      display: none; background: none; border: none; cursor: pointer; padding: 8px;
    }
    .nav-toggle span {
      display: block; width: 22px; height: 2px; background: var(--text);
      margin: 5px 0; border-radius: 2px;
    }

    /* ── MOBILE NAV ── */
    .mobile-nav {
      display: none; position: fixed; top: 68px; left: 0; right: 0; bottom: 0;
      background: #fff; z-index: 99; padding: 24px 20px; overflow-y: auto;
    }
    .mobile-nav.active { display: block; }
    .mobile-nav a { display: block; padding: 13px 0; font-size: 15px; font-weight: 700; color: var(--text); border-bottom: 1px solid #f1f5f9; }
    .mobile-nav .mob-cta {
      margin-top: 20px; display: block; text-align: center; padding: 15px;
      background: var(--primary); color: #fff; font-weight: 800; border-radius: var(--radius-sm);
    }

    /* ── SECTION PRIMITIVES ── */
    .section-label {
      display: inline-flex; align-items: center; gap: 8px; padding: 6px 12px;
      border: 1px solid var(--line); background: var(--bg-subtle); color: var(--muted);
      font-weight: 700; font-size: 12px; border-radius: var(--radius-pill);
      text-transform: uppercase; letter-spacing: .06em; margin-bottom: 16px;
    }
    .section-title {
      font-size: clamp(26px, 3.2vw, 36px); line-height: 1.15; margin: 0 0 14px;
      letter-spacing: -0.03em; font-weight: 800;
    }
    .section-desc {
      color: var(--light-text); font-size: 16px; line-height: 1.7; max-width: 620px;
    }
    .text-center { text-align: center; }
    .mx-auto { margin-left: auto; margin-right: auto; }
    /* Screen-reader only — visible to crawlers, invisible to users */
    .sr-only {
      position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px;
      overflow: hidden; clip: rect(0,0,0,0); white-space: nowrap; border: 0;
    }
    .eyebrow {
      display: inline-flex; align-items: center; gap: 8px; padding: 7px 14px;
      border: 1px solid var(--primary-border); background: var(--primary-light);
      color: var(--primary-dark); font-weight: 700; font-size: 13px;
      border-radius: var(--radius-pill); margin-bottom: 22px;
    }

    /* ── ANIMATIONS ── */
    .reveal { opacity: 0; transform: translateY(20px); transition: opacity .5s ease, transform .5s ease; }
    .reveal.visible { opacity: 1; transform: translateY(0); }

    /* ── RESPONSIVE BASE ── */
    @media (max-width: 1024px) {
      .nav-desktop { display: none; }
      .nav-toggle { display: block; }
    }
    @media (max-width: 640px) {
      .container { width: min(1200px, calc(100% - 24px)); }
    }

    /* ═══ PAGE-SPECIFIC STYLES ═══ */
    <?php echo $page_css; ?>
  </style>
</head>
<body>

<!-- GEO: Freshness signal visible to crawlers -->
<meta name="content-version" content="Version 1.0 — Updated <?php echo date('F Y', strtotime($page_updated)); ?>">

<!-- ═══════════════════ HEADER ═══════════════════ -->
<header class="site-header" role="banner">
  <div class="container header-inner">
    <a href="/" class="logo-link" aria-label="MyPass LMS by Kprise — Home">
      <img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/logo-color.png?fit=998%2C281&ssl=1"
           alt="MyPass LMS by Kprise — Training Management Platform" class="logo-img" width="170" height="48" loading="eager" />
    </a>

    <nav class="nav-desktop" role="navigation" aria-label="Main navigation">
      <div class="nav-dropdown">
        <button class="nav-drop-trigger" aria-expanded="false" aria-haspopup="true">Platform <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M3 5l3 3 3-3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg></button>
        <div class="nav-drop-menu" role="menu">
          <a href="/about-platform/" role="menuitem">Platform Overview</a>
          <a href="/lms-comparisons/" role="menuitem">LMS Comparisons</a>
          <a href="/about-us/" role="menuitem">About Kprise</a>
          <a href="/contact-us-2/" role="menuitem">Contact Us</a>
        </div>
      </div>
      <div class="nav-dropdown">
        <button class="nav-drop-trigger" aria-expanded="false" aria-haspopup="true">Solutions <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M3 5l3 3 3-3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg></button>
        <div class="nav-drop-menu" role="menu">
          <a href="/enterprise/" role="menuitem">Enterprise</a>
          <a href="/educational-institutions/" role="menuitem">Education</a>
          <a href="/lms-for-associations/" role="menuitem" <?php echo ($page_slug === 'associations') ? 'class="active"' : ''; ?>>Associations &amp; Non-Profits</a>
        </div>
      </div>
      <div class="nav-dropdown">
        <button class="nav-drop-trigger" aria-expanded="false" aria-haspopup="true">Use Cases <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M3 5l3 3 3-3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg></button>
        <div class="nav-drop-menu" role="menu">
          <a href="/onboard-training/" role="menuitem">Onboarding</a>
          <a href="/compliance-training/" role="menuitem">Compliance Training</a>
          <a href="/employee-training/" role="menuitem">Employee Training</a>
          <a href="/partner-training/" role="menuitem">Partner &amp; Channel</a>
          <a href="/sales-training/" role="menuitem">Sales Enablement</a>
          <a href="/cybersecurity-training/" role="menuitem">Cybersecurity</a>
        </div>
      </div>
      <a href="/pricing/" <?php echo ($page_slug === 'pricing') ? 'class="active"' : ''; ?>>Pricing</a>
      <div class="nav-dropdown">
        <button class="nav-drop-trigger" aria-expanded="false" aria-haspopup="true">Resources <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M3 5l3 3 3-3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg></button>
        <div class="nav-drop-menu" role="menu">
          <a href="/blog/" role="menuitem">Blog</a>
          <a href="/case-study/" role="menuitem">Case Studies</a>
          <a href="https://help.kprise.com/" role="menuitem">Help Center</a>
          <a href="/learning-insights-hub/" role="menuitem">Insights Hub</a>
          <a href="/admin-burnout-diagnostic/" role="menuitem">Admin Burnout Calculator</a>
        </div>
      </div>
    </nav>

    <div class="header-actions">
      <a class="btn-ghost" href="https://mypasslms.us/login">Sign In</a>
      <a class="btn-primary" href="https://calendly.com/onlinesales-kprise/30min">Book a Demo</a>
    </div>
    <button class="nav-toggle" onclick="document.getElementById('mobileNav').classList.toggle('active')" aria-label="Open menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<div id="mobileNav" class="mobile-nav" role="navigation" aria-label="Mobile navigation">
  <a href="/about-platform/">Platform Overview</a>
  <a href="/pricing/">Pricing</a>
  <a href="/enterprise/">Enterprise</a>
  <a href="/lms-for-associations/">Associations &amp; Non-Profits</a>
  <a href="/compliance-training/">Compliance Training</a>
  <a href="/onboard-training/">Onboarding</a>
  <a href="/employee-training/">Employee Training</a>
  <a href="/partner-training/">Partner Training</a>
  <a href="/lms-comparisons/">LMS Comparisons</a>
  <a href="/blog/">Blog</a>
  <a href="/case-study/">Case Studies</a>
  <a href="https://help.kprise.com/">Help Center</a>
  <a href="https://mypasslms.us/login">Sign In</a>
  <a class="mob-cta" href="https://calendly.com/onlinesales-kprise/30min">Book a Demo</a>
</div>


@yield('content')


<!-- ═══════════════════ FOOTER ═══════════════════ -->
<footer class="site-footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="/" class="logo-link" aria-label="MyPass LMS Home">
          <img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/logo-color.png?fit=998%2C281&ssl=1"
               alt="MyPass LMS by Kprise" class="logo-img" width="170" height="48" loading="lazy" />
        </a>
        <p>MyPass LMS is a training management platform that cuts admin work by up to 70%. Built for associations, enterprises, and growing teams — with AMS integration, automated enrollments, compliance tracking, and built-in SCORM authoring.</p>
        <div class="footer-contact" itemscope itemtype="https://schema.org/PostalAddress">
          <span itemprop="streetAddress">3905 National Drive, Suite 330</span><br>
          <span itemprop="addressLocality">Burtonsville</span>, <span itemprop="addressRegion">MD</span> <span itemprop="postalCode">20866</span><br>
          <a href="tel:+12403164903" itemprop="telephone">(240) 316-4903</a>
        </div>
      </div>
      <div class="footer-col">
        <h4>Platform</h4>
        <a href="/about-platform/">Overview</a>
        <a href="/pricing/">Pricing</a>
        <a href="/lms-comparisons/">Comparisons</a>
        <a href="/about-us/">About Kprise</a>
        <a href="/contact-us-2/">Contact Us</a>
      </div>
      <div class="footer-col">
        <h4>Use Cases</h4>
        <a href="/onboard-training/">Onboarding</a>
        <a href="/compliance-training/">Compliance</a>
        <a href="/employee-training/">Employee Training</a>
        <a href="/partner-training/">Partner Training</a>
        <a href="/sales-training/">Sales Enablement</a>
        <a href="/cybersecurity-training/">Cybersecurity</a>
      </div>
      <div class="footer-col">
        <h4>Solutions</h4>
        <a href="/enterprise/">Enterprise</a>
        <a href="/educational-institutions/">Education</a>
        <a href="/lms-for-associations/">Associations &amp; Non-Profits</a>
        <a href="/healthcare/">Healthcare</a>
        <a href="/manufacturing/">Manufacturing</a>
        <a href="/financial-services/">Financial Services</a>
      </div>
      <div class="footer-col">
        <h4>Resources</h4>
        <a href="/blog/">Blog</a>
        <a href="/case-study/">Case Studies</a>
        <a href="https://help.kprise.com/">Help Center</a>
        <a href="/learning-insights-hub/">Insights Hub</a>
        <a href="/admin-burnout-diagnostic/">Admin Burnout Calculator</a>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; <?php echo date('Y'); ?> Kprise Technologies. All rights reserved.</p>
      <div class="footer-bottom-links">
        <a href="/privacy-policy/">Privacy Policy</a>
        <a href="/terms-of-service/">Terms of Service</a>
      </div>
    </div>
  </div>
</footer>

<!-- Shared Scripts -->
<script>
  // Scroll reveal observer
  (function() {
    const reveals = document.querySelectorAll('.reveal');
    if (!reveals.length) return;
    const observer = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) entry.target.classList.add('visible');
      });
    }, { threshold: 0.1 });
    reveals.forEach(function(el) { observer.observe(el); });
  })();
</script>

<style>
  /* ── FOOTER STYLES ── */
  .site-footer { padding: 56px 0 32px; background: #fff; border-top: 1px solid var(--line); }
  .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 40px; }
  .footer-brand p { color: var(--muted); font-size: 14px; line-height: 1.65; max-width: 300px; margin-top: 12px; }
  .footer-brand .footer-contact { margin-top: 16px; font-size: 13px; color: var(--muted); line-height: 1.8; }
  .footer-brand .footer-contact a { color: var(--muted); }
  .footer-brand .footer-contact a:hover { color: var(--primary); }
  .footer-col h4 { font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: .06em; color: var(--light-text); margin: 0 0 14px; }
  .footer-col a { display: block; padding: 5px 0; font-size: 14px; color: var(--muted); transition: color .15s; }
  .footer-col a:hover { color: var(--primary); }
  .footer-bottom {
    border-top: 1px solid var(--line); padding-top: 24px;
    display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;
  }
  .footer-bottom p { font-size: 13px; color: var(--muted); }
  .footer-bottom-links { display: flex; gap: 20px; }
  .footer-bottom-links a { font-size: 13px; color: var(--muted); }
  .footer-bottom-links a:hover { color: var(--primary); }

  @media (max-width: 1024px) {
    .footer-grid { grid-template-columns: 1fr 1fr; gap: 32px; }
    .footer-brand { grid-column: 1 / -1; }
  }
  @media (max-width: 640px) {
    .footer-grid { grid-template-columns: 1fr; }
    .footer-bottom { flex-direction: column; text-align: center; }
  }
</style>

</body>
</html>

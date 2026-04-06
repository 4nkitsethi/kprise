<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>How to Build an Audit-Ready Compliance Training Program in 2026 | MyPass LMS Blog</title>
<meta name="description" content="Compliance audits don't have to be stressful. Learn how to set up automated tracking, digital acknowledgments, and one-click audit reports.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  :root{--card:#ffffff;--text:#0f172a;--muted:#64748b;--light-text:#475569;--line:#e2e8f0;--bg-subtle:#f8fafc;--bg-tinted:#f1f5f9;--primary:#2563eb;--primary-dark:#1d4ed8;--primary-light:#eff6ff;--primary-border:#dbeafe;--shadow:0 10px 30px rgba(15,23,42,.08);--shadow-lg:0 20px 50px rgba(15,23,42,.10);--green:#047857;--green-bg:#ecfdf5;--green-border:#bbf7d0;--amber:#92400e;--amber-bg:#fffbeb;--amber-border:#fde68a;--radius:20px;--radius-sm:14px;--radius-pill:999px}
  *,*::before,*::after{box-sizing:border-box;margin:0}
  body{font-family:'Inter',-apple-system,sans-serif;background:#fff;color:var(--text);-webkit-font-smoothing:antialiased;overflow-x:hidden;line-height:1.5}
  img{max-width:100%;height:auto;display:block}a{text-decoration:none;color:inherit}ul{list-style:none;padding:0}
  .container{width:min(1200px,calc(100% - 40px));margin:0 auto}
  .btn-primary{display:inline-flex;align-items:center;gap:8px;padding:13px 26px;font-size:14px;font-weight:700;color:#fff;background:var(--primary);border:none;border-radius:var(--radius-sm);cursor:pointer;transition:background .15s;font-family:inherit}
  .btn-primary:hover{background:var(--primary-dark)}
  .btn-ghost{padding:10px 18px;font-size:14px;font-weight:700;color:#334155;border-radius:var(--radius-sm);transition:background .15s}
  .btn-ghost:hover{background:var(--bg-tinted)}
  /* HEADER */
  .site-header{position:sticky;top:0;z-index:100;background:rgba(255,255,255,.94);backdrop-filter:blur(16px);border-bottom:1px solid var(--line)}
  .header-inner{display:flex;align-items:center;justify-content:space-between;height:68px}
  .logo-mark{display:flex;align-items:center;gap:10px}
  .logo-icon{width:32px;height:32px;background:var(--primary);border-radius:8px;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:14px}
  .logo-text{font-size:15px;font-weight:800;color:var(--text)}.logo-text span{color:var(--primary)}
  .nav-desktop{display:flex;align-items:center;gap:4px}
  .nav-desktop a,.nav-drop-trigger{padding:8px 14px;font-size:14px;font-weight:600;color:var(--light-text);border-radius:10px;transition:background .15s,color .15s;cursor:pointer;border:none;background:none;font-family:inherit}
  .nav-desktop a:hover,.nav-drop-trigger:hover{background:var(--bg-tinted);color:var(--text)}
  .nav-dropdown{position:relative}
  .nav-drop-trigger{display:inline-flex;align-items:center;gap:4px}
  .nav-drop-menu{position:absolute;top:calc(100% + 8px);left:50%;transform:translateX(-50%) translateY(6px);background:#fff;border:1px solid var(--line);border-radius:16px;box-shadow:var(--shadow-lg);padding:8px;min-width:220px;opacity:0;pointer-events:none;transition:opacity .2s,transform .2s}
  .nav-dropdown:hover .nav-drop-menu{opacity:1;pointer-events:all;transform:translateX(-50%) translateY(0)}
  .nav-drop-menu a{display:block;padding:10px 14px;font-size:14px;font-weight:600;color:var(--light-text);border-radius:10px}
  .nav-drop-menu a:hover{background:var(--primary-light);color:var(--primary-dark)}
  .header-actions{display:flex;align-items:center;gap:10px}
  .nav-toggle{display:none;background:none;border:none;cursor:pointer;padding:8px}
  .nav-toggle span{display:block;width:22px;height:2px;background:var(--text);margin:5px 0;border-radius:2px}
  .mobile-nav{display:none;position:fixed;top:68px;left:0;right:0;bottom:0;background:#fff;z-index:99;padding:24px 20px;overflow-y:auto}
  .mobile-nav.active{display:block}
  .mobile-nav a{display:block;padding:13px 0;font-size:15px;font-weight:700;color:var(--text);border-bottom:1px solid #f1f5f9}
  .mobile-nav .mob-cta{margin-top:20px;display:block;text-align:center;padding:15px;background:var(--primary);color:#fff;font-weight:800;border-radius:var(--radius-sm)}
  /* BREADCRUMB */
  .breadcrumb{padding:16px 0;display:flex;align-items:center;gap:8px;font-size:13px;color:var(--muted)}
  .breadcrumb a{color:var(--muted);transition:color .15s}.breadcrumb a:hover{color:var(--primary)}
  .breadcrumb-sep{color:var(--line)}
  /* ARTICLE HERO */
  .article-hero{background:linear-gradient(180deg,#fff 0%,var(--bg-subtle) 100%);padding:32px 0 0}
  .article-hero-inner{max-width:760px}
  .post-cat{display:inline-flex;padding:5px 12px;border-radius:var(--radius-pill);font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:.06em;margin-bottom:16px;background:var(--amber-bg);color:var(--amber)}
  .article-title{font-size:clamp(28px,4vw,44px);font-weight:800;line-height:1.1;letter-spacing:-.03em;margin-bottom:20px}
  .article-meta{display:flex;align-items:center;gap:16px;flex-wrap:wrap;padding:20px 0;border-top:1px solid var(--line);border-bottom:1px solid var(--line);margin-bottom:0}
  .meta-author{display:flex;align-items:center;gap:10px}
  .meta-avatar{width:40px;height:40px;border-radius:50%;background:var(--primary);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:13px;flex-shrink:0}
  .meta-author-name{font-size:14px;font-weight:700;color:var(--text)}
  .meta-author-role{font-size:13px;color:var(--muted)}
  .meta-divider{width:1px;height:32px;background:var(--line)}
  .meta-item{font-size:13px;color:var(--muted);font-weight:600}
  .meta-item strong{color:var(--text)}
  /* COVER */
  .article-cover{background:linear-gradient(135deg,#1e293b,#0f172a);border-radius:var(--radius);min-height:360px;position:relative;overflow:hidden;display:flex;align-items:flex-end;padding:36px;margin:36px 0 0}
  .cover-pattern{position:absolute;inset:0;opacity:.05;background-image:radial-gradient(circle,#fff 1px,transparent 1px);background-size:24px 24px}
  .cover-grid{position:absolute;inset:0;opacity:.03;background-image:linear-gradient(rgba(255,255,255,.5) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.5) 1px,transparent 1px);background-size:40px 40px}
  .cover-stat-row{display:flex;gap:24px;position:relative;z-index:1;flex-wrap:wrap}
  .cover-stat{background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);border-radius:12px;padding:16px 20px;text-align:center}
  .cover-stat .val{font-size:28px;font-weight:800;color:#fff;letter-spacing:-.03em}
  .cover-stat .val.blue{color:#60a5fa}.cover-stat .val.green{color:#34d399}.cover-stat .val.amber{color:#fbbf24}
  .cover-stat .lbl{font-size:11px;color:rgba(255,255,255,.4);font-weight:700;text-transform:uppercase;letter-spacing:.06em;margin-top:4px}
  /* LAYOUT */
  .article-layout{display:grid;grid-template-columns:1fr 300px;gap:56px;padding:48px 0 80px;align-items:start}
  /* ARTICLE BODY */
  .article-body{max-width:680px}
  .article-body p{font-size:16px;line-height:1.8;color:var(--light-text);margin-bottom:22px}
  .article-body h2{font-size:24px;font-weight:800;letter-spacing:-.02em;margin:36px 0 14px;color:var(--text)}
  .article-body h3{font-size:19px;font-weight:800;margin:28px 0 12px;color:var(--text)}
  .article-body ul{margin:0 0 22px;display:grid;gap:10px}
  .article-body ul li{padding-left:22px;position:relative;font-size:15px;line-height:1.7;color:var(--light-text)}
  .article-body ul li::before{content:'';position:absolute;left:0;top:10px;width:8px;height:8px;border-radius:50%;background:var(--primary)}
  .article-body ol{margin:0 0 22px;padding-left:20px;display:grid;gap:10px}
  .article-body ol li{font-size:15px;line-height:1.7;color:var(--light-text)}
  .article-body strong{color:var(--text);font-weight:700}
  .article-body a{color:var(--primary);font-weight:600}.article-body a:hover{text-decoration:underline}
  .callout{border-left:4px solid var(--primary);background:var(--primary-light);border-radius:0 var(--radius-sm) var(--radius-sm) 0;padding:20px 22px;margin:28px 0}
  .callout p{font-size:15px;color:var(--primary-dark);font-weight:600;margin:0;line-height:1.6}
  .callout.green{border-color:var(--green);background:var(--green-bg)}.callout.green p{color:var(--green)}
  .callout.amber{border-color:#d97706;background:var(--amber-bg)}.callout.amber p{color:var(--amber)}
  .step-box{background:#fff;border:1px solid var(--line);border-radius:var(--radius-sm);padding:22px;margin-bottom:16px;display:flex;gap:16px;align-items:flex-start;transition:box-shadow .2s}
  .step-box:hover{box-shadow:var(--shadow)}
  .step-num{width:36px;height:36px;border-radius:50%;background:var(--primary);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:15px;flex-shrink:0}
  .step-content h4{font-size:15px;font-weight:800;margin-bottom:6px}
  .step-content p{font-size:14px;color:var(--light-text);line-height:1.6;margin:0}
  .compare-inline{width:100%;border-collapse:collapse;margin:28px 0;border:1px solid var(--line);border-radius:var(--radius-sm);overflow:hidden}
  .compare-inline th{background:var(--bg-subtle);padding:12px 16px;font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--muted);text-align:left}
  .compare-inline td{padding:12px 16px;border-top:1px solid #f1f5f9;font-size:14px;color:var(--light-text)}
  .compare-inline td:first-child{font-weight:700;color:var(--text)}
  .compare-inline td.good{color:var(--green);font-weight:600}
  .compare-inline td.bad{color:#94a3b8}
  .article-tags{display:flex;gap:8px;flex-wrap:wrap;padding:28px 0;border-top:1px solid var(--line);margin-top:20px}
  .tag-pill{padding:6px 14px;border-radius:var(--radius-pill);border:1px solid var(--line);font-size:13px;font-weight:600;color:var(--muted);transition:all .15s}
  .tag-pill:hover{border-color:var(--primary);color:var(--primary);background:var(--primary-light)}
  /* AUTHOR BIO */
  .author-bio{background:var(--bg-subtle);border:1px solid var(--line);border-radius:var(--radius);padding:28px;margin-top:40px;display:flex;gap:20px;align-items:flex-start}
  .bio-avatar{width:56px;height:56px;border-radius:50%;background:var(--primary);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:18px;flex-shrink:0}
  .bio-name{font-weight:800;font-size:16px;margin-bottom:4px}
  .bio-role{font-size:13px;color:var(--muted);margin-bottom:10px}
  .bio-text{font-size:14px;color:var(--light-text);line-height:1.65}
  /* TOC */
  .toc-card{background:#fff;border:1px solid var(--line);border-radius:var(--radius);padding:22px;position:sticky;top:88px}
  .toc-card h4{font-size:13px;font-weight:800;text-transform:uppercase;letter-spacing:.06em;color:var(--muted);margin-bottom:14px}
  .toc-list{display:grid;gap:2px}
  .toc-link{display:block;padding:8px 10px;font-size:14px;font-weight:600;color:var(--muted);border-radius:8px;border-left:2px solid transparent;transition:all .15s}
  .toc-link:hover,.toc-link.active{color:var(--primary);border-left-color:var(--primary);background:var(--primary-light)}
  .sidebar-cta{background:var(--text);border-radius:var(--radius);padding:24px;margin-top:20px}
  .sidebar-cta p{color:rgba(255,255,255,.55);font-size:13px;margin-bottom:8px}
  .sidebar-cta h4{color:#fff;font-size:16px;font-weight:800;margin-bottom:10px}
  .sidebar-cta .sub{color:#94a3b8;font-size:13px;margin-bottom:16px}
  /* RELATED */
  .related-section{background:var(--bg-subtle);padding:56px 0 80px;border-top:1px solid var(--line)}
  .related-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px;margin-top:28px}
  .related-card{background:#fff;border:1px solid var(--line);border-radius:var(--radius);overflow:hidden;transition:box-shadow .2s,transform .2s}
  .related-card:hover{box-shadow:var(--shadow-lg);transform:translateY(-3px)}
  .related-thumb{height:140px;position:relative}
  .related-body{padding:18px}
  .related-title{font-size:15px;font-weight:800;line-height:1.35;margin-bottom:8px;color:var(--text)}
  .related-meta{font-size:12px;color:var(--muted)}
  /* FOOTER */
  .site-footer{padding:56px 0 32px;background:#fff;border-top:1px solid var(--line)}
  .footer-grid{display:grid;grid-template-columns:2fr 1fr 1fr 1fr 1fr;gap:40px;margin-bottom:40px}
  .footer-brand p{color:var(--muted);font-size:14px;line-height:1.65;max-width:300px;margin-top:12px}
  .footer-col h4{font-size:13px;font-weight:800;text-transform:uppercase;letter-spacing:.06em;color:var(--light-text);margin:0 0 14px}
  .footer-col a{display:block;padding:5px 0;font-size:14px;color:var(--muted);transition:color .15s}
  .footer-col a:hover{color:var(--primary)}
  .footer-bottom{border-top:1px solid var(--line);padding-top:24px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px}
  .footer-bottom p,.footer-bottom-links a{font-size:13px;color:var(--muted)}.footer-bottom-links{display:flex;gap:20px}.footer-bottom-links a:hover{color:var(--primary)}
  /* PROGRESS */
  .read-progress{position:fixed;top:0;left:0;height:3px;background:var(--primary);z-index:200;width:0%;transition:width .1s linear}
  @media(max-width:1024px){.nav-desktop{display:none}.nav-toggle{display:block}.article-layout{grid-template-columns:1fr}.toc-card{display:none}.related-grid{grid-template-columns:repeat(2,1fr)}.footer-grid{grid-template-columns:1fr 1fr;gap:32px}.footer-brand{grid-column:1/-1}}
  @media(max-width:640px){.article-title{font-size:28px}.cover-stat-row{gap:12px}.related-grid{grid-template-columns:1fr}.footer-grid{grid-template-columns:1fr}}
</style>
</head>
<body>
<div class="read-progress" id="readProgress"></div>

<!-- HEADER -->
<header class="site-header">
  <div class="container header-inner">
    <a href="/" class="logo-mark">
      <div class="logo-icon">M</div>
      <span class="logo-text"><span>MyPass</span> LMS</span>
    </a>
    <nav class="nav-desktop">
      <div class="nav-dropdown">
        <button class="nav-drop-trigger">Platform <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M3 5l3 3 3-3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg></button>
        <div class="nav-drop-menu"><a href="#">Platform Overview</a><a href="#">LMS Comparisons</a><a href="#">About Kprise</a></div>
      </div>
      <div class="nav-dropdown">
        <button class="nav-drop-trigger">Solutions <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M3 5l3 3 3-3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg></button>
        <div class="nav-drop-menu"><a href="#">Enterprise</a><a href="#">Associations</a><a href="#">Education</a></div>
      </div>
      <a href="#">Pricing</a>
      <div class="nav-dropdown">
        <button class="nav-drop-trigger" style="color:var(--primary);font-weight:800;">Resources <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M3 5l3 3 3-3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg></button>
        <div class="nav-drop-menu"><a href="blog.html" style="color:var(--primary);font-weight:800;">Blog</a><a href="case-study.html">Case Studies</a><a href="#">Help Center</a></div>
      </div>
    </nav>
    <div class="header-actions">
      <a class="btn-ghost" href="#">Sign In</a>
      <a class="btn-primary" href="#">Book a Demo</a>
    </div>
    <button class="nav-toggle" onclick="document.getElementById('mobileNav').classList.toggle('active')"><span></span><span></span><span></span></button>
  </div>
</header>
<div id="mobileNav" class="mobile-nav"><a href="#">Platform</a><a href="#">Pricing</a><a href="blog.html">Blog</a><a href="case-study.html">Case Studies</a><a class="mob-cta" href="#">Book a Demo</a></div>

<!-- BREADCRUMB -->
<div style="background:#fff;border-bottom:1px solid var(--line);">
  <div class="container">
    <div class="breadcrumb">
      <a href="/">Home</a><span class="breadcrumb-sep">›</span>
      <a href="blog.html">Blog</a><span class="breadcrumb-sep">›</span>
      <span style="color:var(--text);font-weight:600;">Compliance Training</span>
    </div>
  </div>
</div>

<!-- ARTICLE HERO -->
<section class="article-hero">
  <div class="container">
    <div class="article-hero-inner">
      <span class="post-cat">Compliance</span>
      <h1 class="article-title">{{ $post->title}}</h1>
      <div class="article-meta">
        <div class="meta-author">
          <div class="meta-avatar">JR</div>
          <div><div class="meta-author-name">Jessica Reyes</div><div class="meta-author-role">Head of Content, Kprise</div></div>
        </div>
        <div class="meta-divider"></div>
        <div class="meta-item"><strong>March 28, 2026</strong></div>
        <div class="meta-divider"></div>
        <div class="meta-item">8 min read</div>
        <div class="meta-divider"></div>
        <div class="meta-item" style="display:flex;align-items:center;gap:4px;">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          3.2k views
        </div>
      </div>
    </div>
    <div class="article-cover">
      <div class="cover-pattern"></div>
      <div class="cover-grid"></div>
      <div class="cover-stat-row">
        <div class="cover-stat"><div class="val blue">70%</div><div class="lbl">Admin time saved</div></div>
        <div class="cover-stat"><div class="val green">1-click</div><div class="lbl">Audit reports</div></div>
        <div class="cover-stat"><div class="val amber">+35%</div><div class="lbl">Compliance rates</div></div>
        <div class="cover-stat"><div class="val" style="color:#a78bfa;">Zero</div><div class="lbl">Spreadsheets needed</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ARTICLE LAYOUT -->
<div class="container">
  <div class="article-layout">

    <!-- BODY -->
    <article class="article-body" id="articleBody">
      

  {!! html_entity_decode($post['content']) !!}
  

    </article>

    <!-- SIDEBAR -->
    <aside>
      <div class="toc-card">
        <h4>In this article</h4>
        <div class="toc-list">
          <a class="toc-link active" href="#why-fails">Why most programs fail audits</a>
          <a class="toc-link" href="#framework">The 5-layer framework</a>
          <a class="toc-link" href="#digital-trail">Building an audit trail</a>
          <a class="toc-link" href="#renewals">Handling renewals automatically</a>
          <a class="toc-link" href="#reporting">Generating the audit report</a>
          <a class="toc-link" href="#checklist">Quick-start checklist</a>
        </div>
      </div>

      <div class="sidebar-cta">
        <p>WANT TO SEE THIS IN ACTION?</p>
        <h4>See compliance automation live</h4>
        <div class="sub">We'll show you the exact setup — dashboards, audit reports, and automation — in 30 minutes.</div>
        <a class="btn-primary" href="#" style="width:100%;justify-content:center;">Book a Demo →</a>
      </div>

      <div style="background:#fff;border:1px solid var(--line);border-radius:var(--radius);padding:22px;margin-top:20px;">
        <h4 style="font-size:14px;font-weight:800;margin-bottom:4px;">Share this article</h4>
        <p style="font-size:13px;color:var(--muted);margin-bottom:14px;">Found it useful? Pass it on.</p>
        <div style="display:flex;gap:8px;">
          <button style="flex:1;padding:10px;border:1px solid var(--line);border-radius:10px;background:#fff;font-size:13px;font-weight:700;cursor:pointer;color:var(--muted);font-family:inherit;">LinkedIn</button>
          <button style="flex:1;padding:10px;border:1px solid var(--line);border-radius:10px;background:#fff;font-size:13px;font-weight:700;cursor:pointer;color:var(--muted);font-family:inherit;">Copy link</button>
        </div>
      </div>
    </aside>
  </div>
</div>

<!-- RELATED -->
<section class="related-section">
  <div class="container">
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:28px;">
      <div>
        <div style="font-size:12px;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:var(--muted);margin-bottom:8px;">Keep reading</div>
        <h2 style="font-size:24px;font-weight:800;letter-spacing:-.02em;">Related articles</h2>
      </div>
      <a href="blog.html" style="font-size:14px;font-weight:700;color:var(--primary);display:flex;align-items:center;gap:6px;">View all posts <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M3 7h8m0 0L8 4m3 3L8 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
    </div>
    <div class="related-grid">
      <a href="#" class="related-card">
        <div class="related-thumb" style="background:linear-gradient(135deg,#78350f,#d97706);"></div>
        <div class="related-body">
          <span style="display:inline-block;padding:3px 10px;border-radius:999px;font-size:11px;font-weight:800;text-transform:uppercase;background:var(--amber-bg);color:var(--amber);margin-bottom:8px;">Compliance</span>
          <div class="related-title">HIPAA Training Requirements in 2026: What Healthcare Orgs Need to Know</div>
          <div class="related-meta">Mar 5, 2026 · 9 min read</div>
        </div>
      </a>
      <a href="#" class="related-card">
        <div class="related-thumb" style="background:linear-gradient(135deg,#7f1d1d,#dc2626);"></div>
        <div class="related-body">
          <span style="display:inline-block;padding:3px 10px;border-radius:999px;font-size:11px;font-weight:800;text-transform:uppercase;background:#fef2f2;color:#dc2626;margin-bottom:8px;">Admin Guides</span>
          <div class="related-title">The 5 Reports Every Training Manager Should Pull Each Month</div>
          <div class="related-meta">Mar 10, 2026 · 4 min read</div>
        </div>
      </a>
      <a href="#" class="related-card">
        <div class="related-thumb" style="background:linear-gradient(135deg,#1e3a5f,#2563eb);"></div>
        <div class="related-body">
          <span style="display:inline-block;padding:3px 10px;border-radius:999px;font-size:11px;font-weight:800;text-transform:uppercase;background:var(--primary-light);color:var(--primary-dark);margin-bottom:8px;">Associations</span>
          <div class="related-title">AMS + LMS Integration: The Complete Guide for Associations</div>
          <div class="related-meta">Mar 24, 2026 · 6 min read</div>
        </div>
      </a>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <div class="logo-mark"><div class="logo-icon">M</div><span class="logo-text"><span>MyPass</span> LMS</span></div>
        <p>MyPass LMS is a training management platform that cuts admin work by up to 70%.</p>
        <div class="footer-contact">3905 National Drive, Suite 330<br>Burtonsville, MD 20866</div>
      </div>
      <div class="footer-col"><h4>Platform</h4><a href="#">Overview</a><a href="#">Pricing</a><a href="#">Comparisons</a></div>
      <div class="footer-col"><h4>Use Cases</h4><a href="#">Onboarding</a><a href="#">Compliance</a><a href="#">Employee Training</a></div>
      <div class="footer-col"><h4>Solutions</h4><a href="#">Enterprise</a><a href="#">Associations</a><a href="#">Healthcare</a></div>
      <div class="footer-col"><h4>Resources</h4><a href="blog.html" style="color:var(--primary);font-weight:700;">Blog</a><a href="case-study.html">Case Studies</a><a href="#">Help Center</a></div>
    </div>
    <div class="footer-bottom">
      <p>© 2026 Kprise Technologies. All rights reserved.</p>
      <div class="footer-bottom-links"><a href="#">Privacy Policy</a><a href="#">Terms of Service</a></div>
    </div>
  </div>
</footer>

<script>
  // Reading progress bar
  window.addEventListener('scroll',()=>{
    const art=document.getElementById('articleBody');
    if(!art)return;
    const rect=art.getBoundingClientRect();
    const total=art.offsetHeight;
    const scrolled=Math.max(0,-rect.top);
    const pct=Math.min(100,Math.round((scrolled/total)*100));
    document.getElementById('readProgress').style.width=pct+'%';
  });
  // TOC active state
  const tocLinks=document.querySelectorAll('.toc-link');
  window.addEventListener('scroll',()=>{
    let active='';
    ['why-fails','framework','digital-trail','renewals','reporting','checklist'].forEach(id=>{
      const el=document.getElementById(id);
      if(el&&el.getBoundingClientRect().top<120)active=id;
    });
    tocLinks.forEach(l=>{l.classList.toggle('active',l.getAttribute('href')==='#'+active)});
  });
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Blog — LMS Insights, Training Tips & Best Practices | MyPass LMS</title>
<meta name="description" content="Explore the MyPass LMS blog for expert guides on LMS administration, compliance training, association management, and learning & development best practices.">
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
  .nav-desktop a.active{color:var(--primary);font-weight:700}
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
  /* PAGE */
  .page-hero{padding:60px 0 48px;background:linear-gradient(180deg,#fff 0%,var(--bg-subtle) 100%)}
  .section-label{display:inline-flex;align-items:center;gap:8px;padding:6px 12px;border:1px solid var(--line);background:var(--bg-subtle);color:var(--muted);font-weight:700;font-size:12px;border-radius:var(--radius-pill);text-transform:uppercase;letter-spacing:.06em;margin-bottom:16px}
  /* FILTER BAR */
  .filter-bar{padding:24px 0;border-bottom:1px solid var(--line);background:#fff;position:sticky;top:68px;z-index:50}
  .filter-inner{display:flex;align-items:center;gap:12px;flex-wrap:wrap}
  .filter-btn{padding:8px 16px;font-size:13px;font-weight:700;border-radius:var(--radius-pill);border:1px solid var(--line);background:#fff;color:var(--muted);cursor:pointer;font-family:inherit;transition:all .15s}
  .filter-btn:hover{border-color:#cbd5e1;color:var(--text)}
  .filter-btn.active{background:var(--primary);color:#fff;border-color:var(--primary)}
  .filter-count{margin-left:auto;font-size:13px;color:var(--muted);font-weight:600}
  /* FEATURED */
  .featured-post{display:grid;grid-template-columns:1fr 1fr;gap:0;background:#fff;border:1px solid var(--line);border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden;margin-bottom:48px;transition:box-shadow .2s}
  .featured-post:hover{box-shadow:var(--shadow-lg)}
  .featured-thumb{background:linear-gradient(135deg,#1e293b 0%,#0f172a 100%);position:relative;min-height:340px;display:flex;flex-direction:column;justify-content:flex-end;padding:32px}
  .thumb-pattern{position:absolute;inset:0;opacity:.06;background-image:radial-gradient(circle,#fff 1px,transparent 1px);background-size:24px 24px}
  .thumb-cat{display:inline-flex;padding:6px 12px;border-radius:var(--radius-pill);font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:.06em;margin-bottom:16px;position:relative;z-index:1}
  .thumb-cat.compliance{background:var(--amber-bg);color:var(--amber)}
  .thumb-cat.associations{background:var(--primary-light);color:var(--primary-dark)}
  .thumb-cat.onboarding{background:var(--green-bg);color:var(--green)}
  .thumb-cat.lms{background:#f3e8ff;color:#7c3aed}
  .thumb-cat.admin{background:#fef2f2;color:#dc2626}
  .thumb-title{font-size:22px;font-weight:800;color:#fff;line-height:1.3;position:relative;z-index:1}
  .featured-body{padding:36px}
  .featured-meta{display:flex;align-items:center;gap:8px;font-size:13px;color:var(--muted);margin-bottom:16px}
  .meta-dot{width:3px;height:3px;border-radius:50%;background:var(--line)}
  .featured-excerpt{font-size:15px;line-height:1.75;color:var(--light-text);margin-bottom:24px}
  .featured-author{display:flex;align-items:center;gap:12px;padding-top:20px;border-top:1px solid var(--line);margin-top:auto}
  .author-avatar{width:36px;height:36px;border-radius:50%;background:var(--primary);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:13px;flex-shrink:0}
  .author-name{font-size:14px;font-weight:700;color:var(--text)}
  .author-role{font-size:12px;color:var(--muted)}
  .read-link{display:inline-flex;align-items:center;gap:6px;font-size:14px;font-weight:700;color:var(--primary);transition:gap .15s}
  .read-link:hover{gap:10px}
  /* GRID */
  .blog-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px}
  .blog-card{background:#fff;border:1px solid var(--line);border-radius:var(--radius);overflow:hidden;display:flex;flex-direction:column;transition:box-shadow .2s,transform .2s}
  .blog-card:hover{box-shadow:var(--shadow-lg);transform:translateY(-3px)}
  .card-thumb{height:180px;position:relative;display:flex;flex-direction:column;justify-content:flex-end;padding:18px}
  .card-thumb-bg{position:absolute;inset:0}
  .card-body{padding:22px;display:flex;flex-direction:column;flex:1}
  .card-meta{display:flex;align-items:center;gap:8px;font-size:12px;color:var(--muted);margin-bottom:10px}
  .card-title{font-size:17px;font-weight:800;line-height:1.3;margin-bottom:10px;color:var(--text)}
  .card-excerpt{font-size:14px;line-height:1.7;color:var(--light-text);flex:1;margin-bottom:16px}
  .card-footer{display:flex;align-items:center;justify-content:space-between;padding-top:14px;border-top:1px solid var(--line);margin-top:auto}
  .card-author{display:flex;align-items:center;gap:8px}
  .card-avatar{width:28px;height:28px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:800;color:#fff;flex-shrink:0}
  .card-author-name{font-size:13px;font-weight:700;color:var(--text)}
  /* SIDEBAR / NEWSLETTER */
  .blog-layout{display:grid;grid-template-columns:1fr 320px;gap:40px;align-items:start}
  .sidebar-card{background:#fff;border:1px solid var(--line);border-radius:var(--radius);padding:24px;margin-bottom:20px}
  .sidebar-card h3{font-size:16px;font-weight:800;margin-bottom:4px}
  .sidebar-card p{font-size:14px;color:var(--muted);line-height:1.6;margin-bottom:16px}
  .sidebar-input{width:100%;padding:12px 14px;border:1px solid var(--line);border-radius:var(--radius-sm);font-size:14px;font-family:inherit;outline:none;margin-bottom:10px}
  .sidebar-input:focus{border-color:var(--primary);box-shadow:0 0 0 3px var(--primary-light)}
  .sidebar-topics{display:flex;flex-wrap:wrap;gap:8px}
  .topic-pill{padding:6px 12px;border-radius:var(--radius-pill);border:1px solid var(--line);font-size:13px;font-weight:600;color:var(--muted);cursor:pointer;transition:all .15s}
  .topic-pill:hover{border-color:var(--primary);color:var(--primary);background:var(--primary-light)}
  .popular-post{display:flex;gap:12px;padding:12px 0;border-bottom:1px solid var(--line)}
  .popular-post:last-child{border-bottom:none}
  .popular-num{font-size:24px;font-weight:800;color:var(--line);flex-shrink:0;width:28px}
  .popular-title{font-size:14px;font-weight:700;line-height:1.4;color:var(--text)}
  .popular-meta{font-size:12px;color:var(--muted);margin-top:4px}
  /* PAGINATION */
  .pagination{display:flex;align-items:center;justify-content:center;gap:8px;padding:48px 0 64px}
  .pg-btn{width:40px;height:40px;border-radius:10px;border:1px solid var(--line);background:#fff;display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:700;color:var(--muted);cursor:pointer;transition:all .15s}
  .pg-btn:hover{border-color:#cbd5e1;color:var(--text)}
  .pg-btn.active{background:var(--primary);color:#fff;border-color:var(--primary)}
  
</style>
</head>
<body>

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
        <div class="nav-drop-menu">
          <a href="#">Platform Overview</a><a href="#">LMS Comparisons</a><a href="#">About Kprise</a><a href="#">Contact Us</a>
        </div>
      </div>
      <div class="nav-dropdown">
        <button class="nav-drop-trigger">Solutions <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M3 5l3 3 3-3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg></button>
        <div class="nav-drop-menu">
          <a href="#">Enterprise</a><a href="#">Education</a><a href="#">Associations &amp; Non-Profits</a>
        </div>
      </div>
      <div class="nav-dropdown">
        <button class="nav-drop-trigger">Use Cases <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M3 5l3 3 3-3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg></button>
        <div class="nav-drop-menu">
          <a href="#">Onboarding</a><a href="#">Compliance Training</a><a href="#">Employee Training</a><a href="#">Partner &amp; Channel</a><a href="#">Sales Enablement</a>
        </div>
      </div>
      <a href="#">Pricing</a>
      <div class="nav-dropdown">
        <button class="nav-drop-trigger" style="color:var(--primary);font-weight:800;">Resources <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M3 5l3 3 3-3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg></button>
        <div class="nav-drop-menu">
          <a href="#" style="color:var(--primary);font-weight:800;">Blog</a><a href="#">Case Studies</a><a href="#">Help Center</a><a href="#">Insights Hub</a>
        </div>
      </div>
    </nav>
    <div class="header-actions">
      <a class="btn-ghost" href="#">Sign In</a>
      <a class="btn-primary" href="#">Book a Demo</a>
    </div>
    <button class="nav-toggle" onclick="document.getElementById('mobileNav').classList.toggle('active')"><span></span><span></span><span></span></button>
  </div>
</header>
<div id="mobileNav" class="mobile-nav">
  <a href="#">Platform Overview</a><a href="#">Pricing</a><a href="#">Enterprise</a><a href="#">Associations</a><a href="#">Blog</a><a href="#">Case Studies</a>
  <a class="mob-cta" href="#">Book a Demo</a>
</div>

<!-- HERO -->
<section class="page-hero">
  <div class="container">
    <div class="section-label">Resources</div>
    <h1 style="font-size:clamp(32px,4.5vw,52px);font-weight:800;letter-spacing:-.03em;line-height:1.08;margin-bottom:14px;">The MyPass LMS Blog</h1>
    <p style="font-size:17px;color:var(--light-text);max-width:600px;line-height:1.7;">Practical guides, best practices, and insights for training managers, L&D teams, associations, and compliance professionals.</p>
  </div>
</section>

<!-- FILTER BAR -->
<div class="filter-bar">
  <div class="container">
    <div class="filter-inner">
      <button class="filter-btn active">All Posts</button>
      <button class="filter-btn">Compliance</button>
      <button class="filter-btn">Associations</button>
      <button class="filter-btn">Onboarding</button>
      <button class="filter-btn">LMS Tips</button>
      <button class="filter-btn">Admin Guides</button>
      <button class="filter-btn">Product Updates</button>
      <span class="filter-count">24 articles</span>
    </div>
  </div>
</div>

<!-- MAIN CONTENT -->
<section style="padding:48px 0 0;">
  <div class="container">
    <div class="blog-layout">
      <!-- LEFT: Posts -->
      <div>
        <!-- Featured -->
        <a href="blog-detail.html" class="featured-post">
          <div class="featured-thumb">
            <div class="thumb-pattern"></div>
            <span class="thumb-cat compliance">Compliance</span>
            <div class="thumb-title">How to Build an Audit-Ready Compliance Training Program in 2026</div>
          </div>
          <div class="featured-body" style="display:flex;flex-direction:column;">
            <div class="featured-meta">
              <span>March 28, 2026</span><span class="meta-dot"></span><span>8 min read</span><span class="meta-dot"></span><span style="background:var(--amber-bg);color:var(--amber);padding:2px 8px;border-radius:4px;font-size:11px;font-weight:700;">FEATURED</span>
            </div>
            <p class="featured-excerpt">Compliance audits can be stressful — but they don't have to be. We break down exactly how to set up automated tracking, digital acknowledgments, and one-click audit reports so your program runs without manual babysitting.</p>
            <div style="margin-top:auto">
              <span class="read-link">Read article <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M3 7h8m0 0L8 4m3 3L8 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            </div>
            <div class="featured-author" style="margin-top:20px;">
              <div class="author-avatar">JR</div>
              <div><div class="author-name">Jessica Reyes</div><div class="author-role">Head of Content, Kprise</div></div>
            </div>
          </div>
        </a>

        <!-- Grid -->
        <div class="blog-grid">

         @foreach($posts as $post)

          <a href="{{ route('blog.detail', $post['slug']) }}" class="blog-card">
            <div class="card-thumb" style="background:linear-gradient(135deg,#1e3a5f,#2563eb);">
              <div style="position:absolute;inset:0;opacity:.08;background-image:radial-gradient(circle,#fff 1px,transparent 1px);background-size:20px 20px;"></div>
              <span class="thumb-cat associations" style="position:relative;z-index:1;">Associations</span>
            </div>
            <div class="card-body">
              <div class="card-meta"><span>Mar 24, 2026</span><span class="meta-dot" style="width:3px;height:3px;border-radius:50%;background:var(--line);"></span><span>6 min read</span></div>
              <div class="card-title">{{ $post['title'] }}</div>
              <div class="card-excerpt">A step-by-step breakdown of how to connect your AMS to MyPass LMS — syncing members, CE credits, and renewal data without manual exports.</div>
              <div class="card-footer">
                <div class="card-author"><div class="card-avatar" style="background:#2563eb;">MK</div><div class="card-author-name">Mark Kim</div></div>
                <span class="read-link" style="font-size:13px;">Read <svg width="12" height="12" viewBox="0 0 14 14" fill="none"><path d="M3 7h8m0 0L8 4m3 3L8 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
              </div>
            </div>
          </a>

          @endforeach

        </div>

        <!-- Pagination -->
        <!-- <div class="pagination">
          <button class="pg-btn">←</button>
          <button class="pg-btn active">1</button>
          <button class="pg-btn">2</button>
          <button class="pg-btn">3</button>
          <span style="color:var(--muted);font-size:14px;">…</span>
          <button class="pg-btn">8</button>
          <button class="pg-btn">→</button>
        </div> -->
      </div>

      <!-- SIDEBAR -->
      <aside class="sidebar">
        <!-- Newsletter -->
        <div class="sidebar-card" style="background:linear-gradient(135deg,var(--primary-light),#fff);border-color:var(--primary-border);">
          <div style="font-size:24px;margin-bottom:12px;">📬</div>
          <h3>Get the weekly digest</h3>
          <p>Best training articles, LMS tips, and compliance updates — delivered every Tuesday.</p>
          <input class="sidebar-input" type="email" placeholder="your@email.com">
          <button class="btn-primary" style="width:100%;justify-content:center;">Subscribe →</button>
          <p style="font-size:12px;color:var(--muted);margin-top:8px;text-align:center;">No spam. Unsubscribe anytime.</p>
        </div>

        <!-- Topics -->
        <div class="sidebar-card">
          <h3 style="margin-bottom:12px;">Browse by topic</h3>
          <div class="sidebar-topics">
            <span class="topic-pill">Compliance</span>
            <span class="topic-pill">Associations</span>
            <span class="topic-pill">Onboarding</span>
            <span class="topic-pill">SCORM</span>
            <span class="topic-pill">Reporting</span>
            <span class="topic-pill">Certifications</span>
            <span class="topic-pill">AMS</span>
            <span class="topic-pill">LMS Admin</span>
            <span class="topic-pill">Product</span>
          </div>
        </div>

        <!-- Popular -->
        <div class="sidebar-card">
          <h3 style="margin-bottom:16px;">Most popular</h3>
          <div class="popular-post">
            <div class="popular-num">01</div>
            <div><div class="popular-title">7 Signs Your LMS Is Costing You More Than It's Worth</div><div class="popular-meta">12.4k views</div></div>
          </div>
          <div class="popular-post">
            <div class="popular-num">02</div>
            <div><div class="popular-title">The OSHA Training Checklist Most Companies Get Wrong</div><div class="popular-meta">9.8k views</div></div>
          </div>
          <div class="popular-post">
            <div class="popular-num">03</div>
            <div><div class="popular-title">CE Credit Tracking: A Guide for Association Admins</div><div class="popular-meta">8.1k views</div></div>
          </div>
          <div class="popular-post">
            <div class="popular-num">04</div>
            <div><div class="popular-title">How to Write an Effective Online Training Module</div><div class="popular-meta">6.5k views</div></div>
          </div>
        </div>

        <!-- CTA Card -->
        <div class="sidebar-card" style="background:var(--text);border-color:transparent;">
          <p style="color:rgba(255,255,255,.6);font-size:13px;margin-bottom:8px;">READY TO SEE IT?</p>
          <h3 style="color:#fff;margin-bottom:10px;">See MyPass in action</h3>
          <p style="color:#94a3b8;font-size:14px;margin-bottom:16px;">30-minute live walkthrough tailored to your org.</p>
          <a class="btn-primary" href="#" style="width:100%;justify-content:center;">Book a Demo →</a>
        </div>
      </aside>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <div class="logo-mark"><div class="logo-icon">M</div><span class="logo-text"><span>MyPass</span> LMS</span></div>
        <p>MyPass LMS is a training management platform that cuts admin work by up to 70%. Built for associations, enterprises, and growing teams.</p>
        <div class="footer-contact">3905 National Drive, Suite 330<br>Burtonsville, MD 20866<br><a href="tel:+12403164903">(240) 316-4903</a></div>
      </div>
      <div class="footer-col"><h4>Platform</h4><a href="#">Overview</a><a href="#">Pricing</a><a href="#">Comparisons</a><a href="#">About Kprise</a><a href="#">Contact Us</a></div>
      <div class="footer-col"><h4>Use Cases</h4><a href="#">Onboarding</a><a href="#">Compliance</a><a href="#">Employee Training</a><a href="#">Partner Training</a><a href="#">Sales Enablement</a></div>
      <div class="footer-col"><h4>Solutions</h4><a href="#">Enterprise</a><a href="#">Education</a><a href="#">Associations</a><a href="#">Healthcare</a><a href="#">Manufacturing</a></div>
      <div class="footer-col"><h4>Resources</h4><a href="#" style="color:var(--primary);font-weight:700;">Blog</a><a href="#">Case Studies</a><a href="#">Help Center</a><a href="#">Insights Hub</a></div>
    </div>
    <div class="footer-bottom">
      <p>© 2026 Kprise Technologies. All rights reserved.</p>
      <div class="footer-bottom-links"><a href="#">Privacy Policy</a><a href="#">Terms of Service</a></div>
    </div>
  </div>
</footer>

<script>
  document.querySelectorAll('.filter-btn').forEach(btn=>{
    btn.addEventListener('click',()=>{document.querySelectorAll('.filter-btn').forEach(b=>b.classList.remove('active'));btn.classList.add('active')});
  });
</script>
</body>
</html>
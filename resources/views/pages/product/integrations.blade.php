@extends('layouts.app')

@push('styles')
   <style>
    *,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
:root{
  --b:#4220C8;--bd:#2D1490;--bm:#7B5EEA;
  --bl:#EEE9FF;--bl2:#F5F2FF;
  --bg:#F8F8FB;--w:#FFFFFF;
  --ink:#0F0C1F;--ink2:#27224A;--ink3:#524D72;--ink4:#9B96B0;
  --ok:#16A34A;--ok2:#DCFCE7;
  --bdr:rgba(66,32,200,0.08);--bdr2:rgba(66,32,200,0.16);
  --sh:0 1px 3px rgba(66,32,200,0.04),0 4px 14px rgba(66,32,200,0.06);
  --sh2:0 4px 14px rgba(66,32,200,0.08),0 12px 32px rgba(66,32,200,0.08);
  --sh3:0 8px 24px rgba(66,32,200,0.1),0 20px 48px rgba(66,32,200,0.1);
  --gr:linear-gradient(135deg,var(--b),var(--bd));
  --rad:16px;
}
html{scroll-behavior:smooth;}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--bg);color:var(--ink);line-height:1.65;-webkit-font-smoothing:antialiased;overflow-x:hidden;}
img{max-width:100%;display:block;}
a{color:inherit;text-decoration:none;}

/* NAV */
.nav{position:sticky;top:0;z-index:200;height:64px;padding:0 48px;background:rgba(255,255,255,0.97);backdrop-filter:blur(20px);border-bottom:1px solid var(--bdr);display:flex;align-items:center;justify-content:space-between;}
.logo img{height:30px;width:auto;}
.nav-links{display:flex;gap:2px;list-style:none;}
.nav-links a{font-size:13.5px;font-weight:600;color:var(--ink3);padding:6px 10px;border-radius:7px;transition:all .16s;}
.nav-links a:hover,.nav-links a.act{color:var(--b);background:var(--bl2);}
.nav-cta{display:flex;gap:8px;align-items:center;}
.btn-ghost{font-size:13px;font-weight:600;padding:7px 15px;border:1.5px solid var(--bdr2);border-radius:8px;color:var(--ink2);transition:all .16s;cursor:pointer;background:#fff;font-family:inherit;display:inline-flex;align-items:center;}
.btn-ghost:hover{border-color:var(--b);color:var(--b);}
.btn-fill{font-size:13px;font-weight:700;padding:8px 18px;background:var(--gr);color:#fff;border:none;border-radius:8px;box-shadow:0 3px 12px rgba(66,32,200,0.24);transition:all .16s;cursor:pointer;font-family:inherit;display:inline-flex;align-items:center;}
.btn-fill:hover{transform:translateY(-1px);box-shadow:0 5px 16px rgba(66,32,200,0.36);}

/* HERO */
.hero{
  background:var(--w);
  border-bottom:1px solid var(--bdr);
  padding:52px 48px 56px;
  position:relative;overflow:hidden;
}
.hero::before{
  content:'';position:absolute;top:-120px;right:-120px;
  width:560px;height:560px;border-radius:50%;
  background:radial-gradient(circle,rgba(66,32,200,.055) 0%,transparent 65%);
  pointer-events:none;
}
.hero::after{
  content:'';position:absolute;bottom:-80px;left:-80px;
  width:360px;height:360px;border-radius:50%;
  background:radial-gradient(circle,rgba(66,32,200,.03) 0%,transparent 65%);
  pointer-events:none;
}
.hero-in{max-width:1500px;margin:0 auto;}

/* breadcrumb */
.bc{display:flex;align-items:center;gap:6px;margin-bottom:20px;}
.bc a{font-size:12px;font-weight:600;color:var(--ink4);}
.bc a:hover{color:var(--b);}
.bc-sep{font-size:12px;color:var(--bdr2);}
.bc span{font-size:12px;font-weight:600;color:var(--b);}

/* 2-col layout */
.hero-grid{
  display:grid;
  grid-template-columns:1fr 480px;
  gap:56px;
  align-items:center;
}

/* eyebrow pill */
.htag{display:inline-flex;align-items:center;gap:6px;background:var(--bl);border:1px solid var(--bdr2);border-radius:100px;padding:4px 13px 4px 8px;margin-bottom:16px;}
.htag-dot{width:6px;height:6px;border-radius:50%;background:var(--b);animation:breathe 2s ease-in-out infinite;}
@keyframes breathe{0%,100%{opacity:1}50%{opacity:.35}}
.htag span{font-size:11px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:var(--b);}

/* headline */
.hero h1{font-size:42px;font-weight:900;line-height:1.1;letter-spacing:-1.6px;color:var(--ink);margin-bottom:14px;}
.hero h1 em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
.hero-sub{font-size:16px;line-height:1.74;color:var(--ink3);margin-bottom:26px;max-width:750px;}
.hero-sub strong{color:var(--ink2);font-weight:600;}

/* CTA buttons */
.hbtns{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:20px;}
.btn-a{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:14px;font-weight:700;padding:11px 22px;border-radius:10px;background:var(--gr);color:#fff;border:none;cursor:pointer;box-shadow:0 4px 14px rgba(66,32,200,0.26);transition:all .2s;}
.btn-a:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(66,32,200,0.36);}
.btn-b{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:14px;font-weight:600;padding:10px 20px;border-radius:10px;background:var(--w);color:var(--b);border:1.5px solid var(--bdr2);cursor:pointer;transition:all .2s;}
.btn-b:hover{background:var(--bl);}

/* trust chips */
.trust-row{display:flex;gap:14px;flex-wrap:wrap;}
.tchip{display:flex;align-items:center;gap:5px;font-size:12px;font-weight:600;color:var(--ink4);}
.tchip svg{width:13px;height:13px;stroke:var(--ok);stroke-width:2.5;fill:none;stroke-linecap:round;stroke-linejoin:round;}

/* ── RIGHT: INTEGRATION MOSAIC ── */
.hero-mosaic{position:relative;z-index:1;}

/* top stat bar */
.mosaic-stats{
  display:grid;grid-template-columns:repeat(3,1fr);gap:10px;
  margin-bottom:14px;
}
.mstat{
  background:var(--bl2);border:1px solid var(--bdr);border-radius:12px;
  padding:13px 14px;text-align:center;
}
.mstat-n{font-size:22px;font-weight:900;color:var(--b);letter-spacing:-.8px;}
.mstat-l{font-size:10.5px;color:var(--ink4);margin-top:2px;font-weight:500;}

/* integration logo grid */
.mosaic-grid{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:10px;
}
.mg-card{
  background:var(--w);
  border:1px solid var(--bdr);
  border-radius:12px;
  padding:14px 10px;
  display:flex;flex-direction:column;
  align-items:center;gap:8px;
  text-align:center;
  transition:all .2s;
  cursor:default;
}
.mg-card:hover{
  border-color:var(--bdr2);
  box-shadow:var(--sh2);
  transform:translateY(-2px);
}
.mg-logo{
  width:40px;height:40px;border-radius:10px;
  display:flex;align-items:center;justify-content:center;
  flex-shrink:0;
}
.mg-logo svg{width:22px;height:22px;}
.mg-name{font-size:10.5px;font-weight:700;color:var(--ink2);line-height:1.3;}
.mg-cat{font-size:9px;font-weight:600;color:var(--ink4);margin-top:-2px;}

/* "more" pill card */
.mg-more{
  background:linear-gradient(135deg,var(--b),var(--bd));
  border-color:transparent;
}
.mg-more .mg-name{color:#fff;}
.mg-more .mg-cat{color:rgba(255,255,255,.6);}
.mg-more-ico{
  width:40px;height:40px;border-radius:10px;
  background:rgba(255,255,255,.15);
  display:flex;align-items:center;justify-content:center;
}
.mg-more-ico svg{width:20px;height:20px;stroke:#fff;stroke-width:2;fill:none;}

/* FILTER BAR */
.filter-bar{background:var(--w);border-bottom:1px solid var(--bdr);padding:0 48px;position:sticky;top:64px;z-index:100;}
.fb-in{max-width:1400px;margin:0 auto;display:flex;align-items:center;gap:0;overflow-x:auto;scrollbar-width:none;}
.fb-in::-webkit-scrollbar{display:none;}
.ftab{font-size:13px;font-weight:600;color:var(--ink4);padding:16px 18px;cursor:pointer;border-bottom:2px solid transparent;transition:all .18s;white-space:nowrap;display:flex;align-items:center;gap:7px;}
.ftab:hover{color:var(--ink2);}
.ftab.active{color:var(--b);border-bottom-color:var(--b);}
.ftab-ct{font-size:10px;font-weight:700;background:var(--bl);color:var(--b);border-radius:10px;padding:1px 6px;}
.ftab.active .ftab-ct{background:var(--b);color:#fff;}

/* SEARCH BAR */
.search-row{padding:32px 48px 0;max-width:1400px;margin:0 auto;}
.search-wrap{display:flex;align-items:center;gap:8px;}
.search-box{flex:1;max-width:380px;display:flex;align-items:center;gap:10px;background:var(--w);border:1.5px solid var(--bdr);border-radius:10px;padding:10px 16px;transition:border-color .16s;}
.search-box:focus-within{border-color:var(--b);}
.search-box svg{width:16px;height:16px;stroke:var(--ink4);stroke-width:2;fill:none;flex-shrink:0;}
.search-box input{border:none;outline:none;font-family:inherit;font-size:13.5px;color:var(--ink);background:transparent;width:100%;}
.search-box input::placeholder{color:var(--ink4);}

/* SECTIONS */
.int-section{padding:48px 48px 0;}
.int-section:last-of-type{padding-bottom:80px;}
.sec-wrap{max-width:1400px;margin:0 auto;}
.sec-header{display:flex;align-items:flex-start;justify-content:space-between;gap:24px;margin-bottom:28px;flex-wrap:wrap;}
.sec-left{}
.sec-eyebrow{display:inline-flex;align-items:center;gap:6px;font-size:12.5px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);margin-bottom:8px;}
.sec-ew{width:14px;height:2.5px;background:var(--gr);border-radius:2px;flex-shrink:0;}
.sec-title{font-size:24px;font-weight:800;letter-spacing:-.6px;color:var(--ink);margin-bottom:6px;}
.sec-desc{font-size:14px;color:var(--ink3);line-height:1.68;max-width:560px;}
.sec-ct{background:var(--bl);color:var(--b);font-size:11px;font-weight:700;border-radius:6px;padding:3px 10px;align-self:flex-start;white-space:nowrap;}

.int-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;}
.int-card{background:var(--w);border:1.5px solid var(--bdr);border-radius:var(--rad);padding:24px;box-shadow:var(--sh);transition:all .22s;position:relative;overflow:hidden;}
.int-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--gr);border-radius:var(--rad) var(--rad) 0 0;opacity:0;transition:opacity .22s;}
.int-card:hover{transform:translateY(-3px);box-shadow:var(--sh2);border-color:var(--bdr2);}
.int-card:hover::before{opacity:1;}
.int-card.featured{border-color:var(--bdr2);background:linear-gradient(150deg,var(--w) 0%,var(--bl2) 100%);}
.ic-top{display:flex;align-items:flex-start;margin-bottom:14px;}
.ic-logo-wrap{width:52px;height:52px;border-radius:13px;border:1px solid var(--bdr);display:flex;flex-direction:column;align-items:center;justify-content:center;box-shadow:var(--sh);overflow:hidden;flex-shrink:0;}

.ic-status-available 
.ic-status-connected 
.ic-cat-tag{font-size:9.5px;font-weight:800;letter-spacing:.07em;text-transform:uppercase;border-radius:4px;padding:2px 8px;display:inline-block;margin-bottom:10px;}
.ic-name{font-size:16px;font-weight:800;color:var(--ink);margin-bottom:6px;letter-spacing:-.3px;}
.ic-desc{font-size:13px;color:var(--ink3);line-height:1.68;flex:1;margin-bottom:14px;}

/* DIVIDER */
.sec-div{max-width:1200px;margin:48px auto 0;height:1px;background:var(--bdr);}

/* CUSTOM BANNER */
.custom-banner{background:var(--bl2);border:1px solid var(--bdr);border-radius:var(--rad);padding:28px 32px;display:flex;align-items:center;justify-content:space-between;gap:24px;max-width:1200px;margin:0 auto;}
.cb-left{display:flex;align-items:center;gap:16px;}
.cb-ico{width:50px;height:50px;border-radius:13px;background:var(--gr);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.cb-ico svg{width:22px;height:22px;stroke:#fff;stroke-width:1.8;fill:none;stroke-linecap:round;stroke-linejoin:round;}
.cb-title{font-size:16px;font-weight:800;color:var(--ink);margin-bottom:3px;}
.cb-desc{font-size:13px;color:var(--ink3);line-height:1.6;}
.cb-right{display:flex;gap:8px;flex-wrap:wrap;flex-shrink:0;}

/* CTA SECTION */
.cta-sec{background:var(--gr);padding:72px 48px;text-align:center;position:relative;overflow:hidden;}
.cta-sec::before{content:'';position:absolute;inset:0;background:url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23fff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/svg%3E");pointer-events:none;}
.cta-in{max-width:540px;margin:0 auto;position:relative;z-index:1;}
.cta-tag{display:inline-block;background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.25);border-radius:100px;padding:4px 14px;font-size:11px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:rgba(255,255,255,.9);margin-bottom:18px;}
.cta-h{font-size:36px;font-weight:900;letter-spacing:-1.4px;line-height:1.1;color:#fff;margin-bottom:13px;}
.cta-h em{font-style:normal;color:var(--bl);}
.cta-p{font-size:16px;color:rgba(255,255,255,0.65);line-height:1.74;margin-bottom:28px;}
.cta-btns{display:flex;gap:12px;justify-content:center;flex-wrap:wrap;margin-bottom:14px;}
.cta-btn-w{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:15px;font-weight:700;padding:13px 26px;border-radius:10px;background:#fff;color:var(--b);border:none;cursor:pointer;box-shadow:0 4px 16px rgba(0,0,0,0.15);transition:all .2s;}
.cta-btn-w:hover{background:var(--bl);transform:translateY(-2px);}
.cta-btn-o{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:15px;font-weight:600;padding:12px 24px;border-radius:10px;background:rgba(255,255,255,0.1);color:#fff;border:1.5px solid rgba(255,255,255,0.25);cursor:pointer;transition:all .2s;}
.cta-btn-o:hover{background:rgba(255,255,255,0.18);}
.cta-note{font-size:12.5px;color:rgba(255,255,255,0.4);}


/* category tag colors */
.tag-ams{background:#FFF7ED;color:#C2410C;}
.tag-hr{background:#F0FDF4;color:#15803D;}
.tag-meetings{background:#EFF6FF;color:#1D4ED8;}
.tag-content{background:#FDF4FF;color:#7E22CE;}
.tag-payments{background:#F0FDF4;color:#15803D;}
.tag-cms{background:#FFF1F2;color:#BE123C;}

/* hidden for filter */
.int-section.hidden{display:none;}

/* RESPONSIVE */
@media(max-width:1100px){
  .hero-grid{grid-template-columns:1fr 400px;gap:40px;}
  .mosaic-grid{grid-template-columns:repeat(3,1fr);}
}
@media(max-width:1024px){
  .nav,.hero,.filter-bar,.int-section,.cta-sec,footer{padding-left:28px;padding-right:28px;}
  .hero-grid{grid-template-columns:1fr;}
  .hero-mosaic{display:none;}
  .int-grid{grid-template-columns:1fr 1fr;}
  .foot-g{grid-template-columns:1fr 1fr;}
}
@media(max-width:640px){
  .nav-links{display:none;}
  .hero h1{font-size:30px;}
  .int-grid{grid-template-columns:1fr;}
  .cta-h{font-size:26px;}
  .foot-g{grid-template-columns:1fr;}
  .custom-banner{flex-direction:column;}
  .mosaic-stats{grid-template-columns:repeat(3,1fr);}
}
    </style>
@endpush

@section('content')
<!-- HERO -->
<header class="hero">
  <div class="hero-in">
    <nav class="bc" aria-label="Breadcrumb">
      <a href="https://kp.kprise.com">Home</a>
      <span class="bc-sep">/</span>
      <span>Integrations</span>
    </nav>
    <div class="hero-grid">

      <!-- LEFT: copy -->
      <div>
        <div class="htag"><span class="htag-dot"></span><span>Platform Integrations</span></div>
        <h1>Connect MyPass LMS to<br>the Tools You <em>Already Use.</em></h1>
        <p class="hero-sub">Your team works with AMS platforms, HR systems, video tools, and payment processors every day. <strong>MyPass LMS integrates with all of them</strong> so data moves automatically, without manual exports or duplicate entry.</p>
        <div class="hbtns">
          <a href="https://mypasslms.us/login#register" class="btn-a">Start Free — Connect Today</a>
          <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b">Book a Demo</a>
        </div>
        <div class="trust-row">
          <div class="tchip"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>No manual data exports</div>
          <div class="tchip"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>REST API and SSO supported</div>
          <div class="tchip"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Custom integrations available</div>
        </div>
      </div>

      <!-- RIGHT: mosaic -->
      <div class="hero-mosaic">

        <!-- stat row -->
        <div class="mosaic-stats">
          <div class="mstat"><div class="mstat-n">13+</div><div class="mstat-l">Integrations</div></div>
          <div class="mstat"><div class="mstat-n">6</div><div class="mstat-l">Categories</div></div>
          <div class="mstat"><div class="mstat-n">API</div><div class="mstat-l">Custom builds</div></div>
        </div>

        <!-- logo mosaic grid — 4 cols × 3 rows = 12 tiles + 1 "more" -->
        <div class="mosaic-grid">

          <!-- GrowthZone -->
          <div class="mg-card" onclick="filterTabByKey('ams')">
            <div class="mg-logo" style="background:#1B873D;">
              <svg viewBox="0 0 28 28" fill="none"><path d="M8 14h12M14 8v12" stroke="#fff" stroke-width="2.2" stroke-linecap="round"/></svg>
            </div>
            <div class="mg-name">GrowthZone</div>
            <div class="mg-cat">AMS</div>
          </div>

          <!-- iMIS -->
          <div class="mg-card">
            <div class="mg-logo" style="background:#003087;">
              <svg viewBox="0 0 28 28" fill="none"><path d="M8 10h12M8 14h12M8 18h8" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg>
            </div>
            <div class="mg-name">iMIS</div>
            <div class="mg-cat">AMS</div>
          </div>

          <!-- Impexium -->
          <div class="mg-card">
            <div class="mg-logo" style="background:#5C35CC;">
              <svg viewBox="0 0 28 28" fill="none"><circle cx="14" cy="11" r="4" stroke="#fff" stroke-width="1.8"/><path d="M6 24c0-4.4 3.6-8 8-8s8 3.6 8 8" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
            </div>
            <div class="mg-name">Impexium</div>
            <div class="mg-cat">AMS</div>
          </div>

          <!-- BambooHR -->
          <div class="mg-card">
            <div class="mg-logo" style="background:#73C41D;">
              <svg viewBox="0 0 28 28" fill="none"><path d="M14 5c-2.5 2.5-4 5-4 8a4 4 0 0 0 8 0c0-3-1.5-5.5-4-8z" stroke="#fff" stroke-width="1.7" fill="rgba(255,255,255,.15)"/><path d="M14 13v6" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg>
            </div>
            <div class="mg-name">BambooHR</div>
            <div class="mg-cat">HR Systems</div>
          </div>

          <!-- Personify -->
          <div class="mg-card">
            <div class="mg-logo" style="background:#D94F00;">
              <svg viewBox="0 0 28 28" fill="none"><circle cx="14" cy="10" r="4" stroke="#fff" stroke-width="1.8"/><path d="M5 23c0-5 4-9 9-9s9 4 9 9" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
            </div>
            <div class="mg-name">Personify</div>
            <div class="mg-cat">AMS</div>
          </div>

          <!-- Zoom -->
          <div class="mg-card">
            <div class="mg-logo" style="background:#2D8CFF;">
              <svg viewBox="0 0 28 28" fill="none"><rect x="4" y="8" width="14" height="12" rx="2" stroke="#fff" stroke-width="1.8"/><path d="M18 11.5l6-3v11l-6-3v-5z" stroke="#fff" stroke-width="1.8" stroke-linejoin="round"/></svg>
            </div>
            <div class="mg-name">Zoom</div>
            <div class="mg-cat">Meetings</div>
          </div>

          <!-- Microsoft Teams -->
          <div class="mg-card">
            <div class="mg-logo" style="background:#464775;">
              <svg viewBox="0 0 28 28" fill="none"><rect x="6" y="8" width="16" height="13" rx="2" stroke="#fff" stroke-width="1.7"/><path d="M11 8V6M17 8V6M11 6h6" stroke="#fff" stroke-width="1.7" stroke-linecap="round"/></svg>
            </div>
            <div class="mg-name">MS Teams</div>
            <div class="mg-cat">Meetings</div>
          </div>

          <!-- Sage HR -->
          <div class="mg-card">
            <div class="mg-logo" style="background:#00B050;">
              <svg viewBox="0 0 28 28" fill="none"><circle cx="14" cy="14" r="8" stroke="#fff" stroke-width="1.8"/><path d="M10 14l2.5 2.5L18 11" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <div class="mg-name">Sage HR</div>
            <div class="mg-cat">HR Systems</div>
          </div>

          <!-- WordPress -->
          <div class="mg-card">
            <div class="mg-logo" style="background:#21759B;">
              <svg viewBox="0 0 28 28" fill="none"><circle cx="14" cy="14" r="9" stroke="#fff" stroke-width="1.7"/><path d="M14 5v18M5 14h18" stroke="rgba(255,255,255,.45)" stroke-width="1.3"/></svg>
            </div>
            <div class="mg-name">WordPress</div>
            <div class="mg-cat">CMS</div>
          </div>

          <!-- Stripe -->
          <div class="mg-card">
            <div class="mg-logo" style="background:#635BFF;">
              <svg viewBox="0 0 28 28" fill="none"><rect x="4" y="7" width="20" height="14" rx="2" stroke="#fff" stroke-width="1.8"/><path d="M4 12h20" stroke="#fff" stroke-width="1.8"/><path d="M8 17h4" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
            </div>
            <div class="mg-name">Stripe</div>
            <div class="mg-cat">Payments</div>
          </div>

          <!-- OpenSesame -->
          <div class="mg-card">
            <div class="mg-logo" style="background:#FF5A1F;">
              <svg viewBox="0 0 28 28" fill="none"><circle cx="14" cy="12" r="5" stroke="#fff" stroke-width="1.8"/><path d="M9 22l1.5-4M19 22l-1.5-4M11.5 18h5" stroke="#fff" stroke-width="1.7" stroke-linecap="round"/></svg>
            </div>
            <div class="mg-name">OpenSesame</div>
            <div class="mg-cat">Content</div>
          </div>

          <!-- More -->
          <div class="mg-card mg-more">
            <div class="mg-more-ico">
              <svg viewBox="0 0 24 24"><circle cx="5" cy="12" r="1.5" fill="#fff"/><circle cx="12" cy="12" r="1.5" fill="#fff"/><circle cx="19" cy="12" r="1.5" fill="#fff"/></svg>
            </div>
            <div class="mg-name">Custom API</div>
            <div class="mg-cat">Any system</div>
          </div>

        </div><!-- /mosaic-grid -->
      </div><!-- /hero-mosaic -->

    </div><!-- /hero-grid -->
  </div>
</header>

<!-- FILTER TABS -->
<div class="filter-bar">
  <div class="fb-in" id="filterBar">
    <div class="ftab active" onclick="filterAll(this)">All Integrations <span class="ftab-ct">13</span></div>
    <div class="ftab" onclick="filterTab(this,'ams')">AMS Systems <span class="ftab-ct">6</span></div>
    <div class="ftab" onclick="filterTab(this,'hr')">HR Systems <span class="ftab-ct">3</span></div>
    <div class="ftab" onclick="filterTab(this,'meetings')">Meetings <span class="ftab-ct">2</span></div>
    <div class="ftab" onclick="filterTab(this,'content')">Content <span class="ftab-ct">1</span></div>
    <div class="ftab" onclick="filterTab(this,'cms')">CMS <span class="ftab-ct">1</span></div>
    <div class="ftab" onclick="filterTab(this,'payments')">Payments <span class="ftab-ct">1</span></div>
  </div>
</div>

<!-- ═══════════ AMS SECTION ═══════════ -->
<section class="int-section" id="sec-ams" data-cat="ams">
  <div class="sec-wrap">
    <div class="sec-header">
      <div class="sec-left">
        <div class="sec-eyebrow"><span class="sec-ew"></span>AMS Systems</div>
        <div class="sec-title">Association Management System (AMS)</div>
        <div class="sec-desc">Sync member data, credentials, and training records directly between your AMS and MyPass LMS — no CSV exports, no manual enrollment, no duplicate records. Member updates in your AMS reflect in training automatically.</div>
      </div>
      <span class="sec-ct">6 Integrations</span>
    </div>
    <div class="int-grid">

      <!-- GrowthZone -->
      <div class="int-card">
        <div class="ic-top">
          <div class="ic-logo-wrap" style="background:#1B873D;">
            <svg width="26" height="26" viewBox="0 0 28 28" fill="none"><rect x="6" y="6" width="16" height="16" rx="3" fill="rgba(255,255,255,0.15)"/><path d="M10 14h8M14 10v8" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg>
          </div>
        </div>
        <span class="ic-cat-tag tag-ams">AMS</span>
        <div class="ic-name">GrowthZone</div>
        <div class="ic-desc">Sync members and credentials from GrowthZone association management system. Member profiles, roles, and credential data flow automatically into MyPass LMS — keeping training assignments aligned with your AMS records at all times.</div>
        </div>

      <!-- iMIS -->
      <div class="int-card">
        <div class="ic-top">
          <div class="ic-logo-wrap" style="background:#003087;">
            <svg width="26" height="26" viewBox="0 0 28 28" fill="none"><path d="M9 9h10M9 14h10M9 19h6" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg>
          </div>
        </div>
        <span class="ic-cat-tag tag-ams">AMS</span>
        <div class="ic-name">iMIS</div>
        <div class="ic-desc">Sync members from iMIS association management system. When a member is updated, added, or removed in iMIS, their training assignments and profile in MyPass LMS update automatically — eliminating the need for periodic data reconciliation.</div>
        </div>

      <!-- Impexium -->
      <div class="int-card">
        <div class="ic-top">
          <div class="ic-logo-wrap" style="background:#5C35CC;">
            <svg width="26" height="26" viewBox="0 0 28 28" fill="none"><circle cx="14" cy="11" r="4" stroke="#fff" stroke-width="1.8"/><path d="M7 23c0-3.9 3.1-7 7-7s7 3.1 7 7" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
          </div>
        </div>
        <span class="ic-cat-tag tag-ams">AMS</span>
        <div class="ic-name">Impexium</div>
        <div class="ic-desc">Sync members and credentials from Impexium (re:Members) AMS. Member data, membership tiers, and certification records flow bidirectionally — so your LMS always reflects your AMS without manual intervention.</div>
        </div>

      <!-- Personify -->
      <div class="int-card">
        <div class="ic-top">
          <div class="ic-logo-wrap" style="background:#D94F00;">
            <svg width="26" height="26" viewBox="0 0 28 28" fill="none"><circle cx="14" cy="10" r="4" stroke="#fff" stroke-width="1.8"/><path d="M6 22c0-4.4 3.6-8 8-8s8 3.6 8 8" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
          </div>
        </div>
        <span class="ic-cat-tag tag-ams">AMS</span>
        <div class="ic-name">Personify</div>
        <div class="ic-desc">Sync members from Personify AMS directly into MyPass LMS. Member profiles, chapter assignments, and credential data stay in sync — so your team spends time on programs, not on reconciling records across systems.</div>
        </div>

      <!-- Wild Apricot -->
      <div class="int-card">
        <div class="ic-top">
          <div class="ic-logo-wrap" style="background:#F57C00;">
            <svg width="26" height="26" viewBox="0 0 28 28" fill="none"><path d="M14 5C10 9 8 12 8 15c0 3.3 2.7 6 6 6s6-2.7 6-6c0-3-2-6-6-10z" fill="rgba(255,255,255,0.2)"/><path d="M14 5C10 9 8 12 8 15c0 3.3 2.7 6 6 6s6-2.7 6-6c0-3-2-6-6-10z" stroke="#fff" stroke-width="1.6"/></svg>
          </div>
        </div>
        <span class="ic-cat-tag tag-ams">AMS</span>
        <div class="ic-name">Wild Apricot</div>
        <div class="ic-desc">Sync members from Wild Apricot membership platform into MyPass LMS. Membership status, contact data, and groups sync automatically — so training assignments stay aligned with your membership records without any manual work.</div>
        </div>

      <!-- Mock AMS / Custom -->
      <div class="int-card featured">
        <div class="ic-top">
          <div class="ic-logo-wrap" style="background:linear-gradient(135deg,#4220C8,#2D1490);">
            <svg width="26" height="26" viewBox="0 0 28 28" fill="none"><path d="M9 6H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 6v16m0 0h10a2 2 0 0 0 2-2v-10M9 22H5a2 2 0 0 1-2-2v-10m0 0h18" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
        </div>
        <span class="ic-cat-tag tag-ams">AMS</span>
        <div class="ic-name">Custom AMS Integration</div>
        <div class="ic-desc">Using an AMS not on this list? MyPass LMS supports custom API and webhook integrations for any association management system. Most new AMS connections are configured and live within 2 to 4 weeks through our integration team.</div>
        </div>

    </div>
  </div>
</section>

<div class="sec-div"></div>

<!-- ═══════════ HR SYSTEMS ═══════════ -->
<section class="int-section" id="sec-hr" data-cat="hr">
  <div class="sec-wrap">
    <div class="sec-header">
      <div class="sec-left">
        <div class="sec-eyebrow"><span class="sec-ew"></span>HR Systems</div>
        <div class="sec-title">Human Resources (HR) Platforms</div>
        <div class="sec-desc">Connect MyPass LMS to your HR system and new employees are added to training automatically the moment they are created in your HR platform. Role-based training triggers without any manual enrollment.</div>
      </div>
      <span class="sec-ct">3 Integrations</span>
    </div>
    <div class="int-grid">

      <!-- BambooHR -->
      <div class="int-card">
        <div class="ic-top">
          <div class="ic-logo-wrap" style="background:#73C41D;">
            <svg width="26" height="26" viewBox="0 0 28 28" fill="none"><path d="M14 6c-2.2 2.2-4 4.5-4 7a4 4 0 0 0 8 0c0-2.5-1.8-4.8-4-7z" stroke="#fff" stroke-width="1.6" fill="rgba(255,255,255,0.2)"/><path d="M14 13v6" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
          </div>
        </div>
        <span class="ic-cat-tag tag-hr">HR Systems</span>
        <div class="ic-name">BambooHR</div>
        <div class="ic-desc">Add all your employees from BambooHR into your MyPass LMS portal automatically. When a new hire is added in BambooHR, their training profile in MyPass LMS is created instantly and role-appropriate courses are assigned without any manual step.</div>
        </div>

      <!-- Sage HR -->
      <div class="int-card">
        <div class="ic-top">
          <div class="ic-logo-wrap" style="background:#00B050;">
            <svg width="26" height="26" viewBox="0 0 28 28" fill="none"><circle cx="14" cy="14" r="8" stroke="#fff" stroke-width="1.6"/><path d="M10 14l2.5 2.5L18 11" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
        </div>
        <span class="ic-cat-tag tag-hr">HR Systems</span>
        <div class="ic-name">Sage HR</div>
        <div class="ic-desc">MyPass LMS integrates with Sage HR to keep employee profiles and training records in sync. When employees are updated, promoted, or offboarded in Sage HR, their training access and assignments in MyPass LMS update automatically.</div>
        </div>

      <!-- TalentHR -->
      <div class="int-card">
        <div class="ic-top">
          <div class="ic-logo-wrap" style="background:#6D28D9;">
            <svg width="26" height="26" viewBox="0 0 28 28" fill="none"><rect x="7" y="5" width="14" height="18" rx="2" stroke="#fff" stroke-width="1.6"/><path d="M10 10h8M10 14h6M10 18h4" stroke="#fff" stroke-width="1.4" stroke-linecap="round"/></svg>
          </div>
        </div>
        <span class="ic-cat-tag tag-hr">HR Systems</span>
        <div class="ic-name">Talent HR</div>
        <div class="ic-desc">Synchronize employee data and keep track of your team's training progress on your TalentHR domain. Employee onboarding triggers in TalentHR automatically create the corresponding training journey in MyPass LMS — no manual handoff required.</div>
        </div>

    </div>
  </div>
</section>

<div class="sec-div"></div>

<!-- ═══════════ MEETINGS ═══════════ -->
<section class="int-section" id="sec-meetings" data-cat="meetings">
  <div class="sec-wrap">
    <div class="sec-header">
      <div class="sec-left">
        <div class="sec-eyebrow"><span class="sec-ew"></span>Meetings &amp; Video</div>
        <div class="sec-title">Video Conferencing &amp; ILT</div>
        <div class="sec-desc">Host instructor-led training (ILT) sessions and virtual classrooms directly from MyPass LMS. Schedule, manage, and track attendance for live and virtual training sessions — all connected to your learner records automatically.</div>
      </div>
      <span class="sec-ct">2 Integrations</span>
    </div>
    <div class="int-grid">

      <!-- Microsoft Teams -->
      <div class="int-card">
        <div class="ic-top">
          <div class="ic-logo-wrap" style="background:#464775;">
            <svg width="26" height="26" viewBox="0 0 28 28" fill="none"><rect x="7" y="8" width="14" height="13" rx="2" stroke="#fff" stroke-width="1.6"/><path d="M11 8V6h6v2M14 21v2M14 14v3" stroke="#fff" stroke-width="1.5" stroke-linecap="round"/></svg>
          </div>
        </div>
        <span class="ic-cat-tag tag-meetings">Meetings</span>
        <div class="ic-name">Microsoft Teams</div>
        <div class="ic-desc">Use Microsoft Teams for Conferences and Instructor-Led Training (ILT) units within MyPass LMS. Schedule live training sessions, send calendar invites automatically, and capture attendance data back into learner records — all from your LMS dashboard.</div>
        </div>

      <!-- Zoom -->
      <div class="int-card featured">
        <div class="ic-top">
          <div class="ic-logo-wrap" style="background:#2D8CFF;">
            <svg width="26" height="26" viewBox="0 0 28 28" fill="none"><rect x="5" y="8" width="14" height="12" rx="2" stroke="#fff" stroke-width="1.6"/><path d="M19 11l4-2v8l-4-2v-4z" stroke="#fff" stroke-width="1.6" stroke-linejoin="round"/></svg>
          </div>
        </div>
        <span class="ic-cat-tag tag-meetings">Meetings</span>
        <div class="ic-name">Zoom</div>
        <div class="ic-desc">Connect with Zoom Meeting and start hosting interactive learning sessions directly from MyPass LMS. Create Zoom meetings from your LMS, send joining links automatically, track session attendance, and link completion data to learner records without any manual step.</div>
        </div>

    </div>
  </div>
</section>

<div class="sec-div"></div>

<!-- ═══════════ CONTENT ═══════════ -->
<section class="int-section" id="sec-content" data-cat="content">
  <div class="sec-wrap">
    <div class="sec-header">
      <div class="sec-left">
        <div class="sec-eyebrow"><span class="sec-ew"></span>Content Providers</div>
        <div class="sec-title">External Course Content Libraries</div>
        <div class="sec-desc">Expand your training library by connecting external course content providers to MyPass LMS. Courses sync directly and are assignable the same way as your own content — trackable, reportable, and embedded in your learning paths.</div>
      </div>
      <span class="sec-ct">1 Integration</span>
    </div>
    <div class="int-grid">

      <!-- OpenSesame -->
      <div class="int-card">
        <div class="ic-top">
          <div class="ic-logo-wrap" style="background:#FF5A1F;">
            <svg width="26" height="26" viewBox="0 0 28 28" fill="none"><circle cx="14" cy="12" r="5" stroke="#fff" stroke-width="1.6"/><path d="M9 21l2.5-4.5M19 21l-2.5-4.5M11.5 16.5h5" stroke="#fff" stroke-width="1.6" stroke-linecap="round"/></svg>
          </div>
        </div>
        <span class="ic-cat-tag tag-content">Content</span>
        <div class="ic-name">OpenSesame</div>
        <div class="ic-desc">Synchronize courses from OpenSesame's library of 50,000+ industry-specific courses directly into MyPass LMS. Assign, track, and report on OpenSesame content the same way you manage your own — fully integrated into your learning paths and compliance reporting.</div>
        </div>

    </div>
  </div>
</section>

<div class="sec-div"></div>

<!-- ═══════════ CMS ═══════════ -->
<section class="int-section" id="sec-cms" data-cat="cms">
  <div class="sec-wrap">
    <div class="sec-header">
      <div class="sec-left">
        <div class="sec-eyebrow"><span class="sec-ew"></span>Content Management</div>
        <div class="sec-title">CMS &amp; Website Integration</div>
        <div class="sec-desc">Embed and deliver training content through your existing website or digital properties. Connect your CMS to MyPass LMS so learners access training without leaving your branded environment.</div>
      </div>
      <span class="sec-ct">1 Integration</span>
    </div>
    <div class="int-grid">

      <!-- WordPress -->
      <div class="int-card featured">
        <div class="ic-top">
          <div class="ic-logo-wrap" style="background:#21759B;">
            <svg width="26" height="26" viewBox="0 0 28 28" fill="none"><circle cx="14" cy="14" r="9" stroke="#fff" stroke-width="1.6"/><path d="M8 14c0-3.3 2.7-6 6-6M20 14c0 3.3-2.7 6-6 6M14 8v12" stroke="#fff" stroke-width="1.4" stroke-linecap="round"/><path d="M10 11l8 6M18 11l-8 6" stroke="rgba(255,255,255,0.4)" stroke-width="1.2" stroke-linecap="round"/></svg>
          </div>
        </div>
        <span class="ic-cat-tag tag-cms">CMS</span>
        <div class="ic-name">WordPress</div>
        <div class="ic-desc">WordPress Plugin Integration — Embed your MyPass LMS directly within your WordPress website. Learners access courses through your branded site. Enrolment, tracking, and completion data all sync back to MyPass LMS automatically — no separate portal login required for your learners.</div>
        </div>

    </div>
  </div>
</section>

<div class="sec-div"></div>

<!-- ═══════════ PAYMENTS ═══════════ -->
<section class="int-section" id="sec-payments" data-cat="payments">
  <div class="sec-wrap">
    <div class="sec-header">
      <div class="sec-left">
        <div class="sec-eyebrow"><span class="sec-ew"></span>Payments</div>
        <div class="sec-title">Payment Processing</div>
        <div class="sec-desc">Accept payments for courses, certifications, and membership training programs directly through MyPass LMS. Secure, automated payment processing so learners can purchase and access courses without leaving your platform.</div>
      </div>
      <span class="sec-ct">1 Integration</span>
    </div>
    <div class="int-grid">

      <!-- Stripe -->
      <div class="int-card featured">
        <div class="ic-top">
          <div class="ic-logo-wrap" style="background:#635BFF;">
            <svg width="26" height="26" viewBox="0 0 28 28" fill="none"><rect x="5" y="8" width="18" height="14" rx="2" stroke="#fff" stroke-width="1.6"/><path d="M5 12h18" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/><path d="M9 17h4M9 17h4" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
          </div>
        </div>
        <span class="ic-cat-tag tag-payments">Payments</span>
        <div class="ic-name">Stripe</div>
        <div class="ic-desc">Accept payments for courses via Stripe Checkout. Sell individual courses, training bundles, or certification programs directly through MyPass LMS. Payments are secure, compliant, and automatically linked to enrolment — learners pay and access their course immediately.</div>
        </div>

    </div>
  </div>
</section>

<div class="sec-div" style="margin-bottom:48px;"></div>

<!-- CUSTOM INTEGRATION BANNER -->
<div style="padding:0 48px 80px;">
  <div class="custom-banner">
    <div class="cb-left">
      <div class="cb-ico">
        <svg viewBox="0 0 24 24"><path d="M9 3H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 3v18m0 0h10a2 2 0 0 0 2-2V9M9 21H5a2 2 0 0 1-2-2V9m0 0h18"/></svg>
      </div>
      <div>
        <div class="cb-title">Need a custom integration?</div>
        <div class="cb-desc">Using a system not listed here? Our integration team builds custom API and webhook connections for any platform. REST API access is available on all plans — most custom integrations are live within 2 to 4 weeks.</div>
      </div>
    </div>
    <div class="cb-right">
      <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-a" style="font-size:13.5px;padding:10px 20px;">Talk to Integration Team</a>
      <a href="https://help.kprise.com" target="_blank" rel="noopener" class="btn-b" style="font-size:13.5px;padding:9px 18px;">API Docs</a>
    </div>
  </div>
</div>

<!-- CTA -->
<section class="cta-sec">
  <div class="cta-in">
    <div class="cta-tag">15-Day Free Trial — No Card Required</div>
    <h2 class="cta-h">Your Tools. <em>One Connected Platform.</em></h2>
    <p class="cta-p">Stop moving data between disconnected systems. Connect MyPass LMS to the tools your team already uses — and let the integrations handle the rest automatically.</p>
    <div class="cta-btns">
      <a href="https://mypasslms.us/login#register" class="cta-btn-w">Start Free for 15 Days</a>
      <a href="https://calendly.com/onlinesales-kprise/30min" class="cta-btn-o">Book a 30-Minute Demo</a>
    </div>
    <p class="cta-note">Full platform access · REST API on all plans · AWS FedRAMP infrastructure</p>
  </div>
</section>


<script>
const sections = {
  ams:document.getElementById('sec-ams'),
  hr:document.getElementById('sec-hr'),
  meetings:document.getElementById('sec-meetings'),
  content:document.getElementById('sec-content'),
  cms:document.getElementById('sec-cms'),
  payments:document.getElementById('sec-payments')
};
const allSecs = Object.values(sections);
const divs = document.querySelectorAll('.sec-div');

function filterAll(tab) {
  document.querySelectorAll('.ftab').forEach(t=>t.classList.remove('active'));
  tab.classList.add('active');
  allSecs.forEach(s=>{s.style.display='';});
  divs.forEach(d=>{d.style.display='';});
  window.scrollTo({top:document.querySelector('.filter-bar').offsetTop-10,behavior:'smooth'});
}

function filterTab(tab, cat) {
  document.querySelectorAll('.ftab').forEach(t=>t.classList.remove('active'));
  tab.classList.add('active');
  allSecs.forEach(s=>{
    s.style.display = (s.getAttribute('data-cat')===cat)?'':'none';
  });
  divs.forEach(d=>{d.style.display='none';});
  const target = sections[cat];
  if(target) setTimeout(()=>window.scrollTo({top:target.offsetTop-130,behavior:'smooth'}),50);
}

function filterTabByKey(cat) {
  const tabs = document.querySelectorAll('.ftab');
  tabs.forEach(t=>t.classList.remove('active'));
  // Find the tab whose onclick contains the cat key
  tabs.forEach(t=>{
    const oc = t.getAttribute('onclick')||'';
    if(oc.includes("'"+cat+"'")) t.classList.add('active');
  });
  allSecs.forEach(s=>{
    s.style.display = (s.getAttribute('data-cat')===cat)?'':'none';
  });
  divs.forEach(d=>{d.style.display='none';});
  const target = sections[cat];
  if(target) setTimeout(()=>window.scrollTo({top:target.offsetTop-130,behavior:'smooth'}),50);
}

// Smooth scroll for hash links
document.querySelectorAll('a[href^="#"]').forEach(a=>{
  a.addEventListener('click',e=>{
    const h=a.getAttribute('href');
    if(h==='#'||!h||h.length<2) return;
    e.preventDefault();
    const t=document.querySelector(h);
    if(t) window.scrollTo({top:t.getBoundingClientRect().top+window.pageYOffset-130,behavior:'smooth'});
  });
});
</script>
@endsection

@push('schema')
@verbatim

@endverbatim
@endpush

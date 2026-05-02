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
.logo{display:flex;align-items:center;gap:9px;}
.lmark{width:33px;height:33px;border-radius:9px;background:var(--gr);display:flex;align-items:center;justify-content:center;font-weight:900;font-size:14px;color:#fff;box-shadow:0 3px 10px rgba(66,32,200,0.26);}
.lname{font-size:17px;font-weight:800;color:var(--ink);letter-spacing:-0.3px;}
.lname b{color:var(--b);font-weight:800;}
.nav-links{display:flex;gap:2px;list-style:none;}
.nav-links a{font-size:13.5px;font-weight:600;color:var(--ink3);padding:6px 10px;border-radius:7px;transition:all .16s;}
.nav-links a:hover,.nav-links a.act{color:var(--b);background:var(--bl2);}
.nav-cta{display:flex;gap:8px;align-items:center;}
.btn-ghost{font-size:13px;font-weight:600;padding:7px 15px;border:1.5px solid var(--bdr2);border-radius:8px;color:var(--ink2);transition:all .16s;cursor:pointer;font-family:inherit;background:none;}
.btn-ghost:hover{border-color:var(--b);color:var(--b);}
.btn-fill{font-size:13px;font-weight:700;padding:8px 18px;background:var(--gr);color:#fff;border:none;border-radius:8px;box-shadow:0 3px 12px rgba(66,32,200,0.24);transition:all .16s;cursor:pointer;font-family:inherit;}
.btn-fill:hover{transform:translateY(-1px);box-shadow:0 5px 16px rgba(66,32,200,0.36);}

/* HERO */
.hero{background:var(--w);border-bottom:1px solid var(--bdr);padding:52px 48px 0;overflow:hidden;position:relative;}
.hero::after{content:'';position:absolute;top:0;right:0;bottom:0;width:48%;background:linear-gradient(to right,transparent,var(--bl2) 40%);pointer-events:none;}
.hero-grid{max-width:1500px;margin:0 auto;display:grid;grid-template-columns:1fr 460px;gap:52px;align-items:center;position:relative;z-index:1;}
.bc{display:flex;align-items:center;gap:6px;margin-bottom:14px;}
.bc a{font-size:12px;font-weight:600;color:var(--ink4);}
.bc a:hover{color:var(--b);}
.bc-sep{font-size:12px;color:var(--bdr2);}
.bc span{font-size:12px;font-weight:600;color:var(--b);}
.htag{display:inline-flex;align-items:center;gap:6px;background:var(--bl);border:1px solid var(--bdr2);border-radius:100px;padding:4px 13px 4px 8px;margin-bottom:16px;}
.htag-dot{width:6px;height:6px;border-radius:50%;background:var(--b);animation:breathe 2s ease-in-out infinite;}
@keyframes breathe{0%,100%{opacity:1}50%{opacity:.35}}
.htag span{font-size:11px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:var(--b);}
.hero h1{font-size:44px;font-weight:900;line-height:1.1;letter-spacing:-1.8px;color:var(--ink);margin-bottom:16px;}
.hero h1 em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
.hero-sub{font-size:16.5px;line-height:1.74;color:var(--ink3);margin-bottom:28px;max-width:780px;}
.hero-sub strong{color:var(--ink2);font-weight:600;}
.hbtns{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:24px;}
.btn-a{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:14.5px;font-weight:700;padding:12px 24px;border-radius:10px;background:var(--gr);color:#fff;border:none;cursor:pointer;box-shadow:0 4px 14px rgba(66,32,200,0.26);transition:all .2s;}
.btn-a:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(66,32,200,0.36);}
.btn-b{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:14.5px;font-weight:600;padding:11px 22px;border-radius:10px;background:var(--w);color:var(--b);border:1.5px solid var(--bdr2);cursor:pointer;transition:all .2s;}
.btn-b:hover{background:var(--bl);}
.trust-row{display:flex;gap:16px;flex-wrap:wrap;padding-bottom:18px;}
.tchip{display:flex;align-items:center;gap:5px;font-size:12.5px;font-weight:600;color:var(--ink4);}
.tchip svg{width:13px;height:13px;stroke:var(--ok);stroke-width:2.5;fill:none;stroke-linecap:round;stroke-linejoin:round;}
.hero-img-wrap{position:relative;align-self:flex-end;}
.hero-img{width:100%;height:380px;object-fit:cover;object-position:center;border-radius:14px 14px 0 0;box-shadow:0 -4px 32px rgba(66,32,200,0.1);}
.h-float{position:absolute;top:18px;left:18px;background:var(--w);border:1px solid var(--bdr);border-radius:12px;padding:12px 16px;box-shadow:var(--sh2);display:flex;align-items:center;gap:10px;}
.hf-dot{width:8px;height:8px;border-radius:50%;background:var(--ok);animation:breathe 2s ease-in-out infinite;}
.hf-n{font-size:19px;font-weight:900;color:var(--b);letter-spacing:-0.5px;}
.hf-l{font-size:11px;color:var(--ink3);margin-top:1px;font-weight:500;}

/* STATS */
.stats{background:var(--bl2);border-bottom:1px solid var(--bdr);}
.stats-in{max-width:1500px;margin:0 auto;display:grid;grid-template-columns:repeat(4,1fr);}
.sc{padding:26px 20px;text-align:center;border-right:1px solid var(--bdr);}
.sc:last-child{border-right:none;}
.sc-n{font-size:36px;font-weight:900;letter-spacing:-1.5px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
.sc-l{font-size:12.5px;color:var(--ink3);font-weight:500;margin-top:4px;line-height:1.4;}

/* SHARED */
.sec{padding:68px 48px;}
.sw{background:var(--w);}
.sbg{background:var(--bg);}
.stint{background:var(--bl2);}
.wrap{max-width:1500px;margin:0 auto;}
.ew{width:16px;height:2.5px;background:var(--gr);border-radius:2px;flex-shrink:0;}
.eyebrow{display:inline-flex;align-items:center;gap:6px;font-size:13px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);margin-bottom:10px;}
.heading{font-size:34px;font-weight:800;line-height:1.30;color:var(--ink);margin-bottom:12px;}
.heading em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
.lead{font-size:16px;color:var(--ink3);line-height:1.76;max-width:1280px;}
.cx{text-align:center;}
.cx .lead{margin:0 auto;}
.cx .eyebrow{justify-content:center;}
.sec-cta{display:inline-flex;align-items:center;gap:7px;margin-top:32px;font-size:14.5px;font-weight:700;padding:11px 22px;border-radius:10px;background:var(--gr);color:#fff;border:none;cursor:pointer;box-shadow:0 3px 12px rgba(66,32,200,0.22);transition:all .2s;font-family:inherit;}
.sec-cta:hover{transform:translateY(-2px);box-shadow:0 5px 18px rgba(66,32,200,0.32);}

/* ── 6 CAPABILITY CARDS ── */
.cap-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:36px;}
.cap-card{background:var(--w);border:1px solid var(--bdr);border-radius:var(--rad);padding:28px 24px;box-shadow:var(--sh);transition:all .22s;position:relative;overflow:hidden;}
.cap-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--gr);border-radius:var(--rad) var(--rad) 0 0;opacity:0;transition:opacity .22s;}
.cap-card:hover{transform:translateY(-3px);box-shadow:var(--sh2);border-color:var(--bdr2);}
.cap-card:hover::before,.cap-card.feat::before{opacity:1;}
.cap-card.feat{background:linear-gradient(160deg,var(--bl2),var(--bl));border-color:var(--bdr2);}
.cap-num{font-size:10.5px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);margin-bottom:14px;display:flex;align-items:center;gap:6px;}
.cap-num-dot{width:5px;height:5px;border-radius:50%;background:var(--b);}
.cap-ic{width:46px;height:46px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin-bottom:15px;}
.cap-ic svg{width:21px;height:21px;stroke:var(--b);stroke-width:1.8;fill:none;stroke-linecap:round;stroke-linejoin:round;}
.cap-card.feat .cap-ic{background:var(--gr);box-shadow:0 4px 14px rgba(66,32,200,0.28);}
.cap-card.feat .cap-ic svg{stroke:#fff;}
.cap-h{font-size:17px;font-weight:800;color:var(--ink);letter-spacing:-.5px;margin-bottom:9px;line-height:1.3;}
.cap-d{font-size:13.5px;color:var(--ink3);line-height:1.7;margin-bottom:14px;}
.cap-pts{display:flex;flex-direction:column;gap:6px;}
.cap-pt{display:flex;align-items:flex-start;gap:7px;font-size:12.5px;color:var(--ink3);}
.cap-pt svg{width:13px;height:13px;flex-shrink:0;margin-top:2px;stroke:var(--ok);stroke-width:2.5;fill:none;stroke-linecap:round;stroke-linejoin:round;}

/* ── AI DEMO MOCKUP ── */
.demo-split{display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center;}
.ai-demo{background:var(--w);border:1px solid var(--bdr);border-radius:18px;padding:22px;box-shadow:var(--sh3);overflow:hidden;}
.ai-demo-header{display:flex;align-items:center;gap:8px;margin-bottom:16px;padding-bottom:14px;border-bottom:1px solid var(--bdr);}
.ai-dots{display:flex;gap:5px;}
.ai-dot{width:10px;height:10px;border-radius:50%;}
.ai-dot.r{background:#FF5F57;}.ai-dot.y{background:#FEBC2E;}.ai-dot.g{background:#28C840;}
.ai-demo-title{font-size:12px;font-weight:700;color:var(--ink4);margin-left:6px;}
.ai-live{display:flex;align-items:center;gap:5px;font-size:11px;font-weight:700;color:var(--ok);margin-left:auto;}
.ai-live-dot{width:6px;height:6px;border-radius:50%;background:var(--ok);animation:breathe 1.5s infinite;}
.ai-chat{display:flex;flex-direction:column;gap:10px;margin-bottom:14px;}
.cb{border-radius:12px;padding:11px 14px;font-size:13px;line-height:1.6;max-width:86%;}
.cb-user{background:var(--bl2);border:1px solid var(--bdr);color:var(--ink2);align-self:flex-end;border-radius:12px 12px 3px 12px;font-weight:500;}
.cb-ai{background:var(--gr);color:#fff;align-self:flex-start;border-radius:12px 12px 12px 3px;}
.cb-ai-lbl{font-size:10px;font-weight:800;color:rgba(255,255,255,.6);text-transform:uppercase;letter-spacing:.06em;margin-bottom:3px;}
.ai-typing{display:flex;align-items:center;gap:6px;font-size:12px;color:var(--ink4);padding:8px 12px;background:var(--bg);border:1px solid var(--bdr);border-radius:8px;width:fit-content;}
.tdots{display:flex;gap:3px;}
.td{width:5px;height:5px;border-radius:50%;background:var(--b);animation:tdot 1.2s infinite;}
.td:nth-child(2){animation-delay:.2s;}.td:nth-child(3){animation-delay:.4s;}
@keyframes tdot{0%,80%,100%{opacity:.3;transform:scale(.8)}40%{opacity:1;transform:scale(1)}}
.ai-chips{display:grid;grid-template-columns:1fr 1fr 1fr;gap:8px;margin-top:10px;}
.aichip{background:var(--bg);border:1px solid var(--bdr);border-radius:8px;padding:10px 10px;text-align:center;}
.aichip-n{font-size:15px;font-weight:900;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;letter-spacing:-.5px;}
.aichip-l{font-size:10px;color:var(--ink4);font-weight:600;margin-top:2px;}

/* HOW IT WORKS */
.steps-row{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;margin-top:36px;position:relative;}
.steps-row::before{content:'';position:absolute;top:33px;left:calc(12.5% + 8px);right:calc(12.5% + 8px);height:1.5px;background:linear-gradient(90deg,transparent,var(--b),transparent);opacity:.3;}
.step-box{text-align:center;padding:0 8px;position:relative;z-index:1;}
.step-num{width:64px;height:64px;border-radius:50%;border:2px solid var(--bdr2);background:var(--w);display:flex;align-items:center;justify-content:center;margin:0 auto 18px;font-size:22px;font-weight:900;color:var(--b);transition:all .22s;box-shadow:var(--sh);}
.step-box:hover .step-num{background:var(--b);border-color:var(--b);color:#fff;box-shadow:0 4px 16px rgba(66,32,200,0.28);}
.step-h{font-size:15px;font-weight:700;color:var(--ink);margin-bottom:8px;letter-spacing:-.3px;}
.step-p{font-size:13px;color:var(--ink3);line-height:1.65;}

/* COMPARE TABLE */
.comp-wrap{background:var(--w);border:1px solid var(--bdr);border-radius:var(--rad);overflow:hidden;box-shadow:var(--sh);margin-top:36px;}
.comp-head{display:grid;grid-template-columns:1.6fr 1fr 1fr;border-bottom:1.5px solid var(--bdr);}
.cph{padding:14px 20px;font-size:11px;font-weight:800;letter-spacing:.09em;text-transform:uppercase;color:var(--ink3);background:var(--bg);}
.cph.hl{background:var(--gr);color:rgba(255,255,255,0.75);text-align:center;}
.cph:last-child:not(.hl){text-align:center;}
.comp-row{display:grid;grid-template-columns:1.6fr 1fr 1fr;border-bottom:1px solid var(--bdr);}
.comp-row:last-child{border-bottom:none;}
.crc{padding:14px 20px;font-size:13.5px;font-weight:500;color:var(--ink3);display:flex;align-items:center;justify-content:center;gap:5px;}
.crc:first-child{justify-content:flex-start;font-weight:600;color:var(--ink);}
.crc.hl{background:var(--bl2);justify-content:center;}
.cr-no{color:#E53E3E;font-weight:600;}.cr-yes{color:var(--ok);font-weight:700;}

/* TESTIMONIALS */
.tc-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:36px;}
.tc{background:var(--w);border:1px solid var(--bdr);border-radius:18px;padding:26px;display:flex;flex-direction:column;box-shadow:var(--sh);transition:all .22s;}
.tc:hover{transform:translateY(-3px);box-shadow:var(--sh2);border-color:var(--bdr2);}
.tc.feat{background:var(--gr);border-color:transparent;box-shadow:0 8px 28px rgba(66,32,200,0.22);}
.tc-stars{font-size:11.5px;letter-spacing:2.5px;color:var(--b);margin-bottom:12px;}
.tc.feat .tc-stars{color:var(--bl);}
.tc-q{font-size:38px;font-weight:900;line-height:1;color:var(--b);opacity:.16;margin-bottom:4px;}
.tc.feat .tc-q{color:#fff;opacity:.2;}
.tc-body{font-size:13.5px;line-height:1.76;color:var(--ink3);flex:1;margin-bottom:18px;}
.tc.feat .tc-body{color:rgba(255,255,255,.74);}
.tc-author{display:flex;align-items:center;gap:10px;}
.tc-av{width:38px;height:38px;border-radius:50%;font-size:13px;font-weight:800;color:#fff;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.tc-name{font-size:13.5px;font-weight:700;color:var(--ink);}
.tc.feat .tc-name{color:#fff;}
.tc-role{font-size:11.5px;color:var(--ink4);margin-top:1px;}
.tc.feat .tc-role{color:rgba(255,255,255,.48);}

/* FAQ */
.faq-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:32px;}
.fi{border:1.5px solid var(--bdr);border-radius:13px;background:var(--w);transition:all .18s;}
.fi.open{border-color:var(--bdr2);box-shadow:var(--sh);}
.fi-q{display:flex;justify-content:space-between;align-items:center;gap:12px;padding:15px 18px;font-size:14.5px;font-weight:700;color:var(--ink);line-height:1.4;cursor:pointer;}
.fi-t{width:23px;height:23px;min-width:23px;border-radius:50%;background:var(--bl);display:flex;align-items:center;justify-content:center;transition:transform .2s,background .2s;}
.fi-t svg{width:12px;height:12px;stroke:var(--b);stroke-width:2.5;fill:none;stroke-linecap:round;}
.fi.open .fi-t{transform:rotate(45deg);background:var(--b);}
.fi.open .fi-t svg{stroke:#fff;}
.fi-a{display:none;padding:0 18px 15px;font-size:13.5px;line-height:1.74;color:var(--ink3);border-top:1px solid var(--bdr);padding-top:12px;}
.fi.open .fi-a{display:block;}
.fi-a a{color:var(--b);font-weight:600;}

/* RELATED */
.uc-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:36px;}
.ucc{background:var(--w);border:1px solid var(--bdr);border-radius:var(--rad);overflow:hidden;box-shadow:var(--sh);transition:all .22s;display:flex;flex-direction:column;}
.ucc:hover{transform:translateY(-3px);box-shadow:var(--sh2);border-color:var(--bdr2);}
.ucc img{width:100%;height:148px;object-fit:cover;}
.ucc-body{padding:16px 18px;flex:1;display:flex;flex-direction:column;}
.ucc-tag{font-size:10px;font-weight:800;letter-spacing:.09em;text-transform:uppercase;color:var(--b);background:var(--bl);padding:2px 8px;border-radius:5px;display:inline-block;margin-bottom:8px;}
.ucc-t{font-size:14.5px;font-weight:700;color:var(--ink);margin-bottom:6px;line-height:1.4;}
.ucc-d{font-size:12.5px;color:var(--ink3);line-height:1.6;margin-bottom:12px;flex:1;}
.ucc-link{display:inline-flex;align-items:center;gap:4px;font-size:12.5px;font-weight:700;color:var(--b);}
.ucc-link svg{width:11px;height:11px;stroke:var(--b);stroke-width:2.5;fill:none;transition:transform .16s;}
.ucc-link:hover svg{transform:translateX(3px);}

/* CTA */
.cta-sec{background:var(--bl2);border-top:1px solid var(--bdr);padding:68px 48px;text-align:center;position:relative;overflow:hidden;}
.cta-sec::before{content:'';position:absolute;inset:0;background:radial-gradient(circle 300px at 50% 50%,rgba(66,32,200,0.05),transparent);pointer-events:none;}
.cta-in{max-width:600px;margin:0 auto;position:relative;z-index:1;}
.cta-tag{display:inline-block;background:var(--b);color:#fff;border-radius:100px;padding:4px 14px;font-size:10.5px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;margin-bottom:16px;}
.cta-h{font-size:38px;font-weight:900;letter-spacing:-1.6px;line-height:1.1;color:var(--ink);margin-bottom:12px;}
.cta-h em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
.cta-p{font-size:16px;color:var(--ink3);line-height:1.72;margin-bottom:26px;}
.cta-btns{display:flex;gap:10px;justify-content:center;flex-wrap:wrap;margin-bottom:12px;}
.cta-note{font-size:12px;color:var(--ink4);}


@media(max-width:960px){
  .nav{padding:0 20px;}.nav-links{display:none;}
  .hero-grid{grid-template-columns:1fr;gap:32px;}
  .hero{padding:40px 24px 0;}.hero-img{height:260px;}.hero h1{font-size:34px;}
  .cap-grid,.tc-grid,.uc-grid,.faq-grid{grid-template-columns:1fr 1fr;}
  .steps-row{grid-template-columns:1fr 1fr;}.steps-row::before{display:none;}
  .demo-split{grid-template-columns:1fr;}
  .sec{padding:48px 24px;}
  .stats-in{grid-template-columns:1fr 1fr;}
  .foot-g{grid-template-columns:1fr 1fr;}
  .cta-sec{padding:48px 24px;}.cta-h{font-size:30px;}
}
@media(max-width:600px){
  .cap-grid,.tc-grid,.uc-grid,.faq-grid,.steps-row{grid-template-columns:1fr;}
  .stats-in,.foot-g{grid-template-columns:1fr;}
}
</style>
@endpush

@section('content')
 <!-- HERO -->
<header class="hero">
  <div class="hero-grid">
    <div>
      <nav class="bc" aria-label="Breadcrumb">
        <a href="https://kp.kprise.com">Home</a>
        <span class="bc-sep">/</span>
        <a href="https://kp.kprise.com/about/platform">Platform</a>
        <span class="bc-sep">/</span>
        <span>AI Capabilities</span>
      </nav>
      <div class="htag"><span class="htag-dot"></span><span>Agentic AI Powered</span></div>
      <h1>AI That Executes.<br><em>Not Just Assists.</em></h1>
      <p class="hero-sub">
        From content generation and essay grading to virtual proctoring and real-time learner guidance —
        <strong>the AI layer in MyPass LMS reduces manual effort at every stage of your training workflow.</strong>
        No add-ons. No extra cost. All included.
      </p>
      <div class="hbtns">
        <a href="https://mypasslms.us/login#register" class="btn-a">Try AI Features Free for 15 Days</a>
        <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b">Book a Demo</a>
      </div>
      <div class="trust-row">
        <div class="tchip"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>All AI features included</div>
        <div class="tchip"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>No credit card needed</div>
        <div class="tchip"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>No extra cost for AI</div>
      </div>
    </div>
    <div class="hero-img-wrap">
      <img class="hero-img"
        src="https://picsum.photos/seed/ai-tech/960/380"
        alt="AI-powered training platform showing automated course generation and learner analytics in real time"
        width="960" height="380" loading="eager">
      <div class="h-float">
        <div class="hf-dot"></div>
        <div>
          <div class="hf-n">80%</div>
          <div class="hf-l">Faster course creation with AI</div>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- STATS -->
<div class="stats">
  <div class="stats-in">
    <div class="sc"><div class="sc-n">80%</div><div class="sc-l">Faster course creation vs manual authoring</div></div>
    <div class="sc"><div class="sc-n">70%</div><div class="sc-l">Reduction in training admin work per week</div></div>
    <div class="sc"><div class="sc-n">4x</div><div class="sc-l">Faster time from idea to live published course</div></div>
    <div class="sc"><div class="sc-n">10 min</div><div class="sc-l">Average time from file upload to published course</div></div>
  </div>
</div>

<!-- ── 6 CORE AI CAPABILITIES ── -->
<section class="sec sw">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Six AI Capabilities</div>
      <h2 class="heading">Every AI Feature Built Into<br><em>Your Training Workflow.</em></h2>
      <p class="lead cx">Not experimental features bolted on as marketing. Each capability was designed around the most time-consuming parts of running a training programme — and built to eliminate them entirely.</p>
    </div>
    <!-- ROW 1 — Content Gen + Essay Grading side by side (2 col) -->
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-top:36px;">

      <!-- 01 AI Content Generation -->
      <div class="cap-card feat" style="margin-top:0;">
        <div class="cap-num"><span class="cap-num-dot"></span>01 — Content Generation</div>
        <div class="cap-ic"><svg viewBox="0 0 22 22"><rect x="2" y="3" width="18" height="14" rx="2"/><path d="M7 8h8M7 12h5"/></svg></div>
        <h3 class="cap-h">Generate course drafts, summaries and explanations in seconds.</h3>
        <p class="cap-d">Upload any file or describe a topic in plain language. The AI builds a complete, structured course with sections, objectives, content and assessments — ready to review and publish.</p>
        <div class="cap-pts">
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Supports PDF, Word, PowerPoint, video and plain text input</div>
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Generates learning objectives, explanations, examples and knowledge checks</div>
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Full SCORM packaging built in — no external authoring tool needed</div>
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Every section fully editable before publishing — human control always maintained</div>
        </div>
      </div>

      <!-- 02 AI Essay Grading -->
      <div class="cap-card" style="margin-top:0;">
        <div class="cap-num"><span class="cap-num-dot"></span>02 — Essay Grading</div>
        <div class="cap-ic"><svg viewBox="0 0 22 22"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><path d="M14 2v6h6M16 13H8M16 17H8M10 9H8"/></svg></div>
        <h3 class="cap-h">Grade open-text responses at scale without losing instructor oversight.</h3>
        <p class="cap-d">The AI evaluates written answers against rubrics you define, suggests a score with transparent reasoning, and delivers feedback to learners. Instructors approve, adjust or override every decision.</p>
        <div class="cap-pts">
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>AI evaluates written responses against instructor-defined rubrics</div>
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Suggested score and full reasoning shown — instructor approves or overrides</div>
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>AI-generated feedback delivered to learners automatically on completion</div>
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Batch grading across large cohorts takes minutes, not hours</div>
        </div>
      </div>
    </div>

    <!-- ROW 2 — E-Proctoring full width (its own row, no blank neighbours) -->
    <div style="margin-top:18px;">
      <!-- 03 Virtual E-Proctoring -->
      <div class="cap-card" style="width:100%;">
        <style>
          .proct-inner{display:grid;grid-template-columns:1fr 1fr;gap:32px;align-items:start;}
          .proct-left{}
          .detect-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-top:16px;}
          .detect-badge{background:var(--bg);border:1px solid var(--bdr);border-radius:10px;padding:13px 14px;display:flex;align-items:flex-start;gap:10px;transition:all .2s;}
          .detect-badge:hover{border-color:var(--bdr2);background:var(--bl2);transform:translateY(-2px);box-shadow:var(--sh);}
          .detect-icon{width:34px;height:34px;border-radius:8px;background:var(--bl);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
          .detect-icon svg{width:16px;height:16px;stroke:var(--b);fill:none;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round;}
          .detect-label{font-size:12.5px;font-weight:700;color:var(--ink);line-height:1.35;margin-bottom:2px;}
          .detect-sub{font-size:11px;color:var(--ink4);line-height:1.5;}
          .proct-footer{display:flex;align-items:center;gap:20px;margin-top:18px;padding-top:16px;border-top:1px solid var(--bdr);flex-wrap:wrap;}
          .proct-chip{display:flex;align-items:center;gap:5px;font-size:12px;font-weight:600;color:var(--ink4);}
          .proct-chip svg{width:12px;height:12px;stroke:var(--ok);fill:none;stroke-width:2.5;stroke-linecap:round;}
          @media(max-width:960px){.proct-inner{grid-template-columns:1fr;}.detect-grid{grid-template-columns:1fr 1fr;}}
          @media(max-width:600px){.detect-grid{grid-template-columns:1fr;}}
        </style>
        <div class="cap-num"><span class="cap-num-dot"></span>03 — Virtual E-Proctoring</div>
        <div class="proct-inner">
          <div class="proct-left">
            <div class="cap-ic"><svg viewBox="0 0 22 22"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
            <h3 class="cap-h">Monitor assessments remotely with AI — no human proctor required.</h3>
            <p class="cap-d">The AI uses computer vision and behavioural analysis to monitor learners throughout the assessment. It detects a wide range of integrity violations in real time and delivers a full flag report to administrators after every session — without interrupting the exam.</p>
            <div class="cap-pts">
              <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Runs entirely in the browser — no software installation or plugin needed</div>
              <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Each violation is timestamped and logged in a post-session report for admin review</div>
              <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Exam continues uninterrupted — flags are reviewed after, not during the session</div>
              <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Audit-ready reports for compliance certifications and high-stakes assessments</div>
            </div>
          </div>
          <div>
            <div style="font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);margin-bottom:12px;">What the AI Detects</div>
            <div class="detect-grid">
              <div class="detect-badge">
                <div class="detect-icon"><svg viewBox="0 0 22 22"><rect x="5" y="2" width="12" height="19" rx="2"/><circle cx="11" cy="17" r="1"/><path d="M8 6h6"/></svg></div>
                <div>
                  <div class="detect-label">Phone Usage</div>
                  <div class="detect-sub">Mobile device visible on camera during assessment</div>
                </div>
              </div>
              <div class="detect-badge">
                <div class="detect-icon"><svg viewBox="0 0 22 22"><path d="M2 6h18v14H2z"/><path d="M6 2v4M16 2v4M8 12h6M8 16h4"/></svg></div>
                <div>
                  <div class="detect-label">Book or Notes</div>
                  <div class="detect-sub">Physical reference material detected in frame</div>
                </div>
              </div>
              <div class="detect-badge">
                <div class="detect-icon"><svg viewBox="0 0 22 22"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg></div>
                <div>
                  <div class="detect-label">Multiple Persons</div>
                  <div class="detect-sub">More than one person present in the camera view</div>
                </div>
              </div>
              <div class="detect-badge">
                <div class="detect-icon"><svg viewBox="0 0 22 22"><circle cx="11" cy="11" r="9"/><path d="M11 7v4M11 15h.01"/></svg></div>
                <div>
                  <div class="detect-label">Learner Absent</div>
                  <div class="detect-sub">Face not visible or learner leaves the camera frame</div>
                </div>
              </div>
              <div class="detect-badge">
                <div class="detect-icon"><svg viewBox="0 0 22 22"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg></div>
                <div>
                  <div class="detect-label">Tab Switching</div>
                  <div class="detect-sub">Learner navigates away from the exam window</div>
                </div>
              </div>
              <div class="detect-badge">
                <div class="detect-icon"><svg viewBox="0 0 22 22"><path d="M8 4H6a2 2 0 00-2 2v14a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2"/><rect x="8" y="2" width="8" height="4" rx="1"/><path d="M8 12h6M8 16h4"/></svg></div>
                <div>
                  <div class="detect-label">Copy and Paste</div>
                  <div class="detect-sub">Clipboard activity detected during the assessment</div>
                </div>
              </div>
            </div>
            <div class="proct-footer">
              <div class="proct-chip"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>No software install</div>
              <div class="proct-chip"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Works on any device</div>
              <div class="proct-chip"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Full flag report per session</div>
              <div class="proct-chip"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Exam never interrupted</div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- end proctoring row -->

    <!-- ROW 3 — Survey + Assistant + Automation (3 col) -->
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:18px;">

      <!-- 04 AI Survey Generation -->
      <div class="cap-card">
        <div class="cap-num"><span class="cap-num-dot"></span>04 — Survey Generation</div>
        <div class="cap-ic"><svg viewBox="0 0 22 22"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg></div>
        <h3 class="cap-h">Build feedback forms instantly using natural language prompts.</h3>
        <p class="cap-d">Describe the feedback you need and the AI creates the complete survey — question types, answer options and logic — in seconds. Automatically attached to course completions or triggered on a schedule.</p>
        <div class="cap-pts">
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Type your feedback goal in plain English — receive a complete survey structure</div>
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Supports Likert, open-text, rating and multiple-choice question formats</div>
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Auto-deployed on course completion or scheduled triggers</div>
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>AI summarises response themes and surfaces insights without manual analysis</div>
        </div>
      </div>

      <!-- 05 AI Learning Assistant -->
      <div class="cap-card">
        <div class="cap-num"><span class="cap-num-dot"></span>05 — Learning Assistant</div>
        <div class="cap-ic"><svg viewBox="0 0 22 22"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></div>
        <h3 class="cap-h">Prompt-based AI that guides learners and administrators in real time.</h3>
        <p class="cap-d">The AI assistant lives inside the platform and responds to both learners and administrators in plain language. Learners get instant answers about content. Admins issue commands the platform executes immediately.</p>
        <div class="cap-pts">
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Learners ask questions about course content and get contextual answers instantly</div>
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Admins use voice or text to enrol cohorts, send reminders and pull reports</div>
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Multi-step workflows executed in seconds from a single natural language command</div>
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Every AI action is logged with a full audit trail for governance and compliance</div>
        </div>
      </div>

      <!-- 06 AI Smart Automation -->
      <div class="cap-card">
        <div class="cap-num"><span class="cap-num-dot"></span>06 — Smart Automation</div>
        <div class="cap-ic"><svg viewBox="0 0 22 22"><path d="M13 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V9z"/><path d="M13 2v7h7"/><path d="M8 13h8M8 17h5"/></svg></div>
        <h3 class="cap-h">Automated enrollment, reminders and compliance — zero manual intervention.</h3>
        <p class="cap-d">Set rules once and the AI runs your training operation automatically. New users enrolled, deadline reminders sent, compliance dashboards updated and certification records maintained — all without anyone clicking through menus.</p>
        <div class="cap-pts">
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Role-based auto-enrollment triggers the moment a user joins</div>
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Escalating deadline reminders sent automatically as due dates approach</div>
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Compliance dashboards update in real time without manual report runs</div>
          <div class="cap-pt"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Digital certificates issued and stored automatically on completion</div>
        </div>
      </div>

    </div><!-- end row 3 -->
  </div>
</section>

<!-- AI IN ACTION DEMO -->
<section class="sec sbg">
  <div class="wrap">
    <div class="demo-split">
      <div>
        <div class="eyebrow"><span class="ew"></span>AI in Action</div>
        <h2 class="heading">One Instruction.<br><em>The AI Does the Rest.</em></h2>
        <p style="font-size:15px;color:var(--ink3);line-height:1.74;margin-bottom:22px;">This is not a chatbot that points you to a help article. The AI inside MyPass LMS actually executes tasks inside the platform. Give it an instruction — it builds, assigns, grades, monitors and reports.</p>
        <div style="display:flex;flex-direction:column;gap:10px;margin-bottom:28px;">
          <div style="display:flex;align-items:flex-start;gap:10px;font-size:13.5px;color:var(--ink3);">
            <svg width="15" height="15" viewBox="0 0 16 16" fill="none" style="flex-shrink:0;margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Say "Create a cybersecurity awareness course for new hires" — complete 5-module course generated in under 3 minutes
          </div>
          <div style="display:flex;align-items:flex-start;gap:10px;font-size:13.5px;color:var(--ink3);">
            <svg width="15" height="15" viewBox="0 0 16 16" fill="none" style="flex-shrink:0;margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Say "Grade this month's essay submissions for the compliance programme" — all open-text answers evaluated with scores and feedback ready for instructor approval
          </div>
          <div style="display:flex;align-items:flex-start;gap:10px;font-size:13.5px;color:var(--ink3);">
            <svg width="15" height="15" viewBox="0 0 16 16" fill="none" style="flex-shrink:0;margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Say "Who hasn't completed HIPAA training this quarter?" — instant sorted list, no report needed
          </div>
          <div style="display:flex;align-items:flex-start;gap:10px;font-size:13.5px;color:var(--ink3);">
            <svg width="15" height="15" viewBox="0 0 16 16" fill="none" style="flex-shrink:0;margin-top:2px;"><path d="M2 8l4 4 8-8" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Say "Build a post-course feedback survey for the leadership programme" — complete survey with question types and logic deployed in seconds
          </div>
        </div>
        <a href="https://calendly.com/onlinesales-kprise/30min" class="sec-cta">See It Live in 30 Minutes</a>
      </div>
      <div>
        <div class="ai-demo" role="img" aria-label="MyPass LMS AI assistant interface showing a course creation command and automated response">
          <div class="ai-demo-header">
            <div class="ai-dots"><div class="ai-dot r"></div><div class="ai-dot y"></div><div class="ai-dot g"></div></div>
            <div class="ai-demo-title">MyPass LMS AI Assistant</div>
            <div class="ai-live"><div class="ai-live-dot"></div>Active</div>
          </div>
          <div class="ai-chat">
            <div class="cb cb-user">Create a 5-module cybersecurity awareness course for new hires with quizzes and a final assessment</div>
            <div class="cb cb-ai">
              <div class="cb-ai-lbl">MyPass LMS AI</div>
              Course generated. Here is what was built:<br><br>
              Module 1 — Understanding Cyber Threats<br>
              Module 2 — Password Security and Access Control<br>
              Module 3 — Phishing Recognition and Response<br>
              Module 4 — Data Handling and Privacy<br>
              Module 5 — Incident Reporting Procedures<br><br>
              5 knowledge checks and 1 final assessment included. SCORM package ready. Publish or edit any section.
            </div>
            <div class="ai-typing">
              <div class="tdots"><div class="td"></div><div class="td"></div><div class="td"></div></div>
              <span style="font-size:12px;color:var(--ink4);">Generating proctoring settings for final assessment...</span>
            </div>
          </div>
          <div class="ai-chips">
            <div class="aichip"><div class="aichip-n">3 min</div><div class="aichip-l">Build time</div></div>
            <div class="aichip"><div class="aichip-n">5</div><div class="aichip-l">Modules ready</div></div>
            <div class="aichip"><div class="aichip-n">SCORM</div><div class="aichip-l">Packaged</div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="sec stint">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>How It Works</div>
      <h2 class="heading">AI That Fits Inside Your<br><em>Existing Training Workflow.</em></h2>
      <p class="lead cx">The AI layer removes the manual steps you should never have had to do in the first place — without changing how you manage training.</p>
    </div>
    <div class="steps-row">
      <div class="step-box">
        <div class="step-num">01</div>
        <h3 class="step-h">Give the AI an instruction</h3>
        <p class="step-p">Type or speak what you need. Create a course, grade submissions, build a survey, monitor an exam. Use plain language exactly as you'd explain it to a colleague.</p>
      </div>
      <div class="step-box">
        <div class="step-num">02</div>
        <h3 class="step-h">The AI executes immediately</h3>
        <p class="step-p">Courses are structured, essays graded, surveys built, exams monitored. Every action happens in real time — in seconds, not hours.</p>
      </div>
      <div class="step-box">
        <div class="step-num">03</div>
        <h3 class="step-h">Review and approve</h3>
        <p class="step-p">AI outputs are presented for human review before anything goes live. Edit courses, adjust scores, review flags. You stay in full control at every stage.</p>
      </div>
      <div class="step-box">
        <div class="step-num">04</div>
        <h3 class="step-h">Publish and automate</h3>
        <p class="step-p">Once approved, content goes live. Enrollment, reminders, compliance tracking and certification run on autopilot from that point — no manual follow-up.</p>
      </div>
    </div>
    <div style="text-align:center;margin-top:40px;">
      <a href="https://mypasslms.us/login#register" class="sec-cta">Start Free for 15 Days — All AI Included</a>
    </div>
  </div>
</section>



<!-- FAQ -->
<section class="sec sw">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Common Questions</div>
      <h2 class="heading">What People Ask About<br><em>MyPass LMS AI</em></h2>
      <p class="lead cx">If your question is not here, our team responds the same day. Visit our <a href="https://help.kprise.com" target="_blank" rel="noopener" style="color:var(--b);font-weight:700;">Help Center</a> for full documentation.</p>
    </div>
    <div class="faq-grid">
      <div class="fi open">
        <div class="fi-q">Are all six AI features included on every plan?<div class="fi-t"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">Yes. Content generation, essay grading, virtual proctoring, survey generation, the learning assistant and smart automation are all included on every plan at no extra cost. There is no AI tier, no feature gating by plan level and no add-on pricing for any AI capability.</div>
      </div>
      <div class="fi">
        <div class="fi-q">Can instructors override AI essay grades?<div class="fi-t"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">Always. AI essay grading suggests a score and provides full reasoning — but the instructor approves, adjusts or overrides every decision before the score is applied to the learner's record. The AI speeds up grading without removing instructor authority over learner outcomes.</div>
      </div>
      <div class="fi">
        <div class="fi-q">How does virtual e-proctoring work technically?<div class="fi-t"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">The AI uses computer vision and behavioural analysis running entirely in the learner's browser — no software installation or plugin needed. It detects six categories of integrity violation: <strong>phone or device usage</strong> (mobile visible on camera), <strong>books or physical notes</strong> in frame, <strong>multiple persons</strong> present, <strong>learner absence</strong> (face leaves the camera), <strong>tab-switching</strong> away from the exam window, and <strong>copy-paste attempts</strong>. Every flag is timestamped and included in a post-session report for administrator review. The exam itself is never interrupted — flags are reviewed after the session is complete.</div>
      </div>
      <div class="fi">
        <div class="fi-q">How accurate is the AI-generated course content?<div class="fi-t"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">Accuracy tracks closely to your source material because the AI generates content based on the documents or instructions you provide. Every course is presented for human review before publishing — most customers report editing around 20 percent of AI-generated content, with the remaining 80 percent ready to go as generated.</div>
      </div>
      <div class="fi">
        <div class="fi-q">Is there an audit trail for all AI actions?<div class="fi-t"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">Yes. Every AI action — course creation, essay grading, proctoring flags, survey deployment, enrollments and report generation — is logged with a timestamp, the instruction given and the output produced. Compliance and governance teams have complete visibility of all AI activity inside the platform.</div>
      </div>
      <div class="fi">
        <div class="fi-q">What file types does the AI course builder support?<div class="fi-t"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">The AI builder accepts PDF, Word, PowerPoint, plain text and video files. You can also create a course from scratch by typing a topic or objective in plain language — no source file required. All output is SCORM-packaged and ready to publish or edit without any external authoring tool.</div>
      </div>
    </div>
  </div>
</section>

<!-- RELATED -->
<section class="sec sbg">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Explore More</div>
      <h2 class="heading">See the Rest of<br><em>the Platform</em></h2>
    </div>
    <div class="uc-grid">
      <a href="https://kp.kprise.com/about/platform" class="ucc">
        <img src="https://picsum.photos/seed/platform/500/148" alt="Full platform features overview" width="500" height="148" loading="lazy">
        <div class="ucc-body">
          <span class="ucc-tag">Platform</span>
          <div class="ucc-t">Full Platform Overview</div>
          <div class="ucc-d">SCORM authoring, SSO, ILT scheduling, advanced analytics and API access — everything the platform can do.</div>
          <span class="ucc-link">Explore the platform <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></span>
        </div>
      </a>
      <a href="https://kp.kprise.com/use-cases/compliance" class="ucc">
        <img src="https://picsum.photos/seed/compliance/500/148" alt="AI-powered compliance training and automated reporting" width="500" height="148" loading="lazy">
        <div class="ucc-body">
          <span class="ucc-tag">Use Case</span>
          <div class="ucc-t">AI-Powered Compliance Training</div>
          <div class="ucc-d">See how AI automates compliance tracking, generates reminders and produces audit-ready reports without manual effort.</div>
          <span class="ucc-link">See compliance training <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></span>
        </div>
      </a>
      <a href="https://kp.kprise.com/resources/case-study" class="ucc">
        <img src="https://picsum.photos/seed/casestudy/500/148" alt="Customer case studies and real training results" width="500" height="148" loading="lazy">
        <div class="ucc-body">
          <span class="ucc-tag">Case Studies</span>
          <div class="ucc-t">Real Results from Real Teams</div>
          <div class="ucc-d">How organisations used MyPass LMS AI to cut course production from weeks to hours and automate compliance workflows entirely.</div>
          <span class="ucc-link">Read case studies <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></span>
        </div>
      </a>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-sec">
  <div class="cta-in">
    <div class="cta-tag">Start Free — All AI Included</div>
    <h2 class="cta-h">See What AI Looks Like<br><em>When It Actually Works.</em></h2>
    <p class="cta-p">Try all six AI features free for 15 days. Build a real course, run an assessed exam with proctoring, grade essays — no restrictions, no credit card, no commitment.</p>
    <div class="cta-btns">
      <a href="https://mypasslms.us/login#register" class="btn-a">Start Free for 15 Days</a>
      <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b">Book a 30-Minute Demo</a>
    </div>
    <p class="cta-note">15-day free trial · No credit card required · All AI features included · AWS FedRAMP infrastructure</p>
  </div>
</section>




<script>
document.querySelectorAll('.fi-q').forEach(q=>{
  q.addEventListener('click',()=>q.closest('.fi').classList.toggle('open'));
});
</script>
@endsection

@push('schema')
@verbatim
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"SoftwareApplication","name":"MyPass LMS AI Capabilities","applicationCategory":"BusinessApplication","operatingSystem":"Web","description":"MyPass LMS includes six AI capabilities: content generation, essay grading, virtual e-proctoring, survey generation, learning assistant and smart automation. All included on every plan. Start free for 15 days.","offers":{"@type":"Offer","price":"0","priceCurrency":"USD","description":"15-day free trial with full AI feature access, no credit card required"},"provider":{"@type":"Organization","name":"Kprise","url":"https://kprise.com","telephone":"+12403164903","address":{"@type":"PostalAddress","streetAddress":"3905 National Drive, Suite 330","addressLocality":"Burtonsville","addressRegion":"MD","postalCode":"20866","addressCountry":"US"}},"aggregateRating":{"@type":"AggregateRating","ratingValue":"4.7","reviewCount":"47","bestRating":"5"}}
</script>
@endverbatim
@endpush

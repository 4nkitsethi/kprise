@extends('layouts.app')

@push('styles')
    <style>
        /* ─── RESET ─── */
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

        /* ─── NAV ─── */
        .nav{
        position:sticky;top:0;z-index:200;
        height:64px;padding:0 48px;
        background:rgba(255,255,255,0.97);backdrop-filter:blur(20px);
        border-bottom:1px solid var(--bdr);
        display:flex;align-items:center;justify-content:space-between;
        }
        .logo{display:flex;align-items:center;gap:9px;}
        .lmark{width:33px;height:33px;border-radius:9px;background:var(--gr);display:flex;align-items:center;justify-content:center;font-weight:900;font-size:14px;color:#fff;box-shadow:0 3px 10px rgba(66,32,200,0.26);}
        .lname{font-size:17px;font-weight:800;color:var(--ink);letter-spacing:-0.3px;}
        .lname b{color:var(--b);font-weight:800;}
        .nav-links{display:flex;gap:2px;list-style:none;}
        .nav-links a{font-size:13.5px;font-weight:600;color:var(--ink3);padding:6px 10px;border-radius:7px;transition:all .16s;}
        .nav-links a:hover,.nav-links a.act{color:var(--b);background:var(--bl2);}
        .nav-cta{display:flex;gap:8px;align-items:center;}
        .btn-ghost{font-size:13px;font-weight:600;padding:7px 15px;border:1.5px solid var(--bdr2);border-radius:8px;color:var(--ink2);transition:all .16s;cursor:pointer;font-family:inherit;}
        .btn-ghost:hover{border-color:var(--b);color:var(--b);}
        .btn-fill{font-size:13px;font-weight:700;padding:8px 18px;background:var(--gr);color:#fff;border:none;border-radius:8px;box-shadow:0 3px 12px rgba(66,32,200,0.24);transition:all .16s;cursor:pointer;font-family:inherit;}
        .btn-fill:hover{transform:translateY(-1px);box-shadow:0 5px 16px rgba(66,32,200,0.36);}

        /* ─── HERO ─── */
        .hero{
        background:var(--w);
        border-bottom:1px solid var(--bdr);
        padding:52px 48px 0;
        overflow:hidden;position:relative;
        }
        /* gentle right tint */
        .hero::after{
        content:'';position:absolute;top:0;right:0;bottom:0;width:48%;
        background:linear-gradient(to right,transparent,var(--bl2) 40%);
        pointer-events:none;
        }
        .hero-grid{
        max-width:1200px;margin:0 auto;
        display:grid;grid-template-columns:1fr 460px;
        gap:52px;align-items:center;
        position:relative;z-index:1;
        }
        /* breadcrumb */
        .bc{display:flex;align-items:center;gap:6px;margin-bottom:14px;}
        .bc a{font-size:12px;font-weight:600;color:var(--ink4);}
        .bc a:hover{color:var(--b);}
        .bc-sep{font-size:12px;color:var(--bdr2);}
        .bc span{font-size:12px;font-weight:600;color:var(--b);}
        /* pill tag */
        .htag{display:inline-flex;align-items:center;gap:6px;background:var(--bl);border:1px solid var(--bdr2);border-radius:100px;padding:4px 13px 4px 8px;margin-bottom:16px;}
        .htag-dot{width:6px;height:6px;border-radius:50%;background:var(--b);animation:breathe 2s ease-in-out infinite;}
        @keyframes breathe{0%,100%{opacity:1}50%{opacity:.35}}
        .htag span{font-size:11px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:var(--b);}
        /* h1 */
        .hero h1{font-size:44px;font-weight:900;line-height:1.1;letter-spacing:-1.8px;color:var(--ink);margin-bottom:16px;}
        .hero h1 em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
        .hero-sub{font-size:16.5px;line-height:1.74;color:var(--ink3);margin-bottom:28px;max-width:480px;}
        .hero-sub strong{color:var(--ink2);font-weight:600;}
        /* CTA row */
        .hbtns{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:24px;}
        .btn-a{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:14.5px;font-weight:700;padding:12px 24px;border-radius:10px;background:var(--gr);color:#fff;border:none;cursor:pointer;box-shadow:0 4px 14px rgba(66,32,200,0.26);transition:all .2s;}
        .btn-a:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(66,32,200,0.36);}
        .btn-b{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:14.5px;font-weight:600;padding:11px 22px;border-radius:10px;background:var(--w);color:var(--b);border:1.5px solid var(--bdr2);cursor:pointer;transition:all .2s;}
        .btn-b:hover{background:var(--bl);}
        /* trust chips */
        .trust-row{display:flex;gap:16px;flex-wrap:wrap;}
        .tchip{display:flex;align-items:center;gap:5px;font-size:12.5px;font-weight:600;color:var(--ink4);}
        .tchip svg{width:13px;height:13px;stroke:var(--ok);stroke-width:2.5;fill:none;stroke-linecap:round;stroke-linejoin:round;}
        /* hero image */
        .hero-img-wrap{position:relative;align-self:flex-end;}
        .hero-img{width:100%;height:380px;object-fit:cover;object-position:top;border-radius:14px 14px 0 0;box-shadow:0 -4px 32px rgba(66,32,200,0.1);}
        /* floating stat card */
        .h-float{
        position:absolute;top:18px;left:18px;
        background:var(--w);border:1px solid var(--bdr);border-radius:12px;
        padding:12px 16px;box-shadow:var(--sh2);
        display:flex;align-items:center;gap:10px;
        }
        .hf-dot{width:8px;height:8px;border-radius:50%;background:var(--ok);animation:breathe 2s ease-in-out infinite;}
        .hf-n{font-size:19px;font-weight:900;color:var(--b);letter-spacing:-0.5px;}
        .hf-l{font-size:11px;color:var(--ink3);margin-top:1px;font-weight:500;}

        /* ─── LOGO BAR — SCROLLING ─── */
        .logo-bar{background:var(--w);border-bottom:1px solid var(--bdr);padding:20px 0;}
        .lb-lbl{font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--ink4);margin-bottom:14px;text-align:center;padding:0 48px;}
        .lb-track-wrap{overflow:hidden;position:relative;}
        .lb-track-wrap::before,.lb-track-wrap::after{content:'';position:absolute;top:0;bottom:0;width:100px;z-index:2;pointer-events:none;}
        .lb-track-wrap::before{left:0;background:linear-gradient(to right,var(--w),transparent);}
        .lb-track-wrap::after{right:0;background:linear-gradient(to left,var(--w),transparent);}
        .lb-track{display:flex;align-items:center;width:max-content;animation:marquee 30s linear infinite;}
        .lb-track:hover{animation-play-state:paused;}
        @keyframes marquee{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
        .lb-item{display:flex;align-items:center;justify-content:center;padding:0 36px;height:56px;flex-shrink:0;border-right:1px solid var(--bdr);}        .lb-item:hover{opacity:1;filter:grayscale(0);}
        .lb-item:last-of-type{border-right:none;}
        .lb-item svg{height:28px;width:auto;display:block;}

        /* ─── STATS ─── */
        .stats{background:var(--bl2);border-bottom:1px solid var(--bdr);}
        .stats-in{max-width:1200px;margin:0 auto;display:grid;grid-template-columns:repeat(4,1fr);}
        .sc{padding:26px 20px;text-align:center;border-right:1px solid var(--bdr);}
        .sc:last-child{border-right:none;}
        .sc-n{font-size:36px;font-weight:900;letter-spacing:-1.5px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
        .sc-l{font-size:12.5px;color:var(--ink3);font-weight:500;margin-top:4px;line-height:1.4;}

        /* ─── SHARED ─── */
        .sec{padding:68px 48px;}
        .sw{background:var(--w);}
        .sbg{background:var(--bg);}
        .stint{background:var(--bl2);}
        .wrap{max-width:1200px;margin:0 auto;}
        .ew{width:16px;height:2.5px;background:var(--gr);border-radius:2px;flex-shrink:0;}
        .eyebrow{display:inline-flex;align-items:center;gap:6px;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);margin-bottom:10px;}
        .heading{font-size:34px;font-weight:800;line-height:1.13;letter-spacing:-1.2px;color:var(--ink);margin-bottom:12px;}
        .heading em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
        .lead{font-size:16px;color:var(--ink3);line-height:1.76;max-width:580px;}
        .cx{text-align:center;}
        .cx .lead{margin:0 auto;}
        .cx .eyebrow{justify-content:center;}
        /* generic CTA link below a section */
        .sec-cta{display:inline-flex;align-items:center;gap:7px;margin-top:32px;font-size:14.5px;font-weight:700;padding:11px 22px;border-radius:10px;background:var(--gr);color:#fff;border:none;cursor:pointer;box-shadow:0 3px 12px rgba(66,32,200,0.22);transition:all .2s;font-family:inherit;}
        .sec-cta:hover{transform:translateY(-2px);box-shadow:0 5px 18px rgba(66,32,200,0.32);}
        .sec-cta-ghost{display:inline-flex;align-items:center;gap:7px;margin-top:32px;font-size:14.5px;font-weight:600;padding:10px 20px;border-radius:10px;background:transparent;color:var(--b);border:1.5px solid var(--bdr2);cursor:pointer;transition:all .2s;font-family:inherit;}
        .sec-cta-ghost:hover{background:var(--bl);}

        /* ─── VALUE PROP — 3 COL ─── */
        .vp-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:36px;}
        .vpc{background:var(--w);border:1px solid var(--bdr);border-radius:var(--rad);padding:24px 22px;box-shadow:var(--sh);transition:all .22s;position:relative;overflow:hidden;}
        .vpc::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--gr);border-radius:var(--rad) var(--rad) 0 0;opacity:0;transition:opacity .22s;}
        .vpc:hover{transform:translateY(-3px);box-shadow:var(--sh2);border-color:var(--bdr2);}
        .vpc:hover::before{opacity:1;}
        .vpc-ic{width:42px;height:42px;border-radius:11px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin-bottom:13px;}
        .vpc-ic svg{width:20px;height:20px;stroke:var(--b);stroke-width:1.8;fill:none;stroke-linecap:round;stroke-linejoin:round;}
        .vpc-t{font-size:15px;font-weight:700;color:var(--ink);margin-bottom:6px;}
        .vpc-d{font-size:13px;color:var(--ink3);line-height:1.68;}

        /* ─── ALTERNATING FEATURE ROWS ─── */
        .feat-block{padding:0 48px 68px;}
        .feat-wrap{max-width:1200px;margin:0 auto;display:flex;flex-direction:column;gap:72px;}
        .frow{display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center;}
        .frow.flip{direction:rtl;}
        .frow.flip>*{direction:ltr;}
        .frow-img{border-radius:18px;overflow:hidden;box-shadow:var(--sh3);position:relative;}
        .frow-img img{width:100%;height:380px;object-fit:cover;}
        .frow-badge{position:absolute;bottom:14px;left:14px;background:rgba(255,255,255,0.96);border:1px solid var(--bdr);border-radius:10px;padding:9px 14px;display:flex;align-items:center;gap:8px;box-shadow:var(--sh);}
        .fb-ok{width:7px;height:7px;border-radius:50%;background:var(--ok);flex-shrink:0;}
        .fb-t{font-size:12px;font-weight:700;color:var(--ink);}
        .frow-txt .heading{font-size:30px;margin-bottom:10px;}
        .frow-txt p{font-size:15px;color:var(--ink3);line-height:1.74;margin-bottom:12px;}
        .fpts{display:flex;flex-direction:column;gap:9px;margin:16px 0 22px;}
        .fp{display:flex;align-items:flex-start;gap:9px;font-size:13.5px;color:var(--ink3);}
        .fp svg{width:15px;height:15px;flex-shrink:0;margin-top:2px;stroke:var(--ok);stroke-width:2.5;fill:none;stroke-linecap:round;stroke-linejoin:round;}

        /* ─── REVIEW BADGES — REAL IMAGES ─── */
        .badge-row{display:flex;align-items:center;justify-content:center;gap:16px;flex-wrap:wrap;margin-top:28px;}
        .rbadge{background:var(--w);border:1px solid var(--bdr);border-radius:12px;padding:12px 16px;display:flex;align-items:center;justify-content:center;box-shadow:var(--sh);transition:all .2s;height:72px;}
        .rbadge:hover{border-color:var(--bdr2);transform:translateY(-2px);box-shadow:var(--sh2);}
        .rbadge img{height:44px;width:auto;object-fit:contain;display:block;}

        /* ─── TESTIMONIALS — 3 CARDS ─── */
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

        /* ─── INTEGRATION CHIPS ─── */
        .int-box{background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:24px 28px;margin-top:32px;display:flex;gap:20px;align-items:center;flex-wrap:wrap;box-shadow:var(--sh);}
        .int-lbl{font-size:13px;font-weight:700;color:var(--ink3);flex-shrink:0;}
        .int-chips{display:flex;gap:8px;flex-wrap:wrap;flex:1;}
        .ichip{background:var(--bl2);border:1px solid var(--bdr);border-radius:7px;padding:6px 14px;font-size:13px;font-weight:600;color:var(--ink3);transition:all .16s;}
        .ichip:hover{border-color:var(--bdr2);color:var(--b);background:var(--bl);}

        /* ─── RELATED USE CASES ─── */
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

        /* ─── RESOURCES ─── */
        .res-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:36px;}
        .rcard{background:var(--w);border:1px solid var(--bdr);border-radius:var(--rad);padding:20px 20px;box-shadow:var(--sh);transition:all .22s;display:flex;flex-direction:column;}
        .rcard:hover{transform:translateY(-3px);box-shadow:var(--sh2);border-color:var(--bdr2);}
        .rtype{font-size:10px;font-weight:800;letter-spacing:.09em;text-transform:uppercase;color:var(--bm);background:var(--bl);padding:2px 8px;border-radius:5px;display:inline-block;margin-bottom:10px;}
        .rt{font-size:14.5px;font-weight:700;color:var(--ink);margin-bottom:6px;line-height:1.4;}
        .rd{font-size:12.5px;color:var(--ink3);line-height:1.6;margin-bottom:14px;flex:1;}
        .rlink{display:inline-flex;align-items:center;gap:4px;font-size:12.5px;font-weight:700;color:var(--b);}
        .rlink svg{width:11px;height:11px;stroke:var(--b);stroke-width:2.5;fill:none;transition:transform .16s;}
        .rlink:hover svg{transform:translateX(3px);}

        /* ─── FAQ ─── */
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

        /* ─── CTA BAND ─── */
        .cta-sec{background:var(--bl2);border-top:1px solid var(--bdr);padding:68px 48px;text-align:center;position:relative;overflow:hidden;}
        .cta-sec::before{content:'';position:absolute;inset:0;background:radial-gradient(circle 300px at 50% 50%,rgba(66,32,200,0.05),transparent);pointer-events:none;}
        .cta-in{max-width:600px;margin:0 auto;position:relative;z-index:1;}
        .cta-tag{display:inline-block;background:var(--b);color:#fff;border-radius:100px;padding:4px 14px;font-size:10.5px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;margin-bottom:16px;}
        .cta-h{font-size:38px;font-weight:900;letter-spacing:-1.6px;line-height:1.1;color:var(--ink);margin-bottom:12px;}
        .cta-h em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
        .cta-p{font-size:16px;color:var(--ink3);line-height:1.72;margin-bottom:26px;}
        .cta-btns{display:flex;gap:10px;justify-content:center;flex-wrap:wrap;margin-bottom:12px;}
        .cta-note{font-size:12px;color:var(--ink4);}

        .logo-img       { height: 50px; width: auto; flex-shrink: 0; }
        .logo-img:hover { opacity: .9; filter: grayscale(0%); }
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
            <a href="#">Solutions</a>
            <span class="bc-sep">/</span>
            <span>Employee Training</span>
        </nav>
        <div class="htag"><span class="htag-dot"></span><span>Employee Training Software</span></div>
        <h1>Employee Training That<br><em>Builds Real Skills.</em></h1>
        <p class="hero-sub">
            Onboard new hires. Upskill your teams. Stay compliant.
            <strong>MyPass LMS delivers structured, role-specific training automatically</strong>
            so your HR team focuses on people, not on paperwork.
        </p>
        <div class="hbtns">
            <a href="https://mypasslms.us/login#register" class="btn-a">Start Free for 15 Days</a>
            <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b">Book a Demo</a>
        </div>
        <div class="trust-row">
            <div class="tchip"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>No credit card needed</div>
            <div class="tchip"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>15-day free trial</div>
            <div class="tchip"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>AWS FedRAMP infrastructure</div>
        </div>
        </div>
        <div class="hero-img-wrap">
        <img class="hero-img"
            src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=960&q=80&auto=format&fit=crop"
            alt="Employee training session using MyPass LMS">
        <div class="h-float">
            <div class="hf-dot"></div>
            <div>
            <div class="hf-n">87%</div>
            <div class="hf-l">Training completion this week</div>
            </div>
        </div>
        </div>
    </div>
    </header>

    <!-- CLIENT LOGO BAR — SCROLLING WITH SVG LOGOS -->
    <div class="logo-bar">
    <p class="lb-lbl">Trusted by 200+ organisations across 15 countries</p>
    <div class="lb-track-wrap">
        <div class="lb-track">
            @php 
                $trustedLogos = config('services.trustedLogos');
                $trustedLogosClass = 'logo-img lb-item';
            @endphp

            <x-logo-strip
                :logos="$trustedLogos"
                :logo-class="$trustedLogosClass"
            />                 
        </div>
    </div>
    </div>

    <!-- STATS -->
    <div class="stats">
    <div class="stats-in">
        <div class="sc"><div class="sc-n">85%</div><div class="sc-l">Increase in skill retention with structured training</div></div>
        <div class="sc"><div class="sc-n">72%</div><div class="sc-l">Faster time to full productivity for new employees</div></div>
        <div class="sc"><div class="sc-n">70%</div><div class="sc-l">Reduction in training admin work on average</div></div>
        <div class="sc"><div class="sc-n">68%</div><div class="sc-l">Fewer support tickets in the first 30 days</div></div>
    </div>
    </div>

    <!-- WHY MYPASS — 6 VALUE PROPS -->
    <section class="sec sw">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Why MyPass LMS Works</div>
        <h2 class="heading">Stronger Teams. Less Admin.<br><em>Measurable Results.</em></h2>
        <p class="lead cx">Employee training software should make your team more capable and your job easier. Here is what makes MyPass LMS different from every other LMS your team has tried.</p>
        </div>
        <div class="vp-grid">
        <div class="vpc">
            <div class="vpc-ic"><svg viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div>
            <div class="vpc-t">Role-Specific Learning Paths</div>
            <div class="vpc-d">Training that matches what each employee actually needs for their role. Not generic content that everyone ignores after day two.</div>
        </div>
        <div class="vpc">
            <div class="vpc-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
            <div class="vpc-t">Admin That Runs Itself</div>
            <div class="vpc-d">Enrolments, reminders, tracking, and reports all happen automatically. Your HR team focuses on people, not on chasing completions.</div>
        </div>
        <div class="vpc">
            <div class="vpc-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
            <div class="vpc-t">Real-Time Progress Data</div>
            <div class="vpc-d">Know exactly who has completed what and who is behind without waiting for end-of-quarter reports or manual data exports.</div>
        </div>
        <div class="vpc">
            <div class="vpc-ic"><svg viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg></div>
            <div class="vpc-t">Courses Without a Content Team</div>
            <div class="vpc-d">Upload a document or video and the AI builder converts it into a structured training module in minutes. No specialist required.</div>
        </div>
        <div class="vpc">
            <div class="vpc-ic"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
            <div class="vpc-t">Compliance That Does Not Slip</div>
            <div class="vpc-d">Mandatory training tracked automatically, certificates issued on completion, and audit reports generated the moment you need them.</div>
        </div>
        <div class="vpc">
            <div class="vpc-ic"><svg viewBox="0 0 24 24"><rect x="2" y="2" width="9" height="9" rx="2"/><rect x="13" y="2" width="9" height="9" rx="2"/><rect x="2" y="13" width="9" height="9" rx="2"/><rect x="13" y="13" width="9" height="9" rx="2"/></svg></div>
            <div class="vpc-t">Connects to Your Existing Stack</div>
            <div class="vpc-d">HRIS integration and SSO so new employees are added automatically and access training through a single sign-on without a new password.</div>
        </div>
        </div>
        <div style="text-align:center;">
        <a href="{{ route('product.features') }}" class="sec-cta">See All Platform Features</a>
        </div>
    </div>
    </section>

    <!-- ALTERNATING FEATURE SECTIONS -->
    <div class="feat-block sw">
    <div class="feat-wrap">

        <!-- Row 1: Role-based paths -->
        <div class="frow">
        <div class="frow-img">
            <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?w=880&q=80&auto=format&fit=crop"
            alt="Role-specific learning paths for employee training">
            <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Auto-assigned by role on day one</span></div>
        </div>
        <div class="frow-txt">
            <div class="eyebrow"><span class="ew"></span>Role-Based Learning Paths</div>
            <h2 class="heading">Training That Fits<br>the <em>Role, Not the Calendar.</em></h2>
            <p>Every role has different training needs. A new sales hire does not need the same onboarding path as a compliance manager or a warehouse team member. MyPass LMS lets you build separate training journeys for every position in your organisation.</p>
            <p>When a new employee joins, the right path triggers automatically based on their department and role. No HR manager needs to manually assign anything and no new hire falls through the cracks.</p>
            <div class="fpts">
            <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Unlimited role-specific paths with prerequisites and gated progression</div>
            <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Automatic enrolment based on department, role, location, and seniority</div>
            <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Every path tracked individually with real-time completion data</div>
            </div>
        </div>
        </div>

        <!-- Row 2: Course library (flipped) -->
        <div class="frow flip">
        <div class="frow-img">
            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=880&q=80&auto=format&fit=crop"
            alt="Ready-made employee training course library in MyPass LMS">
            <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">50+ courses ready to deploy today</span></div>
        </div>
        <div class="frow-txt">
            <div class="eyebrow"><span class="ew"></span>Ready-Made Course Library</div>
            <h2 class="heading">Start Training on Day One.<br><em>No Content Creation Required.</em></h2>
            <p>You should not need to build a single course before your team starts training. MyPass LMS includes a professionally built course library covering the topics every organisation needs from day one.</p>
            <p>Compliance, workplace ethics, workplace safety, data protection, onboarding fundamentals, and leadership programmes are all ready to assign immediately. Use the library on its own or alongside content you build yourself.</p>
            <div class="fpts">
            <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>50+ courses across compliance, ethics, safety, and professional skills</div>
            <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>SCORM-ready and assignable immediately after sign-up</div>
            <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Customise any course or use it exactly as built</div>
            </div>
            <a href="{{ route('courses') }}" class="sec-cta">Browse the Course Library</a>
        </div>
        </div>

        <!-- Row 3: Compliance and reporting -->
        <div class="frow">
        <div class="frow-img">
            <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=880&q=80&auto=format&fit=crop"
            alt="Employee compliance training tracking and audit reporting">
            <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Audit report ready in seconds</span></div>
        </div>
        <div class="frow-txt">
            <div class="eyebrow"><span class="ew"></span>Compliance and Reporting</div>
            <h2 class="heading">Compliance Evidence.<br><em>Instantly. Every Time.</em></h2>
            <p>When an audit arrives you should not spend three days pulling a compliance report together from five different spreadsheets. Every completion, every assessment, and every certificate is recorded automatically in MyPass LMS the moment it happens.</p>
            <p>Set mandatory training requirements, schedule automated reminders before deadlines, and generate filtered compliance reports for any team, role, or individual in seconds.</p>
            <div class="fpts">
            <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Full audit trail of every learner action recorded automatically</div>
            <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Automated reminders before certification renewal deadlines</div>
            <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Dynamic reports filtered by team, course, date, or individual</div>
            </div>
            <a href="{{ route('solutions.compliance-training') }}" class="sec-cta">See Compliance Features</a>
        </div>
        </div>

        <!-- Row 4: AI course builder (flipped) -->
        <div class="frow flip">
        <div class="frow-img">
            <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=880&q=80&auto=format&fit=crop"
            alt="AI course builder for employee training content creation">
            <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Upload to live course in under 5 minutes</span></div>
        </div>
        <div class="frow-txt">
            <div class="eyebrow"><span class="ew"></span>AI Course Builder</div>
            <h2 class="heading">Turn Any Document Into<br>a <em>Polished Training Course.</em></h2>
            <p>Upload a PDF, a PowerPoint, or a recorded video and the AI course builder converts it into a structured, interactive training module with assessments and quizzes included. No instructional design experience needed and no external authoring tool required.</p>
            <p>Update content as your processes change and publish revisions in minutes. All enrolled learners see the updated version immediately without any manual redistribution.</p>
            <div class="fpts">
            <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Accepts PDFs, PowerPoints, videos, and SCORM files</div>
            <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Quizzes and assessments generated automatically</div>
            <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Publish and update without any specialist support</div>
            </div>
            <a href="{{ route('product.features') }}" class="sec-cta">Learn About Course Creation</a>
        </div>
        </div>

    </div>
    </div>

    <!-- REVIEW BADGES + TESTIMONIALS -->
    <section class="sec stint">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Rated by Real Users</div>
        <h2 class="heading">Recognised Across Every<br><em>Major Software Review Platform</em></h2>
        <p class="lead cx">Independent ratings from the platforms HR and L&D professionals use to evaluate training software.</p>
        </div>
        <!-- rating badges — real images from kprise.com -->
        <div class="badge-row">
        <div class="rbadge"><img src="https://kprise.com/wp-content/uploads/2025/12/1.webp" alt="MyPass LMS rated on Capterra 2024"></div>
        <div class="rbadge"><img src="https://kprise.com/wp-content/uploads/2025/12/2.webp" alt="MyPass LMS listed as GetApp Leader 2024"></div>
        <div class="rbadge"><img src="https://kprise.com/wp-content/uploads/2025/12/3.webp" alt="MyPass LMS Software Advice FrontRunner 2024"></div>
        <div class="rbadge"><img src="https://kprise.com/wp-content/uploads/2025/12/4.png" alt="MyPass LMS Best LMS 2024"></div>
        <div class="rbadge"><img src="https://brand-assets.capterra.com/badge/65ccdf80-7500-42bf-8e6f-aaa875f7613c.svg" alt="Capterra verified badge"></div>
        <div class="rbadge"><img src="https://brand-assets.getapp.com/badge/f7329061-8cc8-4015-8dbd-9c68980f086d.png" alt="GetApp verified badge"></div>
        <div class="rbadge"><img src="https://brand-assets.softwareadvice.com/badge/6aeb2175-cd8d-4d46-b212-ddd1b623365b.png" alt="Software Advice verified badge"></div>
        <div class="rbadge"><img src="https://www.softwaresuggest.com/award_logo/highly-recommended-winter-2025.png" alt="SoftwareSuggest Highly Recommended"></div>
        <div class="rbadge"><img src="https://www.softwaresuggest.com/award_logo/best-support-winter-2025.png" alt="SoftwareSuggest Best Support"></div>
        <div class="rbadge"><img src="https://www.softwareworld.co/customer-choice.png" alt="SoftwareWorld Customer Choice"></div>
        </div>
    </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="sec sw">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Customer Stories</div>
        <h2 class="heading">What Our Customers<br><em>Actually Say About Us</em></h2>
        <p class="lead cx">Real feedback from organisations that switched to MyPass LMS. Not marketing copy. Their words.</p>
        </div>
        <div class="tc-grid">
        <div class="tc feat">
            <div class="tc-stars">★ ★ ★ ★ ★</div>
            <div class="tc-q">"</div>
            <div class="tc-body">We have been a Kprise client for over four years and Kprise has constantly been there to support our needs. The platform looks and feels entirely like ours. The team treats every problem like it is their own problem. I would recommend MyPass LMS to any organisation that wants serious training infrastructure without the complexity that usually comes with it.</div>
            <div class="tc-author">
            <div class="tc-av" style="background:linear-gradient(135deg,#4220C8,#7B5EEA);">SD</div>
            <div>
                <div class="tc-name">Shawn D.</div>
                <div class="tc-role">Founder and Director · American Board for Teacher Excellence</div>
            </div>
            </div>
        </div>
        <div class="tc">
            <div class="tc-stars">★ ★ ★ ★ ★</div>
            <div class="tc-q">"</div>
            <div class="tc-body">Their customer support is beyond helpful. The team were available at all hours and very professional. MyPass LMS is extremely customisable and the support in making the LMS feel like our own brand was something we did not expect at this price point. It is very easy to navigate for both admins and learners from the very first day.</div>
            <div class="tc-author">
            <div class="tc-av" style="background:linear-gradient(135deg,#2A7A5C,#1D5C45);">AS</div>
            <div>
                <div class="tc-name">Ashleigh S.</div>
                <div class="tc-role">Senior Career and Learning Partner · UAE</div>
            </div>
            </div>
        </div>
        <div class="tc">
            <div class="tc-stars">★ ★ ★ ★ ★</div>
            <div class="tc-q">"</div>
            <div class="tc-body">I am wondering why I never contacted these guys sooner. Seriously, they all have commendable talent in their respective fields. The attention to detail in the platform and the genuine responsiveness of the team are rare in this space. We moved from a much larger vendor and have not looked back once since making the switch.</div>
            <div class="tc-author">
            <div class="tc-av" style="background:linear-gradient(135deg,#A06830,#7A4E20);">RN</div>
            <div>
                <div class="tc-name">Raghu Nath</div>
                <div class="tc-role">President · E-Learning</div>
            </div>
            </div>
        </div>
        </div>
        <div style="text-align:center;">
        <a href="https://kp.kprise.com/resources/case-study" class="sec-cta-ghost">Read Full Case Studies</a>
        </div>
    </div>
    </section>

    <!-- INTEGRATIONS -->
    <section class="sec sbg">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Integrations</div>
        <h2 class="heading">Works With the Tools<br><em>Your Team Already Uses</em></h2>
        <p class="lead cx">MyPass LMS connects to your existing HR stack via standard API and SSO. New employees are added automatically when created in your HR system and access training through single sign-on without a separate password.</p>
        </div>
        <div style="display:grid;grid-template-columns:repeat(5,1fr);gap:14px;margin-top:32px;">

        <div style="background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:22px 18px;text-align:center;box-shadow:var(--sh);transition:all .22s;" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='var(--sh2)';this.style.borderColor='var(--bdr2)'" onmouseout="this.style.transform='';this.style.boxShadow='var(--sh)';this.style.borderColor='var(--bdr)'">
            <div style="width:48px;height:48px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;">
            <svg width="26" height="26" viewBox="0 0 26 26" fill="none"><rect x="3" y="3" width="9" height="9" rx="2" fill="#4220C8"/><rect x="14" y="3" width="9" height="9" rx="2" fill="#4220C8" opacity=".5"/><rect x="3" y="14" width="9" height="9" rx="2" fill="#4220C8" opacity=".5"/><rect x="14" y="14" width="9" height="9" rx="2" fill="#4220C8"/></svg>
            </div>
            <div style="font-size:14px;font-weight:800;color:var(--ink);margin-bottom:5px;">Okta</div>
            <div style="font-size:12px;color:var(--ink4);line-height:1.5;">Single sign-on so every employee accesses training with one existing login</div>
        </div>

        <div style="background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:22px 18px;text-align:center;box-shadow:var(--sh);transition:all .22s;" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='var(--sh2)';this.style.borderColor='var(--bdr2)'" onmouseout="this.style.transform='';this.style.boxShadow='var(--sh)';this.style.borderColor='var(--bdr)'">
            <div style="width:48px;height:48px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;">
            <svg width="26" height="26" viewBox="0 0 26 26" fill="none"><circle cx="13" cy="13" r="10" stroke="#4220C8" stroke-width="2.5"/><path d="M13 7v6l4 2" stroke="#4220C8" stroke-width="2" stroke-linecap="round"/></svg>
            </div>
            <div style="font-size:14px;font-weight:800;color:var(--ink);margin-bottom:5px;">Azure AD</div>
            <div style="font-size:12px;color:var(--ink4);line-height:1.5;">Microsoft identity integration for organisations running the Microsoft stack</div>
        </div>

        <div style="background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:22px 18px;text-align:center;box-shadow:var(--sh);transition:all .22s;" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='var(--sh2)';this.style.borderColor='var(--bdr2)'" onmouseout="this.style.transform='';this.style.boxShadow='var(--sh)';this.style.borderColor='var(--bdr)'">
            <div style="width:48px;height:48px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;">
            <svg width="26" height="26" viewBox="0 0 26 26" fill="none"><path d="M13 4C8 4 4 8 4 13s4 9 9 9 9-4 9-9-4-9-9-9z" stroke="#4220C8" stroke-width="2.2"/><path d="M4 13h18M13 4c-2.5 3-4 5.8-4 9s1.5 6 4 9M13 4c2.5 3 4 5.8 4 9s-1.5 6-4 9" stroke="#4220C8" stroke-width="1.6"/></svg>
            </div>
            <div style="font-size:14px;font-weight:800;color:var(--ink);margin-bottom:5px;">BambooHR</div>
            <div style="font-size:12px;color:var(--ink4);line-height:1.5;">New hires enrolled in training automatically when added to your HRIS</div>
        </div>

        <div style="background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:22px 18px;text-align:center;box-shadow:var(--sh);transition:all .22s;" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='var(--sh2)';this.style.borderColor='var(--bdr2)'" onmouseout="this.style.transform='';this.style.boxShadow='var(--sh)';this.style.borderColor='var(--bdr)'">
            <div style="width:48px;height:48px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;">
            <svg width="26" height="26" viewBox="0 0 26 26" fill="none"><rect x="3" y="6" width="20" height="14" rx="3" stroke="#4220C8" stroke-width="2.2"/><path d="M8 12h10M8 16h6" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round"/></svg>
            </div>
            <div style="font-size:14px;font-weight:800;color:var(--ink);margin-bottom:5px;">Zoom</div>
            <div style="font-size:12px;color:var(--ink4);line-height:1.5;">Schedule and manage live training sessions and ILT events alongside online modules</div>
        </div>

        <div style="background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:22px 18px;text-align:center;box-shadow:var(--sh);transition:all .22s;" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='var(--sh2)';this.style.borderColor='var(--bdr2)'" onmouseout="this.style.transform='';this.style.boxShadow='var(--sh)';this.style.borderColor='var(--bdr)'">
            <div style="width:48px;height:48px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;">
            <svg width="26" height="26" viewBox="0 0 26 26" fill="none"><path d="M13 3L4 8v5c0 5.5 3.8 10.7 9 12 5.2-1.3 9-6.5 9-12V8L13 3z" stroke="#4220C8" stroke-width="2.2" stroke-linejoin="round"/><path d="M9 13l3 3 5-5" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <div style="font-size:14px;font-weight:800;color:var(--ink);margin-bottom:5px;">SAML 2.0 SSO</div>
            <div style="font-size:12px;color:var(--ink4);line-height:1.5;">Works with any SAML 2.0 identity provider your organisation already uses</div>
        </div>

        </div>
        <div style="text-align:center;">
        <a href="{{ route('product.integrations') }}" class="sec-cta" style="margin-top:28px;">Check Out All Integrations</a>
        </div>
    </div>
    </section>

    <!-- RELATED USE CASES -->
    <section class="sec sw">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Related Use Cases</div>
        <h2 class="heading">Employee Training Works Best<br>When It Connects to <em>the Full Picture</em></h2>
        <p class="lead cx">Great training programmes cover more than one use case. Explore how MyPass LMS supports every stage of the employee learning lifecycle.</p>
        </div>
        <div class="uc-grid">
        <div class="ucc">
            <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=700&q=80&auto=format&fit=crop" alt="Employee onboarding training">
            <div class="ucc-body">
            <span class="ucc-tag">Use Case</span>
            <div class="ucc-t">Employee Onboarding</div>
            <div class="ucc-d">Structured, role-specific onboarding for every new hire from day one. Consistent, trackable, and automatic regardless of team size or HR availability.</div>
            <a href="https://kp.kprise.com/use-cases/onboarding" class="ucc-link">Read more <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></a>
            </div>
        </div>
        <div class="ucc">
            <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=700&q=80&auto=format&fit=crop" alt="Compliance training for employees">
            <div class="ucc-body">
            <span class="ucc-tag">Use Case</span>
            <div class="ucc-t">Compliance Training</div>
            <div class="ucc-d">Stay audit-ready without the manual effort. Automate mandatory training, track certifications, and generate compliance reports in seconds on demand.</div>
            <a href="{{ route('solutions.compliance-training') }}" class="ucc-link">Read more <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></a>
            </div>
        </div>
        <div class="ucc">
            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=700&q=80&auto=format&fit=crop" alt="Sales team training and enablement">
            <div class="ucc-body">
            <span class="ucc-tag">Use Case</span>
            <div class="ucc-t">Sales Enablement</div>
            <div class="ucc-d">Train sales teams on product knowledge, messaging, and objection handling with structured programmes that keep content current and track individual readiness.</div>
            <a href="https://kp.kprise.com/use-cases/sales" class="ucc-link">Read more <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></a>
            </div>
        </div>
        </div>
    </div>
    </section>

    <!-- RESOURCES -->
    <section class="sec sbg">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Learning Resources</div>
        <h2 class="heading">Guides and Research for<br><em>L&D and HR Professionals</em></h2>
        <p class="lead cx">Practical material for the people who actually build and run training programmes. Written for real decisions, not for clicks.</p>
        </div>
        <div class="res-grid">
        <div class="rcard">
            <span class="rtype">Whitepapers and Guides</span>
            <div class="rt">Learning Insights Hub — Practical Guides for Smarter LMS Decisions</div>
            <div class="rd">Most L&D teams are buried in admin, chasing completions, and struggling to prove ROI. The Learning Insights Hub has whitepapers on how to write an LMS RFP that actually works, how to avoid the most common LMS buying mistakes in 2026, and how AI removes 60 to 80 percent of LMS administrative work. If you are evaluating, upgrading, or rethinking your training platform, this is where to start.</div>
            <a href="https://kprise.com/learning-insights-hub/" class="rlink" target="_blank" rel="noopener">Download the guides <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></a>
        </div>
        <div class="rcard">
            <span class="rtype">Real Customer Stories</span>
            <div class="rt">Case Studies — How Organisations Are Using MyPass LMS to Change How They Train</div>
            <div class="rd">See how real teams across nonprofits, associations, and growing organisations moved from manual training chaos to structured, automated learning programmes. These are not marketing summaries. They are account-by-account breakdowns of what the problem was, what changed when they switched to MyPass LMS, and what the results looked like at 30 days and beyond.</div>
            <a href="https://kprise.com/case-study/" class="rlink" target="_blank" rel="noopener">Read the case studies <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></a>
        </div>
        <div class="rcard">
            <span class="rtype">Independent Comparisons</span>
            <div class="rt">LMS Comparisons — See How MyPass LMS Stacks Up Against Docebo, Moodle, TalentLMS, and More</div>
            <div class="rd">If you are evaluating training platforms and want an honest, feature-by-feature breakdown, this page compares MyPass LMS directly against the most commonly considered alternatives. Each comparison covers user management, AI capabilities, course creation, ILT, reporting, pricing model, and security. No fluff. Just a clear view of where each platform wins and where it does not.</div>
            <a href="https://kprise.com/lms-comparisons/" class="rlink" target="_blank" rel="noopener">Compare platforms <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></a>
        </div>
        </div>
    </div>
    </section>

    <!-- FAQ -->
    <section class="sec sw">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Common Questions</div>
        <h2 class="heading">What People Ask Before<br><em>They Start Their Free Trial</em></h2>
        <p class="lead cx">If your question is not here, our team responds to chat and email the same day. You can also visit our <a href="https://help.kprise.com" target="_blank" rel="noopener" style="color:var(--b);font-weight:700;">Help Center</a> for detailed documentation.</p>
        </div>
        <div class="faq-grid">
        <div class="fi open">
            <div class="fi-q" onclick="this.closest('.fi').classList.toggle('open')">How quickly can we launch our first training programme?<div class="fi-t"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
            <div class="fi-a">Most organisations are running their first live training programme within a few hours of signing up. Using the ready-made course library makes it even faster because the content is already built and ready to assign. No IT involvement, no setup project, and no specialist knowledge required to get started.</div>
        </div>
        <div class="fi">
            <div class="fi-q" onclick="this.closest('.fi').classList.toggle('open')">Can we build separate training tracks for different departments?<div class="fi-t"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
            <div class="fi-a">Yes. MyPass LMS supports unlimited role-specific learning paths. You can build separate tracks for every department, role type, or seniority level. Each path can contain different courses, assessments, timelines, and compliance requirements. The correct path is triggered automatically based on the employee's role when they join.</div>
        </div>
        <div class="fi">
            <div class="fi-q" onclick="this.closest('.fi').classList.toggle('open')">Do we need to create all our own training content?<div class="fi-t"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
            <div class="fi-a">No. You can use the ready-made course library as your complete training solution from day one. You can also build your own courses using the AI builder which converts existing documents, videos, and presentations into structured training modules. Most organisations use both depending on the topic.</div>
        </div>
        <div class="fi">
            <div class="fi-q" onclick="this.closest('.fi').classList.toggle('open')">How does MyPass LMS connect to our existing HR system?<div class="fi-t"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
            <div class="fi-a">MyPass LMS integrates with HR platforms via REST API and SSO. New employees are added to the training platform automatically when created in your HR system. Single sign-on supports Okta, Azure AD, Google Workspace, and any SAML 2.0 provider. For Enterprise deployments our technical team handles the integration directly. <a href="https://kp.kprise.com/about/platform">Learn more about integrations</a>.</div>
        </div>
        <div class="fi">
            <div class="fi-q" onclick="this.closest('.fi').classList.toggle('open')">Is the 15-day free trial genuinely free?<div class="fi-t"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
            <div class="fi-a">Yes, completely. 15-day free trial with no credit card required, no commitment, and no restrictions on what you can use. Build real courses, enrol real employees, run assessments, and generate compliance reports. At the end of the trial you decide whether to continue. Nothing is owed if you do not.</div>
        </div>
        <div class="fi">
            <div class="fi-q" onclick="this.closest('.fi').classList.toggle('open')">Does MyPass LMS work for remote and hybrid teams?<div class="fi-t"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
            <div class="fi-a">Yes. MyPass LMS is cloud-based and fully accessible on any device, browser, and location. Remote employees access training through SSO without creating a new password. Self-paced content with automated reminders keeps remote learners on track without requiring a manager to monitor progress manually.</div>
        </div>
        </div>
    </div>
    </section>

    <!-- CTA -->
    <section class="cta-sec">
    <div class="cta-in">
        <div class="cta-tag">Start Free — No Card Required</div>
        <h2 class="cta-h">Make Employee Training Actually Work.</em></h2>
        <p class="cta-p">Join 200 plus organisations that have moved from informal, inconsistent training to a structured platform that runs automatically and delivers measurable results.</p>
        <div class="cta-btns">
        <a href="https://mypasslms.us/login#register" class="btn-a">Start Free for 15 Days</a>
        <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b">Book a 30-Minute Demo</a>
        </div>
        <p class="cta-note">15-day free trial · No credit card required · Cancel anytime · AWS FedRAMP infrastructure</p>
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
<!-- Schema structured data -->
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"SoftwareApplication","name":"MyPass LMS Employee Training Software","applicationCategory":"BusinessApplication","operatingSystem":"Web","description":"Employee training software with role-based learning paths, automated enrolment, ready-made course library, compliance tracking, and real-time reporting. Start free for 15 days with no credit card required.","offers":{"@type":"Offer","price":"0","priceCurrency":"USD","description":"15-day free trial with full platform access"},"provider":{"@type":"Organization","name":"Kprise","url":"https://kprise.com","telephone":"+12403164903","address":{"@type":"PostalAddress","streetAddress":"3905 National Drive, Suite 330","addressLocality":"Burtonsville","addressRegion":"MD","postalCode":"20866","addressCountry":"US"}},"aggregateRating":{"@type":"AggregateRating","ratingValue":"4.7","reviewCount":"47","bestRating":"5"}}
</script>
@endverbatim
@endpush

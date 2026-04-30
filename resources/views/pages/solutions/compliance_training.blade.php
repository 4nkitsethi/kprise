@extends('layouts.app')

@push('styles')
 <style>
    *,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
    :root{
    --b:#4220C8;--bd:#2D1490;--bm:#7B5EEA;
    --bl:#EEE9FF;--bl2:#F5F2FF;
    --bg:#F8F8FB;--w:#FFFFFF;
    --ink:#0F0C1F;--ink2:#27224A;--ink3:#524D72;--ink4:#9B96B0;
    --ok:#16A34A;
    --bdr:rgba(66,32,200,0.08);--bdr2:rgba(66,32,200,0.16);
    --sh:0 1px 3px rgba(66,32,200,0.04),0 4px 14px rgba(66,32,200,0.06);
    --sh2:0 4px 14px rgba(66,32,200,0.08),0 12px 32px rgba(66,32,200,0.08);
    --sh3:0 8px 24px rgba(66,32,200,0.10),0 20px 48px rgba(66,32,200,0.10);
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
    .btn-ghost{font-size:13px;font-weight:600;padding:7px 15px;border:1.5px solid var(--bdr2);border-radius:8px;color:var(--ink2);transition:all .16s;cursor:pointer;font-family:inherit;}
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
    .hero h1{font-size:44px;font-weight:900;line-height:1.09;letter-spacing:-1.8px;color:var(--ink);margin-bottom:16px;}
    .hero h1 em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
    .hero-sub{font-size:16.5px;line-height:1.74;color:var(--ink3);margin-bottom:28px;max-width:780px;}
    .hero-sub strong{color:var(--ink2);font-weight:600;}
    .hbtns{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:24px;}
    .btn-a{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:14.5px;font-weight:700;padding:12px 24px;border-radius:10px;background:var(--gr);color:#fff;border:none;cursor:pointer;box-shadow:0 4px 14px rgba(66,32,200,0.26);transition:all .2s;}
    .btn-a:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(66,32,200,0.36);}
    .btn-b{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:14.5px;font-weight:600;padding:11px 22px;border-radius:10px;background:var(--w);color:var(--b);border:1.5px solid var(--bdr2);cursor:pointer;transition:all .2s;}
    .btn-b:hover{background:var(--bl);}
    .trust-row{display:flex;gap:16px;flex-wrap:wrap;}
    .tchip{display:flex;align-items:center;gap:5px;font-size:12.5px;font-weight:600;color:var(--ink4);}
    .tchip svg{width:13px;height:13px;stroke:var(--ok);stroke-width:2.5;fill:none;stroke-linecap:round;stroke-linejoin:round;}
    .hero-img-wrap{position:relative;align-self:flex-end;}
    .hero-img{width:100%;height:380px;object-fit:cover;object-position:center;border-radius:14px 14px 0 0;box-shadow:0 -4px 32px rgba(66,32,200,0.1);}
    .h-float{position:absolute;top:18px;left:18px;background:var(--w);border:1px solid var(--bdr);border-radius:12px;padding:12px 16px;box-shadow:var(--sh2);display:flex;align-items:center;gap:10px;}
    .hf-dot{width:8px;height:8px;border-radius:50%;background:var(--ok);animation:breathe 2s ease-in-out infinite;}
    .hf-n{font-size:19px;font-weight:900;color:var(--b);letter-spacing:-0.5px;}
    .hf-l{font-size:11px;color:var(--ink3);margin-top:1px;font-weight:500;}

    /* LOGO BAR */
    .logo-bar{background:var(--w);border-bottom:1px solid var(--bdr);padding:20px 0;}
    .lb-lbl{font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--ink4);margin-bottom:14px;text-align:center;padding:0 48px;}
    .lb-track-wrap{overflow:hidden;position:relative;}
    .lb-track-wrap::before,.lb-track-wrap::after{content:'';position:absolute;top:0;bottom:0;width:100px;z-index:2;pointer-events:none;}
    .lb-track-wrap::before{left:0;background:linear-gradient(to right,var(--w),transparent);}
    .lb-track-wrap::after{right:0;background:linear-gradient(to left,var(--w),transparent);}
    .lb-track {display: flex;align-items: center;width: max-content;opacity: 0;visibility: hidden;animation: marquee 60s linear infinite,showAfterLoad 0.5s ease forwards;animation-delay: 0s,1s; }
    @keyframes showAfterLoad {
      to {
        opacity: 1;
        visibility: visible;
      }
    }

    .lb-track:hover{animation-play-state:paused;}
    @keyframes marquee{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
    .lb-item{display:flex;align-items:center;justify-content:center;padding:0 36px;height:40px;flex-shrink:0;border-right:1px solid var(--bdr);}
    .lb-item:hover{opacity:1;filter:grayscale(0);}
    .lb-item svg{height:28px;width:auto;display:block;}

    /* STATS */
    .stats{background:var(--bl2);border-bottom:1px solid var(--bdr);}
    .stats-in{max-width:1200px;margin:0 auto;display:grid;grid-template-columns:repeat(4,1fr);}
    .sc{padding:26px 20px;text-align:center;border-right:1px solid var(--bdr);}
    .sc:last-child{border-right:none;}
    .sc-n{font-size:36px;font-weight:900;letter-spacing:-1.5px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
    .sc-l{font-size:12.5px;color:var(--ink3);font-weight:500;margin-top:4px;line-height:1.4;}

    /* SHARED */
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
    .sec-cta{display:inline-flex;align-items:center;gap:7px;margin-top:32px;font-size:14.5px;font-weight:700;padding:11px 22px;border-radius:10px;background:var(--gr);color:#fff;border:none;cursor:pointer;box-shadow:0 3px 12px rgba(66,32,200,0.22);transition:all .2s;font-family:inherit;}
    .sec-cta:hover{transform:translateY(-2px);box-shadow:0 5px 18px rgba(66,32,200,0.32);}
    .sec-cta-ghost{display:inline-flex;align-items:center;gap:7px;margin-top:32px;font-size:14.5px;font-weight:600;padding:10px 20px;border-radius:10px;background:transparent;color:var(--b);border:1.5px solid var(--bdr2);cursor:pointer;transition:all .2s;font-family:inherit;}
    .sec-cta-ghost:hover{background:var(--bl);}

    /* RISK CARDS */
    .risk-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:36px;}
    .risk-card{background:var(--w);border:1px solid var(--bdr);border-radius:var(--rad);padding:24px 22px;box-shadow:var(--sh);transition:all .22s;position:relative;overflow:hidden;}
    .risk-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--gr);border-radius:var(--rad) var(--rad) 0 0;opacity:0;transition:opacity .22s;}
    .risk-card:hover{transform:translateY(-3px);box-shadow:var(--sh2);border-color:var(--bdr2);}
    .risk-card:hover::before{opacity:1;}
    .rc-ic{width:44px;height:44px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin-bottom:13px;}
    .rc-ic svg{width:22px;height:22px;stroke:var(--b);stroke-width:1.8;fill:none;stroke-linecap:round;stroke-linejoin:round;}
    .rc-t{font-size:15.5px;font-weight:700;color:var(--ink);margin-bottom:6px;}
    .rc-d{font-size:13px;color:var(--ink3);line-height:1.68;}

    /* COMPLIANCE TYPE CHIPS */
    .compliance-types{background:var(--bg);border:1px solid var(--bdr);border-radius:14px;padding:24px 26px;margin-top:28px;box-shadow:var(--sh);}
    .ct-lbl{font-size:13px;font-weight:700;color:var(--ink3);margin-bottom:12px;}
    .ct-chips{display:flex;gap:8px;flex-wrap:wrap;}
    .ct-chip{background:var(--w);border:1px solid var(--bdr);border-radius:8px;padding:7px 14px;font-size:13px;font-weight:600;color:var(--ink2);transition:all .18s;}
    .ct-chip:hover{border-color:var(--bdr2);background:var(--bl);color:var(--b);}

    /* FEATURE ROWS */
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

    /* AUDIT BAND — light */
    .audit-band{background:var(--bl2);border-top:1px solid var(--bdr);border-bottom:1px solid var(--bdr);padding:56px 48px;}
    .audit-inner{max-width:1200px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center;}
    .ab-h{font-size:34px;font-weight:900;line-height:1.12;letter-spacing:-1.2px;color:var(--ink);margin-bottom:14px;}
    .ab-h span{color:var(--ink3);font-weight:700;font-size:30px;}
    .ab-p{font-size:16px;line-height:1.72;color:var(--ink3);margin-bottom:24px;}
    .ab-btn{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:14.5px;font-weight:700;padding:12px 24px;border-radius:10px;background:var(--gr);color:#fff;border:none;cursor:pointer;box-shadow:0 4px 16px rgba(66,32,200,0.26);transition:all .2s;}
    .ab-btn:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(66,32,200,0.36);}
    .ab-metrics{display:flex;flex-direction:column;gap:16px;}
    .abm{background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:20px 22px;display:flex;gap:18px;align-items:center;box-shadow:var(--sh);}
    .abm-n{font-size:38px;font-weight:900;letter-spacing:-1.5px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;flex-shrink:0;min-width:88px;}
    .abm-t{font-size:14px;font-weight:700;color:var(--ink);margin-bottom:3px;}
    .abm-d{font-size:12.5px;color:var(--ink3);line-height:1.5;}

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

    /* REVIEW BADGES */
    .badge-row{display:flex;align-items:center;justify-content:center;gap:16px;flex-wrap:wrap;margin-top:28px;}
    .rbadge{background:var(--w);border:1px solid var(--bdr);border-radius:12px;padding:12px 16px;display:flex;align-items:center;justify-content:center;box-shadow:var(--sh);transition:all .2s;height:72px;}
    .rbadge:hover{border-color:var(--bdr2);transform:translateY(-2px);box-shadow:var(--sh2);}
    .rbadge img{height:44px;width:auto;object-fit:contain;display:block;}

    /* INTEGRATIONS */
    .int-box{background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:24px 28px;margin-top:32px;display:flex;gap:20px;align-items:center;flex-wrap:wrap;box-shadow:var(--sh);}
    .int-lbl{font-size:13px;font-weight:700;color:var(--ink3);flex-shrink:0;}
    .int-chips{display:flex;gap:8px;flex-wrap:wrap;flex:1;}
    .ichip{background:var(--bl2);border:1px solid var(--bdr);border-radius:7px;padding:6px 14px;font-size:13px;font-weight:600;color:var(--ink3);transition:all .16s;}
    .ichip:hover{border-color:var(--bdr2);color:var(--b);background:var(--bl);}

    /* RELATED USE CASES */
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

    /* RESOURCES */
    .res-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:36px;}
    .rcard{background:var(--w);border:1px solid var(--bdr);border-radius:var(--rad);padding:20px;box-shadow:var(--sh);transition:all .22s;display:flex;flex-direction:column;}
    .rcard:hover{transform:translateY(-3px);box-shadow:var(--sh2);border-color:var(--bdr2);}
    .rtype{font-size:10px;font-weight:800;letter-spacing:.09em;text-transform:uppercase;color:var(--bm);background:var(--bl);padding:2px 8px;border-radius:5px;display:inline-block;margin-bottom:10px;}
    .rt{font-size:14.5px;font-weight:700;color:var(--ink);margin-bottom:6px;line-height:1.4;}
    .rd{font-size:12.5px;color:var(--ink3);line-height:1.6;margin-bottom:14px;flex:1;}
    .rlink{display:inline-flex;align-items:center;gap:4px;font-size:12.5px;font-weight:700;color:var(--b);}
    .rlink svg{width:11px;height:11px;stroke:var(--b);stroke-width:2.5;fill:none;transition:transform .16s;}
    .rlink:hover svg{transform:translateX(3px);}

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


 </style>
@endpush

@section('content')
<!-- HERO -->
<header class="hero">
  <div class="hero-grid">
    <div>
      <nav class="bc" aria-label="Breadcrumb">
        <a href="https://kp.kprise.com">Home</a><span class="bc-sep">/</span>
        <a href="#">Solutions</a><span class="bc-sep">/</span>
        <span>Compliance Training</span>
      </nav>
      <div class="htag"><span class="htag-dot"></span><span>Compliance and Regulatory Training</span></div>
      <h1>Stay Audit-Ready.<br><em>Automate Every Deadline.</em></h1>
      <p class="hero-sub">Compliance failures are expensive. Missed training deadlines, absent documentation, and manual tracking create real legal and regulatory exposure. <strong>MyPass LMS automates mandatory compliance training end to end</strong> — from assignment and reminders through to certification and audit-ready reporting.</p>
      <div class="hbtns">
        <a href="https://mypasslms.us/login#register" class="btn-a">Start Free for 15 Days</a>
        <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b">Book a Demo</a>
      </div>
      <div class="trust-row">
        <div class="tchip"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>No credit card required</div>
        <div class="tchip"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>15-day free trial</div>
        <div class="tchip"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>AWS FedRAMP infrastructure</div>
      </div>
    </div>
    <div class="hero-img-wrap">
      <img class="hero-img" src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=960&q=80&auto=format&fit=crop" alt="Compliance training management with MyPass LMS">
      <div class="h-float"><div class="hf-dot"></div><div><div class="hf-n">100%</div><div class="hf-l">Audit trail — every completion recorded</div></div></div>
    </div>
  </div>
</header>

<!-- SCROLLING LOGOS -->
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
    <div class="sc"><div class="sc-n">35%</div><div class="sc-l">Improvement in compliance completion rates with automation</div></div>
    <div class="sc"><div class="sc-n">70%</div><div class="sc-l">Reduction in time spent managing compliance admin manually</div></div>
    <div class="sc"><div class="sc-n">100%</div><div class="sc-l">Audit trail coverage — every completion recorded automatically</div></div>
    <div class="sc"><div class="sc-n">3 sec</div><div class="sc-l">Time to generate a full compliance report on demand</div></div>
  </div>
</div>

<!-- WHY COMPLIANCE FAILS -->
<section class="sec sw">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>The Real Cost of Poor Compliance</div>
      <h2 class="heading">Non-Compliance Is Not Just a Policy Problem.<br><em>It Is a Business Risk.</em></h2>
      <p class="lead cx">Organisations that rely on manual compliance tracking — spreadsheets, email reminders, and assumption — carry exposure they often cannot see until it is too late. Here is where it breaks down most often.</p>
    </div>
    <div class="risk-grid">
      <div class="risk-card">
        <div class="rc-ic"><svg viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></div>
        <div class="rc-t">Missed Deadlines Create Legal Exposure</div>
        <div class="rc-d">When certification renewals and mandatory training deadlines are tracked manually, they get missed. A single absent HIPAA or data protection training record can expose your organisation to regulatory fines and reputational damage that no spreadsheet can prevent.</div>
      </div>
      <div class="risk-card">
        <div class="rc-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
        <div class="rc-t">No Proof When You Need It Most</div>
        <div class="rc-d">Auditors do not accept good intentions as evidence. When an audit arrives you need immediate, accurate records of who completed what and when. Manual tracking cannot produce that quickly or reliably, and the cost of failing an audit far exceeds the cost of fixing the process before one arrives.</div>
      </div>
      <div class="risk-card">
        <div class="rc-ic"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg></div>
        <div class="rc-t">Inconsistent Training Across Your Teams</div>
        <div class="rc-d">When compliance training depends on individual managers to assign and follow up, some employees receive it consistently and others do not. That inconsistency is itself a compliance risk — particularly in regulated sectors where every team member must meet the same documented standard.</div>
      </div>
    </div>
    <div class="compliance-types">
      <div class="ct-lbl">Compliance types covered by MyPass LMS:</div>
      <div class="ct-chips">
        <span class="ct-chip">HIPAA</span>
        <span class="ct-chip">GDPR and Data Protection</span>
        <span class="ct-chip">Workplace Health and Safety</span>
        <span class="ct-chip">Anti-Harassment and Conduct</span>
      </div>
      <div style="margin-top:14px;">
        <a href="https://kp.kprise.com" style="display:inline-flex;align-items:center;gap:6px;font-size:13px;font-weight:700;color:var(--b);text-decoration:none;border-bottom:2px solid var(--bl);padding-bottom:1px;transition:border-color .18s;" onmouseover="this.style.borderColor='var(--b)'" onmouseout="this.style.borderColor='var(--bl)'">Browse the full compliance course library <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 2 9 6 3 10"/></svg></a>
      </div>
    </div>
    <div style="text-align:center;"><a href="{{ route('product.features') }}" class="sec-cta">See All Platform Features</a></div>
  </div>
</section>

<!-- READY-MADE COMPLIANCE COURSES -->
<section class="sec sbg">
  <div class="wrap">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center;">
      <div>
        <div class="eyebrow"><span class="ew"></span>Ready-Made Compliance Courses</div>
        <h2 class="heading">Deploy Compliance Training<br><em>From Day One. No Setup.</em></h2>
        <p style="font-size:15px;color:var(--ink3);line-height:1.76;margin-bottom:14px;">You do not need to build compliance content before you can start training your team. MyPass LMS includes a professionally built library of compliance and regulatory courses covering the topics every organisation needs most — ready to assign immediately after sign-up.</p>
        <p style="font-size:15px;color:var(--ink3);line-height:1.76;margin-bottom:20px;">Every course is built by subject matter experts, reviewed for accuracy, and designed to hold learner attention — not just tick a box. Use them as-is or customise them to match your organisation's specific policies and terminology.</p>
        <div style="display:flex;flex-direction:column;gap:10px;margin-bottom:28px;">
          <div style="display:flex;align-items:center;gap:9px;font-size:13.5px;color:var(--ink3);">
            <svg width="15" height="15" viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
            HIPAA, GDPR, and data protection fundamentals
          </div>
          <div style="display:flex;align-items:center;gap:9px;font-size:13.5px;color:var(--ink3);">
            <svg width="15" height="15" viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
            Workplace health, safety, and anti-harassment training
          </div>
          <div style="display:flex;align-items:center;gap:9px;font-size:13.5px;color:var(--ink3);">
            <svg width="15" height="15" viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
            Safeguarding, anti-bribery, and information security courses
          </div>
          <div style="display:flex;align-items:center;gap:9px;font-size:13.5px;color:var(--ink3);">
            <svg width="15" height="15" viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
            All courses SCORM-ready and assignable immediately after sign-up
          </div>
        </div>
        <a href="{{ route('courses') }}" class="sec-cta">Browse the Course Library</a>
      </div>
      <div>
        <div style="display:flex;flex-direction:column;gap:14px;">
          <div style="background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:18px 20px;box-shadow:var(--sh);display:flex;gap:14px;align-items:flex-start;">
            <div style="width:40px;height:40px;min-width:40px;border-radius:10px;background:var(--bl);display:flex;align-items:center;justify-content:center;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <div>
              <div style="font-size:14.5px;font-weight:700;color:var(--ink);margin-bottom:4px;">Workplace Compliance Essentials</div>
              <div style="font-size:12.5px;color:var(--ink3);line-height:1.6;">HIPAA, GDPR, data privacy, and workplace conduct. Everything your team must complete before working with sensitive data or customer-facing roles.</div>
              <div style="font-size:11px;font-weight:700;color:var(--b);margin-top:6px;background:var(--bl);display:inline-block;padding:2px 9px;border-radius:5px;">12 Modules · All Levels</div>
            </div>
          </div>
          <div style="background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:18px 20px;box-shadow:var(--sh);display:flex;gap:14px;align-items:flex-start;">
            <div style="width:40px;height:40px;min-width:40px;border-radius:10px;background:var(--bl);display:flex;align-items:center;justify-content:center;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
            </div>
            <div>
              <div style="font-size:14.5px;font-weight:700;color:var(--ink);margin-bottom:4px;">Anti-Harassment and Workplace Conduct</div>
              <div style="font-size:12.5px;color:var(--ink3);line-height:1.6;">Clear standards for workplace behaviour, conflict of interest, equality, and professional conduct — applicable across all roles and seniority levels.</div>
              <div style="font-size:11px;font-weight:700;color:var(--b);margin-top:6px;background:var(--bl);display:inline-block;padding:2px 9px;border-radius:5px;">8 Modules · All Levels</div>
            </div>
          </div>
          <div style="background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:18px 20px;box-shadow:var(--sh);display:flex;gap:14px;align-items:flex-start;">
            <div style="width:40px;height:40px;min-width:40px;border-radius:10px;background:var(--bl);display:flex;align-items:center;justify-content:center;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
            </div>
            <div>
              <div style="font-size:14.5px;font-weight:700;color:var(--ink);margin-bottom:4px;">Workplace Health and Safety</div>
              <div style="font-size:12.5px;color:var(--ink3);line-height:1.6;">Safety inductions, risk awareness, fire safety, and emergency procedures. Covers both office and operational environments with role-specific tracks available.</div>
              <div style="font-size:11px;font-weight:700;color:var(--b);margin-top:6px;background:var(--bl);display:inline-block;padding:2px 9px;border-radius:5px;">10 Modules · All Levels</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FEATURE ROWS -->
<div class="feat-block sw">
  <div class="feat-wrap">

    <div class="frow">
      <div class="frow-img">
        <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?w=880&q=80&auto=format&fit=crop" alt="Automated compliance training assignment">
        <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Assignments triggered automatically on hire or renewal</span></div>
      </div>
      <div class="frow-txt">
        <div class="eyebrow"><span class="ew"></span>Automated Assignments and Reminders</div>
        <h2 class="heading">Set Compliance Training Once.<br><em>Run It Forever.</em></h2>
        <p>Manual assignment is where compliance programmes fall apart. When someone joins a new department or a certification is due for renewal, relying on a person to remember and action it is not a system — it is a gamble.</p>
        <p>MyPass LMS automates the entire assignment workflow. Set rules based on role, department, hire date, or certification expiry and the platform assigns the right training to the right people automatically. No HR intervention needed.</p>
        <div class="fpts">
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Auto-assign mandatory training based on role, location, or hire date</div>
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Scheduled reminders sent before deadlines — no manual follow-up ever</div>
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Renewal cycles configured once and recurring automatically from that point</div>
        </div>
      </div>
    </div>

    <div class="frow flip">
      <div class="frow-img">
        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=880&q=80&auto=format&fit=crop" alt="Compliance audit reporting dashboard">
        <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Full audit report generated in seconds</span></div>
      </div>
      <div class="frow-txt">
        <div class="eyebrow"><span class="ew"></span>Audit-Ready Reporting</div>
        <h2 class="heading">Prove Compliance<br><em>In Seconds. Not Days.</em></h2>
        <p>When an auditor asks for compliance evidence, you should not need three days and five spreadsheets to respond. Every completion, every assessment result, and every certificate issuance in MyPass LMS is recorded automatically the moment it happens.</p>
        <p>Generate filtered compliance reports for any team, course, individual, or date range immediately. Export in the format your auditor needs and share with full confidence in the accuracy of every record.</p>
        <div class="fpts">
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Real-time dashboard showing live compliance status across your organisation</div>
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Filterable reports by team, department, course, individual, or date</div>
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Every record timestamped and exportable for any regulatory submission</div>
        </div>
        <a href="{{ route('product.features') }}" class="sec-cta">See Reporting Features</a>
      </div>
    </div>

    <div class="frow">
      <div class="frow-img">
        <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=880&q=80&auto=format&fit=crop" alt="Compliance assessment and knowledge verification">
        <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Pass marks enforced before certificate issuance</span></div>
      </div>
      <div class="frow-txt">
        <div class="eyebrow"><span class="ew"></span>Assessments That Confirm Real Understanding</div>
        <h2 class="heading">Completing a Course Is Not<br><em>the Same as Understanding It.</em></h2>
        <p>Clicking through a compliance module does not mean the content was understood or retained. MyPass LMS includes a full assessment engine with mandatory pass marks, retake cooldown periods, and automatic alerts when someone fails a critical compliance assessment.</p>
        <p>Certificates are issued only after pass marks are achieved — giving you genuine evidence of competency rather than just a completion tick. Assessments are fully configurable per course and per regulatory requirement.</p>
        <div class="fpts">
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Mandatory pass marks before progression or certificate issuance</div>
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Automatic alerts when a learner fails a compliance assessment</div>
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Scenario-based compliance checks that test real application of knowledge</div>
        </div>
      </div>
    </div>

    <div class="frow flip">
      <div class="frow-img">
        <img src="https://images.unsplash.com/photo-1606326608606-aa0b62935f2b?w=880&q=80&auto=format&fit=crop" alt="Automated compliance certification management">
        <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Certificates issued and renewed automatically</span></div>
      </div>
      <div class="frow-txt">
        <div class="eyebrow"><span class="ew"></span>Certification Management</div>
        <h2 class="heading">Certificates That Renew<br><em>Themselves on Schedule.</em></h2>
        <p>Compliance certifications expire. Managing renewals manually — tracking who expires when, sending reminders, reassigning courses, reissuing certificates — is exactly the kind of administrative burden that causes things to slip.</p>
        <p>MyPass LMS manages the entire certification lifecycle automatically. Set the renewal interval once per compliance type and the platform handles every subsequent renewal cycle indefinitely with no human involvement required after initial setup.</p>
        <div class="fpts">
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Branded certificates issued automatically on successful course completion</div>
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Renewal cycles configured once and running automatically from that point</div>
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>All certificates stored in the learner record and auditable at any moment</div>
        </div>
        <a href="{{ route('product.features') }}" class="sec-cta">See Certification Features</a>
      </div>
    </div>

  </div>
</div>

<!-- AUDIT BAND -->
<div class="audit-band">
  <div class="audit-inner">
    <div>
      <h2 class="ab-h">Always Audit-Ready.<br><span>Not Just at Audit Time.</span></h2>
      <p class="ab-p">The difference between organisations that pass audits confidently and those that scramble is not the standard they follow — it is whether their records are maintained continuously or assembled under pressure. MyPass LMS keeps compliance evidence current every day automatically.</p>
      <a href="https://calendly.com/onlinesales-kprise/30min" class="ab-btn">See It in a 30-Minute Demo</a>
    </div>
    <div class="ab-metrics">
      <div class="abm"><div class="abm-n">68%</div><div><div class="abm-t">Fewer compliance incidents after structured training</div><div class="abm-d">Organisations with automated compliance programmes report significantly fewer policy violations and regulatory incidents year on year.</div></div></div>
      <div class="abm"><div class="abm-n">35%</div><div><div class="abm-t">Better completion rates with automated reminders</div><div class="abm-d">Automated deadline reminders consistently outperform manual follow-up for compliance completion rates across all training topics.</div></div></div>
      <div class="abm"><div class="abm-n">0 hrs</div><div><div class="abm-t">Manual report preparation time for audits</div><div class="abm-d">When compliance records are maintained automatically, audit preparation is a button click — not a multi-day project for your HR team.</div></div></div>
    </div>
  </div>
</div>

<!-- REVIEW BADGES -->
<section class="sec stint">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Recognised Across Review Platforms</div>
      <h2 class="heading">Rated by the People Who<br><em>Actually Use the Platform</em></h2>
      <p class="lead cx">Independent ratings from HR and compliance professionals who evaluated MyPass LMS against the full range of available training platforms.</p>
    </div>
    <div class="badge-row">
      <div class="rbadge"><img src="https://kprise.com/wp-content/uploads/2025/12/1.webp" alt="Capterra 2024"></div>
      <div class="rbadge"><img src="https://kprise.com/wp-content/uploads/2025/12/2.webp" alt="GetApp Leader 2024"></div>
      <div class="rbadge"><img src="https://kprise.com/wp-content/uploads/2025/12/3.webp" alt="Software Advice FrontRunner 2024"></div>
      <div class="rbadge"><img src="https://kprise.com/wp-content/uploads/2025/12/4.png" alt="Best LMS 2024"></div>
      <div class="rbadge"><img src="https://brand-assets.capterra.com/badge/65ccdf80-7500-42bf-8e6f-aaa875f7613c.svg" alt="Capterra badge"></div>
      <div class="rbadge"><img src="https://brand-assets.getapp.com/badge/f7329061-8cc8-4015-8dbd-9c68980f086d.png" alt="GetApp badge"></div>
      <div class="rbadge"><img src="https://brand-assets.softwareadvice.com/badge/6aeb2175-cd8d-4d46-b212-ddd1b623365b.png" alt="Software Advice badge"></div>
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
      <h2 class="heading">What Compliance Teams Say<br><em>After Switching to MyPass LMS</em></h2>
    </div>
    <div class="tc-grid">
      <div class="tc feat">
        <div class="tc-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div>
        <div class="tc-q">&ldquo;</div>
        <div class="tc-body">The compliance reporting alone justified the decision to switch. We can pull an audit-ready report for any team or course in seconds. What used to take three days of manual spreadsheet work now takes ten seconds. Our regulatory review went through without a single challenge for the first time in years because every record was there, accurate, and timestamped.</div>
        <div class="tc-author"><div class="tc-av" style="background:linear-gradient(135deg,#A06830,#7A4E20);">RN</div><div><div class="tc-name">Raghu Nath</div><div class="tc-role">President &middot; E-Learning Organisation</div></div></div>
      </div>
      <div class="tc">
        <div class="tc-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div>
        <div class="tc-q">&ldquo;</div>
        <div class="tc-body">We have been a Kprise client for over four years. The compliance tracking capabilities were one of the main reasons we stayed. Being able to demonstrate to funders and regulators that every team member completed required training, with timestamps and certificates all stored in one place, has made an enormous difference to how we operate.</div>
        <div class="tc-author"><div class="tc-av" style="background:linear-gradient(135deg,#4220C8,#7B5EEA);">SD</div><div><div class="tc-name">Shawn D.</div><div class="tc-role">Founder and Director &middot; American Board</div></div></div>
      </div>
      <div class="tc">
        <div class="tc-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div>
        <div class="tc-q">&ldquo;</div>
        <div class="tc-body">Safeguarding and data protection compliance are non-negotiable for us. MyPass LMS made it possible to track every volunteer and staff member's required training without any manual work from our coordinator. The automatic reminders meant nobody slipped through and we could produce evidence of full compliance within minutes when our funder asked for it.</div>
        <div class="tc-author"><div class="tc-av" style="background:linear-gradient(135deg,#2A7A5C,#1D5C45);">AS</div><div><div class="tc-name">Ashleigh S.</div><div class="tc-role">Senior Learning Partner &middot; UAE Nonprofit</div></div></div>
      </div>
    </div>
    <div style="text-align:center;"><a href="https://kprise.com/case-study/" class="sec-cta-ghost" target="_blank" rel="noopener">Read Full Case Studies</a></div>
  </div>
</section>

<!-- INTEGRATIONS -->
<section class="sec sbg">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Integrations</div>
      <h2 class="heading">Fits Into the Systems<br><em>You Already Rely On</em></h2>
      <p class="lead cx">MyPass LMS connects to your existing HR and identity stack so compliance training runs inside your workflow — not alongside it as a separate system your team has to manage independently.</p>
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
        <div style="font-size:12px;color:var(--ink4);line-height:1.5;">Microsoft identity integration for organisations running on the Microsoft stack</div>
      </div>

      <div style="background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:22px 18px;text-align:center;box-shadow:var(--sh);transition:all .22s;" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='var(--sh2)';this.style.borderColor='var(--bdr2)'" onmouseout="this.style.transform='';this.style.boxShadow='var(--sh)';this.style.borderColor='var(--bdr)'">
        <div style="width:48px;height:48px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;">
          <svg width="26" height="26" viewBox="0 0 26 26" fill="none"><path d="M13 4C8 4 4 8 4 13s4 9 9 9 9-4 9-9-4-9-9-9z" stroke="#4220C8" stroke-width="2.2"/><path d="M4 13h18M13 4c-2.5 3-4 5.8-4 9s1.5 6 4 9M13 4c2.5 3 4 5.8 4 9s-1.5 6-4 9" stroke="#4220C8" stroke-width="1.6"/></svg>
        </div>
        <div style="font-size:14px;font-weight:800;color:var(--ink);margin-bottom:5px;">BambooHR</div>
        <div style="font-size:12px;color:var(--ink4);line-height:1.5;">New hires added to compliance training automatically when created in your HRIS</div>
      </div>

      <div style="background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:22px 18px;text-align:center;box-shadow:var(--sh);transition:all .22s;" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='var(--sh2)';this.style.borderColor='var(--bdr2)'" onmouseout="this.style.transform='';this.style.boxShadow='var(--sh)';this.style.borderColor='var(--bdr)'">
        <div style="width:48px;height:48px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;">
          <svg width="26" height="26" viewBox="0 0 26 26" fill="none"><rect x="3" y="6" width="20" height="14" rx="3" stroke="#4220C8" stroke-width="2.2"/><path d="M8 12h10M8 16h6" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round"/></svg>
        </div>
        <div style="font-size:14px;font-weight:800;color:var(--ink);margin-bottom:5px;">Zoom</div>
        <div style="font-size:12px;color:var(--ink4);line-height:1.5;">Schedule and manage live compliance sessions and ILT events alongside online modules</div>
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
      <h2 class="heading">Compliance Works Best When Connected<br>to <em>the Rest of Your Training Programme</em></h2>
      <p class="lead cx">Compliance training does not sit in isolation. See how MyPass LMS connects it to onboarding, employee development, and broader learning programmes across your organisation.</p>
    </div>
    <div class="uc-grid">
      <div class="ucc">
        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=700&q=80&auto=format&fit=crop" alt="Employee onboarding with compliance training">
        <div class="ucc-body"><span class="ucc-tag">Use Case</span><div class="ucc-t">Employee Onboarding</div><div class="ucc-d">Build mandatory compliance training into every new hire's onboarding path from day one. Consistent, trackable, and automatic regardless of team size or location.</div><a href="https://kp.kprise.com/use-cases/onboarding" class="ucc-link">Read more <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></a></div>
      </div>
      <div class="ucc">
        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=700&q=80&auto=format&fit=crop" alt="Employee training and development">
        <div class="ucc-body"><span class="ucc-tag">Use Case</span><div class="ucc-t">Employee Training</div><div class="ucc-d">Combine compliance requirements with role-specific development in a single platform. One learning record per employee covering mandatory policy training and skills development.</div><a href="https://kp.kprise.com/use-cases/employee-training" class="ucc-link">Read more <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></a></div>
      </div>
      <div class="ucc">
        <img src="https://images.unsplash.com/photo-1542744094-24638eff58bb?w=700&q=80&auto=format&fit=crop" alt="Nonprofit and association compliance training">
        <div class="ucc-body"><span class="ucc-tag">Industry</span><div class="ucc-t">Nonprofits and Associations</div><div class="ucc-d">Safeguarding, data protection, and funder-specific compliance tracked automatically for staff and volunteers across every programme and location.</div><a href="https://kp.kprise.com/industries/nonprofit" class="ucc-link">Read more <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></a></div>
      </div>
    </div>
  </div>
</section>

<!-- RESOURCES -->
<section class="sec sbg">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Learning Resources</div>
      <h2 class="heading">Practical Resources for<br><em>Compliance and HR Teams</em></h2>
      <p class="lead cx">Guides, comparisons, and real customer stories written for the people who actually manage compliance programmes — not for marketing clicks.</p>
    </div>
    <div class="res-grid">
      <div class="rcard">
        <span class="rtype">Whitepapers and Guides</span>
        <div class="rt">Learning Insights Hub — LMS Buying Guides Including Compliance Use Cases</div>
        <div class="rd">The Learning Insights Hub contains practical whitepapers on how to write an LMS RFP that surfaces the right compliance capabilities, how AI removes 60 to 80 percent of LMS administrative work, and the most common mistakes organisations make when selecting a compliance training platform in 2026. If you are evaluating or rethinking your approach, start here.</div>
        <a href="https://kprise.com/learning-insights-hub/" class="rlink" target="_blank" rel="noopener">Download the guides <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></a>
      </div>
      <div class="rcard">
        <span class="rtype">Real Customer Stories</span>
        <div class="rt">Case Studies — How Organisations Use MyPass LMS to Manage Compliance Without the Admin</div>
        <div class="rd">Account-by-account case studies from nonprofits, associations, and growing organisations that moved from manual compliance tracking to automated, audit-ready programmes. What broke before, what changed after switching, and what audit outcomes looked like at 30 days and beyond.</div>
        <a href="https://kprise.com/case-study/" class="rlink" target="_blank" rel="noopener">Read the case studies <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></a>
      </div>
      <div class="rcard">
        <span class="rtype">Independent Comparisons</span>
        <div class="rt">LMS Comparisons — How MyPass LMS Stacks Up on Compliance Features Against Docebo, Moodle, TalentLMS</div>
        <div class="rd">Feature-by-feature comparisons covering compliance capabilities specifically — automated assignment, audit reporting, certification management, assessment engines, and audit trail depth. Compared directly against Docebo, Moodle, TalentLMS, and more. No marketing spin. Just a clear view of where each platform stands.</div>
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
      <h2 class="heading">What Compliance Managers Ask<br><em>Before Starting Their Free Trial</em></h2>
      <p class="lead cx">If your question is not here, our team responds the same day. Full documentation is at our <a href="https://help.kprise.com" target="_blank" rel="noopener" style="color:var(--b);font-weight:700;">Help Center</a>.</p>
    </div>
    <div class="faq-grid">
      <div class="fi open">
        <div class="fi-q" onclick="this.closest('.fi').classList.toggle('open')">Can MyPass LMS generate audit-ready compliance reports instantly?<div class="fi-t"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">Yes. Every learner action — completion, assessment score, certificate issuance, and timestamp — is recorded automatically. Generate a filtered compliance report for any team, department, course, or individual at any time. Reports are exportable in standard formats and ready to share with regulators, auditors, or board members immediately.</div>
      </div>
      <div class="fi">
        <div class="fi-q" onclick="this.closest('.fi').classList.toggle('open')">How does MyPass LMS handle certification renewals automatically?<div class="fi-t"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">You configure the renewal interval for each compliance type once. MyPass LMS tracks expiry dates for every learner, automatically reassigns the relevant training before the deadline, sends scheduled reminders to the learner, and reissues the certificate upon successful completion of the renewal assessment. No manual involvement required after initial setup.</div>
      </div>
      <div class="fi">
        <div class="fi-q" onclick="this.closest('.fi').classList.toggle('open')">Can we enforce pass marks before a certificate is issued?<div class="fi-t"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">Yes. For each compliance assessment you set a mandatory pass mark that must be achieved before the platform issues a completion certificate. You can configure retake rules including cooling periods between attempts and maximum retake limits. If a learner fails a critical compliance assessment, relevant managers receive an automatic alert immediately.</div>
      </div>
      <div class="fi">
        <div class="fi-q" onclick="this.closest('.fi').classList.toggle('open')">Does MyPass LMS support HIPAA, GDPR, and sector-specific requirements?<div class="fi-t"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">Yes. MyPass LMS supports compliance training for any regulatory framework. You can build or deploy ready-made courses covering HIPAA, GDPR, workplace health and safety, safeguarding, anti-harassment, financial regulations, and any sector-specific requirement your organisation faces. Each compliance type is tracked separately with its own reporting, certificate management, and renewal cycle.</div>
      </div>
      <div class="fi">
        <div class="fi-q" onclick="this.closest('.fi').classList.toggle('open')">How does automated assignment work for new employees?<div class="fi-t"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">You configure assignment rules based on any combination of employee attributes — role, department, location, or hire date. When an employee matches those criteria, the relevant compliance training is assigned automatically. For new hires, mandatory compliance content is assigned from the moment they are added to the platform. No HR manager needs to manually action any compliance assignment.</div>
      </div>
      <div class="fi">
        <div class="fi-q" onclick="this.closest('.fi').classList.toggle('open')">Is the 15-day free trial genuinely free with full access?<div class="fi-t"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">Yes, completely. Full platform access for 15 days with no credit card required and no feature restrictions. Set up compliance programmes, enrol real employees, configure assessment pass marks, test reporting and certificate issuance, and verify the audit trail before you commit to anything. If it does not meet your compliance requirements, nothing is owed. <a href="https://mypasslms.us/login#register">Start your trial here</a>.</div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-sec">
  <div class="cta-in">
    <div class="cta-tag">15-Day Free Trial &mdash; No Card Required</div>
    <h2 class="cta-h">Stop Managing Compliance<br><em>Manually. Automate It.</em></h2>
    <p class="cta-p">Every day your compliance programme runs on spreadsheets and email reminders is a day your organisation carries unnecessary risk. MyPass LMS replaces all of it with an automated system that proves compliance at any moment.</p>
    <div class="cta-btns">
      <a href="https://mypasslms.us/login#register" class="btn-a">Start Free for 15 Days</a>
      <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b">Book a 30-Minute Demo</a>
    </div>
    <p class="cta-note">15-day free trial &middot; No credit card required &middot; Cancel anytime &middot; AWS FedRAMP infrastructure</p>
  </div>
</section>

<script>document.querySelectorAll('.fi-q').forEach(q=>{q.addEventListener('click',()=>q.closest('.fi').classList.toggle('open'));});</script>
@endsection

@push('schema')
@verbatim
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"SoftwareApplication","name":"MyPass LMS Compliance Training Software","applicationCategory":"BusinessApplication","operatingSystem":"Web","description":"Compliance training software with automated mandatory training assignment, real-time tracking, certification management, and instant audit-ready reporting. HIPAA, GDPR, workplace safety, and all major regulatory frameworks. 15-day free trial, no credit card required.","offers":{"@type":"Offer","price":"0","priceCurrency":"USD","description":"15-day free trial with full platform access, no credit card required"},"provider":{"@type":"Organization","name":"Kprise","url":"https://kprise.com","telephone":"+12403164903","address":{"@type":"PostalAddress","streetAddress":"3905 National Drive, Suite 330","addressLocality":"Burtonsville","addressRegion":"MD","postalCode":"20866","addressCountry":"US"}},"aggregateRating":{"@type":"AggregateRating","ratingValue":"4.7","reviewCount":"47","bestRating":"5"}}
</script>
@endverbatim
@endpush

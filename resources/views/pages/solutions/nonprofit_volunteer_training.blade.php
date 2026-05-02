@extends('layouts.app')

@push('styles')
    <style>
/* ── HERO ── */
.hero{
  background:var(--w);
  border-bottom:1px solid var(--bdr);
  padding:40px 48px 0;
  overflow:hidden;
  position:relative;
}
.hero::after{
  content:'';position:absolute;top:0;right:0;bottom:0;width:48%;
  background:linear-gradient(to right,transparent,var(--bl2) 40%);
  pointer-events:none;
}
.hero-grid{
  max-width:1500px;
  margin:0 auto;
  display:grid;
  grid-template-columns:1fr 460px;
  gap:52px;
  align-items:end;
  position:relative;
  z-index:1;
}
.hero h1{font-size:44px;font-weight:900;line-height:1.09;letter-spacing:-1.8px;color:var(--ink);margin-bottom:16px;}
.hero h1 em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
.hero-sub{font-size:16px;line-height:1.72;color:var(--ink3);margin-bottom:22px;max-width:780px;}
.hero-sub strong{color:var(--ink2);font-weight:600;}
.hero-img-wrap{
  position:relative;
  align-self:stretch;
  display:flex;
  flex-direction:column;
  justify-content:flex-end;
}
.hero-img{
  width:100%;
  height:100%;
  min-height:420px;
  object-fit:cover;
  object-position:center top;
  border-radius:14px 14px 0 0;
  box-shadow:0 -4px 32px rgba(66,32,200,0.1);
  display:block;
  flex:1;
}

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
  --sh3:0 8px 24px rgba(66,32,200,0.10),0 20px 48px rgba(66,32,200,0.10);
  --gr:linear-gradient(135deg,var(--b),var(--bd));
  --rad:16px;
}
html{scroll-behavior:smooth;}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--bg);color:var(--ink);line-height:1.65;-webkit-font-smoothing:antialiased;overflow-x:hidden;}
img{max-width:100%;display:block;}
a{color:inherit;text-decoration:none;}

/* NAV */

.lname b{color:var(--b);font-weight:800;}

.btn-ghost:hover{border-color:var(--b);color:var(--b);}

.btn-fill:hover{transform:translateY(-1px);box-shadow:0 5px 16px rgba(66,32,200,0.36);}

.bc{display:flex;align-items:center;gap:6px;margin-bottom:14px;}
.bc a{font-size:12px;font-weight:600;color:var(--ink4);}
.bc a:hover{color:var(--b);}
.bc-sep{font-size:12px;color:var(--bdr2);}
.bc span{font-size:12px;font-weight:600;color:var(--b);}
.htag{display:inline-flex;align-items:center;gap:6px;background:var(--bl);border:1px solid var(--bdr2);border-radius:100px;padding:4px 13px 4px 8px;margin-bottom:16px;}
.htag-dot{width:6px;height:6px;border-radius:50%;background:var(--b);animation:breathe 2s ease-in-out infinite;}
@keyframes breathe{0%,100%{opacity:1}50%{opacity:.35}}
.htag span{font-size:11px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:var(--b);}
.hbtns{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:24px;}
.btn-a{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:14.5px;font-weight:700;padding:12px 24px;border-radius:10px;background:var(--gr);color:#fff;border:none;cursor:pointer;box-shadow:0 4px 14px rgba(66,32,200,0.26);transition:all .2s;}
.btn-a:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(66,32,200,0.36);}
.btn-b{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:14.5px;font-weight:600;padding:11px 22px;border-radius:10px;background:var(--w);color:var(--b);border:1.5px solid var(--bdr2);cursor:pointer;transition:all .2s;}
.btn-b:hover{background:var(--bl);}
.trust-row{display:flex;gap:16px;flex-wrap:wrap;padding:30px 0;}
.tchip{display:flex;align-items:center;gap:5px;font-size:12.5px;font-weight:600;color:var(--ink4);}
.tchip svg{width:13px;height:13px;stroke:var(--ok);stroke-width:2.5;fill:none;stroke-linecap:round;stroke-linejoin:round;}
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

/* CLIENT LOGOS — real images from kprise.com */
.client-logo-img{height:36px;width:auto;object-fit:contain;display:block;filter:grayscale(1);opacity:.6;transition:all .2s;}
.lb-item:hover .client-logo-img{filter:grayscale(0);opacity:1;}

/* STATS */
.stats{background:var(--bl2);border-bottom:1px solid var(--bdr);}
.stats-in{max-width:1500px;margin:0 auto;display:grid;grid-template-columns:repeat(4,1fr);}
.sc{padding:18px 24px;display:flex;align-items:center;gap:16px;border-right:1px solid var(--bdr);}
.sc:last-child{border-right:none;}
.sc-n{font-size:34px;font-weight:900;letter-spacing:-1.5px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;flex-shrink:0;min-width:52px;}
.sc-l{font-size:12.5px;color:var(--ink3);font-weight:500;line-height:1.45;border-left:1.5px solid var(--bdr2);padding-left:14px;}

/* SHARED */
.sec{padding:68px 48px;}
.sw{background:var(--w);}
.sbg{background:var(--bg);}
.stint{background:var(--bl2);}
.wrap{max-width:1500px;margin:0 auto;}
.ew{width:16px;height:2.5px;background:var(--gr);border-radius:2px;flex-shrink:0;}
.eyebrow{display:inline-flex;align-items:center;gap:6px;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);margin-bottom:10px;}
.heading{font-size:34px;font-weight:800;line-height:1.30;color:var(--ink);margin-bottom:12px;}
.heading em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
.lead{font-size:16px;color:var(--ink3);line-height:1.76;max-width:1280px;}
.cx{text-align:center;}
.cx .lead{margin:0 auto;}
.cx .eyebrow{justify-content:center;}
.sec-cta{display:inline-flex;align-items:center;gap:7px;margin-top:32px;font-size:14.5px;font-weight:700;padding:11px 22px;border-radius:10px;background:var(--gr);color:#fff;border:none;cursor:pointer;box-shadow:0 3px 12px rgba(66,32,200,0.22);transition:all .2s;font-family:inherit;}
.sec-cta:hover{transform:translateY(-2px);box-shadow:0 5px 18px rgba(66,32,200,0.32);}
.sec-cta-ghost{display:inline-flex;align-items:center;gap:7px;margin-top:32px;font-size:14.5px;font-weight:600;padding:10px 20px;border-radius:10px;background:transparent;color:var(--b);border:1.5px solid var(--bdr2);cursor:pointer;transition:all .2s;font-family:inherit;}
.sec-cta-ghost:hover{background:var(--bl);}

/* VALUE PROP CARDS */
.vp-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:36px;}
.vpc{background:var(--w);border:1px solid var(--bdr);border-radius:var(--rad);padding:24px 22px;box-shadow:var(--sh);transition:all .22s;position:relative;overflow:hidden;}
.vpc::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--gr);border-radius:var(--rad) var(--rad) 0 0;opacity:0;transition:opacity .22s;}
.vpc:hover{transform:translateY(-3px);box-shadow:var(--sh2);border-color:var(--bdr2);}
.vpc:hover::before{opacity:1;}
.vpc-ic{width:44px;height:44px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin-bottom:13px;}
.vpc-ic svg{width:22px;height:22px;stroke:var(--b);stroke-width:1.8;fill:none;stroke-linecap:round;stroke-linejoin:round;}
.vpc-t{font-size:15.5px;font-weight:700;color:var(--ink);margin-bottom:6px;}
.vpc-d{font-size:13px;color:var(--ink3);line-height:1.68;}

/* FEATURE ROWS */
.feat-block{padding:0 48px 68px;}
.feat-wrap{max-width:1500px;margin:0 auto;display:flex;flex-direction:column;gap:72px;}
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

/* AMS SECTION */
.ams-grid{display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center;margin-top:0;}
.ams-flow{display:flex;flex-direction:column;gap:16px;margin-top:24px;}
.ams-step{display:flex;gap:14px;align-items:flex-start;background:var(--w);border:1px solid var(--bdr);border-radius:12px;padding:16px 18px;box-shadow:var(--sh);}
.ams-num{width:30px;height:30px;min-width:30px;border-radius:8px;background:var(--gr);display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:900;color:#fff;}
.ams-t{font-size:14.5px;font-weight:700;color:var(--ink);margin-bottom:3px;}
.ams-d{font-size:12.5px;color:var(--ink3);line-height:1.6;}
.ams-chips{display:flex;flex-wrap:wrap;gap:8px;margin-top:20px;}
.ams-chip{background:var(--bl2);border:1px solid var(--bdr);border-radius:8px;padding:7px 16px;font-size:13px;font-weight:700;color:var(--ink2);display:flex;align-items:center;gap:7px;transition:all .18s;}
.ams-chip svg{width:13px;height:13px;stroke:var(--b);stroke-width:2;fill:none;}
.ams-chip:hover{border-color:var(--bdr2);background:var(--bl);color:var(--b);}
.ams-note{font-size:12.5px;color:var(--ink4);margin-top:12px;line-height:1.6;}

/* HIGHLIGHT BAND */
.hl-band{background:var(--bl2);border-top:1px solid var(--bdr);border-bottom:1px solid var(--bdr);padding:56px 48px;}
.hl-inner{max-width:1500px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center;}
.hl-h{font-size:34px;font-weight:900;line-height:1.12;letter-spacing:-1.2px;color:var(--ink);margin-bottom:12px;}
.hl-h em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
.hl-p{font-size:16px;color:var(--ink3);line-height:1.72;margin-bottom:22px;}
.hl-metrics{display:flex;flex-direction:column;gap:14px;}
.hlm{background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:18px 22px;display:flex;gap:16px;align-items:center;box-shadow:var(--sh);}
.hlm-n{font-size:36px;font-weight:900;letter-spacing:-1.5px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;flex-shrink:0;min-width:80px;}
.hlm-t{font-size:13.5px;font-weight:700;color:var(--ink);margin-bottom:2px;}
.hlm-d{font-size:12px;color:var(--ink3);line-height:1.5;}

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

/* RELATED USE CASES */
.uc-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:36px;}
.ucc{background:var(--w);border:1px solid var(--bdr);border-radius:var(--rad);overflow:hidden;box-shadow:var(--sh);transition:all .22s;display:flex;flex-direction:column;}
.ucc:hover{transform:translateY(-3px);box-shadow:var(--sh2);border-color:var(--bdr2);}
.ucc img{width:100%;height:148px;object-fit:cover;}
.ucc-body{padding:16px 18px;flex:1;display:flex;flex-direction:column;}
.ucc-tag{font-size:10px;font-weight:800;letter-spacing:.09em;text-transform:uppercase;color:var(--b);background:var(--bl);padding:2px 8px;border-radius:5px;display:inline-block;margin-bottom:8px;max-width:fit-content;}
.ucc-t{font-size:14.5px;font-weight:700;color:var(--ink);margin-bottom:6px;line-height:1.4;}
.ucc-d{font-size:12.5px;color:var(--ink3);line-height:1.6;margin-bottom:12px;flex:1;}
.ucc-link{display:inline-flex;align-items:center;gap:4px;font-size:12.5px;font-weight:700;color:var(--b);}
.ucc-link svg{width:11px;height:11px;stroke:var(--b);stroke-width:2.5;fill:none;transition:transform .16s;}
.ucc-link:hover svg{transform:translateX(3px);}

/* RESOURCES */
.res-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:36px;}
.rcard{background:var(--w);border:1px solid var(--bdr);border-radius:var(--rad);padding:20px;box-shadow:var(--sh);transition:all .22s;display:flex;flex-direction:column;}
.rcard:hover{transform:translateY(-3px);box-shadow:var(--sh2);border-color:var(--bdr2);}
.rtype{font-size:10px;font-weight:800;letter-spacing:.09em;text-transform:uppercase;color:var(--bm);background:var(--bl);padding:2px 8px;border-radius:5px;display:inline-block;margin-bottom:10px;max-width:fit-content;}
.rt{font-size:14.5px;font-weight:700;color:var(--ink);margin-bottom:6px;line-height:1.4;}
.rd{font-size:12.5px;color:var(--ink3);line-height:1.6;margin-bottom:14px;flex:1;}
.rlink{display:inline-flex;align-items:center;gap:4px;font-size:12.5px;font-weight:700;color:var(--b);}
.rlink svg{width:11px;height:11px;stroke:var(--b);stroke-width:2.5;fill:none;transition:transform .16s;}
.rlink:hover svg{transform:translateX(3px);}

/* FAQ */
.faq-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:32px;}
.fi{border:1.5px solid var(--bdr);border-radius:13px;background:var(--w);transition:all .18s;}
.fi.open{border-color:var(--bdr2);box-shadow:var(--sh);}
.fi-q{display:flex;justify-content:space-between;align-items:center;gap:12px;padding:15px 18px;font-size:14.5px;font-weight:700;color:var(--ink);line-height:1.4;cursor:pointer;user-select:none;-webkit-user-select:none;}
.fi-t{width:23px;height:23px;min-width:23px;border-radius:50%;background:var(--bl);display:flex;align-items:center;justify-content:center;transition:transform .2s,background .2s;pointer-events:none;flex-shrink:0;}
.fi-t svg{width:12px;height:12px;stroke:var(--b);stroke-width:2.5;fill:none;stroke-linecap:round;pointer-events:none;}
.fi.open .fi-t{transform:rotate(45deg);background:var(--b);}.fi.open .fi-t svg{stroke:#fff;}
.fi.open .fi-t svg{stroke:#fff;}
.fi-a{display:none;padding:0 18px 15px;font-size:13.5px;line-height:1.74;color:var(--ink3);border-top:1px solid var(--bdr);padding-top:12px;}
.fi.open .fi-a{display:block;}
.fi-a a{color:var(--b);font-weight:600;}

/* CTA */
.cta-sec{background:var(--bl2);border-top:1px solid var(--bdr);padding:68px 48px;text-align:center;position:relative;overflow:hidden;}
.cta-sec::before{content:'';position:absolute;inset:0;background:radial-gradient(circle 300px at 50% 50%,rgba(66,32,200,0.05),transparent);pointer-events:none;}
.cta-in{max-width:1200px;margin:0 auto;position:relative;z-index:1;}
.cta-tag{display:inline-block;background:var(--b);color:#fff;border-radius:100px;padding:4px 14px;font-size:10.5px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;margin-bottom:16px;}
.cta-h{font-size:38px;font-weight:900;letter-spacing:-1.30px;color:var(--ink);margin-bottom:12px;}
.cta-h em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
.cta-p{font-size:16px;color:var(--ink3);line-height:1.72;margin-bottom:26px;}
.cta-btns{display:flex;gap:10px;justify-content:center;flex-wrap:wrap;margin-bottom:12px;}
.cta-note{font-size:14px;color:var(--ink4);}


/* ── NAV ── */
.topnav{background:rgba(255,255,255,.97);backdrop-filter:blur(20px);border-bottom:1px solid var(--bdr);position:sticky;top:0;z-index:300;height:64px;display:flex;align-items:center;justify-content:space-between;padding:0 40px}
.tn-logo img{height:34px;width:auto}
.tn-links{display:flex;align-items:center;gap:2px;list-style:none}
.tn-links>li{position:relative}
.tn-links>li>a,.tn-dd-btn{font-size:13px;font-weight:600;color:var(--ink3);padding:6px 11px;border-radius:7px;transition:all .16s;cursor:pointer;background:none;border:none;font-family:inherit;display:flex;align-items:center;gap:4px}
.tn-links>li>a:hover,.tn-dd-btn:hover{color:var(--b);background:var(--bl2)}
.tn-dd-btn svg{width:11px;height:11px;stroke:currentColor;stroke-width:2.5;fill:none;transition:transform .18s}
.tn-links>li:hover .tn-dd-btn svg{transform:rotate(180deg)}
.dd-mega{display:none;position:absolute;top:calc(100% + 8px);left:0;background:var(--w);border:1px solid var(--bdr);border-radius:14px;box-shadow:0 12px 40px rgba(66,32,200,.1);min-width:220px;padding:8px;z-index:400}
.dd-mega.wide{min-width:560px;grid-template-columns:1fr 1fr}
.tn-links>li:hover .dd-mega{display:block}
.tn-links>li:hover .dd-mega.wide{display:grid}
.dd-group-title{font-size:9.5px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--ink4);padding:4px 10px 8px}
.dd-link{display:block;padding:8px 12px;border-radius:9px;font-size:13px;font-weight:500;color:var(--ink3);transition:all .15s;line-height:1.4}
.dd-link span{display:block;font-size:11px;color:var(--ink4);font-weight:400;margin-top:1px}
.dd-link:hover{background:var(--bl2);color:var(--b)}
.tn-cta{display:flex;gap:8px;align-items:center}
.btn-si{font-size:13px;font-weight:600;padding:7px 15px;border:1.5px solid var(--bdr2);border-radius:8px;color:var(--ink2);background:var(--w);cursor:pointer;font-family:inherit;transition:all .16s;display:inline-block}
.btn-si:hover{border-color:var(--b);color:var(--b)}
.btn-demo{font-size:13px;font-weight:700;padding:8px 18px;background:linear-gradient(135deg,var(--b),var(--bd));color:#fff;border:none;border-radius:8px;box-shadow:0 3px 12px rgba(66,32,200,0.24);cursor:pointer;font-family:inherit;transition:all .16s;display:inline-block}
.btn-demo:hover{transform:translateY(-1px);box-shadow:0 5px 16px rgba(66,32,200,0.36)}

/* ── TRUST CHIP ── */
.tchip{display:flex;align-items:center;gap:5px;font-size:12.5px;font-weight:600;color:var(--ink4)}
.tchip svg{width:13px;height:13px;stroke:var(--ok);stroke-width:2.5;fill:none;stroke-linecap:round;stroke-linejoin:round}
@media(max-width:1024px){.hero-img{height:320px;min-height:unset;flex:none;}.hero-grid{grid-template-columns:1fr;}.foot-top{grid-template-columns:1fr 1fr}}
@media(max-width:640px){.topnav{padding:0 20px}.tn-links{display:none}.site-footer{padding:36px 20px 20px}.foot-top{grid-template-columns:1fr}}
</style>
@endpush

@section('content')
 <header class="hero">
  <div class="hero-grid">
    <div>
      <nav class="bc" aria-label="Breadcrumb">
        <a href="https://kp.kprise.com">Home</a><span class="bc-sep">/</span>
        <a href="#">Solutions</a><span class="bc-sep">/</span>
        <span>Nonprofit and Volunteer Training</span>
      </nav>
      <div class="htag"><span class="htag-dot"></span><span>Nonprofit and Volunteer Training</span></div>
      <h1>Train More People.<br><em>Spend Less Time on Admin.</em></h1>
      <p class="hero-sub">
        Nonprofits and associations run on lean teams and tight budgets. Managing staff training, volunteer onboarding, CE credits, and member certifications across spreadsheets and disconnected systems is not sustainable.
        <strong>MyPass LMS brings your training, member management, and compliance tracking into one connected platform</strong> — so your team can focus on the mission, not the admin.
      </p>
      <div class="hbtns">
        <a href="https://mypasslms.us/login#register" class="btn-a">Start Free for 60 Days</a>
        <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b">Book a Demo</a>
      </div>
      <div style="display:inline-flex;align-items:center;gap:12px;background:linear-gradient(135deg,#DCFCE7,#D1FAE5);border:1px solid #BBF7D0;border-radius:10px;padding:10px 16px;margin:16px 0 10px;">
        <div style="display:flex;flex-direction:column;">
          <span style="font-size:10px;font-weight:800;letter-spacing:.06em;text-transform:uppercase;color:#166534;">Exclusive Nonprofit Offer</span>
          <span style="font-size:13px;font-weight:600;color:#14532D;margin-top:2px;"><strong style="color:#166534;">2-month free trial</strong>&nbsp;&middot;&nbsp;<strong style="color:#166534;">20% ongoing discount</strong>&nbsp;&middot;&nbsp;No credit card</span>
        </div>
      </div>
      <div class="trust-row">
        <div class="tchip"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>AMS integration included</div>
        <div class="tchip"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>CE tracking built in</div>
        <div class="tchip"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>No credit card required</div>
      </div>
    </div>
    <div class="hero-img-wrap">
      <img class="hero-img"
        src="https://images.unsplash.com/photo-1593113598332-cd288d649433?w=960&q=80&auto=format&fit=crop"
        alt="Nonprofit staff and volunteers in training session using MyPass LMS">
      <div class="h-float">
        <div class="hf-dot"></div>
        <div>
          <div class="hf-n">94</div>
          <div class="hf-l">Volunteers onboarded in one afternoon</div>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- SCROLLING CLIENT LOGOS — real images from kprise.com -->
<div class="logo-bar">
  <p class="lb-lbl">Trusted by nonprofits and associations across 15 countries</p>
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
    <div class="sc"><div class="sc-n">70%</div><div class="sc-l">Less training admin work for nonprofit and association teams</div></div>
    <div class="sc"><div class="sc-n">94</div><div class="sc-l">Volunteers onboarded in a single afternoon by one MyPass LMS customer</div></div>
    <div class="sc"><div class="sc-n">15+</div><div class="sc-l">Countries where MyPass LMS customers operate their programmes</div></div>
    <div class="sc"><div class="sc-n">Day 1</div><div class="sc-l">Training live from the moment you sign up — ready-made courses included</div></div>
  </div>
</div>

<!-- WHY NONPROFITS STRUGGLE — 6 VALUE PROPS -->
<section class="sec sw">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Built for Mission-Driven Organisations</div>
      <h2 class="heading">Everything a Nonprofit or Association<br><em>Actually Needs to Train at Scale</em></h2>
      <p class="lead cx">Volunteer turnover is high. Staff are stretched thin. Budgets are tight. And your members expect a professional training experience. MyPass LMS is built around the specific realities of running training in a mission-driven organisation — not a corporate one.</p>
    </div>
    <div class="vp-grid">
      <div class="vpc">
        <div class="vpc-ic"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg></div>
        <div class="vpc-t">Volunteer Onboarding at Any Scale</div>
        <div class="vpc-d">Onboard 5 volunteers or 500 in a single operation. Role-specific paths assigned automatically the moment a volunteer is added — no manual setup, no coordinator overhead.</div>
      </div>
      <div class="vpc">
        <div class="vpc-ic"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
        <div class="vpc-t">Safeguarding and Compliance Built In</div>
        <div class="vpc-d">Safeguarding, data protection, and funder-required compliance training tracked automatically. Every completion recorded with a full audit trail — ready to share with funders or regulators immediately.</div>
      </div>
      <div class="vpc">
        <div class="vpc-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg></div>
        <div class="vpc-t">CE Credits and Certification Tracking</div>
        <div class="vpc-d">Track continuing education hours, manage certification pathways, automate renewal reminders, and issue branded certificates. All synced back to member records automatically.</div>
      </div>
      <div class="vpc">
        <div class="vpc-ic"><svg viewBox="0 0 24 24"><rect x="2" y="2" width="9" height="9" rx="2"/><rect x="13" y="2" width="9" height="9" rx="2"/><rect x="2" y="13" width="9" height="9" rx="2"/><rect x="13" y="13" width="9" height="9" rx="2"/></svg></div>
        <div class="vpc-t">AMS Integration or Built-In Member Tools</div>
        <div class="vpc-d">Already using iMIS, MemberClicks, GrowthZone, or another AMS? MyPass LMS connects directly. No AMS? MyPass LMS has built-in member management tools so you need only one platform.</div>
      </div>
      <div class="vpc">
        <div class="vpc-ic"><svg viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg></div>
        <div class="vpc-t">Ready-Made Courses from Day One</div>
        <div class="vpc-d">Deploy safeguarding, data protection, workplace conduct, and professional development courses immediately. No content creation required to get your team or volunteers trained from the first day.</div>
      </div>
      <div class="vpc">
        <div class="vpc-ic"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
        <div class="vpc-t">Funder-Ready Reporting in Seconds</div>
        <div class="vpc-d">Show funders, boards, and regulators exactly who has completed required training and when. Compliance reports generated in seconds — not three days of manual spreadsheet work.</div>
      </div>
    </div>
    <div style="text-align:center;">
      <a href="https://kp.kprise.com/industries/nonprofit" class="sec-cta">See the Full Nonprofits Overview</a>
    </div>
  </div>
</section>

<!-- FEATURE ROWS -->
<div class="feat-block sw">
  <div class="feat-wrap">

    <!-- Row 1: Volunteer onboarding -->
    <div class="frow">
      <div class="frow-img">
        <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=880&q=80&auto=format&fit=crop"
          alt="Volunteer training onboarding with MyPass LMS">
        <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">94 volunteers onboarded in a single afternoon</span></div>
      </div>
      <div class="frow-txt">
        <div class="eyebrow"><span class="ew"></span>Volunteer Onboarding</div>
        <h2 class="heading">Every Volunteer Gets<br>the Same <em>Structured Start.</em></h2>
        <p>Volunteer turnover is one of the most persistent challenges in the nonprofit sector. When onboarding depends on a coordinator who has time to run it, some volunteers get a thorough induction and others get a handbook and a good-luck wave.</p>
        <p>MyPass LMS LMS automates volunteer onboarding completely. The moment a volunteer is added to the platform, their role-specific induction path begins — safeguarding training, programme orientation, code of conduct, and anything else your organisation requires — without any coordinator involvement.</p>
        <div class="fpts">
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Separate paths for volunteers, staff, board members, and seasonal teams</div>
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Automated reminders keep volunteers progressing without manual chasing</div>
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Completion tracked and auditable for every volunteer from day one</div>
        </div>
      </div>
    </div>

    <!-- Row 2: Safeguarding and compliance (flipped) -->
    <div class="frow flip">
      <div class="frow-img">
        <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=880&q=80&auto=format&fit=crop"
          alt="Safeguarding and compliance training for nonprofits">
        <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Full audit trail — every completion timestamped</span></div>
      </div>
      <div class="frow-txt">
        <div class="eyebrow"><span class="ew"></span>Safeguarding and Compliance</div>
        <h2 class="heading">Prove Compliance to Funders<br><em>in Seconds, Not Days.</em></h2>
        <p>When a funder or regulator asks for evidence that your safeguarding training is current and complete, you should not spend a week compiling a spreadsheet. Every completion in MyPass LMS is recorded automatically the moment it happens.</p>
        <p>Mandatory safeguarding, data protection, and funder-specific training is assigned automatically, tracked continuously, and available for export as an audit-ready report at any moment.</p>
        <div class="fpts">
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Safeguarding, GDPR, and programme compliance all tracked in one place</div>
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Automated reminders before certification deadlines expire</div>
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Funder and board compliance reports ready in seconds on demand</div>
        </div>
        <a href="{{ route('solutions.compliance-training') }}" class="sec-cta">See Compliance Features</a>
      </div>
    </div>

    <!-- Row 3: CE tracking and certifications -->
    <div class="frow">
      <div class="frow-img">
        <img src="https://images.unsplash.com/photo-1606326608606-aa0b62935f2b?w=880&q=80&auto=format&fit=crop"
          alt="CE credit tracking and certification management for associations">
        <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">CE credits synced back to member records automatically</span></div>
      </div>
      <div class="frow-txt">
        <div class="eyebrow"><span class="ew"></span>CE Credits and Certification Tracking</div>
        <h2 class="heading">Member Certifications That<br><em>Manage Themselves.</em></h2>
        <p>Continuing education programmes require precise tracking of credit hours, renewal timelines, and certification status across hundreds or thousands of members. Doing this manually in spreadsheets creates errors, missed deadlines, and compliance gaps that reflect badly on your association.</p>
        <p>MyPass LMS manages the complete CE and certification lifecycle — tracking credit hours, issuing certificates, sending renewal reminders, and syncing completion records back to member profiles — all automatically after initial setup.</p>
        <div class="fpts">
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>CE and CEU credit hour tracking per member and per programme</div>
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Branded certificates issued automatically on completion and renewal</div>
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Renewal cycles run automatically without coordinator involvement</div>
        </div>
      </div>
    </div>

    <!-- Row 4: Ready-made courses (flipped) -->
    <div class="frow flip">
      <div class="frow-img">
        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=880&q=80&auto=format&fit=crop"
          alt="Ready-made nonprofit training courses in MyPass LMS course library">
        <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">50+ courses ready to deploy immediately</span></div>
      </div>
      <div class="frow-txt">
        <div class="eyebrow"><span class="ew"></span>Ready-Made Course Library</div>
        <h2 class="heading">Deploy Training from Day One.<br><em>No Content Creation Required.</em></h2>
        <p>Building training content from scratch takes time your team does not have. MyPass LMS includes a professionally built library of courses covering the topics every nonprofit and association needs — ready to assign to staff and volunteers the same day you sign up.</p>
        <p>Workplace compliance, safeguarding fundamentals, data protection, anti-harassment, and professional development courses are all available immediately. Use them as-is or customise to match your organisation's specific policies and programmes.</p>
        <div class="fpts">
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Safeguarding, data protection, and workplace conduct courses ready now</div>
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>All courses SCORM-ready and assignable in one click</div>
          <div class="fp"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>Customise any course to match your brand and specific policies</div>
        </div>
        <a href="{{ route('courses') }}" class="sec-cta">Browse the Course Library</a>
      </div>
    </div>

  </div>
</div>

<!-- AMS SECTION — "With or Without an AMS" -->
<section class="sec sbg">
  <div class="wrap">
    <div class="cx" style="margin-bottom:40px;">
      <div class="eyebrow"><span class="ew"></span>Member and AMS Management</div>
      <h2 class="heading">Whether You Have an AMS or Not,<br><em>MyPass LMS Has You Covered.</em></h2>
      <p class="lead cx">This is the flexibility that sets MyPass LMS apart from generic LMS platforms. Most associations and nonprofits are somewhere between "we have a proper AMS" and "we manage members in a spreadsheet." MyPass LMS supports both situations without compromise.</p>
    </div>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:28px;">

      <!-- Option A: Already have AMS -->
      <div style="background:var(--w);border:1px solid var(--bdr);border-radius:18px;padding:32px;box-shadow:var(--sh);">
        <div style="width:46px;height:46px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="9" height="9" rx="2"/><rect x="13" y="2" width="9" height="9" rx="2"/><rect x="2" y="13" width="9" height="9" rx="2"/><rect x="13" y="13" width="9" height="9" rx="2"/></svg>
        </div>
        <h3 style="font-size:18px;font-weight:800;color:var(--ink);margin-bottom:10px;">Already Using an AMS?</h3>
        <p style="font-size:14.5px;color:var(--ink3);line-height:1.74;margin-bottom:18px;">MyPass LMS integrates directly with your existing Association Management System. Member data, enrolment rules, SSO, CE credit tracking, and completion records sync automatically — no manual exports, no CSV cycles, no duplicate data entry.</p>
        <div style="display:flex;flex-direction:column;gap:9px;margin-bottom:20px;">
          <div style="display:flex;align-items:center;gap:8px;font-size:13.5px;color:var(--ink3);"><svg width="15" height="15" viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Member data synced bidirectionally in real time</div>
          <div style="display:flex;align-items:center;gap:8px;font-size:13.5px;color:var(--ink3);"><svg width="15" height="15" viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>SSO so members access training with their existing login</div>
          <div style="display:flex;align-items:center;gap:8px;font-size:13.5px;color:var(--ink3);"><svg width="15" height="15" viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>CE completions written back to member records automatically</div>
          <div style="display:flex;align-items:center;gap:8px;font-size:13.5px;color:var(--ink3);"><svg width="15" height="15" viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Enrolment rules tied to membership tier, chapter, or role</div>
        </div>
        <!-- AMS chips -->
        <div style="display:flex;flex-wrap:wrap;gap:7px;">
          <span style="background:var(--bl2);border:1px solid var(--bdr);border-radius:7px;padding:5px 12px;font-size:12.5px;font-weight:700;color:var(--ink2);">iMIS</span>
          <span style="background:var(--bl2);border:1px solid var(--bdr);border-radius:7px;padding:5px 12px;font-size:12.5px;font-weight:700;color:var(--ink2);">MemberClicks</span>
          <span style="background:var(--bl2);border:1px solid var(--bdr);border-radius:7px;padding:5px 12px;font-size:12.5px;font-weight:700;color:var(--ink2);">GrowthZone</span>
          <span style="background:var(--bl2);border:1px solid var(--bdr);border-radius:7px;padding:5px 12px;font-size:12.5px;font-weight:700;color:var(--ink2);">YourMembership</span>
          <span style="background:var(--bl2);border:1px solid var(--bdr);border-radius:7px;padding:5px 12px;font-size:12.5px;font-weight:700;color:var(--ink2);">Fonteva</span>
          <span style="background:var(--bl2);border:1px solid var(--bdr);border-radius:7px;padding:5px 12px;font-size:12.5px;font-weight:700;color:var(--ink2);">Nimble AMS</span>
          <span style="background:var(--bl2);border:1px solid var(--bdr);border-radius:7px;padding:5px 12px;font-size:12.5px;font-weight:700;color:var(--b);">+ More via API</span>
        </div>
      </div>

      <!-- Option B: No AMS -->
      <div style="background:var(--bl2);border:1px solid var(--bdr2);border-radius:18px;padding:32px;box-shadow:var(--sh2);">
        <div style="width:46px;height:46px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
        </div>
        <h3 style="font-size:18px;font-weight:800;color:var(--ink);margin-bottom:10px;">No AMS Yet? No Problem.</h3>
        <p style="font-size:14.5px;color:var(--ink3);line-height:1.74;margin-bottom:18px;">If your organisation manages members in spreadsheets or has outgrown your current system, MyPass LMS includes built-in member management tools that give you everything you need in a single platform — without the cost or complexity of adding a separate AMS.</p>
        <div style="display:flex;flex-direction:column;gap:9px;margin-bottom:20px;">
          <div style="display:flex;align-items:center;gap:8px;font-size:13.5px;color:var(--ink3);"><svg width="15" height="15" viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Member profiles, membership status, and engagement all in one place</div>
          <div style="display:flex;align-items:center;gap:8px;font-size:13.5px;color:var(--ink3);"><svg width="15" height="15" viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Manage volunteers, staff, and members from one unified system</div>
          <div style="display:flex;align-items:center;gap:8px;font-size:13.5px;color:var(--ink3);"><svg width="15" height="15" viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Training, CE tracking, and member data connected automatically</div>
          <div style="display:flex;align-items:center;gap:8px;font-size:13.5px;color:var(--ink3);"><svg width="15" height="15" viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Scale from 50 members to 50,000 without switching systems</div>
        </div>
        <a href="https://calendly.com/onlinesales-kprise/30min" class="sec-cta" style="margin-top:0;">See How Built-In Management Works</a>
      </div>

    </div>
  </div>
</section>

<!-- HIGHLIGHT BAND -->
<div class="hl-band">
  <div class="hl-inner">
    <div>
      <div class="eyebrow" style="margin-bottom:12px;"><span class="ew"></span>Real Impact</div>
      <h2 class="hl-h">More Than an LMS.<br><em>A Platform Built Around Your Mission.</em></h2>
      <p class="hl-p">The difference between a generic LMS and MyPass LMS for nonprofits is that MyPass LMS understands the operational reality — limited admin resource, high volunteer turnover, funder accountability, and the constant pressure to do more with less. These are the outcomes MyPass LMS customers in the sector report.</p>
      <a href="https://kprise.com/case-study/" class="sec-cta" style="margin-top:0;" target="_blank" rel="noopener">Read Customer Case Studies</a>
    </div>
    <div class="hl-metrics">
      <div class="hlm"><div class="hlm-n">94</div><div><div class="hlm-t">Volunteers onboarded in a single afternoon</div><div class="hlm-d">One coordinator. Zero manual assignments. Every volunteer received the same structured experience.</div></div></div>
      <div class="hlm"><div class="hlm-n">0</div><div><div class="hlm-t">Manual compliance reports needed for funder review</div><div class="hlm-d">Audit-ready reports generated in seconds. No spreadsheet assembly, no data consolidation, no waiting.</div></div></div>
      <div class="hlm"><div class="hlm-n">70%</div><div><div class="hlm-t">Reduction in training admin work across the platform</div><div class="hlm-d">Automated enrolments, reminders, tracking, and reporting free teams to focus on programme delivery.</div></div></div>
    </div>
  </div>
</div>

<!-- REVIEW BADGES -->
<section class="sec stint">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Recognised by Independent Reviewers</div>
      <h2 class="heading">Rated Across Every Major<br><em>Software Review Platform</em></h2>
      <p class="lead cx">Independent ratings from HR, L&D, and programme professionals who evaluated MyPass LMS against the full field of training platforms.</p>
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
      <h2 class="heading">What Nonprofit and Association<br><em>Teams Say About MyPass LMS</em></h2>
    </div>
    <div class="tc-grid">
      <div class="tc feat">
        <div class="tc-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div>
        <div class="tc-q">&ldquo;</div>
        <div class="tc-body">MyPass LMS is extremely customisable and the support in making the LMS feel like our own brand was something we did not expect at this price point. Their customer support is beyond helpful. The team were available at all hours and very professional. It is very easy to navigate for both admins and learners from the very first day.</div>
        <div class="tc-author"><div class="tc-av" style="background:linear-gradient(135deg,#2A7A5C,#1D5C45);">AS</div><div><div class="tc-name">Ashleigh S.</div><div class="tc-role">Senior Career and Learning Partner &middot; UAE Nonprofit</div></div></div>
      </div>
      <div class="tc">
        <div class="tc-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div>
        <div class="tc-q">&ldquo;</div>
        <div class="tc-body">We have been a Kprise client for over four years and Kprise has constantly been there to support our needs. The platform looks and feels entirely like ours. The team treats every problem like it is their own problem. I would recommend MyPass LMS to any organisation that wants serious training infrastructure without the complexity that usually comes with it.</div>
        <div class="tc-author"><div class="tc-av" style="background:linear-gradient(135deg,#4220C8,#7B5EEA);">SD</div><div><div class="tc-name">Shawn D.</div><div class="tc-role">Founder and Director &middot; American Board</div></div></div>
      </div>
      <div class="tc">
        <div class="tc-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div>
        <div class="tc-q">&ldquo;</div>
        <div class="tc-body">I am wondering why I never contacted these guys sooner. Seriously, they all have commendable talent in their respective fields and knocked my concept out of the ballpark. The attention to detail, the genuine responsiveness, and the quality of the platform are rare in this space. We moved from a much larger vendor and have not looked back since.</div>
        <div class="tc-author"><div class="tc-av" style="background:linear-gradient(135deg,#A06830,#7A4E20);">RN</div><div><div class="tc-name">Raghu Nath</div><div class="tc-role">President &middot; E-Learning Organisation</div></div></div>
      </div>
    </div>
    <div style="text-align:center;"><a href="https://kprise.com/case-study/" class="sec-cta-ghost" target="_blank" rel="noopener">Read Full Case Studies</a></div>
  </div>
</section>

<!-- INTEGRATIONS — 5 cards -->
<section class="sec sbg">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Integrations</div>
      <h2 class="heading">Connects to the Systems<br><em>Your Organisation Already Uses</em></h2>
      <p class="lead cx">MyPass LMS connects to your existing tools via standard API and SSO. Whether you are running an established AMS, an HRIS, or a communication stack, MyPass LMS fits in without requiring a separate login or a separate system for your team to manage.</p>
    </div>
    <div style="display:grid;grid-template-columns:repeat(5,1fr);gap:14px;margin-top:32px;">
      <div style="background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:22px 18px;text-align:center;box-shadow:var(--sh);transition:all .22s;" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='var(--sh2)';this.style.borderColor='var(--bdr2)'" onmouseout="this.style.transform='';this.style.boxShadow='var(--sh)';this.style.borderColor='var(--bdr)'">
        <div style="width:48px;height:48px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;"><svg width="26" height="26" viewBox="0 0 26 26" fill="none"><rect x="3" y="3" width="9" height="9" rx="2" fill="#4220C8"/><rect x="14" y="3" width="9" height="9" rx="2" fill="#4220C8" opacity=".5"/><rect x="3" y="14" width="9" height="9" rx="2" fill="#4220C8" opacity=".5"/><rect x="14" y="14" width="9" height="9" rx="2" fill="#4220C8"/></svg></div>
        <div style="font-size:14px;font-weight:800;color:var(--ink);margin-bottom:5px;">Okta SSO</div>
        <div style="font-size:12px;color:var(--ink4);line-height:1.5;">Single sign-on so members and staff access training with one existing login</div>
      </div>
      <div style="background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:22px 18px;text-align:center;box-shadow:var(--sh);transition:all .22s;" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='var(--sh2)';this.style.borderColor='var(--bdr2)'" onmouseout="this.style.transform='';this.style.boxShadow='var(--sh)';this.style.borderColor='var(--bdr)'">
        <div style="width:48px;height:48px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;"><svg width="26" height="26" viewBox="0 0 26 26" fill="none"><circle cx="13" cy="13" r="10" stroke="#4220C8" stroke-width="2.5"/><path d="M13 7v6l4 2" stroke="#4220C8" stroke-width="2" stroke-linecap="round"/></svg></div>
        <div style="font-size:14px;font-weight:800;color:var(--ink);margin-bottom:5px;">Azure AD</div>
        <div style="font-size:12px;color:var(--ink4);line-height:1.5;">Microsoft identity integration for organisations on the Microsoft stack</div>
      </div>
      <div style="background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:22px 18px;text-align:center;box-shadow:var(--sh);transition:all .22s;" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='var(--sh2)';this.style.borderColor='var(--bdr2)'" onmouseout="this.style.transform='';this.style.boxShadow='var(--sh)';this.style.borderColor='var(--bdr)'">
        <div style="width:48px;height:48px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;"><svg width="26" height="26" viewBox="0 0 26 26" fill="none"><path d="M13 4C8 4 4 8 4 13s4 9 9 9 9-4 9-9-4-9-9-9z" stroke="#4220C8" stroke-width="2.2"/><path d="M4 13h18M13 4c-2.5 3-4 5.8-4 9s1.5 6 4 9M13 4c2.5 3 4 5.8 4 9s-1.5 6-4 9" stroke="#4220C8" stroke-width="1.6"/></svg></div>
        <div style="font-size:14px;font-weight:800;color:var(--ink);margin-bottom:5px;">iMIS</div>
        <div style="font-size:12px;color:var(--ink4);line-height:1.5;">Member data, CE completions, and enrolments sync bidirectionally with iMIS</div>
      </div>
      <div style="background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:22px 18px;text-align:center;box-shadow:var(--sh);transition:all .22s;" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='var(--sh2)';this.style.borderColor='var(--bdr2)'" onmouseout="this.style.transform='';this.style.boxShadow='var(--sh)';this.style.borderColor='var(--bdr)'">
        <div style="width:48px;height:48px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;"><svg width="26" height="26" viewBox="0 0 26 26" fill="none"><rect x="3" y="6" width="20" height="14" rx="3" stroke="#4220C8" stroke-width="2.2"/><path d="M8 12h10M8 16h6" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round"/></svg></div>
        <div style="font-size:14px;font-weight:800;color:var(--ink);margin-bottom:5px;">Zoom</div>
        <div style="font-size:12px;color:var(--ink4);line-height:1.5;">Schedule and manage live training sessions alongside online modules</div>
      </div>
      <div style="background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:22px 18px;text-align:center;box-shadow:var(--sh);transition:all .22s;" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='var(--sh2)';this.style.borderColor='var(--bdr2)'" onmouseout="this.style.transform='';this.style.boxShadow='var(--sh)';this.style.borderColor='var(--bdr)'">
        <div style="width:48px;height:48px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;"><svg width="26" height="26" viewBox="0 0 26 26" fill="none"><path d="M13 3L4 8v5c0 5.5 3.8 10.7 9 12 5.2-1.3 9-6.5 9-12V8L13 3z" stroke="#4220C8" stroke-width="2.2" stroke-linejoin="round"/><path d="M9 13l3 3 5-5" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <div style="font-size:14px;font-weight:800;color:var(--ink);margin-bottom:5px;">SAML 2.0 SSO</div>
        <div style="font-size:12px;color:var(--ink4);line-height:1.5;">Works with any SAML 2.0 provider your organisation already relies on</div>
      </div>
    </div>
    <div style="text-align:center;"><a href="{{ route('product.integrations')}}" class="sec-cta" style="margin-top:28px;">Check Out All Integrations</a></div>
  </div>
</section>

<!-- RELATED USE CASES -->
<section class="sec sw">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Related Use Cases</div>
      <h2 class="heading">Nonprofit Training Covers<br><em>More Than One Use Case</em></h2>
      <p class="lead cx">Volunteer training, compliance, certifications, and member education are all connected. Explore how MyPass LMS supports the full learning lifecycle for your organisation.</p>
    </div>
    <div class="uc-grid">
      <div class="ucc">
        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=700&q=80&auto=format&fit=crop" alt="Employee and volunteer onboarding training">
        <div class="ucc-body"><span class="ucc-tag">Use Case</span><div class="ucc-t">Employee Onboarding</div><div class="ucc-d">Structured onboarding for every new staff member from day one. Consistent, trackable, and automatic — whether you are onboarding one person or one hundred.</div><a href="https://kp.kprise.com/use-cases/onboarding" class="ucc-link">Read more <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></a></div>
      </div>
      <div class="ucc">
        <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=700&q=80&auto=format&fit=crop" alt="Nonprofit compliance and safeguarding training">
        <div class="ucc-body"><span class="ucc-tag">Use Case</span><div class="ucc-t">Compliance Training</div><div class="ucc-d">Safeguarding, data protection, and funder-required compliance training tracked automatically and reportable in seconds. No spreadsheets, no manual follow-up.</div><a href="https://kp.kprise.com/use-cases/compliance" class="ucc-link">Read more <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></a></div>
      </div>
      <div class="ucc">
        <img src="https://images.unsplash.com/photo-1542744094-24638eff58bb?w=700&q=80&auto=format&fit=crop" alt="Nonprofits and associations industry page">
        <div class="ucc-body"><span class="ucc-tag">Industry</span><div class="ucc-t">Nonprofits and Associations — Full Overview</div><div class="ucc-d">The complete picture of how MyPass LMS supports nonprofits and associations — member management, programme delivery, CE tracking, AMS integration, and more.</div><a href="https://kp.kprise.com/industries/nonprofit" class="ucc-link">See the full overview <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></a></div>
      </div>
    </div>
  </div>
</section>

<!-- RESOURCES -->
<section class="sec sbg">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Learning Resources</div>
      <h2 class="heading">Practical Guides for Nonprofit<br><em>and Association Teams</em></h2>
      <p class="lead cx">Whitepapers, case studies, and platform comparisons written for the people who actually run training programmes in mission-driven organisations.</p>
    </div>
    <div class="res-grid">
      <div class="rcard">
        <span class="rtype">Whitepapers and Guides</span>
        <div class="rt">Learning Insights Hub — LMS Buying Guides for Nonprofits and Associations</div>
        <div class="rd">Practical whitepapers on how to write an LMS RFP that surfaces the right capabilities for a nonprofit or association, how AI removes 60 to 80 percent of LMS administrative work, and the most common mistakes organisations make when selecting a training platform. If you are evaluating your options, start here before you start scheduling demos.</div>
        <a href="https://kprise.com/learning-insights-hub/" class="rlink" target="_blank" rel="noopener">Download the guides <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></a>
      </div>
      <div class="rcard">
        <span class="rtype">Real Customer Stories</span>
        <div class="rt">Case Studies — How Nonprofits and Associations Use MyPass LMS to Scale Training</div>
        <div class="rd">Real account-by-account case studies from nonprofits and associations that moved from manual training chaos to structured, automated programmes. The American Board, Youth for Understanding, PDK International, and others — what the problem was, what changed, and what the results looked like at 30 days and beyond.</div>
        <a href="https://kprise.com/case-study/" class="rlink" target="_blank" rel="noopener">Read the case studies <svg viewBox="0 0 12 12"><polyline points="3 2 9 6 3 10"/></svg></a>
      </div>
      <div class="rcard">
        <span class="rtype">Independent Comparisons</span>
        <div class="rt">LMS Comparisons — How MyPass LMS Stacks Up Against Docebo, Moodle, TalentLMS, and More</div>
        <div class="rd">Feature-by-feature comparisons covering the capabilities that matter most to nonprofits and associations — AMS integration, CE tracking, automated assignment, audit reporting, certification management, and pricing model. No marketing spin. Clear, honest comparisons so you can make an informed decision.</div>
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
      <h2 class="heading">What Nonprofits and Associations Ask<br><em>Before Starting Their Free Trial</em></h2>
      <p class="lead cx">If your question is not here, our team responds the same day. Visit our <a href="https://help.kprise.com" target="_blank" rel="noopener" style="color:var(--b);font-weight:700;">Help Center</a> for detailed documentation.</p>
    </div>
    <div class="faq-grid">
      <div class="fi open">
        <div class="fi-q">Does MyPass LMS work with our existing AMS?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">Yes. MyPass LMS integrates with leading Association Management Systems including iMIS, MemberClicks, GrowthZone, YourMembership, Fonteva, and Nimble AMS via API. Member data, SSO, CE completions, and enrolment rules sync bidirectionally without manual exports. For AMS platforms not on the standard list, our technical team builds custom integrations — most new connections go live within two to four weeks.</div>
      </div>
      <div class="fi">
        <div class="fi-q">What if we do not have an AMS yet?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">MyPass LMS includes built-in member management tools so you do not need a separate AMS to manage members, volunteers, and training in one place. You can manage member profiles, membership status, volunteer records, training assignments, and CE tracking all from within MyPass LMS. If you later add or upgrade to a dedicated AMS, the platform connects to it seamlessly.</div>
      </div>
      <div class="fi">
        <div class="fi-q">How does CE and certification tracking work?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">MyPass LMS tracks CE credit hours, manages certification timelines, sends automated renewal reminders, and issues branded certificates on completion. All completion data is synced back to member records in your AMS automatically. You get a live view of who is compliant, who is behind, and what renewal deadlines are approaching — without any manual tracking or spreadsheet maintenance.</div>
      </div>
      <div class="fi">
        <div class="fi-q">Can we onboard large numbers of volunteers quickly?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">Yes. One of our customers onboarded 94 volunteers in a single afternoon with zero manual assignments by their coordinator. The moment a volunteer is added to MyPass LMS — individually, by bulk upload, or via your AMS — their role-specific onboarding path begins automatically. Safeguarding, programme orientation, and required compliance training are assigned and tracked without coordinator involvement.</div>
      </div>
      <div class="fi">
        <div class="fi-q">Can we produce compliance evidence for funders instantly?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">Yes. Every learner action in MyPass LMS — completion, assessment, certificate issuance, and timestamp — is recorded automatically. You can generate a filtered compliance report for any team, volunteer cohort, programme, or individual in seconds. Reports are exportable and ready to share with funders, boards, or regulators immediately, with no manual data assembly required.</div>
      </div>
      <div class="fi">
        <div class="fi-q">Is the 2-month free trial completely free?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">Yes, completely. Full platform access for 2 months with no credit card required, no commitment, and no feature restrictions. You can set up volunteer onboarding programmes, assign real training, test CE tracking and compliance reporting, and verify the platform meets your organisation's specific needs before you decide anything. <a href="https://mypasslms.us/login#register" style="color:var(--b);font-weight:700;">Start your free trial here</a>.</div>
      </div>
      <div class="fi">
        <div class="fi-q">What is the nonprofit and association pricing?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
        <div class="fi-a">Nonprofits and associations receive a <strong>2-month free trial</strong> — double the standard trial — plus a <strong>20% ongoing discount</strong> on all plan tiers. Active user pricing means you pay only for members and volunteers who actively engage with training each cycle, not for your full membership headcount. Plans start from $63/month after the trial period. <a href="https://calendly.com/onlinesales-kprise/30min" style="color:var(--b);font-weight:700;">Book a call to discuss your situation</a>.</div>
      </div>
    </div>
  
</section>

<!-- CTA -->
<section class="cta-sec">
  <div class="cta-in">
    <div class="cta-tag">2-Month Free Trial for Nonprofits &mdash; No Card Required</div>
    <h2 class="cta-h">Your Mission Deserves<br><em>a Platform Built for It.</em></h2>
    <p class="cta-p">Stop stitching together spreadsheets, manual reminders, and disconnected systems to manage training. MyPass LMS brings your staff, volunteer, and member training into one connected platform that runs automatically so your team can focus on the work that matters.</p>
    <div class="cta-btns">
      <a href="https://mypasslms.us/login#register" class="btn-a">Start Free for 60 Days</a>
      <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b">Book a 30-Minute Demo</a>
    </div>
    <p class="cta-note">2-month free trial &middot; 20% ongoing nonprofit discount &middot; No credit card required &middot; AWS FedRAMP infrastructure</p>
  </div>
</section>


<script>
(function(){
  // FAQ accordion
  document.querySelectorAll('.fi-q').forEach(function(q){
    q.addEventListener('click', function(e){
      var fi = this.closest('.fi');
      if(fi) fi.classList.toggle('open');
    });
  });
})();
</script>
@endsection

@push('schema')
@verbatim
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"SoftwareApplication","name":"MyPass LMS Nonprofit and Volunteer Training Software","applicationCategory":"BusinessApplication","operatingSystem":"Web","description":"LMS platform for nonprofits and associations with volunteer onboarding, AMS integration, CE credit tracking, safeguarding compliance, and automated certification management. 2-month free trial for nonprofits with no credit card required.","offers":{"@type":"Offer","price":"0","priceCurrency":"USD","description":"2-month free trial for nonprofits with full platform access, no credit card required"},"provider":{"@type":"Organization","name":"Kprise","url":"https://kprise.com","telephone":"+12403164903","address":{"@type":"PostalAddress","streetAddress":"3905 National Drive, Suite 330","addressLocality":"Burtonsville","addressRegion":"MD","postalCode":"20866","addressCountry":"US"}},"aggregateRating":{"@type":"AggregateRating","ratingValue":"4.7","reviewCount":"47","bestRating":"5"}}
</script>
@endverbatim
@endpush

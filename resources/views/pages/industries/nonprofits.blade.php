@extends('layouts.app')

@push('styles')
<style>*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{font-family:'Plus Jakarta Sans',sans-serif;background:#F8F8FB;color:#0F0C1F;line-height:1.65;-webkit-font-smoothing:antialiased;overflow-x:hidden}
img{max-width:100%;display:block}
a{color:inherit;text-decoration:none}
:root{--b:#4220C8;--bd:#2D1490;--bm:#7B5EEA;--bl:#EEE9FF;--bl2:#F5F2FF;--bg:#F8F8FB;--w:#FFFFFF;--ink:#0F0C1F;--ink2:#27224A;--ink3:#524D72;--ink4:#9B96B0;--ok:#16A34A;--bdr:rgba(66,32,200,0.08);--bdr2:rgba(66,32,200,0.16);--sh:0 1px 3px rgba(66,32,200,0.04),0 4px 14px rgba(66,32,200,0.06);--sh2:0 4px 14px rgba(66,32,200,0.08),0 12px 32px rgba(66,32,200,0.08);--sh3:0 8px 24px rgba(66,32,200,0.10),0 20px 48px rgba(66,32,200,0.10);--gr:linear-gradient(135deg,var(--b),var(--bd));--rad:16px}

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
.btn-si{font-size:13px;font-weight:600;padding:7px 15px;border:1.5px solid var(--bdr2);border-radius:8px;color:var(--ink2);background:var(--w);cursor:pointer;font-family:inherit;transition:all .16s}
.btn-si:hover{border-color:var(--b);color:var(--b)}
.btn-demo{font-size:13px;font-weight:700;padding:8px 18px;background:var(--gr);color:#fff;border:none;border-radius:8px;box-shadow:0 3px 12px rgba(66,32,200,0.24);cursor:pointer;font-family:inherit;transition:all .16s}
.btn-demo:hover{transform:translateY(-1px);box-shadow:0 5px 16px rgba(66,32,200,0.36)}

/* ── HERO ── */
.hero{background:var(--w);border-bottom:1px solid var(--bdr);padding:52px 48px 0;overflow:hidden;position:relative}
.hero::after{content:'';position:absolute;top:0;right:0;bottom:0;width:48%;background:linear-gradient(to right,transparent,var(--bl2) 40%);pointer-events:none}
.hero-grid{max-width:1500px;margin:0 auto;display:grid;grid-template-columns:1fr 460px;gap:52px;align-items:center;position:relative;z-index:1}
.bc{display:flex;align-items:center;gap:6px;margin-bottom:14px}
.bc a{font-size:12px;font-weight:600;color:var(--ink4)}
.bc a:hover{color:var(--b)}
.bc-sep{font-size:12px;color:var(--bdr2)}
.bc span{font-size:12px;font-weight:600;color:var(--b)}
.htag{display:inline-flex;align-items:center;gap:6px;background:var(--bl);border:1px solid var(--bdr2);border-radius:100px;padding:4px 13px 4px 8px;margin-bottom:16px}
.htag-dot{width:6px;height:6px;border-radius:50%;background:var(--b);animation:breathe 2s ease-in-out infinite}
@keyframes breathe{0%,100%{opacity:1}50%{opacity:.35}}
.htag span{font-size:11px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:var(--b)}
.hero h1{font-size:44px;font-weight:900;line-height:1.09;letter-spacing:-1.8px;color:var(--ink);margin-bottom:16px}
.hero h1 em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent}
.hero-sub{font-size:16.5px;line-height:1.74;color:var(--ink3);margin-bottom:28px;max-width:780px}
.hero-sub strong{color:var(--ink2);font-weight:700}
.hbtns{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:24px}
.btn-a{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:14.5px;font-weight:700;padding:12px 24px;border-radius:10px;background:var(--gr);color:#fff;border:none;cursor:pointer;box-shadow:0 4px 14px rgba(66,32,200,0.26);transition:all .2s}
.btn-a:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(66,32,200,0.36)}
.btn-b{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:14.5px;font-weight:600;padding:11px 22px;border-radius:10px;background:var(--w);color:var(--b);border:1.5px solid var(--bdr2);cursor:pointer;transition:all .2s}
.btn-b:hover{background:var(--bl)}
.trust-row{display:flex;gap:16px;flex-wrap:wrap}
.tchip{display:flex;align-items:center;gap:5px;font-size:12.5px;font-weight:600;color:var(--ink4)}
.tchip svg{width:13px;height:13px;stroke:var(--ok);stroke-width:2.5;fill:none;stroke-linecap:round;stroke-linejoin:round}
.hero-img-wrap{position:relative;align-self:flex-end}
.hero-img{width:100%;height:380px;object-fit:cover;border-radius:14px 14px 0 0;box-shadow:0 -4px 32px rgba(66,32,200,0.1)}
.h-float{position:absolute;top:18px;left:18px;background:var(--w);border:1px solid var(--bdr);border-radius:12px;padding:12px 16px;box-shadow:var(--sh2);display:flex;align-items:center;gap:10px}
.hf-dot{width:8px;height:8px;border-radius:50%;background:var(--ok);animation:breathe 2s ease-in-out infinite}
.hf-n{font-size:19px;font-weight:900;color:var(--b);letter-spacing:-0.5px}
.hf-l{font-size:11px;color:var(--ink3);margin-top:1px;font-weight:500}

/* ── LOGO BAR ── */
.logo-bar{background:var(--w);border-bottom:1px solid var(--bdr);padding:20px 0}
.lb-lbl{font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--ink4);margin-bottom:14px;text-align:center}
.lb-track-wrap{overflow:hidden;position:relative}
.lb-track-wrap::before,.lb-track-wrap::after{content:'';position:absolute;top:0;bottom:0;width:80px;z-index:2;pointer-events:none}
.lb-track-wrap::before{left:0;background:linear-gradient(to right,var(--w),transparent)}
.lb-track-wrap::after{right:0;background:linear-gradient(to left,var(--w),transparent)}
.lb-track {display: flex;align-items: center;width: max-content;opacity: 0;visibility: hidden;animation: marquee 60s linear infinite,showAfterLoad 0.5s ease forwards;animation-delay: 0s,1s; }
@keyframes showAfterLoad {
  to {
    opacity: 1;
    visibility: visible;
  }
}
.lb-track:hover{animation-play-state:paused}
@keyframes marquee{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
.lb-item{display:flex;align-items:center;justify-content:center;padding:0 36px;height:40px;flex-shrink:0;border-right:1px solid var(--bdr);}
.lb-item:hover{opacity:1;filter:grayscale(0)}

/* ── STATS ── */
.stats{background:var(--bl2);border-bottom:1px solid var(--bdr)}
.stats-in{max-width:1500px;margin:0 auto;display:grid;grid-template-columns:repeat(4,1fr)}
.sc{padding:20px 24px;display:flex;align-items:center;gap:16px;border-right:1px solid var(--bdr)}
.sc:last-child{border-right:none}
.sc-n{font-size:34px;font-weight:900;letter-spacing:-1.5px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;flex-shrink:0;min-width:52px}
.sc-l{font-size:12.5px;color:var(--ink3);font-weight:500;line-height:1.45;border-left:1.5px solid var(--bdr2);padding-left:14px}

/* ── SHARED ── */
.sec{padding:68px 48px}
.sw{background:var(--w)}
.sbg{background:var(--bg)}
.stint{background:var(--bl2)}
.wrap{max-width:1500px;margin:0 auto}
.eyebrow{display:inline-flex;align-items:center;gap:6px;font-size:14px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);margin-bottom:10px}
.eyebrow .ew{width:16px;height:2.5px;background:var(--gr);border-radius:2px;flex-shrink:0}
.heading{font-size:34px;font-weight:800;line-height:1.30;color:var(--ink);margin-bottom:12px}
.heading em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent}
.lead{font-size:16px;color:var(--ink3);line-height:1.76;max-width:1280px}
.cx{text-align:center}
.cx .lead{margin:0 auto}
.cx .eyebrow{justify-content:center}
.btn-primary{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:14.5px;font-weight:700;padding:11px 22px;border-radius:10px;background:var(--gr);color:#fff;border:none;cursor:pointer;box-shadow:0 3px 12px rgba(66,32,200,0.22);transition:all .2s;margin-top:28px}
.btn-primary:hover{transform:translateY(-2px);box-shadow:0 5px 18px rgba(66,32,200,0.32)}
.btn-ghost{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:14.5px;font-weight:600;padding:10px 20px;border-radius:10px;background:transparent;color:var(--b);border:1.5px solid var(--bdr2);cursor:pointer;transition:all .2s;margin-top:28px}
.btn-ghost:hover{background:var(--bl)}

/* ── VALUE PROPS ── */
.vp-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:36px}
.vpc{background:var(--w);border:1px solid var(--bdr);border-radius:var(--rad);padding:24px 22px;box-shadow:var(--sh);transition:all .22s;position:relative;overflow:hidden}
.vpc::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--gr);border-radius:var(--rad) var(--rad) 0 0;opacity:0;transition:opacity .22s}
.vpc:hover{transform:translateY(-3px);box-shadow:var(--sh2);border-color:var(--bdr2)}
.vpc:hover::before{opacity:1}
.vpc-ic{width:44px;height:44px;border-radius:12px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin-bottom:13px}
.vpc-ic svg{width:22px;height:22px;stroke:var(--b);stroke-width:1.8;fill:none;stroke-linecap:round;stroke-linejoin:round}
.vpc-t{font-size:15.5px;font-weight:700;color:var(--ink);margin-bottom:6px}
.vpc-d{font-size:13px;color:var(--ink3);line-height:1.68}

/* ── FEATURE ROWS ── */
.feat-wrap{max-width:1500px;margin:0 auto;display:flex;flex-direction:column;gap:72px;padding:0 48px 68px}
.frow{display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center}
.frow.flip{direction:rtl}
.frow.flip>*{direction:ltr}
.frow-img{border-radius:18px;overflow:hidden;box-shadow:var(--sh3);position:relative}
.frow-img img{width:100%;height:380px;object-fit:cover}
.frow-badge{position:absolute;bottom:14px;left:14px;background:rgba(255,255,255,.96);border:1px solid var(--bdr);border-radius:10px;padding:9px 14px;display:flex;align-items:center;gap:8px;box-shadow:var(--sh)}
.fb-ok{width:7px;height:7px;border-radius:50%;background:var(--ok);flex-shrink:0}
.fb-t{font-size:12px;font-weight:700;color:var(--ink)}
.frow-txt .heading{font-size:30px;margin-bottom:10px}
.frow-txt p{font-size:15px;color:var(--ink3);line-height:1.74;margin-bottom:14px}
.fpts{display:flex;flex-direction:column;gap:9px;margin:16px 0 22px}
.fp{display:flex;align-items:flex-start;gap:9px;font-size:13.5px;color:var(--ink3)}
.fp svg{width:15px;height:15px;flex-shrink:0;margin-top:2px;stroke:var(--ok);stroke-width:2.5;fill:none;stroke-linecap:round;stroke-linejoin:round}

/* ── COURSES BAND ── */
.courses-band{background:var(--bl2);border-top:1px solid var(--bdr);border-bottom:1px solid var(--bdr);padding:56px 48px}
.courses-inner{max-width:1500px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center}
.courses-chips{display:flex;flex-wrap:wrap;gap:8px;margin-top:18px}
.cchip{background:var(--bl);border:1px solid var(--bdr);border-radius:8px;padding:6px 14px;font-size:12.5px;font-weight:700;color:var(--ink2)}
.courses-card{background:var(--w);border:1px solid var(--bdr);border-radius:16px;padding:24px;box-shadow:var(--sh)}
.courses-card p.note{font-size:12px;color:var(--ink4);margin-top:14px;line-height:1.5}
.courses-btns{display:flex;gap:10px;flex-wrap:wrap;margin-top:24px}
.btn-lib{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:14.5px;font-weight:700;padding:11px 22px;border-radius:10px;background:var(--gr);color:#fff;border:none;cursor:pointer;box-shadow:0 3px 12px rgba(66,32,200,0.22);transition:all .2s}
.btn-lib:hover{transform:translateY(-2px);box-shadow:0 5px 18px rgba(66,32,200,0.32)}
.btn-lib2{display:inline-flex;align-items:center;gap:7px;font-family:inherit;font-size:14.5px;font-weight:600;padding:10px 20px;border-radius:10px;background:transparent;color:var(--b);border:1.5px solid var(--bdr2);cursor:pointer;transition:all .2s}
.btn-lib2:hover{background:var(--bl)}

/* ── HIGHLIGHT BAND ── */
.hl-band{background:var(--bl2);border-top:1px solid var(--bdr);border-bottom:1px solid var(--bdr);padding:56px 48px}
.hl-inner{max-width:1500px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center}
.hl-h{font-size:34px;font-weight:900;line-height:1.12;letter-spacing:-1.2px;color:var(--ink);margin-bottom:12px}
.hl-h em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent}
.hl-p{font-size:16px;color:var(--ink3);line-height:1.72;margin-bottom:22px}
.hlm{background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:18px 22px;display:flex;gap:16px;align-items:center;box-shadow:var(--sh);margin-bottom:14px}
.hlm:last-child{margin-bottom:0}
.hlm-n{font-size:36px;font-weight:900;letter-spacing:-1.5px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;flex-shrink:0;min-width:80px}
.hlm-t{font-size:13.5px;font-weight:700;color:var(--ink);margin-bottom:2px}
.hlm-d{font-size:12px;color:var(--ink3);line-height:1.5}

/* ── TESTIMONIALS ── */
.tc-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:36px}
.tc{background:var(--w);border:1px solid var(--bdr);border-radius:18px;padding:26px;display:flex;flex-direction:column;box-shadow:var(--sh);transition:all .22s}
.tc:hover{transform:translateY(-3px);box-shadow:var(--sh2);border-color:var(--bdr2)}
.tc.feat{background:var(--gr);border-color:transparent;box-shadow:0 8px 28px rgba(66,32,200,0.22)}
.tc-stars{font-size:11.5px;letter-spacing:2.5px;color:var(--b);margin-bottom:12px}
.tc.feat .tc-stars{color:var(--bl)}
.tc-q{font-size:38px;font-weight:900;line-height:1;color:var(--b);opacity:.16;margin-bottom:4px}
.tc.feat .tc-q{color:#fff;opacity:.2}
.tc-body{font-size:13.5px;line-height:1.76;color:var(--ink3);flex:1;margin-bottom:18px}
.tc.feat .tc-body{color:rgba(255,255,255,.74)}
.tc-author{display:flex;align-items:center;gap:10px}
.tc-av{width:38px;height:38px;border-radius:50%;font-size:13px;font-weight:800;color:#fff;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.tc-name{font-size:13.5px;font-weight:700;color:var(--ink)}
.tc.feat .tc-name{color:#fff}
.tc-role{font-size:11.5px;color:var(--ink4);margin-top:1px}
.tc.feat .tc-role{color:rgba(255,255,255,.48)}

/* ── BADGES ── */
.badge-row{display:flex;align-items:center;justify-content:center;gap:14px;flex-wrap:wrap;margin-top:28px}
.rbadge{background:var(--w);border:1px solid var(--bdr);border-radius:12px;padding:10px 14px;display:flex;align-items:center;justify-content:center;box-shadow:var(--sh);transition:all .2s;height:68px}
.rbadge:hover{border-color:var(--bdr2);transform:translateY(-2px);box-shadow:var(--sh2)}
.rbadge img{height:42px;width:auto;object-fit:contain}

/* ── INTEGRATIONS ── */
.int-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:14px;margin-top:32px}
.int-card{background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:20px 16px;text-align:center;box-shadow:var(--sh);transition:all .22s}
.int-card:hover{transform:translateY(-3px);box-shadow:var(--sh2);border-color:var(--bdr2)}
.int-icon{width:46px;height:46px;border-radius:11px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin:0 auto 11px}
.int-name{font-size:13.5px;font-weight:800;color:var(--ink);margin-bottom:4px}
.int-desc{font-size:11.5px;color:var(--ink4);line-height:1.5}

/* ── RELATED CARDS ── */
.uc-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:36px}
.ucc{background:var(--w);border:1px solid var(--bdr);border-radius:var(--rad);overflow:hidden;box-shadow:var(--sh);transition:all .22s;display:flex;flex-direction:column}
.ucc:hover{transform:translateY(-3px);box-shadow:var(--sh2);border-color:var(--bdr2)}
.ucc img{width:100%;height:148px;object-fit:cover}
.ucc-body{padding:16px 18px;flex:1;display:flex;flex-direction:column}
.ucc-tag{font-size:10px;font-weight:800;letter-spacing:.09em;text-transform:uppercase;color:var(--b);background:var(--bl);padding:2px 8px;border-radius:5px;display:inline-block;margin-bottom:8px;max-width:fit-content}
.ucc-t{font-size:14.5px;font-weight:700;color:var(--ink);margin-bottom:6px;line-height:1.4}
.ucc-d{font-size:12.5px;color:var(--ink3);line-height:1.6;margin-bottom:12px;flex:1}
.ucc-link{display:inline-flex;align-items:center;gap:4px;font-size:12.5px;font-weight:700;color:var(--b)}
.ucc-link svg{width:11px;height:11px;stroke:var(--b);stroke-width:2.5;fill:none;transition:transform .16s}
.ucc-link:hover svg{transform:translateX(3px)}

/* ── RESOURCES ── */
.res-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:36px}
.rcard{background:var(--w);border:1px solid var(--bdr);border-radius:var(--rad);padding:22px;box-shadow:var(--sh);transition:all .22s;display:flex;flex-direction:column}
.rcard:hover{transform:translateY(-3px);box-shadow:var(--sh2);border-color:var(--bdr2)}
.rtype{font-size:10px;font-weight:800;letter-spacing:.09em;text-transform:uppercase;color:var(--bm);background:var(--bl);padding:2px 8px;border-radius:5px;display:inline-block;margin-bottom:10px}
.rt{font-size:14.5px;font-weight:700;color:var(--ink);margin-bottom:6px;line-height:1.4}
.rd{font-size:12.5px;color:var(--ink3);line-height:1.6;margin-bottom:14px;flex:1}
.rlink{display:inline-flex;align-items:center;gap:4px;font-size:12.5px;font-weight:700;color:var(--b)}
.rlink svg{width:11px;height:11px;stroke:var(--b);stroke-width:2.5;fill:none;transition:transform .16s}
.rlink:hover svg{transform:translateX(3px)}

/* ── FAQ ── */
.faq-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:32px}
.fi{border:1.5px solid var(--bdr);border-radius:13px;background:var(--w);transition:border-color .18s,box-shadow .18s}
.fi.open{border-color:var(--bdr2);box-shadow:var(--sh)}
.fi-q{display:flex;justify-content:space-between;align-items:center;gap:12px;padding:16px 18px;font-size:14.5px;font-weight:700;color:var(--ink);line-height:1.4;cursor:pointer;user-select:none}
.fi-t{width:24px;height:24px;min-width:24px;border-radius:50%;background:var(--bl);display:flex;align-items:center;justify-content:center;transition:transform .2s,background .2s;flex-shrink:0}
.fi-t svg{width:12px;height:12px;stroke:var(--b);stroke-width:2.5;fill:none;stroke-linecap:round;stroke-linejoin:round}
.fi.open .fi-t{transform:rotate(45deg);background:var(--b)}
.fi.open .fi-t svg{stroke:#fff}
.fi-a{display:none;padding:0 18px 16px;font-size:13.5px;line-height:1.74;color:var(--ink3);border-top:1px solid var(--bdr);padding-top:14px}
.fi.open .fi-a{display:block}
.fi-a a{color:var(--b);font-weight:600}

/* ── CTA ── */
.cta-sec{background:var(--bl2);border-top:1px solid var(--bdr);padding:68px 48px;text-align:center;position:relative;overflow:hidden}
.cta-sec::before{content:'';position:absolute;inset:0;background:radial-gradient(circle 300px at 50% 50%,rgba(66,32,200,0.05),transparent);pointer-events:none}
.cta-in{max-width:1020px;margin:0 auto;position:relative;z-index:1}
.cta-tag{display:inline-block;background:var(--b);color:#fff;border-radius:100px;padding:4px 14px;font-size:10.5px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;margin-bottom:16px}
.cta-h{font-size:38px;font-weight:900;line-height:1.30;color:var(--ink);margin-bottom:12px}
.cta-h em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent}
.cta-p{font-size:16px;color:var(--ink3);line-height:1.72;margin-bottom:26px}
.cta-btns{display:flex;gap:10px;justify-content:center;flex-wrap:wrap;margin-bottom:12px}
.cta-note{font-size:14px;color:var(--ink4)}

/* ── RESPONSIVE ── */
@media(max-width:1024px){
  .hero-grid,.hl-inner,.courses-inner,.foot-top{grid-template-columns:1fr}
  .vp-grid{grid-template-columns:repeat(2,1fr)}
  .frow,.frow.flip{grid-template-columns:1fr;direction:ltr}
  .tc-grid,.uc-grid,.res-grid{grid-template-columns:repeat(2,1fr)}
  .int-grid{grid-template-columns:repeat(3,1fr)}
  .stats-in{grid-template-columns:repeat(2,1fr)}
  .faq-grid{grid-template-columns:1fr}
}
@media(max-width:640px){
  .topnav{padding:0 20px}
  .tn-links{display:none}
  .hero{padding:36px 20px 0}
  .sec,.courses-band,.hl-band,.cta-sec,.site-footer{padding-left:20px;padding-right:20px}
  .feat-wrap{padding-left:20px;padding-right:20px}
  .hero h1{font-size:32px}
  .vp-grid,.tc-grid,.uc-grid,.res-grid{grid-template-columns:1fr}
  .int-grid{grid-template-columns:repeat(2,1fr)}
  .foot-top{grid-template-columns:1fr}
  .hbtns{flex-direction:column}
}
/* ─ HERO FIX: eliminate gap above image ─ */
.hero{background:var(--w);border-bottom:1px solid var(--bdr);
  padding:40px 48px 0;overflow:hidden;position:relative;min-height:520px}
.hero::after{content:'';position:absolute;top:0;right:0;bottom:0;width:48%;
  background:linear-gradient(to right,transparent,var(--bl2) 40%);pointer-events:none}
.hero-grid{max-width:1500px;margin:0 auto;display:grid;
  grid-template-columns:1fr 460px;gap:52px;align-items:end;
  position:relative;z-index:1}
.hero-img-wrap{position:relative;align-self:stretch;display:flex;
  flex-direction:column;justify-content:flex-end}
.hero-img{width:100%;height:100%;min-height:380px;object-fit:cover;
  object-position:center top;border-radius:14px 14px 0 0;
  box-shadow:0 -4px 32px rgba(66,32,200,0.1);flex:1}
@media(max-width:1024px){.hero-img{height:300px;min-height:unset;flex:none}.stats-in{grid-template-columns:repeat(2,1fr)}.sc{border-right:none;border-bottom:1px solid var(--bdr)}
  .hero-grid{grid-template-columns:1fr;align-items:start}}

/* ─ BEFORE / AFTER ─ */
.ba-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-top:36px}
.ba-card{border-radius:16px;padding:28px 26px;border:1.5px solid var(--bdr)}
.ba-card.before{background:var(--w)}
.ba-card.after{background:var(--bl2);border-color:var(--bdr2)}
.ba-label{display:inline-flex;align-items:center;gap:6px;font-size:10px;font-weight:800;
  letter-spacing:.1em;text-transform:uppercase;border-radius:100px;
  padding:3px 12px;margin-bottom:16px}
.ba-label.b{background:#FEE2E2;color:#991B1B}
.ba-label.a{background:#DCFCE7;color:#166534}
.ba-list{display:flex;flex-direction:column;gap:11px}
.ba-item{display:flex;align-items:flex-start;gap:9px;font-size:13.5px;
  color:var(--ink3);line-height:1.6}
.ba-item svg{width:16px;height:16px;flex-shrink:0;margin-top:2px}

/* ─ AMS FLOW ─ */
.ams-wrap{background:var(--w);border:1px solid var(--bdr);border-radius:20px;
  padding:36px;box-shadow:var(--sh2);margin-top:36px}
.ams-diagram{display:grid;grid-template-columns:1fr 64px 1fr;
  gap:18px;align-items:center;margin:24px 0}
.ams-col{border:1.5px solid var(--bdr2);border-radius:14px;padding:20px 22px}
.ams-col.lms{background:var(--bl2)}
.ams-col-label{font-size:10.5px;font-weight:800;letter-spacing:.1em;
  text-transform:uppercase;color:var(--b);margin-bottom:12px}
.ams-col-items{display:flex;flex-direction:column;gap:8px}
.ams-col-item{display:flex;align-items:center;gap:8px;font-size:13px;color:var(--ink3)}
.ams-col-item::before{content:'';width:5px;height:5px;border-radius:50%;
  background:var(--b);flex-shrink:0}
.ams-mid{display:flex;flex-direction:column;align-items:center;gap:6px}
.ams-arrow-btn{width:44px;height:44px;border-radius:50%;background:var(--gr);
  display:flex;align-items:center;justify-content:center;
  box-shadow:0 4px 14px rgba(66,32,200,.28)}
.ams-arrow-btn svg{width:18px;height:18px;stroke:#fff;stroke-width:2.5;fill:none}
.ams-mid-lbl{font-size:9px;font-weight:700;letter-spacing:.07em;text-transform:uppercase;
  color:var(--b);text-align:center;line-height:1.4}
.ams-platforms{display:flex;flex-wrap:wrap;gap:8px;margin-top:20px}
.ams-pill{background:var(--bl);border:1px solid var(--bdr2);border-radius:8px;
  padding:6px 14px;font-size:12.5px;font-weight:700;color:var(--ink2);
  transition:all .18s;cursor:default}
.ams-pill:hover{background:var(--bl);border-color:var(--b);color:var(--b)}
.ams-note{font-size:12px;color:var(--ink4);margin-top:12px;line-height:1.6}

/* ─ WITH / WITHOUT AMS ─ */
.ww-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-top:32px}
.ww-card{border-radius:18px;padding:30px;border:1.5px solid var(--bdr)}
.ww-card.connected{background:var(--w)}
.ww-card.builtin{background:var(--bl2);border-color:var(--bdr2)}
.ww-icon{width:48px;height:48px;border-radius:13px;background:var(--bl);
  display:flex;align-items:center;justify-content:center;margin-bottom:16px}
.ww-icon svg{width:24px;height:24px;stroke:var(--b);stroke-width:1.8;
  fill:none;stroke-linecap:round;stroke-linejoin:round}
.ww-title{font-size:18px;font-weight:800;color:var(--ink);margin-bottom:8px;line-height:1.35}
.ww-desc{font-size:14px;color:var(--ink3);line-height:1.72;margin-bottom:18px}
.ww-list{display:flex;flex-direction:column;gap:9px;margin-bottom:22px}
.ww-item{display:flex;align-items:flex-start;gap:8px;font-size:13px;color:var(--ink3)}
.ww-item svg{width:14px;height:14px;flex-shrink:0;margin-top:2px;
  stroke:var(--ok);stroke-width:2.5;fill:none;stroke-linecap:round;stroke-linejoin:round}

/* ─ 3-COLUMN USE CASES ─ */
.uc3{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:32px}
.uc3-card{background:var(--w);border:1px solid var(--bdr);border-radius:14px;
  padding:22px;box-shadow:var(--sh);transition:all .22s;overflow:hidden;position:relative}
.uc3-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;
  background:var(--gr);opacity:0;transition:opacity .22s}
.uc3-card:hover{transform:translateY(-3px);box-shadow:var(--sh2);border-color:var(--bdr2)}
.uc3-card:hover::before{opacity:1}
.uc3-ic{width:42px;height:42px;border-radius:11px;background:var(--bl);
  display:flex;align-items:center;justify-content:center;margin-bottom:12px}
.uc3-ic svg{width:21px;height:21px}
.uc3-t{font-size:15px;font-weight:700;color:var(--ink);margin-bottom:5px;line-height:1.35}
.uc3-d{font-size:12.5px;color:var(--ink3);line-height:1.65}

/* ─ PROOF LAYOUT ─ */
.proof-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-top:36px}
.proof-tc{background:var(--w);border:1px solid var(--bdr);border-radius:18px;
  padding:26px;box-shadow:var(--sh);display:flex;flex-direction:column;transition:all .22s}
.proof-tc:hover{transform:translateY(-2px);box-shadow:var(--sh2)}
.proof-tc.feat{background:var(--gr);border-color:transparent;
  box-shadow:0 8px 28px rgba(66,32,200,.22)}
.pt-stars{font-size:11px;letter-spacing:3px;color:var(--b);margin-bottom:10px}
.proof-tc.feat .pt-stars{color:var(--bl)}
.pt-q{font-size:34px;font-weight:900;color:var(--b);opacity:.15;line-height:1;margin-bottom:2px}
.proof-tc.feat .pt-q{color:#fff;opacity:.2}
.pt-body{font-size:13.5px;line-height:1.76;color:var(--ink3);flex:1;margin-bottom:16px}
.proof-tc.feat .pt-body{color:rgba(255,255,255,.76)}
.pt-author{display:flex;align-items:center;gap:10px}
.pt-av{width:38px;height:38px;border-radius:50%;font-size:13px;font-weight:800;
  color:#fff;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.pt-name{font-size:13.5px;font-weight:700;color:var(--ink)}
.proof-tc.feat .pt-name{color:#fff}
.pt-role{font-size:11.5px;color:var(--ink4);margin-top:1px}
.proof-tc.feat .pt-role{color:rgba(255,255,255,.48)}
.proof-stats{background:var(--bl2);border:1px solid var(--bdr);border-radius:18px;
  padding:26px;display:grid;grid-template-columns:1fr 1fr;gap:14px}
.ps-cell{background:var(--w);border-radius:12px;padding:18px;text-align:center;border:1px solid var(--bdr)}
.ps-n{font-size:34px;font-weight:900;letter-spacing:-1.5px;background:var(--gr);
  -webkit-background-clip:text;background-clip:text;color:transparent}
.ps-l{font-size:12.5px;font-weight:600;color:var(--ink);margin:5px 0 3px;line-height:1.4}
.ps-d{font-size:11px;color:var(--ink4);line-height:1.5}

/* ─ RESPONSIVE ─ */
@media(max-width:1024px){
  .ba-grid,.ww-grid,.proof-grid{grid-template-columns:1fr}
  .ams-diagram{grid-template-columns:1fr;gap:10px}
  .ams-mid{flex-direction:row}
  .uc3{grid-template-columns:1fr 1fr}
}
@media(max-width:640px){
  .uc3,.proof-stats{grid-template-columns:1fr}
}</style>
@endpush

@section('content')
<header class="hero">
  <div class="hero-grid">
    <div>
      <nav class="bc" aria-label="Breadcrumb">
        <a href="https://kp.kprise.com">Home</a><span class="bc-sep">/</span>
        <a href="#">Industries</a><span class="bc-sep">/</span>
        <span>Nonprofits &amp; Associations</span>
      </nav>
      <div class="htag"><span class="htag-dot"></span><span>Nonprofits &amp; Associations</span></div>
      <h1>Your AMS Holds Your Members.<br><em>Your LMS Should Know That.</em></h1>
      <p class="hero-sub">
        Right now, your LMS and AMS are two separate systems. Every member join, renewal, role change, or chapter transfer has to be manually reflected in your LMS — or it does not happen at all.
        <strong>MyPass LMS connects directly to your AMS</strong> so member data, enrolments, SSO, CE credits, and compliance reporting sync automatically. No spreadsheets. No CSV uploads. No manual cleanup.
      </p>
      <div class="hbtns">
        <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-a">See the AMS Integration</a>
        <a href="https://mypasslms.us/login#register" class="btn-b">Start Free for 60 Days</a>
      </div>
      <div class="trust-row">
        <div class="tchip"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>AMS integration included</div>
        <div class="tchip"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>CE tracking built in</div>
        <div class="tchip"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>2-month free trial</div>
        <div class="tchip" style="color:#166534;font-weight:800;background:#DCFCE7;border-radius:100px;padding:4px 12px;font-size:12.5px;border:1px solid #BBF7D0;display:flex;align-items:center;gap:5px"><svg viewBox="0 0 16 16" fill="none" stroke="#166534" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>20% nonprofit discount</div>
      </div>
    </div>
    <div class="hero-img-wrap">
      <img class="hero-img"
        src="https://images.unsplash.com/photo-1531482615713-2afd69097998?w=960&q=80&auto=format&fit=crop"
        alt="Nonprofit association team managing member training through MyPass LMS AMS integration"
        loading="eager" width="460" height="380">
      <div class="h-float">
        <div class="hf-dot"></div>
        <div>
          <div class="hf-n">0</div>
          <div class="hf-l">Manual CSV exports after AMS sync</div>
        </div>
      </div>
    </div>
  </div>
</header><div class="logo-bar">
  <p class="lb-lbl">Trusted by nonprofits, associations, and membership organisations across 15 countries</p>
  <div class="lb-track-wrap">
    <div class="lb-track" aria-hidden="true">
        @php 
            $trustedLogos = config('services.trustedLogos');
            $trustedLogosClass = 'lb-item';
        @endphp

        <x-logo-strip
            :logos="$trustedLogos"
            :logo-class="$trustedLogosClass"
        />
    </div>
  </div>
</div><div class="stats"><div class="stats-in">
  <div class="sc"><div class="sc-n">70%</div><div class="sc-l">Less admin work after AMS-connected deployment</div></div>
  <div class="sc"><div class="sc-n">0</div><div class="sc-l">Manual CSV exports — members sync bidirectionally</div></div>
  <div class="sc"><div class="sc-n">94</div><div class="sc-l">Volunteers onboarded in one afternoon, zero manual assignments</div></div>
  <div class="sc"><div class="sc-n">Day 1</div><div class="sc-l">Members and staff live the moment your portal is configured</div></div>
</div></div><section class="sec sw">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>The Core Problem</div>
      <h2 class="heading">Your LMS and AMS Were Never<br><em>Designed to Work Together.</em></h2>
      <p class="lead cx">That is why everything about running member training feels harder than it should be. Not because your team is inefficient — because two systems that hold the same data have never been connected.</p>
    </div>
    <div class="ba-grid">
      <div class="ba-card before">
        <div class="ba-label b">Without AMS Integration</div>
        <div class="ba-list">
          <div class="ba-item"><svg viewBox="0 0 16 16" fill="none" stroke="#DC2626" stroke-width="2.5" stroke-linecap="round"><path d="M4 4l8 8M12 4l-8 8"/></svg><span>Export member list as CSV, clean it, upload to LMS — every time anything changes</span></div>
          <div class="ba-item"><svg viewBox="0 0 16 16" fill="none" stroke="#DC2626" stroke-width="2.5" stroke-linecap="round"><path d="M4 4l8 8M12 4l-8 8"/></svg><span>Fix duplicate records when emails do not match between systems</span></div>
          <div class="ba-item"><svg viewBox="0 0 16 16" fill="none" stroke="#DC2626" stroke-width="2.5" stroke-linecap="round"><path d="M4 4l8 8M12 4l-8 8"/></svg><span>Manually enrol members into courses based on tier, chapter, or renewal status</span></div>
          <div class="ba-item"><svg viewBox="0 0 16 16" fill="none" stroke="#DC2626" stroke-width="2.5" stroke-linecap="round"><path d="M4 4l8 8M12 4l-8 8"/></svg><span>Members cannot log in — SSO is not configured, support tickets pile up</span></div>
          <div class="ba-item"><svg viewBox="0 0 16 16" fill="none" stroke="#DC2626" stroke-width="2.5" stroke-linecap="round"><path d="M4 4l8 8M12 4l-8 8"/></svg><span>CE completion data sits in the LMS — reconciliation done manually every cycle</span></div>
          <div class="ba-item"><svg viewBox="0 0 16 16" fill="none" stroke="#DC2626" stroke-width="2.5" stroke-linecap="round"><path d="M4 4l8 8M12 4l-8 8"/></svg><span>Funder asks for compliance report — you spend three days pulling it together</span></div>
        </div>
      </div>
      <div class="ba-card after">
        <div class="ba-label a">With MyPass LMS + AMS Integration</div>
        <div class="ba-list">
          <div class="ba-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Member data syncs bidirectionally in real time — joins, renewals, role changes reflected immediately</span></div>
          <div class="ba-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>One learner record per member, always current, always matching your AMS</span></div>
          <div class="ba-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Enrolment rules fire automatically based on AMS data — no manual action</span></div>
          <div class="ba-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>SSO lets members access training with credentials they already use — zero friction</span></div>
          <div class="ba-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>CE credits recorded on module completion, synced back to member records automatically</span></div>
          <div class="ba-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Compliance report generated in seconds from live data — always ready, always current</span></div>
        </div>
      </div>
    </div>
  </div>
</section><section class="sec sbg" id="ams">
  <div class="wrap">
    <div class="eyebrow"><span class="ew"></span>AMS Integration</div>
    <h2 class="heading">One Change in Your AMS.<br><em>Everything in MyPass LMS Updates Automatically.</em></h2>
    <p class="lead" style="max-width:620px;margin-top:10px">
      MyPass LMS integrates with your AMS through API and webhook. When a member joins, upgrades, transfers chapters, or lapses — MyPass LMS responds immediately without anyone on your team doing anything.
    </p>

    <div class="ams-wrap">
      <div class="ams-diagram">
        <div class="ams-col">
          <div class="ams-col-label">Your AMS sends</div>
          <div class="ams-col-items">
            <div class="ams-col-item">Membership status and tier</div>
            <div class="ams-col-item">Chapter and committee affiliation</div>
            <div class="ams-col-item">Board roles and credentials</div>
            <div class="ams-col-item">Renewal dates and lapse status</div>
            <div class="ams-col-item">Profile, cohort, and contact data</div>
          </div>
        </div>
        <div class="ams-mid">
          <div class="ams-arrow-btn">
            <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round"><polyline points="5 12 19 12"/><polyline points="14 7 19 12 14 17"/></svg>
          </div>
          <div class="ams-mid-lbl">Real-time<br>bidirectional<br>sync</div>
          <div class="ams-arrow-btn" style="transform:rotate(180deg)">
            <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round"><polyline points="5 12 19 12"/><polyline points="14 7 19 12 14 17"/></svg>
          </div>
        </div>
        <div class="ams-col lms">
          <div class="ams-col-label">MyPass LMS responds</div>
          <div class="ams-col-items">
            <div class="ams-col-item">Enrolment rules fire for new or changed membership</div>
            <div class="ams-col-item">SSO access granted using AMS credentials</div>
            <div class="ams-col-item">Learning paths assigned by tier, chapter, or role</div>
            <div class="ams-col-item">CE hours recorded and synced back to AMS</div>
            <div class="ams-col-item">Renewal reminders sent on configured schedule</div>
          </div>
        </div>
      </div>

      <p style="font-size:13px;font-weight:700;color:var(--ink);margin-bottom:12px">Works with your existing AMS — no middleware required</p>
      <div class="ams-platforms">
        <div class="ams-pill">iMIS</div><div class="ams-pill">Nimble AMS</div><div class="ams-pill">MemberClicks</div><div class="ams-pill">YourMembership</div><div class="ams-pill">Fonteva</div><div class="ams-pill">GrowthZone</div><div class="ams-pill">Impexium</div><div class="ams-pill">NetForum</div><div class="ams-pill">Custom API / Webhooks</div>
      </div>
      <p class="ams-note">Do not see your AMS? MyPass LMS builds custom integrations — most new connections go live in two to four weeks. Bring your AMS to the demo and we will map the integration path for your specific environment.</p>
    </div>

    <!-- With / Without AMS -->
    <div style="margin-top:48px">
      <div class="cx" style="margin-bottom:28px">
        <div class="eyebrow"><span class="ew"></span>Every Situation Covered</div>
        <h2 class="heading" style="font-size:28px">Whether You Have an AMS or Not,<br><em>MyPass LMS Works.</em></h2>
      </div>
      <div class="ww-grid">
        <div class="ww-card connected">
          <div class="ww-icon"><svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="9" height="9" rx="2"/><rect x="13" y="2" width="9" height="9" rx="2"/><rect x="2" y="13" width="9" height="9" rx="2"/><rect x="13" y="13" width="9" height="9" rx="2"/></svg></div>
          <div class="ww-title">Already Using an AMS?<br>Connect It Directly.</div>
          <div class="ww-desc">Your AMS stays as the system of record. MyPass LMS becomes its intelligent learning layer — syncing member data, firing enrolment rules, and writing CE completions back to member profiles automatically.</div>
          <div class="ww-list">
            <div class="ww-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Bidirectional real-time member data sync</div>
            <div class="ww-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>SSO — members use their existing AMS login</div>
            <div class="ww-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Enrolment rules driven by live AMS attributes</div>
            <div class="ww-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>CE completions written back to member records</div>
          </div>
          <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-primary" style="display:inline-flex;margin-top:0">Book AMS Integration Demo</a>
        </div>
        <div class="ww-card builtin">
          <div class="ww-icon"><svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg></div>
          <div class="ww-title">No AMS Yet?<br>Built-In Member Tools Cover Everything.</div>
          <div class="ww-desc">MyPass LMS includes built-in member management — member profiles, membership status, volunteer records, CE tracking, and certifications — all in one platform. No separate AMS required.</div>
          <div class="ww-list">
            <div class="ww-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Member profiles and membership status in one place</div>
            <div class="ww-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Volunteer records alongside member and staff training</div>
            <div class="ww-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>CE credits and certifications tracked automatically</div>
            <div class="ww-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Connect an AMS later — MyPass LMS integrates seamlessly</div>
          </div>
          <a href="https://mypasslms.us/login#register" class="btn-primary" style="display:inline-flex;margin-top:0">Start Free — No Card Required</a>
        </div>
      </div>
    </div>
  </div>
</section><section class="sec sw" id="what-we-manage">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>What MyPass LMS Manages</div>
      <h2 class="heading">Every Training Need Your Organisation Has.<br><em>One Platform. One Admin Console.</em></h2>
      <p class="lead cx">Nonprofits and associations manage multiple distinct learner populations simultaneously. MyPass LMS handles all of them from one place — without separate systems for each audience.</p>
    </div>
    <div class="uc3">
      <div class="uc3-card">
        <div class="uc3-ic"><svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19V6l12-3v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="15" r="3"/></svg></div>
        <div class="uc3-t">Member CE Programmes</div>
        <div class="uc3-d">Track credit hours per completion, manage certification timelines, issue branded CE certificates, and sync everything back to AMS member records — automatically after initial setup.</div>
      </div>
      <div class="uc3-card">
        <div class="uc3-ic"><svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg></div>
        <div class="uc3-t">Volunteer Onboarding</div>
        <div class="uc3-d">Onboard any number of volunteers from a single operation. Safeguarding, conduct, and programme training assigned automatically the moment a volunteer is added — completion tracked for every person.</div>
      </div>
      <div class="uc3-card">
        <div class="uc3-ic"><svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg></div>
        <div class="uc3-t">Certification Management</div>
        <div class="uc3-d">Tiered certification paths with mandatory pass marks, renewal cycles, and automated reminder sequences. Branded certificates issued on completion — recertification triggered automatically at each renewal window.</div>
      </div>
      <div class="uc3-card">
        <div class="uc3-ic"><svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
        <div class="uc3-t">Staff Compliance Training</div>
        <div class="uc3-d">GDPR, safeguarding, anti-harassment, and sector-specific compliance assigned by role automatically. Audit-ready completion reports available in seconds for boards and funders.</div>
      </div>
      <div class="uc3-card">
        <div class="uc3-ic"><svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="9" height="9" rx="2"/><rect x="13" y="2" width="9" height="9" rx="2"/><rect x="2" y="13" width="9" height="9" rx="2"/><rect x="13" y="13" width="9" height="9" rx="2"/></svg></div>
        <div class="uc3-t">Chapter &amp; Role-Based Learning</div>
        <div class="uc3-d">Different chapters, committees, and board roles get different training. Assignments driven by AMS attributes — chapter affiliation, role, tier — so every member gets content relevant to their position.</div>
      </div>
      <div class="uc3-card">
        <div class="uc3-ic"><svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
        <div class="uc3-t">Funder Compliance Reporting</div>
        <div class="uc3-d">Every completion timestamped and stored automatically. Funder evidence, board summaries, and regulatory audit reports generated instantly — no data pull, no spreadsheet consolidation, no preparation time.</div>
      </div>
    </div>
  </div>
</section><div class="feat-wrap"><div class="frow">
    <div class="frow-img">
      <img src="https://images.unsplash.com/photo-1542744094-24638eff58bb?w=880&q=80&auto=format&fit=crop" alt="CE Tracking That Runs Without Anyone Touching a Spreadsheet. — MyPass LMS" loading="lazy" width="560" height="380">
      <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">CE credits synced to AMS member records automatically</span></div>
    </div>
    <div class="frow-txt">
      <div class="eyebrow"><span class="ew"></span>CE and CPD Credit Tracking</div>
      <h2 class="heading">CE Tracking That Runs Without<br><em>Anyone Touching a Spreadsheet.</em></h2>
      <p>CE and CPD tracking for large member populations is one of the most administratively intensive tasks in association management. Tracking hours manually, reconciling records across two systems, and assembling accreditation evidence at review time creates significant — and completely avoidable — burden.</p><p>MyPass LMS records CE credit hours automatically the moment a learner completes a qualifying module. Every hour is logged against the learner profile, visible to administrators in real time, and synced back to your AMS member records. Renewal reminders fire automatically. Certificates issue on completion. Your team does none of it manually.</p>
      <div class="fpts"><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>CE and CEU hours credited automatically per module completion</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Renewal reminders sent before certification deadlines on a schedule you configure</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Completion data synced back to AMS member records without any manual action</div></div>
      <a href="https://kp.kprise.com/about/platform" class="btn-primary" style="margin-top:18px">See CE Tracking Features</a>
    </div>
  </div><div class="frow flip">
    <div class="frow-img">
      <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=880&q=80&auto=format&fit=crop" alt="94 Volunteers Onboarded in One Afternoon. Zero Manual Assignments. — MyPass LMS" loading="lazy" width="560" height="380">
      <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">94 volunteers onboarded in one afternoon — zero manual assignments</span></div>
    </div>
    <div class="frow-txt">
      <div class="eyebrow"><span class="ew"></span>Volunteer Onboarding at Scale</div>
      <h2 class="heading">94 Volunteers Onboarded in One Afternoon.<br><em>Zero Manual Assignments.</em></h2>
      <p>Volunteer onboarding at scale is one of the hardest operational challenges for nonprofits. When it depends on a coordinator who has time to run it, some volunteers get a thorough induction and others get a link to a PDF — creating compliance risk, safeguarding gaps, and inconsistency that no organisation can afford.</p><p>MyPass LMS automates volunteer onboarding entirely. Add volunteers individually, by bulk upload, or via your AMS — and their role-specific induction path begins immediately. Safeguarding, programme orientation, code of conduct, and any other required training assigned and tracked automatically. One customer onboarded 94 volunteers in a single afternoon with zero manual assignments from their coordinator.</p>
      <div class="fpts"><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Role-specific induction path starts automatically on volunteer addition</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Safeguarding, conduct, and programme training tracked per person from day one</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Bulk onboarding for large cohorts — no coordinator overhead at any stage</div></div>
      
    </div>
  </div><div class="frow">
    <div class="frow-img">
      <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=880&q=80&auto=format&fit=crop" alt="Your Funders Ask for Evidence. You Have It in Seconds. — MyPass LMS" loading="lazy" width="560" height="380">
      <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Funder compliance report generated in seconds from live data</span></div>
    </div>
    <div class="frow-txt">
      <div class="eyebrow"><span class="ew"></span>Funder-Ready Compliance Reporting</div>
      <h2 class="heading">Your Funders Ask for Evidence.<br><em>You Have It in Seconds.</em></h2>
      <p>Most nonprofits spend days assembling funder compliance evidence because training data lives in disconnected systems that were never designed to produce a unified report. MyPass LMS eliminates that entirely.</p><p>Every learner action is recorded and timestamped automatically from day one. When a funder or regulatory body requests compliance evidence, your team filters by programme, cohort, date range, or individual and generates a formatted report in seconds. The evidence is always current. No preparation required. No last-minute scramble.</p>
      <div class="fpts"><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Complete learner records with timestamps stored automatically from day one</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Filtered compliance reports in seconds — by programme, role, team, or date range</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Always ready for funder reviews, board requests, and regulatory inspections</div></div>
      
    </div>
  </div></div><section class="sec sbg" id="proof">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Customer Stories</div>
      <h2 class="heading">What Nonprofit and Association Teams<br><em>Say About MyPass LMS</em></h2>
    </div>
    <div class="proof-grid">
      <div style="display:flex;flex-direction:column;gap:16px">
        <div class="proof-tc feat">
          <div class="pt-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div>
          <div class="pt-q">&ldquo;</div>
          <div class="pt-body">MyPass LMS is extremely customisable and the support in making the platform feel like our own brand was something we did not expect. Managing volunteer training, member CE programmes, and staff compliance from one platform has eliminated the three separate systems we used to run simultaneously. The team were available at all hours and genuinely invested in our success.</div>
          <div class="pt-author">
            <div class="pt-av" style="background:linear-gradient(135deg,#2A7A5C,#1D5C45)">AS</div>
            <div><div class="pt-name">Ashleigh S.</div><div class="pt-role">Senior Learning Partner &middot; UAE Nonprofit Organisation</div></div>
          </div>
        </div>
        <div class="proof-tc">
          <div class="pt-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div>
          <div class="pt-q">&ldquo;</div>
          <div class="pt-body">We have been a Kprise client for over four years. Before MyPass LMS, CE tracking required spreadsheets and constant cleanup. Now it is automated and always up to date — our team finally trusts the data again. The platform looks and feels entirely like ours, which our members notice and appreciate.</div>
          <div class="pt-author">
            <div class="pt-av" style="background:linear-gradient(135deg,#1B2A6B,#2D44AA)">SD</div>
            <div><div class="pt-name">Shawn D.</div><div class="pt-role">Director &middot; American Board &middot; 4-Year Customer</div></div>
          </div>
        </div>
      </div>
      <div class="proof-stats">
        <div class="ps-cell"><div class="ps-n">$1.2M</div><div class="ps-l">Certification revenue scaled</div><div class="ps-d">One association grew from $100K after replacing a disconnected LMS</div></div>
        <div class="ps-cell"><div class="ps-n">100+</div><div class="ps-l">Countries reached</div><div class="ps-d">CE delivery made possible by automated enrolment and AMS sync</div></div>
        <div class="ps-cell"><div class="ps-n">94</div><div class="ps-l">Volunteers in one afternoon</div><div class="ps-d">Zero manual assignments — all induction paths fired automatically</div></div>
        <div class="ps-cell"><div class="ps-n">0</div><div class="ps-l">Manual compliance workflows</div><div class="ps-d">Every CE and compliance event recorded automatically after go-live</div></div>
      </div>
    </div>
    <div style="text-align:center"><a href="https://kprise.com/case-study/" class="btn-ghost" target="_blank" rel="noopener">Read Full Case Studies</a></div>
  </div>
</section><section class="sec stint">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Recognised by Independent Reviewers</div>
      <h2 class="heading">Rated by Nonprofit and Association<br><em>Training Professionals</em></h2>
      <p class="lead cx">Independent ratings from programme managers and association administrators who evaluated MyPass LMS against the full market.</p>
    </div>
    <div class="badge-row">
      <div class="rbadge"><img src="https://kprise.com/wp-content/uploads/2025/12/1.webp" alt="Capterra Top 20" loading="lazy"></div>
      <div class="rbadge"><img src="https://kprise.com/wp-content/uploads/2025/12/2.webp" alt="GetApp Leader" loading="lazy"></div>
      <div class="rbadge"><img src="https://kprise.com/wp-content/uploads/2025/12/3.webp" alt="Software Advice FrontRunner" loading="lazy"></div>
      <div class="rbadge"><img src="https://kprise.com/wp-content/uploads/2025/12/4.png" alt="Best LMS" loading="lazy"></div>
      <div class="rbadge"><img src="https://brand-assets.capterra.com/badge/65ccdf80-7500-42bf-8e6f-aaa875f7613c.svg" alt="Capterra Verified" loading="lazy"></div>
      <div class="rbadge"><img src="https://brand-assets.getapp.com/badge/f7329061-8cc8-4015-8dbd-9c68980f086d.png" alt="GetApp Verified" loading="lazy"></div>
      <div class="rbadge"><img src="https://brand-assets.softwareadvice.com/badge/6aeb2175-cd8d-4d46-b212-ddd1b623365b.png" alt="Software Advice Verified" loading="lazy"></div>
      <div class="rbadge"><img src="https://www.softwaresuggest.com/award_logo/highly-recommended-winter-2025.png" alt="Highly Recommended" loading="lazy"></div>
      <div class="rbadge"><img src="https://www.softwaresuggest.com/award_logo/best-support-winter-2025.png" alt="Best Support" loading="lazy"></div>
      <div class="rbadge"><img src="https://www.softwareworld.co/customer-choice.png" alt="Customer Choice" loading="lazy"></div>
    </div>
  </div>
</section><section class="sec sw" id="faq">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Common Questions</div>
      <h2 class="heading">What Associations Ask<br><em>Before Starting Their Free Trial</em></h2>
      <p style="font-size:13px;font-weight:700;background:var(--bl);color:var(--b);border:1px solid var(--bdr2);border-radius:8px;padding:8px 16px;display:inline-block;margin-bottom:16px">Nonprofits get a 2-month free trial + 20% ongoing discount</p>
      <p class="lead cx">Can't find your answer? <a href="https://help.kprise.com" target="_blank" rel="noopener" style="color:var(--b);font-weight:700">Visit the Help Center</a> or <a href="https://calendly.com/onlinesales-kprise/30min" style="color:var(--b);font-weight:700">book a call</a> — our team responds the same day.</p>
    </div>
    <div class="faq-grid"><div class="fi open"><div class="fi-q">Which AMS platforms does MyPass LMS integrate with?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">MyPass LMS integrates with iMIS, Nimble AMS, MemberClicks, YourMembership, Fonteva, GrowthZone, Impexium, and NetForum via API and webhook — bidirectional real-time sync, no middleware required. For AMS platforms not on the standard list, MyPass LMS builds custom integrations. Most new connections go live within two to four weeks. Your demo call maps the exact integration path for your environment.</div></div><div class="fi"><div class="fi-q">What if our organisation does not have an AMS?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">MyPass LMS includes built-in member management tools covering the full membership lifecycle — member profiles, membership status, volunteer records, CE tracking, certification, and renewal management — all within the platform. You do not need an AMS to benefit from MyPass LMS. If you later add a dedicated AMS, it connects seamlessly without data migration or disruption.</div></div><div class="fi"><div class="fi-q">How does CE and certification tracking work?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">CE credit hours are recorded automatically when a learner completes a qualifying module — no manual tracking, no reconciliation. Totals are visible per member in real time and, if your AMS is connected, completion data is written back to member records automatically. Renewal reminders fire on a schedule you configure. Certificates are issued automatically on completion.</div></div><div class="fi"><div class="fi-q">Can we assign different learning paths by tier, chapter, or role?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Yes. You configure enrolment rules based on any AMS attribute: membership tier, chapter affiliation, committee or board role, renewal status, or any custom field. When a member's AMS profile changes, rules fire automatically and the updated learning path begins immediately — no manual action from your team.</div></div><div class="fi"><div class="fi-q">How do we onboard large volunteer cohorts?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Add volunteers individually, by bulk upload, or via AMS sync — and their role-specific induction path begins immediately. Safeguarding, code of conduct, and programme training is assigned and tracked automatically. Automated reminders keep volunteers progressing without anyone chasing them. One MyPass LMS customer onboarded 94 volunteers in one afternoon with zero manual assignments.</div></div><div class="fi"><div class="fi-q">How quickly can we be live?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Standard AMS integrations go live within one to two weeks. Custom or legacy AMS connections typically take two to four weeks from scoping. Platform setup, content configuration, and user onboarding are supported by the MyPass LMS team throughout. Most associations have members and volunteers actively training within the first week after go-live.</div></div></div>
  <div class="fi"><div class="fi-q">What is the nonprofit and association pricing?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Nonprofits and associations receive a <strong>2-month free trial</strong> — double the standard 15-day trial — plus an ongoing <strong>20% discount</strong> on all plan tiers. Active user pricing means you pay only for members and volunteers who actually engage with training each cycle, not for your full membership headcount. Plans start from $63/month after the trial. <a href="https://calendly.com/onlinesales-kprise/30min" style="color:var(--b);font-weight:700">Book a call to discuss your specific situation</a>.</div></div></div>
</section><section class="cta-sec">
  <div class="cta-in">
    <div class="cta-tag">2-Month Free Trial for Nonprofits — No Card Required</div>
    <h2 class="cta-h">Your AMS and LMS Should<br><em>Work as One System.</em></h2>
    <p class="cta-p">Stop reconciling data between two systems that have never talked to each other. MyPass LMS connects your AMS, automates member enrolments, tracks CE credits, and generates compliance reports instantly — so your team focuses on the mission, not the admin.</p>
    <div class="cta-btns">
      <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-a">See the AMS Integration Demo</a>
      <a href="https://mypasslms.us/login#register" class="btn-b">Start Free for 60 Days</a>
    </div>
    <p class="cta-note">2-month free trial for nonprofits &middot; 20% ongoing discount &middot; No credit card required &middot; AMS integration included</p>
  </div>
</section>


<script>
(function(){
  document.querySelectorAll('.fi').forEach(function(item){
    var q = item.querySelector('.fi-q');
    if(q){ q.addEventListener('click', function(){ item.classList.toggle('open'); }); }
  });
})();
</script>
@endsection

@push('schema')
@verbatim
<script type="application/ld+json">{"@context":"https://schema.org","@type":"SoftwareApplication","name":"MyPass LMS for Nonprofits and Associations","applicationCategory":"BusinessApplication","operatingSystem":"Web","description":"LMS for nonprofits and associations with AMS integration, CE tracking, volunteer onboarding, and funder compliance reporting. 2-month free trial with 20% nonprofit discount.","offers":{"@type":"Offer","price":"0","priceCurrency":"USD"},"provider":{"@type":"Organization","name":"Kprise","url":"https://kprise.com","telephone":"+12403164903"}}</script>
@endverbatim
@endpush

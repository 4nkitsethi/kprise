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
.hero-grid{max-width:1200px;margin:0 auto;display:grid;grid-template-columns:1fr 460px;gap:52px;align-items:center;position:relative;z-index:1}
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
.hero-sub{font-size:16.5px;line-height:1.74;color:var(--ink3);margin-bottom:28px;max-width:480px}
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
.lb-track{display:flex;align-items:center;width:max-content;animation:marquee 30s linear infinite}
.lb-track:hover{animation-play-state:paused}
@keyframes marquee{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
.lb-item{display:flex;align-items:center;justify-content:center;padding:0 36px;height:56px;flex-shrink:0;border-right:1px solid var(--bdr);opacity:.55;filter:grayscale(1);transition:all .2s}
.lb-item:hover{opacity:1;filter:grayscale(0)}

/* ── STATS ── */
.stats{background:var(--bl2);border-bottom:1px solid var(--bdr)}
.stats-in{max-width:1200px;margin:0 auto;display:grid;grid-template-columns:repeat(4,1fr)}
.sc{padding:20px 24px;display:flex;align-items:center;gap:16px;border-right:1px solid var(--bdr)}
.sc:last-child{border-right:none}
.sc-n{font-size:34px;font-weight:900;letter-spacing:-1.5px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;flex-shrink:0;min-width:52px}
.sc-l{font-size:12.5px;color:var(--ink3);font-weight:500;line-height:1.45;border-left:1.5px solid var(--bdr2);padding-left:14px}

/* ── SHARED ── */
.sec{padding:68px 48px}
.sw{background:var(--w)}
.sbg{background:var(--bg)}
.stint{background:var(--bl2)}
.wrap{max-width:1200px;margin:0 auto}
.eyebrow{display:inline-flex;align-items:center;gap:6px;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);margin-bottom:10px}
.eyebrow .ew{width:16px;height:2.5px;background:var(--gr);border-radius:2px;flex-shrink:0}
.heading{font-size:34px;font-weight:800;line-height:1.13;letter-spacing:-1.2px;color:var(--ink);margin-bottom:12px}
.heading em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent}
.lead{font-size:16px;color:var(--ink3);line-height:1.76;max-width:580px}
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
.feat-wrap{max-width:1200px;margin:0 auto;display:flex;flex-direction:column;gap:72px;padding:0 48px 68px}
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
.courses-inner{max-width:1200px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center}
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
.hl-inner{max-width:1200px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center}
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
.ucc-tag{font-size:10px;font-weight:800;letter-spacing:.09em;text-transform:uppercase;color:var(--b);background:var(--bl);padding:2px 8px;border-radius:5px;display:inline-block;margin-bottom:8px}
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
.cta-in{max-width:620px;margin:0 auto;position:relative;z-index:1}
.cta-tag{display:inline-block;background:var(--b);color:#fff;border-radius:100px;padding:4px 14px;font-size:10.5px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;margin-bottom:16px}
.cta-h{font-size:38px;font-weight:900;letter-spacing:-1.6px;line-height:1.1;color:var(--ink);margin-bottom:12px}
.cta-h em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent}
.cta-p{font-size:16px;color:var(--ink3);line-height:1.72;margin-bottom:26px}
.cta-btns{display:flex;gap:10px;justify-content:center;flex-wrap:wrap;margin-bottom:12px}
.cta-note{font-size:12px;color:var(--ink4)}


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
  padding:52px 48px 0;overflow:hidden;position:relative;min-height:520px}
.hero::after{content:'';position:absolute;top:0;right:0;bottom:0;width:48%;
  background:linear-gradient(to right,transparent,var(--bl2) 40%);pointer-events:none}
.hero-grid{max-width:1200px;margin:0 auto;display:grid;
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
}
.diag-hero{background:var(--w);border-bottom:1px solid var(--bdr);padding:72px 48px 0;position:relative;overflow:hidden;text-align:center}
.diag-hero::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 80% 60% at 50% 0%,var(--bl2),transparent 70%);pointer-events:none}
.diag-hero-in{max-width:760px;margin:0 auto;position:relative;z-index:1}
.diag-eyebrow{display:inline-flex;align-items:center;gap:7px;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);background:var(--bl);border:1px solid var(--bdr2);border-radius:100px;padding:4px 14px;margin-bottom:18px}
.diag-dot{width:7px;height:7px;border-radius:50%;background:var(--b);animation:ddot 2s ease-in-out infinite}
@keyframes ddot{0%,100%{opacity:1}50%{opacity:.2}}
.diag-hero h1{font-size:46px;font-weight:900;letter-spacing:-2.2px;line-height:1.06;color:var(--ink);margin-bottom:14px}
.diag-hero h1 em{font-style:normal;background:linear-gradient(135deg,#4220C8,#7B5EEA);-webkit-background-clip:text;background-clip:text;color:transparent}
.diag-hero-sub{font-size:17px;color:var(--ink3);line-height:1.68;max-width:560px;margin:0 auto 32px}
.diag-trust{display:flex;align-items:center;justify-content:center;gap:24px;flex-wrap:wrap;padding:20px 0;border-top:1px solid var(--bdr)}
.diag-trust-item{display:flex;align-items:center;gap:6px;font-size:12px;color:var(--ink4);font-weight:500}
.diag-trust-item svg{width:14px;height:14px;stroke:var(--ok);stroke-width:2.5;fill:none;flex-shrink:0}
.how-strip{background:var(--bg);border-bottom:1px solid var(--bdr);padding:36px 48px}
.how-strip-in{max-width:1160px;margin:0 auto;display:grid;grid-template-columns:repeat(4,1fr);gap:20px;position:relative}
.hsi{text-align:center;position:relative}
.hsi::after{content:'';position:absolute;top:22px;right:-10px;width:20px;height:1.5px;background:var(--bdr2)}
.hsi:last-child::after{display:none}
.hsi-n{width:44px;height:44px;border-radius:50%;background:var(--bl);border:2px solid var(--bdr2);display:flex;align-items:center;justify-content:center;margin:0 auto 10px;font-size:13px;font-weight:900;color:var(--b)}
.hsi-t{font-size:13px;font-weight:800;color:var(--ink);margin-bottom:3px}
.hsi-d{font-size:11.5px;color:var(--ink4);line-height:1.5}
.diag-layout{max-width:1160px;margin:0 auto;padding:52px 48px 80px;display:grid;grid-template-columns:1fr 380px;gap:24px;align-items:start}
.tool-tabs{grid-column:span 2;display:flex;gap:0;background:var(--bg);border:1px solid var(--bdr);border-radius:14px;padding:4px;margin-bottom:4px}
.tool-tab{flex:1;display:flex;align-items:center;justify-content:center;gap:8px;padding:12px 20px;border-radius:10px;font-size:14px;font-weight:700;color:var(--ink4);cursor:pointer;transition:all .2s;border:none;background:none;font-family:inherit}
.tool-tab svg{width:16px;height:16px;stroke:currentColor;stroke-width:2;fill:none;flex-shrink:0}
.tool-tab.active{background:var(--w);color:var(--b);box-shadow:var(--sh2)}
.tool-card{background:var(--w);border:1px solid var(--bdr);border-radius:20px;overflow:hidden;box-shadow:var(--sh2)}
.tc-head{padding:24px 28px;border-bottom:1px solid var(--bdr);display:flex;align-items:center;gap:14px}
.tc-icon{width:44px;height:44px;background:var(--bl);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.tc-icon svg{width:20px;height:20px;stroke:var(--b);stroke-width:2;fill:none}
.tc-title{font-size:18px;font-weight:900;color:var(--ink);letter-spacing:-.4px}
.tc-sub{font-size:12.5px;color:var(--ink4);margin-top:2px}
.tc-body{padding:28px}
.fg{margin-bottom:22px}
.fg-lbl{font-size:12px;font-weight:700;color:var(--ink);margin-bottom:8px;display:flex;align-items:center;gap:6px}
.fg-lbl svg{width:13px;height:13px;stroke:var(--b);stroke-width:2;fill:none}
.fg-hint{font-size:11.5px;color:var(--ink4);margin-bottom:8px;line-height:1.5}
.pills{display:flex;flex-wrap:wrap;gap:7px}
.pill{display:inline-flex;align-items:center;padding:7px 14px;border-radius:9px;border:1.5px solid var(--bdr);background:var(--bg);font-size:12.5px;font-weight:600;color:var(--ink3);cursor:pointer;transition:all .17s;user-select:none}
.pill:hover{border-color:var(--bdr2);color:var(--b);background:var(--bl2)}
.pill.sel{background:var(--b);color:#fff;border-color:var(--b);box-shadow:0 2px 8px rgba(66,32,200,.22)}
.slider-wrap{position:relative;padding-top:30px}
.dslider{width:100%;height:6px;border-radius:10px;background:var(--bl);outline:none;-webkit-appearance:none;appearance:none;cursor:pointer}
.dslider::-webkit-slider-thumb{-webkit-appearance:none;width:20px;height:20px;border-radius:50%;background:var(--b);cursor:pointer;box-shadow:0 2px 8px rgba(66,32,200,.35);border:3px solid #fff}
.dslider::-moz-range-thumb{width:20px;height:20px;border-radius:50%;background:var(--b);cursor:pointer;box-shadow:0 2px 8px rgba(66,32,200,.35);border:3px solid #fff}
.sv{position:absolute;top:0;background:var(--b);color:#fff;font-size:11px;font-weight:700;padding:3px 9px;border-radius:6px;transform:translateX(-50%);white-space:nowrap;pointer-events:none;transition:left .08s}
.sv::after{content:'';position:absolute;top:100%;left:50%;transform:translateX(-50%);border:4px solid transparent;border-top-color:var(--b)}
.slider-limits{display:flex;justify-content:space-between;margin-top:6px;font-size:11px;color:var(--ink4)}
.cgrid{display:grid;grid-template-columns:1fr 1fr;gap:7px}
.ci{display:flex;align-items:center;gap:8px;padding:9px 12px;border:1.5px solid var(--bdr);border-radius:9px;background:var(--bg);cursor:pointer;transition:all .17s;font-size:12.5px;font-weight:500;color:var(--ink3);user-select:none}
.ci:hover{border-color:var(--bdr2);background:var(--bl2)}
.ci.on{border-color:var(--b);background:var(--bl);color:var(--b)}
.ci svg{width:13px;height:13px;stroke:currentColor;stroke-width:2;fill:none;flex-shrink:0;opacity:.5}
.ci.on svg{opacity:1}
.cbox{width:16px;height:16px;border-radius:4px;border:1.5px solid var(--bdr2);flex-shrink:0;display:flex;align-items:center;justify-content:center;transition:all .17s;position:relative}
.ci.on .cbox{background:var(--b);border-color:var(--b)}
.cbox::after{content:'';display:none;width:8px;height:5px;border-left:2px solid #fff;border-bottom:2px solid #fff;transform:rotate(-45deg) translateY(-1px)}
.ci.on .cbox::after{display:block}
.run-btn{width:100%;padding:15px;background:var(--b);color:#fff;border:none;border-radius:12px;font-size:15px;font-weight:800;cursor:pointer;font-family:inherit;display:flex;align-items:center;justify-content:center;gap:8px;transition:all .2s;box-shadow:0 4px 20px rgba(66,32,200,.3);margin-top:24px;letter-spacing:-.2px}
.run-btn:hover{background:var(--bd);transform:translateY(-1px);box-shadow:0 6px 26px rgba(66,32,200,.4)}
.run-btn svg{width:18px;height:18px;stroke:#fff;stroke-width:2.5;fill:none}
.rp{display:flex;flex-direction:column;gap:14px}
.rc{background:var(--w);border:1px solid var(--bdr);border-radius:16px;overflow:hidden;box-shadow:var(--sh);opacity:0;transform:translateY(10px);transition:opacity .4s,transform .4s cubic-bezier(.16,1,.3,1)}
.rc.show{opacity:1;transform:translateY(0)}
.rc-head{padding:14px 18px;border-bottom:1px solid var(--bdr);display:flex;align-items:center;gap:10px}
.ri{width:34px;height:34px;border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.ri svg{width:16px;height:16px;stroke-width:2.2;fill:none}
.ri.blue{background:var(--bl)}.ri.blue svg{stroke:var(--b)}
.ri.red{background:#FEE2E2}.ri.red svg{stroke:#DC2626}
.ri.amber{background:#FEF3C7}.ri.amber svg{stroke:#D97706}
.ri.green{background:#DCFCE7}.ri.green svg{stroke:#16A34A}
.rc-lbl{font-size:12.5px;font-weight:700;color:var(--ink);flex:1}
.rc-body{padding:18px}
.rbig{font-size:34px;font-weight:900;letter-spacing:-1.5px;line-height:1;margin-bottom:5px;background:linear-gradient(135deg,var(--b),var(--bm));-webkit-background-clip:text;background-clip:text;color:transparent}
.rbig.red{background:linear-gradient(135deg,#DC2626,#EF4444);-webkit-background-clip:text;background-clip:text;color:transparent}
.rbig.amber{background:linear-gradient(135deg,#D97706,#F59E0B);-webkit-background-clip:text;background-clip:text;color:transparent}
.rbig.green{background:linear-gradient(135deg,#16A34A,#22C55E);-webkit-background-clip:text;background-clip:text;color:transparent}
.rdesc{font-size:12px;color:var(--ink4);line-height:1.6}
.rbar-w{height:8px;background:var(--bg);border-radius:10px;overflow:hidden;margin:8px 0 4px}
.rbar{height:100%;border-radius:10px;transition:width 1s cubic-bezier(.16,1,.3,1)}
.rbar.low{background:linear-gradient(90deg,#16A34A,#22C55E)}
.rbar.medium{background:linear-gradient(90deg,#D97706,#F59E0B)}
.rbar.high{background:linear-gradient(90deg,#DC2626,#EF4444)}
.rbar.critical{background:linear-gradient(90deg,#7C3AED,#DC2626)}
.rlvl{font-size:11px;font-weight:800;letter-spacing:.06em;text-transform:uppercase;margin-top:4px}
.rlvl.low{color:#16A34A}.rlvl.medium{color:#D97706}.rlvl.high{color:#DC2626}.rlvl.critical{color:#7C3AED}
.stags{display:flex;flex-wrap:wrap;gap:6px;margin-top:10px}
.stag{font-size:11px;font-weight:600;padding:3px 10px;border-radius:6px}
.stag.warn{background:#FEF3C7;color:#92400E}
.stag.danger{background:#FEE2E2;color:#991B1B}
.stag.ok{background:#DCFCE7;color:#14532D}
.ph-card{background:var(--bg);border:1.5px dashed var(--bdr2);border-radius:16px;padding:40px 24px;text-align:center}
.ph-icon{width:52px;height:52px;background:var(--bl);border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px}
.ph-icon svg{width:24px;height:24px;stroke:var(--b);stroke-width:1.8;fill:none}
.ph-h{font-size:15px;font-weight:700;color:var(--ink);margin-bottom:6px}
.ph-p{font-size:13px;color:var(--ink4);line-height:1.6}
.cta-rc{background:linear-gradient(135deg,var(--b),var(--bd));border-radius:16px;padding:24px;opacity:0;transform:translateY(10px);transition:opacity .4s,transform .4s cubic-bezier(.16,1,.3,1)}
.cta-rc.show{opacity:1;transform:translateY(0)}
.cta-rc-h{font-size:16px;font-weight:900;color:#fff;margin-bottom:7px;letter-spacing:-.3px}
.cta-rc-p{font-size:13px;color:rgba(255,255,255,.75);line-height:1.6;margin-bottom:18px}
.cta-rc-btn{display:block;text-align:center;background:#fff;color:var(--b);font-weight:800;font-size:13.5px;padding:11px 20px;border-radius:10px;text-decoration:none;transition:all .2s;width:100%;border:none;cursor:pointer;font-family:inherit;box-sizing:border-box}
.cta-rc-btn:hover{background:var(--bl)}
.cta-rc-btn2{display:block;text-align:center;color:#fff;font-weight:600;font-size:13px;padding:10px 20px;border-radius:10px;text-decoration:none;margin-top:8px;border:1px solid rgba(255,255,255,.25);background:rgba(255,255,255,.1);transition:all .2s}
.cta-rc-btn2:hover{background:rgba(255,255,255,.2)}
@media(max-width:1024px){.diag-layout{grid-template-columns:1fr;padding:36px 24px 60px}.tool-tabs{grid-column:span 1}.diag-hero{padding:52px 24px 0}.diag-hero h1{font-size:34px}.how-strip{padding:28px 24px}.how-strip-in{grid-template-columns:1fr 1fr}.hsi::after{display:none}}
@media(max-width:640px){.diag-hero h1{font-size:28px}.tool-tab span{display:none}.cgrid{grid-template-columns:1fr}.how-strip-in{grid-template-columns:1fr 1fr}.pills{gap:5px}}
</style>

@endpush

@section('content')
<section class="diag-hero">
  <div class="diag-hero-in">
    <div class="diag-eyebrow"><span class="diag-dot"></span>Free Diagnostic Tools</div>
    <h1>Is Your LMS Admin Workload<br><em>Costing More Than Your LMS?</em></h1>
    <p class="diag-hero-sub">Two free tools. Run the Admin Burnout Diagnostic to see how much time your team is losing each month — then calculate the exact cost of inactive seats draining your budget.</p>
    <div class="diag-trust">
      <div class="diag-trust-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>No sign-up required</div>
      <div class="diag-trust-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Results in under 2 minutes</div>
      <div class="diag-trust-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Based on your real numbers</div>
      <div class="diag-trust-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>Benchmarked against 200+ organisations</div>
    </div>
  </div>
</section>
<div class="how-strip">
  <div class="how-strip-in">
    <div class="hsi"><div class="hsi-n">01</div><div class="hsi-t">Enter Your Numbers</div><div class="hsi-d">Select team size, courses, and admin headcount</div></div>
    <div class="hsi"><div class="hsi-n">02</div><div class="hsi-t">Select Your Activities</div><div class="hsi-d">Check every manual task your admins handle monthly</div></div>
    <div class="hsi"><div class="hsi-n">03</div><div class="hsi-t">Run the Diagnostic</div><div class="hsi-d">Results calculate instantly — no email required</div></div>
    <div class="hsi"><div class="hsi-n">04</div><div class="hsi-t">See Your Risk Score</div><div class="hsi-d">Get admin time cost, burnout risk, and what to do next</div></div>
  </div>
</div>
<div class="diag-layout">
  <div class="tool-tabs" id="ttabs">
    <button class="tool-tab active" id="tab-b" onclick="switchTab('b')"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg> Admin Burnout Diagnostic</button>
    <button class="tool-tab" id="tab-r" onclick="switchTab('r')"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg> LMS Cost Impact Calculator</button>
  </div>

  <!-- BURNOUT TOOL -->
  <div id="tool-b">
    <div class="tool-card">
      <div class="tc-head"><div class="tc-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div><div><div class="tc-title">Admin Burnout Diagnostic</div><div class="tc-sub">Estimate your team's hidden workload and burnout risk score</div></div></div>
      <div class="tc-body">

        <div class="fg">
          <div class="fg-lbl"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg> Number of Learners</div>
          <div class="pills">
            <div class="pill sel" data-g="bl" data-v="25">1–50</div>
            <div class="pill" data-g="bl" data-v="125">51–200</div>
            <div class="pill" data-g="bl" data-v="350">201–500</div>
            <div class="pill" data-g="bl" data-v="750">501–1,000</div>
            <div class="pill" data-g="bl" data-v="1500">1,000+</div>
          </div>
        </div>

        <div class="fg">
          <div class="fg-lbl"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 016.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/></svg> Active Courses</div>
          <div class="pills">
            <div class="pill sel" data-g="bc" data-v="3">1–5</div>
            <div class="pill" data-g="bc" data-v="13">6–20</div>
            <div class="pill" data-g="bc" data-v="35">21–50</div>
            <div class="pill" data-g="bc" data-v="60">50+</div>
          </div>
        </div>

        <div class="fg">
          <div class="fg-lbl"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M6 20v-2a6 6 0 0112 0v2"/></svg> Number of Admins</div>
          <div class="pills">
            <div class="pill sel" data-g="ba" data-v="1">1</div>
            <div class="pill" data-g="ba" data-v="2">2–3</div>
            <div class="pill" data-g="ba" data-v="5">4–6</div>
            <div class="pill" data-g="ba" data-v="8">6+</div>
          </div>
        </div>

        <div class="fg">
          <div class="fg-lbl"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> Admin Hours on LMS per Month</div>
          <div class="slider-wrap">
            <div class="sv" id="hsv" style="left:12%">20 hrs</div>
            <input type="range" class="dslider" id="hsl" min="5" max="120" value="20" step="5" oninput="updSlider()">
          </div>
          <div class="slider-limits"><span>5 hrs</span><span>120 hrs</span></div>
        </div>

        <div class="fg">
          <div class="fg-lbl"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg> Manual Activities Your Team Handles</div>
          <div class="fg-hint">Select all that apply — each adds to your burnout risk score</div>
          <div class="cgrid">
            <div class="ci on" data-k="updates" onclick="tog(this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg> Course updates</div>
            <div class="ci on" data-k="enrolls" onclick="tog(this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg> Manual enrolments</div>
            <div class="ci on" data-k="followups" onclick="tog(this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg> Chasing follow-ups</div>
            <div class="ci on" data-k="compliance" onclick="tog(this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg> Compliance checks</div>
            <div class="ci" data-k="reporting" onclick="tog(this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg> Manual reporting</div>
            <div class="ci" data-k="sheets" onclick="tog(this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg> Spreadsheet tracking</div>
          </div>
        </div>

        <div class="fg">
          <div class="fg-lbl"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg> Risk Signals Present in Your Team</div>
          <div class="fg-hint">Check any that currently apply</div>
          <div class="cgrid">
            <div class="ci" data-k="slow" onclick="tog(this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> Slow follow-ups</div>
            <div class="ci" data-k="mrep" onclick="tog(this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg> Manual reporting burden</div>
            <div class="ci" data-k="sdep" onclick="tog(this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg> Spreadsheet dependence</div>
            <div class="ci" data-k="strat" onclick="tog(this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg> Strategy blocked by admin</div>
          </div>
        </div>

        <button class="run-btn" onclick="runB()"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"/></svg> Run Burnout Diagnostic</button>
      </div>
    </div>
  </div>

  <!-- ROI TOOL -->
  <div id="tool-r" style="display:none">
    <div class="tool-card">
      <div class="tc-head"><div class="tc-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg></div><div><div class="tc-title">LMS Cost Impact Calculator</div><div class="tc-sub">Calculate how much you're losing to inactive seats each month</div></div></div>
      <div class="tc-body">

        <div class="fg">
          <div class="fg-lbl"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg> Total Licensed Seats</div>
          <div class="pills">
            <div class="pill sel" data-g="rs" data-v="30">1–50</div>
            <div class="pill" data-g="rs" data-v="75">51–100</div>
            <div class="pill" data-g="rs" data-v="175">101–250</div>
            <div class="pill" data-g="rs" data-v="375">251–500</div>
            <div class="pill" data-g="rs" data-v="600">500+</div>
          </div>
        </div>

        <div class="fg">
          <div class="fg-lbl"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="5" x2="5" y2="19"/><circle cx="6.5" cy="6.5" r="2.5"/><circle cx="17.5" cy="17.5" r="2.5"/></svg> Monthly Active Usage Rate</div>
          <div class="fg-hint">What percentage of your seats actually log in each month?</div>
          <div class="pills">
            <div class="pill" data-g="ru" data-v="95">90–100%</div>
            <div class="pill sel" data-g="ru" data-v="79">70–89%</div>
            <div class="pill" data-g="ru" data-v="54">40–69%</div>
            <div class="pill" data-g="ru" data-v="29">20–39%</div>
            <div class="pill" data-g="ru" data-v="10">&lt;20%</div>
          </div>
        </div>

        <div class="fg">
          <div class="fg-lbl"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg> Current Cost Per Seat / Month</div>
          <div class="pills">
            <div class="pill" data-g="rp" data-v="120">~$120</div>
            <div class="pill sel" data-g="rp" data-v="50">&lt;$50</div>
            <div class="pill" data-g="rp" data-v="200">$200+</div>
            <div class="pill" data-g="rp" data-v="80">$50–$120</div>
          </div>
        </div>

        <div class="fg">
          <div class="fg-lbl"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg> Estimated Inactivity Rate</div>
          <div class="fg-hint">What percentage of your seats go unused in a typical month?</div>
          <div class="pills">
            <div class="pill sel" data-g="ri" data-v="5">&lt;10%</div>
            <div class="pill" data-g="ri" data-v="20">10–30%</div>
            <div class="pill" data-g="ri" data-v="40">30–50%</div>
            <div class="pill" data-g="ri" data-v="55">50%+</div>
          </div>
        </div>

        <button class="run-btn" onclick="runR()"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg> Calculate Cost Leak</button>
      </div>
    </div>
  </div>

  <!-- RESULTS PANEL -->
  <div class="rp" id="rp">
    <div class="ph-card" id="ph">
      <div class="ph-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
      <div class="ph-h">Your results appear here</div>
      <div class="ph-p">Fill in the inputs and click Run — results calculate instantly with no email required.</div>
    </div>
    <div class="rc" id="rc1" style="display:none">
      <div class="rc-head"><div class="ri blue"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div><div class="rc-lbl" id="rc1l">Admin Time</div></div>
      <div class="rc-body"><div class="rbig" id="rc1v">—</div><div class="rdesc" id="rc1d"></div></div>
    </div>
    <div class="rc" id="rc2" style="display:none">
      <div class="rc-head"><div class="ri red"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg></div><div class="rc-lbl" id="rc2l">Cost Impact</div></div>
      <div class="rc-body"><div class="rbig red" id="rc2v">—</div><div class="rdesc" id="rc2d"></div></div>
    </div>
    <div class="rc" id="rc3" style="display:none">
      <div class="rc-head"><div class="ri amber"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></div><div class="rc-lbl">Risk Profile</div></div>
      <div class="rc-body">
        <div class="rbig amber" id="rc3v">—</div>
        <div class="rbar-w"><div class="rbar" id="rc3bar" style="width:0%"></div></div>
        <div class="rlvl" id="rc3lvl"></div>
        <div class="rdesc" id="rc3d" style="margin-top:8px"></div>
        <div class="stags" id="rc3tags"></div>
      </div>
    </div>
    <div class="rc" id="rc4" style="display:none">
      <div class="rc-head"><div class="ri green"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg></div><div class="rc-lbl">The MyPass LMS Alternative</div></div>
      <div class="rc-body"><div class="rdesc" id="rc4d" style="color:var(--ink3);font-size:13px;line-height:1.7"></div></div>
    </div>
    <div class="cta-rc" id="rcta" style="display:none">
      <div class="cta-rc-h">See it working in your environment</div>
      <div class="cta-rc-p">15-day free trial — full platform access, no credit card required. Every feature that eliminates this admin overhead is available from day one.</div>
      <a href="https://mypasslms.us/login#register" class="cta-rc-btn">Start Free for 15 Days</a>
      <a href="https://calendly.com/onlinesales-kprise/30min" class="cta-rc-btn2">Book a 30-Minute Demo</a>
    </div>
  </div>
</div>

<script>
var S={bl:25,bc:3,ba:1,bh:20,bact:['updates','enrolls','followups','compliance'],bsig:[],rs:30,ru:79,rp:50,ri:5};

function switchTab(t){
  document.getElementById('tool-b').style.display=t==='b'?'':'none';
  document.getElementById('tool-r').style.display=t==='r'?'':'none';
  document.getElementById('tab-b').className='tool-tab'+(t==='b'?' active':'');
  document.getElementById('tab-r').className='tool-tab'+(t==='r'?' active':'');
  resetR();
}
document.querySelectorAll('.pill').forEach(function(p){
  p.addEventListener('click',function(){
    var g=p.getAttribute('data-g'),v=parseFloat(p.getAttribute('data-v'));
    document.querySelectorAll('[data-g="'+g+'"]').forEach(function(x){x.classList.remove('sel');});
    p.classList.add('sel');
    if(g in {bl:1,bc:1,ba:1}){var kmap={bl:'bl',bc:'bc',ba:'ba'};S[kmap[g]]=v;}
    if(g in {rs:1,ru:1,rp:1,ri:1}){S[g]=v;}
  });
});
function updSlider(){
  var el=document.getElementById('hsl'),v=parseInt(el.value),p=(v-5)/115;
  var bub=document.getElementById('hsv');
  bub.style.left=(p*100)+'%';
  bub.textContent=v+' hrs';
  S.bh=v;
}
setTimeout(updSlider,60);
function tog(el){
  el.classList.toggle('on');
  var k=el.getAttribute('data-k');
  var isAct=['updates','enrolls','followups','compliance','reporting','sheets'].indexOf(k)>-1;
  var arr=isAct?S.bact:S.bsig;
  var i=arr.indexOf(k);
  if(i>-1)arr.splice(i,1); else arr.push(k);
}
function resetR(){
  document.getElementById('ph').style.display='';
  ['rc1','rc2','rc3','rc4','rcta'].forEach(function(id){
    var e=document.getElementById(id);e.style.display='none';e.classList.remove('show');
  });
}
function showR(id,delay){
  var e=document.getElementById(id);e.style.display='';
  setTimeout(function(){e.classList.add('show');},delay||0);
}
function fm(n){return n.toLocaleString();}
function fm$(n){return '$'+fm(Math.round(n));}

function runB(){
  var hrs=S.bh+S.bl/80+S.bc*0.35+S.bact.length*3.5;
  var hpa=S.ba>0?hrs/S.ba:hrs;
  var ann=hrs*55*12;
  var risk=Math.min(S.bh/120*35+S.bact.length*5+S.bsig.length*8+(S.ba===1?10:0)+(S.bl>500?10:0),100);
  var lv=risk<30?'low':risk<55?'medium':risk<75?'high':'critical';
  var lvL={low:'Low Risk',medium:'Moderate Risk',high:'High Risk',critical:'Critical — Burnout Imminent'};
  var lvD={
    low:'Your admin workload is manageable. Watch for scope creep as your learner base grows.',
    medium:'Your team is absorbing significant manual overhead. Automation would recover meaningful time each month.',
    high:'Your admins are spending a disproportionate amount of time on tasks that should be automated. This is a retention risk.',
    critical:'Your team is at serious risk of burnout. The volume of manual work is unsustainable at current scale.'
  };
  var fixD={
    low:'MyPass LMS automates enrolments, reminders, and compliance tracking. Even at low risk, the time savings are immediate and the platform pays for itself quickly.',
    medium:'Automated enrolment rules, live compliance dashboards, and one-click audit reports would eliminate most of the work your team currently handles manually. Estimated recovery: '+Math.round(hrs*0.6)+' hrs/month.',
    high:'MyPass LMS was built to eliminate exactly this kind of overhead. Role-based enrolment rules, automated renewal reminders, live compliance tracking, and AI-generated reports eliminate the majority of manual work. Estimated recovery: '+Math.round(hrs*0.7)+' hrs/month.',
    critical:'This is urgent. MyPass LMS automates every task your team is currently spending hours on. At your current volume, the platform would recover an estimated '+Math.round(hrs*0.75)+' hours per month per admin — and eliminate the single-point-of-failure risk.'
  };
  var tags=[];
  if(S.bsig.indexOf('slow')>-1)tags.push('<div class="stag warn">Slow follow-ups</div>');
  if(S.bsig.indexOf('mrep')>-1)tags.push('<div class="stag danger">Manual reporting</div>');
  if(S.bsig.indexOf('sdep')>-1)tags.push('<div class="stag danger">Spreadsheet dependence</div>');
  if(S.bsig.indexOf('strat')>-1)tags.push('<div class="stag danger">Strategy blocked</div>');
  if(S.bact.length>=5)tags.push('<div class="stag warn">High activity load</div>');
  if(S.ba===1&&S.bl>200)tags.push('<div class="stag danger">Single point of failure</div>');
  document.getElementById('ph').style.display='none';
  document.getElementById('rc1l').textContent='Monthly Admin Time';
  document.getElementById('rc1v').textContent=Math.round(hrs)+' hrs/mo';
  document.getElementById('rc1d').textContent='Your team spends approximately '+Math.round(hpa)+' hrs/month per admin on LMS operations — '+Math.round(hpa/160*100)+'% of a full working month.';
  document.getElementById('rc2l').textContent='Annual Cost of Admin Overhead';
  document.getElementById('rc2v').textContent=fm$(ann);
  document.getElementById('rc2d').textContent='Based on '+Math.round(hrs)+' hrs/month at an estimated $55/hr admin rate. This is what manually running your LMS costs annually — before any errors or missed deadlines.';
  document.getElementById('rc3v').textContent=Math.round(risk)+'/100';
  document.getElementById('rc3bar').style.width=risk+'%';
  document.getElementById('rc3bar').className='rbar '+lv;
  document.getElementById('rc3lvl').textContent=lvL[lv];
  document.getElementById('rc3lvl').className='rlvl '+lv;
  document.getElementById('rc3d').textContent=lvD[lv];
  document.getElementById('rc3tags').innerHTML=tags.join('');
  document.getElementById('rc4d').textContent=fixD[lv];
  showR('rc1',80);showR('rc2',200);showR('rc3',320);showR('rc4',440);showR('rcta',560);
}

function runR(){
  var leak=Math.round(S.rs*(S.ri/100));
  var mleak=leak*S.rp;
  var aleak=mleak*12;
  var active=S.rs-leak;
  var cpa=active>0?(S.rs*S.rp)/active:S.rs*S.rp;
  var ipct=S.ri;
  var lv=ipct<15?'low':ipct<35?'medium':ipct<50?'high':'critical';
  var lvL={low:'Healthy Usage',medium:'Moderate Waste',high:'Significant Waste',critical:'Severe Waste'};
  document.getElementById('ph').style.display='none';
  document.getElementById('rc1l').textContent='Inactive Seats You Are Paying For';
  document.getElementById('rc1v').textContent=fm(leak)+' seats';
  document.getElementById('rc1d').textContent='At '+ipct+'% inactivity on '+fm(S.rs)+' licensed seats, you are paying '+fm$(mleak)+'/month for users who are not logging in.';
  document.getElementById('rc2l').textContent='Annual Cost Leak';
  document.getElementById('rc2v').textContent=fm$(aleak);
  document.getElementById('rc2d').textContent='That is '+fm$(aleak)+' per year on inactive accounts. Your real cost per active user is '+fm$(Math.round(cpa))+'/month — not '+fm$(S.rp)+'.';
  document.getElementById('rc3v').textContent=ipct+'% inactive';
  document.getElementById('rc3bar').style.width=Math.min(ipct*2,100)+'%';
  document.getElementById('rc3bar').className='rbar '+lv;
  document.getElementById('rc3lvl').textContent=lvL[lv];
  document.getElementById('rc3lvl').className='rlvl '+lv;
  document.getElementById('rc3d').textContent='Per-seat pricing means every registered user costs the same whether they log in or not. MyPass LMS charges only for users who actually engage during each billing period.';
  document.getElementById('rc3tags').innerHTML='<div class="stag '+(ipct>30?'danger':'warn')+'">'+ipct+'% inactivity rate</div><div class="stag warn">Paying for '+fm(leak)+' unused seats</div>';
  document.getElementById('rc4d').textContent='MyPass LMS uses active user pricing — idle accounts are billed at $0. Based on your numbers, switching would recover approximately '+fm$(aleak)+' per year. Plans from $63/month for active users — no empty seat charges ever.';
  showR('rc1',80);showR('rc2',200);showR('rc3',320);showR('rc4',440);showR('rcta',560);
}
</script>

@endsection
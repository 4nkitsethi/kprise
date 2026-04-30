@extends('layouts.app')

@push('styles')
<style>
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
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

/* ── HERO (split layout with image) ─────────────────────────────── */
.ct-hero{background:var(--w);border-bottom:1px solid var(--bdr);overflow:hidden;position:relative}
.ct-hero-grid{max-width:1500px;margin:0 auto;display:grid;grid-template-columns:1fr 440px;align-items:stretch}
.ct-hero-left{padding:52px 52px 52px 48px;position:relative;z-index:1;display:flex;flex-direction:column;justify-content:center}
.ct-hero-eye{display:inline-flex;align-items:center;gap:7px;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);background:var(--bl);border:1px solid var(--bdr2);border-radius:100px;padding:4px 14px;margin-bottom:18px;max-width:22em}
.ct-eye-dot{width:6px;height:6px;border-radius:50%;background:var(--b);animation:ctblk 2s ease-in-out infinite}
@keyframes ctblk{0%,100%{opacity:1}50%{opacity:.2}}
.ct-hero h1{font-size:46px;font-weight:900;letter-spacing:-2.2px;line-height:1.06;color:var(--ink);margin-bottom:14px}
.ct-hero h1 em{font-style:normal;background:linear-gradient(135deg,#4220C8,#7B5EEA);-webkit-background-clip:text;background-clip:text;color:transparent}
.ct-hero-sub{font-size:16px;color:var(--ink3);line-height:1.72;max-width:740px;margin-bottom:24px}
.ct-hero-img{position:relative;overflow:hidden}
.ct-hero-img img{width:100%;height:100%;object-fit:cover;object-position:center;display:block;min-height:420px}
.ct-hero-img::before{content:'';position:absolute;inset:0;background:linear-gradient(to right,var(--w) 0%,transparent 30%);z-index:1;pointer-events:none}
.ct-hero-img-badge{position:absolute;bottom:24px;left:24px;z-index:2;background:rgba(255,255,255,.96);backdrop-filter:blur(8px);border:1px solid var(--bdr);border-radius:12px;padding:12px 16px;display:flex;align-items:center;gap:10px;box-shadow:var(--sh2)}
.ct-badge-dot{width:8px;height:8px;border-radius:50%;background:#16A34A;box-shadow:0 0 0 3px rgba(22,163,74,.2);flex-shrink:0;animation:ctgreen 2s ease-in-out infinite}
@keyframes ctgreen{0%,100%{box-shadow:0 0 0 3px rgba(22,163,74,.2)}50%{box-shadow:0 0 0 6px rgba(22,163,74,.1)}}
.ct-badge-txt{font-size:12.5px;font-weight:700;color:var(--ink)}
.ct-badge-sub{font-size:11px;color:var(--ink4);margin-top:1px}

/* ── CHOOSE YOUR PATH strip ──────────────────────────────────────── */
.ct-path{background:var(--bg);border-bottom:1px solid var(--bdr);padding:0 48px}
.ct-path-in{max-width:1500px;margin:0 auto;display:grid;grid-template-columns:repeat(4,1fr)}
.ct-path-item{padding:24px 20px;border-right:1px solid var(--bdr);cursor:pointer;transition:all .18s;text-decoration:none;display:flex;align-items:flex-start;gap:12px;position:relative}
.ct-path-item:last-child{border-right:none}
.ct-path-item::after{content:'';position:absolute;bottom:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--b),var(--bm));opacity:0;transition:opacity .18s}
.ct-path-item:hover::after,.ct-path-item.on::after{opacity:1}
.ct-path-item:hover,.ct-path-item.on{background:var(--bl2)}
.ct-pi-icon{width:36px;height:36px;background:var(--bl);border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:background .18s;margin-top:1px}
.ct-pi-icon svg{width:16px;height:16px;stroke:var(--b);fill:none;stroke-width:2;transition:stroke .18s}
.ct-path-item:hover .ct-pi-icon,.ct-path-item.on .ct-pi-icon{background:var(--b)}
.ct-path-item:hover .ct-pi-icon svg,.ct-path-item.on .ct-pi-icon svg{stroke:#fff}
.ct-pi-h{font-size:13.5px;font-weight:800;color:var(--ink);margin-bottom:2px}
.ct-pi-p{font-size:11.5px;color:var(--ink4);line-height:1.45}

/* ── MAIN 2-COL ──────────────────────────────────────────────────── */
.ct-main{max-width:1500px;margin:0 auto;padding:48px 48px 80px;display:grid;grid-template-columns:1fr 360px;gap:28px;align-items:start;background:var(--bg)}

/* ── FORM ────────────────────────────────────────────────────────── */
.ct-form-card{background:var(--w);border:1px solid var(--bdr);border-radius:20px;overflow:hidden;box-shadow:var(--sh2)}
.ct-form-hd{padding:24px 28px;border-bottom:1px solid var(--bdr)}
.ct-form-hd-title{font-size:18px;font-weight:900;color:var(--ink);letter-spacing:-.4px;margin-bottom:4px}
.ct-form-hd-sub{font-size:13px;color:var(--ink4)}
.ct-fb{padding:28px}
.fg{margin-bottom:18px}
.fg-row{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:18px}
.fg-lbl{font-size:12px;font-weight:700;color:var(--ink);margin-bottom:6px;display:block}
.fg-req{color:var(--b);margin-left:1px;font-weight:900}
.fi-inp{width:100%;padding:11px 14px;border:1.5px solid var(--bdr);border-radius:10px;font-size:14px;font-family:inherit;color:var(--ink);background:var(--bg);outline:none;transition:border-color .16s,box-shadow .16s;box-sizing:border-box}
.fi-inp:focus{border-color:var(--b);background:var(--w);box-shadow:0 0 0 3px var(--bl)}
.fi-inp::placeholder{color:var(--ink4);font-size:13.5px}
.fi-sel{appearance:none;-webkit-appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%239B96B0' stroke-width='2' stroke-linecap='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 12px center;background-size:16px;padding-right:36px;cursor:pointer}
.fi-ta{resize:vertical;min-height:100px}
.topic-pills{display:flex;flex-wrap:wrap;gap:7px;margin-bottom:0}
.tp{border:1.5px solid var(--bdr);border-radius:8px;padding:7px 13px;cursor:pointer;transition:all .16s;display:inline-flex;align-items:center;gap:6px;font-size:12.5px;font-weight:600;color:var(--ink3);user-select:none;background:var(--bg)}
.tp:hover{border-color:var(--bdr2);color:var(--b);background:var(--bl2)}
.tp.on{border-color:var(--b);background:var(--bl);color:var(--b)}
.tp svg{width:13px;height:13px;stroke:currentColor;fill:none;stroke-width:2;flex-shrink:0}
.ct-divider{height:1px;background:var(--bdr);margin:20px 0}
.ct-submit{width:100%;padding:14px;background:var(--b);color:#fff;border:none;border-radius:11px;font-size:15px;font-weight:800;cursor:pointer;font-family:inherit;transition:all .2s;box-shadow:0 4px 18px rgba(66,32,200,.28);margin-top:20px;display:flex;align-items:center;justify-content:center;gap:8px}
.ct-submit:hover{background:var(--bd);transform:translateY(-1px)}
.ct-submit svg{width:17px;height:17px;stroke:#fff;fill:none;stroke-width:2.5}
.ct-form-note{font-size:11.5px;color:var(--ink4);text-align:center;margin-top:10px;line-height:1.5}
.ct-form-note a{color:var(--b);font-weight:600}
.ct-err{display:none;background:#FEE2E2;border:1px solid #FCA5A5;border-radius:9px;padding:10px 14px;font-size:13px;color:#991B1B;margin-bottom:4px}
.ct-ok{display:none;text-align:center;padding:44px 28px}
.ct-ok-ic{width:60px;height:60px;background:linear-gradient(135deg,var(--b),var(--bm));border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 18px}
.ct-ok-ic svg{width:26px;height:26px;stroke:#fff;fill:none;stroke-width:2.5}
.ct-ok-h{font-size:21px;font-weight:900;color:var(--ink);margin-bottom:8px;letter-spacing:-.4px}
.ct-ok-p{font-size:14px;color:var(--ink3);line-height:1.7;max-width:360px;margin:0 auto 22px}

/* ── RIGHT SIDEBAR ───────────────────────────────────────────────── */
.ct-sidebar{display:flex;flex-direction:column;gap:14px}
.sb-card{background:var(--w);border:1px solid var(--bdr);border-radius:16px;overflow:hidden;box-shadow:var(--sh)}
.sb-hd{padding:16px 18px;border-bottom:1px solid var(--bdr);font-size:12.5px;font-weight:800;color:var(--ink);display:flex;align-items:center;gap:6px}
.sb-hd svg{width:14px;height:14px;stroke:var(--b);fill:none;stroke-width:2;flex-shrink:0}
.sb-channel{display:flex;align-items:flex-start;gap:12px;padding:14px 18px;border-bottom:1px solid var(--bdr);text-decoration:none;transition:background .15s}
.sb-channel:last-child{border-bottom:none}
.sb-channel:hover{background:var(--bl2)}
.sb-ch-ic{width:34px;height:34px;border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.sb-ch-ic svg{width:15px;height:15px;fill:none;stroke-width:2;stroke:currentColor}
.ic-b{background:var(--bl);color:var(--b)}
.ic-g{background:#DCFCE7;color:#16A34A}
.ic-a{background:#FEF3C7;color:#D97706}
.ic-r{background:#FEE2E2;color:#DC2626}
.sb-ch-lbl{font-size:10.5px;font-weight:700;color:var(--ink4);text-transform:uppercase;letter-spacing:.06em;margin-bottom:2px}
.sb-ch-val{font-size:13px;font-weight:700;color:var(--ink)}
.sb-ch-hint{font-size:11.5px;color:var(--ink4);margin-top:1px}
.sb-addr{padding:16px 18px;display:flex;flex-direction:column;gap:8px}
.sb-addr-row{display:flex;align-items:flex-start;gap:8px;font-size:12.5px;color:var(--ink3);line-height:1.5}
.sb-addr-row svg{width:13px;height:13px;stroke:var(--ink4);fill:none;stroke-width:2;flex-shrink:0;margin-top:2px}
.sb-rt{padding:14px 18px;display:flex;flex-direction:column;gap:9px;background:var(--bg)}
.sb-rt-row{display:flex;align-items:center;justify-content:space-between;font-size:12px}
.sb-rt-lbl{color:var(--ink3)}
.sb-rt-val{font-weight:700;font-size:11.5px;color:var(--ink);background:var(--w);border:1px solid var(--bdr);border-radius:5px;padding:2px 8px}
.sb-rt-val.ok{color:#16A34A}
.sb-social{padding:16px 18px;display:flex;gap:8px}
.sb-soc-a{width:36px;height:36px;border-radius:9px;border:1.5px solid var(--bdr);display:flex;align-items:center;justify-content:center;transition:all .16s;text-decoration:none}
.sb-soc-a:hover{border-color:var(--b);background:var(--bl)}
.sb-soc-a svg{width:16px;height:16px;fill:var(--ink4);transition:fill .16s}
.sb-soc-a:hover svg{fill:var(--b)}

/* ── FAQ ─────────────────────────────────────────────────────────── */
.ct-faq-sec{background:var(--w);border-top:1px solid var(--bdr);padding:64px 48px}
.ct-faq-sec-in{max-width:1500px;margin:0 auto;display:grid;grid-template-columns:320px 1fr;gap:56px;align-items:start}
.ct-faq-intro h2{font-size:28px;font-weight:900;letter-spacing:-.7px;color:var(--ink);line-height:1.22;margin-bottom:8px}
.ct-faq-intro p{font-size:13.5px;color:var(--ink3);line-height:1.7}
.fi{border:1px solid var(--bdr);border-radius:12px;overflow:hidden;margin-bottom:8px;background:var(--bg);transition:border-color .15s}
.fi:hover{border-color:var(--bdr2)}
.fi.open{border-color:var(--b);background:var(--w)}
.fi-q{display:flex;align-items:center;justify-content:space-between;padding:15px 18px;cursor:pointer;font-size:14px;font-weight:700;color:var(--ink);gap:12px;user-select:none;line-height:1.4}
.fi-tog{width:24px;height:24px;border-radius:6px;background:var(--bg);border:1px solid var(--bdr);display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:all .17s}
.fi-tog svg{width:11px;height:11px;stroke:var(--ink4);stroke-width:2.5;fill:none;transition:transform .22s}
.fi.open .fi-tog{background:var(--b);border-color:var(--b)}
.fi.open .fi-tog svg{stroke:#fff;transform:rotate(45deg)}
.fi-ans{display:none;padding:0 18px 16px;font-size:13.5px;color:var(--ink3);line-height:1.74}
.fi.open .fi-ans{display:block}
.fi-ans a{color:var(--b);font-weight:600}

/* ── RESPONSIVE ──────────────────────────────────────────────────── */
@media(max-width:1024px){
  .ct-hero-grid{grid-template-columns:1fr}
  .ct-hero-img{display:none}
  .ct-hero-left{padding:52px 24px}
  .ct-path{padding:0 24px}
  .ct-path-in{grid-template-columns:1fr 1fr}
  .ct-path-item{border-bottom:1px solid var(--bdr)}
  .ct-main{grid-template-columns:1fr;padding:36px 24px 60px}
  .ct-faq-sec{padding:48px 24px}
  .ct-faq-sec-in{grid-template-columns:1fr}
}
@media(max-width:640px){
  .ct-hero h1{font-size:32px}
  .ct-path-in{grid-template-columns:1fr}
  .fg-row{grid-template-columns:1fr}
  .topic-pills{gap:6px}
}


.ct-hero-chips{display:flex;flex-direction:column;gap:10px;margin-top:0}
.ct-hero-chip{display:flex;align-items:center;gap:10px;background:var(--bg);border:1px solid var(--bdr);border-radius:10px;padding:11px 16px;text-decoration:none;transition:all .16s}
.ct-hero-chip:hover{border-color:var(--bdr2);background:var(--bl2);transform:translateX(3px)}
.ct-hc-icon{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.ct-hc-icon svg{width:14px;height:14px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}
.ct-hc-b{background:var(--bl);color:var(--b)}
.ct-hc-g{background:#DCFCE7;color:#16A34A}
.ct-hc-a{background:#FEF3C7;color:#D97706}
.ct-hc-label{font-size:10.5px;font-weight:700;color:var(--ink4);text-transform:uppercase;letter-spacing:.06em}
.ct-hc-val{font-size:13px;font-weight:700;color:var(--ink);margin-top:1px}


/* ── Hero info panel ───────────────────────────────────────────── */
.ct-hero-info{display:flex;flex-direction:column;gap:14px;margin-top:0}
.ct-hero-loc{display:flex;align-items:flex-start;gap:12px;background:var(--bg);border:1px solid var(--bdr);border-radius:12px;padding:14px 16px;text-decoration:none;transition:all .18s}
.ct-hero-loc:hover{border-color:var(--bdr2);background:var(--bl2);transform:translateX(3px)}
.ct-hero-loc-icon{width:34px;height:34px;background:var(--bl);border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px}
.ct-hero-loc-icon svg{width:15px;height:15px;stroke:var(--b);fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}
.ct-hl-name{font-size:13px;font-weight:800;color:var(--ink);margin-bottom:2px}
.ct-hl-addr{font-size:12px;color:var(--ink3);line-height:1.5}
.ct-hl-map{font-size:11.5px;font-weight:700;color:var(--b);margin-top:5px}
.ct-hero-rt{background:var(--bg);border:1px solid var(--bdr);border-radius:12px;padding:14px 16px}
.ct-hero-rt-title{display:flex;align-items:center;gap:7px;font-size:12px;font-weight:800;color:var(--ink);margin-bottom:12px}
.ct-hero-rt-title svg{width:13px;height:13px;stroke:var(--b);fill:none;stroke-width:2;flex-shrink:0}
.ct-hero-rt-rows{display:flex;flex-direction:column;gap:7px}
.ct-hero-rt-row{display:flex;align-items:center;justify-content:space-between;font-size:12.5px;color:var(--ink3)}
.ct-rt-chip{font-size:11px;font-weight:800;border-radius:5px;padding:2px 8px;background:var(--w);border:1px solid var(--bdr);color:var(--ink);white-space:nowrap}
.ct-rt-chip.ok{color:#16A34A;border-color:#BBF7D0;background:#F0FDF4}

</style>

@endpush

@section('content')
<header class="ct-hero">
  <div class="ct-hero-grid">
    <div class="ct-hero-left">
      <nav class="bc" aria-label="Breadcrumb" style="margin-bottom:14px">
        <a href="https://kp.kprise.com">Home</a><span class="bc-sep">/</span>
        <span>Contact</span>
      </nav>
      <div class="ct-hero-eye"><span class="ct-eye-dot"></span>Kprise — Burtonsville, MD</div>
      <h1>We'd Love to <em> Hear From You.</em></h1>
      <p class="ct-hero-sub">A real conversation about your training goals — whether you're evaluating platforms, migrating from another system, or have a specific technical question. Choose the best way to reach us below.</p>
      <div class="ct-hero-info">

        <a href="https://maps.google.com/?q=3905+National+Drive+Suite+330+Burtonsville+MD+20866" target="_blank" rel="noopener" class="ct-hero-loc">
          <div class="ct-hero-loc-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
          <div>
            <div class="ct-hl-name">Kprise HQ — Burtonsville, Maryland</div>
            <div class="ct-hl-addr">3905 National Drive, Suite 330 &middot; MD 20866, USA</div>
            <div class="ct-hl-map">View on Google Maps →</div>
          </div>
        </a>

        <div class="ct-hero-rt">
          <div class="ct-hero-rt-title"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> Typical response times</div>
          <div class="ct-hero-rt-rows">
            <div class="ct-hero-rt-row"><span>Book a demo (Calendly)</span><span class="ct-rt-chip ok">Instant</span></div>
            <div class="ct-hero-rt-row"><span>Contact form</span><span class="ct-rt-chip ok">&lt; 4 hours</span></div>
            <div class="ct-hero-rt-row"><span>Email &amp; support tickets</span><span class="ct-rt-chip">1 business day</span></div>
          </div>
        </div>

      </div>
    </div>
    <div class="ct-hero-img">
      <img src="https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?w=880&q=80&auto=format&fit=crop"
        alt="Team ready to help at MyPass LMS" loading="eager">
      <div class="ct-hero-img-badge">
        <span class="ct-badge-dot"></span>
        <div>
          <div class="ct-badge-txt">Team online now</div>
          <div class="ct-badge-sub">Replies within 4 hours</div>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="ct-path">
  <div class="ct-path-in">
    <a href="https://calendly.com/onlinesales-kprise/30min" target="_blank" rel="noopener" class="ct-path-item on">
      <div class="ct-pi-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
      <div>
        <div class="ct-pi-h">Book a Demo</div>
        <div class="ct-pi-p">30-min live walkthrough tailored to your use case</div>
      </div>
    </a>
    <div class="ct-path-item" onclick="pickPath(this,'General question')">
      <div class="ct-pi-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></div>
      <div>
        <div class="ct-pi-h">Ask a Question</div>
        <div class="ct-pi-p">Features, pricing, AMS, or anything else</div>
      </div>
    </div>
    <div class="ct-path-item" onclick="pickPath(this,'Account or support')">
      <div class="ct-pi-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></div>
      <div>
        <div class="ct-pi-h">Account Support</div>
        <div class="ct-pi-p">Already a customer? We'll resolve it fast</div>
      </div>
    </div>
    <div class="ct-path-item" onclick="pickPath(this,'Partnership or reseller')">
      <div class="ct-pi-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
      <div>
        <div class="ct-pi-h">Partnerships</div>
        <div class="ct-pi-p">Reseller, referral, or integration opportunities</div>
      </div>
    </div>
  </div>
</div>
<div style="background:var(--bg)">
  <div class="ct-main">
    <div class="ct-form-card">
  <div class="ct-form-hd">
    <div class="ct-form-hd-title">Send Us a Message</div>
    <div class="ct-form-hd-sub">Fill in the form below — a real team member will reply, not a bot</div>
  </div>
  <div id="form-wrap">
    <div class="ct-fb">

      <div style="margin-bottom:20px">
        <label class="fg-lbl">What best describes your enquiry?<span class="fg-req">*</span></label>
        <div class="topic-pills">
          <div class="tp on" data-t="Book a demo" onclick="selTopic(this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"/></svg> Book a demo</div>
          <div class="tp" data-t="General question" onclick="selTopic(this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg> General question</div>
          <div class="tp" data-t="Pricing question" onclick="selTopic(this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg> Pricing</div>
          <div class="tp" data-t="Account or support" onclick="selTopic(this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg> Account support</div>
          <div class="tp" data-t="Feature request" onclick="selTopic(this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg> Feature request</div>
          <div class="tp" data-t="Partnership" onclick="selTopic(this)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> Partnership</div>
        </div>
      </div>

      <div class="ct-divider"></div>

      <div class="fg-row">
        <div>
          <label class="fg-lbl" for="fn">First Name<span class="fg-req">*</span></label>
          <input id="fn" type="text" class="fi-inp" placeholder="Sarah" autocomplete="given-name">
        </div>
        <div>
          <label class="fg-lbl" for="ln">Last Name<span class="fg-req">*</span></label>
          <input id="ln" type="text" class="fi-inp" placeholder="Johnson" autocomplete="family-name">
        </div>
      </div>

      <div class="fg-row">
        <div>
          <label class="fg-lbl" for="em">Work Email<span class="fg-req">*</span></label>
          <input id="em" type="email" class="fi-inp" placeholder="sarah@yourcompany.com" autocomplete="email">
        </div>
        <div>
          <label class="fg-lbl" for="ph">Phone <span style="font-weight:400;color:var(--ink4)">(optional)</span></label>
          <input id="ph" type="tel" class="fi-inp" placeholder="+1 555 000 0000" autocomplete="tel">
        </div>
      </div>

      <div class="fg-row">
        <div>
          <label class="fg-lbl" for="org">Organisation<span class="fg-req">*</span></label>
          <input id="org" type="text" class="fi-inp" placeholder="Your organisation name" autocomplete="organization">
        </div>
        <div>
          <label class="fg-lbl" for="sz">Learner Count</label>
          <select id="sz" class="fi-inp fi-sel">
            <option value="">How many learners?</option>
            <option>1–40 active users</option>
            <option>41–100 active users</option>
            <option>101–250 active users</option>
            <option>251–500 active users</option>
            <option>500+ active users</option>
          </select>
        </div>
      </div>

      <div class="fg">
        <label class="fg-lbl" for="msg">Your Message</label>
        <textarea id="msg" class="fi-inp fi-ta" placeholder="Tell us about your current setup, what you're looking to achieve, or a specific question you'd like answered in the demo…"></textarea>
      </div>

      <div class="ct-err" id="err-box"></div>
      <button class="ct-submit" onclick="handleSubmit()"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg> Send Message</button>
      <p class="ct-form-note">Your details are used only to respond to your enquiry. Read our <a href="https://kprise.com/privacy-policy" target="_blank">Privacy Policy</a>.</p>
    </div>
  </div>
  <div class="ct-ok" id="ok-box">
    <div class="ct-ok-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
    <div class="ct-ok-h">Message sent — thank you!</div>
    <p class="ct-ok-p">A member of our team will reply to <strong id="ok-email"></strong> within one business day. While you wait, you can explore the platform or start your free trial.</p>
    <a href="https://mypasslms.us/login#register" class="btn-a" style="font-size:14px;padding:12px 24px;display:inline-flex">Start Free for 15 Days</a>
  </div>
</div>
    <div class="ct-sidebar">

  <div class="sb-card">
    <div class="sb-hd"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.87 9.5 19.79 19.79 0 011.14 5.3 2 2 0 013.12 3h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L7.09 10.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0121 18z"/></svg> Direct Contact</div>
    <a href="https://calendly.com/onlinesales-kprise/30min" class="sb-channel" target="_blank" rel="noopener">
      <div class="sb-ch-ic ic-b"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
      <div>
        <div class="sb-ch-lbl">Fastest option</div>
        <div class="sb-ch-val">Book a Live Demo</div>
        <div class="sb-ch-hint">30-min walkthrough — pick a time now</div>
      </div>
    </a>
    <a href="mailto:onlinesales@kprise.com" class="sb-channel">
      <div class="sb-ch-ic ic-g"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
      <div>
        <div class="sb-ch-lbl">Email</div>
        <div class="sb-ch-val">onlinesales@kprise.com</div>
        <div class="sb-ch-hint">Sales &amp; general enquiries</div>
      </div>
    </a>
    <a href="tel:+12403164903" class="sb-channel">
      <div class="sb-ch-ic ic-a"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.87 9.5 19.79 19.79 0 011.14 5.3 2 2 0 013.12 3h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L7.09 10.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0121 18z"/></svg></div>
      <div>
        <div class="sb-ch-lbl">Phone &mdash; Mon&ndash;Fri 9am&ndash;5pm ET</div>
        <div class="sb-ch-val">(240) 316-4903</div>
        <div class="sb-ch-hint">Speak with our team directly</div>
      </div>
    </a>
    <a href="mailto:support@kprise.com" class="sb-channel">
      <div class="sb-ch-ic ic-r"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
      <div>
        <div class="sb-ch-lbl">Customer support</div>
        <div class="sb-ch-val">support@kprise.com</div>
        <div class="sb-ch-hint">For existing customers</div>
      </div>
    </a>
  </div>

  <div class="sb-card">
    <div class="sb-hd">Follow Kprise</div>
    <div class="sb-social">
      <a href="https://www.linkedin.com/company/kprise" target="_blank" rel="noopener" class="sb-soc-a" aria-label="LinkedIn">
        <svg viewBox="0 0 24 24" width="16" height="16"><path fill="currentColor" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2" fill="currentColor"/></svg>
      </a>
      <a href="https://twitter.com/kprise" target="_blank" rel="noopener" class="sb-soc-a" aria-label="X / Twitter">
        <svg viewBox="0 0 24 24" width="16" height="16"><path fill="currentColor" d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
      </a>
      <a href="https://www.youtube.com/@kprise" target="_blank" rel="noopener" class="sb-soc-a" aria-label="YouTube">
        <svg viewBox="0 0 24 24" width="16" height="16"><path fill="currentColor" d="M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 00-1.95 1.96A29 29 0 001 12a29 29 0 00.46 5.58 2.78 2.78 0 001.95 1.95C5.12 20 12 20 12 20s6.88 0 8.59-.47a2.78 2.78 0 001.95-1.95A29 29 0 0023 12a29 29 0 00-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" fill="#fff"/></svg>
      </a>
      <a href="https://www.instagram.com/kprise" target="_blank" rel="noopener" class="sb-soc-a" aria-label="Instagram">
        <svg viewBox="0 0 24 24" width="16" height="16"><rect x="2" y="2" width="20" height="20" rx="5" ry="5" fill="currentColor"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" fill="#fff"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5" stroke="#fff" stroke-width="1.5" stroke-linecap="round"/></svg>
      </a>
    </div>
  </div>

</div>
  </div>
</div>
<section class="ct-faq-sec">
  <div class="ct-faq-sec-in">
    <div class="ct-faq-intro">
      <div class="eyebrow"><span class="ew"></span>Quick Answers</div>
      <h2>Common Questions Before You Reach Out</h2>
      <p>Save time — most questions about pricing, integrations, and getting started are answered here.</p>
    </div>
    <div>
      <div class="fi open">
      <div class="fi-q">What does the 15-day trial actually include?<div class="fi-tog"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
      <div class="fi-ans">Everything. The full MyPass LMS platform — AI course builder, compliance automation, AMS integration, AI proctoring, DRM, ecommerce, analytics, and 50,000+ ready-made courses. No feature is locked or restricted during the trial. Your account is fully functional from the moment you sign up, with no credit card required.</div>
    </div>
      <div class="fi">
      <div class="fi-q">How is MyPass LMS priced?<div class="fi-tog"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
      <div class="fi-ans">Active user pricing — you pay only for users who log in during each billing period. Idle accounts cost $0. Plans start from $63/month for 1–40 active users, with every feature included on every plan. No add-ons, no feature tiers, no hidden upgrades. <a href="https://kp.kprise.com/pricing">See full pricing details</a>.</div>
    </div>
      <div class="fi">
      <div class="fi-q">Which AMS platforms does MyPass LMS integrate with?<div class="fi-tog"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
      <div class="fi-ans">MyPass LMS connects natively with iMIS, MemberClicks, GrowthZone, YourMembership, Fonteva, Personify, Wild Apricot, and MemberLeap. The integration is bidirectional and real-time — membership changes in your AMS automatically update enrolments and access in MyPass LMS, with no middleware required.</div>
    </div>
      <div class="fi">
      <div class="fi-q">How long does it take to set up and go live?<div class="fi-tog"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
      <div class="fi-ans">Most organisations have their first course live within one day of signing up — sometimes within the first session. No IT team or implementation consultant is needed. For AMS integrations or migrations from another LMS, our team supports you through the process. Complex setups typically take one to two weeks.</div>
    </div>
      <div class="fi">
      <div class="fi-q">I'm an existing customer with a support issue — what's the fastest route?<div class="fi-tog"><svg viewBox="0 0 14 14"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
      <div class="fi-ans">Head to <a href="https://help.kprise.com">help.kprise.com</a> to access our Help Centre, submit a support ticket, or find step-by-step guides. Our support team replies within one business day. For urgent platform issues, call us directly at (240) 316-4903 during business hours.</div>
    </div>
    </div>
  </div>
</section>

<script>
function pickPath(el, topic){
  document.querySelectorAll('.ct-path-item').forEach(function(i){i.classList.remove('on');});
  el.classList.add('on');
  selTopicByName(topic);
  document.querySelector('.ct-form-card').scrollIntoView({behavior:'smooth',block:'start'});
}
function selTopic(el){
  document.querySelectorAll('.tp').forEach(function(t){t.classList.remove('on');});
  el.classList.add('on');
}
function selTopicByName(name){
  document.querySelectorAll('.tp').forEach(function(t){
    t.classList.toggle('on', t.getAttribute('data-t')===name);
  });
}
function handleSubmit(){
  var fn  = document.getElementById('fn').value.trim();
  var ln  = document.getElementById('ln').value.trim();
  var em  = document.getElementById('em').value.trim();
  var org = document.getElementById('org').value.trim();
  var top = document.querySelector('.tp.on');
  var err = document.getElementById('err-box');
  var errs = [];
  if(!fn) errs.push('First name required.');
  if(!ln) errs.push('Last name required.');
  if(!em || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(em)) errs.push('Valid work email required.');
  if(!org) errs.push('Organisation name required.');
  if(!top) errs.push('Please select an enquiry type.');
  if(errs.length){ err.textContent=errs.join(' '); err.style.display='block'; return; }
  err.style.display='none';
  document.getElementById('ok-email').textContent = em;
  document.getElementById('form-wrap').style.display='none';
  document.getElementById('ok-box').style.display='block';
}
(function(){
  document.querySelectorAll('.fi').forEach(function(item){
    item.querySelector('.fi-q').addEventListener('click',function(){item.classList.toggle('open');});
  });
})();
</script>
@endsection
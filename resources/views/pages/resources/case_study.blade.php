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
/* ── CASE STUDY PAGE ── */
:root{--cs-rad:18px}

/* HERO */
.cs-hero{background:var(--w);border-bottom:1px solid var(--bdr);padding:40px 48px 72px;position:relative;overflow:hidden;text-align:center}
.cs-hero::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 80% 60% at 50% 0%,var(--bl2),transparent 70%);pointer-events:none}
.cs-hero-in{max-width:780px;margin:0 auto;position:relative;z-index:1}
.cs-tag{display:inline-flex;align-items:center;gap:6px;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);background:var(--bl);border:1px solid var(--bdr2);border-radius:100px;padding:4px 14px;margin-bottom:20px}
.cs-tag-dot{width:6px;height:6px;background:var(--b);border-radius:50%;animation:breathe 2s ease-in-out infinite}
@keyframes breathe{0%,100%{opacity:1}50%{opacity:.3}}
.cs-hero h1{font-size:52px;font-weight:900;letter-spacing:-2.4px;line-height:1.06;color:var(--ink);margin-bottom:16px}
.cs-hero h1 em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent}
.cs-hero p{font-size:17px;color:var(--ink3);line-height:1.7;max-width:540px;margin:0 auto 32px}
.cs-hero-btns{display:flex;gap:10px;justify-content:center;flex-wrap:wrap;margin-bottom:44px}
.cs-stats-row{display:flex;align-items:center;justify-content:center;gap:0;border:1px solid var(--bdr);border-radius:14px;background:var(--w);overflow:hidden;box-shadow:var(--sh);max-width:680px;margin:0 auto}
.cs-stat{flex:1;padding:18px 16px;text-align:center;border-right:1px solid var(--bdr)}
.cs-stat:last-child{border-right:none}
.cs-stat-n{font-size:26px;font-weight:900;letter-spacing:-1px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;line-height:1.1}
.cs-stat-l{font-size:11px;color:var(--ink4);font-weight:500;margin-top:3px;line-height:1.4}

/* CLIENT LOGO BAR */
.cs-logo-bar{background:var(--bg);border-bottom:1px solid var(--bdr);padding:16px 48px}
.cs-logo-bar-in{max-width:1200px;margin:0 auto;display:flex;align-items:center;gap:0;flex-wrap:wrap}
.cs-lb-lbl{font-size:11px;font-weight:700;color:var(--ink4);white-space:nowrap;margin-right:24px;flex-shrink:0;letter-spacing:.04em;text-transform:uppercase}
.cs-client-logos{display:flex;align-items:center;gap:32px;flex-wrap:wrap}
.cs-client-logo{font-size:13px;font-weight:800;color:var(--ink4);letter-spacing:.02em;opacity:.6;transition:opacity .18s;white-space:nowrap}
.cs-client-logo:hover{opacity:1;color:var(--b)}

/* FILTER BAR */
/* GRID */
.cs-grid-wrap{background:var(--bg);padding:52px 48px 64px}
.cs-grid{max-width:1200px;margin:0 auto;display:grid;grid-template-columns:repeat(12,1fr);gap:22px}

/* FEATURED CARD */
.cs-card-feat{grid-column:span 12;background:var(--w);border:1px solid var(--bdr);border-radius:var(--cs-rad);overflow:hidden;display:grid;grid-template-columns:1fr 1fr;box-shadow:var(--sh2);transition:all .28s;cursor:pointer;position:relative}
.cs-card-feat::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--gr);z-index:2}
.cs-card-feat:hover{transform:translateY(-4px);box-shadow:var(--sh3);border-color:var(--bdr2)}
.cs-feat-img{position:relative;overflow:hidden;min-height:380px}
.cs-feat-img img{width:100%;height:100%;object-fit:cover;object-position:center;transition:transform .5s}
.cs-card-feat:hover .cs-feat-img img{transform:scale(1.04)}
.cs-feat-overlay{position:absolute;inset:0;background:linear-gradient(to right,rgba(0,0,0,.45) 0%,transparent 60%)}
.cs-feat-chips{position:absolute;top:18px;left:18px;display:flex;gap:7px;flex-wrap:wrap;z-index:1}
.chip-ind{font-size:10px;font-weight:800;letter-spacing:.07em;text-transform:uppercase;background:rgba(255,255,255,.92);backdrop-filter:blur(10px);color:var(--ink2);border-radius:7px;padding:4px 11px}
.chip-uc{font-size:10px;font-weight:800;letter-spacing:.07em;text-transform:uppercase;background:var(--b);color:#fff;border-radius:7px;padding:4px 11px}
.cs-feat-body{padding:36px 36px 0;display:flex;flex-direction:column}
.cs-feat-client{font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;color:var(--b);margin-bottom:10px}
.cs-feat-h{font-size:24px;font-weight:900;letter-spacing:-.6px;color:var(--ink);line-height:1.28;margin-bottom:10px}
.cs-feat-tag{font-size:14px;font-style:italic;color:var(--ink3);line-height:1.6;margin-bottom:22px;border-left:3px solid var(--bdr2);padding-left:14px}
.cs-feat-metrics{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:var(--bdr);border-radius:12px;overflow:hidden;margin-bottom:0;flex-shrink:0}
.cs-feat-mc{background:var(--bl2);padding:14px 10px;text-align:center}
.cs-feat-mn{font-size:24px;font-weight:900;letter-spacing:-1px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;line-height:1.1}
.cs-feat-ml{font-size:10.5px;color:var(--ink4);font-weight:500;margin-top:3px;line-height:1.35}
.cs-feat-cta{display:flex;align-items:center;gap:6px;font-size:13px;font-weight:700;color:var(--b);padding:16px 36px;border-top:1px solid var(--bdr);background:var(--bl2);transition:all .18s;flex-shrink:0}
.cs-feat-cta svg{width:13px;height:13px;stroke:var(--b);stroke-width:2.5;fill:none;transition:transform .16s}
.cs-card-feat:hover .cs-feat-cta svg{transform:translateX(4px)}

/* REGULAR CARD */
.cs-card{grid-column:span 4;background:var(--w);border:1px solid var(--bdr);border-radius:var(--cs-rad);overflow:hidden;box-shadow:var(--sh);transition:all .25s;cursor:pointer;display:flex;flex-direction:column;position:relative}
.cs-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--gr);opacity:0;z-index:2;transition:opacity .22s}
.cs-card:hover{transform:translateY(-5px);box-shadow:var(--sh3);border-color:var(--bdr2)}
.cs-card:hover::before{opacity:1}
.cs-card-img{position:relative;overflow:hidden;height:188px;flex-shrink:0}
.cs-card-img img{width:100%;height:100%;object-fit:cover;object-position:center;transition:transform .42s}
.cs-card:hover .cs-card-img img{transform:scale(1.05)}
.cs-card-overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,.5),transparent 55%)}
.cs-card-chips{position:absolute;top:12px;left:12px;display:flex;gap:6px}
.cs-body{padding:20px 20px 0;flex:1;display:flex;flex-direction:column}
.cs-body-client{font-size:10.5px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;color:var(--b);margin-bottom:7px}
.cs-body-h{font-size:15px;font-weight:800;color:var(--ink);line-height:1.32;margin-bottom:7px;letter-spacing:-.2px}
.cs-body-tag{font-size:12.5px;color:var(--ink3);line-height:1.64;margin-bottom:14px;flex:1;font-style:italic}
.cs-metrics{display:flex;border-top:1px solid var(--bdr);margin:0 -20px}
.cs-mc{flex:1;padding:11px 8px;text-align:center;border-right:1px solid var(--bdr)}
.cs-mc:last-child{border-right:none}
.cs-mn{font-size:16px;font-weight:900;letter-spacing:-.6px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;line-height:1.1}
.cs-ml{font-size:9.5px;color:var(--ink4);font-weight:500;margin-top:2px;line-height:1.35}
.cs-link{display:flex;align-items:center;gap:5px;font-size:12px;font-weight:700;color:var(--b);padding:11px 20px;border-top:1px solid var(--bdr);background:var(--bl2);transition:all .16s}
.cs-link svg{width:11px;height:11px;stroke:var(--b);stroke-width:2.5;fill:none;transition:transform .16s}
.cs-card:hover .cs-link{background:var(--bl)}
.cs-card:hover .cs-link svg{transform:translateX(3px)}

/* WIDE CARD (span 6) */
.cs-card.wide{grid-column:span 6}

/* MODAL */
.cs-modal-bg{display:none;position:fixed;inset:0;background:rgba(10,8,26,.6);z-index:1000;align-items:flex-start;justify-content:center;padding:32px 20px;backdrop-filter:blur(6px);overflow-y:auto}
.cs-modal-bg.open{display:flex}
.cs-modal{background:var(--w);border-radius:22px;max-width:820px;width:100%;margin:auto;box-shadow:0 32px 100px rgba(0,0,0,.28);position:relative;animation:slideUp .28s ease}
@keyframes slideUp{from{opacity:0;transform:translateY(24px)}to{opacity:1;transform:translateY(0)}}
.cs-modal-img{width:100%;height:260px;object-fit:cover;object-position:center;border-radius:22px 22px 0 0;display:block}
.cs-modal-body{padding:32px 36px 36px}
.cs-modal-chips{display:flex;gap:8px;margin-bottom:13px;flex-wrap:wrap}
.cs-modal-client{font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);margin-bottom:8px}
.cs-modal-h{font-size:23px;font-weight:900;letter-spacing:-.7px;color:var(--ink);line-height:1.24;margin-bottom:8px}
.cs-modal-tagline{font-size:14px;font-style:italic;color:var(--ink3);line-height:1.7;margin-bottom:22px;border-left:3px solid var(--bdr2);padding-left:14px}
.cs-modal-mets{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:var(--bdr);border-radius:13px;overflow:hidden;margin-bottom:24px}
.cs-modal-mc{background:var(--bl2);padding:17px;text-align:center}
.cs-modal-mn{font-size:28px;font-weight:900;letter-spacing:-1.2px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;line-height:1}
.cs-modal-ml{font-size:11.5px;color:var(--ink3);font-weight:600;margin-top:5px;line-height:1.4}
.cs-modal-divider{display:flex;flex-direction:column;gap:18px;margin-bottom:22px}
.cs-modal-block{background:var(--bg);border:1px solid var(--bdr);border-radius:12px;padding:16px 18px}
.cs-modal-lbl{font-size:9.5px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);margin-bottom:6px}
.cs-modal-txt{font-size:13.5px;color:var(--ink3);line-height:1.74}
.cs-modal-quote{background:var(--bl2);border-left:3px solid var(--b);border-radius:0 12px 12px 0;padding:16px 20px;margin-bottom:22px}
.cs-modal-quote p{font-size:14px;font-style:italic;color:var(--ink2);line-height:1.74;margin-bottom:7px}
.cs-modal-quote cite{font-size:11.5px;font-weight:700;color:var(--b);font-style:normal}
.cs-modal-close{position:absolute;top:16px;right:16px;width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,.92);backdrop-filter:blur(8px);border:1px solid rgba(0,0,0,.1);display:flex;align-items:center;justify-content:center;cursor:pointer;z-index:10;transition:all .16s;box-shadow:0 2px 8px rgba(0,0,0,.12)}
.cs-modal-close:hover{background:var(--bl)}
.cs-modal-close svg{width:15px;height:15px;stroke:var(--ink3);stroke-width:2.2;fill:none}
.cs-modal-ctas{display:flex;gap:10px;flex-wrap:wrap}

/* QUOTE WALL */
.qs-wrap{background:var(--w);border-top:1px solid var(--bdr);border-bottom:1px solid var(--bdr);padding:60px 48px}
.qs-in{max-width:1200px;margin:0 auto}
.qs-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:18px;margin-top:32px}
.qs-card{border:1px solid var(--bdr);border-radius:16px;padding:26px;background:var(--bg);position:relative;overflow:hidden;transition:all .22s}
.qs-card:hover{border-color:var(--bdr2);box-shadow:var(--sh);background:var(--w)}
.qs-card::before{content:'"';position:absolute;top:6px;left:14px;font-size:72px;font-weight:900;color:var(--b);opacity:.06;line-height:1;pointer-events:none}
.qs-body{font-size:14px;line-height:1.76;color:var(--ink3);margin-bottom:18px;padding-top:6px}
.qs-author{display:flex;align-items:center;gap:11px}
.qs-av{width:40px;height:40px;border-radius:50%;font-size:13px;font-weight:800;color:#fff;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.qs-name{font-size:13.5px;font-weight:700;color:var(--ink)}
.qs-role{font-size:11.5px;color:var(--ink4);margin-top:1px}

/* RESPONSIVE */
@media(max-width:1024px){
  .cs-card-feat{grid-template-columns:1fr}
  .cs-feat-img{min-height:260px}
  .cs-feat-overlay{background:linear-gradient(to bottom,rgba(0,0,0,.4),transparent 50%)}
  .cs-card{grid-column:span 6}
  .cs-card.wide{grid-column:span 6}
  .cs-grid{grid-template-columns:repeat(12,1fr)}
  .cs-grid-wrap{padding:36px 24px 48px}
  .qs-wrap{padding:44px 24px}
}
@media(max-width:640px){
  .cs-hero{padding:52px 20px 56px}
  .cs-hero h1{font-size:36px}
  .cs-card-feat,.cs-card,.cs-card.wide{grid-column:span 12}
  .cs-grid{grid-template-columns:1fr}
  .cs-grid-wrap{padding:28px 16px 40px}
  .qs-grid{grid-template-columns:1fr}
  .cs-stats-row{flex-direction:column;border-radius:12px}
  .cs-stat{border-right:none;border-bottom:1px solid var(--bdr)}
  .cs-stat:last-child{border-bottom:none}
  .cs-modal-body{padding:22px 22px 28px}
}

/* ── MODAL DOWNLOAD SECTION ── */
.cs-dl-section{background:linear-gradient(135deg,var(--bl2),var(--bl));border:1.5px solid var(--bdr2);border-radius:16px;padding:24px 26px;margin-top:22px}
.cs-dl-head{font-size:14px;font-weight:800;color:var(--ink);margin-bottom:6px}
.cs-dl-sub{font-size:12.5px;color:var(--ink3);line-height:1.6;margin-bottom:16px}
.cs-dl-what{display:flex;flex-direction:column;gap:7px;margin-bottom:18px}
.cs-dl-item{display:flex;align-items:flex-start;gap:8px;font-size:12.5px;color:var(--ink3)}
.cs-dl-item svg{width:14px;height:14px;flex-shrink:0;margin-top:1px;stroke:var(--ok);stroke-width:2.5;fill:none;stroke-linecap:round;stroke-linejoin:round}
.cs-dl-btn{display:inline-flex;align-items:center;gap:8px;font-family:inherit;font-size:14px;font-weight:700;padding:12px 24px;border-radius:10px;background:var(--gr);color:#fff;border:none;cursor:pointer;box-shadow:0 4px 14px rgba(66,32,200,.24);transition:all .2s;text-decoration:none;width:100%;justify-content:center}
.cs-dl-btn:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(66,32,200,.34)}
.cs-dl-btn svg{width:16px;height:16px;stroke:#fff;stroke-width:2.2;fill:none;flex-shrink:0}
.cs-dl-note{font-size:11px;color:var(--ink4);text-align:center;margin-top:8px}
/* ── MODAL OUTCOME PILLS ── */
.cs-outcomes{display:flex;flex-direction:column;gap:8px;margin:18px 0}
.cs-outcome-item{display:flex;align-items:flex-start;gap:10px;background:var(--bl2);border:1px solid var(--bdr);border-radius:10px;padding:10px 14px}
.cs-oi-dot{width:8px;height:8px;border-radius:50%;background:var(--b);flex-shrink:0;margin-top:3px}
.cs-oi-txt{font-size:13px;color:var(--ink3);line-height:1.5}
/* ── MODAL META ROW ── */
.cs-meta-row{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:14px}
.cs-meta-pill{font-size:11px;font-weight:600;color:var(--ink3);background:var(--bg);border:1px solid var(--bdr);border-radius:6px;padding:3px 10px;line-height:1.5}
.cs-meta-pill.hi{background:var(--bl);color:var(--b);border-color:var(--bdr2)}
/* ── MODAL SAVINGS BAND ── */
.cs-savings-band{background:var(--bl2);border:1px solid var(--bdr2);border-radius:10px;padding:10px 14px;margin:14px 0;display:flex;align-items:center;gap:10px}
.cs-savings-icon{width:34px;height:34px;border-radius:8px;background:var(--bl);display:flex;align-items:center;justify-content:center;flex-shrink:0}
.cs-savings-icon svg{width:18px;height:18px;stroke:var(--b);stroke-width:1.8;fill:none}
.cs-savings-txt{font-size:12.5px;font-weight:600;color:var(--ink2);line-height:1.5}


.cs-dl-gate{display:flex;align-items:center;gap:16px;flex-wrap:wrap}
.cs-dl-gate-left{flex:1;min-width:200px}
.cs-dl-gate-right{display:flex;align-items:center;gap:12px;flex-shrink:0}
.cs-dl-or{font-size:11px;font-weight:600;color:var(--ink4)}
.cs-dl-trial{font-size:13px;font-weight:700;padding:10px 18px;border-radius:10px;background:var(--w);color:var(--b);border:1.5px solid var(--bdr2);display:inline-flex;align-items:center;transition:all .18s;white-space:nowrap}
.cs-dl-trial:hover{background:var(--bl);border-color:var(--b)}

.cs-dl-section{background:var(--bl2);border:1.5px solid var(--bdr2);border-radius:16px;padding:24px;margin:20px 0 14px}
.cs-dl-head{font-size:16px;font-weight:900;color:var(--ink);letter-spacing:-.4px;margin-bottom:6px;display:flex;align-items:center;gap:8px}
.cs-dl-head-icon{width:28px;height:28px;border-radius:8px;background:var(--gr);display:flex;align-items:center;justify-content:center;flex-shrink:0}
.cs-dl-head-icon svg{width:14px;height:14px;stroke:#fff;stroke-width:2.2;fill:none;stroke-linecap:round;stroke-linejoin:round}
.cs-dl-sub{font-size:13px;color:var(--ink3);line-height:1.65;margin-bottom:14px}
.cs-dl-preview{background:var(--w);border:1px solid var(--bdr);border-radius:10px;padding:14px 16px;margin-bottom:16px}
.cs-dl-preview-lbl{font-size:9.5px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);margin-bottom:10px}
.cs-dl-items{display:grid;grid-template-columns:1fr 1fr;gap:7px}
.cs-dl-item{display:flex;align-items:flex-start;gap:7px;font-size:12.5px;color:var(--ink3);line-height:1.5}
.cs-dl-item svg{width:14px;height:14px;flex-shrink:0;margin-top:1px;stroke:#16A34A;stroke-width:2.5;fill:none;stroke-linecap:round;stroke-linejoin:round}
.cs-dl-actions{display:flex;gap:10px;align-items:center;flex-wrap:wrap}
.cs-dl-btn{display:inline-flex;align-items:center;gap:8px;font-family:inherit;font-size:14px;font-weight:700;padding:12px 24px;background:linear-gradient(135deg,#4220C8,#2D1490);color:#fff;border:none;border-radius:10px;cursor:pointer;box-shadow:0 4px 14px rgba(66,32,200,.28);transition:all .2s;text-decoration:none;white-space:nowrap}
.cs-dl-btn:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(66,32,200,.36);color:#fff}
.cs-dl-btn svg{width:16px;height:16px;stroke:#fff;stroke-width:2.2;fill:none;stroke-linecap:round}
.cs-dl-or{font-size:12px;color:var(--ink4);font-weight:500}
.cs-dl-trial{display:inline-flex;align-items:center;font-family:inherit;font-size:13.5px;font-weight:600;padding:11px 18px;background:var(--w);color:var(--b);border:1.5px solid var(--bdr2);border-radius:10px;cursor:pointer;transition:all .2s;text-decoration:none;white-space:nowrap}
.cs-dl-trial:hover{background:var(--bl);border-color:var(--b)}
.cs-dl-note{font-size:11px;color:var(--ink4);margin-top:8px}
.cs-outcomes{display:flex;flex-direction:column;gap:7px;margin-bottom:6px}
.cs-outcome-item{display:flex;align-items:flex-start;gap:8px;font-size:13px;color:var(--ink3);line-height:1.5}
.cs-oi-dot{width:6px;height:6px;border-radius:50%;background:var(--b);flex-shrink:0;margin-top:5px}
.cs-meta-row{display:flex;gap:7px;flex-wrap:wrap;margin-bottom:8px}
.cs-meta-pill{font-size:11px;font-weight:600;color:var(--ink3);background:var(--bg);border:1px solid var(--bdr);border-radius:6px;padding:3px 10px}
.cs-meta-pill.hi{background:var(--bl);color:var(--b);border-color:var(--bdr2);font-weight:700}
.cs-savings-band{background:linear-gradient(135deg,#4220C8,#2D1490);border-radius:10px;padding:12px 18px;margin:14px 0;display:flex;align-items:center;gap:10px}
.cs-savings-txt{font-size:12.5px;font-weight:700;color:#fff;line-height:1.55}


/* ── MODAL ── */
.cs-modal-bg{display:none;position:fixed;inset:0;background:rgba(10,8,26,.62);z-index:9999;justify-content:center;align-items:flex-start;padding:28px 20px;backdrop-filter:blur(5px);overflow-y:auto}
.cs-modal-bg.open{display:flex}
.cs-modal{background:#fff;border-radius:20px;max-width:800px;width:100%;margin:auto;box-shadow:0 24px 80px rgba(0,0,0,.28);position:relative;animation:csSlide .25s ease}
@keyframes csSlide{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
.cs-modal-img{width:100%;height:240px;object-fit:cover;object-position:center;border-radius:20px 20px 0 0;display:block}
.cs-modal-body{padding:28px 32px 32px}
.cs-modal-chips{display:flex;gap:8px;margin-bottom:12px;flex-wrap:wrap}
.cs-modal-client{font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;color:#4220C8;margin-bottom:7px}
.cs-modal-h{font-size:21px;font-weight:900;letter-spacing:-.6px;color:#0F0C1F;line-height:1.24;margin-bottom:8px}
.cs-modal-tagline{font-size:13.5px;font-style:italic;color:#524D72;line-height:1.7;margin-bottom:20px;border-left:3px solid #E8E4FF;padding-left:12px}
.cs-modal-mets{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:#E8E4FF;border-radius:12px;overflow:hidden;margin-bottom:20px}
.cs-modal-mc{background:#F5F2FF;padding:15px;text-align:center}
.cs-modal-mn{font-size:26px;font-weight:900;letter-spacing:-1px;color:#4220C8;line-height:1}
.cs-modal-ml{font-size:11px;color:#524D72;font-weight:600;margin-top:4px;line-height:1.4}
.cs-savings-band{background:linear-gradient(135deg,#14532d,#166534);border-radius:10px;padding:13px 16px;margin-bottom:18px}
.cs-savings-txt{font-size:13px;font-weight:700;color:#fff;line-height:1.5}
.cs-modal-divider{display:flex;flex-direction:column;gap:12px;margin-bottom:18px}
.cs-modal-block{background:#F8F8FB;border:1px solid #E8E4FF;border-radius:10px;padding:14px 16px}
.cs-modal-lbl{font-size:9px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;color:#4220C8;margin-bottom:5px}
.cs-modal-txt{font-size:13px;color:#524D72;line-height:1.7;margin:0}
.cs-meta-row{display:flex;gap:6px;flex-wrap:wrap;margin-bottom:10px}
.cs-meta-pill{font-size:10px;font-weight:600;padding:3px 10px;border-radius:6px;background:#EEE9FF;color:#524D72;border:1px solid #E8E4FF}
.cs-meta-pill.hi{background:#EEE9FF;color:#4220C8;border-color:#C4B5FD}
.cs-outcomes{display:flex;flex-direction:column;gap:7px;margin-bottom:18px}
.cs-outcome-item{display:flex;align-items:flex-start;gap:8px;font-size:13px;color:#524D72}
.cs-oi-dot{width:7px;height:7px;border-radius:50%;background:#4220C8;flex-shrink:0;margin-top:4px}
.cs-oi-txt{flex:1;line-height:1.55}
.cs-modal-quote{background:#F5F2FF;border-left:3px solid #4220C8;border-radius:0 10px 10px 0;padding:14px 16px;margin-bottom:22px}
.cs-modal-quote p{font-size:13.5px;font-style:italic;color:#27224A;line-height:1.72;margin:0 0 6px}
.cs-modal-quote cite{font-size:11.5px;font-weight:700;color:#4220C8;font-style:normal}
.cs-modal-close{position:absolute;top:14px;right:14px;width:34px;height:34px;border-radius:50%;background:rgba(255,255,255,.95);border:1px solid rgba(0,0,0,.1);display:flex;align-items:center;justify-content:center;cursor:pointer;z-index:10;box-shadow:0 2px 8px rgba(0,0,0,.15)}
.cs-modal-close:hover{background:#EEE9FF}
.cs-modal-close svg{width:15px;height:15px;stroke:#27224A;stroke-width:2.2;fill:none}
/* Download section */
.cs-dl-section{background:linear-gradient(135deg,#F5F2FF,#EEE9FF);border:1.5px solid #C4B5FD;border-radius:14px;padding:22px 24px}
.cs-dl-head{font-size:15px;font-weight:800;color:#0F0C1F;margin-bottom:6px;display:flex;align-items:center;gap:8px}
.cs-dl-head svg{width:18px;height:18px;stroke:#4220C8;stroke-width:2.2;fill:none;flex-shrink:0}
.cs-dl-sub{font-size:12.5px;color:#524D72;line-height:1.6;margin-bottom:14px}
.cs-dl-preview-lbl{font-size:10px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:#4220C8;margin-bottom:8px}
.cs-dl-items{display:flex;flex-direction:column;gap:7px;margin-bottom:18px}
.cs-dl-item{display:flex;align-items:flex-start;gap:8px;font-size:12.5px;color:#27224A}
.cs-dl-item svg{width:14px;height:14px;flex-shrink:0;margin-top:1px}
.cs-dl-actions{display:flex;align-items:center;gap:12px;flex-wrap:wrap}
.cs-dl-btn{display:inline-flex;align-items:center;gap:7px;background:#4220C8;color:#fff;font-weight:700;font-size:13.5px;padding:11px 22px;border-radius:10px;text-decoration:none;transition:all .18s;font-family:inherit}
.cs-dl-btn:hover{background:#2D1490;transform:translateY(-1px)}
.cs-dl-btn svg{width:16px;height:16px;stroke:#fff;stroke-width:2.2;fill:none}
.cs-dl-or{font-size:12px;font-weight:600;color:#9B96B0}
.cs-dl-trial{display:inline-flex;align-items:center;font-size:13px;font-weight:700;color:#4220C8;padding:10px 18px;border:1.5px solid #C4B5FD;border-radius:10px;text-decoration:none;background:#fff;transition:all .18s;font-family:inherit}
.cs-dl-trial:hover{background:#EEE9FF}
.cs-dl-note{font-size:11px;color:#9B96B0;margin-top:10px;text-align:center}

</style>

@endpush

@section('content')

<section class="cs-hero">
  <div class="cs-hero-in">
    <div class="cs-tag"><span class="cs-tag-dot"></span>Customer Success Stories</div>
    <h1>Real Teams. <em> Real Results. </em></h1>
    <p>How organisations replaced manual work, outdated systems, and disconnected tools with one platform that actually delivers measurable outcomes.</p>
    <div class="cs-hero-btns">
      <a href="https://mypasslms.us/login#register" class="btn-a">Start Free for 15 Days</a>
      <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b">Book a Demo</a>
    </div>
    <div class="cs-stats-row">
      <div class="cs-stat"><div class="cs-stat-n">$1.2M</div><div class="cs-stat-l">Certification revenue scaled</div></div>
      <div class="cs-stat"><div class="cs-stat-n">240K+</div><div class="cs-stat-l">Learners on one platform</div></div>
      <div class="cs-stat"><div class="cs-stat-n">113+</div><div class="cs-stat-l">Countries reached</div></div>
      <div class="cs-stat"><div class="cs-stat-n">85–90%</div><div class="cs-stat-l">LMS cost reduction achieved</div></div>
    </div>
  </div>
</section>
<div class="cs-grid-wrap">
  <div class="cs-grid">
    <div class="cs-card-feat" data-case="sbca" data-industry="Associations" onclick="openCase('sbca')">
      <div class="cs-feat-img"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2026/01/mypass-lms-case-study-5-scaled.jpg?fit=2560%2C1707&ssl=1" alt="SBCA" loading="eager"><div class="cs-feat-overlay"></div><div class="cs-feat-chips"><span class="chip-ind">Associations</span><span class="chip-uc">Certification Revenue</span></div></div>
      <div class="cs-feat-body">
        <div class="cs-feat-client">SBCA</div>
        <h2 class="cs-feat-h">How SBCA Scaled Certification Revenue from $100K to $1.2M with MyPass LMS</h2>
        <p class="cs-feat-tag">From a manual certification operation capped at $100K — to 240,000+ learners and $1.2M annually. One platform. Ten years of continuous growth.</p>
        <div class="cs-feat-metrics">
          <div class="cs-feat-mc"><div class="cs-feat-mn">$1.2M</div><div class="cs-feat-ml">Annual certification revenue</div></div>
          <div class="cs-feat-mc"><div class="cs-feat-mn">12×</div><div class="cs-feat-ml">Revenue growth</div></div>
          <div class="cs-feat-mc"><div class="cs-feat-mn">240K+</div><div class="cs-feat-ml">Learners annually</div></div>
        </div>
        <div class="cs-feat-cta" style="cursor:pointer">Read the full story <svg viewBox="0 0 12 12" fill="none" stroke="var(--b)" stroke-width="2.5"><polyline points="3 2 9 6 3 10"/></svg></div>
      </div>
    </div>
    <div class="cs-card" data-case="yfu" data-industry="Nonprofit" onclick="openCase('yfu')">
      <div class="cs-card-img"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2026/01/mypass-lms-case-study-4-scaled.jpg?fit=2560%2C1709&ssl=1" alt="Youth for Understanding" loading="lazy"><div class="cs-card-overlay"></div><div class="cs-card-chips"><span class="chip-ind">Nonprofit</span><span class="chip-uc">Compliance Automation</span></div></div>
      <div class="cs-body">
        <div class="cs-body-client">Youth for Understanding</div>
        <h2 class="cs-body-h">How Youth for Understanding Automated Compliance Training and Eliminated Manual Operations</h2>
        <p class="cs-body-tag">From paper-driven U.S. State Department compliance and spreadsheet chaos — to fully automated, audit-ready training. 600+ admin hours saved every year.</p>
        <div class="cs-metrics">
          <div class="cs-mc"><div class="cs-mn">$40–50K</div><div class="cs-ml">Annual cost savings</div></div>
          <div class="cs-mc"><div class="cs-mn">600+</div><div class="cs-ml">Admin hours saved yearly</div></div>
          <div class="cs-mc"><div class="cs-mn">55%</div><div class="cs-ml">Admin cost reduction</div></div>
        </div>        
      </div>
      <div class="cs-link" style="cursor:pointer">Read the full story <svg viewBox="0 0 12 12" fill="none" stroke="var(--b)" stroke-width="2.5"><polyline points="3 2 9 6 3 10"/></svg></div>
    </div>
    <div class="cs-card" data-case="american-board" data-industry="Professional Certification" onclick="openCase('american-board')">
      <div class="cs-card-img"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2026/01/mypass-lms-case-study-3-scaled.jpg?fit=2560%2C1709&ssl=1" alt="American Board" loading="lazy"><div class="cs-card-overlay"></div><div class="cs-card-chips"><span class="chip-ind">Professional Certification</span><span class="chip-uc">Global Expansion</span></div></div>
      <div class="cs-body">
        <div class="cs-body-client">American Board</div>
        <h2 class="cs-body-h">How American Board Scaled Teacher Certification 3× and Expanded to 113+ Countries</h2>
        <p class="cs-body-tag">From 1,500 learners in 6 states — to 6,000 across 18 states and 113+ countries. Four years on one platform. Zero migrations.</p>
        <div class="cs-metrics">
          <div class="cs-mc"><div class="cs-mn">3×</div><div class="cs-ml">Learner capacity</div></div>
          <div class="cs-mc"><div class="cs-mn">113+</div><div class="cs-ml">Countries reached</div></div>
          <div class="cs-mc"><div class="cs-mn">$60–70K</div><div class="cs-ml">Annual cost savings</div></div>
        </div>        
      </div>
      <div class="cs-link" style="cursor:pointer">Read the full story <svg viewBox="0 0 12 12" fill="none" stroke="var(--b)" stroke-width="2.5"><polyline points="3 2 9 6 3 10"/></svg></div>
    </div>
    <div class="cs-card" data-case="wsp" data-industry="Engineering &amp; Consulting" onclick="openCase('wsp')">
      <div class="cs-card-img"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2026/01/mypass-lms-case-study-2-scaled.jpg?fit=2560%2C1709&ssl=1" alt="WSP Middle East" loading="lazy"><div class="cs-card-overlay"></div><div class="cs-card-chips"><span class="chip-ind">Engineering &amp; Consulting</span><span class="chip-uc">Legacy Migration</span></div></div>
      <div class="cs-body">
        <div class="cs-body-client">WSP Middle East</div>
        <h2 class="cs-body-h">How WSP Replaced a Costly Legacy LMS and Scaled Learning Across 20+ Countries</h2>
        <p class="cs-body-tag">Replaced a $100,000/year internal system. Scaled from 1,000 to 6,000+ users across GCC, Africa, India, and Europe. 85–90% cost reduction.</p>
        <div class="cs-metrics">
          <div class="cs-mc"><div class="cs-mn">85–90%</div><div class="cs-ml">LMS cost reduction</div></div>
          <div class="cs-mc"><div class="cs-mn">6,000+</div><div class="cs-ml">Users across 20+ countries</div></div>
          <div class="cs-mc"><div class="cs-mn">60%+</div><div class="cs-ml">Admin effort saved</div></div>
        </div>        
      </div>
      <div class="cs-link" style="cursor:pointer">Read the full story <svg viewBox="0 0 12 12" fill="none" stroke="var(--b)" stroke-width="2.5"><polyline points="3 2 9 6 3 10"/></svg></div>
    </div>
    <div class="cs-card" data-case="pdk" data-industry="Education &amp; Nonprofit" onclick="openCase('pdk')">
      <div class="cs-card-img"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2026/01/mypass-lms-case-study-1-scaled.jpg?fit=2560%2C1707&ssl=1" alt="PDK International" loading="lazy"><div class="cs-card-overlay"></div><div class="cs-card-chips"><span class="chip-ind">Education &amp; Nonprofit</span><span class="chip-uc">Rapid Deployment</span></div></div>
      <div class="cs-body">
        <div class="cs-body-client">PDK International</div>
        <h2 class="cs-body-h">How Educators Rising Launched a Nationwide Assessment Platform in Weeks on a Non-Profit Budget</h2>
        <p class="cs-body-tag">A brand-new nationwide assessment service — configured, tested, and live within weeks. Non-profit budget. Enterprise-quality platform. 2,000+ users from day one.</p>
        <div class="cs-metrics">
          <div class="cs-mc"><div class="cs-mn">Weeks</div><div class="cs-ml">Time to nationwide launch</div></div>
          <div class="cs-mc"><div class="cs-mn">2,000+</div><div class="cs-ml">Users from day one</div></div>
          <div class="cs-mc"><div class="cs-mn">0</div><div class="cs-ml">Custom dev required</div></div>
        </div>        
      </div>
      <div class="cs-link" style="cursor:pointer">Read the full story <svg viewBox="0 0 12 12" fill="none" stroke="var(--b)" stroke-width="2.5"><polyline points="3 2 9 6 3 10"/></svg></div>
    </div>
  </div>
</div>
<div class="qs-wrap">
  <div class="qs-in">
    <div class="cx"><div class="eyebrow" style="justify-content:center;display:inline-flex;margin-bottom:8px"><span class="ew"></span>In Their Own Words</div><h2 class="heading" style="text-align:center;font-size:30px">What Our Customers Say<br><em>About MyPass LMS</em></h2></div>
    <div class="qs-grid">
      <div class="qs-card"><p class="qs-body">The platform has grown with us every step. Four years in, it still feels like it was built specifically for what we do — and the support has never wavered through any of that growth.</p><div class="qs-author"><div class="qs-av" style="background:linear-gradient(135deg,#1B2A6B,#2D44AA)">SD</div><div><div class="qs-name">Shawn D.</div><div class="qs-role">Founder &amp; Director &middot; American Board &middot; 4-Year Customer</div></div></div></div>
      <div class="qs-card"><p class="qs-body">MyPass LMS is extremely customizable and the team are very supportive in making the LMS your own. Customer support was beyond helpful and available at all hours.</p><div class="qs-author"><div class="qs-av" style="background:linear-gradient(135deg,#2A7A5C,#1D5C45)">AS</div><div><div class="qs-name">Ashleigh</div><div class="qs-role">Senior Career &amp; Learning Partner &middot; WSP Middle East</div></div></div></div>
      <div class="qs-card"><p class="qs-body">The Kprise team has developed and implemented several successful applications critical to our business. Their collaborative and innovative approach has contributed significantly to our positive working relationship.</p><div class="qs-author"><div class="qs-av" style="background:linear-gradient(135deg,#7A4E20,#A06830)">BM</div><div><div class="qs-name">Bill Malloy</div><div class="qs-role">Chief of Staff &middot; Youth for Understanding USA</div></div></div></div>
      <div class="qs-card"><p class="qs-body">We used MyPass LMS for our certification program, and the experience was smooth and efficient. The platform made managing certifications simple, trackable, and easy to scale.</p><div class="qs-author"><div class="qs-av" style="background:linear-gradient(135deg,#C8102E,#9B0C23)">SH</div><div><div class="qs-name">Steve Hill</div><div class="qs-role">SBCA</div></div></div></div>
    </div>
  </div>
</div>
<section class="sec stint">
  <div class="wrap">
    <div class="cx"><div class="eyebrow" style="justify-content:center;display:inline-flex;margin-bottom:8px"><span class="ew"></span>Recognised by Independent Reviewers</div><h2 class="heading" style="text-align:center;font-size:28px">Rated Across Every Major<br><em>Review Platform</em></h2><p class="lead cx">Independent ratings from L&D professionals who evaluated MyPass LMS against the full market.</p></div>
    <div class="badge-row">
      <div class="rbadge"><img src="https://kprise.com/wp-content/uploads/2025/12/1.webp" alt="Capterra Top 20" loading="lazy"></div>
      <div class="rbadge"><img src="https://kprise.com/wp-content/uploads/2025/12/2.webp" alt="GetApp Leader" loading="lazy"></div>
      <div class="rbadge"><img src="https://kprise.com/wp-content/uploads/2025/12/3.webp" alt="Software Advice FrontRunner" loading="lazy"></div>
      <div class="rbadge"><img src="https://kprise.com/wp-content/uploads/2025/12/4.png" alt="Best LMS" loading="lazy"></div>
      <div class="rbadge"><img src="https://brand-assets.capterra.com/badge/65ccdf80-7500-42bf-8e6f-aaa875f7613c.svg" alt="Capterra" loading="lazy"></div>
      <div class="rbadge"><img src="https://brand-assets.getapp.com/badge/f7329061-8cc8-4015-8dbd-9c68980f086d.png" alt="GetApp" loading="lazy"></div>
      <div class="rbadge"><img src="https://brand-assets.softwareadvice.com/badge/6aeb2175-cd8d-4d46-b212-ddd1b623365b.png" alt="Software Advice" loading="lazy"></div>
      <div class="rbadge"><img src="https://www.softwaresuggest.com/award_logo/highly-recommended-winter-2025.png" alt="Highly Recommended" loading="lazy"></div>
      <div class="rbadge"><img src="https://www.softwaresuggest.com/award_logo/best-support-winter-2025.png" alt="Best Support" loading="lazy"></div>
      <div class="rbadge"><img src="https://www.softwareworld.co/customer-choice.png" alt="Customer Choice" loading="lazy"></div>
    </div>
  </div>
</section>




<script>
/* ── Case Study Modal ── */

function closeCase(){
  var bg = document.getElementById('cs-modal-bg');
  bg.classList.remove('open');
  document.body.style.overflow = '';
}

function openCase(id){
  var d = window.CD[id];
  if(!d){ alert('Case data not found: ' + id); return; }

  var html = buildCaseHTML(d);
  var inner = document.getElementById('cs-modal-inner');
  inner.innerHTML = html;

  var bg = document.getElementById('cs-modal-bg');
  bg.classList.add('open');
  document.body.style.overflow = 'hidden';
  inner.scrollTop = 0;
}

function buildCaseHTML(d){
  // helpers
  function chk(){ return '<svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>'; }
  function dl(){ return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>'; }

  // Outcomes
  var outHtml = '';
  if(d.key_outcomes && d.key_outcomes.length){
    d.key_outcomes.forEach(function(o){
      outHtml += '<div class="cs-outcome-item"><div class="cs-oi-dot"></div><div class="cs-oi-txt">' + o + '</div></div>';
    });
  }

  // DL items
  var dlDefault = [
    'Full challenge, solution and result breakdown',
    'Detailed financial and operational impact data',
    'Complete implementation timeline and what was built',
    'Client validation, quotes, and outcome metrics'
  ];
  var dlList = (d.dl_items && d.dl_items.length) ? d.dl_items : dlDefault;
  var dlHtml = '';
  dlList.forEach(function(item){
    dlHtml += '<div class="cs-dl-item">' + chk() + '<span>' + item + '</span></div>';
  });

  // Savings band
  var savings = d.savings
    ? '<div class="cs-savings-band"><div class="cs-savings-txt">' + d.savings + '</div></div>'
    : '';

  // Extra detail
  var extra = d.extra_detail
    ? '<div class="cs-modal-block" style="margin-bottom:12px"><div class="cs-modal-lbl">What Was Built</div><p class="cs-modal-txt">' + d.extra_detail + '</p></div>'
    : '';

  // Meta pills
  var meta = '';
  if(d.users_detail || d.industry_detail){
    meta = '<div class="cs-meta-row">'
      + (d.users_detail ? '<span class="cs-meta-pill hi">' + d.users_detail + '</span>' : '')
      + (d.industry_detail ? '<span class="cs-meta-pill">' + d.industry_detail + '</span>' : '')
      + '</div>';
  }

  // Quote attribution
  var quoteAttr = (d.quote_name || '');

  var out = '';
  out += '<button class="cs-modal-close" onclick="closeCase()">';
  out += '<svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>';
  out += '</button>';

  out += '<img class="cs-modal-img" src="' + d.img + '" alt="' + d.client + '">';

  out += '<div class="cs-modal-body">';

  // Tags
  out += '<div class="cs-modal-chips">';
  out += '<span class="chip-ind">' + d.industry + '</span>';
  out += '<span class="chip-uc">' + d.uc + '</span>';
  out += '</div>';

  out += meta;

  out += '<div class="cs-modal-client">' + (d.full_name || d.client) + '</div>';
  out += '<h2 class="cs-modal-h">' + d.headline + '</h2>';
  out += '<p class="cs-modal-tagline">' + d.tagline + '</p>';

  // Metrics
  out += '<div class="cs-modal-mets">';
  out += '<div class="cs-modal-mc"><div class="cs-modal-mn">' + d.s1n + '</div><div class="cs-modal-ml">' + d.s1l + '</div></div>';
  out += '<div class="cs-modal-mc"><div class="cs-modal-mn">' + d.s2n + '</div><div class="cs-modal-ml">' + d.s2l + '</div></div>';
  out += '<div class="cs-modal-mc"><div class="cs-modal-mn">' + d.s3n + '</div><div class="cs-modal-ml">' + d.s3l + '</div></div>';
  out += '</div>';

  out += savings;

  // CSD blocks
  out += '<div class="cs-modal-divider">';
  out += '<div class="cs-modal-block"><div class="cs-modal-lbl">The Challenge</div><p class="cs-modal-txt">' + d.challenge + '</p></div>';
  out += '<div class="cs-modal-block"><div class="cs-modal-lbl">The Solution</div><p class="cs-modal-txt">' + d.solution + '</p></div>';
  out += '<div class="cs-modal-block"><div class="cs-modal-lbl">The Result</div><p class="cs-modal-txt">' + d.result + '</p></div>';
  out += '</div>';

  out += extra;

  // Outcomes
  if(outHtml){
    out += '<div style="margin-bottom:18px">';
    out += '<div class="cs-modal-lbl" style="margin-bottom:8px">Key Outcomes</div>';
    out += '<div class="cs-outcomes">' + outHtml + '</div>';
    out += '</div>';
  }

  // Quote
  out += '<div class="cs-modal-quote">';
  out += '<p>' + (d.quote || '') + '</p>';
  if(quoteAttr){ out += '<cite>&#8212; ' + quoteAttr + '</cite>'; }
  out += '</div>';

  // Download section
  out += '<div class="cs-dl-section">';
  out += '<div class="cs-dl-head">' + dl() + 'Download the Full Case Study PDF</div>';
  out += '<div class="cs-dl-sub">The complete document includes the detailed implementation breakdown, financial impact data, and full client validation.</div>';
  out += '<div class="cs-dl-preview-lbl">Inside the full case study</div>';
  out += '<div class="cs-dl-items">' + dlHtml + '</div>';
  out += '<div class="cs-dl-actions">';
  out += '<a href="https://calendly.com/onlinesales-kprise/30min" class="cs-dl-btn" target="_blank" rel="noopener">' + dl() + 'Download Full Case Study</a>';
  out += '<div class="cs-dl-or">or</div>';
  out += '<a href="https://mypasslms.us/login#register" class="cs-dl-trial" target="_blank" rel="noopener">Start Free 15-Day Trial</a>';
  out += '</div>';
  out += '<p class="cs-dl-note">Free to download &middot; Includes financial data, implementation details &amp; outcome metrics</p>';
  out += '</div>';

  out += '</div>'; // cs-modal-body

  return out;
}

// Keyboard close
document.addEventListener('keydown', function(e){
  if(e.key === 'Escape'){ closeCase(); }
});
</script>

<div id="cs-modal-bg" class="cs-modal-bg" onclick="if(event.target===this)closeCase()">
  <div class="cs-modal" id="cs-modal-inner"></div>
</div>
@endsection


@push('schema')
@verbatim
  <script>window.CD={"sbca":{img:"https://i0.wp.com/kprise.com/wp-content/uploads/2026/01/mypass-lms-case-study-5-scaled.jpg?fit=2560%2C1707&ssl=1",client:"SBCA",industry:"Associations",uc:"Certification Revenue",headline:"How SBCA Scaled Certification Revenue from $100K to $1.2M with MyPass LMS",tagline:"From a manual certification operation capped at $100K — to 240,000+ learners and $1.2M annually. One platform. Ten years of continuous growth.",s1n:"$1.2M",s1l:"Annual certification revenue",s2n:"12×",s2l:"Revenue growth",s3n:"240K+",s3l:"Learners annually",challenge:"SBCA relied on Excel, Word documents, and a rudimentary in-house LMS. Revenue was capped at $100K. Scaling courses was difficult, audits were time-consuming, and LMS pricing was cost-prohibitive for a nonprofit. Multiple vendors handled learning, payments, and exams with no connection between them.",solution:"MyPass LMS replaced every manual process with a custom certification and exam ecosystem on AWS Cloud. The course catalogue expanded from 3 to 23 programmes. Ecommerce (PayPal), virtual proctoring (Examity), and inbuilt ticketing were integrated into one platform evolving from v1.0 to v6.0 over 10+ years.",result:"Certification revenue grew 12× from $100K to $1.2M annually. Learner volume scaled from 40,000 to 240,000 per year. Non-seat-based pricing reduced cost per learner significantly. Manual admin effort dropped 60%+. Audit-ready records available at all times.",quote:"We used MyPass LMS for our certification program, and the experience was smooth and efficient. The platform made managing certifications simple, trackable, and easy to scale.",quote_name:"Steve Hill, SBCA",full_name:"Satellite Broadcasting &amp; Communications Association (SBCA)",industry_detail:"Nonprofit Industry Association · Satellite Broadcasting",users_detail:"240,000+ learners annually · AWS Cloud · 10+ years",savings:"12× revenue growth &nbsp;&middot;&nbsp; $100K → $1.2M annually &nbsp;&middot;&nbsp; 60%+ admin time saved",extra_detail:"Platform evolved from v1.0 to v6.0 over 10+ years. Course catalogue expanded 7× from 3 to 23 certification programmes. Learner volume scaled from 40,000 to 240,000 annually. AWS multi-phase cloud migration. Ecommerce with PayPal, virtual proctoring with Examity, and inbuilt ticketing — all within one platform.",key_outcomes:["240,000+ learners managed annually \u2014 up from 40,000", "23 certification courses and 7 assessments \u2014 expanded from 3 programmes", "12\u00d7 revenue growth: $100K to $1.2M annually", "60%+ reduction in manual administrative effort", "Audit-ready certification records available at all times", "Non-seat-based LMS pricing significantly reduced cost per learner", "Zero reliance on Excel or manual tracking systems"],dl_items:["12\u00d7 revenue growth breakdown and full financial impact data", "How SBCA scaled from 40K to 240K learners on one platform", "Technical: AWS migration, virtual proctoring, and ecommerce integration", "10-year platform evolution from v1.0 to v6.0", "Cost-per-learner reduction analysis and pricing model comparison", "Complete implementation timeline and every integration built"]},"yfu":{img:"https://i0.wp.com/kprise.com/wp-content/uploads/2026/01/mypass-lms-case-study-4-scaled.jpg?fit=2560%2C1709&ssl=1",client:"Youth for Understanding",industry:"Nonprofit",uc:"Compliance Automation",headline:"How Youth for Understanding Automated Compliance Training and Eliminated Manual Operations",tagline:"From paper-driven U.S. State Department compliance and spreadsheet chaos — to fully automated, audit-ready training. 600+ admin hours saved every year.",s1n:"$40–50K",s1l:"Annual cost savings",s2n:"600+",s2l:"Admin hours saved yearly",s3n:"55%",s3l:"Admin cost reduction",challenge:"YFU had no LMS. Mandatory U.S. State Department ethics and security training was tracked via paper, Word documents, and Excel. Volunteer onboarding, certification renewals, and compliance records were all manual — creating high compliance risk, missing records, and full-time administrative burden that could not scale nationally.",solution:"MyPass LMS was deployed with inbuilt CRM capabilities, integrated ticketing, SSO, and custom integrations with YFU's proprietary systems including a Payezee payment gateway. Legacy courses were converted to SCORM. Automated workflows replaced every Excel-based tracking process completely.",result:"Training administration became fully autonomous. Compliance risk dropped from high to controlled. Estimated $40,000–$50,000 in annual operational cost savings. Admin effort reduced 45–55%. Training administrators saved 600+ hours annually. Excel sheets were completely eliminated from compliance operations.",quote:"The Kprise team has developed and implemented several successful applications critical to YFU's business. Their expertise in IT, combined with a collaborative and innovative approach, has contributed significantly to our positive working relationship.",quote_name:"Bill Malloy, Chief of Staff, Youth for Understanding USA",full_name:"Youth for Understanding (YFU USA)",industry_detail:"International Education &amp; Cultural Exchange · USA",users_detail:"Volunteers, Staff &amp; Members · Nationwide · 50+ Countries",savings:"$40K–$50K annual savings &nbsp;&middot;&nbsp; 600+ hours saved &nbsp;&middot;&nbsp; 45–55% admin cost reduction",extra_detail:"Inbuilt CRM for centralised contact, volunteer, and staff management. Integrated ticketing for issue management. SSO for seamless access. Custom Payezee payment gateway integration. SCORM conversion of all legacy content. Automated enrolment and certification workflows replaced Excel entirely.",key_outcomes:["$40,000\u2013$50,000 in estimated annual operational cost savings", "45\u201355% reduction in annual admin costs", "600+ admin hours saved annually by training administrators", "Automated reporting eliminated weeks of manual audit preparation", "Compliance risk reduced from high to controlled", "Audit-ready records available at any time \u2014 no preparation needed", "Excel sheets completely eliminated from all training operations"],dl_items:["Full financial impact: $40K\u2013$50K annual savings breakdown", "How 600+ admin hours were eliminated through automation", "CRM, SSO, ticketing, and Payezee payment integration details", "Before/after operational workflow comparison with data", "U.S. State Department compliance requirements \u2014 how they were met", "Complete SCORM migration and implementation timeline"]},"american-board":{img:"https://i0.wp.com/kprise.com/wp-content/uploads/2026/01/mypass-lms-case-study-3-scaled.jpg?fit=2560%2C1709&ssl=1",client:"American Board",industry:"Professional Certification",uc:"Global Expansion",headline:"How American Board Scaled Teacher Certification 3× and Expanded to 113+ Countries",tagline:"From 1,500 learners in 6 states — to 6,000 across 18 states and 113+ countries. Four years on one platform. Zero migrations.",s1n:"3×",s1l:"Learner capacity",s2n:"113+",s2l:"Countries reached",s3n:"$60–70K",s3l:"Annual cost savings",challenge:"American Board used legacy Flash-based content and conducted most training in person. Learner capacity was capped at 1,500–2,000 per year. Manual processes handled exam tracking, audits, and performance. Fragmented systems managed learning, payments, and support separately. Growing demand made audits and compliance a major operational bottleneck.",solution:"Custom MyPass LMS on AWS Cloud (multi-region) for global reach. Flash content migrated to SCORM. Pearson integration for virtual and in-person proctoring. Ecommerce with PayPal and First Data. Inbuilt ticketing for learner support. Centralised dashboards connecting courses, exams, performance, and revenue. New tutoring services launched as a revenue line within the LMS.",result:"Learner capacity grew from 1,500 to 5,000–6,000 per year (3× increase). Expanded from 6 to 18 U.S. states and 113+ countries globally. $60,000–$70,000 in annual cost savings. Cost per learner reduced 40–50%. New revenue streams launched. Audit reporting fully automated. Four-year customer relationship — no platform migration ever required.",quote:"We have been a Kprise client for over four years, and the team has constantly been there to support our needs.",quote_name:"Shawn, Founder &amp; Director, American Board",full_name:"American Board for Certification of Teacher Excellence",industry_detail:"Teacher Training &amp; Certification · United States",users_detail:"18 U.S. States · 113+ Countries · AWS Multi-Region · 4+ Years",savings:"$60K–$70K annual savings &nbsp;&middot;&nbsp; 3× learner capacity &nbsp;&middot;&nbsp; 40–50% cost per learner reduction",extra_detail:"All legacy Flash content migrated to SCORM. Multi-region AWS deployment for global learners. Pearson integration for virtual and in-person proctoring. PayPal and First Data ecommerce. Inbuilt ticketing module. New revenue streams — online tutoring services launched directly through MyPass LMS.",key_outcomes:["Learner capacity grew from 1,500 to 5,000\u20136,000 per year \u2014 3\u00d7 increase", "Expanded from 6 U.S. states to 18 states and 113+ countries globally", "$60,000\u2013$70,000 in annual operational cost savings", "Cost per learner reduced by 40\u201350%", "New revenue streams launched: online tutoring via MyPass LMS", "60%+ reduction in manual administrative effort", "Audit-ready reporting automated \u2014 zero manual preparation required"],dl_items:["3\u00d7 learner growth: full capacity and revenue data", "AWS multi-region deployment and Pearson proctoring configuration", "Flash-to-SCORM migration \u2014 complete timeline and methodology", "How new tutoring revenue streams were launched on the LMS", "$60K\u2013$70K annual savings \u2014 detailed cost breakdown", "113-country global expansion: technical and operational details"]},"wsp":{img:"https://i0.wp.com/kprise.com/wp-content/uploads/2026/01/mypass-lms-case-study-2-scaled.jpg?fit=2560%2C1709&ssl=1",client:"WSP Middle East",industry:"Engineering &amp; Consulting",uc:"Legacy Migration",headline:"How WSP Replaced a Costly Legacy LMS and Scaled Learning Across 20+ Countries",tagline:"Replaced a $100,000/year internal system. Scaled from 1,000 to 6,000+ users across GCC, Africa, India, and Europe. 85–90% cost reduction.",s1n:"85–90%",s1l:"LMS cost reduction",s2n:"6,000+",s2l:"Users across 20+ countries",s3n:"60%+",s3l:"Admin effort saved",challenge:"WSP Middle East maintained a legacy in-house LMS at $100,000 per year. It had poor UX, unreliable reporting, high IT dependency, and could not be customised for different countries. Low adoption made it a blocker rather than an enabler — despite the cost, it failed to meet modern learning, compliance, or reporting needs.",solution:"MyPass LMS replaced the legacy system with custom workflows for onboarding, annual compliance, ILT, surveys, and structured learning paths. Country-specific interfaces were configured per GCC nation. Seamless integration with WSP's existing IT environment. Centralised reporting with local flexibility enabled regional teams to operate independently.",result:"Annual LMS costs reduced by 85–90% — from $100,000/year to an affordable modern alternative. Users scaled from 1,000 to 6,000+ across GCC, Africa (8 countries), India, and 14+ European countries over 4 years. Admin effort reduced 60%+. Compliance tracking improved across all regions. Minimal IT dependency for daily operations.",quote:"MyPass LMS is extremely customizable, and the team are very supportive in making the LMS your own. The system is very easy to navigate. Customer support was beyond helpful and available at all hours.",quote_name:"Ashleigh, Senior Career &amp; Learning Partner, UAE",full_name:"WSP",industry_detail:"Engineering &amp; Construction Services · Global Operations",users_detail:"6,000+ Users · 20+ Countries · GCC, Africa, India, Europe",savings:"85–90% LMS cost reduction &nbsp;&middot;&nbsp; $100K/yr legacy replaced &nbsp;&middot;&nbsp; 6,000+ users from 1,000",extra_detail:"Year 1: GCC — 1,000 users across 7 countries. Year 2: Africa — 600 users, 8 countries added. Year 3: India — 600 users. Year 4: Europe — 14+ countries, 4,000+ users. Each region deployed with its own interface and local language configuration — all managed centrally from one console.",key_outcomes:["Annual LMS cost reduced by 85\u201390% \u2014 from $100K/year to affordable modern LMS", "Scaled from 1,000 to 6,000+ users across 20+ countries over 4 years", "Year-by-year expansion: GCC \u2192 Africa \u2192 India \u2192 Europe", "60%+ reduction in LMS administrative effort across all regions", "Country-specific interfaces deployed for each region and language", "Reliable compliance tracking across all countries from one dashboard", "Minimal IT dependency \u2014 daily operations managed without internal dev teams"],dl_items:["85\u201390% cost reduction: full financial comparison and ROI data", "4-year global expansion plan: GCC, Africa, India, Europe breakdown", "Country-specific interface configuration \u2014 technical approach", "Legacy LMS migration methodology and timeline", "6,000-user scale-up: how regional expansion was managed", "Compliance tracking improvement across 20+ countries \u2014 before and after"]},"pdk":{img:"https://i0.wp.com/kprise.com/wp-content/uploads/2026/01/mypass-lms-case-study-1-scaled.jpg?fit=2560%2C1707&ssl=1",client:"PDK International",industry:"Education &amp; Nonprofit",uc:"Rapid Deployment",headline:"How Educators Rising Launched a Nationwide Assessment Platform in Weeks on a Non-Profit Budget",tagline:"A brand-new nationwide assessment service — configured, tested, and live within weeks. Non-profit budget. Enterprise-quality platform. 2,000+ users from day one.",s1n:"Weeks",s1l:"Time to nationwide launch",s2n:"2,000+",s2l:"Users from day one",s3n:"0",s3l:"Custom dev required",challenge:"Educators Rising needed to launch a brand-new nationwide assessment service with tight timelines, non-profit budget constraints, and no existing platform. They required multiple question types, auto and manual grading, scoring, evaluation, and nationwide reporting — all operational from day one across the United States.",solution:"A custom MyPass LMS assessment configuration was purpose-built for Educators Rising's Lesson Assessments service. All question types were supported: single-select, multi-select, text response, and essay. Auto-evaluation for objective questions, manual grading for essays, grade cards, scoring workflows, and question randomisation. Configured, tested, and launched within the tight timeline.",result:"A fully functional nationwide assessment platform went live on time and within budget. 2,000+ users accessed the platform from day one. Assessment creation, delivery, evaluation, and grading were centralised on one platform. The organisation can expand assessments without system changes or additional development costs.",quote:"MyPass LMS gave us exactly what we needed — on our timeline, within our budget, without compromise.",quote_name:"Programme Lead, PDK International",full_name:"PDK International (Educators Rising)",industry_detail:"Education &amp; Non-Profit · United States · Nationwide",users_detail:"2,000+ Initial Users · U.S. Nationwide · Budget-Constrained Launch",savings:"Launched in weeks &nbsp;&middot;&nbsp; Non-profit budget &nbsp;&middot;&nbsp; Zero custom development required",extra_detail:"Supported question types: single-select, multi-select, text response, essay. Auto-evaluation for objective questions, manual grading for essays. Grade cards and scoring workflows. Question and answer randomisation for assessment integrity. Modern UI for students and evaluators. Future-proofed — new assessments added without system changes.",key_outcomes:["Nationwide assessment platform launched on time and within non-profit budget", "2,000+ users active from day one across the United States", "All question types supported: single-select, multi-select, text, essay", "Auto and manual grading workflows unified in one platform", "Zero custom development required \u2014 configured on existing LMS infrastructure", "Question randomisation ensured assessment integrity nationwide", "Scalable for future expansion without additional cost or system changes"],dl_items:["Assessment configuration: all question types and grading workflows", "Launch timeline: from brief to live nationwide platform \u2014 in weeks", "Non-profit budget approach and cost-efficiency breakdown", "How 2,000+ users were onboarded from day one", "Assessment integrity: randomisation, grading controls, and scoring", "Future scalability \u2014 how the platform grows without rework or cost"]}};</script>
@endverbatim
@endpush
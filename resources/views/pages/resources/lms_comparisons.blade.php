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

/* ── LMS COMPARISON PAGE ── */

/* HERO */
.cmp-hero{background:var(--w);border-bottom:1px solid var(--bdr);padding:72px 48px 64px;position:relative;overflow:hidden;text-align:center}
.cmp-hero::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 80% 60% at 50% 0%,var(--bl2),transparent 70%);pointer-events:none}
.cmp-hero-in{max-width:860px;margin:0 auto;position:relative;z-index:1}
.cmp-tag{display:inline-flex;align-items:center;gap:6px;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);background:var(--bl);border:1px solid var(--bdr2);border-radius:100px;padding:4px 14px;margin-bottom:18px}
.cmp-hero h1{font-size:48px;font-weight:900;line-height:1.07;letter-spacing:-2.2px;color:var(--ink);margin-bottom:14px}
.cmp-hero h1 em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent}
.cmp-hero-sub{font-size:17px;color:var(--ink3);line-height:1.7;max-width:600px;margin:0 auto 28px}
.cmp-hero-btns{display:flex;gap:10px;justify-content:center;flex-wrap:wrap}
.cmp-stats{display:flex;align-items:center;justify-content:center;gap:0;margin-top:36px;border:1px solid var(--bdr);border-radius:14px;background:var(--w);overflow:hidden;max-width:700px;margin-left:auto;margin-right:auto}
.cmp-stat{flex:1;padding:18px 16px;text-align:center;border-right:1px solid var(--bdr)}
.cmp-stat:last-child{border-right:none}
.cmp-stat-n{font-size:26px;font-weight:900;letter-spacing:-1px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;line-height:1.1}
.cmp-stat-l{font-size:11px;color:var(--ink4);font-weight:500;margin-top:3px}

/* QUICK NAV */
.cmp-nav{background:var(--w);border-bottom:1px solid var(--bdr);padding:18px 48px;position:sticky;top:64px;z-index:200;backdrop-filter:blur(12px)}
.cmp-nav-in{max-width:1200px;margin:0 auto;display:flex;gap:8px;flex-wrap:wrap;align-items:center}
.cmp-nav-label{font-size:11.5px;font-weight:700;color:var(--ink4);margin-right:4px;flex-shrink:0}
.cmp-nav-pill{font-size:12px;font-weight:600;padding:5px 14px;border-radius:100px;border:1.5px solid var(--bdr);color:var(--ink3);cursor:pointer;transition:all .16s;text-decoration:none;display:inline-block}
.cmp-nav-pill:hover{border-color:var(--bdr2);color:var(--b);background:var(--bl2)}

/* ACCORDION WRAPPER */
.cmp-wrap{max-width:1160px;margin:0 auto;padding:52px 48px 80px}

/* ACCORDION ITEM */
.cmp-item{background:var(--w);border:1px solid var(--bdr);border-radius:20px;margin-bottom:16px;overflow:hidden;transition:all .25s;box-shadow:var(--sh)}
.cmp-item:hover{border-color:var(--bdr2)}
.cmp-item.open{border-color:var(--b);box-shadow:0 0 0 3px var(--bl),var(--sh2)}

/* ACCORDION HEADER */
.cmp-head{display:flex;align-items:center;gap:16px;padding:24px 28px;cursor:pointer;user-select:none}
.cmp-head-icon{width:44px;height:44px;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:13px;font-weight:900;color:#fff;letter-spacing:.02em}
.cmp-head-info{flex:1}
.cmp-head-cat{font-size:10px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--ink4);margin-bottom:3px}
.cmp-head-title{font-size:18px;font-weight:900;color:var(--ink);letter-spacing:-.3px}
.cmp-head-tagline{font-size:13px;color:var(--ink3);margin-top:3px}
.cmp-head-right{display:flex;align-items:center;gap:12px;flex-shrink:0}
.cmp-badge-wins{font-size:11px;font-weight:700;color:var(--ok);background:#DCFCE7;border-radius:100px;padding:4px 12px;white-space:nowrap}
.cmp-chevron{width:32px;height:32px;border-radius:50%;background:var(--bg);border:1px solid var(--bdr);display:flex;align-items:center;justify-content:center;transition:transform .25s}
.cmp-chevron svg{width:14px;height:14px;stroke:var(--ink3);stroke-width:2.5;fill:none}
.cmp-item.open .cmp-chevron{transform:rotate(180deg);background:var(--b);border-color:var(--b)}
.cmp-item.open .cmp-chevron svg{stroke:#fff}

/* ACCORDION BODY */
.cmp-body{display:none;padding:0 28px 28px}
.cmp-item.open .cmp-body{display:block}

/* VERDICT BANNER */
.cmp-verdict{background:var(--bl2);border:1px solid var(--bdr2);border-radius:14px;padding:20px 24px;margin-bottom:24px;display:flex;gap:14px;align-items:flex-start}
.cmp-verdict-icon{width:36px;height:36px;background:var(--b);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px}
.cmp-verdict-icon svg{width:17px;height:17px;stroke:#fff;fill:none;stroke-width:2.2}
.cmp-verdict-text{font-size:14px;color:var(--ink3);line-height:1.72}
.cmp-verdict-text strong{color:var(--ink);font-weight:700}

/* WINS LIST */
.cmp-wins{margin-bottom:24px}
.cmp-wins-label{font-size:10px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);margin-bottom:10px}
.cmp-wins-grid{display:grid;grid-template-columns:1fr 1fr;gap:8px}
.cmp-win-item{display:flex;align-items:flex-start;gap:8px;background:var(--bg);border:1px solid var(--bdr);border-radius:10px;padding:10px 12px;font-size:13px;color:var(--ink3);line-height:1.55}
.cmp-win-item svg{width:14px;height:14px;flex-shrink:0;margin-top:1px}

/* COMPARISON TABLE */
.cmp-table-wrap{border-radius:14px;overflow:hidden;border:1px solid var(--bdr)}
.cmp-table{width:100%;border-collapse:collapse}
.cmp-table thead tr{background:var(--b)}
.cmp-table thead th{padding:14px 16px;font-size:12px;font-weight:800;text-align:left;letter-spacing:.04em;text-transform:uppercase}
.cmp-table thead th:first-child{color:rgba(255,255,255,.6);width:22%}
.cmp-table thead th:nth-child(2){color:#C4B5FD;width:39%}
.cmp-table thead th:nth-child(3){color:rgba(255,255,255,.6);width:39%}
.cmp-table tbody tr:nth-child(even){background:var(--bl2)}
.cmp-table tbody tr:nth-child(odd){background:var(--w)}
.cmp-table tbody tr:hover{background:var(--bl)}
.cmp-table tbody td{padding:12px 16px;font-size:13px;border-bottom:1px solid var(--bdr);vertical-align:top;line-height:1.58}
.cmp-table tbody td:first-child{font-weight:700;color:var(--ink);font-size:12.5px}
.cmp-table tbody td:nth-child(2){color:var(--ink2);font-weight:500}
.cmp-table tbody td:nth-child(3){color:var(--ink4)}
.cmp-table tbody tr.win td:nth-child(2){color:var(--ink);font-weight:600}
.cmp-table tbody tr.win td:nth-child(2)::before{content:'✓ ';color:var(--ok);font-weight:800}
.cmp-table tbody tr.lose td:nth-child(3){color:var(--ink3);font-weight:500}
.cmp-table tbody tr.lose td:nth-child(3)::before{content:'✓ ';color:var(--ok);font-weight:800}
.cmp-table tbody td:nth-child(2) .win-badge{display:inline-block;font-size:9px;font-weight:800;background:var(--ok);color:#fff;border-radius:4px;padding:1px 6px;margin-left:4px;vertical-align:middle;letter-spacing:.04em}
.cmp-table tbody tr:last-child td{border-bottom:none}

/* SWITCH CTA */
.cmp-switch{background:linear-gradient(135deg,var(--b),var(--bm));border-radius:14px;padding:22px 24px;margin-top:20px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:14px}
.cmp-switch-txt{font-size:15px;font-weight:700;color:#fff}
.cmp-switch-sub{font-size:13px;color:rgba(255,255,255,.7);margin-top:3px}
.cmp-switch-btn{display:inline-flex;align-items:center;gap:7px;background:#fff;color:var(--b);font-size:13.5px;font-weight:800;padding:11px 22px;border-radius:10px;transition:all .2s;white-space:nowrap;font-family:inherit}
.cmp-switch-btn:hover{background:var(--bl);transform:translateY(-1px)}

/* FEATURE OVERVIEW */
.feat-overview{background:var(--bg);padding:72px 48px;border-top:1px solid var(--bdr);border-bottom:1px solid var(--bdr)}
.feat-overview-wrap{max-width:1160px;margin:0 auto}
.feat-overview-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:40px}
.fo-card{background:var(--w);border:1px solid var(--bdr);border-radius:16px;padding:22px;transition:all .22s}
.fo-card:hover{border-color:var(--bdr2);box-shadow:var(--sh);transform:translateY(-2px)}
.fo-icon{width:38px;height:38px;background:var(--bl);border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:12px}
.fo-icon svg{width:17px;height:17px;stroke:var(--b);fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}
.fo-name{font-size:13.5px;font-weight:800;color:var(--ink);margin-bottom:5px}
.fo-desc{font-size:12.5px;color:var(--ink3);line-height:1.62}
.fo-badge{display:inline-block;font-size:9.5px;font-weight:800;background:var(--b);color:#fff;border-radius:5px;padding:2px 8px;margin-top:10px;letter-spacing:.04em;text-transform:uppercase}

/* FINAL CTA */
.cmp-cta{background:var(--b);padding:80px 48px;text-align:center;position:relative;overflow:hidden}
.cmp-cta::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 60% 60% at 50% 0%,rgba(255,255,255,.06),transparent 70%)}
.cmp-cta-wrap{max-width:640px;margin:0 auto;position:relative;z-index:1}
.cmp-cta h2{font-size:40px;font-weight:900;letter-spacing:-1.8px;color:#fff;line-height:1.1;margin-bottom:14px}
.cmp-cta h2 em{font-style:normal;color:rgba(255,255,255,.6)}
.cmp-cta p{font-size:16px;color:rgba(255,255,255,.7);line-height:1.7;margin-bottom:30px}
.cmp-cta-btns{display:flex;justify-content:center;gap:12px;flex-wrap:wrap;margin-bottom:14px}
.cmp-cta-note{font-size:12px;color:rgba(255,255,255,.4)}

/* RESPONSIVE */
@media(max-width:1024px){.cmp-wrap,.feat-overview,.cmp-hero,.cmp-cta{padding-left:24px;padding-right:24px}.cmp-wins-grid{grid-template-columns:1fr}.feat-overview-grid{grid-template-columns:1fr 1fr}.cmp-nav{padding:12px 20px}}
@media(max-width:640px){.cmp-hero h1{font-size:34px}.cmp-stats{flex-direction:column;border-radius:12px}.cmp-stat{border-right:none;border-bottom:1px solid var(--bdr)}.cmp-stat:last-child{border-bottom:none}.cmp-head{flex-wrap:wrap;gap:10px}.cmp-head-right{width:100%}.feat-overview-grid{grid-template-columns:1fr}.cmp-table thead th:first-child{display:none}.cmp-table tbody td:first-child{display:none}.cmp-switch{flex-direction:column}}

</style>

@endpush

@section('content')

<section class="cmp-hero">
  <div class="cmp-hero-in">
    <div class="cmp-tag">LMS Comparisons — Researched and Updated 2025</div>
    <h1>MyPass LMS vs<br><em>Every Major Competitor.</em></h1>
    <p class="cmp-hero-sub">Honest, feature-by-feature comparisons across 14 LMS platforms — so you can make a confident decision based on what each platform actually delivers, not marketing claims.</p>
    <div class="cmp-hero-btns">
      <a href="https://mypasslms.us/login#register" class="btn-a" style="font-size:14.5px;padding:13px 26px">Start Free for 15 Days</a>
      <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b" style="font-size:14.5px;padding:12px 22px">Book a Demo</a>
    </div>
    <div class="cmp-stats">
      <div class="cmp-stat"><div class="cmp-stat-n">14</div><div class="cmp-stat-l">Platforms compared</div></div>
      <div class="cmp-stat"><div class="cmp-stat-n">200+</div><div class="cmp-stat-l">Features evaluated</div></div>
      <div class="cmp-stat"><div class="cmp-stat-n">15</div><div class="cmp-stat-l">Days free — no card</div></div>
      <div class="cmp-stat"><div class="cmp-stat-n">Day 1</div><div class="cmp-stat-l">Full platform access</div></div>
    </div>
  </div>
</section>
<div class="cmp-nav">
  <div class="cmp-nav-in">
    <span class="cmp-nav-label">Jump to:</span>
    <a href="#docebo" class="cmp-nav-pill">Docebo</a><a href="#moodle" class="cmp-nav-pill">Moodle</a><a href="#canvas" class="cmp-nav-pill">Canvas (Instructure)</a><a href="#blackboard" class="cmp-nav-pill">Blackboard</a><a href="#cornerstone" class="cmp-nav-pill">Cornerstone OnDemand</a><a href="#litmos" class="cmp-nav-pill">SAP Litmos</a><a href="#talentlms" class="cmp-nav-pill">TalentLMS</a><a href="#absorb" class="cmp-nav-pill">Absorb LMS</a><a href="#learnupon" class="cmp-nav-pill">LearnUpon</a><a href="#totara" class="cmp-nav-pill">Totara Learn</a><a href="#d2l" class="cmp-nav-pill">D2L Brightspace</a><a href="#360learning" class="cmp-nav-pill">360Learning</a><a href="#ispring" class="cmp-nav-pill">iSpring Learn</a><a href="#skool" class="cmp-nav-pill">Skool</a>
  </div>
</div>
<section class="feat-overview">
  <div class="feat-overview-wrap">
    <div class="eyebrow"><span class="ew"></span>What Only MyPass LMS Offers</div>
    <h2 class="heading" style="font-size:32px">The Features That Set Us Apart<br><em>Across Every Comparison.</em></h2>
    <p class="lead" style="max-width:580px">These are the capabilities that appear as advantages in every single comparison below — because no other platform on this page offers all of them together on every plan.</p>
    <div class="feat-overview-grid">
    <div class="fo-card">
      <div class="fo-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19V6l12-3v13M6 18c0 1.1-1.34 2-3 2s-3-.9-3-2 1.34-2 3-2 3 .9 3 2z"/></svg></div>
      <div class="fo-name">Agentic AI</div>
      <div class="fo-desc">AI that executes full training workflows from a prompt — builds courses, schedules ILT, generates reports — not just recommendations.</div>
      <div class="fo-badge">Unique to MyPass</div>
    </div>
    <div class="fo-card">
      <div class="fo-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/></svg></div>
      <div class="fo-name">SCORM Conversion</div>
      <div class="fo-desc">Upload any PPT, PDF, or video. MyPass AI converts it to a SCORM-compliant course automatically — no authoring tool, no third-party software.</div>
      <div class="fo-badge">Built in</div>
    </div>
    <div class="fo-card">
      <div class="fo-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/></svg></div>
      <div class="fo-name">AI Survey Builder</div>
      <div class="fo-desc">Generate structured feedback forms and assessment surveys from a plain-language description. Deployed in minutes.</div>
      <div class="fo-badge">AI powered</div>
    </div>
    <div class="fo-card">
      <div class="fo-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1l3 6.5L22 8.7l-5 5 1.18 7L12 17.77 5.82 20.7 7 13.7l-5-5 6.82-1.2z"/></svg></div>
      <div class="fo-name">Credit-Based Pricing</div>
      <div class="fo-desc">Pay only for learners who actually log in and engage. Idle accounts are billed at zero — not possible on any per-seat LMS.</div>
      <div class="fo-badge">No seat fees</div>
    </div>
    <div class="fo-card">
      <div class="fo-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M23 21v-2a4 4 0 00-3-3.87"/></svg></div>
      <div class="fo-name">AMS Integration</div>
      <div class="fo-desc">Real-time bidirectional sync with iMIS, MemberClicks, GrowthZone, and 7 other AMS platforms. Enrolments fire automatically.</div>
      <div class="fo-badge">8 platforms</div>
    </div>
    <div class="fo-card">
      <div class="fo-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 13.5V7a2 2 0 012-2h16a2 2 0 012 2v8"/></svg></div>
      <div class="fo-name">AI Exam Proctoring</div>
      <div class="fo-desc">Webcam gating, real-time AI object detection, and LLM Vision verification — native toggle per assessment. From $0 per exam.</div>
      <div class="fo-badge">3 tiers</div>
    </div>
    <div class="fo-card">
      <div class="fo-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
      <div class="fo-name">Enterprise DRM</div>
      <div class="fo-desc">Device-level access control, content watermarking, protected PDF delivery, and encryption — built in, not a bolt-on.</div>
      <div class="fo-badge">Built in</div>
    </div>
    <div class="fo-card">
      <div class="fo-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 016.5 17H20M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/></svg></div>
      <div class="fo-name">OpenSesame Catalog</div>
      <div class="fo-desc">50,000+ industry courses natively connected and assignable — compliance, safety, leadership, and technical training on demand.</div>
      <div class="fo-badge">50K+ courses</div>
    </div>
    <div class="fo-card">
      <div class="fo-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 5h12M9 3v2m1.048 9.5A18 18 0 016.4 9"/></svg></div>
      <div class="fo-name">Multilingual AI</div>
      <div class="fo-desc">Create once, translate automatically into multiple languages via AI — SCORM packages generated per language without rebuilding.</div>
      <div class="fo-badge">AI powered</div>
    </div></div>
  </div>
</section>
<div class="cmp-wrap">
  <div class="eyebrow" style="margin-bottom:8px"><span class="ew"></span>14 Platform Comparisons</div>
  <h2 class="heading" style="font-size:32px;margin-bottom:6px">Click Any Competitor<br><em>to See the Full Breakdown.</em></h2>
  <p class="lead" style="max-width:560px;margin-bottom:36px">Each panel expands to show a complete feature-by-feature table, a verdict, and the specific reasons teams switch to MyPass LMS from that platform.</p>
  <div class="cmp-item" id="docebo">
  <div class="cmp-head" onclick="toggleComp(this)">
    <div class="cmp-head-icon" style="background:#1B4FE4">VS</div>
    <div class="cmp-head-info">
      <div class="cmp-head-cat">Enterprise LMS</div>
      <div class="cmp-head-title">MyPass LMS vs Docebo</div>
      <div class="cmp-head-tagline">AI that recommends vs AI that executes.</div>
    </div>
    <div class="cmp-head-right">
      <div class="cmp-badge-wins">MyPass wins on 9 features</div>
      <div class="cmp-chevron"><svg viewBox="0 0 14 14"><path d="M3 5l4 4 4-4"/></svg></div>
    </div>
  </div>
  <div class="cmp-body">
    <div class="cmp-verdict">
      <div class="cmp-verdict-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
      <div class="cmp-verdict-text">Docebo is an enterprise-grade LMS with strong AI-powered recommendations and a wide integration ecosystem. The fundamental gap: Docebo AI suggests what to do. MyPass LMS Agentic AI does it — building courses, automating workflows, and generating reports from a single prompt without any admin intervention.</div>
    </div>
    <div class="cmp-wins">
      <div class="cmp-wins-label">Why teams choose MyPass LMS over Docebo</div>
      <div class="cmp-wins-grid"><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Built-in SCORM conversion from PPT/PDF/Video — no authoring tool needed</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Agentic AI executes tasks instead of just recommending them</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Credit-based pricing — idle accounts billed $0 vs per-user subscription</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Integrated help centre with ticketing built into the platform</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>OpenSesame catalog natively connected on every plan</span></div></div>
    </div>
    <div class="cmp-table-wrap">
      <table class="cmp-table">
        <thead>
          <tr>
            <th>Feature</th>
            <th>MyPass LMS</th>
            <th>Docebo</th>
          </tr>
        </thead>
        <tbody><tr class="win"><td>Agentic AI</td><td>Yes — executes tasks: create courses, automate workflows, reports</td><td>AI guidance and recommendations only; no autonomous execution</td></tr><tr class="win"><td>SCORM Conversion</td><td>Native PPT/PDF/Video → SCORM built in; no external tool</td><td>SCORM/xAPI import only; no native file-to-SCORM conversion</td></tr><tr class="win"><td>AI Content Creation</td><td>Full prompt-to-course: modules, quizzes, media — no external tool</td><td>AI personalisation and recommendations; limited course builder</td></tr><tr class="win"><td>ILT Management</td><td>Built-in workflows: scheduling, attendance, virtual + in-person</td><td>ILT supported but often requires integrations or add-ons</td></tr><tr class="win"><td>Survey Engine</td><td>AI generates surveys from plain-language prompts</td><td>Survey tools available; no AI survey generator</td></tr><tr class="win"><td>OpenSesame</td><td>Native integration + premium catalog on all plans</td><td>No native OpenSesame; relies on third-party connectors</td></tr><tr class="win"><td>Pricing Model</td><td>Credit-based — active users only; idle accounts at $0</td><td>Per-user subscription — full roster billed always</td></tr><tr class="win"><td>Help Centre</td><td>Built-in video walkthroughs + support ticketing</td><td>External support portal only; not in-app</td></tr><tr class="win"><td>Assessment Engine</td><td>Full engine: pools, randomisation, cooldowns, multiple types</td><td>SCORM assessments; advanced features via extensions</td></tr><tr><td>Reporting & Analytics</td><td>Real-time dashboards + Agentic AI insights</td><td>Strong BI-integrated analytics; AI insights for KPIs</td></tr><tr><td>Learning Paths</td><td>Structured, prerequisite-based, auto-progression</td><td>Adaptive pathways with AI recommendations</td></tr><tr><td>Enterprise Scale</td><td>Multi-tenant portals, RBAC, SSO/SCIM</td><td>Enterprise-grade; scalable; audience segmentation</td></tr><tr><td>Integrations</td><td>OpenSesame, Zoom, Teams, HRIS, Zapier, API, LTI</td><td>400+ integrations — HRIS, CRM, messaging, BI tools</td></tr><tr><td>Security</td><td>Audit logs, enterprise controls, GDPR-ready</td><td>ISO 27001, SOC 2/3, GDPR compliant</td></tr></tbody>
      </table>
    </div>
    <div class="cmp-switch">
      <div>
        <div class="cmp-switch-txt">Ready to switch from Docebo?</div>
        <div class="cmp-switch-sub">Migration support included. Live in days, not months.</div>
      </div>
      <a href="https://mypasslms.us/login#register" class="cmp-switch-btn"><svg viewBox="0 0 16 16" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Start Free Trial</a>
    </div>
  </div>
</div>
<div class="cmp-item" id="moodle">
  <div class="cmp-head" onclick="toggleComp(this)">
    <div class="cmp-head-icon" style="background:#F98012">VS</div>
    <div class="cmp-head-info">
      <div class="cmp-head-cat">Open-Source LMS</div>
      <div class="cmp-head-title">MyPass LMS vs Moodle</div>
      <div class="cmp-head-tagline">Cloud-native automation vs plugin-dependent administration.</div>
    </div>
    <div class="cmp-head-right">
      <div class="cmp-badge-wins">MyPass wins on 10 features</div>
      <div class="cmp-chevron"><svg viewBox="0 0 14 14"><path d="M3 5l4 4 4-4"/></svg></div>
    </div>
  </div>
  <div class="cmp-body">
    <div class="cmp-verdict">
      <div class="cmp-verdict-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
      <div class="cmp-verdict-text">Moodle is the world's most widely deployed open-source LMS — flexible, community-backed, and free to use. The real cost is invisible: constant admin overhead, plugin dependencies, infrastructure maintenance, and zero native AI. MyPass LMS replaces the manual configuration model with built-in Agentic AI and fully managed hosting.</div>
    </div>
    <div class="cmp-wins">
      <div class="cmp-wins-label">Why teams choose MyPass LMS over Moodle</div>
      <div class="cmp-wins-grid"><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Zero plugin dependency — every feature is native, not bolted on</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Fully managed SaaS — zero infrastructure, hosting, or IT burden</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Agentic AI replaces manual admin setup with autonomous execution</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Multi-tenant portals built in — no separate Totara instance needed</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Built-in help centre with ticketing — Moodle relies on community forums</span></div></div>
    </div>
    <div class="cmp-table-wrap">
      <table class="cmp-table">
        <thead>
          <tr>
            <th>Feature</th>
            <th>MyPass LMS</th>
            <th>Moodle</th>
          </tr>
        </thead>
        <tbody><tr class="win"><td>Hosting & Maintenance</td><td>Fully managed SaaS — zero infrastructure burden</td><td>Self-hosted; infrastructure, updates, and upkeep required</td></tr><tr class="win"><td>Agentic AI</td><td>Yes — executes: build courses, schedule, automate workflows</td><td>No agentic AI; optional plugins only</td></tr><tr class="win"><td>AI Content Creation</td><td>AI builds courses and quizzes from prompts natively</td><td>No native AI assistant; depends on plugins or external tools</td></tr><tr class="win"><td>SCORM Conversion</td><td>Native PPT/PDF/Video → SCORM auto-conversion</td><td>No native conversion; external authoring tools required</td></tr><tr class="win"><td>Multi-tenant Support</td><td>Built-in multi-tenant portals, branding, RBAC</td><td>Not native; requires Totara or separate Moodle instances</td></tr><tr class="win"><td>Help Centre</td><td>Built-in walkthroughs + support ticketing</td><td>Moodle Docs and community forums; not in-app</td></tr><tr class="win"><td>Survey Engine</td><td>AI-generated and manual surveys built in</td><td>Survey activity available but manual; no AI generator</td></tr><tr class="win"><td>Setup Speed</td><td>Live from day one — no configuration required</td><td>Significant admin and developer setup time required</td></tr><tr class="win"><td>ILT Management</td><td>Built-in ILT workflows with attendance tracking</td><td>ILT via plugins or add-ons only</td></tr><tr class="win"><td>OpenSesame</td><td>Full integration + premium catalog</td><td>No native integration; custom connectors required</td></tr><tr><td>Assessment Engine</td><td>Advanced engine: pools, randomisation, cool-off logic</td><td>Strong academic assessments; advanced features via plugins</td></tr><tr class="lose"><td>Community & Plugins</td><td>Managed platform; no plugin maintenance</td><td>Largest open-source LMS community; vast plugin library</td></tr><tr class="lose"><td>Customisation Depth</td><td>Branded portals via admin console</td><td>Deep code-level customisation for technical teams</td></tr></tbody>
      </table>
    </div>
    <div class="cmp-switch">
      <div>
        <div class="cmp-switch-txt">Ready to switch from Moodle?</div>
        <div class="cmp-switch-sub">Migration support included. Live in days, not months.</div>
      </div>
      <a href="https://mypasslms.us/login#register" class="cmp-switch-btn"><svg viewBox="0 0 16 16" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Start Free Trial</a>
    </div>
  </div>
</div>
<div class="cmp-item" id="canvas">
  <div class="cmp-head" onclick="toggleComp(this)">
    <div class="cmp-head-icon" style="background:#E43B2C">VS</div>
    <div class="cmp-head-info">
      <div class="cmp-head-cat">Academic LMS</div>
      <div class="cmp-head-title">MyPass LMS vs Canvas (Instructure)</div>
      <div class="cmp-head-tagline">Built for business, not a classroom.</div>
    </div>
    <div class="cmp-head-right">
      <div class="cmp-badge-wins">MyPass wins on 8 features</div>
      <div class="cmp-chevron"><svg viewBox="0 0 14 14"><path d="M3 5l4 4 4-4"/></svg></div>
    </div>
  </div>
  <div class="cmp-body">
    <div class="cmp-verdict">
      <div class="cmp-verdict-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
      <div class="cmp-verdict-text">Canvas is the gold standard for higher education. For corporate L&D, compliance management, and business training, MyPass LMS is the purpose-built alternative — with Agentic AI, ILT workflows, eCommerce, and compliance automation that Canvas was never designed to deliver at scale.</div>
    </div>
    <div class="cmp-wins">
      <div class="cmp-wins-label">Why teams choose MyPass LMS over Canvas (Instructure)</div>
      <div class="cmp-wins-grid"><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Purpose-built for corporate L&D and compliance — Canvas is academic-first</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Built-in eCommerce and course monetisation — not available in Canvas</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Agentic AI executes corporate L&D tasks — Canvas has no agentic capability</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>ILT management with enterprise scheduling and attendance built in</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Active user pricing vs institutional per-seat subscription</span></div></div>
    </div>
    <div class="cmp-table-wrap">
      <table class="cmp-table">
        <thead>
          <tr>
            <th>Feature</th>
            <th>MyPass LMS</th>
            <th>Canvas (Instructure)</th>
          </tr>
        </thead>
        <tbody><tr class="win"><td>Primary Use Case</td><td>Corporate L&D, compliance, associations, enterprise</td><td>Education (K-12, higher ed) — academic workflows</td></tr><tr class="win"><td>Agentic AI</td><td>Yes — creates courses, schedules, reports autonomously</td><td>No agentic AI; AI usage limited in base product</td></tr><tr class="win"><td>AI Content Creation</td><td>AI generates modules + quizzes from prompts; no external tools</td><td>No native AI course authoring; manual or external tools only</td></tr><tr class="win"><td>ILT Management</td><td>Full ILT: scheduling, attendance, virtual/in-person built in</td><td>ILT not core; Canvas centres on async online learning</td></tr><tr class="win"><td>Certificates</td><td>Upload or design templates; automated dynamic issuance</td><td>Not core — requires additional modules or custom work</td></tr><tr class="win"><td>eCommerce</td><td>Built-in credit model and course monetisation</td><td>Not a commerce platform; monetisation via external tools</td></tr><tr class="win"><td>SCORM Conversion</td><td>Native PPT/PDF/Video → SCORM auto-conversion</td><td>SCORM support; admin enablement required; no auto-conversion</td></tr><tr class="win"><td>Pricing Model</td><td>Credit-based — active users only billed</td><td>Institutional subscription pricing; no credit model</td></tr><tr><td>OpenSesame</td><td>Native integration + premium catalog</td><td>No native OpenSesame; LTI ecosystem of 600+ partners instead</td></tr><tr><td>Assessment Engine</td><td>Advanced engine for corporate scenarios</td><td>Robust academic assessments with SpeedGrader</td></tr><tr><td>Mobile</td><td>Responsive UI + mobile app + offline capability</td><td>Native iOS/Android apps with responsive design</td></tr><tr class="lose"><td>LTI Ecosystem</td><td>Zoom, Teams, HRIS, Zapier, LTI, API</td><td>600+ LTI partners: Google, Teams, Zoom, and more</td></tr></tbody>
      </table>
    </div>
    <div class="cmp-switch">
      <div>
        <div class="cmp-switch-txt">Ready to switch from Canvas (Instructure)?</div>
        <div class="cmp-switch-sub">Migration support included. Live in days, not months.</div>
      </div>
      <a href="https://mypasslms.us/login#register" class="cmp-switch-btn"><svg viewBox="0 0 16 16" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Start Free Trial</a>
    </div>
  </div>
</div>
<div class="cmp-item" id="blackboard">
  <div class="cmp-head" onclick="toggleComp(this)">
    <div class="cmp-head-icon" style="background:#CC1F00">VS</div>
    <div class="cmp-head-info">
      <div class="cmp-head-cat">Academic LMS</div>
      <div class="cmp-head-title">MyPass LMS vs Blackboard (Anthology)</div>
      <div class="cmp-head-tagline">Corporate automation vs academic architecture.</div>
    </div>
    <div class="cmp-head-right">
      <div class="cmp-badge-wins">MyPass wins on 10 features</div>
      <div class="cmp-chevron"><svg viewBox="0 0 14 14"><path d="M3 5l4 4 4-4"/></svg></div>
    </div>
  </div>
  <div class="cmp-body">
    <div class="cmp-verdict">
      <div class="cmp-verdict-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
      <div class="cmp-verdict-text">Blackboard is deeply embedded in higher education with a rich academic feature set. For organisations that need corporate training automation, compliance management, and Agentic AI execution, MyPass LMS is the purpose-built alternative — without the academic overhead and complex institutional licensing.</div>
    </div>
    <div class="cmp-wins">
      <div class="cmp-wins-label">Why teams choose MyPass LMS over Blackboard (Anthology)</div>
      <div class="cmp-wins-grid"><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Agentic AI executes corporate tasks — Blackboard has no equivalent</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Built-in ILT with enterprise scheduling — not bolted on</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Native eCommerce and course monetisation included</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Credit-based pricing vs complex institutional licensing contracts</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Active user model — idle accounts cost nothing</span></div></div>
    </div>
    <div class="cmp-table-wrap">
      <table class="cmp-table">
        <thead>
          <tr>
            <th>Feature</th>
            <th>MyPass LMS</th>
            <th>Blackboard (Anthology)</th>
          </tr>
        </thead>
        <tbody><tr class="win"><td>Primary Use Case</td><td>Corporate L&D, compliance, enterprise, associations</td><td>Academic institutions — higher ed, K-12</td></tr><tr class="win"><td>Agentic AI</td><td>Yes — executes: create courses, schedule, automate, report</td><td>Some generative AI features; no autonomous task execution</td></tr><tr class="win"><td>AI Content Creation</td><td>Prompt-to-course: modules, quizzes, media — no external tool</td><td>AI features limited; no prompt-to-course authoring engine</td></tr><tr class="win"><td>SCORM Conversion</td><td>Native PPT/PDF/Video → SCORM auto-conversion</td><td>SCORM/AICC support; no native auto-conversion from files</td></tr><tr class="win"><td>Certificates</td><td>Upload or design templates; automated issuance</td><td>Certificates typically via add-ons or custom solutions</td></tr><tr class="win"><td>eCommerce</td><td>Built-in credit model + course monetisation</td><td>Not focused on eCommerce; integration required</td></tr><tr class="win"><td>Help Centre</td><td>Built-in walkthroughs (text/video) + ticketing</td><td>External portals; documentation separate from LMS UI</td></tr><tr class="win"><td>Survey Engine</td><td>AI generates surveys from prompts; manual mode available</td><td>Surveys and feedback tools exist; no AI survey generation</td></tr><tr class="win"><td>Pricing</td><td>Credit-based — active users only at $0 when idle</td><td>Commercial licensing via institutional contracts</td></tr><tr class="win"><td>ILT Management</td><td>Built-in workflows: scheduling, attendance, virtual/in-person</td><td>Enterprise scheduling may need third-party tools</td></tr><tr><td>Assessment Engine</td><td>Advanced: pools, rubrics, randomisation, cool-off logic</td><td>Advanced academic assessments with gradebook integration</td></tr><tr class="lose"><td>Academic Grading</td><td>Corporate-focused grading and feedback workflows</td><td>SpeedGrader, rubrics, plagiarism detection built in</td></tr></tbody>
      </table>
    </div>
    <div class="cmp-switch">
      <div>
        <div class="cmp-switch-txt">Ready to switch from Blackboard (Anthology)?</div>
        <div class="cmp-switch-sub">Migration support included. Live in days, not months.</div>
      </div>
      <a href="https://mypasslms.us/login#register" class="cmp-switch-btn"><svg viewBox="0 0 16 16" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Start Free Trial</a>
    </div>
  </div>
</div>
<div class="cmp-item" id="cornerstone">
  <div class="cmp-head" onclick="toggleComp(this)">
    <div class="cmp-head-icon" style="background:#FD6700">VS</div>
    <div class="cmp-head-info">
      <div class="cmp-head-cat">Talent & Learning Suite</div>
      <div class="cmp-head-title">MyPass LMS vs Cornerstone OnDemand</div>
      <div class="cmp-head-tagline">Focused LMS vs sprawling talent management suite.</div>
    </div>
    <div class="cmp-head-right">
      <div class="cmp-badge-wins">MyPass wins on 8 features</div>
      <div class="cmp-chevron"><svg viewBox="0 0 14 14"><path d="M3 5l4 4 4-4"/></svg></div>
    </div>
  </div>
  <div class="cmp-body">
    <div class="cmp-verdict">
      <div class="cmp-verdict-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
      <div class="cmp-verdict-text">Cornerstone OnDemand is a comprehensive talent management platform built for large global enterprises. MyPass LMS delivers comparable learning outcomes at significantly lower cost and complexity — with Agentic AI that executes rather than just recommends, and pricing that scales with actual engagement not seat count.</div>
    </div>
    <div class="cmp-wins">
      <div class="cmp-wins-label">Why teams choose MyPass LMS over Cornerstone OnDemand</div>
      <div class="cmp-wins-grid"><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Agentic AI executes workflows — Cornerstone AI recommends but does not act</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Built-in SCORM conversion — no external authoring tools needed</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Credit-based pricing vs custom enterprise contract pricing</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Faster implementation — live in days, not months</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>OpenSesame natively integrated on all plans</span></div></div>
    </div>
    <div class="cmp-table-wrap">
      <table class="cmp-table">
        <thead>
          <tr>
            <th>Feature</th>
            <th>MyPass LMS</th>
            <th>Cornerstone OnDemand</th>
          </tr>
        </thead>
        <tbody><tr class="win"><td>Agentic AI</td><td>Yes — executes training workflows autonomously from prompts</td><td>AI for recommendations and adaptive experiences; not task-executing</td></tr><tr class="win"><td>SCORM Conversion</td><td>Native PPT/PDF/Video → SCORM auto-conversion</td><td>SCORM support for uploads; no native auto-conversion</td></tr><tr class="win"><td>OpenSesame</td><td>Native integration + premium catalog</td><td>No native OpenSesame; broader enterprise HRIS/CRM integrations</td></tr><tr class="win"><td>Survey Engine</td><td>AI generates surveys from prompts</td><td>Traditional survey tools; no AI-generated survey builder</td></tr><tr class="win"><td>Help Centre</td><td>Built-in walkthroughs + support ticketing</td><td>Support via external portals; not in-app</td></tr><tr class="win"><td>Pricing</td><td>Credit-based — pay for engagement not seats</td><td>Custom subscription contracts; no credit model</td></tr><tr class="win"><td>Implementation</td><td>Live in days — guided onboarding included</td><td>Complex enterprise implementation; months typical</td></tr><tr class="win"><td>AI Content Creation</td><td>Prompt-to-course generation natively</td><td>Content recommendations and adaptive suggestions only</td></tr><tr><td>Learning Paths</td><td>Structured, prerequisite-based, auto-progression</td><td>Personalised and adaptive paths driven by AI recommendations</td></tr><tr><td>Enterprise Scale</td><td>Multi-tenant portals, RBAC, SSO/SCIM</td><td>Enterprise scaling with extended enterprise options</td></tr><tr class="lose"><td>Talent Management</td><td>LMS-focused with deep training automation</td><td>Unified talent and learning suite: LMS + performance + skills</td></tr><tr class="lose"><td>HCM Integration</td><td>HRIS connectors, BambooHR, TalentHR, API</td><td>Deep integrations: Workday, SAP, Oracle, major HCM platforms</td></tr></tbody>
      </table>
    </div>
    <div class="cmp-switch">
      <div>
        <div class="cmp-switch-txt">Ready to switch from Cornerstone OnDemand?</div>
        <div class="cmp-switch-sub">Migration support included. Live in days, not months.</div>
      </div>
      <a href="https://mypasslms.us/login#register" class="cmp-switch-btn"><svg viewBox="0 0 16 16" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Start Free Trial</a>
    </div>
  </div>
</div>
<div class="cmp-item" id="litmos">
  <div class="cmp-head" onclick="toggleComp(this)">
    <div class="cmp-head-icon" style="background:#0070F2">VS</div>
    <div class="cmp-head-info">
      <div class="cmp-head-cat">Corporate LMS</div>
      <div class="cmp-head-title">MyPass LMS vs SAP Litmos</div>
      <div class="cmp-head-tagline">Agentic AI vs rule-based automation.</div>
    </div>
    <div class="cmp-head-right">
      <div class="cmp-badge-wins">MyPass wins on 8 features</div>
      <div class="cmp-chevron"><svg viewBox="0 0 14 14"><path d="M3 5l4 4 4-4"/></svg></div>
    </div>
  </div>
  <div class="cmp-body">
    <div class="cmp-verdict">
      <div class="cmp-verdict-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
      <div class="cmp-verdict-text">SAP Litmos delivers solid corporate training with good SAP ecosystem fit and a clean authoring experience. The gap is AI depth — Litmos offers suggestions and rule-based automation while MyPass LMS deploys Agentic AI that independently executes full training workflows, creates courses from prompts, and generates surveys on command.</div>
    </div>
    <div class="cmp-wins">
      <div class="cmp-wins-label">Why teams choose MyPass LMS over SAP Litmos</div>
      <div class="cmp-wins-grid"><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Agentic AI executes full workflows — Litmos AI suggests but does not act</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Native SCORM conversion from files — Litmos requires an authoring tool</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>OpenSesame catalog natively integrated on all plans</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>AI-generated surveys from plain-language prompts</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Credit-based pricing — Litmos charges per registered user</span></div></div>
    </div>
    <div class="cmp-table-wrap">
      <table class="cmp-table">
        <thead>
          <tr>
            <th>Feature</th>
            <th>MyPass LMS</th>
            <th>SAP Litmos</th>
          </tr>
        </thead>
        <tbody><tr class="win"><td>Agentic AI</td><td>Yes — creates courses, schedules, automates, reports independently</td><td>AI for content suggestions and simple automation; not agentic</td></tr><tr class="win"><td>SCORM Conversion</td><td>Native PPT/PDF/Video → SCORM without external tools</td><td>Built-in drag-and-drop authoring; no auto-conversion from files</td></tr><tr class="win"><td>AI Content Creation</td><td>Full prompt-to-course: modules, quizzes, media</td><td>AI-assisted authoring; not full prompt-to-SCORM generation</td></tr><tr class="win"><td>OpenSesame</td><td>Native integration + premium catalog</td><td>No native OpenSesame; HRIS, CRM, Salesforce integrations</td></tr><tr class="win"><td>Survey Engine</td><td>AI generates surveys from topic prompts</td><td>Survey creation supported; no AI-generated surveys</td></tr><tr class="win"><td>Pricing</td><td>Credit-based — idle users cost nothing</td><td>User-based subscription; full roster billed</td></tr><tr class="win"><td>Essay Grading</td><td>Manual + AI-assisted grading with feedback workflows</td><td>Free-text responses supported; advanced grading limited</td></tr><tr class="win"><td>Help Centre</td><td>Built-in video/text walkthroughs + support ticketing</td><td>Documentation and external portals; not fully in-app</td></tr><tr><td>ILT Management</td><td>Built-in ILT with scheduling and attendance</td><td>ILT/vILT supported with scheduling and virtual classrooms</td></tr><tr><td>Mobile</td><td>Responsive UI + mobile app + offline support</td><td>Mobile-friendly apps with learning functionality</td></tr><tr class="lose"><td>SAP Ecosystem</td><td>API and standard HRIS integrations</td><td>Deep SAP SuccessFactors and SAP enterprise integration</td></tr></tbody>
      </table>
    </div>
    <div class="cmp-switch">
      <div>
        <div class="cmp-switch-txt">Ready to switch from SAP Litmos?</div>
        <div class="cmp-switch-sub">Migration support included. Live in days, not months.</div>
      </div>
      <a href="https://mypasslms.us/login#register" class="cmp-switch-btn"><svg viewBox="0 0 16 16" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Start Free Trial</a>
    </div>
  </div>
</div>
<div class="cmp-item" id="talentlms">
  <div class="cmp-head" onclick="toggleComp(this)">
    <div class="cmp-head-icon" style="background:#3B82F6">VS</div>
    <div class="cmp-head-info">
      <div class="cmp-head-cat">SMB LMS</div>
      <div class="cmp-head-title">MyPass LMS vs TalentLMS</div>
      <div class="cmp-head-tagline">Automation-first vs configuration-first.</div>
    </div>
    <div class="cmp-head-right">
      <div class="cmp-badge-wins">MyPass wins on 8 features</div>
      <div class="cmp-chevron"><svg viewBox="0 0 14 14"><path d="M3 5l4 4 4-4"/></svg></div>
    </div>
  </div>
  <div class="cmp-body">
    <div class="cmp-verdict">
      <div class="cmp-verdict-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
      <div class="cmp-verdict-text">TalentLMS is a popular choice for SMBs with a clean interface and a broad, accessible feature set. MyPass LMS extends those strengths significantly — with Agentic AI that executes rather than just organises, native SCORM conversion from any file, and active-user pricing that becomes materially cheaper as your learner base grows.</div>
    </div>
    <div class="cmp-wins">
      <div class="cmp-wins-label">Why teams choose MyPass LMS over TalentLMS</div>
      <div class="cmp-wins-grid"><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Agentic AI executes tasks — TalentLMS has no agentic capability</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Native SCORM conversion from PPT/PDF/Video — no external tool needed</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>AI-generated surveys — TalentLMS builds surveys manually only</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>OpenSesame native integration — not available in TalentLMS</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Credit-based pricing — TalentLMS charges per registered user always</span></div></div>
    </div>
    <div class="cmp-table-wrap">
      <table class="cmp-table">
        <thead>
          <tr>
            <th>Feature</th>
            <th>MyPass LMS</th>
            <th>TalentLMS</th>
          </tr>
        </thead>
        <tbody><tr class="win"><td>Agentic AI</td><td>Yes — autonomous task execution from plain-language prompts</td><td>No agentic AI in platform</td></tr><tr class="win"><td>SCORM Conversion</td><td>Native PPT/PDF/Video → SCORM auto-conversion</td><td>SCORM import only; no native auto-conversion from files</td></tr><tr class="win"><td>AI Content Creation</td><td>Full prompt-to-course: modules, quizzes, media</td><td>TalentCraft assists with content; not full prompt-to-SCORM</td></tr><tr class="win"><td>OpenSesame</td><td>Native integration + premium partner catalog</td><td>No known native OpenSesame integration</td></tr><tr class="win"><td>Survey Engine</td><td>AI generates surveys from plain-language prompts</td><td>Survey/quiz creation; no AI survey generator</td></tr><tr class="win"><td>Pricing</td><td>Credit-based — active users only billed; idle at $0</td><td>Per-user subscription; registered users billed always</td></tr><tr class="win"><td>Assessment Engine</td><td>Full engine: pools, randomisation, cool-off, attempt logic</td><td>Tests and quizzes with reporting; advanced pooling limited</td></tr><tr class="win"><td>Help Centre</td><td>Built-in walkthroughs + support ticketing</td><td>Standard documentation and support channels</td></tr><tr><td>ILT Management</td><td>Built-in scheduling, attendance, Zoom/Teams integration</td><td>Blended ILT/vILT with Zoom, Teams, BigBlueButton</td></tr><tr><td>Multi-tenant</td><td>Multi-tenant portals with full branding control</td><td>Branch-based multi-tenancy with customisation options</td></tr><tr><td>Interface</td><td>AI command interface + clean admin console</td><td>Known for clean, intuitive interface — SMB-friendly</td></tr></tbody>
      </table>
    </div>
    <div class="cmp-switch">
      <div>
        <div class="cmp-switch-txt">Ready to switch from TalentLMS?</div>
        <div class="cmp-switch-sub">Migration support included. Live in days, not months.</div>
      </div>
      <a href="https://mypasslms.us/login#register" class="cmp-switch-btn"><svg viewBox="0 0 16 16" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Start Free Trial</a>
    </div>
  </div>
</div>
<div class="cmp-item" id="absorb">
  <div class="cmp-head" onclick="toggleComp(this)">
    <div class="cmp-head-icon" style="background:#059669">VS</div>
    <div class="cmp-head-info">
      <div class="cmp-head-cat">Corporate LMS</div>
      <div class="cmp-head-title">MyPass LMS vs Absorb LMS</div>
      <div class="cmp-head-tagline">AI-native execution vs learner-experience-first design.</div>
    </div>
    <div class="cmp-head-right">
      <div class="cmp-badge-wins">MyPass wins on 6 features</div>
      <div class="cmp-chevron"><svg viewBox="0 0 14 14"><path d="M3 5l4 4 4-4"/></svg></div>
    </div>
  </div>
  <div class="cmp-body">
    <div class="cmp-verdict">
      <div class="cmp-verdict-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
      <div class="cmp-verdict-text">Absorb LMS is consistently praised for its clean, learner-friendly interface and reliable corporate training capabilities. MyPass LMS matches those design standards and adds Agentic AI execution, native SCORM conversion from any file, and credit-based pricing — making it more cost-effective for organisations with variable or growing learner populations.</div>
    </div>
    <div class="cmp-wins">
      <div class="cmp-wins-label">Why teams choose MyPass LMS over Absorb LMS</div>
      <div class="cmp-wins-grid"><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Agentic AI executes workflows — Absorb relies on rule-based automation</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Native SCORM conversion from files — Absorb requires external authoring</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Credit-based pricing vs per-user subscription</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>AI-generated surveys from plain-language prompts</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>OpenSesame natively integrated on all plans</span></div></div>
    </div>
    <div class="cmp-table-wrap">
      <table class="cmp-table">
        <thead>
          <tr>
            <th>Feature</th>
            <th>MyPass LMS</th>
            <th>Absorb LMS</th>
          </tr>
        </thead>
        <tbody><tr class="win"><td>Agentic AI</td><td>Yes — creates courses, automates workflows, generates reports</td><td>Rule-based automation; no agentic AI execution</td></tr><tr class="win"><td>SCORM Conversion</td><td>Native PPT/PDF/Video → SCORM without external tools</td><td>SCORM import supported; no native file-to-SCORM conversion</td></tr><tr class="win"><td>Survey Engine</td><td>AI generates surveys from prompts</td><td>Survey tools available; manual creation required</td></tr><tr class="win"><td>OpenSesame</td><td>Native integration + premium catalog</td><td>Third-party content library integrations available</td></tr><tr class="win"><td>Pricing</td><td>Credit-based — idle accounts at $0</td><td>Per-user subscription; full roster billed always</td></tr><tr class="win"><td>AI Content Creation</td><td>Full prompt-to-course generation natively</td><td>Content creation tools available; AI assistance for admins</td></tr><tr><td>ILT Management</td><td>Built-in scheduling, attendance, virtual/in-person</td><td>ILT/vILT with scheduling and virtual classroom support</td></tr><tr><td>Interface</td><td>AI command interface + clean admin console</td><td>Praised for clean, learner-centred UI design</td></tr><tr><td>Assessment Engine</td><td>Advanced engine: pools, randomisation, cool-off</td><td>Assessment tools with tracking and reporting</td></tr><tr><td>Enterprise Scale</td><td>Multi-tenant portals, RBAC, SSO/SCIM</td><td>Enterprise-grade with multi-department support</td></tr><tr><td>eCommerce</td><td>Built-in course monetisation and credit model</td><td>Absorb Amplify for eCommerce and extended enterprise</td></tr></tbody>
      </table>
    </div>
    <div class="cmp-switch">
      <div>
        <div class="cmp-switch-txt">Ready to switch from Absorb LMS?</div>
        <div class="cmp-switch-sub">Migration support included. Live in days, not months.</div>
      </div>
      <a href="https://mypasslms.us/login#register" class="cmp-switch-btn"><svg viewBox="0 0 16 16" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Start Free Trial</a>
    </div>
  </div>
</div>
<div class="cmp-item" id="learnupon">
  <div class="cmp-head" onclick="toggleComp(this)">
    <div class="cmp-head-icon" style="background:#0891B2">VS</div>
    <div class="cmp-head-info">
      <div class="cmp-head-cat">Customer & Partner Training LMS</div>
      <div class="cmp-head-title">MyPass LMS vs LearnUpon</div>
      <div class="cmp-head-tagline">Agentic AI execution vs customer-training specialisation.</div>
    </div>
    <div class="cmp-head-right">
      <div class="cmp-badge-wins">MyPass wins on 6 features</div>
      <div class="cmp-chevron"><svg viewBox="0 0 14 14"><path d="M3 5l4 4 4-4"/></svg></div>
    </div>
  </div>
  <div class="cmp-body">
    <div class="cmp-verdict">
      <div class="cmp-verdict-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
      <div class="cmp-verdict-text">LearnUpon is a strong choice for organisations running external training programmes — customer education, partner enablement, and multi-portal delivery. MyPass LMS covers the same external training use cases and adds Agentic AI execution, native SCORM conversion, and active-user pricing that makes it more cost-effective as portal count and learner volume grows.</div>
    </div>
    <div class="cmp-wins">
      <div class="cmp-wins-label">Why teams choose MyPass LMS over LearnUpon</div>
      <div class="cmp-wins-grid"><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Agentic AI executes training tasks — LearnUpon has no agentic capability</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Native SCORM conversion from files — LearnUpon requires external authoring</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Credit-based pricing vs per-user subscription</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>AI-generated surveys and assessments from prompts</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Integrated help centre with ticketing built in</span></div></div>
    </div>
    <div class="cmp-table-wrap">
      <table class="cmp-table">
        <thead>
          <tr>
            <th>Feature</th>
            <th>MyPass LMS</th>
            <th>LearnUpon</th>
          </tr>
        </thead>
        <tbody><tr class="win"><td>Agentic AI</td><td>Yes — autonomous execution from plain-language prompts</td><td>No agentic AI in platform</td></tr><tr class="win"><td>SCORM Conversion</td><td>Native PPT/PDF/Video → SCORM built in</td><td>SCORM import supported; no native file-to-SCORM conversion</td></tr><tr class="win"><td>AI Content Creation</td><td>Full prompt-to-course: modules, quizzes, media</td><td>Content creation tools; no prompt-to-SCORM generation</td></tr><tr class="win"><td>Survey Engine</td><td>AI generates surveys from plain-language prompts</td><td>Survey tools available; manual creation</td></tr><tr class="win"><td>Pricing</td><td>Credit-based — idle learners cost nothing</td><td>Per-user subscription per portal; costs compound with scale</td></tr><tr class="win"><td>Assessment Engine</td><td>Full engine: pools, randomisation, cool-off, attempts</td><td>Assessment and quiz tools with reporting</td></tr><tr><td>Multi-portal</td><td>Multi-tenant portals with full branding — all plans</td><td>Multi-portal architecture is a core LearnUpon strength</td></tr><tr><td>Customer Training</td><td>Full customer and partner training capability</td><td>Purpose-built for customer and partner education portals</td></tr><tr><td>ILT Management</td><td>Built-in scheduling, attendance, virtual/in-person</td><td>ILT/vILT with scheduling and Zoom/Teams integration</td></tr><tr><td>Integrations</td><td>Zoom, Teams, Salesforce, HRIS, Zapier, API, LTI</td><td>Strong Salesforce, HubSpot, and CRM integrations for CS teams</td></tr><tr><td>Help Centre</td><td>Built-in walkthroughs + support ticketing</td><td>Praised for responsive support; external help documentation</td></tr></tbody>
      </table>
    </div>
    <div class="cmp-switch">
      <div>
        <div class="cmp-switch-txt">Ready to switch from LearnUpon?</div>
        <div class="cmp-switch-sub">Migration support included. Live in days, not months.</div>
      </div>
      <a href="https://mypasslms.us/login#register" class="cmp-switch-btn"><svg viewBox="0 0 16 16" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Start Free Trial</a>
    </div>
  </div>
</div>
<div class="cmp-item" id="totara">
  <div class="cmp-head" onclick="toggleComp(this)">
    <div class="cmp-head-icon" style="background:#2D7A4F">VS</div>
    <div class="cmp-head-info">
      <div class="cmp-head-cat">Open-Source Enterprise LMS</div>
      <div class="cmp-head-title">MyPass LMS vs Totara Learn</div>
      <div class="cmp-head-tagline">Cloud-native automation vs open-source flexibility that requires a partner network.</div>
    </div>
    <div class="cmp-head-right">
      <div class="cmp-badge-wins">MyPass wins on 7 features</div>
      <div class="cmp-chevron"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M3 5l4 4 4-4"/></svg></div>
    </div>
  </div>
  <div class="cmp-body">
    <div class="cmp-verdict">
      <div class="cmp-verdict-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
      <div class="cmp-verdict-text">Totara Learn is a powerful open-source LMS built on Moodle's foundations, extended with enterprise performance management and multi-tenancy. The real cost is hidden: implementation requires a Totara partner, pricing is subscription-based through that partner, and every customisation adds cost and time. MyPass LMS delivers comparable enterprise capability fully hosted, with Agentic AI built in, and no partner dependency.</div>
    </div>
    <div class="cmp-wins">
      <div class="cmp-wins-label">Why teams choose MyPass LMS over Totara Learn</div>
      <div class="cmp-wins-grid"><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Fully managed SaaS — zero partner, hosting, or infrastructure dependency</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Agentic AI executes workflows — Totara has no native AI execution</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Native SCORM conversion from PPT/PDF/Video — no external authoring tool</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Live from day one — Totara typically requires weeks of partner setup</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Credit-based pricing — Totara subscription tiers start at 500 users minimum</span></div></div>
    </div>
    <div class="cmp-table-wrap">
      <table class="cmp-table">
        <thead><tr><th>Feature</th><th>MyPass LMS</th><th>Totara Learn</th></tr></thead>
        <tbody><tr class="win"><td>Hosting & Maintenance</td><td>Fully managed SaaS — zero infrastructure or partner dependency</td><td>Open-source; hosted and maintained via a Totara partner network</td></tr><tr class="win"><td>Agentic AI</td><td>Yes — executes tasks: create courses, automate workflows, reports</td><td>No native AI execution; automation is rule-based and manual</td></tr><tr class="win"><td>SCORM Conversion</td><td>Native PPT/PDF/Video → SCORM auto-conversion built in</td><td>No native file-to-SCORM conversion; external authoring tool required</td></tr><tr class="win"><td>AI Content Creation</td><td>Full prompt-to-course: modules, quizzes, media — no external tool</td><td>No native AI course authoring; content built manually or via plugins</td></tr><tr class="win"><td>Implementation Speed</td><td>Live from day one — guided setup included</td><td>Partner-led implementation; typically weeks to months</td></tr><tr class="win"><td>Survey Engine</td><td>AI generates surveys from plain-language prompts</td><td>Survey tools available; manual creation; no AI survey generator</td></tr><tr class="win"><td>OpenSesame</td><td>Native integration + premium catalog on all plans</td><td>No native OpenSesame; content via partner-sourced integrations</td></tr><tr><td>Help Centre</td><td>Built-in walkthroughs + support ticketing</td><td>Totara Help centre + community forums via partner network</td></tr><tr><td>Multi-tenancy</td><td>Built-in multi-tenant portals, branding, RBAC</td><td>Multi-tenancy is a core Totara strength — isolated branded environments</td></tr><tr><td>Compliance</td><td>Built-in compliance tracking, deadlines, audit evidence</td><td>Strong compliance and certification management built in</td></tr><tr class="lose"><td>Customisation</td><td>Branded portals via admin console; no code required</td><td>Deep open-source customisation with partner development support</td></tr><tr class="lose"><td>Performance Mgmt</td><td>LMS-focused training and compliance automation</td><td>Performance reviews, appraisals, and goals natively integrated</td></tr><tr><td>Pricing</td><td>Credit-based — active users only; idle accounts at $0</td><td>Subscription via partner; tiers from 500 to 1M+ users</td></tr></tbody>
      </table>
    </div>
    <div class="cmp-switch">
      <div>
        <div class="cmp-switch-txt">Ready to switch from Totara Learn?</div>
        <div class="cmp-switch-sub">Migration support included. Live in days, not months.</div>
      </div>
      <a href="https://mypasslms.us/login#register" class="cmp-switch-btn"><svg viewBox="0 0 16 16" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Start Free Trial</a>
    </div>
  </div>
</div>
<div class="cmp-item" id="d2l">
  <div class="cmp-head" onclick="toggleComp(this)">
    <div class="cmp-head-icon" style="background:#D4380D">VS</div>
    <div class="cmp-head-info">
      <div class="cmp-head-cat">Enterprise LMS / Education Platform</div>
      <div class="cmp-head-title">MyPass LMS vs D2L Brightspace</div>
      <div class="cmp-head-tagline">Corporate automation vs education-focused analytics and personalisation.</div>
    </div>
    <div class="cmp-head-right">
      <div class="cmp-badge-wins">MyPass wins on 8 features</div>
      <div class="cmp-chevron"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M3 5l4 4 4-4"/></svg></div>
    </div>
  </div>
  <div class="cmp-body">
    <div class="cmp-verdict">
      <div class="cmp-verdict-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
      <div class="cmp-verdict-text">D2L Brightspace is a sophisticated LMS with strong academic and corporate credentials — known for its analytics depth and personalised learning capabilities. The gap for corporate buyers is cost and complexity: Brightspace pricing starts around $30,000/year for 500 users, add-ons are expensive, and AI execution is not yet autonomous. MyPass LMS delivers comparable learning management at a fraction of the cost, with Agentic AI that executes rather than recommends.</div>
    </div>
    <div class="cmp-wins">
      <div class="cmp-wins-label">Why teams choose MyPass LMS over D2L Brightspace</div>
      <div class="cmp-wins-grid"><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Credit-based pricing — Brightspace costs ~$30,000/year for 500 users vs MyPass's fraction</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Agentic AI executes workflows — Brightspace AI recommends but does not act</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Native SCORM conversion from files — Brightspace requires Creator+ add-on</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Active user model — idle accounts cost nothing; Brightspace bills full roster</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>No expensive add-ons — every feature included; Brightspace add-ons add significant cost</span></div></div>
    </div>
    <div class="cmp-table-wrap">
      <table class="cmp-table">
        <thead><tr><th>Feature</th><th>MyPass LMS</th><th>D2L Brightspace</th></tr></thead>
        <tbody><tr class="win"><td>Pricing</td><td>Credit-based — active users only; from $63/month</td><td>Custom quote; ~$30,000/year for 500 users; add-ons extra</td></tr><tr class="win"><td>Agentic AI</td><td>Yes — executes training workflows from plain-language prompts</td><td>D2L Lumi AI exists; focuses on recommendations, not task execution</td></tr><tr class="win"><td>SCORM Conversion</td><td>Native PPT/PDF/Video → SCORM auto-conversion built in</td><td>Creator+ add-on required for advanced authoring; not native</td></tr><tr class="win"><td>Add-ons</td><td>All features included — no extras to unlock</td><td>Expensive add-ons: Performance+, Course Merchant, Creator+, D2L Link</td></tr><tr class="win"><td>Implementation</td><td>Live from day one; guided onboarding included</td><td>Custom implementation; complexity increases with add-ons</td></tr><tr class="win"><td>Survey Engine</td><td>AI generates surveys from plain-language prompts</td><td>Survey tools available; manual creation; no AI survey generator</td></tr><tr class="win"><td>OpenSesame</td><td>Native integration + premium catalog</td><td>No native OpenSesame; integrates via D2L Link and LTI</td></tr><tr><td>Help Centre</td><td>Built-in walkthroughs + support ticketing in-app</td><td>External documentation; Customer Success support via contract</td></tr><tr><td>Assessment Engine</td><td>Full engine: pools, randomisation, cool-off, attempts</td><td>Ranked second on industry leaderboard for assessments</td></tr><tr><td>Analytics</td><td>Real-time dashboards + Agentic AI insights</td><td>Strong analytics praised for learning insights and performance data</td></tr><tr><td>Compliance</td><td>Built-in compliance tracking and audit-ready evidence</td><td>Compliance and certification tracking built in</td></tr><tr class="win"><td>eCommerce</td><td>Built-in course monetisation on all plans</td><td>Course Merchant add-on for eCommerce — additional cost</td></tr><tr><td>Mobile</td><td>Responsive UI + mobile app + offline support</td><td>Brightspace Pulse mobile app with offline capability</td></tr></tbody>
      </table>
    </div>
    <div class="cmp-switch">
      <div>
        <div class="cmp-switch-txt">Ready to switch from D2L Brightspace?</div>
        <div class="cmp-switch-sub">Migration support included. Live in days, not months.</div>
      </div>
      <a href="https://mypasslms.us/login#register" class="cmp-switch-btn"><svg viewBox="0 0 16 16" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Start Free Trial</a>
    </div>
  </div>
</div>
<div class="cmp-item" id="360learning">
  <div class="cmp-head" onclick="toggleComp(this)">
    <div class="cmp-head-icon" style="background:#7C3AED">VS</div>
    <div class="cmp-head-info">
      <div class="cmp-head-cat">Collaborative LMS</div>
      <div class="cmp-head-title">MyPass LMS vs 360Learning</div>
      <div class="cmp-head-tagline">Automated learning vs collaborative learning.</div>
    </div>
    <div class="cmp-head-right">
      <div class="cmp-badge-wins">MyPass wins on 5 features</div>
      <div class="cmp-chevron"><svg viewBox="0 0 14 14"><path d="M3 5l4 4 4-4"/></svg></div>
    </div>
  </div>
  <div class="cmp-body">
    <div class="cmp-verdict">
      <div class="cmp-verdict-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
      <div class="cmp-verdict-text">360Learning's peer-driven, collaborative model is compelling for organisations that rely on internal subject matter experts to create training. MyPass LMS is the choice for teams that need AI to build, automate, and deliver training at speed — without depending on learner-generated content or collaborative consensus to fill curriculum gaps.</div>
    </div>
    <div class="cmp-wins">
      <div class="cmp-wins-label">Why teams choose MyPass LMS over 360Learning</div>
      <div class="cmp-wins-grid"><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Agentic AI creates courses from prompts — no SME bottleneck</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Built-in SCORM conversion from files — no authoring dependency</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Active user pricing — idle accounts cost zero</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Compliance and audit reporting built for regulated industries</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>ILT management with full scheduling and attendance tracking</span></div></div>
    </div>
    <div class="cmp-table-wrap">
      <table class="cmp-table">
        <thead>
          <tr>
            <th>Feature</th>
            <th>MyPass LMS</th>
            <th>360Learning</th>
          </tr>
        </thead>
        <tbody><tr class="win"><td>AI Content Creation</td><td>Prompt-to-course: modules, quizzes, media — no SME needed</td><td>AI authoring assistance within collaborative course creation model</td></tr><tr class="win"><td>SCORM Conversion</td><td>Native PPT/PDF/Video → SCORM auto-conversion</td><td>SCORM import supported; collaborative content is the native format</td></tr><tr class="win"><td>Agentic AI</td><td>Yes — executes training workflows autonomously</td><td>AI assists collaboration; no autonomous workflow execution</td></tr><tr class="win"><td>Compliance Automation</td><td>Built-in compliance tracking, deadlines, audit evidence</td><td>Compliance features available; collaborative focus is primary</td></tr><tr class="win"><td>Pricing</td><td>Credit-based — active users only billed</td><td>Per-user subscription pricing</td></tr><tr><td>Survey Engine</td><td>AI generates surveys from plain-language prompts</td><td>Built-in feedback loops, reactions, and pulse surveys</td></tr><tr><td>Assessment Engine</td><td>Advanced engine: pools, randomisation, cool-off logic</td><td>Assessment tools embedded within collaborative pathways</td></tr><tr class="lose"><td>Collaborative Content</td><td>LMS-focused; AI replaces dependency on peer content</td><td>Peer learning, reactions, and collaborative authoring is core model</td></tr><tr><td>ILT Management</td><td>Full scheduling, attendance, virtual + in-person</td><td>ILT supported within collaborative blended model</td></tr><tr><td>Enterprise Scale</td><td>Multi-tenant portals, RBAC, SSO/SCIM</td><td>Enterprise-grade collaborative learning at scale</td></tr></tbody>
      </table>
    </div>
    <div class="cmp-switch">
      <div>
        <div class="cmp-switch-txt">Ready to switch from 360Learning?</div>
        <div class="cmp-switch-sub">Migration support included. Live in days, not months.</div>
      </div>
      <a href="https://mypasslms.us/login#register" class="cmp-switch-btn"><svg viewBox="0 0 16 16" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Start Free Trial</a>
    </div>
  </div>
</div>
<div class="cmp-item" id="ispring">
  <div class="cmp-head" onclick="toggleComp(this)">
    <div class="cmp-head-icon" style="background:#F59E0B">VS</div>
    <div class="cmp-head-info">
      <div class="cmp-head-cat">SMB / Mid-Market LMS</div>
      <div class="cmp-head-title">MyPass LMS vs iSpring Learn</div>
      <div class="cmp-head-tagline">AI-native LMS vs authoring-tool-adjacent LMS.</div>
    </div>
    <div class="cmp-head-right">
      <div class="cmp-badge-wins">MyPass wins on 7 features</div>
      <div class="cmp-chevron"><svg viewBox="0 0 14 14"><path d="M3 5l4 4 4-4"/></svg></div>
    </div>
  </div>
  <div class="cmp-body">
    <div class="cmp-verdict">
      <div class="cmp-verdict-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
      <div class="cmp-verdict-text">iSpring Learn is built around the iSpring Suite authoring ecosystem — making it an excellent choice if you already use iSpring Suite for PowerPoint-based course creation. MyPass LMS delivers the same outcome without any dependency on an external authoring tool, adding Agentic AI, active-user pricing, and OpenSesame content natively.</div>
    </div>
    <div class="cmp-wins">
      <div class="cmp-wins-label">Why teams choose MyPass LMS over iSpring Learn</div>
      <div class="cmp-wins-grid"><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>No authoring tool dependency — SCORM created natively from prompts or files</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Agentic AI executes workflows — iSpring has no agentic capability</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Credit-based pricing vs per-user subscription</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>OpenSesame catalog natively integrated</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>AI-generated surveys and assessments from plain-language prompts</span></div></div>
    </div>
    <div class="cmp-table-wrap">
      <table class="cmp-table">
        <thead>
          <tr>
            <th>Feature</th>
            <th>MyPass LMS</th>
            <th>iSpring Learn</th>
          </tr>
        </thead>
        <tbody><tr class="win"><td>Authoring Dependency</td><td>None — SCORM generated natively; no external tool needed</td><td>Closely tied to iSpring Suite authoring tool</td></tr><tr class="win"><td>Agentic AI</td><td>Yes — autonomous execution of training tasks from prompts</td><td>No agentic AI capability in platform</td></tr><tr class="win"><td>AI Content Creation</td><td>Full prompt-to-course: modules, quizzes, media</td><td>iSpring Suite integration for PowerPoint-based course creation</td></tr><tr class="win"><td>OpenSesame</td><td>Native integration + premium catalog</td><td>No known native OpenSesame integration</td></tr><tr class="win"><td>Survey Engine</td><td>AI generates surveys from plain-language prompts</td><td>Survey builder available; no AI-generated surveys</td></tr><tr class="win"><td>Pricing</td><td>Credit-based — active users only; idle at $0</td><td>Per-user subscription; full roster billed</td></tr><tr class="win"><td>SCORM Conversion</td><td>Native file-to-SCORM conversion built in</td><td>SCORM via iSpring Suite + manual upload workflow</td></tr><tr><td>Assessment Engine</td><td>Full engine: pools, randomisation, cool-off, attempt logic</td><td>Advanced question types and assessment tracking via Suite</td></tr><tr><td>ILT Management</td><td>Built-in scheduling, attendance, virtual/in-person</td><td>ILT supported with scheduling and calendar features</td></tr><tr><td>Mobile</td><td>Responsive UI + mobile app + offline support</td><td>Mobile app with offline capability available</td></tr><tr class="lose"><td>PowerPoint Integration</td><td>PPT content auto-converted to SCORM natively</td><td>Deep PowerPoint-to-course workflow via iSpring Suite</td></tr></tbody>
      </table>
    </div>
    <div class="cmp-switch">
      <div>
        <div class="cmp-switch-txt">Ready to switch from iSpring Learn?</div>
        <div class="cmp-switch-sub">Migration support included. Live in days, not months.</div>
      </div>
      <a href="https://mypasslms.us/login#register" class="cmp-switch-btn"><svg viewBox="0 0 16 16" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Start Free Trial</a>
    </div>
  </div>
</div>
<div class="cmp-item" id="skool">
  <div class="cmp-head" onclick="toggleComp(this)">
    <div class="cmp-head-icon" style="background:#7C3AED">VS</div>
    <div class="cmp-head-info">
      <div class="cmp-head-cat">Community + Course Platform</div>
      <div class="cmp-head-title">MyPass LMS vs Skool</div>
      <div class="cmp-head-tagline">Enterprise LMS vs community-first course hosting for creators.</div>
    </div>
    <div class="cmp-head-right">
      <div class="cmp-badge-wins">MyPass wins on 10 features</div>
      <div class="cmp-chevron"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M3 5l4 4 4-4"/></svg></div>
    </div>
  </div>
  <div class="cmp-body">
    <div class="cmp-verdict">
      <div class="cmp-verdict-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
      <div class="cmp-verdict-text">Skool is a creator-focused platform that combines a community feed, basic course hosting, gamification, and live events into a clean, simple interface. It excels at engagement-driven learning for coaches and course creators. It is not an LMS. There are no quizzes, no assessments, no certificates, no compliance tracking, no SCORM, and no reporting beyond basic engagement metrics. MyPass LMS serves organisations that need training to actually be managed, tracked, and evidenced.</div>
    </div>
    <div class="cmp-wins">
      <div class="cmp-wins-label">Why teams choose MyPass LMS over Skool</div>
      <div class="cmp-wins-grid"><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Full LMS capability — Skool has no assessments, quizzes, or certificates</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Compliance tracking with audit evidence — Skool has zero compliance tools</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>SCORM creation and delivery — Skool does not support SCORM at all</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Agentic AI executes training workflows — Skool has no AI capability</span></div><div class="cmp-win-item"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Multi-tenant enterprise portals — Skool supports one community per subscription</span></div></div>
    </div>
    <div class="cmp-table-wrap">
      <table class="cmp-table">
        <thead><tr><th>Feature</th><th>MyPass LMS</th><th>Skool</th></tr></thead>
        <tbody><tr class="win"><td>Assessments & Quizzes</td><td>Full assessment engine: pools, randomisation, cool-off, attempts</td><td>No quizzes, tests, or assessments — a stated platform limitation</td></tr><tr class="win"><td>Certificates</td><td>Automated certificate issuance on course completion</td><td>No certificate issuance; not supported by the platform</td></tr><tr class="win"><td>Compliance Tracking</td><td>Built-in compliance tracking, deadlines, audit-ready evidence</td><td>No compliance features; no tracking beyond basic engagement</td></tr><tr class="win"><td>SCORM Support</td><td>Native SCORM creation and delivery built in</td><td>No SCORM support whatsoever</td></tr><tr class="win"><td>Agentic AI</td><td>Yes — executes workflows: courses, automation, reports</td><td>No AI features in platform</td></tr><tr class="win"><td>Reporting & Analytics</td><td>Real-time dashboards: completion, assessment, compliance</td><td>Basic engagement metrics (points, leaderboard activity) only</td></tr><tr class="win"><td>Multi-tenant</td><td>Multi-tenant portals with full branding — all plans</td><td>One community per $99/month subscription; no multi-tenancy</td></tr><tr class="win"><td>ILT Management</td><td>Built-in scheduling, attendance tracking, virtual/in-person</td><td>Live events calendar; basic scheduling; no attendance tracking</td></tr><tr class="win"><td>Enterprise RBAC</td><td>Role-based access control with defined permissions</td><td>Basic admin/member roles; limited permission control</td></tr><tr class="win"><td>Integrations</td><td>Zoom, Teams, HRIS, Zapier, API, LTI, OpenSesame</td><td>Limited integrations; Zapier available on Pro plan</td></tr><tr class="lose"><td>Community & Engagement</td><td>LMS-focused; gamification available</td><td>Community feed, gamified leaderboard, and peer interaction are core</td></tr><tr class="lose"><td>Simplicity</td><td>Full LMS — some complexity is inherent</td><td>Extremely simple UI; minimal learning curve for creators</td></tr><tr><td>Pricing</td><td>From $63/month — active users only; scales with engagement</td><td>$99/month flat per community; unlimited members</td></tr></tbody>
      </table>
    </div>
    <div class="cmp-switch">
      <div>
        <div class="cmp-switch-txt">Ready to switch from Skool?</div>
        <div class="cmp-switch-sub">Migration support included. Live in days, not months.</div>
      </div>
      <a href="https://mypasslms.us/login#register" class="cmp-switch-btn"><svg viewBox="0 0 16 16" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Start Free Trial</a>
    </div>
  </div>
</div>
</div>
<section class="cmp-cta">
  <div class="cmp-cta-wrap">
    <h2>Seen Enough?<br><em>Start the Free Trial.</em></h2>
    <p>Every feature from every comparison above is available from day one. No restricted trial. No credit card. No sales call required before you can explore the platform.</p>
    <div class="cmp-cta-btns">
      <a href="https://mypasslms.us/login#register" class="btn-a" style="font-size:15px;padding:14px 28px;background:#fff;color:var(--b)">Start Free for 15 Days</a>
      <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b" style="font-size:15px;padding:13px 24px;background:transparent;color:#fff;border-color:rgba(255,255,255,.35)">Book a Demo</a>
    </div>
    <p class="cmp-cta-note">15-day free trial &middot; No credit card required &middot; Cancel anytime &middot; AWS FedRAMP infrastructure</p>
  </div>
</section>

<script>
function toggleComp(btn){
  var item = btn.parentElement;
  var wasOpen = item.classList.contains('open');
  // Close all
  document.querySelectorAll('.cmp-item').forEach(function(el){ el.classList.remove('open'); });
  // Open this one if it was closed
  if(!wasOpen){ item.classList.add('open'); }
}
// Auto-open first item
window.addEventListener('DOMContentLoaded', function(){
  var first = document.querySelector('.cmp-item');
  if(first) first.classList.add('open');
});
// Smooth scroll for nav pills
document.querySelectorAll && document.querySelectorAll('.cmp-nav-pill').forEach(function(pill){
  pill.addEventListener('click', function(e){
    e.preventDefault();
    var target = document.getElementById(this.getAttribute('href').slice(1));
    if(target){
      var offset = target.getBoundingClientRect().top + window.pageYOffset - 130;
      window.scrollTo({top:offset, behavior:'smooth'});
      setTimeout(function(){ target.querySelector('.cmp-head') && target.querySelector('.cmp-head').click(); }, 400);
    }
  });
});
</script>
<script>
(function(){
  document.querySelectorAll('.fi').forEach(function(item){
    var q = item.querySelector('.fi-q');
    if(q){ q.addEventListener('click',function(){ item.classList.toggle('open'); }); }
  });
})();
</script>
@endsection
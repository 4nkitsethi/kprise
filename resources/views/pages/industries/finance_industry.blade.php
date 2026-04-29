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
.sc{padding:26px 20px;text-align:center;border-right:1px solid var(--bdr)}
.sc:last-child{border-right:none}
.sc-n{font-size:36px;font-weight:900;letter-spacing:-1.5px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent}
.sc-l{font-size:12.5px;color:var(--ink3);font-weight:500;margin-top:4px;line-height:1.4}

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
/* ── HERO IMAGE FIX: no gap above image ── */
.hero{background:var(--w);border-bottom:1px solid var(--bdr);padding:56px 48px 0;overflow:hidden;position:relative;}
.hero::after{content:'';position:absolute;top:0;right:0;bottom:0;width:48%;background:linear-gradient(to right,transparent,var(--bl2) 40%);pointer-events:none;}
.hero-grid{max-width:1200px;margin:0 auto;display:grid;grid-template-columns:1fr 460px;gap:52px;align-items:end;position:relative;z-index:1;}
.hero-img-wrap{position:relative;align-self:stretch;display:flex;flex-direction:column;justify-content:flex-end;}
.hero-img{width:100%;height:100%;min-height:420px;object-fit:cover;object-position:center top;border-radius:14px 14px 0 0;box-shadow:0 -4px 32px rgba(66,32,200,0.1);display:block;flex:1;}
@media(max-width:1024px){.hero-img{height:320px;min-height:unset;flex:none;}.hero-grid{grid-template-columns:1fr;}}
.sc{padding:20px 24px;display:flex;align-items:center;gap:16px;border-right:1px solid var(--bdr);}
.sc-n{font-size:34px;font-weight:900;letter-spacing:-1.5px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;flex-shrink:0;min-width:52px;}
.sc-l{font-size:12.5px;color:var(--ink3);font-weight:500;line-height:1.45;border-left:1.5px solid var(--bdr2);padding-left:14px;}
.sc:last-child{border-right:none;}</style>
@endpush


@section('content')

<header class="hero">
  <div class="hero-grid">
    <div>
      <nav class="bc" aria-label="Breadcrumb">
        <a href="https://kp.kprise.com">Home</a><span class="bc-sep">/</span>
        <a href="#">Industries</a><span class="bc-sep">/</span>
        <span>Financial Services</span>
      </nav>
      <div class="htag"><span class="htag-dot"></span><span>Financial Services</span></div>
      <h1>Regulatory Compliance Training<br><em>That Keeps Pace With the Regulators.</em></h1>
      <p class="hero-sub">FCA, SEC, MiFID II, and AML requirements change continuously — and every training gap creates regulatory exposure. <strong>MyPass LMS automates compliance assignment, CPD tracking, and audit evidence generation</strong> so your compliance team focuses on strategy, not spreadsheets.</p>
      <div class="hbtns">
        <a href="https://mypasslms.us/login#register" class="btn-a">Start Free for 15 Days</a>
        <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b">Book a Demo</a>
      </div>
      <div class="trust-row"><div class="tchip"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>No credit card required</span></div><div class="tchip"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>15-day free trial</span></div><div class="tchip"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg><span>Regulatory audit trail built in</span></div></div>
    </div>
    <div class="hero-img-wrap">
      <img class="hero-img"
        src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=960&q=80&auto=format&fit=crop"
        alt="Regulatory Compliance Training That Keeps Pace With the Regulators. — MyPass LMS" loading="eager" width="460" height="420">
      <div class="h-float">
        <div class="hf-dot"></div>
        <div><div class="hf-n">100%</div><div class="hf-l">Audit-ready compliance evidence — generated instantly</div></div>
      </div>
    </div>
  </div>
</header><div class="logo-bar">
  <p class="lb-lbl">Trusted by organisations across 15 countries</p>
  <div class="lb-track-wrap">
    <div class="lb-track" aria-hidden="true">
      <div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-67.png?fit=199%2C100&ssl=1" alt="American Board" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px"></div>
      <div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-69.png?fit=197%2C100&ssl=1" alt="Youth for Understanding" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px"></div>
      <div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-65.png?fit=197%2C100&ssl=1" alt="PDK International" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px"></div>
      <div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-66.png?fit=198%2C100&ssl=1" alt="SBCA" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px"></div>
      <div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-68.png?fit=198%2C99&ssl=1" alt="PDK" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px"></div>
      <div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-67.png?fit=199%2C100&ssl=1" alt="American Board" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px"></div>
      <div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-69.png?fit=197%2C100&ssl=1" alt="Youth for Understanding" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px"></div>
      <div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-65.png?fit=197%2C100&ssl=1" alt="PDK International" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px"></div>
      <div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-66.png?fit=198%2C100&ssl=1" alt="SBCA" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px"></div>
      <div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-68.png?fit=198%2C99&ssl=1" alt="PDK" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px"></div>
    </div>
  </div>
</div><div class="stats"><div class="stats-in"><div class="sc"><div class="sc-n">70%</div><div class="sc-l">Reduction in compliance training admin after structured automated deployment</div></div><div class="sc"><div class="sc-n">100%</div><div class="sc-l">Audit-ready regulatory evidence from live data — always current, always ready</div></div><div class="sc"><div class="sc-n">Day 1</div><div class="sc-l">Regulatory training assigned to every new hire automatically from their first day</div></div><div class="sc"><div class="sc-n">0</div><div class="sc-l">Manual CPD tracking entries — hours recorded automatically per module completion</div></div></div></div><section class="sec sw">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Built for Financial Services Compliance</div>
      <h2 class="heading">Regulatory Requirements Change.<br><em>Your Training Has to Keep Up.</em></h2>
      <p class="lead cx">Financial services firms operate in one of the most heavily regulated environments of any industry. The cost of a compliance failure — FCA fine, SEC enforcement, client harm — exceeds the cost of the most sophisticated training programme by orders of magnitude. MyPass LMS makes regulatory training automatic, auditable, and always current so compliance is not an annual exercise.</p>
    </div>
    <div class="vp-grid"><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div><div class="vpc-t">Regulatory Compliance Automation</div><div class="vpc-d">FCA, SEC, FINRA, MiFID II, AML, GDPR — mandatory regulatory training assigned by role automatically. Compliance status visible per employee, team, and business unit in real time without spreadsheet reconciliation.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg></div><div class="vpc-t">CPD Tracking and Reporting</div><div class="vpc-d">CPD hours recorded automatically per module completion. Regulatory body reporting evidence generated instantly. Every financial professional's continuing development status always current and always audit-ready.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 19V6l12-3v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="15" r="3"/></svg></div><div class="vpc-t">Role-Based Regulatory Paths</div><div class="vpc-d">Front office, risk, compliance, operations, and advisory teams each receive the regulatory training their specific function requires — assigned automatically based on role, jurisdiction, and product line.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div><div class="vpc-t">Regulatory Update Deployment</div><div class="vpc-d">When FCA issues new guidance or AML requirements change, deploy updated training across all affected roles the same day — not at the next scheduled training cycle. AI builder converts any regulatory update into a structured module immediately.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div><div class="vpc-t">Audit Trail and Evidence</div><div class="vpc-d">Every training event timestamped and stored from day one. FCA, SEC, and internal audit evidence generated in seconds — filtered by business unit, role, regulation, or individual employee. Always ready, never assembled manually.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div><div class="vpc-t">New Hire Regulatory Onboarding</div><div class="vpc-d">Every new joiner receives their complete regulatory induction — conduct rules, product knowledge, AML awareness, data protection — before they interact with clients or execute transactions.</div></div></div>
    <div style="text-align:center"><a href="https://kp.kprise.com/about/platform" class="btn-primary">Explore All Platform Features</a></div>
  </div>
</section><div class="feat-wrap"><div class="frow">
    <div class="frow-img">
      <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=880&q=80&auto=format&fit=crop" alt="Mandatory Regulatory Training That Assigns and Tracks Itself. — MyPass LMS" loading="lazy" width="560" height="380">
      <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Regulatory training assigned by role — compliance status visible in real time</span></div>
    </div>
    <div class="frow-txt">
      <div class="eyebrow"><span class="ew"></span>Compliance Automation</div>
      <h2 class="heading">Mandatory Regulatory Training<br><em>That Assigns and Tracks Itself.</em></h2>
      <p>Financial services compliance training managed in spreadsheets is a regulatory risk in itself. When FCA visits and finds a training record that is months out of date or a role that was never assigned the right mandatory module, the conversation is not comfortable.</p><p>MyPass LMS assigns regulatory training by role automatically — conduct rules, product governance, AML, market abuse, GDPR, and any other mandatory framework your firm operates under. Compliance status is visible per employee, team, and business unit in real time.</p>
      <div class="fpts"><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Mandatory regulatory training assigned by role from first day of employment</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Compliance status visible per employee, team, and business unit in real time</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Regulatory changes deployed as updated training across affected roles the same day</div></div>
      <a href="https://kp.kprise.com/about/platform" class="btn-primary" style="margin-top:18px">See Compliance Features</a>
    </div>
  </div><div class="frow flip">
    <div class="frow-img">
      <img src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=880&q=80&auto=format&fit=crop" alt="CPD Hours That Record Themselves. Regulatory Evidence Ready Instantly. — MyPass LMS" loading="lazy" width="560" height="380">
      <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">CPD hours tracked automatically — regulatory evidence ready in seconds</span></div>
    </div>
    <div class="frow-txt">
      <div class="eyebrow"><span class="ew"></span>CPD Tracking</div>
      <h2 class="heading">CPD Hours That Record Themselves.<br><em>Regulatory Evidence Ready Instantly.</em></h2>
      <p>CPD tracking for financial professionals is a regulatory obligation, not optional reporting. FCA-regulated individuals must maintain evidenced CPD records — and assembling that evidence from multiple sources, verifying hours, and preparing regulatory body submissions is a significant administrative burden on compliance teams.</p><p>MyPass LMS records CPD hours automatically when a financial professional completes a qualifying module. Every hour is logged against their profile, visible to compliance administrators in real time, and exportable for FCA or regulatory body submission instantly.</p>
      <div class="fpts"><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>CPD hours credited automatically per qualifying module completion</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Live CPD totals per individual visible to compliance team at all times</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Regulatory body submission evidence generated and exported in seconds</div></div>
      <a href="https://kp.kprise.com/about/platform" class="btn-primary" style="margin-top:18px">See CPD Tracking Features</a>
    </div>
  </div><div class="frow">
    <div class="frow-img">
      <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=880&q=80&auto=format&fit=crop" alt="FCA Visits on Tuesday. Your Evidence Is Ready on Monday. — MyPass LMS" loading="lazy" width="560" height="380">
      <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Audit evidence filtered and exported instantly for any regulatory inspection</span></div>
    </div>
    <div class="frow-txt">
      <div class="eyebrow"><span class="ew"></span>Regulatory Audit Reporting</div>
      <h2 class="heading">FCA Visits on Tuesday.<br><em>Your Evidence Is Ready on Monday.</em></h2>
      <p>Regulatory inspections in financial services are not always scheduled. When the FCA, SEC, or internal audit team requests evidence that your regulated population is trained and compliant, the time between request and response matters.</p><p>Every training completion in MyPass LMS is recorded and timestamped automatically from day one. Audit evidence — filtered by regulated population, business unit, regulation type, or individual — is generated in seconds.</p>
      <div class="fpts"><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Complete regulatory training records with timestamps for every employee</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Filtered audit reports by regulation, business unit, role, or individual in seconds</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>Always current — no preparation window needed before any regulatory inspection</div></div>
      
    </div>
  </div></div><section class="sec sw">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Customer Stories</div>
      <h2 class="heading">What Financial Services Teams Say<br><em>After Switching to MyPass LMS</em></h2>
    </div>
    <div class="tc-grid">
      <div class="tc feat"><div class="tc-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div><div class="tc-q">&ldquo;</div><div class="tc-body">MyPass LMS is extremely customisable and the support team made the platform feel entirely like ours. Easy to navigate, great adoption across every level of the organisation — our training completion rates have never been higher.</div><div class="tc-author"><div class="tc-av" style="background:linear-gradient(135deg,#2A7A5C,#1D5C45)">AS</div><div><div class="tc-name">Ashleigh S.</div><div class="tc-role">Senior Learning Partner</div></div></div></div>
      <div class="tc"><div class="tc-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div><div class="tc-q">&ldquo;</div><div class="tc-body">We have been a Kprise client for over four years. The platform has always felt like our own — supported every step, and the data we get back actually informs our decisions rather than just sitting in a report nobody reads.</div><div class="tc-author"><div class="tc-av" style="background:linear-gradient(135deg,#1B2A6B,#2D44AA)">SD</div><div><div class="tc-name">Shawn D.</div><div class="tc-role">Director &middot; American Board</div></div></div></div>
      <div class="tc"><div class="tc-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div><div class="tc-q">&ldquo;</div><div class="tc-body">I am wondering why I never contacted these guys sooner. The AI course builder alone cut our content development time from weeks to days. Integration was smooth and the support team was genuinely invested in our success.</div><div class="tc-author"><div class="tc-av" style="background:linear-gradient(135deg,#A06830,#7A4E20)">RN</div><div><div class="tc-name">Raghu Nath</div><div class="tc-role">President &middot; E-Learning Organisation</div></div></div></div>
    </div>
    <div style="text-align:center"><a href="https://kprise.com/case-study/" class="btn-ghost" target="_blank" rel="noopener">Read Full Case Studies</a></div>
  </div>
</section><section class="sec stint">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Recognised by Independent Reviewers</div>
      <h2 class="heading">Rated by Financial Services Training<br><em>and L&D Teams Across the Market</em></h2>
      <p class="lead cx">Independent ratings from training managers and L&D professionals who evaluated MyPass LMS against the full field.</p>
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
</section><section class="sec sbg">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Integrations</div>
      <h2 class="heading">Connects to the Tools Your Team<br><em>Already Uses Every Day.</em></h2>
      <p class="lead cx">MyPass LMS fits into your existing tech stack without disruption — identity providers, HRIS systems, communication tools, and content standards all supported out of the box.</p>
    </div>
    <div class="int-grid"><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><rect x="3" y="3" width="9" height="9" rx="2" fill="#4220C8"/><rect x="14" y="3" width="9" height="9" rx="2" fill="#4220C8" opacity=".5"/><rect x="3" y="14" width="9" height="9" rx="2" fill="#4220C8" opacity=".5"/><rect x="14" y="14" width="9" height="9" rx="2" fill="#4220C8"/></svg></div><div class="int-name">Okta SSO</div><div class="int-desc">Single sign-on for frictionless regulated staff access</div></div><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><circle cx="13" cy="13" r="10" stroke="#4220C8" stroke-width="2.5"/><path d="M13 7v6l4 2" stroke="#4220C8" stroke-width="2" stroke-linecap="round"/></svg></div><div class="int-name">Azure AD</div><div class="int-desc">Microsoft identity for financial services organisations</div></div><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><path d="M13 4C8 4 4 8 4 13s4 9 9 9 9-4 9-9-4-9-9-9z" stroke="#4220C8" stroke-width="2.2"/><path d="M4 13h18M13 4c-2.5 3-4 5.8-4 9s1.5 6 4 9" stroke="#4220C8" stroke-width="1.6"/></svg></div><div class="int-name">BambooHR</div><div class="int-desc">New joiners auto-enrolled in regulatory onboarding from day one</div></div><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><rect x="3" y="6" width="20" height="14" rx="3" stroke="#4220C8" stroke-width="2.2"/><path d="M8 12h10M8 16h6" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round"/></svg></div><div class="int-name">Zoom</div><div class="int-desc">Live regulatory training sessions alongside online compliance modules</div></div><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><path d="M13 3L4 8v5c0 5.5 3.8 10.7 9 12 5.2-1.3 9-6.5 9-12V8L13 3z" stroke="#4220C8" stroke-width="2.2" stroke-linejoin="round"/><path d="M9 13l3 3 5-5" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div><div class="int-name">SAML 2.0 SSO</div><div class="int-desc">Works with any identity provider your organisation uses</div></div></div>
    <div style="text-align:center"><a href="https://kp.kprise.com/about/platform" class="btn-primary">Check Out All Integrations</a></div>
  </div>
</section><section class="sec sw">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Related Use Cases</div>
      <h2 class="heading">Extend Your Training<br><em>Across Every Audience.</em></h2>
    </div>
    <div class="uc-grid"><div class="ucc"><img src="https://images.unsplash.com/photo-1444653614773-995cb1ef9efa?w=700&q=80&auto=format&fit=crop" alt="Compliance Training" loading="lazy" width="360" height="148"><div class="ucc-body"><span class="ucc-tag">Use Case</span><div class="ucc-t">Compliance Training</div><div class="ucc-d">Automated mandatory training assignment, deadline tracking, and audit evidence for every regulatory framework your firm operates under.</div><a href="https://kp.kprise.com/use-cases/compliance" class="ucc-link">Read more <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div></div><div class="ucc"><img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=700&q=80&auto=format&fit=crop" alt="Continuous Learning" loading="lazy" width="360" height="148"><div class="ucc-body"><span class="ucc-tag">Use Case</span><div class="ucc-t">Continuous Learning</div><div class="ucc-d">Keep your team's technical and regulatory knowledge current with structured, role-based continuing education that runs automatically.</div><a href="https://kp.kprise.com/use-cases/upskilling" class="ucc-link">Read more <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div></div><div class="ucc"><img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=700&q=80&auto=format&fit=crop" alt="Healthcare" loading="lazy" width="360" height="148"><div class="ucc-body"><span class="ucc-tag">Industry</span><div class="ucc-t">Healthcare</div><div class="ucc-d">Compliance automation for another highly regulated sector — the same automated training, tracking, and evidence generation applied to clinical requirements.</div><a href="https://kp.kprise.com/industries/healthcare" class="ucc-link">Read more <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div></div></div>
  </div>
</section><section class="sec sw">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Common Questions</div>
      <h2 class="heading">What Financial Services Teams Ask<br><em>Before Starting Their Free Trial</em></h2>
      <p class="lead cx">Can't find your answer? <a href="https://help.kprise.com" target="_blank" rel="noopener" style="color:var(--b);font-weight:700">Visit the Help Center</a> or <a href="https://calendly.com/onlinesales-kprise/30min" style="color:var(--b);font-weight:700">book a call</a>.</p>
    </div>
    <div class="faq-grid"><div class="fi open"><div class="fi-q">Which regulatory frameworks does MyPass LMS support?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">MyPass LMS supports any regulatory training framework you configure — FCA conduct rules, MiFID II, AML, GDPR, SMCR, SEC, FINRA, and any internal policy framework. You define the mandatory training per role and regulation, and MyPass LMS assigns, tracks, and reports on it automatically.</div></div><div class="fi"><div class="fi-q">How does CPD tracking work for FCA-regulated individuals?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">CPD hours are recorded automatically when a regulated individual completes a qualifying training module. Live totals are visible per person at all times. Regulatory body reporting evidence is generated and exported in seconds — no manual entry, no end-of-year reconciliation.</div></div><div class="fi"><div class="fi-q">How quickly can we deploy updated training when regulations change?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Immediately. The MyPass LMS AI builder converts any regulatory update, FCA guidance note, or policy document into a structured training module automatically. Updated training is deployed to all affected roles the same day the regulation changes — not at the next training cycle.</div></div><div class="fi"><div class="fi-q">Can we generate FCA audit evidence instantly?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Yes. Every training completion is timestamped and stored from day one. Audit evidence filtered by regulated population, business unit, regulation type, or individual is generated in seconds. Your compliance team presents complete, current, formatted evidence without any manual data assembly.</div></div><div class="fi"><div class="fi-q">Can we manage different regulatory requirements across jurisdictions?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Yes. MyPass LMS supports multiple regulatory frameworks simultaneously. Different roles and locations can be assigned different mandatory training based on their specific regulatory obligations — UK FCA, EU MiFID II, US SEC, or any other jurisdiction — all managed from one administrative console.</div></div><div class="fi"><div class="fi-q">Is the 15-day trial fully featured for financial services compliance?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Yes. Full platform access for 15 days, no credit card required. Configure mandatory regulatory training by role, test CPD tracking, verify audit reporting, and convert a regulatory document into a training module before committing. <a href='https://mypasslms.us/login#register' style='color:var(--b);font-weight:700'>Start your free trial here</a>.</div></div></div>
  </div>
</section><section class="cta-sec">
  <div class="cta-in">
    <div class="cta-tag">15-Day Free Trial — No Card Required</div>
    <h2 class="cta-h">Regulatory Compliance That Keeps Up<br><em>With the Regulators.</em></h2>
    <p class="cta-p">When regulations change, training deploys the same day. When auditors arrive, evidence is ready in seconds. When new hires join, regulatory onboarding starts automatically. MyPass LMS runs your compliance training programme so your compliance team can focus on what regulators actually care about.</p>
    <div class="cta-btns">
      <a href="https://mypasslms.us/login#register" class="btn-a">Start Free for 15 Days</a>
      <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b">Book a 30-Minute Demo</a>
    </div>
    <p class="cta-note">15-day free trial &middot; No credit card required &middot; Cancel anytime &middot; AWS FedRAMP infrastructure</p>
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
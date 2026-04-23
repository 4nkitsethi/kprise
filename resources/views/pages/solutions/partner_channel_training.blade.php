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
    .hero{background:var(--w);border-bottom:1px solid var(--bdr);padding:52px 48px 0;overflow:hidden;position:relative;min-height:520px}
    .hero::after{content:'';position:absolute;top:0;right:0;bottom:0;width:48%;background:linear-gradient(to right,transparent,var(--bl2) 40%);pointer-events:none}
    .hero-grid{max-width:1200px;margin:0 auto;display:grid;grid-template-columns:1fr 460px;gap:52px;align-items:end;position:relative;z-index:1}
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
    .hero-img-wrap{position:relative;align-self:stretch;display:flex;flex-direction:column;justify-content:flex-end}
    .hero-img{width:100%;height:100%;min-height:380px;object-fit:cover;object-position:center top;border-radius:14px 14px 0 0;box-shadow:0 -4px 32px rgba(66,32,200,0.1);flex:1}
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
    @media(max-width:1024px){.hero-img{height:300px;min-height:unset;flex:none}
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
 </style>
@endpush

@section('content')
<header class="hero">
  <div class="hero-grid">
    <div>
      <nav class="bc" aria-label="Breadcrumb">
        <a href="https://kp.kprise.com">Home</a><span class="bc-sep">/</span>
        <a href="#">Solutions</a><span class="bc-sep">/</span>
        <span>Partner &amp; Channel Training</span>
      </nav>
      <div class="htag"><span class="htag-dot"></span><span>Partner &amp; Channel Training</span></div>
      <h1>Untrained Partners Sell Wrong.<br><em>Certified Partners Sell More.</em></h1>
      <p class="hero-sub">Your partners represent your brand to customers you cannot reach directly. When they are undertrained they misposition your product, onboard customers badly, and escalate issues that a trained partner would resolve independently. <strong>MyPass LMS gives you multi-tenant portals, tiered certification, role-based tracks per partner, and per-partner reporting</strong> — so every partner performs like your best one.</p>
      <div class="hbtns">
        <a href="https://mypasslms.us/login#register" class="btn-a">Start Free for 15 Days</a>
        <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b">Book a Demo</a>
      </div>
      <div class="trust-row"><div class="tchip"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>No credit card required</div><div class="tchip"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>15-day free trial</div><div class="tchip"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Multi-tenant portals included</div></div>
    </div>
    <div class="hero-img-wrap">
      <img class="hero-img" src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=960&q=80&auto=format&fit=crop" alt="Untrained Partners Sell Wrong. Certified Partners Sell More. — MyPass LMS" loading="eager" width="460" height="380">
      <div class="h-float">
        <div class="hf-dot"></div>
        <div><div class="hf-n">3x</div><div class="hf-l">More sales from certified vs uncertified partners</div></div>
      </div>
    </div>
  </div>
</header><div class="logo-bar">
  <p class="lb-lbl">Trusted by nonprofits, associations, and enterprises across 15 countries</p>
  <div class="lb-track-wrap">
    <div class="lb-track" aria-hidden="true">
      <div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-67.png?fit=199%2C100&ssl=1" alt="American Board" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px;"></div>
<div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-69.png?fit=197%2C100&ssl=1" alt="Youth for Understanding" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px;"></div>
<div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-65.png?fit=197%2C100&ssl=1" alt="PDK International" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px;"></div>
<div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-66.png?fit=198%2C100&ssl=1" alt="SBCA" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px;"></div>
<div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-68.png?fit=198%2C99&ssl=1" alt="PDK" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px;"></div>
<div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-67.png?fit=199%2C100&ssl=1" alt="American Board" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px;"></div>
<div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-69.png?fit=197%2C100&ssl=1" alt="Youth for Understanding" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px;"></div>
<div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-65.png?fit=197%2C100&ssl=1" alt="PDK International" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px;"></div>
<div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-66.png?fit=198%2C100&ssl=1" alt="SBCA" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px;"></div>
<div class="lb-item"><img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-68.png?fit=198%2C99&ssl=1" alt="PDK" height="36" loading="lazy" style="height:36px;width:auto;object-fit:contain;max-width:140px;"></div>

    </div>
  </div>
</div>
<div class="stats"><div class="stats-in"><div class="sc"><div class="sc-n">3x</div><div class="sc-l">More sales activity from certified partners compared to uncertified ones</div></div><div class="sc"><div class="sc-n">60%</div><div class="sc-l">Reduction in partner onboarding time with structured automated training paths</div></div><div class="sc"><div class="sc-n">45%</div><div class="sc-l">Fewer partner-escalated support tickets after completion of certification</div></div><div class="sc"><div class="sc-n">Day 1</div><div class="sc-l">Partner portals live and branded from the moment setup is complete</div></div></div></div><section class="sec sw">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Why Partner Training Is Critical</div>
      <h2 class="heading">Your Channel Is Only as Strong<br><em>as Your Least Trained Partner.</em></h2>
      <p class="lead cx">Every partner who does not fully understand your product is a direct risk to your brand. They misposition features, set wrong expectations, escalate avoidable issues, and create churn in accounts you cannot see directly. A structured partner training and certification programme with MyPass LMS closes that gap at scale — across every partner, in every market, at every tier.</p>
    </div>
    <div class="vp-grid"><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg></div><div class="vpc-t">Multi-Tenant Partner Portals</div><div class="vpc-d">Create a separate, branded training environment for each partner organisation. Each portal is isolated, independently managed, and branded to the partner relationship — while you control all content from one central platform.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg></div><div class="vpc-t">Tiered Certification Programmes</div><div class="vpc-d">Build Gold, Silver, Authorised — or your own tier structure. Partners earn certified status by completing required training and passing assessments at mandatory marks. Certification renews automatically at your configured interval.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg></div><div class="vpc-t">Role-Based Partner Tracks</div><div class="vpc-d">Sales reps, technical consultants, and support staff within each partner organisation need different training. MyPass LMS assigns the right track to each role automatically the moment they join the portal.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div><div class="vpc-t">Per-Partner Reporting</div><div class="vpc-d">Certification status, completion rates, and engagement trends for each individual partner organisation. Identify which partners are investing in enablement — and which are a performance risk — before the gap shows in deals.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.87 9.5a19.79 19.79 0 01-3.07-8.67A2 2 0 012.81 1h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L7.09 8.91a16 16 0 006 6l.97-.97a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg></div><div class="vpc-t">Automated Enrolment and Reminders</div><div class="vpc-d">New partner contacts are enrolled in required training immediately when added. Certification renewal reminders go out automatically before expiry. No manual administration from your partner team at any stage.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 19V6l12-3v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="15" r="3"/></svg></div><div class="vpc-t">Consistent Channel Messaging</div><div class="vpc-d">Every partner receives the same foundational training on your product positioning, key features, and common objections — delivered consistently, from the same source, to every partner in every market.</div></div></div>
    <div style="text-align:center"><a href="{{ route('product.features') }}" class="btn-primary">Explore All Platform Features</a></div>
  </div>
</section><div class="feat-wrap"><div class="frow">
    <div class="frow-img">
      <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=880&q=80&auto=format&fit=crop" alt="One Platform. A Branded Environment for Every Partner. — MyPass LMS" loading="lazy" width="560" height="380">
      <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Separate branded portal per partner organisation</span></div>
    </div>
    <div class="frow-txt">
      <div class="eyebrow"><span class="ew"></span>Multi-Tenant Architecture</div>
      <h2 class="heading">One Platform. A Branded Environment<br><em>for Every Partner.</em></h2>
      <p>A single shared training environment across all partners creates confusion, data mixing, and a generic experience that no partner values. MyPass LMS gives each partner their own isolated, branded portal — while you manage all content, certifications, and reporting centrally.</p><p>Each portal has the partner's own branding, custom domain, and isolated learner data. Your team pushes content centrally or manages partner-specific content at account level. Partners experience something built specifically for their relationship with your organisation.</p>
      <div class="fpts"><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Isolated branded portal per partner with custom domain</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Central content management with partner-level customisation</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Partner learner data fully isolated and independently reportable</div></div>
      <a href="{{ route('proudct.features') }}" class="btn-primary" style="margin-top:18px">See Multi-Tenant Features</a>
    </div>
  </div><div class="frow flip">
    <div class="frow-img">
      <img src="https://images.unsplash.com/photo-1512758017271-d7b84c2113f1?w=880&q=80&auto=format&fit=crop" alt="Build a Partner Programme That Partners Compete to Achieve. — MyPass LMS" loading="lazy" width="560" height="380">
      <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Tiered certification programme managed from one console</span></div>
    </div>
    <div class="frow-txt">
      <div class="eyebrow"><span class="ew"></span>Tiered Partner Certification</div>
      <h2 class="heading">Build a Partner Programme That<br><em>Partners Compete to Achieve.</em></h2>
      <p>The most effective partner programmes create a certification tier that partners value and work to attain. Authorised, Silver, Gold — or whatever tier structure fits your programme. Each tier requires specified training at mandatory pass marks. Certified partners earn the designation and access to tier-specific benefits.</p><p>MyPass LMS manages the entire certification lifecycle — from initial enrolment through assessment, certificate issuance, renewal scheduling, and tier-level reporting for your partner management team.</p>
      <div class="fpts"><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Tiered certification with configurable requirements per level</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Mandatory pass marks enforced before certificate issuance</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Renewal reminders sent automatically before certification expires</div></div>
      <a href="{{ route('product.features') }}" class="btn-primary" style="margin-top:18px">See Certification Features</a>
    </div>
  </div><div class="frow">
    <div class="frow-img">
      <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=880&q=80&auto=format&fit=crop" alt="See Which Partners Are Investing in Enablement. — MyPass LMS" loading="lazy" width="560" height="380">
      <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Certification and completion data per partner account</span></div>
    </div>
    <div class="frow-txt">
      <div class="eyebrow"><span class="ew"></span>Per-Partner Reporting</div>
      <h2 class="heading">See Which Partners Are<br><em>Investing in Enablement.</em></h2>
      <p>Your partner management team needs to know which partners are engaged with training and which are not — before the gap shows in deal performance. MyPass LMS gives you certification status, completion rates, and engagement trends for each individual partner organisation.</p><p>Coaching conversations become data-driven. Partner development investment is targeted where it produces the most return. And the partners who are not engaging with training are visible before they cost you a customer.</p>
      <div class="fpts"><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Certification status across every partner account at a glance</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Individual learner completion and assessment data per partner</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Engagement trend data to identify at-risk partner relationships early</div></div>
      
    </div>
  </div><div class="frow flip">
    <div class="frow-img">
      <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=880&q=80&auto=format&fit=crop" alt="Every New Partner Contact Trained from Day One. Automatically. — MyPass LMS" loading="lazy" width="560" height="380">
      <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">60% faster onboarding with automated structured paths</span></div>
    </div>
    <div class="frow-txt">
      <div class="eyebrow"><span class="ew"></span>Automated Partner Onboarding</div>
      <h2 class="heading">Every New Partner Contact<br><em>Trained from Day One. Automatically.</em></h2>
      <p>When a new contact joins a partner organisation they should begin receiving the right training immediately — not when someone on your channel team remembers to add them manually. MyPass LMS enrols new partner contacts in their role-specific onboarding path the moment they are added.</p><p>Product positioning, key features, sales playbooks, technical fundamentals, and objection handling — all delivered in a structured sequence without your team doing anything after initial setup.</p>
      <div class="fpts"><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Automatic enrolment in role-specific path on partner contact addition</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Reminders sent automatically to maintain partner engagement throughout</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Consistent onboarding experience regardless of partner geography or tier</div></div>
      <a href="{{ route('product.features') }}" class="btn-primary" style="margin-top:18px">See Partner Onboarding Features</a>
    </div>
  </div></div><section class="courses-band">
  <div class="courses-inner">
    <div>
      <div class="eyebrow"><span class="ew"></span>Ready-Made Partner Enablement Content</div>
      <h2 class="heading" style="font-size:30px">Partner Training Content Ready to Deploy From Day One</h2>
      <p style="font-size:15px;color:var(--ink3);line-height:1.76;margin-top:10px">Your partner enablement programme does not need to wait for a content team. MyPass LMS includes ready-made course frameworks for product positioning, sales methodology, objection handling, and partner onboarding — professionally structured and ready to customise with your product specifics. Deploy to every partner portal immediately on day one.</p>
      <div class="courses-btns">
        <a href="{{ route('courses') }}" class="btn-lib">Browse the Course Library</a>
        <a href="{{ route('pricing') }}" class="btn-lib2">Start Free Trial</a>
      </div>
    </div>
    <div>
      <div class="courses-card">
        <p style="font-size:11px;font-weight:800;letter-spacing:.09em;text-transform:uppercase;color:var(--ink4);margin-bottom:14px">Courses ready from day one — no setup required</p>
        <div class="courses-chips"><span class="cchip">Product Positioning</span><span class="cchip">Sales Methodology</span><span class="cchip">Objection Handling</span><span class="cchip">Partner Onboarding</span><span class="cchip">Competitive Intelligence</span><span class="cchip">Technical Certification</span><span class="cchip">Support Fundamentals</span><span class="cchip">Deal Registration Process</span></div>
        <p class="note">All courses SCORM-ready &middot; Fully customisable to your brand &middot; Assignable in one click</p>
      </div>
    </div>
  </div>
</section><section class="hl-band">
  <div class="hl-inner">
    <div>
      <div class="eyebrow"><span class="ew"></span>The Partner Certification ROI</div>
      <h2 class="hl-h">Certified Partners Generate<br><em>Measurably More Revenue.</em></h2>
      <p class="hl-p">The correlation between partner training completion and partner sales performance is consistent across every industry with channel programmes. Partners who are certified sell more accurately, close faster, create fewer support escalations, and deliver better customer experiences.</p>
      <a href="https://kprise.com/case-study/" class="btn-primary" style="margin-top:0" target="_blank" rel="noopener">Read Customer Case Studies</a>
    </div>
    <div><div class="hlm"><div class="hlm-n">3x</div><div><div class="hlm-t">More sales activity from certified vs uncertified partners</div><div class="hlm-d">Certified partners consistently outperform uncertified ones on deal volume, size, and close rate across every sector.</div></div></div><div class="hlm"><div class="hlm-n">60%</div><div><div class="hlm-t">Reduction in partner onboarding time</div><div class="hlm-d">Automated structured paths cut the time from partner agreement to revenue-generating activity by more than half.</div></div></div><div class="hlm"><div class="hlm-n">45%</div><div><div class="hlm-t">Fewer partner-escalated support tickets after certification</div><div class="hlm-d">Certified partners resolve common issues themselves rather than escalating — reducing your support burden significantly.</div></div></div></div>
  </div>
</section><section class="sec stint">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Recognised by Independent Reviewers</div>
      <h2 class="heading">Rated by Channel and Partner<br><em>Teams Across the Market</em></h2>
      <p class="lead cx">Independent ratings from channel managers, partner enablement leaders, and L&D professionals who evaluated MyPass LMS against the full field.</p>
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
</section><section class="sec sw">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Customer Stories</div>
      <h2 class="heading">What Partner Teams Say<br><em>About MyPass LMS</em></h2>
    </div>
    <div class="tc-grid">
      <div class="tc feat"><div class="tc-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div><div class="tc-q">&ldquo;</div><div class="tc-body">MyPass LMS scaled with us quickly. Branded portals let us deliver training to partners globally while maintaining programme standards across every account. Per-partner reporting made it immediately visible which partners were investing in enablement — and that data fed directly into our partner prioritisation decisions for the following quarter.</div><div class="tc-author"><div class="tc-av" style="background:linear-gradient(135deg,#4220C8,#7B5EEA)">VS</div><div><div class="tc-name">Varun S.</div><div class="tc-role">CEO &middot; Information Technology &amp; Services</div></div></div></div>
      <div class="tc"><div class="tc-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div><div class="tc-q">&ldquo;</div><div class="tc-body">We have been a Kprise client for over four years. The multi-tenant capability was the feature that made MyPass LMS the obvious choice. Each of our 40+ partner organisations has their own isolated, branded portal. Our team manages everything centrally. Our partners experience it as if we built something specifically for them.</div><div class="tc-author"><div class="tc-av" style="background:linear-gradient(135deg,#2A7A5C,#1D5C45)">SD</div><div><div class="tc-name">Shawn D.</div><div class="tc-role">Director &middot; American Board</div></div></div></div>
      <div class="tc"><div class="tc-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div><div class="tc-q">&ldquo;</div><div class="tc-body">The certification programme launched in two weeks. Automated reminders keep partner contacts progressing without anyone on our team chasing them. The reporting tells us exactly which partners are on track and which need attention from our partner success team — before it shows up in deal performance.</div><div class="tc-author"><div class="tc-av" style="background:linear-gradient(135deg,#A06830,#7A4E20)">AS</div><div><div class="tc-name">Ashleigh S.</div><div class="tc-role">Senior Learning Partner &middot; UAE Organisation</div></div></div></div>
    </div>
    <div style="text-align:center"><a href="https://kprise.com/case-study/" class="btn-ghost" target="_blank" rel="noopener">Read Full Case Studies</a></div>
  </div>
</section><section class="sec sbg">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Integrations</div>
      <h2 class="heading">Connects to Your CRM<br><em>and Partner Management Stack.</em></h2>
      <p class="lead cx">MyPass LMS connects to the tools your channel and partner teams already use so certification and training data flows to the systems where partner performance is tracked and managed.</p>
    </div>
    <div class="int-grid"><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><rect x="3" y="3" width="9" height="9" rx="2" fill="#4220C8"/><rect x="14" y="3" width="9" height="9" rx="2" fill="#4220C8" opacity=".5"/><rect x="3" y="14" width="9" height="9" rx="2" fill="#4220C8" opacity=".5"/><rect x="14" y="14" width="9" height="9" rx="2" fill="#4220C8"/></svg></div><div class="int-name">Okta SSO</div><div class="int-desc">SSO for frictionless partner contact access</div></div><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><circle cx="13" cy="13" r="10" stroke="#4220C8" stroke-width="2.5"/><path d="M13 7v6l4 2" stroke="#4220C8" stroke-width="2" stroke-linecap="round"/></svg></div><div class="int-name">Azure AD</div><div class="int-desc">Microsoft identity for enterprise partner organisations</div></div><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z" stroke="#4220C8" stroke-width="2"/></svg></div><div class="int-name">Salesforce</div><div class="int-desc">Partner certification synced to CRM partner records</div></div><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><rect x="3" y="6" width="20" height="14" rx="3" stroke="#4220C8" stroke-width="2.2"/><path d="M8 12h10M8 16h6" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round"/></svg></div><div class="int-name">Zoom</div><div class="int-desc">Live partner training and certification sessions</div></div><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><path d="M13 3L4 8v5c0 5.5 3.8 10.7 9 12 5.2-1.3 9-6.5 9-12V8L13 3z" stroke="#4220C8" stroke-width="2.2" stroke-linejoin="round"/><path d="M9 13l3 3 5-5" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div><div class="int-name">SAML 2.0 SSO</div><div class="int-desc">Works with any partner organisation identity provider</div></div></div>
    <div style="text-align:center"><a href="https://kp.kprise.com/about/platform" class="btn-primary">Check Out All Integrations</a></div>
  </div>
</section><section class="sec sw">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Related Use Cases</div>
      <h2 class="heading">Partner Training Connects to<br><em>Your Wider Training Strategy.</em></h2>
    </div>
    <div class="uc-grid"><div class="ucc"><img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?w=700&q=80&auto=format&fit=crop" alt="Customer Training &amp; Education" loading="lazy" width="360" height="148"><div class="ucc-body"><span class="ucc-tag">Use Case</span><div class="ucc-t">Customer Training &amp; Education</div><div class="ucc-d">Deliver the same structured product training to direct customers. Branded portals, certifications, and adoption tracking in one unified platform across all external audiences.</div><a href="https://kp.kprise.com/use-cases/customer-training" class="ucc-link">Read more <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div></div><div class="ucc"><img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=700&q=80&auto=format&fit=crop" alt="Sales Enablement" loading="lazy" width="360" height="148"><div class="ucc-body"><span class="ucc-tag">Use Case</span><div class="ucc-t">Sales Enablement</div><div class="ucc-d">Align your internal sales team with the same product knowledge framework your partners are certified on. Consistent messaging across direct and indirect channels.</div><a href="https://kp.kprise.com/use-cases/sales" class="ucc-link">Read more <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div></div><div class="ucc"><img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=700&q=80&auto=format&fit=crop" alt="Compliance Training" loading="lazy" width="360" height="148"><div class="ucc-body"><span class="ucc-tag">Use Case</span><div class="ucc-t">Compliance Training</div><div class="ucc-d">Extend mandatory compliance training to partner contacts through the same platform. One audit trail, one platform, no duplication of administration.</div><a href="https://kp.kprise.com/use-cases/compliance" class="ucc-link">Read more <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div></div></div>
  </div>
</section><section class="sec sbg">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Learning Resources</div>
      <h2 class="heading">Guides for Channel and<br><em>Partner Enablement Teams.</em></h2>
    </div>
    <div class="res-grid"><div class="rcard"><span class="rtype">Guide</span><div class="rt">Learning Insights Hub — Partner Enablement Strategy and Channel LMS Selection Guides</div><div class="rd">Practical guides on building a partner certification programme, measuring enablement ROI on partner deal performance, and selecting the right LMS for multi-tenant partner training at scale.</div><a href="https://kprise.com/learning-insights-hub/" class="rlink" target="_blank" rel="noopener">Access the guides <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div><div class="rcard"><span class="rtype">Case Study</span><div class="rt">How Companies Use MyPass LMS to Build Partner Certification Programmes</div><div class="rd">Real accounts from channel teams that built multi-tenant partner training on MyPass LMS — what changed in partner performance, support escalations, and deal velocity after certification was introduced.</div><a href="https://kprise.com/case-study/" class="rlink" target="_blank" rel="noopener">Read case studies <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div><div class="rcard"><span class="rtype">Comparison</span><div class="rt">MyPass LMS vs TalentLMS, Docebo, and Allego on Partner Training Features</div><div class="rd">Feature-by-feature comparisons covering multi-tenant portals, partner-level reporting, tiered certification, and automated enrolment against every major partner training platform.</div><a href="https://kprise.com/lms-comparisons/" class="rlink" target="_blank" rel="noopener">Compare platforms <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div></div>
  </div>
</section><section class="sec sw">
  <div class="wrap">
    <div class="cx">
      <div class="eyebrow"><span class="ew"></span>Common Questions</div>
      <h2 class="heading">What Channel and Partner Teams Ask<br><em>Before Their Free Trial.</em></h2>
      <p class="lead cx">Can't find your answer? Our team responds same day — <a href="https://help.kprise.com" target="_blank" rel="noopener" style="color:var(--b);font-weight:700">visit the Help Center</a> or <a href="https://calendly.com/onlinesales-kprise/30min" style="color:var(--b);font-weight:700">book a call</a>.</p>
    </div>
    <div class="faq-grid"><div class="fi open"><div class="fi-q">Can each partner organisation have their own isolated portal?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Yes. MyPass LMS multi-tenant architecture gives each partner their own isolated training environment with custom branding, custom domain, and learner data completely separate from other portals. You manage all content and certifications centrally while each partner experiences their own portal independently.</div></div><div class="fi"><div class="fi-q">Can we build tiered certification like Gold, Silver, Authorised?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Yes. You configure whatever tier structure fits your programme. Each tier requires completing specific training and passing assessments at mandatory marks you define. Partners earn their designation, receive a branded certificate, and progress to the next tier when requirements are met. Certification renewals are scheduled automatically.</div></div><div class="fi"><div class="fi-q">How do we see training data for each individual partner?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">The per-partner reporting dashboard shows certification status, course completion rates, assessment scores, and engagement trends for each individual partner organisation. Filter by partner, time period, training programme, or tier. Reports are exportable and shareable with your partner management team.</div></div><div class="fi"><div class="fi-q">Can partners access training with their existing login credentials?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Yes. MyPass LMS supports SAML 2.0 SSO so partner contacts access training using credentials from their own organisation's identity provider. No separate account, no password to manage. Partners arrive at their branded portal and start training immediately.</div></div><div class="fi"><div class="fi-q">Are new partner contacts enrolled automatically when added?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Yes. When a new partner contact is added to the portal their role-specific onboarding path begins automatically. Reminders are sent on a schedule you configure. Your team does not need to manually assign courses or follow up on completion at any stage.</div></div><div class="fi"><div class="fi-q">Is the 15-day free trial fully featured for partner training?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Yes, completely. Set up partner portals, build certification paths, test per-partner reporting, and configure automated enrolment before committing. Full platform access, no credit card required. <a href='https://mypasslms.us/login#register'>Start your free trial here</a>.</div></div></div>
  </div>
</section><section class="cta-sec">
  <div class="cta-in">
    <div class="cta-tag">15-Day Free Trial — No Card Required</div>
    <h2 class="cta-h">Certify Your Channel.<br><em>Grow Your Revenue.</em></h2>
    <p class="cta-p">Untrained partners cost you deals, customers, and brand equity you cannot see. MyPass LMS gives you multi-tenant portals, tiered certification, automated onboarding, and per-partner reporting — everything needed to build a partner programme that every partner competes to achieve and your whole channel benefits from.</p>
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

@push('schema')
@verbatim

@endverbatim
@endpush

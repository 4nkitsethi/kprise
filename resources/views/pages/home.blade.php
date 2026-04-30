{{--
    Page: Homepage
    Route: home
    Controller: HomeController@index
--}}

@extends('layouts.app')

@push('styles')
    <style>
        *,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
        html{scroll-behavior:smooth}
        body{font-family:'Plus Jakarta Sans',sans-serif;background:#F8F8FB;color:#0F0C1F;line-height:1.65;-webkit-font-smoothing:antialiased;overflow-x:hidden}
        img{max-width:100%;display:block}
        a{color:inherit;text-decoration:none}
        :root{--b:var(--color-primary);--bd:var(--color-primary-dark);--bm:var(--color-primary-mid);--bl:var(--color-primary-light);--bl2:var(--color-gray-100);--bg:var(--color-surface);--w:var(--color-white);--ink:var(--color-text-primary);--ink2:var(--color-gray-800);--ink3:var(--color-text-secondary);--ink4:var(--color-text-muted);--ok:var(--color-success);--bdr:rgba(66,32,200,0.08);--bdr2:rgba(66,32,200,0.16);--sh:0 1px 3px rgba(66,32,200,0.04),0 4px 14px rgba(66,32,200,0.06);--sh2:0 4px 14px rgba(66,32,200,0.08),0 12px 32px rgba(66,32,200,0.08);--sh3:0 8px 24px rgba(66,32,200,0.10),0 20px 48px rgba(66,32,200,0.10);--gr:linear-gradient(135deg,var(--b),var(--bd));--rad:16px}

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
        .eyebrow{display:inline-flex;align-items:center;gap:6px;font-size:14px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);margin-bottom:10px}
        .eyebrow .ew{width:16px;height:2.5px;background:var(--gr);border-radius:2px;flex-shrink:0}
        .heading{font-size:34px;font-weight:800;line-height:1.30;color:var(--ink);margin-bottom:12px}
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
          .sec,.courses-band,.hl-band,.cta-sec{padding-left:20px;padding-right:20px}
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

        /* ══ LANDING PAGE ══════════════════════════════════════════════════════════ */

        /* ── STICKY CTA BAR ─────────────────────────────────────────────────────── */
        .sticky-bar{position:fixed;bottom:0;left:0;right:0;z-index:500;background:rgba(255,255,255,.97);backdrop-filter:blur(16px);border-top:1px solid var(--bdr);padding:14px 48px;display:flex;align-items:center;justify-content:space-between;box-shadow:0 -4px 24px rgba(66,32,200,.08);transform:translateY(100%);transition:transform .4s cubic-bezier(.16,1,.3,1)}
        .sticky-bar.show{transform:translateY(0)}
        .sticky-bar-left{font-size:15px;font-weight:700;color:var(--ink)}
        .sticky-bar-sub{font-size:12.5px;color:var(--ink3);font-weight:400;margin-left:8px}
        .sticky-bar-btns{display:flex;gap:10px;align-items:center}

        /* ── HERO ────────────────────────────────────────────────────────────────── */
        .lp-hero{background:var(--w);position:relative;overflow:hidden;padding:50px 48px 0;border-bottom:1px solid var(--bdr)}
        .lp-hero::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 70% 50% at 50% 0%,#EEE9FF 0%,transparent 70%);pointer-events:none}
        .lp-hero-wrap{max-width:1560px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:end;position:relative;z-index:1}
        .lp-hero-eyebrow{display:inline-flex;align-items:center;gap:7px;font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;color:var(--b);background:var(--bl);border:1px solid var(--bdr2);border-radius:100px;padding:5px 14px;margin-bottom:20px}
        .lp-hero-eyebrow-dot{width:7px;height:7px;background:var(--b);border-radius:50%;animation:pulse2 2s ease-in-out infinite}
        @keyframes pulse2{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.4;transform:scale(.8)}}
        .lp-hero h1{font-size:54px;font-weight:900;line-height:1.04;letter-spacing:-2.5px;color:var(--ink);margin-bottom:18px}
        .lp-hero h1 em{font-style:normal;background:linear-gradient(135deg,#4220C8,#7B5EEA);-webkit-background-clip:text;background-clip:text;color:transparent}
        .lp-hero-sub{font-size:18px;color:var(--ink3);line-height:1.68;margin-bottom:10px;max-width:480px;font-weight:500}
        .lp-hero-proof{font-size:14px;color:var(--ink4);margin-bottom:32px;font-weight:500}
        .lp-hero-btns{display:flex;gap:10px;align-items:center;flex-wrap:wrap;margin-bottom:36px}
        .lp-hero-trust{display:flex;align-items:center;gap:20px;flex-wrap:wrap;padding-bottom:10px}
        .lp-trust-item{display:flex;align-items:center;gap:6px;font-size:14px;color:var(--ink4);font-weight:500}
        .lp-trust-item svg{width:14px;height:14px;fill:var(--ok);flex-shrink:0}
        .lp-hero-img-wrap{position:relative;align-self:stretch;display:flex;flex-direction:column;justify-content:flex-end}
        .lp-hero-img{width:100%;height:100%;min-height:440px;object-fit:cover;object-position:center top;border-radius:16px 16px 0 0;box-shadow:-8px -8px 40px rgba(66,32,200,.1);flex:1}
        .lp-hero-float{position:absolute;bottom:32px;left:-24px;background:var(--w);border:1px solid var(--bdr);border-radius:14px;padding:14px 18px;box-shadow:var(--sh3);display:flex;align-items:center;gap:12px;z-index:2}
        .lp-hero-float-icon{width:38px;height:38px;background:var(--b);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
        .lp-hero-float-icon svg{width:18px;height:18px;stroke:#fff;fill:none;stroke-width:2.2}
        .lp-hero-float-n{font-size:18px;font-weight:900;color:var(--ink);letter-spacing:-0.5px;line-height:1}
        .lp-hero-float-l{font-size:12px;color:var(--ink4);font-weight:500;margin-top:2px}

        /* ── QUICK START STRIP ───────────────────────────────────────────────────── */
        .qs-strip{background:var(--b);padding:28px 48px}
        .qs-strip-in{max-width:1560px;margin:0 auto;display:flex;align-items:center;flex-wrap:wrap;gap:32px}
        .qs-strip-label{font-size:12px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.6);margin-bottom:12px}
        .qs-steps{display:flex;align-items:center;gap:0;flex-wrap:wrap;gap:4px}
        .qs-step{display:flex;align-items:center;gap:8px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);border-radius:10px;padding:10px 16px;font-size:13.5px;font-weight:700;color:#fff}
        .qs-step-num{width:24px;height:24px;background:rgba(255,255,255,.15);border-radius:50%;font-size:11px;font-weight:800;display:flex;align-items:center;justify-content:center;flex-shrink:0}
        .qs-arr{font-size:16px;color:rgba(255,255,255,.35);margin:0 2px}
        .qs-result{font-size:16px;font-weight:900;color:#fff;border-left:1px solid rgba(255,255,255,.2);padding-left:20px;margin-top:32px}

        /* ── WHAT HAPPENS NEXT ───────────────────────────────────────────────────── */
        .whn-sec{background:var(--bg);padding:88px 48px}
        .whn-wrap{max-width:1160px;margin:0 auto}
        .whn-grid{display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center;margin-top:48px}
        .whn-items{display:flex;flex-direction:column;gap:0}
        .whn-item{display:flex;align-items:center;gap:14px;padding:16px 0;border-bottom:1px solid var(--bdr)}
        .whn-item:last-child{border-bottom:none}
        .whn-item-icon{width:36px;height:36px;background:var(--bl);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
        .whn-item-icon svg{width:16px;height:16px;stroke:var(--b);fill:none;stroke-width:2.2}
        .whn-item-name{font-size:15px;font-weight:700;color:var(--ink);flex:1}
        .whn-item-badge{font-size:11px;font-weight:800;background:var(--b);color:#fff;border-radius:6px;padding:3px 10px;white-space:nowrap}
        .whn-item-badge.ok{background:#16A34A}
        .whn-note{background:var(--w);border:1px solid var(--bdr);border-radius:16px;padding:24px;margin-top:24px;box-shadow:var(--sh)}
        .whn-note-h{font-size:15px;font-weight:800;color:var(--ink);margin-bottom:6px}
        .whn-note-p{font-size:13.5px;color:var(--ink3);line-height:1.65}
        .whn-img{border-radius:20px;overflow:hidden;box-shadow:var(--sh3)}
        .whn-img img{width:100%;height:420px;object-fit:cover;display:block}

        /* ── STACK REPLACE ───────────────────────────────────────────────────────── */
        .stack-sec{background:var(--w);padding:88px 48px;position:relative;overflow:hidden}
        .stack-sec::before{content:'';position:absolute;top:-80px;right:-80px;width:360px;height:360px;border-radius:50%;background:radial-gradient(circle,var(--bl) 0%,transparent 70%);pointer-events:none}
        .stack-wrap{max-width:1500px;margin:0 auto}
        .stack-compare{display:grid;grid-template-columns:1fr auto 1fr;gap:24px;align-items:start;margin-top:48px}
        .stack-col{background:var(--bg);border:1px solid var(--bdr);border-radius:20px;overflow:hidden}
        .stack-col.mypass{background:var(--b);border-color:var(--b)}
        .stack-col-head{padding:20px 24px;border-bottom:1px solid var(--bdr);display:flex;align-items:center;gap:10px}
        .stack-col.mypass .stack-col-head{border-bottom:1px solid rgba(255,255,255,.15)}
        .stack-col-title{font-size:13px;font-weight:800;color:var(--ink);letter-spacing:.04em;text-transform:uppercase}
        .stack-col.mypass .stack-col-title{color:#fff}
        .stack-col-tag{font-size:10px;font-weight:800;padding:3px 8px;border-radius:5px;background:var(--bl);color:var(--b)}
        .stack-col.mypass .stack-col-tag{background:rgba(255,255,255,.15);color:#fff}
        .stack-items{padding:16px 0}
        .stack-item{display:flex;align-items:center;gap:10px;padding:11px 24px;font-size:13.5px;font-weight:600;color:var(--ink3);transition:background .15s}
        .stack-item:hover{background:rgba(66,32,200,.03)}
        .stack-col.mypass .stack-item{color:rgba(255,255,255,.85)}
        .stack-item-dot{width:8px;height:8px;border-radius:50%;background:var(--bdr2);flex-shrink:0}
        .stack-col.mypass .stack-item-dot{background:rgba(255,255,255,.3)}
        .stack-item-icon{width:28px;height:28px;background:var(--bl);border-radius:7px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
        .stack-col.mypass .stack-item-icon{background:rgba(255,255,255,.15)}
        .stack-item-icon svg{width:13px;height:13px;stroke:var(--b);fill:none;stroke-width:2.2}
        .stack-col.mypass .stack-item-icon svg{stroke:#fff}
        .stack-arrow{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;padding-top:80px}
        .stack-arrow-circle{width:56px;height:56px;background:var(--b);border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 20px rgba(66,32,200,.3)}
        .stack-arrow-circle svg{width:22px;height:22px;stroke:#fff;fill:none;stroke-width:2.5}
        .stack-arrow-label{font-size:11px;font-weight:700;color:var(--b);text-align:center;letter-spacing:.04em;text-transform:uppercase}
        .stack-col-total{padding:16px 24px;border-top:1px solid var(--bdr);display:flex;align-items:center;justify-content:space-between}
        .stack-col.mypass .stack-col-total{border-top:1px solid rgba(255,255,255,.15)}
        .stack-total-label{font-size:12px;font-weight:700;color:var(--ink4)}
        .stack-col.mypass .stack-total-label{color:rgba(255,255,255,.6)}
        .stack-total-price{font-size:22px;font-weight:900;color:var(--ink);letter-spacing:-1px}
        .stack-col.mypass .stack-total-price{color:#fff}
        .stack-total-price s{color:var(--ink4);font-weight:600;font-size:15px;margin-right:6px;text-decoration:line-through}
        .stack-total-price.green{color:#16A34A}

        /* ── PRICING CALLOUT ─────────────────────────────────────────────────────── */
        .price-callout{background:var(--bg);padding:80px 48px}
        .price-callout-wrap{max-width:900px;margin:0 auto;text-align:center}
        .price-big{font-size:80px;font-weight:900;letter-spacing:-4px;color:var(--b);line-height:1;margin:24px 0 8px}
        .price-old{font-size:22px;color:var(--ink4);text-decoration:line-through;font-weight:500;margin-bottom:4px}
        .price-note{font-size:16px;color:var(--ink3);margin-bottom:36px}
        .price-pills{display:flex;justify-content:center;gap:10px;flex-wrap:wrap;margin-bottom:36px}
        .price-pill{display:flex;align-items:center;gap:6px;font-size:13px;font-weight:600;color:var(--ink3);background:var(--w);border:1px solid var(--bdr);border-radius:100px;padding:7px 16px}
        .price-pill svg{width:14px;height:14px;stroke:var(--ok);fill:none;stroke-width:2.5;flex-shrink:0}

        /* ── BUILT DIFFERENT ─────────────────────────────────────────────────────── */
        /* ── WHO THIS IS FOR ─────────────────────────────────────────────────────── */
        .who-sec{background:var(--bg);padding:88px 48px}
        .who-wrap{max-width:1500px;margin:0 auto}
        .who-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-top:48px}
        .who-card{background:var(--w);border:1px solid var(--bdr);border-radius:20px;padding:32px;box-shadow:var(--sh);transition:all .25s;position:relative;overflow:hidden}
        .who-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(135deg,var(--b),var(--bm));opacity:0;transition:opacity .22s}
        .who-card:hover{transform:translateY(-4px);box-shadow:var(--sh3);border-color:var(--bdr2)}
        .who-card:hover::before{opacity:1}
        .who-card-num{font-size:44px;font-weight:900;letter-spacing:-2px;background:linear-gradient(135deg,var(--b),var(--bm));-webkit-background-clip:text;background-clip:text;color:transparent;line-height:1;margin-bottom:14px}
        .who-card-h{font-size:18px;font-weight:800;color:var(--ink);margin-bottom:10px;letter-spacing:-.3px}
        .who-card-p{font-size:13.5px;color:var(--ink3);line-height:1.68}
        .who-card-img{width:100%;height:160px;object-fit:cover;border-radius:12px;margin-bottom:20px}
        .who-replaces{background:var(--b);border-radius:14px;padding:6px 14px;font-size:12px;font-weight:700;color:#fff;display:inline-flex;align-items:center;gap:6px;margin-top:16px}
        .who-replaces svg{width:12px;height:12px;stroke:#fff;fill:none;stroke-width:2.5}

        /* ── FEATURES MINI GRID ──────────────────────────────────────────────────── */






        .fm-icon svg{width:18px;height:18px;stroke:var(--b);fill:none;stroke-width:2}




        /* ── SOCIAL PROOF ────────────────────────────────────────────────────────── */
        .proof-sec{background:var(--bg);padding:88px 48px}
        .proof-wrap{max-width:1500px;margin:0 auto}
        .proof-stats{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;margin-top:48px}
        .proof-stat{background:var(--w);border:1px solid var(--bdr);border-radius:16px;padding:28px;text-align:center;box-shadow:var(--sh)}
        .proof-stat-n{font-size:40px;font-weight:900;letter-spacing:-2px;background:linear-gradient(135deg,var(--b),var(--bm));-webkit-background-clip:text;background-clip:text;color:transparent;line-height:1;margin-bottom:6px}
        .proof-stat-l{font-size:13px;color:var(--ink4);font-weight:500}
        .proof-quotes{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:20px}
        .proof-quote{background:var(--w);border:1px solid var(--bdr);border-radius:16px;padding:24px;position:relative;overflow:hidden;box-shadow:var(--sh)}
        .proof-quote::before{content:'"';position:absolute;top:8px;left:14px;font-size:60px;font-weight:900;color:var(--b);opacity:.06;line-height:1}
        .proof-quote-txt{font-size:14px;color:var(--ink3);line-height:1.72;margin-bottom:16px;padding-top:4px}
        .proof-quote-av{display:flex;align-items:center;gap:10px}
        .proof-av{width:38px;height:38px;border-radius:50%;font-size:13px;font-weight:800;color:#fff;display:flex;align-items:center;justify-content:center;flex-shrink:0}
        .proof-av-name{font-size:13px;font-weight:700;color:var(--ink)}
        .proof-av-role{font-size:11.5px;color:var(--ink4);margin-top:1px}
        .proof-logo-row{display:flex;align-items:center;gap:32px;flex-wrap:wrap;margin-top:32px;padding-top:32px;border-top:1px solid var(--bdr);justify-content:center}
        .proof-logo{font-size:13px;font-weight:800;color:var(--ink4);letter-spacing:.02em;opacity:.6}

        /* ── FINAL CTA ───────────────────────────────────────────────────────────── */
        .final-cta{background:var(--b);padding:96px 48px;text-align:center;position:relative;overflow:hidden}
        .final-cta::before{content:'';position:absolute;top:-100px;left:50%;transform:translateX(-50%);width:600px;height:600px;border-radius:50%;background:radial-gradient(circle,rgba(255,255,255,.06) 0%,transparent 70%);pointer-events:none}
        .final-cta-wrap{max-width:720px;margin:0 auto;position:relative;z-index:1}
        .final-cta-tag{display:inline-flex;align-items:center;gap:6px;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.6);background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);border-radius:100px;padding:5px 14px;margin-bottom:24px}
        .final-cta h2{font-size:48px;font-weight:900;letter-spacing:-2px;color:#fff;line-height:1.06;margin-bottom:16px}
        .final-cta h2 em{font-style:normal;color:rgba(255,255,255,.65)}
        .final-cta p{font-size:17px;color:rgba(255,255,255,.7);line-height:1.7;margin-bottom:36px;max-width:500px;margin-left:auto;margin-right:auto}
        .final-cta-btns{display:flex;justify-content:center;gap:12px;flex-wrap:wrap;margin-bottom:20px}
        .btn-white{display:inline-flex;align-items:center;gap:7px;background:#fff;color:var(--b);font-size:15px;font-weight:800;padding:14px 28px;border-radius:12px;border:2px solid #fff;transition:all .2s;font-family:inherit}
        .btn-white:hover{background:transparent;color:#fff}
        .btn-outline-white{display:inline-flex;align-items:center;gap:7px;background:transparent;color:#fff;font-size:15px;font-weight:700;padding:13px 26px;border-radius:12px;border:2px solid rgba(255,255,255,.3);transition:all .2s;font-family:inherit}
        .btn-outline-white:hover{border-color:#fff;background:rgba(255,255,255,.08)}
        .final-cta-note{font-size:12.5px;color:rgba(255,255,255,.45);margin-top:4px}

        /* ── RESPONSIVE ──────────────────────────────────────────────────────────── */
        @media(max-width:1024px){
          .lp-hero-wrap{grid-template-columns:1fr}
          .whn-grid{grid-template-columns:1fr}
          .lp-hero h1{font-size:40px}
          .lp-hero-float{display:none}
          .lp-hero-img{height:320px;min-height:unset;flex:none}
          .who-grid{grid-template-columns:1fr 1fr}
          .proof-stats{grid-template-columns:repeat(2,1fr)}
          .stack-compare{grid-template-columns:1fr;gap:16px}
          .stack-arrow{flex-direction:row;padding-top:0;padding:8px 0}
          .price-big{font-size:56px}
          .sticky-bar{padding:12px 24px}
          .lp-hero,.whn-sec,.stack-sec,.price-callout,.bd-sec,.who-sec,.proof-sec,.final-cta,.how-sec{padding-left:24px;padding-right:24px}
          .qs-strip{padding:24px}
        }
        @media(max-width:640px){
          .lp-hero h1{font-size:32px}
          .who-grid,.proof-quotes{grid-template-columns:1fr}
          .proof-stats{grid-template-columns:1fr 1fr}
          .final-cta h2{font-size:32px}
          .price-big{font-size:44px}
          .sticky-bar{padding:10px 16px;flex-direction:column;gap:8px;align-items:stretch}
          .sticky-bar-btns{justify-content:center}
          .sticky-bar-sub{display:none}
          .lp-hero,.whn-sec,.stack-sec,.price-callout,.bd-sec,.who-sec,.proof-sec,.final-cta,.how-sec{padding-left:16px;padding-right:16px}
          .qs-strip{padding:16px}
          .int-grid{grid-template-columns:1fr}
        }


        /* ── RELATED LINKS ─────────────────────────────────────────────────────────── */
        .related-sec{background:var(--w);padding:80px 48px;border-top:1px solid var(--bdr)}
        .related-wrap{max-width:1500px;margin:0 auto}
        .related-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:32px;margin-top:40px}
        .rel-group{background:var(--bg);border:1px solid var(--bdr);border-radius:16px;padding:24px;transition:all .2s}
        .rel-group:hover{border-color:var(--bdr2);box-shadow:var(--sh)}
        .rel-group-label{font-size:10px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;color:var(--b);margin-bottom:16px;padding-bottom:10px;border-bottom:1px solid var(--bdr)}
        .rel-links{display:flex;flex-direction:column;gap:4px}
        .rel-link{display:flex;align-items:center;gap:9px;padding:9px 10px;border-radius:8px;font-size:13.5px;font-weight:600;color:var(--ink3);transition:all .16s;text-decoration:none}
        .rel-link:hover{background:var(--bl);color:var(--b)}
        .rel-link svg{width:14px;height:14px;stroke:var(--ink4);fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;flex-shrink:0;transition:stroke .16s}
        .rel-link:hover svg{stroke:var(--b)}
        .rel-arr{margin-left:auto;font-size:13px;opacity:.4;transition:all .16s}
        .rel-link:hover .rel-arr{opacity:1;transform:translateX(3px)}
        @media(max-width:1024px){.related-grid{grid-template-columns:1fr 1fr}}
        @media(max-width:640px){.related-grid{grid-template-columns:1fr}.related-sec{padding:48px 20px}}



        .outcomes-wrap{max-width:1160px;margin:0 auto}


        .oc-card:hover{border-color:var(--bdr2);box-shadow:var(--sh3);transform:translateY(-4px)}
        .oc-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--b),var(--bm));opacity:0;transition:opacity .22s}
        .oc-card:hover::before{opacity:1}


        .oc-card-icon svg{width:20px;height:20px;stroke:var(--b)}










        @media(max-width:1024px){}
        @media(max-width:640px){}


        /* ── HOW IT WORKS ──────────────────────────────────────────────────────────── */
        .how-sec{background:var(--bg);padding:88px 48px;border-top:1px solid var(--bdr)}
        .how-wrap{max-width:1500px;margin:0 auto}
        .how-steps{display:flex;flex-direction:column;gap:0;margin-top:52px}
        .how-step{display:grid;grid-template-columns:64px 1fr 380px;gap:32px;align-items:start;padding:40px 0;border-bottom:1px solid var(--bdr)}
        .how-step:last-child{border-bottom:none}
        .how-step-left{display:flex;flex-direction:column;align-items:center;gap:0;padding-top:4px}
        .how-step-num{width:42px;height:42px;border-radius:50%;background:var(--b);color:#fff;font-size:14px;font-weight:900;display:flex;align-items:center;justify-content:center;flex-shrink:0;box-shadow:0 4px 16px rgba(66,32,200,.25)}
        .how-step-line{width:2px;background:linear-gradient(to bottom,var(--b),transparent);flex:1;min-height:40px;margin-top:8px}
        .how-step-tag{font-size:10.5px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);background:var(--bl);border-radius:6px;padding:3px 10px;display:inline-block;margin-bottom:12px}
        .how-step-h{font-size:20px;font-weight:900;color:var(--ink);line-height:1.28;margin-bottom:10px;letter-spacing:-.4px}
        .how-step-p{font-size:14px;color:var(--ink3);line-height:1.72;margin-bottom:14px}
        .how-step-proof{display:flex;align-items:flex-start;gap:7px;font-size:14px;color:var(--ink4);line-height:1.5;font-weight:500}
        .how-step-proof svg{width:14px;height:14px;flex-shrink:0;margin-top:1px}
        /* Mock UI cards */
        .how-step-visual{background:var(--w);border:1px solid var(--bdr);border-radius:14px;overflow:hidden;box-shadow:var(--sh2)}
        .how-mock-bar{background:var(--bg);border-bottom:1px solid var(--bdr);padding:10px 14px;display:flex;align-items:center;gap:6px}
        .how-mock-dot{width:8px;height:8px;border-radius:50%;background:var(--bdr2)}
        .how-mock-title{font-size:11px;font-weight:700;color:var(--ink4);margin-left:4px}
        .how-mock-body{padding:16px}
        .how-mock-prompt{background:var(--bl2);border:1px solid var(--bdr2);border-radius:8px;padding:10px 12px;margin-bottom:12px}
        .how-mock-label{font-size:9.5px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--b);margin-bottom:4px}
        .how-mock-text{font-size:12px;color:var(--ink3);line-height:1.55;font-style:italic}
        .how-mock-output{display:flex;flex-direction:column;gap:7px}
        .how-mock-item{display:flex;align-items:center;gap:7px;font-size:12px;color:var(--ink3);font-weight:500}
        .how-mock-item svg{width:12px;height:12px;flex-shrink:0}
        .how-mock-timer{font-size:11px;font-weight:700;color:var(--b);background:var(--bl);border-radius:5px;padding:3px 9px;margin-top:4px;display:inline-block;width:fit-content}
        .how-enrol-rule{display:flex;align-items:center;gap:8px;padding:8px 0;border-bottom:1px solid var(--bdr);font-size:12px}
        .how-enrol-rule:last-of-type{border-bottom:none}
        .how-enrol-if{background:var(--bl2);border-radius:6px;padding:4px 9px;color:var(--ink3)}
        .how-enrol-arrow{color:var(--b);font-weight:700;flex-shrink:0}
        .how-enrol-then{background:#DCFCE7;border-radius:6px;padding:4px 9px;color:#166534}
        .how-enrol-stat{display:flex;align-items:center;gap:8px;padding-top:12px;margin-top:4px;border-top:1px solid var(--bdr)}
        .how-enrol-n{font-size:26px;font-weight:900;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;letter-spacing:-1px;line-height:1}
        .how-enrol-l{font-size:11.5px;color:var(--ink4);font-weight:500;line-height:1.4}
        .how-dash-row{display:flex;align-items:center;gap:8px;margin-bottom:10px}
        .how-dash-label{font-size:11px;color:var(--ink4);font-weight:500;width:110px;flex-shrink:0;line-height:1.3}
        .how-dash-bar-wrap{flex:1;height:7px;background:var(--bl);border-radius:10px;overflow:hidden}
        .how-dash-bar{height:100%;background:linear-gradient(90deg,var(--b),var(--bm));border-radius:10px}
        .how-dash-pct{font-size:12px;font-weight:800;color:var(--b);width:32px;text-align:right;flex-shrink:0}
        .how-dash-alert{display:flex;align-items:center;gap:6px;font-size:11.5px;color:#92400E;background:#FEF3C7;border-radius:7px;padding:8px 10px;margin-top:6px}
        .how-dash-alert svg{width:14px;height:14px;flex-shrink:0}

        /* ── 7-DAY TIMELINE ─────────────────────────────────────────────────────────── */
        .timeline-sec{background:var(--w);padding:88px 48px;border-top:1px solid var(--bdr)}
        .timeline-wrap{max-width:1560px;margin:0 auto}
        .tl-compare{display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-top:48px;margin-bottom:32px}
        .tl-col{border-radius:20px;overflow:hidden;border:1px solid var(--bdr)}
        .tl-col.tl-other{background:var(--bg)}
        .tl-col.tl-us{background:var(--b);border-color:var(--b)}
        .tl-col-head{display:flex;align-items:center;gap:12px;padding:20px 22px;border-bottom:1px solid var(--bdr)}
        .tl-col.tl-us .tl-col-head{border-bottom:1px solid rgba(255,255,255,.15)}
        .tl-col-icon{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
        .tl-col-icon.other{background:var(--bdr2)}
        .tl-col-icon.other svg{stroke:var(--ink4);width:18px;height:18px}
        .tl-col-icon.us{background:rgba(255,255,255,.15)}
        .tl-col-icon.us svg{stroke:#fff;width:18px;height:18px}
        .tl-col-name{font-size:14px;font-weight:800;color:var(--ink)}
        .tl-col.tl-us .tl-col-name{color:#fff}
        .tl-col-sub{font-size:13px;color:var(--ink4);margin-top:1px}
        .tl-col.tl-us .tl-col-sub{color:rgba(255,255,255,.55)}
        .tl-days{padding:8px 0}
        .tl-day{padding:14px 22px;border-bottom:1px solid var(--bdr);display:grid;grid-template-columns:72px 1fr;gap:10px;align-items:start}
        .tl-col.tl-us .tl-day{border-bottom:1px solid rgba(255,255,255,.1)}
        .tl-day:last-of-type{border-bottom:none}
        .tl-day-label{font-size:10.5px;font-weight:800;color:var(--ink4);letter-spacing:.04em;padding-top:2px}
        .tl-col.tl-us .tl-day-label{color:rgba(255,255,255,.5)}
        .tl-day-content{font-size:13px;line-height:1.62}
        .tl-day-content.other{color:var(--ink3)}
        .tl-day-content.us{color:rgba(255,255,255,.9)}
        .tl-day-result{margin:0 22px 14px;border-radius:10px;padding:11px 14px;font-size:13px;font-weight:700;text-align:center}
        .tl-day-result.other{background:#FEE2E2;color:#DC2626}
        .tl-day-result.us{background:rgba(255,255,255,.12);color:#fff}
        .tl-cta-row{display:flex;align-items:center;gap:12px;flex-wrap:wrap}
        .tl-cta-note{font-size:12.5px;color:var(--ink4);font-weight:500}

        /* Responsive */
        @media(max-width:1024px){
          .how-step{grid-template-columns:48px 1fr;grid-template-rows:auto auto}
          .how-step-visual{grid-column:span 2}
          .tl-compare{grid-template-columns:1fr}
          .how-sec,.timeline-sec{padding:60px 24px}
        }
        @media(max-width:640px){
          .how-step{grid-template-columns:40px 1fr}
          .how-sec,.timeline-sec{padding:48px 16px}
          .tl-cta-row{flex-direction:column;align-items:flex-start}
        }

        /* ── SIGN UP SECTION ─────────────────────────────────────────────────────── */
        .signup-sec{background:var(--w);padding:88px 48px;text-align:center;position:relative;overflow:hidden}
        .signup-blob{position:absolute;pointer-events:none;z-index:0;border-radius:50%}
        .signup-blob--left{width:540px;height:540px;top:-120px;left:-160px;background:radial-gradient(circle,rgba(66,32,200,.07) 0%,transparent 65%)}
        .signup-blob--right{width:480px;height:480px;bottom:-120px;right:-100px;background:radial-gradient(circle,rgba(66,32,200,.06) 0%,transparent 65%)}
        .signup-blob--mid{width:800px;height:320px;top:55%;left:50%;transform:translate(-50%,-50%);background:radial-gradient(ellipse,rgba(66,32,200,.035) 0%,transparent 70%)}
        .signup-wrap{max-width:900px;margin:0 auto;position:relative;z-index:1}
        .signup-h{font-size:46px;font-weight:900;line-height:1.1;letter-spacing:-2px;color:var(--ink);margin-bottom:14px}
        .signup-h em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent}
        .signup-sub{font-size:16px;color:var(--ink3);line-height:1.68;margin-bottom:36px}
        .signup-card{background:var(--w);border:2px solid var(--b);border-radius:20px;padding:20px 22px;display:flex;align-items:center;gap:0;box-shadow:0 8px 40px rgba(66,32,200,.12);text-align:left;max-width:800px;margin:auto}
        .signup-field-group{display:flex;flex-direction:column;gap:5px;flex:1.3;min-width:0;padding:0 18px 0 4px}
        .signup-field-lbl{font-size:11.5px;font-weight:700;color:var(--ink4);display:flex;align-items:center;gap:5px}
        .signup-tip{width:16px;height:16px;border-radius:50%;background:var(--bl2);color:var(--ink4);font-size:9.5px;font-weight:800;display:inline-flex;align-items:center;justify-content:center;cursor:help;flex-shrink:0;border:1px solid var(--bdr)}
        .signup-domain-row{display:flex;align-items:center;gap:6px;margin-top:1px}
        .signup-domain-input{flex:1;min-width:0;border:none;outline:none;font-family:inherit;font-size:15px;font-weight:500;color:var(--ink);background:transparent;padding:0}
        .signup-domain-input::placeholder{color:var(--ink4)}
        .signup-domain-suffix{font-size:13.5px;font-weight:700;color:var(--ink2);white-space:nowrap;flex-shrink:0}
        .signup-vdivider{width:1px;background:var(--bdr);height:52px;flex-shrink:0;margin:0 4px}
        .signup-email-group{flex:1;min-width:0;padding:0 18px}
        .signup-email-lbl{font-size:11.5px;font-weight:700;color:var(--ink4);margin-bottom:5px}
        .signup-email-input{width:100%;border:none;outline:none;font-family:inherit;font-size:15px;font-weight:500;color:var(--ink);background:transparent;padding:0;margin-top:1px}
        .signup-email-input::placeholder{color:var(--ink4)}
        .signup-cta-group{flex-shrink:0;text-align:center;padding-left:4px}
        .signup-btn{display:inline-flex;align-items:center;justify-content:center;background:#4220c8;color:#fff;font-family:inherit;font-size:15px;font-weight:800;padding:14px 26px;border-radius:12px;border:none;cursor:pointer;transition:all .2s;white-space:nowrap;text-decoration:none;box-shadow:0 4px 6px #4220c8}
        .signup-btn:hover{background:#4220c8;transform:translateY(-1px);box-shadow:0 6px 10px #4220c8}
        .signup-note{font-size:11px;color:#000000;margin-top:8px}
        @media(max-width:900px){
          .signup-sec{padding:68px 24px}
          .signup-h{font-size:36px;letter-spacing:-1.5px}
          .signup-card{flex-direction:column;align-items:stretch;gap:16px;padding:22px}
          .signup-vdivider{width:100%;height:1px;margin:0}
          .signup-field-group,.signup-email-group{padding:0;width:100%}
          .signup-cta-group{padding:0;text-align:left}
          .signup-btn{width:100%;justify-content:center;padding:14px}
        }
        @media(max-width:480px){
          .signup-sec{padding:52px 16px}
          .signup-h{font-size:28px;letter-spacing:-1px}
          .signup-sub{font-size:14.5px}
        }

</style>
@endpush

@section('content')

<section class="lp-hero">
  <div class="lp-hero-wrap">
    <div>
      <div class="lp-hero-eyebrow"><span class="lp-hero-eyebrow-dot"></span>Replace Your Entire Training Stack</div>
      <h1>One LMS.<br><em>Everything Inside.</em><br>Nothing Extra.</h1>
      <p class="lp-hero-sub">Training. Compliance. Members. AI Proctoring. Revenue. All built in — without paying for 10 different tools.</p>
      <p class="lp-hero-proof">200+ organisations already switched &middot; 15+ countries &middot; $1.2M in certification revenue scaled</p>
      <div class="lp-hero-btns">
        <a href="https://mypasslms.us/login#register" class="btn-a" style="font-size:15px;padding:14px 28px">Start Free for 15 Days</a>
        <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b" style="font-size:15px;padding:13px 24px">See It in Action</a>
      </div>
      <div class="lp-hero-trust">
        <div class="lp-trust-item"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>No credit card required</div>
        <div class="lp-trust-item"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>15-day free trial</div>
        <div class="lp-trust-item"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8"/></svg>AWS infrastructure</div>
      </div>
    </div>
    <div class="lp-hero-img-wrap">
      <video src="https://kprise.com/wp-content/uploads/2025/10/WhatsApp-Video-2025-10-06-at-12.39.50_fe04276f.mp4" autoplay="" muted="" class="lp-hero-img" loop="" playsinline="">
      </video>   
      <div class="lp-hero-float">
        <div class="lp-hero-float-icon"><svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div>
        <div>
          <div class="lp-hero-float-n">Day 1</div>
          <div class="lp-hero-float-l">Training live from sign-up</div>
        </div>
      </div>
    </div>
  </div>
</section>


<div class="qs-strip">
  <div class="qs-strip-in">
    <div>
      <div class="qs-strip-label">Try it — takes 2 minutes</div>
      <div class="qs-steps">
        <div class="qs-step"><span class="qs-step-num">1</span>Upload a course</div>
        <div class="qs-arr">→</div>
        <div class="qs-step"><span class="qs-step-num">2</span>Add users</div>
        <div class="qs-arr">→</div>
        <div class="qs-step"><span class="qs-step-num">3</span>Launch training</div>
        <div class="qs-arr">→</div>
        <div class="qs-step"><span class="qs-step-num">4</span>Track everything</div>
      </div>
    </div>
    <div class="qs-result">Done. &nbsp;No setup calls. No IT team.</div>
  </div>
</div>


<section class="how-sec">
  <div class="how-wrap">
    <div class="eyebrow"><span class="ew"></span>See It Working</div>
    <h2 class="heading">From Sign-Up to First Course<br><em>in Under 10 Minutes.</em></h2>
    <p class="lead" style="max-width:580px">No implementation consultant. No IT ticket. No two-week onboarding call. This is what the first 10 minutes inside MyPass LMS actually looks like.</p>

    <div class="how-steps">

      <div class="how-step">
        <div class="how-step-left">
          <div class="how-step-num">01</div>
          <div class="how-step-line"></div>
        </div>
        <div class="how-step-body">
          <div class="how-step-tag">Course Creation</div>
          <h3 class="how-step-h">Describe your course. Watch it build itself.</h3>
          <p class="how-step-p">Type a topic or upload a document — a policy, a PDF, a slide deck. The AI generates a structured course with modules, assessments, and a completion certificate. SCORM-packaged and ready to assign in minutes, not weeks.</p>
          <div class="how-step-proof">
            <svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
            <span>4× faster than traditional course authoring — no instructional designer required</span>
          </div>
        </div>
        <div class="how-step-visual v1">
          <div class="how-mock-bar">
            <div class="how-mock-dot"></div><div class="how-mock-dot"></div><div class="how-mock-dot"></div>
            <span class="how-mock-title">AI Course Builder</span>
          </div>
          <div class="how-mock-body">
            <div class="how-mock-prompt">
              <div class="how-mock-label">Your prompt</div>
              <div class="how-mock-text">"Create a 5-module GDPR compliance course for new hires with a final assessment"</div>
            </div>
            <div class="how-mock-output">
              <div class="how-mock-item done"><svg viewBox="0 0 12 12" fill="none" stroke="#16A34A" stroke-width="2.5"><path d="M1.5 6l3 3 6-6"/></svg>5 modules generated</div>
              <div class="how-mock-item done"><svg viewBox="0 0 12 12" fill="none" stroke="#16A34A" stroke-width="2.5"><path d="M1.5 6l3 3 6-6"/></svg>15-question assessment built</div>
              <div class="how-mock-item done"><svg viewBox="0 0 12 12" fill="none" stroke="#16A34A" stroke-width="2.5"><path d="M1.5 6l3 3 6-6"/></svg>Certificate template created</div>
              <div class="how-mock-item done"><svg viewBox="0 0 12 12" fill="none" stroke="#16A34A" stroke-width="2.5"><path d="M1.5 6l3 3 6-6"/></svg>SCORM package ready</div>
              <div class="how-mock-timer">⏱ Built in 4 minutes</div>
            </div>
          </div>
        </div>
      </div>

      <div class="how-step">
        <div class="how-step-left">
          <div class="how-step-num">02</div>
          <div class="how-step-line"></div>
        </div>
        <div class="how-step-body">
          <div class="how-step-tag">Smart Enrolment</div>
          <h3 class="how-step-h">The right people are enrolled before you close the tab.</h3>
          <p class="how-step-p">Set a rule once — by role, department, membership tier, or hire date. Every qualifying user is enrolled immediately and automatically. New starters, new members, role changes — all handled without a single manual action from your team.</p>
          <div class="how-step-proof">
            <svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
            <span>240 users enrolled automatically — Day 1, no spreadsheet needed</span>
          </div>
        </div>
        <div class="how-step-visual v2">
          <div class="how-mock-bar">
            <div class="how-mock-dot"></div><div class="how-mock-dot"></div><div class="how-mock-dot"></div>
            <span class="how-mock-title">Enrolment Rules</span>
          </div>
          <div class="how-mock-body">
            <div class="how-enrol-rule">
              <div class="how-enrol-if">IF <strong>Role = New Hire</strong></div>
              <div class="how-enrol-arrow">→</div>
              <div class="how-enrol-then">Enrol in <strong>Onboarding Path</strong></div>
            </div>
            <div class="how-enrol-rule">
              <div class="how-enrol-if">IF <strong>Membership = Gold</strong></div>
              <div class="how-enrol-arrow">→</div>
              <div class="how-enrol-then">Unlock <strong>Premium Courses</strong></div>
            </div>
            <div class="how-enrol-rule">
              <div class="how-enrol-if">IF <strong>Cert expires in 30d</strong></div>
              <div class="how-enrol-arrow">→</div>
              <div class="how-enrol-then">Send <strong>Renewal Reminder</strong></div>
            </div>
            <div class="how-enrol-stat">
              <span class="how-enrol-n">240</span>
              <span class="how-enrol-l">users enrolled automatically this week</span>
            </div>
          </div>
        </div>
      </div>

      <div class="how-step">
        <div class="how-step-left">
          <div class="how-step-num">03</div>
          <div class="how-step-line"></div>
        </div>
        <div class="how-step-body">
          <div class="how-step-tag">Live Tracking</div>
          <h3 class="how-step-h">See who is on track and who is not — in real time.</h3>
          <p class="how-step-p">Your dashboard shows completion rates, at-risk learners, certificate status, and compliance evidence across every team, location, and programme — updated live. When an auditor arrives, your report is one click away. Always.</p>
          <div class="how-step-proof">
            <svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
            <span>Audit evidence generated in seconds — never manually assembled again</span>
          </div>
        </div>
        <div class="how-step-visual v3">
          <div class="how-mock-bar">
            <div class="how-mock-dot"></div><div class="how-mock-dot"></div><div class="how-mock-dot"></div>
            <span class="how-mock-title">Live Dashboard</span>
          </div>
          <div class="how-mock-body">
            <div class="how-dash-row">
              <span class="how-dash-label">Overall completion</span>
              <div class="how-dash-bar-wrap"><div class="how-dash-bar" style="width:87%"></div></div>
              <span class="how-dash-pct">87%</span>
            </div>
            <div class="how-dash-row">
              <span class="how-dash-label">GDPR Compliance</span>
              <div class="how-dash-bar-wrap"><div class="how-dash-bar" style="width:94%"></div></div>
              <span class="how-dash-pct">94%</span>
            </div>
            <div class="how-dash-row">
              <span class="how-dash-label">Safety Training</span>
              <div class="how-dash-bar-wrap"><div class="how-dash-bar" style="width:71%"></div></div>
              <span class="how-dash-pct">71%</span>
            </div>
            <div class="how-dash-alert">
              <svg viewBox="0 0 16 16" fill="none" stroke="#F59E0B" stroke-width="2"><path d="M8 2l6 12H2z"/><line x1="8" y1="8" x2="8" y2="10"/></svg>
              3 learners at risk — reminder sent automatically
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<section class="stack-sec">
  <div class="stack-wrap">
    <div class="eyebrow"><span class="ew"></span>This Is Where It Really Hits</div>
    <h2 class="heading">You Just Replaced<br><em>8 to 10 Different Tools.</em></h2>
    <p class="lead" style="max-width:560px">Every tool you're paying for separately today is already inside MyPass LMS. Not a lite version — the full capability, from day one, on every plan.</p>
    <div class="stack-compare">
      <div class="stack-col">
        <div class="stack-col-head">
          <div class="stack-col-title">What You Use Today</div>
          <div class="stack-col-tag">8–10 tools</div>
        </div>
        <div class="stack-items">
      <div class="stack-item">
        <div class="stack-item-dot"></div>
        <span>LMS platform</span>
      </div>
      <div class="stack-item">
        <div class="stack-item-dot"></div>
        <span>Compliance tool</span>
      </div>
      <div class="stack-item">
        <div class="stack-item-dot"></div>
        <span>AMS / member system</span>
      </div>
      <div class="stack-item">
        <div class="stack-item-dot"></div>
        <span>Proctoring software</span>
      </div>
      <div class="stack-item">
        <div class="stack-item-dot"></div>
        <span>DRM system</span>
      </div>
      <div class="stack-item">
        <div class="stack-item-dot"></div>
        <span>Translation tools</span>
      </div>
      <div class="stack-item">
        <div class="stack-item-dot"></div>
        <span>Website / ecommerce plugins</span>
      </div>
      <div class="stack-item">
        <div class="stack-item-dot"></div>
        <span>Reporting systems</span>
      </div></div>
        <div class="stack-col-total">
          <div class="stack-total-label">Combined monthly cost</div>
          <div class="stack-total-price">$2,000<span style="font-size:15px;font-weight:600;color:var(--ink4)">/mo+</span></div>
        </div>
      </div>
      <div class="stack-arrow">
        <div class="stack-arrow-circle">
          <svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
        </div>
        <div class="stack-arrow-label">Replaced<br>by one</div>
      </div>
      <div class="stack-col mypass">
        <div class="stack-col-head">
          <div class="stack-col-title">MyPass LMS</div>
          <div class="stack-col-tag">Everything included</div>
        </div>
        <div class="stack-items">
      <div class="stack-item">
        <div class="stack-item-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19V6l12-3v13"/></svg></div>
        <span>AI Course Builder + SCORM</span>
      </div>
      <div class="stack-item">
        <div class="stack-item-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
        <span>Compliance Tracking + Audit</span>
      </div>
      <div class="stack-item">
        <div class="stack-item-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/></svg></div>
        <span>AMS Integration (8 platforms)</span>
      </div>
      <div class="stack-item">
        <div class="stack-item-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 13.5V7a2 2 0 012-2h16"/></svg></div>
        <span>AI Exam Proctoring (3 tiers)</span>
      </div>
      <div class="stack-item">
        <div class="stack-item-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
        <span>Enterprise DRM + Watermarking</span>
      </div>
      <div class="stack-item">
        <div class="stack-item-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0"/></svg></div>
        <span>AI Multilingual Translation</span>
      </div>
      <div class="stack-item">
        <div class="stack-item-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4"/></svg></div>
        <span>Ecommerce + Course Marketplace</span>
      </div>
      <div class="stack-item">
        <div class="stack-item-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 20V10M12 20V4M6 20v-6"/></svg></div>
        <span>Real-Time Analytics + Reports</span>
      </div></div>
        <div class="stack-col-total">
          <div class="stack-total-label">Your new monthly cost</div>
          <div class="stack-total-price"><s>$2,000+</s> <span class="green">Fraction of that</span></div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="price-callout">
  <div class="price-callout-wrap">
    <div class="eyebrow" style="justify-content:center;display:inline-flex;margin-bottom:8px"><span class="ew"></span>Active User Pricing — Pay Only for Engagement</div>
    <h2 class="heading" style="text-align:center;font-size:36px">One Price.<br><em>Everything Included.</em></h2>
    <div class="price-old">$2,000+/month for 8 separate tools</div>
    <div class="price-big">From $63<span style="font-size:32px;font-weight:600;letter-spacing:-1px;color:var(--ink3)">/mo</span></div>
    <div class="price-note">Every feature. Every plan. No add-ons. No hidden upgrades.</div>
    <div class="price-pills">
      <div class="price-pill"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8" stroke-linecap="round" stroke-linejoin="round"/></svg>No add-ons</div>
      <div class="price-pill"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8" stroke-linecap="round" stroke-linejoin="round"/></svg>No hidden upgrades</div>
      <div class="price-pill"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8" stroke-linecap="round" stroke-linejoin="round"/></svg>No extra vendors</div>
      <div class="price-pill"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8" stroke-linecap="round" stroke-linejoin="round"/></svg>Active users only — idle accounts billed $0</div>
      <div class="price-pill"><svg viewBox="0 0 16 16"><path d="M2 8l4 4 8-8" stroke-linecap="round" stroke-linejoin="round"/></svg>Cancel anytime</div>
    </div>
    <a href="https://mypasslms.us/login#register" class="btn-a" style="font-size:15px;padding:14px 32px">Start Free for 15 Days — No Card Required</a>
    <p style="margin-top:14px;font-size:13px;color:var(--ink4)"><a href="https://kp.kprise.com/pricing" target="_blank" rel="noopener" style="color:var(--b);font-weight:700;text-decoration:underline;text-underline-offset:2px">See all pricing plans →</a></p>
  </div>
</section>


<section class="timeline-sec">
  <div class="timeline-wrap">
    <div class="eyebrow"><span class="ew"></span>Your First 7 Days</div>
    <h2 class="heading">What a Week Looks Like<br><em>When the Platform Actually Works.</em></h2>
    <p class="lead" style="max-width:580px">Most LMS platforms spend your first week on setup calls, configuration guides, and ticket queues. Here is what the same week looks like when the platform is built to work from day one.</p>

    <div class="tl-compare">

      <div class="tl-col tl-other">
        <div class="tl-col-head">
          <div class="tl-col-icon other">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
          </div>
          <div>
            <div class="tl-col-name">Most LMS Platforms</div>
            <div class="tl-col-sub">What your first 7 days actually feel like</div>
          </div>
        </div>
        <div class="tl-days">
          <div class="tl-day">
            <div class="tl-day-label">Day 1</div>
            <div class="tl-day-content other">Sign up. Receive a welcome email. Wait for onboarding call to be scheduled.</div>
          </div>
          <div class="tl-day">
            <div class="tl-day-label">Day 2–3</div>
            <div class="tl-day-content other">Onboarding call. Walkthrough of features. More configuration to do on your own.</div>
          </div>
          <div class="tl-day">
            <div class="tl-day-label">Day 4</div>
            <div class="tl-day-content other">Discover compliance module costs extra. Submit support ticket about AMS connection.</div>
          </div>
          <div class="tl-day">
            <div class="tl-day-label">Day 5–6</div>
            <div class="tl-day-content other">Wait for ticket response. Research third-party proctoring options. Question the budget.</div>
          </div>
          <div class="tl-day">
            <div class="tl-day-label">Day 7</div>
            <div class="tl-day-content other">No course live yet. Three new vendor conversations started. One more upsell email received.</div>
          </div>
          <div class="tl-day-result other">Still no training delivered. Stack is now bigger.</div>
        </div>
      </div>

      <div class="tl-col tl-us">
        <div class="tl-col-head">
          <div class="tl-col-icon us">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          </div>
          <div>
            <div class="tl-col-name">MyPass LMS</div>
            <div class="tl-col-sub">What your first 7 days actually deliver</div>
          </div>
        </div>
        <div class="tl-days">
          <div class="tl-day">
            <div class="tl-day-label">Day 1</div>
            <div class="tl-day-content us">Sign up. Upload your first course or generate one with AI. First learner enrolled by end of day.</div>
          </div>
          <div class="tl-day">
            <div class="tl-day-label">Day 2</div>
            <div class="tl-day-content us">Set up enrolment rules. Connect your AMS if you have one. Compliance tracking running automatically.</div>
          </div>
          <div class="tl-day">
            <div class="tl-day-label">Day 3</div>
            <div class="tl-day-content us">First completion data arriving. Live dashboard showing who is on track. No manual chasing.</div>
          </div>
          <div class="tl-day">
            <div class="tl-day-label">Day 4–5</div>
            <div class="tl-day-content us">Enable proctoring on your first assessment — one toggle. Set up course ecommerce if needed.</div>
          </div>
          <div class="tl-day">
            <div class="tl-day-label">Day 6–7</div>
            <div class="tl-day-content us">Review your first audit-ready report. See certification revenue if selling courses. Full visibility.</div>
          </div>
          <div class="tl-day-result us">Training live. Data flowing. Nothing extra to buy.</div>
        </div>
      </div>

    </div>

    <div class="tl-cta-row">
      <a href="https://mypasslms.us/login#register" class="btn-a" style="font-size:14.5px;padding:13px 28px">Start Your First 7 Days Free</a>
      <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b" style="font-size:14px;padding:12px 22px">See a Live Walkthrough</a>
      <span class="tl-cta-note">No credit card &middot; Full platform &middot; 15 days</span>
    </div>
  </div>
</section>


<section class="who-sec">
  <div class="who-wrap">
    <div class="eyebrow"><span class="ew"></span>Who This Is For</div>
    <h2 class="heading">If You Are Using<br><em>Multiple Tools Today — </em> This Replaces Them.</h2>
    <div class="who-grid">
    <div class="who-card">
      <img class="who-card-img"
        src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=600&q=80&auto=format&fit=crop"
        alt="Teams Running Training and Compliance" loading="lazy" onerror="this.style.display='none'">
      <div class="who-card-num">01</div>
      <div class="who-card-h">Teams Running Training and Compliance</div>
      <p class="who-card-p">You manage mandatory training, track completions, produce audit evidence, and spend half your week chasing people for renewals. MyPass LMS automates the entire cycle — assignment, tracking, reminders, and evidence — so your team focuses on outcomes, not administration.</p>
      <div class="who-replaces"><svg viewBox="0 0 24 24"><polyline points="16 3 21 3 21 8"/><line x1="4" y1="20" x2="21" y2="3"/><polyline points="21 16 21 21 16 21"/><line x1="15" y1="15" x2="21" y2="21"/></svg>Replaces: LMS + compliance tool + reporting system</div>
    </div>
    <div class="who-card">
      <img class="who-card-img"
        src="https://images.unsplash.com/photo-1542744094-24638eff58bb?w=600&q=80&auto=format&fit=crop"
        alt="Associations Managing Members and Programmes" loading="lazy" onerror="this.style.display='none'">
      <div class="who-card-num">02</div>
      <div class="who-card-h">Associations Managing Members and Programmes</div>
      <p class="who-card-p">Your AMS knows who your members are. Your LMS should respond to it in real time — enrolling by tier, tracking CE credits, syncing credentials, and sending renewal reminders without your team doing any of it manually.</p>
      <div class="who-replaces"><svg viewBox="0 0 24 24"><polyline points="16 3 21 3 21 8"/><line x1="4" y1="20" x2="21" y2="3"/><polyline points="21 16 21 21 16 21"/><line x1="15" y1="15" x2="21" y2="21"/></svg>Replaces: LMS + AMS integration + CE tracking + separate portals</div>
    </div>
    <div class="who-card">
      <img class="who-card-img"
        src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&q=80&auto=format&fit=crop"
        alt="Organisations Selling Courses and Certifications" loading="lazy" onerror="this.style.display='none'">
      <div class="who-card-num">03</div>
      <div class="who-card-h">Organisations Selling Courses and Certifications</div>
      <p class="who-card-p">You built valuable training content and now need a way to sell it, certify people, protect it from redistribution, and track revenue — without stitching together five different tools to make it work.</p>
      <div class="who-replaces"><svg viewBox="0 0 24 24"><polyline points="16 3 21 3 21 8"/><line x1="4" y1="20" x2="21" y2="3"/><polyline points="21 16 21 21 16 21"/><line x1="15" y1="15" x2="21" y2="21"/></svg>Replaces: LMS + ecommerce + DRM + proctoring + certificate system</div>
    </div></div>
  </div>
</section>





<section class="proof-sec">
  <div class="proof-wrap">
    <div class="eyebrow"><span class="ew"></span>Real Organisations. Real Results.</div>
    <h2 class="heading">200+ Teams Already<br><em>Replaced Their Stack.</em></h2>
    <div class="proof-stats">
      <div class="proof-stat"><div class="proof-stat-n">$1.2M</div><div class="proof-stat-l">Certification revenue scaled by one customer</div></div>
      <div class="proof-stat"><div class="proof-stat-n">70%</div><div class="proof-stat-l">Less admin work after switching to MyPass LMS</div></div>
      <div class="proof-stat"><div class="proof-stat-n">113+</div><div class="proof-stat-l">Countries reached by MyPass LMS customers</div></div>
      <div class="proof-stat"><div class="proof-stat-n">4 yrs</div><div class="proof-stat-l">Longest customer relationship — same platform, no migration</div></div>
    </div>
    <div class="proof-quotes">
      <div class="proof-quote">
        <p class="proof-quote-txt">MyPass LMS is extremely customisable and the support in making the platform feel like our own brand was something we did not expect. Managing volunteer training, member CE programmes, and staff compliance from one platform has eliminated three separate systems we used to run.</p>
        <div class="proof-quote-av">
          <div class="proof-av" style="background:linear-gradient(135deg,#2A7A5C,#1D5C45)">AS</div>
          <div><div class="proof-av-name">Ashleigh S.</div><div class="proof-av-role">Senior Learning Partner</div></div>
        </div>
      </div>
      <div class="proof-quote">
        <p class="proof-quote-txt">We have been a Kprise client for over four years. The platform has grown with us at every step. CE tracking is automated, compliance evidence is always current, and our team finally trusts the data again.</p>
        <div class="proof-quote-av">
          <div class="proof-av" style="background:linear-gradient(135deg,#1B2A6B,#2D44AA)">SD</div>
          <div><div class="proof-av-name">Shawn D.</div><div class="proof-av-role">Director &middot; American Board &middot; 4-Year Customer</div></div>
        </div>
      </div>
    </div>
    <div class="proof-logo-row">
      <span class="proof-logo">SBCA</span>
      <span class="proof-logo">American Board</span>
      <span class="proof-logo">Youth for Understanding</span>
      <span class="proof-logo">WSP Middle East</span>
      <span class="proof-logo">PDK International</span>
      <span class="proof-logo">ICF International</span>
    </div>
  </div>
</section>



<section class="related-sec">
  <div class="related-wrap">
    <div class="eyebrow"><span class="ew"></span>Explore More</div>
    <h2 class="heading" style="font-size:30px">Everything You Need<br><em>to Make the Switch.</em></h2>
    <div class="related-grid">

      <div class="rel-group">
        <div class="rel-group-label">Use Cases</div>
        <div class="rel-links">
          <a href="https://kp.kprise.com/use-cases/compliance" class="rel-link" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2"/></svg>Compliance Training<span class="rel-arr">→</span></a>
          <a href="https://kp.kprise.com/use-cases/onboarding" class="rel-link" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M12 11a4 4 0 100-8 4 4 0 000 8z"/></svg>Employee Onboarding<span class="rel-arr">→</span></a>
          <a href="https://kp.kprise.com/use-cases/customer-training" class="rel-link" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.87 9.5"/></svg>Customer Training<span class="rel-arr">→</span></a>
          <a href="https://kp.kprise.com/use-cases/partner" class="rel-link" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>Partner Training<span class="rel-arr">→</span></a>
          <a href="https://kp.kprise.com/use-cases/sales" class="rel-link" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>Sales Enablement<span class="rel-arr">→</span></a>
        </div>
      </div>

      <div class="rel-group">
        <div class="rel-group-label">Industries</div>
        <div class="rel-links">
          <a href="https://kp.kprise.com/industries/healthcare" class="rel-link" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>Healthcare<span class="rel-arr">→</span></a>
          <a href="https://kp.kprise.com/industries/manufacturing" class="rel-link" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>Manufacturing<span class="rel-arr">→</span></a>
          <a href="https://kp.kprise.com/industries/nonprofit" class="rel-link" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>Nonprofits<span class="rel-arr">→</span></a>
          <a href="https://kp.kprise.com/industries/financial" class="rel-link" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>Financial Services<span class="rel-arr">→</span></a>
          <a href="https://kp.kprise.com/industries/software" class="rel-link" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>Software & Tech<span class="rel-arr">→</span></a>
        </div>
      </div>

      <div class="rel-group">
        <div class="rel-group-label">Resources</div>
        <div class="rel-links">
          <a href="https://kp.kprise.com/case-studies" class="rel-link" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>Customer Case Studies<span class="rel-arr">→</span></a>
          <a href="https://kp.kprise.com/pricing" class="rel-link" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>Pricing — All Plans<span class="rel-arr">→</span></a>
          <a href="https://kp.kprise.com/about/platform" class="rel-link" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>Full Feature List<span class="rel-arr">→</span></a>
          <a href="https://kp.kprise.com/calculator" class="rel-link" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><rect x="4" y="2" width="16" height="20" rx="2"/><line x1="8" y1="6" x2="16" y2="6"/><line x1="8" y1="10" x2="16" y2="10"/><line x1="8" y1="14" x2="12" y2="14"/></svg>ROI Calculator<span class="rel-arr">→</span></a>
          <a href="https://kp.kprise.com/blog" class="rel-link" target="_blank" rel="noopener"><svg viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z"/><path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z"/></svg>Blog & L&D Insights<span class="rel-arr">→</span></a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ── SIGN UP SECTION ── -->
<section class="signup-sec">
  <div class="signup-blob signup-blob--left" aria-hidden="true"></div>
  <div class="signup-blob signup-blob--right" aria-hidden="true"></div>
  <div class="signup-blob signup-blob--mid" aria-hidden="true"></div>
  <div class="signup-wrap">
    <h2 class="signup-h"><em>Sign up in seconds.</em> Simplify training forever.</h2>
    <p class="signup-sub">Because you deserve a training platform that delivers.</p>

    <div class="signup-card">
      <!-- Domain name -->
      <div class="signup-field-group">
        <div class="signup-field-lbl">
          Domain name
          <span class="signup-tip" title="Choose your unique MyPass LMS subdomain">?</span>
        </div>
        <div class="signup-domain-row">
          <input type="text" class="signup-domain-input" placeholder="yourorg" aria-label="Domain name">
          <span class="signup-domain-suffix">.mypasslms.us</span>
        </div>
      </div>

      <div class="signup-vdivider" aria-hidden="true"></div>

      <!-- Email -->
      <div class="signup-email-group">
        <div class="signup-email-lbl">Email</div>
        <input type="email" class="signup-email-input" placeholder="you@company.com" aria-label="Work email">
      </div>

      <div class="signup-vdivider" aria-hidden="true"></div>

      <!-- CTA -->
      <div class="signup-cta-group">
        <a href="https://mypasslms.us/login#register" class="signup-btn">Get started</a>
        <p class="signup-note">*No credit card required</p>
      </div>
    </div>
  </div>
</section>



<section class="final-cta">
  <div class="final-cta-wrap">
    <div class="final-cta-tag">One Last Thing</div>
    <h2>Most Platforms Grow<br>Your Stack.<br><em>This One Removes It.</em></h2>
    <p>Everything included. At a fraction of what you're paying today. Start with the full platform — not a limited version, not a stripped-down trial.</p>
    <div class="final-cta-btns">
      <a href="https://mypasslms.us/login#register" class="btn-white">Start Free for 15 Days</a>
      <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-outline-white">Book a 30-Min Demo</a>
    </div>
    <p class="final-cta-note">15-day free trial &middot; No credit card required &middot; Cancel anytime &middot; AWS FedRAMP infrastructure</p>
  </div>
</section>





<div class="sticky-bar" id="sticky-bar">
  <div>
    <span class="sticky-bar-left">Replace your entire training stack.</span>
    <span class="sticky-bar-sub">Everything included. No add-ons.</span>
  </div>
  <div class="sticky-bar-btns">
    <a href="https://mypasslms.us/login#register" class="btn-a" style="font-size:13.5px;padding:10px 20px">Start Free</a>
    <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b" style="font-size:13.5px;padding:9px 18px">Book Demo</a>
  </div>
</div>


<script>
(function(){
  var bar = document.getElementById('sticky-bar');
  var hero = document.querySelector('.lp-hero');
  function onScroll(){
    var heroBottom = hero.getBoundingClientRect().bottom;
    if(heroBottom < 0){
      bar.classList.add('show');
    } else {
      bar.classList.remove('show');
    }
  }
  window.addEventListener('scroll', onScroll, {passive:true});
})();
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

@push('schema')
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "MyPass LMS",
  "applicationCategory": "BusinessApplication",
  "operatingSystem": "Web",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD",
    "description": "Free 90-day trial with 5,000 credits"
  },
  "description": "MyPass LMS is an Agentic AI-powered, credit-based Learning Management System that cuts admin work by 70%.",
  "url": "{{ url('/') }}",
  "publisher": {
    "@type": "Organization",
    "name": "Kprise",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('assets/images/logo-color.png') }}"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.8",
    "reviewCount": "200"
  }
}
</script>
@endverbatim
@endpush

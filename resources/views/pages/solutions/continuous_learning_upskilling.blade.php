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
    .hero{background:var(--w);border-bottom:1px solid var(--bdr);padding:40px 48px 0;overflow:hidden;position:relative;min-height:520px}
    .hero::after{content:'';position:absolute;top:0;right:0;bottom:0;width:48%;background:linear-gradient(to right,transparent,var(--bl2) 40%);pointer-events:none}
    .hero-grid{max-width:1500px;margin:0 auto;display:grid;grid-template-columns:1fr 460px;gap:52px;align-items:end;position:relative;z-index:1}
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
    .sc{padding:26px 20px;text-align:center;border-right:1px solid var(--bdr)}
    .sc:last-child{border-right:none}
    .sc-n{font-size:36px;font-weight:900;letter-spacing:-1.5px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent}
    .sc-l{font-size:12.5px;color:var(--ink3);font-weight:500;margin-top:4px;line-height:1.4}

    /* ── SHARED ── */
    .sec{padding:68px 48px}
    .sw{background:var(--w)}
    .sbg{background:var(--bg)}
    .stint{background:var(--bl2)}
    .wrap{max-width:1500px;margin:0 auto}
    .eyebrow{display:inline-flex;align-items:center;gap:6px;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);margin-bottom:10px}
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
    .rtype{font-size:10px;font-weight:800;letter-spacing:.09em;text-transform:uppercase;color:var(--bm);background:var(--bl);padding:2px 8px;border-radius:5px;display:inline-block;margin-bottom:10px;max-width:fit-content}
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
            <span>Continuous Learning &amp; Upskilling</span>
        </nav>
        <div class="htag"><span class="htag-dot"></span><span>Continuous Learning &amp; Upskilling</span></div>
        <h1>Skills That Stand Still<br><em>Are Skills Falling Behind.</em></h1>
        <p class="hero-sub">Your industry is changing faster than annual training cycles keep up with. <strong>MyPass LMS turns upskilling from a one-time event into an always-on programme</strong> — AI-powered learning paths, automated role-based assignments, skill gap detection, and real-time progress tracking that runs without constant L&amp;D intervention.</p>
        <div class="hbtns">
            <a href="https://mypasslms.us/login#register" class="btn-a">Start Free for 15 Days</a>
            <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b">Book a Demo</a>
        </div>
        <div class="trust-row"><div class="tchip"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>No credit card required</div><div class="tchip"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>15-day free trial</div><div class="tchip"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>AI course builder included</div></div>
        </div>
        <div class="hero-img-wrap">
        <img class="hero-img" src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=960&q=80&auto=format&fit=crop" alt="Skills That Stand Still Are Skills Falling Behind. — MyPass LMS" loading="eager" width="460" height="380">
        <div class="h-float">
            <div class="hf-dot"></div>
            <div><div class="hf-n">4x</div><div class="hf-l">Faster course creation with AI builder</div></div>
        </div>
        </div>
    </div>
    </header><div class="logo-bar">
    <p class="lb-lbl">Trusted by nonprofits, associations, and enterprises across 15 countries</p>
    <div class="lb-track-wrap">
        <div class="lb-track" aria-hidden="true">
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
    <div class="stats"><div class="stats-in"><div class="sc"><div class="sc-n">4x</div><div class="sc-l">Faster course creation with AI builder vs traditional authoring</div></div><div class="sc"><div class="sc-n">85%</div><div class="sc-l">Increase in skill retention with structured role-based learning paths</div></div><div class="sc"><div class="sc-n">70%</div><div class="sc-l">Reduction in L&amp;D admin through automated enrolment and tracking</div></div><div class="sc"><div class="sc-n">35%</div><div class="sc-l">Better completion rates with automated deadline reminders</div></div></div></div><section class="sec sw">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Why Continuous Learning Matters</div>
        <h2 class="heading">One Annual Training Day Is Not<br><em>a Learning and Development Strategy.</em></h2>
        <p class="lead cx">Skills have a shorter shelf life than ever. Roles evolve, tools change, and competitors move faster than traditional training cycles. Organisations that treat upskilling as a single annual event find themselves with a widening gap between what their people can do and what the business needs. MyPass LMS makes continuous learning the default — not the exception — with tools that build, deliver, track, and improve your upskilling programme automatically.</p>
        </div>
        <div class="vp-grid"><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 19V6l12-3v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="15" r="3"/></svg></div><div class="vpc-t">AI-Powered Learning Paths</div><div class="vpc-d">Describe a role or skill area and MyPass LMS builds a complete, sequenced learning journey with modules, assessments, and logical progression automatically — in minutes rather than weeks of instructional design work.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div><div class="vpc-t">Skill Gap Detection</div><div class="vpc-d">Measure actual skill levels against role requirements through assessment data. MyPass LMS surfaces gaps by role, team, and individual so L&amp;D teams can prioritise where investment has the most impact rather than guessing.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg></div><div class="vpc-t">Role-Based Auto-Assignment</div><div class="vpc-d">The right courses reach the right people based on their role, team, or seniority level automatically. When roles change, learning assignments update to match — no manual action from your L&amp;D team at any stage.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div><div class="vpc-t">Real-Time Progress Tracking</div><div class="vpc-d">Manager dashboards, team-level completion data, and individual progress views all updated in real time. No manual reporting, no spreadsheets, no chasing status updates across departments.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg></div><div class="vpc-t">AI Course Builder</div><div class="vpc-d">Upload any PDF, PowerPoint, or video and MyPass LMS converts it into an interactive SCORM course automatically. Or describe a topic in plain language and the AI generates a complete module with quizzes from scratch.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg></div><div class="vpc-t">Certificates and Milestones</div><div class="vpc-d">Branded certificates issued automatically on learning path completion. Configurable milestone badges throughout multi-stage programmes keep learners motivated across weeks and months of upskilling.</div></div></div>
        <div style="text-align:center"><a href="{{ route('product.features') }}" class="btn-primary">Explore All Platform Features</a></div>
    </div>
    </section><div class="feat-wrap"><div class="frow">
        <div class="frow-img">
        <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=880&q=80&auto=format&fit=crop" alt="Build a Complete Upskilling Programme in Under 10 Minutes. — MyPass LMS" loading="lazy" width="560" height="380">
        <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Full learning path built from a single prompt</span></div>
        </div>
        <div class="frow-txt">
        <div class="eyebrow"><span class="ew"></span>AI Learning Path Builder</div>
        <h2 class="heading">Build a Complete Upskilling Programme<br><em>in Under 10 Minutes.</em></h2>
        <p>Creating structured learning paths used to require weeks of instructional design. MyPass LMS replaces all of that. Describe the role or skill area and the AI generates a complete, sequenced path — or upload existing materials in any format and MyPass LMS converts them into SCORM courses automatically.</p><p>Every path includes assessments, logical module sequencing, and clear progression from foundational to advanced content. Managers can see who is on which path, how far they have progressed, and where completion is lagging — all from a single real-time dashboard.</p>
        <div class="fpts"><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Full multi-module paths generated from a topic description or role</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Any PDF, PPT, or video converted to SCORM in minutes with assessments</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Paths updated and reassigned automatically when roles or skill requirements change</div></div>
        <a href="{{ route('product.features') }}" class="btn-primary" style="margin-top:18px">See AI Builder Features</a>
        </div>
    </div><div class="frow flip">
        <div class="frow-img">
        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=880&q=80&auto=format&fit=crop" alt="Know Exactly Where Skills Are Falling Short. — MyPass LMS" loading="lazy" width="560" height="380">
        <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Skill gaps surfaced across every role automatically</span></div>
        </div>
        <div class="frow-txt">
        <div class="eyebrow"><span class="ew"></span>Skill Gap Detection</div>
        <h2 class="heading">Know Exactly Where Skills<br><em>Are Falling Short.</em></h2>
        <p>Guessing where your team needs development is not an L&amp;D strategy. MyPass LMS measures actual skill levels against role requirements through assessment data and surfaces gaps by role, team, and individual — so development investment is targeted at the areas where it produces the most return.</p><p>When a gap is identified, the relevant learning path is assigned automatically to close it. When the gap closes, the system recognises it. The loop between identifying a skill gap and closing it runs continuously without manual coordination from your L&amp;D team.</p>
        <div class="fpts"><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Role-based skill benchmarks surfaced through live assessment data</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Assignments updated automatically when gaps are identified or roles change</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Manager dashboards show team skill health at a single glance</div></div>
        <a href="{{ route('product.features') }}" class="btn-primary" style="margin-top:18px">See Skill Gap Features</a>
        </div>
    </div><div class="frow">
        <div class="frow-img">
        <img src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?w=880&q=80&auto=format&fit=crop" alt="Upskilling That Keeps Moving Without L&amp;D Chasing Anyone. — MyPass LMS" loading="lazy" width="560" height="380">
        <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Automated reminders before every course milestone</span></div>
        </div>
        <div class="frow-txt">
        <div class="eyebrow"><span class="ew"></span>Automated Engagement</div>
        <h2 class="heading">Upskilling That Keeps Moving<br><em>Without L&amp;D Chasing Anyone.</em></h2>
        <p>The most common reason continuous learning programmes stall is not lack of content — it is that busy employees deprioritise learning without consistent prompting. MyPass LMS automates the entire engagement cycle so your programme maintains momentum long after launch.</p><p>Reminders go out before course deadlines. Progress notifications celebrate completions. Manager alerts fire when team members fall behind a learning plan. The whole system runs automatically after initial setup — no chasing, no manual follow-up, no admin overhead.</p>
        <div class="fpts"><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Automated reminders before every course and milestone deadline</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Manager alerts when team members fall behind their assigned learning plan</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Completion rates consistently 35% higher than unautomated programmes</div></div>
        <a href="{{ route('product.features') }}" class="btn-primary" style="margin-top:18px">See Automated Engagement Features</a>
        </div>
    </div><div class="frow flip">
        <div class="frow-img">
        <img src="https://images.unsplash.com/photo-1588196749597-9ff075ee6b5b?w=880&q=80&auto=format&fit=crop" alt="Make Upskilling Visible and Worth Completing. — MyPass LMS" loading="lazy" width="560" height="380">
        <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Certificates issued automatically on path completion</span></div>
        </div>
        <div class="frow-txt">
        <div class="eyebrow"><span class="ew"></span>Certifications and Milestones</div>
        <h2 class="heading">Make Upskilling Visible<br><em>and Worth Completing.</em></h2>
        <p>Learners complete more when progress is visible and milestones are recognised. MyPass LMS issues branded certificates at learning path completion and configurable milestone badges throughout to maintain momentum.</p><p>Every certificate is stored permanently in the learner record, shareable, and reportable. Organisations use certification data to inform promotion decisions, identify high-potential employees, and demonstrate L&amp;D ROI to leadership with hard evidence.</p>
        <div class="fpts"><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Branded certificates issued automatically on learning path completion</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Milestone badges configurable throughout multi-stage programmes</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>All certifications stored, reportable, and available for L&amp;D ROI reporting</div></div>
        <a href="{{ route('product.features') }}" class="btn-primary" style="margin-top:18px">See Certification Features</a>
        </div>
    </div></div><section class="courses-band">
    <div class="courses-inner">
        <div>
        <div class="eyebrow"><span class="ew"></span>Ready-Made Course Library</div>
        <h2 class="heading" style="font-size:30px">50+ Courses Ready to Assign From Day One</h2>
        <p style="font-size:15px;color:var(--ink3);line-height:1.76;margin-top:10px">No content creation needed to launch your upskilling programme. MyPass LMS includes a professionally built library of courses covering leadership, communication, data literacy, digital skills, and professional development — ready to assign to every learner the same day you sign up. Use them as-is or customise to match your organisation's specific programmes and role requirements.</p>
        <div class="courses-btns">
            <a href="{{ route('courses') }}" class="btn-lib">Browse the Course Library</a>
            <a href="{{ route('pricing') }}" class="btn-lib2">Start Free Trial</a>
        </div>
        </div>
        <div>
        <div class="courses-card">
            <p style="font-size:11px;font-weight:800;letter-spacing:.09em;text-transform:uppercase;color:var(--ink4);margin-bottom:14px">Courses ready from day one — no setup required</p>
            <div class="courses-chips"><span class="cchip">Leadership &amp; Management</span><span class="cchip">Communication Skills</span><span class="cchip">Data Literacy</span><span class="cchip">Digital Workplace Tools</span><span class="cchip">Critical Thinking</span><span class="cchip">Project Management</span><span class="cchip">AI Fundamentals</span><span class="cchip">Emotional Intelligence</span></div>
            <p class="note">All courses SCORM-ready &middot; Fully customisable to your brand &middot; Assignable in one click</p>
        </div>
        </div>
    </div>
    </section><section class="hl-band">
    <div class="hl-inner">
        <div>
        <div class="eyebrow"><span class="ew"></span>The Business Case for Upskilling</div>
        <h2 class="hl-h">Skill Gaps Cost More<br><em>Than Fixing Them.</em></h2>
        <p class="hl-p">Skill gaps show up as slower delivery, higher error rates, more supervision time, and the replacement cost when high performers leave for organisations that invest in their development. A continuous learning programme with MyPass LMS pays for itself through measurable improvements in team performance, retention, and output quality.</p>
        <a href="https://kprise.com/case-study/" class="btn-primary" style="margin-top:0" target="_blank" rel="noopener">Read Customer Case Studies</a>
        </div>
        <div><div class="hlm"><div class="hlm-n">4x</div><div><div class="hlm-t">Faster course creation with AI builder</div><div class="hlm-d">L&amp;D teams deliver upskilling programmes in a fraction of traditional authoring time — from weeks to hours.</div></div></div><div class="hlm"><div class="hlm-n">85%</div><div><div class="hlm-t">Increase in skill retention with structured paths</div><div class="hlm-d">Structured, sequenced learning paths deliver lasting knowledge compared to one-time training events.</div></div></div><div class="hlm"><div class="hlm-n">35%</div><div><div class="hlm-t">Better completion rates with automated engagement</div><div class="hlm-d">Automated reminder sequences consistently outperform manual follow-up across all upskilling programme types.</div></div></div></div>
    </div>
    </section><section class="sec stint">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Recognised by Independent Reviewers</div>
        <h2 class="heading">Rated by L&amp;D Teams Who<br><em>Evaluated the Full Market</em></h2>
        <p class="lead cx">Independent ratings from learning and development professionals who tested MyPass LMS against every major alternative.</p>
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
        <h2 class="heading">What L&amp;D Teams Say<br><em>After Switching to MyPass LMS</em></h2>
        </div>
        <div class="tc-grid">
        <div class="tc feat"><div class="tc-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div><div class="tc-q">&ldquo;</div><div class="tc-body">I am wondering why I never contacted these guys sooner. The AI course builder alone cut our content development time from weeks to days. We launched a full upskilling programme for 200 employees in the time it used to take to build a single course. Completion rates stay above 80% because the automated reminders mean our team does not chase anyone manually.</div><div class="tc-author"><div class="tc-av" style="background:linear-gradient(135deg,#A06830,#7A4E20)">RN</div><div><div class="tc-name">Raghu Nath</div><div class="tc-role">President &middot; E-Learning Organisation</div></div></div></div>
        <div class="tc"><div class="tc-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div><div class="tc-q">&ldquo;</div><div class="tc-body">MyPass LMS integrated smoothly with our existing stack. Role-based assignment means our L&amp;D team spends zero time manually assigning courses — everything is automatic. The data we get back is genuinely useful for planning where to invest in skill development next quarter, not just a completion percentage.</div><div class="tc-author"><div class="tc-av" style="background:linear-gradient(135deg,#4220C8,#7B5EEA)">VS</div><div><div class="tc-name">Varun S.</div><div class="tc-role">CEO &middot; Information Technology &amp; Services</div></div></div></div>
        <div class="tc"><div class="tc-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div><div class="tc-q">&ldquo;</div><div class="tc-body">Extremely customisable, great support, easy to navigate. The continuous learning features keep our team engaged month after month rather than completing one-off training. Our completion rates across upskilling programmes are consistently above 80% without our L&amp;D team doing anything manually.</div><div class="tc-author"><div class="tc-av" style="background:linear-gradient(135deg,#2A7A5C,#1D5C45)">AS</div><div><div class="tc-name">Ashleigh S.</div><div class="tc-role">Senior Learning Partner &middot; UAE Organisation</div></div></div></div>
        </div>
        <div style="text-align:center"><a href="https://kprise.com/case-study/" class="btn-ghost" target="_blank" rel="noopener">Read Full Case Studies</a></div>
    </div>
    </section><section class="sec sbg">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Integrations</div>
        <h2 class="heading">Connects to the Tools<br><em>Your L&amp;D Team Already Uses</em></h2>
        <p class="lead cx">MyPass LMS fits inside your existing HR and productivity stack. New starters sync from your HRIS automatically. Learners access training through their existing identity provider — no separate login required.</p>
        </div>
        <div class="int-grid"><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><rect x="3" y="3" width="9" height="9" rx="2" fill="#4220C8"/><rect x="14" y="3" width="9" height="9" rx="2" fill="#4220C8" opacity=".5"/><rect x="3" y="14" width="9" height="9" rx="2" fill="#4220C8" opacity=".5"/><rect x="14" y="14" width="9" height="9" rx="2" fill="#4220C8"/></svg></div><div class="int-name">Okta SSO</div><div class="int-desc">Single sign-on for frictionless learner access</div></div><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><circle cx="13" cy="13" r="10" stroke="#4220C8" stroke-width="2.5"/><path d="M13 7v6l4 2" stroke="#4220C8" stroke-width="2" stroke-linecap="round"/></svg></div><div class="int-name">Azure AD</div><div class="int-desc">Microsoft identity for M365 organisations</div></div><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><path d="M13 4C8 4 4 8 4 13s4 9 9 9 9-4 9-9-4-9-9-9z" stroke="#4220C8" stroke-width="2.2"/><path d="M4 13h18M13 4c-2.5 3-4 5.8-4 9s1.5 6 4 9" stroke="#4220C8" stroke-width="1.6"/></svg></div><div class="int-name">BambooHR</div><div class="int-desc">New employees auto-enrolled on their first day</div></div><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><rect x="3" y="6" width="20" height="14" rx="3" stroke="#4220C8" stroke-width="2.2"/><path d="M8 12h10M8 16h6" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round"/></svg></div><div class="int-name">Zoom</div><div class="int-desc">Blended live and online learning in one place</div></div><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><path d="M13 3L4 8v5c0 5.5 3.8 10.7 9 12 5.2-1.3 9-6.5 9-12V8L13 3z" stroke="#4220C8" stroke-width="2.2" stroke-linejoin="round"/><path d="M9 13l3 3 5-5" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div><div class="int-name">SAML 2.0 SSO</div><div class="int-desc">Works with any SAML 2.0 identity provider</div></div></div>
        <div style="text-align:center"><a href="{{ route('product.integrations') }}" class="btn-primary">Check Out All Integrations</a></div>
    </div>
    </section><section class="sec sw">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Related Use Cases</div>
        <h2 class="heading">Upskilling Connects to<br><em>Your Full Training Lifecycle.</em></h2>
        </div>
        <div class="uc-grid"><div class="ucc"><img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=700&q=80&auto=format&fit=crop" alt="Employee Onboarding" loading="lazy" width="360" height="148"><div class="ucc-body"><span class="ucc-tag">Use Case</span><div class="ucc-t">Employee Onboarding</div><div class="ucc-d">Build the foundation that continuous learning builds on. Structured onboarding that gets every new hire ready to contribute from day one.</div><a href="https://kp.kprise.com/use-cases/onboarding" class="ucc-link">Read more <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div></div><div class="ucc"><img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=700&q=80&auto=format&fit=crop" alt="Compliance Training" loading="lazy" width="360" height="148"><div class="ucc-body"><span class="ucc-tag">Use Case</span><div class="ucc-t">Compliance Training</div><div class="ucc-d">Keep regulatory knowledge current alongside skills development. Automated compliance training that runs alongside your upskilling programme without extra admin.</div><a href="https://kp.kprise.com/use-cases/compliance" class="ucc-link">Read more <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div></div><div class="ucc"><img src="https://images.unsplash.com/photo-1542744094-24638eff58bb?w=700&q=80&auto=format&fit=crop" alt="Customer Training &amp; Education" loading="lazy" width="360" height="148"><div class="ucc-body"><span class="ucc-tag">Use Case</span><div class="ucc-t">Customer Training &amp; Education</div><div class="ucc-d">Extend your upskilling infrastructure to customers. Train them on your product with the same structured paths and tracking that power your internal programmes.</div><a href="https://kp.kprise.com/use-cases/customer-training" class="ucc-link">Read more <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div></div></div>
    </div>
    </section><section class="sec sbg">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Learning Resources</div>
        <h2 class="heading">Practical Guides for L&amp;D<br><em>and Training Teams.</em></h2>
        </div>
        <div class="res-grid"><div class="rcard"><span class="rtype">Guide</span><div class="rt">Learning Insights Hub — Upskilling Strategy and L&amp;D Planning Guides</div><div class="rd">Practical whitepapers on building a continuous learning strategy, measuring skill development ROI, and using AI to cut course production time by 80%. Essential reading before your next L&amp;D planning cycle.</div><a href="https://kprise.com/learning-insights-hub/" class="rlink" target="_blank" rel="noopener">Access the guides <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div><div class="rcard"><span class="rtype">Case Study</span><div class="rt">How Teams Use MyPass LMS to Build Continuous Learning Programmes</div><div class="rd">Real accounts from L&amp;D teams that replaced one-off training with structured, ongoing upskilling on MyPass LMS — what changed in completion rates, skill retention, and team performance.</div><a href="https://kprise.com/case-study/" class="rlink" target="_blank" rel="noopener">Read case studies <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div><div class="rcard"><span class="rtype">Comparison</span><div class="rt">MyPass LMS vs TalentLMS, Docebo, Moodle on Upskilling Features</div><div class="rd">Feature-by-feature comparisons covering AI course building, learning path creation, skill gap detection, progress tracking, and certification management against every major alternative.</div><a href="https://kprise.com/lms-comparisons/" class="rlink" target="_blank" rel="noopener">Compare platforms <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div></div>
    </div>
    </section><section class="sec sw">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Common Questions</div>
        <h2 class="heading">What L&amp;D Leaders Ask<br><em>Before Their Free Trial.</em></h2>
        <p class="lead cx">Can't find your answer? Our team responds same day — <a href="https://help.kprise.com" target="_blank" rel="noopener" style="color:var(--b);font-weight:700">visit the Help Center</a> or <a href="https://calendly.com/onlinesales-kprise/30min" style="color:var(--b);font-weight:700">book a call</a>.</p>
        </div>
        <div class="faq-grid"><div class="fi open"><div class="fi-q">How does the AI learning path builder work?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Describe a role, topic, or skill area and the AI generates a complete sequenced learning path with individual modules, assessments, and logical progression from foundational to advanced content. You can also upload any existing material — PDF, PowerPoint, or video — and MyPass LMS converts it into a polished SCORM module automatically. The whole process takes minutes rather than the weeks a traditional instructional design approach requires.</div></div><div class="fi"><div class="fi-q">Can we assign different learning paths to different roles automatically?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Yes. You configure assignment rules by role, team, department, or seniority. When an employee matches a rule their relevant path is assigned automatically. When roles change, assignments update accordingly. You can also create custom paths for specific high-potential cohorts with different milestones and timelines.</div></div><div class="fi"><div class="fi-q">How does skill gap detection work?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">You set skill benchmarks per role. MyPass LMS measures actual skill levels through assessment data collected during learning and surfaces gaps by role, team, and individual. Managers see their team skill health on a live dashboard. When gaps are identified, the relevant learning paths are assigned automatically to close them.</div></div><div class="fi"><div class="fi-q">Do learners receive certificates on completing a learning path?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Yes. Branded certificates are issued automatically when a learner completes a path or passes an assessment at the required mark. You can configure milestone badges throughout longer programmes. All certificates are stored in the learner record, shareable, and reportable for performance reviews and L&amp;D ROI reporting.</div></div><div class="fi"><div class="fi-q">How does MyPass LMS keep learners engaged across multi-month programmes?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Automated reminders go out before deadlines on a schedule you configure. Progress notifications celebrate completions. Manager alerts flag when team members fall behind. Milestone badges at key points recognise progress throughout. The full engagement cycle runs automatically — even across six or twelve month programmes — without your L&amp;D team chasing anyone.</div></div><div class="fi"><div class="fi-q">Is the 15-day free trial fully featured?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Yes, completely. Full platform access for 15 days with no credit card required. Build learning paths with the AI builder, assign them to real team members, test skill gap detection, configure reminders, and verify reporting capabilities before committing. <a href='https://mypasslms.us/login#register'>Start your free trial here</a>.</div></div></div>
    </div>
    </section><section class="cta-sec">
    <div class="cta-in">
        <div class="cta-tag">15-Day Free Trial — No Card Required</div>
        <h2 class="cta-h">Build Skills That Keep Up<br><em>With Your Business.</em></h2>
        <p class="cta-p">Your competitors are building continuous learning programmes right now. Teams that develop skills continuously outperform those that do not. MyPass LMS gives you AI course building, automated engagement, real-time tracking, and certification — everything needed to run a world-class upskilling programme without adding headcount to your L&amp;D team.</p>
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

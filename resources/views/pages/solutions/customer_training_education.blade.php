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
        .eyebrow{display:inline-flex;align-items:center;gap:6px;font-size:13px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);margin-bottom:10px}
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
    .cta-in{max-width:1500px;margin:0 auto;position:relative;z-index:1;}
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
            <span>Customer Training &amp; Education</span>
        </nav>
        <div class="htag"><span class="htag-dot"></span><span>Customer Training &amp; Education</span></div>
        <h1>Trained Customers Stay Longer.<br><em>Untrained Customers Churn.</em></h1>
        <p class="hero-sub">Every support ticket from a confused customer is a training failure. Every customer who churns because they never fully adopted your product is a training failure. <strong>MyPass LMS helps you build a customer education programme that reduces support burden, accelerates product adoption, and turns customers into advocates.</strong></p>
        <div class="hbtns">
            <a href="https://mypasslms.us/login#register" class="btn-a">Start Free for 15 Days</a>
            <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-b">Book a Demo</a>
        </div>
        <div class="trust-row"><div class="tchip"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>No credit card required</div><div class="tchip"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>15-day free trial</div><div class="tchip"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Branded customer portals</div></div>
        </div>
        <div class="hero-img-wrap">
        <img class="hero-img" src="https://images.unsplash.com/photo-1556761175-b413da4baf72?w=960&q=80&auto=format&fit=crop" alt="Trained Customers Stay Longer. Untrained Customers Churn. — MyPass LMS" loading="eager" width="460" height="380">
        <div class="h-float">
            <div class="hf-dot"></div>
            <div><div class="hf-n">68%</div><div class="hf-l">Fewer support tickets after structured customer training</div></div>
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
    <div class="stats"><div class="stats-in"><div class="sc"><div class="sc-n">68%</div><div class="sc-l">Fewer support tickets from customers who complete structured product training</div></div><div class="sc"><div class="sc-n">40%</div><div class="sc-l">Faster product adoption when customers follow a structured onboarding path</div></div><div class="sc"><div class="sc-n">35%</div><div class="sc-l">Lower churn rates for customers who complete a product certification programme</div></div><div class="sc"><div class="sc-n">Day 1</div><div class="sc-l">Branded customer training portal live from the moment setup is complete</div></div></div></div><section class="sec sw">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Why Customer Training Drives Revenue</div>
        <h2 class="heading">Your Support Team Answers Questions<br><em>That Great Training Would Have Prevented.</em></h2>
        <p class="lead cx">The cost of an untrained customer base shows up in three places: support volume, adoption rates, and churn. Customers who understand your product deeply use it more, renew more consistently, and refer more. MyPass LMS gives you the tools to make structured customer training a competitive advantage — not an afterthought.</p>
        </div>
        <div class="vp-grid"><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg></div><div class="vpc-t">Branded Customer Portals</div><div class="vpc-d">Deliver training through a portal that looks and feels like your product. Custom domain, your logo, your colours, your brand identity throughout. Customers experience one coherent brand from purchase through certification.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div><div class="vpc-t">Self-Paced Product Courses</div><div class="vpc-d">Customers learn at their own pace, on their schedule, from any device. Structured course sequences guide them from onboarding basics through advanced features at the speed that works for their team.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg></div><div class="vpc-t">Product Certifications</div><div class="vpc-d">Issue recognised certifications when customers demonstrate proficiency. Certified customers use your product more deeply, expand their usage, and are significantly less likely to churn at renewal.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></div><div class="vpc-t">SCORM and xAPI Support</div><div class="vpc-d">Import existing product training from any SCORM or xAPI-compliant source immediately — no rebuilding required. New content created with the MyPass LMS AI builder in minutes from any existing documentation.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M15 12H3"/></svg></div><div class="vpc-t">SSO for External Learners</div><div class="vpc-d">Customers access training with their existing account credentials via SAML 2.0 or OAuth SSO. No second login, no forgotten passwords, no barrier between your customer and their next training module.</div></div><div class="vpc"><div class="vpc-ic"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div><div class="vpc-t">Customer Success Intelligence</div><div class="vpc-d">See which customers have completed onboarding, which features they have trained on, and where adoption is stalling. Customer success teams use this data to intervene before churn happens — not after.</div></div></div>
        <div style="text-align:center"><a href="{{ route('product.features') }}" class="btn-primary">Explore All Platform Features</a></div>
    </div>
    </section><div class="feat-wrap"><div class="frow">
        <div class="frow-img">
        <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=880&q=80&auto=format&fit=crop" alt="Your Brand. Your Product. Your Training Experience. — MyPass LMS" loading="lazy" width="560" height="380">
        <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Customer portal live with your branding from day one</span></div>
        </div>
        <div class="frow-txt">
        <div class="eyebrow"><span class="ew"></span>Branded Customer Portals</div>
        <h2 class="heading">Your Brand. Your Product.<br><em>Your Training Experience.</em></h2>
        <p>Most LMS platforms force customers into a generic training environment that looks nothing like the product they are trying to learn. That disconnect reduces engagement and makes training feel like an obligation rather than a natural extension of your product experience.</p><p>MyPass LMS gives you a fully branded customer portal — custom domain, your logo, your colours, your product's visual identity — so customers experience one coherent brand from purchase through certification. White-labelling available on Business and Enterprise plans.</p>
        <div class="fpts"><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Custom domain, logo, colours, and brand identity throughout</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>SSO so customers access training with their existing product login</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Mobile-responsive for customers learning on any device</div></div>
        <a href="{{ route('product.features') }}" class="btn-primary" style="margin-top:18px">See Branded Portal Features</a>
        </div>
    </div><div class="frow flip">
        <div class="frow-img">
        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=880&q=80&auto=format&fit=crop" alt="Guide Every Customer from Confused to Confident. — MyPass LMS" loading="lazy" width="560" height="380">
        <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">40% faster product adoption with structured onboarding</span></div>
        </div>
        <div class="frow-txt">
        <div class="eyebrow"><span class="ew"></span>Structured Onboarding Paths</div>
        <h2 class="heading">Guide Every Customer from<br><em>Confused to Confident.</em></h2>
        <p>Customers who receive a dumped folder of documentation do not adopt your product — they accumulate support tickets until they cancel. Customers who follow a structured, sequenced onboarding path understand your product faster, use it more deeply, and renew at higher rates.</p><p>MyPass LMS builds guided onboarding journeys that take customers step by step through your product — from basic setup through advanced workflows — with assessments at each stage to confirm understanding before progression continues.</p>
        <div class="fpts"><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Structured sequences from setup basics to advanced feature use</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Assessments confirm understanding before customers progress</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Customer success teams see live completion data to intervene early</div></div>
        <a href="{{ route('solutions.employee-onboarding') }}" class="btn-primary" style="margin-top:18px">See Onboarding Features</a>
        </div>
    </div><div class="frow">
        <div class="frow-img">
        <img src="https://images.unsplash.com/photo-1606326608606-aa0b62935f2b?w=880&q=80&auto=format&fit=crop" alt="Certified Customers Are Your Best Retention Strategy. — MyPass LMS" loading="lazy" width="560" height="380">
        <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">35% lower churn for certified customers</span></div>
        </div>
        <div class="frow-txt">
        <div class="eyebrow"><span class="ew"></span>Product Certifications</div>
        <h2 class="heading">Certified Customers Are<br><em>Your Best Retention Strategy.</em></h2>
        <p>The data is consistent: customers who earn a product certification are significantly less likely to churn. Certification creates investment — they have proven competency, they are embedded in your platform, and the switching cost has risen considerably.</p><p>MyPass LMS issues branded, shareable certifications when customers pass your product assessment. Certifications are something worth achieving — customers share them on LinkedIn, reference them internally, and use them to demonstrate product expertise within their organisations.</p>
        <div class="fpts"><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Branded product certifications issued automatically on assessment completion</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Shareable certificates that extend your brand reach beyond the platform</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Renewal tracking keeps certified customers engaged at each renewal cycle</div></div>
        
        </div>
    </div><div class="frow flip">
        <div class="frow-img">
        <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?w=880&q=80&auto=format&fit=crop" alt="See Which Customers Need Attention Before They Churn. — MyPass LMS" loading="lazy" width="560" height="380">
        <div class="frow-badge"><span class="fb-ok"></span><span class="fb-t">Live customer adoption data for customer success teams</span></div>
        </div>
        <div class="frow-txt">
        <div class="eyebrow"><span class="ew"></span>Customer Success Intelligence</div>
        <h2 class="heading">See Which Customers Need<br><em>Attention Before They Churn.</em></h2>
        <p>Your customer success team should not discover a churn risk at the renewal call. MyPass LMS gives them live visibility into which customers have completed key training milestones, which features they are trained on, and where engagement has stalled — weeks before renewal.</p><p>Intervention at the right moment — when a customer has not completed a critical onboarding module or has not engaged with training in 30 days — is what separates proactive customer success from reactive firefighting.</p>
        <div class="fpts"><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Live view of which customers have completed each onboarding milestone</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Feature adoption tracking tied directly to course completion data</div><div class="fp"><svg viewBox="0 0 16 16" fill="none" stroke="#16A34A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 8l4 4 8-8"/></svg>Automated alerts when customer engagement drops below configured thresholds</div></div>
        <a href="{{ route('product.features') }}" class="btn-primary" style="margin-top:18px">See Analytics Features</a>
        </div>
    </div></div><section class="courses-band">
    <div class="courses-inner">
        <div>
        <div class="eyebrow"><span class="ew"></span>Ready-Made Product Training Templates</div>
        <h2 class="heading" style="font-size:30px">Customer Training Content Ready to Deploy From Day One</h2>
        <p style="font-size:15px;color:var(--ink3);line-height:1.76;margin-top:10px">Do not wait weeks for a content team to build your customer training programme. MyPass LMS gives you ready-made course templates for product onboarding, feature walkthroughs, troubleshooting guides, and customer certification paths — professionally structured and ready to customise with your specific product details. Deploy to your customers the same day you sign up.</p>
        <div class="courses-btns">
            <a href="{{ route('courses') }}" class="btn-lib">Browse the Course Library</a>
            <a href="{{ route('pricing') }}" class="btn-lib2">Start Free Trial</a>
        </div>
        </div>
        <div>
        <div class="courses-card">
            <p style="font-size:11px;font-weight:800;letter-spacing:.09em;text-transform:uppercase;color:var(--ink4);margin-bottom:14px">Courses ready from day one — no setup required</p>
            <div class="courses-chips"><span class="cchip">Product Onboarding</span><span class="cchip">Feature Walkthroughs</span><span class="cchip">Troubleshooting Guides</span><span class="cchip">Best Practice Courses</span><span class="cchip">Certification Prep</span><span class="cchip">Admin Training</span><span class="cchip">Advanced Feature Use</span><span class="cchip">Use Case Tutorials</span></div>
            <p class="note">All courses SCORM-ready &middot; Fully customisable to your brand &middot; Assignable in one click</p>
        </div>
        </div>
    </div>
    </section><section class="hl-band">
    <div class="hl-inner">
        <div>
        <div class="eyebrow"><span class="ew"></span>The Customer Training ROI</div>
        <h2 class="hl-h">Customer Education Is<br><em>a Revenue Retention Strategy.</em></h2>
        <p class="hl-p">Every hour your support team spends answering questions that training would have prevented is money spent backwards. Customers who complete structured education programmes churn less, expand more, and refer more. MyPass LMS turns your customer education programme from an afterthought into a competitive advantage.</p>
        <a href="https://kprise.com/case-study/" class="btn-primary" style="margin-top:0" target="_blank" rel="noopener">Read Customer Case Studies</a>
        </div>
        <div><div class="hlm"><div class="hlm-n">68%</div><div><div class="hlm-t">Fewer support tickets from trained customers</div><div class="hlm-d">Customers who complete product training generate significantly fewer support requests than untrained customers across all sectors.</div></div></div><div class="hlm"><div class="hlm-n">40%</div><div><div class="hlm-t">Faster product adoption with structured paths</div><div class="hlm-d">Guided customer journeys reduce time-to-value and increase the depth of feature adoption compared to documentation-based onboarding.</div></div></div><div class="hlm"><div class="hlm-n">35%</div><div><div class="hlm-t">Lower churn rates for certified customers</div><div class="hlm-d">Certified customers are more embedded in your platform and significantly less likely to churn at renewal than uncertified ones.</div></div></div></div>
    </div>
    </section><section class="sec stint">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Recognised by Independent Reviewers</div>
        <h2 class="heading">Rated by Customer Success and Product<br><em>Teams Across the Market</em></h2>
        <p class="lead cx">Independent ratings from customer success, product, and L&D professionals who evaluated MyPass LMS against the full field.</p>
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
        <h2 class="heading">What Teams Say About MyPass LMS<br><em>for Customer Training</em></h2>
        </div>
        <div class="tc-grid">
        <div class="tc feat"><div class="tc-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div><div class="tc-q">&ldquo;</div><div class="tc-body">MyPass LMS integrated smoothly with our CRM, offering deep customisation and easy learner management. Our customer success team now has live visibility into which customers are engaged with training and which are falling behind. We intervene weeks before a renewal risk becomes a churn event instead of finding out at the renewal call.</div><div class="tc-author"><div class="tc-av" style="background:linear-gradient(135deg,#4220C8,#7B5EEA)">VS</div><div><div class="tc-name">Varun S.</div><div class="tc-role">CEO &middot; Information Technology &amp; Services</div></div></div></div>
        <div class="tc"><div class="tc-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div><div class="tc-q">&ldquo;</div><div class="tc-body">The branded portal feature was what sold us. Our customers access training through what looks like our own platform. Feedback has been overwhelmingly positive — they see training as part of the product experience, not a separate obligation. Completion rates went from 30% to over 75% after we moved to MyPass LMS.</div><div class="tc-author"><div class="tc-av" style="background:linear-gradient(135deg,#A06830,#7A4E20)">RN</div><div><div class="tc-name">Raghu Nath</div><div class="tc-role">President &middot; E-Learning Organisation</div></div></div></div>
        <div class="tc"><div class="tc-stars">&#9733; &#9733; &#9733; &#9733; &#9733;</div><div class="tc-q">&ldquo;</div><div class="tc-body">We have been a Kprise client for over four years. The platform helped us scale our customer education programme without adding headcount. The certification programme has become one of our most valued customer engagement tools — certified customers stay longer and refer more than any other segment.</div><div class="tc-author"><div class="tc-av" style="background:linear-gradient(135deg,#2A7A5C,#1D5C45)">SD</div><div><div class="tc-name">Shawn D.</div><div class="tc-role">Director &middot; American Board</div></div></div></div>
        </div>
        <div style="text-align:center"><a href="https://kprise.com/case-study/" class="btn-ghost" target="_blank" rel="noopener">Read Full Case Studies</a></div>
    </div>
    </section><section class="sec sbg">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Integrations</div>
        <h2 class="heading">Connects to Your CRM<br><em>and Product Stack.</em></h2>
        <p class="lead cx">MyPass LMS connects to the tools your customer success and product teams already use so training data flows to the systems your team works in every day — without manual exports or data reconciliation.</p>
        </div>
        <div class="int-grid"><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><rect x="3" y="3" width="9" height="9" rx="2" fill="#4220C8"/><rect x="14" y="3" width="9" height="9" rx="2" fill="#4220C8" opacity=".5"/><rect x="3" y="14" width="9" height="9" rx="2" fill="#4220C8" opacity=".5"/><rect x="14" y="14" width="9" height="9" rx="2" fill="#4220C8"/></svg></div><div class="int-name">Okta SSO</div><div class="int-desc">Single sign-on for frictionless external learner access</div></div><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><circle cx="13" cy="13" r="10" stroke="#4220C8" stroke-width="2.5"/><path d="M13 7v6l4 2" stroke="#4220C8" stroke-width="2" stroke-linecap="round"/></svg></div><div class="int-name">Azure AD</div><div class="int-desc">Microsoft identity for enterprise customer accounts</div></div><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z" stroke="#4220C8" stroke-width="2"/></svg></div><div class="int-name">Salesforce</div><div class="int-desc">Training and certification data synced to CRM records</div></div><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><rect x="3" y="6" width="20" height="14" rx="3" stroke="#4220C8" stroke-width="2.2"/><path d="M8 12h10M8 16h6" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round"/></svg></div><div class="int-name">Zoom</div><div class="int-desc">Live customer training sessions alongside online modules</div></div><div class="int-card"><div class="int-icon"><svg width="24" height="24" viewBox="0 0 26 26" fill="none" aria-hidden="true"><path d="M13 3L4 8v5c0 5.5 3.8 10.7 9 12 5.2-1.3 9-6.5 9-12V8L13 3z" stroke="#4220C8" stroke-width="2.2" stroke-linejoin="round"/><path d="M9 13l3 3 5-5" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div><div class="int-name">SAML 2.0 SSO</div><div class="int-desc">Works with any customer identity provider</div></div></div>
        <div style="text-align:center"><a href="{{ route('product.integrations') }}" class="btn-primary">Check Out All Integrations</a></div>
    </div>
    </section><section class="sec sw">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Related Use Cases</div>
        <h2 class="heading">Customer Training Connects to<br><em>Your Wider Training Strategy.</em></h2>
        </div>
        <div class="uc-grid"><div class="ucc"><img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=700&q=80&auto=format&fit=crop" alt="Continuous Learning &amp; Upskilling" loading="lazy" width="360" height="148"><div class="ucc-body"><span class="ucc-tag">Use Case</span><div class="ucc-t">Continuous Learning &amp; Upskilling</div><div class="ucc-d">Extend the same learning infrastructure used for customer education to your internal team. Role-based paths, skill gap detection, and automated progression for every employee.</div><a href="https://kp.kprise.com/use-cases/upskilling" class="ucc-link">Read more <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div></div><div class="ucc"><img src="https://images.unsplash.com/photo-1542744094-24638eff58bb?w=700&q=80&auto=format&fit=crop" alt="Partner &amp; Channel Training" loading="lazy" width="360" height="148"><div class="ucc-body"><span class="ucc-tag">Use Case</span><div class="ucc-t">Partner &amp; Channel Training</div><div class="ucc-d">Train your resellers and channel partners with the same structured programmes used for direct customers. Branded portals per partner, certification, and adoption tracking for every account.</div><a href="https://kp.kprise.com/use-cases/partner-training" class="ucc-link">Read more <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div></div><div class="ucc"><img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=700&q=80&auto=format&fit=crop" alt="Compliance Training" loading="lazy" width="360" height="148"><div class="ucc-body"><span class="ucc-tag">Use Case</span><div class="ucc-t">Compliance Training</div><div class="ucc-d">Extend mandatory compliance training to external learners using the same platform that powers your customer education. One system, one audit trail, no duplication.</div><a href="https://kp.kprise.com/use-cases/compliance" class="ucc-link">Read more <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div></div></div>
    </div>
    </section><section class="sec sbg">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Learning Resources</div>
        <h2 class="heading">Guides for Customer Success<br><em>and Product Teams.</em></h2>
        </div>
        <div class="res-grid"><div class="rcard"><span class="rtype">Guide</span><div class="rt">Learning Insights Hub — Customer Education Strategy and LMS Selection Guides</div><div class="rd">Practical guides on building a customer education programme, measuring training ROI on churn and adoption, and selecting the right LMS for external learners.</div><a href="https://kprise.com/learning-insights-hub/" class="rlink" target="_blank" rel="noopener">Access the guides <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div><div class="rcard"><span class="rtype">Case Study</span><div class="rt">How Companies Use MyPass LMS to Train Customers and Reduce Churn</div><div class="rd">Real accounts from product and CS teams that built customer education programmes on MyPass LMS — what changed in support volume, adoption metrics, and renewal rates.</div><a href="https://kprise.com/case-study/" class="rlink" target="_blank" rel="noopener">Read case studies <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div><div class="rcard"><span class="rtype">Comparison</span><div class="rt">MyPass LMS vs TalentLMS, Docebo, and Thought Industries on Customer Training</div><div class="rd">Feature-by-feature comparisons covering branded portals, external SSO, SCORM support, certification management, and customer adoption analytics.</div><a href="https://kprise.com/lms-comparisons/" class="rlink" target="_blank" rel="noopener">Compare platforms <svg viewBox="0 0 12 12" fill="none" stroke="#4220C8" stroke-width="2.5" aria-hidden="true"><polyline points="3 2 9 6 3 10"/></svg></a></div></div>
    </div>
    </section><section class="sec sw">
    <div class="wrap">
        <div class="cx">
        <div class="eyebrow"><span class="ew"></span>Common Questions</div>
        <h2 class="heading">What Customer Success and Product Teams Ask<br><em>Before Their Free Trial.</em></h2>
        <p class="lead cx">Can't find your answer? Our team responds same day — <a href="https://help.kprise.com" target="_blank" rel="noopener" style="color:var(--b);font-weight:700">visit the Help Center</a> or <a href="https://calendly.com/onlinesales-kprise/30min" style="color:var(--b);font-weight:700">book a call</a>.</p>
        </div>
        <div class="faq-grid"><div class="fi open"><div class="fi-q">Can customers access training without creating a separate account?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Yes. MyPass LMS supports SSO via SAML 2.0 and OAuth so customers access training using their existing account credentials. No separate account, no password to manage, no friction between your customer and their next module. SSO is available on all plans.</div></div><div class="fi"><div class="fi-q">Can we brand the training portal with our own domain and identity?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Yes. The customer portal is fully brandable — custom domain, your logo, your colour scheme, your typography throughout. Customers experience one coherent brand from login through certificate download. White-labelling is available on Business and Enterprise plans.</div></div><div class="fi"><div class="fi-q">Can we import existing product training content from other tools?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Yes. MyPass LMS supports SCORM 1.2, SCORM 2004, xAPI, and AICC imports. Any content built in a third-party authoring tool deploys immediately. If you have existing documentation or video recordings, the MyPass LMS AI builder converts them into interactive SCORM courses automatically.</div></div><div class="fi"><div class="fi-q">How do we see which customers are engaging with training?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">The customer success dashboard shows live completion data for each customer — which onboarding milestones are complete, which features they are trained on, and where engagement has dropped. Automated alerts notify your team when a customer has not engaged with training for a defined number of days.</div></div><div class="fi"><div class="fi-q">Can we issue certifications for customers who complete our programme?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Yes. Branded, shareable certificates are issued automatically when customers pass an assessment at the required mark. Customers can share their certificate on LinkedIn and internally — extending your brand reach and creating social proof for your product's depth.</div></div><div class="fi"><div class="fi-q">Is the 15-day free trial fully featured for external learner training?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div><div class="fi-a">Yes, completely. Full platform access for 15 days with no credit card required. Set up your branded portal, build customer onboarding paths, test SSO, configure certifications, and verify adoption tracking before committing. <a href='https://mypasslms.us/login#register'>Start your free trial here</a>.</div></div></div>
    </div>
    </section><section class="cta-sec">
    <div class="cta-in">
        <div class="cta-tag">15-Day Free Trial — No Card Required</div>
        <h2 class="cta-h">Turn Customer Training Into<br><em>Your Best Retention Tool.</em></h2>
        <p class="cta-p">Customers who are trained stay longer, expand more, and refer more. MyPass LMS gives you branded portals, structured onboarding paths, certifications, and live adoption data — everything your customer success team needs to make training a measurable competitive advantage from day one.</p>
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

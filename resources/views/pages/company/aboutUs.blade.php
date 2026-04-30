@extends('layouts.app')

@push('styles')
<style>
/* ═══════ RESET ═══════ */
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
:root{
  --b:#4220C8;--bd:#2D1490;--bdd:#1A0B6B;
  --bl:#EEE9FF;--bl2:#F5F2FF;--bm:#7B5EEA;
  --bg:#FAFAFA;--w:#FFFFFF;
  --ink:#0F0C1F;--ink2:#27224A;--ink3:#524D72;--ink4:#918CA8;
  --ok:#16A34A;--ok2:#DCFCE7;
  --bdr:rgba(66,32,200,0.09);--bdr2:rgba(66,32,200,0.18);
  --sh:0 1px 4px rgba(66,32,200,0.05),0 6px 20px rgba(66,32,200,0.07);
  --sh2:0 4px 16px rgba(66,32,200,0.09),0 16px 40px rgba(66,32,200,0.09);
  --sh3:0 8px 32px rgba(66,32,200,0.11),0 28px 64px rgba(66,32,200,0.11);
  --gr:linear-gradient(135deg,var(--b),var(--bd));
}
html{scroll-behavior:smooth;}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--bg);color:var(--ink);line-height:1.65;-webkit-font-smoothing:antialiased;overflow-x:hidden;}

/* ═══════ NAV ═══════ */
.nav{position:sticky;top:0;z-index:100;height:68px;padding:0 52px;background:rgba(255,255,255,0.96);backdrop-filter:blur(20px);border-bottom:1px solid var(--bdr);display:flex;align-items:center;justify-content:space-between;}
.nav-logo{display:flex;align-items:center;gap:10px;text-decoration:none;}
.lm{width:36px;height:36px;border-radius:10px;background:var(--gr);display:flex;align-items:center;justify-content:center;font-weight:900;font-size:15px;color:#fff;box-shadow:0 4px 14px rgba(66,32,200,0.28);}
.ln{font-size:18px;font-weight:800;color:var(--ink);letter-spacing:-0.3px;}
.ln em{color:var(--b);font-style:normal;}
.nav ul{display:flex;gap:26px;list-style:none;}
.nav ul a{font-size:14px;font-weight:500;color:var(--ink3);text-decoration:none;transition:color .2s;}
.nav ul a:hover,.nav ul a.on{color:var(--b);}
.nav-r{display:flex;gap:10px;}
.btn-o{font-size:13px;font-weight:600;padding:8px 18px;border:1.5px solid var(--bdr2);border-radius:9px;color:var(--ink2);background:transparent;text-decoration:none;transition:all .2s;font-family:inherit;cursor:pointer;}
.btn-o:hover{border-color:var(--b);color:var(--b);}
.btn-p{font-size:13px;font-weight:700;padding:9px 22px;background:var(--gr);color:#fff;border:none;border-radius:9px;text-decoration:none;box-shadow:0 4px 16px rgba(66,32,200,0.26);transition:all .2s;font-family:inherit;cursor:pointer;}
.btn-p:hover{transform:translateY(-1px);box-shadow:0 6px 22px rgba(66,32,200,0.38);}

/* ═══════ HERO ═══════ */
.hero{background:var(--w);padding:40px 52px 72px;border-bottom:1px solid var(--bdr);position:relative;overflow:hidden;}
.hero::before{content:'';position:absolute;top:0;right:0;bottom:0;width:42%;background:var(--bl2);clip-path:ellipse(100% 100% at 100% 50%);pointer-events:none;}
.hero-inner{max-width:1500px;margin:0 auto;display:grid;grid-template-columns:1fr 460px;gap:72px;align-items:center;position:relative;z-index:1;}
.hero-tag{display:inline-flex;align-items:center;gap:8px;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);margin-bottom:16px;}
.ew{width:18px;height:2.5px;background:var(--gr);border-radius:2px;display:block;}
.hero h1{font-size:50px;font-weight:900;line-height:1.08;color:var(--ink);margin-bottom:20px;}
.hero h1 em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
.hero-desc{font-size:17px;line-height:1.75;color:var(--ink3);margin-bottom:32px;max-width:500px;}
.hero-desc strong{color:var(--ink2);font-weight:600;}
.hero-btns{display:flex;gap:14px;margin-bottom:0;}
.btn-primary{display:inline-flex;align-items:center;gap:8px;font-family:inherit;font-size:15px;font-weight:700;padding:14px 28px;border-radius:11px;background:var(--gr);color:#fff;border:none;cursor:pointer;text-decoration:none;box-shadow:0 4px 18px rgba(66,32,200,0.26);transition:all .22s;}
.btn-primary:hover{transform:translateY(-2px);box-shadow:0 8px 26px rgba(66,32,200,0.38);}
.btn-secondary{display:inline-flex;align-items:center;gap:8px;font-family:inherit;font-size:15px;font-weight:600;padding:13px 26px;border-radius:11px;background:var(--w);color:var(--b);border:1.5px solid var(--bdr2);cursor:pointer;text-decoration:none;transition:all .22s;}
.btn-secondary:hover{background:var(--bl);}
.hero-stats{display:grid;grid-template-columns:repeat(4,1fr);gap:0;border-top:1px solid var(--bdr);padding-top:28px;}
.hstat{text-align:center;padding:0 8px;}
.hstat:not(:last-child){border-right:1px solid var(--bdr);}
.hstat-n{font-size:32px;font-weight:900;letter-spacing:-1px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
.hstat-l{font-size:12px;color:var(--ink4);font-weight:500;margin-top:4px;}
/* hero right */
.hero-right{position:relative;}
.hero-right img{width:100%;height:420px;object-fit:cover;border-radius:20px;display:block;box-shadow:var(--sh3);}
.hero-float{position:absolute;bottom:20px;left:20px;background:var(--w);border-radius:14px;padding:14px 20px;box-shadow:0 8px 28px rgba(0,0,0,0.1);display:flex;align-items:center;gap:12px;}
.hf-ic{width:40px;height:40px;border-radius:10px;background:var(--bl);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.hf-n{font-size:17px;font-weight:900;color:var(--b);letter-spacing:-0.5px;}
.hf-l{font-size:11px;color:var(--ink3);font-weight:500;margin-top:1px;}

/* ═══════ TRUST ═══════ */
.trust-bar{background:var(--bl2);border-bottom:1px solid var(--bdr);padding:18px 52px;}
.trust-in{max-width:1240px;margin:0 auto;display:flex;align-items:center;gap:20px;flex-wrap:wrap;}
.tl-label{font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--ink4);white-space:nowrap;}
.t-sep{width:1px;height:20px;background:var(--bdr2);}
.tl-logos{display:flex;gap:16px;flex-wrap:wrap;}
.tl-chip{font-size:13px;font-weight:600;color:var(--ink3);padding:6px 14px;background:var(--w);border:1px solid var(--bdr);border-radius:8px;}

/* ═══════ METRICS BAND ═══════ */
.metrics{background:var(--w);border-bottom:1px solid var(--bdr);}
.met-in{max-width:1240px;margin:0 auto;display:grid;grid-template-columns:repeat(4,1fr);}
.met{padding:36px 24px;text-align:center;border-right:1px solid var(--bdr);transition:background .2s;}
.met:last-child{border-right:none;}
.met:hover{background:var(--bl2);}
.met-n{font-size:44px;font-weight:900;letter-spacing:-2px;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
.met-l{font-size:14px;color:var(--ink3);font-weight:500;margin-top:6px;line-height:1.4;}

/* ═══════ SHARED SECTION TOKENS ═══════ */
.sec{padding:88px 52px;}
.si{max-width:1240px;margin:0 auto;}
.sec-w{background:var(--w);}
.sec-bg{background:var(--bg);}
.sec-tint{background:var(--bl2);}
.eyebrow{display:inline-flex;align-items:center;gap:8px;font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;color:var(--b);margin-bottom:12px;}
.sh{font-size:38px;font-weight:800;line-height:1.12;letter-spacing:-1.4px;color:var(--ink);margin-bottom:14px;}
.sh em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
.sp{font-size:17px;color:var(--ink3);line-height:1.75;max-width:560px;}
.center{text-align:center;}
.center .sp{margin:0 auto;}
.center .eyebrow{justify-content:center;}

/* ═══════ TWO COL ═══════ */
.two-col{display:grid;grid-template-columns:1fr 1fr;gap:72px;align-items:center;}
.img-wrap{position:relative;}
.img-wrap img{width:100%;height:460px;object-fit:cover;border-radius:20px;display:block;box-shadow:var(--sh2);}
.img-badge{position:absolute;bottom:20px;left:20px;background:var(--w);border-radius:12px;padding:14px 18px;box-shadow:0 8px 24px rgba(0,0,0,0.1);}
.ib-n{font-size:28px;font-weight:900;color:var(--b);letter-spacing:-0.8px;}
.ib-l{font-size:11px;color:var(--ink3);font-weight:600;}
.text-col p{font-size:16px;color:var(--ink3);line-height:1.78;margin-bottom:18px;}
.text-col p strong{color:var(--ink2);font-weight:600;}

/* ═══════ ICON GRID — FEATURES ═══════ */
.feat-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-top:52px;}
.feat-card{background:var(--w);border:1px solid var(--bdr);border-radius:18px;padding:28px 24px;box-shadow:var(--sh);transition:all .25s;position:relative;overflow:hidden;}
.feat-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--gr);border-radius:18px 18px 0 0;opacity:0;transition:opacity .25s;}
.feat-card:hover{transform:translateY(-5px);box-shadow:var(--sh2);border-color:var(--bdr2);}
.feat-card:hover::before{opacity:1;}
.fc-icon{width:48px;height:48px;border-radius:13px;background:var(--bl);display:flex;align-items:center;justify-content:center;margin-bottom:16px;flex-shrink:0;box-shadow:0 2px 8px rgba(66,32,200,0.1);}
.fc-icon svg{width:24px;height:24px;}
.fc-title{font-size:16px;font-weight:700;color:var(--ink);margin-bottom:8px;}
.fc-desc{font-size:13px;color:var(--ink3);line-height:1.7;}

/* ═══════ AMS SECTION ═══════ */
.ams-grid{display:grid;grid-template-columns:1fr 1fr;gap:24px;margin-top:52px;}
.ams-card{border-radius:20px;padding:34px;}
.ams-integrate{background:var(--gr);box-shadow:var(--sh3);}
.ams-builtin{background:var(--w);border:1.5px solid var(--bdr);box-shadow:var(--sh);}
.ams-label{font-size:10px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;margin-bottom:12px;}
.ams-integrate .ams-label{color:rgba(255,255,255,0.5);}
.ams-builtin .ams-label{color:var(--b);}
.ams-title{font-size:21px;font-weight:800;line-height:1.3;letter-spacing:-0.4px;margin-bottom:12px;}
.ams-integrate .ams-title{color:#fff;}
.ams-builtin .ams-title{color:var(--ink);}
.ams-body{font-size:15px;line-height:1.72;}
.ams-integrate .ams-body{color:rgba(255,255,255,0.72);}
.ams-builtin .ams-body{color:var(--ink3);}
.ams-list{margin-top:18px;display:flex;flex-direction:column;gap:9px;}
.ams-item{display:flex;align-items:center;gap:10px;font-size:13px;}
.ams-integrate .ams-item{color:rgba(255,255,255,0.82);}
.ams-builtin .ams-item{color:var(--ink3);}
.ams-check{width:18px;height:18px;border-radius:50%;flex-shrink:0;display:flex;align-items:center;justify-content:center;}
.ams-integrate .ams-check{background:rgba(255,255,255,0.2);}
.ams-builtin .ams-check{background:var(--ok2);}
.ams-check svg{width:10px;height:10px;}

/* ═══════ COURSES SECTION ═══════ */
.course-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-top:52px;}
.crs{background:var(--w);border:1px solid var(--bdr);border-radius:18px;overflow:hidden;box-shadow:var(--sh);transition:all .25s;}
.crs:hover{transform:translateY(-5px);box-shadow:var(--sh2);border-color:var(--bdr2);}
.crs-img{width:100%;height:172px;object-fit:cover;display:block;}
.crs-body{padding:20px 22px;}
.crs-cat{font-size:10px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--b);background:var(--bl);padding:3px 10px;border-radius:6px;display:inline-block;margin-bottom:10px;}
.crs-title{font-size:15px;font-weight:700;color:var(--ink);margin-bottom:7px;}
.crs-desc{font-size:13px;color:var(--ink3);line-height:1.6;margin-bottom:14px;}
.crs-foot{display:flex;justify-content:space-between;align-items:center;}
.crs-meta{font-size:12px;color:var(--ink4);font-weight:500;}



/* ═══════ USE CASES (tab) ═══════ */
.uc-tabs{display:flex;gap:10px;flex-wrap:wrap;margin-top:40px;margin-bottom:28px;}
.uc-tab{font-size:13px;font-weight:600;padding:9px 20px;border-radius:100px;border:1.5px solid var(--bdr);background:var(--w);color:var(--ink3);cursor:pointer;transition:all .2s;font-family:inherit;}
.uc-tab.active,.uc-tab:hover{background:var(--b);color:#fff;border-color:var(--b);}
.uc-pane{display:none;}
.uc-pane.active{display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center;}
.uc-pane img{width:100%;height:340px;object-fit:cover;border-radius:18px;box-shadow:var(--sh2);display:block;}
.uc-text h3{font-size:26px;font-weight:800;color:var(--ink);letter-spacing:-0.5px;margin-bottom:12px;}
.uc-text p{font-size:15px;color:var(--ink3);line-height:1.75;margin-bottom:12px;}
.uc-points{display:flex;flex-direction:column;gap:10px;margin-top:16px;}
.uc-pt{display:flex;align-items:flex-start;gap:10px;font-size:14px;color:var(--ink3);}
.uc-pt svg{width:16px;height:16px;flex-shrink:0;margin-top:2px;color:var(--ok);}

/* ═══════ COMPARISON TABLE ═══════ */
.cmp-table{width:100%;border-collapse:collapse;margin-top:48px;border-radius:16px;overflow:hidden;border:1px solid var(--bdr);box-shadow:var(--sh2);}
.cmp-table th{padding:14px 20px;text-align:left;font-size:12px;font-weight:800;letter-spacing:.06em;text-transform:uppercase;}
.cth-f{background:var(--bg);color:var(--ink3);width:32%;}
.cth-x{background:#FEF2F2;color:#B91C1C;width:34%;}
.cth-g{background:var(--bl);color:var(--bd);width:34%;}
.cmp-table td{padding:14px 20px;font-size:14px;border-top:1px solid var(--bdr);vertical-align:middle;}
.cmp-table tr:hover td{background:rgba(66,32,200,0.02);}
.td-f{font-weight:600;color:var(--ink2);}
.td-x,.td-ok{display:flex;align-items:center;gap:9px;}
.td-x{color:var(--ink3);}
.td-x svg,.td-ok svg{width:14px;height:14px;flex-shrink:0;}
.td-ok{color:var(--ink2);font-weight:500;}

/* ═══════ TESTIMONIALS ═══════ */
.tgrid{display:grid;grid-template-columns:1fr 1fr 1fr;gap:20px;margin-top:48px;}
.tc{background:var(--w);border:1px solid var(--bdr);border-radius:20px;padding:28px;display:flex;flex-direction:column;box-shadow:var(--sh);transition:all .25s;}
.tc:hover{transform:translateY(-4px);box-shadow:var(--sh2);border-color:var(--bdr2);}
.tc.feat{background:var(--gr);border-color:transparent;box-shadow:var(--sh3);}
.tc-stars{font-size:13px;letter-spacing:3px;color:var(--b);margin-bottom:14px;}
.tc.feat .tc-stars{color:var(--bl);}
.tc-q{font-size:40px;font-weight:900;line-height:1;color:var(--b);opacity:.18;margin-bottom:6px;}
.tc.feat .tc-q{color:#fff;opacity:.22;}
.tc-body{font-size:14px;line-height:1.78;color:var(--ink3);flex:1;margin-bottom:20px;}
.tc.feat .tc-body{color:rgba(255,255,255,.75);}
.tc-author{display:flex;align-items:center;gap:12px;}
.tc-av{width:42px;height:42px;border-radius:50%;font-size:14px;font-weight:800;color:#fff;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.tc-name{font-size:14px;font-weight:700;color:var(--ink);}
.tc.feat .tc-name{color:#fff;}
.tc-role{font-size:12px;color:var(--ink4);margin-top:1px;}
.tc.feat .tc-role{color:rgba(255,255,255,.5);}

/* ═══════ FAQ ═══════ */
.faq-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:44px;}
.fi{border:1.5px solid var(--bdr);border-radius:14px;background:var(--w);box-shadow:var(--sh);transition:all .2s;}
.fi.open{border-color:var(--bdr2);box-shadow:var(--sh2);}
.fi-q{display:flex;justify-content:space-between;align-items:center;gap:14px;padding:18px 22px;font-size:15px;font-weight:700;color:var(--ink);line-height:1.4;cursor:pointer;}
.fi-t{width:26px;height:26px;min-width:26px;border-radius:50%;background:var(--bl);display:flex;align-items:center;justify-content:center;transition:transform .2s,background .2s;color:var(--b);}
.fi-t svg{width:14px;height:14px;}
.fi.open .fi-t{transform:rotate(45deg);background:var(--b);color:#fff;}
.fi-a{display:none;padding:0 22px 18px;font-size:14px;line-height:1.75;color:var(--ink3);border-top:1px solid var(--bdr);padding-top:14px;}
.fi.open .fi-a{display:block;}

/* ═══════ CTA ═══════ */
.cta-sec{background:var(--bl2);border-top:1px solid var(--bdr);padding:80px 52px;position:relative;overflow:hidden;}
.cta-sec::before{content:'';position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:560px;height:560px;border-radius:50%;background:radial-gradient(circle,rgba(66,32,200,0.07) 0%,transparent 70%);pointer-events:none;}

/* Two-panel split layout */
.cta-split{
  max-width:1200px;margin:0 auto;
  display:grid;grid-template-columns:1fr 40px 1fr;
  gap:0;align-items:stretch;
  position:relative;z-index:1;
}
.cta-panel{padding:0 48px;}
.cta-panel-main{text-align:center;display:flex;flex-direction:column;align-items:center;justify-content:center;border-right:1px solid var(--bdr2);}

/* Divider with "or" */
.cta-divider{
  display:flex;align-items:center;justify-content:center;
  position:relative;
}
.cta-divider span{
  font-size:11px;font-weight:800;color:var(--ink4);letter-spacing:.08em;text-transform:uppercase;
  background:#ebe6fc;padding:6px 0;position:relative;z-index:1;left:-20px;
}

/* Right panel — nonprofit */
.cta-panel-np{padding-left:52px;}
.cta-np-tag{
  display:inline-flex;align-items:center;gap:7px;
  background:var(--gr);color:#fff;
  border-radius:100px;padding:5px 14px;
  font-size:11px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;
  margin-bottom:18px;
}
.cta-np-tag svg{width:13px;height:13px;stroke:#fff;}
.cta-np-h{
  font-size:24px;font-weight:800;line-height:1.25;letter-spacing:-.5px;
  color:var(--ink);margin-bottom:12px;
}
.cta-np-p{font-size:14.5px;color:var(--ink3);line-height:1.72;margin-bottom:24px;}

.cta-np-perks{display:flex;flex-direction:column;gap:16px;margin-bottom:26px;}
.cta-perk{display:flex;align-items:flex-start;gap:14px;}
.cta-perk-ico{
  width:40px;height:40px;border-radius:11px;background:var(--bl);
  border:1px solid var(--bdr2);display:flex;align-items:center;justify-content:center;flex-shrink:0;
}
.cta-perk-ico svg{width:18px;height:18px;stroke:var(--b);}
.cta-perk-title{font-size:14.5px;font-weight:800;color:var(--ink);margin-bottom:3px;}
.cta-perk-desc{font-size:13px;color:var(--ink3);line-height:1.65;}

.cta-np-btn{
  display:inline-flex;align-items:center;gap:8px;
  font-family:inherit;font-size:14.5px;font-weight:700;
  padding:13px 26px;border-radius:11px;
  background:var(--gr);color:#fff;border:none;cursor:pointer;text-decoration:none;
  box-shadow:0 4px 18px rgba(66,32,200,0.28);transition:all .22s;
  margin-bottom:12px;
}
.cta-np-btn:hover{transform:translateY(-2px);box-shadow:0 7px 24px rgba(66,32,200,0.38);}
.cta-np-btn svg{width:15px;height:15px;stroke:#fff;}
.cta-np-note{font-size:12px;color:var(--ink4);line-height:1.55;}

/* keep old single-panel styles for reuse */
.cta-in{max-width:680px;margin:0 auto;position:relative;z-index:1;text-align:center;}
.cta-badge{display:inline-flex;align-items:center;gap:7px;background:var(--b);color:#fff;border-radius:100px;padding:5px 16px;font-size:11px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;margin-bottom:22px;}
.cta-h{font-size:40px;font-weight:900;letter-spacing:-1.8px;line-height:1.09;color:var(--ink);margin-bottom:14px;}
.cta-h em{font-style:normal;background:var(--gr);-webkit-background-clip:text;background-clip:text;color:transparent;}
.cta-p{font-size:16px;color:var(--ink3);line-height:1.72;margin-bottom:28px;max-width:480px;}
.cta-btns{display:flex;gap:14px;justify-content:center;flex-wrap:wrap;margin-bottom:14px;}
.cta-note{font-size:12.5px;color:var(--ink4);}

@media(max-width:900px){
  .cta-split{grid-template-columns:1fr;gap:0;}
  .cta-divider{padding:24px 0;border-top:1px solid var(--bdr2);border-bottom:1px solid var(--bdr2);margin:32px 0;}
  .cta-panel,.cta-panel-np{padding:0;border:none;}
  .cta-panel-main{border-right:none;padding-bottom:0;}
}



/* ═══════ SCROLLING LOGO BAR ═══════ */
.logo-scroll-bar{background:var(--w);border-bottom:1px solid var(--bdr);padding:28px 0 0px;}
.lsb-in{margin:0 auto;}
.lsb-label{font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--ink4);text-align:center;margin-bottom:20px;}
.lsb-track-wrap{overflow:hidden;position:relative;mask-image:linear-gradient(90deg,transparent,black 8%,black 92%,transparent);-webkit-mask-image:linear-gradient(90deg,transparent,black 8%,black 92%,transparent);}
.lsb-track{display:flex;gap:52px;align-items:center;width:max-content;animation:logo-scroll 40s linear infinite;}
.lsb-track:hover{animation-play-state:paused;}
@keyframes logo-scroll{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
.lsb-logo{height:38px;width:auto;flex-shrink:0;}
.lsb-logo:hover{opacity:.9;filter:grayscale(0%);}
.lsb-awards{display:flex;gap:18px;align-items:center;justify-content:center;flex-wrap:wrap;margin-top:20px;padding-top:18px;border-top:1px solid var(--bdr);}
.lsb-award{height:40px;width:auto;opacity:.62;transition:opacity .2s;}
.lsb-award:hover{opacity:1;}

/* ANIMATIONS */
@keyframes fadeUp{from{opacity:0;transform:translateY(24px);}to{opacity:1;transform:translateY(0);}}
.a1{animation:fadeUp .65s ease both;}
.a2{animation:fadeUp .65s .1s ease both;}
.a3{animation:fadeUp .65s .2s ease both;}
.a4{animation:fadeUp .65s .32s ease both;}
.a5{animation:fadeUp .65s .44s ease both;}

/* ═══════ NONPROFIT OFFER BADGE ═══════ */
.np-offer{
  display:inline-flex;align-items:center;gap:10px;
  background:linear-gradient(135deg,#4220C8,#2D1490);
  border-radius:12px;padding:12px 18px;margin-top:20px;
  flex-wrap:wrap;
}
.np-offer-icon{width:32px;height:32px;border-radius:8px;background:rgba(255,255,255,.15);
  display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.np-offer-icon svg{width:16px;height:16px;stroke:#fff;stroke-width:2;fill:none;stroke-linecap:round;stroke-linejoin:round;}
.np-offer-text{font-size:13px;font-weight:700;color:#fff;line-height:1.45;}
.np-offer-text span{font-size:11px;color:rgba(255,255,255,.65);font-weight:500;display:block;margin-top:2px;}
.np-offer-pills{display:flex;gap:8px;flex-wrap:wrap;margin-top:2px;}
.np-pill{background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.22);border-radius:100px;
  padding:3px 11px;font-size:11.5px;font-weight:700;color:#fff;white-space:nowrap;}

/* ═══════ RESPONSIVE ═══════ */
@media(max-width:1100px){
  .hero-inner{grid-template-columns:1fr 380px;gap:48px;}
  .hero h1{font-size:42px;}
}
@media(max-width:960px){
  .hero-inner,.two-col,.ams-grid,.uc-pane.active{grid-template-columns:1fr;gap:40px;}
  .hero{padding:72px 32px 56px;}
  .hero-right{order:-1;}
  .hero-right img{height:320px;}
  .hero::before{display:none;}
  .feat-grid,.course-grid{grid-template-columns:1fr 1fr;gap:16px;}
  .tgrid{grid-template-columns:1fr 1fr;gap:16px;}
  .sec{padding:64px 32px;}
  .lsb-in{padding:0 32px;}
}
@media(max-width:640px){
  .hero h1{font-size:32px;}
  .sh{font-size:28px;}
  .hero-inner,.two-col,.ams-grid,.uc-pane.active,.feat-grid,.course-grid,.tgrid,.faq-grid{grid-template-columns:1fr;}
  .hero{padding:56px 20px 44px;}
  .sec{padding:52px 20px;}
  .foot-g{grid-template-columns:1fr 1fr;gap:32px;}
  .lsb-in{padding:0 20px;}
  nav ul{display:none;}
}
</style>
@endpush

@section('content')
    <!-- HERO -->
    <section class="hero">
    <div class="hero-inner">
        <div>
        <div class="hero-tag a1"><span class="ew"></span>About Kprise</div>
        <h1 class="a2">Courses, Learning and<br><em>Member Education Done Right.</em></h1>
        <p class="hero-desc a3">Kprise has been helping associations, nonprofits, and growing organisations deliver structured, effective training. <strong>MyPass LMS brings together a full course library, a built-in authoring suite, and everything your members need to learn and certify</strong> from a single platform that works the way your organisation actually does.</p>
        <div class="hero-btns a4">
            <a href="https://mypasslms.us/login#register" class="btn-primary">Start Free for 15 Days</a>
            <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-secondary">Book a Demo</a>
        </div>
        </div>
        <div class="hero-right">
        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=920&q=80&auto=format&fit=crop" alt="Team learning together">
        <div class="hero-float">
            <div class="hf-ic">
            <svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
            </div>
            <div>
            <div class="hf-n">15+ Years</div>
            <div class="hf-l">Enterprise Learning Experience</div>
            </div>
        </div>
        </div>
    </div>
    </section>

    <!-- TRUST / SCROLLING LOGOS -->
    <div class="logo-scroll-bar">
    <div class="lsb-in">
        <p class="lsb-label">Trusted by associations, nonprofits and certification bodies</p>
        <div class="lsb-track-wrap">
        <div class="lsb-track">
            <!-- Set 1 -->
            @php 
                $trustedLogos = config('services.trustedLogos');
                $trustedLogosClass = 'lsb-logo';
            @endphp

            <x-logo-strip
                :logos="$trustedLogos"
                :logo-class="$trustedLogosClass"
            />
            
        </div>
        </div>
        <!-- Award badges row -->
        <div class="lsb-awards">
        <img class="lsb-award" src="https://kprise.com/wp-content/uploads/2025/12/1.webp" alt="Capterra 2024">
        <img class="lsb-award" src="https://kprise.com/wp-content/uploads/2025/12/2.webp" alt="GetApp Leader 2024">
        <img class="lsb-award" src="https://kprise.com/wp-content/uploads/2025/12/3.webp" alt="Software Advice FrontRunner">
        <img class="lsb-award" src="https://brand-assets.capterra.com/badge/65ccdf80-7500-42bf-8e6f-aaa875f7613c.svg" alt="Capterra Verified">
        <img class="lsb-award" src="https://brand-assets.getapp.com/badge/f7329061-8cc8-4015-8dbd-9c68980f086d.png" alt="GetApp Verified">
        <img class="lsb-award" src="https://brand-assets.softwareadvice.com/badge/6aeb2175-cd8d-4d46-b212-ddd1b623365b.png" alt="Software Advice Verified">
        </div>
    
    <!-- STORY -->
    <section class="sec sec-w">
    <div class="si">
        <div class="two-col">
        <div class="img-wrap">
            <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?w=920&q=80&auto=format&fit=crop" alt="Building learning systems">
            <div class="img-badge">
            <div class="ib-n">15+</div>
            <div class="ib-l">Years of enterprise learning experience</div>
            </div>
        </div>
        <div class="text-col">
            <div class="eyebrow"><span class="ew"></span>Our Story</div>
            <h2 class="sh">Built from 15 Years of<br><em>Real Training Experience</em></h2>
            <p>Kprise began as an enterprise learning consultancy. For over a decade we designed, built, and managed learning systems for associations, professional bodies, and large organisations across the United States and internationally. That history gave us something most software vendors never have: a deep, firsthand understanding of what L&D teams, association administrators, and nonprofit educators actually need from a learning platform day to day.</p>
            <p>We watched associations struggle to connect their member management systems to a meaningful learning experience. We watched nonprofits try to run volunteer certification programmes across multiple spreadsheets. We watched administrators spend more time managing the LMS than actually supporting learners.</p>
            <p><strong>MyPass LMS was built to solve those exact problems.</strong> It brings together a full course library, a built-in authoring environment, ILT management, digital rights controls, dynamic reporting, and a flexible AMS connection into one platform that is genuinely simple to operate.</p>
        </div>
        </div>
    </div>
    </section>

    <!-- AMS SECTION -->
    <section class="sec sec-bg">
    <div class="si">
        <div class="center">
        <div class="eyebrow"><span class="ew"></span>For Associations and Nonprofits</div>
        <h2 class="sh">Connect Your AMS or Use Ours.<br><em>Either Way, Everything Stays in Sync.</em></h2>
        <p class="sp">Associations run on member data. MyPass LMS connects directly to your existing Association Management System so that member records, enrolments, completions, and certifications stay accurate across both platforms without any manual data entry.</p>
        </div>
        <div class="ams-grid">
        <div class="ams-card ams-integrate">
            <div class="ams-label">If You Already Have an AMS</div>
            <div class="ams-title">Connect Your Existing System via API or SSO</div>
            <p class="ams-body">MyPass LMS integrates with the major Association Management Systems used by professional bodies and nonprofits through standard API and SSO connections. Member data flows automatically between your AMS and the LMS so admins never enter the same information twice.</p>
            <div class="ams-list">
            <div class="ams-item">
                <div class="ams-check">
                <svg viewBox="0 0 10 8" fill="none" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M1 4L3.5 6.5L9 1"/></svg>
                </div>
                Single Sign-On so members access courses with their existing login
            </div>
            <div class="ams-item">
                <div class="ams-check">
                <svg viewBox="0 0 10 8" fill="none" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M1 4L3.5 6.5L9 1"/></svg>
                </div>
                Two-way data sync keeps member records, completions, and certifications up to date
            </div>
            <div class="ams-item">
                <div class="ams-check">
                <svg viewBox="0 0 10 8" fill="none" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M1 4L3.5 6.5L9 1"/></svg>
                </div>
                CE credit and certification data written back automatically to AMS records
            </div>
            <div class="ams-item">
                <div class="ams-check">
                <svg viewBox="0 0 10 8" fill="none" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M1 4L3.5 6.5L9 1"/></svg>
                </div>
                Compatible with iMIS, MemberSuite, Fonteva, Personify, YourMembership, and others via REST API
            </div>
            </div>
        </div>
        <div class="ams-card ams-builtin">
            <div class="ams-label">If You Do Not Have an AMS</div>
            <div class="ams-title">Use the Built-In Association Management Tools</div>
            <p class="ams-body">Not every association needs a standalone AMS. MyPass LMS includes core association management functionality built directly into the platform so smaller organisations can manage their members, their education programmes, and their reporting from a single place.</p>
            <div class="ams-list">
            <div class="ams-item">
                <div class="ams-check">
                <svg viewBox="0 0 10 8" fill="none" stroke="#16A34A" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M1 4L3.5 6.5L9 1"/></svg>
                </div>
                Member group and chapter management with role-based access
            </div>
            <div class="ams-item">
                <div class="ams-check">
                <svg viewBox="0 0 10 8" fill="none" stroke="#16A34A" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M1 4L3.5 6.5L9 1"/></svg>
                </div>
                Membership tier permissions that control which courses each member can access
            </div>
            <div class="ams-item">
                <div class="ams-check">
                <svg viewBox="0 0 10 8" fill="none" stroke="#16A34A" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M1 4L3.5 6.5L9 1"/></svg>
                </div>
                Continuing education tracking and certificate issuance built in
            </div>
            <div class="ams-item">
                <div class="ams-check">
                <svg viewBox="0 0 10 8" fill="none" stroke="#16A34A" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M1 4L3.5 6.5L9 1"/></svg>
                </div>
                Reporting on member engagement, completion, and certification status
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>

    <!-- FULL FEATURE SET -->
    <section class="sec sec-w">
    <div class="si">
        <div class="center">
        <div class="eyebrow"><span class="ew"></span>Platform Features</div>
        <h2 class="sh">Every Tool Your L&D Team<br><em>Actually Needs in One Place</em></h2>
        <p class="sp">No spreadsheets running alongside the LMS. No external authoring subscription. No third-party certificate tool. MyPass brings every core learning and management capability into a single, unified platform.</p>
        </div>
        <div class="feat-grid">

        <!-- Built-in Authoring -->
        <div class="feat-card">
            <div class="fc-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
            </div>
            <div class="fc-title">Built-In Course Authoring</div>
            <div class="fc-desc">Create structured SCORM courses directly inside MyPass from PDFs, PowerPoints, videos, or written content. No external authoring tool subscription required. Build, publish, and update courses without leaving the platform.</div>
        </div>

        <!-- Ready to Use Courses -->
        <div class="feat-card">
            <div class="fc-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
            </div>
            <div class="fc-title">Ready to Use Course Library</div>
            <div class="fc-desc">Access a library of professionally built course packages across compliance, onboarding, leadership, safety, and professional development. Deploy training to your members or employees on the same day you sign up, with no content creation required.</div>
        </div>

        <!-- Assessments -->
        <div class="feat-card">
            <div class="fc-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
            </div>
            <div class="fc-title">Assessments and Essay Grading</div>
            <div class="fc-desc">Build quizzes, scenario-based exams, and written assessments with auto-scoring for objective questions. Essay and long-form responses can be graded manually by instructors or reviewed with AI-assisted grading that surfaces key criteria and saves significant marking time.</div>
        </div>

        <!-- Surveys -->
        <div class="feat-card">
            <div class="fc-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><path d="M14 2v6h6M16 13H8M16 17H8M10 9H8"/></svg>
            </div>
            <div class="fc-title">Surveys Built Into Learning Workflows</div>
            <div class="fc-desc">Collect pre-course expectations, post-course feedback, and learner satisfaction data through surveys that sit directly inside the course experience. No switching to a separate tool. Results are tied to the specific course and learner record so analysis is always in context.</div>
        </div>

        <!-- DRM -->
        <div class="feat-card">
            <div class="fc-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
            </div>
            <div class="fc-title">Digital Rights Management</div>
            <div class="fc-desc">Protect your course content from unauthorised sharing and downloading. Set access windows, restrict downloads, and control which users or membership tiers can access specific courses or course packages. Essential for associations monetising their educational content library.</div>
        </div>

        <!-- Dynamic Reporting -->
        <div class="feat-card">
            <div class="fc-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
            </div>
            <div class="fc-title">Dynamic Reporting and Analytics</div>
            <div class="fc-desc">Generate detailed reports on learner progress, completion rates, assessment scores, survey responses, attendance, and certification status. Filter by group, course, date range, or individual. Reports export cleanly for board presentations, grant submissions, and compliance audits.</div>
        </div>

        <!-- ILT Management -->
        <div class="feat-card">
            <div class="fc-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            </div>
            <div class="fc-title">ILT and Live Session Management</div>
            <div class="fc-desc">Schedule, manage, and track instructor-led training sessions alongside online courses in a single system. Set session capacity, manage waitlists, send automated reminders to registered learners, and record attendance. Integrates with Zoom, Teams, and GoToMeeting.</div>
        </div>

        <!-- Attendance Management -->
        <div class="feat-card">
            <div class="fc-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
            </div>
            <div class="fc-title">Attendance Management</div>
            <div class="fc-desc">Record and track attendance for live sessions, workshops, and webinars directly in the platform. Mark attendance individually or in bulk, generate attendance certificates automatically, and produce attendance reports for accrediting bodies or grant reporting requirements.</div>
        </div>

        <!-- Certificates -->
        <div class="feat-card">
            <div class="fc-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg>
            </div>
            <div class="fc-title">Certificate Creation and Issuance</div>
            <div class="fc-desc">Design branded certificates within MyPass and issue them automatically upon course completion, assessment passing, or attendance confirmation. Set certificate expiry dates and renewal reminders for continuing education requirements. Learners can download and share their certificates directly.</div>
        </div>

        <!-- Help Center and Tickets -->
        <div class="feat-card">
            <div class="fc-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            </div>
            <div class="fc-title">Help Center and Support Tickets</div>
            <div class="fc-desc">Provide your learners with a self-service help centre containing FAQs, how-to guides, and course-specific support content. When learners need additional help, they can raise a support ticket directly from the platform and administrators can manage, assign, and resolve tickets from a central queue.</div>
        </div>

        <!-- Association Education -->
        <div class="feat-card">
            <div class="fc-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            </div>
            <div class="fc-title">Association and Nonprofit Education</div>
            <div class="fc-desc">Deliver structured continuing education programmes for members across chapters, regions, or membership tiers. Manage CE credit tracking, accreditation requirements, and educational pathways that align with your association's professional development standards and member benefit strategy.</div>
        </div>

        <!-- Learning Paths -->
        <div class="feat-card">
            <div class="fc-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#4220C8" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
            </div>
            <div class="fc-title">Learning Paths and Prerequisites</div>
            <div class="fc-desc">Chain courses into structured learning journeys with prerequisite logic, gated progression, and role-specific pathways. Members move through a defined educational sequence at their own pace while administrators track exactly where everyone is in real time.</div>
        </div>

        </div>
    </div>
    </section>

    <!-- READY COURSES TEASER -->
    <section class="sec sec-tint">
    <div class="si">
        <div class="center">
        <div class="eyebrow"><span class="ew"></span>Course Library</div>
        <h2 class="sh">Start Training on Day One With<br><em>Ready to Deploy Course Packages</em></h2>
        <p class="sp">No content creation required to begin. Browse professionally built course packages across the most in-demand training categories and deploy them to your members or team immediately after signing up.</p>
        </div>
        <div class="course-grid">
        <div class="crs">
            <img class="crs-img" src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&q=80&auto=format&fit=crop" alt="Compliance training">
            <div class="crs-body">
            <span class="crs-cat">Compliance</span>
            <div class="crs-title">Workplace Compliance Essentials</div>
            <div class="crs-desc">HIPAA, GDPR, data privacy, and workplace conduct training for organisations that need to demonstrate compliance at any point in time.</div>
            <span class="crs-meta">12 Modules · All Levels</span>
            </div>
        </div>
        <div class="crs">
            <img class="crs-img" src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&q=80&auto=format&fit=crop" alt="Onboarding training">
            <div class="crs-body">
            <span class="crs-cat">Onboarding</span>
            <div class="crs-title">New Member and Employee Onboarding</div>
            <div class="crs-desc">Everything a new member or staff member needs to understand their role, the organisation's culture, key policies, and how to navigate their first weeks effectively.</div>
            <span class="crs-meta">8 Modules · Beginner</span>
            </div>
        </div>
        <div class="crs">
            <img class="crs-img" src="https://images.unsplash.com/photo-1542744094-24638eff58bb?w=600&q=80&auto=format&fit=crop" alt="Leadership training">
            <div class="crs-body">
            <span class="crs-cat">Professional Development</span>
            <div class="crs-title">Leadership and Management Foundations</div>
            <div class="crs-desc">Practical leadership skills for developing managers and committee leaders covering communication, decision making, team motivation, and professional accountability.</div>
            <span class="crs-meta">10 Modules · Intermediate</span>
            </div>
        </div>
        </div>
        <div style="text-align:center;margin-top:36px;">
        <a href="https://kp.kprise.com" class="btn-primary">Browse All Course Packages</a>
        </div>
    </div>
    </section>

    <!-- USE CASES TABS -->
    <section class="sec sec-w">
    <div class="si">
        <div class="center">
        <div class="eyebrow"><span class="ew"></span>Who We Serve</div>
        <h2 class="sh">Built for Associations, Nonprofits,<br><em>and Teams That Take Learning Seriously</em></h2>
        <p class="sp">MyPass LMS is designed specifically for the training scenarios that associations, professional bodies, and mission-driven organisations face every day.</p>
        </div>
        <div class="uc-tabs">
        <button class="uc-tab active" onclick="switchTab(this,'nonprofits')">Nonprofits and Associations</button>
        <button class="uc-tab" onclick="switchTab(this,'compliance')">Compliance Training</button>
        <button class="uc-tab" onclick="switchTab(this,'continuing')">Continuing Education</button>
        <button class="uc-tab" onclick="switchTab(this,'corporate')">Corporate and Enterprise</button>
        </div>

        <div id="nonprofits" class="uc-pane active">
        <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&q=80&auto=format&fit=crop" alt="Nonprofit team">
        <div class="uc-text">
            <h3>Member Education at Scale Without the Overhead</h3>
            <p>Associations and nonprofits run training programmes with lean teams and limited budgets. Every hour spent managing the LMS is an hour not spent on the mission. MyPass reduces that administrative overhead significantly so your team can focus on member value rather than system maintenance.</p>
            <p>Whether you are running mandatory volunteer training, delivering continuing education for professional members, or managing certification renewal across chapters, MyPass handles the delivery, tracking, and reporting automatically.</p>
            <div class="uc-points">
            <div class="uc-pt">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
                Connect to your existing AMS or use the built-in member management tools
            </div>
            <div class="uc-pt">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
                Track CE credits, attendance, and certifications in one place
            </div>
            <div class="uc-pt">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
                Generate grant and funder compliance reports on demand
            </div>
            <div class="uc-pt">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
                Deliver training across multiple chapters and regions from one admin dashboard
            </div>
            </div>
            <div class="np-offer">
            <div class="np-offer-icon">
                <svg viewBox="0 0 20 20"><path d="M10 2l1.8 5.4H17l-4.6 3.3 1.8 5.4L10 13l-4.2 3.1 1.8-5.4L3 7.4h5.2z"/></svg>
            </div>
            <div class="np-offer-text">
                Exclusive Nonprofit Offer
                <span>Special pricing and extended trial for qualifying nonprofit organisations</span>
                <div class="np-offer-pills">
                <span class="np-pill">2 Months Free Trial</span>
                <span class="np-pill">20% Additional Discount</span>
                </div>
            </div>
            </div>
        </div>
        </div>

        <div id="compliance" class="uc-pane">
        <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=800&q=80&auto=format&fit=crop" alt="Compliance training">
        <div class="uc-text">
            <h3>Compliance That Is Always Current and Always Provable</h3>
            <p>Compliance training fails for two predictable reasons. People miss deadlines because no one chased them, and organisations cannot produce proof of completion when an audit arrives. MyPass solves both through automated reminders and on-demand compliance reporting.</p>
            <p>Healthcare, financial services, manufacturing, and educational institutions use MyPass to keep mandatory training current and to generate clean audit documentation at any moment without any manual preparation.</p>
            <div class="uc-points">
            <div class="uc-pt">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
                Certification expiry tracking with automatic renewal reminders
            </div>
            <div class="uc-pt">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
                Audit-ready completion reports generated instantly for any period
            </div>
            <div class="uc-pt">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
                Complete audit trail of every learner action on every course
            </div>
            <div class="uc-pt">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
                HIPAA, OSHA, GDPR, and industry-specific course content available
            </div>
            </div>
        </div>
        </div>

        <div id="continuing" class="uc-pane">
        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=800&q=80&auto=format&fit=crop" alt="Continuing education">
        <div class="uc-text">
            <h3>Continuing Education Programmes That Members Return For</h3>
            <p>Continuing education is one of the most valuable benefits a professional association can offer its members. When CE programmes are well-structured, easy to access, and connected to meaningful credentials, member retention improves and education becomes a genuine differentiator for your organisation.</p>
            <p>MyPass makes it straightforward to build structured CE pathways, issue accredited certificates, track credit hours, and give members a clear view of their progress toward professional development goals.</p>
            <div class="uc-points">
            <div class="uc-pt">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
                CE credit hour tracking tied directly to completed courses and sessions
            </div>
            <div class="uc-pt">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
                Accredited certificate issuance with branded design and automatic delivery
            </div>
            <div class="uc-pt">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
                Learner transcript showing all completed CE activity across courses and ILT sessions
            </div>
            <div class="uc-pt">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
                Digital rights management for premium or paid education content
            </div>
            </div>
        </div>
        </div>

        <div id="corporate" class="uc-pane">
        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=800&q=80&auto=format&fit=crop" alt="Corporate training">
        <div class="uc-text">
            <h3>Onboarding, Upskilling, and Partner Training Without the Complexity</h3>
            <p>Organisations with regular training cycles need a platform that reduces the operational burden on HR and L&D teams rather than adding to it. MyPass delivers onboarding, skills training, sales enablement, and partner education through a single system that scales without requiring additional admin resource.</p>
            <p>From a 50-person team to a multi-region enterprise, MyPass handles the full training lifecycle with the same interface and the same level of automation regardless of scale.</p>
            <div class="uc-points">
            <div class="uc-pt">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
                Automated enrolment workflows based on role, department, or location
            </div>
            <div class="uc-pt">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
                Separate learning environments for internal teams and external partners
            </div>
            <div class="uc-pt">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
                Real-time manager dashboards showing team completion and readiness
            </div>
            <div class="uc-pt">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 8l4 4 8-8"/></svg>
                SSO, API access, and HRIS integration for enterprise environments
            </div>
            </div>
        </div>
        </div>

    </div>
    </section>

    <!-- COMPARISON TABLE -->
    <section class="sec sec-bg">
    <div class="si">
        <div class="center">
        <div class="eyebrow"><span class="ew"></span>How We Compare</div>
        <h2 class="sh">What You Get With MyPass<br><em>That Others Make You Pay Extra For</em></h2>
        <p class="sp">Most LMS platforms charge separately for authoring tools, certificates, advanced reporting, and support. MyPass includes everything in a single plan from day one.</p>
        </div>
        <table class="cmp-table">
        <thead>
            <tr>
            <th class="cth-f">Capability</th>
            <th class="cth-x">Typical LMS Platform</th>
            <th class="cth-g">MyPass LMS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td class="td-f">Course authoring tool</td>
            <td><span class="td-x"><svg viewBox="0 0 14 14" fill="none" stroke="#EF4444" stroke-width="2" stroke-linecap="round"><line x1="2" y1="2" x2="12" y2="12"/><line x1="12" y1="2" x2="2" y2="12"/></svg>External subscription required</span></td>
            <td><span class="td-ok"><svg viewBox="0 0 14 14" fill="none" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 7l4 4 6-6"/></svg>Built-in, included on all plans</span></td>
            </tr>
            <tr>
            <td class="td-f">Ready to use course content</td>
            <td><span class="td-x"><svg viewBox="0 0 14 14" fill="none" stroke="#EF4444" stroke-width="2" stroke-linecap="round"><line x1="2" y1="2" x2="12" y2="12"/><line x1="12" y1="2" x2="2" y2="12"/></svg>Paid content library add-on</span></td>
            <td><span class="td-ok"><svg viewBox="0 0 14 14" fill="none" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 7l4 4 6-6"/></svg>Course packages included</span></td>
            </tr>
            <tr>
            <td class="td-f">Certificate creation and issuance</td>
            <td><span class="td-x"><svg viewBox="0 0 14 14" fill="none" stroke="#EF4444" stroke-width="2" stroke-linecap="round"><line x1="2" y1="2" x2="12" y2="12"/><line x1="12" y1="2" x2="2" y2="12"/></svg>Enterprise plan only</span></td>
            <td><span class="td-ok"><svg viewBox="0 0 14 14" fill="none" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 7l4 4 6-6"/></svg>All plans, custom branded</span></td>
            </tr>
            <tr>
            <td class="td-f">ILT and attendance management</td>
            <td><span class="td-x"><svg viewBox="0 0 14 14" fill="none" stroke="#EF4444" stroke-width="2" stroke-linecap="round"><line x1="2" y1="2" x2="12" y2="12"/><line x1="12" y1="2" x2="2" y2="12"/></svg>Separate add-on module</span></td>
            <td><span class="td-ok"><svg viewBox="0 0 14 14" fill="none" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 7l4 4 6-6"/></svg>Built-in, no extra cost</span></td>
            </tr>
            <tr>
            <td class="td-f">Survey and feedback tools</td>
            <td><span class="td-x"><svg viewBox="0 0 14 14" fill="none" stroke="#EF4444" stroke-width="2" stroke-linecap="round"><line x1="2" y1="2" x2="12" y2="12"/><line x1="12" y1="2" x2="2" y2="12"/></svg>Third-party integration needed</span></td>
            <td><span class="td-ok"><svg viewBox="0 0 14 14" fill="none" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 7l4 4 6-6"/></svg>Built into course workflows</span></td>
            </tr>
            <tr>
            <td class="td-f">Digital rights management</td>
            <td><span class="td-x"><svg viewBox="0 0 14 14" fill="none" stroke="#EF4444" stroke-width="2" stroke-linecap="round"><line x1="2" y1="2" x2="12" y2="12"/><line x1="12" y1="2" x2="2" y2="12"/></svg>Not available or premium only</span></td>
            <td><span class="td-ok"><svg viewBox="0 0 14 14" fill="none" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 7l4 4 6-6"/></svg>Included for all content types</span></td>
            </tr>
            <tr>
            <td class="td-f">Essay grading with AI assistance</td>
            <td><span class="td-x"><svg viewBox="0 0 14 14" fill="none" stroke="#EF4444" stroke-width="2" stroke-linecap="round"><line x1="2" y1="2" x2="12" y2="12"/><line x1="12" y1="2" x2="2" y2="12"/></svg>Manual only or not available</span></td>
            <td><span class="td-ok"><svg viewBox="0 0 14 14" fill="none" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 7l4 4 6-6"/></svg>Manual and AI-assisted both included</span></td>
            </tr>
            <tr>
            <td class="td-f">Help center and ticketing</td>
            <td><span class="td-x"><svg viewBox="0 0 14 14" fill="none" stroke="#EF4444" stroke-width="2" stroke-linecap="round"><line x1="2" y1="2" x2="12" y2="12"/><line x1="12" y1="2" x2="2" y2="12"/></svg>External helpdesk tool required</span></td>
            <td><span class="td-ok"><svg viewBox="0 0 14 14" fill="none" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 7l4 4 6-6"/></svg>Built in, no third-party needed</span></td>
            </tr>
            <tr>
            <td class="td-f">AMS connection</td>
            <td><span class="td-x"><svg viewBox="0 0 14 14" fill="none" stroke="#EF4444" stroke-width="2" stroke-linecap="round"><line x1="2" y1="2" x2="12" y2="12"/><line x1="12" y1="2" x2="2" y2="12"/></svg>Custom development or not supported</span></td>
            <td><span class="td-ok"><svg viewBox="0 0 14 14" fill="none" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 7l4 4 6-6"/></svg>API and SSO integration included</span></td>
            </tr>
        </tbody>
        </table>
    </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="sec sec-w">
    <div class="si">
        <div class="center">
        <div class="eyebrow"><span class="ew"></span>Customer Stories</div>
        <h2 class="sh">Four Years of Trust.<br><em>Not Just Transactions.</em></h2>
        </div>
        <div class="tgrid">
        <div class="tc feat">
            <div class="tc-stars">★★★★★</div>
            <div class="tc-q">"</div>
            <div class="tc-body">We have been a Kprise client for over four years and Kprise has constantly been there to support our needs. The platform looks and feels entirely like ours. The team treats every problem like it is their own. I recommend MyPass to any organisation that wants serious training infrastructure without the complexity that usually comes with it.</div>
            <div class="tc-author">
            <div class="tc-av" style="background:linear-gradient(135deg,#4220C8,#7B5EEA);">SD</div>
            <div>
                <div class="tc-name">Shawn D.</div>
                <div class="tc-role">Founder and Director · American Board for Teacher Excellence</div>
            </div>
            </div>
        </div>
        <div class="tc">
            <div class="tc-stars">★★★★★</div>
            <div class="tc-q">"</div>
            <div class="tc-body">Their customer support is beyond helpful. The team were available at all hours and very professional. MyPass is extremely customisable and the support in making the LMS feel genuinely like our own brand was something we did not expect at this price point. Easy to navigate for both admins and learners from the very first day.</div>
            <div class="tc-author">
            <div class="tc-av" style="background:linear-gradient(135deg,#2A7A5C,#1D5C45);">AS</div>
            <div>
                <div class="tc-name">Ashleigh S.</div>
                <div class="tc-role">Senior Career and Learning Partner · UAE</div>
            </div>
            </div>
        </div>
        <div class="tc">
            <div class="tc-stars">★★★★★</div>
            <div class="tc-q">"</div>
            <div class="tc-body">I am wondering why I never contacted these guys sooner. Seriously, they all have commendable talent in their respective fields. The attention to detail in the platform and the genuine responsiveness of the team are rare qualities in this space. We moved from a much larger vendor and have not looked back once.</div>
            <div class="tc-author">
            <div class="tc-av" style="background:linear-gradient(135deg,#A06830,#7A4E20);">RN</div>
            <div>
                <div class="tc-name">Raghu Nath</div>
                <div class="tc-role">President · E-Learning</div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>

    <!-- FAQ -->
    <section class="sec sec-tint">
    <div class="si">
        <div class="center">
        <div class="eyebrow"><span class="ew"></span>Questions Answered</div>
        <h2 class="sh">What People Ask Before<br><em>They Begin Their Trial</em></h2>
        </div>
        <div class="faq-grid">
        <div class="fi open">
            <div class="fi-q" onclick="this.closest('.fi').classList.toggle('open')">Can MyPass connect to our Association Management System?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
            <div class="fi-a">Yes. MyPass LMS connects to existing AMS platforms through standard API and SSO integrations. Member records, enrolments, completions, certifications, and CE credit data can flow automatically between the two systems without any manual data entry. If your AMS is not on the standard integration list our team can connect through the REST API. If you do not have an AMS, MyPass includes built-in member management functionality that handles groups, chapters, membership tiers, and access permissions directly inside the platform.</div>
        </div>
        <div class="fi">
            <div class="fi-q" onclick="this.closest('.fi').classList.toggle('open')">Do we have to create all our own course content from scratch?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
            <div class="fi-a">Not at all. MyPass provides two options. You can browse and deploy professionally built course packages from the library covering compliance, onboarding, leadership, safety, and professional development and start training on the same day you sign up. Alternatively, you can create your own courses using the built-in authoring tools which convert PDFs, PowerPoints, and videos into structured SCORM courses without requiring any external software. Most organisations do both depending on the training topic.</div>
        </div>
        <div class="fi">
            <div class="fi-q" onclick="this.closest('.fi').classList.toggle('open')">How does essay grading work with AI assistance?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
            <div class="fi-a">Instructors can grade essay and long-form responses manually through the standard grading interface with rubric support and written feedback tools. When AI-assisted grading is enabled, the system analyses submissions against defined criteria and surfaces a suggested score and key observations for the instructor to review and confirm. The instructor always makes the final grading decision. AI assistance significantly reduces the time spent on initial review, particularly for high-volume assessment programmes.</div>
        </div>
        <div class="fi">
            <div class="fi-q" onclick="this.closest('.fi').classList.toggle('open')">How does Digital Rights Management work for our course content?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
            <div class="fi-a">DRM in MyPass allows you to set access controls on individual courses or course packages. You can restrict downloads so content can only be viewed within the platform, set time-limited access windows after which a course expires for a learner, and define which membership tiers or user groups can access specific content. This is particularly valuable for associations that sell continuing education content as a non-dues revenue stream and want to ensure purchased access is not shared informally.</div>
        </div>
        <div class="fi">
            <div class="fi-q" onclick="this.closest('.fi').classList.toggle('open')">How do the help center and support tickets work for our learners?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
            <div class="fi-a">The help center is a self-service knowledge base that you populate with FAQs, how-to guides, platform walkthroughs, and course-specific guidance. Learners can search and browse without needing to contact support for common questions. When a learner needs additional help, they can raise a support ticket directly from within the platform. Administrators see all tickets in a central queue, can assign them to team members, track status, and respond from the same interface without switching to an external helpdesk tool.</div>
        </div>
        <div class="fi">
            <div class="fi-q" onclick="this.closest('.fi').classList.toggle('open')">Is the free trial genuinely free with no card required? Is there a special offer for nonprofits?<div class="fi-t"><svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="7" y1="2" x2="7" y2="12"/><line x1="2" y1="7" x2="12" y2="7"/></svg></div></div>
            <div class="fi-a">Yes, completely. All organisations receive full platform access for 15 days with no credit card required and no obligation to move to a paid plan. You can create and publish courses, enrol learners, run ILT sessions, issue certificates, generate reports, and use every feature without any restrictions. Qualifying nonprofit organisations receive an extended 2-month free trial plus a 20% additional discount on any paid plan — contact our team to verify eligibility when signing up.</div>
        </div>
        </div>
    </div>
    </section>

    <!-- CTA -->
    <section class="cta-sec">
    <div class="cta-split">

        <!-- Left panel — general -->
        <div class="cta-panel cta-panel-main">
        <div class="cta-badge">15 Days Free. No Card. No Commitment.</div>
        <h2 class="cta-h">A Platform Built for<br><em>Learning That Matters.</em></h2>
        <p class="cta-p">Organisations that take member and employee education seriously deserve a platform that works as hard as they do. Start your free trial and see what MyPass LMS looks like running your training programme.</p>
        <div class="cta-btns">
            <a href="https://mypasslms.us/login#register" class="btn-primary">Start Free for 15 Days</a>
            <a href="https://calendly.com/onlinesales-kprise/30min" class="btn-secondary">Book a Demo</a>
        </div>
        <p class="cta-note">Full platform access · Course authoring · ILT management · Certifications · Dynamic reporting</p>
        </div>

        <!-- Divider -->
        <div class="cta-divider">
        <span>or</span>
        </div>

        <!-- Right panel — nonprofit exclusive -->
        <div class="cta-panel cta-panel-np">
        <div class="cta-np-tag">
            <svg viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 2l1.6 4.9H15l-4.1 3 1.6 4.9L9 12l-3.5 2.8 1.6-4.9L3 7l4.4-.1z"/></svg>
            Exclusive Nonprofit Offer
        </div>
        <h3 class="cta-np-h">Running a Nonprofit or Association?<br>You Qualify for More.</h3>
        <p class="cta-np-p">Nonprofits, charities, and membership associations get a significantly better deal because we know budgets are tight and the mission matters. Every qualifying organisation gets extended access and a permanent pricing advantage.</p>
        <div class="cta-np-perks">
            <div class="cta-perk">
            <div class="cta-perk-ico">
                <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="10" r="8"/><path d="M10 6v4l2.5 2"/></svg>
            </div>
            <div>
                <div class="cta-perk-title">2 Months Free Trial</div>
                <div class="cta-perk-desc">60 full days of unrestricted platform access — 4× longer than the standard trial — so you can see the real impact on your organisation before committing.</div>
            </div>
            </div>
            <div class="cta-perk">
            <div class="cta-perk-ico">
                <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M10 2l1.5 4.5H16l-3.8 2.8 1.5 4.5L10 11l-3.7 2.8 1.5-4.5L4 6.5h4.5z"/></svg>
            </div>
            <div>
                <div class="cta-perk-title">20% Additional Discount</div>
                <div class="cta-perk-desc">A permanent 20% reduction on your plan price, every billing cycle. Applied automatically once your nonprofit status is verified — no re-application needed.</div>
            </div>
            </div>
        </div>
        <a href="https://calendly.com/onlinesales-kprise/30min" class="cta-np-btn">
            <svg viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 2l1.6 4.9H15l-4.1 3 1.6 4.9L9 12l-3.5 2.8 1.6-4.9L3 7l4.4-.1z"/></svg>
            Claim Your Nonprofit Offer
        </a>
        <p class="cta-np-note">Verification required. Applies to registered nonprofits, charities, associations, and mission-driven organisations.</p>
        </div>

    </div>
    </section>



    <script>
        function switchTab(btn, id) {
            document.querySelectorAll('.uc-tab').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.uc-pane').forEach(p => p.classList.remove('active'));
            btn.classList.add('active');
            document.getElementById(id).classList.add('active');
        }
    </script>
@endsection

@push('schema')
@verbatim

@endverbatim
@endpush

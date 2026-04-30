@extends('layouts.app')

@push('styles')
   <style>
        *{box-sizing:border-box;margin:0;padding:0}
        :root{
        --brand:#4220C8;--brand-h:#3318A8;--brand-pale:#F0ECFF;--brand-pale2:#F8F6FF;
        --ink:#0C0A1A;--ink2:#2E2B45;--ink3:#6B6882;--ink4:#A09DBE;
        --surf:#FFFFFF;--surf2:#F7F6FB;--surf3:#EFECF9;
        --border:#E4E0F5;--border2:#CFC9EE;
        --green:#059669;--green-bg:#ECFDF5;
        --amber:#D97706;--amber-bg:#FFFBEB;
        --red:#DC2626;--red-bg:#FEF2F2;
        --r:12px;--rL:18px;--rXL:24px;
        }
        html{font-size:16px;scroll-behavior:smooth}
        body{font-family:'Plus Jakarta Sans',system-ui,-apple-system,sans-serif;background:#fff;color:var(--ink);-webkit-font-smoothing:antialiased;line-height:1.6}

        /* NAV */
        .nav{display:flex;align-items:center;justify-content:space-between;padding:0 56px;height:68px;border-bottom:1px solid var(--border);position:sticky;top:0;background:rgba(255,255,255,0.96);backdrop-filter:blur(20px);z-index:300}
        .logo{display:flex;align-items:center;gap:9px;text-decoration:none}
        .lm{width:32px;height:32px;background:var(--brand);border-radius:9px;display:flex;align-items:center;justify-content:center}
        .lm svg{width:18px;height:18px}
        .lt{font-size:18px;font-weight:800;color:var(--ink);letter-spacing:-0.6px}
        .nav-links{display:flex;gap:32px}
        .nl{font-size:14px;font-weight:500;color:var(--ink3);cursor:pointer;transition:color .18s;text-decoration:none;white-space:nowrap}
        .nl:hover,.nl.active{color:var(--ink)}
        .nav-r{display:flex;gap:10px}
        .b-ghost{font-family:inherit;font-size:14px;font-weight:600;color:var(--ink2);background:none;border:1.5px solid var(--border2);padding:8px 18px;border-radius:var(--r);cursor:pointer;transition:all .18s}
        .b-ghost:hover{border-color:var(--brand);color:var(--brand)}
        .b-nav{font-family:inherit;font-size:14px;font-weight:700;color:#fff;background:var(--brand);border:none;padding:9px 20px;border-radius:var(--r);cursor:pointer;transition:all .18s}
        .b-nav:hover{background:var(--brand-h);transform:translateY(-1px)}

        /* BREADCRUMB */
        .bc{padding:14px 56px;border-bottom:1px solid var(--border);background:var(--surf2);font-size:13px;color:var(--ink4)}
        .bc a{color:var(--ink3);text-decoration:none;font-weight:500}.bc a:hover{color:var(--brand)}
        .bc span{margin:0 8px}

        /* HERO */
        .hero{position:relative;overflow:hidden;background:#fff;padding:0 56px}
        .hero::before{content:'';position:absolute;top:-100px;right:-100px;width:720px;height:720px;background:radial-gradient(ellipse at center,rgba(66,32,200,0.07) 0%,transparent 65%);pointer-events:none}
        .h-dots{position:absolute;inset:0;background-image:radial-gradient(circle,rgba(66,32,200,0.055) 1px,transparent 1px);background-size:28px 28px;pointer-events:none;mask-image:radial-gradient(ellipse 80% 80% at 85% 50%,black,transparent)}
        .hero-in{display:grid;grid-template-columns:1.1fr 0.9fr;gap:72px;align-items:center;padding:80px 0 72px;position:relative;z-index:1;max-width:1580px;margin:0 auto}
        .eyebrow{display:inline-flex;align-items:center;gap:8px;background:var(--brand-pale);border:1px solid var(--border2);color:var(--brand);font-size:11px;font-weight:700;letter-spacing:1.4px;text-transform:uppercase;padding:7px 16px;border-radius:50px;margin-bottom:26px}
        .eydot{width:6px;height:6px;border-radius:50%;background:var(--brand);animation:blink 2s infinite}
        @keyframes blink{0%,100%{opacity:1}50%{opacity:.35}}
        .hero h1{font-size:54px;font-weight:800;color:var(--ink);letter-spacing:-2.5px;line-height:1.05;margin-bottom:20px}
        .hero h1 em{font-style:normal;color:var(--brand)}
        .hero-sub{font-size:17px;color:var(--ink3);line-height:1.72;margin-bottom:36px;max-width:480px}
        .hero-ctas{display:flex;gap:12px;margin-bottom:28px;flex-wrap:wrap}
        .b-primary{font-family:inherit;font-size:15px;font-weight:700;color:#fff;background:var(--brand);border:none;padding:14px 30px;border-radius:var(--rL);cursor:pointer;transition:all .22s;letter-spacing:-0.2px;display:inline-flex;align-items:center;gap:8px}
        .b-primary svg{width:15px;height:15px;transition:transform .2s}
        .b-primary:hover{background:var(--brand-h);transform:translateY(-2px);box-shadow:0 14px 36px rgba(66,32,200,0.28)}
        .b-primary:hover svg{transform:translateX(3px)}
        .b-out{font-family:inherit;font-size:15px;font-weight:600;color:var(--ink2);background:transparent;border:1.5px solid var(--border2);padding:13px 24px;border-radius:var(--rL);cursor:pointer;transition:all .22s}
        .b-out:hover{border-color:var(--brand);color:var(--brand)}
        .h-pills{display:flex;align-items:center;gap:16px;flex-wrap:wrap}
        .hpill{display:flex;align-items:center;gap:6px;font-size:13px;color:var(--ink3);font-weight:500}
        .hpill-dot{width:5px;height:5px;border-radius:50%;background:var(--brand);flex-shrink:0}

        /* Hero visual */
        .h-vis{background:var(--surf2);border:1.5px solid var(--border);border-radius:var(--rXL);padding:24px}
        .hv-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px}
        .hv-title{font-size:13px;font-weight:700;color:var(--ink);letter-spacing:-0.2px}
        .hv-badge{background:var(--green-bg);color:var(--green);font-size:11px;font-weight:700;padding:4px 10px;border-radius:20px}
        .hv-rows{display:flex;flex-direction:column;gap:9px;margin-bottom:16px}
        .hv-row{background:#fff;border:1px solid var(--border);border-radius:10px;padding:12px 14px;display:flex;align-items:center;gap:12px}
        .hvr-thumb{width:38px;height:38px;border-radius:8px;flex-shrink:0}
        .hvr-name{font-size:13px;font-weight:700;color:var(--ink);letter-spacing:-0.2px}
        .hvr-meta{font-size:11px;color:var(--ink4);margin-top:1px}
        .vtag{font-size:11px;font-weight:700;padding:3px 9px;border-radius:10px;white-space:nowrap;margin-left:auto;flex-shrink:0}
        .vt-blue{background:var(--brand-pale);color:var(--brand)}
        .vt-amber{background:var(--amber-bg);color:var(--amber)}
        .vt-green{background:var(--green-bg);color:var(--green)}
        .hv-stats{display:grid;grid-template-columns:1fr 1fr 1fr;gap:8px}
        .hvs{background:#fff;border:1px solid var(--border);border-radius:10px;padding:12px;text-align:center}
        .hvs-n{font-size:20px;font-weight:800;color:var(--brand);letter-spacing:-0.8px}
        .hvs-l{font-size:11px;color:var(--ink4);font-weight:500}

        /* FILTER BAR — single, no sidebar */
        .fbar{padding:20px 56px;border-bottom:1px solid var(--border);background:#fff;position:sticky;top:68px;z-index:200;box-shadow:0 2px 10px rgba(12,10,26,0.04)}
        .fbar-in{max-width:1580px;margin:0 auto;display:flex;align-items:center;gap:12px;flex-wrap:wrap}
        .search-wrap{position:relative;flex:0 0 240px}
        .search-wrap svg{position:absolute;left:12px;top:50%;transform:translateY(-50%);width:15px;height:15px;stroke:var(--ink4);fill:none;stroke-width:1.8;stroke-linecap:round}
        .s-input{font-family:inherit;width:100%;padding:10px 14px 10px 36px;border:1.5px solid var(--border);border-radius:var(--r);font-size:14px;color:var(--ink);background:#fff;outline:none;transition:border .18s}
        .s-input:focus{border-color:var(--brand)}
        .s-input::placeholder{color:var(--ink4)}
        .fdiv{width:1px;height:26px;background:var(--border);flex-shrink:0}
        .ftabs{display:flex;gap:7px;flex-wrap:wrap;flex:1}
        .ftab{font-family:inherit;font-size:13px;font-weight:600;padding:8px 16px;border-radius:50px;border:1.5px solid var(--border);background:#fff;color:var(--ink3);cursor:pointer;transition:all .2s;white-space:nowrap}
        .ftab:hover{border-color:var(--border2);color:var(--ink)}
        .ftab.on{background:var(--brand);color:#fff;border-color:var(--brand)}
        .sort-sel{font-family:inherit;font-size:13px;font-weight:600;color:var(--ink2);border:1.5px solid var(--border);border-radius:var(--r);padding:9px 14px;background:#fff;cursor:pointer;outline:none;transition:border .18s;flex-shrink:0}
        .sort-sel:focus{border-color:var(--brand)}
        .res-lbl{font-size:13px;color:var(--ink4);font-weight:500;white-space:nowrap}
        .res-lbl strong{color:var(--ink2)}

        /* PACKS AREA */
        .packs-wrap{padding:40px 56px 72px;max-width:1580px;margin:0 auto}

        /* PACK */
        .pack{border:1.5px solid var(--border);border-radius:var(--rXL);overflow:hidden;margin-bottom:22px;transition:all .22s}
        .pack:hover{border-color:var(--border2)}
        .pack.open{border-color:var(--border2);box-shadow:0 8px 32px rgba(66,32,200,0.07)}
        .pack-head{display:flex;align-items:center;gap:18px;padding:26px 28px;cursor:pointer;background:#fff;transition:background .18s;user-select:none}
        .pack-head:hover{background:var(--surf2)}
        .pack.open .pack-head{background:var(--surf2);border-bottom:1px solid var(--border)}
        .p-thumb{width:62px;height:62px;border-radius:14px;flex-shrink:0;overflow:hidden;position:relative}
        .p-thumb-in{position:absolute;inset:0;display:flex;align-items:center;justify-content:center}
        .p-thumb-in svg{width:28px;height:28px;stroke:#fff;fill:none;stroke-width:1.5;stroke-linecap:round;stroke-linejoin:round}
        .p-info{flex:1;min-width:0}
        .p-eye{font-size:11px;font-weight:700;letter-spacing:1.3px;text-transform:uppercase;color:var(--brand);margin-bottom:5px}
        .p-name{font-size:18px;font-weight:800;color:var(--ink);letter-spacing:-0.6px;line-height:1.25;margin-bottom:5px}
        .p-desc{font-size:13px;color:var(--ink3);line-height:1.55;max-width:520px}
        .p-tags{display:flex;align-items:center;gap:10px;margin-top:10px;flex-wrap:wrap}
        .ptag{display:flex;align-items:center;gap:5px;font-size:12px;color:var(--ink4);font-weight:500}
        .ptag svg{width:12px;height:12px;stroke:var(--ink4);fill:none;stroke-width:1.8;stroke-linecap:round;flex-shrink:0}
        .p-right{display:flex;flex-direction:column;align-items:flex-end;gap:8px;flex-shrink:0}
        .pbadge{font-size:11px;font-weight:700;padding:4px 12px;border-radius:20px;white-space:nowrap}
        .pb-red{background:var(--red-bg);color:var(--red)}
        .pb-green{background:var(--green-bg);color:var(--green)}
        .pb-amber{background:var(--amber-bg);color:var(--amber)}
        .pb-blue{background:var(--brand-pale);color:var(--brand)}
        .p-chev{width:34px;height:34px;border-radius:9px;background:var(--surf3);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;transition:all .22s;flex-shrink:0}
        .p-chev svg{width:14px;height:14px;stroke:var(--ink3);fill:none;stroke-width:2;stroke-linecap:round;transition:transform .22s}
        .pack.open .p-chev{background:var(--brand);border-color:var(--brand)}
        .pack.open .p-chev svg{stroke:#fff;transform:rotate(180deg)}

        /* Pack body */
        .p-body{display:none;padding:28px 28px 32px}
        .pack.open .p-body{display:block}
        .p-intro{font-size:14px;color:var(--ink3);line-height:1.75;margin-bottom:26px;padding-bottom:22px;border-bottom:1px solid var(--border)}
        .c-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}

        /* Course card */
        .cc{background:#fff;border:1.5px solid var(--border);border-radius:var(--rL);overflow:hidden;transition:all .22s;cursor:pointer}
        .cc:hover{border-color:var(--border2);box-shadow:0 12px 32px rgba(66,32,200,0.08);transform:translateY(-3px)}
        .cc-img{height:12em;position:relative;overflow:hidden}
        .cc-bg{position:absolute;inset:0;transition:transform .3s}
        .cc:hover .cc-bg{transform:scale(1.05)}
        .cc-ov{position:absolute;inset:0;background:linear-gradient(to top,rgba(12,10,26,0.68) 0%,transparent 55%)}
        .cc-tag{position:absolute;bottom:10px;left:12px;z-index:1;font-size:10px;font-weight:700;letter-spacing:.7px;text-transform:uppercase;color:#fff;background:rgba(255,255,255,0.18);backdrop-filter:blur(8px);padding:4px 10px;border-radius:20px;border:1px solid rgba(255,255,255,0.25)}
        .cc-body{padding:16px 16px 18px}
        .cc-title{font-size:14px;font-weight:700;color:var(--ink);letter-spacing:-0.3px;margin-bottom:6px;line-height:1.4}
        .cc-desc{font-size:12px;color:var(--ink3);line-height:1.65;margin-bottom:14px}
        .cc-foot{display:flex;align-items:center;justify-content:space-between;padding-top:12px;border-top:1px solid var(--border)}
        .cc-mod{display:flex;align-items:center;gap:5px;font-size:12px;color:var(--ink4);font-weight:600}
        .cc-mod svg{width:12px;height:12px;stroke:var(--ink4);fill:none;stroke-width:1.8;stroke-linecap:round}
        .cc-enrol{font-family:inherit;font-size:12px;font-weight:700;color:var(--brand);background:var(--brand-pale);border:none;padding:5px 12px;border-radius:20px;cursor:pointer;transition:all .18s}
        .cc-enrol:hover{background:var(--brand);color:#fff}

        /* Empty */
        #empty{display:none;text-align:center;padding:72px 32px;border:1.5px dashed var(--border2);border-radius:var(--rXL);margin:0}
        #empty svg{width:44px;height:44px;stroke:var(--ink4);fill:none;stroke-width:1.3;stroke-linecap:round;margin-bottom:16px}
        #empty h3{font-size:18px;font-weight:700;color:var(--ink2);margin-bottom:8px}
        #empty p{font-size:14px;color:var(--ink4)}

        /* PRICING */
        .pr-section{background:var(--surf2);border-top:1px solid var(--border);border-bottom:1px solid var(--border);padding:80px 56px}
        .pr-in{max-width:1580px;margin:0 auto}
        .sec-eye{font-size:14px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:var(--brand);margin-bottom:14px}
        .sec-h{font-size:40px;font-weight:800;color:var(--ink);letter-spacing:-1.8px;line-height:1.1;margin-bottom:14px}
        .sec-sub{font-size:16px;color:var(--ink3);line-height:1.7;max-width:540px;margin-bottom:48px}
        .bundle-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:40px}
        .bcard{background:#fff;border:1.5px solid var(--border);border-radius:var(--rXL);padding:26px 22px;transition:all .22s;position:relative}
        .bcard:hover{border-color:var(--border2);transform:translateY(-2px);box-shadow:0 14px 36px rgba(66,32,200,0.07)}
        .bcard.feat{border:2px solid var(--brand);background:var(--brand)}
        .bcard-lbl{font-size:11px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;color:var(--brand);margin-bottom:10px}
        .bcard.feat .bcard-lbl{color:rgba(255,255,255,.65)}
        .bcard-price{font-size:36px;font-weight:800;color:var(--ink);letter-spacing:-1.5px;line-height:1;margin-bottom:4px}
        .bcard-price sup{font-size:18px;font-weight:700;vertical-align:super;letter-spacing:0}
        .bcard.feat .bcard-price{color:#fff}
        .bcard-per{font-size:13px;color:var(--ink4);margin-bottom:12px;font-weight:500}
        .bcard.feat .bcard-per{color:rgba(255,255,255,.5)}
        .bcard-desc{font-size:13px;color:var(--ink2);line-height:1.6;font-weight:500}
        .bcard.feat .bcard-desc{color:rgba(255,255,255,.75)}
        .bcard-inc{font-size:12px;font-weight:700;color:var(--brand);margin-top:12px}
        .bcard.feat .bcard-inc{color:rgba(255,255,255,.85)}
        .bcard-pop{position:absolute;top:-12px;left:50%;transform:translateX(-50%);background:linear-gradient(90deg,#FF5F20,#FF8040);color:#fff;font-size:11px;font-weight:700;padding:4px 14px;border-radius:20px;white-space:nowrap}
        .vol-label{font-size:15px;font-weight:700;color:var(--ink);letter-spacing:-0.3px;margin-bottom:18px}
        .vol-wrap{background:#fff;border:1.5px solid var(--border);border-radius:var(--rXL);overflow:hidden;margin-bottom:28px}
        .vol-table{width:100%;border-collapse:collapse}
        .vol-table thead th{padding:15px 22px;font-size:12px;font-weight:700;letter-spacing:.8px;text-transform:uppercase;color:var(--ink3);background:var(--surf2);border-bottom:1.5px solid var(--border);text-align:left}
        .vol-table thead th:not(:first-child){text-align:center}
        .vol-table tbody td{padding:15px 22px;font-size:14px;font-weight:500;color:var(--ink2);border-bottom:1px solid var(--border);background:#fff;vertical-align:middle}
        .vol-table tbody td:not(:first-child){text-align:center}
        .vol-table tbody tr:last-child td{border-bottom:none}
        .vol-table tbody td:first-child{font-weight:700;color:var(--ink)}
        .vol-table tbody tr.frow td{background:var(--brand-pale2)}
        .vol-table tbody tr.frow td:first-child{color:var(--brand)}
        .d-pill{display:inline-block;background:var(--green-bg);color:var(--green);font-size:11px;font-weight:700;padding:3px 9px;border-radius:20px}
        .b-pill{display:inline-block;background:var(--brand);color:#fff;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px}
        .pr-note{background:#fff;border:1.5px solid var(--border);border-radius:var(--rL);padding:22px 26px;font-size:14px;color:var(--ink3);line-height:1.75;display:flex;align-items:flex-start;gap:14px}
        .pr-note svg{width:20px;height:20px;stroke:var(--brand);fill:none;stroke-width:1.7;stroke-linecap:round;flex-shrink:0;margin-top:1px}

        /* LEAD */
        .lead-sec{padding:72px 56px;background:#fff}
        .lead-in{max-width:580px;margin:0 auto;text-align:center}
        .lead-tag{display:inline-flex;align-items:center;gap:7px;background:var(--brand-pale);border:1px solid var(--border2);color:var(--brand);font-size:11px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;padding:7px 16px;border-radius:50px;margin-bottom:22px}
        .lead-h{font-size:32px;font-weight:800;color:var(--ink);letter-spacing:-1.2px;line-height:1.15;margin-bottom:12px}
        .lead-p{font-size:15px;color:var(--ink3);line-height:1.7;margin-bottom:32px}
        .lead-box{background:var(--surf2);border:1.5px solid var(--border);border-radius:var(--rXL);padding:32px}
        .f-row{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:14px}
        .fg{display:flex;flex-direction:column;gap:6px}
        .fg label{font-size:12px;font-weight:700;color:var(--ink2);letter-spacing:.3px}
        .fg input{font-family:inherit;font-size:14px;color:var(--ink);border:1.5px solid var(--border);border-radius:var(--r);padding:11px 14px;outline:none;transition:border .18s;background:#fff}
        .fg input:focus{border-color:var(--brand)}
        .fg input::placeholder{color:var(--ink4)}
        .f-submit{font-family:inherit;width:100%;font-size:15px;font-weight:700;color:#fff;background:var(--brand);border:none;padding:14px;border-radius:var(--rL);cursor:pointer;transition:all .22s;margin-top:4px}
        .f-submit:hover{background:var(--brand-h);transform:translateY(-1px);box-shadow:0 12px 32px rgba(66,32,200,0.25)}
        .f-note{font-size:12px;color:var(--ink4);margin-top:12px}
        .f-success{display:none;background:var(--green-bg);border:1px solid #A7F3D0;border-radius:var(--rL);padding:32px;text-align:center}
        .f-success svg{width:44px;height:44px;stroke:var(--green);fill:none;stroke-width:1.6;stroke-linecap:round;margin-bottom:14px}
        .f-success h3{font-size:18px;font-weight:700;color:#065F46;margin-bottom:6px}
        .f-success p{font-size:14px;color:#047857}

        /* FOOTER */
        .footer{background:var(--ink);padding:52px 56px 36px}
        .ft-top{display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:48px;margin-bottom:40px}
        .ft-brand p{font-size:13px;color:rgba(255,255,255,.42);line-height:1.7;margin:14px 0 0;max-width:240px}
        .ft-logo{display:flex;align-items:center;gap:8px}
        .ft-lm{width:28px;height:28px;background:var(--brand);border-radius:7px;display:flex;align-items:center;justify-content:center}
        .ft-lt{font-size:16px;font-weight:800;color:#fff}
        .ft-col h4{font-size:11px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;color:rgba(255,255,255,.3);margin-bottom:14px}
        .ft-col a{display:block;font-size:13px;color:rgba(255,255,255,.5);text-decoration:none;margin-bottom:9px;transition:color .18s}
        .ft-col a:hover{color:rgba(255,255,255,.9)}
        .ft-bot{border-top:1px solid rgba(255,255,255,.08);padding-top:24px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px}
        .ft-bot p,.ft-bot a{font-size:12px;color:rgba(255,255,255,.3);text-decoration:none}
        .ft-bot a{margin-left:20px}

        /* Gradients */
        .bg-compliance{background:linear-gradient(135deg,#0f0c29,#302b63)}
        .bg-workplace{background:linear-gradient(135deg,#0a2a1a,#059669)}
        .bg-manager{background:linear-gradient(135deg,#0d0d2b,#4220C8)}
        .bg-productivity{background:linear-gradient(135deg,#0d1a00,#3a6b00)}
        .bg-ai{background:linear-gradient(135deg,#050d1e,#1a3a6e,#4220C8)}
        .bg-posh{background:linear-gradient(135deg,#1e0a3e,#4220C8)}
        .bg-data{background:linear-gradient(135deg,#0d0624,#3b1280)}
        .bg-ethics{background:linear-gradient(135deg,#031630,#0e4d8a)}
        .bg-bribery{background:linear-gradient(135deg,#1a0d00,#6b3200)}
        .bg-safety{background:linear-gradient(135deg,#1a1700,#6b5b00)}
        .bg-dei{background:linear-gradient(135deg,#1a0030,#4220C8)}
        .bg-hipaa{background:linear-gradient(135deg,#001833,#0d4a9e)}
        .bg-blood{background:linear-gradient(135deg,#2a0000,#7a1010)}
        .bg-comm{background:linear-gradient(135deg,#001a0d,#046040)}
        .bg-email{background:linear-gradient(135deg,#001228,#024f80)}
        .bg-ei{background:linear-gradient(135deg,#14002a,#5a1e9e)}
        .bg-conflict{background:linear-gradient(135deg,#1a0800,#7a2600)}
        .bg-present{background:linear-gradient(135deg,#0a0a20,#4220C8)}
        .bg-trans{background:linear-gradient(135deg,#070d22,#4220C8)}
        .bg-deleg{background:linear-gradient(135deg,#001408,#044a28)}
        .bg-feedback{background:linear-gradient(135deg,#12001f,#4a1690)}
        .bg-perf{background:linear-gradient(135deg,#001414,#075260)}
        .bg-hybrid{background:linear-gradient(135deg,#06060f,#1730a0)}
        .bg-coach{background:linear-gradient(135deg,#150800,#6b3400)}
        .bg-difficult{background:linear-gradient(135deg,#150010,#880048)}
        .bg-time{background:linear-gradient(135deg,#081200,#2e5200)}
        .bg-writing{background:linear-gradient(135deg,#100c00,#5a3800)}
        .bg-excel{background:linear-gradient(135deg,#001408,#044a28)}
        .bg-ail{background:linear-gradient(135deg,#04081a,#1430aa,#4220C8)}
        .bg-air{background:linear-gradient(135deg,#060318,#4220C8,#6a3fe0)}
        .bg-prompt{background:linear-gradient(135deg,#001020,#0a3a70,#4220C8)}
        .bg-aisec{background:linear-gradient(135deg,#180000,#7a1010,#4220C8)}

        @keyframes fadeIn{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:translateY(0)}}
        .pack{animation:fadeIn .35s ease both}

        @media(max-width:900px){
        .nav{padding:0 20px}.nav-links{display:none}
        .hero{padding:0 20px}.hero-in{grid-template-columns:1fr;gap:32px;padding:52px 0 44px}
        .fbar,.packs-wrap,.pr-section,.lead-sec,.footer{padding-left:20px;padding-right:20px}
        .fbar-in{gap:8px}.search-wrap{flex:0 0 100%}.fdiv{display:none}
        .c-grid{grid-template-columns:1fr 1fr}
        .bundle-grid{grid-template-columns:1fr 1fr}
        .ft-top{grid-template-columns:1fr 1fr}
        }
        @media(max-width:600px){
        .hero h1{font-size:36px;letter-spacing:-1.5px}
        .c-grid{grid-template-columns:1fr}
        .f-row{grid-template-columns:1fr}
        .bundle-grid{grid-template-columns:1fr}
        }
    </style>
@endpush

@section('content')
 
<!-- HERO -->
<section class="hero">
  <div class="h-dots"></div>
  <div class="hero-in">
    <div class="hero-text">
      <div class="eyebrow"><div class="eydot"></div>MyPass Workplace Learning Library</div>
      <h1>Stop building courses.<br><em>Start deploying them.</em></h1>
      <p class="hero-sub">Every course in the MyPass library is fully built, SCORM-ready and live on your LMS in minutes. Real content, real outcomes. No authoring time required.</p>
      <div class="hero-ctas">
        <button class="b-primary" onclick="document.getElementById('library').scrollIntoView({behavior:'smooth'})">
          Browse the Library
          <svg viewBox="0 0 16 16" fill="none"><path d="M8 3v10M4 9l4 4 4-4" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>
        <button class="b-out" onclick="document.getElementById('pricing-sec').scrollIntoView({behavior:'smooth'})">View Pricing</button>
      </div>
      <div class="h-pills">
        <div class="hpill"><div class="hpill-dot"></div>29 courses ready to deploy</div>
        <div class="hpill"><div class="hpill-dot"></div>SCORM-ready</div>
        <div class="hpill"><div class="hpill-dot"></div>Certificate on every course</div>
        <div class="hpill"><div class="hpill-dot"></div>New packs added regularly</div>
      </div>
    </div>
    <div class="h-vis">
      <div class="hv-head"><div class="hv-title">Course Library</div><div class="hv-badge">29 Courses Live</div></div>
      <div class="hv-rows">
        <div class="hv-row"><div class="hvr-thumb bg-compliance" style="border-radius:8px"></div><div style="flex:1"><div class="hvr-name">Corporate Compliance Master Pack</div><div class="hvr-meta">8 courses · Compliance</div></div><div class="vtag vt-blue">Must Have</div></div>
        <div class="hv-row"><div class="hvr-thumb bg-ai" style="border-radius:8px"></div><div style="flex:1"><div class="hvr-name">AI Workforce Readiness</div><div class="hvr-meta">4 courses · Future of Work</div></div><div class="vtag vt-amber">Trending</div></div>
        <div class="hv-row"><div class="hvr-thumb bg-manager" style="border-radius:8px"></div><div style="flex:1"><div class="hvr-name">First-Time Manager Certification</div><div class="hvr-meta">7 modules · Leadership</div></div><div class="vtag vt-green">Popular</div></div>
      </div>
      <div class="hv-stats">
        <div class="hvs"><div class="hvs-n">29</div><div class="hvs-l">Courses</div></div>
        <div class="hvs"><div class="hvs-n">$110</div><div class="hvs-l">From / course</div></div>
        <div class="hvs"><div class="hvs-n">$2,600</div><div class="hvs-l">Full library / yr</div></div>
      </div>
    </div>
  </div>
</section>

<!-- SINGLE FILTER BAR -->
<div class="fbar" id="library">
  <div class="fbar-in">
    <div class="search-wrap">
      <svg viewBox="0 0 16 16"><circle cx="6.5" cy="6.5" r="4.5"/><path d="M10 10l3.5 3.5"/></svg>
      <input class="s-input" id="searchInput" type="text" placeholder="Search courses..." oninput="applyFilters()">
    </div>
    <div class="fdiv"></div>
    <div class="ftabs" id="ftabs">
      <button class="ftab on" data-cat="all" onclick="setCat('all',this)">All Packs</button>
      <button class="ftab" data-cat="compliance" onclick="setCat('compliance',this)">Compliance</button>
      <button class="ftab" data-cat="workplace" onclick="setCat('workplace',this)">Workplace Skills</button>
      <button class="ftab" data-cat="manager" onclick="setCat('manager',this)">Manager Certification</button>
      <button class="ftab" data-cat="productivity" onclick="setCat('productivity',this)">Productivity</button>
      <button class="ftab" data-cat="ai" onclick="setCat('ai',this)">AI Readiness</button>
    </div>
    <div class="fdiv"></div>
    <select class="sort-sel" onchange="sortPacks(this.value)">
      <option value="default">Sort: Featured</option>
      <option value="az">A to Z</option>
      <option value="most">Most Courses</option>
    </select>
    <div class="res-lbl" id="resLbl">Showing <strong>5 packs</strong></div>
  </div>
</div>

<!-- PACKS -->
<div class="packs-wrap" id="packsWrap">

  <!-- PACK 1 COMPLIANCE -->
  <div class="pack open" data-cat="compliance" data-name="Corporate Compliance Master Pack" data-n="8">
    <div class="pack-head" onclick="togglePack(this)">
      <div class="p-thumb bg-compliance"><div class="p-thumb-in"><svg viewBox="0 0 24 24"><path d="M12 2l2 6h6l-5 3.5 2 6-5-3.5-5 3.5 2-6L4 8h6z"/></svg></div></div>
      <div class="p-info">
        <div class="p-eye">Section 1 · Risk and Compliance</div>
        <div class="p-name">Corporate Compliance Master Pack</div>
        <div class="p-desc">Eight essential compliance courses that protect your organisation, your people and your reputation. The most in-demand pack on the platform.</div>
        <div class="p-tags">
          <div class="ptag"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>8 courses</div>
          <div class="ptag"><svg viewBox="0 0 16 16"><circle cx="8" cy="8" r="6"/><path d="M8 5v3l2 2"/></svg>Self-paced</div>
          <div class="ptag"><svg viewBox="0 0 16 16"><path d="M13 6l-5 5-3-3"/><circle cx="8" cy="8" r="6"/></svg>Certificate included</div>
          <div class="ptag"><svg viewBox="0 0 16 16"><path d="M2 12s2-3 6-3 6 3 6 3"/><circle cx="8" cy="6" r="3"/></svg>All departments</div>
        </div>
      </div>
      <div class="p-right"><span class="pbadge pb-red">Must Have</span></div>
      <div class="p-chev"><svg viewBox="0 0 14 14"><path d="M2 4l5 5 5-5"/></svg></div>
    </div>
    <div class="p-body">
      <div class="p-intro">One compliance failure can cost more than your entire training investment. These eight courses cover the legal and ethical foundations every employee must understand — from workplace harassment and data privacy through to healthcare-specific regulations. Deploy as a full pack or pick the courses relevant to your sector.</div>
      <div class="c-grid">
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-posh"></div><div class="cc-ov"></div><span class="cc-tag">Workplace Safety</span></div><div class="cc-body"><div class="cc-title">POSH — Prevention of Sexual Harassment</div><div class="cc-desc">Builds a respectful workplace culture. Covers definitions, reporting obligations and legal requirements under POSH.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-data"></div><div class="cc-ov"></div><span class="cc-tag">Data Security</span></div><div class="cc-body"><div class="cc-title">IT Security and Data Privacy Awareness</div><div class="cc-desc">Teaches employees to recognise cyber threats, handle data correctly and protect the organisation from breaches every day.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-ethics"></div><div class="cc-ov"></div><span class="cc-tag">Ethics</span></div><div class="cc-body"><div class="cc-title">Code of Conduct and Ethics</div><div class="cc-desc">Defines acceptable workplace behaviour, conflicts of interest and reporting standards every employee is held to.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-bribery"></div><div class="cc-ov"></div><span class="cc-tag">Governance</span></div><div class="cc-body"><div class="cc-title">Anti-Bribery and Anti-Corruption</div><div class="cc-desc">Covers global anti-corruption laws, red flag recognition, gift policies and third-party relationship integrity.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-safety"></div><div class="cc-ov"></div><span class="cc-tag">Health and Safety</span></div><div class="cc-body"><div class="cc-title">Workplace Safety — Basic OHS</div><div class="cc-desc">Foundational occupational health and safety training covering hazard identification, incident reporting and safe work practices.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-dei"></div><div class="cc-ov"></div><span class="cc-tag">Culture</span></div><div class="cc-body"><div class="cc-title">Diversity and Inclusion Basics</div><div class="cc-desc">Builds shared understanding of DEI principles, unconscious bias and how inclusive behaviour shapes team performance.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-hipaa"></div><div class="cc-ov"></div><span class="cc-tag">Healthcare</span></div><div class="cc-body"><div class="cc-title">HIPAA Compliance Training</div><div class="cc-desc">Essential for healthcare and healthcare-adjacent roles. Covers patient privacy rights, protected health information and penalty frameworks.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-blood"></div><div class="cc-ov"></div><span class="cc-tag">Infection Control</span></div><div class="cc-body"><div class="cc-title">Bloodborne Pathogens, Infection Control and Universal Precautions</div><div class="cc-desc">OSHA-aligned. Covers exposure risks, PPE protocols and procedures to protect workers in clinical and care environments.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
      </div>
    </div>
  </div>

  <!-- PACK 2 WORKPLACE -->
  <div class="pack" data-cat="workplace" data-name="Modern Workplace Skills" data-n="5">
    <div class="pack-head" onclick="togglePack(this)">
      <div class="p-thumb bg-workplace"><div class="p-thumb-in"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg></div></div>
      <div class="p-info">
        <div class="p-eye">Section 2 · Communication and Behaviour</div>
        <div class="p-name">Modern Workplace Skills</div>
        <div class="p-desc">Communication is where most performance breaks. These courses fix the everyday behaviours that quietly drain team output and morale — safe bets that work across every industry.</div>
        <div class="p-tags">
          <div class="ptag"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>5 courses</div>
          <div class="ptag"><svg viewBox="0 0 16 16"><circle cx="8" cy="8" r="6"/><path d="M8 5v3l2 2"/></svg>Self-paced</div>
          <div class="ptag"><svg viewBox="0 0 16 16"><path d="M13 6l-5 5-3-3"/><circle cx="8" cy="8" r="6"/></svg>Certificate included</div>
          <div class="ptag"><svg viewBox="0 0 16 16"><path d="M2 12s2-3 6-3 6 3 6 3"/><circle cx="8" cy="6" r="3"/></svg>All roles</div>
        </div>
      </div>
      <div class="p-right"><span class="pbadge pb-green">High Demand</span></div>
      <div class="p-chev"><svg viewBox="0 0 14 14"><path d="M2 4l5 5 5-5"/></svg></div>
    </div>
    <div class="p-body">
      <div class="p-intro">Small communication gaps create big business problems. These are the skills teams use every single day and the ones most organisations never formally train on. Practical, immediately applicable and relevant across every department.</div>
      <div class="c-grid">
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-comm"></div><div class="cc-ov"></div><span class="cc-tag">Communication</span></div><div class="cc-body"><div class="cc-title">Workplace Communication</div><div class="cc-desc">Covers clarity, active listening and tone awareness so messages land right the first time in any workplace context.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-email"></div><div class="cc-ov"></div><span class="cc-tag">Digital Etiquette</span></div><div class="cc-body"><div class="cc-title">Business Email and Virtual Etiquette</div><div class="cc-desc">How to write emails that get read and run video calls that respect everyone's time and professional credibility.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-ei"></div><div class="cc-ov"></div><span class="cc-tag">EQ</span></div><div class="cc-body"><div class="cc-title">Emotional Intelligence at Work</div><div class="cc-desc">Self-awareness, empathy and emotional regulation — the three foundations of high-performing workplace relationships.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-conflict"></div><div class="cc-ov"></div><span class="cc-tag">People Skills</span></div><div class="cc-body"><div class="cc-title">Conflict Resolution</div><div class="cc-desc">Practical frameworks for navigating disagreements and reaching workable outcomes without damaging working relationships.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-present"></div><div class="cc-ov"></div><span class="cc-tag">Presentations</span></div><div class="cc-body"><div class="cc-title">Presentation Skills</div><div class="cc-desc">From structuring a clear argument to holding a room — skills that make every employee more confident and persuasive on stage.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
      </div>
    </div>
  </div>

  <!-- PACK 3 MANAGER -->
  <div class="pack" data-cat="manager" data-name="First-Time Manager Certification" data-n="7">
    <div class="pack-head" onclick="togglePack(this)">
      <div class="p-thumb bg-manager"><div class="p-thumb-in"><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/><path d="M18 12l2 2 3-3"/></svg></div></div>
      <div class="p-info">
        <div class="p-eye">Section 3 · Leadership Development</div>
        <div class="p-name">First-Time Manager Certification</div>
        <div class="p-desc">Promotion does not equal leadership. This seven-module certification pathway gives new managers the tools, structure and confidence to lead effectively from day one.</div>
        <div class="p-tags">
          <div class="ptag"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>7 modules</div>
          <div class="ptag"><svg viewBox="0 0 16 16"><circle cx="8" cy="8" r="6"/><path d="M8 5v3l2 2"/></svg>Blended learning</div>
          <div class="ptag"><svg viewBox="0 0 16 16"><path d="M13 6l-5 5-3-3"/><circle cx="8" cy="8" r="6"/></svg>Certification pathway</div>
          <div class="ptag"><svg viewBox="0 0 16 16"><path d="M2 12s2-3 6-3 6 3 6 3"/><circle cx="8" cy="6" r="3"/></svg>New managers</div>
        </div>
      </div>
      <div class="p-right"><span class="pbadge pb-blue">Revenue Generator</span></div>
      <div class="p-chev"><svg viewBox="0 0 14 14"><path d="M2 4l5 5 5-5"/></svg></div>
    </div>
    <div class="p-body">
      <div class="p-intro">Your best individual contributor just became a manager. Without structured training, most new managers repeat the management style they experienced rather than the one that actually works. This seven-module certification closes that gap systematically.</div>
      <div class="c-grid">
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-trans"></div><div class="cc-ov"></div><span class="cc-tag">Module 1</span></div><div class="cc-body"><div class="cc-title">Transitioning to Manager</div><div class="cc-desc">The mindset shift from individual contributor to team leader. Sets expectations and clarifies new responsibilities from day one.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>Module 1 of 7</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-deleg"></div><div class="cc-ov"></div><span class="cc-tag">Module 2</span></div><div class="cc-body"><div class="cc-title">Delegation Skills</div><div class="cc-desc">How to assign work effectively, match tasks to strengths and avoid the micromanagement trap that kills team motivation.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>Module 2 of 7</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-feedback"></div><div class="cc-ov"></div><span class="cc-tag">Module 3</span></div><div class="cc-body"><div class="cc-title">Giving Feedback</div><div class="cc-desc">Delivering feedback that lands, sticks and improves performance without creating defensiveness in the person receiving it.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>Module 3 of 7</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-perf"></div><div class="cc-ov"></div><span class="cc-tag">Module 4</span></div><div class="cc-body"><div class="cc-title">Performance Conversations</div><div class="cc-desc">Structured conversations that motivate improvement, document outcomes clearly and reduce legal exposure for the organisation.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>Module 4 of 7</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-hybrid"></div><div class="cc-ov"></div><span class="cc-tag">Module 5</span></div><div class="cc-body"><div class="cc-title">Leading Hybrid and Remote Teams</div><div class="cc-desc">Strategies for maintaining visibility, accountability and team cohesion when people are not in the same room every day.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>Module 5 of 7</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-coach"></div><div class="cc-ov"></div><span class="cc-tag">Module 6</span></div><div class="cc-body"><div class="cc-title">Coaching Employees</div><div class="cc-desc">The difference between managing and coaching. Questioning techniques that help people solve their own problems confidently.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>Module 6 of 7</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-difficult"></div><div class="cc-ov"></div><span class="cc-tag">Module 7</span></div><div class="cc-body"><div class="cc-title">Handling Difficult Conversations</div><div class="cc-desc">A practical framework for the conversations most managers avoid — preparation, delivery, de-escalation and follow-through.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>Module 7 of 7</div><button class="cc-enrol">Enrol</button></div></div></div>
      </div>
    </div>
  </div>

  <!-- PACK 4 PRODUCTIVITY -->
  <div class="pack" data-cat="productivity" data-name="Productivity and Digital Basics" data-n="5">
    <div class="pack-head" onclick="togglePack(this)">
      <div class="p-thumb bg-productivity"><div class="p-thumb-in"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></div></div>
      <div class="p-info">
        <div class="p-eye">Section 4 · Output and Digital Skills</div>
        <div class="p-name">Productivity and Digital Basics</div>
        <div class="p-desc">Busy does not always mean productive. These courses fix the daily inefficiencies that quietly add up to hours of lost output every single week across every team.</div>
        <div class="p-tags">
          <div class="ptag"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>5 courses</div>
          <div class="ptag"><svg viewBox="0 0 16 16"><circle cx="8" cy="8" r="6"/><path d="M8 5v3l2 2"/></svg>Self-paced</div>
          <div class="ptag"><svg viewBox="0 0 16 16"><path d="M13 6l-5 5-3-3"/><circle cx="8" cy="8" r="6"/></svg>Certificate included</div>
          <div class="ptag"><svg viewBox="0 0 16 16"><path d="M2 12s2-3 6-3 6 3 6 3"/><circle cx="8" cy="6" r="3"/></svg>All roles</div>
        </div>
      </div>
      <div class="p-right"><span class="pbadge pb-amber">High ROI</span></div>
      <div class="p-chev"><svg viewBox="0 0 14 14"><path d="M2 4l5 5 5-5"/></svg></div>
    </div>
    <div class="p-body">
      <div class="p-intro">The real productivity killers are not big strategic failures. They are bad emails, missed deadlines, unclear writing and tool misuse. This pack addresses the daily habits that either cost or save hours every week across every team in your organisation.</div>
      <div class="c-grid">
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-time"></div><div class="cc-ov"></div><span class="cc-tag">Productivity</span></div><div class="cc-body"><div class="cc-title">Time Management</div><div class="cc-desc">Prioritisation frameworks, calendar discipline and the habits that separate high-output employees from constantly busy ones.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-writing"></div><div class="cc-ov"></div><span class="cc-tag">Writing</span></div><div class="cc-body"><div class="cc-title">Business Writing</div><div class="cc-desc">How to write clearly and persuasively in any business context, from internal reports to client proposals and executive briefs.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-present"></div><div class="cc-ov"></div><span class="cc-tag">Presentations</span></div><div class="cc-body"><div class="cc-title">Presentation Skills</div><div class="cc-desc">Slide design and delivery skills for employees who need to communicate ideas confidently to any internal or external audience.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-excel"></div><div class="cc-ov"></div><span class="cc-tag">Digital Tools</span></div><div class="cc-body"><div class="cc-title">Excel for Business — Basics</div><div class="cc-desc">Core spreadsheet skills for non-technical employees covering the formulas and functions teams use most in everyday work.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-ail"></div><div class="cc-ov"></div><span class="cc-tag">Hot in 2026</span></div><div class="cc-body"><div class="cc-title">AI Literacy for Employees</div><div class="cc-desc">A non-technical introduction to how AI tools work, where they add value and how to use them responsibly in daily tasks.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
      </div>
    </div>
  </div>

  <!-- PACK 5 AI -->
  <div class="pack" data-cat="ai" data-name="AI Workforce Readiness" data-n="4">
    <div class="pack-head" onclick="togglePack(this)">
      <div class="p-thumb bg-ai"><div class="p-thumb-in"><svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="3"/><path d="M6 9h12M6 13h8"/></svg></div></div>
      <div class="p-info">
        <div class="p-eye">Section 5 · Future of Work</div>
        <div class="p-name">AI Workforce Readiness</div>
        <div class="p-desc">AI is already reshaping every role. This pack ensures your workforce uses AI tools confidently, responsibly and without creating new risks for the business.</div>
        <div class="p-tags">
          <div class="ptag"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>4 courses</div>
          <div class="ptag"><svg viewBox="0 0 16 16"><circle cx="8" cy="8" r="6"/><path d="M8 5v3l2 2"/></svg>Self-paced</div>
          <div class="ptag"><svg viewBox="0 0 16 16"><path d="M13 6l-5 5-3-3"/><circle cx="8" cy="8" r="6"/></svg>Certificate included</div>
          <div class="ptag"><svg viewBox="0 0 16 16"><path d="M2 12s2-3 6-3 6 3 6 3"/><circle cx="8" cy="6" r="3"/></svg>All roles</div>
        </div>
      </div>
      <div class="p-right"><span class="pbadge pb-amber">Trending 2026</span></div>
      <div class="p-chev"><svg viewBox="0 0 14 14"><path d="M2 4l5 5 5-5"/></svg></div>
    </div>
    <div class="p-body">
      <div class="p-intro">Most AI adoption fails not because of the technology but because employees were never properly trained on how to use it. These four courses close the gap between AI potential and actual daily impact — practically and safely.</div>
      <div class="c-grid">
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-ail"></div><div class="cc-ov"></div><span class="cc-tag">AI Foundations</span></div><div class="cc-body"><div class="cc-title">AI Literacy for Employees</div><div class="cc-desc">Demystifies artificial intelligence for non-technical employees. Covers how AI tools work and where human judgement still matters most.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-air"></div><div class="cc-ov"></div><span class="cc-tag">Responsible AI</span></div><div class="cc-body"><div class="cc-title">Using AI Tools Responsibly at Work</div><div class="cc-desc">Bias recognition, output verification and acceptable use policies so employees know when to trust and when to question AI.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-prompt"></div><div class="cc-ov"></div><span class="cc-tag">Prompt Engineering</span></div><div class="cc-body"><div class="cc-title">Prompt Engineering for Business Users</div><div class="cc-desc">Practical prompt-writing techniques for everyday tasks. Use-case templates that immediately improve AI output quality for any role.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
        <div class="cc"><div class="cc-img"><div class="cc-bg bg-aisec"></div><div class="cc-ov"></div><span class="cc-tag">AI Security</span></div><div class="cc-body"><div class="cc-title">AI and Data Privacy and Security</div><div class="cc-desc">Data risks created by AI tools, how to avoid sharing sensitive information and the policies that keep AI adoption safe and compliant.</div><div class="cc-foot"><div class="cc-mod"><svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="2"/><path d="M5 8h6M8 5v6"/></svg>1 module</div><button class="cc-enrol">Enrol</button></div></div></div>
      </div>
    </div>
  </div>

  <div id="empty">
    <svg viewBox="0 0 48 48"><circle cx="24" cy="24" r="20"/><path d="M24 16v8M24 32h.01"/></svg>
    <h3>No matching courses found</h3>
    <p>Try a different keyword or select All Packs to browse the full library.</p>
  </div>

</div>

<!-- PRICING -->
<section class="pr-section" id="pricing-sec">
  <div class="pr-in">
    <div class="sec-eye">Pricing</div>
    <div class="sec-h">Simple pricing.<br>No per-course surprises.</div>
    <div class="sec-sub">Buy a single pack or unlock the full library for one flat annual fee. The more courses you take, the lower your cost per course — volume discounts apply automatically.</div>

    <div class="bundle-grid">
      <div class="bcard">
        <div class="bcard-lbl">1 Pack</div>
        <div class="bcard-price"><sup>$</sup>1,000</div>
        <div class="bcard-per">per year</div>
        <div class="bcard-desc">Focused solution for one training area. Ideal when you have a specific compliance or skills gap to close.</div>
        <div class="bcard-inc">Focused solution</div>
      </div>
      <div class="bcard">
        <div class="bcard-lbl">2 Packs</div>
        <div class="bcard-price"><sup>$</sup>1,800</div>
        <div class="bcard-per">per year</div>
        <div class="bcard-desc">Multi-area coverage for organisations addressing compliance and skills development at the same time.</div>
        <div class="bcard-inc">Multi-area coverage</div>
      </div>
      <div class="bcard">
        <div class="bcard-lbl">3 Packs</div>
        <div class="bcard-price"><sup>$</sup>2,300</div>
        <div class="bcard-per">per year</div>
        <div class="bcard-desc">Near-complete access covering your most critical training categories across compliance, skills and leadership.</div>
        <div class="bcard-inc">Almost full access</div>
      </div>
      <div class="bcard feat">
        <div class="bcard-pop">Best Value</div>
        <div class="bcard-lbl">Full Library</div>
        <div class="bcard-price"><sup>$</sup>2,600</div>
        <div class="bcard-per">per year · all 29 courses</div>
        <div class="bcard-desc">Complete access to every course across all packs — compliance, skills, management, productivity and AI readiness.</div>
        <div class="bcard-inc">29 courses included</div>
      </div>
    </div>

    <div class="vol-label">Or pick individual courses — volume discounts apply automatically</div>
    <div class="vol-wrap">
      <table class="vol-table">
        <thead>
          <tr>
            <th>Courses Selected</th>
            <th>Price per Course</th>
            <th>Total Cost</th>
            <th>Saving vs Base</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>1 to 5 courses</td><td>$110 / course</td><td>$110 – $550</td><td><span style="font-size:13px;color:var(--ink4);font-weight:500">Base price</span></td></tr>
          <tr><td>6 to 10 courses</td><td>$100 / course</td><td>$600 – $1,000</td><td><span class="d-pill">Save 9%</span></td></tr>
          <tr><td>11 to 20 courses</td><td>$90 / course</td><td>$990 – $1,800</td><td><span class="d-pill">Save 18%</span></td></tr>
          <tr><td>21 to 26 courses</td><td>$80 / course</td><td>$1,680 – $2,080</td><td><span class="d-pill">Save 27%</span></td></tr>
          <tr class="frow"><td>Full Library — 29 courses</td><td>Flat $2,600 / year</td><td>$2,600</td><td><span class="b-pill">Best value</span></td></tr>
        </tbody>
      </table>
    </div>

    <div class="pr-note">
      <svg viewBox="0 0 20 20"><circle cx="10" cy="10" r="8"/><path d="M10 7v3M10 13h.01"/></svg>
      <div>All course pricing is annual and hosted directly within your MyPass LMS. There are no per-user charges on course access. Once a course is added to your plan, every learner on your account can access it. Course library pricing is separate from your MyPass LMS platform subscription.</div>
    </div>
  </div>
</section>

<!-- LEAD FORM -->
<div class="lead-sec" id="lead-form">
  <div class="lead-in">
    <div class="lead-tag">
      <svg width="13" height="13" viewBox="0 0 13 13" fill="none"><path d="M6.5 1.5l1.5 4h4l-3.2 2.3 1.2 3.7-3.5-2.5-3.5 2.5 1.2-3.7L1 5.5h4z" fill="var(--brand)"/></svg>
      Course Recommendation
    </div>
    <div class="lead-h">Not sure which courses<br>fit your team?</div>
    <p class="lead-p">Drop your name and work email. Our L&D team will come back with a shortlist of the right courses for your industry, team size and training goals — usually within one business day.</p>
    <div class="lead-box" id="leadBox">
      <form onsubmit="submitForm(event)">
        <div class="f-row">
          <div class="fg"><label for="fn">Your Name</label><input type="text" id="fn" placeholder="Sarah Johnson" required></div>
          <div class="fg"><label for="fe">Work Email</label><input type="email" id="fe" placeholder="sarah@company.com" required></div>
        </div>
        <button type="submit" class="f-submit">Get My Course Recommendation</button>
        <p class="f-note">No sales pressure. Just a practical recommendation from our L&D team, within one business day.</p>
      </form>
      <div class="f-success" id="successMsg">
        <svg viewBox="0 0 44 44"><circle cx="22" cy="22" r="20"/><path d="M14 22l6 6 10-12"/></svg>
        <h3>We have your details.</h3>
        <p>Expect a personalised course recommendation within one business day.</p>
      </div>
    </div>
  </div>
</div>


<script>
function togglePack(h){h.closest('.pack').classList.toggle('open')}

let activeCat='all';
function setCat(cat,btn){
  activeCat=cat;
  document.querySelectorAll('.ftab').forEach(b=>b.classList.remove('on'));
  btn.classList.add('on');
  applyFilters();
}

function applyFilters(){
  const q=document.getElementById('searchInput').value.toLowerCase().trim();
  const packs=document.querySelectorAll('#packsWrap .pack');
  let vis=0;
  packs.forEach(p=>{
    const catOk=activeCat==='all'||p.dataset.cat===activeCat;
    const searchOk=!q||p.textContent.toLowerCase().includes(q);
    if(catOk&&searchOk){p.style.display='';vis++;}
    else{p.style.display='none';}
  });
  document.getElementById('empty').style.display=vis===0?'block':'none';
  document.getElementById('resLbl').innerHTML='Showing <strong>'+vis+' pack'+(vis!==1?'s':'')+'</strong>';
}

function sortPacks(v){
  const wrap=document.getElementById('packsWrap');
  const packs=Array.from(wrap.querySelectorAll('.pack'));
  const order=['compliance','workplace','manager','productivity','ai'];
  if(v==='az') packs.sort((a,b)=>a.dataset.name.localeCompare(b.dataset.name));
  else if(v==='most') packs.sort((a,b)=>parseInt(b.dataset.n)-parseInt(a.dataset.n));
  else packs.sort((a,b)=>order.indexOf(a.dataset.cat)-order.indexOf(b.dataset.cat));
  packs.forEach(p=>wrap.insertBefore(p,document.getElementById('empty')));
}

function submitForm(e){
  e.preventDefault();
  document.querySelector('#leadBox form').style.display='none';
  document.getElementById('successMsg').style.display='block';
}
</script>
@endsection

@push('schema')
@verbatim

@endverbatim
@endpush

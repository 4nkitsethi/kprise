@extends('layouts.app')

@push('styles')
   <style>
        *{margin:0;padding:0;box-sizing:border-box;}
        :root{
        --brand:#4220C8;
        --brand-dark:#3118A0;
        --brand-light:#EEE9FF;
        --brand-mid:#D4C9FF;
        --brand-faint:#F7F5FF;
        --ink:#0D0A1A;
        --ink2:#1E1840;
        --ink3:#4A4468;
        --ink4:#8C87A8;
        --page:#F8F7FC;
        --white:#FFFFFF;
        --bdr:rgba(66,32,200,0.09);
        --bdr2:rgba(66,32,200,0.16);
        --ok:#0A7A50;
        --ok-bg:rgba(10,122,80,0.07);
        }
        html{scroll-behavior:smooth;}
        body{
        font-family:'Plus Jakarta Sans',system-ui,sans-serif;
        background:var(--white);
        color:var(--ink);
        line-height:1.6;
        font-size:15px;
        -webkit-font-smoothing:antialiased;
        }

        /* ── TOP NAV ── */
        .topnav{
        position:fixed;top:0;left:0;right:0;z-index:900;
        height:62px;background:rgba(255,255,255,.97);
        backdrop-filter:blur(18px);border-bottom:1px solid var(--bdr);
        display:flex;align-items:center;justify-content:space-between;
        padding:0 44px;
        }
        .tn-logo img{height:30px;width:auto;}
        .tn-links{display:flex;gap:24px;}
        .tn-lnk{font-size:13px;color:var(--ink3);text-decoration:none;font-weight:500;transition:color .15s;}
        .tn-lnk:hover,.tn-lnk.active{color:var(--brand);}
        .tn-right{display:flex;gap:8px;}

        /* ── BUTTONS ── */
        .btn{
        display:inline-flex;align-items:center;gap:6px;
        font-family:'Plus Jakarta Sans',system-ui,sans-serif;
        font-weight:600;border-radius:8px;cursor:pointer;
        text-decoration:none;transition:all .15s;border:none;white-space:nowrap;
        }
        .btn-s{font-size:12.5px;padding:7px 15px;}
        .btn-m{font-size:14px;padding:10px 22px;}
        .btn-l{font-size:15px;padding:13px 28px;}
        .btn-pri{background:var(--brand);color:#fff;box-shadow:0 3px 12px rgba(66,32,200,.2);}
        .btn-pri:hover{background:var(--brand-dark);transform:translateY(-1px);}
        .btn-ghost{background:#fff;color:var(--ink2);border:1.5px solid var(--bdr2);}
        .btn-ghost:hover{border-color:var(--brand);color:var(--brand);}
        .btn-w{background:#fff;color:var(--brand);}
        .btn-w:hover{background:var(--brand-light);}
        .btn-wo{background:rgba(255,255,255,.1);color:#fff;border:1.5px solid rgba(255,255,255,.2);}
        .btn-wo:hover{background:rgba(255,255,255,.18);}

        /* ── HERO ── */
        .hero{
        padding:70px 21% 60px;
        background:linear-gradient(150deg,#fff 0%,var(--brand-faint) 100%);
        border-bottom:1px solid var(--bdr);
        }
        .hero-inner{max-width:680px;}
        .hero-eyebrow{
        display:inline-flex;align-items:center;gap:7px;
        background:var(--brand-light);border:1px solid var(--brand-mid);
        border-radius:100px;padding:4px 14px 4px 8px;margin-bottom:18px;
        }
        .h-dot{width:16px;height:16px;border-radius:50%;background:rgba(66,32,200,.14);
        display:flex;align-items:center;justify-content:center;}
        .h-dot::after{content:'';width:6px;height:6px;background:var(--brand);border-radius:50%;animation:pulse 2s infinite;}
        @keyframes pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.5;transform:scale(1.5)}}
        .hero-eyebrow-txt{font-size:11px;font-weight:700;color:var(--brand-dark);}
        .hero h1{font-size:44px;font-weight:800;letter-spacing:-1.6px;line-height:1.1;color:var(--ink);margin-bottom:14px;}
        .hero h1 span{color:var(--brand);}
        .hero-sub{font-size:16px;line-height:1.78;color:var(--ink3);max-width:540px;}

        /* ── PAGE BODY: sidebar + content ── */
        .page-body{
        display:grid;
        grid-template-columns:240px 1fr;
        max-width:1280px;
        margin:0 auto;
        padding:0 44px 100px;
        gap:0;
        align-items:start;
        }

        /* ── LEFT SIDEBAR ── */
        .sidebar{
        position:sticky;
        top:62px;
        height:calc(100vh - 62px);
        overflow-y:auto;
        padding:36px 0 36px;
        border-right:1px solid var(--bdr);
        scrollbar-width:thin;
        scrollbar-color:var(--brand-mid) transparent;
        }
        .sidebar::-webkit-scrollbar{width:3px;}
        .sidebar::-webkit-scrollbar-thumb{background:var(--brand-mid);border-radius:3px;}
        .sb-label{
        font-size:10px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;
        color:var(--ink4);padding:0 24px 10px;
        }
        .sb-link{
        display:flex;align-items:center;gap:10px;
        padding:9px 24px;font-size:13px;font-weight:500;color:var(--ink3);
        text-decoration:none;cursor:pointer;transition:all .15s;
        border-left:2px solid transparent;border-radius:0;
        position:relative;
        }
        .sb-link svg{flex-shrink:0;opacity:.6;transition:opacity .15s;}
        .sb-link:hover{color:var(--ink);background:var(--brand-faint);}
        .sb-link:hover svg{opacity:.9;}
        .sb-link.active{
        color:var(--brand);font-weight:700;
        background:var(--brand-faint);
        border-left-color:var(--brand);
        }
        .sb-link.active svg{opacity:1;color:var(--brand);}
        .sb-divider{height:1px;background:var(--bdr);margin:12px 24px;}

        /* ── MAIN CONTENT ── */
        .main-content{padding:36px 0 0 52px;}

        /* ── CATEGORY SECTION ── */
        .cat-section{padding-bottom:64px;border-bottom:1px solid var(--bdr);margin-bottom:64px;}
        .cat-section:last-child{border-bottom:none;margin-bottom:0;}

        .cat-title{
        font-size:26px;font-weight:800;letter-spacing:-.7px;
        color:var(--ink);margin-bottom:6px;
        }
        .cat-desc{
        font-size:14.5px;line-height:1.7;color:var(--ink3);
        margin-bottom:32px;max-width:520px;
        }

        /* ── FEATURE LIST ── */
        .feat-list{display:flex;flex-direction:column;}

        .feat-row{
        border-top:1px solid var(--bdr);
        transition:background .15s;
        }
        .feat-row:last-child{border-bottom:1px solid var(--bdr);}

        /* Feature header */
        .feat-head{
        display:flex;align-items:center;gap:16px;
        padding:18px 20px 18px 0;
        cursor:pointer;
        position:relative;
        }
        .feat-icon{
        width:38px;height:38px;border-radius:10px;flex-shrink:0;
        background:var(--brand-faint);border:1px solid var(--brand-mid);
        display:flex;align-items:center;justify-content:center;
        }
        .feat-icon svg{color:var(--brand);}
        .feat-info{flex:1;min-width:0;}
        .feat-name{font-size:14.5px;font-weight:700;color:var(--ink);margin-bottom:3px;line-height:1.3;}
        .feat-tagline{font-size:13px;color:var(--ink4);line-height:1.45;}
        .feat-chevron{
        width:28px;height:28px;border-radius:7px;flex-shrink:0;
        display:flex;align-items:center;justify-content:center;
        background:var(--page);border:1px solid var(--bdr);
        transition:all .15s;
        }
        .feat-chevron svg{transition:transform .22s;color:var(--ink4);}
        .feat-row.open .feat-chevron{background:var(--brand);border-color:var(--brand);}
        .feat-row.open .feat-chevron svg{transform:rotate(180deg);color:#fff;}

        /* Feature expand body */
        .feat-body{
        max-height:0;overflow:hidden;
        transition:max-height .3s cubic-bezier(0.4,0,0.2,1);
        }
        .feat-row.open .feat-body{max-height:280px;}
        .feat-body-inner{
        padding:0 0 20px 54px;
        }
        .feat-desc{
        font-size:13.5px;line-height:1.78;color:var(--ink3);
        max-width:580px;
        }

        /* ── CTA BAND ── */
        .cta-band{
        background:var(--brand);
        padding:52px;text-align:center;
        position:relative;overflow:hidden;
        }
        .cta-band::before{
        content:'';position:absolute;top:-80px;left:50%;transform:translateX(-50%);
        width:600px;height:300px;border-radius:50%;
        background:radial-gradient(ellipse,rgba(255,255,255,.07) 0%,transparent 65%);
        pointer-events:none;
        }
        .cta-band::after{
        content:'';position:absolute;inset:0;
        background-image:radial-gradient(circle,rgba(255,255,255,.04) 1px,transparent 1px);
        background-size:22px 22px;pointer-events:none;
        }
        .cta-in{max-width:500px;margin:0 auto;position:relative;z-index:1;}
        .cta-chip{
        display:inline-flex;align-items:center;gap:6px;
        background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.18);
        border-radius:100px;padding:4px 14px;
        font-size:10.5px;font-weight:700;color:rgba(255,255,255,.85);
        letter-spacing:.1em;text-transform:uppercase;margin-bottom:16px;
        }
        .cta-h{font-size:32px;font-weight:800;letter-spacing:-1px;line-height:1.12;color:#fff;margin-bottom:12px;}
        .cta-p{font-size:15px;color:rgba(255,255,255,.6);line-height:1.7;margin-bottom:26px;}
        .cta-btns{display:flex;gap:10px;justify-content:center;flex-wrap:wrap;}

        /* ── RESPONSIVE ── */
        @media(max-width:1024px){
        .page-body{grid-template-columns:1fr;padding:0 24px 80px;}
        .sidebar{position:static;height:auto;border-right:none;border-bottom:1px solid var(--bdr);padding:20px 0;display:flex;flex-wrap:wrap;gap:4px;}
        .sb-label{display:none;}
        .sb-divider{display:none;}
        .sb-link{border-radius:7px;border-left:none;padding:6px 12px;font-size:12px;}
        .sb-link.active{border-left:none;border:1.5px solid var(--brand);}
        .main-content{padding:32px 0 0;}
        .topnav,.hero,footer{padding-left:24px;padding-right:24px;}
        .hero h1{font-size:34px;}
        }
        @media(max-width:640px){
        .tn-links{display:none;}
        .hero h1{font-size:28px;}
        .cat-title{font-size:22px;}
        .ft-top{grid-template-columns:1fr 1fr;}
        }
    </style>
@endpush

@section('content')
  <!-- HERO -->
    <section class="hero">
    <div class="hero-inner">
        <div class="hero-eyebrow">
        <div class="h-dot"></div>
        <span class="hero-eyebrow-txt">Complete Platform Reference</span>
        </div>
        <h1>Every feature that powers<br><span>smarter learning.</span></h1>
        <p class="hero-sub">From AI-powered course creation to enterprise-grade security and association management. Everything the MyPass platform does, in one place.</p>
    </div>
    </section>

    <!-- PAGE BODY -->
    <div class="page-body">

    <!-- LEFT SIDEBAR -->
    <aside class="sidebar" id="sidebar">
        <div class="sb-label">Jump to</div>

        <a href="#content" class="sb-link active" onclick="setActive(this)">
        <svg width="15" height="15" fill="none" viewBox="0 0 18 18"><rect x="2" y="2" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="10" y="2" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="2" y="10" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/><rect x="10" y="10" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.5"/></svg>
        Content &amp; Creation
        </a>
        <a href="#learning" class="sb-link" onclick="setActive(this)">
        <svg width="15" height="15" fill="none" viewBox="0 0 18 18"><path d="M9 2L2 6v5.5c0 3 2.5 5 7 5.5 4.5-.5 7-2.5 7-5.5V6L9 2z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>
        Learning Experience
        </a>
        <a href="#engagement" class="sb-link" onclick="setActive(this)">
        <svg width="15" height="15" fill="none" viewBox="0 0 18 18"><circle cx="9" cy="9" r="7" stroke="currentColor" stroke-width="1.5"/><path d="M6 9l2 2 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Engagement
        </a>
        <a href="#users" class="sb-link" onclick="setActive(this)">
        <svg width="15" height="15" fill="none" viewBox="0 0 18 18"><circle cx="6.5" cy="6" r="3" stroke="currentColor" stroke-width="1.4"/><path d="M1 16c0-3 2.5-5 5.5-5s5.5 2 5.5 5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/><circle cx="13.5" cy="5.5" r="2.5" stroke="currentColor" stroke-width="1.3"/><path d="M13.5 11c2 0 4 1 4 4.5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
        User Management
        </a>

        <div class="sb-divider"></div>

        <a href="#assessments" class="sb-link" onclick="setActive(this)">
        <svg width="15" height="15" fill="none" viewBox="0 0 18 18"><rect x="2" y="2" width="14" height="14" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="M5 9l2.5 2.5L13 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Assessments
        </a>
        <a href="#analytics" class="sb-link" onclick="setActive(this)">
        <svg width="15" height="15" fill="none" viewBox="0 0 18 18"><path d="M2 14l3.5-5 3.5 2.5 4-6 3 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Analytics
        </a>
        <a href="#ai" class="sb-link" onclick="setActive(this)">
        <svg width="15" height="15" fill="none" viewBox="0 0 18 18"><path d="M9 2a3 3 0 1 1 0 6 3 3 0 0 1 0-6zM3 9a3 3 0 1 1 0 6 3 3 0 0 1 0-6zM15 9a3 3 0 1 1 0 6 3 3 0 0 1 0-6z" stroke="currentColor" stroke-width="1.4"/><path d="M9 8v2M7.3 11.5l-2 .5M10.7 11.5l2 .5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
        AI &amp; Automation
        </a>

        <div class="sb-divider"></div>

        <a href="#security" class="sb-link" onclick="setActive(this)">
        <svg width="15" height="15" fill="none" viewBox="0 0 18 18"><path d="M9 1.5L2.5 4.5v5c0 3.5 2.8 6.5 6.5 7 3.7-.5 6.5-3.5 6.5-7v-5L9 1.5z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>
        Security &amp; DRM
        </a>
        <a href="#support" class="sb-link" onclick="setActive(this)">
        <svg width="15" height="15" fill="none" viewBox="0 0 18 18"><circle cx="9" cy="9" r="7" stroke="currentColor" stroke-width="1.5"/><path d="M9 10v1M9 8a1.5 1.5 0 0 1 1.5-1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
        Platform &amp; Support
        </a>
        <a href="#ams" class="sb-link" onclick="setActive(this)">
        <svg width="15" height="15" fill="none" viewBox="0 0 18 18"><rect x="2" y="5" width="14" height="10" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="M5 5V4a4 4 0 0 1 8 0v1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
        Association (AMS)
        </a>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <!-- ─── 1. CONTENT & CREATION ─── -->
        <section class="cat-section" id="content">
        <div class="cat-title">Content &amp; Creation</div>
        <p class="cat-desc">Build courses from scratch, convert existing materials, or let AI do the heavy lifting. Every tool you need to turn knowledge into structured, deployable training.</p>
        <div class="feat-list">

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.5"/><path d="M10 7v3l2 1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M6 5A7 7 0 0 1 17 9" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">AI Course Authoring</div>
                <div class="feat-tagline">Generate complete courses with AI content, images, and diagrams</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Generate course outlines, summaries, detailed content, and supporting visuals using AI. Instructional designers can refine and structure the output into fully developed learning modules, significantly reducing course creation time while maintaining instructional quality and consistency.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><rect x="3" y="3" width="14" height="14" rx="2.5" stroke="currentColor" stroke-width="1.5"/><path d="M6 8h8M6 11h5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M13 14l2-2-2-2" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">SCORM Course Builder</div>
                <div class="feat-tagline">Convert PPTs, PDFs, and videos into SCORM-ready courses automatically</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Upload existing training materials and automatically convert them into SCORM-compliant modules. Digitize legacy content without rebuilding from scratch. Making every resource fully trackable within the LMS. Ideal for organizations with existing libraries of PowerPoints, PDFs, and recorded videos.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3 5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5z" stroke="currentColor" stroke-width="1.5"/><path d="M7 9h6M7 12h4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M7 6V4M13 6V4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Content Library</div>
                <div class="feat-tagline">Centralized repository to store, organize, and reuse all learning materials</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Store, organize, and reuse training content across multiple programs from one centralized location. The content library ensures consistency across programs while allowing teams to quickly build and deploy new courses using existing materials, eliminating duplicated effort and version confusion.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><rect x="3" y="4" width="9" height="12" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="M12 8h3a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M6 8h4M6 11h3" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Multimedia Course Creation</div>
                <div class="feat-tagline">Build courses with text, images, video, and diagrams in one editor</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Build structured learning modules using text, images, videos, and diagrams within a single authoring environment. This enables more interactive and engaging learning experiences compared to static document formats, keeping learners focused and reducing completion drop-off rates.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><rect x="3" y="3" width="14" height="14" rx="2.5" stroke="currentColor" stroke-width="1.5"/><path d="M6 10l2.5 2.5L14 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Embedded Assessments</div>
                <div class="feat-tagline">Add quizzes and knowledge checks directly inside courses</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Integrate assessments into learning modules to evaluate understanding at the moment of delivery rather than after completion. Immediate feedback reinforces learning and highlights knowledge gaps before learners advance to the next section, improving retention significantly.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.5"/><path d="M10 7v3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M7 9.5l3 1.5 3-1.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Multilingual Course Creation</div>
                <div class="feat-tagline">Create once, deliver in multiple languages with AI translation</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Build courses in one language and automatically translate them via AI into multiple languages. Generate multilingual SCORM packages and allow learners to access content in their preferred language. Enabling global training rollouts without duplicating content or rebuilding programs from scratch.</p></div></div>
            </div>

        </div>
        </section>

        <!-- ─── 2. LEARNING EXPERIENCE ─── -->
        <section class="cat-section" id="learning">
        <div class="cat-title">Learning Experience</div>
        <p class="cat-desc">Control how learners discover, progress through, and complete their training. Structured paths, sequential flows, and seamless SCORM playback in one place.</p>
        <div class="feat-list">

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3 6.5a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v1H3v-1z" stroke="currentColor" stroke-width="1.4"/><rect x="3" y="7.5" width="7" height="9" rx="1" stroke="currentColor" stroke-width="1.5"/><path d="M13 4h2a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="1.5"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Course Assignment</div>
                <div class="feat-tagline">Assign courses to individuals or entire groups in a single step</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Allocate training programs to specific learners or entire groups in one action. The right content reaches the right audience without manual tracking, and assignment status is visible immediately across all administrator dashboards.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3 10h14M3 6.5h10M3 13.5h7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><circle cx="16" cy="14" r="2.5" stroke="currentColor" stroke-width="1.4"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Learning Paths</div>
                <div class="feat-tagline">Design structured certification journeys with defined progression</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Design step-by-step learning paths that guide learners through required courses in a defined sequence. Ideal for certification programs where progression must follow a specific order. Ensuring foundational knowledge is established before advanced topics are unlocked.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><circle cx="5" cy="10" r="2.5" stroke="currentColor" stroke-width="1.4"/><circle cx="15" cy="10" r="2.5" stroke="currentColor" stroke-width="1.4"/><circle cx="10" cy="5" r="2.5" stroke="currentColor" stroke-width="1.4"/><path d="M7.5 9l1-1.5M12.5 9l-1-1.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Sequential Learning Flow</div>
                <div class="feat-tagline">Control the exact order learners move through content</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Ensure learners complete courses in a predefined order. Foundational knowledge is confirmed before learners advance to more complex topics, eliminating the risk of skipping prerequisite content or engaging with advanced modules out of context.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.5"/><path d="M7 10h6M10 7v6" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Multilingual Learning</div>
                <div class="feat-tagline">Deliver consistent training across global regions and languages</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Provide language selection for learners within the platform. Organizations deliver consistent training across different countries and regions without duplicating effort. All from one centralized platform and administration interface.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><rect x="3" y="4" width="14" height="11" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="M8 8.5l4 2-4 2V8.5z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">SCORM Playback</div>
                <div class="feat-tagline">Seamless SCORM delivery with full tracking and completion data</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Deliver SCORM content with full tracking capabilities. Learners access structured modules with a smooth experience while administrators monitor progress, time on task, and completion in real time. All captured automatically without any manual input.</p></div></div>
            </div>

        </div>
        </section>

        <!-- ─── 3. ENGAGEMENT ─── -->
        <section class="cat-section" id="engagement">
        <div class="cat-title">Engagement &amp; Interaction</div>
        <p class="cat-desc">Instructor-led sessions, QR attendance, venue logistics, and learner feedback. These tools make live and blended training as trackable as self-paced learning.</p>
        <div class="feat-list">

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><rect x="3" y="4" width="14" height="12" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="M6 4V3M14 4V3M3 9h14" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Instructor-Led Training</div>
                <div class="feat-tagline">Schedule and manage in-person and virtual sessions within the LMS</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Create and manage classroom or virtual training sessions directly within the LMS. Organizations blend instructor-led training with digital learning in one platform, keeping all training records, attendance, and completion data in a single unified system.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><rect x="4" y="4" width="12" height="12" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="M4 8.5h12M8.5 4v12" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/><rect x="5.5" y="5.5" width="2" height="2" rx=".4" fill="currentColor"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">QR Attendance Tracking</div>
                <div class="feat-tagline">Instant attendance via QR check-in, linked directly to compliance records</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Learners mark attendance using QR codes at the start of sessions, eliminating manual sign-in sheets and data entry errors. Attendance links automatically to compliance and completion reporting, making audit verification immediate and accurate.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3 15V7a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8" stroke="currentColor" stroke-width="1.5"/><path d="M1 15h18M7 11h6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Session &amp; Venue Management</div>
                <div class="feat-tagline">Manage instructors, locations, and schedules in one place</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Manage instructors, training locations, room capacities, and schedules all within the platform. Eliminates the need for separate coordination tools, ensuring sessions run smoothly with all logistics visible to administrators and participants before the session date.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3 4h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1z" stroke="currentColor" stroke-width="1.5"/><path d="M6 8h8M6 11h5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/><path d="M10 13v2.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Surveys &amp; Feedback</div>
                <div class="feat-tagline">Collect structured learner insights after each training session</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Create and distribute surveys to gather feedback after training sessions. Structured responses help identify what is working, where content needs improvement, and how the overall learning experience should be refined. Directly from the people it is designed for.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3 4h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1z" stroke="currentColor" stroke-width="1.5"/><path d="M7 8h3M7 11h5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/><circle cx="14" cy="8.5" r="1.5" stroke="currentColor" stroke-width="1.3"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Custom Feedback Forms</div>
                <div class="feat-tagline">Design tailored feedback collection for each program</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Build custom feedback forms tailored to specific programs, sessions, or training objectives. Training teams capture precisely the insights they need, rather than relying on generic surveys that miss program-specific quality indicators.</p></div></div>
            </div>

        </div>
        </section>

        <!-- ─── 4. USER MANAGEMENT ─── -->
        <section class="cat-section" id="users">
        <div class="cat-title">User &amp; Organization Management</div>
        <p class="cat-desc">Onboard, organize, and permission thousands of learners without friction. Bulk upload, department grouping, and role-based access, all built to scale without adding administrative overhead.</p>
        <div class="feat-list">

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3 7a3 3 0 1 1 6 0 3 3 0 0 1-6 0zM1 17c0-3 2.7-5 5-5M12 10l2 2 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Bulk User Onboarding</div>
                <div class="feat-tagline">Add and enroll hundreds of users in a single upload step</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Upload and onboard large numbers of users in a single step via CSV import or directory sync. Removes the manual effort of individual account creation when managing large cohorts. Particularly valuable during organizational rollouts or seasonal workforce expansions.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><circle cx="10" cy="6.5" r="3.5" stroke="currentColor" stroke-width="1.5"/><path d="M3 17c0-3.3 3.1-6 7-6s7 2.7 7 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M16 9.5l2-1.5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">User Profile Management</div>
                <div class="feat-tagline">Maintain structured learner data, roles, and full learning history</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Create and maintain detailed user profiles including job roles, department assignments, and complete learning history. Structured profile data enables better personalization, targeted training assignment, and accurate reporting at both individual and group levels.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><circle cx="6.5" cy="8" r="3" stroke="currentColor" stroke-width="1.4"/><circle cx="13.5" cy="8" r="3" stroke="currentColor" stroke-width="1.4"/><path d="M2 17c0-2.8 2.7-4 4.5-4M11 17c0-2.8 2.7-4 4.5-4M8.5 13h3" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Groups &amp; Departments</div>
                <div class="feat-tagline">Segment learners into departments, cohorts, and certification groups</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Segment users into departments, teams, regions, or certification cohorts. Group-level organization enables targeted training delivery, granular reporting, and structured compliance management. Without requiring individual-level configuration for every learner.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><rect x="5" y="9" width="10" height="8" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="M7 9V7a3 3 0 0 1 6 0v2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><circle cx="10" cy="14" r="1.2" fill="currentColor"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Role-Based Access Control</div>
                <div class="feat-tagline">Define and enforce user permissions by role across the platform</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Control what different user roles can access, create, manage, and view within the platform. Administrators, instructors, group managers, and learners each operate within appropriate boundaries. Keeping sensitive data secure and reducing the risk of accidental content changes.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><rect x="3" y="4" width="7" height="12" rx="2" stroke="currentColor" stroke-width="1.5"/><rect x="12" y="4" width="5" height="7" rx="1.5" stroke="currentColor" stroke-width="1.4"/><path d="M12 14h5M14.5 11v6" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Group-Based Course Allocation</div>
                <div class="feat-tagline">Assign training programs to entire groups instantly</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Deliver training to entire departments or cohorts rather than configuring assignments one learner at a time. As new members join a group, they are automatically included in applicable training assignments. Keeping onboarding consistent without additional administrator effort.</p></div></div>
            </div>

        </div>
        </section>

        <!-- ─── 5. ASSESSMENTS ─── -->
        <section class="cat-section" id="assessments">
        <div class="cat-title">Assessments &amp; Certification</div>
        <p class="cat-desc">A full assessment engine: question banks, randomized exams, timed tests, AI-assisted grading, and automated certificate issuance. Everything needed to evaluate and credential learners at scale.</p>
        <div class="feat-list">

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><rect x="3" y="3" width="14" height="14" rx="2.5" stroke="currentColor" stroke-width="1.5"/><path d="M6 7h8M6 10h6M6 13h4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Advanced Question Builder</div>
                <div class="feat-tagline">Build and manage reusable question banks with single select, multi-select, essay, and passage-based formats</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Build questions individually through an intuitive UI or upload in bulk via Excel templates. Supports single select, multi-select, yes/no, date-based, essay, and passage-based formats. Organize questions into reusable banks to streamline assessment creation and maintain consistency across certification and compliance programs.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3 4h14a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1z" stroke="currentColor" stroke-width="1.5"/><path d="M6 9h4M6 12h6M14 9l1.5 1.5L14 12" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Assessment Builder</div>
                <div class="feat-tagline">Create structured evaluations with multiple question types</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Design full assessments using multiple question types including single select, multi-select, and descriptive responses, all from a single builder interface. Supports diverse evaluation methods suitable for everything from quick knowledge checks to formal certification exams.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.5"/><path d="M10 6.5v3.5l2.5 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Timed Assessments</div>
                <div class="feat-tagline">Set exam durations to ensure fairness and consistency</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Set time limits for assessments to ensure every learner operates under the same conditions. Essential for certification programs and compliance-based training where exam integrity and standardized evaluation conditions are required for regulatory acceptance.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3.5 10c0-3.6 3-6.5 6.5-6.5s6.5 2.9 6.5 6.5-3 6.5-6.5 6.5-6.5-2.9-6.5-6.5z" stroke="currentColor" stroke-width="1.5"/><path d="M8 9.5l4.5 2.5-4.5 2.5V9.5z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Randomized Questions</div>
                <div class="feat-tagline">Randomize questions and answers to preserve assessment integrity</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Randomize both questions and answer options for each individual learner. This minimizes the ability to share answers between participants and significantly improves assessment integrity. Particularly important for certification exams delivered to large or distributed cohorts.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M10 3a7 7 0 1 1 0 14A7 7 0 0 1 10 3z" stroke="currentColor" stroke-width="1.5"/><path d="M7 10l2 2 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M10 3v1.5M10 15.5V17M3 10h1.5M15.5 10H17" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">AI-Assisted Essay Grading</div>
                <div class="feat-tagline">Automate evaluation workflows while retaining full instructor control</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Use AI to generate initial evaluations of learner responses while instructors retain full review and override authority. This reduces manual grading workload significantly for large cohorts while ensuring final assessments are reviewed by a qualified human before results are issued.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><circle cx="10" cy="8" r="4" stroke="currentColor" stroke-width="1.5"/><path d="M3 18c0-3.9 3.1-7 7-7s7 3.1 7 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M14 6l1.5 1.5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Instructor Review &amp; Override</div>
                <div class="feat-tagline">Maintain full grading authority over AI-generated evaluations</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Allow instructors to review AI-suggested grades, add qualitative feedback, and override results before finalization. This ensures accuracy and fairness in every evaluation. Particularly for open-ended responses where context and nuance matter to the final outcome.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3 14l2-6 5.5 3 5.5-3 2 6H3z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M10 3l1.5 5h-3L10 3z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Certificate Builder</div>
                <div class="feat-tagline">Design branded certificate templates for your programs</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Create fully customized certificate templates aligned with your organization's branding. Including logo placement, typography, and design elements. Professional certificates increase the perceived value of training programs and motivate learner completion through tangible recognition.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3 14l2-6 5.5 3 5.5-3 2 6H3z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M10 3l1.5 5h-3L10 3z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/><path d="M7 17h6" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Automated Certification</div>
                <div class="feat-tagline">Issue certificates instantly on course or program completion</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Automatically generate and issue certificates the moment a learner meets completion or pass criteria. Eliminates manual certificate preparation entirely. Learners receive recognition immediately, and administrators maintain a complete verified record of every certificate issued.</p></div></div>
            </div>

        </div>
        </section>

        <!-- ─── 6. ANALYTICS ─── -->
        <section class="cat-section" id="analytics">
        <div class="cat-title">Insights &amp; Analytics</div>
        <p class="cat-desc">Real-time visibility into learner progress, course completion, and assessment performance. Filter, export, and act on the data that matters to your training outcomes.</p>
        <div class="feat-list">

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><circle cx="10" cy="7.5" r="4" stroke="currentColor" stroke-width="1.5"/><path d="M3 18c0-3.9 3.1-7 7-7s7 3.1 7 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M15 5l2 1M17 8l-2 1" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Learner Progress Tracking</div>
                <div class="feat-tagline">Monitor individual and group learning journeys in real time</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Track individual and group progress across all courses and programs in real time. Administrators see who is on track, who is falling behind, and where specific content is causing drop-off. Enabling targeted intervention before completion rates are affected.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M2 15l4-6 4 3 4-5 4 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M2 4.5h16" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Course Completion Reports</div>
                <div class="feat-tagline">Measure training effectiveness with detailed completion data</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Access detailed completion reports per course, program, or cohort. Identify where training is working and where gaps exist. Giving L&D teams the evidence needed to improve content, adjust timelines, and demonstrate program ROI to leadership and funding stakeholders.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><rect x="2" y="11.5" width="4" height="6" rx="1" stroke="currentColor" stroke-width="1.4"/><rect x="8" y="7" width="4" height="10.5" rx="1" stroke="currentColor" stroke-width="1.4"/><rect x="14" y="2.5" width="4" height="15" rx="1" stroke="currentColor" stroke-width="1.4"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Assessment Analytics</div>
                <div class="feat-tagline">Understand knowledge gaps and performance trends across cohorts</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Analyze assessment results at both individual and cohort level to surface knowledge gaps and performance trends. This data directly informs decisions about content revision, remedial training needs, and whether existing programs are delivering measurable learning outcomes.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M2.5 5.5h15M2.5 10.5h11M2.5 15.5h7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><circle cx="17" cy="14.5" r="2.5" stroke="currentColor" stroke-width="1.3"/><path d="M19 16.5l1.5 1.5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Dynamic Reporting</div>
                <div class="feat-tagline">Filter and generate custom reports on any parameter</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Filter and generate reports across any dimension. By learner, group, date range, course, completion status, or assessment score. Administrators focus on the specific data they need without navigating through fixed report templates that do not match their actual questions.</p></div></div>
            </div>

        </div>
        </section>

        <!-- ─── 7. AI ─── -->
        <section class="cat-section" id="ai">
        <div class="cat-title">AI &amp; Automation</div>
        <p class="cat-desc">AI that executes, not just assists. From content generation and survey creation to real-time learner guidance, the AI layer in MyPass reduces manual effort at every stage of the training workflow.</p>
        <div class="feat-list">

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M10 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8zM3.5 10a4 4 0 1 1 0 8 4 4 0 0 1 0-8zM16.5 10a4 4 0 1 1 0 8 4 4 0 0 1 0-8z" stroke="currentColor" stroke-width="1.4"/><path d="M10 10v2M7.8 12.5l-2.2.5M12.2 12.5l2.2.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">AI Content Generation</div>
                <div class="feat-tagline">Generate course drafts, summaries, and explanations in seconds</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Generate complete course drafts, module summaries, and topic explanations using AI prompts. Accelerates content creation significantly while retaining full flexibility for instructional designers to refine, restructure, and add organization-specific context before publishing.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><rect x="3" y="4" width="14" height="11" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="M6 9h8M6 12h5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/><path d="M16.5 7l1.5-1" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">AI-Assisted Evaluation</div>
                <div class="feat-tagline">Reduce manual grading effort without removing instructor oversight</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Leverage AI to assist with evaluating learner responses. Particularly open-ended essay answers. At scale. Instructors receive AI-suggested evaluations to review and confirm, rather than grading from scratch. This improves throughput while maintaining evaluation quality across large cohorts.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3 4h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1z" stroke="currentColor" stroke-width="1.5"/><path d="M6 8h8M6 11h5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/><path d="M3 16l3-2h10l3 2" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">AI Survey Generation</div>
                <div class="feat-tagline">Build feedback forms instantly using natural language prompts</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Create structured feedback forms by describing what you want to learn from learners in plain language. The AI generates relevant question sets that can be reviewed, adjusted, and deployed in minutes. Removing the blank-page problem that slows down feedback collection program by program.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3 17V7a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1z" stroke="currentColor" stroke-width="1.5"/><path d="M10 4V2M8.5 12a1.5 1.5 0 0 1 3 0v5h-3v-5z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">AI Learning Assistant</div>
                <div class="feat-tagline">Prompt-based AI that guides learners and administrators through the platform in real time</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">A prompt-based AI assistant available to both administrators and learners. Generate content, answer queries mid-course, navigate platform features, and complete multi-step tasks through natural language. Improves platform adoption, reduces support requests, and enhances the learning experience in real time.</p></div></div>
            </div>

        </div>
        </section>

        <!-- ─── 8. SECURITY ─── -->
        <section class="cat-section" id="security">
        <div class="cat-title">Security &amp; DRM</div>
        <p class="cat-desc">Enterprise-grade protection for proprietary training content. From device-level access controls and encrypted PDF distribution to key rotation and granular DRM policy management.</p>
        <div class="feat-list">

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><rect x="4.5" y="9" width="11" height="8.5" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="M7 9V7a3 3 0 0 1 6 0v2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><circle cx="10" cy="13.5" r="1.2" fill="currentColor"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Digital Rights Management</div>
                <div class="feat-tagline">Protect proprietary content from unauthorized access and distribution</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Control access to training materials with advanced DRM capabilities. Prevent unauthorized sharing, copying, and redistribution. Ensuring proprietary training content remains protected regardless of how or where learners access it.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3 4h14a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1z" stroke="currentColor" stroke-width="1.5"/><path d="M7 9h6M7 12h4M14 11.5l2 1-2 1v-2z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/><path d="M2 8l2 2.5-2 2.5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Protected PDF Distribution</div>
                <div class="feat-tagline">Share sensitive documents securely without enabling downloads</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Share PDFs in a protected environment where downloads and unauthorized distribution are restricted. Ideal for sensitive compliance documents, proprietary frameworks, and legal training materials where content protection is a regulatory or contractual requirement.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><rect x="3" y="3" width="6" height="8.5" rx="1.5" stroke="currentColor" stroke-width="1.4"/><rect x="11" y="3" width="6" height="8.5" rx="1.5" stroke="currentColor" stroke-width="1.4"/><rect x="5.5" y="14" width="9" height="3.5" rx="1.5" stroke="currentColor" stroke-width="1.4"/><path d="M6 11.5v2.5M14 11.5v2.5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Device-Level Access Control</div>
                <div class="feat-tagline">Restrict content access to authorized devices only</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Ensure content can only be accessed on explicitly authorized devices. This provides an additional protection layer beyond login credentials. Particularly important for regulated training content or proprietary certification materials that cannot be shared beyond specific endpoints.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M2.5 7.5h15M2.5 13h10M15 13l2-2-2-2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.5 4.5v11" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">DRM Policy Management</div>
                <div class="feat-tagline">Define and configure granular content access rules</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Configure granular policies governing how content is accessed, shared, and viewed across your platform. Set access windows, view limits, and sharing permissions per content item or category. Providing full control while maintaining the flexibility different programs require.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><rect x="3" y="5.5" width="14" height="11" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="M6.5 5.5V4.5a3.5 3.5 0 0 1 7 0v1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M8 11h4M10 9v4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Secure Document Reader</div>
                <div class="feat-tagline">Deliver content through a controlled viewing environment</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Deliver training materials through a secure reader that prevents copying, printing, or unauthorized extraction of content. Learners access materials within a controlled interface. Ensuring safe consumption without creating friction that disrupts the learning experience.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M10 3a7 7 0 1 1 0 14A7 7 0 0 1 10 3z" stroke="currentColor" stroke-width="1.5"/><path d="M7 10h6M10 7v6" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/><path d="M13.5 6.5l1.5-1.5M6.5 13.5l-1.5 1.5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Encryption &amp; Key Rotation</div>
                <div class="feat-tagline">Enterprise-grade content protection with ongoing key management</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Protect all training content with industry-standard encryption and periodic key rotation. Ensuring long-term security against unauthorized access even if credentials are compromised. Meets enterprise compliance standards and supports regulatory requirements for data protection in training environments.</p></div></div>
            </div>

        </div>
        </section>

        <!-- ─── 9. PLATFORM & SUPPORT ─── -->
        <section class="cat-section" id="support">
        <div class="cat-title">Platform &amp; Support</div>
        <p class="cat-desc">Self-service resources, guided onboarding, and a full support ticketing system. Administrators and learners resolve issues and stay productive without external dependency.</p>
        <div class="feat-list">

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.5"/><path d="M10 10.5v1M10 7.5a2 2 0 0 1 1 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Help Center</div>
                <div class="feat-tagline">Self-service support guides accessible directly within the platform</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Provide users with immediate access to guides, walkthroughs, and troubleshooting resources directly within the platform. Without leaving their workflow. Reduces support dependency and allows new administrators and learners to resolve most questions independently.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><rect x="3" y="4" width="14" height="10" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="M8 9.5l3.5 2-3.5 2V9.5z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Video Walkthroughs</div>
                <div class="feat-tagline">Step-by-step video guides for faster platform adoption</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Help administrators and learners understand the platform through structured video tutorials covering key workflows. Accelerates adoption, reduces the learning curve for new users, and decreases the volume of basic support queries during the initial onboarding phase.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3 5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5z" stroke="currentColor" stroke-width="1.5"/><path d="M7 9h6M7 12h4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Documentation Library</div>
                <div class="feat-tagline">Central knowledge base covering every platform feature and workflow</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Access comprehensive documentation covering all platform features, configuration options, and administrative workflows. Supports administrators setting up programs and learners navigating training. Reducing the support burden and enabling confident platform use from day one.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3 4h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H6l-4 3V5a1 1 0 0 1 1-1z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M7 9h6M7 12h3" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Support Ticketing System</div>
                <div class="feat-tagline">Raise and track support requests directly within the platform</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Users create and submit support tickets directly within the platform, eliminating the need to switch to separate email threads or external tools. Every issue is tracked from creation to resolution, ensuring nothing falls through the cracks and providing a clear audit trail of support interactions.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M2.5 5h15M2.5 10h11M2.5 15h7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><circle cx="17" cy="14" r="2.5" stroke="currentColor" stroke-width="1.3"/><path d="M16 14l.8.8L18 13" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Ticket Tracking &amp; History</div>
                <div class="feat-tagline">Full visibility into every support interaction and resolution</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Maintain a complete, searchable record of all support interactions including original issue, response timeline, and resolution. Administrators and users can reference previous tickets, follow ongoing cases, and verify resolution status. Improving communication and accountability throughout the support process.</p></div></div>
            </div>

        </div>
        </section>

        <!-- ─── 10. AMS ─── -->
        <section class="cat-section" id="ams">
        <div class="cat-title">Association &amp; Member Management</div>
        <p class="cat-desc">A built-in AMS layer designed for membership organizations. Manage the full member lifecycle: tiers, onboarding, access control, communication, and training integration. All from one platform.</p>
        <div class="feat-list">

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><circle cx="10" cy="7" r="3.5" stroke="currentColor" stroke-width="1.5"/><path d="M3 18c0-4 3.1-7 7-7s7 3 7 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M15 9.5l2 1.5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Member Management</div>
                <div class="feat-tagline">Manage the complete member lifecycle from a single interface</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Create, manage, and track member profiles including roles, membership status, and engagement history. Associations maintain accurate, structured member records across the full lifecycle. From initial registration through renewal, status changes, and eventual offboarding.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><rect x="3" y="4" width="6" height="12" rx="2" stroke="currentColor" stroke-width="1.5"/><rect x="11" y="4" width="6" height="7" rx="2" stroke="currentColor" stroke-width="1.4"/><path d="M11 14h6M14 11v6" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Membership Plans &amp; Tiers</div>
                <div class="feat-tagline">Define multiple membership structures with tiered access and benefits</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Set up multiple membership tiers with differentiated access levels, pricing structures, and learning benefits. This allows organizations to serve diverse member segments. Students, professionals, fellows, corporate members. Each with appropriate course access and certification pathways.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3 7a4 4 0 0 1 4-4h6a4 4 0 0 1 4 4v1H3V7z" stroke="currentColor" stroke-width="1.5"/><rect x="3" y="8" width="14" height="9" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="M7 12h6M10 10v4" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Member Onboarding</div>
                <div class="feat-tagline">Automated onboarding workflows for new members</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Enable smooth, automated onboarding workflows for new members. From registration and profile completion through initial course assignment and welcome communication. Reduces manual coordination and ensures every new member receives a consistent, professional first experience with the organization.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><rect x="5" y="9" width="10" height="8.5" rx="2" stroke="currentColor" stroke-width="1.5"/><path d="M7 9V7.5a3 3 0 0 1 6 0V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M8 13.5h4" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Member Access Control</div>
                <div class="feat-tagline">Restrict courses and content by membership tier</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Restrict course, content, and platform feature access based on membership level. This ensures content investments are protected, membership tiers deliver genuine differentiated value, and every member group accesses precisely what their membership entitles them to.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3 4h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H6l-4 3V5a1 1 0 0 1 1-1z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><path d="M7 8h6M7 11h4" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Member Communication</div>
                <div class="feat-tagline">Send targeted messages to members based on group, tier, or role</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Send targeted communications to specific member groups, tiers, or roles rather than broadcasting to your entire database. Training reminders, certification renewal notices, and event announcements reach the right members at the right time, improving engagement and reducing information noise.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M2.5 5h15M2.5 10h15M2.5 15h10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><circle cx="17" cy="15" r="2.5" stroke="currentColor" stroke-width="1.3"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Member Directory</div>
                <div class="feat-tagline">Searchable, centralized database of all members</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Maintain a searchable directory of all members with profile data, roles, and engagement status. Supports networking within the community, administrative management of large member bases, and internal collaboration. While maintaining appropriate privacy controls for sensitive member information.</p></div></div>
            </div>

            <div class="feat-row" onclick="toggleFeat(this)">
            <div class="feat-head">
                <div class="feat-icon"><svg width="17" height="17" fill="none" viewBox="0 0 20 20"><path d="M3 10c2.5-4.5 5-6.5 7-6.5s4.5 2 7 6.5c-2.5 4.5-5 6.5-7 6.5s-4.5-2-7-6.5z" stroke="currentColor" stroke-width="1.5"/><circle cx="10" cy="10" r="2.5" stroke="currentColor" stroke-width="1.4"/></svg></div>
                <div class="feat-info">
                <div class="feat-name">Training and Membership Integration</div>
                <div class="feat-tagline">Link learning programs and certifications directly to membership benefits</div>
                </div>
                <div class="feat-chevron"><svg width="12" height="12" fill="none" viewBox="0 0 14 14"><path d="M3 5l4 4 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            </div>
            <div class="feat-body"><div class="feat-body-inner"><p class="feat-desc">Connect training programs, certifications, and learning paths directly to membership benefits and tier progression. Members see tangible learning value tied to their membership. Increasing renewal rates, driving content engagement, and positioning training as a core membership benefit rather than a separate system.</p></div></div>
            </div>

        </div>
        </section>



    </main>

    </div>

                <!-- CTA -->
        <div class="cta-band">
        <div class="cta-in">
            <div class="cta-chip">See it live in 15 minutes</div>
            <h2 class="cta-h">Every feature, shown for your use case.</h2>
            <p class="cta-p">Book a focused demo and we will walk through the features most relevant to your organization: compliance, certification, AI authoring, or association management.</p>
            <div class="cta-btns">
            <a href="https://calendly.com/onlinesales-kprise/30min" class="btn btn-w btn-l">Book a Demo</a>
            <a href="https://mypasslms.us/login#register" class="btn btn-wo btn-l">Start for Free</a>
            </div>
        </div>
        </div>



    <script>
    // Toggle feature expand
    function toggleFeat(row) {
    const isOpen = row.classList.contains('open');
    row.classList.toggle('open', !isOpen);
    }

    // Sidebar active state on scroll
    const sections = document.querySelectorAll('.cat-section');
    const links = document.querySelectorAll('.sb-link');

    const io = new IntersectionObserver(entries => {
    entries.forEach(e => {
        if (e.isIntersecting) {
        const id = e.target.id;
        links.forEach(l => l.classList.toggle('active', l.getAttribute('href') === '#' + id));
        }
    });
    }, { rootMargin: '-62px 0px -55% 0px', threshold: 0 });

    sections.forEach(s => io.observe(s));

    // Manual click sets active
    function setActive(el) {
    links.forEach(l => l.classList.remove('active'));
    el.classList.add('active');
    }

    // Smooth scroll with offset
    document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
        const h = a.getAttribute('href');
        if (h === '#') return;
        e.preventDefault();
        const t = document.querySelector(h);
        if (t) window.scrollTo({ top: t.getBoundingClientRect().top + window.pageYOffset - 80, behavior: 'smooth' });
    });
    });
    </script>
@endsection

@push('schema')
@verbatim

@endverbatim
@endpush

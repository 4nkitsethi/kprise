{{--
    Page: Homepage
    Route: home
    Controller: HomeController@index
--}}

@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css?v=1.0') }}">
@endpush

@section('content')

{{-- ============================================================
     HERO SLIDER
============================================================ --}}
<section class="hero" aria-label="Hero section">
  <div class="slides-container" id="slidesContainer">

    <!-- Slide 1 -->
    <div class="slide" role="group" aria-label="Slide 1 of 3">
      <div class="slide-grid" aria-hidden="true"></div>
      <div class="slide-content">
        <div class="slide-copy fade-up">
          <div class="slide-badge"><span></span> Nonprofits &amp; Associations</div>
          <h1 class="slide-heading">Training That Works<br>With Your AMS.<br><em>Or Replaces It.</em></h1>
          <p class="slide-sub mobile-my-3">Run certifications, manage members, and deliver training — all in one connected platform. No system overhaul required.</p>
          <div class="slide-bullets hide-on-mobile">
            <div class="sb">
              <div class="sb-check sb-check-dark"><svg width="11" height="11" fill="none" viewBox="0 0 12 12"><path d="M2 6l3 3 5-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              Integrates directly with your existing AMS
            </div>
            <div class="sb">
              <div class="sb-check sb-check-dark"><svg width="11" height="11" fill="none" viewBox="0 0 12 12"><path d="M2 6l3 3 5-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              Or use MyPass as your built-in AMS — no extra system needed
            </div>
            <div class="sb">
              <div class="sb-check sb-check-dark"><svg width="11" height="11" fill="none" viewBox="0 0 12 12"><path d="M2 6l3 3 5-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              Manage members, volunteers, and learning in one place
            </div>
          </div>
          <div class="slide-actions">
            <a href="#" class="btn btn-white btn-lg hide-on-mobile">Start Free Trial</a>
            <a href="#video" class="btn btn-ghost btn-lg">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>
              Watch Demo
            </a>
          </div>
          <div class="slide-stats mobile-my-3">
            <div><div class="slide-stat-val">70%</div><div class="slide-stat-label">Less Admin Work</div></div>
            <div><div class="slide-stat-val">90 Days</div><div class="slide-stat-label">Free Trial</div></div>
          </div>
        </div>
        <div class="slide-right">
          <div class="slide-card sc-dark">
            <div class="sc-head">
              <span class="sc-title">AMS Integration Flow</span>
              <span class="sc-badge sc-badge-ok">Live Sync</span>
            </div>
            <div class="ams-flow">
              <div class="ams-row">
                <div class="ams-ico ams-ico-brand"><svg width="16" height="16" fill="none" viewBox="0 0 18 18"><rect x="2" y="5" width="14" height="10" rx="2" stroke="currentColor" stroke-width="1.4"/><path d="M5 5V4a4 4 0 0 1 8 0v1" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div>
                  <div class="ams-label">Your Existing AMS</div>
                  <div class="ams-sub">Impexium, GrowthZone, MemberClicks, or any API</div>
                </div>
              </div>
              <div class="ams-arrow">↕</div>
              <div class="ams-row">
                <div class="ams-ico ams-ico-brand"><svg width="16" height="16" fill="none" viewBox="0 0 18 18"><circle cx="9" cy="9" r="7" stroke="currentColor" stroke-width="1.4"/><path d="M9 6v3l2 1.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                <div>
                  <div class="ams-label">MyPass LMS</div>
                  <div class="ams-sub">Members, courses, certifications — synced automatically</div>
                </div>
              </div>
              <div class="ams-arrow">↕</div>
              <div class="ams-row">
                <div class="ams-ico ams-ico-ok"><svg width="16" height="16" fill="none" viewBox="0 0 18 18"><path d="M3 9l3.5 3.5L15 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                <div>
                  <div class="ams-label">Compliance Reports</div>
                  <div class="ams-sub">Auto-generated, audit-ready, instant download</div>
                </div>
              </div>
            </div>
          </div>
        </div>
   
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="slide" role="group" aria-label="Slide 2 of 3">
      <div class="slide-grid" aria-hidden="true"></div>
      <div class="slide-content">
        <div class="slide-copy fade-up">
          <div class="slide-badge" style="background:rgba(16,185,129,.15);border-color:rgba(16,185,129,.25);color:#6EE7B7;">
            <span style="background:#10B981;"></span> Ready-to-Deploy LMS
          </div>
          <h1 class="slide-heading">Launch an LMS With<br>Courses Ready to Go<br><em>From Day One.</em></h1>
          <p class="slide-sub mobile-my-3 ">No setup battles. No content creation delays. Start with a fully structured LMS and a library of pre-built courses — assign and go.</p>
          <div class="slide-bullets hide-on-mobile">
            <div class="sb">
              <div class="sb-check sb-check-light"><svg width="11" height="11" fill="none" viewBox="0 0 12 12"><path d="M2 6l3 3 5-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              Ready course library — compliance, ethics, leadership, and more
            </div>
            <div class="sb">
              <div class="sb-check sb-check-light"><svg width="11" height="11" fill="none" viewBox="0 0 12 12"><path d="M2 6l3 3 5-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              Start from day one — assign courses without creating anything
            </div>
            <div class="sb">
              <div class="sb-check sb-check-light"><svg width="11" height="11" fill="none" viewBox="0 0 12 12"><path d="M2 6l3 3 5-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              Live in minutes — from signup to active learners, instantly
            </div>
          </div>
          <div class="slide-actions">
            <a href="#" class="btn btn-white btn-lg hide-on-mobile">Explore Features</a>
            <a href="#" class="btn btn-ghost btn-lg ">See Pricing</a>
          </div>
          <div class="slide-stats mobile-my-3">
            <div><div class="slide-stat-val">5,000</div><div class="slide-stat-label">Free Credits</div></div>
            <div><div class="slide-stat-val">4×</div><div class="slide-stat-label">Faster Launch</div></div>
            <div><div class="slide-stat-val">99.9%</div><div class="slide-stat-label">Uptime SLA</div></div>
          </div>
        </div>
             <div class="slide-right">
          <div class="slide-card sc-light">
            <div class="sc-head">
              <span class="sc-title">Course Library Preview</span>
              <span class="sc-badge sc-badge-brand">Ready Now</span>
            </div>
            <div class="course-list">
              <div class="cl-item">
                <div class="cl-ico"><svg width="14" height="14" fill="none" viewBox="0 0 16 16"><path d="M8 1.5L2 4.5v4c0 2.5 2.5 5 6 5.5 3.5-.5 6-3 6-5.5v-4L8 1.5z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/></svg></div>
                <div class="cl-name">Corporate Compliance Pack</div>
                <span class="cl-tag">8 modules</span>
              </div>
              <div class="cl-item">
                <div class="cl-ico"><svg width="14" height="14" fill="none" viewBox="0 0 16 16"><circle cx="8" cy="6" r="3" stroke="currentColor" stroke-width="1.4"/><path d="M2 14c0-3 2.7-5 6-5s6 2 6 5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="cl-name">First-Time Manager Certification</div>
                <span class="cl-tag">7 modules</span>
              </div>
              <div class="cl-item">
                <div class="cl-ico"><svg width="14" height="14" fill="none" viewBox="0 0 16 16"><rect x="2" y="3" width="12" height="10" rx="2" stroke="currentColor" stroke-width="1.4"/><path d="M5 8h6M5 11h4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="cl-name">AI Workforce Readiness</div>
                <span class="cl-tag cl-tag-brand">New</span>
              </div>
              <div class="cl-item">
                <div class="cl-ico"><svg width="14" height="14" fill="none" viewBox="0 0 16 16"><path d="M3 4.5h10M3 8h8M3 11.5h5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg></div>
                <div class="cl-name">Workplace Skills &amp; Communication</div>
                <span class="cl-tag">5 modules</span>
              </div>
            </div>
            <div class="sc-stats">
              <div class="sc-stat"><div class="sc-stat-n">37+</div><div class="sc-stat-l">Modules ready</div></div>
              <div class="sc-stat"><div class="sc-stat-n">5</div><div class="sc-stat-l">Course packs</div></div>
              <div class="sc-stat"><div class="sc-stat-n">1 day</div><div class="sc-stat-l">To go live</div></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="slide" role="group" aria-label="Slide 3 of 3">
      <div class="slide-grid" aria-hidden="true"></div>
      <div class="slide-content">
        <div class="slide-copy fade-up">
          <div class="slide-badge" style="background:rgba(139,92,246,.2);border-color:rgba(139,92,246,.3);color:#C4B5FD;">
            <span style="background:#8B5CF6;"></span> Still Running Training Manually?
          </div>
          <h1 class="slide-heading">Emails. Spreadsheets.<br>PDFs. That Is Not<br><em>a Training System.</em></h1>
          <!-- Roll unused credits forward — zero wastage. -->
          <p class="slide-sub mobile-my-3">If you cannot see who completed what, cannot send reminders automatically, and cannot prove compliance instantly — you are managing risk, not training.</p>  
          <div class="slide-bullets hide-on-mobile">
            <div class="sb">
              <div class="sb-check sb-check-light"><svg width="11" height="11" fill="none" viewBox="0 0 12 12"><path d="M2 6l3 3 5-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              No visibility into who has completed training
            </div>
            <div class="sb">
              <div class="sb-check sb-check-light"><svg width="11" height="11" fill="none" viewBox="0 0 12 12"><path d="M2 6l3 3 5-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              No consistency across teams or locations
            </div>
            <div class="sb">
              <div class="sb-check sb-check-light"><svg width="11" height="11" fill="none" viewBox="0 0 12 12"><path d="M2 6l3 3 5-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              No control when compliance deadlines arrive
            </div>
          </div>        
          <div class="slide-actions">
            <a href="#" class="btn btn-white btn-lg hide-on-mobile">Get 5K Free Credits</a>
            <a href="#comparison" class="btn btn-ghost btn-lg  ">Compare Plans</a>
          </div>
          <div class="slide-stats mobile-my-3">
            <div><div class="slide-stat-val">No</div><div class="slide-stat-label">Per-User Fees</div></div>
            <div><div class="slide-stat-val">35%</div><div class="slide-stat-label">Better Completion</div></div>
            <div><div class="slide-stat-val">2×</div><div class="slide-stat-label">Faster Decisions</div></div>
          </div>
        </div>
        <div class="slide-right">
          <div class="slide-card sc-light">
            <div class="sc-head">
              <span class="sc-title">Before vs After MyPass</span>
              <span class="sc-badge sc-badge-ok">Live in minutes</span>
            </div>
            <div class="pv-list">
              <div class="pv-row pv-bad"><span class="pv-ico">✕</span><span class="pv-txt">Chasing completions by email every week</span></div>
              <div class="pv-row pv-bad"><span class="pv-ico">✕</span><span class="pv-txt">Compliance reports built in Excel manually</span></div>
              <div class="pv-row pv-bad"><span class="pv-ico">✕</span><span class="pv-txt">No idea who is behind until it is too late</span></div>
            </div>
            <div class="pv-divider">— Switch to MyPass —</div>
            <div class="pv-list">
              <div class="pv-row pv-good"><span class="pv-ico">✓</span><span class="pv-txt">Automated reminders — zero manual follow-up</span></div>
              <div class="pv-row pv-good"><span class="pv-ico">✓</span><span class="pv-txt">Instant compliance reports — one click, done</span></div>
              <div class="pv-row pv-good"><span class="pv-ico">✓</span><span class="pv-txt">Real-time dashboards for every learner and team</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <button class="slider-arrow slider-arrow-prev" id="slidePrev" aria-label="Previous slide">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="15 18 9 12 15 6"/></svg>
  </button>
  <button class="slider-arrow slider-arrow-next" id="slideNext" aria-label="Next slide">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="9 18 15 12 9 6"/></svg>
  </button>
  <div class="slider-dots" id="sliderDots" role="tablist" aria-label="Slide navigation"></div>

  <div class="hero-scroll" aria-hidden="true">
    <div class="scroll-line"></div>
    Scroll
  </div>
</section>

{{-- ============================================================
     VIDEO SHOWCASE
============================================================ --}}

<div class="video-showcase-outer" id="video" aria-label="Product walkthrough video">

    {{-- Background decorations --}}
    <div class="vso-dots" aria-hidden="true"></div>
    <div class="vso-bottom-fade" aria-hidden="true"></div>

    {{-- Content (your existing container + hero-showcase stays unchanged) --}}
    <div class="vso-content">
        <div class="container">
            <div class="hero-showcase">
                <div class="hero-video-wrap">
                    <div class="hero-video-inner">
                        <span class="hero-video-badge">
                            <span class="live-dot"></span>
                            Live product walkthrough · 2 min
                        </span>
                        <video
                            src="https://kprise.com/wp-content/uploads/2025/10/WhatsApp-Video-2025-10-06-at-12.39.50_fe04276f.mp4"
                            autoplay
                            muted
                            loop
                            playsinline
                            aria-label="MyPass LMS platform walkthrough showing course creation, enrollment automation, and compliance reporting"
                        ></video>
                    </div>
                </div>
                <div class="hero-stats-bar">
                </div>
            </div>
        </div>
    </div>{{-- /.vso-content --}}

</div>{{-- /.video-showcase-outer --}}

{{-- ============================================================
     PLATFORM SECTION
============================================================ --}}
<section class="platform-sec" id="platform">
  <div class="sec-wrap">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center;">
      <div>
        <div class="sec-eyebrow"><span class="sec-ew-line"></span>The Platform</div>
        <h2 class="sec-title">One Platform for the<br><span>Entire Training Lifecycle</span></h2>
        <p class="sec-sub">Create, deliver, and track training — without switching tools or managing workflows manually. Everything your team needs, in one place.</p>
        <div class="sec-btns">
          <a href="https://kp.kprise.com/features" class="btn btn-pri btn-m">Explore Platform</a>
          <a href="https://calendly.com/onlinesales-kprise/30min" class="btn btn-ghost btn-m">Book a Demo</a>
        </div>
      </div>
      <div class="hide-on-mobile">
        <div class="platform-dash">
          <div class="dash-title">Platform at a glance</div>
          <div class="dash-grid">
            <div class="dash-item"><div class="dash-n">70%</div><div class="dash-l">Less admin work</div></div>
            <div class="dash-item"><div class="dash-n">4x</div><div class="dash-l">Faster course creation</div></div>
            <div class="dash-item"><div class="dash-n">35%</div><div class="dash-l">Higher completion rates</div></div>
            <div class="dash-item"><div class="dash-n">1 day</div><div class="dash-l">Average time to live</div></div>
          </div>
        </div>
      </div>
    </div>

    <div class="platform-grid">
      <div class="cap-card">
        <div class="cap-ico">
          <svg width="20" height="20" fill="none" viewBox="0 0 22 22"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.5"></circle><path d="M11 7v4l2.5 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path><path d="M7 5A7 7 0 0 1 18 10" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"></path></svg>
        </div>
        <div class="cap-title">AI Course Builder</div>
        <div class="cap-desc">Upload a file or type a topic. MyPass generates a complete, structured course in minutes — including quizzes, summaries, and SCORM packaging. No instructional designer needed.</div>
      </div>
      <div class="cap-card">
        <div class="cap-ico">
          <svg width="20" height="20" fill="none" viewBox="0 0 22 22"><path d="M4 8a3 3 0 1 1 6 0 3 3 0 0 1-6 0zM2 18c0-3 2.7-5 5-5M13 11l2 2 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
        </div>
        <div class="cap-title">Smart Auto-Enrollment</div>
        <div class="cap-desc">Set rules once based on role, department, or group. Users are enrolled in the right courses automatically — no spreadsheets, no manual lists, no ongoing admin effort.</div>
      </div>
      <div class="cap-card">
        <div class="cap-ico">
          <svg width="20" height="20" fill="none" viewBox="0 0 22 22"><path d="M3 17l4-6 4 3 4-5 4 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 5h16" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"></path></svg>
        </div>
        <div class="cap-title">Instant Compliance Reports</div>
        <div class="cap-desc">Ask a plain-language question and get the answer immediately. "Who has not completed HIPAA training?" returns a sorted, exportable report in seconds — no filters, no exports, no waiting.</div>
      </div>
      <div class="cap-card">
        <div class="cap-ico">
          <svg width="20" height="20" fill="none" viewBox="0 0 22 22"><rect x="3" y="8" width="10" height="11" rx="2" stroke="currentColor" stroke-width="1.5"></rect><path d="M6 8V6a5 5 0 0 1 10 0v6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path><circle cx="17" cy="16" r="3" stroke="currentColor" stroke-width="1.4"></circle></svg>
        </div>
        <div class="cap-title">Enterprise SSO and API</div>
        <div class="cap-desc">One-click sign-in via Okta, Azure AD, or any SAML 2.0 provider. Deep API access for custom integrations with your HRIS, AMS, or existing systems.</div>
      </div>
    </div>
  </div>
</section>

{{-- ============================================================
     TRUST STRIP
============================================================ --}}
<section class="proof-sec">
  <div class="proof-inner">
    <div class="proof-label">Trusted by teams that need training to work</div>
    <div class="logos-track">
      <div class="logos-inner" id="logosInner">
        <img class="logo-img" src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-67.png?fit=199%2C100&amp;ssl=1" alt="American Board">
        <img class="logo-img" src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-69.png?fit=197%2C100&amp;ssl=1" alt="Youth for Understanding">
        <img class="logo-img" src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-65.png?fit=197%2C100&amp;ssl=1" alt="Phi Delta Kappan">
        <img class="logo-img" src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-66.png?fit=198%2C100&amp;ssl=1" alt="SBCA">
        <img class="logo-img" src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-68.png?fit=198%2C99&amp;ssl=1" alt="PDK International">
        <img class="logo-img" src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-72.png?fit=198%2C100&ssl=1" alt="ICF">

        <!-- Duplicate for seamless loop -->
        <img class="logo-img" src="https://educatorsrising.org/wp-content/uploads/2025/07/25_slogan.png" alt="Educators Rising">
        <img class="logo-img" src="https://wsp.kprise.com/images/logo/wsp_trans.png" alt="THF">
        <img class="logo-img" src="https://sp-ao.shortpixel.ai/client/to_auto,q_glossy,ret_img,w_237,h_100/https://www.leihia.com/wp-content/uploads/2023/10/cropped-cropped-logo-leihia.png" alt="Phi Delta Kappan">
        <img class="logo-img" src="https://developmentlogics.com/wp-content/uploads/2024/03/DL-Logo-1-1.png" alt="SBCA">
        <img class="logo-img" src="{{ asset('assets/images/logos/IFPO-MENASA.webp') }}" alt="IFPO-MENASA">
        <img class="logo-img" src="https://wsp.kprise.com/images/logo/wsp_trans.png" alt="PDK International">
      </div>
    </div>
    <div class="award-row">
      <img class="award-img" src="https://kprise.com/wp-content/uploads/2025/12/1.webp" alt="Capterra 2024">
      <img class="award-img" src="https://kprise.com/wp-content/uploads/2025/12/2.webp" alt="GetApp Leader 2024">
      <img class="award-img" src="https://kprise.com/wp-content/uploads/2025/12/3.webp" alt="Software Advice FrontRunner 2024">
      <img class="award-img" src="https://brand-assets.capterra.com/badge/65ccdf80-7500-42bf-8e6f-aaa875f7613c.svg" alt="Capterra Verified">
      <img class="award-img" src="https://brand-assets.getapp.com/badge/f7329061-8cc8-4015-8dbd-9c68980f086d.png" alt="GetApp Verified">
      <img class="award-img" src="https://brand-assets.softwareadvice.com/badge/6aeb2175-cd8d-4d46-b212-ddd1b623365b.png" alt="Software Advice Verified">
    </div>
  </div>
</section>

{{-- ============================================================
     COMPARISON TABLE
============================================================ --}}
<section class="purpose-sec">
  <div class="sec-wrap">
    <div class="purpose-grid">
      <div>
        <div class="sec-eyebrow"><span class="sec-ew-line"></span>Purpose-Built</div>
        <h2 class="sec-title">Built for How Training<br><span>Actually Works</span></h2>
        <p class="sec-sub">Not a generic content platform repurposed as an LMS. MyPass is designed around real training workflows — the ones that run daily in operations, compliance, and L&amp;D teams.</p>
        <div class="purpose-items">
          <div class="pi">
            <div class="pi-n">01</div>
            <div>
              <div class="pi-title">Eliminate Admin Overload</div>
              <div class="pi-desc">Automate repetitive tasks — enrollment, reminders, reporting — and give your team back the hours they spend managing instead of delivering.</div>
            </div>
          </div>
          <div class="pi">
            <div class="pi-n">02</div>
            <div>
              <div class="pi-title">Launch Courses Fast</div>
              <div class="pi-desc">Go from idea to live course in minutes. AI generates content, quizzes, and SCORM packaging automatically from any file or topic.</div>
            </div>
          </div>
          <div class="pi">
            <div class="pi-n">03</div>
            <div>
              <div class="pi-title">Never Miss Compliance</div>
              <div class="pi-desc">Automated deadline tracking, escalating reminders, and audit-ready reports. Stay compliant without the manual effort every certification cycle requires.</div>
            </div>
          </div>
          <div class="pi">
            <div class="pi-n">04</div>
            <div>
              <div class="pi-title">Scale Without Seat Fees</div>
              <div class="pi-desc">Unlimited users on every plan. Add seasonal workers, new cohorts, or partner organizations — your plan does not inflate just because your team grows.</div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="sec-eyebrow"><span class="sec-ew-line"></span>Why Teams Prefer MyPass</div>
        <h3 style="font-size:22px;font-weight:700;color:var(--ink);margin-bottom:8px;margin-top:12px;letter-spacing:-.3px;">See how MyPass simplifies training compared to traditional LMS platforms.</h3>
        <p style="font-size:14.5px;color:var(--ink3);margin-bottom:20px;line-height:1.65;">Quick comparison — every row is a problem teams face every week.</p>
        <div class="compare-table">
          <div class="ct-head">
            <div class="ct-h">Area</div>
            <div class="ct-h">Traditional LMS</div>
            <div class="ct-h good">MyPass LMS</div>
          </div>
          <div class="ct-row">
            <div class="ct-f">Training delivery</div>
            <div class="ct-old">Manual processes, time-consuming</div>
            <div class="ct-new">Automated workflows, done in minutes</div>
          </div>
          <div class="ct-row">
            <div class="ct-f">Toolset</div>
            <div class="ct-old">Multiple disconnected tools</div>
            <div class="ct-new">All-in-one — LMS, ILT, assessments, SSO</div>
          </div>
          <div class="ct-row">
            <div class="ct-f">Content creation</div>
            <div class="ct-old">Upload-only, needs external authoring</div>
            <div class="ct-new">Convert any file into a course instantly</div>
          </div>
          <div class="ct-row">
            <div class="ct-f">Reminders</div>
            <div class="ct-old">Manual follow-ups every deadline</div>
            <div class="ct-new">Automated reminders, no manual effort</div>
          </div>
          <div class="ct-row">
            <div class="ct-f">Reporting</div>
            <div class="ct-old">Limited visibility, exports needed</div>
            <div class="ct-new">Real-time reporting, instant answers</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ============================================================
     COURSES GRID
============================================================ --}}
<section class="courses-sec" id="courses">
  <div class="sec-wrap">
    <div class="sec-eyebrow"><span class="sec-ew-line"></span>Ready Courses</div>
    <h2 class="sec-title">Professionally Built Courses<br><span>Ready for Immediate Use</span></h2>
    <p class="sec-sub" style="margin-bottom:0;">Structured for real workplace training. Every course is designed with instructional clarity and deployed the moment you assign it — no setup required.</p>
    <div class="course-cards">
      <div class="cc">
        <div class="cc-img">
          <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=600&amp;auto=format&amp;fit=crop&amp;q=80" alt="Compliance Training">
          <div class="cc-img-ov"></div>
          <span class="cc-cat">Compliance</span>
        </div>
        <div class="cc-body">
          <div class="cc-title">Corporate Compliance Master Pack</div>
          <div class="cc-desc">Harassment prevention, data privacy, HIPAA, anti-bribery, workplace safety, and code of conduct — 8 modules, fully SCORM-ready.</div>
          <div class="cc-foot">
            <span class="cc-tag">8 Modules</span>
            <a href="#" class="btn btn-pri btn-s">Preview</a>
          </div>
        </div>
      </div>
      <div class="cc">
        <div class="cc-img">
          <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&amp;auto=format&amp;fit=crop&amp;q=80" alt="Leadership Training">
          <div class="cc-img-ov"></div>
          <span class="cc-cat">Leadership</span>
        </div>
        <div class="cc-body">
          <div class="cc-title">First-Time Manager Certification</div>
          <div class="cc-desc">Delegation, feedback, coaching, difficult conversations, and leading remote teams. A full certification path for newly promoted managers.</div>
          <div class="cc-foot">
            <span class="cc-tag">7 Modules</span>
            <a href="#" class="btn btn-pri btn-s">Preview</a>
          </div>
        </div>
      </div>
      <div class="cc">
        <div class="cc-img">
          <img src="https://images.unsplash.com/photo-1677442135703-1787eea5ce01?w=600&amp;auto=format&amp;fit=crop&amp;q=80" alt="AI Training">
          <div class="cc-img-ov"></div>
          <span class="cc-cat">AI Readiness</span>
        </div>
        <div class="cc-body">
          <div class="cc-title">AI Workforce Readiness Pack</div>
          <div class="cc-desc">AI literacy, prompt engineering, responsible use, and data security. Practical AI training for teams that use it daily — not just the tech department.</div>
          <div class="cc-foot">
            <span class="cc-tag">4 Modules</span>
            <a href="#" class="btn btn-pri btn-s">Preview</a>
          </div>
        </div>
      </div>
    </div>
    <div class="courses-cta">
      <a href="#" class="btn btn-ghost btn-m">Explore Full Course Library</a>
    </div>
  </div>
</section>

{{-- ============================================================
     CTA SECTION
============================================================ --}}
<section class="cta-section">
  <div class="container">
    <div class="cta-box">
      <h2>See how MyPass replaces busywork<br>with a training program that runs itself</h2>
      <p>Get a live walkthrough tailored to your organization. We'll show you how MyPass handles your specific use case — whether it's member training, compliance, onboarding, or all three.</p>
      <div class="cta-actions">
        <a class="btn btn-primary" href="https://calendly.com/onlinesales-kprise/30min">Book a 30-Minute Demo</a>
        <a class="btn-outline-light" href="https://mypasslms.us/login#register">Start Free Trial</a>
      </div>
      <div class="cta-sub">90 days full access · 5,000 free credits · No credit card required</div>
    </div>
  </div>
</section>

{{-- ============================================================
     JAVASCRIPT
============================================================ --}}
<script>
(function () {
  const container  = document.getElementById('slidesContainer');
  const slides     = container.querySelectorAll('.slide');
  const dotsWrap   = document.getElementById('sliderDots');
  const total      = slides.length;
  let current      = 0;
  let timer        = null;

  slides.forEach(function (_, i) {
    var dot = document.createElement('button');
    dot.className  = 'slider-dot' + (i === 0 ? ' active' : '');
    dot.setAttribute('role', 'tab');
    dot.setAttribute('aria-label', 'Go to slide ' + (i + 1));
    dot.addEventListener('click', function () { goTo(i); reset(); });
    dotsWrap.appendChild(dot);
  });

  function goTo(n) {
    current = (n + total) % total;
    container.style.transform = 'translateX(-' + (current * 100) + '%)';
    dotsWrap.querySelectorAll('.slider-dot').forEach(function (d, i) {
      d.classList.toggle('active', i === current);
      d.setAttribute('aria-selected', i === current);
    });
  }

  function next() { goTo(current + 1); }
  function prev() { goTo(current - 1); }
  function reset() { clearInterval(timer); timer = setInterval(next, 5000); }

  document.getElementById('slideNext').addEventListener('click', function () { next(); reset(); });
  document.getElementById('slidePrev').addEventListener('click', function () { prev(); reset(); });

  reset();
}());
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

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
          <div class="slide-badge"><span></span> New · Agentic AI Powered</div>
          <h1 class="slide-heading">Train Smarter.<br><em>Scale Faster.</em><br>Zero Admin Grind.</h1>
          <p class="slide-sub mobile-my-3">The AI-powered LMS that builds courses, assigns learners, and sends reminders — all from a single conversation.</p>
          <div class="slide-actions">
            <a href="#" class="btn btn-white btn-lg">Start Free Trial</a>
            <a href="#video" class="btn btn-ghost btn-lg hide-on-mobile">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>
              Watch Demo
            </a>
          </div>
          <div class="slide-stats mobile-my-3">
            <div><div class="slide-stat-val">70%</div><div class="slide-stat-label">Less Admin Work</div></div>
            <div><div class="slide-stat-val">90 Days</div><div class="slide-stat-label">Free Trial</div></div>
          </div>
        </div>
        <div class="slide-visual fade-up delay-3" aria-hidden="true">
          <div style="position:relative;">
            <div class="slide-card">
              <div class="slide-card-header">
                <div class="slide-card-avatar" style="background:linear-gradient(135deg,#6366F1,#06B6D4);">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"><path d="M20 7H4a2 2 0 00-2 2v6a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>
                </div>
                <div>
                  <div class="slide-card-name">My Learning Dashboard</div>
                  <div class="slide-card-role">Q4 Training Plan — Active</div>
                </div>
              </div>
              <div class="slide-card-progress">
                <div class="progress-row">
                  <span class="progress-label">Overall Progress</span>
                  <span class="progress-val">68%</span>
                </div>
                <div class="progress-bar">
                  <div class="progress-fill" style="width:68%;background:linear-gradient(90deg,#6366F1,#06B6D4);"></div>
                </div>
              </div>
              <div class="slide-card-modules">
                <div class="module-chip"><span class="module-dot" style="background:#10B981;"></span>Onboarding</div>
                <div class="module-chip"><span class="module-dot" style="background:#F59E0B;"></span>Compliance</div>
                <div class="module-chip"><span class="module-dot" style="background:#6366F1;"></span>AI Skills</div>
                <div class="module-chip"><span class="module-dot" style="background:#EC4899;"></span>Leadership</div>
              </div>
            </div>
            <div class="visual-float-badge vfb-1">
              <svg viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
              <span>Auto-assigned to 240 users</span>
            </div>
            <div class="visual-float-badge vfb-2">
              <svg viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              <span>Saves 8 hrs/week</span>
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
            <span style="background:#10B981;"></span> Built for Enterprise Teams
          </div>
          <h1 class="slide-heading">One Platform.<br><em style="background:linear-gradient(135deg,#34D399,#3B82F6);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Endless</em> Possibilities.</h1>
          <p class="slide-sub mobile-my-3 ">Design, deliver, and measure every training program — onboarding to compliance — from a single AI-powered command center.</p>
          <div class="slide-actions">
            <a href="#" class="btn btn-white btn-lg">Explore Features</a>
            <a href="#" class="btn btn-ghost btn-lg hide-on-mobile">See Pricing</a>
          </div>
          <div class="slide-stats mobile-my-3">
            <div><div class="slide-stat-val">5,000</div><div class="slide-stat-label">Free Credits</div></div>
            <div><div class="slide-stat-val">4×</div><div class="slide-stat-label">Faster Launch</div></div>
            <div><div class="slide-stat-val">99.9%</div><div class="slide-stat-label">Uptime SLA</div></div>
          </div>
        </div>
        <div class="slide-visual fade-up delay-3" aria-hidden="true">
          <div style="position:relative;">
            <div class="slide-card">
              <div style="margin-bottom:16px;">
                <div style="font-size:13px;font-weight:700;color:rgba(255,255,255,.6);text-transform:uppercase;letter-spacing:.06em;margin-bottom:12px;">Course Builder AI</div>
                <div style="background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:10px;padding:12px;font-size:13px;color:rgba(255,255,255,.8);line-height:1.5;">"Create a 5-module cybersecurity course for new hires with quizzes and a final assessment"</div>
              </div>
              <div style="display:flex;flex-direction:column;gap:8px;">
                <div style="background:rgba(16,185,129,.15);border:1px solid rgba(16,185,129,.2);border-radius:8px;padding:10px 12px;display:flex;align-items:center;gap:8px;font-size:13px;color:#6EE7B7;">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
                  5 modules generated
                </div>
                <div style="background:rgba(99,102,241,.15);border:1px solid rgba(99,102,241,.2);border-radius:8px;padding:10px 12px;display:flex;align-items:center;gap:8px;font-size:13px;color:#A5B4FC;">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#6366F1" stroke-width="2" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
                  SCORM package ready
                </div>
                <div style="background:rgba(245,158,11,.15);border:1px solid rgba(245,158,11,.2);border-radius:8px;padding:10px 12px;display:flex;align-items:center;gap:8px;font-size:13px;color:#FCD34D;">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                  Built in 3 minutes
                </div>
              </div>
            </div>
            <div class="visual-float-badge vfb-1" style="right:-12px;">
              <svg viewBox="0 0 24 24" fill="none" stroke="#6366F1" stroke-width="2" width="16" height="16"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
              <span>4.9 avg rating</span>
            </div>
            <div class="visual-float-badge vfb-2">
              <svg viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2" width="16" height="16"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
              <span>340 enrolled today</span>
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
            <span style="background:#8B5CF6;"></span> Credit-Based Pricing
          </div>
          <h1 class="slide-heading">Pay For<br><em style="background:linear-gradient(135deg,#A78BFA,#F59E0B);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Learning Done.</em> Not Seats Idle.</h1>
          <!-- Roll unused credits forward — zero wastage. -->
          <p class="slide-sub mobile-my-3">No per-user fees. Credits are consumed only when a learner completes something.</p>          
          <div class="slide-actions">
            <a href="#" class="btn btn-white btn-lg">Get 5K Free Credits</a>
            <a href="#comparison" class="btn btn-ghost btn-lg hide-on-mobile ">Compare Plans</a>
          </div>
          <div class="slide-stats mobile-my-3">
            <div><div class="slide-stat-val">No</div><div class="slide-stat-label">Per-User Fees</div></div>
            <div><div class="slide-stat-val">35%</div><div class="slide-stat-label">Better Completion</div></div>
            <div><div class="slide-stat-val">2×</div><div class="slide-stat-label">Faster Decisions</div></div>
          </div>
        </div>
        <div class="slide-visual fade-up delay-3" aria-hidden="true">
          <div style="position:relative;">
            <div class="slide-card">
              <div style="text-align:center;margin-bottom:16px;">
                <div style="font-size:40px;font-weight:800;color:#A78BFA;font-family:var(--font-display);">5,000</div>
                <div style="font-size:13px;color:rgba(255,255,255,.5);margin-top:4px;">Free Credits Included</div>
              </div>
              <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
                <div style="background:rgba(255,255,255,.06);border-radius:10px;padding:14px;text-align:center;"><div style="font-size:20px;font-weight:800;color:#34D399;font-family:var(--font-display);">∞</div><div style="font-size:11px;color:rgba(255,255,255,.5);margin-top:4px;">Admins</div></div>
                <div style="background:rgba(255,255,255,.06);border-radius:10px;padding:14px;text-align:center;"><div style="font-size:20px;font-weight:800;color:#60A5FA;font-family:var(--font-display);">∞</div><div style="font-size:11px;color:rgba(255,255,255,.5);margin-top:4px;">Courses</div></div>
                <div style="background:rgba(255,255,255,.06);border-radius:10px;padding:14px;text-align:center;"><div style="font-size:20px;font-weight:800;color:#FBBF24;font-family:var(--font-display);">AI</div><div style="font-size:11px;color:rgba(255,255,255,.5);margin-top:4px;">Included</div></div>
                <div style="background:rgba(255,255,255,.06);border-radius:10px;padding:14px;text-align:center;"><div style="font-size:20px;font-weight:800;color:#F472B6;font-family:var(--font-display);">SSO</div><div style="font-size:11px;color:rgba(255,255,255,.5);margin-top:4px;">All Plans</div></div>
              </div>
            </div>
            <div class="visual-float-badge vfb-1">
              <svg viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2" width="16" height="16"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
              <span>No credit card needed</span>
            </div>
            <div class="visual-float-badge vfb-2">
              <svg viewBox="0 0 24 24" fill="none" stroke="#8B5CF6" stroke-width="2" width="16" height="16"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
              <span>90-day full access</span>
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
      <div>
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
        <!-- Duplicate for seamless loop -->
        <img class="logo-img" src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-67.png?fit=199%2C100&amp;ssl=1" alt="American Board">
        <img class="logo-img" src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-69.png?fit=197%2C100&amp;ssl=1" alt="Youth for Understanding">
        <img class="logo-img" src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-65.png?fit=197%2C100&amp;ssl=1" alt="Phi Delta Kappan">
        <img class="logo-img" src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-66.png?fit=198%2C100&amp;ssl=1" alt="SBCA">
        <img class="logo-img" src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-68.png?fit=198%2C99&amp;ssl=1" alt="PDK International">
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

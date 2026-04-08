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
          <p class="slide-sub">The AI-powered LMS that builds courses, assigns learners, and sends reminders — all from a single conversation.</p>
          <div class="slide-actions">
            <a href="#" class="btn btn-white btn-lg">Start Free Trial</a>
            <a href="#video" class="btn btn-ghost btn-lg hide-on-mobile">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>
              Watch Demo
            </a>
          </div>
          <div class="slide-stats">
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
          <p class="slide-sub">Design, deliver, and measure every training program — onboarding to compliance — from a single AI-powered command center.</p>
          <div class="slide-actions">
            <a href="#" class="btn btn-white btn-lg">Explore Features</a>
            <a href="#" class="btn btn-ghost btn-lg hide-on-mobile">See Pricing</a>
          </div>
          <div class="slide-stats">
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
          <p class="slide-sub">No per-user fees. Credits are consumed only when a learner completes something. Roll unused credits forward — zero wastage.</p>
          <div class="slide-actions">
            <a href="#" class="btn btn-white btn-lg">Get 5K Free Credits</a>
            <a href="#comparison" class="btn btn-ghost btn-lg hide-on-mobile ">Compare Plans</a>
          </div>
          <div class="slide-stats">
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
<section style="padding-top: 60px;" id="video" aria-label="Product walkthrough video">
  <div class="container">
    <div class="hero-showcase">
      <div class="hero-video-wrap">
        <div class="hero-video-inner">
          <span class="hero-video-badge"><span class="live-dot"></span> Live product walkthrough · 2 min</span>
          <video
            src="https://kprise.com/wp-content/uploads/2025/10/WhatsApp-Video-2025-10-06-at-12.39.50_fe04276f.mp4"
            autoplay muted loop playsinline
            aria-label="MyPass LMS platform walkthrough showing course creation, enrollment automation, and compliance reporting">
          </video>
        </div>
      </div>
      <div class="hero-stats-bar">
        <div class="hero-stat-item"><div class="stat-value blue">70%</div><div class="stat-label">Less admin work</div></div>
        <div class="hero-stat-item"><div class="stat-value green">4x</div><div class="stat-label">Faster courses</div></div>
        <div class="hero-stat-item"><div class="stat-value amber">+35%</div><div class="stat-label">Compliance rates</div></div>
        <div class="hero-stat-item"><div class="stat-value purple">35K+</div><div class="stat-label">Active learners</div></div>
      </div>
    </div>
  </div>
</section>

{{-- ============================================================
     PLATFORM SECTION
============================================================ --}}
<section class="section platform-section" id="platform" aria-labelledby="platform-title">
  <div class="container">
    <div class="platform-grid">
      <div class="platform-copy">
        <div class="tag">The Platform</div>
        <h2 class="section-title" id="platform-title">One platform for the entire training lifecycle</h2>
        <p class="section-sub">From course creation to compliance reporting — every step is automated, every insight is instant.</p>
        <div class="platform-bullets">
          <div class="platform-bullet">
            <div class="bullet-icon" style="background:#EEF2FF;">
              <svg viewBox="0 0 24 24" fill="none" stroke="#4F46E5" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
            </div>
            <div>
              <div class="bullet-title">AI Course Builder</div>
              <div class="bullet-desc">Upload any file or type a topic — your AI assistant creates a complete, polished course in minutes.</div>
            </div>
          </div>
          <div class="platform-bullet">
            <div class="bullet-icon" style="background:#D1FAE5;">
              <svg viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
            </div>
            <div>
              <div class="bullet-title">Smart Auto-Enrollment</div>
              <div class="bullet-desc">Roles-based rules enroll the right people automatically — no spreadsheets, no manual lists.</div>
            </div>
          </div>
          <div class="platform-bullet">
            <div class="bullet-icon" style="background:#FEF3C7;">
              <svg viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
            </div>
            <div>
              <div class="bullet-title">Instant Compliance Reports</div>
              <div class="bullet-desc">Ask "Who hasn't completed HIPAA training?" and get a sorted list in seconds.</div>
            </div>
          </div>
          <div class="platform-bullet">
            <div class="bullet-icon" style="background:#EDE9FE;">
              <svg viewBox="0 0 24 24" fill="none" stroke="#7C3AED" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
            </div>
            <div>
              <div class="bullet-title">Enterprise SSO &amp; API</div>
              <div class="bullet-desc">One-click sign-in with Okta, Azure AD, or any SAML 2.0 provider. Deep API for custom integrations.</div>
            </div>
          </div>
        </div>
        <div class="platform-ctas">
          <a href="#" class="btn btn-primary">Explore Platform</a>
          <a href="#" class="btn btn-outline">Book a Demo</a>
        </div>
      </div>

      <div class="platform-visual">
        <div class="platform-dashboard">
          <div class="pd-header">
            <span class="pd-title">Training Overview</span>
            <span class="pd-badge">Live</span>
          </div>
          <div class="pd-stats">
            <div class="pd-stat"><div class="pd-stat-val">240</div><div class="pd-stat-lbl">Learners</div></div>
            <div class="pd-stat"><div class="pd-stat-val" style="color:#10B981;">87%</div><div class="pd-stat-lbl">Completion</div></div>
            <div class="pd-stat"><div class="pd-stat-val" style="color:#F59E0B;">4.9</div><div class="pd-stat-lbl">Avg Rating</div></div>
          </div>
          <div class="pd-courses">
            <div class="pd-course-row">
              <div class="pd-course-icon" style="background:#EEF2FF;">🛡️</div>
              <div class="pd-course-name">Cybersecurity Basics</div>
              <div class="pd-course-prog">
                <div class="pd-prog-bar"><div class="pd-prog-fill" style="width:92%;background:#10B981;"></div></div>
                <span>92%</span>
              </div>
            </div>
            <div class="pd-course-row">
              <div class="pd-course-icon" style="background:#FEF3C7;">📋</div>
              <div class="pd-course-name">HIPAA Compliance 2024</div>
              <div class="pd-course-prog">
                <div class="pd-prog-bar"><div class="pd-prog-fill" style="width:78%;background:#4F46E5;"></div></div>
                <span>78%</span>
              </div>
            </div>
            <div class="pd-course-row">
              <div class="pd-course-icon" style="background:#D1FAE5;">🎯</div>
              <div class="pd-course-name">Sales Enablement Q4</div>
              <div class="pd-course-prog">
                <div class="pd-prog-bar"><div class="pd-prog-fill" style="width:65%;background:#F59E0B;"></div></div>
                <span>65%</span>
              </div>
            </div>
            <div class="pd-course-row">
              <div class="pd-course-icon" style="background:#EDE9FE;">🤝</div>
              <div class="pd-course-name">Leadership &amp; Culture</div>
              <div class="pd-course-prog">
                <div class="pd-prog-bar"><div class="pd-prog-fill" style="width:54%;background:#7C3AED;"></div></div>
                <span>54%</span>
              </div>
            </div>
          </div>
        </div>
        <div class="plat-float plat-float-1">
          <div class="pf-icon" style="background:#D1FAE5;">
            <svg viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2" width="18" height="18" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
          <div><div class="pf-val">8 hrs</div><div class="pf-lbl">Saved this week</div></div>
        </div>
        <div class="plat-float plat-float-2">
          <div class="pf-icon" style="background:#EEF2FF;">
            <svg viewBox="0 0 24 24" fill="none" stroke="#4F46E5" stroke-width="2" width="18" height="18"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/></svg>
          </div>
          <div><div class="pf-val">+24</div><div class="pf-lbl">New enrollments</div></div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ============================================================
     TRUST STRIP
============================================================ --}}
<div class="trust-strip" aria-label="Trusted by companies">
  <div class="container">
    <p class="trust-label">Trusted by teams at</p>
    <div class="marquee-wrap">
      <div class="marquee-track" aria-hidden="true">
        @php
          $logos = [
            ['bg'=>'#EEF2FF','stroke'=>'#4F46E5','name'=>'Acme Corp','icon'=>'<rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 9h6M9 12h6M9 15h4"/>'],
            ['bg'=>'#D1FAE5','stroke'=>'#10B981','name'=>'NovaTech', 'icon'=>'<circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/>'],
            ['bg'=>'#FEF3C7','stroke'=>'#F59E0B','name'=>'Buildify', 'icon'=>'<path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/>'],
            ['bg'=>'#FEE2E2','stroke'=>'#EF4444','name'=>'HealthPlus','icon'=>'<path d="M20 7H4a2 2 0 00-2 2v6a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/>'],
            ['bg'=>'#EDE9FE','stroke'=>'#7C3AED','name'=>'PeopleFirst','icon'=>'<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/>'],
            ['bg'=>'#CFFAFE','stroke'=>'#0891B2','name'=>'CallMax',   'icon'=>'<path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.8 19.79 19.79 0 01.22 1.18 2 2 0 012.2 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.09a16 16 0 006 6l.56-.56a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z"/>'],
            ['bg'=>'#F0FDF4','stroke'=>'#16A34A','name'=>'HomeBase',  'icon'=>'<path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>'],
            ['bg'=>'#FFF7ED','stroke'=>'#EA580C','name'=>'StarReach', 'icon'=>'<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>'],
          ];
        @endphp
        @foreach(array_merge($logos, $logos) as $logo)
          <div class="marquee-item">
            <div class="marquee-logo" style="background:{{ $logo['bg'] }};">
              <svg viewBox="0 0 24 24" fill="none" stroke="{{ $logo['stroke'] }}" stroke-width="2">{!! $logo['icon'] !!}</svg>
            </div>
            {{ $logo['name'] }}
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

{{-- ============================================================
     PURPOSE SECTION
============================================================ --}}
<section class="section" id="purpose" aria-labelledby="purpose-title">
  <div class="container">
    <div class="section-header">
      <div class="tag">Purpose-Built</div>
      <h2 class="section-title" id="purpose-title">Built for the way you actually train</h2>
      <p class="section-sub">Not a generic content platform. A purpose-built system designed around how real L&amp;D teams operate.</p>
    </div>
    <div class="purpose-grid">
      <div class="purpose-card">
        <div class="purpose-num">01</div>
        <h3 class="purpose-title">Eliminate Admin Overload</h3>
        <p class="purpose-text">Stop spending hours clicking menus. Describe what you need — the AI executes multi-step workflows instantly.</p>
      </div>
      <div class="purpose-card">
        <div class="purpose-num">02</div>
        <h3 class="purpose-title">Launch Courses Fast</h3>
        <p class="purpose-text">Idea to published course in under 10 minutes. AI generates content, quizzes, and SCORM packaging automatically.</p>
      </div>
      <div class="purpose-card">
        <div class="purpose-num">03</div>
        <h3 class="purpose-title">Never Miss Compliance</h3>
        <p class="purpose-text">Deadline tracking, escalating reminders, and audit-ready reports built in. Stay compliant without the manual effort.</p>
      </div>
      <div class="purpose-card">
        <div class="purpose-num">04</div>
        <h3 class="purpose-title">Scale Without Seat Fees</h3>
        <p class="purpose-text">Credits are consumed per completion — not per login. Add learners freely; only pay for what gets done.</p>
      </div>
    </div>
  </div>
</section>

{{-- ============================================================
     COMPARISON TABLE
============================================================ --}}
<section class="comparison" id="comparison" aria-labelledby="comparison-heading">
  <div class="container">
    <h2 class="section-heading" id="comparison-heading">Why Teams Prefer MyPass LMS Over Traditional LMS</h2>
    <p class="section-subtext">Quick comparison — see how MyPass LMS speeds up training &amp; reduces admin effort.</p>

    <div class="comparison__table-wrap" role="region" aria-label="Feature comparison table" tabindex="0">
      <table class="comparison__table">
        <caption class="sr-only">Why Teams Prefer MyPass LMS Over Traditional LMS</caption>
        <thead>
          <tr>
            <th scope="col" class="comparison__th comparison__th--feature">Feature</th>
            <th scope="col" class="comparison__th comparison__th--col-a">Traditional LMS</th>
            <th scope="col" class="comparison__th comparison__th--col-b">
              <span class="comparison__th-badge">MyPass LMS</span>
            </th>
          </tr>
        </thead>
        <tbody>
          @php
            $rows = [
              ['Course Creation &amp; Assignment', 'Manual — time-consuming', 'Done in minutes — slash admin hours'],
              ['Task Execution', 'No chat/voice control', 'Natural chat &amp; voice — describe task, MyPass LMS executes'],
              ['Content → Course', 'Upload only — needs external authoring', 'Upload PPT/PDF/Video — AI auto-creates SCORM'],
              ['Scheduling &amp; Reminders', 'Manual reminders', 'Automatic scheduling &amp; reminders'],
              ['Compliance &amp; Deadlines', 'Missed alerts; higher risk', 'Alerting &amp; deadline tracking'],
              ['Enrollment', 'Manual per team', 'Auto-enroll by roles/groups'],
              ['Toolset', 'Fragmented tools', 'All-in-one: SCORM, ILT, assessments, SSO, reporting'],
            ];
          @endphp
          @foreach($rows as $row)
          <tr class="comparison__row">
            <td class="comparison__td comparison__td--feature">{!! $row[0] !!}</td>
            <td class="comparison__td comparison__td--col-a">
              <span class="comparison__neg">{!! $row[1] !!}</span>
            </td>
            <td class="comparison__td comparison__td--col-b">
              <span class="comparison__pos">
                <svg class="comparison__check" width="16" height="16" viewBox="0 0 16 16" aria-hidden="true">
                  <circle cx="8" cy="8" r="8" fill="#5932EA" fill-opacity="0.1"/>
                  <path d="M5 8l2 2 4-4" stroke="#5932EA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                {!! $row[2] !!}
              </span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>

{{-- ============================================================
     COURSES GRID
============================================================ --}}
<section class="section" id="courses" aria-labelledby="courses-title">
  <div class="container">
    <div class="section-header">
      <div class="tag">Popular Courses</div>
      <h2 class="section-title" id="courses-title">Top-rated courses this month</h2>
      <p class="section-sub">Curated for impact. Every course is built with AI assistance and reviewed by subject matter experts.</p>
    </div>
    <div class="courses-grid">
      <article class="course-card">
        <div class="course-thumb">
          <div class="course-thumb-bg" style="background:linear-gradient(135deg,#1E1B4B,#4F46E5);">🤖</div>
          <div class="course-thumb-overlay"></div>
          <span class="course-level level-beginner">Beginner</span>
        </div>
        <div class="course-body">
          <div class="course-category">AI &amp; Machine Learning</div>
          <h3 class="course-title">AI for Non-Developers: Practical Use Cases in 2024</h3>
          <div class="course-instructor">
            <div class="course-avatar" style="background:#4F46E5;">SJ</div>
            <div class="course-instructor-name">by <strong>Sarah Johnson</strong></div>
          </div>
          <div class="course-meta">
            <div class="course-rating"><span class="stars">★★★★★</span> 4.9 <span class="course-students">(2.1k)</span></div>
            <div class="course-price"><small>$129</small>$79</div>
          </div>
        </div>
      </article>

      <article class="course-card">
        <div class="course-thumb">
          <div class="course-thumb-bg" style="background:linear-gradient(135deg,#042F2E,#10B981);">🔒</div>
          <div class="course-thumb-overlay"></div>
          <span class="course-level level-inter">Intermediate</span>
        </div>
        <div class="course-body">
          <div class="course-category">Cybersecurity</div>
          <h3 class="course-title">Cybersecurity Awareness: Zero Trust Architecture Fundamentals</h3>
          <div class="course-instructor">
            <div class="course-avatar" style="background:#10B981;">MR</div>
            <div class="course-instructor-name">by <strong>Marcus Reid</strong></div>
          </div>
          <div class="course-meta">
            <div class="course-rating"><span class="stars">★★★★★</span> 4.8 <span class="course-students">(1.4k)</span></div>
            <div class="course-price"><small>$99</small>$59</div>
          </div>
        </div>
      </article>

      <article class="course-card">
        <div class="course-thumb">
          <div class="course-thumb-bg" style="background:linear-gradient(135deg,#451A03,#F59E0B);">📊</div>
          <div class="course-thumb-overlay"></div>
          <span class="course-level level-all">All Levels</span>
        </div>
        <div class="course-body">
          <div class="course-category">Business &amp; Management</div>
          <h3 class="course-title">Data-Driven Leadership: Making Better Decisions with Analytics</h3>
          <div class="course-instructor">
            <div class="course-avatar" style="background:#F59E0B;">AL</div>
            <div class="course-instructor-name">by <strong>Aisha Lopez</strong></div>
          </div>
          <div class="course-meta">
            <div class="course-rating"><span class="stars">★★★★½</span> 4.7 <span class="course-students">(987)</span></div>
            <div class="course-price"><small>$149</small>$89</div>
          </div>
        </div>
      </article>
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
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- {{-- SEO Meta Tags --}}
    <title>{{ $seo['title'] ?? config('app.name') . ' | AI-Powered LMS Platform' }}</title>
    <meta name="description" content="{{ $seo['description'] ?? 'MyPass LMS is an Agentic AI-powered, credit-based learning platform that cuts admin work by 70%. No per-user pricing. Free 90-day trial.' }}">
    <meta name="keywords" content="{{ $seo['keywords'] ?? 'LMS, learning management system, AI LMS, online training, employee training, compliance training' }}">
    <meta name="robots" content="{{ $seo['robots'] ?? 'index, follow' }}">
    <link rel="canonical" href="{{ $seo['canonical'] ?? url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $seo['canonical'] ?? url()->current() }}">
    <meta property="og:title" content="{{ $seo['og_title'] ?? $seo['title'] ?? config('app.name') }}">
    <meta property="og:description" content="{{ $seo['og_description'] ?? $seo['description'] ?? '' }}">
    <meta property="og:image" content="{{ $seo['og_image'] ?? asset('assets/images/og-default.png') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo['title'] ?? config('app.name') }}">
    <meta name="twitter:description" content="{{ $seo['description'] ?? '' }}">
    <meta name="twitter:image" content="{{ $seo['og_image'] ?? asset('assets/images/og-default.png') }}"> -->

    
    {{--
    ┌─────────────────────────────────────────────────────────────┐
    │  SEO HEAD COMPONENT                                         │
    │  Reads from DB via SeoService → falls back to $seo array   │
    │  from the controller → falls back to hard-coded defaults   │
    │                                                             │
    │  BEFORE: dozens of hardcoded meta tag lines                 │
    │  AFTER:  one line — everything managed from admin panel     │
    └─────────────────────────────────────────────────────────────┘
    --}}
    <x-seo-head :seo="$seo ?? []" />
    
    {{-- Schema.org Structured Data --}}
    @stack('schema')

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/apple-touch-icon.png') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">


    {{-- Styles — load order matters:
         1. app.css     → design tokens, reset, base, buttons, sections
         2. components  → stats bar, pricing cards, dividers
         3. header      → mega menu, mobile nav
         4. footer      → bottom bar, social, legal
         5. page-level  → pushed via @stack('styles') in each view
    --}}
    <link rel="stylesheet" href="{{ asset('assets/css/app.css?v=1.2') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css?v=1.2') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css?v=1.2') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css?v=1.2') }}">
    @stack('styles')
</head>
<body class="{{ $bodyClass ?? '' }}">

    {{-- Skip to content for accessibility --}}
    <a href="#main-content" class="skip-link">Skip to main content</a>

    {{-- Header --}}
    @include('partials.header')

    {{-- Main Content --}}
    <main id="main-content">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Scripts --}}
    <script src="{{ asset('assets/js/app.js') }}" defer></script>
    @stack('scripts')



<div id="kp-widget">

  <!-- Launcher -->
  <button class="kp-chat-btn" onclick="kpToggle()" aria-label="Open chat">
    <div class="kp-badge"></div>
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
    </svg>
  </button>

  <!-- Chat Window -->
  <div class="kp-chat" id="kp-chat">

    <!-- Header -->
    <div class="kp-header">
      <div class="kp-header-logo">
        <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="3"/>
          <path d="M12 2v3M12 19v3M4.22 4.22l2.12 2.12M17.66 17.66l2.12 2.12M2 12h3M19 12h3M4.22 19.78l2.12-2.12M17.66 6.34l2.12-2.12"/>
        </svg>
      </div>
      <div class="kp-header-info">
        <div class="kp-header-name">Kprise AI Assistant</div>
        <div class="kp-header-status">
          <div class="kp-status-dot"></div>
          <span class="kp-status-text">Online · Typically replies instantly</span>
        </div>
      </div>
      <button class="kp-header-close" onclick="kpToggle()" aria-label="Close">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
          <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
      </button>
    </div>

    <!-- Messages -->
    <div class="kp-body" id="kp-body"></div>

    <!-- Lead form -->
    <div class="kp-lead" id="kp-lead" style="display:none;">
      <div class="kp-lead-title">Let's get started</div>
      <div class="kp-lead-sub">Enter your details to chat with our AI assistant.</div>
      <input class="kp-lead-input" id="kp-name"  placeholder="Your name"  autocomplete="given-name">
      <input class="kp-lead-input" id="kp-email" placeholder="Work email" autocomplete="email" type="email">
      <button class="kp-lead-btn" onclick="kpSaveLead()">Start conversation →</button>
    </div>

    <!-- Footer -->
    <div class="kp-footer">
      <input class="kp-footer-input" id="kp-input" placeholder="Type a message…" disabled
             onkeydown="if(event.key==='Enter') kpSend()">
      <button class="kp-footer-send" onclick="kpSend()" id="kp-sendBtn" disabled aria-label="Send">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="22" y1="2" x2="11" y2="13"/>
          <polygon points="22 2 15 22 11 13 2 9 22 2"/>
        </svg>
      </button>
    </div>

    <div class="kp-footer-brand">Powered by <span>Kprise</span> · MyPass LMS</div>

  </div>

</div><!-- #kp-widget -->

<script>
  (function(){
    let session = localStorage.getItem("kp_s");
    let name    = localStorage.getItem("kp_n");
    let email   = localStorage.getItem("kp_e");

    if (!session) {
      session = Date.now();
      localStorage.setItem("kp_s", session);
      localStorage.removeItem("kp_greeted");
    }

    function $ (id) { return document.getElementById(id); }

    window.kpToggle = function(){
      const c = $("kp-chat");
      const isHidden = c.style.display === "none" || c.style.display === "";
      c.style.display = isHidden ? "flex" : "none";
      if (isHidden) setTimeout(kpInitChat, 200);
    };

    function kpInitChat(){
      if (name) {
        kpEnable();
        if (!localStorage.getItem("kp_greeted")) {
          kpBotWithChips(
            `Hi ${name} 👋 Welcome back to <strong>MyPass LMS</strong>.<br>How can I help you today?`,
            ["What is MyPass LMS?", "Pricing & plans", "Training solutions", "Request a demo"]
          );
          localStorage.setItem("kp_greeted", "true");
        }
      } else {
        $("kp-lead").style.display = "block";
        kpBot("Hi there! I'm your Kprise AI Assistant.<br>I'm here to help with anything about MyPass LMS.");
      }
    }

    window.kpSaveLead = function(){
      name  = $("kp-name").value.trim();
      email = $("kp-email").value.trim();

      if (!name || !email) {
        kpShake($("kp-lead"));
        return;
      }

      localStorage.setItem("kp_n", name);
      localStorage.setItem("kp_e", email);

      fetch("http://abcte-chat.us-east-1.elasticbeanstalk.com/api/kprise/lead", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({ sessionId: session, tenant: "kprise", name, email })
      }).catch(() => {});

      $("kp-lead").style.display = "none";
      kpEnable();

      kpBotWithChips(
        `Great to meet you, <strong>${name}</strong>! 👋<br>Ask me anything about MyPass LMS.`,
        ["What is MyPass LMS?", "Pricing & plans", "Training solutions", "Request a demo"]
      );

      localStorage.setItem("kp_greeted", "true");
    };

    function kpEnable(){
      $("kp-input").disabled   = false;
      $("kp-sendBtn").disabled = false;
      $("kp-input").focus();
    }

    function kpUser(msg){
      const body = $("kp-body");
      const escaped = msg.replace(/</g,"&lt;").replace(/>/g,"&gt;");
      body.innerHTML += `<div class="kp-msg kp-user"><div class="kp-bubble">${escaped}</div></div>`;
      body.scrollTop = body.scrollHeight;
    }

    function kpBot(msg){
      const body = $("kp-body");
      body.innerHTML += `
        <div class="kp-msg kp-bot">
          <div class="kp-msg-avatar">
            <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="3"/>
              <path d="M12 2v3M12 19v3M4.22 4.22l2.12 2.12M17.66 17.66l2.12 2.12M2 12h3M19 12h3M4.22 19.78l2.12-2.12M17.66 6.34l2.12-2.12"/>
            </svg>
          </div>
          <div class="kp-bubble">${msg}</div>
        </div>`;
      body.scrollTop = body.scrollHeight;
    }

    function kpBotWithChips(msg, chips){
      kpBot(msg);
      const body = $("kp-body");
      const chipHtml = chips.map(c =>
        `<button class="kp-chip" onclick="kpSendChip(this,'${c.replace(/'/g,"\\'")}')">↗ ${c}</button>`
      ).join("");
      body.innerHTML += `<div class="kp-suggestions" id="kp-chips">${chipHtml}</div>`;
      body.scrollTop = body.scrollHeight;
    }

    window.kpSendChip = function(el, text){
      $("kp-chips")?.remove();
      kpSend(text);
    };

    function kpTyping(){
      const body = $("kp-body");
      body.innerHTML += `
        <div class="kp-msg kp-bot" id="kp-typing-msg">
          <div class="kp-msg-avatar">
            <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="3"/>
              <path d="M12 2v3M12 19v3M4.22 4.22l2.12 2.12M17.66 17.66l2.12 2.12M2 12h3M19 12h3M4.22 19.78l2.12-2.12M17.66 6.34l2.12-2.12"/>
            </svg>
          </div>
          <div class="kp-bubble">
            <div class="kp-typing-indicator"><span></span><span></span><span></span></div>
          </div>
        </div>`;
      body.scrollTop = body.scrollHeight;
    }

    window.kpSend = function(overrideMsg){
      const input = $("kp-input");
      const msg = overrideMsg || input.value.trim();
      if (!msg) return;

      if (!overrideMsg) input.value = "";
      kpUser(msg);
      kpTyping();

      fetch("http://abcte-chat.us-east-1.elasticbeanstalk.com/api/kprise/chat", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({ message: msg, sessionId: session, name, email })
      })
      .then(r => r.json())
      .then(d => {
        $("kp-typing-msg")?.remove();
        setTimeout(() => kpBot(d.reply), 300);
      })
      .catch(() => {
        $("kp-typing-msg")?.remove();
        kpBot("Something went wrong. Please try again.");
      });
    };

    function kpShake(el){
      el.style.animation = "none";
      el.offsetHeight;
      el.style.animation = "kpShake .35s ease";
    }
  })();
  </script>
</body>
</html>

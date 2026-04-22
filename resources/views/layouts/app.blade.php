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


    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
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



    <!-- Launcher -->
<button class="chat-btn" onclick="toggle()" aria-label="Open chat">
  <div class="badge"></div>
  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
  </svg>
</button>

<!-- Chat Window -->
<div class="chat" id="chat">

  <!-- Header -->
  <div class="header">
    <div class="header-avatar">✦</div>
    <div class="header-info">
      <div class="header-name">Kprise AI Assistant</div>
      <div class="header-status">Online &amp; ready</div>
    </div>
    <button class="header-close" onclick="toggle()" aria-label="Close">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
        <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
      </svg>
    </button>
  </div>

  <!-- Messages -->
  <div class="body" id="body"></div>

  <!-- Lead form -->
  <div class="lead" id="lead" style="display:none;">
    <div class="lead-title">Before we start 👋</div>
    <div class="lead-sub">Enter your details to continue the conversation.</div>
    <input class="lead-input" id="name"  placeholder="Your name"  autocomplete="given-name">
    <input class="lead-input" id="email" placeholder="Email address" autocomplete="email" type="email">
    <button class="lead-btn" onclick="saveLead()">Get started →</button>
  </div>

  <!-- Footer -->
  <div class="footer">
    <input class="footer-input" id="input" placeholder="Ask me anything…" disabled
           onkeydown="if(event.key==='Enter') send()">
    <button class="footer-send" onclick="send()" id="sendBtn" disabled aria-label="Send">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="22" y1="2" x2="11" y2="13"/>
        <polygon points="22 2 15 22 11 13 2 9 22 2"/>
      </svg>
    </button>
  </div>

</div>

<script>
let session = localStorage.getItem("s");
let name    = localStorage.getItem("n");
let email   = localStorage.getItem("e");

// 🔥 RESET SESSION
if (!session) {
  session = Date.now();
  localStorage.setItem("s", session);
  localStorage.removeItem("greeted");
}

// 🔥 TOGGLE CHAT
function toggle(){
  let c = document.getElementById("chat");
  const isHidden = c.style.display === "none" || c.style.display === "";

  c.style.display = isHidden ? "flex" : "none";

  // 🔥 IMPORTANT: trigger greeting on open
  if (isHidden) {
    setTimeout(() => initChat(), 200);
  }
}

// 🔥 INIT CHAT (GREETING)
function initChat(){

  if(name){
    enable();

    if(!localStorage.getItem("greeted")){
      bot(`Hey ${name} 👋<br><br>How can I help you today?<br><br>
      • What is MyPass LMS?<br>
      • Pricing details<br>
      • Training solutions`);

      localStorage.setItem("greeted", "true");
    }

  } else {
    document.getElementById("lead").style.display = "block";
    bot("Hi! Let's get started 👇");
  }
}

// 🔥 SAVE LEAD
function saveLead(){

  name  = document.getElementById("name").value;
  email = document.getElementById("email").value;

  if(!name || !email){
    alert("Please enter name and email");
    return;
  }

  localStorage.setItem("n", name);
  localStorage.setItem("e", email);

  fetch("http://abcte-chat.us-east-1.elasticbeanstalk.com/api/kprise/lead", {
    method: "POST",
    headers: {"Content-Type": "application/json"},
    body: JSON.stringify({
      sessionId: session,
      tenant: "kprise",
      name: name,
      email: email
    })
  }).catch(() => {});

  document.getElementById("lead").style.display = "none";
  enable();

  bot(`Nice to meet you ${name} 👋<br><br>How can I help you today?`);

  localStorage.setItem("greeted", "true");
}

// 🔥 ENABLE INPUT
function enable(){
  document.getElementById("input").disabled   = false;
  document.getElementById("sendBtn").disabled = false;
}

// 🔥 USER MESSAGE
function user(msg){
  const body = document.getElementById("body");
  body.innerHTML += `<div class="msg user"><div class="bubble">${msg}</div></div>`;
  body.scrollTop = body.scrollHeight;
}

// 🔥 BOT MESSAGE
function bot(msg){
  const body = document.getElementById("body");

  body.innerHTML += `
    <div class="msg bot">
      <div class="msg-avatar">✦</div>
      <div class="bubble">${msg}</div>
    </div>
  `;

  body.scrollTop = body.scrollHeight;
}

// 🔥 SEND MESSAGE
function send(){
  const input = document.getElementById("input");
  let msg = input.value.trim();
  if(!msg) return;

  user(msg);
  input.value = "";

  bot("Typing...");

  fetch("http://abcte-chat.us-east-1.elasticbeanstalk.com/api/kprise/chat", {
    method: "POST",
    headers: {"Content-Type": "application/json"},
    body: JSON.stringify({ message: msg, sessionId: session, name, email })
  })
  .then(r => r.json())
  .then(d => {

    const body = document.getElementById("body");
    const lastBot = body.querySelector(".bot:last-child");
    if(lastBot) lastBot.remove();

    setTimeout(() => {
      bot(d.reply);
    }, 500);

  })
  .catch(() => {
    bot("Something went wrong. Please try again.");
  });
}
</script>
</body>
</html>

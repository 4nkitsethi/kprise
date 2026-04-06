@extends('layouts.app')

@php
    /**
    * pricing.php — MyPass LMS Pricing Page
    * Last updated: 2026-03-26 | Version 1.0
    */

    $page_title       = 'MyPass LMS Pricing — Plans Starting at $79/mo | Active User Pricing';
    $page_description = 'MyPass LMS pricing starts at $79/month for up to 40 active users. All plans include every core LMS feature. Pay only for active users — not total headcount. Save 20% with annual billing.';
    $page_canonical   = 'https://kprise.com/pricing/';
    $page_slug        = 'pricing';
    $page_updated     = '2026-03-26';

    // GEO: FAQPage schema — maps to exact questions buyers ask AI engines
    $faq_items = [
    ["What is an active user?", "An active user is anyone who logs in and engages in training activity during the billing cycle. You are only charged for these users — not the total number added to the platform."],
    ["Do I pay for all users added to the platform?", "No. You only pay for active users. Add your entire roster without worrying about per-seat charges for inactive accounts."],
    ["Can I choose courses from different categories?", "Yes. You can select courses from any category including Compliance, Workplace Skills, Manager Training, and AI programs. Mix and match to fit your needs."],
    ["Are courses included in monthly plans?", "No. Free prebuilt courses are included only with annual billing. Monthly plans include full platform access, and courses can be purchased separately."],
    ["What happens if I exceed my user limit?", "You can seamlessly upgrade to the next plan with prorated pricing. There is no disruption to your learners or training programs."],
    ["Can I upgrade my plan anytime?", "Yes. Upgrade at any time with prorated pricing based on the remaining billing period. No waiting for billing cycles."],
    ["Which plan is best for associations?", "Most associations choose the Grow plan for 101–500 active users. It includes 7 prebuilt courses with annual billing and works well for member training, CE tracking, and certification programs. MyPass also integrates with AMS platforms like iMIS, GrowthZone, and MemberClicks."],
    ["How does MyPass LMS compare to per-seat LMS pricing?", "Traditional LMS platforms charge per registered seat whether users are active or not. MyPass charges only for active users — people who log in and engage during the billing cycle. For organizations with large rosters but variable training activity, this typically reduces costs by 30-50%."],
    ["Is there a free trial?", "Yes. MyPass offers a 90-day free trial with 5,000 credits and full platform access. No credit card required."],
    ["What happens if my usage increases during an annual plan?", "If you exceed your limits mid-cycle, you can upgrade with a prorated adjustment and get immediate access to higher limits. No service interruption."]
    ];

    $faq_schema_items = [];
    foreach ($faq_items as $faq) {
    $faq_schema_items[] = [
        "@type" => "Question",
        "name" => $faq[0],
        "acceptedAnswer" => ["@type" => "Answer", "text" => $faq[1]]
    ];
    }
    $page_schema = json_encode([
    "@context" => "https://schema.org",
    "@type" => "FAQPage",
    "mainEntity" => $faq_schema_items,
    "dateModified" => "2026-03-26"
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

    // Page CSS — pricing-specific styles
    $page_css = <<<'CSS'
    .pricing-hero {
        padding: 72px 0 36px;
        text-align: center;
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    }
    .pricing-hero h1 {
        font-size: clamp(32px, 4.5vw, 52px); line-height: 1.08;
        margin: 0 0 14px; letter-spacing: -0.03em; font-weight: 800;
    }
    .hero-sub { max-width: 720px; margin: 0 auto; color: var(--muted); font-size: 17px; line-height: 1.7; }
    .active-user-callout {
        display: inline-flex; align-items: center; gap: 8px; margin-top: 18px;
        padding: 10px 18px; background: #fff; border: 1px solid var(--line);
        border-radius: var(--radius-pill); font-size: 13px; font-weight: 700;
        color: var(--light-text); box-shadow: 0 2px 8px rgba(15,23,42,.04);
    }
    .billing-wrap { margin: 28px auto 0; display: flex; justify-content: center; align-items: center; gap: 16px; flex-wrap: wrap; }
    .toggle { display: inline-flex; background: #eaf0f8; border: 1px solid #d9e2ef; border-radius: var(--radius-pill); padding: 4px; }
    .toggle button {
        border: none; background: transparent; color: #334155; padding: 12px 18px;
        font-weight: 700; border-radius: var(--radius-pill); cursor: pointer; min-width: 120px; font-size: 14px; font-family: inherit;
    }
    .toggle button.active { background: #fff; color: var(--text); box-shadow: 0 2px 8px rgba(15,23,42,.08); }
    .save-pill {
        display: inline-flex; align-items: center; gap: 6px; padding: 10px 14px;
        border-radius: var(--radius-pill); background: var(--green-bg); color: var(--green);
        font-weight: 800; font-size: 14px; border: 1px solid var(--green-border);
    }

    /* Cards */
    .pricing-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 22px; padding: 26px 0 18px; align-items: start; }
    .p-card { background: var(--card); border: 1px solid var(--line); border-radius: 24px; box-shadow: var(--shadow); overflow: hidden; position: relative; }
    .p-card.popular { border: 2px solid var(--primary); transform: translateY(-6px); }
    .p-badge {
        position: absolute; top: 18px; right: 18px; background: var(--primary-light); color: var(--primary-dark);
        border: 1px solid var(--primary-border); padding: 8px 12px; border-radius: var(--radius-pill);
        font-size: 12px; font-weight: 800; letter-spacing: .03em;
    }
    .p-card-top { padding: 30px 26px 22px; border-bottom: 1px solid var(--line); }
    .plan-name { font-size: 28px; font-weight: 800; letter-spacing: -.02em; margin-bottom: 6px; }
    .plan-sub { color: var(--muted); font-size: 14px; min-height: 44px; line-height: 1.5; margin-bottom: 18px; }
    .sel-label { display: block; font-size: 13px; font-weight: 700; color: #334155; margin-bottom: 8px; }
    select {
        width: 100%; appearance: none; background: #fff; border: 1px solid #cbd5e1; border-radius: var(--radius-sm);
        padding: 14px 16px; font-size: 15px; font-weight: 600; color: var(--text); outline: none; font-family: inherit;
    }
    .price-area { padding-top: 18px; }
    .price { display: flex; align-items: flex-end; gap: 4px; flex-wrap: wrap; }
    .price .amount { font-size: 48px; line-height: 1; font-weight: 800; letter-spacing: -.04em; }
    .price .per { color: var(--muted); font-size: 15px; font-weight: 700; margin-bottom: 8px; }
    .billing-note { margin-top: 10px; color: #475569; font-size: 13px; font-weight: 600; }
    .mini-callout {
        margin-top: 14px; display: inline-flex; align-items: center; gap: 6px;
        font-size: 12px; font-weight: 800; color: var(--green);
        background: var(--green-bg); border: 1px solid var(--green-border);
        padding: 8px 10px; border-radius: var(--radius-pill);
    }
    .price-strike { margin-top: 10px; color: #94a3b8; font-size: 14px; font-weight: 700; text-decoration: line-through; min-height: 20px; }
    .p-card-body { padding: 26px; }
    .feat-title { font-size: 13px; font-weight: 800; color: #334155; text-transform: uppercase; letter-spacing: .06em; margin-bottom: 14px; }
    .feat-list { list-style: none; margin: 0 0 22px; padding: 0; }
    .feat-list li {
        display: flex; gap: 10px; align-items: flex-start; padding: 11px 0;
        border-bottom: 1px solid #f1f5f9; color: #0f172a; font-size: 15px; line-height: 1.5;
    }
    .feat-list li:last-child { border-bottom: none; }
    .chk {
        width: 20px; height: 20px; min-width: 20px; border-radius: 50%;
        background: var(--primary-light); color: var(--primary);
        display: inline-flex; align-items: center; justify-content: center;
        font-size: 13px; font-weight: 900; margin-top: 1px;
    }
    .p-cta {
        display: block; width: 100%; text-align: center; text-decoration: none;
        background: #0f172a; color: #fff; padding: 15px 18px; border-radius: var(--radius-sm); font-weight: 800;
    }
    .p-cta.primary { background: var(--primary); }
    .p-card.enterprise .p-card-top { background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%); color: #fff; }
    .p-card.enterprise .plan-sub, .p-card.enterprise .billing-note { color: #dbe4f0; }

    /* Compare table */
    .compare-section { padding: 52px 0 0; }
    .compare-section h2 { text-align: center; font-size: 30px; font-weight: 800; margin: 0 0 8px; letter-spacing: -.02em; }
    .compare-section > .container > p { text-align: center; color: var(--muted); max-width: 640px; margin: 0 auto 24px; font-size: 15px; }
    .compare-box {
        background: #fff; border: 1px solid var(--line); border-radius: 20px;
        box-shadow: var(--shadow); overflow: auto;
    }
    table { width: 100%; border-collapse: collapse; min-width: 860px; }
    th, td { padding: 14px 18px; border-bottom: 1px solid #f1f5f9; text-align: left; font-size: 14px; }
    thead th { background: var(--bg-subtle); font-size: 12px; text-transform: uppercase; letter-spacing: .06em; color: #475569; font-weight: 700; }
    thead th:not(:first-child) { text-align: center; }
    tbody td:not(:first-child) { text-align: center; }
    tbody td:first-child { font-weight: 700; color: var(--text); width: 26%; background: #fcfdff; }
    .footnote { padding: 16px 0 0; text-align: center; color: var(--muted); font-size: 13px; }

    /* FAQ */
    .faq-section { padding: 52px 0 80px; }
    .faq-section h2 { text-align: center; font-size: 30px; font-weight: 800; margin: 0 0 8px; letter-spacing: -.02em; }
    .faq-section > .container > p { text-align: center; color: var(--muted); max-width: 560px; margin: 0 auto 28px; font-size: 15px; }
    .faq-list { max-width: 780px; margin: 0 auto; }
    .faq-item { border: 1px solid var(--line); border-radius: var(--radius-sm); background: #fff; margin-bottom: 10px; overflow: hidden; transition: box-shadow .2s; }
    .faq-item:hover { box-shadow: 0 2px 8px rgba(15,23,42,.04); }
    .faq-q {
        display: flex; align-items: center; justify-content: space-between; gap: 16px;
        padding: 16px 20px; cursor: pointer; font-weight: 700; font-size: 15px;
        color: var(--text); background: none; border: none; width: 100%;
        text-align: left; font-family: inherit; line-height: 1.4;
    }
    .faq-q:hover { color: var(--primary); }
    .faq-chevron { width: 20px; height: 20px; min-width: 20px; transition: transform .25s; color: var(--muted); }
    .faq-item.open .faq-chevron { transform: rotate(180deg); }
    .faq-a { max-height: 0; overflow: hidden; transition: max-height .3s ease; }
    .faq-item.open .faq-a { max-height: 300px; }
    .faq-a-inner { padding: 0 20px 18px; font-size: 14px; color: #475569; line-height: 1.7; }

    @media (max-width: 1120px) { .pricing-grid { grid-template-columns: repeat(2, 1fr); } .p-card.popular { transform: none; } }
    @media (max-width: 720px) { .pricing-grid { grid-template-columns: 1fr; } .toggle button { min-width: 100px; } table { min-width: 700px; } }
    CSS;
@endphp

@section('content')
    <!-- ═══ HERO ═══ -->
    <section class="pricing-hero">
    <div class="container">
        <div class="eyebrow">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        Transparent pricing · no setup fees
        </div>
        <h1>Simple pricing that scales<br>with your training program</h1>
        <p class="hero-sub">Every plan includes all core LMS features. Choose a tier based on your active learner count and unlock prebuilt catalog courses with annual billing.</p>
        <div class="active-user-callout">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
        Pay only for active users — not total users added
        </div>
        <div class="billing-wrap">
        <div class="toggle" role="tablist" aria-label="Billing toggle">
            <button id="monthlyBtn" class="active" type="button">Monthly</button>
            <button id="yearlyBtn" type="button">Yearly</button>
        </div>
        <div class="save-pill">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
            Save 20% with yearly billing
        </div>
        </div>
    </div>
    </section>

    <!-- ═══ PRICING CARDS ═══ -->
    <section class="container" aria-label="Pricing plans">
    <div class="pricing-grid">
        <?php
        $plans = [
        ['id'=>'launch','name'=>'Launch','tag'=>'Start lean. Scale fast.','sub'=>'For smaller organizations getting started with structured training.','users'=>'1–100','courses'=>'3','cta'=>'Get Started','ctaClass'=>'p-cta','selId'=>'launchUsers'],
        ['id'=>'grow','name'=>'Grow','tag'=>'Most teams start here','sub'=>'For expanding organizations needing more capacity and flexibility.','users'=>'101–500','courses'=>'7','cta'=>'Request Demo','ctaClass'=>'p-cta primary','selId'=>'growUsers','popular'=>true],
        ['id'=>'pro','name'=>'Pro','tag'=>'Built for scale','sub'=>'For high-growth programs with larger user volumes.','users'=>'501–1,000','courses'=>'15','cta'=>'Talk to Sales','ctaClass'=>'p-cta','selId'=>'proUsers'],
        ];
        foreach ($plans as $p):
        ?>
        <article class="p-card<?php echo !empty($p['popular']) ? ' popular' : ''; ?>" id="<?php echo $p['id']; ?>Card">
        <?php if (!empty($p['popular'])): ?><div class="p-badge">MOST POPULAR</div><?php endif; ?>
        <div class="p-card-top">
            <div class="plan-name"><?php echo $p['name']; ?></div>
            <div class="plan-sub"><?php echo $p['sub']; ?></div>
            <label class="sel-label" for="<?php echo $p['selId']; ?>">Active users</label>
            <select id="<?php echo $p['selId']; ?>"></select>
            <div class="price-area">
            <div class="price"><span class="amount" id="<?php echo $p['id']; ?>Price">—</span><span class="per">/ month</span></div>
            <div class="price-strike" id="<?php echo $p['id']; ?>Strike"></div>
            <div class="billing-note" id="<?php echo $p['id']; ?>BillingNote">Billed monthly</div>
            <div class="mini-callout">Choose any <?php echo $p['courses']; ?> courses with yearly billing</div>
            </div>
        </div>
        <div class="p-card-body">
            <div class="feat-title">What's included</div>
            <ul class="feat-list">
            <li><span class="chk">✓</span><span>All core LMS features</span></li>
            <li><span class="chk">✓</span><span><?php echo $p['users']; ?> active users</span></li>
            <li><span class="chk">✓</span><span>Course delivery, tracking &amp; reporting</span></li>
            <li><span class="chk">✓</span><span>AMS integration available</span></li>
            </ul>
            <a class="<?php echo $p['ctaClass']; ?>" href="https://calendly.com/onlinesales-kprise/30min"><?php echo $p['cta']; ?></a>
        </div>
        </article>
        <?php endforeach; ?>

        <article class="p-card enterprise">
        <div class="p-card-top">
            <div class="plan-name">Enterprise</div>
            <div class="plan-sub">For organizations needing a fully custom solution at scale.</div>
            <div class="price-area">
            <div class="price"><span class="amount">Custom</span></div>
            <div class="billing-note">Tailored pricing for your organization</div>
            <div class="mini-callout">Full course library (28 courses) included</div>
            </div>
        </div>
        <div class="p-card-body">
            <div class="feat-title">What's included</div>
            <ul class="feat-list">
            <li><span class="chk">✓</span><span>All LMS features + custom features</span></li>
            <li><span class="chk">✓</span><span>1,000+ active users / custom volume</span></li>
            <li><span class="chk">✓</span><span>All 28 prebuilt courses included</span></li>
            <li><span class="chk">✓</span><span>Dedicated support &amp; implementation</span></li>
            </ul>
            <a class="p-cta" href="https://calendly.com/onlinesales-kprise/30min">Contact Sales</a>
        </div>
        </article>
    </div>
    </section>

    <!-- ═══ COMPARE ═══ -->
    <section class="compare-section">
    <div class="container">
        <h2>Compare plans at a glance</h2>
        <p>All plans include the full LMS platform. Choose your tier based on active user count and course needs.</p>
        <div class="compare-box">
        <table>
            <thead><tr><th>Plan details</th><th>Launch</th><th>Grow</th><th>Pro</th><th>Enterprise</th></tr></thead>
            <tbody>
            <tr><td>Active user range</td><td>1–100</td><td>101–500</td><td>501–1,000</td><td>1,000+ / Custom</td></tr>
            <tr><td>Starting price (annual)</td><td>$63/mo</td><td>$119/mo</td><td>$223/mo</td><td>Custom</td></tr>
            <tr><td>Core LMS features</td><td>All included</td><td>All included</td><td>All included</td><td>All + custom</td></tr>
            <tr><td>Courses included (annual)</td><td>Choose 3</td><td>Choose 7</td><td>Choose 15</td><td>Full library (28)</td></tr>
            <tr><td>AMS integration</td><td>Available</td><td>Included</td><td>Included</td><td>Custom</td></tr>
            <tr><td>Support level</td><td>Standard</td><td>Priority</td><td>Advanced</td><td>Dedicated</td></tr>
            <tr><td>Yearly discount</td><td>20% off</td><td>20% off</td><td>20% off</td><td>Custom</td></tr>
            <tr><td>Best for</td><td>New programs</td><td>Growing orgs / Associations</td><td>Multi-team</td><td>Enterprise scale</td></tr>
            </tbody>
        </table>
        </div>
        <div class="footnote">Active user pricing means you only pay for users who engage during each billing cycle. Plans start at $79/mo billed monthly or $63/mo billed annually.</div>
    </div>
    </section>

    <!-- ═══ FAQ (with FAQPage schema) ═══ -->
    <section class="faq-section" id="faq" aria-label="Pricing frequently asked questions">
    <div class="container">
        <h2>Frequently asked questions</h2>
        <p>Everything you need to know about pricing, billing, and plan flexibility.</p>
        <div class="faq-list">
        <?php foreach ($faq_items as $faq): ?>
        <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <button class="faq-q" onclick="toggleFaq(this)">
            <span itemprop="name"><?php echo htmlspecialchars($faq[0]); ?></span>
            <svg class="faq-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
            </button>
            <div class="faq-a" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
            <div class="faq-a-inner" itemprop="text"><?php echo htmlspecialchars($faq[1]); ?></div>
            </div>
        </div>
        <?php endforeach; ?>
        </div>
    </div>
    </section>

    <script>
    const monthly = {
        launch: [{label:'1–40 active users',price:79},{label:'41–70 active users',price:104},{label:'71–100 active users',price:129}],
        grow: [{label:'101–150 active users',price:149},{label:'151–200 active users',price:163},{label:'201–250 active users',price:178},{label:'251–300 active users',price:192},{label:'301–350 active users',price:206},{label:'351–400 active users',price:220},{label:'401–450 active users',price:235},{label:'451–500 active users',price:249}],
        pro: [{label:'501–600 active users',price:279},{label:'601–700 active users',price:359},{label:'701–800 active users',price:439},{label:'801–900 active users',price:519},{label:'901–1,000 active users',price:599}]
    };
    let currentBilling='monthly';
    function yearlyFromMonthly(p){return Math.round(p*0.8)}
    function populateSelect(id,items){const el=document.getElementById(id);el.innerHTML='';items.forEach((item,i)=>{const o=document.createElement('option');o.value=i;o.textContent=item.label;el.appendChild(o)})}
    function updatePlan(k,sId,pId,nId,stId){const idx=document.getElementById(sId).value||0;const mp=monthly[k][idx].price;const yp=yearlyFromMonthly(mp);const sp=currentBilling==='yearly'?yp:mp;document.getElementById(pId).textContent='$'+sp;document.getElementById(nId).textContent=currentBilling==='yearly'?'Billed yearly · Save 20%':'Billed monthly';document.getElementById(stId).textContent=currentBilling==='yearly'?'$'+mp+'/mo regular price':''}
    function refreshAll(){updatePlan('launch','launchUsers','launchPrice','launchBillingNote','launchStrike');updatePlan('grow','growUsers','growPrice','growBillingNote','growStrike');updatePlan('pro','proUsers','proPrice','proBillingNote','proStrike');document.getElementById('monthlyBtn').classList.toggle('active',currentBilling==='monthly');document.getElementById('yearlyBtn').classList.toggle('active',currentBilling==='yearly')}
    populateSelect('launchUsers',monthly.launch);populateSelect('growUsers',monthly.grow);populateSelect('proUsers',monthly.pro);
    ['launchUsers','growUsers','proUsers'].forEach(id=>{document.getElementById(id).addEventListener('change',refreshAll)});
    document.getElementById('monthlyBtn').addEventListener('click',()=>{currentBilling='monthly';refreshAll()});
    document.getElementById('yearlyBtn').addEventListener('click',()=>{currentBilling='yearly';refreshAll()});
    refreshAll();
    function toggleFaq(btn){const item=btn.closest('.faq-item');const wasOpen=item.classList.contains('open');document.querySelectorAll('.faq-item.open').forEach(el=>el.classList.remove('open'));if(!wasOpen)item.classList.add('open')}
    </script>
@endsection
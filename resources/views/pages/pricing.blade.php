{{--
    Page: Pricing
    Route: pricing
    Controller: PricingController@index
--}}

@extends('layouts.app')

@section('content')
    <main>
        <!-- ================================================================
            HERO
        ================================================================ -->
        <section class="pricing-hero">
        <div class="pricing-hero__inner">
            <div class="eyebrow-pill">Strategic Value Architecture</div>
            <h1>Future proof your training<br><span class="highlight">infrastructure</span></h1>
            <p>Eliminate the burden of unused licenses. Our active engagement model ensures your budget scales precisely with participation, delivering measurable ROI for every learner.</p>

            <div class="billing-toggle-wrap">
            <span class="toggle-label active" id="btn-monthly">Monthly</span>
            <div class="toggle-track" id="billing-toggle" role="switch" aria-checked="true" tabindex="0">
                <div class="toggle-thumb" id="toggle-thumb"></div>
            </div>
            <span class="toggle-label" id="btn-yearly">
                Yearly &nbsp;<span class="save-badge">Save 20%</span>
            </span>
            </div>
        </div>
        </section>

        <!-- ================================================================
            PRICING GRID
        ================================================================ -->
        <section class="pricing-section">
        <div class="container">
            <div class="pricing-grid" id="pricing-grid">

            <!-- LAUNCH -->
            <div class="pricing-card">
                <div class="card-header">
                <div class="card-name">Launch</div>
                <p class="card-desc">Foundation for agile teams starting their learning culture.</p>
                <div class="user-select-wrap">
                    <label>Active Users</label>
                    <select id="launch-select">
                    <option value="40">1 to 40 users</option>
                    <option value="70">41 to 70 users</option>
                    <option value="100">71 to 100 users</option>
                    </select>
                </div>
                </div>
                <div class="card-price">
                <div class="price-amount">
                    <span class="currency">$</span>
                    <span id="launch-price">63</span>
                    <span class="price-period">/mo</span>
                </div>
                <p class="price-billing-note" id="launch-billing">Billed annually</p>
                </div>
                <ul class="card-features">
                <li><div class="feature-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="2 6 5 9 10 3"/></svg></div>Core LMS Ecosystem</li>
                <li><div class="feature-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="2 6 5 9 10 3"/></svg></div>Course Delivery and Reporting</li>
                <li><div class="feature-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="2 6 5 9 10 3"/></svg></div>Standard Support</li>
                </ul>
                <button class="btn btn--outline btn--block">Start Building</button>
            </div>

            <!-- GROW (featured) -->
            <div class="pricing-card pricing-card--featured">
                <div class="card-badge">Most Popular</div>
                <div class="card-header">
                <div class="card-name">Grow</div>
                <p class="card-desc">Powering high growth organizations with advanced automation.</p>
                <div class="user-select-wrap">
                    <label>Active Users</label>
                    <select id="grow-select">
                    <option value="150">101 to 150 users</option>
                    <option value="250">151 to 250 users</option>
                    <option value="500">251 to 500 users</option>
                    </select>
                </div>
                </div>
                <div class="card-price">
                <div class="price-amount">
                    <span class="currency">$</span>
                    <span id="grow-price">199</span>
                    <span class="price-period">/mo</span>
                </div>
                <p class="price-billing-note" id="grow-billing">Billed annually</p>
                </div>
                <ul class="card-features">
                <li class="featured-item"><div class="feature-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="2 6 5 9 10 3"/></svg></div>Everything in Launch</li>
                <li><div class="feature-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="2 6 5 9 10 3"/></svg></div>Priority Response</li>
                <li><div class="feature-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="2 6 5 9 10 3"/></svg></div>Custom Branding</li>
                <li><div class="feature-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="2 6 5 9 10 3"/></svg></div>Multi Team Access</li>
                </ul>
                <button class="btn btn--primary btn--block">Scale Now</button>
            </div>

            <!-- PRO -->
            <div class="pricing-card">
                <div class="card-header">
                <div class="card-name">Pro</div>
                <p class="card-desc">Enterprise grade depth for complex training needs.</p>
                <div class="user-select-wrap">
                    <label>Active Users</label>
                    <select id="pro-select">
                    <option value="700">501 to 700 users</option>
                    <option value="850">701 to 850 users</option>
                    <option value="1000">851 to 1,000 users</option>
                    </select>
                </div>
                </div>
                <div class="card-price">
                <div class="price-amount">
                    <span class="currency">$</span>
                    <span id="pro-price">639</span>
                    <span class="price-period">/mo</span>
                </div>
                <p class="price-billing-note" id="pro-billing">Billed annually</p>
                </div>
                <ul class="card-features">
                <li class="featured-item"><div class="feature-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="2 6 5 9 10 3"/></svg></div>Everything in Grow</li>
                <li><div class="feature-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="2 6 5 9 10 3"/></svg></div>BI Data Integration</li>
                <li><div class="feature-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="2 6 5 9 10 3"/></svg></div>Full API Suite</li>
                </ul>
                <button class="btn btn--outline btn--block">Go Unlimited</button>
            </div>

            <!-- ENTERPRISE -->
            <div class="pricing-card">
                <div class="card-header">
                <div class="card-name">Enterprise</div>
                <p class="card-desc">Global scale with dedicated strategic partnership.</p>
                </div>
                <div class="card-price">
                <div class="price-amount" style="font-size:2rem;">Custom</div>
                <p class="price-billing-note">Volume based pricing</p>
                </div>
                <ul class="card-features">
                <li><div class="feature-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="2 6 5 9 10 3"/></svg></div>Unlimited Active Users</li>
                <li><div class="feature-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="2 6 5 9 10 3"/></svg></div>CSM Implementation</li>
                <li><div class="feature-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="2 6 5 9 10 3"/></svg></div>SAML and Security Audits</li>
                <li><div class="feature-check"><svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="2 6 5 9 10 3"/></svg></div>Global SLA Support</li>
                </ul>
                <button class="btn btn--outline btn--block" style="border-color:var(--color-primary);color:var(--color-primary);" onmouseover="this.style.background='var(--color-primary)';this.style.color='var(--color-white)';" onmouseout="this.style.background='transparent';this.style.color='var(--color-primary)';">Contact Sales</button>
            </div>

            </div>
        </div>
        </section>

        <!-- ================================================================
            BONUS LIBRARY
        ================================================================ -->
        <section class="bonus-section">
        <div class="container">
            <div class="bonus-card">
            <div class="bonus-grid">
                <div>
                <div class="bonus-eyebrow">Annual Bonus</div>
                <h2 class="bonus-title">Unlock the Strategic<br>Course Catalog</h2>
                <p class="bonus-desc">Secure your training budget annually and get instant access to our curated library of premium content. Expertly crafted courses to keep your workforce compliant and ahead of the curve.</p>
                <div class="bonus-cats">
                    <div class="bonus-cat">
                    <div class="bonus-cat-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <span class="bonus-cat-name">Compliance</span>
                    </div>
                    <div class="bonus-cat">
                    <div class="bonus-cat-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
                    </div>
                    <span class="bonus-cat-name">AI Skills</span>
                    </div>
                    <div class="bonus-cat">
                    <div class="bonus-cat-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
                    </div>
                    <span class="bonus-cat-name">Workplace</span>
                    </div>
                </div>
                </div>
                <div class="bonus-counts">
                <div class="bonus-count-card" id="launch-bonus">
                    <div class="bonus-count-tier">Launch Tier</div>
                    <div class="bonus-count-num">3</div>
                    <div class="bonus-count-label">Premium Courses</div>
                </div>
                <div class="bonus-count-card" id="grow-bonus">
                    <div class="bonus-count-tier">Grow Tier</div>
                    <div class="bonus-count-num">7</div>
                    <div class="bonus-count-label">Premium Courses</div>
                </div>
                <div class="bonus-count-card" id="pro-bonus">
                    <div class="bonus-count-tier">Pro Tier</div>
                    <div class="bonus-count-num">15</div>
                    <div class="bonus-count-label">Premium Courses</div>
                </div>
                <div class="bonus-count-card bonus-count-card--primary">
                    <div class="bonus-count-tier">Enterprise</div>
                    <div class="bonus-count-num">All 28</div>
                    <div class="bonus-count-label">Full Library Access</div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>

        <!-- ================================================================
            ROI CALCULATOR
        ================================================================ -->
        <section class="roi-section" id="roi-calculator">
        <div class="container">
            <div class="roi-card">
            <div class="roi-header">
                <div class="roi-eyebrow">Value Impact Assessment</div>
                <h2 class="roi-title">The Real Cost of Wasted Seats</h2>
                <p class="roi-desc">Stop subsidizing empty accounts. Compare our activity-based architecture against legacy volume pricing and visualize your reclaimed budget.</p>
            </div>
            <div class="roi-grid">
                <!-- Controls -->
                <div class="roi-controls">
                <div class="roi-controls-row">
                    <div>
                    <label class="form-label" for="calc-tier">Target Kprise Tier
                        <span class="form-label-hint">Available active user capacity varies by tier.</span>
                    </label>
                    <select class="form-select" id="calc-tier">
                        <option value="launch">Launch Tier</option>
                        <option value="grow" selected>Grow Tier</option>
                        <option value="pro">Pro Tier</option>
                    </select>
                    </div>
                    <div>
                    <label class="form-label" for="competitor-price">Competitor Price Per Seat</label>
                    <div class="input-prefix-wrap">
                        <span class="input-prefix">$</span>
                        <input class="form-input" type="number" id="competitor-price" value="4.50" step="0.10"/>
                    </div>
                    </div>
                </div>

                <div class="slider-box">
                    <div class="slider-row">
                    <div class="slider-top">
                        <label class="form-label" style="margin:0;">Total Workforce Size</label>
                        <span class="slider-val-badge" id="total-display">800</span>
                    </div>
                    <input type="range" id="total-range" min="50" max="1000" step="10" value="800"/>
                    </div>
                    <div class="slider-row">
                    <div class="slider-top">
                        <label class="form-label" style="margin:0;">Projected Monthly Active Users</label>
                        <span class="slider-val-badge" id="active-display">200</span>
                    </div>
                    <input type="range" id="active-range" min="1" max="500" step="1" value="200"/>
                    <p class="slider-hint">Industry standard activity benchmarks typically range from 20% to 45%.</p>
                    </div>
                </div>
                </div>

                <!-- Results -->
                <div class="roi-result-card">
                <div class="roi-result-top">
                    <div>
                    <p class="roi-main-cost-label">Your Adjusted Monthly Fee</p>
                    <div class="roi-main-cost" id="kprise-cost">$130</div>
                    <p class="roi-main-sub">Billed to your active engagement</p>
                    </div>
                    <div class="roi-savings-badge">
                    <div class="roi-savings-pct" id="savings-pct">96%</div>
                    <div class="roi-savings-word">Saved</div>
                    </div>
                </div>
                <div class="roi-rows">
                    <div class="roi-row">
                    <span class="roi-row-label">Market Standard Charges</span>
                    <span class="roi-row-val crossed" id="trad-cost">$3,600</span>
                    </div>
                    <div class="roi-row roi-row--box">
                    <span class="roi-row-label">Kprise Service Fee</span>
                    <span class="roi-row-val" id="kprise-summary">$130</span>
                    </div>
                    <div class="roi-row">
                    <span class="roi-row-label">Monthly Efficiency Gain</span>
                    <span class="roi-row-val highlight" id="monthly-savings">$3,470</span>
                    </div>
                </div>
                <div class="roi-annual-box">
                    <div class="roi-annual-label">Annual Capital Reclaimed</div>
                    <div class="roi-annual-val" id="annual-savings">$41,640</div>
                </div>
                <button class="btn btn--white btn--block btn--lg">Secure These Savings</button>
                </div>
            </div>
            </div>
        </div>
        </section>

        <!-- ================================================================
            FAQ
        ================================================================ -->
        <section class="faq-section">
        <div class="container">
            <h2 class="faq-title">Overcoming Your Objections</h2>
            <div class="faq-list">

            <details class="faq-item" open>
                <summary>
                Is the free trial really free — no card, no catch?
                <svg class="faq-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </summary>
                <p class="faq-body">Our ninety-day trial is fully featured and requires zero financial commitment upfront. You gain complete access to validate our infrastructure before any commercial agreement begins. There are no hidden fees or automatic transitions to paid tiers.</p>
            </details>

            <details class="faq-item">
                <summary>
                How does pricing work after the trial ends?
                <svg class="faq-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </summary>
                <p class="faq-body">Post trial we implement our active engagement architecture. You select a tier based on your expected monthly participation volume. We never charge for idle accounts or registered users who do not interact with the platform during the billing cycle.</p>
            </details>

            <details class="faq-item">
                <summary>
                Can we migrate our existing courses?
                <svg class="faq-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </summary>
                <p class="faq-body">The migration process is streamlined for global enterprises. We support standard formats and provide white glove implementation services to ensure your historical content and completion records transition seamlessly into the Kprise ecosystem.</p>
            </details>

            <details class="faq-item">
                <summary>
                Do we need an IT team to get started?
                <svg class="faq-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </summary>
                <p class="faq-body">Kprise is a managed cloud solution designed for administrative ease. While we offer deep API integrations for technical teams, our standard configuration requires zero internal development resources to deploy across your organization.</p>
            </details>

            <details class="faq-item">
                <summary>
                Is MyPass LMS secure?
                <svg class="faq-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </summary>
                <p class="faq-body">Security is our primary foundation. We maintain rigorous compliance standards including encryption at rest and in transit. Our identity management protocols ensure that only authorized personnel can access sensitive organizational training data.</p>
            </details>

            <details class="faq-item">
                <summary>
                Can MyPass handle training across multiple teams?
                <svg class="faq-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </summary>
                <p class="faq-body">Our multi-tenant architecture allows you to partition your environment for different departments or subsidiaries. Each team can have unique branding and administrative controls while remaining under a single consolidated billing umbrella.</p>
            </details>

            </div>
        </div>
        </section>

        <!-- ================================================================
            FINAL CTA
        ================================================================ -->
        <section class="final-cta-section">
        <div class="container">
            <div class="final-cta-box">
            <div class="final-cta-inner">
                <h2 class="final-cta-title">Ready to transform your<br>training economy?</h2>
                <p class="final-cta-desc">Join over 2,000 organizations that have eliminated the fiscal waste of empty seats.</p>
                <div class="final-cta-actions">
                <button class="btn btn--white btn--lg">Start Your Free Trial</button>
                <button class="btn btn--lg" style="background:rgba(255,255,255,.12);color:#fff;border-color:rgba(255,255,255,.25);">Talk to Sales</button>
                </div>
                <p class="final-cta-note">90 days full access · 5,000 free credits · No credit card required</p>
            </div>
            </div>
        </div>
    </section>
</main>


<!-- ================================================================
     JAVASCRIPT — Pricing logic (identical to original, no Tailwind deps)
================================================================ -->
<script>
const pricingData = {
  launch: { 40: 79, 70: 104, 100: 129 },
  grow:   { 150: 149, 200: 163, 250: 178, 300: 192, 350: 206, 400: 220, 450: 235, 500: 249 },
  pro:    { 600: 279, 700: 359, 800: 439, 900: 519, 1000: 599 }
};

let isYearly = true;

/* ── Elements ── */
const toggleTrack  = document.getElementById('billing-toggle');
const toggleThumb  = document.getElementById('toggle-thumb');
const btnMonthly   = document.getElementById('btn-monthly');
const btnYearly    = document.getElementById('btn-yearly');
const launchSelect = document.getElementById('launch-select');
const growSelect   = document.getElementById('grow-select');
const proSelect    = document.getElementById('pro-select');
const calcTier     = document.getElementById('calc-tier');
const competitorIn = document.getElementById('competitor-price');
const totalRange   = document.getElementById('total-range');
const activeRange  = document.getElementById('active-range');
const totalDisplay = document.getElementById('total-display');
const activeDisplay= document.getElementById('active-display');

/* ── Billing toggle ── */
function setYearly(yearly) {
  isYearly = yearly;
  if (isYearly) {
    toggleTrack.classList.add('yearly');
    btnYearly.classList.add('active'); btnMonthly.classList.remove('active');
  } else {
    toggleTrack.classList.remove('yearly');
    btnMonthly.classList.add('active'); btnYearly.classList.remove('active');
  }
  updateAllPrices();
}

toggleTrack.addEventListener('click', () => setYearly(!isYearly));
toggleTrack.addEventListener('keydown', e => { if (e.key === ' ' || e.key === 'Enter') { e.preventDefault(); setYearly(!isYearly); } });
btnMonthly.addEventListener('click', () => setYearly(false));
btnYearly.addEventListener('click', () => setYearly(true));

/* ── Price helper ── */
function getPrice(tier, users) {
  const data  = pricingData[tier];
  const breaks = Object.keys(data).map(Number).sort((a,b) => a-b);
  for (const bp of breaks) { if (users <= bp) return data[bp]; }
  return data[breaks[breaks.length-1]];
}

function fmt(n) { return '$' + n.toLocaleString(); }

/* ── Card prices ── */
function updateAllPrices() {
  const d = isYearly ? 0.8 : 1.0;
  const note = isYearly ? 'Billed annually' : 'Billed monthly';
  document.getElementById('launch-price').textContent = Math.round(getPrice('launch', +launchSelect.value) * d);
  document.getElementById('grow-price').textContent   = Math.round(getPrice('grow',  +growSelect.value)   * d);
  document.getElementById('pro-price').textContent    = Math.round(getPrice('pro',   +proSelect.value)    * d);
  ['launch-billing','grow-billing','pro-billing'].forEach(id => document.getElementById(id).textContent = note);
  updateCalculator();
}

/* ── ROI calculator ── */
function updateCalculator() {
  const total     = +totalRange.value;
  const tier      = calcTier.value;
  const compPrice = parseFloat(competitorIn.value) || 0;
  const d         = isYearly ? 0.8 : 1.0;

  const maxActive = tier === 'launch' ? 100 : tier === 'grow' ? 500 : 1000;
  activeRange.max = maxActive;
  if (+activeRange.value > maxActive) activeRange.value = maxActive;
  const active = +activeRange.value;

  totalDisplay.textContent  = total.toLocaleString();
  activeDisplay.textContent = active.toLocaleString();

  const kpriseBase    = getPrice(tier, active);
  const kpriseMonthly = Math.round(kpriseBase * d);
  const tradMonthly   = Math.round(total * compPrice);
  const monthlySave   = tradMonthly - kpriseMonthly;
  const annualSave    = monthlySave * 12;
  const pct           = tradMonthly > 0 ? Math.round((monthlySave / tradMonthly) * 100) : 0;

  document.getElementById('kprise-cost').textContent    = fmt(kpriseMonthly);
  document.getElementById('kprise-summary').textContent = fmt(kpriseMonthly);
  document.getElementById('trad-cost').textContent      = fmt(tradMonthly);
  document.getElementById('monthly-savings').textContent= fmt(monthlySave);
  document.getElementById('annual-savings').textContent = fmt(annualSave);
  document.getElementById('savings-pct').textContent    = pct + '%';
}

/* ── Listeners ── */
[launchSelect, growSelect, proSelect].forEach(s => s.addEventListener('change', updateAllPrices));
[calcTier, competitorIn].forEach(el => el.addEventListener('input', updateCalculator));
[totalRange, activeRange].forEach(el => el.addEventListener('input', updateCalculator));

/* ── Sticky header ── */
window.addEventListener('scroll', () => {
  document.getElementById('site-header').classList.toggle('scrolled', window.scrollY > 10);
}, { passive: true });

/* ── Init ── */
setYearly(true);
</script>

@endsection

@push('styles')

<style>
/* ================================================================
   DESIGN TOKENS — from app.css
================================================================ */
:root {
  --color-primary:        #5932EA;
  --color-primary-dark:   #4220C8;
  --color-primary-light:  #EEE9FD;
  --color-secondary:      #0D0D2B;
  --color-accent:         #00C2A8;
  --color-white:          #FFFFFF;
  --color-gray-50:        #F9F9FC;
  --color-gray-100:       #F1EFF9;
  --color-gray-200:       #E2DEF5;
  --color-gray-400:       #9B96B8;
  --color-gray-600:       #5F5B7A;
  --color-gray-800:       #2D2A4A;
  --color-gray-900:       #0D0D2B;
  --color-text-primary:   #0D0D2B;
  --color-text-secondary: #5F5B7A;
  --color-text-muted:     #9B96B8;
  --color-bg:             #FFFFFF;
  --color-surface:        #F9F9FC;
  --color-border:         #E2DEF5;
  --color-amber:          #F59E0B;
  --color-amber-bg:       #FFF8E6;
  --color-success:        #10B981;
  --color-success-bg:     #ECFDF5;
  --font-display:         'Plus Jakarta Sans', sans-serif;
  --font-body:            'Plus Jakarta Sans', sans-serif;
  --text-xs:    0.75rem;
  --text-sm:    0.875rem;
  --text-base:  1rem;
  --text-lg:    1.125rem;
  --text-xl:    1.25rem;
  --text-2xl:   1.5rem;
  --text-3xl:   1.875rem;
  --text-4xl:   2.25rem;
  --text-5xl:   3rem;
  --leading-tight:   1.15;
  --leading-snug:    1.35;
  --leading-normal:  1.6;
  --leading-relaxed: 1.75;
  --weight-normal:   400;
  --weight-medium:   500;
  --weight-semibold: 600;
  --weight-bold:     700;
  --weight-extrabold:800;
  --space-1:  0.25rem;
  --space-2:  0.5rem;
  --space-3:  0.75rem;
  --space-4:  1rem;
  --space-5:  1.25rem;
  --space-6:  1.5rem;
  --space-8:  2rem;
  --space-10: 2.5rem;
  --space-12: 3rem;
  --space-16: 4rem;
  --space-20: 5rem;
  --space-24: 6rem;
  --radius-sm:   4px;
  --radius-md:   8px;
  --radius-lg:   12px;
  --radius-xl:   16px;
  --radius-2xl:  24px;
  --radius-3xl:  32px;
  --radius-full: 9999px;
  --shadow-sm: 0 1px 3px rgba(13,13,43,.08), 0 1px 2px rgba(13,13,43,.04);
  --shadow-md: 0 4px 16px rgba(13,13,43,.10), 0 2px 6px rgba(13,13,43,.06);
  --shadow-lg: 0 12px 40px rgba(89,50,234,.12), 0 4px 12px rgba(13,13,43,.06);
  --shadow-xl: 0 24px 64px rgba(89,50,234,.16);
  --shadow-card: 0 0 0 1px rgba(226,222,245,.6), 0 8px 24px rgba(13,13,43,.06);
  --transition-fast: 150ms ease;
  --transition-base: 250ms ease;
  --container-max: 1200px;
  --container-pad: 1.5rem;
  --header-height: 68px;
}

/* ================================================================
   HERO SECTION
================================================================ */
.pricing-hero {
  padding: 40px 0 48px;
  text-align: center;
  position: relative; overflow: hidden;
  background:
    radial-gradient(ellipse 80% 60% at 50% -10%,
      rgba(89,50,234,.1) 0%,
      rgba(0,194,168,.05) 45%,
      transparent 70%
    ),
    linear-gradient(180deg, var(--color-gray-50) 0%, var(--color-white) 100%);
}

/* Stripe pattern on sides */
.pricing-hero::before {
  content: ''; position: absolute; top: 0; left: 0;
  width: 180px; height: 100%; pointer-events: none;
  background-image: repeating-linear-gradient(
    90deg, rgba(89,50,234,.09) 0px, rgba(89,50,234,.09) 1px,
    transparent 1px, transparent 20px
  );
  mask-image: linear-gradient(to right, rgba(0,0,0,.6) 0%, transparent 100%);
  -webkit-mask-image: linear-gradient(to right, rgba(0,0,0,.6) 0%, transparent 100%);
}
.pricing-hero::after {
  content: ''; position: absolute; top: 0; right: 0;
  width: 180px; height: 100%; pointer-events: none;
  background-image: repeating-linear-gradient(
    90deg, rgba(89,50,234,.09) 0px, rgba(89,50,234,.09) 1px,
    transparent 1px, transparent 20px
  );
  mask-image: linear-gradient(to left, rgba(0,0,0,.6) 0%, transparent 100%);
  -webkit-mask-image: linear-gradient(to left, rgba(0,0,0,.6) 0%, transparent 100%);
}

.pricing-hero__inner { position: relative; z-index: 1; max-width: 760px; margin: 0 auto; }

.eyebrow-pill {
  display: inline-flex; align-items: center; gap: var(--space-2);
  padding: 5px 14px; border-radius: var(--radius-full);
  background: var(--color-primary-light); color: var(--color-primary);
  border: 1px solid rgba(89,50,234,.2);
  font-size: var(--text-xs); font-weight: var(--weight-bold);
  letter-spacing: .08em; text-transform: uppercase;
  margin-bottom: var(--space-6);
}

.pricing-hero h1 {
  font-family: var(--font-display);
  font-size: clamp(2rem, 5vw, 3.25rem);
  font-weight: var(--weight-extrabold);
  line-height: var(--leading-tight);
  letter-spacing: -0.03em;
  color: var(--color-text-primary);
  margin-bottom: var(--space-5);
}
.pricing-hero h1 .highlight { color: var(--color-primary); }

.pricing-hero p {
  font-size: var(--text-lg); color: var(--color-text-secondary);
  line-height: var(--leading-relaxed);
  max-width: 56ch; margin: 0 auto var(--space-8);
}

/* Billing toggle */
.billing-toggle-wrap {
  display: flex; align-items: center; justify-content: center;
  gap: var(--space-4); margin-bottom: var(--space-2);
}
.toggle-label {
  font-size: var(--text-sm); font-weight: var(--weight-semibold);
  color: var(--color-text-muted); cursor: pointer;
  transition: color var(--transition-fast);
}
.toggle-label.active { color: var(--color-text-primary); }

.toggle-track {
  position: relative; width: 48px; height: 26px;
  background: var(--color-primary-light); border-radius: var(--radius-full);
  border: 1.5px solid rgba(89,50,234,.25); cursor: pointer;
  transition: background var(--transition-base);
  display: flex; align-items: center;
}
.toggle-track.yearly { background: var(--color-primary); border-color: var(--color-primary); }
.toggle-thumb {
  width: 18px; height: 18px; border-radius: 50%;
  background: var(--color-primary); position: absolute; left: 3px;
  transition: transform var(--transition-base), background var(--transition-base);
  box-shadow: 0 1px 4px rgba(0,0,0,.2);
}
.toggle-track.yearly .toggle-thumb { transform: translateX(22px); background: var(--color-white); }

.save-badge {
  display: inline-block; padding: 2px 10px;
  background: var(--color-amber-bg); color: var(--color-amber);
  border: 1px solid rgba(245,158,11,.25);
  border-radius: var(--radius-full);
  font-size: var(--text-xs); font-weight: var(--weight-extrabold);
  text-transform: uppercase; letter-spacing: .06em;
}

/* ================================================================
   PRICING GRID
================================================================ */
.pricing-section {
  padding: var(--space-12) 0 var(--space-20);
  background: var(--color-white);
}

.pricing-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-5);
  align-items: start;
}

/* Pricing Card */
.pricing-card {
  background: var(--color-white);
  border: 1px solid var(--color-border);
  border-radius: var(--radius-2xl);
  padding: var(--space-8);
  display: flex; flex-direction: column;
  box-shadow: var(--shadow-card);
  position: relative;
  transition: box-shadow var(--transition-base), transform var(--transition-base);
}
.pricing-card:hover {
  box-shadow: var(--shadow-lg);
  transform: translateY(-2px);
}

/* Featured card */
.pricing-card--featured {
  border: 2px solid var(--color-primary);
  transform: scale(1.03);
  box-shadow: var(--shadow-xl);
  z-index: 1;
}
.pricing-card--featured:hover { transform: scale(1.03) translateY(-2px); }
.pricing-card--featured::before {
  content: ''; position: absolute; inset: -3px;
  border-radius: calc(var(--radius-2xl) + 3px); z-index: -1;
  background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
  opacity: .18;
}

.card-badge {
  display: inline-flex; align-items: center;
  position: absolute; top: -13px; left: 50%; transform: translateX(-50%);
  padding: 4px 14px; border-radius: var(--radius-full);
  background: var(--color-primary); color: var(--color-white);
  font-size: var(--text-xs); font-weight: var(--weight-bold);
  text-transform: uppercase; letter-spacing: .08em;
  white-space: nowrap;
}

.card-header { margin-bottom: var(--space-6); }
.card-name {
  font-family: var(--font-display);
  font-size: var(--text-xl); font-weight: var(--weight-bold);
  color: var(--color-text-primary); margin-bottom: var(--space-2);
  display: flex; align-items: center; justify-content: space-between;
}
.card-desc {
  font-size: var(--text-sm); color: var(--color-text-secondary);
  line-height: var(--leading-relaxed); margin-bottom: var(--space-5);
}

.user-select-wrap label {
  display: block; font-size: 10px; font-weight: var(--weight-bold);
  text-transform: uppercase; letter-spacing: .08em;
  color: var(--color-text-muted); margin-bottom: var(--space-2);
}
.user-select-wrap select {
  width: 100%; padding: var(--space-2) var(--space-3);
  background: var(--color-gray-50); border: 1px solid var(--color-border);
  border-radius: var(--radius-md); font-size: var(--text-sm);
  font-weight: var(--weight-semibold); color: var(--color-text-primary);
  cursor: pointer; outline: none; appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%235F5B7A'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
  background-repeat: no-repeat; background-position: right 10px center; background-size: 14px;
  padding-right: 32px;
  transition: border-color var(--transition-fast);
}
.user-select-wrap select:focus { border-color: var(--color-primary); }

.card-price { margin-bottom: var(--space-8); }
.price-amount {
  font-family: var(--font-display);
  font-size: 2.5rem; font-weight: var(--weight-extrabold);
  color: var(--color-text-primary); line-height: 1;
  display: flex; align-items: baseline; gap: 4px;
}
.price-amount .currency { font-size: var(--text-xl); font-weight: var(--weight-bold); }
.price-period { font-size: var(--text-sm); color: var(--color-text-muted); font-weight: var(--weight-normal); }
.price-billing-note {
  font-size: var(--text-xs); color: var(--color-primary);
  font-weight: var(--weight-semibold); margin-top: var(--space-1);
}

.card-features { flex: 1; margin-bottom: var(--space-8); }
.card-features li {
  display: flex; align-items: flex-start; gap: var(--space-3);
  padding: var(--space-2) 0; font-size: var(--text-sm);
  color: var(--color-text-secondary); line-height: var(--leading-snug);
}
.card-features li.featured-item { color: var(--color-text-primary); font-weight: var(--weight-semibold); }
.feature-check {
  width: 18px; height: 18px; border-radius: 50%;
  background: var(--color-primary-light); color: var(--color-primary);
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0; margin-top: 1px;
}
.feature-check svg { width: 10px; height: 10px; }

/* ================================================================
   BONUS LIBRARY SECTION
================================================================ */
.bonus-section {
  padding: 0 0 var(--space-24);
  background: var(--color-white);
}

.bonus-card {
  background: var(--color-white); border: 1px solid rgba(89,50,234,.12);
  border-radius: var(--radius-3xl);
  padding: var(--space-16);
  box-shadow: var(--shadow-lg);
  position: relative; overflow: hidden;
}
.bonus-card::before {
  content: ''; position: absolute; top: -80px; right: -80px;
  width: 280px; height: 280px; border-radius: 50%;
  background: radial-gradient(circle, rgba(89,50,234,.06) 0%, transparent 70%);
  pointer-events: none;
}

.bonus-grid { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-12); align-items: center; }

.bonus-eyebrow {
  display: inline-block; padding: 4px 12px; border-radius: var(--radius-full);
  background: var(--color-amber-bg); color: var(--color-amber);
  border: 1px solid rgba(245,158,11,.2);
  font-size: var(--text-xs); font-weight: var(--weight-extrabold);
  text-transform: uppercase; letter-spacing: .08em; margin-bottom: var(--space-4);
}

.bonus-title {
  font-family: var(--font-display);
  font-size: clamp(var(--text-2xl), 3vw, var(--text-4xl));
  font-weight: var(--weight-extrabold); line-height: var(--leading-tight);
  color: var(--color-text-primary); letter-spacing: -0.02em;
  margin-bottom: var(--space-6);
}

.bonus-desc {
  font-size: var(--text-base); color: var(--color-text-secondary);
  line-height: var(--leading-relaxed); margin-bottom: var(--space-8);
}

.bonus-cats { display: grid; grid-template-columns: repeat(3,1fr); gap: var(--space-6); }
.bonus-cat {
  display: flex; flex-direction: column; gap: var(--space-2);
}
.bonus-cat-icon {
  width: 40px; height: 40px; border-radius: var(--radius-md);
  background: var(--color-primary-light);
  display: flex; align-items: center; justify-content: center;
}
.bonus-cat-icon svg { width: 20px; height: 20px; color: var(--color-primary); }
.bonus-cat-name { font-size: var(--text-sm); font-weight: var(--weight-bold); color: var(--color-text-primary); }

/* Course count cards */
.bonus-counts { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4); }
.bonus-count-card {
  padding: var(--space-8); border-radius: var(--radius-2xl);
  background: var(--color-gray-50); border: 1px solid var(--color-border);
  text-align: center;
  transition: box-shadow var(--transition-base), background var(--transition-base);
  display: flex; flex-direction: column; align-items: center; justify-content: center;
}
.bonus-count-card:hover { box-shadow: var(--shadow-md); }
.bonus-count-card--primary {
  background: var(--color-primary); border-color: var(--color-primary);
  box-shadow: var(--shadow-xl);
}
.bonus-count-tier {
  font-size: 10px; font-weight: var(--weight-extrabold);
  text-transform: uppercase; letter-spacing: .08em;
  color: var(--color-primary); margin-bottom: var(--space-2);
}
.bonus-count-card--primary .bonus-count-tier { color: rgba(255,255,255,.7); }
.bonus-count-num {
  font-family: var(--font-display); font-size: 2.5rem; font-weight: var(--weight-extrabold);
  color: var(--color-text-primary); line-height: 1; margin-bottom: var(--space-1);
}
.bonus-count-card--primary .bonus-count-num { color: var(--color-white); }
.bonus-count-label { font-size: var(--text-xs); font-weight: var(--weight-bold); color: var(--color-text-muted); }
.bonus-count-card--primary .bonus-count-label { color: rgba(255,255,255,.7); }

/* ================================================================
   ROI CALCULATOR
================================================================ */
.roi-section {
  padding: var(--space-24) 0;
  background: var(--color-gray-50);
}

.roi-card {
  background: var(--color-white); border: 1px solid var(--color-border);
  border-radius: var(--radius-3xl);
  padding: var(--space-12);
  box-shadow: 0 20px 60px rgba(13,13,43,.08);
}

.roi-header { text-align: center; margin-bottom: var(--space-12); }
.roi-eyebrow {
  display: inline-block; padding: 5px 16px; border-radius: var(--radius-full);
  background: var(--color-primary-light); color: var(--color-primary);
  border: 1px solid rgba(89,50,234,.2);
  font-size: var(--text-xs); font-weight: var(--weight-bold);
  text-transform: uppercase; letter-spacing: .08em; margin-bottom: var(--space-4);
}
.roi-title {
  font-family: var(--font-display); font-size: clamp(var(--text-2xl), 3.5vw, var(--text-4xl));
  font-weight: var(--weight-extrabold); color: var(--color-primary);
  letter-spacing: -0.02em; margin-bottom: var(--space-4);
}
.roi-desc { font-size: var(--text-base); color: var(--color-text-secondary); max-width: 56ch; margin: 0 auto; }

.roi-grid { display: grid; grid-template-columns: 7fr 5fr; gap: var(--space-12); align-items: start; }

/* Controls */
.roi-controls { display: flex; flex-direction: column; gap: var(--space-8); }
.roi-controls-row { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-6); }

.form-label {
  display: block; font-size: var(--text-sm); font-weight: var(--weight-bold);
  color: var(--color-text-primary); margin-bottom: var(--space-2);
}
.form-label-hint { font-size: var(--text-xs); color: var(--color-text-muted); font-weight: var(--weight-normal); display: block; margin-top: var(--space-1); }

.form-select, .form-input {
  width: 100%; padding: var(--space-3) var(--space-4);
  background: var(--color-gray-50); border: 1.5px solid var(--color-border);
  border-radius: var(--radius-lg); font-size: var(--text-sm);
  font-weight: var(--weight-semibold); color: var(--color-text-primary);
  outline: none; transition: border-color var(--transition-fast);
}
.form-select { appearance: none; cursor: pointer;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%235F5B7A'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
  background-repeat: no-repeat; background-position: right 12px center; background-size: 14px;
  padding-right: 36px;
}
.form-select:focus, .form-input:focus { border-color: var(--color-primary); }

.input-prefix-wrap { position: relative; }
.input-prefix { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--color-text-muted); font-weight: var(--weight-bold); font-size: var(--text-sm); }
.input-prefix-wrap .form-input { padding-left: 26px; }

.slider-box {
  background: var(--color-gray-50); border: 1px solid var(--color-border);
  border-radius: var(--radius-xl); padding: var(--space-6);
  display: flex; flex-direction: column; gap: var(--space-8);
}
.slider-row {}
.slider-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--space-4); }
.slider-val-badge {
  padding: 4px 12px; border-radius: var(--radius-lg);
  background: var(--color-primary-light); color: var(--color-primary);
  font-size: var(--text-sm); font-weight: var(--weight-extrabold);
}
.slider-hint { font-size: var(--text-xs); color: var(--color-text-muted); margin-top: var(--space-2); }

/* Range input */
input[type="range"] {
  width: 100%; height: 6px; border-radius: var(--radius-full);
  background: var(--color-gray-200); outline: none;
  -webkit-appearance: none; appearance: none; cursor: pointer;
}
input[type="range"]::-webkit-slider-thumb {
  -webkit-appearance: none; width: 18px; height: 18px;
  border-radius: 50%; background: var(--color-primary);
  box-shadow: 0 0 0 3px rgba(89,50,234,.2);
  cursor: pointer; transition: box-shadow var(--transition-fast);
}
input[type="range"]::-webkit-slider-thumb:hover { box-shadow: 0 0 0 5px rgba(89,50,234,.2); }
input[type="range"]::-moz-range-thumb {
  width: 18px; height: 18px; border-radius: 50%;
  background: var(--color-primary); border: none;
  box-shadow: 0 0 0 3px rgba(89,50,234,.2); cursor: pointer;
}

/* Results card */
.roi-result-card {
  background: var(--color-primary);
  border-radius: var(--radius-2xl);
  padding: var(--space-8);
  color: var(--color-white);
  position: relative; overflow: hidden;
  box-shadow: var(--shadow-xl);
}
.roi-result-card::before {
  content: ''; position: absolute; top: -48px; right: -48px;
  width: 180px; height: 180px; border-radius: 50%;
  background: rgba(255,255,255,.08); pointer-events: none;
}

.roi-result-top { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--space-8); }
.roi-main-cost-label { font-size: 10px; font-weight: var(--weight-bold); text-transform: uppercase; letter-spacing: .1em; color: rgba(255,255,255,.6); margin-bottom: var(--space-2); }
.roi-main-cost {
  font-family: var(--font-display); font-size: 2.8rem; font-weight: var(--weight-extrabold);
  line-height: 1; color: var(--color-white);
}
.roi-main-sub { font-size: var(--text-xs); color: rgba(255,255,255,.45); margin-top: 4px; }

.roi-savings-badge {
  background: var(--color-amber-bg); color: var(--color-amber);
  border-radius: var(--radius-xl); padding: var(--space-3) var(--space-3);
  text-align: center; min-width: 64px; flex-shrink: 0;
}
.roi-savings-pct { font-size: var(--text-lg); font-weight: var(--weight-extrabold); line-height: 1; }
.roi-savings-word { font-size: 9px; font-weight: var(--weight-bold); text-transform: uppercase; letter-spacing: .06em; }

.roi-rows {
  display: flex; flex-direction: column; gap: var(--space-3);
  padding: var(--space-8) 0; border-top: 1px solid rgba(255,255,255,.12);
  margin-bottom: var(--space-6);
}
.roi-row { display: flex; justify-content: space-between; align-items: center; }
.roi-row-label { font-size: var(--text-sm); color: rgba(255,255,255,.6); }
.roi-row-val { font-size: var(--text-sm); font-weight: var(--weight-bold); color: var(--color-white); }
.roi-row-val.crossed { text-decoration: line-through; opacity: .45; }
.roi-row-val.highlight { color: #A7F3D0; font-size: var(--text-base); }
.roi-row--box { background: rgba(255,255,255,.07); border-radius: var(--radius-md); padding: var(--space-3) var(--space-4); }

.roi-annual-box {
  background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.15);
  border-radius: var(--radius-xl); padding: var(--space-6); text-align: center;
  margin-bottom: var(--space-6);
}
.roi-annual-label { font-size: 10px; font-weight: var(--weight-bold); text-transform: uppercase; letter-spacing: .1em; color: rgba(255,255,255,.5); margin-bottom: var(--space-2); }
.roi-annual-val { font-family: var(--font-display); font-size: 2rem; font-weight: var(--weight-extrabold); color: var(--color-white); }

/* ================================================================
   FAQ
================================================================ */
.faq-section { padding: var(--space-24) 0; background: var(--color-white); border-top: 1px solid var(--color-border); }
.faq-title {
  font-family: var(--font-display); text-align: center;
  font-size: clamp(var(--text-2xl), 3vw, var(--text-4xl));
  font-weight: var(--weight-extrabold); color: var(--color-primary);
  margin-bottom: var(--space-12); letter-spacing: -0.02em;
}
.faq-list { display: flex; flex-direction: column; gap: var(--space-3); max-width: 760px; margin: 0 auto; }
.faq-item {
  background: var(--color-gray-50); border: 1px solid var(--color-border);
  border-radius: var(--radius-xl); overflow: hidden;
  transition: border-color var(--transition-base);
}
.faq-item[open] { border-color: rgba(89,50,234,.25); }
.faq-item summary {
  display: flex; justify-content: space-between; align-items: center;
  padding: var(--space-5) var(--space-6);
  font-size: var(--text-base); font-weight: var(--weight-bold);
  color: var(--color-text-primary); cursor: pointer; list-style: none;
  gap: var(--space-4);
}
.faq-item summary::-webkit-details-marker { display: none; }
.faq-chevron {
  width: 20px; height: 20px; flex-shrink: 0;
  color: var(--color-text-muted); transition: transform var(--transition-base);
}
.faq-item[open] .faq-chevron { transform: rotate(180deg); color: var(--color-primary); }
.faq-body {
  padding: 0 var(--space-6) var(--space-5);
  font-size: var(--text-sm); color: var(--color-text-secondary);
  line-height: var(--leading-relaxed);
}

/* ================================================================
   FINAL CTA
================================================================ */
.final-cta-section { padding: var(--space-16) 0 var(--space-20); background: var(--color-gray-50); }
.final-cta-box {
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  border-radius: var(--radius-3xl);
  padding: var(--space-20);
  text-align: center; position: relative; overflow: hidden;
  box-shadow: 0 20px 60px rgba(89,50,234,.35);
}
.final-cta-box::before {
  content: ''; position: absolute; top: -80px; right: -80px;
  width: 320px; height: 320px; border-radius: 50%;
  background: rgba(255,255,255,.08); pointer-events: none;
}
.final-cta-box::after {
  content: ''; position: absolute; bottom: -80px; left: -80px;
  width: 300px; height: 300px; border-radius: 50%;
  background: rgba(255,255,255,.06); pointer-events: none;
}
.final-cta-inner { position: relative; z-index: 1; }
.final-cta-title {
  font-family: var(--font-display);
  font-size: clamp(var(--text-3xl), 4vw, var(--text-5xl));
  font-weight: var(--weight-extrabold); color: var(--color-white);
  line-height: var(--leading-tight); letter-spacing: -0.02em;
  margin-bottom: var(--space-5);
}
.final-cta-desc { font-size: var(--text-lg); color: rgba(255,255,255,.75); max-width: 52ch; margin: 0 auto var(--space-10); }
.final-cta-actions { display: flex; align-items: center; justify-content: center; gap: var(--space-4); flex-wrap: wrap; }
.final-cta-note { margin-top: var(--space-5); font-size: var(--text-sm); color: rgba(255,255,255,.45); font-weight: var(--weight-semibold); }


/* ================================================================
   RESPONSIVE
================================================================ */
@media (max-width: 1024px) {
  .pricing-grid { grid-template-columns: repeat(2,1fr); }
  .pricing-card--featured { transform: none; }
  .pricing-card--featured:hover { transform: translateY(-2px); }
  .bonus-grid { grid-template-columns: 1fr; }
  .roi-grid { grid-template-columns: 1fr; }
  .roi-controls-row { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 768px) {
  .pricing-grid { grid-template-columns: 1fr; }
  .bonus-counts { grid-template-columns: 1fr 1fr; }
  .roi-controls-row { grid-template-columns: 1fr; }
  .final-cta-actions { flex-direction: column; }
  .final-cta-actions .btn { width: 100%; justify-content: center; }
  .footer-mini-inner { flex-direction: column; }
  .final-cta-box { padding: var(--space-12) var(--space-6); }
}
@media (max-width: 480px) {
  .pricing-hero { padding-left: 0; padding-right: 0; }
  .pricing-hero::before, .pricing-hero::after { width: 60px; }
  .bonus-cats { grid-template-columns: 1fr 1fr 1fr; }
  .roi-card { padding: var(--space-6); }
}
</style>

@endpush

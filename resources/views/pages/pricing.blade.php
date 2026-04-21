{{--
    Page: Pricing
    Route: pricing
    Controller: PricingController@index
--}}

@extends('layouts.app')

@section('content')
  <main class="">
    <!-- Hero Section -->
    <section class="hero-gradient px-8 pt-20 pb-12 text-center">
      <div class="max-w-4xl mx-auto">
        <div class="flex flex-col items-center gap-4 mb-6">
          <span
            class="inline-block px-4 py-1.5 rounded-full bg-primary-container/10 text-primary font-bold text-[10px] tracking-widest uppercase">Strategic
            Value Architecture</span>
          <span
            class="bg-primary text-white text-[10px] px-3 py-1 rounded-full font-black uppercase tracking-[0.2em] shadow-sm">15
            Day Free Trial Included</span>
        </div>
        <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-on-surface mb-6 font-headline leading-[1.1]">
          Future proof your training <br /><span class="text-primary">infrastructure</span>
        </h1>
        <p class="text-lg md:text-xl text-on-surface-variant max-w-2xl mx-auto mb-10 leading-relaxed">
          If a user doesn't log in or engage for an entire month, you pay exactly zero for that seat. Your billing
          automatically scales down during quiet periods and up during peak training cycles.
        </p>
        <!-- Billing Toggle -->
        <div class="flex items-center justify-center gap-4 mb-8">
          <button class="text-sm font-semibold text-on-surface-variant transition-colors"
            id="btn-monthly">Monthly</button>
          <button
            class="relative w-12 h-6 bg-primary-container/20 rounded-full p-1 transition-colors duration-200 flex items-center"
            id="billing-toggle">
            <div class="w-4 h-4 bg-primary rounded-full shadow-sm transition-transform duration-200 translate-x-6"
              id="toggle-circle"></div>
          </button>
          <div class="flex items-center gap-2">
            <button class="text-sm font-bold text-on-surface transition-colors" id="btn-yearly">Yearly</button>
            <span
              class="bg-tertiary-fixed-dim text-on-tertiary-fixed text-[10px] px-2 py-0.5 rounded-full font-extrabold uppercase tracking-wider">Save
              20%</span>
          </div>
        </div>
      </div>
    </section>
    <!-- Pricing Grid -->
    <section class="px-8 pb-20 -mt-4 relative z-10 hero-gradient">
      <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Launch -->
        <div
          class="bg-surface-container-lowest rounded-2xl p-8 flex flex-col pricing-glow border border-outline-variant/10"
          id="launch-card">
          <div class="mb-6">
            <h3 class="text-xl font-bold text-on-surface mb-2">Launch</h3>
            <p class="text-sm text-on-surface-variant leading-relaxed mb-4">Foundation for agile teams starting their
              learning culture.</p>
            <div class="relative">
              <label class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-wider mb-2">Active
                Users</label>
              <select
                class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-3 py-2 text-sm font-semibold text-on-surface focus:ring-2 focus:ring-primary/20 outline-none custom-select"
                id="launch-users-select">
                <option value="40">1 to 40 users</option>
                <option value="70">41 to 70 users</option>
                <option value="100">71 to 100 users</option>
              </select>
            </div>
          </div>
          <div class="mb-8">
            <div class="flex items-baseline gap-1">
              <span class="text-4xl font-extrabold text-on-surface" id="launch-price">$63</span>
              <span class="text-on-surface-variant font-medium">/mo</span>
            </div>
            <p class="text-xs text-primary font-semibold mt-1" id="launch-billing-status">Billed annually</p>
          </div>
          <ul class="space-y-4 mb-8 flex-grow">
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary text-sm mt-0.5"
                style='font-variation-settings: "FILL" 1;'>check_circle</span>
              <span class="text-sm text-on-surface-variant">Core LMS Ecosystem</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary text-sm mt-0.5"
                style='font-variation-settings: "FILL" 1;'>check_circle</span>
              <span class="text-sm text-on-surface-variant">Course Delivery and Reporting</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary text-sm mt-0.5"
                style='font-variation-settings: "FILL" 1;'>check_circle</span>
              <span class="text-sm text-on-surface-variant">Standard Support</span>
            </li>
          </ul>
          <button
            class="w-full py-3 rounded-xl border-2 border-outline-variant/30 text-primary font-bold hover:bg-surface-container-low transition-colors">Start
            Building</button>
        </div>
        <!-- Grow (Featured) -->
        <div
          class="bg-surface-container-lowest rounded-2xl p-8 flex flex-col pricing-glow border-glow scale-105 shadow-2xl relative"
          id="grow-card">
          <div class="mb-6">
            <div class="flex justify-between items-center mb-2">
              <h3 class="text-xl font-bold text-on-surface">Grow</h3>
              <span
                class="bg-primary text-white text-[10px] px-2.5 py-1 rounded-full font-bold uppercase tracking-wider">Popular</span>
            </div>
            <p class="text-sm text-on-surface-variant leading-relaxed mb-4">Powering high growth organizations with
              advanced automation.</p>
            <div class="relative">
              <label class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-wider mb-2">Active
                Users</label>
              <select
                class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-3 py-2 text-sm font-semibold text-on-surface focus:ring-2 focus:ring-primary/20 outline-none custom-select"
                id="grow-users-select">
                <option value="150">101 to 150 users</option>
                <option value="250">151 to 250 users</option>
                <option value="500">251 to 500 users</option>
              </select>
            </div>
          </div>
          <div class="mb-8">
            <div class="flex items-baseline gap-1">
              <span class="text-4xl font-extrabold text-on-surface" id="grow-price">$199</span>
              <span class="text-on-surface-variant font-medium">/mo</span>
            </div>
            <p class="text-xs text-primary font-semibold mt-1" id="grow-billing-status">Billed annually</p>
          </div>
          <ul class="space-y-4 mb-8 flex-grow">
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary text-sm mt-0.5"
                style='font-variation-settings: "FILL" 1;'>check_circle</span>
              <span class="text-sm text-on-surface font-semibold">Everything in Launch</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary text-sm mt-0.5"
                style='font-variation-settings: "FILL" 1;'>check_circle</span>
              <span class="text-sm text-on-surface-variant">Priority Response</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary text-sm mt-0.5"
                style='font-variation-settings: "FILL" 1;'>check_circle</span>
              <span class="text-sm text-on-surface-variant">Custom Branding</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary text-sm mt-0.5"
                style='font-variation-settings: "FILL" 1;'>check_circle</span>
              <span class="text-sm text-on-surface-variant">Multi Team Access</span>
            </li>
          </ul>
          <button
            class="w-full py-3 rounded-xl cta-gradient text-white font-bold shadow-lg shadow-primary/20 hover:opacity-95 transition-all">Scale
            Now</button>
        </div>
        <!-- Pro -->
        <div
          class="bg-surface-container-lowest rounded-2xl p-8 flex flex-col pricing-glow border border-outline-variant/10"
          id="pro-card">
          <div class="mb-6">
            <h3 class="text-xl font-bold text-on-surface mb-2">Pro</h3>
            <p class="text-sm text-on-surface-variant leading-relaxed mb-4">Enterprise grade depth for complex training
              needs.</p>
            <div class="relative">
              <label class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-wider mb-2">Active
                Users</label>
              <select
                class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-3 py-2 text-sm font-semibold text-on-surface focus:ring-2 focus:ring-primary/20 outline-none custom-select"
                id="pro-users-select">
                <option value="700">501 to 700 users</option>
                <option value="850">701 to 850 users</option>
                <option value="1000">851 to 1,000 users</option>
              </select>
            </div>
          </div>
          <div class="mb-8">
            <div class="flex items-baseline gap-1">
              <span class="text-4xl font-extrabold text-on-surface" id="pro-price">$639</span>
              <span class="text-on-surface-variant font-medium">/mo</span>
            </div>
            <p class="text-xs text-primary font-semibold mt-1" id="pro-billing-status">Billed annually</p>
          </div>
          <ul class="space-y-4 mb-8 flex-grow">
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary text-sm mt-0.5"
                style='font-variation-settings: "FILL" 1;'>check_circle</span>
              <span class="text-sm text-on-surface font-semibold">Everything in Grow</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary text-sm mt-0.5"
                style='font-variation-settings: "FILL" 1;'>check_circle</span>
              <span class="text-sm text-on-surface-variant">BI Data Integration</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary text-sm mt-0.5"
                style='font-variation-settings: "FILL" 1;'>check_circle</span>
              <span class="text-sm text-on-surface-variant">Full API Suite</span>
            </li>
          </ul>
          <button
            class="w-full py-3 rounded-xl border-2 border-outline-variant/30 text-primary font-bold hover:bg-surface-container-low transition-colors">Go
            Unlimited</button>
        </div>
        <!-- Enterprise -->
        <div
          class="bg-surface-container-lowest rounded-2xl p-8 flex flex-col pricing-glow border border-outline-variant/10">
          <div class="mb-8">
            <h3 class="text-xl font-bold text-on-surface mb-2">Enterprise</h3>
            <p class="text-sm text-on-surface-variant leading-relaxed">Global scale with dedicated strategic
              partnership.</p>
          </div>
          <div class="mb-8">
            <div class="flex items-baseline gap-1">
              <span class="text-4xl font-extrabold text-on-surface">Custom</span>
            </div>
            <p class="text-xs text-primary font-semibold mt-1">Volume based pricing</p>
          </div>
          <ul class="space-y-4 mb-8 flex-grow">
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary text-sm mt-0.5"
                style='font-variation-settings: "FILL" 1;'>check_circle</span>
              <span class="text-sm text-on-surface-variant">Unlimited Active Users</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary text-sm mt-0.5"
                style='font-variation-settings: "FILL" 1;'>check_circle</span>
              <span class="text-sm text-on-surface-variant">CSM Implementation</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary text-sm mt-0.5"
                style='font-variation-settings: "FILL" 1;'>check_circle</span>
              <span class="text-sm text-on-surface-variant">SAML and Security Audits</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-primary text-sm mt-0.5"
                style='font-variation-settings: "FILL" 1;'>check_circle</span>
              <span class="text-sm text-on-surface-variant">Global SLA Support</span>
            </li>
          </ul>
          <button
            class="w-full py-3 rounded-xl border-2 border-primary text-primary font-bold hover:bg-primary hover:text-white transition-all">Contact
            Sales</button>
        </div>
      </div>
    </section>
    <!-- Active User Model Callout -->
    <section class="max-w-7xl mx-auto px-8 mb-24 pt-10">
      <div
        class="bg-primary-container/5 rounded-3xl border border-primary/10 p-10 md:p-16 flex flex-col lg:flex-row gap-12 items-center">
        <div class="lg:w-1/2">
          <div class="flex items-center gap-3 mb-6">
            <div class="w-12 h-12 bg-primary/10 rounded-2xl flex items-center justify-center">
              <span class="material-symbols-outlined text-primary text-3xl"
                style='font-variation-settings: "FILL" 1;'>account_balance_wallet</span>
            </div>
            <h2 class="text-3xl font-extrabold font-headline text-on-surface">The Active User Advantage</h2>
          </div>
          <p class="text-lg text-on-surface-variant leading-relaxed mb-8">
            Traditional learning platforms charge for every registered user regardless of participation. At MyPass LMS
            we prioritize fiscal responsibility through our Active User model. If a user doesn't log in or engage for an
            entire month, you pay exactly zero for that seat. Your billing automatically scales down during quiet
            periods and up during peak training cycles.
          </p>
          <div class="space-y-4">
            <div class="flex items-start gap-4">
              <span class="material-symbols-outlined text-primary mt-1"
                style='font-variation-settings: "FILL" 1;'>verified</span>
              <div>
                <p class="font-bold text-on-surface">Zero Waste Policy</p>
                <p class="text-sm text-on-surface-variant">Cease subsidizing inactive seats and dormant accounts
                  immediately.</p>
              </div>
            </div>
            <div class="flex items-start gap-4">
              <span class="material-symbols-outlined text-primary mt-1"
                style='font-variation-settings: "FILL" 1;'>verified</span>
              <div>
                <p class="font-bold text-on-surface">Dynamic Scaling</p>
                <p class="text-sm text-on-surface-variant">Capacity automatically adjusts to your seasonal training
                  requirements.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="lg:w-1/2 bg-white p-8 rounded-2xl shadow-xl pricing-glow border border-primary/5">
          <div class="flex flex-col gap-6">
            <div
              class="p-4 rounded-xl bg-surface-container-low border border-outline-variant/20 flex justify-between items-center opacity-50 grayscale">
              <div>
                <p class="text-xs font-bold uppercase tracking-widest text-on-surface-variant">Legacy Providers</p>
                <p class="text-xl font-bold text-on-surface">Registered Users</p>
              </div>
              <div class="text-right">
                <p class="text-xs font-medium text-error">Paying for 100%</p>
              </div>
            </div>
            <div class="flex justify-center">
              <span class="material-symbols-outlined text-primary-fixed-dim text-3xl">south</span>
            </div>
            <div class="p-6 rounded-xl bg-primary/5 border-2 border-primary/20 flex justify-between items-center">
              <div>
                <p class="text-xs font-black uppercase tracking-widest text-primary">MyPass Economy</p>
                <p class="text-2xl font-black text-on-surface">Active Participants</p>
              </div>
              <div class="text-right">
                <p class="text-xs font-bold text-primary">Only Pay for Learners</p>
              </div>
            </div>
          </div>
          <p class="text-[10px] text-center mt-6 text-on-surface-variant uppercase font-bold tracking-[0.2em]">
            Efficiency Protocol Activated</p>
        </div>
      </div>
    </section>
    <!-- Bonus Content Library Section -->
    <section class="max-w-7xl mx-auto px-8 mb-24">
      <div
        class="bg-white rounded-3xl p-10 md:p-16 border border-primary/10 shadow-xl pricing-glow relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 rounded-full -mr-32 -mt-32 blur-3xl"></div>
        <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          <div>
            <span
              class="bg-tertiary-fixed-dim text-on-tertiary-fixed text-[10px] px-3 py-1 rounded-full font-black uppercase tracking-widest mb-4 inline-block">Annual
              Bonus</span>
            <h2 class="text-3xl md:text-4xl font-extrabold font-headline text-on-surface mb-6 leading-tight">Unlock the
              Strategic Course Catalog</h2>
            <p class="text-on-surface-variant text-lg mb-8 leading-relaxed">
              Secure your training budget annually and get instant access to our curated library of premium content.
              Expertly crafted courses to keep your workforce compliant and ahead of the curve.
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
              <div class="flex flex-col gap-2">
                <span class="material-symbols-outlined text-primary"
                  style='font-variation-settings: "FILL" 1;'>gavel</span>
                <span class="font-bold text-sm">Compliance</span>
              </div>
              <div class="flex flex-col gap-2">
                <span class="material-symbols-outlined text-primary"
                  style='font-variation-settings: "FILL" 1;'>psychology</span>
                <span class="font-bold text-sm">AI Skills</span>
              </div>
              <div class="flex flex-col gap-2">
                <span class="material-symbols-outlined text-primary"
                  style='font-variation-settings: "FILL" 1;'>groups</span>
                <span class="font-bold text-sm">Workplace</span>
              </div>
            </div>
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div
              class="bg-primary/5 p-8 rounded-2xl text-center border border-primary/10 flex flex-col justify-center items-center group hover:bg-white hover:shadow-lg transition-all"
              id="launch-bonus">
              <p class="text-[10px] font-black uppercase text-primary mb-2">Launch Tier</p>
              <p class="text-4xl font-black text-on-surface">3</p>
              <p class="text-xs font-bold text-on-surface-variant">Premium Courses</p>
            </div>
            <div
              class="bg-primary/5 p-8 rounded-2xl text-center border border-primary/10 flex flex-col justify-center items-center group hover:bg-white hover:shadow-lg transition-all"
              id="grow-bonus">
              <p class="text-[10px] font-black uppercase text-primary mb-2">Grow Tier</p>
              <p class="text-4xl font-black text-on-surface">7</p>
              <p class="text-xs font-bold text-on-surface-variant">Premium Courses</p>
            </div>
            <div
              class="bg-primary/5 p-8 rounded-2xl text-center border border-primary/10 flex flex-col justify-center items-center group hover:bg-white hover:shadow-lg transition-all"
              id="pro-bonus">
              <p class="text-[10px] font-black uppercase text-primary mb-2">Pro Tier</p>
              <p class="text-4xl font-black text-on-surface">15</p>
              <p class="text-xs font-bold text-on-surface-variant">Premium Courses</p>
            </div>
            <div
              class="bg-primary p-8 rounded-2xl text-center text-white flex flex-col justify-center items-center shadow-xl shadow-primary/20"
              id="enterprise-bonus">
              <p class="text-[10px] font-black uppercase text-white/70 mb-2">Enterprise</p>
              <p class="text-4xl font-black">All 28</p>
              <p class="text-xs font-bold">Full Library Access</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ROI Calculator -->
    <section class="py-24 px-8 bg-surface-container-low" id="roi-calculator">
      <div class="max-w-5xl mx-auto bg-white rounded-3xl p-8 md:p-12 shadow-2xl border border-outline-variant/10">
        <div class="text-center mb-12">
          <span
            class="text-primary font-bold text-xs uppercase tracking-widest bg-primary/10 px-4 py-1.5 rounded-full mb-4 inline-block">Value
            Impact Assessment</span>
          <h2 class="text-3xl md:text-4xl font-extrabold font-headline text-primary mb-4">The Real Cost of Wasted Seats
          </h2>
          <p class="text-on-surface-variant max-w-2xl mx-auto">Stop subsidizing empty accounts. Compare our activity
            based architecture against legacy volume pricing and visualize your reclaimed budget.</p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
          <!-- Left: Controls -->
          <div class="lg:col-span-7 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-bold mb-2 text-on-surface">Target MyPass LMS Tier</label>
                <div class="relative">
                  <select
                    class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-3 py-2.5 text-sm font-bold text-primary outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all custom-select"
                    id="calculator-tier-select">
                    <option value="launch">Launch Tier</option>
                    <option selected="" value="grow">Grow Tier</option>
                    <option value="pro">Pro Tier</option>
                  </select>
                </div>
                <p class="text-[10px] text-on-surface-variant mt-1.5 font-medium italic">Available active user capacity
                  varies by tier selection.</p>
              </div>
              <div>
                <label class="block text-sm font-bold mb-2 text-on-surface">Competitor Price Per Seat</label>
                <div class="relative">
                  <span
                    class="absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant font-bold text-sm">$</span>
                  <input
                    class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg pl-7 pr-3 py-2.5 text-sm font-semibold text-on-surface outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                    id="competitor-price-input" step="0.10" type="number" value="4.50" />
                </div>
              </div>
            </div>
            <div class="space-y-8 bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/10">
              <div>
                <div class="flex justify-between items-center mb-4">
                  <label class="text-sm font-bold text-on-surface">Total Workforce Size</label>
                  <span class="bg-primary/10 text-primary px-3 py-1 rounded-lg font-extrabold text-sm"
                    id="total-val">800</span>
                </div>
                <input class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-primary"
                  id="total-range" max="1000" min="50" step="10" type="range" value="800" />
              </div>
              <div>
                <div class="flex justify-between items-center mb-4">
                  <label class="text-sm font-bold text-on-surface">Projected Monthly Active Users</label>
                  <span class="bg-primary/10 text-primary px-3 py-1 rounded-lg font-extrabold text-sm"
                    id="active-val">200</span>
                </div>
                <input class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-primary"
                  id="active-range" max="500" min="1" step="1" type="range" value="200" />
                <p class="text-[10px] text-on-surface-variant mt-2 font-medium">Industry standard activity benchmarks
                  typically range from 20% to 45%.</p>
              </div>
            </div>
          </div>
          <!-- Right: Results Card -->
          <div class="lg:col-span-5">
            <div class="bg-primary rounded-3xl p-8 text-white shadow-2xl relative overflow-hidden">
              <div class="absolute -top-12 -right-12 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
              <div class="relative z-10">
                <div class="flex justify-between items-start mb-8">
                  <div>
                    <p class="text-white/70 text-[10px] font-bold uppercase tracking-widest mb-1">Your Adjusted Monthly
                      Fee</p>
                    <div class="text-5xl font-extrabold flex items-baseline gap-1">
                      <span id="kprise-cost-result">$130</span>
                    </div>
                    <p class="text-[10px] text-white/50 mt-1 font-medium">Billed to your active engagement</p>
                  </div>
                  <div
                    class="bg-tertiary-fixed-dim text-on-tertiary-fixed px-3 py-1.5 rounded-xl text-center min-w-[60px]">
                    <p class="text-[10px] font-black uppercase leading-none mb-1" id="savings-pct">96%</p>
                    <p class="text-[8px] font-bold leading-none">SAVED</p>
                  </div>
                </div>
                <div class="space-y-4 mb-8 pt-8 border-t border-white/10">
                  <div class="flex justify-between items-center">
                    <span class="text-white/70 text-sm">Market Standard Charges</span>
                    <span class="text-white font-bold line-through opacity-50" id="traditional-cost-val">$3,600</span>
                  </div>
                  <div class="flex justify-between items-center bg-white/5 p-3 rounded-lg">
                    <span class="text-white/70 text-sm">MyPass LMS Service Fee</span>
                    <span class="text-white font-extrabold" id="kprise-summary-val">$130</span>
                  </div>
                  <div class="flex justify-between items-center">
                    <span class="text-white/70 text-sm">Monthly Efficiency Gain</span>
                    <span class="text-secondary-container font-extrabold" id="monthly-savings-val">$3,470</span>
                  </div>
                </div>
                <div class="bg-white/10 rounded-2xl p-6 border border-white/10 text-center">
                  <p class="text-white/70 text-[10px] font-bold uppercase tracking-widest mb-2">Annual Capital Reclaimed
                  </p>
                  <div class="text-3xl font-black text-white" id="annual-savings-val">$41,640</div>
                </div>
                <button
                  class="w-full mt-8 bg-white text-primary py-4 rounded-xl font-black text-sm hover:bg-opacity-90 transition-all shadow-lg">Secure
                  These Savings</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- FAQ -->
    <section class="py-24 px-8 bg-white border-t border-outline-variant/10">
      <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-extrabold text-center mb-16 font-headline text-primary">Overcoming Your Objections</h2>
        <div class="space-y-4">
          <details class="group p-6 rounded-2xl bg-surface-container-low cursor-pointer transition-all duration-300"
            open="">
            <summary class="flex justify-between items-center font-bold text-lg list-none">
              Is the free trial really free no card no catch?
              <span
                class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
            </summary>
            <p class="mt-4 text-on-surface-variant text-sm leading-relaxed">
              Our fifteen day trial is fully featured and requires zero financial commitment upfront. You gain complete
              access to the environment to validate our infrastructure before any commercial agreement begins. There are
              no hidden fees or automatic transitions to paid tiers.
            </p>
          </details>
          <details class="group p-6 rounded-2xl bg-surface-container-low cursor-pointer transition-all duration-300">
            <summary class="flex justify-between items-center font-bold text-lg list-none">
              How does pricing work after the trial ends?
              <span
                class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
            </summary>
            <p class="mt-4 text-on-surface-variant text-sm leading-relaxed">
              Post trial we implement our active engagement architecture. You select a tier based on your expected
              monthly participation volume. We never charge for idle accounts or registered users who do not interact
              with the platform during the billing cycle.
            </p>
          </details>
          <details class="group p-6 rounded-2xl bg-surface-container-low cursor-pointer transition-all duration-300">
            <summary class="flex justify-between items-center font-bold text-lg list-none">
              Can we migrate our existing courses?
              <span
                class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
            </summary>
            <p class="mt-4 text-on-surface-variant text-sm leading-relaxed">
              The migration process is streamlined for global enterprises. We support standard formats and provide white
              glove implementation services to ensure your historical content and completion records transition
              seamlessly into the MyPass ecosystem.
            </p>
          </details>
          <details class="group p-6 rounded-2xl bg-surface-container-low cursor-pointer transition-all duration-300">
            <summary class="flex justify-between items-center font-bold text-lg list-none">
              Do we need an IT team?
              <span
                class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
            </summary>
            <p class="mt-4 text-on-surface-variant text-sm leading-relaxed">
              MyPass LMS is a managed cloud solution designed for administrative ease. While we offer deep API
              integrations for technical teams our standard configuration requires zero internal development resources
              to deploy across your organization.
            </p>
          </details>
          <details class="group p-6 rounded-2xl bg-surface-container-low cursor-pointer transition-all duration-300">
            <summary class="flex justify-between items-center font-bold text-lg list-none">
              Is MyPass LMS secure?
              <span
                class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
            </summary>
            <p class="mt-4 text-on-surface-variant text-sm leading-relaxed">
              Security is our primary foundation. We maintain rigorous compliance standards including encryption at rest
              and in transit. Our identity management protocols ensure that only authorized personnel can access
              sensitive organizational training data.
            </p>
          </details>
          <details class="group p-6 rounded-2xl bg-surface-container-low cursor-pointer transition-all duration-300">
            <summary class="flex justify-between items-center font-bold text-lg list-none">
              Can MyPass LMS handle training across multiple teams?
              <span
                class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
            </summary>
            <p class="mt-4 text-on-surface-variant text-sm leading-relaxed">
              Our multi tenant architecture allows you to partition your environment for different departments or
              subsidiaries. Each team can have unique branding and administrative controls while remaining under a
              single consolidated billing umbrella.
            </p>
          </details>
        </div>
      </div>
    </section>
    <!-- Final CTA -->
    <section class="px-8 pt-24 pb-12">
      <div
        class="max-w-5xl mx-auto cta-gradient rounded-[2.5rem] p-12 md:p-20 text-center text-white relative overflow-hidden shadow-2xl shadow-primary/40">
        <div class="relative z-10">
          <h2 class="text-3xl md:text-5xl font-extrabold mb-8 font-headline leading-tight">Ready to transform your
            <br />training economy?</h2>
          <p class="text-white/80 text-lg mb-12 max-w-xl mx-auto">Join over 2,000 organizations that have eliminated the
            fiscal waste of empty seats.</p>
          <div class="flex flex-col md:flex-row justify-center gap-6">
            <button
              class="bg-white text-primary px-10 py-5 rounded-xl font-extrabold text-lg shadow-xl shadow-black/10 hover:scale-105 transition-all">Start
              Your 15 Day Free Trial</button>
            <button
              class="bg-white/10 backdrop-blur-md text-white border border-white/20 px-10 py-5 rounded-xl font-bold text-lg hover:bg-white/20 transition-all">Talk
              to Sales</button>
          </div>
        </div>
        <div class="absolute -top-32 -right-32 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-32 -left-32 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
      </div>
    </section>
    <!-- Global Trial Invitation -->
    <section class="px-8 pb-32 pt-12">
      <div
        class="max-w-7xl mx-auto bg-surface-container-highest/30 rounded-[3rem] p-12 md:p-24 border border-outline-variant/20 text-center">
        <div class="max-w-3xl mx-auto">
          <span class="text-primary font-bold text-sm uppercase tracking-[0.3em] mb-6 block">Immediate Deployment
            Available</span>
          <h2 class="text-4xl md:text-6xl font-black text-on-surface mb-8 font-headline">Zero commitment. <br />Full
            potential.</h2>
          <p class="text-xl text-on-surface-variant mb-12 leading-relaxed">
            Experience the full MyPass LMS ecosystem with our 15 day free trial. No credit card required. No obligation.
            Just pure strategic value architecture for your entire workforce.
          </p>
          <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
            <button
              class="cta-gradient text-white px-12 py-6 rounded-2xl font-black text-xl shadow-2xl shadow-primary/40 hover:scale-[1.02] transition-all w-full sm:w-auto">Start
              Your 15 Day Free Trial</button>
            <button
              class="bg-white text-on-surface border-2 border-outline-variant/50 px-12 py-6 rounded-2xl font-bold text-xl hover:bg-surface-container-low transition-all w-full sm:w-auto">Talk
              to Sales</button>
          </div>
          <p class="mt-10 text-sm text-on-surface-variant font-medium">Trusted by leading enterprises globally</p>
        </div>
      </div>
    </section>
  </main>

  <script>
    // Logic Configuration
    const pricingData = {
      launch: { 40: 79, 70: 104, 100: 129 },
      grow: { 150: 149, 200: 163, 250: 178, 300: 192, 350: 206, 400: 220, 450: 235, 500: 249 },
      pro: { 600: 279, 700: 359, 800: 439, 900: 519, 1000: 599 }
    };

    let isYearly = true; // Default

    // DOM Elements
    const toggle = document.getElementById('billing-toggle');
    const toggleCircle = document.getElementById('toggle-circle');
    const btnMonthly = document.getElementById('btn-monthly');
    const btnYearly = document.getElementById('btn-yearly');

    const launchPrice = document.getElementById('launch-price');
    const growPrice = document.getElementById('grow-price');
    const proPrice = document.getElementById('pro-price');

    const launchSelect = document.getElementById('launch-users-select');
    const growSelect = document.getElementById('grow-users-select');
    const proSelect = document.getElementById('pro-users-select');

    const billingStatuses = [
      document.getElementById('launch-billing-status'),
      document.getElementById('grow-billing-status'),
      document.getElementById('pro-billing-status')
    ];

    // ROI Calculator Elements
    const calcTierSelect = document.getElementById('calculator-tier-select');
    const competitorPriceInput = document.getElementById('competitor-price-input');
    const totalRange = document.getElementById('total-range');
    const totalVal = document.getElementById('total-val');
    const activeRange = document.getElementById('active-range');
    const activeVal = document.getElementById('active-val');

    const kpriseCostResult = document.getElementById('kprise-cost-result');
    const savingsPct = document.getElementById('savings-pct');
    const traditionalCostVal = document.getElementById('traditional-cost-val');
    const kpriseSummaryVal = document.getElementById('kprise-summary-val');
    const monthlySavingsVal = document.getElementById('monthly-savings-val');
    const annualSavingsVal = document.getElementById('annual-savings-val');

    function updatePrices() {
      const discount = isYearly ? 0.8 : 1.0;
      const billingText = isYearly ? "Billed annually" : "Billed monthly";

      launchPrice.textContent = `$${Math.round(pricingData.launch[launchSelect.value] * discount)}`;
      growPrice.textContent = `$${Math.round(pricingData.grow[growSelect.value] * discount)}`;
      proPrice.textContent = `$${Math.round(pricingData.pro[proSelect.value] * discount)}`;

      billingStatuses.forEach(status => status.textContent = billingText);

      updateCalculator();
    }

    function updateCalculator() {
      const totalWorkforce = parseInt(totalRange.value);
      const selectedTier = calcTierSelect.value;
      const competitorPrice = parseFloat(competitorPriceInput.value) || 0;
      const discount = isYearly ? 0.8 : 1.0;

      let maxActive = 1000;
      if (selectedTier === 'launch') maxActive = 100;
      else if (selectedTier === 'grow') maxActive = 500;
      else if (selectedTier === 'pro') maxActive = 1000;

      activeRange.max = maxActive;
      if (parseInt(activeRange.value) > maxActive) {
        activeRange.value = maxActive;
      }

      let activeUsers = parseInt(activeRange.value);

      totalVal.textContent = totalWorkforce.toLocaleString();
      activeVal.textContent = activeUsers.toLocaleString();

      const tierPrices = pricingData[selectedTier];
      const breakpoints = Object.keys(tierPrices).map(Number).sort((a, b) => a - b);

      let baseMonthlyRate = tierPrices[breakpoints[breakpoints.length - 1]];
      for (let bp of breakpoints) {
        if (activeUsers <= bp) {
          baseMonthlyRate = tierPrices[bp];
          break;
        }
      }

      const finalKpriseMonthly = Math.round(baseMonthlyRate * discount);
      const traditionalMonthly = Math.round(totalWorkforce * competitorPrice);
      const monthlySavings = traditionalMonthly - finalKpriseMonthly;
      const annualSavings = monthlySavings * 12;
      const percentageSaved = traditionalMonthly > 0 ? Math.round((monthlySavings / traditionalMonthly) * 100) : 0;

      kpriseCostResult.textContent = `$${finalKpriseMonthly}`;
      kpriseSummaryVal.textContent = `$${finalKpriseMonthly}`;
      traditionalCostVal.textContent = `$${traditionalMonthly.toLocaleString()}`;
      monthlySavingsVal.textContent = `$${monthlySavings.toLocaleString()}`;
      annualSavingsVal.textContent = `$${annualSavings.toLocaleString()}`;
      savingsPct.textContent = `${percentageSaved}%`;
    }

    function toggleBilling(forceState = null) {
      if (forceState !== null) {
        isYearly = forceState;
      } else {
        isYearly = !isYearly;
      }

      if (isYearly) {
        toggleCircle.classList.replace('translate-x-0', 'translate-x-6');
        btnYearly.classList.add('text-on-surface');
        btnYearly.classList.remove('text-on-surface-variant');
        btnMonthly.classList.remove('text-on-surface');
        btnMonthly.classList.add('text-on-surface-variant');
      } else {
        toggleCircle.classList.replace('translate-x-6', 'translate-x-0');
        btnMonthly.classList.add('text-on-surface');
        btnMonthly.classList.remove('text-on-surface-variant');
        btnYearly.classList.remove('text-on-surface');
        btnYearly.classList.add('text-on-surface-variant');
      }
      updatePrices();
    }

    toggle.addEventListener('click', () => toggleBilling());
    btnMonthly.addEventListener('click', () => toggleBilling(false));
    btnYearly.addEventListener('click', () => toggleBilling(true));

    [launchSelect, growSelect, proSelect].forEach(select => {
      select.addEventListener('change', updatePrices);
    });

    [calcTierSelect, competitorPriceInput, totalRange, activeRange].forEach(el => {
      el.addEventListener('input', updateCalculator);
    });

    calcTierSelect.addEventListener('change', updateCalculator);

    updatePrices();
  </script>
@endsection

@push('styles')
   <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "tertiary": "#5e1900",
                      "inverse-primary": "#c7bfff",
                      "on-tertiary-fixed-variant": "#832700",
                      "secondary-fixed": "#e5deff",
                      "on-tertiary-container": "#ff9d7c",
                      "inverse-surface": "#312f39",
                      "surface-container-low": "#f6f1ff",
                      "on-primary-container": "#b6acff",
                      "primary-container": "#4220c8",
                      "surface-container-high": "#ebe6f3",
                      "surface-dim": "#ddd8e5",
                      "on-secondary-container": "#4a4284",
                      "on-primary-fixed": "#180065",
                      "tertiary-fixed-dim": "#ffb59d",
                      "surface-bright": "#fcf8ff",
                      "inverse-on-surface": "#f4effc",
                      "on-surface-variant": "#474555",
                      "on-secondary-fixed": "#190e52",
                      "on-error": "#ffffff",
                      "surface-tint": "#5a41df",
                      "primary-fixed": "#e5deff",
                      "surface-container-lowest": "#ffffff",
                      "outline": "#787586",
                      "tertiary-container": "#842700",
                      "on-background": "#1c1a24",
                      "on-secondary-fixed-variant": "#463e80",
                      "surface-container": "#f1ecf9",
                      "background": "#fcf8ff",
                      "on-primary": "#ffffff",
                      "error": "#ba1a1a",
                      "primary": "#4220c8",
                      "tertiary-fixed": "#ffdbd0",
                      "secondary-container": "#bcb3fe",
                      "primary-fixed-dim": "#c7bfff",
                      "on-primary-fixed-variant": "#411fc7",
                      "error-container": "#ffdad6",
                      "outline-variant": "#c9c4d8",
                      "surface-variant": "#e5e0ee",
                      "surface-container-highest": "#e5e0ee",
                      "secondary-fixed-dim": "#c7bfff",
                      "on-secondary": "#ffffff",
                      "surface": "#fcf8ff",
                      "on-surface": "#1c1a24",
                      "on-tertiary": "#ffffff",
                      "secondary": "#5e5699",
                      "on-error-container": "#93000a",
                      "on-tertiary-fixed": "#390c00"
              },
              "borderRadius": {
                      "DEFAULT": "0.5rem",
                      "lg": "0.75rem",
                      "xl": "1rem",
                      "2xl": "1.5rem",
                      "full": "9999px"
              },
              "fontFamily": {
                      "headline": ["Plus Jakarta Sans"],
                      "body": ["Plus Jakarta Sans"],
                      "label": ["Plus Jakarta Sans"]
              }
            },
          },
        }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .hero-gradient {
            background: radial-gradient(circle at 50% 0%, #f6f1ff 0%, #fcf8ff 100%);
        }
        .pricing-glow {
            box-shadow: 0px 24px 48px rgba(28, 26, 36, 0.04);
        }
        .cta-gradient {
            background: linear-gradient(135deg, #4220c8 0%, #2c00a0 100%);
        }
        .border-glow {
            position: relative;
            z-index: 0;
        }
        .border-glow::before {
            content: "";
            position: absolute;
            inset: -2px;
            z-index: -1;
            background: linear-gradient(135deg, #4220c8, #842700);
            border-radius: 1.1rem;
            opacity: 0.3;
        }
        .custom-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23474555'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 1rem;
        }
    </style>

@endpush

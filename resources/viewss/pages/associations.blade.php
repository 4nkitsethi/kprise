@extends('layouts.app')

@php
    /**
    * associations.php — LMS for Associations Landing Page
    * URL: /lms-for-associations/
    * Last updated: 2026-03-26 | Version 1.0
    * 
    * GEO TARGET QUERIES:
    *   - "best LMS for associations"
    *   - "LMS with AMS integration"
    *   - "association LMS CE tracking"
    *   - "iMIS LMS integration"
    *   - "GrowthZone LMS"
    *   - "MemberClicks LMS integration"
    */

    $page_title       = 'Association LMS with AMS Integration — MyPass LMS by Kprise';
    $page_description = 'MyPass LMS connects with your AMS to automate member training, CE tracking, certification renewals, and SSO. Integrates with iMIS, GrowthZone, MemberClicks, Nimble AMS, and more. Plans from $79/mo.';
    $page_canonical   = 'https://kprise.com/lms-for-associations/';
    $page_slug        = 'associations';
    $page_updated     = '2026-03-26';

    // FAQPage schema for GEO
    $faq_items = [
    ["Which AMS platforms does MyPass LMS integrate with?", "MyPass LMS integrates with iMIS, Nimble AMS, MemberClicks, YourMembership, Fonteva, NetForum, GrowthZone, and other association management systems via API and webhooks. Custom integrations are available for associations on Growth and Enterprise plans, with most new AMS connections live within 2-4 weeks."],
    ["Can association members sign in with their existing credentials?", "Yes. MyPass supports single sign-on (SSO) through your AMS portal. Members access training with the login they already use — no second account, no password resets, no access friction."],
    ["Can we assign learning by member type, chapter, or role?", "Yes. Enrollment rules can follow membership tier, chapter affiliation, board role, committee assignment, or join date — all driven by AMS data. This is one of the strongest association-specific use cases for MyPass."],
    ["How does CE and certification tracking work?", "MyPass tracks CE/CEU credit hours, manages certification timelines, sends automated renewal reminders, and syncs completion data back to member records in your AMS. Your team gets a clear, always-current view of who is compliant and who needs follow-up."],
    ["How does pricing work for associations with thousands of members?", "MyPass uses active-user pricing — you pay only for members who actually engage in training during the billing cycle, not total registered members. If you have 10,000 members but only 2,000 take courses this quarter, you pay for 2,000. Plans start at $79 per month."],
    ["How fast can an association get set up with MyPass?", "Platform setup takes days, not months. AMS integration configuration, data migration, and onboarding are supported by the MyPass team. Most associations are fully live within one to two weeks."],
    ["Can we migrate from our current LMS to MyPass?", "Yes. SCORM packages, course content, user data, enrollment history, completion records, and certificates can all be migrated and verified before go-live. Standard migrations are included with Growth and Enterprise plans."]
    ];
    $faq_schema_items = [];
    foreach ($faq_items as $f) {
    $faq_schema_items[] = ["@type"=>"Question","name"=>$f[0],"acceptedAnswer"=>["@type"=>"Answer","text"=>$f[1]]];
    }
    $page_schema = json_encode([
    "@context" => "https://schema.org",
    "@type" => "FAQPage",
    "mainEntity" => $faq_schema_items,
    "dateModified" => "2026-03-26"
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

    $page_css = <<<'CSS'
    /* ── ASSOCIATIONS PAGE STYLES ── */
    .assoc-hero {
        padding: 80px 0 0;
        background: linear-gradient(180deg, #fff 0%, var(--bg-subtle) 100%);
        overflow: hidden; position: relative;
    }
    .assoc-hero::before {
        content: ""; position: absolute; top: -100px; right: -100px; width: 320px; height: 320px;
        background: radial-gradient(circle, rgba(37,99,235,.08), transparent 65%); pointer-events: none;
    }
    .hero-grid { display: grid; grid-template-columns: 1.05fr .95fr; gap: 48px; align-items: start; }
    .hero-text { max-width: 620px; }
    .hero-text h1 { font-size: clamp(32px, 4.5vw, 50px); line-height: 1.06; margin-bottom: 16px; }
    .hero-text .lead { font-size: 17px; max-width: 560px; line-height: 1.75; margin-bottom: 26px; color: var(--light-text); }
    .hero-text .lead strong { color: var(--text); }
    .hero-meta { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 18px; }
    .hero-meta span {
        display: inline-flex; align-items: center; gap: 8px; padding: 8px 14px;
        background: #fff; border: 1px solid var(--line); border-radius: var(--radius-pill);
        font-size: 13px; font-weight: 600; color: var(--light-text); box-shadow: 0 1px 4px rgba(15,23,42,.05);
    }
    .hero-card {
        background: #fff; border: 1px solid var(--line); border-radius: var(--radius);
        box-shadow: var(--shadow-lg); padding: 26px; position: relative; overflow: hidden;
    }
    .hero-card::before { content: ""; position: absolute; inset: 0 0 auto 0; height: 4px; background: linear-gradient(90deg, var(--primary), #60a5fa); }
    .hero-card-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; }
    .hero-card-header strong { font-size: 16px; color: var(--text); }
    .sync-rail { display: grid; gap: 12px; }
    .sync-step {
        display: grid; grid-template-columns: 80px 1fr; gap: 14px; align-items: start;
        padding: 16px; border: 1px solid var(--line); border-radius: var(--radius-sm);
        background: #fff; box-shadow: 0 1px 4px rgba(15,23,42,.05);
    }
    .sync-step .tag {
        display: inline-flex; align-items: center; justify-content: center; min-height: 30px;
        padding: 5px 10px; background: var(--primary-light); border-radius: var(--radius-pill);
        font-size: 11px; font-weight: 800; letter-spacing: .06em; text-transform: uppercase; color: var(--primary);
    }
    .sync-step strong { display: block; font-size: 15px; margin-bottom: 4px; color: var(--text); line-height: 1.35; }
    .sync-step p { font-size: 13px; line-height: 1.6; color: var(--light-text); margin: 0; }
    .mini-card {
        border: 1px dashed var(--primary-border); border-radius: var(--radius-sm);
        padding: 14px 16px; background: var(--primary-light); margin-top: 14px;
    }
    .mini-card strong { display: block; font-size: 14px; margin-bottom: 4px; color: var(--text); }
    .mini-card p { font-size: 13px; line-height: 1.55; margin: 0; color: var(--light-text); }

    .hero-stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; grid-column: 1/-1; margin-top: 36px; }
    .hero-stat {
        background: #fff; border: 1px solid var(--line); border-radius: var(--radius);
        padding: 18px; box-shadow: var(--shadow);
    }
    .hero-stat .hs-title { font-size: 15px; font-weight: 700; color: var(--text); margin-bottom: 6px; }
    .hero-stat p { font-size: 13px; line-height: 1.58; color: var(--light-text); margin: 0; }
    .killer-line {
        grid-column: 1/-1; margin-top: 28px; padding: 36px 24px; border-radius: var(--radius);
        background: var(--primary); color: #fff; text-align: center;
        box-shadow: 0 16px 48px rgba(37,99,235,.2);
    }
    .killer-line strong { font-size: clamp(18px, 3vw, 28px); font-weight: 800; letter-spacing: -.02em; line-height: 1.2; }

    /* ── SECTIONS ── */
    .assoc-section { padding: 72px 0; }
    .assoc-section.alt { background: var(--bg-subtle); }
    .assoc-section .section-head { max-width: 860px; margin-bottom: 32px; }
    .assoc-section .section-head h2 { margin-bottom: 10px; font-size: clamp(24px, 3vw, 34px); }
    .assoc-section .section-head p { color: var(--light-text); font-size: 16px; line-height: 1.7; }

    /* Cards */
    .a-card {
        background: #fff; border: 1px solid var(--line); border-radius: var(--radius);
        padding: 26px; transition: all .2s;
    }
    .a-card:hover { box-shadow: var(--shadow-lg); }
    .a-card.dark { background: #1e293b; color: #fff; border-color: #334155; }
    .a-card.dark p, .a-card.dark li { color: #cbd5e1; }
    .a-card h3 { margin-bottom: 12px; font-size: 17px; font-weight: 800; }
    .clean-list { padding: 0; margin: 0; list-style: none; display: grid; gap: 10px; }
    .clean-list li { position: relative; padding-left: 24px; font-size: 14px; line-height: 1.6; }
    .clean-list li::before { content: ''; position: absolute; left: 0; top: 9px; width: 10px; height: 10px; border-radius: 50%; background: var(--green); }
    .a-card.dark .clean-list li::before { background: #34d399; }

    /* Grids */
    .pain-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .int-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }
    .benefit-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
    .use-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
    .proof-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .proof-grid > .a-card:first-child { grid-row: 1/3; }

    /* AMS grid */
    .ams-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-top: 24px; }
    .ams-card {
        display: flex; align-items: center; gap: 10px; padding: 12px 16px;
        background: #fff; border: 1px solid var(--line); border-radius: var(--radius-sm);
        font-size: 14px; font-weight: 600; color: var(--text); transition: all .2s;
    }
    .ams-card:hover { border-color: var(--primary-border); box-shadow: var(--shadow); }
    .ams-icon { color: var(--primary); font-size: 14px; }
    .ams-note { margin-top: 16px; font-size: 14px; color: var(--muted); line-height: 1.6; }

    /* Flow diagram */
    .flow { display: grid; grid-template-columns: 1fr 48px 1fr; gap: 12px; align-items: center; margin-top: 14px; }
    .flow-box { padding: 16px; border: 1px solid var(--line); border-radius: var(--radius-sm); background: var(--bg-subtle); }
    .flow-box strong { display: block; font-size: 14px; color: var(--text); margin-bottom: 4px; }
    .flow-box p { font-size: 13px; margin: 0; line-height: 1.5; color: var(--light-text); }
    .flow-arrow { text-align: center; font-size: 24px; font-weight: 800; color: var(--primary); }

    /* Benefit cards */
    .benefit .k { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .06em; color: var(--primary); margin-bottom: 8px; }
    .benefit h3 { margin-bottom: 6px; font-size: 16px; }
    .benefit p { font-size: 14px; line-height: 1.6; color: var(--light-text); }

    /* Client logos */
    .client-logos { display: flex; flex-wrap: wrap; justify-content: center; align-items: center; gap: 40px; margin: 28px 0 36px; }
    .client-logos img { max-height: 42px; width: auto; opacity: .7; filter: grayscale(100%); transition: all .2s; }
    .client-logos img:hover { opacity: 1; filter: grayscale(0%); }
    .quote-text { font-size: 16px; color: var(--text); line-height: 1.55; font-style: italic; margin-bottom: 14px; }

    /* Comparison table */
    .assoc-compare { width: 100%; border-collapse: collapse; background: #fff; border: 1px solid var(--line); border-radius: var(--radius); overflow: hidden; }
    .assoc-compare th, .assoc-compare td { padding: 14px 18px; border-bottom: 1px solid #f1f5f9; text-align: left; font-size: 14px; }
    .assoc-compare th { font-size: 11px; text-transform: uppercase; letter-spacing: .06em; color: var(--muted); background: var(--bg-subtle); font-weight: 700; }
    .assoc-compare .good { color: var(--green); font-weight: 600; }
    .assoc-compare .bad { color: #94a3b8; }

    /* FAQ (uses same styles as pricing) */
    .faq-section { padding: 72px 0; }
    .faq-section h2 { text-align: center; font-size: 30px; font-weight: 800; margin: 0 0 8px; letter-spacing: -.02em; }
    .faq-section > .container > p { text-align: center; color: var(--muted); max-width: 600px; margin: 0 auto 28px; font-size: 15px; }
    .faq-list { max-width: 780px; margin: 0 auto; }
    .faq-item { border: 1px solid var(--line); border-radius: var(--radius-sm); background: #fff; margin-bottom: 10px; overflow: hidden; }
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
    .faq-item.open .faq-a { max-height: 400px; }
    .faq-a-inner { padding: 0 20px 18px; font-size: 14px; color: #475569; line-height: 1.7; }

    /* Final CTA */
    .assoc-cta { background: linear-gradient(180deg, var(--text) 0%, #020617 100%); color: #fff; padding: 72px 0; }
    .assoc-cta p { color: #94a3b8; }
    .assoc-cta .cta-grid { display: grid; grid-template-columns: 1.15fr .85fr; gap: 40px; align-items: center; }
    .assoc-cta-box {
        background: rgba(255,255,255,.04); border: 1px solid rgba(255,255,255,.08);
        border-radius: var(--radius); padding: 24px;
    }
    .assoc-cta-box h3 { color: #fff; margin-bottom: 8px; font-size: 18px; }
    .assoc-cta-box p { font-size: 14px; }
    .btn-cta-primary {
        display: inline-flex; align-items: center; padding: 14px 28px; font-size: 14px;
        font-weight: 800; color: #fff; background: var(--primary); border-radius: var(--radius-sm);
        transition: all .2s; border: none; cursor: pointer; font-family: inherit;
    }
    .btn-cta-primary:hover { background: var(--primary-dark); transform: translateY(-1px); }
    .btn-cta-ghost {
        display: inline-flex; align-items: center; padding: 14px 28px; font-size: 14px;
        font-weight: 800; color: #fff; background: transparent; border: 1px solid rgba(255,255,255,.2);
        border-radius: var(--radius-sm); transition: all .2s; cursor: pointer; font-family: inherit;
    }
    .btn-cta-ghost:hover { border-color: rgba(255,255,255,.4); }

    @media (max-width: 1024px) {
        .hero-grid, .int-grid, .assoc-cta .cta-grid { grid-template-columns: 1fr; }
        .benefit-grid { grid-template-columns: repeat(2, 1fr); }
        .use-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 760px) {
        .hero-stats, .pain-grid, .benefit-grid, .use-grid, .proof-grid, .flow { grid-template-columns: 1fr; }
        .ams-grid { grid-template-columns: 1fr 1fr; }
        .flow-arrow { transform: rotate(90deg); }
        .assoc-hero { padding: 52px 0 0; }
        .killer-line strong { font-size: 18px; }
        .sync-step { grid-template-columns: 1fr; }
    }
    CSS;
@endphp

@section('content')

<!-- ═══ HERO ═══ -->
<section class="assoc-hero">
    <div class="container hero-grid">
        <div class="hero-text">
        <div class="eyebrow">For Associations Using an AMS</div>
        <h1>Stop Managing Your LMS in Spreadsheets.</h1>
        <p class="lead">
            If your LMS still depends on CSV exports, manual enrollments, and constant cleanup — <strong>it's working against you</strong>. MyPass connects directly with your Association Management System so member data, enrollments, SSO, CE tracking, and certifications stay in sync automatically.
        </p>
        <div style="display:flex;gap:12px;flex-wrap:wrap;">
            <a class="btn-primary lg" href="https://calendly.com/onlinesales-kprise/30min">See How This Works With Your AMS</a>
            <a class="btn-outline" href="#integration">See How It Works</a>
        </div>
        <div class="hero-meta">
            <span>Association-first workflows</span>
            <span>AMS-connected learning</span>
            <span>CE + certification ready</span>
        </div>
        </div>
        <div>
        <div class="hero-card">
            <div class="hero-card-header">
            <strong>What buyers actually want fixed</strong>
            <span class="eyebrow" style="font-size:11px;padding:4px 9px;margin:0">Operational fit</span>
            </div>
            <div class="sync-rail">
            <div class="sync-step">
                <div><div class="tag">Before</div></div>
                <div><strong>Member data lives in the AMS, but training lives somewhere else.</strong><p>Admins export, import, reconcile duplicate records, and answer login complaints every week.</p></div>
            </div>
            <div class="sync-step">
                <div><div class="tag">After</div></div>
                <div><strong>One connected workflow from membership to learning completion.</strong><p>Member updates, enrollment rules, SSO, CE tracking, and reporting move together instead of being stitched together manually.</p></div>
            </div>
            </div>
            <div class="mini-card">
            <strong>Designed to support leading AMS environments</strong>
            <p>iMIS, Nimble AMS, Fonteva, GrowthZone, MemberClicks, YourMembership, NetForum, and other association systems via API.</p>
            </div>
        </div>
        </div>
        <div class="hero-stats">
        <div class="hero-stat"><div class="hs-title">No more CSV cycle</div><p>Keep member and learning records aligned without recurring export-clean-upload work.</p></div>
        <div class="hero-stat"><div class="hs-title">Less admin drag</div><p>Automate enrollments, reminders, completions, and compliance visibility across programs.</p></div>
        <div class="hero-stat"><div class="hs-title">Better member access</div><p>Give members a cleaner experience with SSO and training tied to real association structure.</p></div>
        </div>
        <div class="killer-line"><strong>If your LMS requires CSV uploads, it's not integrated.</strong></div>
    </div>
    </section>

    <!-- ═══ PAIN ═══ -->
    <section class="assoc-section alt" id="pain">
    <div class="container">
        <div class="section-head">
        <div class="eyebrow">The Problem</div>
        <h2>The problem isn't your courses. It's that your LMS and AMS don't talk to each other.</h2>
        <p>That's why everything feels manual, disconnected, and harder than it should be.</p>
        </div>
        <div class="pain-grid">
        <div class="a-card">
            <h3>What teams end up doing today</h3>
            <ul class="clean-list">
            <li>Exporting member lists into spreadsheets, then uploading them into the LMS</li>
            <li>Fixing duplicate learner records and mismatched email addresses</li>
            <li>Manually enrolling members based on role, chapter, or renewal status</li>
            <li>Answering support requests when members cannot access training</li>
            <li>Combining CE and completion data across systems for reports</li>
            </ul>
        </div>
        <div class="a-card dark">
            <h3>What this costs you</h3>
            <ul class="clean-list">
            <li>Admin overhead that grows with every cohort, chapter, or certification cycle</li>
            <li>Delayed onboarding for new members and inconsistent learning assignments</li>
            <li>Poor visibility into compliance, CE status, and completion trends</li>
            <li>More friction for members — lower participation and more support burden</li>
            <li>An LMS that feels disconnected from how the association actually operates</li>
            </ul>
        </div>
        </div>
    </div>
    </section>

    <!-- ═══ AMS INTEGRATION ═══ -->
    <section class="assoc-section" id="integration">
    <div class="container">
        <div class="section-head">
        <div class="eyebrow">AMS Integration</div>
        <h2>Connects with the AMS your association already uses</h2>
        <p>MyPass integrates with leading Association Management Systems through APIs and webhooks. Member data, training records, and CE credits sync bidirectionally — no middleware or manual exports required.</p>
        </div>
        <div class="int-grid">
        <div class="a-card">
            <h3>How the connected workflow works</h3>
            <div class="flow">
            <div class="flow-box"><strong>AMS</strong><p>Membership status, chapter, role, cohort, profile data, and credential context stay in the system your team already uses.</p></div>
            <div class="flow-arrow">→</div>
            <div class="flow-box"><strong>MyPass LMS</strong><p>Learning paths, enrollments, SSO, CE tracking, certifications, reminders, and reporting respond to those membership changes.</p></div>
            </div>
        </div>
        <div class="a-card">
            <h3>What this enables</h3>
            <ul class="clean-list">
            <li>Member sync based on current AMS data</li>
            <li>Single sign-on so members do not manage another login</li>
            <li>Automatic enrollment rules tied to membership or role changes</li>
            <li>CE and completion tracking connected to member records</li>
            <li>Cleaner reporting for staff, boards, and compliance workflows</li>
            </ul>
        </div>
        </div>
        <div class="ams-grid">
        <div class="ams-card"><span class="ams-icon">↔</span> iMIS</div>
        <div class="ams-card"><span class="ams-icon">↔</span> Nimble AMS</div>
        <div class="ams-card"><span class="ams-icon">↔</span> MemberClicks</div>
        <div class="ams-card"><span class="ams-icon">↔</span> YourMembership</div>
        <div class="ams-card"><span class="ams-icon">↔</span> Fonteva</div>
        <div class="ams-card"><span class="ams-icon">↔</span> NetForum</div>
        <div class="ams-card"><span class="ams-icon">↔</span> GrowthZone</div>
        <div class="ams-card"><span class="ams-icon">↔</span> Custom API / Webhooks</div>
        </div>
        <p class="ams-note">Don't see your AMS? We build custom integrations for associations on Growth and Enterprise plans. Most new AMS connections are live within 2–4 weeks.</p>
    </div>
    </section>

    <!-- ═══ BENEFITS ═══ -->
    <section class="assoc-section alt">
    <div class="container">
        <div class="section-head"><div class="eyebrow">Outcomes</div><h2>What association teams actually get out of this</h2></div>
        <div class="benefit-grid">
        <div class="a-card benefit"><div class="k">Admin efficiency</div><h3>Stop fixing your LMS every week</h3><p>Reduce the recurring work of moving member data and training activity between systems.</p></div>
        <div class="a-card benefit"><div class="k">Member experience</div><h3>Remove login and access friction</h3><p>Let members enter training through a cleaner path tied to their association identity.</p></div>
        <div class="a-card benefit"><div class="k">Visibility</div><h3>Track CE and compliance with less cleanup</h3><p>Get a clearer picture of who completed what and what still needs follow-up.</p></div>
        <div class="a-card benefit"><div class="k">Scalability</div><h3>Support chapters, cohorts, and roles</h3><p>Run different learning programs without building manual workarounds every cycle.</p></div>
        </div>
    </div>
    </section>

    <!-- ═══ USE CASES ═══ -->
    <section class="assoc-section" id="use-cases">
    <div class="container">
        <div class="section-head"><div class="eyebrow">Built for Association Education</div><h2>Use cases associations actually care about</h2></div>
        <div class="use-grid">
        <div class="a-card"><h3>CE / CEU programs</h3><p>Deliver member education, track credit hours, and reduce the reporting mess around completions and renewals.</p></div>
        <div class="a-card"><h3>Certification and recertification</h3><p>Manage credential paths, recurring renewal requirements, deadlines, and reminder workflows in one place.</p></div>
        <div class="a-card"><h3>New member onboarding</h3><p>Automatically assign orientation and required learning when new members join or change status.</p></div>
        <div class="a-card"><h3>Chapter and role-based learning</h3><p>Assign different training paths by chapter, committee, board role, or membership tier.</p></div>
        <div class="a-card"><h3>Compliance training</h3><p>Run required education programs with clearer completion tracking and fewer spreadsheets at reporting time.</p></div>
        <div class="a-card"><h3>Conference and event learning</h3><p>Use on-demand modules, post-event assessments, and CE workflows tied back to member learning records.</p></div>
        </div>
    </div>
    </section>

    <!-- ═══ PROOF ═══ -->
    <section class="assoc-section alt" id="proof">
    <div class="container">
        <div class="section-head" style="text-align:center;max-width:900px;margin:0 auto 28px;">
        <div class="eyebrow">Trusted by Associations</div>
        <h2>Trusted by certification bodies, associations, and education organizations</h2>
        </div>
        <div class="client-logos">
        <img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-67.png?fit=199%2C100&ssl=1" alt="American Board for Certification of Teacher Excellence" loading="lazy" />
        <img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-69.png?fit=197%2C100&ssl=1" alt="Youth for Understanding" loading="lazy" />
        <img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-65.png?fit=197%2C100&ssl=1" alt="Phi Delta Kappan" loading="lazy" />
        <img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-66.png?fit=198%2C100&ssl=1" alt="SBCA" loading="lazy" />
        <img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-68.png?fit=198%2C99&ssl=1" alt="PDK International" loading="lazy" />
        </div>
        <div class="proof-grid">
        <div class="a-card"><h3>Real outcomes from MyPass customers</h3><ul class="clean-list"><li>Scaled certification revenue from $100K to $1.2M</li><li>Expanded certification programs to 100+ countries</li><li>Eliminated manual compliance and reporting workflows</li><li>Replaced legacy LMS systems across global teams</li></ul></div>
        <div class="a-card"><p class="quote-text">"We eliminated manual enrollment and reporting work after connecting our AMS. Our team finally trusts the data again."</p><p><strong>Director of Learning, WSP</strong><br><span style="font-size:13px;color:var(--muted);">Global engineering organization</span></p></div>
        <div class="a-card"><p class="quote-text">"Before MyPass, CE tracking required spreadsheets and constant cleanup. Now it's automated and always up to date."</p><p><strong>Certification Manager, ABCTE</strong><br><span style="font-size:13px;color:var(--muted);">American Board for Certification of Teacher Excellence</span></p></div>
        </div>
    </div>
    </section>

    <!-- ═══ COMPARISON ═══ -->
    <section class="assoc-section" id="compare">
    <div class="container">
        <div class="section-head"><div class="eyebrow">Comparison</div><h2>MyPass vs a generic LMS for associations</h2></div>
        <div style="overflow:auto;">
        <table class="assoc-compare">
            <thead><tr><th>What matters</th><th>Generic LMS</th><th>MyPass LMS</th></tr></thead>
            <tbody>
            <tr><td>AMS connectivity</td><td class="bad">Often treated as a side integration or manual process</td><td class="good">Core architecture around member sync and operational fit</td></tr>
            <tr><td>Member access</td><td class="bad">Separate login and support friction</td><td class="good">SSO tied to existing association workflows</td></tr>
            <tr><td>Enrollment logic</td><td class="bad">Manual or lightly automated</td><td class="good">Rules that follow membership status, role, or chapter structure</td></tr>
            <tr><td>CE and credential tracking</td><td class="bad">Often requires extra admin reconciliation</td><td class="good">Cleaner reporting and less manual cleanup</td></tr>
            <tr><td>Pricing for large memberships</td><td class="bad">Per-seat pricing penalizes scale</td><td class="good">Active-user pricing — pay for actual learning activity</td></tr>
            <tr><td>Association fit</td><td class="bad">Broad LMS messaging for everyone</td><td class="good">Focused on association education teams using an AMS</td></tr>
            </tbody>
        </table>
        </div>
    </div>
    </section>

    <!-- ═══ FAQ ═══ -->
    <section class="faq-section assoc-section alt" id="faq">
    <div class="container">
        <h2>Questions association buyers ask</h2>
        <p>Straight answers to the questions that come up in every association LMS evaluation.</p>
        <div class="faq-list">
        <?php foreach ($faq_items as $faq): ?>
        <div class="faq-item">
            <button class="faq-q" onclick="toggleFaq(this)">
            <span><?php echo htmlspecialchars($faq[0]); ?></span>
            <svg class="faq-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
            </button>
            <div class="faq-a"><div class="faq-a-inner"><?php echo htmlspecialchars($faq[1]); ?></div></div>
        </div>
        <?php endforeach; ?>
        </div>
    </div>
    </section>

    <!-- ═══ FINAL CTA ═══ -->
    <section class="assoc-cta">
    <div class="container cta-grid">
        <div>
        <div class="eyebrow" style="background:rgba(255,255,255,.05);border-color:rgba(255,255,255,.12);color:#93c5fd;">Next Step</div>
        <h2 style="color:#fff;font-size:clamp(24px,3vw,34px);">Your LMS should work like your AMS does.</h2>
        <p style="font-weight:700;font-size:16px;color:#e2e8f0;margin:10px 0;">You don't need another LMS. You need one that actually fits how associations operate.</p>
        <p>MyPass is the LMS built for association operations — not a generic platform with extra features. The conversation starts with AMS sync, SSO, CE tracking, and reduced admin work.</p>
        </div>
        <div class="assoc-cta-box">
        <h3>See it in action</h3>
        <p>Book a demo and we'll show how member data, learning access, and credential tracking can work in one connected flow — using your specific AMS.</p>
        <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:18px;">
            <a class="btn-cta-primary" href="https://calendly.com/onlinesales-kprise/30min">See How This Works With Your AMS (15 min)</a>
            <a class="btn-cta-ghost" href="#pain">Review the Problem</a>
        </div>
        </div>
    </div>
    </section>

    <script>
    function toggleFaq(btn){const item=btn.closest('.faq-item');const wasOpen=item.classList.contains('open');document.querySelectorAll('.faq-item.open').forEach(el=>el.classList.remove('open'));if(!wasOpen)item.classList.add('open')}
    </script>

@endsection
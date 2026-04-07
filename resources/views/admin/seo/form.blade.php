{{--
    Admin: SEO Settings Form (Create & Edit)
    Route: admin.seo.create / admin.seo.edit
--}}

@extends('admin.layouts.app')

@section('title', $setting->exists ? 'Edit SEO — '.$setting->page_label : 'Add SEO Settings')

@push('styles')
<style>
.form-wrap { max-width: 900px; }
.tabs-nav  { display:flex; gap:0; border-bottom:2px solid #e5e7eb; margin-bottom:28px; }
.tab-btn   {
    padding:10px 20px; font-size:13.5px; font-weight:500;
    color:#6b7280; border:none; background:none; cursor:pointer;
    border-bottom:2px solid transparent; margin-bottom:-2px;
    transition:color 150ms, border-color 150ms; font-family:inherit;
}
.tab-btn.active { color:#5932EA; border-bottom-color:#5932EA; }
.tab-btn:hover  { color:#5932EA; }

.tab-panel { display:none; }
.tab-panel.active { display:block; }

.form-section {
    background:#fff; border:1px solid #e5e7eb; border-radius:12px;
    padding:24px; margin-bottom:20px;
}
.form-section-title {
    font-size:14px; font-weight:700; color:#111827;
    margin-bottom:18px; padding-bottom:12px;
    border-bottom:1px solid #f3f4f6;
    display:flex; align-items:center; gap:8px;
}
.form-grid { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
.form-grid-full { grid-column:1/-1; }

.form-group { display:flex; flex-direction:column; gap:5px; }
.form-label {
    font-size:12.5px; font-weight:600; color:#374151;
    display:flex; align-items:center; justify-content:space-between;
}
.char-count { font-size:11px; font-weight:400; }
.char-ok      { color:#10b981; }
.char-warn    { color:#f59e0b; }
.char-over    { color:#ef4444; }

.form-input, .form-select, .form-textarea {
    padding:9px 12px; border:1px solid #d1d5db; border-radius:8px;
    font-size:13.5px; font-family:inherit; outline:none; color:#111827;
    transition:border-color 150ms, box-shadow 150ms;
    background:#fff;
}
.form-input:focus, .form-select:focus, .form-textarea:focus {
    border-color:#5932EA; box-shadow:0 0 0 3px rgba(89,50,234,0.1);
}
.form-textarea { resize:vertical; min-height:90px; line-height:1.6; }
.form-hint { font-size:11.5px; color:#9ca3af; }

.serp-preview {
    background:#fff; border:1px solid #e5e7eb; border-radius:10px;
    padding:20px; font-family:'Arial',sans-serif;
}
.serp-url    { font-size:13px; color:#202124; margin-bottom:3px; }
.serp-title  { font-size:18px; color:#1a0dab; font-weight:400; margin-bottom:4px; cursor:pointer; }
.serp-title:hover { text-decoration:underline; }
.serp-desc   { font-size:13px; color:#4d5156; line-height:1.5; }

.og-preview {
    border:1px solid #e5e7eb; border-radius:10px; overflow:hidden;
    max-width:380px; font-family:'Helvetica',sans-serif;
}
.og-img { width:100%; height:160px; background:#f3f4f6; object-fit:cover; display:flex; align-items:center; justify-content:center; color:#9ca3af; font-size:13px; }
.og-img img { width:100%; height:100%; object-fit:cover; }
.og-body { padding:12px 14px; border-top:1px solid #e5e7eb; background:#f0f2f5; }
.og-domain { font-size:11px; color:#65676b; text-transform:uppercase; margin-bottom:4px; }
.og-title  { font-size:13.5px; font-weight:700; color:#1c1e21; margin-bottom:3px; }
.og-desc   { font-size:12.5px; color:#65676b; }

.toggle-wrap { display:flex; align-items:center; gap:10px; }
.toggle-switch {
    position:relative; width:44px; height:24px; cursor:pointer;
}
.toggle-switch input { opacity:0; width:0; height:0; }
.toggle-slider {
    position:absolute; inset:0; background:#d1d5db;
    border-radius:24px; transition:background 200ms;
}
.toggle-slider::before {
    content:''; position:absolute; width:18px; height:18px;
    left:3px; top:3px; background:#fff; border-radius:50%;
    transition:transform 200ms;
}
.toggle-switch input:checked + .toggle-slider { background:#5932EA; }
.toggle-switch input:checked + .toggle-slider::before { transform:translateX(20px); }
.toggle-label { font-size:13.5px; color:#374151; font-weight:500; }

.save-bar {
    position:sticky; bottom:0; background:#fff;
    border-top:1px solid #e5e7eb; padding:16px 0;
    display:flex; align-items:center; justify-content:space-between;
    z-index:10; margin-top:24px; flex-wrap:wrap; gap:12px;
}
.btn-save {
    padding:10px 28px; background:#5932EA; color:#fff;
    border:none; border-radius:8px; font-size:14px; font-weight:600;
    cursor:pointer; font-family:inherit; transition:background 150ms;
}
.btn-save:hover { background:#4220C8; }
.btn-cancel {
    padding:10px 20px; background:#fff; color:#374151;
    border:1px solid #d1d5db; border-radius:8px; font-size:14px;
    cursor:pointer; font-family:inherit; text-decoration:none;
    display:inline-flex; align-items:center;
    transition:background 150ms;
}
.btn-cancel:hover { background:#f9fafb; }

.errors-box {
    background:#fee2e2; border:1px solid #fca5a5; border-radius:8px;
    padding:14px 16px; margin-bottom:20px;
}
.errors-box ul { padding-left:18px; margin-top:6px; }
.errors-box li { font-size:13px; color:#991b1b; margin-bottom:3px; }
</style>
@endpush

@section('content')
<div style="padding:32px;" class="form-wrap">

    {{-- Header --}}
    <div style="display:flex;align-items:center;gap:12px;margin-bottom:24px;">
        <a href="{{ route('admin.seo.index') }}" style="color:#6b7280;text-decoration:none;display:flex;align-items:center;gap:4px;font-size:13.5px;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
            SEO Manager
        </a>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#d1d5db" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
        <span style="font-size:13.5px;color:#111827;font-weight:600;">
            {{ $setting->exists ? $setting->page_label : 'Add New Page' }}
        </span>
    </div>

    {{-- Errors 
    <!-- @if($errors->any())
        <div class="errors-box">
            <strong style="color:#991b1b;font-size:13.5px;">Please fix the following errors:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->--}}

    <form
        method="POST"
        action="{{ $setting->exists ? route('admin.seo.update', $setting) : route('admin.seo.store') }}"
        id="seoForm"
    >
        @csrf
        @if($setting->exists) @method('PUT') @endif

        {{-- Tab Navigation --}}
        <div class="tabs-nav">
            <button type="button" class="tab-btn active" data-tab="core">
                Core SEO
            </button>
            <button type="button" class="tab-btn" data-tab="og">
                Open Graph
            </button>
            <button type="button" class="tab-btn" data-tab="twitter">
                Twitter Card
            </button>
            <button type="button" class="tab-btn" data-tab="preview">
                Live Preview
            </button>
            <button type="button" class="tab-btn" data-tab="advanced">
                Advanced
            </button>
        </div>

        {{-- ════════════════════════════════════
             TAB 1: Core SEO
        ════════════════════════════════════ --}}
        <div class="tab-panel active" data-panel="core">

            {{-- Page identification --}}
            <div class="form-section">
                <div class="form-section-title">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#5932EA" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 9h6M9 12h6M9 15h4"/></svg>
                    Page Identification
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="page_label">Page Label *</label>
                        <input id="page_label" name="page_label" type="text" class="form-input"
                               value="{{ old('page_label', $setting->page_label) }}"
                               placeholder="e.g. Homepage, Pricing, Industry — Healthcare"
                               required>
                        <span class="form-hint">Human-readable name shown only in this admin panel.</span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="route_name">Route Name *</label>
                        @if($setting->exists)
                            <input type="text" class="form-input" value="{{ $setting->route_name }}" readonly
                                   style="background:#f9fafb;cursor:not-allowed;color:#6b7280;">
                            <input type="hidden" name="route_name" value="{{ $setting->route_name }}">
                        @else
                            <select id="route_name" name="route_name" class="form-select" required>
                                <option value="">— Select a page —</option>
                                @foreach($availableRoutes as $routeName => $label)
                                    <option value="{{ $routeName }}"
                                        {{ old('route_name') === $routeName ? 'selected' : '' }}>
                                        {{ $label }} ({{ $routeName }})
                                    </option>
                                @endforeach
                                <option value="__custom__">+ Enter custom route name…</option>
                            </select>
                            <input type="text" id="route_name_custom" name="route_name_custom"
                                   class="form-input" style="display:none;margin-top:8px;"
                                   placeholder="e.g. blog.show">
                        @endif
                        <span class="form-hint">Matches your Laravel route name exactly.</span>
                    </div>
                </div>
            </div>

            {{-- Title & Description --}}
            <div class="form-section">
                <div class="form-section-title">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#5932EA" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
                    Title & Description
                </div>
                <div style="display:flex;flex-direction:column;gap:16px;">

                    <div class="form-group">
                        <label class="form-label" for="title">
                            Page Title
                            <span class="char-count" id="title-count">
                                {{ mb_strlen(old('title', $setting->title ?? '')) }}/70
                            </span>
                        </label>
                        <input id="title" name="title" type="text" class="form-input"
                               value="{{ old('title', $setting->title) }}"
                               placeholder="e.g. LMS for Healthcare — Compliance Training | MyPass LMS"
                               maxlength="70"
                               oninput="updateCount('title', 70, 50, 60)">
                        <div style="height:4px;background:#f3f4f6;border-radius:2px;margin-top:4px;">
                            <div id="title-bar" style="height:100%;border-radius:2px;background:#10b981;width:{{ min(100, (mb_strlen(old('title',$setting->title??''))/70)*100) }}%;transition:width 200ms,background 200ms;"></div>
                        </div>
                        <span class="form-hint">Ideal: 50–60 characters. Shows in browser tab and Google results.</span>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="description">
                            Meta Description
                            <span class="char-count" id="description-count">
                                {{ mb_strlen(old('description', $setting->description ?? '')) }}/165
                            </span>
                        </label>
                        <textarea id="description" name="description" class="form-textarea"
                                  placeholder="Compelling summary of the page. Include your main keyword naturally."
                                  maxlength="165"
                                  oninput="updateCount('description', 165, 120, 155)">{{ old('description', $setting->description) }}</textarea>
                        <div style="height:4px;background:#f3f4f6;border-radius:2px;margin-top:4px;">
                            <div id="description-bar" style="height:100%;border-radius:2px;background:#10b981;width:{{ min(100, (mb_strlen(old('description',$setting->description??''))/165)*100) }}%;transition:width 200ms,background 200ms;"></div>
                        </div>
                        <span class="form-hint">Ideal: 120–155 characters. Shown under the title in Google results.</span>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="keywords">Keywords</label>
                        <input id="keywords" name="keywords" type="text" class="form-input"
                               value="{{ old('keywords', $setting->keywords) }}"
                               placeholder="lms, ai training, employee learning, compliance training">
                        <span class="form-hint">Comma-separated. Minor SEO signal — focus on title/description first.</span>
                    </div>
                </div>
            </div>

            {{-- Canonical & Robots --}}
            <div class="form-section">
                <div class="form-section-title">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#5932EA" stroke-width="2"><path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"/></svg>
                    Canonical URL & Robots
                </div>
                <div class="form-grid">
                    <div class="form-group form-grid-full">
                        <label class="form-label" for="canonical_url">Canonical URL</label>
                        <input id="canonical_url" name="canonical_url" type="url" class="form-input"
                               value="{{ old('canonical_url', $setting->canonical_url) }}"
                               placeholder="https://yoursite.com/page — leave blank to use current URL">
                        <span class="form-hint">Only set if this page has duplicate content issues. Usually leave blank.</span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="robots">Robots</label>
                        <select id="robots" name="robots" class="form-select">
                            @foreach(['index, follow','noindex, follow','index, nofollow','noindex, nofollow'] as $r)
                                <option value="{{ $r }}" {{ old('robots', $setting->robots) === $r ? 'selected' : '' }}>
                                    {{ $r }}
                                </option>
                            @endforeach
                        </select>
                        <span class="form-hint">Use "noindex, follow" for admin/thank-you/legal pages.</span>
                    </div>
                    <div class="form-group" style="justify-content:flex-end;padding-bottom:4px;">
                        <label class="form-label">Status</label>
                        <div class="toggle-wrap" style="margin-top:8px;">
                            <label class="toggle-switch">
                                <input type="checkbox" name="is_active" value="1"
                                    {{ old('is_active', $setting->is_active ?? true) ? 'checked' : '' }}>
                                <span class="toggle-slider"></span>
                            </label>
                            <span class="toggle-label">Use DB meta tags for this page</span>
                        </div>
                        <span class="form-hint" style="margin-top:6px;">When off, the page uses hard-coded defaults from the controller.</span>
                    </div>
                </div>
            </div>

        </div>{{-- /tab core --}}

        {{-- ════════════════════════════════════
             TAB 2: Open Graph
        ════════════════════════════════════ --}}
        <div class="tab-panel" data-panel="og">
            <div class="form-section">
                <div class="form-section-title">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1877f2" stroke-width="2"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                    Open Graph — Controls how your page appears when shared on Facebook, LinkedIn, WhatsApp
                </div>
                <div style="display:flex;gap:28px;flex-wrap:wrap;">
                    <div style="flex:1;min-width:280px;display:flex;flex-direction:column;gap:14px;">

                        <div class="form-group">
                            <label class="form-label" for="og_title">
                                OG Title
                                <span class="char-count" id="og_title-count">{{ mb_strlen(old('og_title', $setting->og_title ?? '')) }}/95</span>
                            </label>
                            <input id="og_title" name="og_title" type="text" class="form-input"
                                   value="{{ old('og_title', $setting->og_title) }}"
                                   placeholder="Leave blank to use Page Title"
                                   oninput="updateCount('og_title',95,60,80);updateOGPreview()">
                            <span class="form-hint">Falls back to Page Title if blank.</span>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="og_description">
                                OG Description
                                <span class="char-count" id="og_description-count">{{ mb_strlen(old('og_description', $setting->og_description ?? '')) }}/200</span>
                            </label>
                            <textarea id="og_description" name="og_description" class="form-textarea"
                                      style="min-height:70px;"
                                      placeholder="Leave blank to use Meta Description"
                                      oninput="updateCount('og_description',200,100,160);updateOGPreview()">{{ old('og_description', $setting->og_description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="og_image">OG Image URL</label>
                            <input id="og_image" name="og_image" type="text" class="form-input"
                                   value="{{ old('og_image', $setting->og_image) }}"
                                   placeholder="https://yoursite.com/assets/images/og-page.png"
                                   oninput="updateOGPreview()">
                            <span class="form-hint">Recommended: 1200×630px PNG/JPG. Falls back to default OG image.</span>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="og_type">OG Type</label>
                            <select id="og_type" name="og_type" class="form-select">
                                @foreach(['website','article','product'] as $t)
                                    <option value="{{ $t }}" {{ old('og_type', $setting->og_type ?? 'website') === $t ? 'selected' : '' }}>{{ ucfirst($t) }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    {{-- OG Preview --}}
                    <div style="width:380px;flex-shrink:0;">
                        <div class="form-hint" style="margin-bottom:10px;font-weight:600;color:#374151;">Facebook / LinkedIn preview:</div>
                        <div class="og-preview">
                            <div class="og-img" id="og-img-preview">
                                @if($setting->og_image)
                                    <img src="{{ $setting->og_image }}" alt="OG preview" id="og-img-tag">
                                @else
                                    <span id="og-img-placeholder">1200 × 630</span>
                                    <img src="" alt="" id="og-img-tag" style="display:none;width:100%;height:100%;object-fit:cover;">
                                @endif
                            </div>
                            <div class="og-body">
                                <div class="og-domain" id="og-domain-preview">{{ request()->host() }}</div>
                                <div class="og-title" id="og-title-preview">{{ $setting->og_title ?? $setting->title ?? 'Page title will appear here' }}</div>
                                <div class="og-desc" id="og-desc-preview">{{ $setting->og_description ?? $setting->description ?? 'Page description will appear here when shared on social media.' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>{{-- /tab og --}}

        {{-- ════════════════════════════════════
             TAB 3: Twitter Card
        ════════════════════════════════════ --}}
        <div class="tab-panel" data-panel="twitter">
            <div class="form-section">
                <div class="form-section-title">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="color:#1d9bf0"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.259 5.629L18.244 2.25z"/></svg>
                    Twitter Card — Controls how your page appears when shared on X / Twitter
                </div>
                <div class="form-grid">

                    <div class="form-group">
                        <label class="form-label" for="twitter_card">Card Type</label>
                        <select id="twitter_card" name="twitter_card" class="form-select">
                            <option value="summary_large_image" {{ old('twitter_card',$setting->twitter_card??'summary_large_image')==='summary_large_image' ? 'selected':'' }}>Summary with Large Image</option>
                            <option value="summary" {{ old('twitter_card',$setting->twitter_card??'')==='summary' ? 'selected':'' }}>Summary (small image)</option>
                        </select>
                        <span class="form-hint">summary_large_image is recommended for most pages.</span>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="twitter_site">Twitter @handle</label>
                        <input id="twitter_site" name="twitter_site" type="text" class="form-input"
                               value="{{ old('twitter_site', $setting->twitter_site) }}"
                               placeholder="@yourhandle">
                        <span class="form-hint">Your site's Twitter/X account handle.</span>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="twitter_title">
                            Twitter Title
                            <span class="char-count" id="twitter_title-count">{{ mb_strlen(old('twitter_title',$setting->twitter_title??'')) }}/70</span>
                        </label>
                        <input id="twitter_title" name="twitter_title" type="text" class="form-input"
                               value="{{ old('twitter_title', $setting->twitter_title) }}"
                               placeholder="Leave blank to use OG Title → Page Title"
                               oninput="updateCount('twitter_title',70,40,60)">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="twitter_image">Twitter Image URL</label>
                        <input id="twitter_image" name="twitter_image" type="text" class="form-input"
                               value="{{ old('twitter_image', $setting->twitter_image) }}"
                               placeholder="Leave blank to use OG Image">
                    </div>

                    <div class="form-group form-grid-full">
                        <label class="form-label" for="twitter_description">
                            Twitter Description
                            <span class="char-count" id="twitter_description-count">{{ mb_strlen(old('twitter_description',$setting->twitter_description??'')) }}/200</span>
                        </label>
                        <textarea id="twitter_description" name="twitter_description" class="form-textarea"
                                  style="min-height:70px;"
                                  placeholder="Leave blank to use OG Description → Meta Description"
                                  oninput="updateCount('twitter_description',200,100,160)">{{ old('twitter_description', $setting->twitter_description) }}</textarea>
                    </div>
                </div>
            </div>
        </div>{{-- /tab twitter --}}

        {{-- ════════════════════════════════════
             TAB 4: Live Preview
        ════════════════════════════════════ --}}
        <div class="tab-panel" data-panel="preview">
            <div class="form-section">
                <div class="form-section-title">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#5932EA" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    Google SERP Preview
                </div>
                <div class="serp-preview" style="max-width:580px;">
                    <div class="serp-url" id="serp-url">{{ url('/') }} › {{ request()->path() }}</div>
                    <div class="serp-title" id="serp-title">{{ $setting->title ?? 'Your page title will appear here' }}</div>
                    <div class="serp-desc" id="serp-desc">{{ $setting->description ?? 'Your meta description will appear here. Make it compelling and include your main keyword.' }}</div>
                </div>
                <div class="form-hint" style="margin-top:12px;">Updates live as you type in the Core SEO tab.</div>
            </div>

            <div class="form-section">
                <div class="form-section-title">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#5932EA" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                    Generated Meta Tags Preview
                </div>
                <pre id="meta-preview" style="background:#1e1e3f;color:#a8b2d8;padding:20px;border-radius:8px;font-size:12px;overflow-x:auto;line-height:1.7;white-space:pre-wrap;"></pre>
            </div>
        </div>{{-- /tab preview --}}

        {{-- ════════════════════════════════════
             TAB 5: Advanced
        ════════════════════════════════════ --}}
        <div class="tab-panel" data-panel="advanced">
            <div class="form-section">
                <div class="form-section-title">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#5932EA" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93l-1.41 1.41M4.93 4.93l1.41 1.41M12 2v2M12 20v2M20 12h2M2 12h2M17.66 17.66l-1.41-1.41M6.34 17.66l1.41-1.41"/></svg>
                    Advanced / Custom Head Tags
                </div>
                <div class="form-group">
                    <label class="form-label" for="published_at">Article Published Date</label>
                    <input id="published_at" name="published_at" type="datetime-local" class="form-input"
                           style="max-width:260px;"
                           value="{{ old('published_at', $setting->published_at?->format('Y-m-d\TH:i') ?? '') }}">
                    <span class="form-hint">Only needed for og:type=article pages (blog posts). Adds article:published_time meta tag.</span>
                </div>
                <div class="form-group" style="margin-top:16px;">
                    <label class="form-label" for="custom_head_tags">Custom &lt;head&gt; Code</label>
                    <textarea id="custom_head_tags" name="custom_head_tags" class="form-textarea"
                              style="min-height:160px;font-family:monospace;font-size:12.5px;"
                              placeholder="Paste any custom HTML to inject inside &lt;head&gt; — Schema.org JSON-LD, custom meta tags, verification codes, etc.">{{ old('custom_head_tags', $setting->custom_head_tags) }}</textarea>
                    <span class="form-hint">Raw HTML. Rendered unescaped inside &lt;head&gt; — use carefully. Good for Schema.org structured data.</span>
                </div>
                <div class="form-section-title" style="margin-top:20px;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    Quick Schema Templates
                </div>
                <div style="display:flex;flex-wrap:wrap;gap:8px;">
                    <button type="button" class="action-btn btn-secondary" style="font-size:12px;" onclick="insertSchema('faq')">Insert FAQ Schema</button>
                    <button type="button" class="action-btn btn-secondary" style="font-size:12px;" onclick="insertSchema('breadcrumb')">Insert Breadcrumb Schema</button>
                    <button type="button" class="action-btn btn-secondary" style="font-size:12px;" onclick="insertSchema('software')">Insert Software App Schema</button>
                    <button type="button" class="action-btn btn-secondary" style="font-size:12px;" onclick="insertSchema('review')">Insert Review Schema</button>
                </div>
            </div>
        </div>{{-- /tab advanced --}}

        {{-- Save bar --}}
        <div class="save-bar">
            <a href="{{ route('admin.seo.index') }}" class="btn-cancel">Cancel</a>
            <div style="display:flex;align-items:center;gap:12px;">
                <span id="save-status" style="font-size:13px;color:#10b981;display:none;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:inline;vertical-align:-2px"><polyline points="20 6 9 17 4 12"/></svg>
                    All changes saved
                </span>
                <button type="submit" class="btn-save">
                    {{ $setting->exists ? 'Update SEO Settings' : 'Save SEO Settings' }}
                </button>
            </div>
        </div>

    </form>
</div>
@endsection

@push('scripts')
@verbatim
<script>
const titleEl  = document.getElementById('title');
const descEl   = document.getElementById('description');

/* ── Tabs ───────────────────────────────────────────────────── */
document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
        btn.classList.add('active');
        document.querySelector(`[data-panel="${btn.dataset.tab}"]`).classList.add('active');
        if (btn.dataset.tab === 'preview') updatePreviewTab();
    });
});

/* ── Character counter ──────────────────────────────────────── */
function updateCount(id, max, idealMin, idealMax) {
    const el  = document.getElementById(id);
    const cnt = document.getElementById(id + '-count');
    const bar = document.getElementById(id + '-bar');
    if (!el || !cnt) return;
    const len = el.value.length;
    cnt.textContent = `${len}/${max}`;
    cnt.className = 'char-count ' + (len === 0 ? '' : len <= idealMax ? 'char-ok' : len <= max ? 'char-warn' : 'char-over');
    if (bar) {
        const pct = Math.min(100, (len / max) * 100);
        bar.style.width = pct + '%';
        bar.style.background = len === 0 ? '#d1d5db' : len <= idealMax ? '#10b981' : len <= max ? '#f59e0b' : '#ef4444';
    }
    updateSerpPreview();
}

/* ── SERP preview ───────────────────────────────────────────── */
function updateSerpPreview() {
    const t = document.getElementById('title')?.value || 'Your page title will appear here';
    const d = document.getElementById('description')?.value || 'Your meta description will appear here.';
    const st = document.getElementById('serp-title');
    const sd = document.getElementById('serp-desc');
    if (st) st.textContent = t;
    if (sd) sd.textContent = d;
}

/* ── OG preview ─────────────────────────────────────────────── */
function updateOGPreview() {
    const ogTitle = document.getElementById('og_title')?.value
                 || document.getElementById('title')?.value
                 || 'Page title will appear here';
    const ogDesc  = document.getElementById('og_description')?.value
                 || document.getElementById('description')?.value
                 || 'Description will appear here.';
    const ogImg   = document.getElementById('og_image')?.value;

    const tp = document.getElementById('og-title-preview');
    const dp = document.getElementById('og-desc-preview');
    const ip = document.getElementById('og-img-tag');
    const ph = document.getElementById('og-img-placeholder');

    if (tp) tp.textContent = ogTitle;
    if (dp) dp.textContent = ogDesc;
    if (ip) {
        if (ogImg) {
            ip.src = ogImg; ip.style.display = 'block';
            if (ph) ph.style.display = 'none';
        } else {
            ip.style.display = 'none';
            if (ph) ph.style.display = 'block';
        }
    }
}

/* ── Meta tags code preview ─────────────────────────────────── */
function updatePreviewTab() {
    const v = id => document.getElementById(id)?.value || '';
    const title   = v('title')       || '(fallback from config)';
    const desc    = v('description') || '';
    const kw      = v('keywords')    || '';
    const robots  = document.getElementById('robots')?.value || 'index, follow';
    const canon   = v('canonical_url') || '(current URL)';
    const ogTitle = v('og_title') || title;
    const ogDesc  = v('og_description') || desc;
    const ogImg   = v('og_image') || '(default OG image)';
    const ogType  = document.getElementById('og_type')?.value || 'website';
    const twCard  = document.getElementById('twitter_card')?.value || 'summary_large_image';
    const twTitle = v('twitter_title') || ogTitle;
    const twDesc  = v('twitter_description') || ogDesc;

    const html = `<span style="color:#637777"><!-- Core SEO --></span>
<span style="color:#c792ea">&lt;title&gt;</span><span style="color:#ecc48d">${title}</span><span style="color:#c792ea">&lt;/title&gt;</span>
<span style="color:#c792ea">&lt;meta</span> <span style="color:#addb67">name</span>=<span style="color:#ecc48d">"description"</span> <span style="color:#addb67">content</span>=<span style="color:#ecc48d">"${desc}"</span><span style="color:#c792ea">&gt;</span>
<span style="color:#c792ea">&lt;meta</span> <span style="color:#addb67">name</span>=<span style="color:#ecc48d">"keywords"</span> <span style="color:#addb67">content</span>=<span style="color:#ecc48d">"${kw}"</span><span style="color:#c792ea">&gt;</span>
<span style="color:#c792ea">&lt;meta</span> <span style="color:#addb67">name</span>=<span style="color:#ecc48d">"robots"</span> <span style="color:#addb67">content</span>=<span style="color:#ecc48d">"${robots}"</span><span style="color:#c792ea">&gt;</span>
<span style="color:#c792ea">&lt;link</span> <span style="color:#addb67">rel</span>=<span style="color:#ecc48d">"canonical"</span> <span style="color:#addb67">href</span>=<span style="color:#ecc48d">"${canon}"</span><span style="color:#c792ea">&gt;</span>

<span style="color:#637777"><!-- Open Graph --></span>
<span style="color:#c792ea">&lt;meta</span> <span style="color:#addb67">property</span>=<span style="color:#ecc48d">"og:type"</span> <span style="color:#addb67">content</span>=<span style="color:#ecc48d">"${ogType}"</span><span style="color:#c792ea">&gt;</span>
<span style="color:#c792ea">&lt;meta</span> <span style="color:#addb67">property</span>=<span style="color:#ecc48d">"og:title"</span> <span style="color:#addb67">content</span>=<span style="color:#ecc48d">"${ogTitle}"</span><span style="color:#c792ea">&gt;</span>
<span style="color:#c792ea">&lt;meta</span> <span style="color:#addb67">property</span>=<span style="color:#ecc48d">"og:description"</span> <span style="color:#addb67">content</span>=<span style="color:#ecc48d">"${ogDesc}"</span><span style="color:#c792ea">&gt;</span>
<span style="color:#c792ea">&lt;meta</span> <span style="color:#addb67">property</span>=<span style="color:#ecc48d">"og:image"</span> <span style="color:#addb67">content</span>=<span style="color:#ecc48d">"${ogImg}"</span><span style="color:#c792ea">&gt;</span>

<span style="color:#637777"><!-- Twitter Card --></span>
<span style="color:#c792ea">&lt;meta</span> <span style="color:#addb67">name</span>=<span style="color:#ecc48d">"twitter:card"</span> <span style="color:#addb67">content</span>=<span style="color:#ecc48d">"${twCard}"</span><span style="color:#c792ea">&gt;</span>
<span style="color:#c792ea">&lt;meta</span> <span style="color:#addb67">name</span>=<span style="color:#ecc48d">"twitter:title"</span> <span style="color:#addb67">content</span>=<span style="color:#ecc48d">"${twTitle}"</span><span style="color:#c792ea">&gt;</span>
<span style="color:#c792ea">&lt;meta</span> <span style="color:#addb67">name</span>=<span style="color:#ecc48d">"twitter:description"</span> <span style="color:#addb67">content</span>=<span style="color:#ecc48d">"${twDesc}"</span><span style="color:#c792ea">&gt;</span>`;

    const pre = document.getElementById('meta-preview');
    if (pre) pre.innerHTML = html;
}

/* ── Custom route input ─────────────────────────────────────── */
const routeSelect = document.getElementById('route_name');
const routeCustom = document.getElementById('route_name_custom');
if (routeSelect && routeCustom) {
    routeSelect.addEventListener('change', function() {
        if (this.value === '__custom__') {
            routeCustom.style.display = 'block';
            routeCustom.required = true;
            this.name = '';
            routeCustom.name = 'route_name';
        } else {
            routeCustom.style.display = 'none';
            routeCustom.required = false;
            this.name = 'route_name';
            routeCustom.name = '';
            // Auto-fill page label if empty
            const selectedText = this.options[this.selectedIndex]?.text || '';
            const labelInput = document.getElementById('page_label');
            if (labelInput && !labelInput.value && this.value !== '') {
                labelInput.value = selectedText.split(' (')[0];
            }
        }
    });
}

/* ── Schema snippets ────────────────────────────────────────── */
const schemas = {
    faq: `<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "What is your question?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Your answer here."
            }
        }
    ]
}
<\/script>`,
    breadcrumb: `<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://yoursite.com" },
        { "@type": "ListItem", "position": 2, "name": "Current Page" }
    ]
}
<\/script>`,
    software: `<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "SoftwareApplication",
    "name": "MyPass LMS",
    "applicationCategory": "BusinessApplication",
    "operatingSystem": "Web",
    "offers": { "@type": "Offer", "price": "0", "priceCurrency": "USD" },
    "aggregateRating": { "@type": "AggregateRating", "ratingValue": "4.8", "reviewCount": "200" }
}
<\/script>`,
    review: `<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Review",
    "itemReviewed": { "@type": "SoftwareApplication", "name": "MyPass LMS" },
    "reviewRating": { "@type": "Rating", "ratingValue": "5", "bestRating": "5" },
    "author": { "@type": "Person", "name": "Reviewer Name" },
    "reviewBody": "Review text here."
}
<\/script>`,
};
function insertSchema(type) {
    const ta = document.getElementById('custom_head_tags');
    if (ta) ta.value += (ta.value ? '\n\n' : '') + schemas[type];
}

/* ── Init ───────────────────────────────────────────────────── */
['title','description','og_title','og_description','twitter_title','twitter_description'].forEach(id => {
    const el = document.getElementById(id);
    if (el) el.addEventListener('input', updateSerpPreview);
});
document.getElementById('og_image')?.addEventListener('input', updateOGPreview);
updateSerpPreview();
updateOGPreview();
</script>
@end
@endverbatim
@endpush

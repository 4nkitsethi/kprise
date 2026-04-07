{{--
    Admin: SEO Settings Index
    Route: admin.seo.index
    URL:   /admin/seo
--}}

@extends('admin.layouts.app')

@section('title', 'SEO Manager')

@push('styles')
<style>
.seo-table { width: 100%; border-collapse: collapse; font-size: 13.5px; }
.seo-table th {
    padding: 10px 14px;
    text-align: left;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    color: #6b7280;
    border-bottom: 2px solid #e5e7eb;
    white-space: nowrap;
    background: #f9fafb;
}
.seo-table td {
    padding: 12px 14px;
    border-bottom: 1px solid #f3f4f6;
    vertical-align: top;
}
.seo-table tr:hover td { background: #f9fafb; }
.seo-table tr:last-child td { border-bottom: none; }

.badge { display: inline-flex; align-items: center; gap: 4px; padding: 2px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; }
.badge-green  { background: #d1fae5; color: #065f46; }
.badge-red    { background: #fee2e2; color: #991b1b; }
.badge-gray   { background: #f3f4f6; color: #4b5563; }

.char-bar { height: 4px; border-radius: 2px; margin-top: 3px; transition: width 0.3s; }
.char-bar-good    { background: #10b981; }
.char-bar-warning { background: #f59e0b; }
.char-bar-over    { background: #ef4444; }

.action-btn {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 5px 10px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
    text-decoration: none;
    border: 1px solid;
    cursor: pointer;
    transition: all 150ms;
    background: transparent;
    font-family: inherit;
}
.btn-edit    { border-color: #d1d5db; color: #374151; }
.btn-edit:hover { background: #f3f4f6; }
.btn-toggle  { border-color: #fcd34d; color: #92400e; }
.btn-toggle:hover { background: #fef3c7; }
.btn-delete  { border-color: #fca5a5; color: #991b1b; }
.btn-delete:hover { background: #fee2e2; }
.btn-primary { background: #5932EA; color: #fff; border-color: #5932EA; }
.btn-primary:hover { background: #4220C8; }
.btn-secondary { background: #fff; color: #374151; border-color: #d1d5db; }
.btn-secondary:hover { background: #f9fafb; }

.search-input {
    padding: 8px 12px 8px 36px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 13.5px;
    font-family: inherit;
    outline: none;
    width: 260px;
    transition: border-color 150ms;
}
.search-input:focus { border-color: #5932EA; box-shadow: 0 0 0 3px rgba(89,50,234,0.1); }
.search-wrap { position: relative; }
.search-icon { position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #9ca3af; }

.filter-select {
    padding: 8px 12px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 13.5px;
    font-family: inherit;
    background: #fff;
    outline: none;
    cursor: pointer;
}
.filter-select:focus { border-color: #5932EA; }

.page-title { font-size: 22px; font-weight: 700; color: #111827; margin: 0; }
.page-sub   { font-size: 13.5px; color: #6b7280; margin-top: 4px; }

.stats-row { display: flex; gap: 16px; margin-bottom: 24px; }
.stat-card {
    flex: 1;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 16px 20px;
}
.stat-val  { font-size: 28px; font-weight: 700; color: #111827; line-height: 1; }
.stat-label{ font-size: 12px; color: #6b7280; margin-top: 4px; }

.alert {
    padding: 12px 16px;
    border-radius: 8px;
    font-size: 13.5px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.alert-success { background: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
.alert-warning { background: #fef3c7; color: #92400e; border: 1px solid #fcd34d; }

.tooltip-text {
    font-size: 12px;
    color: #6b7280;
    margin-top: 2px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 280px;
}
</style>
@endpush

@section('content')

<div style="padding: 32px;">

    {{-- Header --}}
    <div style="display:flex; align-items:flex-start; justify-content:space-between; margin-bottom:24px; flex-wrap:wrap; gap:16px;">
        <div>
            <h1 class="page-title">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#5932EA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline;vertical-align:-4px;margin-right:8px"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
                SEO Manager
            </h1>
            <p class="page-sub">Manage meta tags, Open Graph, and Twitter Card data for every page.</p>
        </div>
        <div style="display:flex;gap:10px;flex-wrap:wrap;">
            {{-- Bulk seed button --}}
            @if(count($unseededRoutes) > 0)
                <form method="POST" action="{{ route('admin.seo.bulk-seed') }}">
                    @csrf
                    <button type="submit" class="action-btn btn-secondary"
                        onclick="return confirm('Add {{ count($unseededRoutes) }} missing pages to SEO manager?')">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
                        Add {{ count($unseededRoutes) }} Missing Pages
                    </button>
                </form>
            @endif
            <a href="{{ route('admin.seo.create') }}" class="action-btn btn-primary">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
                Add Custom Page
            </a>
        </div>
    </div>

    {{-- Alerts --}}
    @if(session('success'))
        <div class="alert alert-success">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- Stats row --}}
    @php
        $total    = $settings->total();
        $active   = \App\Models\SeoSetting::where('is_active', true)->count();
        $missing  = count($unseededRoutes);
        $noTitle  = \App\Models\SeoSetting::whereNull('title')->orWhere('title','')->count();
    @endphp
    <div class="stats-row">
        <div class="stat-card">
            <div class="stat-val">{{ $total }}</div>
            <div class="stat-label">Total pages managed</div>
        </div>
        <div class="stat-card">
            <div class="stat-val" style="color:#10b981">{{ $active }}</div>
            <div class="stat-label">Active (using DB meta)</div>
        </div>
        <div class="stat-card">
            <div class="stat-val" style="color:{{ $noTitle > 0 ? '#ef4444' : '#10b981' }}">{{ $noTitle }}</div>
            <div class="stat-label">Pages missing title</div>
        </div>
        <div class="stat-card">
            <div class="stat-val" style="color:{{ $missing > 0 ? '#f59e0b' : '#10b981' }}">{{ $missing }}</div>
            <div class="stat-label">Unmanaged pages</div>
        </div>
    </div>

    {{-- Search & Filter Bar --}}
    <form method="GET" action="{{ route('admin.seo.index') }}"
          style="display:flex;gap:12px;align-items:center;margin-bottom:20px;flex-wrap:wrap;">

        <div class="search-wrap">
            <svg class="search-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
            <input
                type="text"
                name="search"
                class="search-input"
                placeholder="Search pages, routes, titles…"
                value="{{ request('search') }}"
            >
        </div>

        <select name="status" class="filter-select" onchange="this.form.submit()">
            <option value="">All status</option>
            <option value="active"   {{ request('status') === 'active'   ? 'selected' : '' }}>Active only</option>
            <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive only</option>
        </select>

        @if(request('search') || request('status'))
            <a href="{{ route('admin.seo.index') }}" class="action-btn btn-secondary" style="font-size:13px;">
                Clear filters
            </a>
        @endif

        <button type="submit" class="action-btn btn-primary" style="margin-left:auto;">
            Search
        </button>
    </form>

    {{-- Table --}}
    <div style="background:#fff; border:1px solid #e5e7eb; border-radius:12px; overflow:hidden;">
        <table class="seo-table">
            <thead>
                <tr>
                    <th style="width:22%">Page</th>
                    <th style="width:28%">Title & Description</th>
                    <th style="width:10%">OG Image</th>
                    <th style="width:10%">Robots</th>
                    <th style="width:8%">Status</th>
                    <th style="width:22%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($settings as $seo)
                @php
                    $titleLen = mb_strlen($seo->title ?? '');
                    $descLen  = mb_strlen($seo->description ?? '');
                    $titlePct = min(100, ($titleLen / 70) * 100);
                    $descPct  = min(100, ($descLen / 165) * 100);
                    $titleColor = $titleLen === 0 ? 'char-bar-over' : ($titleLen <= 60 ? 'char-bar-good' : ($titleLen <= 70 ? 'char-bar-warning' : 'char-bar-over'));
                    $descColor  = $descLen  === 0 ? 'char-bar-over' : ($descLen  <= 155 ? 'char-bar-good' : ($descLen  <= 165 ? 'char-bar-warning' : 'char-bar-over'));
                @endphp
                <tr>
                    {{-- Page --}}
                    <td>
                        <div style="font-weight:600;color:#111827;font-size:13.5px;">{{ $seo->page_label }}</div>
                        <div style="font-size:11.5px;color:#9ca3af;margin-top:3px;font-family:monospace;">{{ $seo->route_name }}</div>
                    </td>

                    {{-- Title & Description --}}
                    <td>
                        @if($seo->title)
                            <div style="font-weight:500;color:#111827;font-size:13px;line-height:1.4;">
                                {{ Str::limit($seo->title, 55) }}
                            </div>
                            <div style="display:flex;align-items:center;gap:6px;margin-top:3px;">
                                <div style="flex:1;height:4px;border-radius:2px;background:#f3f4f6;">
                                    <div class="char-bar {{ $titleColor }}" style="width:{{ $titlePct }}%"></div>
                                </div>
                                <span style="font-size:10px;color:#9ca3af;white-space:nowrap;">{{ $titleLen }}/70</span>
                            </div>
                        @else
                            <span style="font-size:12px;color:#ef4444;font-style:italic;">No title set</span>
                        @endif

                        @if($seo->description)
                            <div class="tooltip-text" title="{{ $seo->description }}" style="margin-top:6px;">
                                {{ Str::limit($seo->description, 80) }}
                            </div>
                            <div style="display:flex;align-items:center;gap:6px;margin-top:3px;">
                                <div style="flex:1;height:4px;border-radius:2px;background:#f3f4f6;">
                                    <div class="char-bar {{ $descColor }}" style="width:{{ $descPct }}%"></div>
                                </div>
                                <span style="font-size:10px;color:#9ca3af;white-space:nowrap;">{{ $descLen }}/165</span>
                            </div>
                        @else
                            <div style="font-size:12px;color:#f59e0b;font-style:italic;margin-top:4px;">No description set</div>
                        @endif
                    </td>

                    {{-- OG Image --}}
                    <td>
                        @if($seo->og_image)
                            <div style="width:56px;height:36px;border-radius:6px;overflow:hidden;border:1px solid #e5e7eb;">
                                <img src="{{ $seo->og_image }}" alt="OG preview"
                                     style="width:100%;height:100%;object-fit:cover;"
                                     onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                                <div style="display:none;width:100%;height:100%;background:#f3f4f6;align-items:center;justify-content:center;font-size:9px;color:#9ca3af;">No img</div>
                            </div>
                        @else
                            <span style="font-size:11px;color:#9ca3af;">Using default</span>
                        @endif
                    </td>

                    {{-- Robots --}}
                    <td>
                        <span class="badge {{ str_contains($seo->robots, 'noindex') ? 'badge-red' : 'badge-gray' }}"
                              style="font-size:10px;padding:2px 7px;">
                            {{ $seo->robots }}
                        </span>
                    </td>

                    {{-- Status --}}
                    <td>
                        <span class="badge {{ $seo->is_active ? 'badge-green' : 'badge-red' }}">
                            <span style="width:6px;height:6px;border-radius:50%;background:{{ $seo->is_active ? '#10b981' : '#ef4444' }};"></span>
                            {{ $seo->is_active ? 'Active' : 'Off' }}
                        </span>
                    </td>

                    {{-- Actions --}}
                    <td>
                        <div style="display:flex;gap:6px;flex-wrap:wrap;">
                            {{-- Edit --}}
                            <a href="{{ route('admin.seo.edit', $seo) }}" class="action-btn btn-edit">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                Edit
                            </a>

                            {{-- Toggle 
                            <form method="POST" action="{{ route('admin.seo.toggle', $seo) }}">
                                @csrf
                                <button type="submit" class="action-btn btn-toggle">
                                    @if($seo->is_active)
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18.36 6.64A9 9 0 0 1 20.77 15"/><path d="M6.16 6.16a9 9 0 1 0 12.68 12.68"/><line x1="2" y1="2" x2="22" y2="22"/></svg>
                                        Disable
                                    @else
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                                        Enable
                                    @endif
                                </button>
                            </form> --}}

                            {{-- Preview page --}}
                            @if(Route::has($seo->route_name))
                                <a href="{{ route($seo->route_name) }}" target="_blank" class="action-btn btn-secondary">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                                    View
                                </a>
                            @endif

                            {{-- Delete 
                            <form method="POST" action="{{ route('admin.seo.destroy', $seo) }}">
                                @csrf @method('DELETE')
                                <button type="submit" class="action-btn btn-delete"
                                    onclick="return confirm('Delete SEO settings for \'{{ addslashes($seo->page_label) }}\'?')">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/><path d="M10 11v6M14 11v6"/></svg>
                                    Delete
                                </button>
                            </form> --}}
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center;padding:48px;color:#9ca3af;">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#d1d5db" stroke-width="1.5" style="margin:0 auto 12px;display:block"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
                        No SEO settings found.
                        <a href="{{ route('admin.seo.create') }}" style="color:#5932EA;">Add your first page →</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        @if($settings->hasPages())
            <div style="padding:16px 20px;border-top:1px solid #f3f4f6;">
                {{ $settings->links() }}
            </div>
        @endif
    </div>

</div>
@endsection

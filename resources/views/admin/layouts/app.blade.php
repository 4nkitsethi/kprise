<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin') — {{ config('app.name') }}</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ── Reset ─────────────────────────────────────────────── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { font-size: 16px; }
        body {
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            background: #f9fafb;
            color: #111827;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }
        a { text-decoration: none; color: inherit; }
        ul, ol { list-style: none; }
        button { cursor: pointer; font-family: inherit; }
        img { max-width: 100%; display: block; }

        /* ── Layout shell ───────────────────────────────────────── */
        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        /* ── Sidebar ────────────────────────────────────────────── */
        .admin-sidebar {
            width: 240px;
            flex-shrink: 0;
            background: #fff;
            border-right: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            overflow-y: auto;
            z-index: 50;
            transition: transform 250ms ease;
        }

        /* Logo */
        .admin-sidebar__logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 20px 20px 18px;
            border-bottom: 1px solid #f3f4f6;
            text-decoration: none;
        }
        .admin-sidebar__logo-icon {
            width: 34px;
            height: 34px;
            background: #5932EA;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .admin-sidebar__logo-icon svg { width: 18px; height: 18px; }
        .admin-sidebar__logo-name {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
        }
        .admin-sidebar__logo-badge {
            font-size: 10px;
            font-weight: 600;
            background: #eee9fd;
            color: #5932EA;
            padding: 1px 6px;
            border-radius: 4px;
            margin-left: auto;
        }

        /* Nav sections */
        .admin-sidebar__section {
            font-size: 10.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #9ca3af;
            padding: 18px 20px 6px;
        }

        /* Nav items */
        .admin-nav__item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 20px;
            font-size: 13.5px;
            font-weight: 500;
            color: #6b7280;
            border-left: 3px solid transparent;
            transition: color 150ms, background 150ms, border-color 150ms;
            text-decoration: none;
        }
        .admin-nav__item:hover {
            color: #5932EA;
            background: #f5f3ff;
        }
        .admin-nav__item.active {
            color: #5932EA;
            background: #f5f3ff;
            border-left-color: #5932EA;
            font-weight: 600;
        }
        .admin-nav__item svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }
        .admin-nav__badge {
            margin-left: auto;
            font-size: 10px;
            font-weight: 700;
            background: #fee2e2;
            color: #991b1b;
            padding: 1px 6px;
            border-radius: 10px;
        }
        .admin-nav__badge-blue {
            background: #dbeafe;
            color: #1e40af;
        }

        /* Sidebar footer */
        .admin-sidebar__footer {
            margin-top: auto;
            padding: 16px 20px;
            border-top: 1px solid #f3f4f6;
        }
        .admin-sidebar__user {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .admin-sidebar__avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #5932EA;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            flex-shrink: 0;
        }
        .admin-sidebar__user-name  { font-size: 13px; font-weight: 600; color: #111827; }
        .admin-sidebar__user-role  { font-size: 11.5px; color: #9ca3af; }

        /* ── Top bar ────────────────────────────────────────────── */
        .admin-topbar {
            position: fixed;
            top: 0;
            left: 240px;
            right: 0;
            height: 60px;
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            z-index: 40;
        }
        .admin-topbar__left { display: flex; align-items: center; gap: 12px; }
        .admin-topbar__breadcrumb {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13.5px;
            color: #6b7280;
        }
        .admin-topbar__breadcrumb-current { color: #111827; font-weight: 600; }
        .admin-topbar__right { display: flex; align-items: center; gap: 12px; }

        /* View site link */
        .admin-topbar__view-site {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
            color: #5932EA;
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 6px;
            border: 1px solid #ede9fd;
            transition: background 150ms;
        }
        .admin-topbar__view-site:hover { background: #f5f3ff; }
        .admin-topbar__view-site svg { width: 13px; height: 13px; }

        /* Notification bell */
        .admin-topbar__bell {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
            color: #6b7280;
        }
        .admin-topbar__bell svg { width: 16px; height: 16px; }
        .admin-topbar__bell-dot {
            position: absolute;
            top: 6px;
            right: 7px;
            width: 7px;
            height: 7px;
            background: #ef4444;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        /* ── Main content area ──────────────────────────────────── */
        .admin-content {
            margin-left: 240px;
            margin-top: 60px;
            min-height: calc(100vh - 60px);
            flex: 1;
        }

        /* ── Flash messages ─────────────────────────────────────── */
        .flash-wrap {
            padding: 0 28px;
            padding-top: 20px;
        }
        .flash {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 13.5px;
            margin-bottom: 4px;
        }
        .flash-success { background: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
        .flash-error   { background: #fee2e2; color: #991b1b; border: 1px solid #fca5a5; }
        .flash-warning { background: #fef3c7; color: #92400e; border: 1px solid #fcd34d; }
        .flash-info    { background: #dbeafe; color: #1e40af; border: 1px solid #bfdbfe; }
        .flash svg { width: 16px; height: 16px; flex-shrink: 0; }

        /* ── Mobile sidebar toggle ──────────────────────────────── */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.4);
            z-index: 49;
        }
        .admin-topbar__hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            padding: 6px;
            background: none;
            border: none;
            cursor: pointer;
        }
        .admin-topbar__hamburger span {
            display: block;
            width: 20px;
            height: 2px;
            background: #374151;
            border-radius: 2px;
        }

        @media (max-width: 1024px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-sidebar.open {
                transform: translateX(0);
            }
            .sidebar-overlay.open {
                display: block;
            }
            .admin-topbar {
                left: 0;
            }
            .admin-topbar__hamburger {
                display: flex;
            }
            .admin-content {
                margin-left: 0;
            }
        }
    </style>

    @stack('styles')
</head>
<body>

<div class="admin-layout">

    {{-- ── Sidebar ────────────────────────────────────────────── --}}
    <aside class="admin-sidebar" id="admin-sidebar" aria-label="Admin navigation">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="admin-sidebar__logo" target="_blank">
            <div class="admin-sidebar__logo-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                    <path d="M2 17l10 5 10-5"/>
                    <path d="M2 12l10 5 10-5"/>
                </svg>
            </div>
            <span class="admin-sidebar__logo-name">{{ config('app.name', 'LMS') }}</span>
            <span class="admin-sidebar__logo-badge">Admin</span>
        </a>

        {{-- Navigation --}}
        <nav>
            <p class="admin-sidebar__section">Main</p>

            <a href="{{'#' }}"
               class="admin-nav__item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/>
                    <rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
                Dashboard
            </a>

            <p class="admin-sidebar__section">Content</p>

            <a href="#" class="admin-nav__item {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                </svg>
                Pages
            </a>

            <a href="{{  '#' }}"
               class="admin-nav__item {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                    <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                </svg>
                Blog Posts
            </a>

            <a href="#" class="admin-nav__item {{ request()->routeIs('admin.courses.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z"/>
                    <path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z"/>
                </svg>
                Courses
            </a>

            <p class="admin-sidebar__section">Marketing</p>

            <a href="{{ route('admin.seo.index') }}"
               class="admin-nav__item {{ request()->routeIs('admin.seo.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"/>
                    <path d="M21 21l-4.35-4.35"/>
                </svg>
                SEO Manager
                @php $missingSeo = \App\Models\SeoSetting::where('is_active',true)->whereNull('title')->count(); @endphp
                @if($missingSeo > 0)
                    <span class="admin-nav__badge">{{ $missingSeo }}</span>
                @endif
            </a>

            <a href="#" class="admin-nav__item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                </svg>
                Analytics
            </a>

            <a href="#" class="admin-nav__item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                </svg>
                Users
            </a>

            <p class="admin-sidebar__section">System</p>

            <a href="#" class="admin-nav__item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="3"/>
                    <path d="M19.07 4.93l-1.41 1.41M4.93 4.93l1.41 1.41M12 2v2M12 20v2M20 12h2M2 12h2M17.66 17.66l-1.41-1.41M6.34 17.66l1.41-1.41"/>
                </svg>
                Settings
            </a>
        </nav>

        {{-- User info --}}
        <div class="admin-sidebar__footer">
            <div class="admin-sidebar__user">
                <div class="admin-sidebar__avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div>
                    <p class="admin-sidebar__user-name">{{ auth()->user()->name ?? 'Admin User' }}</p>
                    <p class="admin-sidebar__user-role">Administrator</p>
                </div>
            </div>
        </div>

    </aside>

    {{-- Overlay for mobile --}}
    <div class="sidebar-overlay" id="sidebar-overlay" onclick="closeSidebar()"></div>

    {{-- ── Top bar ─────────────────────────────────────────────── --}}
    <header class="admin-topbar">
        <div class="admin-topbar__left">
            {{-- Mobile hamburger --}}
            <button class="admin-topbar__hamburger" id="sidebar-toggle" aria-label="Toggle menu" onclick="toggleSidebar()">
                <span></span><span></span><span></span>
            </button>

            {{-- Breadcrumb --}}
            <nav class="admin-topbar__breadcrumb" aria-label="Admin breadcrumb">
                <a href="{{ route('admin.seo.index') }}" style="color:#6b7280;">Admin</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                <span class="admin-topbar__breadcrumb-current">@yield('title', 'Dashboard')</span>
            </nav>
        </div>

        <div class="admin-topbar__right">
            {{-- View site --}}
            <a href="{{ route('home') }}" target="_blank" class="admin-topbar__view-site">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/>
                    <polyline points="15 3 21 3 21 9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                </svg>
                View Site
            </a>

            {{-- Notification bell --}}
            <div class="admin-topbar__bell">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                    <path d="M13.73 21a2 2 0 01-3.46 0"/>
                </svg>
                <span class="admin-topbar__bell-dot"></span>
            </div>
        </div>
    </header>

    {{-- ── Page content ────────────────────────────────────────── --}}
    <main class="admin-content" id="main-content">

        {{-- Flash messages --}}
        @if(session('success') || session('error') || session('warning') || session('info'))
            <div class="flash-wrap">
                @if(session('success'))
                    <div class="flash flash-success" role="alert">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="flash flash-error" role="alert">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        {{ session('error') }}
                    </div>
                @endif
                @if(session('warning'))
                    <div class="flash flash-warning" role="alert">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                        {{ session('warning') }}
                    </div>
                @endif
                @if(session('info'))
                    <div class="flash flash-info" role="alert">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                        {{ session('info') }}
                    </div>
                @endif
            </div>
        @endif

        @yield('content')

    </main>

</div>

<script>
function toggleSidebar() {
    document.getElementById('admin-sidebar').classList.toggle('open');
    document.getElementById('sidebar-overlay').classList.toggle('open');
}
function closeSidebar() {
    document.getElementById('admin-sidebar').classList.remove('open');
    document.getElementById('sidebar-overlay').classList.remove('open');
}
</script>

@stack('scripts')

</body>
</html>
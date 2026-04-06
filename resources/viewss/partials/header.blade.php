<header class="site-header">
    <div class="container" style="display:flex;justify-content:space-between;padding:15px;">
        <a href="/">
            <img src="https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/logo-color.png"
                 width="150">
        </a>

        <nav>
            <a href="/" class="{{ $page_slug=='home' ? 'active' : '' }}">Home</a>
            <a href="/pricing" class="{{ $page_slug=='pricing' ? 'active' : '' }}">Pricing</a>
            <a href="/associations" class="{{ $page_slug=='associations' ? 'active' : '' }}">Associations</a>
        </nav>
    </div>
</header>
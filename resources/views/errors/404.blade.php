{{--
    Page: 404 Not Found
    Laravel auto-loads resources/views/errors/404.blade.php
--}}

@extends('layouts.app')

@section('content')
<section class="error-page" aria-labelledby="error-heading">
    <div class="container error-page__inner">
        <span class="error-page__code" aria-hidden="true">404</span>
        <h1 class="error-page__heading" id="error-heading">Page not found</h1>
        <p class="error-page__subtext">
            The page you're looking for doesn't exist or has been moved.
        </p>
        <div class="error-page__actions">
            <a href="{{ route('home') }}" class="btn btn--primary btn--lg">Go to Homepage</a>
            <a href="{{ route('contact') }}" class="btn btn--outline btn--lg">Contact Support</a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.error-page {
    min-height: 70vh;
    display: flex;
    align-items: center;
    padding: var(--space-20) 0;
    background: linear-gradient(135deg, #F8F6FF 0%, #FFFFFF 70%);
}
.error-page__inner { text-align: center; max-width: 560px; margin-inline: auto; }
.error-page__code {
    display: block;
    font-family: var(--font-display);
    font-size: 8rem;
    font-weight: var(--weight-bold);
    line-height: 1;
    color: var(--color-primary-light);
    margin-bottom: var(--space-4);
}
.error-page__heading {
    font-family: var(--font-display);
    font-size: var(--text-4xl);
    font-weight: var(--weight-bold);
    color: var(--color-gray-900);
    margin-bottom: var(--space-4);
}
.error-page__subtext {
    font-size: var(--text-lg);
    color: var(--color-text-secondary);
    margin-bottom: var(--space-8);
}
.error-page__actions { display: flex; gap: var(--space-4); justify-content: center; flex-wrap: wrap; }
</style>
@endpush

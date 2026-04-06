{{--
    Page: 500 Server Error
    Laravel auto-loads resources/views/errors/500.blade.php
--}}

@extends('layouts.app')

@section('content')
<section class="error-page" aria-labelledby="error-heading">
    <div class="container error-page__inner">
        <span class="error-page__code" aria-hidden="true">500</span>
        <h1 class="error-page__heading" id="error-heading">Something went wrong</h1>
        <p class="error-page__subtext">
            We're experiencing a technical issue. Our team has been notified.
            Please try again in a few minutes.
        </p>
        <div class="error-page__actions">
            <a href="{{ route('home') }}" class="btn btn--primary btn--lg">Go to Homepage</a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.error-page { min-height: 70vh; display: flex; align-items: center; padding: var(--space-20) 0; background: linear-gradient(135deg, #F8F6FF 0%, #FFFFFF 70%); }
.error-page__inner { text-align: center; max-width: 560px; margin-inline: auto; }
.error-page__code { display: block; font-family: var(--font-display); font-size: 8rem; font-weight: var(--weight-bold); line-height: 1; color: var(--color-primary-light); margin-bottom: var(--space-4); }
.error-page__heading { font-family: var(--font-display); font-size: var(--text-4xl); font-weight: var(--weight-bold); color: var(--color-gray-900); margin-bottom: var(--space-4); }
.error-page__subtext { font-size: var(--text-lg); color: var(--color-text-secondary); margin-bottom: var(--space-8); }
.error-page__actions { display: flex; gap: var(--space-4); justify-content: center; }
</style>
@endpush

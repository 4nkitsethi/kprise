{{--
    Page: Contact Us
    Route: contact
    Controller: AboutController@contact
--}}

@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/inner-pages.css') }}">
@endpush

@section('content')

<section class="inner-hero">
    <div class="container">
        <span class="section-label">Get in Touch</span>
        <h1 class="inner-hero__heading">Talk to Our Team</h1>
        <p class="inner-hero__subtext">
            Book a live demo, ask a question, or just find out if MyPass LMS is the right fit for your team.
            We usually respond within one business day.
        </p>
    </div>
</section>

<div class="container">
    <div class="contact-layout">

        {{-- Contact Info --}}
        <div class="contact-info">
            <h2 class="contact-info__heading">We're here to help</h2>
            <p class="contact-info__body">
                Whether you're evaluating LMS platforms, need a custom enterprise quote,
                or just want to see the product in action — our team is ready.
            </p>

            <div class="contact-detail">
                <div class="contact-detail__icon" aria-hidden="true">
                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none">
                        <path d="M3 5a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M3 8l7 5 7-5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <div>
                    <p class="contact-detail__label">Email us</p>
                    <a href="mailto:sales@kprise.com" class="contact-detail__value">sales@kprise.com</a>
                </div>
            </div>

            <div class="contact-detail">
                <div class="contact-detail__icon" aria-hidden="true">
                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none">
                        <path d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.578a1.5 1.5 0 01-.761 1.644l-.803.401a11.05 11.05 0 005.937 5.937l.401-.803a1.5 1.5 0 011.644-.761l3.578.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15C7.82 18 2 12.18 2 5V3.5z" stroke="currentColor" stroke-width="1.5"/>
                    </svg>
                </div>
                <div>
                    <p class="contact-detail__label">Call us</p>
                    <a href="tel:+12403164903" class="contact-detail__value">(240) 316-4903</a>
                </div>
            </div>

            <div class="contact-detail">
                <div class="contact-detail__icon" aria-hidden="true">
                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none">
                        <path d="M10 11a3 3 0 100-6 3 3 0 000 6z" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M17 10c0 5-7 9-7 9S3 15 3 10a7 7 0 0114 0z" stroke="currentColor" stroke-width="1.5"/>
                    </svg>
                </div>
                <div>
                    <p class="contact-detail__label">Office</p>
                    <address class="contact-detail__value" style="font-style:normal; font-size: var(--text-sm); line-height: 1.6;">
                        3905 National Drive, Suite 330<br>
                        Burtonsville MD, 20866
                    </address>
                </div>
            </div>

            <div style="margin-top: var(--space-8);">
                <p style="font-size: var(--text-sm); font-weight: var(--weight-medium); margin-bottom: var(--space-3); color: var(--color-gray-800);">Or book a time directly:</p>
                <a
                    href="{{ config('services.demo_url', '#') }}"
                    class="btn btn--primary"
                    target="_blank"
                    rel="noopener"
                >
                    Book a 30-min Demo
                </a>
            </div>
        </div>

        {{-- Contact Form --}}
        <div class="form-card">
            <h2 style="font-family: var(--font-display); font-size: var(--text-xl); font-weight: var(--weight-bold); margin-bottom: var(--space-6);">
                Send us a message
            </h2>

            <form action="{{ route('contact.submit') }}" method="POST" novalidate>
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name" class="form-label">First name <span aria-hidden="true">*</span></label>
                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            class="form-input"
                            required
                            autocomplete="given-name"
                            value="{{ old('first_name') }}"
                        >
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="form-label">Last name <span aria-hidden="true">*</span></label>
                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            class="form-input"
                            required
                            autocomplete="family-name"
                            value="{{ old('last_name') }}"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Work email <span aria-hidden="true">*</span></label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input"
                        required
                        autocomplete="email"
                        value="{{ old('email') }}"
                    >
                </div>

                <div class="form-group">
                    <label for="company" class="form-label">Company name</label>
                    <input
                        type="text"
                        id="company"
                        name="company"
                        class="form-input"
                        autocomplete="organization"
                        value="{{ old('company') }}"
                    >
                </div>

                <div class="form-group">
                    <label for="team_size" class="form-label">Approximate team size</label>
                    <select id="team_size" name="team_size" class="form-select">
                        <option value="">Select team size</option>
                        <option value="1-10"   {{ old('team_size') === '1-10'     ? 'selected' : '' }}>1–10 people</option>
                        <option value="11-50"  {{ old('team_size') === '11-50'    ? 'selected' : '' }}>11–50 people</option>
                        <option value="51-200" {{ old('team_size') === '51-200'   ? 'selected' : '' }}>51–200 people</option>
                        <option value="201-500"{{ old('team_size') === '201-500'  ? 'selected' : '' }}>201–500 people</option>
                        <option value="500+"   {{ old('team_size') === '500+'     ? 'selected' : '' }}>500+ people</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message" class="form-label">How can we help?</label>
                    <textarea
                        id="message"
                        name="message"
                        class="form-textarea"
                        rows="4"
                        placeholder="Tell us about your training needs, goals, or questions..."
                    >{{ old('message') }}</textarea>
                </div>

                @if ($errors->any())
                    <div role="alert" style="padding: var(--space-3) var(--space-4); background: #FEF2F2; border-radius: var(--radius-md); margin-bottom: var(--space-4); font-size: var(--text-sm); color: #991B1B;">
                        Please fix the following errors:
                        <ul style="margin-top: var(--space-2); padding-left: var(--space-4); list-style: disc;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div role="status" style="padding: var(--space-3) var(--space-4); background: #F0FDF4; border-radius: var(--radius-md); margin-bottom: var(--space-4); font-size: var(--text-sm); color: #166534;">
                        {{ session('success') }}
                    </div>
                @endif

                <button type="submit" class="btn btn--primary btn--lg" style="width: 100%;">
                    Send Message
                </button>

                <p style="font-size: var(--text-xs); color: var(--color-text-muted); margin-top: var(--space-3); text-align: center;">
                    By submitting this form you agree to our
                    <a href="{{ route('legal.privacy') }}" style="color: var(--color-primary);">Privacy Policy</a>.
                </p>
            </form>
        </div>

    </div>
</div>

@endsection

@extends('front.layouts.app')

@section('title', 'Events | AI-Solutions')

@push('styles')
<style>
    .angled-notch {
        clip-path: polygon(0 0, 100% 0, 100% calc(100% - 12px), calc(100% - 12px) 100%, 0 100%);
    }
    .angled-notch-lg {
        clip-path: polygon(0 0, 100% 0, 100% calc(100% - 32px), calc(100% - 32px) 100%, 0 100%);
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative pt-48 pb-32 px-margin-desktop overflow-hidden">
    <div class="max-w-4xl" data-aos="fade-up">
        <div class="mb-6">
            <span class="bg-secondary-container text-on-secondary-container px-3 py-1 font-label-sm text-label-sm rounded-full hover-glow cursor-default">GLOBAL EVENTS 2024</span>
        </div>
        <h1 class="text-display-lg font-display-lg mb-8">Architecting the future through collaborative intelligence.</h1>
        <p class="text-body-lg font-body-lg text-on-surface-variant max-w-2xl">Join our upcoming webinars, hands-on workshops, and flagship summits. We bridge the gap between theoretical AI research and enterprise-ready automation.</p>
    </div>
    <!-- Abstract Background Shape -->
    <div class="absolute -top-24 -right-24 w-[600px] h-[600px] bg-secondary/5 rounded-full blur-[120px] -z-10"></div>
</section>

<!-- Featured Event (Bento Style) -->
<section class="px-margin-desktop mb-section-gap">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
        <!-- Large Feature Card -->
        <div class="md:col-span-8 group relative overflow-hidden bg-surface-container-low border border-outline-variant/30 angled-notch-lg p-10 flex flex-col justify-end min-h-[500px] hover-glow transition-all" data-aos="fade-right">
            <img class="absolute inset-0 w-full h-full object-cover opacity-10 group-hover:opacity-20 transition-opacity duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBAyt6UL0YFKw0diln-lmuNKQVvWS1OAcEw8MiFd3bdbRED1qo7vKF0Zj_V5VkFRKxER9DJ-8RXj4tWyxwFjrcFGpFBZxIREOW0IQzx5RxHPVKb-1i2CRmZwtp7GifyQx-wCsQBC-UdzK6dvd6qQFmclEclp2MOpZHQurASZZ9-rLepo3HZN9tCLjxdFHEAlN8xcT9-hJpeZG2AHQU5_JNCP7F9XTNS_BDA_doVltm5vK90vMm1VhuahsQKGxSEVDrq2ED8NRXxHVU" alt="Modern AI Summit"/>
            <div class="relative z-10">
                <div class="flex items-center gap-4 mb-4">
                    <span class="text-label-sm font-label-sm bg-secondary text-white px-2 py-1">SUMMIT</span>
                    <span class="text-label-sm font-label-sm text-on-surface-variant">OCTOBER 12-14, 2024 • ZURICH, CH</span>
                </div>
                <h2 class="text-headline-lg font-headline-lg mb-4">The Global AI Precision Summit</h2>
                <p class="text-body-md font-body-md text-on-surface-variant mb-8 max-w-lg">Our flagship event for C-level executives and lead architects. Three days of intensive strategy sessions on the future of autonomous workflows.</p>
                <a href="{{ route('front.event.detail') }}" class="inline-block bg-secondary text-white px-8 py-3 rounded-none font-label-sm text-label-sm border border-secondary transition-all active:scale-95 hover-glow">
                    Register for the Summit
                </a>
            </div>
        </div>

        <!-- Small Feature Card 1 -->
        <div class="md:col-span-4 bg-surface-container-low border border-outline-variant/30 angled-notch p-8 flex flex-col justify-between hover-glow transition-all" data-aos="fade-left" data-aos-delay="100">
            <div>
                <div class="flex justify-between items-start mb-12">
                    <span class="material-symbols-outlined text-secondary text-4xl" data-icon="terminal">terminal</span>
                    <span class="text-label-sm font-label-sm text-secondary font-bold">LIVE NOW</span>
                </div>
                <h3 class="text-headline-md font-headline-md mb-2">Dev-to-Production Workshop</h3>
                <p class="text-body-md font-body-md text-on-surface-variant">Deploying LLMs at scale with zero-latency requirements.</p>
            </div>
            <a href="#" class="text-secondary font-bold text-label-sm font-label-sm flex items-center gap-2 mt-8 group">
                Join Session <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform" data-icon="arrow_forward">arrow_forward</span>
            </a>
        </div>
    </div>
</section>

<!-- Filter & Categories -->
<section class="px-margin-desktop mb-16 border-b border-outline-variant/20 pb-8 flex flex-col md:flex-row justify-between items-end gap-8" data-aos="fade-up">
    <div>
        <h2 class="text-headline-md font-headline-md mb-2">Upcoming Calendar</h2>
        <p class="text-body-md font-body-md text-on-surface-variant">Explore tailored learning experiences across various formats.</p>
    </div>
    <div class="flex gap-2 overflow-x-auto pb-2 md:pb-0">
        <button class="px-6 py-2 bg-secondary text-white text-label-sm font-label-sm rounded-full">All Events</button>
        <button class="px-6 py-2 border border-outline-variant text-on-surface-variant text-label-sm font-label-sm rounded-full hover:border-secondary transition-colors">Webinars</button>
        <button class="px-6 py-2 border border-outline-variant text-on-surface-variant text-label-sm font-label-sm rounded-full hover:border-secondary transition-colors">Workshops</button>
        <button class="px-6 py-2 border border-outline-variant text-on-surface-variant text-label-sm font-label-sm rounded-full hover:border-secondary transition-colors">Summits</button>
    </div>
</section>

<!-- Event List Grid -->
<section class="px-margin-desktop mb-section-gap">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
        <!-- Event Item 1 -->
        <div class="bg-surface-container-low border border-outline-variant/30 angled-notch p-8 hover:border-secondary transition-all hover-glow" data-aos="fade-up" data-aos-delay="100">
            <div class="text-on-tertiary-container font-label-sm text-label-sm mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined text-base" data-icon="calendar_today">calendar_today</span>
                AUG 24, 2024
            </div>
            <h4 class="text-headline-md font-headline-md mb-4">Neural Architecture: Beyond Transformer Models</h4>
            <p class="text-body-md font-body-md text-on-surface-variant mb-12">A technical deep dive into next-generation neural networks for specialized enterprise tasks.</p>
            <div class="flex justify-between items-center">
                <div class="flex -space-x-2">
                    <div class="w-8 h-8 rounded-full bg-surface-container-high border-2 border-surface flex items-center justify-center text-[10px] font-bold">DR</div>
                    <div class="w-8 h-8 rounded-full bg-surface-container-high border-2 border-surface flex items-center justify-center text-[10px] font-bold">AS</div>
                </div>
                <button class="text-secondary font-bold text-label-sm font-label-sm underline">Register</button>
            </div>
        </div>

        <!-- Event Item 2 -->
        <div class="bg-surface-container-low border border-outline-variant/30 angled-notch p-8 hover:border-secondary transition-all hover-glow" data-aos="fade-up" data-aos-delay="200">
            <div class="text-on-tertiary-container font-label-sm text-label-sm mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined text-base" data-icon="videocam">videocam</span>
                SEP 05, 2024
            </div>
            <h4 class="text-headline-md font-headline-md mb-4">The Ethics of Automated Decision Systems</h4>
            <p class="text-body-md font-body-md text-on-surface-variant mb-12">Navigating the regulatory landscape of EU AI Act and global governance frameworks.</p>
            <div class="flex justify-between items-center">
                <div class="flex -space-x-2">
                    <div class="w-8 h-8 rounded-full bg-surface-container-high border-2 border-surface flex items-center justify-center text-[10px] font-bold">MJ</div>
                </div>
                <button class="text-secondary font-bold text-label-sm font-label-sm underline">Register</button>
            </div>
        </div>

        <!-- Event Item 3 -->
        <div class="bg-surface-container-low border border-outline-variant/30 angled-notch p-8 hover:border-secondary transition-all hover-glow" data-aos="fade-up" data-aos-delay="300">
            <div class="text-on-tertiary-container font-label-sm text-label-sm mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined text-base" data-icon="groups">groups</span>
                SEP 18, 2024
            </div>
            <h4 class="text-headline-md font-headline-md mb-4">AI-Solutions Partner Network Workshop</h4>
            <p class="text-body-md font-body-md text-on-surface-variant mb-12">Exclusive for registered partners. Exploring integration APIs for the Q4 ecosystem release.</p>
            <div class="flex justify-between items-center">
                <div class="flex -space-x-2">
                    <div class="w-8 h-8 rounded-full bg-surface-container-high border-2 border-surface flex items-center justify-center text-[10px] font-bold">CTO</div>
                </div>
                <button class="text-secondary font-bold text-label-sm font-label-sm underline">Waitlist</button>
            </div>
        </div>

        <!-- Event Item 4 -->
        <div class="bg-surface-container-low border border-outline-variant/30 angled-notch p-8 hover:border-secondary transition-all hover-glow" data-aos="fade-up" data-aos-delay="400">
            <div class="text-on-tertiary-container font-label-sm text-label-sm mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined text-base" data-icon="videocam">videocam</span>
                OCT 02, 2024
            </div>
            <h4 class="text-headline-md font-headline-md mb-4">Prompt Engineering at the Edge</h4>
            <p class="text-body-md font-body-md text-on-surface-variant mb-12">How to optimize context windows for local, low-power device deployments.</p>
            <div class="flex justify-between items-center">
                <span class="text-label-sm font-label-sm text-on-surface-variant/60">Limited Space</span>
                <button class="text-secondary font-bold text-label-sm font-label-sm underline">Register</button>
            </div>
        </div>

        <!-- CTA Card -->
        <div class="md:col-span-2 bg-secondary p-8 angled-notch flex flex-col md:flex-row items-center justify-between gap-8 hover-glow transition-all" data-aos="fade-up" data-aos-delay="500">
            <div class="text-white">
                <h4 class="text-headline-md font-headline-md mb-2">Host a custom workshop?</h4>
                <p class="text-body-md font-body-md opacity-80">We offer private sessions for enterprise teams looking to accelerate their AI roadmap.</p>
            </div>
            <button class="whitespace-nowrap bg-white text-secondary px-8 py-3 rounded-none font-label-sm text-label-sm hover:bg-secondary-container transition-colors">
                Request Private Workshop
            </button>
        </div>
    </div>
</section>

<!-- Subscription Section -->
<section class="bg-surface-container-lowest py-32 px-margin-desktop border-t border-outline-variant/20" data-aos="fade-in">
    <div class="max-w-4xl mx-auto text-center" data-aos="zoom-in">
        <h2 class="text-headline-lg font-headline-lg mb-6">Stay informed. No noise.</h2>
        <p class="text-body-lg font-body-lg text-on-surface-variant mb-12">Receive our monthly event digest and exclusive early-access codes for summit tickets.</p>
        <form class="flex flex-col md:flex-row gap-4 max-w-xl mx-auto">
            <input class="flex-grow bg-surface border border-outline-variant px-6 py-4 font-body-md focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" placeholder="Email Address" type="email"/>
            <button class="bg-secondary text-white px-8 py-4 font-label-sm text-label-sm active:scale-95 transition-all" type="submit">
                Subscribe
            </button>
        </form>
    </div>
</section>
@endsection

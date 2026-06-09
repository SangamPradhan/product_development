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
<section class="relative pt-32 md:pt-48 pb-16 md:pb-32 px-6 md:px-margin-desktop overflow-hidden">
    <div class="max-w-4xl" data-aos="fade-up">
        <div class="mb-6">
            <span class="bg-secondary-container text-on-secondary-container px-3 py-1 font-label-sm text-label-sm rounded-full hover-glow cursor-default">GLOBAL EVENTS {{ date('Y') }}</span>
        </div>
        <h1 class="text-4-xl md:text-display-lg font-display-lg mb-6 md:mb-8 font-bold leading-tight">Architecting the future through collaborative intelligence.</h1>
        <p class="text-body-md md:text-body-lg text-on-surface-variant max-w-2xl">Join our upcoming webinars, hands-on workshops, and flagship summits. We bridge the gap between theoretical AI research and enterprise-ready automation.</p>
    </div>
    <div class="absolute -top-24 -right-24 w-[600px] h-[600px] bg-secondary/5 rounded-full blur-[120px] -z-10"></div>
</section>

<!-- Featured Event (Bento Style) -->
<section class="px-6 md:px-margin-desktop mb-16 md:mb-section-gap">
    @php
        $featuredTitle = $featured ? $featured->title : 'The Global AI Precision Summit';
        $featuredCat = $featured ? $featured->category : 'SUMMIT';
        $featuredDate = $featured ? $featured->event_date->format('F d-e, Y • H:i A') : 'OCTOBER 12-14, 2026 • ZURICH, CH';
        $featuredDesc = $featured ? Str::limit(strip_tags($featured->description), 180) : 'Our flagship event for C-level executives and lead architects. Three days of intensive strategy sessions on the future of autonomous workflows.';
        $featuredImg = $featured ? $featured->main_image_url : 'https://lh3.googleusercontent.com/aida-public/AB6AXuBAyt6UL0YFKw0diln-lmuNKQVvWS1OAcEw8MiFd3bdbRED1qo7vKF0Zj_V5VkFRKxER9DJ-8RXj4tWyxwFjrcFGpFBZxIREOW0IQzx5RxHPVKb-1i2CRmZwtp7GifyQx-wCsQBC-UdzK6dvd6qQFmclEclp2MOpZHQurASZZ9-rLepo3HZN9tCLjxdFHEAlN8xcT9-hJpeZG2AHQU5_JNCP7F9XTNS_BDA_doVltm5vK90vMm1VhuahsQKGxSEVDrq2ED8NRXxHVU';
        $featuredLink = $featured ? route('front.event.detail', $featured->slug) : '#';
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
        <!-- Large Feature Card -->
        <div class="md:col-span-8 group relative overflow-hidden bg-surface-container-low border border-outline-variant/30 angled-notch-lg p-6 md:p-10 flex flex-col justify-end min-h-[350px] md:min-h-[500px] hover-glow transition-all" data-aos="fade-right">
            <img class="absolute inset-0 w-full h-full object-cover opacity-15 group-hover:opacity-25 transition-opacity duration-700" src="{{ $featuredImg }}" alt="{{ $featuredTitle }}"/>
            <div class="relative z-10">
                <div class="flex flex-wrap items-center gap-3 md:gap-4 mb-4">
                    <span class="text-xs md:text-label-sm font-label-sm bg-secondary text-white px-2 py-1 uppercase font-bold">{{ $featuredCat }}</span>
                    <span class="text-xs md:text-label-sm font-label-sm text-on-surface-variant uppercase font-bold">{{ $featuredDate }}</span>
                </div>
                <h2 class="text-xl md:text-headline-lg font-headline-lg mb-4 font-bold leading-tight">{{ $featuredTitle }}</h2>
                <div class="text-sm md:text-body-md font-body-md text-on-surface-variant mb-6 md:mb-8 max-w-lg leading-relaxed">{!! $featuredDesc !!}</div>
                <a href="{{ $featuredLink }}" class="notch-button inline-block bg-secondary text-white px-6 md:px-8 py-3 md:py-3.5 font-label-sm text-xs md:text-label-sm hover:bg-on-secondary-fixed-variant transition-all hover-glow text-center font-bold">
                    Register / View Details
                </a>
            </div>
        </div>

        <!-- Small Feature Card 1 -->
        <div class="md:col-span-4 bg-surface-container-low border border-outline-variant/30 angled-notch p-6 md:p-8 flex flex-col justify-between hover-glow transition-all" data-aos="fade-left" data-aos-delay="100">
            <div>
                <div class="flex justify-between items-start mb-6 md:mb-12">
                    <span class="material-symbols-outlined text-secondary text-3xl md:text-4xl">terminal</span>
                    <span class="text-xs md:text-label-sm font-label-sm text-secondary font-bold">LIVE NOW</span>
                </div>
                <h3 class="text-lg md:text-headline-md font-headline-md mb-2 font-bold">Dev-to-Production Workshop</h3>
                <p class="text-sm md:text-body-md font-body-md text-on-surface-variant">Deploying LLMs at scale with zero-latency requirements.</p>
            </div>
            <a href="{{ route('front.contact') }}" class="text-secondary font-bold text-xs md:text-label-sm font-label-sm flex items-center gap-2 mt-6 md:mt-8 group">
                Join Session <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>
    </div>
</section>

<!-- Filter & Categories -->
<section class="px-6 md:px-margin-desktop mb-12 md:mb-16 border-b border-outline-variant/20 pb-6 md:pb-8 flex flex-col md:flex-row justify-between items-start md:items-end gap-6 md:gap-8" data-aos="fade-up">
    <div>
        <h2 class="text-xl md:text-headline-md font-headline-md mb-2 font-bold">Filter Events by Category</h2>
        <p class="text-sm md:text-body-md font-body-md text-on-surface-variant">Explore tailored learning experiences across various formats.</p>
    </div>
    <div class="flex gap-2 overflow-x-auto pb-2 md:pb-0 w-full md:w-auto">
        <a href="{{ route('front.events') }}" class="whitespace-nowrap px-4 md:px-6 py-2 text-xs md:text-label-sm font-label-sm rounded-full transition-colors {{ empty($category) ? 'bg-secondary text-white' : 'border border-outline-variant text-on-surface-variant hover:border-secondary' }} font-bold">All Events</a>
        @foreach($categories as $cat)
            <a href="{{ route('front.events', ['category' => $cat]) }}" 
               class="whitespace-nowrap px-4 md:px-6 py-2 text-xs md:text-label-sm font-label-sm rounded-full transition-colors {{ $category === $cat ? 'bg-secondary text-white' : 'border border-outline-variant text-on-surface-variant hover:border-secondary' }} font-bold uppercase">{{ $cat }}</a>
        @endforeach
    </div>
</section>

<!-- Upcoming Event List Grid -->
<section class="px-6 md:px-margin-desktop mb-16 md:mb-section-gap">
    <h2 class="text-2xl md:text-headline-lg font-headline-lg mb-6 md:mb-8 font-bold">Upcoming Events</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
        @forelse($upcomingEvents as $idx => $event)
            @php
                $eventImg = $event->main_image_url ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuAtMXaP067yXg5TVsjqPwSo69RCQ2QCMtbTQsDvjcMpfgKSEc12ee8wOQZ-6xaJoz1K5e-XqVrCduzTJQ59EQDB9Hicb2SOmTCIiX632pmIMHBDlLe_w6j98HOkuWElNLT6av4eRX_ma9bX01pRofBBUucJ3XQcYVsAagfyDuGjYKw0hEz24DZQCjwi7-4SjnEJaY-XYiXovVEB_IhKLvYsSvxmZ28pG6QlteLuSkBd9IyCP69PmIaska6OVQfjnYCTaV8n-aAEvsk';
            @endphp
            <div onclick="window.location.href='{{ route('front.event.detail', $event->slug) }}'" 
                 class="group bg-surface hover-glow p-4 rounded-xl border border-outline-variant/30 hover:border-secondary transition-all cursor-pointer flex flex-col justify-between h-full" 
                 data-aos="fade-up" data-aos-delay="{{ (($idx % 3) + 1) * 100 }}">
                <div>
                    <!-- Styled Image Cover with angled-notch and border outline to prevent background blending -->
                    <div class="aspect-[16/10] overflow-hidden angled-notch mb-6 bg-surface-container-low border border-outline-variant">
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $eventImg }}" alt="{{ $event->title }}"/>
                    </div>
                    <div class="text-secondary font-label-sm text-xs md:text-label-sm mb-3 flex items-center gap-2 uppercase font-bold">
                        <span class="material-symbols-outlined text-[16px] md:text-lg">calendar_today</span>
                        {{ $event->event_date->format('M d, Y') }}
                    </div>
                    <h4 class="text-lg md:text-headline-md font-headline-md text-on-surface mb-3 group-hover:text-secondary transition-colors font-bold leading-snug">{{ $event->title }}</h4>
                    <p class="text-sm md:text-body-md font-body-md text-on-surface-variant mb-6 line-clamp-3 leading-relaxed">{{ strip_tags($event->description) }}</p>
                </div>
                <div class="flex justify-between items-center mt-4 border-t border-outline-variant/10 pt-4">
                    <span class="text-[10px] md:text-xs font-label-sm uppercase text-secondary font-bold">{{ $event->category }}</span>
                    <button class="text-secondary font-bold text-xs md:text-label-sm font-label-sm underline flex items-center gap-1">
                        Register / Details <span class="material-symbols-outlined text-xs">arrow_forward</span>
                    </button>
                </div>
            </div>
        @empty
            <div class="md:col-span-3 p-8 md:p-12 text-center text-on-surface-variant font-label-sm uppercase bg-surface-container-low border border-outline border-dashed rounded-xl">
                No upcoming events found.
            </div>
        @endforelse

        <!-- Host a custom workshop CTA Card -->
        <div class="md:col-span-3 bg-secondary p-6 md:p-8 angled-notch flex flex-col md:flex-row items-center justify-between gap-6 md:gap-8 hover-glow transition-all mt-6 md:mt-8" data-aos="fade-up">
            <div class="text-white text-center md:text-left">
                <h4 class="text-lg md:text-headline-md font-headline-md mb-2 font-bold">Host a custom workshop?</h4>
                <p class="text-sm md:text-body-md font-body-md opacity-80">We offer private sessions for enterprise teams looking to accelerate their AI roadmap.</p>
            </div>
            <a href="{{ route('front.contact') }}" class="notch-button whitespace-nowrap bg-white text-secondary px-6 md:px-8 py-3 md:py-3.5 font-label-sm text-xs md:text-label-sm hover:bg-secondary-container transition-all hover-glow text-center font-bold">
                Request Private Workshop
            </a>
        </div>
    </div>

    <!-- Pagination for Upcoming Events -->
    <div class="mt-8 md:mt-12 font-label-sm">
        {{ $upcomingEvents->appends(request()->query())->links() }}
    </div>
</section>

<!-- Past Event List Grid -->
<section class="px-6 md:px-margin-desktop mb-16 md:mb-section-gap">
    <h2 class="text-2xl md:text-headline-lg font-headline-lg mb-6 md:mb-8 font-bold">Past Events / Archive</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
        @forelse($pastEvents as $idx => $event)
            @php
                $eventImg = $event->main_image_url ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuAtMXaP067yXg5TVsjqPwSo69RCQ2QCMtbTQsDvjcMpfgKSEc12ee8wOQZ-6xaJoz1K5e-XqVrCduzTJQ59EQDB9Hicb2SOmTCIiX632pmIMHBDlLe_w6j98HOkuWElNLT6av4eRX_ma9bX01pRofBBUucJ3XQcYVsAagfyDuGjYKw0hEz24DZQCjwi7-4SjnEJaY-XYiXovVEB_IhKLvYsSvxmZ28pG6QlteLuSkBd9IyCP69PmIaska6OVQfjnYCTaV8n-aAEvsk';
            @endphp
            <div onclick="window.location.href='{{ route('front.event.detail', $event->slug) }}'" 
                 class="group bg-surface hover-glow p-4 rounded-xl border border-outline-variant/30 hover:border-secondary transition-all cursor-pointer flex flex-col justify-between h-full" 
                 data-aos="fade-up" data-aos-delay="{{ (($idx % 3) + 1) * 100 }}">
                <div>
                    <!-- Styled Image Cover with angled-notch and border outline to prevent background blending -->
                    <div class="aspect-[16/10] overflow-hidden angled-notch mb-6 bg-surface-container-low border border-outline-variant">
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $eventImg }}" alt="{{ $event->title }}"/>
                    </div>
                    <div class="text-on-surface-variant/60 font-label-sm text-xs md:text-label-sm mb-3 flex items-center gap-2 uppercase font-bold">
                        <span class="material-symbols-outlined text-[16px]">history</span>
                        CONCLUDED {{ $event->event_date->format('M d, Y') }}
                    </div>
                    <h4 class="text-lg md:text-headline-md font-headline-md text-on-surface/80 mb-3 group-hover:text-secondary transition-colors font-bold leading-snug">{{ $event->title }}</h4>
                    <p class="text-sm md:text-body-md font-body-md text-on-surface-variant mb-6 line-clamp-3 leading-relaxed">{{ strip_tags($event->description) }}</p>
                </div>
                <div class="flex justify-between items-center mt-4 border-t border-outline-variant/10 pt-4">
                    <span class="text-[10px] md:text-xs font-label-sm uppercase text-on-surface-variant/60 font-bold">{{ $event->category }}</span>
                    <button class="text-on-surface-variant/80 font-bold text-xs md:text-label-sm font-label-sm underline flex items-center gap-1">
                        View Archive Summary <span class="material-symbols-outlined text-xs">arrow_forward</span>
                    </button>
                </div>
            </div>
        @empty
            <div class="md:col-span-3 p-8 md:p-12 text-center text-on-surface-variant font-label-sm uppercase bg-surface-container-low border border-outline border-dashed rounded-xl">
                No past events recorded.
            </div>
        @endforelse
    </div>

    <!-- Pagination for Past Events -->
    <div class="mt-8 md:mt-12 font-label-sm">
        {{ $pastEvents->appends(request()->query())->links() }}
    </div>
</section>

<!-- Subscription Section -->
<section class="bg-surface-container-lowest py-16 md:py-32 px-6 md:px-margin-desktop border-t border-outline-variant/20" data-aos="fade-in">
    <div class="max-w-4xl mx-auto text-center" data-aos="zoom-in">
        <h2 class="text-2xl md:text-headline-lg font-headline-lg mb-4 md:mb-6 font-bold leading-snug">Stay informed. No noise.</h2>
        <p class="text-sm md:text-body-lg font-body-lg text-on-surface-variant mb-8 md:mb-12">Receive our monthly event digest and exclusive early-access codes for summit tickets.</p>
        <form class="flex flex-col md:flex-row gap-4 max-w-xl mx-auto" onsubmit="event.preventDefault(); alert('Subscribed successfully!');">
            <input class="flex-grow bg-surface border border-outline-variant px-6 py-4 font-body-md focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" placeholder="Email Address" type="email" required/>
            <button class="notch-button bg-secondary text-white px-6 md:px-8 py-3.5 md:py-4 font-label-sm text-xs md:text-label-sm hover:bg-on-secondary-fixed-variant transition-all hover-glow font-bold uppercase tracking-wider" type="submit">
                Subscribe
            </button>
        </form>
    </div>
</section>
@endsection

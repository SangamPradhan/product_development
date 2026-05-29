@extends('front.layouts.app')

@section('title', 'Projects | AI-Solutions')

@push('styles')
<style>
    .notch-container {
        clip-path: polygon(
            0% 12px, 12px 0%,
            calc(100% - 12px) 0%, 100% 12px,
            100% calc(100% - 12px), calc(100% - 12px) 100%,
            12px 100%, 0% calc(100% - 12px)
        );
    }
    .notch-button {
        clip-path: polygon(
            0% 6px, 6px 0%,
            calc(100% - 6px) 0%, 100% 6px,
            100% calc(100% - 6px), calc(100% - 6px) 100%,
            6px 100%, 0% calc(100% - 6px)
        );
    }
</style>
@endpush

@section('content')
<div class="relative pt-40">
    <!-- Hero Section -->
    <section class="mb-section-gap px-margin-desktop md:px-margin-desktop">
        <div class="max-w-4xl" data-aos="fade-up">
            <span class="inline-block bg-[#E8F5E9] mb-6 px-3 py-1 font-label-sm text-label-sm text-on-secondary-container">PORTFOLIO</span>
            <h1 class="mb-8 font-display-lg text-display-lg">Architecting the future through <span class="text-secondary">applied intelligence.</span></h1>
            <p class="max-w-2xl font-body-lg text-body-lg text-on-surface-variant">
                Explore our curated gallery of enterprise-grade AI implementations. From predictive logistics to autonomous health monitoring, we build precision-engineered solutions for the world's most complex challenges.
            </p>
        </div>
    </section>

    <!-- Featured Project (loaded via API) -->
    <section id="projects-featured" class="hidden mb-section-gap px-margin-desktop"></section>

        <!-- Project Filter Bar -->
    <section class="mb-16 px-margin-desktop">
        <div id="filter-container" class="flex flex-wrap gap-4 pb-6 border-b border-outline-variant/30" data-aos="fade-up" data-aos-delay="100">
            <button class="font-label-sm font-bold text-label-sm text-secondary" data-filter="all">ALL PROJECTS</button>
            <button class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary transition-colors" data-filter="fintech">FINTECH</button>
            <button class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary transition-colors" data-filter="healthcare">HEALTHCARE</button>
            <button class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary transition-colors" data-filter="logistics">LOGISTICS</button>
            <button class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary transition-colors" data-filter="manufacturing">MANUFACTURING</button>
        </div>
    </section>

    <!-- Bento Grid of Projects (loaded via API) -->
    <section class="mb-section-gap px-margin-desktop">
        <div id="projects-grid" class="gap-gutter grid grid-cols-1 md:grid-cols-3">
            <p class="col-span-full py-12 text-on-surface-variant text-center">Loading projects...</p>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="mb-section-gap px-margin-desktop">
        <div class="relative bg-inverse-surface p-12 md:p-24 overflow-hidden text-inverse-on-surface transition-all notch-container hover-glow" data-aos="fade-up">
            <div class="z-10 relative max-w-2xl">
                <h2 class="mb-6 font-headline-lg text-headline-lg">Ready to automate your next <span class="text-secondary-fixed">breakthrough?</span></h2>
                <p class="opacity-80 mb-10 font-body-lg text-body-lg">We are currently accepting high-impact projects for Q4 2024. Let's discuss how AI can refine your operational precision.</p>
                <div class="flex flex-wrap gap-6">
                    <button class="bg-secondary-fixed text-on-secondary-fixed px-10 py-4 font-label-sm font-bold text-label-sm transition-all notch-button hover-glow">START A CONSULTATION</button>
                    <button class="px-10 py-4 border border-outline-variant/30 font-label-sm text-inverse-on-surface text-label-sm transition-all notch-button hover-glow">DOWNLOAD CAPABILITIES</button>
                </div>
            </div>
            <!-- Abstract Background Pattern -->
            <div class="top-0 right-0 absolute opacity-10 w-1/2 h-full pointer-events-none">
                <div class="grid grid-cols-10 h-full">
                    <div class="border-white border-l h-full"></div>
                    <div class="border-white border-l h-full"></div>
                    <div class="border-white border-l h-full"></div>
                    <div class="border-white border-l h-full"></div>
                    <div class="border-white border-l h-full"></div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection




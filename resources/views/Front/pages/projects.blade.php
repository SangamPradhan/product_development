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
    <section class="px-margin-desktop md:px-margin-desktop mb-section-gap">
        <div class="max-w-4xl" data-aos="fade-up">
            <span class="inline-block bg-[#E8F5E9] text-on-secondary-container px-3 py-1 font-label-sm text-label-sm mb-6">PORTFOLIO</span>
            <h1 class="font-display-lg text-display-lg mb-8">Architecting the future through <span class="text-secondary">applied intelligence.</span></h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
                Explore our curated gallery of enterprise-grade AI implementations. From predictive logistics to autonomous health monitoring, we build precision-engineered solutions for the world's most complex challenges.
            </p>
        </div>
    </section>

    <!-- Project Filter Bar -->
    <section class="px-margin-desktop mb-16">
        <div class="flex flex-wrap gap-4 border-b border-outline-variant/30 pb-6" data-aos="fade-up" data-aos-delay="100">
            <button class="font-label-sm text-label-sm text-secondary font-bold">ALL PROJECTS</button>
            <button class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary transition-colors">FINTECH</button>
            <button class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary transition-colors">HEALTHCARE</button>
            <button class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary transition-colors">LOGISTICS</button>
            <button class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary transition-colors">MANUFACTURING</button>
        </div>
    </section>

    <!-- Featured Project (loaded via API) -->
    <section id="projects-featured" class="px-margin-desktop mb-section-gap hidden"></section>

    <!-- Bento Grid of Projects (loaded via API) -->
    <section class="px-margin-desktop mb-section-gap">
        <div id="projects-grid" class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
            <p class="text-on-surface-variant col-span-full text-center py-12">Loading projects...</p>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="px-margin-desktop mb-section-gap">
        <div class="bg-inverse-surface text-inverse-on-surface p-12 md:p-24 notch-container relative overflow-hidden hover-glow transition-all" data-aos="fade-up">
            <div class="relative z-10 max-w-2xl">
                <h2 class="font-headline-lg text-headline-lg mb-6">Ready to automate your next <span class="text-secondary-fixed">breakthrough?</span></h2>
                <p class="text-body-lg font-body-lg opacity-80 mb-10">We are currently accepting high-impact projects for Q4 2024. Let's discuss how AI can refine your operational precision.</p>
                <div class="flex flex-wrap gap-6">
                    <button class="notch-button bg-secondary-fixed text-on-secondary-fixed px-10 py-4 font-label-sm text-label-sm font-bold hover-glow transition-all">START A CONSULTATION</button>
                    <button class="notch-button border border-outline-variant/30 text-inverse-on-surface px-10 py-4 font-label-sm text-label-sm hover-glow transition-all">DOWNLOAD CAPABILITIES</button>
                </div>
            </div>
            <!-- Abstract Background Pattern -->
            <div class="absolute top-0 right-0 w-1/2 h-full opacity-10 pointer-events-none">
                <div class="grid grid-cols-10 h-full">
                    <div class="border-l border-white h-full"></div>
                    <div class="border-l border-white h-full"></div>
                    <div class="border-l border-white h-full"></div>
                    <div class="border-l border-white h-full"></div>
                    <div class="border-l border-white h-full"></div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    window.frontProjectConfig = {
        projectDetailBase: @json(url('/projects')),
    };
</script>
<script src="{{ asset('js/laravel-api.js') }}"></script>
<script src="{{ asset('js/front-projects.js') }}"></script>
@endpush

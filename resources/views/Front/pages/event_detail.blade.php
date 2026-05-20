@extends('front.layouts.app')

@section('title', 'The Global AI Precision Summit | AI-Solutions')

@push('styles')
<style>
    .angled-notch {
        clip-path: polygon(
            0 0, 
            calc(100% - 20px) 0, 
            100% 20px, 
            100% 100%, 
            20px 100%, 
            0 calc(100% - 20px)
        );
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<header class="relative w-full h-[819px] flex items-end pb-section-gap overflow-hidden pt-32">
    <div class="absolute inset-0 z-0 mt-32 md:mt-0">
        <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAtMXaP067yXg5TVsjqPwSo69RCQ2QCMtbTQsDvjcMpfgKSEc12ee8wOQZ-6xaJoz1K5e-XqVrCduzTJQ59EQDB9Hicb2SOmTCIiX632pmIMHBDlLe_w6j98HOkuWElNLT6av4eRX_ma9bX01pRofBBUucJ3XQcYVsAagfyDuGjYKw0hEz24DZQCjwi7-4SjnEJaY-XYiXovVEB_IhKLvYsSvxmZ28pG6QlteLuSkBd9IyCP69PmIaska6OVQfjnYCTaV8n-aAEvsk" alt="Auditorium in Zurich"/>
        <div class="absolute inset-0 bg-gradient-to-t from-background via-background/40 to-transparent"></div>
    </div>
    <div class="relative z-10 px-margin-desktop w-full max-w-7xl mx-auto" data-aos="fade-up">
        <div class="max-w-3xl">
            <div class="flex items-center gap-2 mb-4">
                <span class="bg-secondary-container text-on-secondary-container font-label-sm text-label-sm px-3 py-1 rounded-full hover-glow cursor-default">ANNUAL SUMMIT 2024</span>
                <span class="text-outline font-label-sm text-label-sm">| 14-16 NOVEMBER</span>
            </div>
            <h1 class="font-display-lg text-display-lg md:text-display-lg text-on-surface mb-8">
                The Global AI <br/><span class="text-secondary">Precision</span> Summit
            </h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant mb-12 max-w-xl">
                Defining the next era of industrial automation. Join 500+ global leaders in Zurich for three days of architectural technicality and engineering breakthroughs.
            </p>
        </div>
    </div>
</header>

<!-- Registration Anchor & Details -->
<section class="px-margin-desktop -mt-24 relative z-20">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-gutter">
        <div class="md:col-span-8 bg-surface-container-lowest border border-outline-variant/30 p-12 angled-notch shadow-sm hover-glow transition-all" data-aos="fade-right">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
                <div class="space-y-2">
                    <span class="material-symbols-outlined text-secondary text-2xl">calendar_today</span>
                    <h4 class="font-label-sm text-label-sm text-outline">DATE</h4>
                    <p class="font-headline-md text-headline-md">Nov 14 - 16, 2024</p>
                </div>
                <div class="space-y-2">
                    <span class="material-symbols-outlined text-secondary text-2xl">schedule</span>
                    <h4 class="font-label-sm text-label-sm text-outline">TIME</h4>
                    <p class="font-headline-md text-headline-md">09:00 - 18:00 CET</p>
                </div>
                <div class="space-y-2">
                    <span class="material-symbols-outlined text-secondary text-2xl">location_on</span>
                    <h4 class="font-label-sm text-label-sm text-outline">LOCATION</h4>
                    <p class="font-headline-md text-headline-md">Zurich, CH</p>
                </div>
            </div>
            <button class="w-full md:w-auto bg-secondary text-on-primary font-label-sm text-label-sm px-12 py-5 rounded-full hover:bg-secondary/90 transition-all hover-glow">
                Register for the Summit
            </button>
        </div>
        <div class="md:col-span-4 bg-secondary-container p-8 flex flex-col justify-center angled-notch hover-glow transition-all" data-aos="fade-left" data-aos-delay="100">
            <h3 class="font-headline-md text-headline-md text-on-secondary-container mb-4">Limited Availability</h3>
            <p class="font-body-md text-body-md text-on-secondary-fixed-variant mb-6">
                Only 42 seats remaining for the executive technical sessions. Secure your spot today.
            </p>
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">timer</span>
                <span class="font-label-sm text-label-sm uppercase tracking-widest">Early Bird Ends In 4 Days</span>
            </div>
        </div>
    </div>
</section>

<!-- Main Content Grid -->
<section class="py-section-gap px-margin-desktop max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-16">
    <!-- Left: Description & Schedule -->
    <div class="lg:col-span-8 space-y-24">
        <!-- Description -->
        <div data-aos="fade-up">
            <h2 class="font-headline-lg text-headline-lg mb-8">About the Summit</h2>
            <div class="font-body-lg text-body-lg text-on-surface-variant space-y-6">
                <p>
                    The Global AI Precision Summit is not just another tech conference. It is a curated laboratory of ideas where the world's leading engineers, decision-makers, and visionaries converge to dissect the structural integrity of modern automation.
                </p>
                <p>
                    Our theme for 2024, "Angled Precision," focuses on the intersection of geometric architectural thinking and neural network optimization. We move beyond general-purpose AI to explore the high-fidelity systems required for aerospace, precision medicine, and autonomous logistics.
                </p>
            </div>
        </div>

        <!-- Schedule: Bento-ish Accordion -->
        <div data-aos="fade-up" data-aos-delay="100">
            <h2 class="font-headline-lg text-headline-lg mb-12">Summit Schedule</h2>
            <div class="space-y-4">
                <!-- Session 1 -->
                <div class="group border border-outline-variant/30 bg-surface-container-low p-6 transition-all hover:border-secondary hover-glow">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="flex items-center gap-6">
                            <span class="font-label-sm text-label-sm bg-surface-container-highest px-3 py-1 text-on-surface">09:30 AM</span>
                            <div>
                                <h4 class="font-headline-md text-headline-md">Opening Keynote: The Architecture of Intelligence</h4>
                                <p class="font-body-md text-body-md text-on-surface-variant">Main Hall | Dr. Elena Voss</p>
                            </div>
                        </div>
                        <span class="material-symbols-outlined text-outline group-hover:text-secondary transition-colors">arrow_forward</span>
                    </div>
                </div>
                <!-- Session 2 -->
                <div class="group border border-outline-variant/30 bg-surface-container-low p-6 transition-all hover:border-secondary hover-glow">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="flex items-center gap-6">
                            <span class="font-label-sm text-label-sm bg-surface-container-highest px-3 py-1 text-on-surface">11:15 AM</span>
                            <div>
                                <h4 class="font-headline-md text-headline-md">High-Fidelity Edge Computing in Industrial IoT</h4>
                                <p class="font-body-md text-body-md text-on-surface-variant">Tech Suite A | Marcus Chen</p>
                            </div>
                        </div>
                        <span class="material-symbols-outlined text-outline group-hover:text-secondary transition-colors">arrow_forward</span>
                    </div>
                </div>
                <!-- Session 3 -->
                <div class="group border border-outline-variant/30 bg-surface-container-low p-6 transition-all hover:border-secondary hover-glow">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="flex items-center gap-6">
                            <span class="font-label-sm text-label-sm bg-surface-container-highest px-3 py-1 text-on-surface">02:00 PM</span>
                            <div>
                                <h4 class="font-headline-md text-headline-md">Panel: Regulatory Frameworks for Precision AI</h4>
                                <p class="font-body-md text-body-md text-on-surface-variant">Conference B | Various Speakers</p>
                            </div>
                        </div>
                        <span class="material-symbols-outlined text-outline group-hover:text-secondary transition-colors">arrow_forward</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right: Keynote Speakers -->
    <aside class="lg:col-span-4" data-aos="fade-left" data-aos-delay="200">
        <div class="sticky top-24">
            <h3 class="font-headline-md text-headline-md mb-8 border-l-4 border-secondary pl-4">Keynote Speakers</h3>
            <div class="grid grid-cols-1 gap-8">
                <!-- Speaker 1 -->
                <div class="group flex items-center gap-6 p-4 border border-transparent hover:border-outline-variant/30 hover:bg-surface-container-low transition-all hover-glow rounded-lg">
                    <div class="w-20 h-20 overflow-hidden angled-notch shrink-0">
                        <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD_CL31OLO6XOBKtlu6T7sHZ9o12yfdJrU5SGHPYcAHpdBQRrdMZdcFX1jVTCu-m_vGUEKPCH5fXvJE3xrtXi6UJ9h3WZ4UvrurgML_aHleC9KHp4lPFfDdhuqTcGlqlEgaqHabjJY7JeyPfGwCLjJpKFC5f1D93kL-gW_pECyMkFY6o7PiOacgEKWSTvR5DvlM27wGDiR8D3IeGI5RbbVvT1beF1SrEpEArD2ie4iRUKfBhJhHGDCsYLF2P4ylCCukOqW6z6eUcA8" alt="Dr. Elena Voss"/>
                    </div>
                    <div>
                        <h5 class="font-headline-md text-headline-md text-on-surface group-hover:text-secondary transition-colors">Dr. Elena Voss</h5>
                        <p class="font-label-sm text-label-sm text-outline">HEAD OF QUANTUM AI, OXFORD</p>
                    </div>
                </div>
                <!-- Speaker 2 -->
                <div class="group flex items-center gap-6 p-4 border border-transparent hover:border-outline-variant/30 hover:bg-surface-container-low transition-all hover-glow rounded-lg">
                    <div class="w-20 h-20 overflow-hidden angled-notch shrink-0">
                        <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAX5WsgcFQsmnd2otY93h3kYrKuV3nu-EssfNs8zzJyPivE48RrEuc1F2du3R7fzF8F9XjRWH4IlNo3KAVaDSHq2jkLsd0hMdKFDw3iN9t7CgWV6gzPIQRRQbGIexnOWx7e12EhDuRVhlqnAIyaGtfREogrROubE-nNalIdCCJUjFc1i70iemcRqS-kdXQLOVJKebPLABUNyCOXj9-JJIVPDt2TmknVHrdPdnFHPX38PCb_Hgwk7GHWd0fuZYJEvp59UO2uFPOicos" alt="Marcus Chen"/>
                    </div>
                    <div>
                        <h5 class="font-headline-md text-headline-md text-on-surface group-hover:text-secondary transition-colors">Marcus Chen</h5>
                        <p class="font-label-sm text-label-sm text-outline">CTO, ROBOTICS FLUIDITY</p>
                    </div>
                </div>
                <!-- Speaker 3 -->
                <div class="group flex items-center gap-6 p-4 border border-transparent hover:border-outline-variant/30 hover:bg-surface-container-low transition-all hover-glow rounded-lg">
                    <div class="w-20 h-20 overflow-hidden angled-notch shrink-0">
                        <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD3gMpQMpeCJIAddD_vqWKv2EOctZvvhSkea2CRoqwcXMr1AKDvRYTjjIWbE7N2c81xOLTRPdMplaDfbOwAsilJF0NqB39hlwg00hghUth3Z3qA4Z7TY7PQ4M1jYskHRnlQU01zV6D71O7eN_YxYSBWwUr3xH6Lp1XmVMTo_qMcFgkzLekMnn3ABFuNZif65k_qX2jnNVdAX4Y8N96oB4WAr0vwTQMQUZuR2oJxwEedjY6bgCgKTOdvqJFL4MoDkQQ0JMGINTUM85w" alt="Sara J. Miller"/>
                    </div>
                    <div>
                        <h5 class="font-headline-md text-headline-md text-on-surface group-hover:text-secondary transition-colors">Sara J. Miller</h5>
                        <p class="font-label-sm text-label-sm text-outline">PRINCIPAL ARCHITECT, AI-SOLUTIONS</p>
                    </div>
                </div>
            </div>

            <!-- CTA Card -->
            <div class="mt-12 p-8 bg-surface-container border border-outline-variant/20 angled-notch hover-glow transition-all">
                <p class="font-label-sm text-label-sm text-secondary mb-2">PARTNER WITH US</p>
                <h4 class="font-headline-md text-headline-md mb-4">Sponsorship Opportunities</h4>
                <p class="font-body-md text-body-md text-on-surface-variant mb-6">Connect your brand with 500+ decision makers at the forefront of AI.</p>
                <a href="#" class="inline-flex items-center gap-2 text-secondary font-bold hover:gap-4 transition-all">
                    View Sponsor Prospectus <span class="material-symbols-outlined">arrow_right_alt</span>
                </a>
            </div>
        </div>
    </aside>
</section>
@endsection

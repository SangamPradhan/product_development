@extends('front.layouts.app')

@section('title', 'NeuralSync: Predictive Supply Chain Optimization | AI-Solutions')

@push('styles')
<style>
    .angled-notch {
        clip-path: polygon(
            0% 12px, 
            12px 0%, 
            100% 0%, 
            100% calc(100% - 12px), 
            calc(100% - 12px) 100%, 
            0% 100%
        );
    }
    .angled-notch-lg {
        clip-path: polygon(
            0% 24px, 
            24px 0%, 
            100% 0%, 
            100% calc(100% - 24px), 
            calc(100% - 24px) 100%, 
            0% 100%
        );
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<header class="relative w-full h-[870px] overflow-hidden flex items-end pb-margin-desktop px-margin-desktop bg-on-background pt-32">
    <img class="absolute inset-0 w-full h-full object-cover opacity-60 mix-blend-luminosity" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBYIRxoEkizqfWwFZxrVjOL5nrrYC-q7JHFmJHgKWKs9MN6yIl8HKOzSuz_sbpATZelr2OBGDGtVFiheMzuq0GAlnUHzWKjTPxmPD07xKhrHHJPypBbK9PqH9wH1W3bbqJRCRvTuzNHsGn-cNgA_9uWHzhNaSc9IZN5tQxiaO292C0rnfdFOjQ8mWNZ7ImRJvDHGXUQdG6VRCQzywTR3j-5vPKFIwBHJyO5cKwEkMdW_pJbLUCO_AMJtYbnTumUvrdxcmyUcPbo2iE" alt="Supply chain distribution center"/>
    <div class="relative z-10 max-w-4xl" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 mb-6 px-3 py-1 bg-secondary-fixed/20 border border-secondary/30 rounded-full hover-glow cursor-default">
            <span class="w-2 h-2 rounded-full bg-secondary-fixed animate-pulse"></span>
            <span class="font-label-sm text-label-sm text-secondary-fixed">CASE STUDY: LOGISTICS</span>
        </div>
        <h1 class="text-display-lg font-display-lg text-white mb-6 leading-[1.1]">NeuralSync: Predictive Supply Chain Optimization</h1>
        <p class="text-body-lg font-body-lg text-surface-variant max-w-2xl">
            How we leveraged deep learning architectures to anticipate global disruption and reduce operational overhead for a Fortune 500 logistics provider.
        </p>
    </div>
</header>

<div class="max-w-7xl mx-auto px-margin-mobile md:px-margin-desktop mt-section-gap">
    <!-- Project Overview & Meta -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter mb-section-gap">
        <div class="md:col-span-8" data-aos="fade-right">
            <h2 class="text-headline-lg font-headline-lg text-on-background mb-8">Project Overview</h2>
            <div class="space-y-6 text-on-surface-variant text-body-lg font-body-lg leading-relaxed">
                <p>The global supply chain is increasingly volatile, with unforeseen disruptions costing enterprises billions annually. NeuralSync was designed as a proactive immune system for logistics, moving beyond reactive management into predictive simulation.</p>
                <p>Our objective was to develop an autonomous engine capable of processing trillions of data points—from weather patterns and geopolitical shifts to warehouse sensor telemetry—to predict bottlenecks before they manifest in the physical world.</p>
            </div>
        </div>
        <div class="md:col-span-4" data-aos="fade-left" data-aos-delay="100">
            <div class="bg-surface-container-low p-8 angled-notch border border-outline-variant/30 hover-glow transition-all">
                <h3 class="font-label-sm text-label-sm text-secondary mb-6 tracking-widest uppercase">Project Details</h3>
                <ul class="space-y-4">
                    <li class="flex flex-col border-b border-outline-variant/20 pb-4">
                        <span class="text-label-sm font-label-sm text-on-surface-variant">CLIENT</span>
                        <span class="text-body-md font-body-md font-bold">GlobalLogistics Corp</span>
                    </li>
                    <li class="flex flex-col border-b border-outline-variant/20 pb-4">
                        <span class="text-label-sm font-label-sm text-on-surface-variant">DURATION</span>
                        <span class="text-body-md font-body-md font-bold">8 Months Execution</span>
                    </li>
                    <li class="flex flex-col">
                        <span class="text-label-sm font-label-sm text-on-surface-variant">TECHNOLOGIES</span>
                        <div class="flex flex-wrap gap-2 mt-2">
                            <span class="bg-secondary-fixed/10 text-on-secondary-fixed text-label-sm font-label-sm px-2 py-1 rounded">PyTorch</span>
                            <span class="bg-secondary-fixed/10 text-on-secondary-fixed text-label-sm font-label-sm px-2 py-1 rounded">Kubernetes</span>
                            <span class="bg-secondary-fixed/10 text-on-secondary-fixed text-label-sm font-label-sm px-2 py-1 rounded">Kafka</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Key Results (Bento Grid) -->
    <section class="mb-section-gap">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-headline-lg font-headline-lg text-on-background">Key Results</h2>
            <p class="text-on-surface-variant mt-2">Measurable efficiency gains through algorithmic precision.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
            <div class="md:col-span-2 bg-surface-container-low p-10 angled-notch-lg border border-secondary/20 flex flex-col justify-center hover-glow transition-all" data-aos="zoom-in">
                <span class="text-display-lg font-display-lg text-secondary">42%</span>
                <h4 class="text-headline-md font-headline-md mt-4">Reduction in System Latency</h4>
                <p class="text-on-surface-variant mt-4 text-body-lg">We optimized the real-time processing pipeline, allowing for decision-making signals to reach endpoints 42% faster than legacy architectures.</p>
            </div>
            <div class="bg-on-background p-10 angled-notch-lg text-white flex flex-col items-center justify-center text-center hover-glow transition-all" data-aos="zoom-in" data-aos-delay="100">
                <span class="text-headline-lg font-headline-lg text-secondary-fixed">$14M</span>
                <p class="mt-4 text-label-sm font-label-sm text-surface-variant uppercase tracking-widest">Quarterly Savings</p>
            </div>
            <div class="bg-surface-container-low p-10 angled-notch-lg border border-outline-variant/30 flex flex-col items-center justify-center text-center hover-glow transition-all" data-aos="zoom-in" data-aos-delay="200">
                <span class="material-symbols-outlined text-secondary text-5xl mb-4">analytics</span>
                <span class="text-headline-md font-headline-md">98.4%</span>
                <p class="text-on-surface-variant mt-2">Prediction Accuracy</p>
            </div>
            <div class="md:col-span-2 bg-secondary-fixed/10 p-10 angled-notch-lg border border-secondary/40 flex items-center gap-8 hover-glow transition-all" data-aos="zoom-in" data-aos-delay="300">
                <div class="w-24 h-24 rounded-full bg-white flex items-center justify-center border border-secondary shrink-0">
                    <span class="material-symbols-outlined text-secondary text-4xl" data-weight="fill">verified</span>
                </div>
                <div>
                    <h4 class="text-headline-md font-headline-md">ISO 27001 Certified</h4>
                    <p class="text-on-surface-variant mt-2">The implementation adheres to the highest global standards for information security and data integrity management.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Technical Implementation -->
    <section class="mb-section-gap grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
        <div data-aos="fade-right">
            <h2 class="text-headline-lg font-headline-lg text-on-background mb-8">Technical Implementation</h2>
            <div class="space-y-12">
                <div class="flex gap-6">
                    <span class="font-label-sm text-label-sm text-secondary mt-1">01</span>
                    <div>
                        <h4 class="text-headline-md font-headline-md mb-3">Multi-Modal Data Ingestion</h4>
                        <p class="text-on-surface-variant text-body-md">Construction of a massive, parallel pipeline capable of harmonizing unstructured satellite imagery with structured ERP datasets in under 200ms.</p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <span class="font-label-sm text-label-sm text-secondary mt-1">02</span>
                    <div>
                        <h4 class="text-headline-md font-headline-md mb-3">Transformer-Based Forecasting</h4>
                        <p class="text-on-surface-variant text-body-md">Deployment of proprietary Attention mechanisms to weigh external global variables against internal operational constraints.</p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <span class="font-label-sm text-label-sm text-secondary mt-1">03</span>
                    <div>
                        <h4 class="text-headline-md font-headline-md mb-3">Edge Optimization</h4>
                        <p class="text-on-surface-variant text-body-md">Quantized model weights pushed to warehouse-level edge devices for zero-latency local automation control.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative group" data-aos="fade-left">
            <div class="absolute inset-0 bg-secondary-fixed/5 rounded-3xl -rotate-2 group-hover:rotate-0 transition-all duration-500"></div>
            <img class="relative z-10 w-full angled-notch-lg grayscale group-hover:grayscale-0 transition-all duration-700 border border-outline-variant/30 hover-glow" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDObl-aeHteA4MaZGi-58Vn28Yh4-U3tfRKXRO0E_gRvgwjcrAx23U3YXjQVxjnW0hYhWRxhr6bCfl_VPeEBUql9jha-zSmjW4eQbKb6GSRCWEYG0KaO2dW7sLjSj2a9AqgSfMODe0S6Ovcf-uMhfeHK7o3sXWR5T5je1UEMOvUr_Jeo_0fozLgWxsy_WuLoVi7llrMMS5CErHNM0VhC_Df0bsycQHXDfqfgnDgWKrXkLKdIp2qVPsvHeUKHabSz80OZHEO-xGFsvk" alt="Computer circuit board"/>
        </div>
    </section>

    <!-- User Reviews & Ratings -->
    <section class="mb-section-gap py-section-gap border-t border-outline-variant/30">
        <h2 class="text-headline-lg font-headline-lg text-on-background mb-12">User Reviews &amp; Ratings</h2>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
            <!-- Review Form -->
            <div class="lg:col-span-5" data-aos="fade-right">
                <div class="bg-surface-container-low p-container-padding angled-notch border border-outline-variant/30 hover-glow transition-all">
                    <h3 class="text-headline-md font-headline-md mb-6">Submit Your Review</h3>
                    <form class="space-y-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col gap-2">
                                <label class="text-label-sm font-label-sm text-on-surface-variant">NAME</label>
                                <input class="bg-white border-outline-variant/30 focus:border-secondary focus:ring-0 p-3 text-body-md angled-notch" placeholder="John Doe" type="text"/>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-label-sm font-label-sm text-on-surface-variant">EMAIL</label>
                                <input class="bg-white border-outline-variant/30 focus:border-secondary focus:ring-0 p-3 text-body-md angled-notch" placeholder="john@example.com" type="email"/>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-label-sm font-label-sm text-on-surface-variant">RATING</label>
                            <div class="flex gap-2 text-secondary">
                                <span class="material-symbols-outlined cursor-pointer" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined cursor-pointer" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined cursor-pointer" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined cursor-pointer" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined cursor-pointer">star</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-label-sm font-label-sm text-on-surface-variant">YOUR REVIEW</label>
                            <textarea class="bg-white border-outline-variant/30 focus:border-secondary focus:ring-0 p-3 text-body-md angled-notch resize-none" placeholder="Share your experience with NeuralSync..." rows="4"></textarea>
                        </div>
                        <button class="w-full bg-secondary text-white py-4 angled-notch font-bold text-label-sm uppercase tracking-widest hover:bg-secondary-fixed hover:text-on-secondary-fixed transition-all hover-glow" type="button">
                            Post Review
                        </button>
                    </form>
                </div>
            </div>

            <!-- Existing Reviews -->
            <div class="lg:col-span-7 space-y-gutter">
                <!-- Review 1 -->
                <div class="p-8 bg-white border border-outline-variant/20 angled-notch shadow-sm hover-glow transition-all" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h5 class="text-headline-md font-headline-md leading-none">Sarah Chen</h5>
                            <span class="text-label-sm font-label-sm text-on-surface-variant">CTO, PrimeDistribution</span>
                        </div>
                        <div class="flex text-secondary">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                    </div>
                    <p class="text-on-surface-variant italic">"NeuralSync transformed how we handle peak season. The predictive accuracy allowed us to pre-position inventory three days earlier than our previous models."</p>
                </div>
                <!-- Review 2 -->
                <div class="p-8 bg-white border border-outline-variant/20 angled-notch shadow-sm hover-glow transition-all" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h5 class="text-headline-md font-headline-md leading-none">Marcus Thorne</h5>
                            <span class="text-label-sm font-label-sm text-on-surface-variant">Operations Director, EuroLink</span>
                        </div>
                        <div class="flex text-secondary">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined">star</span>
                        </div>
                    </div>
                    <p class="text-on-surface-variant italic">"Exceptional integration support. The AI-Solutions team worked alongside our engineers to ensure the API transitions were seamless."</p>
                </div>
                <!-- Review 3 -->
                <div class="p-8 bg-white border border-outline-variant/20 angled-notch shadow-sm hover-glow transition-all" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h5 class="text-headline-md font-headline-md leading-none">Elena Rodriguez</h5>
                            <span class="text-label-sm font-label-sm text-on-surface-variant">Senior Analyst, DataFlow</span>
                        </div>
                        <div class="flex text-secondary">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                    </div>
                    <p class="text-on-surface-variant italic">"The ROI was evident within the first 60 days. Highly recommended for any complex logistics operation."</p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

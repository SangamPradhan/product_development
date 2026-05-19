@extends('front.layouts.app')

@section('title', 'Services | AI-Solutions')

@push('styles')
<style>
    /* Angled Notch Shape Logic for Services */
    .notched-card {
        clip-path: polygon(
            20px 0%, 100% 0%, 
            100% calc(100% - 20px), calc(100% - 20px) 100%, 
            0% 100%, 0% 20px
        );
        background-color: #F8FAFC;
        border: 1px solid #E2E8F0;
    }
    .notched-card:hover {
        border-color: #006e22; /* Secondary Green */
    }
</style>
@endpush

@section('content')
<div class="pt-40">
    <!-- Hero Section -->
    <section class="px-margin-desktop mb-section-gap">
        <div class="max-w-4xl" data-aos="fade-up">
            <span class="inline-block px-3 py-1 bg-on-secondary-container/10 text-on-secondary-container font-label-sm text-label-sm rounded-full mb-6">OUR CAPABILITIES</span>
            <h1 class="font-display-lg text-display-lg text-on-surface mb-8">Engineering the Future of <span class="text-secondary">Intelligence.</span></h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
                We provide the structural foundations for the next generation of enterprise efficiency. Through angled precision and technological purity, we transform complex challenges into automated assets.
            </p>
        </div>
    </section>

    <!-- Services Bento Grid -->
    <section class="px-margin-desktop mb-section-gap">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
            <!-- Service 1: AI Automation (Large) -->
            <div class="md:col-span-8 notched-card p-12 flex flex-col justify-between group hover-glow transition-all" data-aos="fade-right">
                <div>
                    <div class="flex items-center gap-4 mb-6">
                        <span class="material-symbols-outlined text-secondary text-4xl" data-icon="hub">hub</span>
                        <h2 class="font-headline-lg text-headline-lg">AI Automation</h2>
                    </div>
                    <p class="text-on-surface-variant font-body-lg text-body-lg max-w-xl mb-8">
                        Deploy custom neural architectures that handle repetitive workflows with zero-latency decision making. Our automation engines integrate seamlessly into your existing tech stack, reducing operational overhead by up to 70%.
                    </p>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-center gap-3 font-body-md text-body-md">
                            <span class="material-symbols-outlined text-secondary" data-icon="check_circle">check_circle</span>
                            Predictive Resource Allocation
                        </li>
                        <li class="flex items-center gap-3 font-body-md text-body-md">
                            <span class="material-symbols-outlined text-secondary" data-icon="check_circle">check_circle</span>
                            Natural Language Document Processing
                        </li>
                        <li class="flex items-center gap-3 font-body-md text-body-md">
                            <span class="material-symbols-outlined text-secondary" data-icon="check_circle">check_circle</span>
                            Autonomous Customer Support Chains
                        </li>
                    </ul>
                </div>
                <div class="h-64 rounded-xl overflow-hidden relative border border-outline-variant/30">
                    <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 peek-effect" data-alt="A clean, futuristic server room with glowing green fiber optic cables running through high-tech hardware racks." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB9JrY9olSFuxsUyz4c1Co8Jz0vkwthaB6Y7J5F_Woguh1XJjgpcBgaXuxPgtF8guGETmSPkNUy8oQ8ZgPYkYl-Px3HwV4FdicedMQ9gHU-Vmk46b_AIYznFrVK4z5HJbfhl2f5Nz7C4WGSFe2vE2vsjlMWvmkNmvW5gXykTfPeNX5x2iI1os8GNTD1819fwY6yySDRxrbmKddBV1G9RWs_sUjomgcdyPWOlKedMXhxNmeZRQ65DzWdrcgakuM8JKDlmaNO_1zkonk"/>
                </div>
            </div>

            <!-- Service 2: Coding Help -->
            <div class="md:col-span-4 notched-card p-8 flex flex-col justify-between group hover-glow transition-all" data-aos="fade-left" data-aos-delay="100">
                <div>
                    <div class="mb-6">
                        <span class="material-symbols-outlined text-secondary text-4xl mb-4" data-icon="terminal">terminal</span>
                        <h2 class="font-headline-md text-headline-md">Coding Help</h2>
                    </div>
                    <p class="text-on-surface-variant font-body-md text-body-md mb-6">
                        Professional-grade refactoring, debugging, and architecture design for complex software systems.
                    </p>
                    <div class="flex flex-wrap gap-2 mb-8">
                        <span class="px-3 py-1 bg-surface-container text-on-surface-variant font-label-sm text-label-sm rounded">PYTHON</span>
                        <span class="px-3 py-1 bg-surface-container text-on-surface-variant font-label-sm text-label-sm rounded">RUST</span>
                        <span class="px-3 py-1 bg-surface-container text-on-surface-variant font-label-sm text-label-sm rounded">TYPESCRIPT</span>
                    </div>
                </div>
                <div class="relative pt-10 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent z-10"></div>
                    <img class="w-full h-48 object-cover notched-card grayscale group-hover:grayscale-0 transition-transform duration-700 group-hover:scale-105 peek-effect" data-alt="Macro photography of clean, well-formatted source code on a dark screen with vibrant syntax highlighting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDMDA_LH6TFVhxZQ8S6TF9p4Gb9JoS_6gSNlC43KQpaGWwZYPPnBVvbb-0q7xk-z29aOzcCrYdtl6gLbCLq3wcVE18tVIF5QnR5yUyPTws9XzolEAYo-_MiJdbsHqRyQJtJvICiISQZN8kpcovCntX8ga0d6nHnVfyS-ieYLhRhfF_lR4dqMjXVVuS8fiXMPAWXql6s4xoRHkJafBEcpoYSn361DX2vf9a6Kp0D-kyJ7vd7U6TGWeXmIjqbNicao_Dez7XypWGGDnc"/>
                </div>
            </div>

            <!-- Service 3: Business Building -->
            <div class="md:col-span-5 notched-card p-8 flex flex-col group hover-glow transition-all" data-aos="fade-up" data-aos-delay="200">
                <div class="mb-8">
                    <span class="material-symbols-outlined text-secondary text-4xl mb-4" data-icon="domain">domain</span>
                    <h2 class="font-headline-md text-headline-md">Business Building</h2>
                    <p class="text-on-surface-variant font-body-md text-body-md mt-4">
                        From MVP to market-ready enterprise. We build the digital infrastructure, GTM strategy, and automation layers for high-growth startups.
                    </p>
                </div>
                <div class="mt-auto overflow-hidden rounded-xl border border-outline-variant/20">
                    <img class="w-full h-64 object-cover grayscale hover:grayscale-0 transition-all duration-300 peek-effect" data-alt="A minimalist overhead view of a modern business planning session on a white marble desk." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlfjk4DX7bGQPrG63zNo-D96pfqrcRzTf1tK1av6RHSlyyf_UKJizifJhRknSpt0Oa6E_kALgTv7Do4XHAbkiSJzYW0z53tRv-VNHnRY00oVTD3UiNXugRyDAIo8l3fKrFgSlLx6qhOF9KxKXLjp0uQdJU5EYd4gradHWsM_lNyPMrZKmwfWBOAfcbdJbadVABCe2cEJoWc_ToMzE-gZXZRhlBOS8fAkXZJrgxl_w3tTfvCHd8L-LnuNT0tWixIp46bGgP-ZaBYFs"/>
                </div>
            </div>

            <!-- Service 4: Technical Consulting (Secondary Accent) -->
            <div class="md:col-span-7 notched-card bg-on-surface text-surface p-12 relative overflow-hidden group hover-glow transition-all" data-aos="fade-up" data-aos-delay="300">
                <div class="relative z-20">
                    <h2 class="font-headline-lg text-headline-lg mb-6">Technical Consulting</h2>
                    <p class="text-surface-variant font-body-lg text-body-lg max-w-md mb-8">
                        High-level strategic advisory for CTOs and Engineering Leads. We solve the "impossible" architectural bottlenecks.
                    </p>
                    <button class="border border-secondary text-secondary hover:bg-secondary hover:text-white px-8 py-3 transition-all font-label-sm text-label-sm uppercase tracking-widest">
                        Schedule Audit
                    </button>
                </div>
                <!-- Background Accent -->
                <div class="absolute -right-20 -bottom-20 opacity-10 group-hover:opacity-20 transition-opacity">
                    <span class="material-symbols-outlined text-[300px]" data-icon="architecture">architecture</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust / Process Section -->
    <section class="bg-surface-container-low py-32 px-margin-desktop">
        <div class="flex flex-col md:flex-row gap-gutter">
            <div class="md:w-1/3" data-aos="fade-right">
                <h2 class="font-headline-lg text-headline-lg mb-4">Our Methodology</h2>
                <p class="text-on-surface-variant font-body-md text-body-md">Precision engineering applied to digital products. We don't just build; we optimize for eternity.</p>
            </div>
            <div class="md:w-2/3 grid grid-cols-1 sm:grid-cols-3 gap-gutter">
                <div class="flex flex-col hover-glow p-4 rounded-xl transition-all cursor-default" data-aos="fade-up" data-aos-delay="100">
                    <span class="font-label-sm text-label-sm text-secondary mb-2">01</span>
                    <h3 class="font-headline-md text-headline-md mb-2">Discovery</h3>
                    <p class="text-on-surface-variant font-body-md text-body-md">In-depth audit of current infrastructure and bottlenecks.</p>
                </div>
                <div class="flex flex-col hover-glow p-4 rounded-xl transition-all cursor-default" data-aos="fade-up" data-aos-delay="200">
                    <span class="font-label-sm text-label-sm text-secondary mb-2">02</span>
                    <h3 class="font-headline-md text-headline-md mb-2">Synthesis</h3>
                    <p class="text-on-surface-variant font-body-md text-body-md">Architecting the custom AI and automation framework.</p>
                </div>
                <div class="flex flex-col hover-glow p-4 rounded-xl transition-all cursor-default" data-aos="fade-up" data-aos-delay="300">
                    <span class="font-label-sm text-label-sm text-secondary mb-2">03</span>
                    <h3 class="font-headline-md text-headline-md mb-2">Execution</h3>
                    <p class="text-on-surface-variant font-body-md text-body-md">Rapid deployment with continuous integration and testing.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-section-gap px-margin-desktop text-center" data-aos="zoom-in">
        <div class="max-w-3xl mx-auto notched-card p-16 bg-white hover-glow transition-all">
            <h2 class="font-display-lg text-headline-lg mb-6">Ready to automate your excellence?</h2>
            <p class="text-on-surface-variant font-body-lg text-body-lg mb-10">Join 200+ companies currently scaling with AI-Solutions infrastructure.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <button class="bg-secondary text-white px-10 py-4 font-label-sm text-label-sm uppercase tracking-widest hover:brightness-110 transition-all hover-glow">Start Project</button>
                <button class="border border-outline-variant px-10 py-4 font-label-sm text-label-sm uppercase tracking-widest hover:bg-surface transition-all hover-glow">View Pricing</button>
            </div>
        </div>
    </section>
</div>
@endsection

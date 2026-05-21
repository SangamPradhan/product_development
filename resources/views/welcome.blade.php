@extends('front.layouts.app')

@section('title', 'AI-Solutions | Precision in Automation')

@section('content')
    <!-- Hero Section -->
    <section
        class="relative min-h-screen hero-bg flex flex-col items-center justify-center pt-32 px-margin-mobile md:px-margin-desktop overflow-hidden">
        <div class="z-10 text-center max-w-4xl mx-auto" data-aos="fade-up">
            <div
                class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-outline-variant/30 glass-panel mb-8 hover-glow cursor-pointer">
                <span class="material-symbols-outlined text-[16px] text-secondary"
                    style="font-variation-settings: 'FILL' 1;">add_circle</span>
                <span class="font-label-sm text-label-sm text-on-surface-variant">What's new? <span
                        class="text-on-surface font-bold ml-2">Introducing Bindvece</span></span>
            </div>
            <h1 class="font-display-lg text-display-lg mb-6 tracking-tight">
                Build teams of <span class="text-secondary">AI agents</span> that deliver human-quality work
            </h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto mb-10">
                Achieve greater visibility and control over your contracts, enabling you to track, manage, and analyze key
                details with ease for better decision-making.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-16" data-aos="fade-up" data-aos-delay="100">
                <button
                    class="bg-secondary text-white px-10 py-4 rounded-full font-headline-md text-headline-md flex items-center gap-3 hover:scale-98 transition-all hover-glow">
                    Book a Demo
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
            </div>
            <div
                class="flex gap-2 p-1.5 bg-surface-container/50 backdrop-blur-md rounded-full border border-outline-variant/20 inline-flex mb-12">
                <button
                    class="px-6 py-2 rounded-full font-label-sm text-label-sm text-on-surface-variant transition-all">Dashboard</button>
                <button
                    class="px-6 py-2 rounded-full font-label-sm text-label-sm text-on-surface-variant transition-all">Analysis</button>
                <button
                    class="px-6 py-2 rounded-full font-label-sm text-label-sm bg-surface text-on-surface shadow-sm font-bold border border-outline-variant/30">AI
                    Agents</button>
            </div>
            <div
                class="w-full max-w-5xl mx-auto rounded-t-3xl border-t border-x border-outline-variant/30 glass-panel p-4 shadow-2xl hover-glow animate-float" data-aos="zoom-in" data-aos-delay="200">
                <img alt="Platform Dashboard Preview" class="w-full rounded-t-2xl object-cover shadow-inner"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCLIiYScHCnYn3z6u_e3nsTluQFmiLfcGnSVygtx8SsnVwqZYk-9_NuMBnugqxspj1zIJTg4LktgtHt4sMDhxZYJ9wks2dhyvZbdPvjv2Sf7r8nwE51isQ09Igdd3AUE_hQO4rpZVhSQhD22BI4zLuiU59CimDXOXQOnNezPqU9tLEbVEHpRSD8lh0o0Ma4TBI57fJIeHBU1a7pGf7W5Qx-OpItNN4dlB9fopGk5FPdhwXVG70C7fYk9l7I8oPBHT0LuxWO8f1sHPA" />
            </div>
            
            <style>
                @keyframes floating {
                    0% { transform: translateY(0px); }
                    50% { transform: translateY(-20px); }
                    100% { transform: translateY(0px); }
                }
                .animate-float {
                    animation: floating 6s ease-in-out infinite;
                }
            </style>
        </div>
    </section>
    <!-- About Us Section (Angled Corners) -->
    <section class="py-section-gap px-margin-mobile md:px-margin-desktop bg-surface" id="about">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-gutter items-center">
                <div class="space-y-8" data-aos="fade-right">
                    <div class="inline-block">
                        <span
                            class="bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm px-4 py-1 rounded-full uppercase tracking-widest hover-glow inline-block">Our
                            Mission</span>
                    </div>
                    <h2 class="font-headline-lg text-headline-lg text-on-surface max-w-lg">
                        Engineering the next frontier of Enterprise Intelligence.
                    </h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        We don't just build tools; we architect collaborative ecosystems where human intuition meets
                        algorithmic precision. Our platform empowers teams to offload repetitive complexity to specialized
                        AI agents.
                    </p>
                    <div class="grid grid-cols-2 gap-gutter pt-4">
                        <div class="space-y-2">
                            <div class="font-display-lg text-[48px] text-secondary">99%</div>
                            <p class="font-label-sm text-label-sm text-on-surface-variant uppercase">Accuracy Rate</p>
                        </div>
                        <div class="space-y-2">
                            <div class="font-display-lg text-[48px] text-secondary">150+</div>
                            <p class="font-label-sm text-label-sm text-on-surface-variant uppercase">Enterprise Clients</p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Cards with Angled Notch Shape -->
                    <div
                        class="angled-notch bg-surface-container-low p-8 border border-outline-variant/30 space-y-6 md:col-span-3 lg:col-span-1 hover-glow cursor-pointer" data-aos="fade-up" data-aos-delay="100">
                        <span class="material-symbols-outlined text-secondary text-[40px]">security</span>
                        <h3 class="font-headline-md text-headline-md">Personal Information Removal</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Lets users quickly find answers to
                            their questions without searching through multiple sources.</p>
                        <a class="flex items-center gap-2 font-label-sm text-label-sm text-secondary group" href="#">
                            Explore More
                            <span
                                class="material-symbols-outlined group-hover:translate-x-1 transition-transform">chevron_right</span>
                        </a>
                    </div>
                    <div
                        class="angled-notch bg-surface-container-low p-8 border border-outline-variant/30 space-y-6 md:col-span-1 hover-glow cursor-pointer" data-aos="fade-up" data-aos-delay="200">
                        <span class="material-symbols-outlined text-secondary text-[40px]">shield_person</span>
                        <h3 class="font-headline-md text-headline-md">Cloaking Alias Profiles</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Generate unlimited virtual identities
                            for total online privacy.</p>
                        <a class="flex items-center gap-2 font-label-sm text-label-sm text-secondary group" href="#">
                            Explore More
                            <span
                                class="material-symbols-outlined group-hover:translate-x-1 transition-transform">chevron_right</span>
                        </a>
                    </div>
                    <div
                        class="angled-notch bg-surface-container-low p-8 border border-outline-variant/30 space-y-6 md:col-span-1 hover-glow cursor-pointer" data-aos="fade-up" data-aos-delay="300">
                        <span class="material-symbols-outlined text-secondary text-[40px]">verified_user</span>
                        <h3 class="font-headline-md text-headline-md">Virtual Identities Security</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">The next-level in privacy protection
                            for online and travel.</p>
                        <a class="flex items-center gap-2 font-label-sm text-label-sm text-secondary group" href="#">
                            Explore More
                            <span
                                class="material-symbols-outlined group-hover:translate-x-1 transition-transform">chevron_right</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose Us: Scrollable Section -->
    <section class="py-section-gap px-margin-mobile md:px-margin-desktop bg-surface-container-lowest overflow-hidden">
        <div class="max-w-7xl mx-auto mb-16">
            <div class="text-center space-y-4">
                <span
                    class="text-label-sm font-label-sm text-secondary border border-secondary/30 px-3 py-1 rounded-full">Features</span>
                <h2 class="font-headline-lg text-headline-lg">Why <span class="text-secondary">choose</span> us</h2>
                <p class="text-body-md text-on-surface-variant">We are the only service that provides all 3 services as a
                    packaged service</p>
            </div>
        </div>
        <div class="max-w-7xl mx-auto flex flex-col gap-12">
            <!-- Feature 1 -->
            <div
                class="grid grid-cols-1 md:grid-cols-2 gap-gutter p-10 bg-surface rounded-xl border border-outline-variant/30 items-center hover-glow transition-all" data-aos="fade-up">
                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined bg-secondary/10 text-secondary p-2 rounded-full"
                            style="font-variation-settings: 'FILL' 1;">security</span>
                        <h3 class="font-headline-md text-headline-md">Protect Personal Information</h3>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex gap-4">
                            <span class="material-symbols-outlined text-secondary text-sm">check_circle</span>
                            <p class="text-body-md text-on-surface-variant">Identifying all places where your personal
                                information might be present.</p>
                        </li>
                        <li class="flex gap-4">
                            <span class="material-symbols-outlined text-secondary text-sm">check_circle</span>
                            <p class="text-body-md text-on-surface-variant">Automated contact with administrators of
                                third-party platforms.</p>
                        </li>
                        <li class="flex gap-4">
                            <span class="material-symbols-outlined text-secondary text-sm">check_circle</span>
                            <p class="text-body-md text-on-surface-variant">Ongoing vigilance and removal of re-indexed data
                                points.</p>
                        </li>
                    </ul>
                </div>
                <div class="relative group">
                    <div
                        class="absolute -inset-4 bg-secondary/5 rounded-2xl scale-95 group-hover:scale-100 transition-transform">
                    </div>
                    <img alt="Privacy protection illustration"
                        class="relative z-10 w-full rounded-xl border border-outline-variant/30 shadow-lg peek-effect"
                        data-alt="A sophisticated digital workspace showcasing high-tech privacy protection software interface. The scene is bright and minimalist with soft light-mode aesthetics. Glowing green indicators signify active security scans and data encryption processes in a clean, corporate environment."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuB2BIw9mZz4B3YngaRBwPU1BTXq3xlnMje5X2-JndVXiQKHc0s9ux_h81tDYFgm-viJhHecvW7j1n_xk-NQnIg4p9ISnxf0OQKfkJyjFXGKH5nDa0Y90HD5QiCoUaDYGTTNR3be6e9UceRLiNcR_eV7G9oYvWamWCWMcRwyX704Riqg-cYY8NZqFNBVPuL4T3VdzFUKXQuZIMUEanMUs6q9zrnW_Bz-_TIEO8f5EBQQDxJ7OTLr8_zf3kHl5d5vI5H1hy5M--hBZsQ" />
                </div>
            </div>
            <!-- Feature 2 -->
            <div
                class="grid grid-cols-1 md:grid-cols-2 gap-gutter p-10 bg-surface rounded-xl border border-outline-variant/30 items-center hover-glow transition-all" data-aos="fade-up">
                <div class="order-2 md:order-1 relative group">
                    <div
                        class="absolute -inset-4 bg-secondary/5 rounded-2xl scale-95 group-hover:scale-100 transition-transform">
                    </div>
                    <img alt="Reporting analytics illustration"
                        class="relative z-10 w-full rounded-xl border border-outline-variant/30 shadow-lg peek-effect"
                        data-alt="A clean and modern data analytics dashboard featuring vibrant green charts and architectural lines. The lighting is high-key, emphasizing a light-mode corporate design. Floating data widgets show real-time reporting metrics for an enterprise automation platform, exuding efficiency and technological purity."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAWWCSM8PJgHGh_lMwto_0haxD1llye9l5lUAR6vDabyYXCpve_0IawMeiQuuA_UkpUsgpHqpOEVkAMsPIZNrFFQtv0I09_ae6tO5v0vC8Qfj3jXgRXlLhastagv1r9E0QKySJGkpWGvg5pASgLaqBDKsA-89k4WaZJRvhGM65zylnN_mODZY8Zy2b1XNN2S13hO7fjeM-LhGyBGA4co948DnPnNbkc2-zpp_uTo5hUIqEpUla3k0aCFUoaVJvlLST7LubvFbKYqBA" />
                </div>
                <div class="order-1 md:order-2 space-y-6">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined bg-secondary/10 text-secondary p-2 rounded-full"
                            style="font-variation-settings: 'FILL' 1;">analytics</span>
                        <h3 class="font-headline-md text-headline-md">Detailed Reporting</h3>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex gap-4">
                            <span class="material-symbols-outlined text-secondary text-sm">check_circle</span>
                            <p class="text-body-md text-on-surface-variant">Comprehensive dashboard of your digital
                                footprint status.</p>
                        </li>
                        <li class="flex gap-4">
                            <span class="material-symbols-outlined text-secondary text-sm">check_circle</span>
                            <p class="text-body-md text-on-surface-variant">Weekly summaries of agent activity and
                                autonomous decisions.</p>
                        </li>
                        <li class="flex gap-4">
                            <span class="material-symbols-outlined text-secondary text-sm">check_circle</span>
                            <p class="text-body-md text-on-surface-variant">Exportable compliance reports for enterprise
                                oversight.</p>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Feature 3 -->
            <div
                class="grid grid-cols-1 md:grid-cols-2 gap-gutter p-10 bg-surface rounded-xl border border-outline-variant/30 items-center hover-glow transition-all" data-aos="fade-up">
                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined bg-secondary/10 text-secondary p-2 rounded-full"
                            style="font-variation-settings: 'FILL' 1;">lock</span>
                        <h3 class="font-headline-md text-headline-md">Secure All Data</h3>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex gap-4">
                            <span class="material-symbols-outlined text-secondary text-sm">check_circle</span>
                            <p class="text-body-md text-on-surface-variant">End-to-end encryption for all agent
                                communications.</p>
                        </li>
                        <li class="flex gap-4">
                            <span class="material-symbols-outlined text-secondary text-sm">check_circle</span>
                            <p class="text-body-md text-on-surface-variant">Multi-factor authentication required for
                                critical agent overrides.</p>
                        </li>
                        <li class="flex gap-4">
                            <span class="material-symbols-outlined text-secondary text-sm">check_circle</span>
                            <p class="text-body-md text-on-surface-variant">Air-gapped execution options for highly
                                sensitive tasks.</p>
                        </li>
                    </ul>
                </div>
                <div class="relative group">
                    <div
                        class="absolute -inset-4 bg-secondary/5 rounded-2xl scale-95 group-hover:scale-100 transition-transform">
                    </div>
                    <img alt="Security illustration"
                        class="relative z-10 w-full rounded-xl border border-outline-variant/30 shadow-lg peek-effect"
                        data-alt="A futuristic security shield icon glowing in vibrant secondary green, overlaid on a minimalist white background. The style is geometric and architectural, reflecting high-end enterprise security. Soft, diffused lighting creates a sense of technological purity and reliable data protection."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCO3VTw7REtN-LUikvM75xiAORIEn_3R0UMmo03NlwMEB_4VAy6uY6rEkznoH-V_Gnc6aTC5Rfzk08Dl6WBK4ZozEZMgjWZWMT-GE08bjNY3qDMQa1wFX2OJoxfUx-JNDWwJCGVptdfp32Gsu1jpGnDTtA-To64b5sth0ueqfcu4n0fFOBf90f4SkI5M8-soRWKteS-bl34oHrAJFKGf8xEG04GkHWMVy9yJgrpVKJBqb6L9jVSaZYHlWIRjoyA5VOXN49_0jNpPwU" />
                </div>
            </div>
        </div>
    </section>
    <!-- Projects & Blogs (Bento Grid) -->
    <section class="py-section-gap px-margin-mobile md:px-margin-desktop bg-surface">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-end mb-12">
                <h2 class="font-headline-lg text-headline-lg">Innovation <span class="text-secondary">Showcase</span></h2>
                <a class="font-label-sm text-label-sm text-on-surface-variant underline hover:text-secondary"
                    href="{{ route('front.projects') }}">View all projects</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div id="home-featured-project" class="md:col-span-2 md:row-span-2"></div>
                <!-- Event 1 -->
                <div
                    class="md:col-span-2 bg-secondary-container p-8 rounded-xl border border-outline-variant/30 flex flex-col justify-between hover-glow" data-aos="fade-left" data-aos-delay="100">
                    <div>
                        <div class="flex justify-between items-start mb-6">
                            <span
                                class="bg-on-secondary-container text-white px-3 py-1 rounded-full text-label-sm font-label-sm uppercase">Next
                                Event</span>
                            <span class="text-label-sm font-label-sm text-on-secondary-container">Oct 24, 2024</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-secondary-container">AI-Solutions Summit</h3>
                        <p class="font-body-md text-body-md text-on-secondary-container/80 mt-2">Join us for the largest
                            gathering of automation engineers in San Francisco.</p>
                    </div>
                    <button
                        class="mt-8 border border-on-secondary-container text-on-secondary-container px-6 py-2 rounded-full font-label-sm text-label-sm hover:bg-on-secondary-container hover:text-white transition-colors">Register
                        Now</button>
                </div>
                <!-- Blog 1 -->
                <div
                    class="md:col-span-1 bg-surface-container-high p-6 rounded-xl border border-outline-variant/30 space-y-4 hover-glow cursor-pointer" data-aos="fade-up" data-aos-delay="200">
                    <span class="text-label-sm font-label-sm text-secondary">Insights</span>
                    <h4 class="font-headline-md text-[20px]">The Future of Prompt Engineering</h4>
                    <p class="text-body-md text-on-surface-variant">Why LLMs are just the beginning of agentic workflows.
                    </p>
                </div>
                <!-- Blog 2 -->
                <div
                    class="md:col-span-1 bg-surface-container-high p-6 rounded-xl border border-outline-variant/30 space-y-4 hover-glow cursor-pointer" data-aos="fade-up" data-aos-delay="300">
                    <span class="text-label-sm font-label-sm text-secondary">Technology</span>
                    <h4 class="font-headline-md text-[20px]">Quantum Security in Agents</h4>
                    <p class="text-body-md text-on-surface-variant">Securing autonomous decision making at the edge.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials -->
    <section class="py-section-gap px-margin-mobile md:px-margin-desktop bg-surface-container-lowest">
        <div class="max-w-7xl mx-auto text-center mb-16" data-aos="fade-up">
            <h2 class="font-headline-lg text-headline-lg">Trusted by <span class="text-secondary">Visionaries</span></h2>
        </div>
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-gutter">
            <div class="p-8 bg-surface border border-outline-variant/30 space-y-6 hover-glow transition-all cursor-default" data-aos="fade-up" data-aos-delay="100">
                <div class="flex gap-1 text-secondary">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                </div>
                <p class="text-body-lg italic font-body-lg">"The precision of these AI agents is unlike anything we've seen.
                    Our operational overhead dropped by 40% in just three months."</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-secondary-fixed"></div>
                    <div>
                        <p class="font-headline-md text-[16px]">Sarah Jenkins</p>
                        <p class="font-label-sm text-label-sm text-on-surface-variant">CTO, Nexus Corp</p>
                    </div>
                </div>
            </div>
            <div class="p-8 bg-surface border border-outline-variant/30 space-y-6 hover-glow transition-all cursor-default" data-aos="fade-up" data-aos-delay="200">
                <div class="flex gap-1 text-secondary">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                </div>
                <p class="text-body-lg italic font-body-lg">"Finally, a privacy platform that feels enterprise-ready. The
                    'Angled Notch' design language is a breath of fresh air in SaaS."</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-primary-fixed"></div>
                    <div>
                        <p class="font-headline-md text-[16px]">Marcus Thorne</p>
                        <p class="font-label-sm text-label-sm text-on-surface-variant">Security Lead, Vanta</p>
                    </div>
                </div>
            </div>
            <div class="p-8 bg-surface border border-outline-variant/30 space-y-6 hover-glow transition-all cursor-default" data-aos="fade-up" data-aos-delay="300">
                <div class="flex gap-1 text-secondary">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                </div>
                <p class="text-body-lg italic font-body-lg">"The level of transparency provided in their reporting makes
                    auditing autonomous workflows a simple, daily task."</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-tertiary-fixed"></div>
                    <div>
                        <p class="font-headline-md text-[16px]">Elena Rodriguez</p>
                        <p class="font-label-sm text-label-sm text-on-surface-variant">Director of AI, Fintech Global</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
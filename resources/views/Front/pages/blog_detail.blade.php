@extends('front.layouts.app')

@section('title', 'AI-Solutions | The Paradigm Shift')

@push('styles')
<style>
    .angled-notch {
        clip-path: polygon(
            0% 0%, 
            calc(100% - 24px) 0%, 
            100% 24px, 
            100% 100%, 
            24px 100%, 
            0% calc(100% - 24px)
        );
    }
    .notch-tl-br {
        clip-path: polygon(
            20px 0%, 
            100% 0%, 
            100% calc(100% - 20px), 
            calc(100% - 20px) 100%, 
            0% 100%, 
            0% 20px
        );
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative w-full h-[819px] min-h-[600px] flex items-end pb-24 overflow-hidden pt-32">
    <div class="absolute inset-0 z-0 mt-32 md:mt-0">
        <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCUVZFPss381Ri_8QCSMfYPCp4PI0Y-aFa9Spbjk2T3YKqvXJcyrQyV1AFseqYyHtnUcRJoTDYEhHuySljLidq5Qbs2Zzc4R1DZCGu0IzKqu5tN61ZHl8UwUc6l-AAMrCl1GHRCT8C13An7yqhrh9KTQDkTY78BO5O9UFJsalkjO0V76IjxOv2AWFKJEeM5Ar-T57fA4ZRvtzDeS-v-OdRrnH849eCAj0qKNFjksL_sJopmT8EAxgnlCO69UU74uchgnCCciwN0sDU" alt="Digital Environment"/>
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
    </div>
    <div class="relative z-10 mx-margin-desktop w-full max-w-4xl text-on-primary" data-aos="fade-up">
        <div class="flex items-center gap-4 mb-6">
            <span class="bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm px-3 py-1 rounded-sm hover-glow cursor-default">TECHNOLOGY</span>
            <span class="text-surface-variant font-label-sm text-label-sm uppercase tracking-widest">Innovation Insight</span>
        </div>
        <h1 class="font-display-lg text-display-lg mb-8 leading-tight">
            The Paradigm Shift: From Generative to Agentic AI Systems
        </h1>
        <div class="flex items-center gap-8" data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full border-2 border-secondary-fixed overflow-hidden hover-glow transition-all">
                    <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAnDsAkLkchEl8L6M9nZb0V9eD4lPsPfMI1lFjaP6TZj9rEK6OBzlb29-Gnh8krXcjjhW5_DfAz82StwXz2GjXTPalzbGqkmakOY0KkB6DOMspclp1EfAHygR8yPwdQmnfhxB8AaciER3okRrs8evSbMR7AdcHHt2eL5yDG7h_aybef8uExk6Lf75lTqS3ukX1gkAp79W0crVk48Yn531pXn0dQOtbHyo_sTZ9YbGPzWsSp8A9Y63X2wSodQ7cTpMB4Van9SqJFsvI" alt="Admin"/>
                </div>
                <div>
                    <p class="text-label-sm font-label-sm text-secondary-fixed opacity-80">WRITTEN BY</p>
                    <p class="font-body-md font-bold">ADMIN STRATOR</p>
                </div>
            </div>
            <div>
                <p class="text-label-sm font-label-sm text-secondary-fixed opacity-80">PUBLISHED</p>
                <p class="font-body-md font-bold">MAY 16, 2024</p>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<main class="mx-margin-desktop my-section-gap grid grid-cols-1 lg:grid-cols-12 gap-gutter">
    <!-- Left Sidebar (Metadata/Share) -->
    <aside class="hidden lg:block lg:col-span-2" data-aos="fade-right">
        <div class="sticky top-32 space-y-8">
            <div>
                <h4 class="text-label-sm font-label-sm text-outline mb-4 uppercase">Share Insight</h4>
                <div class="flex flex-col gap-4">
                    <a class="w-10 h-10 rounded-full border border-outline-variant flex items-center justify-center hover:bg-secondary-container transition-all hover-glow" href="#">
                        <span class="material-symbols-outlined text-[18px]">share</span>
                    </a>
                    <a class="w-10 h-10 rounded-full border border-outline-variant flex items-center justify-center hover:bg-secondary-container transition-all hover-glow" href="#">
                        <span class="material-symbols-outlined text-[18px]">bookmark</span>
                    </a>
                    <a class="w-10 h-10 rounded-full border border-outline-variant flex items-center justify-center hover:bg-secondary-container transition-all hover-glow" href="#">
                        <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                    </a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Article Canvas -->
    <article class="lg:col-span-7">
        <div class="space-y-8 text-on-surface-variant font-body-lg text-body-lg leading-relaxed">
            <p class="first-letter:text-5xl first-letter:font-bold first-letter:mr-3 first-letter:float-left first-letter:text-secondary">
                We are currently witnessing a fundamental transition in the world of artificial intelligence. While the last two years were defined by Generative AI—models that could produce content upon request—the horizon is now dominated by Agentic AI. This shift represents the move from tools that speak to systems that act.
            </p>
            <h2 class="font-headline-lg text-headline-lg text-on-surface pt-8">Beyond Prompt-Response</h2>
            <p>
                Agentic AI differs from its predecessor by its ability to maintain state, set sub-goals, and interact with external environments autonomously. It is not merely a chatbot; it is a digital colleague capable of executing complex workflows without constant human intervention.
            </p>

            <!-- Key Insights Box (Angled Precision) -->
            <div class="bg-surface-container-low notch-tl-br p-8 my-12 border-l-4 border-secondary hover-glow transition-all" data-aos="fade-up">
                <h3 class="font-headline-md text-headline-md text-secondary mb-4">Core Principles of Agency</h3>
                <ul class="space-y-4 font-label-sm text-label-sm list-none p-0">
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        <span>AUTONOMOUS DECOMPOSITION: Breaking large goals into executable steps.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        <span>TOOL INTERACTION: Ability to use APIs, software, and databases.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        <span>PERSISTENT MEMORY: Learning from previous interactions across sessions.</span>
                    </li>
                </ul>
            </div>

            <h2 class="font-headline-lg text-headline-lg text-on-surface pt-8">Architecting the Future</h2>
            <p>
                To build these systems, we require a new design philosophy. It isn't just about the LLM at the core; it's about the "scaffolding" around it. At AI-Solutions, we focus on creating secure environments where these agents can operate safely, ensuring precision in every automated decision.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-12">
                <div class="bg-surface-container-lowest border border-outline-variant/30 p-6 rounded-lg hover-glow transition-all" data-aos="zoom-in" data-aos-delay="100">
                    <img class="w-full h-48 object-cover mb-4 notch-tl-br" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB9gyRz9vh7iIh3Ywpp17xsUrenYkNAT749KxO6O3oWcziVkVReYeSrQA-2fG2tFbwawx-BJ_jN9jVTt6YOJ0hTOX8DhLhe8vorqLx1Wb35B-ouhW6y6q2YRfzrnEtUtftnGluHXXqTu6A_I3FhF2jYHiZs3h37iabvpX7GWVEEkNgIV2PFtOj1L0h6NiaYVG60-H_fsj_wg5rilF_e7aEAHdC7q-6IT8W12vGVgUc4_NWWtxvBMCzpOxc3dc-B3MHOhy7g17qAjH4" alt="Hardware Symbiosis"/>
                    <h4 class="font-headline-md text-headline-md text-on-surface mb-2">Hardware Symbiosis</h4>
                    <p class="text-body-md font-body-md opacity-80">Integrating agency directly into edge computing for real-time responsiveness.</p>
                </div>
                <div class="bg-surface-container-lowest border border-outline-variant/30 p-6 rounded-lg hover-glow transition-all" data-aos="zoom-in" data-aos-delay="200">
                    <img class="w-full h-48 object-cover mb-4 notch-tl-br" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBWrGyC0I1DXz-iGFvYe5DHOdal0R4H66im0dCznWf8QdWtsy82e4MnHFpDrNXV4jSAKdv1OWS8fxg8TYUX9thh_p767-4cjgcsBvbBVYTaagKvadrH6ScPd4CPCsoummuvPHBOIgVvJs3VhEW6FbxKzmgLSFrvX7fPSUzamwvvzsvk64zQih1JlqsfM0Mecs4f0-hlSUOY15sKMN91Do81KI4gnCl5Ro6kz6gUczEA7Dt05g2SNwO7BH-r6nKurARCDTdztDR2WfM" alt="Strategic Reasoning"/>
                    <h4 class="font-headline-md text-headline-md text-on-surface mb-2">Strategic Reasoning</h4>
                    <p class="text-body-md font-body-md opacity-80">Developing logical frameworks that allow AI to anticipate business needs.</p>
                </div>
            </div>
        </div>

        <!-- Tags -->
        <div class="flex flex-wrap gap-3 pt-12 border-t border-outline-variant/30 mt-12" data-aos="fade-up">
            <span class="font-label-sm text-label-sm bg-tertiary-fixed text-on-tertiary-fixed px-3 py-1 rounded-sm hover-glow transition-all cursor-default">#AI-AGENTS</span>
            <span class="font-label-sm text-label-sm bg-tertiary-fixed text-on-tertiary-fixed px-3 py-1 rounded-sm hover-glow transition-all cursor-default">#AUTOMATION</span>
            <span class="font-label-sm text-label-sm bg-tertiary-fixed text-on-tertiary-fixed px-3 py-1 rounded-sm hover-glow transition-all cursor-default">#ENTERPRISE</span>
            <span class="font-label-sm text-label-sm bg-tertiary-fixed text-on-tertiary-fixed px-3 py-1 rounded-sm hover-glow transition-all cursor-default">#FUTURE-TECH</span>
        </div>
    </article>

    <!-- Right Sidebar (CTA & Context) -->
    <aside class="lg:col-span-3 space-y-12" data-aos="fade-left" data-aos-delay="200">
        <!-- Ready to Ride? Styled CTA Card -->
        <div class="bg-inverse-surface p-8 text-inverse-on-surface notch-tl-br relative overflow-hidden group hover-glow transition-all">
            <div class="absolute -right-8 -top-8 w-32 h-32 bg-secondary opacity-20 rounded-full group-hover:scale-110 transition-transform"></div>
            <h3 class="font-headline-md text-headline-md mb-4 uppercase tracking-tight">Ready to Deploy?</h3>
            <p class="font-body-md opacity-80 mb-8">Experience the next leap in automation with our enterprise-grade AI frameworks.</p>
            <button class="w-full py-4 bg-secondary-fixed text-on-secondary-fixed font-bold text-label-sm uppercase tracking-widest hover:brightness-110 transition-all hover-glow">
                Consult Our Experts
            </button>
        </div>

        <!-- Categories -->
        <div>
            <h4 class="font-label-sm text-label-sm text-outline mb-6 uppercase tracking-[0.2em]">Categories</h4>
            <div class="space-y-4">
                <a class="flex justify-between items-center p-4 bg-surface-container-low border border-outline-variant/20 hover:border-secondary transition-all" href="#">
                    <span class="font-body-md">Automation Trends</span>
                    <span class="font-label-sm text-label-sm text-secondary">12</span>
                </a>
                <a class="flex justify-between items-center p-4 bg-surface-container-low border border-outline-variant/20 hover:border-secondary transition-all" href="#">
                    <span class="font-body-md">Technical Registry</span>
                    <span class="font-label-sm text-label-sm text-secondary">08</span>
                </a>
                <a class="flex justify-between items-center p-4 bg-surface-container-low border border-outline-variant/20 hover:border-secondary transition-all" href="#">
                    <span class="font-body-md">Ethical AI</span>
                    <span class="font-label-sm text-label-sm text-secondary">05</span>
                </a>
            </div>
        </div>

        <!-- Recent Adventures -->
        <div>
            <h4 class="font-label-sm text-label-sm text-outline mb-6 uppercase tracking-[0.2em]">Recent Insights</h4>
            <div class="space-y-6">
                <div class="flex gap-4 group cursor-pointer">
                    <div class="w-20 h-20 bg-surface-container-highest flex-shrink-0 notch-tl-br overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBid2Lls-Wuu1Zmi4uBgx4viLcNk8oYmVDEEgbyYi06Y8v5BelXUSP9zcgIU49Xyo9t4ZsdUjW-4VE7vrVOXCaCmBwzP-BK17pen1COm77AUkFm1lMb9dXMuWCuVf0jwhmZ123rqC_VFoLMDBVMHgVTZrOh7J3TYGKxV0exJ3IYZXuCmDrBz0k2BvT6hu5CCjsz8lyfdlMfQMi-Fi8I8ItW3V0JTpo1DfBiszHu7B6zIBfkP1brsPDgo84yjHF9NiwcWCpoFw3CXlc" alt="Recent 1"/>
                    </div>
                    <div>
                        <h5 class="font-body-md font-bold group-hover:text-secondary transition-colors leading-tight">Securing the Neural Core</h5>
                        <p class="text-label-sm text-outline mt-1">May 12, 2024</p>
                    </div>
                </div>
                <div class="flex gap-4 group cursor-pointer">
                    <div class="w-20 h-20 bg-surface-container-highest flex-shrink-0 notch-tl-br overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBlPt4mTpElnY0AScJVpDfWpSnxvUuHGg50CfTojC3tjFMvHAb89vrchvYQheghBE_fIzVl2lTlLJ_5vZK0x88dhlcIFRRrOOfAoJt-Ty5I9eHaBR9u_ypJcSAMVqmP6n6obt0YukSo9tjdNM0f5ZQX4TxLbr-C11vDMr8cEP64LREArxC76k-cuDvNJgNoKlt5WBrpnXORYDyuc5C4g3-k_TJ4OZWXqTYP9STcA13uK-AqOlK668Gz8Rn04qLYLiMM3Mdc_VSARXc" alt="Recent 2"/>
                    </div>
                    <div>
                        <h5 class="font-body-md font-bold group-hover:text-secondary transition-colors leading-tight">The Multi-Model Orchestration</h5>
                        <p class="text-label-sm text-outline mt-1">May 08, 2024</p>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</main>
@endsection

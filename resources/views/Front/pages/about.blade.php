@extends('front.layouts.app')

@section('title', 'About Us | AI-Solutions')

@push('styles')
<style>
    .angled-notch-reverse {
        clip-path: polygon(20px 0, 100% 0, 100% 100%, 0 100%, 0 20px);
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="pt-32 md:pt-48 pb-16 md:pb-32 px-6 md:px-margin-desktop">
    <div class="max-w-4xl" data-aos="fade-up">
        <span class="inline-block px-3 py-1 bg-[#E8F5E9] text-secondary font-label-sm text-label-sm rounded-sm mb-6 uppercase tracking-widest hover-glow">Our Story</span>
        <h1 class="font-display-lg text-4-xl md:text-display-lg mb-6 md:mb-8 leading-tight">Engineering the future of <span class="text-secondary">automated intelligence.</span></h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
            AI-Solutions was founded on the principle of technological purity. We strip away complexity to reveal efficient, high-performance automation frameworks designed for the world's most ambitious enterprises.
        </p>
    </div>
</section>

<!-- Vision & Mission (Bento Style) -->
<section class="px-6 md:px-margin-desktop pb-16 md:pb-section-gap">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
        <!-- Mission -->
        <div class="md:col-span-7 bg-surface-container-low p-6 md:p-12 angled-notch border border-outline-variant/30 flex flex-col justify-center min-h-[300px] md:min-h-[400px] hover-glow transition-all" data-aos="fade-right">
            <span class="material-symbols-outlined text-secondary text-4xl md:text-5xl mb-4 md:mb-6">rocket_launch</span>
            <h2 class="font-headline-lg text-2xl md:text-headline-lg mb-4 md:mb-6 font-bold">Our Mission</h2>
            <p class="font-body-lg text-body-md md:text-body-lg text-on-surface-variant">To accelerate global innovation by providing precision-engineered AI infrastructure that scales effortlessly and operates with crystalline clarity.</p>
        </div>

        <!-- Stats / Accolades -->
        <div class="md:col-span-5 bg-secondary text-white p-6 md:p-12 angled-notch-reverse flex flex-col justify-end min-h-[200px] md:min-h-none hover-glow transition-all" data-aos="fade-left" data-aos-delay="100">
            <div class="space-y-6 md:space-y-8">
                <div>
                    <div class="text-3xl md:text-5xl font-bold font-headline-lg mb-2">99.9%</div>
                    <div class="font-label-sm text-xs md:text-label-sm opacity-80">PRECISION ACCURACY</div>
                </div>
                <div class="h-px bg-white/20"></div>
                <div>
                    <div class="text-3xl md:text-5xl font-bold font-headline-lg mb-2">120+</div>
                    <div class="font-label-sm text-xs md:text-label-sm opacity-80">ENTERPRISE CLIENTS</div>
                </div>
            </div>
        </div>

        <!-- Vision -->
        <div class="md:col-span-5 bg-white border border-outline-variant p-6 md:p-12 angled-notch-reverse hover-glow transition-all" data-aos="fade-up" data-aos-delay="200">
            <h3 class="font-headline-md text-xl md:text-headline-md mb-4 text-secondary font-bold">The Vision</h3>
            <p class="font-body-md text-sm md:text-body-md text-on-surface-variant">We envision a world where human creativity is unlocked by invisible, perfect automation. A future where "AI-Solutions" is the standard for trust and efficiency in Every industry.</p>
        </div>

        <!-- Image / Abstract Visual -->
        <div class="md:col-span-7 relative h-[200px] md:h-[300px] overflow-hidden angled-notch hover-glow transition-all" data-aos="fade-up" data-aos-delay="300">
            <img class="absolute inset-0 w-full h-full object-cover peek-effect animate-image" data-alt="A high-tech digital visualization of a neural network glowing in deep emerald and crystalline white tones." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3A8-xKar4ccB_ykGlUBayZkxWqYbrg6rDiN1H4Lxy-t1LYOoqG1oR5deMIreGmv1DSTzbiOkst-9aGIubEbVzBZfEWB2rvQ6eqj4wA7_9MYHyGBvRz6nfb5rn07zkIb89Pq_XlAnMAJy-V2u5FGuQAoi1JpGMSLCYBnbpl8IAw7LMmNRzJJMLEhCw9x7APiFCsRXukUhezaJ9QSmUcA4qdEOkiJp9jVLMwFGbahPlSuYN97gnaseJBu3oFlLBl-RkGWau5MMtEqA"/>
            <div class="absolute inset-0 bg-secondary/10"></div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="bg-surface-container-low py-16 md:py-section-gap px-6 md:px-margin-desktop">
    <div class="mb-10 md:mb-16 text-center max-w-3xl mx-auto" data-aos="fade-up">
        <h2 class="font-headline-lg text-2xl md:text-headline-lg mb-4 font-bold">Values that drive precision</h2>
        <p class="font-body-md text-sm md:text-body-md text-on-surface-variant">Our identity is defined by a commitment to absolute quality and architectural integrity in everything we build.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
        <div class="space-y-4 hover-glow p-4 rounded-xl transition-all cursor-default" data-aos="fade-up" data-aos-delay="100">
            <div class="w-12 h-12 rounded-full border-2 border-secondary flex items-center justify-center">
                <span class="material-symbols-outlined text-secondary">architecture</span>
            </div>
            <h4 class="font-headline-md text-lg md:text-headline-md font-bold">Technological Purity</h4>
            <p class="font-body-md text-sm md:text-body-md text-on-surface-variant">We reject "black-box" AI. Our solutions are transparent, auditable, and built on clean, documented logic.</p>
        </div>
        <div class="space-y-4 hover-glow p-4 rounded-xl transition-all cursor-default" data-aos="fade-up" data-aos-delay="200">
            <div class="w-12 h-12 rounded-full border-2 border-secondary flex items-center justify-center">
                <span class="material-symbols-outlined text-secondary">speed</span>
            </div>
            <h4 class="font-headline-md text-lg md:text-headline-md font-bold">High-Velocity Impact</h4>
            <p class="font-body-md text-sm md:text-body-md text-on-surface-variant">We measure success by the speed of our clients' outcomes. Efficiency isn't just a goal; it's our requirement.</p>
        </div>
        <div class="space-y-4 hover-glow p-4 rounded-xl transition-all cursor-default" data-aos="fade-up" data-aos-delay="300">
            <div class="w-12 h-12 rounded-full border-2 border-secondary flex items-center justify-center">
                <span class="material-symbols-outlined text-secondary">security</span>
            </div>
            <h4 class="font-headline-md text-lg md:text-headline-md font-bold">Security by Design</h4>
            <p class="font-body-md text-sm md:text-body-md text-on-surface-variant">Enterprise safety is never an afterthought. We bake rigid security protocols into the very first line of code.</p>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-16 md:py-section-gap px-6 md:px-margin-desktop">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 md:mb-16 gap-6 md:gap-8">
        <div class="max-w-2xl">
            <h2 class="font-headline-lg text-2xl md:text-headline-lg mb-4 font-bold">The minds behind the machine</h2>
            <p class="font-body-lg text-sm md:text-body-lg text-on-surface-variant">An asymmetric collective of engineers, researchers, and designers dedicated to the craft of automation.</p>
        </div>
        <a href="{{ route('front.contact') }}" class="notch-button border border-secondary text-secondary px-6 md:px-8 py-3 font-label-sm text-xs md:text-label-sm hover:bg-surface-container-high transition-all hover-glow inline-block">
            View Careers
        </a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter">
        <!-- Team Member 1 -->
        <div class="group mb-8 sm:mb-0" data-aos="zoom-in" data-aos-delay="100">
            <div class="aspect-square bg-surface-container overflow-hidden mb-4 md:mb-6 angled-notch border border-outline-variant transition-all hover-glow group-hover:border-secondary">
                <img class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 peek-effect" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCtw1puQn9vKGTEXHBEgLlAUHKdJ0Sx04GFzOHcx2xUGA_6TikKhy1uVqXygFiISpYP_OkWkyCGRynxsTLwseqcB4NcZJJfwlNca9QrY-FkiujMTefmrKOgu2JkzKoqtqZ0JWDw-XPFIaAwFPmXGOUvI3iEsrSjUC604PAnk-7lgBI-5Us0Zzjwbr0B1xloqi4IGfamJpdIrhwQ7lsc4GBqfM7A68i3HSe-MpAMM4g9PqcM_XjpTkdWO774YqBdLNsJ_CcWE-Wk2eM" alt="Dr. Elias Thorne"/>
            </div>
            <h5 class="font-headline-md text-lg md:text-headline-md font-bold">Dr. Elias Thorne</h5>
            <p class="font-label-sm text-xs md:text-label-sm text-secondary uppercase tracking-widest mb-2 font-bold">Chief Executive Officer</p>
            <p class="font-body-md text-sm md:text-body-md text-on-surface-variant">Former Head of Systems at QuantLogik, specializing in scalable neural architectures.</p>
        </div>
        <!-- Team Member 2 -->
        <div class="group mb-8 sm:mb-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="aspect-square bg-surface-container overflow-hidden mb-4 md:mb-6 angled-notch border border-outline-variant transition-all hover-glow group-hover:border-secondary">
                <img class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 peek-effect" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBCMGl5b-gJhJ3WqVzAlnS-S1Yt6D2tQawIVOrCWUMfc6ToIPWQ8ScoHiMUgFdUelOZxpbVVB7NfyDqlE1T_leVgjWbqMHFQQEeuU-xn37aOHT_sFHpNYnxXHW6qV-6GhKYKzAdmKvH2_2KtSGSYSED4bJQkde4cX4SVxVtwCwAKu5Zca75FS71yTUxhxRpzxspIoMG-z3cgh2iGjUtiTEPUObctpHHksfs6nRqatxnm25vuQCGMrB6HFdsfyI3Z363_ytkfCCQPkg" alt="Sarah Chen"/>
            </div>
            <h5 class="font-headline-md text-lg md:text-headline-md font-bold">Sarah Chen</h5>
            <p class="font-label-sm text-xs md:text-label-sm text-secondary uppercase tracking-widest mb-2 font-bold">Head of AI Research</p>
            <p class="font-body-md text-sm md:text-body-md text-on-surface-variant">Lead investigator in reinforcement learning with over 40 published papers in ML.</p>
        </div>
        <!-- Team Member 3 -->
        <div class="group mb-8 sm:mb-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="aspect-square bg-surface-container overflow-hidden mb-4 md:mb-6 angled-notch border border-outline-variant transition-all hover-glow group-hover:border-secondary">
                <img class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 peek-effect" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDBx8wsMnkjb7FYrUaQFbJby3FfjLBoNKu1l1paZWsYTsjmt1V9mlF19nMrQYvHr12iKLMMlS8JiXNxYlTMqNImoZ3d5dZnrLYGWSSDyR_QXdguCjWGrgmeDm1fE4E4dnE7IMCqi4x6GlLv2hHNIdoIwsTlZj_DA_E0zmIdJ4pPluMMj-mt0vuxUHMhPOkAl7FnSjKBBBctD8t8ppdhHiw7JwwiBybTQR6W5qm0hLWDlRLjUl74qdzRUhc9H3hI8GiK40q_iTXqwW8" alt="Marcus Vance"/>
            </div>
            <h5 class="font-headline-md text-lg md:text-headline-md font-bold">Marcus Vance</h5>
            <p class="font-label-sm text-xs md:text-label-sm text-secondary uppercase tracking-widest mb-2 font-bold">Director of Engineering</p>
            <p class="font-body-md text-sm md:text-body-md text-on-surface-variant">Architect of our core automation engine. 15 years in high-frequency trading systems.</p>
        </div>
        <!-- Team Member 4 -->
        <div class="group" data-aos="zoom-in" data-aos-delay="400">
            <div class="aspect-square bg-surface-container overflow-hidden mb-4 md:mb-6 angled-notch border border-outline-variant transition-all hover-glow group-hover:border-secondary">
                <img class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 peek-effect" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDDBkmTFKBhVvB-wXmqv5PlUiPHC9U-S3qFHhY5Tm-o21zIT1qVBs8PwGZkwatPfxojiChqvZjRc0u3xc0TJm9xuTef1muyaMbR-ta1ed_7QeY1YOtZk-REvYYWw-Lyg6ARaXLc3BndN5exVLk8EBrSHJRGE3oUpCcHLm8xa6Yzmi_b79xA2f-w5-Fq9jpWiaIsK_ALq_DGjMlTbn7pMA9zUbFO89vnI2teuIr8TBgTBocG_mPEs4BPkbk4o3iwyYwolZcZYnT4aVY" alt="Aria Jensen"/>
            </div>
            <h5 class="font-headline-md text-lg md:text-headline-md font-bold">Aria Jensen</h5>
            <p class="font-label-sm text-xs md:text-label-sm text-secondary uppercase tracking-widest mb-2 font-bold">Design Director</p>
            <p class="font-body-md text-sm md:text-body-md text-on-surface-variant">Ensuring that complex intelligence remains human-centric and intuitively accessible.</p>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-surface-container px-6 md:px-margin-desktop py-16 md:py-24 mb-section-gap">
    <div class="flex flex-col items-center text-center max-w-4xl mx-auto" data-aos="fade-up">
        <h2 class="font-headline-lg text-2xl md:text-headline-lg mb-6 font-bold leading-snug">Ready to integrate intelligence?</h2>
        <p class="font-body-lg text-sm md:text-body-lg text-on-surface-variant mb-10">Join the leaders who have transitioned from manual workflows to autonomous excellence.</p>
        <div class="flex flex-col sm:flex-row gap-4 md:gap-6 w-full sm:w-auto justify-center">
            <a href="{{ route('front.contact') }}" class="notch-button bg-secondary text-white px-8 md:px-10 py-3.5 md:py-4 font-headline-md text-sm md:text-headline-md hover:bg-on-secondary-fixed-variant transition-all hover-glow inline-block text-center font-bold">
                Work with us
            </a>
            <a href="{{ route('front.contact') }}" class="notch-button bg-white border border-outline-variant text-on-surface px-8 md:px-10 py-3.5 md:py-4 font-headline-md text-sm md:text-headline-md hover:bg-surface-container-high transition-all hover-glow inline-block text-center font-bold">
                Schedule a Demo
            </a>
        </div>
    </div>
</section>
@endsection

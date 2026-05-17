@extends('front.layouts.app')

@section('title', 'Blogs | AI-Solutions')

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
</style>
@endpush

@section('content')
<div class="pt-32 pb-section-gap px-margin-mobile md:px-margin-desktop max-w-7xl mx-auto">
    <!-- Hero Header -->
    <header class="mb-24 max-w-3xl" data-aos="fade-up">
        <div class="inline-block px-3 py-1 bg-secondary-container text-on-secondary-container font-label-sm text-label-sm mb-6 uppercase tracking-widest hover-glow cursor-default">Insights &amp; Intelligence</div>
        <h1 class="text-headline-lg-mobile md:text-display-lg font-display-lg text-on-background mb-8">Architecting the future through precise AI automation.</h1>
        <p class="text-body-lg font-body-lg text-on-surface-variant">Stay updated with the latest trends in neural networking, autonomous enterprise workflows, and the evolution of machine learning precision.</p>
    </header>

    <!-- Featured Post - Bento Layout Integration -->
    <section class="grid grid-cols-1 md:grid-cols-12 gap-gutter mb-24">
        <a href="{{ route('front.blog.detail') }}" class="md:col-span-8 group relative overflow-hidden angled-notch bg-surface-container-low border border-outline-variant transition-all hover:border-secondary block hover-glow" data-aos="fade-right">
            <div class="aspect-video relative overflow-hidden">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBnr9b6aGtsgifoU1pFjdYkvGCYhYKns3yJzUSh1Bs2DyrCNZ3ozycpgMiyAr_Pzy2ARjhKD8WoG-eM7AYGGBJX5nG_UpXwi7uSEprZKMZkxi0ZhJqiuK-mQCrueKqLSlPMMukWtViiPrBYiRkjRxOuql3GIbGPQLfWrXNEbD7myKt5A0qU824GUqM86T95uF_p5fS3GSvinmnG-_3BSbnNYpX-uFxLv79Gavz1QZcdqPY1rpFu2ZUYvNCBo-l_jHwc43jb3ibVd-A" alt="Featured Insight"/>
                <div class="absolute top-6 left-6">
                    <span class="bg-surface/90 backdrop-blur-md text-secondary font-label-sm text-label-sm px-3 py-1 rounded-full border border-secondary/20">Featured Insight</span>
                </div>
            </div>
            <div class="p-8">
                <div class="flex gap-4 items-center mb-4">
                    <span class="text-label-sm font-label-sm text-on-tertiary-fixed-variant">12 MIN READ</span>
                    <span class="text-outline-variant">•</span>
                    <span class="text-label-sm font-label-sm text-on-tertiary-fixed-variant">OCT 24, 2024</span>
                </div>
                <h2 class="text-headline-lg font-headline-lg mb-4 text-on-surface group-hover:text-secondary transition-colors">The Paradigm Shift: From Generative to Agentic AI Systems</h2>
                <p class="text-body-md font-body-md text-on-surface-variant mb-6 line-clamp-2">How autonomous agents are replacing simple prompt-response interactions to deliver end-to-end business process execution without human intervention.</p>
                <div class="flex items-center gap-2 text-secondary font-label-sm text-label-sm group">
                    READ FULL CASE STUDY 
                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                </div>
            </div>
        </a>

        <div class="md:col-span-4 flex flex-col gap-gutter" data-aos="fade-left" data-aos-delay="100">
            <div class="flex-1 p-8 angled-notch bg-surface-container-low border border-outline-variant flex flex-col justify-center hover-glow transition-all">
                <h3 class="text-headline-md font-headline-md mb-4 text-on-surface">Subscribe to Intelligence</h3>
                <p class="text-body-md font-body-md text-on-surface-variant mb-6">Receive weekly deep-dives into automation engineering.</p>
                <div class="space-y-4">
                    <input class="w-full bg-white border border-outline-variant p-4 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md" placeholder="email@enterprise.com" type="email"/>
                    <button class="w-full bg-secondary text-on-secondary py-4 font-label-sm text-label-sm uppercase tracking-widest active:scale-[0.98] transition-all">Join The Network</button>
                </div>
            </div>
            <div class="flex-1 p-8 angled-notch bg-secondary-container border border-secondary/20 flex flex-col justify-between hover-glow transition-all">
                <div>
                    <span class="material-symbols-outlined text-on-secondary-container mb-4">terminal</span>
                    <h4 class="text-headline-md font-headline-md text-on-secondary-container mb-2">Developer Docs</h4>
                    <p class="text-body-md font-body-md text-on-secondary-container opacity-80">Explore our latest API updates for autonomous integration.</p>
                </div>
                <a class="text-on-secondary-container font-label-sm text-label-sm border-b border-on-secondary-container w-fit mt-4" href="#">VIEW DOCUMENTATION</a>
            </div>
        </div>
    </section>

    <!-- Article Grid -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-x-gutter gap-y-16">
        <!-- Article 1 -->
        <article class="group cursor-pointer hover-glow p-4 rounded-xl transition-all" onclick="window.location='{{ route('front.blog.detail') }}'" data-aos="fade-up" data-aos-delay="100">
            <div class="aspect-[4/3] overflow-hidden angled-notch mb-6 bg-surface-container-low border border-outline-variant">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAi96HfzQ4NktrS45oP6jT1yAxMv85Pj8pFVUEbgjOVuA01513DpCDybVvT6ks7YpVyZaARXVFMe8coxshAW19ktsUlgbF8ix3opYZpGYe3YeTf9ToDVGg1_uytap7vREbckgFx19vYT5W4sgTJeqpk5gFz1CAF-C6WkD0KwbdlKYD28GHYe_csnZb17TEcgWk2ZE8Uw6zbT5jRJEzIf0gbL87Ct60MWj2AWEYTCyVC0wci7uUTLpjwgyD8YxzYXMpK0ACr675eQ4g" alt="Precision Engineering"/>
            </div>
            <div class="flex gap-2 mb-3">
                <span class="bg-tertiary-fixed text-on-tertiary-fixed-variant px-2 py-0.5 font-label-sm text-label-sm">AUTOMATION</span>
            </div>
            <h3 class="text-headline-md font-headline-md text-on-surface mb-3 group-hover:text-secondary transition-colors">Precision Engineering in Robotic Process Automation</h3>
            <p class="text-body-md font-body-md text-on-surface-variant mb-4 line-clamp-3">Reducing error margins to zero through systematic cognitive automation in logistics and supply chain management.</p>
            <div class="flex items-center justify-between">
                <span class="text-label-sm font-label-sm text-outline">8 MIN READ</span>
                <span class="material-symbols-outlined text-secondary opacity-0 group-hover:opacity-100 transition-opacity">arrow_outward</span>
            </div>
        </article>
        
        <!-- Article 2 -->
        <article class="group cursor-pointer hover-glow p-4 rounded-xl transition-all" onclick="window.location='{{ route('front.blog.detail') }}'" data-aos="fade-up" data-aos-delay="200">
            <div class="aspect-[4/3] overflow-hidden angled-notch mb-6 bg-surface-container-low border border-outline-variant">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCrXLhzoTXwI8E8HGFUQHkcsoGhGnyG0gAfoqLGJ3eRVYuWpBl0dRDaMNPGjf3nu-3cmMdlBT2nO8v2ljDkTP3Z-jcWdRyVfhQEvrjvkSEu-PTgm92Flqx1mEtK-elZX9bxqTrrDgdFlIiyQZnojnhNEN-ylA53urBImyEvHqMUUUIdyyCXNrSSlSNg09jhDu5dAJ-esjSCV73d3zQvFqbHqnQdLE79aZf5-ra3lbr6c7YoaNxqKDraiIkIVt5DWaz-wTfPtEdYNfY" alt="Defensive Intelligence"/>
            </div>
            <div class="flex gap-2 mb-3">
                <span class="bg-tertiary-fixed text-on-tertiary-fixed-variant px-2 py-0.5 font-label-sm text-label-sm">CYBERSECURITY</span>
            </div>
            <h3 class="text-headline-md font-headline-md text-on-surface mb-3 group-hover:text-secondary transition-colors">Defensive Intelligence: AI vs AI in Modern Security</h3>
            <p class="text-body-md font-body-md text-on-surface-variant mb-4 line-clamp-3">How predictive algorithms are anticipating sophisticated threat vectors before they manifest in network traffic.</p>
            <div class="flex items-center justify-between">
                <span class="text-label-sm font-label-sm text-outline">15 MIN READ</span>
                <span class="material-symbols-outlined text-secondary opacity-0 group-hover:opacity-100 transition-opacity">arrow_outward</span>
            </div>
        </article>
        
        <!-- Article 3 -->
        <article class="group cursor-pointer hover-glow p-4 rounded-xl transition-all" onclick="window.location='{{ route('front.blog.detail') }}'" data-aos="fade-up" data-aos-delay="300">
            <div class="aspect-[4/3] overflow-hidden angled-notch mb-6 bg-surface-container-low border border-outline-variant">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBPnofdJY9o_Y1mHZXztNgr-_rRQa81qOJNnPrjmXkiOoogOALf7oje8Eit927lXudL7a0Qv2EN59l6o9mj8wnxbeQbDfEmEQML9x1zkBQpCm2fEfGVzu-Wc4RimgpYwCHTCi4hsTA19FOchKVWOFkEt_zqzDzkevqrMCvlkrfbR4rQO5yVlmxfxRBoQLW5v9A37OjLmCfDwLcaq4_Ey6nvjR73BVmvCUtoxtkts9YaGOq1AG0lkwDBu_jNh7bEAT74hq9WO6wDitM" alt="Architect's Guide"/>
            </div>
            <div class="flex gap-2 mb-3">
                <span class="bg-tertiary-fixed text-on-tertiary-fixed-variant px-2 py-0.5 font-label-sm text-label-sm">STRATEGY</span>
            </div>
            <h3 class="text-headline-md font-headline-md text-on-surface mb-3 group-hover:text-secondary transition-colors">The Architect's Guide to AI Implementation</h3>
            <p class="text-body-md font-body-md text-on-surface-variant mb-4 line-clamp-3">A framework for enterprise leaders to transition from legacy silos to a unified, intelligent data architecture.</p>
            <div class="flex items-center justify-between">
                <span class="text-label-sm font-label-sm text-outline">10 MIN READ</span>
                <span class="material-symbols-outlined text-secondary opacity-0 group-hover:opacity-100 transition-opacity">arrow_outward</span>
            </div>
        </article>
        
        <!-- Article 4 -->
        <article class="group cursor-pointer hover-glow p-4 rounded-xl transition-all" onclick="window.location='{{ route('front.blog.detail') }}'" data-aos="fade-up" data-aos-delay="100">
            <div class="aspect-[4/3] overflow-hidden angled-notch mb-6 bg-surface-container-low border border-outline-variant">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDrOsQ6pwQTHW4WXfPcpmXPuER68M68jdAEE4rLM4fIRn0OWU85w5yASSwhZz2Kzr4bt_4qMNfOjaIyX2fnvtt5Do6-2HWchCHwdmZF7YWCP3rIBzlDuydkvXZ1G_EBK6Db19A4lB4VK2cNvOVo6RrFCNEoPQzidd0y4-tTEYnrqNVfCafzoEqFLmFz9I362lGh_UrVV2zS2EXI4XcilqX3R7SLmhWi5-OUDtPmiMeo4QlX7hOwHH39dHhchPZNOo06rVHSxNbW0fY" alt="Distributed AI Edge"/>
            </div>
            <div class="flex gap-2 mb-3">
                <span class="bg-tertiary-fixed text-on-tertiary-fixed-variant px-2 py-0.5 font-label-sm text-label-sm">NETWORKS</span>
            </div>
            <h3 class="text-headline-md font-headline-md text-on-surface mb-3 group-hover:text-secondary transition-colors">Beyond the Cloud: The Rise of Distributed AI Edge</h3>
            <p class="text-body-md font-body-md text-on-surface-variant mb-4 line-clamp-3">Processing intelligence at the source. Why localized models are the future of low-latency enterprise solutions.</p>
            <div class="flex items-center justify-between">
                <span class="text-label-sm font-label-sm text-outline">6 MIN READ</span>
                <span class="material-symbols-outlined text-secondary opacity-0 group-hover:opacity-100 transition-opacity">arrow_outward</span>
            </div>
        </article>
        
        <!-- Article 5 -->
        <article class="group cursor-pointer hover-glow p-4 rounded-xl transition-all" onclick="window.location='{{ route('front.blog.detail') }}'" data-aos="fade-up" data-aos-delay="200">
            <div class="aspect-[4/3] overflow-hidden angled-notch mb-6 bg-surface-container-low border border-outline-variant">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAQGCX9bO7MjOrT6BtAER-Q13PCoH0tY23RlPGrpwNjtDxs17hg-gZ1DhDsT6ObWp7lcry85ICW-OZlQuMYf_x6_HZs6WaVEVyPVaDpQaucW7dKKMdKWeT4Vmny3ikjXLntjtLx1Xjyo1buowGiJ6EP_3M0of1PvvL9c3oWCYooF8kVZum2dTmYlN1zU1bFEaKTfcCHQ15wZLp1NQJh_yD15WB7_caEX9kksnWUpxMUDuCrjFdzYi_-f85CihO3vZr-hzJ_baU9Pao" alt="Human-Centric Design"/>
            </div>
            <div class="flex gap-2 mb-3">
                <span class="bg-tertiary-fixed text-on-tertiary-fixed-variant px-2 py-0.5 font-label-sm text-label-sm">PRODUCTIVITY</span>
            </div>
            <h3 class="text-headline-md font-headline-md text-on-surface mb-3 group-hover:text-secondary transition-colors">Human-Centric Design in an Automated World</h3>
            <p class="text-body-md font-body-md text-on-surface-variant mb-4 line-clamp-3">Maintaining the human touch while leveraging machine speed. Balancing UX and automation efficiency.</p>
            <div class="flex items-center justify-between">
                <span class="text-label-sm font-label-sm text-outline">12 MIN READ</span>
                <span class="material-symbols-outlined text-secondary opacity-0 group-hover:opacity-100 transition-opacity">arrow_outward</span>
            </div>
        </article>
        
        <!-- Article 6 -->
        <article class="group cursor-pointer hover-glow p-4 rounded-xl transition-all" onclick="window.location='{{ route('front.blog.detail') }}'" data-aos="fade-up" data-aos-delay="300">
            <div class="aspect-[4/3] overflow-hidden angled-notch mb-6 bg-surface-container-low border border-outline-variant">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDDhZza-CuVLDfztqqo_dWpyudiIjGDEARmAh80uoVIAaY2Ve-24neKDSRfw4K2uscVwqVZ6wl5HsKGw2PMeCmuU3nLgumpGqkNaNs7LIS9_8g5h0-BkdJ3nYsYQtw8OzetlY2cvlXiLoeNJeBi9NCyjSceStjkZKtPP4vdPogFF_SLY9r7y4Hfo3Md0hWjBt0jMsS8azGm3DRVyBoxkWu2iUDfixchJ0psZgU0JRb0x5bsN2e77yjPAWhaHMmU4D3Kwl1CUfRcxv0" alt="Infrastructure as Intelligence"/>
            </div>
            <div class="flex gap-2 mb-3">
                <span class="bg-tertiary-fixed text-on-tertiary-fixed-variant px-2 py-0.5 font-label-sm text-label-sm">ENGINEERING</span>
            </div>
            <h3 class="text-headline-md font-headline-md text-on-surface mb-3 group-hover:text-secondary transition-colors">Infrastructure as Intelligence: The New Stack</h3>
            <p class="text-body-md font-body-md text-on-surface-variant mb-4 line-clamp-3">How self-healing infrastructure is redefining the role of DevOps and site reliability engineering.</p>
            <div class="flex items-center justify-between">
                <span class="text-label-sm font-label-sm text-outline">9 MIN READ</span>
                <span class="material-symbols-outlined text-secondary opacity-0 group-hover:opacity-100 transition-opacity">arrow_outward</span>
            </div>
        </article>
    </section>

    <!-- Pagination -->
    <div class="mt-24 flex items-center justify-center gap-4" data-aos="fade-in">
        <button class="w-12 h-12 flex items-center justify-center rounded-full border border-outline-variant text-on-surface-variant hover:border-secondary hover:text-secondary transition-all hover-glow">
            <span class="material-symbols-outlined">chevron_left</span>
        </button>
        <div class="flex gap-2">
            <button class="w-12 h-12 flex items-center justify-center rounded-full bg-secondary text-on-secondary font-label-sm text-label-sm hover-glow transition-all">01</button>
            <button class="w-12 h-12 flex items-center justify-center rounded-full border border-outline-variant text-on-surface-variant font-label-sm text-label-sm hover:border-secondary hover:text-secondary transition-all hover-glow">02</button>
            <button class="w-12 h-12 flex items-center justify-center rounded-full border border-outline-variant text-on-surface-variant font-label-sm text-label-sm hover:border-secondary hover:text-secondary transition-all hover-glow">03</button>
        </div>
        <button class="w-12 h-12 flex items-center justify-center rounded-full border border-outline-variant text-on-surface-variant hover:border-secondary hover:text-secondary transition-all hover-glow">
            <span class="material-symbols-outlined">chevron_right</span>
        </button>
    </div>
</div>
@endsection

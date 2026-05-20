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

    <!-- Featured Project (Asymmetric Layout) -->
    <section class="px-margin-desktop mb-section-gap">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-center">
            <div class="lg:col-span-7 bg-surface-container-low notch-container p-8 lg:p-12 border border-outline-variant/30 hover-glow transition-all" data-aos="fade-right">
                <img class="w-full h-[500px] object-cover notch-container grayscale hover:grayscale-0 transition-all duration-700 peek-effect" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCyn-ZiKlIqyqpqYa7VxM0b6lLY_o_ERlPLo4OjDXpWJ4PRrHYTz32ybyd28jpL8ALUplcmFjmmnNLQAx_OaYbWJXb_MhYIepiN7Saxt0Xmr9n2-jugDji3dA3uCXHhl4XA_8JHD1OF26sBGCXTao-20qqKzP7-eIGjNSN2wrDO7jB-6PYjWQQOzM0fh0R_2qhfHoUQLTNnNYxQwv7kZbPPuhDk9R_3j71hIdg7NIFRDYTp0TXqxw15_TE6CGTbfDu0dYq6mg1nLGE" alt="Project visualization"/>
            </div>
            <div class="lg:col-span-5 lg:pl-12" data-aos="fade-left" data-aos-delay="200">
                <span class="font-label-sm text-label-sm text-secondary mb-4 block">CASE STUDY: LOGISTICS 4.0</span>
                <h2 class="font-headline-lg text-headline-lg mb-6 leading-tight">NeuralSync: Predictive Supply Chain Optimization</h2>
                <p class="font-body-md text-body-md text-on-surface-variant mb-8">
                    Achieved a 42% reduction in operational latency for a global shipping giant. By implementing a proprietary transformer-based demand forecast model, we synchronized 14,000 nodes in real-time.
                </p>
                <div class="flex gap-4 mb-8">
                    <div class="bg-surface-container p-4 flex-1">
                        <p class="text-secondary font-headline-md text-headline-md">42%</p>
                        <p class="text-label-sm font-label-sm uppercase opacity-60">Latency Reduction</p>
                    </div>
                    <div class="bg-surface-container p-4 flex-1">
                        <p class="text-secondary font-headline-md text-headline-md">$12M</p>
                        <p class="text-label-sm font-label-sm uppercase opacity-60">Annual Savings</p>
                    </div>
                </div>
                <a href="{{ route('front.project.detail') }}" class="notch-button bg-secondary text-on-secondary px-8 py-4 font-label-sm text-label-sm hover:bg-on-secondary-fixed-variant transition-all hover-glow inline-block">
                    VIEW FULL CASE STUDY
                </a>
            </div>
        </div>
    </section>

    <!-- Bento Grid of Projects -->
    <section class="px-margin-desktop mb-section-gap">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
            <!-- Card 1 -->
            <div class="md:col-span-2 group cursor-pointer" onclick="window.location='{{ route('front.project.detail') }}'">
                <div class="bg-surface-container-low notch-container border border-outline-variant/30 h-full overflow-hidden flex flex-col hover-glow transition-all" data-aos="zoom-in" data-aos-delay="100">
                    <div class="relative overflow-hidden h-[300px]">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 peek-effect" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3YogKAerBBeOwDjMf-SFkMgMfK_2aJ70E3weTp_lR7sVpHccPb5dvx8sLQn-VJx1HKMHgkIuBvlL2jmFCWd1WbdHqrPFN2y63p_l2InxzeC_qrMKqdBAJA8UwXYYPUVnR7QhCKoAmCP10aZ90Adpv9JIlC2BgUSiTQxe6Zk8QG5MLe5prfO3L5KUsZ0kHkFxeWZwYnD6fGD2emuRKUwxcFXxVdq8lTNZPgtTFDGwGLdpR0BMuR54OAp66BzGpqe8M19jWxTpzU7w" alt="Fintech Interface"/>
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="font-headline-md text-headline-md">FinGuard AI</h3>
                            <span class="material-symbols-outlined text-secondary">arrow_outward</span>
                        </div>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-6">Real-time fraud detection engine capable of processing 50k transactions per second with 99.9% accuracy.</p>
                        <div class="mt-auto flex gap-2">
                            <span class="bg-tertiary-fixed text-on-tertiary-fixed-variant px-3 py-1 text-label-sm font-label-sm">FINTECH</span>
                            <span class="bg-tertiary-fixed text-on-tertiary-fixed-variant px-3 py-1 text-label-sm font-label-sm">SECURITY</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="md:col-span-1 group cursor-pointer" onclick="window.location='{{ route('front.project.detail') }}'">
                <div class="bg-surface-container-low notch-container border border-outline-variant/30 h-full overflow-hidden flex flex-col border-b-secondary border-b-2 hover-glow transition-all" data-aos="zoom-in" data-aos-delay="200">
                    <div class="relative overflow-hidden h-[300px]">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 peek-effect" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC54yDLSc341PjOvRKXuZO0HqgnoqA_ylEes_4S7igOXUf2nUT6eTZE4vi-glWqb4wnHo8duEhoZjKPiPCuWa9XSOvzOoXmNG3tI7Fsflm6SsXvYDHZrEM75JErELltjy0mSF9z-fC6tEb6PtYK63rIqK7UfKnut0s4OtOlVISQ_ITHZo-_DpY1AxGvTrpXdJmuRUlj_2yXuVNXxI1VFb_gc_Vl0YV_YQQf-8Tc2rneVDp63AHuFlmbKoW4-uUfIkm5zRgIx-DfHxQ" alt="Healthcare Project"/>
                    </div>
                    <div class="p-8 flex-1">
                        <h3 class="font-headline-md text-headline-md mb-4">BioTrace Hub</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Autonomous patient monitoring for post-op recovery using computer vision and wearable telemetry.</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="md:col-span-1 group cursor-pointer" onclick="window.location='{{ route('front.project.detail') }}'">
                <div class="bg-surface-container-low notch-container border border-outline-variant/30 h-full overflow-hidden flex flex-col hover-glow transition-all" data-aos="zoom-in" data-aos-delay="300">
                    <div class="p-8">
                        <h3 class="font-headline-md text-headline-md mb-4">AeroVision</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-6">Autonomous drone fleet management for high-precision agricultural surveillance and crop analysis.</p>
                        <img class="w-full h-[200px] object-cover notch-container peek-effect" src="https://lh3.googleusercontent.com/aida-public/AB6AXuArVrkSkMiFVUgSZnqDQC0q0r6C1k5njhoNY-Tg-uUK6I--Qi2od4UuYteb-VKMqAHkniXmim16lURd5VcR72BqjCfrJjMpNguyC6s_80ChtEXbbm32V4C9ij1WT0pgVazhGONr_v2LCJi-Htp0_E3g_9KDEX90l6yPBZpaDkj7Z1OdRe9sXTAy_2WW-DoLcKrtJLerr2o_HUanJfRgjcbcgO0Ncc9Yk7DAHxuFEu_nIuqrlHBmQD0P91JsG1hLy2k0RSAlE6MsQ7U" alt="Agri Project"/>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="md:col-span-2 group cursor-pointer" onclick="window.location='{{ route('front.project.detail') }}'">
                <div class="bg-surface-container-low notch-container border border-outline-variant/30 h-full overflow-hidden flex md:flex-row flex-col hover-glow transition-all" data-aos="zoom-in" data-aos-delay="400">
                    <div class="p-8 flex-1">
                        <h3 class="font-headline-md text-headline-md mb-4">CivicMind</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-6">Smart city infrastructure automation managing traffic, energy consumption, and waste across 3 metropolitan zones.</p>
                        <button class="text-secondary font-label-sm text-label-sm border-b border-secondary">READ WHITE PAPER</button>
                    </div>
                    <div class="md:w-1/2 relative overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 peek-effect" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBAF90m9_6r2Yot2ibZosDclM7lJyWWgH1fLYhU-l6CO4BgAvQElinfqArUjAICURamY-F4EF2yVuOYc_b_BIKdklSDJE1XTCInDHTOT9Z7zfIHRZaaQDPjnESu1GighQx_8iBkqu21hQR55XqrEZT8lD4y8rdiyZnHv96T92Vr4tG55YI21nLVIWqcIwdLSCgDkJCq5QK_QQZb7AXy2DyhbMiapGyMcKfJIEXpuXVMS66WSLgn_ljmIfSiFy7NJXVh10MDUEx7q34" alt="Smart City"/>
                    </div>
                </div>
            </div>
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

@extends('front.layouts.app')

@section('title', 'Services | AI-Solutions')



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
        @php
            $displayServices = count($services) > 0 ? $services : [
                (object)[
                    'title' => 'AI Automation',
                    'icon' => 'hub',
                    'description' => 'Deploy custom neural architectures that handle repetitive workflows with zero-latency decision making. Our automation engines integrate seamlessly into your existing tech stack, reducing operational overhead by up to 70%.',
                    'features' => "Predictive Resource Allocation\nNatural Language Document Processing\nAutonomous Customer Support Chains",
                ],
                (object)[
                    'title' => 'Coding Help',
                    'icon' => 'terminal',
                    'description' => 'Professional-grade refactoring, debugging, and architecture design for complex software systems.',
                    'features' => "Python Development\nRust Infrastructure\nTypeScript Architectures",
                ],
                (object)[
                    'title' => 'Business Building',
                    'icon' => 'domain',
                    'description' => 'From MVP to market-ready enterprise. We build the digital infrastructure, GTM strategy, and automation layers for high-growth startups.',
                    'features' => "Product Blueprinting\nGTM Execution\nAutomation Architectures",
                ],
                (object)[
                    'title' => 'Technical Consulting',
                    'icon' => 'architecture',
                    'description' => 'High-level strategic advisory for CTOs and Engineering Leads. We solve the "impossible" architectural bottlenecks.',
                    'features' => "High-Level Advisory\nPerformance Audits\nTeam Workflows",
                ]
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
            @foreach($displayServices as $idx => $ser)
                @php
                    // Alternating layout spans
                    $spanClass = 'md:col-span-6';
                    if ($idx === 0) {
                        $spanClass = 'md:col-span-8';
                    } elseif ($idx === 1) {
                        $spanClass = 'md:col-span-4';
                    } elseif ($idx === 2) {
                        $spanClass = 'md:col-span-5';
                    } elseif ($idx === 3) {
                        $spanClass = 'md:col-span-7 bg-on-surface text-surface';
                    }
                    
                    // Parse features
                    $feats = array_filter(array_map('trim', explode("\n", $ser->features ?? '')));
                @endphp
                
                <div class="{{ $spanClass }} notched-card p-12 flex flex-col justify-between group hover-glow transition-all" data-aos="fade-up" data-aos-delay="{{ ($idx + 1) * 100 }}">
                    <div>
                        <div class="flex items-center gap-4 mb-6">
                            <span class="material-symbols-outlined text-secondary text-4xl">{{ $ser->icon }}</span>
                            <h2 class="font-headline-lg text-headline-lg">{{ $ser->title }}</h2>
                        </div>
                        <div class="font-body-lg text-body-lg mb-8 {{ $idx === 3 ? 'text-surface-variant' : 'text-on-surface-variant' }}">
                            {!! $ser->description !!}
                        </div>
                        @if(count($feats) > 0)
                            <ul class="space-y-4 mb-10">
                                @foreach($feats as $f)
                                    <li class="flex items-center gap-3 font-body-md text-body-md">
                                        <span class="material-symbols-outlined text-secondary">check_circle</span>
                                        {{ $f }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    @if($idx === 3)
                        <div class="mt-8 flex justify-start">
                            <a href="{{ route('front.contact') }}" class="notch-button border border-secondary text-secondary hover:bg-secondary hover:text-white px-8 py-3.5 transition-all font-label-sm text-label-sm uppercase tracking-widest text-center font-bold">
                                Schedule Audit
                            </a>
                        </div>
                    @endif
                </div>
            @endforeach
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
                <a href="{{ route('front.contact') }}" class="notch-button bg-secondary text-white px-10 py-4 font-label-sm text-label-sm uppercase tracking-widest hover:bg-on-secondary-fixed-variant transition-all hover-glow text-center font-bold">Start Project</a>
                <a href="{{ route('front.projects') }}" class="notch-button border border-outline-variant text-on-surface px-10 py-4 font-label-sm text-label-sm uppercase tracking-widest hover:bg-surface-container-high transition-all hover-glow text-center font-bold">View Projects</a>
            </div>
        </div>
    </section>
</div>
@endsection

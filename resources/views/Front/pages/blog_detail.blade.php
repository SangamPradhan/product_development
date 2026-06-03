@extends('front.layouts.app')

@section('title', $blog->title . ' | AI-Solutions')

@push('styles')
<style>
    .angled-notch {
        clip-path: polygon(
            0% 0%, 
            calc(100% - 24px) 0%, 
            100% 24px, 
            100% 100%, 
            24px 100%, 
            0% calc(100- 24px)
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
    /* Styling for Quill HTML content */
    .ql-content h1 { font-size: 2.25rem; font-weight: 800; line-height: 1.25; margin-top: 2rem; margin-bottom: 1rem; color: var(--md-sys-color-on-surface); }
    .ql-content h2 { font-size: 1.75rem; font-weight: 700; line-height: 1.35; margin-top: 1.75rem; margin-bottom: 0.75rem; color: var(--md-sys-color-on-surface); }
    .ql-content h3 { font-size: 1.5rem; font-weight: 700; line-height: 1.4; margin-top: 1.5rem; margin-bottom: 0.5rem; color: var(--md-sys-color-on-surface); }
    .ql-content p { margin-bottom: 1.25rem; }
    .ql-content ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1.25rem; }
    .ql-content ol { list-style-type: decimal; padding-left: 1.5rem; margin-bottom: 1.25rem; }
    .ql-content li { margin-bottom: 0.5rem; }
    .ql-content blockquote { border-l-4 border-primary bg-surface-container-low/75 p-4 pl-6 italic rounded-r-lg my-6 text-on-surface-variant; }
    .ql-content pre { background-color: var(--md-sys-color-surface-container-low); padding: 1rem; border-radius: 0.5rem; border: 1px border-outline-variant; overflow-x: auto; font-family: monospace; font-size: 0.875rem; margin-bottom: 1.25rem; }
    .ql-content a { color: var(--md-sys-color-primary); text-decoration: underline; }
    .ql-content a:hover { color: var(--md-sys-color-primary-container); }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative w-full h-[600px] flex items-end pb-24 overflow-hidden pt-32">
    <div class="absolute inset-0 z-0">
        @if($blog->main_image)
            <img class="w-full h-full object-cover" src="{{ $blog->main_image_url }}" alt="{{ $blog->title }}"/>
        @else
            <img class="w-full h-full object-cover opacity-25" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCUVZFPss381Ri_8QCSMfYPCp4PI0Y-aFa9Spbjk2T3YKqvXJcyrQyV1AFseqYyHtnUcRJoTDYEhHuySljLidq5Qbs2Zzc4R1DZCGu0IzKqu5tN61ZHl8UwUc6l-AAMrCl1GHRCT8C13An7yqhrh9KTQDkTY78BO5O9UFJsalkjO0V76IjxOv2AWFKJEeM5Ar-T57fA4ZRvtzDeS-v-OdRrnH849eCAj0qKNFjksL_sJopmT8EAxgnlCO69UU74uchgnCCciwN0sDU" alt="Default Blog Header"/>
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/45 to-transparent"></div>
    </div>
    <div class="relative z-10 mx-margin-desktop w-full max-w-4xl text-on-primary" data-aos="fade-up">
        <div class="flex items-center gap-4 mb-6">
            <span class="bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm px-3 py-1 rounded-sm uppercase font-bold">
                {{ is_array($blog->categories) && count($blog->categories) > 0 ? $blog->categories[0] : 'Insight' }}
            </span>
            <span class="text-surface-variant font-label-sm text-label-sm uppercase tracking-widest font-bold">INNOVATION INSIGHT</span>
        </div>
        <h1 class="font-display-lg text-display-lg mb-8 leading-tight font-bold">
            {{ $blog->title }}
        </h1>
        <div class="flex items-center gap-8" data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full border-2 border-secondary-fixed overflow-hidden flex items-center justify-center bg-secondary font-bold text-white uppercase text-sm">
                    {{ substr($blog->author ?? 'A', 0, 1) }}
                </div>
                <div>
                    <p class="text-[10px] font-label-sm text-secondary-fixed opacity-80 font-bold">WRITTEN BY</p>
                    <p class="font-body-md font-bold uppercase">{{ $blog->author ?? 'Administrator' }}</p>
                </div>
            </div>
            <div>
                <p class="text-[10px] font-label-sm text-secondary-fixed opacity-80 font-bold">PUBLISHED</p>
                <p class="font-body-md font-bold">{{ $blog->created_at->format('M d, Y') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Main Content Grid -->
<main class="mx-margin-desktop my-section-gap grid grid-cols-1 lg:grid-cols-12 gap-gutter">
    <!-- Left Sidebar (Metadata/Share with 3 icons) -->
    <aside class="hidden lg:block lg:col-span-2" data-aos="fade-right">
        <div class="sticky top-32 space-y-8 flex flex-col items-center">
            <div class="flex flex-col gap-4">
                <!-- Share Button (Functional) -->
                <button onclick="navigator.clipboard.writeText(window.location.href); alert('Link copied to clipboard!');" 
                        class="w-11 h-11 rounded-full border border-outline-variant flex items-center justify-center hover:bg-secondary-container text-on-surface hover:text-secondary transition-all hover-glow shadow-sm"
                        title="Copy Link">
                    <span class="material-symbols-outlined text-[20px]">share</span>
                </button>
                <!-- Bookmark Button (Unfunctional) -->
                <button class="w-11 h-11 rounded-full border border-outline-variant flex items-center justify-center hover:bg-secondary-container text-on-surface hover:text-secondary transition-all hover-glow shadow-sm cursor-default"
                        title="Bookmark">
                    <span class="material-symbols-outlined text-[20px]">bookmark</span>
                </button>
                <!-- Comment Button (Unfunctional) -->
                <button class="w-11 h-11 rounded-full border border-outline-variant flex items-center justify-center hover:bg-secondary-container text-on-surface hover:text-secondary transition-all hover-glow shadow-sm cursor-default"
                        title="Comments">
                    <span class="material-symbols-outlined text-[20px]">chat_bubble</span>
                </button>
            </div>
        </div>
    </aside>

    <!-- Article Canvas -->
    <article class="lg:col-span-7">
        <!-- Render Quill Rich HTML Content -->
        <div class="ql-content text-on-surface-variant font-body-lg text-body-lg leading-relaxed">
            {!! $blog->content !!}
        </div>

        <!-- Key Principles Callout Section (Optional) -->
        @if($blog->callout_title && is_array($blog->callout_items) && count($blog->callout_items) > 0)
            <div class="border-l-4 border-secondary bg-surface-container-low/80 p-8 rounded-r-xl my-8 space-y-4 shadow-sm" data-aos="fade-up">
                <h4 class="font-headline-md text-headline-md text-secondary font-bold mb-4 uppercase tracking-tight flex items-center gap-2">
                    <span class="material-symbols-outlined text-secondary">featured_play_list</span>
                    {{ $blog->callout_title }}
                </h4>
                <div class="grid grid-cols-1 gap-6">
                    @foreach($blog->callout_items as $item)
                        @if(!empty($item['key']))
                            <div class="border-b border-outline-variant/30 pb-4 last:border-b-0 last:pb-0">
                                <strong class="text-secondary font-bold font-label-sm uppercase tracking-wider block text-xs mb-1">{{ $item['key'] }}</strong>
                                <span class="text-on-surface-variant font-body-md text-sm">{{ $item['value'] }}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Tags -->
        @if(is_array($blog->tags) && count($blog->tags) > 0)
            <div class="flex flex-wrap gap-3 pt-12 border-t border-outline-variant/30 mt-12" data-aos="fade-up">
                @foreach($blog->tags as $tag)
                    <a href="{{ route('front.blogs', ['tag' => $tag]) }}" class="font-label-sm text-label-sm bg-tertiary-fixed text-on-tertiary-fixed px-3 py-1 rounded-sm hover-glow transition-all font-bold">#{{ strtoupper($tag) }}</a>
                @endforeach
            </div>
        @endif

        <!-- Dynamic Relevant Projects Below Content -->
        <div class="pt-12 border-t border-outline-variant/30 mt-12" data-aos="fade-up">
            <h3 class="font-headline-md text-headline-md text-on-surface mb-6 uppercase tracking-wider font-bold">Relevant Projects</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($relevantProjects as $proj)
                    <a href="{{ route('front.project.detail', $proj->slug) }}" class="group block bg-surface-container-low hover:bg-surface-container border border-outline-variant/30 hover:border-secondary transition-all rounded-xl p-4 hover-glow flex flex-col justify-between h-full">
                        <div>
                            @if($proj->featured_image)
                                <div class="aspect-video overflow-hidden rounded-lg mb-4 bg-surface-container">
                                    <img src="{{ $proj->featured_image_url }}" alt="{{ $proj->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                </div>
                            @endif
                            <span class="text-[9px] font-label-sm text-secondary uppercase font-bold tracking-widest">{{ $proj->type }}</span>
                            <h4 class="font-body-md font-bold text-on-surface mt-1 group-hover:text-secondary transition-colors line-clamp-2 leading-snug">{{ $proj->title }}</h4>
                        </div>
                        <div class="flex items-center gap-1 text-[10px] text-secondary font-bold uppercase tracking-wider mt-4">
                            <span>View Project</span>
                            <span class="material-symbols-outlined text-xs group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </div>
                    </a>
                @empty
                    <p class="text-xs text-on-surface-variant col-span-3">No active projects found.</p>
                @endforelse
            </div>
        </div>
    </article>

    <!-- Right Sidebar (Recent Articles & CTA) -->
    <aside class="lg:col-span-3 space-y-12" data-aos="fade-left" data-aos-delay="200">
        <!-- Ready to Deploy? Styled CTA Card -->
        <div class="bg-inverse-surface p-8 text-inverse-on-surface notch-tl-br relative overflow-hidden group hover-glow transition-all shadow-md">
            <div class="absolute -right-8 -top-8 w-32 h-32 bg-secondary opacity-20 rounded-full group-hover:scale-110 transition-transform"></div>
            <h3 class="font-headline-md text-headline-md mb-4 uppercase tracking-tight font-bold">Ready to Deploy?</h3>
            <p class="font-body-md opacity-80 mb-8 text-sm">Experience the next leap in automation with our enterprise-grade AI frameworks.</p>
            <a href="{{ route('front.contact') }}" class="notch-button block text-center w-full py-4 bg-secondary text-white font-bold text-label-sm uppercase tracking-widest hover:bg-on-secondary-fixed-variant transition-all hover-glow">
                Consult Our Experts
            </a>
        </div>

        <!-- Recent Articles -->
        <div>
            <h4 class="font-label-sm text-label-sm text-outline mb-6 uppercase tracking-[0.2em] font-bold">Recent Insights</h4>
            <div class="space-y-4">
                @forelse($recentArticles as $art)
                    @php
                        $artCat = is_array($art->categories) && count($art->categories) > 0 ? $art->categories[0] : 'Insight';
                    @endphp
                    <a class="flex gap-4 p-3 bg-surface-container-low border border-outline-variant/20 hover:border-secondary transition-all rounded-lg group hover-glow shadow-sm" 
                       href="{{ route('front.blog.detail', $art->slug) }}">
                        @if($art->main_image)
                            <img src="{{ $art->main_image_url }}" class="w-16 h-12 object-cover rounded-lg border border-outline-variant/30 flex-shrink-0">
                        @else
                            <div class="w-16 h-12 rounded-lg bg-surface-variant flex items-center justify-center text-outline-variant flex-shrink-0">
                                <span class="material-symbols-outlined text-sm">article</span>
                            </div>
                        @endif
                        <div>
                            <span class="text-[8px] font-label-sm text-secondary uppercase font-bold tracking-widest block">{{ $artCat }}</span>
                            <h5 class="font-body-sm group-hover:text-secondary transition-colors text-xs font-bold text-on-surface line-clamp-2 mt-0.5 leading-snug">{{ $art->title }}</h5>
                        </div>
                    </a>
                @empty
                    <p class="text-xs text-on-surface-variant">No other articles published.</p>
                @endforelse
            </div>
        </div>
    </aside>
</main>

<!-- Bottom: Similar Category Blogs -->
@if(count($similarBlogs) > 0)
    <section class="mx-margin-desktop my-24 border-t border-outline-variant/30 pt-16">
        <h3 class="font-headline-lg text-headline-lg mb-12 text-on-surface font-bold">Similar Insights You Might Like</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
            @foreach($similarBlogs as $sim)
                @php
                    $simCat = is_array($sim->categories) && count($sim->categories) > 0 ? $sim->categories[0] : 'Insights';
                @endphp
                <article class="group cursor-pointer hover-glow p-4 rounded-xl border border-outline-variant/20 hover:border-secondary transition-all bg-surface flex flex-col justify-between" 
                          onclick="window.location='{{ route('front.blog.detail', $sim->slug) }}'">
                    <div>
                        <div class="aspect-[16/10] overflow-hidden angled-notch mb-6 bg-surface-container-low">
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $sim->main_image_url ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuAi96HfzQ4NktrS45oP6jT1yAxMv85Pj8pFVUEbgjOVuA01513DpCDybVvT6ks7YpVyZaARXVFMe8coxshAW19ktsUlgbF8ix3opYZpGYe3YeTf9ToDVGg1_uytap7vREbckgFx19vYT5W4sgTJeqpk5gFz1CAF-C6WkD0KwbdlKYD28GHYe_csnZb17TEcgWk2ZE8Uw6zbT5jRJEzIf0gbL87Ct60MWj2AWEYTCyVC0wci7uUTLpjwgyD8YxzYXMpK0ACr675eQ4g' }}" alt="{{ $sim->title }}"/>
                        </div>
                        <span class="bg-tertiary-fixed text-on-tertiary-fixed-variant px-2 py-0.5 font-label-sm text-[10px] rounded uppercase font-bold">{{ $simCat }}</span>
                        <h4 class="font-headline-md text-headline-md text-on-surface group-hover:text-secondary transition-colors mt-3 font-bold">{{ $sim->title }}</h4>
                        <p class="text-sm text-on-surface-variant mt-2 line-clamp-2">{{ $sim->summary }}</p>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <span class="text-xs font-label-sm text-outline font-bold uppercase">{{ $sim->created_at->format('M d, Y') }}</span>
                        <span class="material-symbols-outlined text-secondary opacity-0 group-hover:opacity-100 transition-opacity">arrow_outward</span>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endif
@endsection

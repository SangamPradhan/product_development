@extends('front.layouts.app')

@section('title', 'Blogs | AI-Solutions')



@section('content')
<div class="pt-32 pb-section-gap px-margin-mobile md:px-margin-desktop max-w-7xl mx-auto">
    <!-- Hero Header & Search Bar -->
    <header class="mb-16 flex flex-col md:flex-row md:items-end justify-between gap-8" data-aos="fade-up">
        <div class="max-w-2xl">
            <div class="inline-block px-3 py-1 bg-secondary-container text-on-secondary-container font-label-sm text-label-sm mb-6 uppercase tracking-widest hover-glow cursor-default font-bold">Insights &amp; Intelligence</div>
            <h1 class="text-headline-lg-mobile md:text-display-lg font-display-lg text-on-background mb-4">Architecting the future through precise AI automation.</h1>
            <p class="text-body-lg font-body-lg text-on-surface-variant">Stay updated with the latest trends in neural networking, autonomous enterprise workflows, and the evolution of machine learning precision.</p>
        </div>
        
        <!-- Search bar -->
        <form action="{{ route('front.blogs') }}" method="GET" class="w-full md:w-80 flex gap-2">
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if(request('tag'))
                <input type="hidden" name="tag" value="{{ request('tag') }}">
            @endif
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search articles..." 
                   class="flex-grow bg-surface border border-outline-variant px-4 py-3 font-body-md focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all rounded-lg text-sm">
            <button type="submit" class="notch-button bg-secondary text-white px-6 py-3 font-label-sm text-sm uppercase font-bold tracking-wider">Search</button>
        </form>
    </header>

    <!-- Filters & active states -->
    @if(request('category') || request('tag') || request('search'))
        <div class="flex items-center gap-3 mb-8 font-label-sm text-xs">
            <span class="text-on-surface-variant">Active filters:</span>
            @if(request('category'))
                <span class="px-3 py-1 bg-secondary-container text-on-secondary-container rounded-full">Category: {{ request('category') }}</span>
            @endif
            @if(request('tag'))
                <span class="px-3 py-1 bg-secondary-container text-on-secondary-container rounded-full">Tag: {{ request('tag') }}</span>
            @endif
            @if(request('search'))
                <span class="px-3 py-1 bg-secondary-container text-on-secondary-container rounded-full">Search: "{{ request('search') }}"</span>
            @endif
            <a href="{{ route('front.blogs') }}" class="text-error underline hover:text-error/80">Clear filters</a>
        </div>
    @endif

    <!-- Featured Post - Bento Layout Integration -->
    @if($blogs->currentPage() === 1 && $blogs->count() > 0 && !request('search') && !request('category') && !request('tag'))
        @php
            $featured = $blogs->first();
            $featuredCat = is_array($featured->categories) && count($featured->categories) > 0 ? $featured->categories[0] : 'Insights';
            $featuredImg = $featured->main_image_url ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuBnr9b6aGtsgifoU1pFjdYkvGCYhYKns3yJzUSh1Bs2DyrCNZ3ozycpgMiyAr_Pzy2ARjhKD8WoG-eM7AYGGBJX5nG_UpXwi7uSEprZKMZkxi0ZhJqiuK-mQCrueKqLSlPMMukWtViiPrBYiRkjRxOuql3GIbGPQLfWrXNEbD7myKt5A0qU824GUqM86T95uF_p5fS3GSvinmnG-_3BSbnNYpX-uFxLv79Gavz1QZcdqPY1rpFu2ZUYvNCBo-l_jHwc43jb3ibVd-A';
        @endphp
        <section class="grid grid-cols-1 md:grid-cols-12 gap-gutter mb-24">
            <a href="{{ route('front.blog.detail', $featured->slug) }}" class="md:col-span-8 group relative overflow-hidden angled-notch bg-surface-container-low border border-outline-variant transition-all hover:border-secondary block hover-glow" data-aos="fade-right">
                <div class="aspect-video relative overflow-hidden h-[380px]">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $featuredImg }}" alt="{{ $featured->title }}"/>
                    <div class="absolute top-6 left-6">
                        <span class="bg-surface/90 backdrop-blur-md text-secondary font-label-sm text-label-sm px-3 py-1 rounded-full border border-secondary/20 font-bold uppercase">{{ $featuredCat }}</span>
                    </div>
                </div>
                <div class="p-8">
                    <div class="flex gap-4 items-center mb-4">
                        <span class="text-label-sm font-label-sm text-on-tertiary-fixed-variant font-bold">LATEST INSIGHT</span>
                        <span class="text-outline-variant">•</span>
                        <span class="text-label-sm font-label-sm text-on-tertiary-fixed-variant uppercase font-bold">{{ $featured->created_at->format('M d, Y') }}</span>
                    </div>
                    <h2 class="text-headline-lg font-headline-lg mb-4 text-on-surface group-hover:text-secondary transition-colors font-bold">{{ $featured->title }}</h2>
                    <p class="text-body-md font-body-md text-on-surface-variant mb-6 line-clamp-2">{{ $featured->summary }}</p>
                    <div class="flex items-center gap-2 text-secondary font-label-sm text-label-sm font-bold uppercase tracking-wider">
                        READ FULL CASE STUDY 
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </div>
                </div>
            </a>

            <div class="md:col-span-4 flex flex-col gap-gutter" data-aos="fade-left" data-aos-delay="100">
                <div class="flex-1 p-8 angled-notch bg-surface-container-low border border-outline-variant flex flex-col justify-center hover-glow transition-all">
                    <h3 class="text-headline-md font-headline-md mb-4 text-on-surface font-bold">Subscribe to Intelligence</h3>
                    <p class="text-body-md font-body-md text-on-surface-variant mb-6">Receive weekly deep-dives into automation engineering.</p>
                    <form onsubmit="event.preventDefault(); alert('Subscribed successfully!');" class="space-y-4">
                        <input class="w-full bg-white border border-outline-variant p-4 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md rounded-lg" placeholder="email@enterprise.com" type="email" required/>
                        <button type="submit" class="notch-button w-full bg-secondary text-white py-4 font-label-sm text-label-sm uppercase tracking-widest hover:bg-on-secondary-fixed-variant transition-all hover-glow font-bold">Join The Network</button>
                    </form>
                </div>
                <div class="flex-1 p-8 angled-notch bg-secondary-container border border-secondary/20 flex flex-col justify-between hover-glow transition-all">
                    <div>
                        <span class="material-symbols-outlined text-on-secondary-container mb-4 text-3xl">terminal</span>
                        <h4 class="text-headline-md font-headline-md text-on-secondary-container mb-2 font-bold">Developer Docs</h4>
                        <p class="text-body-md font-body-md text-on-secondary-container opacity-80">Explore our latest API updates for autonomous integration.</p>
                    </div>
                    <a class="text-on-secondary-container font-label-sm text-label-sm border-b border-on-secondary-container w-fit mt-4 font-bold" href="{{ route('front.contact') }}">CONTACT ENGINEERING</a>
                </div>
            </div>
        </section>
    @endif

    <!-- Article Grid -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-x-gutter gap-y-16">
        @php
            // Skip the first article if we are on page 1 and no active filters are set, since it was shown as featured.
            $articlesToDisplay = $blogs;
            if ($blogs->currentPage() === 1 && !request('search') && !request('category') && !request('tag')) {
                $articlesToDisplay = $blogs->skip(1);
            }
        @endphp

        @forelse($articlesToDisplay as $idx => $blog)
            @php
                $blogCat = is_array($blog->categories) && count($blog->categories) > 0 ? $blog->categories[0] : 'Insights';
                $blogImg = $blog->main_image_url ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuAi96HfzQ4NktrS45oP6jT1yAxMv85Pj8pFVUEbgjOVuA01513DpCDybVvT6ks7YpVyZaARXVFMe8coxshAW19ktsUlgbF8ix3opYZpGYe3YeTf9ToDVGg1_uytap7vREbckgFx19vYT5W4sgTJeqpk5gFz1CAF-C6WkD0KwbdlKYD28GHYe_csnZb17TEcgWk2ZE8Uw6zbT5jRJEzIf0gbL87Ct60MWj2AWEYTCyVC0wci7uUTLpjwgyD8YxzYXMpK0ACr675eQ4g';
            @endphp
            <article class="group cursor-pointer hover-glow p-4 rounded-xl transition-all flex flex-col justify-between" 
                     onclick="window.location='{{ route('front.blog.detail', $blog->slug) }}'" 
                     data-aos="fade-up" data-aos-delay="{{ (($idx % 3) + 1) * 100 }}">
                <div>
                    <div class="aspect-[4/3] overflow-hidden angled-notch mb-6 bg-surface-container-low border border-outline-variant">
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $blogImg }}" alt="{{ $blog->title }}"/>
                    </div>
                    <div class="flex gap-2 mb-3">
                        <span class="bg-tertiary-fixed text-on-tertiary-fixed-variant px-2 py-0.5 font-label-sm text-label-sm rounded uppercase font-bold">{{ $blogCat }}</span>
                    </div>
                    <h3 class="text-headline-md font-headline-md text-on-surface mb-3 group-hover:text-secondary transition-colors font-bold">{{ $blog->title }}</h3>
                    <p class="text-body-md font-body-md text-on-surface-variant mb-4 line-clamp-3">{{ $blog->summary }}</p>
                </div>
                <div class="flex items-center justify-between mt-4">
                    <span class="text-label-sm font-label-sm text-outline font-bold uppercase">{{ $blog->created_at->format('M d, Y') }}</span>
                    <span class="material-symbols-outlined text-secondary opacity-0 group-hover:opacity-100 transition-opacity">arrow_outward</span>
                </div>
            </article>
        @empty
            <div class="md:col-span-3 p-16 text-center text-on-surface-variant font-label-sm uppercase bg-surface-container-low border border-outline border-dashed rounded-xl">
                No blog posts found matching those filters.
            </div>
        @endforelse
    </section>

    <!-- Pagination -->
    <div class="mt-24 font-label-sm">
        {{ $blogs->appends(request()->query())->links() }}
    </div>
</div>
@endsection

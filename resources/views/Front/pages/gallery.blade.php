@extends('front.layouts.app')

@section('title', 'Gallery | AI-Solutions')

@section('content')
<!-- Hero Section -->
<header class="pt-32 md:pt-[160px] pb-12 md:pb-section-gap px-6 md:px-margin-desktop text-center">
    <div class="max-w-4xl mx-auto" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary-container/30 border border-secondary/20 rounded-full mb-6 hover-glow cursor-default">
            <span class="material-symbols-outlined text-[16px] text-secondary">visibility</span>
            <span class="font-label-sm text-label-sm text-on-secondary-container uppercase">Vision in Action</span>
        </div>
        <h1 class="font-display-lg text-4-xl md:text-display-lg text-on-surface mb-6 md:mb-8 tracking-tight leading-tight font-bold">Precision in Perspective</h1>
        <p class="font-body-lg text-sm md:text-body-lg text-on-surface-variant max-w-2xl mx-auto">A visual narrative of our journey through technological innovation, architectural excellence, and a culture built on pure intelligence.</p>
    </div>
</header>

<main class="px-6 md:px-margin-desktop pb-16 md:pb-section-gap">
    <div class="grid grid-cols-12 gap-gutter">

        {{-- ── FEATURED ROW: Video (8 cols left) + Image (4 cols right) ── --}}
        @if($featuredVideo)
            <div class="col-span-12 md:col-span-8 group hover-glow transition-all cursor-pointer mb-6 md:mb-0" data-aos="fade-up"
                 onclick="openLightbox('{{ $featuredVideo->source === 'youtube' ? $featuredVideo->embed_url : $featuredVideo->file_url }}', '{{ $featuredVideo->source }}', 'video')">
                <div class="notched-card bg-surface-container-low border border-outline-variant overflow-hidden h-[300px] md:h-[500px] relative">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                         src="{{ $featuredVideo->thumbnail_url }}" alt="{{ $featuredVideo->title }}"/>
                    <div class="absolute inset-0 bg-black/35 flex items-center justify-center transition-all group-hover:bg-black/20">
                        <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-secondary text-white flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-3xl md:text-4xl" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 w-full p-4 md:p-8 bg-gradient-to-t from-black/90 via-black/40 to-transparent">
                        <span class="font-label-sm text-[10px] md:text-label-sm text-white/80 bg-white/10 backdrop-blur-md px-3 py-1 rounded-full border border-white/20 mb-3 md:mb-4 inline-block">FEATURED VIDEO</span>
                        <h3 class="font-headline-lg text-lg md:text-headline-lg text-white font-bold leading-tight">{{ $featuredVideo->title }}</h3>
                    </div>
                </div>
            </div>
        @endif

        @if($featuredImage)
            <div class="col-span-12 md:col-span-4 group hover-glow transition-all cursor-pointer mb-6 md:mb-0" data-aos="fade-up" data-aos-delay="100"
                 onclick="openLightbox('{{ $featuredImage->file_url }}', 'upload', 'image')">
                <div class="notched-card bg-surface-container-low border border-outline-variant overflow-hidden h-[300px] md:h-[500px] relative">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                         src="{{ $featuredImage->file_url }}" alt="{{ $featuredImage->title }}"/>
                    <div class="absolute inset-0 bg-black/20 flex items-center justify-center transition-all group-hover:bg-black/10">
                        <div class="w-12 h-12 md:w-16 md:h-16 rounded-full bg-white/20 backdrop-blur-md text-white flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300">
                            <span class="material-symbols-outlined text-2xl md:text-3xl">zoom_in</span>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 w-full p-4 md:p-8 bg-gradient-to-t from-black/90 via-black/40 to-transparent">
                        <span class="font-label-sm text-[10px] md:text-label-sm text-white/80 bg-white/10 backdrop-blur-md px-3 py-1 rounded-full border border-white/20 mb-3 md:mb-4 inline-block font-bold">FEATURED PHOTO</span>
                        <h3 class="font-headline-md text-base md:text-headline-md text-white font-bold leading-tight">{{ $featuredImage->title }}</h3>
                    </div>
                </div>
            </div>
        @endif

        {{-- ── CATEGORY FILTER CHIPS ── --}}
        <div class="col-span-12 flex gap-3 md:gap-4 py-6 md:py-8 overflow-x-auto w-full" data-aos="fade-up">
            <a href="{{ route('front.gallery') }}"
               class="px-5 md:px-6 py-2 rounded-full font-label-sm text-xs md:text-label-sm whitespace-nowrap font-bold {{ empty($category) ? 'bg-secondary text-white' : 'bg-surface-container-low border border-outline-variant text-on-surface-variant hover:border-secondary transition-all' }}">
                All Moments
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('front.gallery', ['category' => $cat]) }}"
                   class="px-5 md:px-6 py-2 rounded-full font-label-sm text-xs md:text-label-sm whitespace-nowrap uppercase font-bold {{ $category === $cat ? 'bg-secondary text-white' : 'bg-surface-container-low border border-outline-variant text-on-surface-variant hover:border-secondary transition-all' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        {{-- ── VIDEOS SECTION ── --}}
        <div class="col-span-12 mb-8 md:mb-12" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-6 md:mb-8">
                <span class="material-symbols-outlined text-secondary text-[24px] md:text-[28px]">play_circle</span>
                <h2 class="font-headline-lg text-xl md:text-headline-lg text-on-surface font-bold">Videos</h2>
                <div class="flex-1 h-px bg-outline-variant/50 ml-4"></div>
            </div>

            <div id="videos-grid" class="grid grid-cols-12 gap-gutter">
                @forelse($videos as $item)
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 group hover-glow transition-all cursor-pointer mb-6 md:mb-0"
                         onclick="openLightbox('{{ $item->source === 'youtube' ? $item->embed_url : $item->file_url }}', '{{ $item->source }}', 'video')">
                        <div class="notched-card bg-surface-container-low border border-outline-variant overflow-hidden h-[200px] md:h-[280px] relative">
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                 src="{{ $item->thumbnail_url }}" alt="{{ $item->title }}"/>
                            <div class="absolute inset-0 bg-black/30 flex items-center justify-center transition-all group-hover:bg-black/15">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-secondary text-white flex items-center justify-center shadow group-hover:scale-110 transition-transform duration-300">
                                    <span class="material-symbols-outlined text-xl md:text-2xl" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
                                </div>
                            </div>
                        </div>
                        <p class="font-label-sm text-xs text-secondary mt-3 md:mt-4 uppercase font-bold">{{ $item->category }}</p>
                        <h4 class="font-headline-md text-base md:text-headline-md text-on-surface font-bold leading-tight">{{ $item->title }}</h4>
                    </div>
                @empty
                    <div class="col-span-12 p-8 md:p-12 text-center text-on-surface-variant font-label-sm uppercase bg-surface-container-low border border-outline border-dashed rounded-xl">
                        No videos found.
                    </div>
                @endforelse
            </div>

            <div id="videos-pagination" class="mt-8 md:mt-10 flex items-center justify-center gap-2 font-label-sm">
                @include('Front.partials.pagination', ['items' => $videos, 'section' => 'videos'])
            </div>
        </div>

        {{-- ── DIVIDER ── --}}
        <div class="col-span-12 border-t border-outline-variant/30 my-4"></div>

        {{-- ── IMAGES SECTION ── --}}
        <div class="col-span-12" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-6 md:mb-8">
                <span class="material-symbols-outlined text-secondary text-[24px] md:text-[28px]">photo_library</span>
                <h2 class="font-headline-lg text-xl md:text-headline-lg text-on-surface font-bold">Photos</h2>
                <div class="flex-1 h-px bg-outline-variant/50 ml-4"></div>
            </div>

            <div id="images-grid" class="grid grid-cols-12 gap-gutter">
                @forelse($images as $item)
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 group hover-glow transition-all cursor-pointer mb-6 md:mb-0"
                         onclick="openLightbox('{{ $item->file_url }}', 'upload', 'image')">
                        <div class="notched-card bg-surface-container-low border border-outline-variant overflow-hidden h-[220px] md:h-[300px] relative">
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                 src="{{ $item->file_url }}" alt="{{ $item->title }}"/>
                            <div class="absolute inset-0 bg-secondary/0 group-hover:bg-secondary/10 flex items-center justify-center transition-all duration-300">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-white text-secondary opacity-0 group-hover:opacity-100 flex items-center justify-center shadow transition-opacity duration-300">
                                    <span class="material-symbols-outlined text-xl md:text-2xl">zoom_in</span>
                                </div>
                            </div>
                        </div>
                        <p class="font-label-sm text-xs text-secondary mt-3 md:mt-4 uppercase font-bold">{{ $item->category }}</p>
                        <h4 class="font-headline-md text-base md:text-headline-md text-on-surface font-bold leading-tight">{{ $item->title }}</h4>
                    </div>
                @empty
                    <div class="col-span-12 p-8 md:p-12 text-center text-on-surface-variant font-label-sm uppercase bg-surface-container-low border border-outline border-dashed rounded-xl">
                        No photos found.
                    </div>
                @endforelse
            </div>

            <div id="images-pagination" class="mt-8 md:mt-10 flex items-center justify-center gap-2 font-label-sm">
                @include('Front.partials.pagination', ['items' => $images, 'section' => 'images'])
            </div>
        </div>

    </div>
</main>

{{-- ── LIGHTBOX ── --}}
<div id="lightbox" class="lightbox-modal" onclick="closeLightbox()">
    <button class="absolute top-6 right-6 text-white text-4xl hover:scale-110 transition-transform">&times;</button>
    <div class="lightbox-content" onclick="event.stopPropagation()">
        <div id="lightbox-container" class="aspect-video w-full flex items-center justify-center"></div>
    </div>
</div>

<script>
function openLightbox(source, provider, type) {
    const container = document.getElementById('lightbox-container');
    container.innerHTML = '';

    if (type === 'video') {
        if (provider === 'youtube') {
            let id = '';
            if (source.includes('youtu.be/')) id = source.split('youtu.be/')[1].split(/[?#]/)[0];
            else if (source.includes('embed/')) id = source.split('embed/')[1].split(/[?#]/)[0];
            else if (source.includes('v=')) id = source.split('v=')[1].split('&')[0];
            else { try { const p = source.split('/'); id = p[p.length-1].split(/[?#]/)[0]; } catch(e){} }
            container.innerHTML = id
                ? `<iframe class="w-full h-full" src="https://www.youtube.com/embed/${id}?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`
                : `<p class="text-white text-center">Invalid YouTube URL</p>`;
        } else {
            container.innerHTML = `<video class="w-full h-full max-h-[80vh] rounded-lg" src="${source}" controls autoplay></video>`;
        }
    } else {
        container.innerHTML = `<img class="max-w-full max-h-[80vh] object-contain rounded-lg shadow-2xl" src="${source}" />`;
    }

    document.getElementById('lightbox').style.display = 'flex';
}

function closeLightbox() {
    document.getElementById('lightbox-container').innerHTML = '';
    document.getElementById('lightbox').style.display = 'none';
}

async function loadSection(section, page) {
    const params = new URLSearchParams({ section, page });
    const cat = '{{ $category ?? '' }}';
    if (cat) params.set('category', cat);

    const res = await fetch(`{{ route('front.gallery.section') }}?${params}`);
    const html = await res.text();
    const doc = new DOMParser().parseFromString(html, 'text/html');

    document.getElementById(`${section}-grid`).innerHTML = doc.getElementById(`${section}-grid`).innerHTML;
    document.getElementById(`${section}-pagination`).innerHTML = doc.getElementById(`${section}-pagination`).innerHTML;
    document.getElementById(`${section}-grid`).scrollIntoView({ behavior: 'smooth', block: 'start' });
}
</script>
@endsection
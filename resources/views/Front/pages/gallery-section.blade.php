{{-- Partial HTML fragment returned by gallerySection() for AJAX pagination --}}
@if($section === 'videos')
    <div id="videos-grid" class="grid grid-cols-12 gap-gutter">
        @forelse($items as $item)
            <div class="col-span-12 md:col-span-4 group hover-glow transition-all cursor-pointer"
                 onclick="openLightbox('{{ $item->source === 'youtube' ? $item->embed_url : $item->file_url }}', '{{ $item->source }}', 'video')">
                <div class="notched-card bg-surface-container-low border border-outline-variant overflow-hidden h-[280px] relative">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                         src="{{ $item->thumbnail_url }}" alt="{{ $item->title }}"/>
                    <div class="absolute inset-0 bg-black/30 flex items-center justify-center transition-all group-hover:bg-black/15">
                        <div class="w-12 h-12 rounded-full bg-secondary text-white flex items-center justify-center shadow group-hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-2xl" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
                        </div>
                    </div>
                </div>
                <p class="font-label-sm text-label-sm text-secondary mt-4 uppercase font-bold">{{ $item->category }}</p>
                <h4 class="font-headline-md text-headline-md text-on-surface font-bold">{{ $item->title }}</h4>
            </div>
        @empty
            <div class="col-span-12 p-12 text-center text-on-surface-variant font-label-sm uppercase bg-surface-container-low border border-outline border-dashed rounded-xl">
                No videos found.
            </div>
        @endforelse
    </div>

    <div id="videos-pagination" class="mt-10 flex items-center justify-center gap-2 font-label-sm">
        @include('Front.partials.pagination', ['items' => $items, 'section' => 'videos'])
    </div>
@else
    <div id="images-grid" class="grid grid-cols-12 gap-gutter">
        @forelse($items as $item)
            <div class="col-span-12 md:col-span-4 group hover-glow transition-all cursor-pointer"
                 onclick="openLightbox('{{ $item->file_url }}', 'upload', 'image')">
                <div class="notched-card bg-surface-container-low border border-outline-variant overflow-hidden h-[300px] relative">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                         src="{{ $item->file_url }}" alt="{{ $item->title }}"/>
                    <div class="absolute inset-0 bg-secondary/0 group-hover:bg-secondary/10 flex items-center justify-center transition-all duration-300">
                        <div class="w-12 h-12 rounded-full bg-white text-secondary opacity-0 group-hover:opacity-100 flex items-center justify-center shadow transition-opacity duration-300">
                            <span class="material-symbols-outlined text-2xl">zoom_in</span>
                        </div>
                    </div>
                </div>
                <p class="font-label-sm text-label-sm text-secondary mt-4 uppercase font-bold">{{ $item->category }}</p>
                <h4 class="font-headline-md text-headline-md text-on-surface font-bold">{{ $item->title }}</h4>
            </div>
        @empty
            <div class="col-span-12 p-12 text-center text-on-surface-variant font-label-sm uppercase bg-surface-container-low border border-outline border-dashed rounded-xl">
                No photos found.
            </div>
        @endforelse
    </div>

    <div id="images-pagination" class="mt-10 flex items-center justify-center gap-2 font-label-sm">
        @include('Front.partials.pagination', ['items' => $items, 'section' => 'images'])
    </div>
@endif

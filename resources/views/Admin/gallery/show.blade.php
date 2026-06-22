@extends('Admin.templates.show')

@section('show_title', $item->title)
@section('show_subtitle', 'Gallery Asset Configuration & Media Diagnostics')

@section('show_actions')
<a href="{{ route('admin.gallery.edit', $item->id) }}" class="bg-secondary-container text-on-secondary-container px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-secondary-container/80 transition-all active:scale-95 shadow-sm font-label-sm text-sm uppercase tracking-wider">
    <span class="material-symbols-outlined text-sm">edit</span>
    <span>Edit Item</span>
</a>
<form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" class="swal-delete-form" data-confirm-msg="Are you sure you want to remove this gallery item?">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-error-container text-error border border-error/20 px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-error-container/30 transition-all active:scale-95 font-label-sm text-sm uppercase tracking-wider">
        <span class="material-symbols-outlined text-sm">delete</span>
        <span>Delete Item</span>
    </button>
</form>
@endsection

@section('show_content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
    <!-- Main Content Details (Left) -->
    <div class="lg:col-span-8 space-y-6">
        <!-- Media Preview Box -->
        <div class="w-full rounded-xl overflow-hidden border border-outline shadow-inner bg-surface-container-low">
            @if($item->type === 'video')
                @if($item->source === 'youtube' && $item->embed_url)
                    @php
                        $youtube_id = '';
                        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $item->embed_url, $match)) {
                            $youtube_id = $match[1];
                        }
                    @endphp
                    @if($youtube_id)
                        <div class="aspect-video w-full">
                            <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $youtube_id }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    @else
                        <div class="p-6 text-center text-error">
                            <p>Invalid YouTube embed URL: {{ $item->embed_url }}</p>
                        </div>
                    @endif
                @elseif($item->source === 'upload' && $item->file_url)
                    <div class="w-full p-4">
                        <video class="w-full rounded-lg border border-outline" controls>
                            <source src="{{ $item->file_url }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @else
                    <div class="h-64 flex flex-col items-center justify-center text-on-surface-variant gap-2">
                        <span class="material-symbols-outlined text-4xl">videocam_off</span>
                        <span class="font-label-sm text-xs uppercase">No Video Source File</span>
                    </div>
                @endif
            @else
                <!-- Image Preview -->
                @if($item->file_url)
                    <div class="w-full flex items-center justify-center p-4">
                        <img src="{{ $item->file_url }}" alt="{{ $item->title }}" class="max-w-full h-auto rounded-lg max-h-[500px] object-contain">
                    </div>
                @else
                    <div class="h-64 flex flex-col items-center justify-center text-on-surface-variant gap-2">
                        <span class="material-symbols-outlined text-4xl">image_not_supported</span>
                        <span class="font-label-sm text-xs uppercase">No Image File Uploaded</span>
                    </div>
                @endif
            @endif
        </div>
    </div>

    <!-- Metadata Sidebar (Right) -->
    <div class="lg:col-span-4 space-y-6">
        <div class="bg-surface-container-low p-6 rounded-xl border border-outline space-y-6">
            <h3 class="font-bold text-on-surface border-b border-outline pb-3 font-label-sm uppercase tracking-wider flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">perm_media</span>
                Asset Parameters
            </h3>

            <!-- Featured Status -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1.5">Promotion status</span>
                @if($item->is_featured)
                    <span class="px-4 py-1.5 rounded-full text-xs font-label-sm bg-tertiary-fixed text-on-tertiary-fixed-variant border border-tertiary/20 font-bold uppercase tracking-wider">★ Featured Item</span>
                @else
                    <span class="px-4 py-1.5 rounded-full text-xs font-label-sm bg-surface-dim text-on-surface-variant border border-outline-variant/30 font-bold uppercase tracking-wider">Standard Item</span>
                @endif
            </div>

            <!-- Type -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Asset Type</span>
                <span class="px-2.5 py-1 rounded text-xs font-label-sm font-bold uppercase {{ $item->type === 'video' ? 'bg-tertiary-fixed text-on-tertiary-fixed-variant' : 'bg-surface-container text-on-surface-variant' }}">
                    {{ $item->type }}
                </span>
            </div>

            <!-- Source -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Storage / Feed Source</span>
                <p class="font-bold text-on-surface uppercase">{{ $item->source }}</p>
                @if($item->embed_url)
                    <p class="text-xs text-secondary mt-1 font-label-sm break-all">URL: {{ $item->embed_url }}</p>
                @endif
            </div>

            <!-- Category -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Category</span>
                <p class="font-bold text-on-surface">{{ $item->category }}</p>
            </div>

            <!-- Tags -->
            @if($item->tags)
                <div>
                    <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-2">Associated Tags</span>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach(explode(',', $item->tags) as $tag)
                            <span class="px-2.5 py-1 rounded bg-primary-container/10 border border-primary/20 text-primary font-label-sm text-xs uppercase">{{ trim($tag) }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- System Logs -->
            <div class="pt-4 border-t border-outline text-xs text-on-surface-variant space-y-1 font-label-sm">
                <p>Created: {{ $item->created_at->format('Y-m-d H:i') }}</p>
                <p>Updated: {{ $item->updated_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

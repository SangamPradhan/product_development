@extends('Admin.templates.show')

@section('show_title', $blog->title)
@section('show_subtitle', 'Blog Details & Neural Diagnostics')

@section('show_actions')
<a href="{{ route('admin.blogs.edit', $blog->id) }}" class="bg-secondary-container text-on-secondary-container px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-secondary-container/80 transition-all active:scale-95 shadow-sm font-label-sm text-sm uppercase tracking-wider">
    <span class="material-symbols-outlined text-sm">edit</span>
    <span>Edit Post</span>
</a>
<form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="swal-delete-form" data-confirm-msg="Are you sure you want to remove this blog post?">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-error-container text-error border border-error/20 px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-error-container/30 transition-all active:scale-95 font-label-sm text-sm uppercase tracking-wider">
        <span class="material-symbols-outlined text-sm">delete</span>
        <span>Delete Post</span>
    </button>
</form>
@endsection

@section('show_content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
    <!-- Main Content Details (Left) -->
    <div class="lg:col-span-8 space-y-6">
        <!-- Main Image -->
        @if($blog->main_image)
            <div class="w-full h-80 rounded-xl overflow-hidden border border-outline shadow-inner">
                <img src="{{ $blog->main_image_url }}" alt="{{ $blog->title }}" class="w-full h-full object-cover">
            </div>
        @else
            <div class="w-full h-48 rounded-xl bg-surface-container-low border border-outline flex flex-col items-center justify-center text-on-surface-variant gap-2">
                <span class="material-symbols-outlined text-4xl">image_not_supported</span>
                <span class="font-label-sm text-xs uppercase">No Featured Image Uploaded</span>
            </div>
        @endif

        <!-- Summary -->
        @if($blog->summary)
            <div class="bg-surface-container-low p-6 rounded-xl border border-outline">
                <h3 class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider mb-2">Summary Overview</h3>
                <p class="text-body-md text-on-surface italic font-medium">
                    "{{ $blog->summary }}"
                </p>
            </div>
        @endif

        <!-- Content -->
        <div class="prose prose-slate max-w-none text-on-surface leading-relaxed">
            <h3 class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider mb-4">Post Content</h3>
            <div class="p-6 rounded-xl border border-outline bg-surface">
                {!! $blog->content !!}
            </div>
        </div>

        <!-- Callout Banner if configured -->
        @if($blog->callout_title || !empty($blog->callout_items))
            <div class="border border-tertiary/20 bg-tertiary-fixed text-on-tertiary-fixed-variant p-6 rounded-xl space-y-3">
                @if($blog->callout_title)
                    <h4 class="font-bold text-lg flex items-center gap-2">
                        <span class="material-symbols-outlined">info</span>
                        {{ $blog->callout_title }}
                    </h4>
                @endif
                @if(!empty($blog->callout_items) && is_array($blog->callout_items))
                    <ul class="list-disc list-inside space-y-1 text-sm font-medium">
                        @foreach($blog->callout_items as $item)
                            <li>{{ is_string($item) ? $item : ($item['value'] ?? '') }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endif
    </div>

    <!-- Metadata Sidebar (Right) -->
    <div class="lg:col-span-4 space-y-6">
        <div class="bg-surface-container-low p-6 rounded-xl border border-outline space-y-6">
            <h3 class="font-bold text-on-surface border-b border-outline pb-3 font-label-sm uppercase tracking-wider flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">analytics</span>
                Metadata Info
            </h3>

            <!-- Status -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1.5">Status</span>
                @if($blog->status === 'Published')
                    <span class="px-4 py-1.5 rounded-full text-xs font-label-sm bg-secondary-container text-on-secondary-container border border-secondary/20 font-bold uppercase tracking-wider">Published</span>
                @else
                    <span class="px-4 py-1.5 rounded-full text-xs font-label-sm bg-surface-dim text-on-surface-variant border border-outline-variant/30 font-bold uppercase tracking-wider">Draft</span>
                @endif
            </div>

            <!-- Author -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Author</span>
                <p class="font-bold text-on-surface">{{ $blog->author }}</p>
            </div>

            <!-- Categories -->
            @if(is_array($blog->categories) && count($blog->categories) > 0)
                <div>
                    <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-2">Categories</span>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach($blog->categories as $cat)
                            <span class="px-2.5 py-1 rounded bg-surface border border-outline text-on-surface-variant font-label-sm text-xs uppercase">{{ $cat }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Tags -->
            @if(is_array($blog->tags) && count($blog->tags) > 0)
                <div>
                    <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-2">Tags</span>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach($blog->tags as $tag)
                            <span class="px-2.5 py-1 rounded bg-primary-container/10 border border-primary/20 text-primary font-label-sm text-xs uppercase">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- System Logs -->
            <div class="pt-4 border-t border-outline text-xs text-on-surface-variant space-y-1 font-label-sm">
                <p>Created: {{ $blog->created_at->format('Y-m-d H:i') }}</p>
                <p>Updated: {{ $blog->updated_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

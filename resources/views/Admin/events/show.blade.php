@extends('Admin.templates.show')

@section('show_title', $event->title)
@section('show_subtitle', 'Event Schedule & Capacity Diagnostics')

@section('show_actions')
<a href="{{ route('admin.events.edit', $event->id) }}" class="bg-secondary-container text-on-secondary-container px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-secondary-container/80 transition-all active:scale-95 shadow-sm font-label-sm text-sm uppercase tracking-wider">
    <span class="material-symbols-outlined text-sm">edit</span>
    <span>Edit Event</span>
</a>
<form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="swal-delete-form" data-confirm-msg="Are you sure you want to remove this event?">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-error-container text-error border border-error/20 px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-error-container/30 transition-all active:scale-95 font-label-sm text-sm uppercase tracking-wider">
        <span class="material-symbols-outlined text-sm">delete</span>
        <span>Delete Event</span>
    </button>
</form>
@endsection

@section('show_content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
    <!-- Main Content Details (Left) -->
    <div class="lg:col-span-8 space-y-6">
        <!-- Main Image -->
        @if($event->main_image)
            <div class="w-full h-80 rounded-xl overflow-hidden border border-outline shadow-inner">
                <img src="{{ $event->main_image_url }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
            </div>
        @else
            <div class="w-full h-48 rounded-xl bg-surface-container-low border border-outline flex flex-col items-center justify-center text-on-surface-variant gap-2">
                <span class="material-symbols-outlined text-4xl">calendar_today</span>
                <span class="font-label-sm text-xs uppercase">No Featured Image Uploaded</span>
            </div>
        @endif

        <!-- Description -->
        <div class="prose prose-slate max-w-none text-on-surface leading-relaxed">
            <h3 class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider mb-2">Event Description</h3>
            <div class="p-6 rounded-xl border border-outline bg-surface">
                {!! $event->description !!}
            </div>
        </div>

        <!-- Additional Images Gallery -->
        @if($event->images->count() > 0)
            <div class="space-y-3">
                <h3 class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider">Additional Media / Slides</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($event->images as $img)
                        <div class="h-48 rounded-lg overflow-hidden border border-outline shadow-sm bg-surface">
                            <img src="{{ asset('storage/events/' . $img->image_path) }}" alt="Event slide" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <!-- Metadata Sidebar (Right) -->
    <div class="lg:col-span-4 space-y-6">
        <div class="bg-surface-container-low p-6 rounded-xl border border-outline space-y-6">
            <h3 class="font-bold text-on-surface border-b border-outline pb-3 font-label-sm uppercase tracking-wider flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">schedule</span>
                Key Parameters
            </h3>

            <!-- Featured Status -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1.5">Promotion status</span>
                @if($event->is_featured)
                    <span class="px-4 py-1.5 rounded-full text-xs font-label-sm bg-tertiary-fixed text-on-tertiary-fixed-variant border border-tertiary/20 font-bold uppercase tracking-wider">★ Featured Event</span>
                @else
                    <span class="px-4 py-1.5 rounded-full text-xs font-label-sm bg-surface-dim text-on-surface-variant border border-outline-variant/30 font-bold uppercase tracking-wider">Standard Event</span>
                @endif
            </div>

            <!-- Event Category -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Category</span>
                <p class="font-bold text-on-surface">{{ $event->category }}</p>
            </div>

            <!-- Date and Time -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Date & Time</span>
                <p class="font-bold text-on-surface">{{ $event->event_date->format('l, F d, Y') }}</p>
                <p class="text-sm text-secondary font-label-sm mt-1">{{ $event->event_date->format('h:i A') }}</p>
            </div>

            <!-- Location -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Location Venue</span>
                <div class="flex items-start gap-1.5 mt-1 text-on-surface">
                    <span class="material-symbols-outlined text-primary text-lg shrink-0">location_on</span>
                    <div>
                        <p class="font-bold text-sm leading-tight">{{ $event->location }}</p>
                    </div>
                </div>
            </div>

            <!-- System Logs -->
            <div class="pt-4 border-t border-outline text-xs text-on-surface-variant space-y-1 font-label-sm">
                <p>Created: {{ $event->created_at->format('Y-m-d H:i') }}</p>
                <p>Updated: {{ $event->updated_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

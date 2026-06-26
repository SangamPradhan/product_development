<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Title -->
    <div>
        <label for="title" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Event Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $event->title ?? '') }}" required
               class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
    </div>

    <!-- Category -->
    <div>
        <label for="category" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Category</label>
        <input type="text" name="category" id="category" value="{{ old('category', $event->category ?? '') }}" required
               pattern="^[A-Za-z\s\-\&]+$" title="Only letters, spaces, hyphens, and ampersands are allowed"
               placeholder="e.g. Workshop, Conference, Webinar"
               class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Event Date -->
    <div>
        <label for="event_date" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Event Date & Time</label>
        <input type="datetime-local" name="event_date" id="event_date" 
               value="{{ old('event_date', isset($event) && $event->event_date ? $event->event_date->format('Y-m-d\TH:i') : '') }}" required
               class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
    </div>

    <!-- Location -->
    <div>
        <label for="location" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Location</label>
        <input type="text" name="location" id="location" value="{{ old('location', $event->location ?? '') }}" required
               placeholder="e.g. Virtual, Main Conference Hall, Office Center"
               class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
    </div>
</div>

<div class="grid grid-cols-1 gap-6">
    <!-- Featured Checkbox -->
    <div class="flex items-center gap-3">
        <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $event->is_featured ?? false) ? 'checked' : '' }}
               class="h-5 w-5 bg-surface-container-low border border-outline rounded text-primary focus:ring-primary">
        <label for="is_featured" class="font-label-sm text-xs text-on-surface-variant uppercase">Featured Event (Display at top of page)</label>
    </div>

    <!-- Description (Rich Text via Quill) -->
    <div>
        <label class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Description (Rich Text Editor)</label>
        <div class="quill-editor-container bg-surface-container-low border border-outline rounded-lg" data-placeholder="Write your event description here..." style="min-height: 250px;"></div>
        <input type="hidden" name="description" id="description" value="{{ old('description', $event->description ?? '') }}">
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Main Image -->
    <div>
        <label for="main_image" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Main Image (featured thumbnail)</label>
        <input type="file" name="main_image" id="main_image" accept="image/*"
               class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
        @if(isset($event) && $event->main_image)
            <div class="mt-3">
                <p class="text-xs text-on-surface-variant mb-1">Current main image:</p>
                <img src="{{ $event->main_image_url }}" class="w-32 h-20 object-cover rounded-lg border border-outline">
            </div>
        @endif
    </div>

    <!-- Additional Images -->
    <div>
        <label for="additional_images" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Additional Images (max 2, for details page carousel)</label>
        <input type="file" name="additional_images[]" id="additional_images" accept="image/*" multiple
               class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
        @if(isset($event) && $event->images->count() > 0)
            <div class="mt-3">
                <p class="text-xs text-on-surface-variant mb-1">Current additional images:</p>
                <div class="flex gap-2 flex-wrap">
                    @foreach($event->images as $img)
                        <img src="{{ $img->image_url }}" class="w-20 h-20 object-cover rounded-lg border border-outline">
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>

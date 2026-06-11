<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Title -->
    <div>
        <label for="title" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Service Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $service->title ?? '') }}" required
               class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
    </div>

    <!-- Icon -->
    <div>
        <label for="icon" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Material Icon Name</label>
        <input type="text" name="icon" id="icon" value="{{ old('icon', $service->icon ?? 'settings_suggest') }}" required
               class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm"
               placeholder="e.g. settings_suggest, neurology, database">
    </div>
</div>

<div class="grid grid-cols-1 gap-6">
    <!-- Short Description -->
    <div>
        <label for="short_description" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Short Description</label>
        <input type="text" name="short_description" id="short_description" value="{{ old('short_description', $service->short_description ?? '') }}" required
               class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm"
               placeholder="Brief, one-sentence summary for bento grid cards">
    </div>

    <!-- Status -->
    <div>
        <label for="status" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Status</label>
        <select name="status" id="status" required
                class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
            <option value="Active" {{ old('status', $service->status ?? '') === 'Active' ? 'selected' : '' }}>Active</option>
            <option value="Inactive" {{ old('status', $service->status ?? '') === 'Inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <!-- Description (Rich Text via Quill)-->
    <div>
        <label class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Description (Rich Text Editor)</label>
        <div class="quill-editor-container bg-surface-container-low border border-outline rounded-lg" data-placeholder="Write your service description here..." style="min-height: 250px;"></div>
        <input type="hidden" name="description" id="description" value="{{ old('description', $service->description ?? '') }}">
    </div>

    <!-- Features -->
    <div>
        <label for="features" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Service Features (one per line)</label>
        <textarea name="features" id="features" rows="4" placeholder="Feature 1&#10;Feature 2&#10;Feature 3"
                  class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">{{ old('features', $service->features ?? '') }}</textarea>
    </div>
</div>

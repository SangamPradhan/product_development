@php
    $type = $type ?? ($item->type ?? 'image');
@endphp

<input type="hidden" name="type" value="{{ $type }}">

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Title -->
    <div>
        <label for="title" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Item Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $item->title ?? '') }}" required
               class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
    </div>

    <!-- Category -->
    <div>
        <label for="category" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Category</label>
        <select name="category" id="category" required
                class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
            <option value="projects" {{ old('category', $item->category ?? '') === 'projects' ? 'selected' : '' }}>Projects</option>
            <option value="events" {{ old('category', $item->category ?? '') === 'events' ? 'selected' : '' }}>Events</option>
            <option value="office" {{ old('category', $item->category ?? '') === 'office' ? 'selected' : '' }}>Office Life</option>
            <option value="other" {{ old('category', $item->category ?? '') === 'other' ? 'selected' : '' }}>Other</option>
        </select>
    </div>
</div>

@if($type === 'image')
    <!-- Image specific fields -->
    <input type="hidden" name="source" value="upload">
    
    <div class="grid grid-cols-1 gap-6">
        <div>
            <label for="file_path" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Upload Image File</label>
            <input type="file" name="file_path" id="file_path" accept="image/*" {{ !isset($item) ? 'required' : '' }}
                   class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
            @if(isset($item) && $item->file_path)
                <div class="mt-3">
                    <p class="text-xs text-on-surface-variant mb-1">Current Image:</p>
                    <img src="{{ $item->file_url }}" class="w-48 h-32 object-cover rounded-lg border border-outline bg-secondary-container">
                </div>
            @endif
        </div>
    </div>
@else
    <!-- Video specific fields -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Source -->
        <div>
            <label for="source" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Video Source</label>
            <select name="source" id="source" required
                    class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
                <option value="upload" {{ old('source', $item->source ?? '') === 'upload' ? 'selected' : '' }}>Upload Video File</option>
                <option value="youtube" {{ old('source', $item->source ?? '') === 'youtube' ? 'selected' : '' }}>YouTube Direct URL</option>
            </select>
        </div>
    </div>

    <!-- Upload Field / Youtube Link Field toggled by Source Selection -->
    <div class="grid grid-cols-1 gap-6">
        <!-- File Path Upload -->
        <div id="upload-group">
            <label for="file_path" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Upload Video File</label>
            <input type="file" name="file_path" id="file_path" accept="video/*"
                   class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
            @if(isset($item) && $item->file_path && $item->source === 'upload')
                <div class="mt-3">
                    <p class="text-xs text-on-surface-variant mb-1">Current Video:</p>
                    <video src="{{ $item->file_url }}" class="w-48 h-32 object-cover rounded-lg border border-outline" controls></video>
                </div>
            @endif
        </div>

        <!-- Youtube Link -->
        <div id="youtube-group">
            <label for="embed_url" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">YouTube Video URL</label>
            <input type="text" name="embed_url" id="embed_url" value="{{ old('embed_url', $item->embed_url ?? '') }}"
                   placeholder="e.g. https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                   class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
        </div>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Tags -->
    <div>
        <label for="tags" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Tags (comma-separated)</label>
        <input type="text" name="tags" id="tags" value="{{ old('tags', $item->tags ?? '') }}"
               placeholder="e.g. workspace, conference, neuralcore"
               class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
    </div>

    <!-- Featured Checkbox -->
    <div class="flex items-center gap-3 pt-8">
        <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $item->is_featured ?? false) ? 'checked' : '' }}
               class="h-5 w-5 bg-surface-container-low border border-outline rounded text-primary focus:ring-primary">
        <label for="is_featured" class="font-label-sm text-xs text-on-surface-variant uppercase">Featured Item (Display in main header on front gallery)</label>
    </div>
</div>

@if($type === 'video')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sourceSelect = document.getElementById('source');
        const uploadGroup = document.getElementById('upload-group');
        const youtubeGroup = document.getElementById('youtube-group');

        function toggleInputs() {
            if (sourceSelect.value === 'youtube') {
                uploadGroup.style.display = 'none';
                youtubeGroup.style.display = 'block';
            } else {
                uploadGroup.style.display = 'block';
                youtubeGroup.style.display = 'none';
            }
        }

        sourceSelect.addEventListener('change', toggleInputs);
        toggleInputs();
    });
</script>
@endif

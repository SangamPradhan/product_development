<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Title -->
    <div>
        <label for="title" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Service Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $service->title ?? '') }}" required
               class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
    </div>

    <!-- Icon -->
    <div class="relative" id="icon-selector-container">
        <label for="icon" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Material Icon Name</label>
        <input type="hidden" name="icon" id="icon" value="{{ old('icon', $service->icon ?? 'settings_suggest') }}" required>
        
        <button type="button" id="icon-selector-btn" class="w-full flex items-center justify-between bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-primary" id="icon-selector-display">{{ old('icon', $service->icon ?? 'settings_suggest') }}</span>
                <span id="icon-selector-text">{{ old('icon', $service->icon ?? 'settings_suggest') }}</span>
            </div>
            <span class="material-symbols-outlined">expand_more</span>
        </button>

        <div id="icon-selector-menu" class="hidden absolute z-50 w-full mt-1 bg-surface border border-outline rounded-lg shadow-lg max-h-60 overflow-y-auto custom-scrollbar">
            <!-- JS will populate options here -->
        </div>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const icons = [
        'settings_suggest', 'neurology', 'database', 'memory', 'smart_toy', 'psychology',
        'hub', 'api', 'code', 'cloud', 'architecture', 'speed', 'analytics',
        'insights', 'security', 'shield', 'lock', 'visibility', 'language',
        'public', 'rocket_launch', 'lightbulb', 'science', 'biotech', 'terminal',
        'integration_instructions', 'data_exploration', 'query_stats', 'model_training',
        'troubleshoot', 'bug_report', 'verified', 'build', 'engineering',
        'dataset', 'developer_board', 'monitoring', 'business', 'schedule', 'article',
        'image', 'sell', 'subtitles', 'category', 'title', 'feed', 'short_text', 'toggle_on', 'badge'
    ].sort();

    const container = document.getElementById('icon-selector-container');
    const btn = document.getElementById('icon-selector-btn');
    const menu = document.getElementById('icon-selector-menu');
    const input = document.getElementById('icon');
    const display = document.getElementById('icon-selector-display');
    const text = document.getElementById('icon-selector-text');

    if (container && btn && menu && input) {
        icons.forEach(iconName => {
            const item = document.createElement('div');
            item.className = 'flex items-center gap-3 px-4 py-2 hover:bg-surface-container cursor-pointer transition-colors';
            item.innerHTML = `<span class="material-symbols-outlined text-primary">${iconName}</span> <span class="font-body-md text-sm">${iconName}</span>`;
            item.addEventListener('click', () => {
                input.value = iconName;
                display.textContent = iconName;
                text.textContent = iconName;
                menu.classList.add('hidden');
            });
            menu.appendChild(item);
        });

        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            menu.classList.toggle('hidden');
        });

        document.addEventListener('click', (e) => {
            if (!container.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    }
});
</script>

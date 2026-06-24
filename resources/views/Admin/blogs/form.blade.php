<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Title -->
    <div>
        <label for="title" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Blog Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $blog->title ?? '') }}" required
               class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
    </div>

    <!-- Author -->
    <div>
        <label for="author" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Author</label>
        <input type="text" name="author" id="author" value="{{ old('author', $blog->author ?? 'Admin') }}" required pattern="^[A-Za-z\s\-\.]+$" title="Only letters, spaces, hyphens and dots are allowed"
               class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Categories (Comma separated) -->
    <div>
        <label for="categories_string" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Categories (comma-separated)</label>
        <input type="text" name="categories_string" id="categories_string" 
               value="{{ old('categories_string', isset($blog) && is_array($blog->categories) ? implode(', ', $blog->categories) : '') }}" required
               placeholder="e.g. AI, Technology, NeuralSync"
               class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
    </div>

    <!-- Tags (Comma separated) -->
    <div>
        <label for="tags_string" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Tags (comma-separated)</label>
        <input type="text" name="tags_string" id="tags_string" 
               value="{{ old('tags_string', isset($blog) && is_array($blog->tags) ? implode(', ', $blog->tags) : '') }}"
               placeholder="e.g. Machine Learning, NLP, Future"
               class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Main Image -->
    <div>
        <label for="main_image" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Main Header Image</label>
        <input type="file" name="main_image" id="main_image" accept="image/*"
               class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
        @if(isset($blog) && $blog->main_image)
            <div class="mt-3">
                <p class="text-xs text-on-surface-variant mb-1">Current image:</p>
                <img src="{{ $blog->main_image_url }}" class="w-32 h-20 object-cover rounded-lg border border-outline">
            </div>
        @endif
    </div>

    <!-- Status -->
    <div>
        <label for="status" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Status</label>
        <select name="status" id="status" required
                class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
            <option value="Published" {{ old('status', $blog->status ?? '') === 'Published' ? 'selected' : '' }}>Published</option>
            <option value="Draft" {{ old('status', $blog->status ?? '') === 'Draft' ? 'selected' : '' }}>Draft</option>
        </select>
    </div>
</div>

<div class="grid grid-cols-1 gap-6">
    <!-- Summary -->
    <div>
        <label for="summary" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Short Summary</label>
        <textarea name="summary" id="summary" rows="2" 
                  class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">{{ old('summary', $blog->summary ?? '') }}</textarea>
    </div>

    <!-- Content (Rich Text via Quill) -->
    <div>
        <label class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Main Content (Rich Text Editor)</label>
        <div class="quill-editor-container bg-surface-container-low border border-outline rounded-lg" data-placeholder="Write your article content here..." style="min-height: 300px;"></div>
        <input type="hidden" name="content" id="content" value="{{ old('content', $blog->content ?? '') }}">
    </div>
</div>

<!-- Callout Section Builder -->
<div class="border border-outline-variant/50 rounded-xl p-6 bg-surface-container-low/50 mt-4">
    <div class="flex items-center gap-3 mb-6">
        <span class="material-symbols-outlined text-primary text-xl">featured_play_list</span>
        <div>
            <h3 class="font-label-sm text-xs text-on-surface uppercase font-bold">Key Principles Callout Box</h3>
            <p class="text-[10px] text-on-surface-variant">This creates a highlighted box with key points inside the blog article (optional)</p>
        </div>
    </div>

    <!-- Callout Title -->
    <div class="mb-4">
        <label for="callout_title" class="block font-label-sm text-xs text-on-surface-variant uppercase mb-2">Callout Section Title</label>
        <input type="text" name="callout_title" id="callout_title" 
               value="{{ old('callout_title', $blog->callout_title ?? '') }}"
               placeholder="e.g. Core Principles of Agency"
               class="w-full bg-surface-container-low border border-outline rounded-lg px-4 py-3 text-on-surface focus:outline-none focus:border-primary transition-all font-body-md text-sm">
    </div>

    <!-- Dynamic Key Points Repeater -->
    <div id="callout-items-container">
        <label class="block font-label-sm text-xs text-on-surface-variant uppercase mb-3">Key Points</label>
        <div id="callout-rows" class="space-y-3">
            <!-- JS will populate existing rows here -->
        </div>
        <button type="button" id="add-callout-row" 
                class="mt-4 flex items-center gap-2 px-4 py-2 border border-dashed border-primary/40 rounded-lg text-primary font-label-sm text-xs uppercase hover:bg-primary/5 transition-all">
            <span class="material-symbols-outlined text-sm">add_circle</span>
            Add Key Point
        </button>
    </div>

    <!-- Hidden input serialized by JS -->
    <input type="hidden" name="callout_items" id="callout_items_json" value="{{ old('callout_items', isset($blog) && is_array($blog->callout_items) ? json_encode($blog->callout_items) : '[]') }}">
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('callout-rows');
    const addBtn = document.getElementById('add-callout-row');
    const hiddenInput = document.getElementById('callout_items_json');

    let items = [];
    try {
        items = JSON.parse(hiddenInput.value || '[]');
    } catch(e) { items = []; }

    function renderRows() {
        container.innerHTML = '';
        items.forEach(function(item, idx) {
            const row = document.createElement('div');
            row.className = 'flex gap-3 items-start';
            row.innerHTML = `
                <input type="text" placeholder="Key (e.g. TOOL INTERACTION)" value="${escapeHtml(item.key || '')}"
                       class="flex-1 bg-white border border-outline rounded-lg px-3 py-2 text-on-surface font-body-md text-sm focus:border-primary focus:outline-none"
                       data-idx="${idx}" data-field="key">
                <input type="text" placeholder="Description (e.g. Ability to use APIs...)" value="${escapeHtml(item.value || '')}"
                       class="flex-[2] bg-white border border-outline rounded-lg px-3 py-2 text-on-surface font-body-md text-sm focus:border-primary focus:outline-none"
                       data-idx="${idx}" data-field="value">
                <button type="button" onclick="removeCalloutRow(${idx})" class="p-2 text-error hover:bg-error-container/20 rounded-lg transition-colors flex-shrink-0">
                    <span class="material-symbols-outlined text-sm">close</span>
                </button>
            `;
            container.appendChild(row);
        });
        syncHiddenInput();
    }

    function syncHiddenInput() {
        hiddenInput.value = JSON.stringify(items);
    }

    function escapeHtml(text) {
        var div = document.createElement('div');
        div.appendChild(document.createTextNode(text));
        return div.innerHTML.replace(/"/g, '&quot;');
    }

    addBtn.addEventListener('click', function() {
        items.push({ key: '', value: '' });
        renderRows();
    });

    container.addEventListener('input', function(e) {
        if (e.target.dataset.idx !== undefined) {
            items[parseInt(e.target.dataset.idx)][e.target.dataset.field] = e.target.value;
            syncHiddenInput();
        }
    });

    window.removeCalloutRow = function(idx) {
        items.splice(idx, 1);
        renderRows();
    };

    // Initial render
    renderRows();
});
</script>

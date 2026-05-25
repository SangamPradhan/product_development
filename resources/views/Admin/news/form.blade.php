<div class="space-y-6 font-label-sm">
    <!-- Title -->
    <div class="space-y-2">
        <label class="flex items-center gap-2 text-on-surface-variant" for="title">
            <span class="text-sm material-symbols-outlined">title</span>
            BLOG TITLE
        </label>
        <input
            class="bg-surface-container-low px-4 border border-outline focus:border-primary rounded-lg outline-none placeholder:text-outline-variant focus:ring-1 focus:ring-primary w-full h-12 font-label-sm text-on-surface transition-all"
            id="title" name="title" value="{{ old('title', $blog->title ?? '') }}"
            placeholder="NeuralCore Alpha: Deep Learning optimization cluster..." type="text" required />
    </div>

    <div class="gap-6 grid grid-cols-1 md:grid-cols-2">
        <!-- Author -->
        <div class="space-y-2">
            <label class="flex items-center gap-2 text-on-surface-variant" for="author">
                <span class="text-sm material-symbols-outlined">badge</span>
                AUTHOR NAME
            </label>
            <input
                class="bg-surface-container-low px-4 border border-outline focus:border-primary rounded-lg outline-none placeholder:text-outline-variant focus:ring-1 focus:ring-primary w-full h-12 font-label-sm text-on-surface transition-all"
                id="author" name="author" value="{{ old('author', $blog->author ?? 'Admin Intelligence') }}"
                placeholder="Dr. Elizabeth Shaw" type="text" required />
        </div>

        <!-- Status -->
        <div class="space-y-2">
            <label class="flex items-center gap-2 text-on-surface-variant" for="status">
                <span class="text-sm material-symbols-outlined">toggle_on</span>
                PUBLISHING STATUS
            </label>
            <select
                class="bg-surface-container-low px-4 border border-outline focus:border-primary rounded-lg outline-none focus:ring-1 focus:ring-primary w-full h-12 font-label-sm text-on-surface transition-all"
                id="status" name="status">
                <option value="Active" {{ old('status', $blog->status ?? '') == 'Active' ? 'selected' : '' }}>Active /
                    Published</option>
                <option value="In Progress" {{ old('status', $blog->status ?? '') == 'In Progress' ? 'selected' : '' }}>
                    In Progress / Draft</option>
                <option value="Paused" {{ old('status', $blog->status ?? '') == 'Paused' ? 'selected' : '' }}>Paused /
                    Archived</option>
            </select>
        </div>
    </div>

    <!-- Excerpt / Short Description -->
    <div class="space-y-2">
        <label class="flex items-center gap-2 text-on-surface-variant" for="description">
            <span class="text-sm material-symbols-outlined">short_text</span>
            SHORT EXCERPT
        </label>
        <input
            class="bg-surface-container-low px-4 border border-outline focus:border-primary rounded-lg outline-none placeholder:text-outline-variant focus:ring-1 focus:ring-primary w-full h-12 font-label-sm text-on-surface transition-all"
            id="description" name="description" value="{{ old('description', $blog->description ?? '') }}"
            placeholder="Brief, high-impact summary for index listings..." type="text" />
    </div>

    <!-- Content / Article body -->
    <div class="space-y-2 font-body-md">
        <label class="flex items-center gap-2 font-label-sm text-on-surface-variant" for="content">
            <span class="text-sm material-symbols-outlined">feed</span>
            ARTICLE BODY
        </label>
        <textarea
            class="bg-surface-container-low p-4 border border-outline focus:border-primary rounded-lg outline-none placeholder:text-outline-variant focus:ring-1 focus:ring-primary w-full min-h-[250px] text-on-surface transition-all"
            id="content" name="content" placeholder="Draft your enterprise intelligence analysis here..." required>{{ old('content', $blog->content ?? '') }}</textarea>
    </div>
</div>

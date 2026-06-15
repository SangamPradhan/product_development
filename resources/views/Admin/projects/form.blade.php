@php
    $project = $item ?? null;
@endphp

<div class="space-y-10 font-label-sm">
    <!-- SECTION 1: PROJECT OVERVIEW -->
    <div>
        <h2 class="text-lg font-bold text-primary mb-4 flex items-center gap-2 border-b border-outline pb-2">
            <span class="material-symbols-outlined">dataset</span>
            1. Project Overview
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Title -->
            <div class="space-y-2 md:col-span-2">
                <label class="text-on-surface-variant flex items-center gap-2" for="title">
                    <span class="material-symbols-outlined text-sm">title</span>
                    PROJECT TITLE
                </label>
                <input class="w-full h-12 px-4 bg-surface-container-low border border-outline rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all outline-none text-on-surface placeholder:text-outline-variant font-label-sm" 
                       id="title" name="title" value="{{ old('title', $project->title ?? '') }}" placeholder="NeuralSync: Predictive Supply Chain..." type="text" required/>
            </div>
            
            <!-- Type -->
            <div class="space-y-2">
                <label class="text-on-surface-variant flex items-center gap-2" for="type">
                    <span class="material-symbols-outlined text-sm">category</span>
                    PROJECT TYPE
                </label>
                <select class="w-full h-12 px-4 bg-surface-container-low border border-outline rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all outline-none text-on-surface font-label-sm" 
                        id="type" name="type">
                    <option value="">Select Type...</option>
                    <option value="Case Study" {{ old('type', $project->type ?? '') == 'Case Study' ? 'selected' : '' }}>Case Study</option>
                    <option value="Research" {{ old('type', $project->type ?? '') == 'Research' ? 'selected' : '' }}>Research</option>
                    <option value="Product" {{ old('type', $project->type ?? '') == 'Product' ? 'selected' : '' }}>Product</option>
                    <option value="Consulting" {{ old('type', $project->type ?? '') == 'Consulting' ? 'selected' : '' }}>Consulting</option>
                </select>
            </div>
            
            <!-- Status -->
            <div class="space-y-2">
                <label class="text-on-surface-variant flex items-center gap-2" for="status">
                    <span class="material-symbols-outlined text-sm">toggle_on</span>
                    STATUS
                </label>
                <select class="w-full h-12 px-4 bg-surface-container-low border border-outline rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all outline-none text-on-surface font-label-sm" 
                        id="status" name="status">
                    <option value="Active" {{ old('status', $project->status ?? '') == 'Active' ? 'selected' : '' }}>Active / Live</option>
                    <option value="In Progress" {{ old('status', $project->status ?? '') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Completed" {{ old('status', $project->status ?? '') == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            
            <!-- Subtitle -->
            <div class="space-y-2 md:col-span-2">
                <label class="text-on-surface-variant flex items-center gap-2" for="subtitle">
                    <span class="material-symbols-outlined text-sm">subtitles</span>
                    SUBTITLE
                </label>
                <input class="w-full h-12 px-4 bg-surface-container-low border border-outline rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all outline-none text-on-surface placeholder:text-outline-variant font-label-sm" 
                       id="subtitle" name="subtitle" value="{{ old('subtitle', $project->subtitle ?? '') }}" placeholder="How we leveraged deep learning architectures..." type="text" required/>
            </div>
            
            <!-- Tags -->
            <div class="space-y-2">
                <label class="text-on-surface-variant flex items-center gap-2" for="tags">
                    <span class="material-symbols-outlined text-sm">sell</span>
                    TAGS (Comma separated)
                </label>
                <input class="w-full h-12 px-4 bg-surface-container-low border border-outline rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all outline-none text-on-surface placeholder:text-outline-variant font-label-sm" 
                       id="tags" name="tags" value="{{ old('tags', $project->tags ?? '') }}" placeholder="FINTECH, SECURITY" type="text"/>
            </div>
            
            <!-- Featured Toggle -->
            <div class="space-y-2 flex flex-col justify-end">
                <label class="flex items-center gap-3 p-3 bg-surface-container-low border border-outline rounded-lg cursor-pointer hover:bg-surface-variant/30 transition-colors">
                    <input type="checkbox" name="is_featured" value="1" class="w-5 h-5 rounded border-outline text-primary focus:ring-primary" {{ old('is_featured', $project->is_featured ?? false) ? 'checked' : '' }}>
                    <span class="text-on-surface font-bold">Featured Project (Show on Landing Page)</span>
                </label>
            </div>
            
            <!-- Short Description -->
            <div class="space-y-2 md:col-span-2">
                <label class="text-on-surface-variant flex items-center gap-2" for="description">
                    <span class="material-symbols-outlined text-sm">short_text</span>
                    SHORT DESCRIPTION (For lists/cards)
                </label>
                <textarea class="w-full min-h-[100px] p-4 bg-surface-container-low border border-outline rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all outline-none text-on-surface placeholder:text-outline-variant" 
                          id="description" name="description" placeholder="Brief summary...">{{ old('description', $project->description ?? '') }}</textarea>
            </div>
            
            <!-- Featured Image -->
            <div class="space-y-2 md:col-span-2">
                <label class="text-on-surface-variant flex items-center gap-2" for="featured_image">
                    <span class="material-symbols-outlined text-sm">image</span>
                    FEATURED IMAGE
                </label>
                <input type="file" name="featured_image" id="featured_image" class="block w-full text-sm text-on-surface-variant file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary-container file:text-on-primary-container hover:file:bg-primary-container/80 transition-all"/>
                @if(isset($project) && $project->featured_image)
                    <div class="mt-4 border border-outline rounded-xl p-2 bg-surface-container inline-block">
                        <img src="{{ $project->featured_image_url }}" alt="Current Image" class="h-32 rounded-lg object-cover">
                        <p class="text-xs text-on-surface-variant mt-2 text-center">Current Image</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- SECTION 2: PROJECT DETAILS -->
    <div>
        <h2 class="text-lg font-bold text-primary mb-4 flex items-center gap-2 border-b border-outline pb-2">
            <span class="material-symbols-outlined">info</span>
            2. Project Details
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Client -->
            <div class="space-y-2">
                <label class="text-on-surface-variant flex items-center gap-2" for="client">
                    <span class="material-symbols-outlined text-sm">business</span>
                    CLIENT NAME
                </label>
                <input class="w-full h-12 px-4 bg-surface-container-low border border-outline rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all outline-none text-on-surface placeholder:text-outline-variant font-label-sm" 
                       id="client" name="client" value="{{ old('client', $project->client ?? '') }}" placeholder="GlobalLogistics Corp" type="text"/>
            </div>
            
            <!-- Duration -->
            <div class="space-y-2">
                <label class="text-on-surface-variant flex items-center gap-2" for="duration">
                    <span class="material-symbols-outlined text-sm">schedule</span>
                    DURATION
                </label>
                <input class="w-full h-12 px-4 bg-surface-container-low border border-outline rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all outline-none text-on-surface placeholder:text-outline-variant font-label-sm" 
                       id="duration" name="duration" value="{{ old('duration', $project->duration ?? '') }}" placeholder="8 Months Execution" type="text"/>
            </div>
            
            <!-- Technologies -->
            <div class="space-y-2 md:col-span-2">
                <label class="text-on-surface-variant flex items-center gap-2" for="technologies">
                    <span class="material-symbols-outlined text-sm">code</span>
                    TECHNOLOGIES (Comma separated)
                </label>
                <input class="w-full h-12 px-4 bg-surface-container-low border border-outline rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all outline-none text-on-surface placeholder:text-outline-variant font-label-sm" 
                       id="technologies" name="technologies" value="{{ old('technologies', $project->technologies ?? '') }}" placeholder="PyTorch, Kubernetes, Kafka" type="text"/>
            </div>
            
            <!-- Overview (Rich Text via Quill) -->
            <div class="space-y-2 md:col-span-2">
                <label class="text-on-surface-variant flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">article</span>
                    DETAILED OVERVIEW (Rich Text Editor)
                </label>
                <div class="quill-editor-container bg-surface-container-low border border-outline rounded-lg" data-placeholder="Write detailed project overview..." style="min-height: 250px;"></div>
                <input type="hidden" name="overview" id="overview" value="{{ old('overview', $project->overview ?? '') }}">
            </div>
        </div>
    </div>

    <!-- SECTION 3: KEY RESULTS (3 Items) -->
    <div>
        <h2 class="text-lg font-bold text-primary mb-4 flex items-center gap-2 border-b border-outline pb-2">
            <span class="material-symbols-outlined">monitoring</span>
            3. Key Results
        </h2>
        
        <div class="space-y-8 bg-surface-container-low p-6 rounded-xl border border-outline">
            <!-- Result 1 -->
            <div class="border-b border-outline pb-6">
                <h3 class="font-bold mb-4 flex items-center gap-2"><span class="bg-primary text-white w-6 h-6 rounded-full inline-flex items-center justify-center text-xs">1</span> Primary Metric</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-on-surface-variant text-xs" for="result_1_value">LARGE VALUE</label>
                        <input class="w-full h-10 px-3 bg-surface border border-outline rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all outline-none" 
                               id="result_1_value" name="result_1_value" value="{{ old('result_1_value', $project->result_1_value ?? '') }}" placeholder="42%" type="text"/>
                    </div>
                    <div class="space-y-2">
                        <label class="text-on-surface-variant text-xs" for="result_1_title">TITLE</label>
                        <input class="w-full h-10 px-3 bg-surface border border-outline rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all outline-none" 
                               id="result_1_title" name="result_1_title" value="{{ old('result_1_title', $project->result_1_title ?? '') }}" placeholder="Reduction in System Latency" type="text"/>
                    </div>
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-on-surface-variant text-xs" for="result_1_description">DESCRIPTION</label>
                        <textarea class="w-full min-h-[60px] p-3 bg-surface border border-outline rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all outline-none" 
                                  id="result_1_description" name="result_1_description" placeholder="We optimized the real-time processing...">{{ old('result_1_description', $project->result_1_description ?? '') }}</textarea>
                    </div>
                </div>
            </div>
            
            <!-- Result 2 -->
            <div class="border-b border-outline pb-6">
                <h3 class="font-bold mb-4 flex items-center gap-2"><span class="bg-primary text-white w-6 h-6 rounded-full inline-flex items-center justify-center text-xs">2</span> Secondary Metric</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-on-surface-variant text-xs" for="result_2_value">LARGE VALUE</label>
                        <input class="w-full h-10 px-3 bg-surface border border-outline rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all outline-none" 
                               id="result_2_value" name="result_2_value" value="{{ old('result_2_value', $project->result_2_value ?? '') }}" placeholder="$14M" type="text"/>
                    </div>
                    <div class="space-y-2">
                        <label class="text-on-surface-variant text-xs" for="result_2_label">LABEL</label>
                        <input class="w-full h-10 px-3 bg-surface border border-outline rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all outline-none" 
                               id="result_2_label" name="result_2_label" value="{{ old('result_2_label', $project->result_2_label ?? '') }}" placeholder="Quarterly Savings" type="text"/>
                    </div>
                </div>
            </div>
            
            <!-- Result 3 -->
            <div>
                <h3 class="font-bold mb-4 flex items-center gap-2"><span class="bg-primary text-white w-6 h-6 rounded-full inline-flex items-center justify-center text-xs">3</span> Certification/Achievement</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-on-surface-variant text-xs" for="result_3_title">TITLE</label>
                        <input class="w-full h-10 px-3 bg-surface border border-outline rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all outline-none" 
                               id="result_3_title" name="result_3_title" value="{{ old('result_3_title', $project->result_3_title ?? '') }}" placeholder="ISO 27001 Certified" type="text"/>
                    </div>
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-on-surface-variant text-xs" for="result_3_description">DESCRIPTION</label>
                        <textarea class="w-full min-h-[60px] p-3 bg-surface border border-outline rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all outline-none" 
                                  id="result_3_description" name="result_3_description" placeholder="The implementation adheres to...">{{ old('result_3_description', $project->result_3_description ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 4: TECHNICAL IMPLEMENTATION (3 Items) -->
    <div>
        <h2 class="text-lg font-bold text-primary mb-4 flex items-center gap-2 border-b border-outline pb-2">
            <span class="material-symbols-outlined">developer_board</span>
            4. Technical Implementation
        </h2>
        
        <div class="space-y-6 bg-surface-container-low p-6 rounded-xl border border-outline">
            @for ($i = 1; $i <= 3; $i++)
            <div class="{{ $i < 3 ? 'border-b border-outline pb-6' : '' }}">
                <h3 class="font-bold mb-4 flex items-center gap-2"><span class="bg-primary-container text-on-primary-container w-6 h-6 rounded-full inline-flex items-center justify-center text-xs">{{ $i }}</span> Step {{ $i }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-on-surface-variant text-xs" for="impl_{{ $i }}_title">TITLE</label>
                        <input class="w-full h-10 px-3 bg-surface border border-outline rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all outline-none" 
                               id="impl_{{ $i }}_title" name="impl_{{ $i }}_title" value="{{ old('impl_'.$i.'_title', $project->{'impl_'.$i.'_title'} ?? '') }}" placeholder="Step Title" type="text"/>
                    </div>
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-on-surface-variant text-xs" for="impl_{{ $i }}_description">DESCRIPTION</label>
                        <textarea class="w-full min-h-[60px] p-3 bg-surface border border-outline rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all outline-none font-body-md" 
                                  id="impl_{{ $i }}_description" name="impl_{{ $i }}_description" placeholder="Step Description">{{ old('impl_'.$i.'_description', $project->{'impl_'.$i.'_description'} ?? '') }}</textarea>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>

@extends('Admin.templates.show')

@section('show_title', $project->title)
@section('show_subtitle', 'Project Configuration & Deployment Diagnostics')

@section('show_actions')
<a href="{{ route('admin.projects.edit', $project->id) }}" class="bg-secondary-container text-on-secondary-container px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-secondary-container/80 transition-all active:scale-95 shadow-sm font-label-sm text-sm uppercase tracking-wider">
    <span class="material-symbols-outlined text-sm">edit</span>
    <span>Edit Project</span>
</a>
<!-- Delete is handled via JavaScript in index, but we can also have a serverside delete or regular form if needed.
     Wait, project API has /api/projects/{id} delete route, let's look at index delete logic.
     Since this is a standard blade form, we can just point it to a delete endpoint if ProjectController supports destroy,
     but wait: ProjectController doesn't have destroy in web routes! Let's check web.php resource routes for projects.
     In web.php: Route::resource('projects', ProjectController::class, ['as' => 'admin'])->only(['index', 'create', 'edit', 'show']);
     So only index, create, edit, show are registered for web projects!
     Let's check if we can write a delete form that triggers a DELETE request to /api/projects/{id} via JS, or just do it via normal API.
     Let's build a form with JS trigger to match! -->
<button type="button" id="delete-project-btn" data-project-id="{{ $project->id }}" class="bg-error-container text-error border border-error/20 px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-error-container/30 transition-all active:scale-95 font-label-sm text-sm uppercase tracking-wider">
    <span class="material-symbols-outlined text-sm">delete</span>
    <span>Delete Project</span>
</button>
@endsection

@section('show_content')
<div id="api-alert" class="hidden mb-8 p-4 rounded-xl border font-label-sm text-sm flex items-center justify-between shadow-sm">
    <div class="flex items-center gap-3">
        <span class="material-symbols-outlined">info</span>
        <span data-alert-message></span>
    </div>
    <button class="material-symbols-outlined hover:scale-110" type="button" onclick="this.parentElement.classList.add('hidden')">close</button>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
    <!-- Main Content Details (Left) -->
    <div class="lg:col-span-8 space-y-8">
        <!-- Featured Image -->
        @if($project->featured_image)
            <div class="w-full h-80 rounded-xl overflow-hidden border border-outline shadow-inner">
                <img src="{{ $project->featured_image_url }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
            </div>
        @else
            <div class="w-full h-48 rounded-xl bg-surface-container-low border border-outline flex flex-col items-center justify-center text-on-surface-variant gap-2">
                <span class="material-symbols-outlined text-4xl">folder_special</span>
                <span class="font-label-sm text-xs uppercase">No Featured Image Uploaded</span>
            </div>
        @endif

        <!-- Subtitle & Overview -->
        @if($project->subtitle || $project->overview)
            <div class="bg-surface-container-low p-6 rounded-xl border border-outline space-y-3">
                @if($project->subtitle)
                    <h3 class="font-bold text-lg text-on-surface">{{ $project->subtitle }}</h3>
                @endif
                @if($project->overview)
                    <p class="text-body-md text-on-surface-variant leading-relaxed">
                        {{ $project->overview }}
                    </p>
                @endif
            </div>
        @endif

        <!-- Description -->
        <div class="prose prose-slate max-w-none text-on-surface leading-relaxed">
            <h3 class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider mb-2">Project Description</h3>
            <div class="p-6 rounded-xl border border-outline bg-surface">
                {!! $project->description !!}
            </div>
        </div>

        <!-- Metric Results -->
        @if($project->result_1_value || $project->result_2_value)
            <div class="space-y-4">
                <h3 class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider">Project Analytics & Results</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @if($project->result_1_value)
                        <div class="p-5 rounded-xl border border-outline bg-surface space-y-1">
                            <span class="block text-3xl font-bold text-primary font-display-lg">{{ $project->result_1_value }}</span>
                            <span class="block text-xs font-bold text-on-surface-variant uppercase font-label-sm">{{ $project->result_1_title }}</span>
                            <p class="text-xs text-on-surface-variant leading-normal">{{ $project->result_1_description }}</p>
                        </div>
                    @endif

                    @if($project->result_2_value)
                        <div class="p-5 rounded-xl border border-outline bg-surface space-y-1">
                            <span class="block text-3xl font-bold text-secondary font-display-lg">{{ $project->result_2_value }}</span>
                            <span class="block text-xs font-bold text-on-surface-variant uppercase font-label-sm">{{ $project->result_2_label }}</span>
                        </div>
                    @endif

                    @if($project->result_3_title)
                        <div class="p-5 rounded-xl border border-outline bg-surface space-y-1">
                            <span class="block text-sm font-bold text-on-surface uppercase font-label-sm">{{ $project->result_3_title }}</span>
                            <p class="text-xs text-on-surface-variant leading-normal">{{ $project->result_3_description }}</p>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        <!-- Implementation details -->
        @if($project->impl_1_title || $project->impl_2_title || $project->impl_3_title)
            <div class="space-y-4">
                <h3 class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider">Implementation Nodes</h3>
                <div class="space-y-3">
                    @if($project->impl_1_title)
                        <div class="p-5 rounded-xl border border-outline bg-surface">
                            <h4 class="font-bold text-on-surface text-sm uppercase font-label-sm flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-primary"></span>
                                {{ $project->impl_1_title }}
                            </h4>
                            <p class="text-sm text-on-surface-variant mt-2 leading-relaxed">{{ $project->impl_1_description }}</p>
                        </div>
                    @endif

                    @if($project->impl_2_title)
                        <div class="p-5 rounded-xl border border-outline bg-surface">
                            <h4 class="font-bold text-on-surface text-sm uppercase font-label-sm flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-secondary"></span>
                                {{ $project->impl_2_title }}
                            </h4>
                            <p class="text-sm text-on-surface-variant mt-2 leading-relaxed">{{ $project->impl_2_description }}</p>
                        </div>
                    @endif

                    @if($project->impl_3_title)
                        <div class="p-5 rounded-xl border border-outline bg-surface">
                            <h4 class="font-bold text-on-surface text-sm uppercase font-label-sm flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-tertiary"></span>
                                {{ $project->impl_3_title }}
                            </h4>
                            <p class="text-sm text-on-surface-variant mt-2 leading-relaxed">{{ $project->impl_3_description }}</p>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>

    <!-- Metadata Sidebar (Right) -->
    <div class="lg:col-span-4 space-y-6">
        <div class="bg-surface-container-low p-6 rounded-xl border border-outline space-y-6">
            <h3 class="font-bold text-on-surface border-b border-outline pb-3 font-label-sm uppercase tracking-wider flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">folder_open</span>
                Metadata Profile
            </h3>

            <!-- Status -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1.5">Deployment Status</span>
                @if($project->status === 'Active')
                    <span class="px-4 py-1.5 rounded-full text-xs font-label-sm bg-primary-container/20 text-on-primary-container border border-primary/20 font-bold uppercase tracking-wider">Active</span>
                @elseif($project->status === 'In Progress')
                    <span class="px-4 py-1.5 rounded-full text-xs font-label-sm bg-secondary-container/40 text-on-secondary-container border border-secondary/20 font-bold uppercase tracking-wider">In Progress</span>
                @else
                    <span class="px-4 py-1.5 rounded-full text-xs font-label-sm bg-surface-dim text-on-surface-variant border border-outline-variant/30 font-bold uppercase tracking-wider">{{ $project->status }}</span>
                @endif
            </div>

            <!-- Featured Status -->
            @if($project->is_featured)
                <div>
                    <span class="px-3 py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed-variant border border-tertiary/20 font-label-sm text-[10px] uppercase font-bold">★ Featured Project</span>
                </div>
            @endif

            <!-- Client -->
            @if($project->client)
                <div>
                    <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Client / Partner</span>
                    <p class="font-bold text-on-surface">{{ $project->client }}</p>
                </div>
            @endif

            <!-- Project Type -->
            @if($project->type)
                <div>
                    <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Project Type</span>
                    <p class="font-bold text-on-surface">{{ $project->type }}</p>
                </div>
            @endif

            <!-- Duration -->
            @if($project->duration)
                <div>
                    <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Timeline Duration</span>
                    <p class="font-bold text-on-surface">{{ $project->duration }}</p>
                </div>
            @endif

            <!-- Technologies -->
            @if($project->technologies)
                <div>
                    <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-2">Technologies Used</span>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach(explode(',', $project->technologies) as $tech)
                            <span class="px-2.5 py-1 rounded bg-surface border border-outline text-on-surface-variant font-label-sm text-xs uppercase">{{ trim($tech) }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Tags -->
            @if($project->tags)
                <div>
                    <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-2">Metadata Tags</span>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach(explode(',', $project->tags) as $tag)
                            <span class="px-2.5 py-1 rounded bg-primary-container/10 border border-primary/20 text-primary font-label-sm text-xs uppercase">{{ trim($tag) }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- System Info -->
            <div class="pt-4 border-t border-outline text-xs text-on-surface-variant space-y-1 font-label-sm">
                <p>Slug: <span class="text-primary font-bold">{{ $project->slug }}</span></p>
                <p>Created: {{ $project->created_at->format('Y-m-d H:i') }}</p>
                <p>Updated: {{ $project->updated_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteBtn = document.getElementById('delete-project-btn');
        const api = window.LaravelApi;
        
        if (deleteBtn && api) {
            deleteBtn.addEventListener('click', async function() {
                const id = deleteBtn.getAttribute('data-project-id');
                Swal.fire({
                    title: 'Confirm Deletion',
                    text: 'Are you sure you want to remove this project? This cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ba1a1a',
                    cancelButtonColor: '#747878',
                    confirmButtonText: 'Yes, Delete',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true
                }).then(async function(result) {
                    if (result.isConfirmed) {
                        try {
                            await api.delete('/projects/' + id);
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Project deleted successfully!',
                                confirmButtonColor: '#006e22'
                            }).then(() => {
                                window.location.href = "{{ route('admin.projects.index') }}";
                            });
                        } catch (error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to delete project: ' + (error.message || 'Unknown error')
                            });
                        }
                    }
                });
            });
        }
    });
</script>
@endpush

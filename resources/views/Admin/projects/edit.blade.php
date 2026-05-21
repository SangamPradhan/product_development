@extends('Admin.layouts.app')

@section('title', 'Edit Project')

@section('content')
<div id="api-alert" class="hidden mb-8 p-4 rounded-xl border font-label-sm text-sm" role="alert">
    <span data-alert-message></span>
</div>

<div class="mb-10">
    <h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">Edit Project</h1>
    <p class="text-on-surface-variant font-label-sm uppercase tracking-wider">Modify active system data & sync adjustments</p>
</div>

<div class="max-w-4xl">
    <div class="bg-surface border border-outline angled-notch p-8 md:p-10 shadow-sm relative group">
        <form id="project-api-form" class="space-y-6" enctype="multipart/form-data" data-project-id="{{ $project->id }}">
            @include('Admin.projects.form', ['item' => $project])
            <div class="flex items-center gap-4 pt-6 border-t border-outline/50 font-label-sm">
                <button class="bg-primary text-on-primary px-8 py-3 rounded-lg flex items-center gap-2 hover:bg-secondary active:scale-[0.98] transition-all shadow-md" type="submit">
                    UPDATE SYSTEM DATA
                    <span class="material-symbols-outlined text-sm">sync</span>
                </button>
                <a href="{{ route('admin.projects.index') }}" class="px-6 py-3 border border-outline rounded-lg hover:bg-surface-variant/30 text-on-surface-variant transition-colors uppercase">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    window.adminProjectRoutes = { index: @json(route('admin.projects.index')) };
</script>
<script src="{{ asset('js/admin-projects.js') }}"></script>
@endpush

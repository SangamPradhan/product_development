@extends('Admin.layouts.app')

@section('title', 'Manage Projects')

@section('content')
<div id="api-alert" class="hidden mb-8 p-4 rounded-xl border font-label-sm text-sm flex items-center justify-between shadow-sm">
    <div class="flex items-center gap-3">
        <span class="material-symbols-outlined">info</span>
        <span data-alert-message></span>
    </div>
    <button class="material-symbols-outlined hover:scale-110" type="button" onclick="this.parentElement.classList.add('hidden')">close</button>
</div>

<div class="flex justify-between items-end mb-12">
    <div>
        <h1 class="font-headline-lg text-headline-lg text-on-surface leading-none mb-2">Manage Projects</h1>
        <p class="text-on-surface-variant font-label-sm uppercase tracking-wider">System Intelligence &amp; Active Deployments</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="bg-primary text-on-primary px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-primary/95 transition-all active:scale-95 shadow-sm font-label-sm text-sm uppercase tracking-wider">
        <span class="material-symbols-outlined">add</span>
        <span>Add New Project</span>
    </a>
</div>

<div class="flex flex-wrap items-center gap-4 mb-8 bg-surface-container-low p-4 rounded-xl border border-outline/50">
    <div class="ml-auto text-on-surface-variant font-label-sm text-[10px] uppercase tracking-widest">
        Showing <span id="projects-count">0</span> elements
    </div>
</div>

<div class="bg-surface border border-outline angled-notch relative overflow-x-auto">
    <table class="w-full text-left border-collapse min-w-[700px]">
        <thead>
            <tr class="bg-surface-variant/30 text-on-surface-variant font-label-sm border-b border-outline uppercase tracking-wider">
                <th class="px-8 py-5 font-bold">Project Details</th>
                <th class="px-6 py-5 font-bold">Status</th>
                <th class="px-6 py-5 font-bold">Client</th>
                <th class="px-6 py-5 font-bold">Tags</th>
                <th class="px-8 py-5 font-bold text-right">Actions</th>
            </tr>
        </thead>
        <tbody id="projects-table-body" class="divide-y divide-outline">
            <tr>
                <td colspan="5" class="px-8 py-10 text-center text-on-surface-variant">Loading projects...</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    window.adminProjectRoutes = {
        index: @json(route('admin.projects.index')),
        edit: @json(url('/admin/projects')),
        show: @json(url('/admin/projects')),
        frontDetail: @json(url('/projects')),
    };
</script>
<script src="{{ asset('js/admin-projects.js') }}"></script>
@endpush

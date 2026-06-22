@extends('Admin.templates.show')

@section('show_title', $blog->title)
@section('show_subtitle', 'System Mockup Node & Neural Diagnostics')

@section('show_actions')
<a href="{{ route('admin.news.edit', $blog->id) }}" class="bg-secondary-container text-on-secondary-container px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-secondary-container/80 transition-all active:scale-95 shadow-sm font-label-sm text-sm uppercase tracking-wider">
    <span class="material-symbols-outlined text-sm">edit</span>
    <span>Edit entry</span>
</a>
<form action="{{ route('admin.news.delete', $blog->id) }}" method="POST" class="swal-delete-form" data-confirm-msg="Are you sure you want to remove this news entry?">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-error-container text-error border border-error/20 px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-error-container/30 transition-all active:scale-95 font-label-sm text-sm uppercase tracking-wider">
        <span class="material-symbols-outlined text-sm">delete</span>
        <span>Delete entry</span>
    </button>
</form>
@endsection

@section('show_content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
    <!-- Main Content Details (Left) -->
    <div class="lg:col-span-8 space-y-6">
        <!-- Summary Box -->
        <div class="bg-surface-container-low p-6 rounded-xl border border-outline">
            <h3 class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider mb-2">Node Objective</h3>
            <p class="text-body-md text-on-surface font-medium italic">
                "{{ $blog->description }}"
            </p>
        </div>

        <!-- Content Specifications -->
        <div class="prose prose-slate max-w-none text-on-surface leading-relaxed">
            <h3 class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider mb-2">Simulated Content Spec</h3>
            <div class="p-6 rounded-xl border border-outline bg-surface">
                {!! $blog->content !!}
            </div>
        </div>
    </div>

    <!-- Metadata Sidebar (Right) -->
    <div class="lg:col-span-4 space-y-6">
        <div class="bg-surface-container-low p-6 rounded-xl border border-outline space-y-6">
            <h3 class="font-bold text-on-surface border-b border-outline pb-3 font-label-sm uppercase tracking-wider flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">analytics</span>
                Telemetry Parameters
            </h3>

            <!-- Status -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1.5">Runtime Status</span>
                @if($blog->status === 'Active')
                    <span class="px-4 py-1.5 rounded-full text-xs font-label-sm bg-secondary-container text-on-secondary-container border border-secondary/20 font-bold uppercase tracking-wider">Active</span>
                @elseif($blog->status === 'In Progress')
                    <span class="px-4 py-1.5 rounded-full text-xs font-label-sm bg-secondary-container/40 text-on-secondary-container border border-secondary/20 font-bold uppercase tracking-wider">In Progress</span>
                @else
                    <span class="px-4 py-1.5 rounded-full text-xs font-label-sm bg-surface-dim text-on-surface-variant border border-outline-variant/30 font-bold uppercase tracking-wider">Paused</span>
                @endif
            </div>

            <!-- Health Score -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Health Integrity</span>
                <div class="flex items-center gap-3 mt-1.5">
                    <div class="w-full bg-surface-variant h-2.5 rounded-full overflow-hidden border border-outline">
                        <div class="bg-primary h-full" style="width: {{ $blog->health }}%"></div>
                    </div>
                    <span class="font-label-sm font-bold text-sm text-primary">{{ $blog->health }}%</span>
                </div>
            </div>

            <!-- Author -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Assigned Developer</span>
                <p class="font-bold text-on-surface">{{ $blog->author }}</p>
            </div>

            <!-- Timeline -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Execution Window</span>
                <p class="font-bold text-on-surface">{{ $blog->timeline }}</p>
            </div>

            <!-- System Logs -->
            <div class="pt-4 border-t border-outline text-xs text-on-surface-variant space-y-1 font-label-sm">
                <p>Telemetry Node ID: #{{ $blog->id }}</p>
                <p>Created: {{ is_string($blog->created_at) ? $blog->created_at : $blog->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

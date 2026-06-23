@extends('Admin.templates.show')

@section('show_title', $service->title)
@section('show_subtitle', 'Service Capabilities & Parameter Diagnostics')

@section('show_actions')
<a href="{{ route('admin.services.edit', $service->id) }}" class="bg-secondary-container text-on-secondary-container px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-secondary-container/80 transition-all active:scale-95 shadow-sm font-label-sm text-sm uppercase tracking-wider">
    <span class="material-symbols-outlined text-sm">edit</span>
    <span>Edit Service</span>
</a>
<form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="swal-delete-form" data-confirm-msg="Are you sure you want to remove this service?">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-error-container text-error border border-error/20 px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-error-container/30 transition-all active:scale-95 font-label-sm text-sm uppercase tracking-wider">
        <span class="material-symbols-outlined text-sm">delete</span>
        <span>Delete Service</span>
    </button>
</form>
@endsection

@section('show_content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
    <!-- Main Content Details (Left) -->
    <div class="lg:col-span-8 space-y-6">
        <!-- Overview / Short Description -->
        <div class="bg-surface-container-low p-6 rounded-xl border border-outline">
            <h3 class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider mb-2">Short Summary</h3>
            <p class="text-body-md text-on-surface font-medium leading-relaxed">
                {{ $service->short_description }}
            </p>
        </div>

        <!-- Long Description -->
        <div class="prose prose-slate max-w-none text-on-surface leading-relaxed">
            <h3 class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider mb-2">Detailed Specifications</h3>
            <div class="p-6 rounded-xl border border-outline bg-surface">
                {!! $service->description !!}
            </div>
        </div>

        <!-- Features Checklist -->
        @if($service->features)
            <div class="space-y-3">
                <h3 class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider">Core Features & Integrations</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach(array_filter(array_map('trim', explode("\n", $service->features))) as $feature)
                        <div class="flex items-center gap-3 p-4 rounded-xl border border-outline bg-surface">
                            <span class="material-symbols-outlined text-primary bg-secondary-container/20 p-1.5 rounded-lg text-lg">check_circle</span>
                            <span class="font-medium text-sm text-on-surface">{{ $feature }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <!-- Metadata Sidebar (Right) -->
    <div class="lg:col-span-4 space-y-6">
        <div class="bg-surface-container-low p-6 rounded-xl border border-outline space-y-6">
            <h3 class="font-bold text-on-surface border-b border-outline pb-3 font-label-sm uppercase tracking-wider flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">analytics</span>
                Configuration Profile
            </h3>

            <!-- Status -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1.5">Node Status</span>
                @if($service->status === 'Active')
                    <span class="px-4 py-1.5 rounded-full text-xs font-label-sm bg-secondary-container text-on-secondary-container border border-secondary/20 font-bold uppercase tracking-wider">Active</span>
                @else
                    <span class="px-4 py-1.5 rounded-full text-xs font-label-sm bg-error-container text-on-error-container border border-error/20 font-bold uppercase tracking-wider">Inactive</span>
                @endif
            </div>

            <!-- Icon -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Visual Symbol</span>
                <div class="flex items-center gap-2 mt-1">
                    <span class="material-symbols-outlined text-3xl text-primary bg-surface p-2 rounded-xl border border-outline shadow-sm">{{ $service->icon }}</span>
                    <span class="font-label-sm text-xs text-on-surface-variant uppercase">{{ $service->icon }}</span>
                </div>
            </div>

            <!-- System Info -->
            <div class="pt-4 border-t border-outline text-xs text-on-surface-variant space-y-1 font-label-sm">
                <p>Slug: <span class="text-primary font-bold">{{ $service->slug }}</span></p>
                <p>Created: {{ $service->created_at->format('Y-m-d H:i') }}</p>
                <p>Updated: {{ $service->updated_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

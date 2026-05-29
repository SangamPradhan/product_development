@extends('Admin.layouts.app')

@section('title', 'Manage ' . $title)

@section('content')
<!-- Page Alerts -->
@if (session('success'))
    <div class="mb-8 p-4 rounded-xl bg-secondary-container text-on-secondary-container border border-secondary/20 font-label-sm text-sm flex items-center justify-between shadow-sm">
        <div class="flex items-center gap-3">
            <span class="material-symbols-outlined">check_circle</span>
            <span>{{ session('success') }}</span>
        </div>
        <button class="material-symbols-outlined hover:scale-110" onclick="this.parentElement.remove()">close</button>
    </div>
@endif

<!-- Page Header -->
<div class="flex justify-between items-end mb-12">
    <div>
        <h1 class="font-headline-lg text-headline-lg text-on-surface leading-none mb-2">Manage {{ $title }}</h1>
        <p class="text-on-surface-variant font-label-sm uppercase tracking-wider">System Intelligence &amp; Active Deployments</p>
    </div>
    
    @if(Route::has($route . 'create'))
        <a href="{{ route($route . 'create') }}" class="bg-primary text-on-primary px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-primary/95 transition-all active:scale-95 shadow-sm font-label-sm text-sm uppercase tracking-wider">
            <span class="material-symbols-outlined">add</span>
            <span>Add New {{ Str::singular($title) }}</span>
        </a>
    @endif
</div>

<!-- Filters & Search Control Bar -->
<div class="flex flex-wrap items-center gap-4 mb-8 bg-surface-container-low p-4 rounded-xl border border-outline/50">
    <div class="flex items-center gap-2 bg-surface px-3 py-2 rounded-lg border border-outline">
        <span class="material-symbols-outlined text-primary text-sm">filter_list</span>
        <select class="bg-transparent border-none focus:ring-0 font-label-sm text-sm text-on-surface-variant p-0 pr-8">
            <option>All Status</option>
            <option>Active</option>
            <option>In Progress</option>
            <option>Completed</option>
        </select>
    </div>
    <div class="flex items-center gap-2 bg-surface px-3 py-2 rounded-lg border border-outline">
        <span class="material-symbols-outlined text-primary text-sm">sort</span>
        <select class="bg-transparent border-none focus:ring-0 font-label-sm text-sm text-on-surface-variant p-0 pr-8">
            <option>Date Modified</option>
            <option>Name A-Z</option>
            <option>Uptime / Health</option>
        </select>
    </div>
    <div class="ml-auto text-on-surface-variant font-label-sm text-[10px] uppercase tracking-widest">
        Showing {{ count($items ?? []) }} elements
    </div>
</div>

<!-- High-End Project Table with Angled Notch -->
<div class="bg-surface border border-outline angled-notch relative overflow-x-auto">
    <table class="w-full text-left border-collapse min-w-[700px]">
        <thead>
            <tr class="bg-surface-variant/30 text-on-surface-variant font-label-sm border-b border-outline uppercase tracking-wider">
                @yield('table_headers')
                <th class="px-8 py-5 font-bold text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-outline">
            @yield('table_rows')
        </tbody>
    </table>
    
    <!-- Bottom Stats Bar inside Angled Container -->
    <div class="bg-surface-container-low p-6 border-t border-outline flex justify-between items-center font-label-sm">
        <div class="flex gap-8">
            <div>
                <p class="text-[10px] text-on-surface-variant uppercase">Storage Usage</p>
                <p class="font-bold text-on-surface">1.2 TB / 2.0 TB</p>
            </div>
            <div>
                <p class="text-[10px] text-on-surface-variant uppercase">Compute Nodes</p>
                <p class="font-bold text-on-surface">42 Active Nodes</p>
            </div>
        </div>
        <div class="flex gap-2">
            <button class="px-4 py-2 border border-outline rounded-lg hover:bg-surface-variant/30 transition-colors">Previous</button>
            <button class="px-4 py-2 border border-outline rounded-lg hover:bg-surface-variant/30 transition-colors">Next</button>
        </div>
    </div>
</div>
@endsection

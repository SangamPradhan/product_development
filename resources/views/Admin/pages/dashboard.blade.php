@extends('Admin.layouts.app')

@section('title', 'Analytics Dashboard')

@section('content')
<!-- Page Alerts -->
@if (session('success'))
    <div class="mb-8 p-4 rounded-xl bg-secondary-container text-on-secondary-container border border-secondary/20 font-label-sm text-sm flex items-center justify-between shadow-sm animate-pulse">
        <div class="flex items-center gap-3">
            <span class="material-symbols-outlined">check_circle</span>
            <span>{{ session('success') }}</span>
        </div>
        <button class="material-symbols-outlined hover:scale-110" onclick="this.parentElement.remove()">close</button>
    </div>
@endif

<!-- Bento Header Section -->
<div class="max-w-7xl mx-auto">
    <div class="mb-10">
        <h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">Analytics Overview</h1>
        <p class="text-on-surface-variant font-body-md">Intelligence-driven insights from across your Lumina ecosystem.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-6 mb-8">
        <!-- Blog Stat -->
        <div class="bg-surface border border-outline angled-notch p-6 flex flex-col items-center justify-center text-center group hover:border-primary transition-colors">
            <span class="material-symbols-outlined text-primary mb-2" data-icon="article">article</span>
            <div class="text-2xl font-bold text-on-surface">1,284</div>
            <div class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Blogs</div>
            <div class="mt-2 text-[10px] text-primary font-bold">+12% ↑</div>
        </div>
        <!-- Projects Stat -->
        <div class="bg-surface border border-outline angled-notch p-6 flex flex-col items-center justify-center text-center group hover:border-primary transition-colors">
            <span class="material-symbols-outlined text-primary mb-2" data-icon="folder_special">folder_special</span>
            <div class="text-2xl font-bold text-on-surface">43</div>
            <div class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Projects</div>
            <div class="mt-2 text-[10px] text-primary font-bold">+5% ↑</div>
        </div>
        <!-- Events Stat -->
        <div class="bg-surface border border-outline angled-notch p-6 flex flex-col items-center justify-center text-center group hover:border-primary transition-colors">
            <span class="material-symbols-outlined text-primary mb-2" data-icon="event">event</span>
            <div class="text-2xl font-bold text-on-surface">18</div>
            <div class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Events</div>
            <div class="mt-2 text-[10px] text-tertiary font-bold">-2% ↓</div>
        </div>
        <!-- Gallery Stat -->
        <div class="bg-surface border border-outline angled-notch p-6 flex flex-col items-center justify-center text-center group hover:border-primary transition-colors">
            <span class="material-symbols-outlined text-primary mb-2" data-icon="photo_library">photo_library</span>
            <div class="text-2xl font-bold text-on-surface">8.2k</div>
            <div class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Gallery</div>
            <div class="mt-2 text-[10px] text-primary font-bold">+24% ↑</div>
        </div>
        <!-- Reviews Stat -->
        <div class="bg-surface border border-outline angled-notch p-6 flex flex-col items-center justify-center text-center group hover:border-primary transition-colors">
            <span class="material-symbols-outlined text-primary mb-2" data-icon="rate_review">rate_review</span>
            <div class="text-2xl font-bold text-on-surface">4.8</div>
            <div class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Reviews</div>
            <div class="mt-2 text-[10px] text-primary font-bold">Stable</div>
        </div>
        <!-- Notifications Stat -->
        <div class="bg-secondary-container border border-outline angled-notch p-6 flex flex-col items-center justify-center text-center group hover:border-primary transition-all">
            <span class="material-symbols-outlined text-on-secondary-container mb-2" data-icon="notifications_active">notifications_active</span>
            <div class="text-2xl font-bold text-on-secondary-container">256</div>
            <div class="font-label-sm text-label-sm text-on-secondary-container uppercase tracking-wider">Alerts</div>
            <div class="mt-2 text-[10px] text-on-secondary-container font-black">ACTION REQ</div>
        </div>
    </div>

    <!-- Asymmetric Bento Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Trend Chart Section -->
        <div class="lg:col-span-8 bg-surface border border-outline angled-notch p-8">
            <div class="flex justify-between items-start mb-8">
                <div>
                    <h3 class="text-xl font-bold text-on-surface">System Performance</h3>
                    <p class="text-on-surface-variant font-label-sm text-label-sm uppercase">Resource utilization trend (Last 30 days)</p>
                </div>
                <div class="flex gap-2 font-label-sm text-[10px]">
                    <span class="px-3 py-1 bg-secondary-fixed text-on-secondary-fixed font-bold rounded uppercase">Real-time</span>
                    <span class="px-3 py-1 bg-surface-variant text-on-surface-variant font-bold rounded uppercase">Active</span>
                </div>
            </div>
            
            <div class="h-64 flex items-end justify-between gap-2 group border-b border-outline pb-2">
                <!-- Simulated Chart Bars -->
                <div class="w-full bg-primary/10 rounded-t h-[40%] hover:bg-primary transition-colors cursor-pointer relative group/bar">
                    <div class="absolute -top-7 left-1/2 -translate-x-1/2 text-[9px] font-label-sm bg-inverse-surface text-inverse-on-surface px-2 py-0.5 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity">40%</div>
                </div>
                <div class="w-full bg-primary/10 rounded-t h-[55%] hover:bg-primary transition-colors cursor-pointer relative group/bar">
                    <div class="absolute -top-7 left-1/2 -translate-x-1/2 text-[9px] font-label-sm bg-inverse-surface text-inverse-on-surface px-2 py-0.5 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity">55%</div>
                </div>
                <div class="w-full bg-primary/10 rounded-t h-[45%] hover:bg-primary transition-colors cursor-pointer relative group/bar">
                    <div class="absolute -top-7 left-1/2 -translate-x-1/2 text-[9px] font-label-sm bg-inverse-surface text-inverse-on-surface px-2 py-0.5 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity">45%</div>
                </div>
                <div class="w-full bg-primary/10 rounded-t h-[65%] hover:bg-primary transition-colors cursor-pointer relative group/bar">
                    <div class="absolute -top-7 left-1/2 -translate-x-1/2 text-[9px] font-label-sm bg-inverse-surface text-inverse-on-surface px-2 py-0.5 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity">65%</div>
                </div>
                <div class="w-full bg-primary/10 rounded-t h-[80%] hover:bg-primary transition-colors cursor-pointer relative group/bar">
                    <div class="absolute -top-7 left-1/2 -translate-x-1/2 text-[9px] font-label-sm bg-inverse-surface text-inverse-on-surface px-2 py-0.5 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity">80%</div>
                </div>
                <div class="w-full bg-primary/10 rounded-t h-[75%] hover:bg-primary transition-colors cursor-pointer relative group/bar">
                    <div class="absolute -top-7 left-1/2 -translate-x-1/2 text-[9px] font-label-sm bg-inverse-surface text-inverse-on-surface px-2 py-0.5 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity">75%</div>
                </div>
                <div class="w-full bg-primary/10 rounded-t h-[90%] hover:bg-primary transition-colors cursor-pointer relative group/bar">
                    <div class="absolute -top-7 left-1/2 -translate-x-1/2 text-[9px] font-label-sm bg-inverse-surface text-inverse-on-surface px-2 py-0.5 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity">90%</div>
                </div>
                <div class="w-full bg-primary/10 rounded-t h-[85%] hover:bg-primary transition-colors cursor-pointer relative group/bar">
                    <div class="absolute -top-7 left-1/2 -translate-x-1/2 text-[9px] font-label-sm bg-inverse-surface text-inverse-on-surface px-2 py-0.5 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity">85%</div>
                </div>
                <div class="w-full bg-primary/10 rounded-t h-[95%] hover:bg-primary transition-colors cursor-pointer relative group/bar">
                    <div class="absolute -top-7 left-1/2 -translate-x-1/2 text-[9px] font-label-sm bg-inverse-surface text-inverse-on-surface px-2 py-0.5 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity">95%</div>
                </div>
                <div class="w-full bg-secondary-fixed-dim rounded-t h-[100%] hover:bg-primary transition-colors cursor-pointer relative group/bar">
                    <div class="absolute -top-7 left-1/2 -translate-x-1/2 text-[9px] font-label-sm bg-inverse-surface text-inverse-on-surface px-2 py-0.5 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity">100%</div>
                </div>
                <div class="w-full bg-primary/10 rounded-t h-[80%] hover:bg-primary transition-colors cursor-pointer relative group/bar">
                    <div class="absolute -top-7 left-1/2 -translate-x-1/2 text-[9px] font-label-sm bg-inverse-surface text-inverse-on-surface px-2 py-0.5 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity">80%</div>
                </div>
                <div class="w-full bg-primary/10 rounded-t h-[70%] hover:bg-primary transition-colors cursor-pointer relative group/bar">
                    <div class="absolute -top-7 left-1/2 -translate-x-1/2 text-[9px] font-label-sm bg-inverse-surface text-inverse-on-surface px-2 py-0.5 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity">70%</div>
                </div>
                <div class="w-full bg-primary/10 rounded-t h-[60%] hover:bg-primary transition-colors cursor-pointer relative group/bar">
                    <div class="absolute -top-7 left-1/2 -translate-x-1/2 text-[9px] font-label-sm bg-inverse-surface text-inverse-on-surface px-2 py-0.5 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity">60%</div>
                </div>
                <div class="w-full bg-primary/10 rounded-t h-[50%] hover:bg-primary transition-colors cursor-pointer relative group/bar">
                    <div class="absolute -top-7 left-1/2 -translate-x-1/2 text-[9px] font-label-sm bg-inverse-surface text-inverse-on-surface px-2 py-0.5 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity">50%</div>
                </div>
                <div class="w-full bg-primary/10 rounded-t h-[65%] hover:bg-primary transition-colors cursor-pointer relative group/bar">
                    <div class="absolute -top-7 left-1/2 -translate-x-1/2 text-[9px] font-label-sm bg-inverse-surface text-inverse-on-surface px-2 py-0.5 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity">65%</div>
                </div>
            </div>
            <div class="flex justify-between mt-4 text-[10px] text-on-surface-variant font-label-sm uppercase tracking-widest pt-2">
                <span>Day 01</span>
                <span>Day 15</span>
                <span>Day 30</span>
            </div>
        </div>

        <!-- Featured Intelligence Card -->
        <div class="lg:col-span-4 space-y-8">
            <div class="bg-primary text-on-primary angled-notch p-8 relative overflow-hidden group">
                <div class="relative z-10">
                    <span class="material-symbols-outlined text-4xl mb-4" style="font-variation-settings: 'FILL' 1;">bolt</span>
                    <h3 class="text-xl font-bold mb-2">Predictive Analysis</h3>
                    <p class="text-on-primary/80 font-body-md text-sm mb-6">AI model suggests a 15% surge in blog traffic for next weekend. Prep system resources.</p>
                    <button class="bg-surface text-primary font-label-sm text-label-sm px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-surface-variant transition-colors active:scale-95">
                        Optimize Now
                        <span class="material-symbols-outlined text-sm">trending_up</span>
                    </button>
                </div>
                <div class="absolute -right-12 -bottom-12 opacity-10 scale-150 rotate-12 transition-transform group-hover:rotate-0">
                    <span class="material-symbols-outlined text-[160px]" style="font-variation-settings: 'FILL' 1;">insights</span>
                </div>
            </div>
            
            <div class="bg-surface border border-outline angled-notch p-8">
                <h4 class="text-sm font-bold text-on-surface uppercase tracking-widest mb-6">Recent User Activity</h4>
                <div class="space-y-4 font-label-sm">
                    <div class="flex items-center gap-4 border-b border-outline pb-4">
                        <div class="w-10 h-10 rounded bg-surface-container-high flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary">person</span>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-bold">New Review: 5 Stars</p>
                            <p class="text-[10px] text-on-surface-variant uppercase">By Sarah Miller · 2m ago</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 border-b border-outline pb-4">
                        <div class="w-10 h-10 rounded bg-surface-container-high flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary">feed</span>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-bold">Blog: "Future of Neural Nets"</p>
                            <p class="text-[10px] text-on-surface-variant uppercase">Draft published · 14m ago</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded bg-surface-container-high flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary">campaign</span>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-bold">Event: AI Summit 2026</p>
                            <p class="text-[10px] text-on-surface-variant uppercase">152 New registrations</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery / Media Preview -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="md:col-span-2 bg-surface border border-outline angled-notch overflow-hidden">
            <img class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500" alt="Futuristic workspace" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDiZHKyCOMvdJ5LcIRyBJ_nUx8MISoVoE33Yd_7MrGzfTTVf4w6GDY2Us9UBgBssmkGzZnXKZ4Aja3VxM16ZfQMhp_upfs9YnY9q_9DUI1F-43LvDCyB9V6VFaxA5DMV-PfRrtVcz4S_qQI6Y5cT_zTZdrmKlammEPumLOET-EONJgeO1dj3cdI1FFh3mfZ_m6nFFTzri8YONVrtj0S40iJ8oAuC4M-nQUGtFQryi6o1tV1R79_MiMs92UHVRKoj_4qDUUqYlY1kys"/>
            <div class="p-6">
                <h4 class="font-bold text-on-surface">Gallery Asset #842</h4>
                <p class="text-on-surface-variant text-sm mt-1">AI-Generated Architectural Concept</p>
                <div class="mt-4 flex gap-2 font-label-sm text-[9px]">
                    <span class="px-2 py-1 bg-surface-variant rounded">4K RAW</span>
                    <span class="px-2 py-1 bg-surface-variant rounded">V3.2 MODEL</span>
                </div>
            </div>
        </div>
        
        <div class="bg-surface border border-outline angled-notch p-6 flex flex-col justify-between">
            <div>
                <span class="material-symbols-outlined text-primary text-3xl mb-4" data-icon="cloud_upload">cloud_upload</span>
                <h4 class="font-bold text-on-surface">Cloud Sync</h4>
                <p class="text-sm text-on-surface-variant mt-2">Upload new assets to the Lumina training set.</p>
            </div>
            <button class="w-full border border-primary text-primary font-label-sm text-label-sm py-3 rounded-lg hover:bg-primary hover:text-white transition-all">Upload File</button>
        </div>
        
        <div class="bg-surface border border-outline angled-notch p-6 flex flex-col justify-between">
            <div>
                <span class="material-symbols-outlined text-tertiary text-3xl mb-4" data-icon="security">security</span>
                <h4 class="font-bold text-on-surface">System Integrity</h4>
                <p class="text-sm text-on-surface-variant mt-2">Zero vulnerabilities detected in last 24h.</p>
            </div>
            <div class="flex items-center gap-2 text-primary font-bold text-[10px] uppercase font-label-sm">
                <span class="w-2.5 h-2.5 rounded-full bg-primary animate-ping"></span>
                Secure Connection
            </div>
        </div>
    </div>
</div>
@endsection

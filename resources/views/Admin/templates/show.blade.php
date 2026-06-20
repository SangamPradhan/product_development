@extends('Admin.layouts.app')

@section('title', ($title ?? 'Admin') . ' - Details')

@section('content')
<!-- Back Link -->
<div class="mb-8">
    <a href="{{ $back_url ?? (isset($route) ? route($route . 'index') : '#') }}" class="inline-flex items-center gap-2 text-on-surface-variant hover:text-primary transition-colors font-label-sm text-sm">
        <span class="material-symbols-outlined text-sm">arrow_back</span>
        Back to List
    </a>
</div>

<!-- Page Header -->
<div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-6 mb-12">
    <div>
        <h1 class="font-headline-lg text-headline-lg text-on-surface leading-none mb-2">@yield('show_title', $title)</h1>
        <p class="text-on-surface-variant font-label-sm uppercase tracking-wider">@yield('show_subtitle', 'System Asset Intelligence')</p>
    </div>
    
    <div class="flex items-center gap-3">
        @yield('show_actions')
    </div>
</div>

<!-- Details Canvas with Angled Notch -->
<div class="w-full max-w-[90rem]">
    <div class="bg-surface border border-outline angled-notch p-6 md:p-10 shadow-sm relative group">
        <div class="absolute top-4 left-4">
            <span class="material-symbols-outlined text-primary/40 text-xl">insights</span>
        </div>
        
        <div class="space-y-8">
            @yield('show_content')
        </div>
    </div>
</div>
@endsection

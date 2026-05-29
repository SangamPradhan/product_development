@extends('Admin.layouts.app')

@section('title', 'Edit ' . $title)

@section('content')
<!-- Page Header -->
<div class="mb-10">
    <h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">Edit {{ $title }}</h1>
    <p class="text-on-surface-variant font-label-sm uppercase tracking-wider">Modify active system data & sync adjustments</p>
</div>

<div class="max-w-4xl">
    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="mb-8 p-4 rounded-xl bg-error-container text-on-error-container border border-error/20 font-label-sm text-sm" role="alert">
            <div class="flex items-center gap-2 font-bold mb-1">
                <span class="material-symbols-outlined text-base">warning</span>
                VALIDATION FAILED
            </div>
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- High-End Angled Form Card -->
    <div class="bg-surface border border-outline angled-notch p-8 md:p-10 shadow-sm relative group">
        <div class="absolute top-4 left-4">
            <span class="material-symbols-outlined text-primary/40 text-xl">token</span>
        </div>
        
        <form action="{{ route($route . 'update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                @yield('form_content')
            </div>

            <!-- Form Footer Actions -->
            <div class="flex items-center gap-4 pt-6 border-t border-outline/50 font-label-sm">
                <button class="bg-primary text-on-primary px-8 py-3 rounded-lg flex items-center gap-2 hover:bg-secondary active:scale-[0.98] transition-all shadow-md" type="submit">
                    UPDATE SYSTEM DATA
                    <span class="material-symbols-outlined text-sm">sync</span>
                </button>
                <a href="{{ route($route . 'index') }}" class="px-6 py-3 border border-outline rounded-lg hover:bg-surface-variant/30 text-on-surface-variant transition-colors uppercase">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

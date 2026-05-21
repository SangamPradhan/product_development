@extends('front.layouts.app')

@section('title', 'Project Detail | AI-Solutions')

@push('styles')
<style>
    .angled-notch {
        clip-path: polygon(
            0% 12px, 
            12px 0%, 
            100% 0%, 
            100% calc(100% - 12px), 
            calc(100% - 12px) 100%, 
            0% 100%
        );
    }
    .angled-notch-lg {
        clip-path: polygon(
            0% 24px, 
            24px 0%, 
            100% 0%, 
            100% calc(100% - 24px), 
            calc(100% - 24px) 100%, 
            0% 100%
        );
    }
</style>
@endpush

@section('content')
<div id="project-detail-root">
    <p class="text-center py-24 text-on-surface-variant px-margin-desktop">Loading project...</p>
</div>
@endsection

@push('scripts')
<script>
    window.frontProjectConfig = {
        slug: @json($slug),
        projectDetailBase: @json(url('/projects')),
    };
</script>
<script src="{{ asset('js/laravel-api.js') }}"></script>
<script src="{{ asset('js/front-projects.js') }}"></script>
@endpush

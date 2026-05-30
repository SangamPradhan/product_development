@extends('Admin.layouts.app')

@section('title', 'Review Details')

@section('content')
<!-- Back Link -->
<div class="mb-8">
    <a href="{{ route('admin.reviews.index') }}" class="inline-flex items-center gap-2 text-on-surface-variant hover:text-primary transition-colors font-label-sm text-sm">
        <span class="material-symbols-outlined text-sm">arrow_back</span>
        Back to Feedbacks
    </a>
</div>

<!-- Page Header -->
<div class="mb-12">
    <h1 class="font-headline-lg text-headline-lg text-on-surface leading-none mb-2">Review Details</h1>
    <p class="text-on-surface-variant font-label-sm uppercase tracking-wider">Review #{{ $review->id }} - Submitted {{ $review->created_at->diffForHumans() }}</p>
</div>

<!-- Details Canvas with Angled Notch -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
    <div class="lg:col-span-8 bg-surface border border-outline angled-notch p-8">
        <!-- Project & Status header -->
        <div class="flex justify-between items-start border-b border-outline pb-6 mb-6">
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider">PROJECT</span>
                <h3 class="text-headline-md font-headline-md text-on-surface mt-1">{{ $review->project->title }}</h3>
                <span class="text-xs font-label-sm bg-surface-container-low text-secondary px-2 py-0.5 rounded">{{ $review->project->type }}</span>
            </div>
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block text-right mb-1">STATUS</span>
                @if($review->status === 'accepted')
                    <span class="px-4 py-1.5 rounded-full text-xs font-label-sm bg-secondary-container text-on-secondary-container border border-secondary/20">Accepted / Approved</span>
                @elseif($review->status === 'rejected')
                    <span class="px-4 py-1.5 rounded-full text-xs font-label-sm bg-error-container text-on-error-container border border-error/20">Rejected / Disapproved</span>
                @else
                    <span class="px-4 py-1.5 rounded-full text-xs font-label-sm bg-surface-dim text-on-surface-variant border border-outline-variant/30 animate-pulse">Pending Approval</span>
                @endif
            </div>
        </div>

        <!-- Rating & User -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter mb-8">
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider">REVIEWER</span>
                <p class="font-bold text-lg text-on-surface mt-1">{{ $review->reviewer_name }}</p>
                <p class="text-sm text-on-surface-variant">{{ $review->reviewer_email }}</p>
                @if($review->reviewer_title)
                    <p class="text-sm text-secondary font-label-sm mt-1">{{ $review->reviewer_title }}</p>
                @endif
            </div>
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider">RATING GIVEN</span>
                <div class="flex items-center gap-1.5 text-secondary mt-1">
                    <div class="flex gap-0.5">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' {{ $i <= $review->rating ? '1' : '0' }};">star</span>
                        @endfor
                    </div>
                    <span class="font-bold text-on-surface font-label-sm">({{ $review->rating }}/5)</span>
                </div>
            </div>
        </div>

        <!-- Comment Text -->
        <div class="bg-surface-container-low p-6 rounded-xl border border-outline mb-8">
            <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider">REVIEW COMMENT</span>
            <p class="text-body-md text-on-surface italic mt-3 whitespace-pre-line leading-relaxed">
                "{{ $review->comment }}"
            </p>
        </div>

        <!-- Actions panel inside show -->
        <div class="flex flex-wrap gap-4 border-t border-outline pt-6">
            @if($review->status !== 'accepted')
                <form action="{{ route('admin.reviews.accept', $review->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-primary text-on-primary px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-primary/95 transition-all active:scale-95 shadow-sm font-label-sm text-sm uppercase tracking-wider">
                        <span class="material-symbols-outlined text-sm">check_circle</span>
                        <span>Approve Feedback</span>
                    </button>
                </form>
            @endif

            @if($review->status !== 'rejected')
                <form action="{{ route('admin.reviews.reject', $review->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-surface-container border border-outline-variant text-on-surface-variant px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-surface-variant/40 transition-all active:scale-95 font-label-sm text-sm uppercase tracking-wider">
                        <span class="material-symbols-outlined text-sm">cancel</span>
                        <span>Reject Feedback</span>
                    </button>
                </form>
            @endif

            <form action="{{ route('admin.reviews.delete', $review->id) }}" method="POST" class="ml-auto animate-fade-in" onsubmit="return confirm('Are you sure you want to delete this review completely? This action cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-error-container text-error border border-error/20 px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-error-container/30 transition-all active:scale-95 font-label-sm text-sm uppercase tracking-wider">
                    <span class="material-symbols-outlined text-sm">delete</span>
                    <span>Delete Completely</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

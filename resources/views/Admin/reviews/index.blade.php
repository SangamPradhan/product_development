@extends('Admin.layouts.app')

@section('title', 'Manage Reviews')

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
        <h1 class="font-headline-lg text-headline-lg text-on-surface leading-none mb-2">Manage Feedbacks</h1>
        <p class="text-on-surface-variant font-label-sm uppercase tracking-wider">User reviews and case study testimonials</p>
    </div>
</div>

<!-- Filters & Search Control Bar -->
<div class="flex flex-wrap items-center gap-4 mb-8 bg-surface-container-low p-4 rounded-xl border border-outline/50">
    <div class="text-on-surface-variant font-label-sm text-[10px] uppercase tracking-widest">
        Showing {{ count($reviews) }} submissions
    </div>
</div>

<!-- Reviews Table with Angled Notch -->
<div class="bg-surface border border-outline angled-notch relative overflow-x-auto">
    <table class="w-full text-left border-collapse min-w-[900px]">
        <thead>
            <tr class="bg-surface-variant/30 text-on-surface-variant font-label-sm border-b border-outline uppercase tracking-wider">
                <th class="px-8 py-5 font-bold">Project</th>
                <th class="px-6 py-5 font-bold">Reviewer</th>
                <th class="px-6 py-5 font-bold text-center">Rating</th>
                <th class="px-6 py-5 font-bold">Comment</th>
                <th class="px-6 py-5 font-bold">Status</th>
                <th class="px-8 py-5 font-bold text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-outline">
            @forelse($reviews as $review)
                <tr class="hover:bg-surface-container-low/30 transition-colors">
                    <td class="px-8 py-5">
                        <span class="font-bold text-on-surface">{{ $review->project->title }}</span>
                        <span class="block text-xs text-on-surface-variant font-label-sm uppercase">{{ $review->project->type }}</span>
                    </td>
                    <td class="px-6 py-5">
                        <div class="font-bold text-on-surface">{{ $review->reviewer_name }}</div>
                        <div class="text-xs text-on-surface-variant font-label-sm">{{ $review->reviewer_email }}</div>
                        @if($review->reviewer_title)
                            <div class="text-xs text-secondary font-label-sm">{{ $review->reviewer_title }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-5 text-center">
                        <div class="flex justify-center gap-0.5 text-secondary">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' {{ $i <= $review->rating ? '1' : '0' }};">star</span>
                            @endfor
                        </div>
                        <span class="text-xs font-label-sm text-on-surface-variant">{{ $review->rating }}/5 Stars</span>
                    </td>
                    <td class="px-6 py-5">
                        <p class="text-sm text-on-surface max-w-xs truncate italic" title="{{ $review->comment }}">
                            "{{ Str::limit($review->comment, 60) }}"
                        </p>
                    </td>
                    <td class="px-6 py-5">
                        @if($review->status === 'accepted')
                            <span class="px-3 py-1 rounded-full text-xs font-label-sm bg-secondary-container text-on-secondary-container border border-secondary/20">Accepted</span>
                        @elseif($review->status === 'rejected')
                            <span class="px-3 py-1 rounded-full text-xs font-label-sm bg-error-container text-on-error-container border border-error/20">Rejected</span>
                        @else
                            <span class="px-3 py-1 rounded-full text-xs font-label-sm bg-surface-dim text-on-surface-variant border border-outline-variant/30">Pending</span>
                        @endif
                    </td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex justify-end items-center gap-2">
                            <!-- Show details button -->
                            <a href="{{ route('admin.reviews.show', $review->id) }}" class="p-2 text-on-surface-variant hover:text-primary transition-colors flex items-center" title="View Detail">
                                <span class="material-symbols-outlined text-lg">visibility</span>
                            </a>

                            <!-- Accept button -->
                            @if($review->status !== 'accepted')
                                <form action="{{ route('admin.reviews.accept', $review->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="p-2 text-primary hover:text-primary-fixed-dim transition-colors flex items-center" title="Approve Review">
                                        <span class="material-symbols-outlined text-lg">check_circle</span>
                                    </button>
                                </form>
                            @endif

                            <!-- Reject button -->
                            @if($review->status !== 'rejected')
                                <form action="{{ route('admin.reviews.reject', $review->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="p-2 text-tertiary hover:text-tertiary-container transition-colors flex items-center" title="Reject Review">
                                        <span class="material-symbols-outlined text-lg">cancel</span>
                                    </button>
                                </form>
                            @endif

                            <!-- Delete button -->
                            <form action="{{ route('admin.reviews.delete', $review->id) }}" method="POST" class="inline swal-delete-form" data-confirm-msg="Are you sure you want to delete this review completely? This action cannot be undone.">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-error hover:text-error-container transition-colors flex items-center" title="Delete Review">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-8 py-10 text-center text-on-surface-variant">No reviews or feedbacks submitted yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

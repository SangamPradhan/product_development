@extends('Admin.templates.show')

@section('show_title', 'Inquiry #' . $contact->id)
@section('show_subtitle', 'Enterprise Message Profile & Status Diagnostics')

@section('show_actions')
<form action="{{ route('admin.contacts.delete', $contact->id) }}" method="POST" class="swal-delete-form inline" data-confirm-msg="Are you sure you want to delete this contact message record?">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-error-container text-error border border-error/20 px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-error-container/30 transition-all active:scale-95 font-label-sm text-sm uppercase tracking-wider">
        <span class="material-symbols-outlined text-sm">delete</span>
        <span>Delete Message</span>
    </button>
</form>
@endsection

@section('show_content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
    <!-- Message Details (Left) -->
    <div class="lg:col-span-8 space-y-6">
        <!-- Message Core Information Card -->
        <div class="bg-surface p-6 rounded-xl border border-outline space-y-4">
            <h3 class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider border-b border-outline pb-2">Sender Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block">Sender Name</span>
                    <p class="font-bold text-lg text-on-surface mt-0.5">{{ $contact->fullName }}</p>
                </div>
                <div>
                    <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block">Email Address</span>
                    <a href="mailto:{{ $contact->email }}" class="font-bold text-lg text-primary mt-0.5 hover:underline flex items-center gap-1.5">
                        {{ $contact->email }}
                        <span class="material-symbols-outlined text-sm">mail</span>
                    </a>
                </div>
                <div>
                    <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block">First Name</span>
                    <p class="font-bold text-on-surface mt-0.5">{{ $contact->first_name }}</p>
                </div>
                <div>
                    <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block">Last Name</span>
                    <p class="font-bold text-on-surface mt-0.5">{{ $contact->last_name }}</p>
                </div>
            </div>
        </div>

        <!-- Full Message Content -->
        <div class="bg-surface p-6 rounded-xl border border-outline space-y-3">
            <h3 class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider border-b border-outline pb-2">Message Body</h3>
            <p class="text-body-md text-on-surface whitespace-pre-line leading-relaxed italic">
                "{{ $contact->message }}"
            </p>
        </div>
    </div>

    <!-- Metadata Sidebar (Right) -->
    <div class="lg:col-span-4 space-y-6">
        <div class="bg-surface-container-low p-6 rounded-xl border border-outline space-y-6">
            <h3 class="font-bold text-on-surface border-b border-outline pb-3 font-label-sm uppercase tracking-wider flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">info</span>
                Inquiry Classification
            </h3>

            <!-- Classification Category -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Inquiry Type</span>
                <span class="px-3 py-1.5 rounded-full text-xs font-label-sm bg-secondary-container text-on-secondary-container border border-secondary/20 uppercase font-bold tracking-wider inline-block">
                    {{ str_replace('_', ' ', $contact->type) }}
                </span>
            </div>

            <!-- Date and Time -->
            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Received Date</span>
                <p class="font-bold text-on-surface">{{ $contact->created_at->format('M d, Y') }}</p>
                <p class="text-xs text-on-surface-variant font-label-sm mt-0.5">{{ $contact->created_at->format('h:i A') }} ({{ $contact->created_at->diffForHumans() }})</p>
            </div>

            <!-- Reply Button -->
            <div class="pt-4 border-t border-outline">
                <a href="mailto:{{ $contact->email }}?subject=Re: Inquiry #{{ $contact->id }} regarding {{ str_replace('_', ' ', $contact->type) }}" class="w-full bg-primary text-on-primary px-6 py-3 rounded-lg flex items-center justify-center gap-2 hover:bg-primary/95 transition-all active:scale-95 shadow-sm font-label-sm text-sm uppercase tracking-wider">
                    <span class="material-symbols-outlined text-sm">reply</span>
                    <span>Compose Response</span>
                </a>
            </div>

            <!-- Timestamp Logs -->
            <div class="pt-4 border-t border-outline text-xs text-on-surface-variant space-y-1 font-label-sm">
                <p>Record ID: #{{ $contact->id }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

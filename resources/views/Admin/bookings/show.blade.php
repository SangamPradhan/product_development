@extends('Admin.templates.show')

@section('show_title', 'Booking #' . $booking->id)
@section('show_subtitle', 'Attendee Parameters & Event Assignment')

@section('show_actions')
<form action="{{ route('admin.bookings.delete', $booking->id) }}" method="POST" class="swal-delete-form inline" data-confirm-msg="Are you sure you want to delete this event booking record?">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-error-container text-error border border-error/20 px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-error-container/30 transition-all active:scale-95 font-label-sm text-sm uppercase tracking-wider">
        <span class="material-symbols-outlined text-sm">delete</span>
        <span>Delete Booking</span>
    </button>
</form>
@endsection

@section('show_content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
    <!-- Attendee Details (Left) -->
    <div class="lg:col-span-8 space-y-6">
        <!-- Attendee Core Information Card -->
        <div class="bg-surface p-6 rounded-xl border border-outline space-y-4">
            <h3 class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider border-b border-outline pb-2">Attendee Contact Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block">Attendee Name</span>
                    <p class="font-bold text-lg text-on-surface mt-0.5">{{ $booking->name }}</p>
                </div>
                <div>
                    <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block">Seats Booked</span>
                    <p class="font-bold text-lg text-primary mt-0.5">{{ $booking->seats }} {{ Str::plural('Seat', $booking->seats) }}</p>
                </div>
                <div>
                    <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block">Email Address</span>
                    <p class="font-bold text-on-surface mt-0.5">{{ $booking->email }}</p>
                </div>
                <div>
                    <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block">Phone Number</span>
                    <p class="font-bold text-on-surface mt-0.5">{{ $booking->phone }}</p>
                </div>
            </div>
        </div>

        <!-- Special Request / Message -->
        <div class="bg-surface-container-low p-6 rounded-xl border border-outline">
            <h3 class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider mb-2">Special Requests / Notes</h3>
            @if($booking->message)
                <p class="text-body-md text-on-surface italic leading-relaxed">
                    "{{ $booking->message }}"
                </p>
            @else
                <p class="text-sm text-on-surface-variant italic">
                    No special requests or messages submitted.
                </p>
            @endif
        </div>
    </div>

    <!-- Assigned Event (Right) -->
    <div class="lg:col-span-4 space-y-6">
        <div class="bg-surface-container-low p-6 rounded-xl border border-outline space-y-6">
            <h3 class="font-bold text-on-surface border-b border-outline pb-3 font-label-sm uppercase tracking-wider flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">event_note</span>
                Assigned Event
            </h3>

            <div>
                <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Event Title</span>
                @if($booking->event)
                    <p class="font-bold text-on-surface">{{ $booking->event->title }}</p>
                    <span class="px-2 py-0.5 mt-1 inline-block rounded bg-surface border border-outline text-on-surface-variant font-label-sm text-[10px] uppercase">{{ $booking->event->category }}</span>
                @else
                    <p class="text-error font-bold italic">Orphaned Booking (Event Deleted)</p>
                @endif
            </div>

            @if($booking->event)
                <!-- Date & Location -->
                <div>
                    <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Date & Time</span>
                    <p class="font-bold text-on-surface">{{ $booking->event->event_date->format('M d, Y') }}</p>
                    <p class="text-xs text-on-surface-variant font-label-sm">{{ $booking->event->event_date->format('h:i A') }}</p>
                </div>

                <div>
                    <span class="text-xs text-on-surface-variant font-label-sm uppercase tracking-wider block mb-1">Venue Location</span>
                    <p class="font-bold text-sm text-on-surface">{{ $booking->event->location }}</p>
                </div>
                
                <div class="pt-4 border-t border-outline text-center">
                    <a href="{{ route('admin.events.show', $booking->event_id) }}" class="inline-flex items-center gap-2 text-primary hover:text-primary-container font-label-sm text-xs uppercase tracking-wider font-bold">
                        View Event Configuration
                        <span class="material-symbols-outlined text-sm">open_in_new</span>
                    </a>
                </div>
            @endif

            <!-- Timestamp Logs -->
            <div class="pt-4 border-t border-outline text-xs text-on-surface-variant space-y-1 font-label-sm">
                <p>Booking ID: #{{ $booking->id }}</p>
                <p>Registered: {{ $booking->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

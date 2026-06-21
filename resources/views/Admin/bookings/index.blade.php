@extends('Admin.layouts.app')

@section('title', 'Manage Event Bookings')

@section('content')
<!-- Page Header -->
<div class="flex justify-between items-end mb-12">
    <div>
        <h1 class="font-headline-lg text-headline-lg text-on-surface leading-none mb-2">Event Bookings</h1>
        <p class="text-on-surface-variant font-label-sm uppercase tracking-wider">Review and manage attendees for your events</p>
    </div>
</div>

<!-- Control Bar -->
<div class="flex flex-wrap items-center gap-4 mb-8 bg-surface-container-low p-4 rounded-xl border border-outline/50">
    <div class="text-on-surface-variant font-label-sm text-[10px] uppercase tracking-widest">
        Showing {{ count($bookings) }} bookings
    </div>
</div>

<!-- Bookings Table with Angled Notch -->
<div class="bg-surface border border-outline angled-notch relative overflow-x-auto">
    <table class="w-full text-left border-collapse min-w-[900px]">
        <thead>
            <tr class="bg-surface-variant/30 text-on-surface-variant font-label-sm border-b border-outline uppercase tracking-wider">
                <th class="px-8 py-5 font-bold">Attendee Info</th>
                <th class="px-6 py-5 font-bold">Event Title</th>
                <th class="px-6 py-5 font-bold">Event Date</th>
                <th class="px-6 py-5 font-bold text-center">Seats Booked</th>
                <th class="px-6 py-5 font-bold">Special Requests</th>
                <th class="px-8 py-5 font-bold text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-outline">
            @forelse($bookings as $booking)
                <tr class="hover:bg-surface-container-low/30 transition-colors">
                    <td class="px-8 py-5">
                        <div class="font-bold text-on-surface">{{ $booking->name }}</div>
                        <div class="text-xs text-on-surface-variant font-label-sm">{{ $booking->email }}</div>
                        <div class="text-xs text-secondary font-label-sm">{{ $booking->phone }}</div>
                    </td>
                    <td class="px-6 py-5">
                        <span class="font-bold text-on-surface">{{ $booking->event->title }}</span>
                        <span class="block text-xs text-on-surface-variant font-label-sm uppercase">{{ $booking->event->category }}</span>
                    </td>
                    <td class="px-6 py-5">
                        <div class="text-sm text-on-surface font-bold">{{ $booking->event->event_date->format('M d, Y') }}</div>
                        <div class="text-xs text-on-surface-variant font-label-sm">{{ $booking->event->event_date->format('h:i A') }}</div>
                    </td>
                    <td class="px-6 py-5 text-center">
                        <span class="px-3 py-1 rounded-full text-xs font-label-sm bg-secondary-container text-on-secondary-container border border-secondary/20 font-bold">
                            {{ $booking->seats }} {{ Str::plural('Seat', $booking->seats) }}
                        </span>
                    </td>
                    <td class="px-6 py-5">
                        @if($booking->message)
                            <p class="text-sm text-on-surface max-w-xs truncate italic" title="{{ $booking->message }}">
                                "{{ Str::limit($booking->message, 80) }}"
                            </p>
                        @else
                            <span class="text-xs text-outline font-label-sm italic">None</span>
                        @endif
                    </td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex justify-end items-center gap-2">
                            <!-- View Action -->
                            <a href="{{ route('admin.bookings.show', $booking->id) }}" class="p-2 text-on-surface-variant hover:scale-110 transition-transform flex items-center" title="View Booking Details">
                                <span class="material-symbols-outlined text-lg">visibility</span>
                            </a>
                            <!-- Delete form with SweetAlert confirmation -->
                            <form action="{{ route('admin.bookings.delete', $booking->id) }}" method="POST" class="swal-delete-form inline" data-confirm-msg="Are you sure you want to delete this event booking record?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-error hover:scale-110 transition-transform flex items-center" title="Delete Booking">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-8 py-12 text-center text-on-surface-variant font-label-sm italic">
                        No bookings found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

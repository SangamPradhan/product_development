@extends('Admin.layouts.app')

@section('title', 'Manage Contact Inquiries')

@section('content')
<!-- Page Header -->
<div class="flex justify-between items-end mb-12">
    <div>
        <h1 class="font-headline-lg text-headline-lg text-on-surface leading-none mb-2">Contact Inquiries</h1>
        <p class="text-on-surface-variant font-label-sm uppercase tracking-wider">Manage enterprise inquiries and customer messages</p>
    </div>
</div>

<!-- Control Bar -->
<div class="flex flex-wrap items-center gap-4 mb-8 bg-surface-container-low p-4 rounded-xl border border-outline/50">
    <div class="text-on-surface-variant font-label-sm text-[10px] uppercase tracking-widest">
        Showing {{ count($contacts) }} inquiries
    </div>
</div>

<!-- Inquiries Table with Angled Notch -->
<div class="bg-surface border border-outline angled-notch relative overflow-x-auto">
    <table class="w-full text-left border-collapse min-w-[900px]">
        <thead>
            <tr class="bg-surface-variant/30 text-on-surface-variant font-label-sm border-b border-outline uppercase tracking-wider">
                <th class="px-8 py-5 font-bold">Contact Info</th>
                <th class="px-6 py-5 font-bold">Inquiry Type</th>
                <th class="px-6 py-5 font-bold">Message</th>
                <th class="px-6 py-5 font-bold">Received Date</th>
                <th class="px-8 py-5 font-bold text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-outline">
            @forelse($contacts as $contact)
                <tr class="hover:bg-surface-container-low/30 transition-colors">
                    <td class="px-8 py-5">
                        <div class="font-bold text-on-surface">{{ $contact->fullName }}</div>
                        <div class="text-xs text-on-surface-variant font-label-sm">{{ $contact->email }}</div>
                    </td>
                    <td class="px-6 py-5">
                        <span class="px-3 py-1 rounded-full text-xs font-label-sm bg-secondary-container text-on-secondary-container border border-secondary/20 uppercase font-bold">
                            {{ str_replace('_', ' ', $contact->type) }}
                        </span>
                    </td>
                    <td class="px-6 py-5">
                        <p class="text-sm text-on-surface max-w-lg italic whitespace-pre-line" title="{{ $contact->message }}">
                            "{{ Str::limit($contact->message, 150) }}"
                        </p>
                    </td>
                    <td class="px-6 py-5">
                        <div class="text-sm text-on-surface font-bold">{{ $contact->created_at->format('M d, Y') }}</div>
                        <div class="text-xs text-on-surface-variant font-label-sm">{{ $contact->created_at->format('h:i A') }}</div>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex justify-end items-center gap-2">
                            <!-- Delete form with SweetAlert confirmation -->
                            <form action="{{ route('admin.contacts.delete', $contact->id) }}" method="POST" class="swal-delete-form inline" data-confirm-msg="Are you sure you want to delete this contact message record?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-error hover:scale-110 transition-transform flex items-center" title="Delete Inquiry">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-8 py-12 text-center text-on-surface-variant font-label-sm italic">
                        No inquiries received yet.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

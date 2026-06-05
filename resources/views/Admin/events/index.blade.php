@extends('Admin.templates.index')

@section('table_headers')
    <th class="px-8 py-5 font-bold">Event Details</th>
    <th class="px-6 py-5 font-bold">Category</th>
    <th class="px-6 py-5 font-bold">Date & Time</th>
    <th class="px-6 py-5 font-bold">Location</th>
    <th class="px-6 py-5 font-bold">Featured</th>
@endsection

@section('table_rows')
    @forelse($items as $item)
        <tr class="group hover:bg-surface-variant/10 transition-colors">
            <td class="px-8 py-6">
                <div class="flex items-center gap-4">
                    @if($item->main_image)
                        <img src="{{ $item->main_image_url }}" class="w-12 h-12 rounded object-cover border border-outline">
                    @else
                        <div class="w-12 h-12 rounded bg-secondary-container flex items-center justify-center">
                            <span class="material-symbols-outlined text-on-secondary-container">event</span>
                        </div>
                    @endif
                    <div>
                        <h4 class="font-bold text-on-surface">{{ $item->title }}</h4>
                        <p class="text-xs text-on-surface-variant">Has {{ $item->images_count }} additional images</p>
                    </div>
                </div>
            </td>
            <td class="px-6 py-6 font-label-sm text-sm">
                {{ $item->category }}
            </td>
            <td class="px-6 py-6 font-label-sm text-sm">
                {{ $item->event_date->format('M d, Y h:i A') }}
            </td>
            <td class="px-6 py-6 font-body-md text-sm text-on-surface-variant">
                {{ $item->location }}
            </td>
            <td class="px-6 py-6">
                @if($item->is_featured)
                    <span class="px-3 py-1 rounded-full bg-primary-container/20 text-on-primary-container font-label-sm text-[10px] uppercase font-bold">
                        Yes
                    </span>
                @else
                    <span class="px-3 py-1 rounded-full bg-surface-variant text-on-surface-variant font-label-sm text-[10px] uppercase font-bold">
                        No
                    </span>
                @endif
            </td>
            <td class="px-8 py-6 text-right">
                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="{{ route('admin.events.edit', $item->id) }}" class="p-2 hover:bg-secondary-container rounded-lg text-primary transition-colors">
                        <span class="material-symbols-outlined text-base">edit</span>
                    </a>
                    <form action="{{ route('admin.events.destroy', $item->id) }}" method="POST" class="swal-delete-form" data-confirm-msg="Are you sure you want to remove this event?">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 hover:bg-error-container/20 rounded-lg text-error transition-colors">
                            <span class="material-symbols-outlined text-base">delete</span>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="px-8 py-10 text-center text-on-surface-variant font-label-sm uppercase">
                No events scheduled.
            </td>
        </tr>
    @endforelse
@endsection

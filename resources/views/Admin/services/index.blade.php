@extends('Admin.templates.index')

@section('table_headers')
    <th class="px-8 py-5 font-bold">Service Details</th>
    <th class="px-6 py-5 font-bold">Icon</th>
    <th class="px-6 py-5 font-bold">Status</th>
@endsection

@section('table_rows')
    @forelse($items as $item)
        <tr class="group hover:bg-surface-variant/10 transition-colors">
            <td class="px-8 py-6">
                <div class="flex items-center gap-4">
                    <div>
                        <h4 class="font-bold text-on-surface">{{ $item->title }}</h4>
                        <p class="text-sm text-on-surface-variant">{{ Str::limit(strip_tags($item->description), 60) }}</p>
                    </div>
                </div>
            </td>
            <td class="px-6 py-6">
                <span class="material-symbols-outlined text-primary">{{ $item->icon }}</span>
            </td>
            <td class="px-6 py-6">
                @if($item->status === 'Active')
                    <span class="px-3 py-1 rounded-full bg-primary-container/20 text-on-primary-container font-label-sm text-[10px] uppercase font-bold">
                        Active
                    </span>
                @else
                    <span class="px-3 py-1 rounded-full bg-error-container/20 text-on-error-container font-label-sm text-[10px] uppercase font-bold">
                        Inactive
                    </span>
                @endif
            </td>
            <td class="px-8 py-6 text-right">
                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="{{ route('admin.services.edit', $item->id) }}" class="p-2 hover:bg-secondary-container rounded-lg text-primary transition-colors">
                        <span class="material-symbols-outlined text-base">edit</span>
                    </a>
                    <form action="{{ route('admin.services.destroy', $item->id) }}" method="POST" class="swal-delete-form" data-confirm-msg="Are you sure you want to remove this service?">
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
            <td colspan="4" class="px-8 py-10 text-center text-on-surface-variant font-label-sm uppercase">
                No services added.
            </td>
        </tr>
    @endforelse
@endsection

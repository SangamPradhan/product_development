@extends('Admin.templates.index')

@section('header_actions')
    <div class="flex gap-3">
        <a href="{{ route('admin.gallery.create', ['type' => 'image']) }}" class="bg-primary text-on-primary px-5 py-3 rounded-lg flex items-center gap-2 hover:bg-primary/95 transition-all active:scale-95 shadow-sm font-label-sm text-sm uppercase tracking-wider">
            <span class="material-symbols-outlined">image</span>
            <span>Add Image</span>
        </a>
        <a href="{{ route('admin.gallery.create', ['type' => 'video']) }}" class="bg-surface-variant text-on-surface-variant px-5 py-3 rounded-lg flex items-center gap-2 hover:bg-surface-variant/90 transition-all active:scale-95 shadow-sm border border-outline font-label-sm text-sm uppercase tracking-wider">
            <span class="material-symbols-outlined">videocam</span>
            <span>Add Video</span>
        </a>
    </div>
@endsection

@section('table_headers')
    <th class="px-8 py-5 font-bold">Preview</th>
    <th class="px-6 py-5 font-bold">Title</th>
    <th class="px-6 py-5 font-bold">Type</th>
    <th class="px-6 py-5 font-bold">Source</th>
    <th class="px-6 py-5 font-bold">Category</th>
    <th class="px-6 py-5 font-bold">Featured</th>
@endsection

@section('table_rows')
    @forelse($items as $item)
        <tr class="group hover:bg-surface-variant/10 transition-colors">
            <td class="px-8 py-6">
                <img src="{{ $item->thumbnail_url }}" class="w-16 h-10 object-cover rounded border border-outline bg-secondary-container">
            </td>
            <td class="px-6 py-6 font-bold text-on-surface text-sm">
                {{ $item->title }}
            </td>
            <td class="px-6 py-6 font-label-sm text-sm">
                <span class="px-2 py-0.5 rounded text-[10px] uppercase font-bold {{ $item->type === 'video' ? 'bg-tertiary-fixed text-on-tertiary-fixed-variant' : 'bg-surface-container text-on-surface-variant' }}">
                    {{ $item->type }}
                </span>
            </td>
            <td class="px-6 py-6 font-label-sm text-sm">
                {{ $item->source }}
            </td>
            <td class="px-6 py-6 font-label-sm text-sm uppercase">
                {{ $item->category }}
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
                    <a href="{{ route('admin.gallery.show', $item->id) }}" class="p-2 hover:bg-surface-variant rounded-lg text-on-surface-variant transition-colors" title="View Gallery Item Details">
                        <span class="material-symbols-outlined text-base">visibility</span>
                    </a>
                    <a href="{{ route('admin.gallery.edit', $item->id) }}" class="p-2 hover:bg-secondary-container rounded-lg text-primary transition-colors">
                        <span class="material-symbols-outlined text-base">edit</span>
                    </a>
                    <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" class="swal-delete-form" data-confirm-msg="Are you sure you want to remove this gallery item?">
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
            <td colspan="7" class="px-8 py-10 text-center text-on-surface-variant font-label-sm uppercase">
                No items in gallery.
            </td>
        </tr>
    @endforelse
@endsection

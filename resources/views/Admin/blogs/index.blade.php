@extends('Admin.templates.index')

@section('table_headers')
    <th class="px-8 py-5 font-bold">Blog Details</th>
    <th class="px-6 py-5 font-bold">Author</th>
    <th class="px-6 py-5 font-bold">Categories</th>
    <th class="px-6 py-5 font-bold">Status</th>
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
                            <span class="material-symbols-outlined text-on-secondary-container">article</span>
                        </div>
                    @endif
                    <div>
                        <h4 class="font-bold text-on-surface">{{ $item->title }}</h4>
                        <p class="text-xs text-on-surface-variant">{{ Str::limit($item->summary, 60) }}</p>
                    </div>
                </div>
            </td>
            <td class="px-6 py-6 font-label-sm text-sm">
                {{ $item->author }}
            </td>
            <td class="px-6 py-6 font-label-sm text-sm">
                @if(is_array($item->categories))
                    @foreach($item->categories as $cat)
                        <span class="px-2 py-0.5 rounded bg-surface-container text-on-surface-variant text-[10px] mr-1">{{ $cat }}</span>
                    @endforeach
                @endif
            </td>
            <td class="px-6 py-6">
                @if($item->status === 'Published')
                    <span class="px-3 py-1 rounded-full bg-primary-container/20 text-on-primary-container font-label-sm text-[10px] uppercase font-bold">
                        Published
                    </span>
                @else
                    <span class="px-3 py-1 rounded-full bg-surface-variant text-on-surface-variant font-label-sm text-[10px] uppercase font-bold">
                        Draft
                    </span>
                @endif
            </td>
            <td class="px-8 py-6 text-right">
                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="{{ route('admin.blogs.edit', $item->id) }}" class="p-2 hover:bg-secondary-container rounded-lg text-primary transition-colors">
                        <span class="material-symbols-outlined text-base">edit</span>
                    </a>
                    <form action="{{ route('admin.blogs.destroy', $item->id) }}" method="POST" class="swal-delete-form" data-confirm-msg="Are you sure you want to remove this blog post?">
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
            <td colspan="5" class="px-8 py-10 text-center text-on-surface-variant font-label-sm uppercase">
                No blog posts added yet.
            </td>
        </tr>
    @endforelse
@endsection

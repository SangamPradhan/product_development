@extends('Admin.templates.index')

@section('table_headers')
    <th class="px-8 py-5 font-bold">Blog Details</th>
    <th class="px-6 py-5 font-bold">Status</th>
    <th class="px-6 py-5 font-bold">Health Score</th>
    <th class="px-6 py-5 font-bold">Timeline</th>
@endsection

@section('table_rows')
    @forelse($items as $item)
        <tr class="group hover:bg-surface-variant/10 transition-colors">
            <!-- Details -->
            <td class="px-8 py-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-lg bg-secondary-container flex items-center justify-center">
                        <span class="material-symbols-outlined text-on-secondary-container">neurology</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-on-surface">{{ $item->title }}</h4>
                        <p class="text-sm text-on-surface-variant">{{ $item->description }}</p>
                    </div>
                </div>
            </td>
            
            <!-- Status Badge -->
            <td class="px-6 py-6">
                @if($item->status == 'Active')
                    <span class="px-3 py-1 rounded-full bg-primary-container/20 text-on-primary-container font-label-sm text-[10px] uppercase font-bold">
                        Active
                    </span>
                @elseif($item->status == 'In Progress')
                    <span class="px-3 py-1 rounded-full bg-secondary-container/40 text-on-secondary-container font-label-sm text-[10px] uppercase font-bold">
                        In Progress
                    </span>
                @else
                    <span class="px-3 py-1 rounded-full bg-surface-variant text-on-surface-variant font-label-sm text-[10px] uppercase font-bold">
                        Paused
                    </span>
                @endif
            </td>
            
            <!-- Health progress bar -->
            <td class="px-6 py-6">
                <div class="flex items-center gap-2">
                    <div class="w-24 h-1.5 bg-surface-variant rounded-full overflow-hidden">
                        <div class="h-full bg-primary" style="width: {{ $item->health }}%"></div>
                    </div>
                    <span class="text-xs font-label-sm text-primary">{{ $item->health }}%</span>
                </div>
            </td>
            
            <!-- Timeline Date -->
            <td class="px-6 py-6 font-label-sm text-sm">
                {{ $item->timeline }}
            </td>
            
            <!-- Action buttons -->
            <td class="px-8 py-6 text-right">
                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <!-- View Action -->
                    <a href="{{ route('admin.news.show', $item->id) }}" class="p-2 hover:bg-surface-variant rounded-lg text-on-surface-variant transition-colors" title="View Blog Details">
                        <span class="material-symbols-outlined text-base">visibility</span>
                    </a>
                    <!-- Edit Action -->
                    <a href="{{ route('admin.news.edit', $item->id) }}" class="p-2 hover:bg-secondary-container rounded-lg text-primary transition-colors">
                        <span class="material-symbols-outlined text-base">edit</span>
                    </a>
                    
                    <!-- Delete Action -->
                    <form action="{{ route('admin.news.delete', $item->id) }}" method="POST" class="swal-delete-form" data-confirm-msg="Are you sure you want to remove this blog entry?">
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
                No articles seeded or published.
            </td>
        </tr>
    @endforelse
@endsection

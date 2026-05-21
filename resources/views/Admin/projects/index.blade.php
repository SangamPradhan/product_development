@extends('Admin.templates.index')

@section('table_headers')
    <th class="px-8 py-5 font-bold">Project Details</th>
    <th class="px-6 py-5 font-bold">Status</th>
    <th class="px-6 py-5 font-bold">Client</th>
    <th class="px-6 py-5 font-bold">Tags</th>
@endsection

@section('table_rows')
    @forelse($items as $item)
        <tr class="group hover:bg-surface-variant/10 transition-colors">
            <!-- Details -->
            <td class="px-8 py-6">
                <div class="flex items-center gap-4">
                    @if($item->featured_image_url)
                        <div class="w-16 h-16 rounded-lg overflow-hidden shrink-0">
                            <img src="{{ $item->featured_image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="w-16 h-16 rounded-lg bg-secondary-container flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-on-secondary-container">folder_special</span>
                        </div>
                    @endif
                    <div>
                        <h4 class="font-bold text-on-surface">{{ $item->title }}</h4>
                        <p class="text-xs text-secondary mt-1 font-bold">{{ $item->type }}</p>
                        <p class="text-sm text-on-surface-variant line-clamp-1 mt-1">{{ $item->subtitle }}</p>
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
                        {{ $item->status ?? 'Paused' }}
                    </span>
                @endif
                
                @if($item->is_featured)
                    <div class="mt-2">
                        <span class="px-2 py-0.5 rounded bg-tertiary-fixed text-on-tertiary-fixed-variant font-label-sm text-[9px] uppercase font-bold">
                            Featured
                        </span>
                    </div>
                @endif
            </td>
            
            <!-- Client -->
            <td class="px-6 py-6 text-sm text-on-surface">
                {{ $item->client ?? '-' }}
            </td>
            
            <!-- Tags -->
            <td class="px-6 py-6">
                <div class="flex flex-wrap gap-1">
                    @if($item->tags)
                        @foreach(explode(',', $item->tags) as $tag)
                            <span class="px-2 py-0.5 rounded border border-outline text-on-surface-variant font-label-sm text-[10px] uppercase">
                                {{ trim($tag) }}
                            </span>
                        @endforeach
                    @else
                        -
                    @endif
                </div>
            </td>
            
            <!-- Action buttons -->
            <td class="px-8 py-6 text-right">
                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <!-- View Frontend Action -->
                    <a href="{{ route('front.project.detail', $item->slug) }}" target="_blank" class="p-2 hover:bg-surface-variant rounded-lg text-on-surface-variant transition-colors" title="View Project">
                        <span class="material-symbols-outlined text-base">visibility</span>
                    </a>

                    <!-- Edit Action -->
                    <a href="{{ route('admin.projects.edit', $item->id) }}" class="p-2 hover:bg-secondary-container rounded-lg text-primary transition-colors">
                        <span class="material-symbols-outlined text-base">edit</span>
                    </a>
                    
                    <!-- Delete Action -->
                    <form action="{{ route('admin.projects.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this project?');">
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
                No projects found.
            </td>
        </tr>
    @endforelse
@endsection

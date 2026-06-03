@if($items->hasPages())
    <div class="flex items-center justify-center gap-4 mt-10">

        {{-- Prev button --}}
        @if($items->onFirstPage())
            <span class="w-12 h-12 flex items-center justify-center rounded-full border border-outline-variant text-on-surface-variant opacity-40 cursor-not-allowed">
                <span class="material-symbols-outlined">chevron_left</span>
            </span>
        @else
            <button onclick="loadSection('{{ $section }}', {{ $items->currentPage() - 1 }})"
                    class="w-12 h-12 flex items-center justify-center rounded-full border border-outline-variant text-on-surface-variant hover:border-secondary hover:text-secondary transition-all">
                <span class="material-symbols-outlined">chevron_left</span>
            </button>
        @endif

        {{-- Page numbers --}}
        <div class="flex gap-2">
            @foreach($items->getUrlRange(1, $items->lastPage()) as $page => $url)
                <button onclick="loadSection('{{ $section }}', {{ $page }})"
                        class="w-12 h-12 flex items-center justify-center rounded-full font-label-sm text-label-sm transition-all
                               {{ $page == $items->currentPage()
                                    ? 'bg-secondary text-on-secondary'
                                    : 'border border-outline-variant text-on-surface-variant hover:border-secondary hover:text-secondary' }}">
                    {{ str_pad($page, 2, '0', STR_PAD_LEFT) }}
                </button>
            @endforeach
        </div>

        {{-- Next button --}}
        @if($items->hasMorePages())
            <button onclick="loadSection('{{ $section }}', {{ $items->currentPage() + 1 }})"
                    class="w-12 h-12 flex items-center justify-center rounded-full border border-outline-variant text-on-surface-variant hover:border-secondary hover:text-secondary transition-all">
                <span class="material-symbols-outlined">chevron_right</span>
            </button>
        @else
            <span class="w-12 h-12 flex items-center justify-center rounded-full border border-outline-variant text-on-surface-variant opacity-40 cursor-not-allowed">
                <span class="material-symbols-outlined">chevron_right</span>
            </span>
        @endif

    </div>
@endif
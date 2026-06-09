<!-- TopNavBar -->
<nav data-aos="fade-down" data-aos-duration="1000" data-aos-offset="0" class="fixed top-4 left-0 right-0 mx-auto w-[90%] max-w-7xl z-50 flex justify-between items-center px-8 py-3 rounded-full border border-outline-variant/20 bg-surface/90 dark:bg-surface-dim/90 backdrop-blur-xl transition-all duration-200">
    <a href="{{ route('front.home') }}" class="text-headline-md font-headline-md font-bold text-secondary">AI-Solutions</a>
    <div class="hidden md:flex items-center gap-8">
        <a class="text-label-sm font-label-sm {{ request()->routeIs('front.about') ? 'text-secondary font-bold border-b-2 border-secondary' : 'text-on-surface-variant hover:text-secondary' }} transition-colors" href="{{ route('front.about') }}">About Us</a>
        <a class="text-label-sm font-label-sm {{ request()->routeIs('front.services') ? 'text-secondary font-bold border-b-2 border-secondary' : 'text-on-surface-variant hover:text-secondary' }} transition-colors" href="{{ route('front.services') }}">Services</a>
        <a class="text-label-sm font-label-sm {{ request()->routeIs('front.projects') || request()->routeIs('front.project.detail') ? 'text-secondary font-bold border-b-2 border-secondary' : 'text-on-surface-variant hover:text-secondary' }} transition-colors" href="{{ route('front.projects') }}">Projects</a>
        <a class="text-label-sm font-label-sm {{ request()->routeIs('front.events') || request()->routeIs('front.event.detail') ? 'text-secondary font-bold border-b-2 border-secondary' : 'text-on-surface-variant hover:text-secondary' }} transition-colors" href="{{ route('front.events') }}">Events</a>
        
        <!-- More Dropdown -->
        <div class="relative group dropdown-container">
            <button class="flex items-center gap-1 text-label-sm font-label-sm {{ request()->routeIs('front.blogs') || request()->routeIs('front.blog.detail') || request()->routeIs('front.gallery') ? 'text-secondary font-bold' : 'text-on-surface-variant hover:text-secondary' }} transition-colors outline-none">
                More
                <span class="material-symbols-outlined text-sm transition-transform duration-300 group-hover:rotate-180">keyboard_arrow_down</span>
            </button>
            <div class="absolute left-1/2 -translate-x-1/2 top-full pt-3 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-300 transform scale-95 group-hover:scale-100 origin-top z-50">
                <div class="w-40 rounded-2xl border border-outline-variant/30 bg-surface/95 dark:bg-surface-dim/95 backdrop-blur-xl p-2 shadow-xl flex flex-col gap-1">
                    <a class="px-4 py-2.5 rounded-xl text-label-sm font-label-sm text-on-surface-variant hover:text-secondary hover:bg-surface-variant/10 transition-all {{ request()->routeIs('front.blogs') || request()->routeIs('front.blog.detail') ? 'text-secondary bg-surface-variant/5 font-bold' : '' }}" href="{{ route('front.blogs') }}">Blogs</a>
                    <a class="px-4 py-2.5 rounded-xl text-label-sm font-label-sm text-on-surface-variant hover:text-secondary hover:bg-surface-variant/10 transition-all {{ request()->routeIs('front.gallery') ? 'text-secondary bg-surface-variant/5 font-bold' : '' }}" href="{{ route('front.gallery') }}">Gallery</a>
                </div>
            </div>
        </div>

        <a class="text-label-sm font-label-sm {{ request()->routeIs('front.contact') ? 'text-secondary font-bold border-b-2 border-secondary' : 'text-on-surface-variant hover:text-secondary' }} transition-colors" href="{{ route('front.contact') }}">Contact</a>
    </div>
    <a href="{{ route('front.contact') }}" class="notch-button bg-secondary text-white px-6 py-2.5 font-label-sm text-label-sm hover:bg-on-secondary-fixed-variant transition-all hover-glow inline-block">Get Started</a>
</nav>

<!-- Responsive Floating Left Sidebar for Mobile/Tablet views -->
<div class="md:hidden fixed left-4 top-1/2 -translate-y-1/2 z-50 flex items-center group/sidebar">
    <div class="h-auto w-14 group-hover/sidebar:w-48 bg-surface-dim/95 border border-outline-variant/30 backdrop-blur-2xl rounded-full py-6 flex flex-col items-center gap-5 shadow-2xl transition-all duration-300 ease-out overflow-hidden">
        
        <!-- Home Link -->
        <a href="{{ route('front.home') }}" class="flex items-center w-full px-4 justify-start gap-4 text-on-surface-variant hover:text-secondary transition-all">
            <div class="w-6 h-6 flex items-center justify-center">
                <span class="material-symbols-outlined text-lg {{ request()->routeIs('front.home') ? 'text-secondary' : '' }}">home</span>
            </div>
            <span class="text-sm font-bold opacity-0 group-hover/sidebar:opacity-100 whitespace-nowrap transition-opacity duration-300 {{ request()->routeIs('front.home') ? 'text-secondary' : '' }}">Home</span>
        </a>

        <!-- About Us Link -->
        <a href="{{ route('front.about') }}" class="flex items-center w-full px-4 justify-start gap-4 text-on-surface-variant hover:text-secondary transition-all">
            <div class="w-6 h-6 flex items-center justify-center">
                <span class="material-symbols-outlined text-lg {{ request()->routeIs('front.about') ? 'text-secondary' : '' }}">info</span>
            </div>
            <span class="text-sm font-bold opacity-0 group-hover/sidebar:opacity-100 whitespace-nowrap transition-opacity duration-300 {{ request()->routeIs('front.about') ? 'text-secondary' : '' }}">About Us</span>
        </a>

        <!-- Services Link -->
        <a href="{{ route('front.services') }}" class="flex items-center w-full px-4 justify-start gap-4 text-on-surface-variant hover:text-secondary transition-all">
            <div class="w-6 h-6 flex items-center justify-center">
                <span class="material-symbols-outlined text-lg {{ request()->routeIs('front.services') ? 'text-secondary' : '' }}">hub</span>
            </div>
            <span class="text-sm font-bold opacity-0 group-hover/sidebar:opacity-100 whitespace-nowrap transition-opacity duration-300 {{ request()->routeIs('front.services') ? 'text-secondary' : '' }}">Services</span>
        </a>

        <!-- Projects Link -->
        <a href="{{ route('front.projects') }}" class="flex items-center w-full px-4 justify-start gap-4 text-on-surface-variant hover:text-secondary transition-all">
            <div class="w-6 h-6 flex items-center justify-center">
                <span class="material-symbols-outlined text-lg {{ request()->routeIs('front.projects') || request()->routeIs('front.project.detail') ? 'text-secondary' : '' }}">terminal</span>
            </div>
            <span class="text-sm font-bold opacity-0 group-hover/sidebar:opacity-100 whitespace-nowrap transition-opacity duration-300 {{ request()->routeIs('front.projects') || request()->routeIs('front.project.detail') ? 'text-secondary' : '' }}">Projects</span>
        </a>

        <!-- Events Link -->
        <a href="{{ route('front.events') }}" class="flex items-center w-full px-4 justify-start gap-4 text-on-surface-variant hover:text-secondary transition-all">
            <div class="w-6 h-6 flex items-center justify-center">
                <span class="material-symbols-outlined text-lg {{ request()->routeIs('front.events') || request()->routeIs('front.event.detail') ? 'text-secondary' : '' }}">event</span>
            </div>
            <span class="text-sm font-bold opacity-0 group-hover/sidebar:opacity-100 whitespace-nowrap transition-opacity duration-300 {{ request()->routeIs('front.events') || request()->routeIs('front.event.detail') ? 'text-secondary' : '' }}">Events</span>
        </a>

        <!-- Blogs Link -->
        <a href="{{ route('front.blogs') }}" class="flex items-center w-full px-4 justify-start gap-4 text-on-surface-variant hover:text-secondary transition-all">
            <div class="w-6 h-6 flex items-center justify-center">
                <span class="material-symbols-outlined text-lg {{ request()->routeIs('front.blogs') || request()->routeIs('front.blog.detail') ? 'text-secondary' : '' }}">neurology</span>
            </div>
            <span class="text-sm font-bold opacity-0 group-hover/sidebar:opacity-100 whitespace-nowrap transition-opacity duration-300 {{ request()->routeIs('front.blogs') || request()->routeIs('front.blog.detail') ? 'text-secondary' : '' }}">Blogs</span>
        </a>

        <!-- Gallery Link -->
        <a href="{{ route('front.gallery') }}" class="flex items-center w-full px-4 justify-start gap-4 text-on-surface-variant hover:text-secondary transition-all">
            <div class="w-6 h-6 flex items-center justify-center">
                <span class="material-symbols-outlined text-lg {{ request()->routeIs('front.gallery') ? 'text-secondary' : '' }}">photo_library</span>
            </div>
            <span class="text-sm font-bold opacity-0 group-hover/sidebar:opacity-100 whitespace-nowrap transition-opacity duration-300 {{ request()->routeIs('front.gallery') ? 'text-secondary' : '' }}">Gallery</span>
        </a>

        <!-- Contact Link -->
        <a href="{{ route('front.contact') }}" class="flex items-center w-full px-4 justify-start gap-4 text-on-surface-variant hover:text-secondary transition-all">
            <div class="w-6 h-6 flex items-center justify-center">
                <span class="material-symbols-outlined text-lg {{ request()->routeIs('front.contact') ? 'text-secondary' : '' }}">alternate_email</span>
            </div>
            <span class="text-sm font-bold opacity-0 group-hover/sidebar:opacity-100 whitespace-nowrap transition-opacity duration-300 {{ request()->routeIs('front.contact') ? 'text-secondary' : '' }}">Contact</span>
        </a>

    </div>
</div>

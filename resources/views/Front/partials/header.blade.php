<!-- TopNavBar -->
<nav data-aos="fade-down" data-aos-duration="1000" data-aos-offset="0" class="fixed top-4 left-0 right-0 mx-auto w-[90%] max-w-7xl z-50 flex justify-between items-center px-8 py-3 rounded-full border border-outline-variant/20 bg-surface/90 dark:bg-surface-dim/90 backdrop-blur-xl transition-all duration-200">
    <a href="{{ route('front.home') }}" class="text-headline-md font-headline-md font-bold text-on-surface">AI-Solutions</a>
    <div class="hidden md:flex items-center gap-8">
        <a class="text-label-sm font-label-sm {{ request()->routeIs('front.services') ? 'text-secondary font-bold border-b-2 border-secondary' : 'text-on-surface-variant hover:text-secondary' }} transition-colors" href="{{ route('front.services') }}">Services</a>
        <a class="text-label-sm font-label-sm {{ request()->routeIs('front.about') ? 'text-secondary font-bold border-b-2 border-secondary' : 'text-on-surface-variant hover:text-secondary' }} transition-colors" href="{{ route('front.about') }}">About Us</a>
        <a class="text-label-sm font-label-sm {{ request()->routeIs('front.blogs') || request()->routeIs('front.blog.detail') ? 'text-secondary font-bold border-b-2 border-secondary' : 'text-on-surface-variant hover:text-secondary' }} transition-colors" href="{{ route('front.blogs') }}">Blogs</a>
        <a class="text-label-sm font-label-sm {{ request()->routeIs('front.projects') || request()->routeIs('front.project.detail') ? 'text-secondary font-bold border-b-2 border-secondary' : 'text-on-surface-variant hover:text-secondary' }} transition-colors" href="{{ route('front.projects') }}">Projects</a>
        <a class="text-label-sm font-label-sm {{ request()->routeIs('front.events') || request()->routeIs('front.event.detail') ? 'text-secondary font-bold border-b-2 border-secondary' : 'text-on-surface-variant hover:text-secondary' }} transition-colors" href="{{ route('front.events') }}">Events</a>
        <a class="text-label-sm font-label-sm {{ request()->routeIs('front.contact') ? 'text-secondary font-bold border-b-2 border-secondary' : 'text-on-surface-variant hover:text-secondary' }} transition-colors" href="{{ route('front.contact') }}">Contact</a>
    </div>
    <a href="{{ route('front.contact') }}" class="bg-secondary text-white px-6 py-2 rounded-full font-label-sm text-label-sm hover:scale-95 transition-all">Get Started</a>
</nav>

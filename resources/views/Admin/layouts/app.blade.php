<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    
    <meta name="admin-login-url" content="{{ route('admin.login') }}"/>
    <title>@yield('title', 'AI Solutions Admin') - AI Solutions</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Hanken+Grotesk:wght@600;700;800&amp;family=JetBrains+Mono:wght@500&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <!-- Quill Rich Text Editor -->
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet"/>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Quill Editor — block formatting context so it never overlaps siblings */
        .quill-editor-container {
            position: relative;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .ql-container.ql-snow {
            height: auto !important;
            border-bottom-left-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
            border: 1px solid #e2e8f0 !important;
            background-color: #eef6e8;
            flex: 1 1 auto;
        }
        .ql-toolbar.ql-snow {
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
            border: 1px solid #e2e8f0 !important;
            background-color: #e8f1e2;
            flex-shrink: 0;
            position: sticky;
            top: 0;
            z-index: 1;
        }
        .ql-editor {
            min-height: 180px;
            max-height: 400px;
            overflow-y: auto;
            font-family: inherit;
            font-size: 0.875rem;
        }
        .angled-notch {
            clip-path: polygon(0 0, calc(100% - 24px) 0, 100% 24px, 100% 100%, 24px 100%, 0 calc(100% - 24px));
        }
        .glass-dock {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #dde5d7;
            border-radius: 3px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #bccbb7;
        }
    </style>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-tertiary": "#ffffff",
                        "surface-variant": "#dde5d7",
                        "on-secondary-fixed": "#002105",
                        "on-tertiary-fixed": "#40000b",
                        "surface": "#ffffff",
                        "surface-container-highest": "#dde5d7",
                        "tertiary": "#a23b45",
                        "on-secondary-fixed-variant": "#005317",
                        "secondary-fixed": "#72fe7f",
                        "secondary-fixed-dim": "#53e166",
                        "on-tertiary-container": "#761926",
                        "background": "#f3fcee",
                        "tertiary-fixed": "#ffdada",
                        "inverse-surface": "#2b3229",
                        "on-primary-container": "#004813",
                        "on-surface": "#0d1117",
                        "surface-container-low": "#eef6e8",
                        "outline": "#e2e8f0",
                        "outline-variant": "#bccbb7",
                        "on-error-container": "#93000a",
                        "surface-dim": "#d4ddcf",
                        "primary-container": "#2cc14b",
                        "inverse-on-surface": "#ebf3e5",
                        "on-error": "#ffffff",
                        "on-primary-fixed": "#002105",
                        "surface-tint": "#006e22",
                        "secondary-container": "#6ffc7d",
                        "error-container": "#ffdad6",
                        "surface-container": "#e8f1e2",
                        "primary-fixed-dim": "#53e166",
                        "inverse-primary": "#53e166",
                        "primary": "#006e22",
                        "on-tertiary-fixed-variant": "#83232f",
                        "on-secondary": "#ffffff",
                        "surface-bright": "#f3fcee",
                        "surface-container-high": "#e2ebdd",
                        "on-surface-variant": "#3d4a3b",
                        "on-secondary-container": "#007324",
                        "primary-fixed": "#72fe7f",
                        "on-background": "#161d15",
                        "tertiary-fixed-dim": "#ffb3b5",
                        "on-primary": "#ffffff",
                        "on-primary-fixed-variant": "#005317",
                        "secondary": "#006e22",
                        "surface-container-lowest": "#ffffff",
                        "tertiary-container": "#ff828a",
                        "error": "#ba1a1a"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "gutter": "24px",
                        "margin-desktop": "80px",
                        "margin-mobile": "20px",
                        "base": "8px"
                    },
                    "fontFamily": {
                        "label-sm": ["JetBrains Mono"],
                        "body-md": ["Inter"],
                        "display-lg": ["Hanken Grotesk"],
                        "headline-lg": ["Hanken Grotesk"]
                    },
                    "fontSize": {
                        "label-sm": ["12px", {"lineHeight": "1.4", "letterSpacing": "0.05em", "fontWeight": "500"}],
                        "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "headline-lg": ["40px", {"lineHeight": "1.2", "fontWeight": "600"}]
                    }
                },
            },
        }
    </script>
    @stack('styles')
    @yield('css')
</head>
<body class="bg-background text-on-surface font-body-md overflow-x-hidden custom-scrollbar">

<!-- TopAppBar -->
<header class="bg-surface/90 backdrop-blur-md border-b border-outline fixed top-0 z-50 flex justify-between items-center w-full h-16 px-gutter max-w-full">
    <div class="flex items-center gap-4">
        <span class="font-headline-lg text-headline-lg font-bold text-primary tracking-tight">AI-Solutions</span>
        <div class="hidden md:flex items-center ml-8 space-x-6">
            <a class="{{ request()->routeIs('admin.dashboard') ? 'text-primary font-bold border-b-2 border-primary' : 'text-on-surface-variant hover:text-primary transition-colors' }} py-1 font-label-sm text-label-sm" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="{{ request()->routeIs('admin.blogs.*') ? 'text-primary font-bold border-b-2 border-primary' : 'text-on-surface-variant hover:text-primary transition-colors' }} py-1 font-label-sm text-label-sm" href="{{ route('admin.blogs.index') }}">Blogs</a>
            <a class="{{ request()->routeIs('admin.projects.*') ? 'text-primary font-bold border-b-2 border-primary' : 'text-on-surface-variant hover:text-primary transition-colors' }} py-1 font-label-sm text-label-sm" href="{{ route('admin.projects.index') }}">Projects</a>
            <a class="{{ request()->routeIs('admin.gallery.*') ? 'text-primary font-bold border-b-2 border-primary' : 'text-on-surface-variant hover:text-primary transition-colors' }} py-1 font-label-sm text-label-sm" href="{{ route('admin.gallery.index') }}">Gallery</a>
        </div>
    </div>
    
    <div class="flex items-center gap-4">
        <div class="hidden sm:flex items-center bg-surface-container-low px-3 py-1.5 rounded-lg border border-outline">
            <span class="material-symbols-outlined text-on-surface-variant mr-2">search</span>
            <input class="bg-transparent border-none focus:ring-0 text-label-sm font-label-sm p-0 w-48" placeholder="Search system data..." type="text"/>
        </div>
        <button class="material-symbols-outlined p-2 hover:bg-surface-variant/50 transition-colors text-on-surface-variant rounded-full">notifications</button>
        
        <!-- Profile Dropdown Component -->
        <div class="relative">
            <button id="profileDropdownBtn" class="flex items-center gap-2 focus:outline-none">
                <img alt="Admin User Profile" class="w-8 h-8 rounded-full border border-primary hover:scale-105 transition-transform" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBUPqABIdQxk6qQjhjJssSGCEaeGWsowAZPbx5DgIP6dBEQNOwzygr6KJokP9SqQL1tC1ep3L9pwte8I3xB479fD2D6a5IMMQi7mXTZ2FD0tZr0KLs783n9jiek0dR_v6hcbIMXm3krhyzHsK19W0r7BWQ1vKf-SGVD7FKGY5bdAJ66nZbWDSfFpiFnCf9SOSCrHr9HNs_n795RVpAm3TCTDj61Amdao3ZlmP2f2G0UEs4MDo0iChPHW6myyig0GyvCT8S4NcR0OJ0"/>
            </button>
            
            <div id="profileDropdown" class="hidden absolute right-0 mt-3 w-56 bg-surface border border-outline rounded-xl shadow-xl z-50 py-2 font-label-sm">
                <div class="px-4 py-3 border-b border-outline">
                    <p class="text-xs text-on-surface-variant uppercase">Signed in as</p>
                    <p class="text-sm font-bold text-on-surface truncate">{{ Auth::user()->name ?? 'Administrator' }}</p>
                    <p class="text-[10px] text-primary truncate mt-0.5">{{ Auth::user()->email ?? 'admin@Astroamrit.com.np' }}</p>
                </div>
                <a class="flex items-center gap-3 px-4 py-2 text-on-surface hover:bg-surface-container-low transition-colors" href="#">
                    <span class="material-symbols-outlined text-sm">manage_accounts</span>
                    Profile Settings
                </a>
                <a class="flex items-center gap-3 px-4 py-2 text-on-surface hover:bg-surface-container-low transition-colors" href="#">
                    <span class="material-symbols-outlined text-sm">security</span>
                    Security Keys
                </a>
                <div class="border-t border-outline my-1"></div>
                
                <!-- Logout Trigger Form -->
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w-full text-left flex items-center gap-3 px-4 py-2 text-error hover:bg-error-container/20 transition-colors">
                    <span class="material-symbols-outlined text-sm">logout</span>
                    Logout System
                </button>
            </div>
        </div>
    </div>
</header>

<!-- SideNavBar (Desktop Only) -->
<aside class="fixed left-0 top-0 h-full w-64 bg-surface-container-low border-r border-outline flex flex-col pt-20 z-40 hidden md:flex">
    <div class="px-6 mb-8">
        <div class="font-label-sm text-label-sm font-black text-primary uppercase tracking-widest">Admin Dashboard</div>
        <div class="text-[10px] text-on-surface-variant uppercase tracking-wider mt-1">Technical Intelligence</div>
    </div>
    
    <nav class="flex-1 space-y-1">
        <a class="mx-2 flex items-center px-4 py-3 font-label-sm rounded-lg transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-secondary-container text-on-secondary-container font-bold translate-x-1' : 'text-on-surface-variant hover:bg-surface-variant hover:translate-x-1' }}" href="{{ route('admin.dashboard') }}">
            <span class="material-symbols-outlined mr-3">dashboard</span>
            <span>Dashboard</span>
        </a>
        <a class="mx-2 flex items-center px-4 py-3 font-label-sm rounded-lg transition-all {{ request()->routeIs('admin.services.*') ? 'bg-secondary-container text-on-secondary-container font-bold translate-x-1' : 'text-on-surface-variant hover:bg-surface-variant hover:translate-x-1' }}" href="{{ route('admin.services.index') }}">
            <span class="material-symbols-outlined mr-3">settings_suggest</span>
            <span>Services</span>
        </a>
        <a class="mx-2 flex items-center px-4 py-3 font-label-sm rounded-lg transition-all {{ request()->routeIs('admin.blogs.*') ? 'bg-secondary-container text-on-secondary-container font-bold translate-x-1' : 'text-on-surface-variant hover:bg-surface-variant hover:translate-x-1' }}" href="{{ route('admin.blogs.index') }}">
            <span class="material-symbols-outlined mr-3">article</span>
            <span>Blogs</span>
        </a>
        <a class="mx-2 flex items-center px-4 py-3 font-label-sm rounded-lg transition-all {{ request()->routeIs('admin.events.*') ? 'bg-secondary-container text-on-secondary-container font-bold translate-x-1' : 'text-on-surface-variant hover:bg-surface-variant hover:translate-x-1' }}" href="{{ route('admin.events.index') }}">
            <span class="material-symbols-outlined mr-3">event</span>
            <span>Events</span>
        </a>
        <a class="mx-2 flex items-center px-4 py-3 font-label-sm rounded-lg transition-all {{ request()->routeIs('admin.gallery.*') ? 'bg-secondary-container text-on-secondary-container font-bold translate-x-1' : 'text-on-surface-variant hover:bg-surface-variant hover:translate-x-1' }}" href="{{ route('admin.gallery.index') }}">
            <span class="material-symbols-outlined mr-3">photo_library</span>
            <span>Gallery</span>
        </a>
        <a class="mx-2 flex items-center px-4 py-3 font-label-sm rounded-lg transition-all {{ request()->routeIs('admin.projects.*') ? 'bg-secondary-container text-on-secondary-container font-bold translate-x-1' : 'text-on-surface-variant hover:bg-surface-variant hover:translate-x-1' }}" href="{{ route('admin.projects.index') }}">
            <span class="material-symbols-outlined mr-3">folder_special</span>
            <span>Projects</span>
        </a>
        <a class="mx-2 flex items-center px-4 py-3 font-label-sm rounded-lg transition-all {{ request()->routeIs('admin.reviews.*') ? 'bg-secondary-container text-on-secondary-container font-bold translate-x-1' : 'text-on-surface-variant hover:bg-surface-variant hover:translate-x-1' }}" href="{{ route('admin.reviews.index') }}">
            <span class="material-symbols-outlined mr-3">rate_review</span>
            <span>Feedbacks</span>
        </a>
        <a class="mx-2 flex items-center px-4 py-3 font-label-sm rounded-lg transition-all {{ request()->routeIs('admin.bookings.*') ? 'bg-secondary-container text-on-secondary-container font-bold translate-x-1' : 'text-on-surface-variant hover:bg-surface-variant hover:translate-x-1' }}" href="{{ route('admin.bookings.index') }}">
            <span class="material-symbols-outlined mr-3">event_available</span>
            <span>Bookings</span>
        </a>
        <a class="mx-2 flex items-center px-4 py-3 font-label-sm rounded-lg transition-all {{ request()->routeIs('admin.contacts.*') ? 'bg-secondary-container text-on-secondary-container font-bold translate-x-1' : 'text-on-surface-variant hover:bg-surface-variant hover:translate-x-1' }}" href="{{ route('admin.contacts.index') }}">
            <span class="material-symbols-outlined mr-3">contacts</span>
            <span>Inquiries</span>
        </a>
    </nav>
    
    <div class="p-4 border-t border-outline">
        <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w-full text-left text-on-surface-variant font-label-sm flex items-center px-4 py-3 mx-2 rounded-lg hover:bg-error-container/20 hover:text-error transition-all">
            <span class="material-symbols-outlined mr-3">logout</span>
            <span>Logout</span>
        </button>
    </div>
</aside>

<!-- Main Content Canvas -->
<div class="md:ml-64 pt-20 px-4 md:px-gutter pb-28 md:pb-12 min-h-screen">
    @yield('content')
</div>

<!-- Mobile Navigation Dock (6 Working Items, No Profile Image) -->
<div class="md:hidden fixed bottom-6 left-1/2 -translate-x-1/2 w-[92%] glass-dock h-16 rounded-full border border-outline shadow-xl flex items-center justify-around px-4 z-50">
    <a href="{{ route('admin.dashboard') }}" 
       class="material-symbols-outlined p-2 rounded-full transition-all {{ request()->routeIs('admin.dashboard') ? 'text-primary bg-secondary-container/50 font-bold' : 'text-on-surface-variant hover:bg-surface-variant/40' }}" 
       title="Dashboard">
       dashboard
    </a>
    <a href="{{ route('admin.services.index') }}" 
       class="material-symbols-outlined p-2 rounded-full transition-all {{ request()->routeIs('admin.services.*') ? 'text-primary bg-secondary-container/50 font-bold' : 'text-on-surface-variant hover:bg-surface-variant/40' }}" 
       title="Services">
       settings_suggest
    </a>
    <a href="{{ route('admin.blogs.index') }}" 
       class="material-symbols-outlined p-2 rounded-full transition-all {{ request()->routeIs('admin.blogs.*') ? 'text-primary bg-secondary-container/50 font-bold' : 'text-on-surface-variant hover:bg-surface-variant/40' }}" 
       title="Blogs">
       article
    </a>
    <a href="{{ route('admin.events.index') }}" 
       class="material-symbols-outlined p-2 rounded-full transition-all {{ request()->routeIs('admin.events.*') ? 'text-primary bg-secondary-container/50 font-bold' : 'text-on-surface-variant hover:bg-surface-variant/40' }}" 
       title="Events">
       event
    </a>
    <a href="{{ route('admin.gallery.index') }}" 
       class="material-symbols-outlined p-2 rounded-full transition-all {{ request()->routeIs('admin.gallery.*') ? 'text-primary bg-secondary-container/50 font-bold' : 'text-on-surface-variant hover:bg-surface-variant/40' }}" 
       title="Gallery">
       photo_library
    </a>
    <a href="{{ route('admin.projects.index') }}" 
       class="material-symbols-outlined p-2 rounded-full transition-all {{ request()->routeIs('admin.projects.*') ? 'text-primary bg-secondary-container/50 font-bold' : 'text-on-surface-variant hover:bg-surface-variant/40' }}" 
       title="Projects">
       folder_special
    </a>
</div>

<!-- Scripts -->
<script>
    // Profile Dropdown Toggle Logic
    const profileDropdownBtn = document.getElementById('profileDropdownBtn');
    const profileDropdown = document.getElementById('profileDropdown');

    if (profileDropdownBtn && profileDropdown) {
        profileDropdownBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            profileDropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!profileDropdown.contains(e.target) && !profileDropdownBtn.contains(e.target)) {
                profileDropdown.classList.add('hidden');
            }
        });
    }
</script>
<script src="{{ asset('js/laravel-api.js') }}"></script>
<!-- Quill Rich Text Editor -->
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
    // Initialize all Quill editors on the page
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.quill-editor-container').forEach(function(container) {
            var hiddenInput = container.nextElementSibling;
            var quill = new Quill(container, {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['blockquote', 'code-block'],
                        ['link'],
                        ['clean']
                    ]
                },
                placeholder: container.dataset.placeholder || 'Write something...'
            });
            // Pre-populate with existing content
            if (hiddenInput && hiddenInput.value) {
                quill.root.innerHTML = hiddenInput.value;
            }
            // Sync content to hidden input on text change
            quill.on('text-change', function() {
                hiddenInput.value = quill.root.innerHTML;
            });
            // Sync on form submit as well
            var form = container.closest('form');
            if (form) {
                form.addEventListener('submit', function() {
                    hiddenInput.value = quill.root.innerHTML;
                });
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: {!! json_encode(session('success')) !!},
                confirmButtonColor: '#006e22',
                timer: 3000,
                timerProgressBar: true
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: {!! json_encode(session('error')) !!},
                confirmButtonColor: '#ba1a1a'
            });
        @endif

        @if(session('status'))
            Swal.fire({
                icon: 'info',
                title: 'Info',
                text: {!! json_encode(session('status')) !!},
                confirmButtonColor: '#006e22'
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Validation Failed',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#ba1a1a'
            });
        @endif
    });
</script>
<script>
    /* ─── SweetAlert Delete Confirmation ─── */
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.swal-delete-form').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const thisForm = this;
                Swal.fire({
                    title: 'Confirm Deletion',
                    text: thisForm.dataset.confirmMsg || 'Are you sure you want to delete this item? This cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ba1a1a',
                    cancelButtonColor: '#747878',
                    confirmButtonText: 'Yes, Delete',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true
                }).then(function(result) {
                    if (result.isConfirmed) {
                        thisForm.submit();
                    }
                });
            });
        });
    });
</script>
@stack('scripts')
@yield('js')
</body>
</html>

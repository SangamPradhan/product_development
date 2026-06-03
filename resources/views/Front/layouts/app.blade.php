<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <script>
        window.__APP__ = {
            apiBase: @json(url('/api')),
            projectsBase: @json(url('/projects')),
            assetBase: @json(url('/')),
        };
    </script>
    <title>@yield('title', 'AI-Solutions | Precision in Automation')</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- <script src="{{ asset('js/canvasparticles.js') }}" defer></script> -->
     <script src="https://cdn.jsdelivr.net/npm/canvasparticles-js@latest/dist/index.umd.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;600;700&amp;family=Inter:wght@400;500;600&amp;family=JetBrains+Mono:wght@500&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "on-secondary-container": "#007324",
                    "error-container": "#ffdad6",
                    "secondary-fixed": "#72fe7f",
                    "on-tertiary-container": "#6d796f",
                    "on-error": "#ffffff",
                    "inverse-on-surface": "#eef0f9",
                    "on-secondary-fixed-variant": "#005317",
                    "on-secondary-fixed": "#002105",
                    "inverse-primary": "#c6c6c7",
                    "surface-container-high": "#e5e8f1",
                    "tertiary-container": "#ffffff",
                    "on-surface": "#181c22",
                    "primary": "#5d5f5f",
                    "on-background": "#181c22",
                    "inverse-surface": "#2d3137",
                    "surface-variant": "#dfe2eb",
                    "primary-fixed": "#e2e2e2",
                    "tertiary-fixed": "#d9e6da",
                    "surface-container-highest": "#dfe2eb",
                    "outline-variant": "#c4c7c8",
                    "error": "#ba1a1a",
                    "on-tertiary": "#ffffff",
                    "surface-container-lowest": "#ffffff",
                    "on-surface-variant": "#444748",
                    "tertiary-fixed-dim": "#bdcabe",
                    "secondary-fixed-dim": "#53e166",
                    "on-tertiary-fixed-variant": "#3e4a41",
                    "surface-container-low": "#f1f3fc",
                    "surface-container": "#ebeef7",
                    "outline": "#747878",
                    "surface-bright": "#f8f9ff",
                    "secondary-container": "#6ffc7d",
                    "on-primary-container": "#747676",
                    "primary-fixed-dim": "#c6c6c7",
                    "on-tertiary-fixed": "#131e17",
                    "on-primary": "#ffffff",
                    "surface-dim": "#d7dae3",
                    "surface": "#f8f9ff",
                    "surface-tint": "#5d5f5f",
                    "background": "#f8f9ff",
                    "on-secondary": "#ffffff",
                    "on-error-container": "#93000a",
                    "primary-container": "#ffffff",
                    "on-primary-fixed": "#1a1c1c",
                    "tertiary": "#556158",
                    "on-primary-fixed-variant": "#454747",
                    "secondary": "#006e22"
            },
            "borderRadius": {
                    "DEFAULT": "0.125rem",
                    "lg": "0.25rem",
                    "xl": "0.5rem",
                    "full": "0.75rem"
            },
            "spacing": {
                    "container-padding": "32px",
                    "margin-desktop": "80px",
                    "gutter": "24px",
                    "base": "8px",
                    "section-gap": "128px",
                    "margin-mobile": "20px"
            },
            "fontFamily": {
                    "headline-md": ["Hanken Grotesk"],
                    "body-lg": ["Inter"],
                    "headline-lg-mobile": ["Hanken Grotesk"],
                    "body-md": ["Inter"],
                    "display-lg": ["Hanken Grotesk"],
                    "headline-lg": ["Hanken Grotesk"],
                    "label-sm": ["JetBrains Mono"]
            },
            "fontSize": {
                    "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "headline-lg-mobile": ["32px", {"lineHeight": "1.2", "fontWeight": "600"}],
                    "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "display-lg": ["64px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "headline-lg": ["40px", {"lineHeight": "1.2", "fontWeight": "600"}],
                    "label-sm": ["12px", {"lineHeight": "1.0", "letterSpacing": "0.05em", "fontWeight": "500"}]
            }
          },
        },
      }
    </script>
    <link rel="stylesheet" href="{{ asset('css/front-custom.css') }}"/>
    @stack('styles')
</head>
<body class="text-on-surface selection:bg-secondary-fixed selection:text-on-secondary-fixed min-h-screen overflow-x-hidden">
    <div id="cursor-follower"></div>
    <canvas id="bg-particles"></canvas>
    
    @include('front.partials.header')

    <main>
        @yield('content')
    </main>

    <div data-aos="fade-up">
        @include('front.partials.footer')
    </div>

    @include('front.partials.chatbot')

    <!-- Load laravel-api.js FIRST (before other scripts that depend on it) -->
    <script src="{{ asset('js/laravel-api.js') }}"></script>
    
    <!-- Stack for any additional scripts from child views -->
    @stack('scripts')
    
    <!-- Load front-projects.js AFTER laravel-api.js is available -->
    <script src="{{ asset('js/front-projects.js') }}"></script>

    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 50,
            easing: 'ease-out-cubic'
        });

        // Cursor Follower Logic
        const follower = document.getElementById('cursor-follower');
        if (follower) {
            window.addEventListener('mousemove', (e) => {
                follower.style.left = e.clientX + 'px';
                follower.style.top = e.clientY + 'px';
            });
        }

        // Initialize Canvas Particles Background
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof CanvasParticles !== 'undefined') {
                new CanvasParticles('#bg-particles', {
                    particles: {
                        color: 'rgba(21, 203, 58, 0.45)',
                        ppm: 100,
                        connectDistance: 130,
                        relSpeed: 0.6,
                        relSize: 1.2
                    },
                    mouse: {
                        interactionType: 0
                    }
                }).start();
            }
        });
    </script>
<script>
    /* ─── SweetAlert Session Notifications (Front-end) ─── */
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
                title: 'Oops!',
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
</body>
</html>
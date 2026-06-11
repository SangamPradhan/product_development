<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>AI-Solutions - Secure Login</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@600;700&amp;family=Inter:wght@400&amp;family=JetBrains+Mono:wght@500&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
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
                        "display-lg-mobile": ["Hanken Grotesk"],
                        "headline-lg": ["Hanken Grotesk"],
                        "headline-lg-mobile": ["Hanken Grotesk"],
                        "display-lg": ["Hanken Grotesk"]
                    },
                    "fontSize": {
                        "label-sm": ["12px", {
                            "lineHeight": "1.4",
                            "letterSpacing": "0.05em",
                            "fontWeight": "500"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "display-lg-mobile": ["48px", {
                            "lineHeight": "1.1",
                            "fontWeight": "700"
                        }],
                        "headline-lg": ["40px", {
                            "lineHeight": "1.2",
                            "fontWeight": "600"
                        }],
                        "headline-lg-mobile": ["32px", {
                            "lineHeight": "1.2",
                            "fontWeight": "600"
                        }],
                        "display-lg": ["64px", {
                            "lineHeight": "1.1",
                            "fontWeight": "700"
                        }]
                    }
                },
            },
        }
    </script>
    <style>
        .angled-notch {
            clip-path: polygon(0 0, calc(100% - 24px) 0, 100% 24px, 100% 100%, 24px 100%, 0 calc(100% - 24px));
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="flex flex-col bg-surface-container-lowest min-h-screen font-body-md text-on-surface">
    <main class="relative flex flex-grow justify-center items-center p-gutter overflow-hidden">
        <div class="z-0 absolute inset-0 opacity-10">
            <div
                class="top-0 right-0 absolute bg-primary/20 blur-[120px] rounded-full w-[500px] h-[500px] -translate-y-1/2 translate-x-1/4">
            </div>
            <div
                class="bottom-0 left-0 absolute bg-secondary/20 blur-[100px] rounded-full w-[400px] h-[400px] -translate-x-1/4 translate-y-1/3">
            </div>
        </div>

        <div class="z-10 w-full max-w-md">
            <div class="mb-12 text-center">
                <h1 class="font-headline-lg text-headline-lg text-primary tracking-tight">AI-SOLUTIONS</h1>
                <p class="mt-2 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Technical
                    Intelligence Portal</p>
            </div>

            <div class="group relative bg-surface shadow-sm p-8 md:p-10 border border-outline angled-notch">
                <div class="top-4 left-4 absolute">
                    <span class="text-primary/40 text-xl material-symbols-outlined" data-icon="token">token</span>
                </div>

                <!-- Error Alerts -->
                @if ($errors->any())
                    <div class="bg-error-container mb-6 p-4 border border-error/20 rounded-lg font-label-sm text-on-error-container text-sm"
                        role="alert">
                        <div class="flex items-center gap-2 mb-1 font-bold">
                            <span class="text-base material-symbols-outlined">warning</span>
                            ACCESS DENIED
                        </div>
                        {{ $errors->first() }}
                    </div>
                @endif

                @if (session('warning'))
                    <div class="bg-tertiary-container mb-6 p-4 border border-tertiary/20 rounded-lg font-label-sm text-on-tertiary-container text-sm"
                        role="alert">
                        <div class="flex items-center gap-2 mb-1 font-bold">
                            <span class="text-base material-symbols-outlined">schedule</span>
                            SESSION EXPIRED
                        </div>
                        {{ session('warning') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="bg-secondary-container mb-6 p-4 border border-secondary/20 rounded-lg font-label-sm text-on-secondary-container text-sm"
                        role="alert">
                        <div class="flex items-center gap-2 mb-1 font-bold">
                            <span class="text-base material-symbols-outlined">check_circle</span>
                            SUCCESS
                        </div>
                        {{ session('success') }}
                    </div>
                @endif

                <form class="space-y-6" action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 font-label-sm text-label-sm text-on-surface-variant"
                            for="email">
                            <span class="text-sm material-symbols-outlined" data-icon="person">mail</span>
                            EMAIL ADDRESS
                        </label>
                        <div class="relative">
                            <input
                                class="bg-surface-container-low px-4 border border-outline focus:border-primary rounded-lg outline-none placeholder:text-outline-variant focus:ring-1 focus:ring-primary w-full h-12 font-label-sm text-on-surface transition-all"
                                id="email" name="email" value="{{ old('email') }}"
                                placeholder="admin@example.com" type="email" required autofocus />
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="flex items-center gap-2 font-label-sm text-label-sm text-on-surface-variant"
                            for="password">
                            <span class="text-sm material-symbols-outlined" data-icon="lock">lock</span>
                            PASSWORD
                        </label>
                        <div class="relative">
                            <input
                                class="bg-surface-container-low px-4 border border-outline focus:border-primary rounded-lg outline-none placeholder:text-outline-variant focus:ring-1 focus:ring-primary w-full h-12 font-label-sm text-on-surface transition-all"
                                id="password" name="password" placeholder="••••••••" type="password" required />
                        </div>
                    </div>

                    <div class="flex justify-between items-center pt-2">
                        <label class="group flex items-center gap-2 cursor-pointer">
                            <input
                                class="bg-surface-container-low border-outline rounded focus:ring-primary w-4 h-4 text-primary"
                                name="remember" type="checkbox" id="remember" />
                            <span class="font-label-sm text-label-sm text-on-surface-variant select-none">REMEMBER
                                ME</span>
                        </label>
                        <a class="font-label-sm text-label-sm text-primary hover:underline transition-all"
                            href="#">FORGOT ACCESS?</a>
                    </div>

                    <button
                        class="flex justify-center items-center gap-3 bg-primary hover:bg-secondary shadow-md mt-4 rounded-xl w-full h-14 font-headline-lg text-on-primary text-xl active:scale-[0.98] transition-all"
                        type="submit">
                        SIGN IN
                        <span class="material-symbols-outlined" data-icon="arrow_forward">arrow_forward</span>
                    </button>
                </form>
            </div>

            <div class="mt-8 text-center">
                <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                    Secured by Laravel Session Auth
                </p>
                <div class="flex justify-center gap-4 mt-6">
                    <button
                        class="flex items-center gap-2 bg-surface hover:bg-surface-variant px-4 py-2 border border-outline rounded-full font-label-sm text-label-sm transition-all">
                        <span class="text-base material-symbols-outlined">vpn_key</span>
                        SSO SECURITY
                    </button>
                    <button
                        class="flex items-center gap-2 bg-surface hover:bg-surface-variant px-4 py-2 border border-outline rounded-full font-label-sm text-label-sm transition-all">
                        <span class="text-base material-symbols-outlined" data-icon="fingerprint">fingerprint</span>
                        BIOMETRIC
                    </button>
                </div>
            </div>
        </div>
    </main>
    <footer class="p-base text-center">
        <p class="text-outline-variant font-label-sm text-label-sm uppercase">© {{ date('Y') }} AI-SOLUTIONS. ALL
            RIGHTS RESERVED.</p>
    </footer>
</body>

</html>

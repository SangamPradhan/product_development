@extends('front.layouts.app')

@section('title', 'Gallery | AI-Solutions')

@section('content')
<!-- Hero Section -->
<header class="pt-[160px] pb-section-gap px-margin-desktop text-center">
    <div class="max-w-4xl mx-auto" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary-container/30 border border-secondary/20 rounded-full mb-6 hover-glow cursor-default">
            <span class="material-symbols-outlined text-[16px] text-secondary">visibility</span>
            <span class="font-label-sm text-label-sm text-on-secondary-container uppercase">Vision in Action</span>
        </div>
        <h1 class="font-display-lg text-display-lg text-on-surface mb-8 tracking-tight">Precision in Perspective</h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">A visual narrative of our journey through technological innovation, architectural excellence, and a culture built on pure intelligence.</p>
    </div>
</header>

<!-- Bento Grid Gallery -->
<main class="px-margin-desktop pb-section-gap">
    <div class="grid grid-cols-12 gap-gutter">
        <!-- Feature 1: The Office Architecture -->
        <div class="col-span-12 md:col-span-8 group hover-glow transition-all" data-aos="fade-right">
            <div class="notched-card bg-surface-container-low border border-outline-variant overflow-hidden h-[500px] relative">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 peek-effect" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA9i4qtJDEaA4red51AV_fPUzK89ZUsWIbDnLaXR0mVlk-bYcephcUhZ_AXu3ZR3uR308Cj2wNk2asO1uGv7onMMeZO8CQlm4GWgbNLuJKvT9HUbYTgNJHxLjch4BfZnlv8ykW8PaXb4hoxudrhn5i9XTeQdJ2ogPc3fh3bWo-DmL8d_7tdxLxnY9tNaH39g2z8sDK_nrsx5VLX8Ez20dW4E0tajikckE1klLkjbG7ak3e87sNPIXBJF4N7QRk6I7wHMjaFKXnJeWA" alt="Office Architecture"/>
                <div class="absolute bottom-0 left-0 w-full p-8 bg-gradient-to-t from-black/60 to-transparent">
                    <span class="font-label-sm text-label-sm text-white/80 bg-white/10 backdrop-blur-md px-3 py-1 rounded-full border border-white/20 mb-4 inline-block">The Hub</span>
                    <h3 class="font-headline-lg text-headline-lg text-white">Technological Sanctuary</h3>
                </div>
            </div>
        </div>

        <!-- Feature 2: Collaborative Culture -->
        <div class="col-span-12 md:col-span-4 group hover-glow transition-all" data-aos="fade-left" data-aos-delay="100">
            <div class="notched-card bg-surface-container-low border border-outline-variant overflow-hidden h-[500px] relative">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 peek-effect" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlytP3j7lMuiyHnwIt8KHMTNVSyN3h8f9xS_rd-SO_HkyrMAVPqR_bWgrJ-NXyZuo0w4RIqpPsXYk3-EBO1qiEzQRlTm2fU2dxP2-wFOd2CtfVucWG3Ae7HLVfdK8Cqftj0LFRjieel6Owk9452J9vzm81a25gy1cQ8pRE6yTWSJMBsDOofZEsS4JXWqhRqzfDCZKtBCrDei2V3Urc5yT4xOJBejY75NrKDpSkpHAeEpZcXoJCyddqxEYNHF3W4ydfR0hhNJ1GXp4" alt="Collaborative Culture"/>
                <div class="absolute bottom-0 left-0 w-full p-8 bg-gradient-to-t from-black/60 to-transparent">
                    <h3 class="font-headline-md text-headline-md text-white">Culture of Clarity</h3>
                </div>
            </div>
        </div>

        <!-- Filter / Category Chips -->
        <div class="col-span-12 flex gap-4 py-8 overflow-x-auto" data-aos="fade-up">
            <button class="bg-secondary text-on-secondary px-6 py-2 rounded-full font-label-sm text-label-sm whitespace-nowrap">All Moments</button>
            <button class="bg-surface-container-low border border-outline-variant text-on-surface-variant px-6 py-2 rounded-full font-label-sm text-label-sm hover:border-secondary transition-all whitespace-nowrap">Office Space</button>
            <button class="bg-surface-container-low border border-outline-variant text-on-surface-variant px-6 py-2 rounded-full font-label-sm text-label-sm hover:border-secondary transition-all whitespace-nowrap">Team Synergy</button>
            <button class="bg-surface-container-low border border-outline-variant text-on-surface-variant px-6 py-2 rounded-full font-label-sm text-label-sm hover:border-secondary transition-all whitespace-nowrap">Global Events</button>
            <button class="bg-surface-container-low border border-outline-variant text-on-surface-variant px-6 py-2 rounded-full font-label-sm text-label-sm hover:border-secondary transition-all whitespace-nowrap">Innovation Labs</button>
        </div>

        <!-- Secondary Grid -->
        <div class="col-span-12 md:col-span-4 group hover-glow transition-all" data-aos="zoom-in" data-aos-delay="100">
            <div class="notched-card bg-surface-container-low border border-outline-variant overflow-hidden h-[350px] relative">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 peek-effect" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA2O8I-wkxuBoX1kiiBnmV6jHKyjKU30ixRyJtSLbgtxRJ6XlTbPYeNmX5My9pasDb4l2eloJUWzFdr8O-K-XOoh4Iqelh_PKwyLgKuLfqY25UWpJE1O-kyh_jy79c50huT4c5e4nBIdmih4uT9N0AwKWVcY8aTyepjmo1e5m-XZdh88W0WEbPHOxoJRpMN_xpuI6XqMmgknFNR17XU2zT_UVs1Dg52PLahv-WKyrWp-WG6v4LY0aBq9rboa7-Z7EeMaY68P4fZWfk" alt="Engineering Lab"/>
                <div class="absolute inset-0 bg-secondary/0 group-hover:bg-secondary/10 transition-all duration-300"></div>
            </div>
            <p class="font-label-sm text-label-sm text-secondary mt-4">ENGINEERING LAB</p>
            <h4 class="font-headline-md text-headline-md text-on-surface">System Architecture</h4>
        </div>
        <div class="col-span-12 md:col-span-4 group hover-glow transition-all" data-aos="zoom-in" data-aos-delay="200">
            <div class="notched-card bg-surface-container-low border border-outline-variant overflow-hidden h-[350px] relative">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 peek-effect" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBdI0SjCs43BSos8jwRTl_KftrocFdXPNshQomENExykoZUzvH2BFiANqhJBQBOZufmXwm5X6PYy7U49qF6UXRLAEA-KcGaimw79z-4o67ptEi1VXTRSVq5rrBoueu3N6HAMvheuGspXXDvAd84GtbLl5S7G-EPKdgW46bEhd5TarS_Q4N7qd6jRBhbOfZIs7IRv27LLDgUg8EmRycEzQ8uLavDSIbYIDitkp_MZEXtbmw06JisGUoirf-5Ti9-co6Gej9YQfLeixg" alt="Global Summit"/>
                <div class="absolute inset-0 bg-secondary/0 group-hover:bg-secondary/10 transition-all duration-300"></div>
            </div>
            <p class="font-label-sm text-label-sm text-secondary mt-4">GLOBAL SUMMIT 2024</p>
            <h4 class="font-headline-md text-headline-md text-on-surface">Connecting Intelligence</h4>
        </div>
        <div class="col-span-12 md:col-span-4 group hover-glow transition-all" data-aos="zoom-in" data-aos-delay="300">
            <div class="notched-card bg-surface-container-low border border-outline-variant overflow-hidden h-[350px] relative">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 peek-effect" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA-BXTQpmXvddwgjMAwI2eMgCkwnDxDpGGrEUV2NhYp3jhkuNOLB1OLFglNrJ5Rm9auJclRHg2zXtZUwWbrSU9y_-ZnteQrj9NEV99Rfn_Cc6PUcetFoaL-lBcy4AgttI_SyaggKASw1INkbniSxhvvSLUCQzE0zrfoLmVwFk1VIq9guCLnpFgZwpr4JVse6nA_-xQd_mCjF1y5K7G-ojgRKk6QtxLr4s8zPg505lDZ2vzub4wOnM0uBCJW0N8ZYr6O1aMvTf4NcjE" alt="Strategy Session"/>
                <div class="absolute inset-0 bg-secondary/0 group-hover:bg-secondary/10 transition-all duration-300"></div>
            </div>
            <p class="font-label-sm text-label-sm text-secondary mt-4">STRATEGY SESSION</p>
            <h4 class="font-headline-md text-headline-md text-on-surface">Geometric Logic</h4>
        </div>

        <!-- Full Width Quote / Stat -->
        <div class="col-span-12 py-16 text-center border-y border-outline-variant/30 my-8" data-aos="fade-up">
            <span class="material-symbols-outlined text-secondary text-[48px] mb-6">format_quote</span>
            <h2 class="font-headline-lg text-headline-lg text-on-surface max-w-3xl mx-auto italic">"Innovation is not just about the code we write, but the space we create for collective brilliance to flourish."</h2>
            <p class="font-label-sm text-label-sm text-on-surface-variant mt-6 tracking-widest">— FOUNDING ARCHITECT</p>
        </div>

        <!-- Gallery Grid Continued -->
        <div class="col-span-12 md:col-span-6 group hover-glow transition-all" data-aos="fade-right">
            <div class="notched-card bg-surface-container-low border border-outline-variant overflow-hidden h-[450px] relative">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 peek-effect" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBZ4Us3UreK4Y1b2UF-Qqb2GLjOmvymH87MAZQm4nBpfJbWSRYRylJD6OZqSSYavpx9JstMSpTVC3FhARiyA8Xz6o5o8VzykAMsfJ2tR5FfL9hR63wolKTI_NKlAdtWDWKlpKkxVwRXeat3saQL8qj5MdtwcvWx_TCign8b4cYVe7SDPxvnt58uUJkTFD6_NGqCkmcwjtEJthSAbSIUITK_WnxjHBaGtKcsngNK6RJ4WVKwSgTdgvJtAQyEWLwVOyU-L8eznA8T7pE" alt="Visualizing Futures"/>
                <div class="absolute bottom-0 left-0 w-full p-8 bg-gradient-to-t from-black/60 to-transparent">
                    <h3 class="font-headline-md text-headline-md text-white">Visualizing Futures</h3>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-6 group hover-glow transition-all" data-aos="fade-left">
            <div class="notched-card bg-surface-container-low border border-outline-variant overflow-hidden h-[450px] relative">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 peek-effect" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBI_IbMkyFaNIirTu8CGnkabUNQm7Qg7bQij51xfO5MKjnSyUBQMdY2VBt_8-lCi13RDcpInc9f_Dae6TWaPMAEsNCw-jQVFAzrLbXirYj7OZXhp3pGdEayLtwZiZOR8Jr7lAgb4paaW51L_7kFa9xr33c-ILT3sOhdE0Ov6USvYhrwaCZ8r0uyBXrKjXE-GlSzFIby_jBhbzg84tSrJufLoVaxQQKfYGUnOUczrfLR4ESIERPgcsG8aQZlIkfNfoGPjCkryLWfqgY" alt="Team Milestone"/>
                <div class="absolute bottom-0 left-0 w-full p-8 bg-gradient-to-t from-black/60 to-transparent">
                    <h3 class="font-headline-md text-headline-md text-white">The Human Element</h3>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- CTA Section -->
<section class="px-margin-desktop pb-section-gap" data-aos="zoom-in">
    <div class="notched-card bg-surface-container border border-outline-variant p-16 text-center hover-glow transition-all">
        <h2 class="font-headline-lg text-headline-lg text-on-surface mb-6">Experience the Culture Firsthand</h2>
        <p class="font-body-md text-body-md text-on-surface-variant mb-10 max-w-xl mx-auto">We are always looking for visionary minds to join our architectural journey in building the next generation of automation.</p>
        <div class="flex flex-col md:flex-row gap-4 justify-center">
            <button class="bg-secondary text-on-secondary px-10 py-4 rounded-full font-label-sm text-label-sm uppercase tracking-widest hover:bg-on-secondary-container transition-all hover-glow">View Openings</button>
            <button class="bg-transparent border border-secondary text-secondary px-10 py-4 rounded-full font-label-sm text-label-sm uppercase tracking-widest hover:bg-secondary/5 transition-all hover-glow">Download Press Kit</button>
        </div>
    </div>
</section>
@endsection

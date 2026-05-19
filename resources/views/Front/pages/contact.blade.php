@extends('front.layouts.app')

@section('title', 'Contact Us | AI-Solutions')

@push('styles')
<style>
    .angled-notch {
        clip-path: polygon(0 0, 100% 0, 100% calc(100% - 16px), calc(100% - 16px) 100%, 0 100%);
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<header class="pt-[160px] pb-section-gap px-margin-desktop text-center">
    <div class="max-w-4xl mx-auto" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary-container/30 border border-secondary/20 rounded-full mb-6 hover-glow cursor-default">
            <span class="material-symbols-outlined text-[16px] text-secondary">mail</span>
            <span class="font-label-sm text-label-sm text-on-secondary-container uppercase">Get In Touch</span>
        </div>
        <h1 class="font-display-lg text-display-lg text-on-surface mb-8 tracking-tight">Let's build the future together.</h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">Reach out to our team of experts to discuss enterprise solutions, strategic partnerships, or custom architecture for your AI automation needs.</p>
    </div>
</header>

<main class="px-margin-desktop pb-section-gap max-w-7xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
        <!-- Contact Form Card -->
        <div class="md:col-span-8 bg-surface-container-low border border-outline-variant p-10 angled-notch hover-glow transition-all" data-aos="fade-right">
            <h2 class="text-headline-md font-headline-md mb-8">Send us a message</h2>
            <form action="#" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-label-sm font-label-sm text-outline mb-2 uppercase">First Name</label>
                        <input type="text" name="first_name" class="w-full bg-surface border border-outline-variant p-4 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md" placeholder="John" required>
                    </div>
                    <div>
                        <label class="block text-label-sm font-label-sm text-outline mb-2 uppercase">Last Name</label>
                        <input type="text" name="last_name" class="w-full bg-surface border border-outline-variant p-4 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md" placeholder="Doe" required>
                    </div>
                </div>
                <div>
                    <label class="block text-label-sm font-label-sm text-outline mb-2 uppercase">Email Address</label>
                    <input type="email" name="email" class="w-full bg-surface border border-outline-variant p-4 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md" placeholder="john@enterprise.com" required>
                </div>
                <div>
                    <label class="block text-label-sm font-label-sm text-outline mb-2 uppercase">Inquiry Type</label>
                    <select name="type" class="w-full bg-surface border border-outline-variant p-4 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md">
                        <option value="enterprise">Enterprise Solutions</option>
                        <option value="partnership">Partnership Opportunities</option>
                        <option value="support">Technical Support</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div>
                    <label class="block text-label-sm font-label-sm text-outline mb-2 uppercase">Message</label>
                    <textarea name="message" rows="5" class="w-full bg-surface border border-outline-variant p-4 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md resize-none" placeholder="How can we help you?" required></textarea>
                </div>
                <button type="submit" class="bg-secondary text-on-secondary px-8 py-4 rounded-none font-label-sm text-label-sm uppercase tracking-widest active:scale-[0.98] transition-all inline-flex items-center gap-2 hover:bg-secondary/90 hover-glow">
                    Submit Inquiry <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                </button>
            </form>
        </div>

        <!-- Right Side Information -->
        <div class="md:col-span-4 flex flex-col gap-gutter" data-aos="fade-left" data-aos-delay="100">
            <!-- Contact Info -->
            <div class="bg-secondary text-white p-10 angled-notch flex-1 flex flex-col justify-center hover-glow transition-all">
                <h3 class="text-headline-md font-headline-md mb-8">Direct Contact</h3>
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-white/70">location_on</span>
                        <div>
                            <p class="font-label-sm text-label-sm text-white/70 uppercase mb-1">Global Headquarters</p>
                            <p class="font-body-md">Technoparkstrasse 1<br>8005 Zurich, Switzerland</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-white/70">mail</span>
                        <div>
                            <p class="font-label-sm text-label-sm text-white/70 uppercase mb-1">Email</p>
                            <a href="mailto:contact@ai-solutions.com" class="font-body-md hover:underline">contact@ai-solutions.com</a>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-white/70">phone</span>
                        <div>
                            <p class="font-label-sm text-label-sm text-white/70 uppercase mb-1">Phone</p>
                            <a href="tel:+41440000000" class="font-body-md hover:underline">+41 44 000 00 00</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Links -->
            <div class="bg-surface-container-low border border-outline-variant p-8 angled-notch hover-glow transition-all">
                <p class="font-label-sm text-label-sm text-outline uppercase tracking-widest mb-6">Connect Digitally</p>
                <div class="flex gap-4">
                    <a href="#" class="w-12 h-12 rounded-full border border-outline-variant flex items-center justify-center hover:bg-secondary-container hover:text-secondary hover:border-secondary transition-all">
                        <span class="material-symbols-outlined">public</span>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-full border border-outline-variant flex items-center justify-center hover:bg-secondary-container hover:text-secondary hover:border-secondary transition-all">
                        <span class="material-symbols-outlined">hub</span>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-full border border-outline-variant flex items-center justify-center hover:bg-secondary-container hover:text-secondary hover:border-secondary transition-all">
                        <span class="material-symbols-outlined">code</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

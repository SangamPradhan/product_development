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
<header class="pt-32 md:pt-[160px] pb-12 md:pb-section-gap px-6 md:px-margin-desktop text-center">
    <div class="max-w-4xl mx-auto" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary-container/30 border border-secondary/20 rounded-full mb-6 hover-glow cursor-default">
            <span class="material-symbols-outlined text-[16px] text-secondary">mail</span>
            <span class="font-label-sm text-label-sm text-on-secondary-container uppercase">Get In Touch</span>
        </div>
        <h1 class="font-display-lg text-4-xl md:text-display-lg text-on-surface mb-6 md:mb-8 tracking-tight leading-tight">Let's build the future together.</h1>
        <p class="font-body-lg text-sm md:text-body-lg text-on-surface-variant max-w-2xl mx-auto">Reach out to our team of experts to discuss enterprise solutions, strategic partnerships, or custom architecture for your AI automation needs.</p>
    </div>
</header>

<main class="px-6 md:px-margin-desktop pb-16 md:pb-section-gap max-w-7xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
        <!-- Contact Form Card -->
        <div class="md:col-span-8 bg-surface-container-low border border-outline-variant p-6 md:p-10 angled-notch hover-glow transition-all mb-8 md:mb-0" data-aos="fade-right">
            <h2 class="text-headline-md text-xl md:text-headline-md mb-6 md:mb-8 font-bold">Send us a message</h2>
            <form id="contact-form" action="{{ route('front.contact.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-label-sm font-label-sm text-outline mb-2 uppercase font-bold text-xs">First Name</label>
                        <input type="text" name="first_name" oninput="this.value = this.value.replace(/[0-9]/g, '')" pattern="^[A-Za-z\s\-]+$" title="Only letters, spaces, and hyphens are allowed" class="w-full bg-surface border border-outline-variant p-4 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md rounded-lg" placeholder="John" required>
                    </div>
                    <div>
                        <label class="block text-label-sm font-label-sm text-outline mb-2 uppercase font-bold text-xs">Last Name</label>
                        <input type="text" name="last_name" oninput="this.value = this.value.replace(/[0-9]/g, '')" pattern="^[A-Za-z\s\-]+$" title="Only letters, spaces, and hyphens are allowed" class="w-full bg-surface border border-outline-variant p-4 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md rounded-lg" placeholder="Doe" required>
                    </div>
                </div>
                <div>
                    <label class="block text-label-sm font-label-sm text-outline mb-2 uppercase font-bold text-xs">Email Address</label>
                    <input type="email" name="email" class="w-full bg-surface border border-outline-variant p-4 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md rounded-lg" placeholder="john@enterprise.com" required>
                </div>
                <div>
                    <label class="block text-label-sm font-label-sm text-outline mb-2 uppercase font-bold text-xs">Inquiry Type</label>
                    <select name="type" class="w-full bg-surface border border-outline-variant p-4 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md rounded-lg">
                        <option value="enterprise">Enterprise Solutions</option>
                        <option value="partnership">Partnership Opportunities</option>
                        <option value="support">Technical Support</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div>
                    <label class="block text-label-sm font-label-sm text-outline mb-2 uppercase font-bold text-xs">Message</label>
                    <textarea name="message" id="contact_message" rows="5" class="w-full bg-surface border border-outline-variant p-4 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md resize-none rounded-lg" placeholder="How can we help you?" required></textarea>
                    <div id="contact_word_count" class="text-xs text-on-surface-variant mt-1 text-right">0 / 300 words</div>
                </div>
                <button type="submit" class="notch-button bg-secondary text-white px-6 md:px-8 py-3.5 md:py-4 font-label-sm text-xs md:text-label-sm uppercase tracking-widest hover:bg-on-secondary-fixed-variant transition-all hover-glow inline-flex items-center gap-2 font-bold w-full sm:w-auto justify-center">
                    Submit Inquiry <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                </button>
            </form>
        </div>

        <!-- Right Side Information -->
        <div class="md:col-span-4 flex flex-col gap-gutter" data-aos="fade-left" data-aos-delay="100">
            <!-- Contact Info -->
            <div class="bg-secondary text-white p-6 md:p-10 angled-notch flex-1 flex flex-col justify-center hover-glow transition-all min-h-[300px]">
                <h3 class="text-headline-md text-xl md:text-headline-md mb-6 md:mb-8 font-bold">Direct Contact</h3>
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-white/70">location_on</span>
                        <div>
                            <p class="font-label-sm text-xs text-white/70 uppercase mb-1 font-bold">Global Headquarters</p>
                            <p class="font-body-md text-sm md:text-base">Technoparkstrasse 1<br>8005 Zurich, Switzerland</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-white/70">mail</span>
                        <div>
                            <p class="font-label-sm text-xs text-white/70 uppercase mb-1 font-bold">Email</p>
                            <a href="mailto:contact@ai-solutions.com" class="font-body-md text-sm md:text-base hover:underline">contact@ai-solutions.com</a>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-white/70">phone</span>
                        <div>
                            <p class="font-label-sm text-xs text-white/70 uppercase mb-1 font-bold">Phone</p>
                            <a href="tel:+41440000000" class="font-body-md text-sm md:text-base hover:underline">+41 44 000 00 00</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Links -->
            <div class="bg-surface-container-low border border-outline-variant p-6 md:p-8 angled-notch hover-glow transition-all">
                <p class="font-label-sm text-xs text-outline uppercase tracking-widest mb-6 font-bold">Connect Digitally</p>
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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const textarea = document.getElementById('contact_message');
        const wordCountDisplay = document.getElementById('contact_word_count');
        const maxWords = 300;

        if (textarea && wordCountDisplay) {
            textarea.addEventListener('input', function() {
                let text = this.value.trim();
                let words = text ? text.split(/\s+/) : [];
                let wordCount = words.length;

                if (wordCount > maxWords) {
                    // Truncate to maxWords
                    words = words.slice(0, maxWords);
                    this.value = words.join(' ');
                    wordCount = maxWords;
                }

                wordCountDisplay.textContent = `${wordCount} / ${maxWords} words`;
                if (wordCount === maxWords) {
                    wordCountDisplay.classList.add('text-error');
                    wordCountDisplay.classList.remove('text-on-surface-variant');
                } else {
                    wordCountDisplay.classList.remove('text-error');
                    wordCountDisplay.classList.add('text-on-surface-variant');
                }
            });
        }

        const contactForm = document.getElementById('contact-form');
        if (contactForm) {
            contactForm.addEventListener('submit', function() {
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        title: 'Submitting Inquiry...',
                        text: 'Please wait while we process your request.',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                }
            });
        }
    });
</script>
@endpush

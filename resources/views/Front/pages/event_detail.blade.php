@extends('front.layouts.app')

@section('title', $event->title . ' | AI-Solutions')

@push('styles')
<style>
    .angled-notch {
        clip-path: polygon(
            0 0, 
            calc(100% - 20px) 0, 
            100% 20px, 
            100% 100%, 
            20px 100%, 
            0 calc(100% - 20px)
        );
    }
    /* Styling for Quill HTML content */
    .ql-content h1 { font-size: 2rem; font-weight: 800; line-height: 1.25; margin-top: 1.5rem; margin-bottom: 0.75rem; color: var(--md-sys-color-on-surface); }
    .ql-content h2 { font-size: 1.5rem; font-weight: 700; line-height: 1.35; margin-top: 1.25rem; margin-bottom: 0.5rem; color: var(--md-sys-color-on-surface); }
    .ql-content p { margin-bottom: 1rem; }
    .ql-content ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1rem; }
    .ql-content ol { list-style-type: decimal; padding-left: 1.5rem; margin-bottom: 1rem; }
    .ql-content li { margin-bottom: 0.25rem; }
    .ql-content blockquote { border-l-4 border-primary bg-surface-container-low/75 p-3 pl-5 italic rounded-r-lg my-4 text-on-surface-variant; }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<header class="relative w-full h-[600px] flex items-end pb-section-gap overflow-hidden pt-32">
    <div class="absolute inset-0 z-0">
        @if($event->main_image)
            <img class="w-full h-full object-cover" src="{{ $event->main_image_url }}" alt="{{ $event->title }}"/>
        @else
            <img class="w-full h-full object-cover opacity-20" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAtMXaP067yXg5TVsjqPwSo69RCQ2QCMtbTQsDvjcMpfgKSEc12ee8wOQZ-6xaJoz1K5e-XqVrCduzTJQ59EQDB9Hicb2SOmTCIiX632pmIMHBDlLe_w6j98HOkuWElNLT6av4eRX_ma9bX01pRofBBUucJ3XQcYVsAagfyDuGjYKw0hEz24DZQCjwi7-4SjnEJaY-XYiXovVEB_IhKLvYsSvxmZ28pG6QlteLuSkBd9IyCP69PmIaska6OVQfjnYCTaV8n-aAEvsk" alt="Default Event Image"/>
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-background via-background/60 to-transparent"></div>
    </div>
    <div class="relative z-10 px-margin-desktop w-full max-w-7xl mx-auto" data-aos="fade-up">
        <div class="max-w-3xl">
            <div class="flex items-center gap-2 mb-4">
                <span class="bg-secondary-container text-on-secondary-container font-label-sm text-label-sm px-3 py-1 rounded-full hover-glow cursor-default uppercase">{{ $event->category }}</span>
                <span class="text-on-surface/80 font-label-sm text-label-sm">| {{ $event->event_date->format('M d, Y') }}</span>
                @if($event->event_date->isPast())
                    <span class="bg-outline-variant text-on-surface-variant font-label-sm text-[10px] px-2 py-0.5 rounded uppercase font-bold">Past Event</span>
                @endif
            </div>
            <h1 class="font-display-lg text-display-lg text-on-surface mb-8">
                {{ $event->title }}
            </h1>
        </div>
    </div>
</header>

<!-- Registration Anchor & Details -->
<section class="px-margin-desktop -mt-24 relative z-20">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-gutter">
        <div class="md:col-span-8 bg-surface-container-lowest border border-outline-variant/30 p-12 angled-notch shadow-sm hover-glow transition-all" data-aos="fade-right">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
                <div class="space-y-2">
                    <span class="material-symbols-outlined text-secondary text-2xl">calendar_today</span>
                    <h4 class="font-label-sm text-label-sm text-outline">DATE</h4>
                    <p class="font-headline-md text-headline-md font-bold">{{ $event->event_date->format('M d, Y') }}</p>
                </div>
                <div class="space-y-2">
                    <span class="material-symbols-outlined text-secondary text-2xl">schedule</span>
                    <h4 class="font-label-sm text-label-sm text-outline">TIME</h4>
                    <p class="font-headline-md text-headline-md font-bold">{{ $event->event_date->format('h:i A') }}</p>
                </div>
                <div class="space-y-2">
                    <span class="material-symbols-outlined text-secondary text-2xl">location_on</span>
                    <h4 class="font-label-sm text-label-sm text-outline">LOCATION</h4>
                    <p class="font-headline-md text-headline-md font-bold">{{ $event->location }}</p>
                </div>
            </div>
            @if($event->event_date->isPast())
                <button disabled class="notch-button inline-block w-full md:w-auto bg-outline-variant/30 text-on-surface-variant/40 font-label-sm text-label-sm px-12 py-4 cursor-not-allowed text-center font-bold uppercase">
                    Registration Closed
                </button>
            @else
                <button onclick="toggleBookingForm()" class="notch-button inline-block w-full md:w-auto bg-secondary text-white font-label-sm text-label-sm px-12 py-4 hover:bg-on-secondary-fixed-variant transition-all hover-glow text-center font-bold uppercase tracking-wider">
                    Book Your Seat Now
                </button>

                <!-- Collapsible Booking Form Card -->
                <div id="booking-form-container" class="hidden mt-8 pt-8 border-t border-outline-variant/30">
                    <h3 class="text-headline-md font-headline-md mb-6">Register for this Event</h3>
                    <form action="{{ route('front.event.book', $event->id) }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-label-sm font-label-sm text-outline mb-2 uppercase">Your Name</label>
                                <input type="text" name="name" pattern="^[A-Za-z\s\-]+$" title="Only letters, spaces, and hyphens are allowed" class="w-full bg-surface border border-outline-variant p-4 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md" placeholder="John Doe" required>
                            </div>
                            <div>
                                <label class="block text-label-sm font-label-sm text-outline mb-2 uppercase">Email Address</label>
                                <input type="email" name="email" class="w-full bg-surface border border-outline-variant p-4 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md" placeholder="john@example.com" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-label-sm font-label-sm text-outline mb-2 uppercase">Phone Number</label>
                                <input type="tel" name="phone" pattern="^\+?[0-9\s\-\(\)]+$" title="Please enter a valid phone number" class="w-full bg-surface border border-outline-variant p-4 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md" placeholder="+1 (555) 000-0000" required>
                            </div>
                            <div>
                                <label class="block text-label-sm font-label-sm text-outline mb-2 uppercase">Seats / Tickets</label>
                                <select name="seats" class="w-full bg-surface border border-outline-variant p-4 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md">
                                    <option value="1">1 Seat</option>
                                    <option value="2">2 Seats</option>
                                    <option value="3">3 Seats</option>
                                    <option value="4">4 Seats</option>
                                    <option value="5">5 Seats</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="block text-label-sm font-label-sm text-outline mb-2 uppercase">Special Requests / Message</label>
                            <textarea name="message" rows="3" class="w-full bg-surface border border-outline-variant p-4 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all font-body-md resize-none" placeholder="Any specific requirements..."></textarea>
                        </div>
                        <button type="submit" class="notch-button bg-secondary text-white px-8 py-4 font-label-sm text-label-sm uppercase tracking-widest hover:bg-on-secondary-fixed-variant transition-all hover-glow inline-flex items-center gap-2">
                            Confirm Registration <span class="material-symbols-outlined text-[18px]">event_available</span>
                        </button>
                    </form>
                </div>
            @endif
        </div>
        
        @if($event->event_date->isPast())
            <div class="md:col-span-4 bg-surface-container border border-outline-variant/30 p-8 flex flex-col justify-center angled-notch hover-glow transition-all" data-aos="fade-left" data-aos-delay="100">
                <h3 class="font-headline-md text-headline-md text-on-surface-variant mb-4">Event Concluded</h3>
                <p class="font-body-md text-body-md text-on-surface-variant/80 mb-6">
                    This event has already taken place. Subscribe to our newsletter or check upcoming events to join future sessions.
                </p>
                <div class="flex items-center gap-2 text-on-surface-variant">
                    <span class="material-symbols-outlined">event_busy</span>
                    <span class="font-label-sm text-label-sm uppercase tracking-widest font-bold">Ended</span>
                </div>
            </div>
        @else
            <div class="md:col-span-4 bg-secondary-container p-8 flex flex-col justify-center angled-notch hover-glow transition-all" data-aos="fade-left" data-aos-delay="100">
                <h3 class="font-headline-md text-headline-md text-on-secondary-container mb-4">Limited Availability</h3>
                <p class="font-body-md text-body-md text-on-secondary-fixed-variant mb-6">
                    Only a few seats remaining for this exclusive session. Secure your spot today.
                </p>
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">timer</span>
                    <span class="font-label-sm text-label-sm uppercase tracking-widest font-bold">Register Early</span>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Main Content Grid -->
<section class="py-section-gap px-margin-desktop max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-16">
    <!-- Left: Description & Additional Gallery -->
    <div class="lg:col-span-8 space-y-16">
        <div data-aos="fade-up">
            <h2 class="font-headline-lg text-headline-lg mb-8">About the Event</h2>
            <!-- Render Quill Rich HTML Content -->
            <div class="ql-content font-body-lg text-body-lg text-on-surface-variant">
                {!! $event->description !!}
            </div>
        </div>

        <!-- Additional Images (Up to 2) -->
        @if($event->images->count() > 0)
            <div data-aos="fade-up">
                <h3 class="font-headline-md text-headline-md mb-6">Event Gallery</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($event->images as $img)
                        <div class="overflow-hidden rounded-xl border border-outline-variant/30 angled-notch">
                            <img src="{{ $img->image_url }}" alt="Event image" class="w-full h-64 object-cover hover:scale-105 transition-transform duration-500">
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <!-- Right: Sidebar and Similar Events -->
    <aside class="lg:col-span-4 space-y-12" data-aos="fade-left" data-aos-delay="200">
        <!-- Similar Events -->
        <div>
            <h3 class="font-headline-md text-headline-md mb-8 border-l-4 border-secondary pl-4 font-bold">Similar Upcoming Events</h3>
            <div class="grid grid-cols-1 gap-6">
                @forelse($similarEvents as $sim)
                    <a href="{{ route('front.event.detail', $sim->slug) }}" class="group block p-6 border border-outline-variant/30 hover:border-secondary bg-surface-container-low transition-all hover-glow rounded-lg">
                        <span class="text-[10px] font-label-sm text-secondary uppercase font-bold">{{ $sim->category }}</span>
                        <h4 class="font-headline-md text-headline-md text-on-surface group-hover:text-secondary transition-colors mt-2">{{ $sim->title }}</h4>
                        <p class="text-xs text-on-surface-variant mt-2">{{ $sim->event_date->format('M d, Y') }}</p>
                    </a>
                @empty
                    <p class="text-sm text-on-surface-variant">No other upcoming events in this category.</p>
                @endforelse
            </div>
        </div>

        <!-- CTA Card -->
        <div class="p-8 bg-surface-container border border-outline-variant/20 angled-notch hover-glow transition-all">
            <p class="font-label-sm text-label-sm text-secondary mb-2 font-bold">PARTNER WITH US</p>
            <h4 class="font-headline-md text-headline-md mb-4">Sponsorship Opportunities</h4>
            <p class="font-body-md text-body-md text-on-surface-variant mb-6">Connect your brand with decision makers at the forefront of AI.</p>
            <a href="{{ route('front.contact') }}" class="inline-flex items-center gap-2 text-secondary font-bold hover:gap-4 transition-all">
                Inquire Sponsorship <span class="material-symbols-outlined">arrow_right_alt</span>
            </a>
        </div>
    </aside>
</section>
@endsection

@push('scripts')
<script>
    function toggleBookingForm() {
        const container = document.getElementById('booking-form-container');
        if (container) {
            if (container.classList.contains('hidden')) {
                container.classList.remove('hidden');
                container.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } else {
                container.classList.add('hidden');
            }
        }
    }
</script>
@endpush

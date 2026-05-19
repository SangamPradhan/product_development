<!-- Footer -->
<footer class="w-full py-16 px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter bg-surface-container-lowest dark:bg-surface-container-highest border-t border-outline-variant/10">
    <div class="col-span-1 md:col-span-1 space-y-6">
        <div class="text-headline-md font-headline-md font-bold text-on-surface">AI-Solutions</div>
        <p class="text-body-md font-body-md text-on-surface-variant">Precision in Automation. Architecture for the future of enterprise decision making.</p>
        <div class="flex gap-4">
            <a class="text-secondary hover:text-secondary-fixed transition-colors" href="#"><span class="material-symbols-outlined">alternate_email</span></a>
            <a class="text-secondary hover:text-secondary-fixed transition-colors" href="#"><span class="material-symbols-outlined">public</span></a>
            <a class="text-secondary hover:text-secondary-fixed transition-colors" href="#"><span class="material-symbols-outlined">hub</span></a>
        </div>
    </div>
    <div>
        <h4 class="font-headline-md text-[18px] mb-6">Product</h4>
        <ul class="space-y-4">
            <li><a class="text-label-sm font-label-sm text-on-surface-variant hover:text-secondary underline transition-all" href="#">Features</a></li>
            <li><a class="text-label-sm font-label-sm text-on-surface-variant hover:text-secondary underline transition-all" href="#">Security</a></li>
            <li><a class="text-label-sm font-label-sm text-on-surface-variant hover:text-secondary underline transition-all" href="#">Case Studies</a></li>
            <li><a class="text-label-sm font-label-sm text-on-surface-variant hover:text-secondary underline transition-all" href="#">Pricing</a></li>
        </ul>
    </div>
    <div>
        <h4 class="font-headline-md text-[18px] mb-6">Company</h4>
        <ul class="space-y-4">
            <li><a class="text-label-sm font-label-sm text-on-surface-variant hover:text-secondary underline transition-all" href="{{ route('front.about') }}">About Us</a></li>
            <li><a class="text-label-sm font-label-sm text-on-surface-variant hover:text-secondary underline transition-all" href="{{ route('front.contact') }}">Contact Us</a></li>
            <li><a class="text-label-sm font-label-sm text-on-surface-variant hover:text-secondary underline transition-all" href="#">Privacy Policy</a></li>
            <li><a class="text-label-sm font-label-sm text-on-surface-variant hover:text-secondary underline transition-all" href="#">Terms of Service</a></li>
        </ul>
    </div>
    <div>
        <h4 class="font-headline-md text-[18px] mb-6">Stay Informed</h4>
        <p class="text-label-sm font-label-sm text-on-surface-variant mb-4">Get the latest on AI automation.</p>
        <div class="flex gap-2">
            <input class="bg-surface-container-low border-outline-variant/30 rounded-lg px-4 py-2 text-label-sm w-full focus:border-secondary focus:ring-0" placeholder="Email address" type="email"/>
            <button class="bg-secondary text-white p-2 rounded-lg"><span class="material-symbols-outlined">send</span></button>
        </div>
    </div>
    <div class="col-span-1 md:col-span-4 pt-12 mt-12 border-t border-outline-variant/10 flex flex-col md:flex-row justify-between items-center gap-4">
        <p class="text-label-sm font-label-sm text-on-surface-variant">© {{ date('Y') }} AI-Solutions. All rights reserved. Precision in Automation.</p>
        <div class="flex gap-6">
            <a class="text-label-sm font-label-sm text-on-surface-variant hover:text-secondary" href="#">Cookie Settings</a>
            <a class="text-label-sm font-label-sm text-on-surface-variant hover:text-secondary" href="#">System Status</a>
        </div>
    </div>
</footer>

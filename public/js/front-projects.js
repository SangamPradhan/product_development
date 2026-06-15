/**
 * Public site: load projects from REST API.
 */
(function () {
    const api = window.LaravelApi;
    function getConfig() {
        return {
            projectDetailBase: window.__APP__?.projectsBase || window.frontProjectConfig?.projectDetailBase || '/projects',
            slug: window.frontProjectConfig?.slug || null,
        };
    }

    function projectsFromResponse(response) {
        if (Array.isArray(response)) {
            return response;
        }

        if (Array.isArray(response?.data)) {
            return response.data;
        }

        return [];
    }

    function isFeatured(project) {
        return project?.is_featured === true || project?.is_featured === 1 || project?.is_featured === '1';
    }

    function showLoadError(container, message) {
        if (!container) {
            return;
        }

        container.innerHTML = `<p class="text-error col-span-full text-center py-12">${message}</p>`;
    }

    if (!api) {
        showLoadError(document.getElementById('projects-grid'), 'Unable to load projects API helper.');
        showLoadError(document.getElementById('project-detail-root'), 'Unable to load projects API helper.');
        return;
    }

    function escapeHtml(value) {
        const div = document.createElement('div');
        div.textContent = value ?? '';
        return div.innerHTML;
    }

    function tagsMarkup(tags, limit = 2) {
        if (!tags) return '';
        return tags.split(',').slice(0, limit).map((tag) => (
            `<span class="bg-tertiary-fixed text-on-tertiary-fixed-variant px-3 py-1 text-label-sm font-label-sm">${escapeHtml(tag.trim())}</span>`
        )).join('');
    }

    function renderFeatured(featured, container) {
        if (!container || !featured) {
            container?.classList.add('hidden');
            return;
        }

        const image = featured.featured_image_url
            ? `<img class="w-full h-[500px] object-cover notch-container grayscale hover:grayscale-0 transition-all duration-700 peek-effect" src="${featured.featured_image_url}" alt="${escapeHtml(featured.title)}"/>`
            : `<div class="w-full h-[500px] bg-secondary-container notch-container flex items-center justify-center">
                    <span class="material-symbols-outlined text-secondary text-6xl">folder_special</span>
               </div>`;

        container.innerHTML = `
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-center">
            <div class="lg:col-span-7 bg-surface-container-low notch-container p-8 lg:p-12 border border-outline-variant/30 hover-glow transition-all" data-aos="fade-right">
                ${image}
            </div>
            <div class="lg:col-span-5 lg:pl-12" data-aos="fade-left" data-aos-delay="200">
                <span class="font-label-sm text-label-sm text-secondary mb-4 block">${escapeHtml((featured.type || 'PROJECT').toUpperCase())}</span>
                <h2 class="font-headline-lg text-headline-lg mb-6 leading-tight">${escapeHtml(featured.title)}</h2>
                <p class="font-body-md text-body-md text-on-surface-variant mb-8">${escapeHtml(featured.description || featured.subtitle)}</p>
                <div class="flex gap-4 mb-8">
                    <div class="bg-surface-container p-4 flex-1">
                        <p class="text-secondary font-headline-md text-headline-md">${escapeHtml(featured.result_1_value || '')}</p>
                        <p class="text-label-sm font-label-sm uppercase opacity-60 line-clamp-1">${escapeHtml(featured.result_1_title || '')}</p>
                    </div>
                    <div class="bg-surface-container p-4 flex-1">
                        <p class="text-secondary font-headline-md text-headline-md">${escapeHtml(featured.result_2_value || '')}</p>
                        <p class="text-label-sm font-label-sm uppercase opacity-60 line-clamp-1">${escapeHtml(featured.result_2_label || '')}</p>
                    </div>
                </div>
                <a href="${getConfig().projectDetailBase}/${featured.slug}" class="notch-button bg-secondary text-on-secondary px-8 py-4 font-label-sm text-label-sm hover:bg-on-secondary-fixed-variant transition-all hover-glow inline-block">
                    VIEW FULL DETAILS
                </a>
            </div>
        </div>`;
        container.classList.remove('hidden');
    }

    function renderGrid(projects, grid) {
        if (!grid) return;
        if (!projects.length) {
            grid.innerHTML = '<p class="text-on-surface-variant col-span-full text-center py-12">No projects published yet.</p>';
            return;
        }

        grid.innerHTML = projects.map((proj, index) => {
            const image = proj.featured_image_url
                ? `<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 peek-effect" src="${proj.featured_image_url}" alt="${escapeHtml(proj.title)}"/>`
                : `<div class="w-full h-full bg-secondary-container flex items-center justify-center">
                        <span class="material-symbols-outlined text-secondary text-4xl">inventory_2</span>
                   </div>`;

            return `
            <div class="md:col-span-1 group cursor-pointer" onclick="window.location='${getConfig().projectDetailBase}/${proj.slug}'">
                <div class="bg-surface-container-low notch-container border border-outline-variant/30 h-full overflow-hidden flex flex-col hover-glow transition-all" data-aos="zoom-in" data-aos-delay="${(index % 3 + 1) * 100}">
                    <div class="relative overflow-hidden h-[250px]">${image}</div>
                    <div class="p-8 flex-1 flex flex-col">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="font-headline-md text-headline-md">${escapeHtml(proj.title)}</h3>
                            <span class="material-symbols-outlined text-secondary">arrow_outward</span>
                        </div>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-3">${escapeHtml(proj.description || proj.subtitle)}</p>
                        <div class="mt-auto flex flex-wrap gap-2">
                            <span class="bg-tertiary-fixed text-on-tertiary-fixed-variant px-3 py-1 text-label-sm font-label-sm">${escapeHtml((proj.type || '').toUpperCase())}</span>
                            ${tagsMarkup(proj.tags)}
                        </div>
                    </div>
                </div>
            </div>`;
        }).join('');
    }

    function renderHomeFeatured(project, container) {
        if (!container) return;
        if (!project) {
            container.innerHTML = '';
            return;
        }

        const image = project.featured_image_url
            ? `<img alt="${escapeHtml(project.title)}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 peek-effect" src="${project.featured_image_url}" />`
            : `<div class="w-full h-full bg-secondary/10 flex items-center justify-center grayscale group-hover:grayscale-0 transition-all duration-500">
                    <span class="material-symbols-outlined text-secondary text-6xl">folder_special</span>
               </div>`;

        container.innerHTML = `
        <a href="${getConfig().projectDetailBase}/${project.slug}" class="md:col-span-2 md:row-span-2 angled-notch bg-surface-container p-1 border border-outline-variant/30 group hover-glow block" data-aos="zoom-in">
            <div class="relative overflow-hidden h-[400px]">
                ${image}
                <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-on-surface/80 to-transparent text-white">
                    <span class="font-label-sm text-label-sm text-secondary-fixed mb-2 block uppercase">${escapeHtml(project.type || 'Project')}</span>
                    <h3 class="font-headline-md text-headline-md">${escapeHtml(project.title)}</h3>
                    <p class="font-body-md text-body-md text-surface-variant mt-2 line-clamp-2">${escapeHtml(project.description || project.subtitle)}</p>
                </div>
            </div>
        </a>`;
    }

    function initStarRating() {
        const container = document.getElementById('star-rating-container');
        const input = document.getElementById('selected-rating');
        if (!container || !input) return;

        const stars = container.querySelectorAll('[data-rating]');
        stars.forEach(star => {
            star.addEventListener('click', () => {
                const rating = parseInt(star.getAttribute('data-rating'));
                input.value = rating;
                
                stars.forEach(s => {
                    const r = parseInt(s.getAttribute('data-rating'));
                    s.style.fontVariationSettings = r <= rating ? "'FILL' 1" : "'FILL' 0";
                });
            });
        });
    }

    function initReviewSubmit(projectSlug) {
        const form = document.getElementById('review-submit-form');
        const alertMsg = document.getElementById('form-alert-message');
        if (!form) return;

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            alertMsg.classList.add('hidden');
            alertMsg.className = 'font-label-sm text-xs mt-4';
            
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnHtml = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span>Posting...</span>';

            const payload = {
                reviewer_name: document.getElementById('reviewer_name').value,
                reviewer_email: document.getElementById('reviewer_email').value,
                reviewer_title: document.getElementById('reviewer_title').value,
                rating: parseInt(document.getElementById('selected-rating').value),
                comment: document.getElementById('review_comment').value
            };

            try {
                const response = await api.post(`/projects/${encodeURIComponent(projectSlug)}/reviews`, JSON.stringify(payload));
                alertMsg.textContent = response?.message || 'Review submitted successfully!';
                alertMsg.classList.remove('hidden');
                alertMsg.classList.add('text-secondary');
                form.reset();
                
                document.getElementById('selected-rating').value = '4';
                const stars = document.querySelectorAll('#star-rating-container [data-rating]');
                stars.forEach(s => {
                    const r = parseInt(s.getAttribute('data-rating'));
                    s.style.fontVariationSettings = r <= 4 ? "'FILL' 1" : "'FILL' 0";
                });

            } catch (err) {
                console.error('Submit review error:', err);
                const errorMsg = err?.payload?.message || err.message || 'Failed to submit review. Please try again.';
                alertMsg.textContent = errorMsg;
                alertMsg.classList.remove('hidden');
                alertMsg.classList.add('text-error');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHtml;
            }
        });
    }

    function initReviewsCarousel() {
        const carousel = document.getElementById('reviews-carousel');
        const inner = document.getElementById('reviews-carousel-inner');
        if (!carousel || !inner) return;

        const items = inner.children;
        if (items.length > 2 && inner.scrollHeight > carousel.clientHeight) {
            const originalContent = inner.innerHTML;
            inner.innerHTML = originalContent + originalContent;

            let scrollSpeed = 0.4;
            let scrollPos = 0;
            let animationFrameId;

            function step() {
                scrollPos += scrollSpeed;
                if (scrollPos >= inner.scrollHeight / 2) {
                    scrollPos = 0;
                }
                carousel.scrollTop = scrollPos;
                animationFrameId = requestAnimationFrame(step);
            }

            carousel.addEventListener('mouseenter', () => {
                cancelAnimationFrame(animationFrameId);
            });

            carousel.addEventListener('mouseleave', () => {
                animationFrameId = requestAnimationFrame(step);
            });

            animationFrameId = requestAnimationFrame(step);
        }
    }

    async function loadAndRenderReviews(projectSlug) {
        const inner = document.getElementById('reviews-carousel-inner');
        if (!inner) return;

        try {
            const response = await api.get(`/projects/${encodeURIComponent(projectSlug)}/reviews`);
            const reviews = response?.data || [];

            if (reviews.length === 0) {
                inner.innerHTML = '<p class="text-on-surface-variant text-center py-12 italic">No approved reviews yet. Be the first to review!</p>';
                return;
            }

            inner.innerHTML = reviews.map((rev) => {
                const ratingStars = Array.from({ length: 5 }, (_, idx) => {
                    const filled = idx < rev.rating ? '1' : '0';
                    return `<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' ${filled};">star</span>`;
                }).join('');

                const designationMarkup = rev.reviewer_title 
                    ? `<span class="text-label-sm font-label-sm text-on-surface-variant">${escapeHtml(rev.reviewer_title)}</span>`
                    : '';

                return `
                <div class="p-8 bg-white border border-outline-variant/20 angled-notch shadow-sm hover-glow transition-all">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h5 class="text-headline-md font-headline-md leading-none">${escapeHtml(rev.reviewer_name)}</h5>
                            ${designationMarkup}
                        </div>
                        <div class="flex text-secondary">
                            ${ratingStars}
                        </div>
                    </div>
                    <p class="text-on-surface-variant italic">"${escapeHtml(rev.comment)}"</p>
                </div>`;
            }).join('');

            initReviewsCarousel();

        } catch (err) {
            console.error('Error loading reviews:', err);
            inner.innerHTML = '<p class="text-error text-center py-12 font-label-sm">Failed to load reviews.</p>';
        }
    }

    function renderDetail(project) {
        const root = document.getElementById('project-detail-root');
        if (!root || !project) return;

        const techTags = project.technologies
            ? project.technologies.split(',').map((tech) => (
                `<span class="bg-secondary-fixed/10 text-on-secondary-fixed text-label-sm font-label-sm px-2 py-1 rounded">${escapeHtml(tech.trim())}</span>`
            )).join('')
            : '';

        const heroImage = project.featured_image_url
            ? `<img class="absolute inset-0 w-full h-full object-cover opacity-60 mix-blend-luminosity" src="${project.featured_image_url}" alt="${escapeHtml(project.title)}"/>`
            : `<div class="absolute inset-0 w-full h-full bg-secondary-container opacity-60"></div>`;

        const sideImage = project.featured_image_url
            ? `<img class="relative z-10 w-full angled-notch-lg grayscale group-hover:grayscale-0 transition-all duration-700 border border-outline-variant/30 hover-glow" src="${project.featured_image_url}" alt="Technical Implementation"/>`
            : `<div class="relative z-10 w-full h-80 angled-notch-lg bg-surface-container flex items-center justify-center border border-outline-variant/30 hover-glow">
                    <span class="material-symbols-outlined text-secondary text-6xl">architecture</span>
               </div>`;

        root.innerHTML = `
        <header class="relative w-full h-[870px] overflow-hidden flex items-end pb-margin-desktop px-margin-desktop bg-on-background pt-32">
            ${heroImage}
            <div class="relative z-10 max-w-4xl" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 mb-6 px-3 py-1 bg-secondary-fixed/20 border border-secondary/30 rounded-full hover-glow cursor-default">
                    <span class="w-2 h-2 rounded-full bg-secondary-fixed animate-pulse"></span>
                    <span class="font-label-sm text-label-sm text-secondary-fixed">${escapeHtml((project.type || 'PROJECT').toUpperCase())}</span>
                </div>
                <h1 class="text-display-lg font-display-lg text-white mb-6 leading-[1.1]">${escapeHtml(project.title)}</h1>
                <p class="text-body-lg font-body-lg text-surface-variant max-w-2xl">${escapeHtml(project.subtitle)}</p>
            </div>
        </header>
        <div class="max-w-7xl mx-auto px-margin-mobile md:px-margin-desktop mt-section-gap">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter mb-section-gap">
                <div class="md:col-span-8" data-aos="fade-right">
                    <h2 class="text-headline-lg font-headline-lg text-on-background mb-8">Project Overview</h2>
                    <div class="space-y-6 text-on-surface-variant text-body-lg font-body-lg leading-relaxed" data-project-overview></div>
                </div>
                <div class="md:col-span-4" data-aos="fade-left" data-aos-delay="100">
                    <div class="bg-surface-container-low p-8 angled-notch border border-outline-variant/30 hover-glow transition-all">
                        <h3 class="font-label-sm text-label-sm text-secondary mb-6 tracking-widest uppercase">Project Details</h3>
                        <ul class="space-y-4">
                            <li class="flex flex-col border-b border-outline-variant/20 pb-4">
                                <span class="text-label-sm font-label-sm text-on-surface-variant">CLIENT</span>
                                <span class="text-body-md font-body-md font-bold">${escapeHtml(project.client || 'Confidential')}</span>
                            </li>
                            <li class="flex flex-col border-b border-outline-variant/20 pb-4">
                                <span class="text-label-sm font-label-sm text-on-surface-variant">DURATION</span>
                                <span class="text-body-md font-body-md font-bold">${escapeHtml(project.duration || 'N/A')}</span>
                            </li>
                            <li class="flex flex-col">
                                <span class="text-label-sm font-label-sm text-on-surface-variant">TECHNOLOGIES</span>
                                <div class="flex flex-wrap gap-2 mt-2">${techTags}</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <section class="mb-section-gap">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-headline-lg font-headline-lg text-on-background">Key Results</h2>
                    <p class="text-on-surface-variant mt-2">Measurable efficiency gains through algorithmic precision.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                    <div class="md:col-span-2 bg-surface-container-low p-10 angled-notch-lg border border-secondary/20 flex flex-col justify-center hover-glow transition-all" data-aos="zoom-in">
                        <span class="text-display-lg font-display-lg text-secondary">${escapeHtml(project.result_1_value || '')}</span>
                        <h4 class="text-headline-md font-headline-md mt-4">${escapeHtml(project.result_1_title || '')}</h4>
                        <p class="text-on-surface-variant mt-4 text-body-lg">${escapeHtml(project.result_1_description || '')}</p>
                    </div>
                    <div class="bg-on-background p-10 angled-notch-lg text-white flex flex-col items-center justify-center text-center hover-glow transition-all" data-aos="zoom-in" data-aos-delay="100">
                        <span class="text-headline-lg font-headline-lg text-secondary-fixed">${escapeHtml(project.result_2_value || '')}</span>
                        <p class="mt-4 text-label-sm font-label-sm text-surface-variant uppercase tracking-widest">${escapeHtml(project.result_2_label || '')}</p>
                    </div>
                    <div class="md:col-span-3 bg-secondary-fixed/10 p-10 angled-notch-lg border border-secondary/40 flex items-center gap-8 hover-glow transition-all" data-aos="zoom-in" data-aos-delay="200">
                        <div class="w-24 h-24 rounded-full bg-white flex items-center justify-center border border-secondary shrink-0">
                            <span class="material-symbols-outlined text-secondary text-4xl" style="font-variation-settings: 'FILL' 1;">verified</span>
                        </div>
                        <div>
                            <h4 class="text-headline-md font-headline-md">${escapeHtml(project.result_3_title || '')}</h4>
                            <p class="text-on-surface-variant mt-2">${escapeHtml(project.result_3_description || '')}</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-section-gap grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-headline-lg font-headline-lg text-on-background mb-8">Technical Implementation</h2>
                    <div class="space-y-12">
                        ${[1, 2, 3].map((i) => `
                        <div class="flex gap-6">
                            <span class="font-label-sm text-label-sm text-secondary mt-1">0${i}</span>
                            <div>
                                <h4 class="text-headline-md font-headline-md mb-3">${escapeHtml(project[`impl_${i}_title`] || '')}</h4>
                                <p class="text-on-surface-variant text-body-md">${escapeHtml(project[`impl_${i}_description`] || '')}</p>
                            </div>
                        </div>`).join('')}
                    </div>
                </div>
                <div class="relative group" data-aos="fade-left">
                    <div class="absolute inset-0 bg-secondary-fixed/5 rounded-3xl -rotate-2 group-hover:rotate-0 transition-all duration-500"></div>
                    ${sideImage}
                </div>
            </section>

            <!-- User Reviews & Ratings -->
            <section class="mb-section-gap py-section-gap border-t border-outline-variant/30">
                <h2 class="text-headline-lg font-headline-lg text-on-background mb-12">User Reviews &amp; Ratings</h2>
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
                    <!-- Review Form -->
                    <div class="lg:col-span-5" data-aos="fade-right">
                        <div class="bg-surface-container-low p-8 angled-notch border border-outline-variant/30 hover-glow transition-all">
                            <h3 class="text-headline-md font-headline-md mb-6">Submit Your Review</h3>
                            <form id="review-submit-form" class="space-y-6">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="flex flex-col gap-2">
                                        <label class="text-label-sm font-label-sm text-on-surface-variant">NAME</label>
                                        <input id="reviewer_name" required class="bg-white border-outline-variant/30 focus:border-secondary focus:ring-0 p-3 text-body-md angled-notch" placeholder="John Doe" type="text"/>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label class="text-label-sm font-label-sm text-on-surface-variant">EMAIL</label>
                                        <input id="reviewer_email" required class="bg-white border-outline-variant/30 focus:border-secondary focus:ring-0 p-3 text-body-md angled-notch" placeholder="john@example.com" type="email"/>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-label-sm font-label-sm text-on-surface-variant">DESIGNATION / COMPANY (OPTIONAL)</label>
                                    <input id="reviewer_title" class="bg-white border-outline-variant/30 focus:border-secondary focus:ring-0 p-3 text-body-md angled-notch" placeholder="e.g. CTO, Nexus Corp" type="text"/>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-label-sm font-label-sm text-on-surface-variant">RATING</label>
                                    <div id="star-rating-container" class="flex gap-2 text-secondary">
                                        <span class="material-symbols-outlined cursor-pointer" data-rating="1" style="font-variation-settings: 'FILL' 1;">star</span>
                                        <span class="material-symbols-outlined cursor-pointer" data-rating="2" style="font-variation-settings: 'FILL' 1;">star</span>
                                        <span class="material-symbols-outlined cursor-pointer" data-rating="3" style="font-variation-settings: 'FILL' 1;">star</span>
                                        <span class="material-symbols-outlined cursor-pointer" data-rating="4" style="font-variation-settings: 'FILL' 1;">star</span>
                                        <span class="material-symbols-outlined cursor-pointer" data-rating="5" style="font-variation-settings: 'FILL' 0;">star</span>
                                    </div>
                                    <input type="hidden" id="selected-rating" value="4"/>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-label-sm font-label-sm text-on-surface-variant">YOUR REVIEW</label>
                                    <textarea id="review_comment" required class="bg-white border-outline-variant/30 focus:border-secondary focus:ring-0 p-3 text-body-md angled-notch resize-none" placeholder="Share your experience..." rows="4"></textarea>
                                </div>
                                <button class="w-full bg-secondary text-white py-4 angled-notch font-bold text-label-sm uppercase tracking-widest hover:bg-secondary-fixed hover:text-on-secondary-fixed transition-colors flex justify-center items-center gap-2" type="submit">
                                    <span>Post Review</span>
                                </button>
                                <div id="form-alert-message" class="hidden font-label-sm text-xs mt-4"></div>
                            </form>
                        </div>
                    </div>
                    <!-- Existing Reviews -->
                    <div class="lg:col-span-7" data-aos="fade-left" data-aos-delay="100">
                        <div id="reviews-carousel" class="overflow-hidden relative max-h-[500px]" style="height: 480px;">
                            <div id="reviews-carousel-inner" class="space-y-gutter">
                                <p class="text-on-surface-variant text-center py-12">Loading reviews...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>`;

        const overviewEl = root.querySelector('[data-project-overview]');
        if (overviewEl) {
            overviewEl.innerHTML = project.overview || '';
        }

        initStarRating();
        initReviewSubmit(project.slug);
        loadAndRenderReviews(project.slug);

        if (typeof AOS !== 'undefined') {
            setTimeout(() => {
                AOS.init();
            }, 100);
        }
    }

    function setupFilters(projects, gridEl) {
        const filterContainer = document.getElementById('filter-container');
        if (!filterContainer) return;

        const buttons = filterContainer.querySelectorAll('button[data-filter]');
        buttons.forEach((btn) => {
            btn.addEventListener('click', () => {
                // Update active classes
                buttons.forEach((b) => {
                    b.classList.remove('font-bold', 'text-secondary');
                    b.classList.add('text-on-surface-variant');
                });
                btn.classList.add('font-bold', 'text-secondary');
                btn.classList.remove('text-on-surface-variant');

                const filter = btn.getAttribute('data-filter');
                if (filter === 'all') {
                    renderGrid(projects, gridEl);
                } else {
                    const filtered = projects.filter((p) => (p.type || '').toLowerCase() === filter);
                    renderGrid(filtered, gridEl);
                }

                // Re-init AOS to scan the new dynamic DOM elements
                if (typeof AOS !== 'undefined') {
                    setTimeout(() => {
                        AOS.init();
                    }, 50);
                }
            });
        });
    }

    async function initListPage() {
        const featuredEl = document.getElementById('projects-featured');
        const gridEl = document.getElementById('projects-grid');
        if (!featuredEl && !gridEl) return;

        try {
            const response = await api.get('/projects');
            const projects = projectsFromResponse(response) || [];

            if (!Array.isArray(projects)) {
                console.error('Expected projects array but got:', projects);
                showLoadError(gridEl, 'Unexpected API response format. Check console for details.');
                return;
            }

            try {
                const featured = projects.find((p) => isFeatured(p)) || projects[0];
                renderFeatured(featured, featuredEl);
                renderGrid(projects, gridEl);
                setupFilters(projects, gridEl);
            } catch (renderErr) {
                console.error('Error rendering projects:', renderErr);
                showLoadError(gridEl, 'Error rendering projects. See console for details.');
            }

            if (typeof AOS !== 'undefined') {
                setTimeout(() => {
                    AOS.init();
                }, 100);
            }
        } catch (error) {
            console.error('API error fetching projects:', error);
            const msg = error?.payload?.message || error.message || 'Unable to load projects. Please refresh the page.';
            showLoadError(gridEl, msg);
        }
    }

    async function initDetailPage() {
        const config = getConfig();
        if (!config.slug) {
            return;
        }
        const root = document.getElementById('project-detail-root');
        if (!root) {
            return;
        }
        root.innerHTML = '<p class="text-center py-24 text-on-surface-variant">Loading project...</p>';
        try {
            const response = await api.get(`/projects/${encodeURIComponent(config.slug)}`);
            const project = response?.data ?? response;
            renderDetail(project);
        } catch (error) {
            root.innerHTML = '<p class="text-center py-24 text-error">Project not found.</p>';
        }
    }

    async function initHomeFeatured() {
        const container = document.getElementById('home-featured-project');
        if (!container) return;
        try {
            const response = await api.get('/projects?featured=1');
            let projects = projectsFromResponse(response);
            if (!projects.length) {
                const fallback = await api.get('/projects');
                projects = projectsFromResponse(fallback);
            }
            renderHomeFeatured(projects[0] || null, container);
        } catch (error) {
            container.innerHTML = '';
        }
    }

    function boot() {
        initListPage();
        initDetailPage();
        initHomeFeatured();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', boot);
    } else {
        boot();
    }
})();

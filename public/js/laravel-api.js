/**
 * Shared fetch helper for Laravel JSON API (session + CSRF).
 */
window.LaravelApi = {
    resolveBaseUrl() {
        if (window.__APP__?.apiBase) {
            return String(window.__APP__.apiBase).replace(/\/$/, '');
        }

        const link = document.querySelector('link[rel="api-base"]');
        if (link?.href) {
            return link.href.replace(/\/$/, '');
        }
        // Fallback to origin/api for both admin and front routes
        return `${window.location.origin}/api`;
    },

    csrfToken() {
        return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '';
    },

    async request(path, options = {}) {
        const headers = {
            Accept: 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            ...(options.headers || {}),
        };

        if (!(options.body instanceof FormData)) {
            headers['Content-Type'] = 'application/json';
        }

        if (!options.skipCsrf) {
            headers['X-CSRF-TOKEN'] = this.csrfToken();
        }

        const baseUrl = this.resolveBaseUrl();
        const endpoint = path.startsWith('/') ? path : `/${path}`;
        const response = await fetch(`${baseUrl}${endpoint}`, {
            credentials: 'same-origin',
            ...options,
            headers,
        });

        const contentType = response.headers.get('content-type') || '';
        const payload = contentType.includes('application/json')
            ? await response.json()
            : null;

        if (response.status === 401 && window.location.pathname.includes('/admin')) {
            const login = document.querySelector('meta[name="admin-login-url"]')?.content;
            window.location.href = login || '/admin/login';
            throw new Error('Unauthenticated.');
        }

        if (!response.ok) {
            const error = new Error(payload?.message || `Request failed (${response.status}).`);
            error.status = response.status;
            error.payload = payload;
            throw error;
        }

        return payload;
    },

    get(path) {
        return this.request(path, { method: 'GET' });
    },

    post(path, body) {
        return this.request(path, { method: 'POST', body });
    },

    put(path, body) {
        return this.request(path, { method: 'PUT', body });
    },

    delete(path) {
        return this.request(path, { method: 'DELETE' });
    },
};

/**
 * Shared fetch helper for Laravel JSON API (session + CSRF).
 */
window.LaravelApi = {
    baseUrl: '/api',

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

        const response = await fetch(`${this.baseUrl}${path}`, {
            credentials: 'same-origin',
            ...options,
            headers,
        });

        const contentType = response.headers.get('content-type') || '';
        const payload = contentType.includes('application/json')
            ? await response.json()
            : null;

        if (response.status === 401) {
            window.location.href = '/admin/login';
            throw new Error('Unauthenticated.');
        }

        if (!response.ok) {
            const error = new Error(payload?.message || 'Request failed.');
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

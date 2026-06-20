/**
 * Admin projects: list, create, update, delete via REST API.
 */
(function () {
    const api = window.LaravelApi;
    if (!api) return;

    const routes = window.adminProjectRoutes || {};
    const alertBox = document.getElementById('api-alert');

    function showAlert(message, type = 'success') {
        if (!alertBox) return;
        alertBox.classList.remove('hidden', 'bg-secondary-container', 'bg-error-container', 'text-on-secondary-container', 'text-on-error-container');
        if (type === 'error') {
            alertBox.classList.add('bg-error-container', 'text-on-error-container');
        } else {
            alertBox.classList.add('bg-secondary-container', 'text-on-secondary-container');
        }
        alertBox.querySelector('[data-alert-message]').textContent = message;
        alertBox.classList.remove('hidden');
    }

    function validationErrors(payload) {
        if (!payload?.errors) return payload?.message || 'Validation failed.';
        return Object.values(payload.errors).flat().join(' ');
    }

    function statusBadge(status) {
        if (status === 'Active') {
            return '<span class="px-3 py-1 rounded-full bg-primary-container/20 text-on-primary-container font-label-sm text-[10px] uppercase font-bold">Active</span>';
        }
        if (status === 'In Progress') {
            return '<span class="px-3 py-1 rounded-full bg-secondary-container/40 text-on-secondary-container font-label-sm text-[10px] uppercase font-bold">In Progress</span>';
        }
        return `<span class="px-3 py-1 rounded-full bg-surface-variant text-on-surface-variant font-label-sm text-[10px] uppercase font-bold">${status || 'Paused'}</span>`;
    }

    function tagsHtml(tags) {
        if (!tags) return '-';
        return tags.split(',').map((tag) => (
            `<span class="px-2 py-0.5 rounded border border-outline text-on-surface-variant font-label-sm text-[10px] uppercase">${tag.trim()}</span>`
        )).join('');
    }

    function renderIndex(projects) {
        const tbody = document.getElementById('projects-table-body');
        const countEl = document.getElementById('projects-count');
        if (!tbody) return;

        if (countEl) countEl.textContent = projects.length;

        if (!projects.length) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="5" class="px-8 py-10 text-center text-on-surface-variant font-label-sm uppercase">
                        No projects found.
                    </td>
                </tr>`;
            return;
        }

        tbody.innerHTML = projects.map((item) => {
            const image = item.featured_image_url
                ? `<div class="w-16 h-16 rounded-lg overflow-hidden shrink-0">
                        <img src="${item.featured_image_url}" alt="${item.title}" class="w-full h-full object-cover">
                   </div>`
                : `<div class="w-16 h-16 rounded-lg bg-secondary-container flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-on-secondary-container">folder_special</span>
                   </div>`;

            const featured = item.is_featured
                ? `<div class="mt-2"><span class="px-2 py-0.5 rounded bg-tertiary-fixed text-on-tertiary-fixed-variant font-label-sm text-[9px] uppercase font-bold">Featured</span></div>`
                : '';

            return `
            <tr class="group hover:bg-surface-variant/10 transition-colors" data-project-id="${item.id}">
                <td class="px-8 py-6">
                    <div class="flex items-center gap-4">
                        ${image}
                        <div>
                            <h4 class="font-bold text-on-surface">${item.title}</h4>
                            <p class="text-xs text-secondary mt-1 font-bold">${item.type || ''}</p>
                            <p class="text-sm text-on-surface-variant line-clamp-1 mt-1">${item.subtitle || ''}</p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-6">${statusBadge(item.status)}${featured}</td>
                <td class="px-6 py-6 text-sm text-on-surface">${item.client || '-'}</td>
                <td class="px-6 py-6"><div class="flex flex-wrap gap-1">${tagsHtml(item.tags)}</div></td>
                <td class="px-8 py-6 text-right">
                    <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <a href="${routes.show}/${item.id}" class="p-2 hover:bg-surface-variant rounded-lg text-on-surface-variant transition-colors" title="View Admin Details">
                            <span class="material-symbols-outlined text-base">visibility</span>
                        </a>
                        <a href="${routes.frontDetail}/${item.slug}" target="_blank" class="p-2 hover:bg-surface-variant rounded-lg text-secondary transition-colors" title="View Live on Front">
                            <span class="material-symbols-outlined text-base">open_in_new</span>
                        </a>
                        <a href="${routes.edit}/${item.id}/edit" class="p-2 hover:bg-secondary-container rounded-lg text-primary transition-colors">
                            <span class="material-symbols-outlined text-base">edit</span>
                        </a>
                        <button type="button" data-delete-project="${item.id}" class="p-2 hover:bg-error-container/20 rounded-lg text-error transition-colors">
                            <span class="material-symbols-outlined text-base">delete</span>
                        </button>
                    </div>
                </td>
            </tr>`;
        }).join('');

        tbody.querySelectorAll('[data-delete-project]').forEach((btn) => {
            btn.addEventListener('click', async () => {
                const id = btn.getAttribute('data-delete-project');
                if (!confirm('Are you sure you want to remove this project?')) return;
                try {
                    await api.delete(`/projects/${id}`);
                    showAlert('Project deleted successfully.');
                    loadIndex();
                } catch (error) {
                    showAlert(error.payload ? validationErrors(error.payload) : error.message, 'error');
                }
            });
        });
    }

    async function loadIndex() {
        const tbody = document.getElementById('projects-table-body');
        if (!tbody) return;
        tbody.innerHTML = `<tr><td colspan="5" class="px-8 py-10 text-center text-on-surface-variant">Loading projects...</td></tr>`;
        try {
            const response = await api.get('/projects');
            renderIndex(response.data || []);
        } catch (error) {
            tbody.innerHTML = `<tr><td colspan="5" class="px-8 py-10 text-center text-error">Failed to load projects.</td></tr>`;
        }
    }

    function formToPayload(form) {
        const formData = new FormData(form);
        formData.set('is_featured', form.querySelector('[name="is_featured"]')?.checked ? '1' : '0');
        return formData;
    }

    function showFormErrors(form, payload) {
        form.querySelectorAll('[data-field-error]').forEach((el) => el.remove());
        if (!payload?.errors) {
            showAlert(payload?.message || 'Validation failed.', 'error');
            return;
        }
        Object.entries(payload.errors).forEach(([field, messages]) => {
            const input = form.querySelector(`[name="${field}"]`);
            if (!input) return;
            const error = document.createElement('p');
            error.className = 'text-error text-xs mt-1';
            error.setAttribute('data-field-error', field);
            error.textContent = messages[0];
            input.parentElement?.appendChild(error);
        });
        showAlert(validationErrors(payload), 'error');
    }

    async function bindForm() {
        const form = document.getElementById('project-api-form');
        if (!form) return;

        const projectId = form.dataset.projectId;
        const submitBtn = form.querySelector('[type="submit"]');

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            submitBtn.disabled = true;
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = 'Saving...';

            try {
                const body = formToPayload(form);
                if (projectId) {
                    await api.request(`/projects/${projectId}`, { method: 'PUT', body });
                    showAlert('Project updated successfully.');
                    window.location.href = routes.index;
                } else {
                    await api.request('/projects', { method: 'POST', body });
                    showAlert('Project created successfully.');
                    window.location.href = routes.index;
                }
            } catch (error) {
                showFormErrors(form, error.payload);
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        });
    }

    async function preloadEditForm() {
        const form = document.getElementById('project-api-form');
        if (!form || !form.dataset.projectId) return;

        try {
            const response = await api.get(`/projects/${form.dataset.projectId}`);
            const project = response.data;
            Object.entries(project).forEach(([key, value]) => {
                const field = form.querySelector(`[name="${key}"]`);
                if (!field) return;
                if (field.type === 'checkbox') {
                    field.checked = Boolean(value);
                } else if (field.tagName === 'SELECT' || field.tagName === 'INPUT' || field.tagName === 'TEXTAREA') {
                    field.value = value ?? '';
                }
            });
        } catch (error) {
            showAlert('Could not load project data.', 'error');
        }
    }

    function boot() {
        loadIndex();
        bindForm();
        preloadEditForm();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', boot);
    } else {
        boot();
    }
})();

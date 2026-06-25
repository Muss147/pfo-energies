document.addEventListener('DOMContentLoaded', () => {

    const modal = document.querySelector('.search-modal');

    if (!modal) {
        return;
    }

    const openBtn = document.querySelector('.search-trigger');
    const closeBtn = document.querySelector('.search-close');
    const backdrop = document.querySelector('.search-backdrop');
    const input = document.querySelector('.search-input');

    const openModal = () => {
        modal.classList.remove('hidden');

        requestAnimationFrame(() => {
            modal.classList.add('is-open');
            input?.focus();
        });

        document.body.classList.add('overflow-hidden');
    };

    const closeModal = () => {
        modal.classList.remove('is-open');

        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);

        document.body.classList.remove('overflow-hidden');
    };

    openBtn?.addEventListener('click', openModal);
    closeBtn?.addEventListener('click', closeModal);
    backdrop?.addEventListener('click', closeModal);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeModal();
        }
    });

});
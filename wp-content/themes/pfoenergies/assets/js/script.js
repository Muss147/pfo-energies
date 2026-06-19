document.addEventListener("DOMContentLoaded", () => {

    const btn = document.querySelector(".btn__menu");
    const header = document.querySelector("header");

    btn?.addEventListener("click", () => {
        header?.classList.toggle("mobile-displayed");
    });

    // 
    const tabs = document.querySelectorAll('.tab-btn');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {

        tab.addEventListener('click', () => {

            const target = tab.dataset.tab;

            tabs.forEach(btn => {
                btn.classList.remove('border-primary', 'border-b-2', 'text-primary');
                btn.classList.add('text-primary/70');
            });

            tab.classList.add('border-primary', 'border-b-2', 'text-primary');
            tab.classList.remove('text-primary/70');

            contents.forEach(content => {
                content.classList.add('hidden');
                content.classList.remove('opacity-100');
                content.classList.add('opacity-0');
            });

            const activeContent = document.getElementById(target);

            activeContent.classList.remove('hidden');

            setTimeout(() => {
                activeContent.classList.remove('opacity-0');
                activeContent.classList.add('opacity-100');
            }, 10);

        });

    });

});
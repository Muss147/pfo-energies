document.addEventListener("DOMContentLoaded", () => {

    const btn = document.querySelector(".btn__menu");
    const header = document.querySelector("header");

    btn?.addEventListener("click", () => {
        header?.classList.toggle("mobile-displayed");
    });

});
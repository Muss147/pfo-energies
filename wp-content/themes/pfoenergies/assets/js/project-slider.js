document.addEventListener('DOMContentLoaded', () => {
    
    document.querySelectorAll('.swiper.project-swiper').forEach(swiper => {

        new Swiper(swiper, {
            loop: true,

            navigation: {
                nextEl: swiper.querySelector('.swiper-button-next'),
                prevEl: swiper.querySelector('.swiper-button-prev'),
            }
        });

    });

});
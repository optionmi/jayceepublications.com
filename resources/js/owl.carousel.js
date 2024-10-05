import "owl.carousel/dist/assets/owl.carousel.css";
import "owl.carousel";

$(function () {
    $(".owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        autoplayHoverPause: true,
        autoplay: true,
        center: true,
        // navText: [
        //     "<i class='fas fa-chevron-left'></i>",
        //     "<i class='fas fa-chevron-right'></i>",
        // ],
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            768: {
                items: 2,
            },
            1200: {
                items: 3,
            },
        },
    });
});

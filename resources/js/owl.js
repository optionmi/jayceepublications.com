import "owl.carousel/dist/assets/owl.carousel.css";
import "owl.carousel";

$(function () {
    $("#featuresCarousel").owlCarousel({
        loop: true, // Loop through the items
        margin: 10, // Margin between items
        nav: true, // Show navigation arrows
        dots: true,
        autoplayHoverPause: true,
        autoplay: true,
        center: true,
        responsive: {
            // Responsive settings
            0: { items: 1 }, // 1 item for small screens
            600: { items: 3 }, // 3 items for medium screens
            // 1000: { items: 3 }, // 5 items for large screens
        },
    });
    $("#authorsCarousel").owlCarousel({
        loop: true, // Loop through the items
        margin: 10, // Margin between items
        nav: true, // Show navigation arrows
        dots: true,
        autoplayHoverPause: true,
        autoplay: true,
        center: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
        },
    });

    $("#booksCarousel").owlCarousel({
        loop: true, // Loop through the items
        margin: 10, // Margin between items
        nav: true, // Show navigation arrows
        dots: true,
        autoplayHoverPause: true,
        autoplay: true,
        center: true,
        responsive: {
            // Responsive settings
            0: { items: 1 }, // 1 item for small screens
            600: { items: 2 }, // 3 items for medium screens
            1000: { items: 3 }, // 5 items for large screens
        },
    });
});

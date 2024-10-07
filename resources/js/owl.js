import "owl.carousel/dist/assets/owl.carousel.css";
import "owl.carousel";

$(function () {
    $("#authorsCarousel").owlCarousel({
        center: true,
        items: 3,
        loop: true,
        margin: 10,
        dots: true,
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
        responsive: {
            // Responsive settings
            0: { items: 1 }, // 1 item for small screens
            600: { items: 4 }, // 3 items for medium screens
            1000: { items: 5 }, // 5 items for large screens
        },
    });
});

import "./bootstrap";
import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

// Fontawesome
import "@fortawesome/fontawesome-free/js/all.js";

import "@fontsource/lora";
import "@fontsource/montserrat";
import "@fontsource/open-sans";

// Tw-elements
import { Collapse, Ripple, Tab, Dropdown, initTWE } from "tw-elements";
initTWE({ Collapse, Ripple, Tab, Dropdown });

// Get the button
const mybutton = document.getElementById("btn-back-to-top");
// When the user scrolls down 20px from the top of the document, show the button
const scrollFunction = () => {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        mybutton.classList.remove("hidden");
    } else {
        mybutton.classList.add("hidden");
    }
};
const backToTop = () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
};

// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);
window.addEventListener("scroll", scrollFunction);

// Flickity
import "flickity/dist/flickity.min.css";
import Flickity from "flickity";

var options = {
    accessibility: true,
    prevNextButtons: false,
    pageDots: true,
    setGallerySize: false,
    autoPlay: 5000,
    pauseAutoPlayOnHover: false,
    arrowShape: {
        x0: 10,
        x1: 60,
        y1: 50,
        x2: 60,
        y2: 45,
        x3: 15,
    },
};

var carousel = document.querySelector("[data-carousel]");
var slides = document.getElementsByClassName("carousel-cell");
if (carousel) {
    var flkty = new Flickity(carousel, options);

    flkty.on("scroll", function () {
        flkty.slides.forEach(function (slide, i) {
            var image = slides[i];
            var x = ((slide.target + flkty.x) * -1) / 3;
            image.style.backgroundPosition = x + "px";
        });
    });
}

// Swiperjs
import Swiper from "swiper";

const swiper = new Swiper(".swiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

// Add zoom and background color change on active slide
swiper.on("slideChangeTransitionEnd", () => {
    const slides = document.querySelectorAll(".swiper-slide");
    slides.forEach((slide) => {
        if (slide.classList.contains("swiper-slide-active")) {
            slide
                .querySelector(".card")
                .classList.add(
                    "bg-blue-500",
                    "transform",
                    "scale-105",
                    "text-white"
                );
        } else {
            slide
                .querySelector(".card")
                .classList.remove(
                    "bg-blue-500",
                    "transform",
                    "scale-105",
                    "text-white"
                );
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Grab the form element
    const contactForm = document.getElementById("contactForm");

    // Add submit event listener
    contactForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission

        // Gather form data
        const formData = new FormData(contactForm);
        const route = contactForm.getAttribute("action");

        // Send an AJAX request
        fetch(route, {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                // Display success or error message based on response
                const messageDiv = document.getElementById("responseMessage");

                if (!data.error) {
                    messageDiv.innerHTML = `<p class="bg-green-600 rounded-lg font-bold text-white p-5">${data.message}</p>`;
                    contactForm.reset(); // Reset form after successful submission
                } else {
                    messageDiv.innerHTML = `<p class="bg-red-600 rounded-lg font-bold text-white p-5">${data.message}</p>`;
                }
            })
            .catch((error) => {
                // Handle any errors
                const messageDiv = document.getElementById("message");
                messageDiv.innerHTML = `<p class="bg-red-600 rounded-lg font-bold text-white p-5">An error occurred. Please try again later.</p>`;
                console.error("Error:", error);
            });
    });
});

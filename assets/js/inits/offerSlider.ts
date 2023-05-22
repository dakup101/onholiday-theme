import Swiper, { Navigation, Pagination, Autoplay } from "swiper";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

export default function offerSlider() {
	const swiper = new Swiper(".offer-slider", {
		modules: [Navigation, Pagination, Autoplay],
		preloadImages: false,
		lazy: true,
		autoHeight: true,
		effect: "fade",
		slidesPerView: 6,
		speed: 500,
		autoplay: {
			delay: 4000,
		},
		navigation: {
			nextEl: ".swiper-button-next.offer-slider-button-next",
			prevEl: ".swiper-button-prev.offer-slider-button-prev",
		},
		pagination: {
			el: ".swiper-pagination.offer-slider-pagination",
			clickable: true,
		},
		breakpoints: {
			320: {
				slidesPerView: 1,
			},
			648: {
				slidesPerView: 2,
			},
			991: {
				slidesPerView: 3,
			},
			1240: {
				slidesPerView: 5,
			},
			1440: {
				slidesPerView: 6,
			},
		},
	});
}

import Swiper, { Navigation, Pagination, Autoplay } from "swiper";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

export default function swiperHero() {
	console.log("--- Swiper Hero Loaded --");
	const swiper = new Swiper(".hero-swiper", {
		modules: [Navigation, Pagination, Autoplay],
		autoHeight: true,
		preloadImages: false,
		lazy: true,
		autoplay: {
			delay: 5000,
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
	});
}

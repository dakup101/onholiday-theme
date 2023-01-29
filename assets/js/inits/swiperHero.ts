import Swiper, { Navigation, Pagination, Autoplay, EffectFade } from "swiper";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/effect-fade";

export default function swiperHero() {
	console.log("--- Swiper Hero Loaded --");
	const swiper = new Swiper(".hero-swiper", {
		modules: [Navigation, Pagination, Autoplay, EffectFade],
		preloadImages: false,
		lazy: true,
		effect: "fade",
		fadeEffect: {
			crossFade: true,
		},
		speed: 1000,
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

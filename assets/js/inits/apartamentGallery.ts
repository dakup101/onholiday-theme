import Swiper, { Navigation, Autoplay, Thumbs } from "swiper";
import "swiper/css";
import "swiper/css/navigation";


export default function apartamentGallery(){
    console.log("--- Apartament Gallery Loaded ---")
    let swiper = new Swiper(".mySwiper", {
        modules: [Navigation],
		spaceBetween: 10,
		slidesPerView: 8,
		freeMode: true,
		watchSlidesProgress: true,

		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	});
	let swiper2 = new Swiper(".mySwiper2", {
        modules: [Navigation, Autoplay, Thumbs],
		spaceBetween: 10,
        speed: 1000,
		autoplay: {
			delay: 5000,
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
		thumbs: {
			swiper: swiper,
		},
	});
}
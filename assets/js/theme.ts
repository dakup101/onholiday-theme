import selectHandle from "./handles/select-handle";
import megamenuHandle from "./handles/megamenu-handle";
import lazyVideoObserverHandle from "./handles/lazyVideoObserver-handle";
import swiperHeroHandle from "./handles/swiperHero-handle";
import stickyHeaderHandle from "./handles/stickyHeader-handle";
import apartamentGalleryHadnle from "./handles/apartamentGallery-handlte";
import apartamentCollapnseHandle from "./handles/apartamentCollapse-handle";
import searchFormHandle from "./handles/searchFrom-handle";
import faqHandle from "./handles/faq-handle";
import lightboxHandle from "./handles/lightbox-handle";
import locationFilterHandle from "./handles/locationFilter-handle";
import offerSliderHandle from "./handles/offerSlider-handle";
import cityOffer from "./inits/cityOffer";

import getPrices from "./inits/getPrices";

window.addEventListener("DOMContentLoaded", () => {
	selectHandle();
	megamenuHandle();
	lazyVideoObserverHandle();
	swiperHeroHandle();
	apartamentGalleryHadnle();
	apartamentCollapnseHandle();
	searchFormHandle();
	faqHandle();
	lightboxHandle();
	// locationFilterHandle();
	offerSliderHandle();
	cityOffer();

	mobileMenu();
	handleReservationFrame();

	getPrices();

	document.addEventListener("scroll", () => {
		stickyHeaderHandle();
	});
});

function mobileMenu() {
	const menu = document.querySelector(".mobile-nav-menu") as HTMLElement;
	if (!menu) return;

	const menuTrigger = document.querySelector(".mobile-menu-trigger");
	const overlay = document.querySelector(".mobile-nav-overlay");

	menuTrigger.addEventListener("click", (ev) => {
		ev.preventDefault();
		menuTrigger.classList.toggle("active");
		overlay.classList.toggle("show");
		if (menuTrigger.classList.contains("active")) {
			menu.style.height = "400px";
		} else {
			menu.style.height = "0px";
		}
	});

	overlay.addEventListener("click", (ev) => {
		ev.preventDefault();
		if (overlay.classList.contains("show")) {
			menuTrigger.classList.toggle("active");
			overlay.classList.toggle("show");
			if (menuTrigger.classList.contains("active")) {
				menu.style.height = "400px";
			} else {
				menu.style.height = "0px";
			}
		}
	});

	const hasChildren = menu.querySelectorAll(".has-children");

	Array.from(hasChildren).forEach((item) => {
		const trigger = item.querySelector(".children-trigger");
		const child = item.querySelector("nav");

		trigger.addEventListener("click", (ev) => {
			ev.preventDefault();
			trigger.classList.toggle("active");
			child.classList.toggle("collapse");
			if (child.classList.contains("collapse")) {
				child.style.height = child.scrollHeight + "px";
			} else {
				child.removeAttribute("style");
				Array.from(item.querySelectorAll("collapse")).forEach((collapsed) => {
					collapsed.classList.remove("collapse");
					collapsed.removeAttribute("style");
				});
			}

			Array.from(menu.querySelectorAll(".collapse")).forEach((collapsed) => {
				(collapsed as HTMLElement).style.height =
					collapsed.children[0].clientHeight + "px";
				console.log(collapsed);
			});
		});
	});
}

function handleReservationFrame() {
	const btn = document.querySelector(
		".apartament-make-reservation"
	) as HTMLAnchorElement;
	if (!btn) return;

	const reservationModal = document.querySelector(".ido-reservation");
	const closeModal = reservationModal.querySelector(".ido-reservation-close");
	const reservationFrame = reservationModal.querySelector(
		"iframe"
	) as HTMLIFrameElement;

	btn.addEventListener("click", (ev) => {
		ev.preventDefault();
		reservationFrame.src = btn.href;
		reservationModal.classList.toggle("show");
	});

	closeModal.addEventListener("click", (ev) => {
		ev.preventDefault();
		reservationFrame.src = null;
		reservationModal.classList.toggle("show");
	});
}

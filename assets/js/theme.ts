import selectHandle from "./handles/select-handle";
import megamenuHandle from "./handles/megamenu-handle";
import lazyVideoObserverHandle from "./handles/lazyVideoObserver-handle";
import swiperHeroHandle from "./handles/swiperHero-handle";
import stickyHeaderHandle from "./handles/stickyHeader-handle";

window.addEventListener("DOMContentLoaded", () => {
	selectHandle();
	megamenuHandle();
	lazyVideoObserverHandle();
	swiperHeroHandle();

	document.addEventListener("scroll", () => {
		stickyHeaderHandle();
	});
});

document.addEventListener("scroll", () => {
	console.log(window.scrollY);
	let stickyHeader = document.querySelector("[data-sticky_header]");
	console.log(stickyHeader);
	if (window.scrollY > 300) stickyHeader.classList.add("-translate-y-full");
	else stickyHeader.classList.remove("-translate-y-full");
});

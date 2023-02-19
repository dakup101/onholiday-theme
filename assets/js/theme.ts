import selectHandle from "./handles/select-handle";
import megamenuHandle from "./handles/megamenu-handle";
import lazyVideoObserverHandle from "./handles/lazyVideoObserver-handle";
import swiperHeroHandle from "./handles/swiperHero-handle";
import stickyHeaderHandle from "./handles/stickyHeader-handle";
import apartamentGalleryHadnle from "./handles/apartamentGallery-handlte";
import apartamentCollapnseHandle from "./handles/apartamentCollapse-handle";

import GLightbox from 'glightbox';
import "glightbox/dist/css/glightbox.min.css"

window.addEventListener("DOMContentLoaded", () => {
	selectHandle();
	megamenuHandle();
	lazyVideoObserverHandle();
	swiperHeroHandle();
	apartamentGalleryHadnle();
	apartamentCollapnseHandle();
	
	const lightbox = GLightbox({
		  selector:  '.glightbox',
    touchNavigation: true,
    loop: true,
	onOpen: () => {
		console.log('Lightbox opened')
	},
	}
	);


	faq();

	document.addEventListener("scroll", () => {
		stickyHeaderHandle();
	});
});


function faq(){
	if (!document.querySelector(".faq")) return;

	const faq = document.querySelector(".faq");
	const faqItems = faq.querySelectorAll(".faq-item");

	Array.from(faqItems).forEach(el => {
		const faqTrigger = el.querySelector(".faq-title") as HTMLButtonElement;
		const faqContent = el.querySelector(".faq-content") as HTMLElement;

		faqTrigger.addEventListener("click", (ev) => {
			ev.preventDefault();
			faqTrigger.classList.toggle("active");

			if (faqTrigger.classList.contains("active")){
				faqContent.style.height = faqContent.scrollHeight + "px";

			}

			else{
				faqContent.style.height = "0px";

			}
		})
	})


}
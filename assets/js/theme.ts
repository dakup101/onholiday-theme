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
	locationFilterHandle();

	document.addEventListener("scroll", () => {
		stickyHeaderHandle();
	});

});





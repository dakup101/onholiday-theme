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
import offerSliderHandle from "./handles/offerSlider-handle";
import cityOfferHandle from "./handles/cityOffer-handle";
import getPricesHandle from "./handles/getPrices-handle";
import mobileMenuHandle from "./handles/mobileMenu-handle";
import onClickToBookingHandle from "./handles/onClickToBookign-handle";
import reservationFrameHandle from "./handles/reservationIframe-handle";

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
	offerSliderHandle();
	cityOfferHandle();
	getPricesHandle();
	mobileMenuHandle();
	onClickToBookingHandle();
	reservationFrameHandle();

	document.addEventListener("scroll", () => {
		stickyHeaderHandle();
	});
});

export default function swiperHeroHandle() {
	if (!document.querySelectorAll(".hero-swiper")) return;
	import(/* webpackChunkName: "print" */ "../inits/swiperHero").then(
		(module) => {
			const initImported = module.default;
			initImported();
		}
	);
}

export default function swiperHeroHandle() {
	const target = document.querySelector(".hero-swiper");

	if (!target) return;

	const observerOpts = {
		root: null,
		rootMargin: "-150px 0px 150px 0px",
		threshold: 0,
	};

	const observer = new IntersectionObserver((entries, observer) => {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				import(/* webpackChunkName: "print" */ "../inits/swiperHero").then(
					(module) => {
						const action = module.default;
						action();
					}
				);
				observer.unobserve(target);
			}
		});
	}, observerOpts);

	observer.observe(target);
}

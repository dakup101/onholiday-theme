export default function lightboxHandle() {
	const target = document.querySelector(".glightbox");

	if (target) return;

	const observerOpts = {
		root: null,
		rootMargin: "-150px 0px 150px 0px",
		threshold: 0,
	};

	const observer = new IntersectionObserver((entries, observer) => {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				import(/* webpackChunkName: "print" */ "../inits/lightbox").then(
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

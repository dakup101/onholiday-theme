export default function megamenuHandle() {
	const target = document.querySelector(".header-nav-item-has-children");

	if (!target) return;

	const observerOpts = {
		root: null,
		rootMargin: "0px",
		threshold: 0,
	};

	const observer = new IntersectionObserver((entries, observer) => {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				import(/* webpackChunkName: "print" */ "../inits/megamenu").then(
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

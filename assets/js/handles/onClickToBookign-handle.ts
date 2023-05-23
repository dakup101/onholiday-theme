export default function onClickToBookingHandle() {
	const target = document.querySelector(".move-to-search");

	if (!target) return;

	const observerOpts = {
		root: null,
		rootMargin: "0px",
		threshold: 0,
	};

	const observer = new IntersectionObserver((entries, observer) => {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				import(
					/* webpackChunkName: "print" */ "../inits/onClickToBooking"
				).then((module) => {
					const action = module.default;
					action();
				});
				observer.unobserve(target);
			}
		});
	}, observerOpts);

	observer.observe(target);
}

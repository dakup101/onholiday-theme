export default function apartamentCollapnseHandle() {
	const target = document.querySelectorAll(".apartwyp");

	if (!target) return;

	const observerOpts = {
		root: null,
		rootMargin: "-150px 0px 150px 0px",
		threshold: 0,
	};

	const observer = new IntersectionObserver((entries, observer) => {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				import(
					/* webpackChunkName: "print" */ "../inits/apartamentCollapse"
				).then((module) => {
					const action = module.default;
					action();
				});
				Array.from(target).forEach((el, key) => {
					if (key !== 0) return;
					observer.unobserve(el);
				});
			}
		});
	}, observerOpts);

	Array.from(target).forEach((el, key) => {
		if (key !== 0) return;
		observer.observe(el);
	});
}

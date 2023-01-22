export default function megamenuHandle() {
	if (!document.querySelectorAll(".header-nav-item-has-children")) return;
	import(/* webpackChunkName: "print" */ "../inits/megamenu").then((module) => {
		const initImported = module.default;
		initImported();
	});
}

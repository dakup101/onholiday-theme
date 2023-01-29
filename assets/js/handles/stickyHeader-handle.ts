export default function stickyHeaderHandle() {
	if (!document.querySelectorAll("header")) return;
	import(/* webpackChunkName: "print" */ "../inits/stickyHeader").then(
		(module) => {
			const initImported = module.default;
			initImported();
		}
	);
}

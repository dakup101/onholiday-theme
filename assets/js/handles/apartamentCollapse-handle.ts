export default function apartamentCollapnseHandle() {
	if (!document.querySelectorAll(".apartwyp")) return;
	import(/* webpackChunkName: "print" */ "../inits/apartamentCollapse").then(
		(module) => {
			const initImported = module.default;
			initImported();
		}
	);
}

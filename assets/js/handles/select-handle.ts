export default function selectHandle() {
	if (!document.querySelectorAll(".select")) return;
	import(/* webpackChunkName: "print" */ "../inits/select").then((module) => {
		const initImported = module.default;
		initImported();
	});
}

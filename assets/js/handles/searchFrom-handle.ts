export default function searchFormHandle() {
	if (!document.querySelectorAll(".search-form")) return;
	import(/* webpackChunkName: "print" */ "../inits/searchForm").then((module) => {
		const initImported = module.default;
		initImported();
	});
}

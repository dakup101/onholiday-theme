export default function locationFilterHandle() {
	if (!document.querySelectorAll("input[name='region']")) return;
	import(/* webpackChunkName: "print" */ "../inits/locationFilter").then((module) => {
		const initImported = module.default;
		initImported();
	});
}

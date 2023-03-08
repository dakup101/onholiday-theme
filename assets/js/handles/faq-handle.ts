export default function faqHandle() {
	if (!document.querySelectorAll(".faq")) return;
	import(/* webpackChunkName: "print" */ "../inits/faq").then((module) => {
		const initImported = module.default;
		initImported();
	});
}

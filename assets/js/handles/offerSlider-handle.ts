export default function offerSliderHandle(){
    if (!document.querySelectorAll(".offer-slider")) return;
	import(/* webpackChunkName: "print" */ "../inits/offerSlider").then(
		(module) => {
			const initImported = module.default;
			initImported();
		}
	);
}
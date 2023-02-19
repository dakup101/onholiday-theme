export default function apartamentGalleryHadnle(){
    if (!document.querySelectorAll(".ido-gallery")) return;
	import(/* webpackChunkName: "print" */ "../inits/apartamentGallery").then(
		(module) => {
			const initImported = module.default;
			initImported();
		}
	);
}
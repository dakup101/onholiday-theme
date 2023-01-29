export default function lazyVideoObserverHandle() {
	if (!document.querySelectorAll("video.lazy")) return;
	import(/* webpackChunkName: "print" */ "../inits/lazyVideoObserver").then(
		(module) => {
			const initImported = module.default;
			initImported();
		}
	);
}

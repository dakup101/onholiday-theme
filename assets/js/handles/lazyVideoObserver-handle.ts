export default function lazyVideoObserverHandle() {
	const target = document.querySelector("video.lazy");

	if (!target) return;

	import(/* webpackChunkName: "print" */ "../inits/lazyVideoObserver").then(
		(module) => {
			const action = module.default;
			action();
		}
	);
}

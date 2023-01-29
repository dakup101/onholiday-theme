import selectHandle from "./handles/select-handle";
import megamenuHandle from "./handles/megamenu-handle";
import lazyVideoObserverHandle from "./handles/lazyVideoObserver-handle";

window.addEventListener("DOMContentLoaded", () => {
	selectHandle();
	megamenuHandle();
	lazyVideoObserverHandle();
});

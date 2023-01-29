export default function lazyVideoObserver() {
	console.log("--- Lazy Video Observer Loaded ---");
	const lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));

	if (!("IntersectionObserver" in window)) return;

	let lazyVideoObserver = new IntersectionObserver(function (
		entries,
		observer
	) {
		entries.forEach(function (video: IntersectionObserverEntry) {
			if (video.isIntersecting) {
				for (let source in video.target.children) {
					let videoSource = video.target.children[source] as HTMLVideoElement;
					if (
						typeof videoSource.tagName === "string" &&
						videoSource.tagName === "SOURCE"
					) {
						videoSource.src = videoSource.dataset.src;
					}
				}

				(video.target as HTMLVideoElement).load();
				video.target.classList.remove("lazy");
				lazyVideoObserver.unobserve(video.target);
			}
		});
	});

	lazyVideos.forEach(function (lazyVideo) {
		lazyVideoObserver.observe(lazyVideo);
	});
}

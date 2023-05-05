import { ajaxUrl } from "../helper";

export default function cityOffer() {
	const btn = document.querySelector(".city-offer-btn");
	if (!btn) return;

	btn.addEventListener("click", async (ev) => {
		ev.preventDefault();

		// Get the array of classes of the button
		const classList = btn.classList;

		// Find the class that starts with "page-"
		const pageClass = Array.from(classList).find((className: string) =>
			className.startsWith("page-")
		) as string;

		// Extract the number from the page class using regular expressions
		const pageNumber = pageClass.match(/\d+/)[0];

		console.log(pageNumber);

		const data = new FormData();
		data.append("action", "city_offer");
		data.append("page_id", pageNumber);

		btn.classList.add("disabled");
		btn.innerHTML = "Ładuję...";

		const cityOffer = await fetch(ajaxUrl, {
			method: "POST",
			body: data,
			credentials: "same-origin",
		})
			.then((response) => response.text())
			.then((text) => {
				return text;
			});

		(btn.parentNode as HTMLElement).remove();
		document.querySelector(".city-offer").innerHTML += cityOffer;
	});
}

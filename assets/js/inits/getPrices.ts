import { ajaxUrl } from "../helper";

export default function getPrices() {
	const dateFromInput = document.querySelector(
		"#searchDateFrom"
	) as HTMLInputElement;
	const dateToInput = document.querySelector(
		"#searchDateTo"
	) as HTMLInputElement;

	const dateFrom = dateFromInput.value;
	const dateTo = dateToInput.value;

	if (!dateFromInput || !dateToInput) return;

	const apartamentsItems = document.querySelectorAll(".apartaments-item");
	Array.from(apartamentsItems).forEach((item) => {
		const objectId = item.getAttribute("data-objectId");
		const priceWrapper = item.querySelector(".apartaments-item-price");

		console.log([dateFrom, dateTo, objectId]);

		const data = new FormData();
		data.append("action", "get_price");
		data.append("dateFrom", dateFrom);
		data.append("dateTo", dateTo);
		data.append("objectId", objectId);

		fetch(ajaxUrl, {
			method: "POST",
			body: data,
			credentials: "same-origin",
		})
			.then((response) => response.text())
			.then((text) => {
				const response = JSON.parse(text);
				let price = 0;
				console.log(response);
				if (response.result.offerObject) {
					const objectPriceDates =
						response.result.offerObject.objectPricesDates;
					Array.from(objectPriceDates).forEach((date: any, key) => {
						if (key >= objectPriceDates.length - 1) return;
						console.log(key, date);
						let datePrice = date.capacityPriceDates[0].price;
						price += parseFloat(datePrice);
					});
					console.log(price);
					priceWrapper.innerHTML = price.toFixed(2) + " PLN";
				}
			});
	});
}

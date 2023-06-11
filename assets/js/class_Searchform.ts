import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

function loadLocale(locale: string) {
	return import(`flatpickr/dist/l10n/${locale}.js`);
}

export default class searchForm {
	form;
	submit;
	inputs = {
		location: null,
		dates: null,
		guests: null,
		addons: null,
	};
	searchInputs = {
		location: null,
		dates: null,
		guests: null,
		addons: null,
	};
	values = {
		location: "",
		dates: "",
		guests: "",
		addons: "",
	};
	constructor(selector) {
		this.form = document.querySelector(selector);
		if (!this.form) return;
		this.inputs.location = this.form.querySelector("#location");
		this.inputs.guests = this.form.querySelector("#people");
		this.inputs.dates = this.form.querySelector("#dates");
		this.inputs.addons = this.form.querySelector("#multiple-addons");

		this.submit = this.form.querySelector(".search-form-action");

		this.searchInputs.location = this.form.querySelector("#searchLocation");
		this.searchInputs.guests = this.form.querySelector("#searchGuests");
		this.searchInputs.dates = this.form.querySelector("#searchDates");
		this.searchInputs.addons = this.form.querySelector("#searchAddons");

		this.datePicker();
		this.populate();
		this.onChange();
		this.updateSearchValue();

		this.validate();
	}
	populate() {
		for (const [key, input] of Object.entries(this.inputs)) {
			let value = (input as HTMLInputElement).value;
			switch (key) {
				case "location": {
					this.values.location = value;
					break;
				}
				case "dates": {
					this.values.dates = value;
					break;
				}
				case "guests": {
					this.values.guests = value;
					break;
				}
				case "addons": {
					this.values.addons = value;
					break;
				}
				default: {
					break;
				}
			}
		}
		console.log("--- Form: Values populated");
	}
	onChange() {
		for (const [key, input] of Object.entries(this.inputs)) {
			input.addEventListener("change", (ev) => {
				let value = (ev.currentTarget as HTMLInputElement).value;
				console.log(key);
				switch (key) {
					case "location": {
						this.values.location = value;
						break;
					}
					case "dates": {
						this.values.dates = value;
						break;
					}
					case "guests": {
						this.values.guests = value;
						break;
					}
					case "addons": {
						this.values.addons = value;
						break;
					}
					default: {
						break;
					}
				}
				console.log("--- Form: change at " + key);
				this.updateSearchValue();
				this.validate();
			});
		}
		console.log("--- Form: change events handeled");
	}
	async datePicker() {
		let dateInput = this.inputs.dates as HTMLInputElement;
		let lang = dateInput.getAttribute("data-lang");
		let calendar = null;

		if (lang == "pl") {
			loadLocale("pl").then(() => {
				// Now you can use the 'pl' locale
				calendar = initFlatpickr(dateInput, lang);
			});
		} else if (lang == "de") {
			loadLocale("de").then(() => {
				calendar = initFlatpickr(dateInput, lang);
			});
		}

		const dateFromInput = document.querySelector(
			"#searchDateFrom"
		) as HTMLInputElement;
		const dateToInput = document.querySelector(
			"#searchDateTo"
		) as HTMLInputElement;

		if (!dateFromInput || !dateToInput) return;

		const dateFrom = dateFromInput.value;
		const dateTo = dateToInput.value;

		console.log(dateFrom, dateTo);

		calendar.setDate([dateFrom, dateTo]);
		dateInput.value = dateFrom + "," + dateTo;
		dateInput.dispatchEvent(new Event("change"));
	}
	updateSearchValue() {
		(this.searchInputs.location as HTMLInputElement).value =
			this.values.location;
		(this.searchInputs.guests as HTMLInputElement).value = this.values.guests;
		(this.searchInputs.dates as HTMLInputElement).value = this.values.dates;
		(this.searchInputs.addons as HTMLInputElement).value = this.values.addons;
		console.log(this.values);
	}
	validate() {
		this.submit.classList.remove("disabled");
		console.log(this.values.guests);
		if (
			this.values.dates.length < 1 ||
			this.values.guests.length < 1 ||
			this.values.location.length < 1
		) {
			this.submit.classList.add("disabled");
		}
	}
}

function initFlatpickr(dateInput, lang) {
	if (window.screen.width < 768) {
		return flatpickr(".search-date", {
			mode: "range",
			wrap: true,
			enableTime: false,
			locale: lang,
			dateFormat: "Y-m-d",
			minDate: new Date(new Date().getTime() + 24 * 60 * 60 * 1000),
			showMonths: 1,
			onChange: function (selectedDates, dateStr, instance) {
				if (selectedDates[0] && selectedDates[1]) {
					instance.input.value = dateStr;

					let from = flatpickr.formatDate(selectedDates[0], "Y-m-d");
					let to = flatpickr.formatDate(selectedDates[1], "Y-m-d");
					dateInput.value = from + "," + to;
					dateInput.dispatchEvent(new Event("change"));
				}
			},
		});
	} else {
		return flatpickr(".search-date", {
			mode: "range",
			wrap: true,
			enableTime: false,
			locale: lang,
			dateFormat: "Y-m-d",
			minDate: new Date(new Date().getTime() + 24 * 60 * 60 * 1000),
			showMonths: 2,
			onChange: function (selectedDates, dateStr, instance) {
				if (selectedDates[0] && selectedDates[1]) {
					instance.input.value = dateStr;
					let from = flatpickr.formatDate(selectedDates[0], "Y-m-d");
					let to = flatpickr.formatDate(selectedDates[1], "Y-m-d");
					dateInput.value = from + "," + to;
					dateInput.dispatchEvent(new Event("change"));
				}
			},
		});
	}
}

export default function themeSelectInit() {
	const selects = document.querySelectorAll(".select");
	Array.from(selects).forEach((select) => {
		const input = select.querySelector("select") as HTMLSelectElement;
		const options = input.children;
		const selected = select.querySelector(".select-value");
		const selectInner = select.querySelector(".select-value-wrapper");
		const optionsHTML = select.querySelector(".select-options");

		select.addEventListener("click", (ev) => {
			ev.preventDefault();
		});

		selectInner.addEventListener("click", (ev) => {
			ev.preventDefault();
			if (selectInner.classList.contains("collapse")) {
				selectInner.classList.remove("collapse");
				optionsHTML.classList.remove("show");
				return;
			}
			selectInner.classList.add("collapse");
			optionsHTML.classList.add("show");
		});

		document.addEventListener("click", (ev) => {
			if (ev.target !== selectInner) {
				selectInner.classList.remove("collapse");
				optionsHTML.classList.remove("show");
			}
		});

		// Loop Through Select Options and make html as <li>
		Array.from(options).forEach((option, i) => {
			let value = (option as HTMLOptionElement).value;
			let text = option.textContent;

			// HTML for <li>
			let htmlItem = document.createElement("li");
			htmlItem.classList.add("select-options-item");

			// !! -- For Debugging
			htmlItem.setAttribute("data-value", value);
			htmlItem.setAttribute("data-option", i.toString());
			// !! END -- For Debugging

			htmlItem.innerHTML = text;
			// First Iteration
			if (i == 0) {
				select.setAttribute("data-value", value);
				selected.innerHTML = text;
				htmlItem.classList.add("select-options-selected");
			}

			//
			htmlItem.addEventListener("click", (ev) => {
				ev.preventDefault();
				input.options[i].selected = true;
				input.dispatchEvent(new Event("change"));
				selectInner.classList.remove("collapse");
				optionsHTML.classList.remove("show");
				selected.innerHTML = text;
				select.setAttribute("data-value", value);
				select
					.querySelector(".select-options-selected")
					.classList.remove("select-options-selected");
				htmlItem.classList.add("select-options-selected");
			});
			optionsHTML.appendChild(htmlItem);
		});
	});
}

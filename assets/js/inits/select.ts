export default function themeSelectInit() {
	const selects = document.querySelectorAll(".select");
	Array.from(selects).forEach((select) => {
		const input = select.querySelector("select") as HTMLSelectElement;
		const multiple = select.classList.contains("multiple") ? select.querySelector(".multiple-value") : null;
		const options = input.children;
		const selected = select.querySelector(".select-value");
		const selectInner = select.querySelector(".select-value-wrapper");
		const optionsHTML = select.querySelector(".select-options");

		input.value = null;

		select.addEventListener("click", (ev) => {
			ev.preventDefault();
		});

		selectInner.addEventListener("click", (ev) => {
			ev.preventDefault();
			console.log(selectInner);
			if (selectInner.classList.contains("collapse") && !selectInner.classList.contains("multiple")) {
				selectInner.classList.remove("collapse");
				optionsHTML.classList.remove("show");
				return;
			}
			selectInner.classList.add("collapse");
			optionsHTML.classList.add("show");
		});

		document.addEventListener("click", (ev) => {
			if (ev.target !== selectInner) {
				if (!select.contains(ev.target as Node)){
					selectInner.classList.remove("collapse");
					optionsHTML.classList.remove("show");
				}
			}
		});

		selected.innerHTML = selected.getAttribute("data-start-name");


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

			//
			htmlItem.addEventListener("click", (ev) => {
				ev.preventDefault();
				input.options[i].selected = true;
				if (multiple){
					let curMultiple = (multiple as HTMLInputElement).value;
					let curValues = curMultiple.split(",").filter(el => el);
					let curTexts = [];
					if ((ev.currentTarget as HTMLElement).classList.contains("checked")){
						if (curValues.indexOf(value) > -1) curValues.splice(curValues.indexOf(value), 1);
					}
					else{
						if (curValues.indexOf(value) < 0) curValues.push(value);
					}
					(multiple as HTMLInputElement).value = curValues.join(",");
					console.log(curValues);
					(ev.currentTarget as HTMLElement).classList.toggle("checked");
					

					if (curValues.length) {
						select.setAttribute("data-value", curValues.join(","));
						selected.innerHTML = selected.getAttribute("data-name") + " (+" + curValues.length + ")";

					} 
					else{
						selected.innerHTML = selected.getAttribute("data-start-name");
						select.setAttribute("data-value", "");
					}


					select.querySelector(".multiple-value").dispatchEvent(new Event("change"));

				}
				else{
					selectInner.classList.remove("collapse");
					optionsHTML.classList.remove("show");
					selected.innerHTML = text;
					select.setAttribute("data-value", value);
					// select
					// 	.querySelector(".select-options-selected")
					// 	.classList.remove("select-options-selected");
					htmlItem.classList.add("select-options-selected");



						selected.innerHTML = selected.getAttribute("data-name") + ": " + text;

	

				}

				

				input.dispatchEvent(new Event("change"));
			});
			optionsHTML.appendChild(htmlItem);
		});
	});
}

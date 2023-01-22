window.addEventListener("DOMContentLoaded", () => {
	const headerNavItems = document.querySelectorAll(
		".header-nav-item-has-children"
	);
	console.log(headerNavItems);
	Array.from(headerNavItems).forEach((headerNavItem) => {
		const itemLink = headerNavItem.querySelector(".header-nav-item-link");
		const dropDown = headerNavItem.querySelector(".header-nav-item-child");

		let dropDownTimeout = null;

		itemLink.addEventListener("mouseenter", (ev) => {
			dropDown.classList.remove("hidden");
			itemLink.classList.add("collapse");
		});

		itemLink.addEventListener("mouseleave", (ev) => {
			dropDownTimeout = setTimeout(() => {
				dropDown.classList.add("hidden");
				itemLink.classList.remove("collapse");
			}, 300);
		});

		dropDown.addEventListener("mouseenter", () => {
			if (dropDownTimeout) clearTimeout(dropDownTimeout);
		});

		dropDown.addEventListener("mouseleave", () => {
			dropDownTimeout = setTimeout(() => {
				dropDown.classList.add("hidden");
				itemLink.classList.remove("collapse");
			}, 300);
		});
	});
});

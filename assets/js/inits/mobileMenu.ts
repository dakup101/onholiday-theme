export default function mobileMenu() {
	const menu = document.querySelector(".mobile-nav-menu") as HTMLElement;
	if (!menu) return;

	const menuTrigger = document.querySelector(".mobile-menu-trigger");
	const overlay = document.querySelector(".mobile-nav-overlay");

	menuTrigger.addEventListener("click", (ev) => {
		ev.preventDefault();
		menuTrigger.classList.toggle("active");
		overlay.classList.toggle("show");
		if (menuTrigger.classList.contains("active")) {
			menu.style.height = "400px";
		} else {
			menu.style.height = "0px";
		}
	});

	overlay.addEventListener("click", (ev) => {
		ev.preventDefault();
		if (overlay.classList.contains("show")) {
			menuTrigger.classList.toggle("active");
			overlay.classList.toggle("show");
			if (menuTrigger.classList.contains("active")) {
				menu.style.height = "400px";
			} else {
				menu.style.height = "0px";
			}
		}
	});

	const hasChildren = menu.querySelectorAll(".has-children");

	Array.from(hasChildren).forEach((item) => {
		const trigger = item.querySelector(".children-trigger");
		const child = item.querySelector("nav");

		trigger.addEventListener("click", (ev) => {
			ev.preventDefault();
			trigger.classList.toggle("active");
			child.classList.toggle("collapse");
			if (child.classList.contains("collapse")) {
				child.style.height = child.scrollHeight + "px";
			} else {
				child.removeAttribute("style");
				Array.from(item.querySelectorAll("collapse")).forEach((collapsed) => {
					collapsed.classList.remove("collapse");
					collapsed.removeAttribute("style");
				});
			}

			Array.from(menu.querySelectorAll(".collapse")).forEach((collapsed) => {
				(collapsed as HTMLElement).style.height =
					collapsed.children[0].clientHeight + "px";
				console.log(collapsed);
			});
		});
	});
}
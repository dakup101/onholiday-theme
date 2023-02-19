export default function stickyHeader() {
	const header = document.querySelector("header");
	if (window.scrollY > 300) header.classList.add("sticky");
	else header.classList.remove("sticky");
}

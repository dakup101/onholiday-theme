export default function stickyHeader() {
	const header = document.querySelector("header");
	console.log(window.scrollY);
	if (window.scrollY > 300) header.classList.add("sticky");
	else header.classList.remove("sticky");
}

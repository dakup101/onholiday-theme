export default function onClickToBooking() {
	const btns = document.querySelectorAll(
		".move-to-search"
	) as NodeListOf<HTMLAnchorElement>;

	btns.forEach((btn) => {
		btn.addEventListener("click", (ev) => {
			ev.preventDefault();
			window.location.href = "https://onholiday.com.pl/apartamenty/";
		});
	});
}

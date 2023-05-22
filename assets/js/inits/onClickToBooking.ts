export default function onClickToBooking() {
	const btn = document.querySelector(".move-to-search");
	btn.addEventListener("click", (ev) => {
		ev.preventDefault();
		window.location.href = "https://onholiday.com.pl/apartamenty/";
	});
}

export default function handleReservationFrame() {
	const btn = document.querySelector(
		".apartament-make-reservation"
	) as HTMLAnchorElement;
	if (!btn) return;

	const reservationModal = document.querySelector(".ido-reservation");
	const closeModal = reservationModal.querySelector(".ido-reservation-close");
	const reservationFrame = reservationModal.querySelector(
		"iframe"
	) as HTMLIFrameElement;

	btn.addEventListener("click", (ev) => {
		ev.preventDefault();
		reservationFrame.src = btn.href;
		reservationModal.classList.toggle("show");
	});

	closeModal.addEventListener("click", (ev) => {
		ev.preventDefault();
		reservationFrame.src = null;
		reservationModal.classList.toggle("show");
	});
}

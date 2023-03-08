export default function faq(){
	if (!document.querySelector(".faq")) return;

	const faq = document.querySelector(".faq");
	const faqItems = faq.querySelectorAll(".faq-item");

	Array.from(faqItems).forEach(el => {
		const faqTrigger = el.querySelector(".faq-title") as HTMLButtonElement;
		const faqContent = el.querySelector(".faq-content") as HTMLElement;

		faqTrigger.addEventListener("click", (ev) => {
			ev.preventDefault();
			faqTrigger.classList.toggle("active");

			if (faqTrigger.classList.contains("active")){
				faqContent.style.height = faqContent.scrollHeight + "px";

			}

			else{
				faqContent.style.height = "0px";

			}
		})
	})
}
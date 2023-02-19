export default function apartamentCollapnse(){
    let collapsibles = document.querySelectorAll('.apartwyp');
		Array.from(collapsibles).forEach(el => {
			el.children[0].addEventListener('click', (ev) => {
				let target = ev.currentTarget as HTMLElement;
				let parent = target.parentNode;
				let content = parent.children[1] as HTMLElement;

				target.classList.toggle('active');
				if (target.classList.contains('active')) content.style.height = content
					.scrollHeight + "px";
				else content.style.height = "0px";
			});
			(el.children[1] as HTMLElement).style.height = "0";
		})
}
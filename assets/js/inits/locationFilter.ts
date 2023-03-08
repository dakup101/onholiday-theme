export default function locationFilter(){
	const locs = document.querySelectorAll("input[name='region']");
	if (!locs) return;
	
	
	let activeLoc = null;

	Array.from(locs).forEach(el => {
		el.addEventListener("click", (ev) => {
			activeLoc = el.getAttribute("id");
			sortAps(activeLoc);
		})
	})
}

function sortAps(locId){
	const aps = document.querySelectorAll(".apartaments-item");
	Array.from(aps).forEach(el => {
		el.classList.add("hidden");
		if (el.getAttribute("data-loc") == locId) el.classList.remove("hidden");
	})
}
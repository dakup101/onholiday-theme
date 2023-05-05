window.addEventListener("DOMContentLoaded", () => {
    makePosts();
    updatePosts();
})

function makePosts() {
    const btn = document.querySelector(".ido-make-posts");
    const output = document.querySelector(".ido-make-posts-output");


    btn.addEventListener("click", async (ev) => {
        let lang = document.querySelector("input#idoLang").value;

        ev.preventDefault();

        output.querySelector(".ido-response").innerHTML = "Pobieram...";
        output.classList.add("loading");
        output.classList.remove("loaded");

        let page = 1;
        let is_fethced = true;

        while (is_fethced) {
            const data = new FormData();
            data.append('action', 'ido_make_posts');
            data.append('page', page);
            data.append('lang', lang);

            let ajax = await fetch("/wp-admin/admin-ajax.php", {
                method: "POST",
                body: data,
                credentials: "same-origin"
            })
                .then(response => response.text())
                .then(text => {
                    console.log("--- Make Posts success ---");
                    return text;
                })
                .catch(err => {
                    console.log("--- Make Posts error ---");
                    console.log(err);
                    return null;
                })
            let response = JSON.parse(ajax);
            is_fethced = response.fetched;
            page++;
            output.querySelector(".ido-response").innerHTML = response.msg;
            console.log(response);
        }

        output.querySelector(".ido-response").innerHTML = "Apartamenty zostały pobrane i dodane"
        output.classList.remove("loading");
        output.classList.add("loaded");
    })


}

function updatePosts() {
    const btn = document.querySelector(".ido-update-posts");
    const output = document.querySelector(".ido-update-posts-output");
    const lang = document.querySelector("input#idoLang").value;


    btn.addEventListener("click", async (ev) => {
        ev.preventDefault();

        output.querySelector(".ido-response").innerHTML = "Aktualizuje...";
        output.classList.add("loading");
        output.classList.remove("loaded");

        let page = 1;
        let is_fethced = true;

        while (is_fethced) {
            const data = new FormData();
            data.append('action', 'ido_update_posts');
            data.append('page', page);
            data.append('lang', lang);

            let ajax = await fetch("/wp-admin/admin-ajax.php", {
                method: "POST",
                body: data,
                credentials: "same-origin"
            })
                .then(response => response.text())
                .then(text => {
                    console.log("--- Update Posts success ---");
                    return text;
                })
                .catch(err => {
                    console.log("--- Update Posts error ---");
                    console.log(err);
                    return null;
                })
            let response = JSON.parse(ajax);
            is_fethced = response.fetched;
            page++;
            output.querySelector(".ido-response").innerHTML = response.msg;
            console.log(response);
        }

        output.querySelector(".ido-response").innerHTML = "Apartamenty zostały pobrane i dodane"
        output.classList.remove("loading");
        output.classList.add("loaded");
    })
} 
import {getArticleById} from "../../index.js";

export function getUi(listeArticles) {
    let data = listeArticles.getTabArticles;
    let div = document.getElementById("listeArticles");
    let html = `
        <label for="tri">Trier par : </label>
        <select name="tri" id="tri">
            <option value="dateAsc">Dates Ascendantes</option>
            <option value="dateDesc">Dates Descendantes</option>
        </select>
    `;

    let converter = new showdown.Converter();

    //si data n'est pas vide alors
    if(data.length > 0) {
        data.forEach(article => {
            html += `
            <div class="article" id="article${article.id}">
                <h2>${article.titre}</h2>
                <p>${article.date_creation}</p>
                <p>${converter.makeHtml(article.resume)}</p>
            </div>
        `
        })
        div.innerHTML = html;

        const articles = document.querySelectorAll("#listeArticles");
        articles.forEach(article => {
            if (article.id.includes("article")) {
                article.addEventListener("click", (elem) => {
                    getArticleById(elem.target.closest('.article').id);
                })
            }
        })

        const tri = document.getElementById('tri');
        tri.addEventListener("change", (elem) => {
            if(elem.target.value === "dateAsc") {
                listeArticles.triListeArticlesParDateAscendant();
                getUi(listeArticles);
            } else if(elem.target.value === "dateDesc") {
                listeArticles.triListeArticlesParDateDescendant();
                getUi(listeArticles);
            }
        })
    }
}
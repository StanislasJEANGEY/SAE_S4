import {getArticleById} from "../../index.js";

export function getUi(listeArticles, tabArticles) {
    let data = tabArticles;
    let div = document.getElementById("listeArticles");
    let html = `
        <label for="tri">Trier par : </label>
        <select name="tri" id="tri">
            <option value="default" selected>--Choisir--</option>
            <option value="dateAsc">Dates Ascendantes</option>
            <option value="dateDesc">Dates Descendantes</option>
        </select>
        <label for="rechercheTitre">Rechercher dans le titre: </label>
        <input type="text" id="inputRechercheTitre" name="inputRechercheTitre">
        <button id="rechercher">Rechercher</button>
        
    `;

    let converter = new showdown.Converter();
    html += "<div id='listeArticlesdiv'>";

    if (data != null) {
        if (data.length > 0) {
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
                article.addEventListener("click", (elem) => {
                    if (elem.target.closest('.article').id.includes("article")) {
                        getArticleById(elem.target.closest('.article').id.replace('article', ''));
                    }
                })
            })

        }
    }
    html += "</div>"

    const tri = document.getElementById('tri');
    tri.addEventListener("change", (elem) => {
        if (elem.target.value === "dateAsc") {
            document.getElementById("liste_auth_categ").innerHTML = "";
            listeArticles.triListeArticlesParDateAscendant();
            getUi(listeArticles, listeArticles.getTabArticles);
        } else if (elem.target.value === "dateDesc") {
            document.getElementById("liste_auth_categ").innerHTML = "";
            listeArticles.triListeArticlesParDateDescendant();
            getUi(listeArticles, listeArticles.getTabArticles);
        }
    })

    const rechercheTitre = document.getElementById('rechercher');
    rechercheTitre.addEventListener("click", (elem) => {
        document.getElementById("listeArticlesdiv").innerHTML = "";
        let recherche = document.getElementById("inputRechercheTitre").value;

        listeArticles.filtreArticlesByMotCleTitre(recherche);
        let tab = listeArticles.filtreArticlesByMotCleTitre(recherche);
        getUi(listeArticles, tab);
    })
}
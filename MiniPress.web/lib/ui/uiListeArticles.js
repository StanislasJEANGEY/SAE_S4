import {showdown} from "./node_modules/showdown/bin/showdown.js";

export function getUi(listeArticles) {
    let data = listeArticles.getTabArticles;
    let div = document.getElementById("main");
    let html = "<div id='listeArticles'>";

    let converter = new showdown.Converter();


    data.forEach(article => {
        html += `
            <div class="article">
                <h2>${article.titre}</h2>
                <p>${article.date_creation}</p>
                ${converter.makeHtml(article.contenu)}
            </div>
        `
    })
    html += "</div>";
    div.innerHTML = html;
}
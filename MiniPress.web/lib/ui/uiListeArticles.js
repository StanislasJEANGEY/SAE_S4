import {getArticleById} from "../../index.js";

export function getUi(listeArticles) {
    let data = listeArticles.getTabArticles;
    let div = document.getElementById("listeArticles");
    let html = "";

    let converter = new showdown.Converter();

    //si data n'est pas vide alors
    if(data.length > 0) {
        data.forEach(article => {
            html += `
            <div class="article" id="${article.id}">
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
                getArticleById(elem.target.closest('.article').id);
            })
        })
    }
}
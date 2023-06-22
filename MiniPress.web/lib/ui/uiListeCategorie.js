import {getListeArticlesByCategorie} from "../../index.js";

export function getUi(listeCategories) {
    let data = listeCategories.getTabCategories;
    let div = document.getElementById("liste_auth_categ");
    let html = "<div id='liste_auth_catege'>";
    data.forEach(categorie => {
        html += `
            <h2 id="${categorie.id}">${categorie.nom}</h2>
        `
    })
    html += "</div>"
    div.innerHTML = html;

    const categs = document.querySelectorAll("#liste_auth_categ");
    categs.forEach(categ => {
        categ.addEventListener("click", (elem) => {
            if (elem.target.parentNode.id.includes("liste_auth_catege")) {
                document.getElementById("articleDetails").innerHTML = "";
                document.getElementById("listeArticles").innerHTML = "";
                getListeArticlesByCategorie(elem.target.id)
            }
        })
    })
}
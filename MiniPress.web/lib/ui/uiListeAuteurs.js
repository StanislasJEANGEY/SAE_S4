import {getListeArticlesByAuteur} from "../../index.js";
export function getUi(listeAuteurs) {
    let data = listeAuteurs.getTabAuteurs;
    let div = document.getElementById("liste_auth_categ");
    let html = "";
    data.forEach(auteur => {
        html += `
            <h2 id="${auteur.id}">${auteur.nom}</h2>
        `
    })
    div.innerHTML = html;

    const auteurs = document.querySelectorAll("#liste_auth_categ");
    auteurs.forEach(auteur => {
        auteur.addEventListener("click", (elem) => {
            document.getElementById("articleDetails").innerHTML ="";
            document.getElementById("listeArticles").innerHTML ="";
            getListeArticlesByAuteur(elem.target.id)
        })
    })
}
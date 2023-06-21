import {getListeArticlesByCategorie}  from "../../index.js";
export function getUi(listeCategories){
    let data = listeCategories.getTabCategories;
    let div = document.getElementById("liste_auth_categ");
    let html = "";
    data.forEach(categorie => {
        html += `
            <h2 id="${categorie.id}">${categorie.nom}</h2>
        `
    })
    div.innerHTML = html;

    const categs = document.querySelectorAll("#liste_auth_categ");
    categs.forEach(categ => {
        categ.addEventListener("click", (elem) => {
            document.getElementById("articleDetails").innerHTML ="";
            document.getElementById("listeArticles").innerHTML ="";
            getListeArticlesByCategorie(elem.target.id)
        })
    })
}
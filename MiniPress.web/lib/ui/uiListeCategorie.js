export function getUi(listeCategories){
    let data = listeCategories.getTabCategories;
    let div = document.getElementById("main");
    let html = "<div id='listeCategories'>";
    data.forEach(categorie => {
        html += `
            <div class="categorie">
                <h2>${categorie.nom}</h2>
            </div>
        `
    })
    html += "</div>";
    div.innerHTML = html;
}
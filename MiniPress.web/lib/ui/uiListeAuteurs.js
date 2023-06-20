export function getUi(listeAuteurs) {
    let data = listeAuteurs.getTabAuteurs;
    let div = document.getElementById("main");
    let html = "<div id='listeAuteurs'>";
    data.forEach(auteur => {
        html += `
            <div class="auteur">
                <h2>${auteur.nom}</h2>
            </div>
        `
    })
    html += "</div>";
    div.innerHTML = html;
}
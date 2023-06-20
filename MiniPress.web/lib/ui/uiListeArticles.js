export function getUi(listeArticles) {
    let data = listeArticles.getTabArticles;
    let div = document.getElementById("main");
    let html = "<div id='listeArticles'>";

    data.forEach(article => {
        html += `
            <div class="article">
                <h2>${article.titre}</h2>
                <p>${article.date_creation}</p>
                <p>${article.contenu}</p>
            </div>
        `
    })
    html += "</div>";
    div.innerHTML = html;
}
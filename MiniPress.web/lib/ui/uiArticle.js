export function getUi(article) {
    let converter = new showdown.Converter();
    let div = document.getElementById("articleDetails");
    div.innerHTML = `
<div id="article">
        <h2 id="titre">${article.getTitre}</h2>
        <p>${converter.makeHtml(article.getResume)}</p>
        <p>${converter.makeHtml(article.getContenu)}</p>
        <p>${article.getDate_creation}</p>
        </div>
    `;

}
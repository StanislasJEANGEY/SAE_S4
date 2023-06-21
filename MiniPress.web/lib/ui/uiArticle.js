export function getUi(article) {
    console.log("getUi __ uiArticle.js");
    console.log(article);
    let converter = new showdown.Converter();
    let div = document.getElementById("articleDetails");
    div.innerHTML = `
        <h2 id="titre">${article.getTitre}</h2>
        <p>${converter.makeHtml(article.getResume)}</p>
        <p>${converter.makeHtml(article.getContenu)}</p>
        <p>${article.getDate_creation}</p>
    `;
}
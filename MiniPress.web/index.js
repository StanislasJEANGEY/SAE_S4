import * as loader from './lib/loader.js';
import Articles from "./models/Articles.js";


function loadArticles() {
    let data = loader.loadArticles();
    data.then(function (result) {

        let articles = document.getElementById("articles");
        for (let i = 0; i < result.length; i++) {

        }
    });
}
var articles;
const Article = () => {
    return loader.loadArticles().then((result) => {
        console.log("result");
        articles = new Articles(result);
        articles.triListeArticlesParDateAscendant();
    }).catch((error) => {
        console.log(error);
    });
}
Article();

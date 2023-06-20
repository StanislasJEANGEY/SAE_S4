import * as loader from './lib/loader.js';
import {Articles} from "./models/Articles.js";


function loadArticles() {
    let data = loader.loadArticles();
    data.then(function (result) {

        let articles = document.getElementById("articles");
        for (let i = 0; i < result.length; i++) {

        }
    });
}
const articles = new Articles();
articles.filtreArticlesByMotCle("1");

// loadArticles();
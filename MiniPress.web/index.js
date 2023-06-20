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
const test = () => {
    return loader.loadArticles().then((result) => {
        console.log(result);
        return result;
    });
}
const articles = new Articles(test());
articles.toString();

// loadArticles();
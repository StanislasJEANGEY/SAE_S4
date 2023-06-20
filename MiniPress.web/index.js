import * as loader from './lib/loader.js';

function loadArticles() {
    let data = loader.loadArticles();
    data.then(function (result) {
        console.log(result);
        let articles = document.getElementById("articles");
        for (let i = 0; i < result.length; i++) {

        }
    });
}

loadArticles();
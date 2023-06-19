import * as loader from './lib/loader.js'
let loader = new loader();
function loadArticles() {
    let data = loader.loadArticles();
    console.log(data);
}

loadArticles()
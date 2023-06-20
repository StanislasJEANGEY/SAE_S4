import * as loader from './lib/loader.js';
import Articles from "./models/Articles.js";
import Categories from "./models/Categories.js";
import Auteurs from "./models/Auteurs.js";
import * as uiListeArticles from './lib/ui/uiListeArticles.js';
import * as uiListeCategories from "./lib/ui/uiListeCategorie.js";
import * as uiListeAuteur from "./lib/ui/uiListeAuteurs.js";

document.getElementById("bt_article").addEventListener("click", () => {
    getArticles();
});

document.getElementById("bt_categories").addEventListener("click", () => {
    getCategories();
});

document.getElementById("bt_auteurs").addEventListener("click", () => {
    getAuteur();
});


const getArticles = () => {
    return loader.loadArticles().then((result) => {
        //console.log("result");
        let articles = new Articles(result);
        articles.triListeArticlesParDateAscendant();
        uiListeArticles.getUi(articles)
    }).catch((error) => {
        console.log(error);
    });
}

const getCategories = () => {
    return loader.loadCategories().then((result) => {
        let categories = new Categories(result);
        uiListeCategories.getUi(categories)
    }).catch((error) => {
        console.log(error);
    });
}

const getAuteur = () => {
    return loader.loadAuteurs().then((result) => {
        let auteur = new Auteurs(result);
        uiListeAuteur.getUi(auteur)
    }).catch((error) => {
        console.log(error);
    });
}


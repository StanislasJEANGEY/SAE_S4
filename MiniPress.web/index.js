import * as loader from './lib/loader.js';
import ListeArticles from "./models/ListeArticles.js";
import Categories from "./models/Categories.js";
import Auteurs from "./models/Auteurs.js";
import * as uiListeArticles from './lib/ui/uiListeArticles.js';
import * as uiListeCategories from "./lib/ui/uiListeCategorie.js";
import * as uiListeAuteur from "./lib/ui/uiListeAuteurs.js";
import * as uiArticles from "./lib/ui/uiArticle.js";
import Articles from "./models/Articles.js";


document.getElementById("bt_categories").addEventListener("click", () => {
    getCategories();
});

document.getElementById("bt_auteurs").addEventListener("click", () => {
    getAuteur();
});



export function getListeArticlesByCategorie (id) {
    loader.loadArticlesByCategorie(id).then((result) => {
        //console.log("result");
        let articles = new ListeArticles(result);
        articles.triListeArticlesParDateAscendant();
        uiListeArticles.getUi(articles)
    }).catch((error) => {
        console.log(error);
    });
}

export function getListeArticlesByAuteur (id) {
    loader.loadArticlesByAuteur(id).then((result) => {
        //console.log("result");
        let articles = new ListeArticles(result);
        articles.triListeArticlesParDateAscendant();
        uiListeArticles.getUi(articles)
    }).catch((error) => {
        console.log(error);
    });
}

export function getArticleById (id) {
    loader.loadArticle(id).then((result) => {
        let article = new Articles(result);
        uiArticles.getUi(article)
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


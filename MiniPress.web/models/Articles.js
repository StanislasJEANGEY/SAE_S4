import * as loader from './../lib/loader.js';

export default class Articles {
    _tabArticles = [];
    _count = 0;


    constructor(data) {
        this._tabArticles = data['article'];
        this._count = data['count'];
    }

    filtreArticlesByMotCle(motCle) {
        let tab = [];
        this._tabArticles.forEach((article) => {
            if (article['titre'].includes(motCle)) {
                tab.push(article);
            }
        });
        console.log(tab);
        return tab;
    }

    get tabArticles() {
        return this._tabArticles;
    }

    get count() {
        return this._count;
    }
}
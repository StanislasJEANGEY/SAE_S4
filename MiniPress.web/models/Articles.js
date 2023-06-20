import * as loader from './../lib/loader.js';

export class Articles {
     tabArticles = [];


    constructor() {
        this.tabArticles = [];
        return loader.loadArticles().then((result) => {
            const tmp = result;
            this.tabArticles = tmp['article'];
            console.log(this.tabArticles);
        });
    }

    filtreArticlesByMotCle(motCle) {
        return this.tabArticles.filter((article) => {
            return article['titre'].includes(motCle);
        });
    }


}
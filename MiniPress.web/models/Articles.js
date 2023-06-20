import * as loader from './../lib/loader.js';

export default class Articles {
    tabArticles = [];
    count = 0;


    constructor(data) {
        this.tabArticles = data['article'];
        console.log(data);
        this.count = data['count'];
    }

    filtreArticlesByMotCleTitre(motCle) {
        let tab = [];
        this.tabArticles.forEach((article) => {
            if (article['titre'].includes(motCle)) {
                tab.push(article);
            }
        });
        return tab;
    }

    filtreArticlesByMotCleTitreResume(motCle) {
        let tab = [];
        this.tabArticles.forEach((article) => {
            if (article['titre'].includes(motCle) || article['resume'].includes(motCle)) {
                tab.push(article);
            }
        });
        return tab;
    }

    triListeArticlesParDateAscendant() {
        console.log(this.tabArticles);
        this.tabArticles.sort((a, b) => {
            return new Date(a['date']).getTime() - new Date(b['date']).getTime();
        });
        console.log(this.tabArticles);
    }



    get tabArticles() {
        return this.tabArticles;
    }

    get count() {
        return this.count;
    }
}
export default class ListeArticles {
    tabArticles = [];
    count = 0;


    constructor(data) {
        this.tabArticles = data['articles'];
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

        this.tabArticles.sort((a, b) => {
            return new Date(a['date_creation']).getTime() - new Date(b['date_creation']).getTime();
        } );

    }

    triListeArticlesParDateDescendant() {
        this.tabArticles.sort((a, b) => {
            return new Date(b['date_creation']).getTime() - new Date(a['date_creation']).getTime();
        });
    }

    get getTabArticles() {
        return this.tabArticles;
    }

    get getCount() {
        return this.count;
    }

}
export default class ListeArticles {
    tabArticles = [];
    count = 0;


    constructor(data) {
        this._tabArticles = data['articles'];
        this.count = data['count'];
    }

    filtreArticlesByMotCleTitre(motCle) {
        let tab = [];
        this._tabArticles.forEach((article) => {
            if (article['titre'].includes(motCle)) {
                tab.push(article);
            }
        });
        return tab;
    }

    filtreArticlesByMotCleTitreResume(motCle) {
        let tab = [];
        this._tabArticles.forEach((article) => {
            if (article['titre'].includes(motCle) || article['resume'].includes(motCle)) {
                tab.push(article);
            }
        });
        return tab;
    }

    triListeArticlesParDateAscendant() {

        this._tabArticles.sort((a, b) => {
            return new Date(a['date_creation']).getTime() - new Date(b['date_creation']).getTime();
        } );

    }

    triListeArticlesParDateDescendant() {
        this._tabArticles.sort((a, b) => {
            return new Date(b['date_creation']).getTime() - new Date(a['date_creation']).getTime();
        });
    }

    get getTabArticles() {
        return this._tabArticles;
    }

    get getCount() {
        return this.count;
    }


    set setTabArticles(value) {
        this._tabArticles = value;
    }
}
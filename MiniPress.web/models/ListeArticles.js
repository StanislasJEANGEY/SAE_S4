export default class ListeArticles {
    tabArticles = [];
    count = 0;
    cat_id = 0;
    author_id = 0;


    constructor(data) {
        this._tabArticles = data['articles'];
        this.count = data['count'];
        this.cat_id = data['articles'][0]['categorie_id'];
        this.author_id = data['articles'][0]['auteur_id'];
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
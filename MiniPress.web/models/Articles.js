export default class Articles {
    _titre = "";
    _resume = "";
    _contenu = "";
    _date_creation = "";
    _id = 0;

    constructor(data) {
        this._titre = data['article']['titre'];
        this._resume = data['article']['resume'];
        this._contenu = data['article']['contenu'];
        this._date_creation = data['article']['date_creation'];
        this._id = data['article']['id'];
    }

    get getTitre() {
        return this._titre;
    }

    get getResume() {
        return this._resume;
    }

    get getContenu() {
        return this._contenu;
    }

    get getDate_creation() {
        return this._date_creation;
    }


    get getId() {
        return this._id;
    }
}
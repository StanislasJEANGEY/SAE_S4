export default class Auteurs {
    tabAuteurs = [];
    count = 0;

    constructor(data) {
        this.tabAuteurs = data['auteurs'];
        this.count = data['count'];
    }

    get getTabAuteurs() {
        return this.tabAuteurs;
    }

    get getCount() {
        return this.count;
    }
}
export default class Categories {
    tabCategories = [];
    count = 0;

    constructor(data) {
        this.tabCategories = data['categories'];
        this.count = data['count'];
    }

    get getTabCategories() {
        return this.tabCategories;
    }

    get getCount() {
        return this.count;
    }
}
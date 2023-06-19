import url from './conf.js';




class loader {
    constructor() {
        this.url = url;
    }

    loadArticles() {
        return fetch(this.url + '/articles')
            .then(response => response.json())
            .then(data => {
                return data;
            })
            .catch(error => {
                console.log(error);
            });
    }
}
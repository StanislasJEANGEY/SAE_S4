import {url} from './conf.js';

/**
 * Charge tous les articles
 * @returns {Promise<Response | void>}
 */
export function loadArticles(){
    let promise = fetch(url+'/api/articles');
    return promise.then((response) => {
        if (response.ok) {
            return response.json();
        } else {
            console.log(response.status);
        }
    }).catch((error) => console.log(error));
}

/**
 * Charge un article avec son id
 * @param id
 * @returns {Promise<Response | void>}
 */
export function loadArticle(id){
let promise = fetch(url+'/api/articles/'+id);
    return promise.then((response) => {
        if (response.ok) {
            return response.json();
        } else {
            console.log(response.status);
        }
    }).catch((error) => console.log(error));
}

/**
 * Charge toutes les catégories
 * @returns {Promise<Response | void>}
 */
export function loadCategories(){
    let promise = fetch(url+'/api/categories');
    return promise.then((response) => {
        if (response.ok) {
            return response.json();
        } else {
            console.log(response.status);
        }
    }).catch((error) => console.log(error));
}

/**
 * charge les articles d'une catégorie
 * @param id
 * @returns {Promise<Response | void>}
 */
export function loadArticlesByCategorie(id){
    let promise = fetch(url+'/api/categories/'+id+'/articles');
    return promise.then((response) => {
        if (response.ok) {
            return response.json();
        } else {
            console.log(response.status);
        }
    }).catch((error) => console.log(error));
}

/**
 * Charge les articles d'un auteur
 * @param id
 * @returns {Promise<Response | void>}
 */

export function loadArticlesByAuteur(id){
    let promise = fetch(url +'/api/authors/'+id+'/articles');
    return promise.then((response) => {
        if (response.ok) {
            return response.json();
        } else {
            console.log(response.status);
        }
    }).catch((error) => console.log(error));
}



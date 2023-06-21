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
    }).catch((error) => document.getElementById("articles").innerHTML = "Erreur lors du chargement des articles : "+error);
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
    }).catch( (error) => document.getElementById("articles").innerHTML = "Erreur lors du chargement de l'article : "+error);
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
    }).catch((error) => document.getElementById("articles").innerHTML = "Erreur lors du chargement des catégories : "+error);
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
    }).catch((error) => document.getElementById("articles").innerHTML = "Erreur lors du chargement des articles de la catégorie : "+error);
}

/**
 * Charge les articles d'un auteur
 * @param id
 * @returns {Promise<Response | void>}
 */

export function loadArticlesByAuteur(id){
    let promise = fetch(url +'/api/auteurs/'+id+'/articles');
    return promise.then((response) => {
        if (response.ok) {
            return response.json();
        } else {
            console.log(response.status);
        }
    }).catch((error) => document.getElementById("articles").innerHTML = "Erreur lors du chargement des articles de l'auteur : "+error);
}

export function loadAuteurs(){
    let promise = fetch(url+'/api/auteurs');
    return promise.then((response) => {
        if (response.ok) {
            return response.json();
        } else {
            console.log(response.status);
        }
    }).catch((error) => document.getElementById("articles").innerHTML = "Erreur lors du chargement des auteurs : "+error);
}



import {url} from './conf.js';
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



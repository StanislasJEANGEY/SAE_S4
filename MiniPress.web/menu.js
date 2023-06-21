var btArticle = document.getElementById("bt_article");
var btCategories = document.getElementById("bt_categories");
var btAuteurs = document.getElementById("bt_auteurs");

btArticle.addEventListener("click", function() {
    displaySecondaryMenu("Articles");
});

btCategories.addEventListener("click", function() {
    displaySecondaryMenu("Categories");
});

btAuteurs.addEventListener("click", function() {
    displaySecondaryMenu("Auteurs");
});

function displaySecondaryMenu(menuName) {
    console.log("displaySecondaryMenu: " + menuName);
    viderSecondaryMenu();
    var secondaryMenu = document.getElementById("second-menu"+menuName);

    // Efface le contenu précédent du menu secondaire
    secondaryMenu.innerHTML = "";



    // Ajoute le contenu au menu secondaire
    secondaryMenu.appendChild(secondaryMenuContent);

    // Affiche le menu secondaire
    secondaryMenu.style.display = "block";
}

function viderSecondaryMenu() {
    var secondaryMenuCategorie = document.getElementById("second-menuCategories");
    secondaryMenuCategorie.style.display = "none";
    var secondaryMenuAuteur = document.getElementById("second-menuAuteurs");
    secondaryMenuAuteur.style.display = "none";
    var secondaryMenuArticle = document.getElementById("second-menuArticles");
    secondaryMenuArticle.style.display = "none";
}

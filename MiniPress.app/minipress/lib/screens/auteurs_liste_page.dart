import 'package:flutter/material.dart';
import 'package:minipress/models/articles.dart';
import 'package:minipress/models/auteurs.dart';

class AuteurListPage extends StatelessWidget {
  const AuteurListPage({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Liste des auteurs'),
      ),
      body: Container(
          // Affichage de la liste des auteurs...
          ),
    );
  }

  void displayArticlesByAuthor(Auteurs auteurs) {
    // Filtrer les articles en fonction de l'auteur sélectionné
    List<Articles> articles = [];

    List<Articles> articlesByAuthor = articles
        .where((article) => article.auteurId == auteurs.id)
        .toList();
    
    // Mettre à jour la liste des articles à afficher
    articles = articlesByAuthor;
  }
}

import 'package:flutter/material.dart';
import 'package:minipress/models/articles.dart';
import 'package:minipress/screens/article_details_page.dart';

class ArticleListPage extends StatelessWidget {
  const ArticleListPage({super.key});
  
  // articles.sort((a, b) => b.dateCreation.compareTo(a.dateCreation));

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Liste des articles'),
      ),
      body: Container(
        // Affichage de la liste des articles...
      ),
    );
  }

  void displayArticleDetails(BuildContext context, Articles article) {
    // Afficher les détails de l'article sélectionné
    Navigator.push(
      context,
      MaterialPageRoute(
        builder: (context) => ArticleDetailsPage(article: article),
      ),
    );
  }
}
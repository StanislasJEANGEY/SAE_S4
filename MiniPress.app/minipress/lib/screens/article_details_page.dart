import 'package:flutter/material.dart';
import 'package:minipress/models/articles.dart';

class ArticleDetailsPage extends StatelessWidget {
  const ArticleDetailsPage({Key? key, required this.article}) : super(key: key);

  final Articles article;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(article.titre),
      ),
      body: Column(
        children: [
          Text(article.titre),
          Text(article.dateCreation.toString()),
          // Afficher les autres détails de l'article
        ],
      ),
    );
  }
}
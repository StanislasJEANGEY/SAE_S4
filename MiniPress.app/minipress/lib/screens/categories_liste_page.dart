import 'package:flutter/material.dart';
import 'package:minipress/providers/minipress_provider.dart';
import 'package:provider/provider.dart';
import 'package:minipress/models/articles.dart';
import 'package:minipress/models/categories.dart';

class CategorieListPage extends StatelessWidget {
  const CategorieListPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          title: const Text('Liste des catégories'),
        ),
        body: Consumer<MinipressProvider>(
            builder: (context, minipressProvider, child) {
          return FutureBuilder<List<Categories>>(
              future: minipressProvider.getCategories(),
              builder: (context, snapshot) {
                if (snapshot.hasData) {
                  return ListView.builder(
                    itemCount: snapshot.data!.length,
                    itemBuilder: (context, index) {
                      return ListTile(
                        title: Text(snapshot.data![index].nom),
                      );
                    },
                  );
                } else if (snapshot.hasError) {
                  return const Text('Erreur de chargement des catégories');
                } else {
                  return const Center(child: CircularProgressIndicator());
                }
              });
        }));
  }

  void displayArticlesByCategorie(Categories categories) {
    // Filtrer les articles en fonction de la catégorie sélectionnée
    List<Articles> articles = [];

    List<Articles> articlesByCategorie = articles
        .where((article) => article.categorieId == categories.id)
        .toList();

    // Mettre à jour la liste des articles à afficher
    articles = articlesByCategorie;
  }
}
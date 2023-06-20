import 'package:flutter/material.dart';
import 'package:minipress/models/auteurs.dart';
import 'package:minipress/models/categories.dart';
import 'package:minipress/screens/articles_liste_page.dart';
import 'package:minipress/screens/categories_liste_page.dart';
import '../models/articles.dart';

class MinipressMaster extends StatefulWidget {
  const MinipressMaster({Key? key}) : super(key: key);

  @override
  State<MinipressMaster> createState() => _MinipressMasterState();
}

class _MinipressMasterState extends State<MinipressMaster> {
  List<Articles> articles = [];
  List<Categories> categories = [];
  List<Auteurs> auteurs = [];

  @override
  Widget build(BuildContext context) {
    // Tri des articles par date de création
    articles.sort((a, b) => b.dateCreation.compareTo(a.dateCreation));

    return Scaffold(
      appBar: AppBar(
        title: const Text('Minipress', textAlign: TextAlign.center),
      ),
      // Burger menu en haut à gauche pour mettre nos boutons
      drawer: Drawer(
          child: ListView(children: [
        // Page de liste des articles
        ListTile(
            title: const Text('Liste des articles'),
            onTap: () {
              // Naviguer vers la liste des articles
              Navigator.push(
                context,
                MaterialPageRoute(builder: (context) => const ArticleListPage()),
              );
            }),
        // Page de liste des catégories
        ListTile(
          title: const Text('Liste des catégories'),
          onTap: () {
            // Naviguer vers la liste des catégories
            Navigator.push(
              context,
              MaterialPageRoute(builder: (context) => const CategorieListPage()),
            );
          },
        ),
      ])),
      // Affichage de la liste des articles pour l'instant dans l'accueil, à déplacer plus tard
      body: ListView.builder(
        itemCount: articles.length,
        itemBuilder: (context, index) {
          return ListTile(
            title: Text(articles[index].titre),
            subtitle: Text(auteurs[index].nom),
            trailing: Text(articles[index].dateCreation.toString()),
          );
        },
      ),
    );
  }
}

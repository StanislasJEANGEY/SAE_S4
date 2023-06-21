import 'package:flutter/material.dart';
import 'package:minipress/models/auteurs.dart';
import 'package:minipress/models/categories.dart';
import 'package:minipress/screens/articles_liste_page.dart';
import 'package:minipress/screens/auteurs_liste_page.dart';
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

    return Scaffold(
      appBar: AppBar(
        title: const Text('Minipress', textAlign: TextAlign.center),
      ),
      // Ajouter une texte d'accueil sur la page
      body: const Center(
        child: Text(
          'Bienvenue sur Minipress',
          style: TextStyle(fontSize: 30),
        ),
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
        ListTile(
          title: const Text('Liste des auteurs'),
          onTap: () {
            // Naviguer vers la liste des auteurs
            Navigator.push(
              context,
              MaterialPageRoute(builder: (context) => const AuteurListPage()),
            );
          },
        ),
      ])),
    );
  }
}
import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:minipress/models/articles.dart';
import 'package:minipress/providers/minipress_provider.dart';
import 'package:minipress/screens/article_details_page.dart';
import 'package:provider/provider.dart';
import 'package:intl/intl.dart';

class ArticleListPage extends StatelessWidget {
  const ArticleListPage({super.key});

  @override
  Widget build(BuildContext context) {
    String? selectedValue;

    return Scaffold(
      appBar: AppBar(
        title: const Text('Liste des articles'),
        actions: [
          DropdownButton<String>(
            value: selectedValue,
            items: const [
              DropdownMenuItem<String>(
                value: '1',
                child: Text('Croissant'),
              ),
              DropdownMenuItem<String>(
                value: '2',
                child: Text('Décroissant'),
              ),
            ],
            onChanged: (String? value) {
              // Mettre à jour la valeur sélectionnée
              selectedValue = value;
              if (value == '1') {
                Provider.of<MinipressProvider>(context, listen: false)
                    .getArticles()
                    .then((articles) {
                  articles
                      .sort((a, b) => a.dateCreation.compareTo(b.dateCreation));
                });
              } else if (value == '2') {
                Provider.of<MinipressProvider>(context, listen: false)
                    .getArticles()
                    .then((articles) {
                  articles
                      .sort((a, b) => b.dateCreation.compareTo(a.dateCreation));
                });
              }
            },
            hint: const Text('Trier par ordre'), // Texte par défaut affiché sur le bouton
            isExpanded: true,
          ),
        ],
      ),
      body: Consumer<MinipressProvider>(
        builder: (context, minipressProvider, child) {
          return FutureBuilder<List<Articles>>(
            future: minipressProvider.getArticles(),
            builder: (context, snapshot) {
              if (snapshot.hasData) {
                return ListView.builder(
                  itemCount: snapshot.data!.length,
                  itemBuilder: (context, index) {
                    return ListTile(
                      title: Text(snapshot.data![index].titre),
                      subtitle: Text(
                          utf8.decode(snapshot.data![index].resume.codeUnits)),
                      trailing: Row(
                        mainAxisSize: MainAxisSize.min,
                        children: [
                          Text(
                            DateFormat('dd/MM/yyyy à HH:mm')
                                .format(snapshot.data![index].dateCreation),
                          ),
                          const SizedBox(
                            width: 10,
                          ), // Espacement entre la date et la case à cocher
                          Checkbox(
                            value: snapshot.data![index].publie == 1,
                            onChanged: null,
                            activeColor:
                                Colors.green, // Couleur de la case cochée
                            checkColor: Colors.white, // Couleur de la coche
                          ),
                        ],
                      ),
                      onTap: () =>
                          displayArticleDetails(context, snapshot.data![index]),
                    );
                  },
                );
              } else if (snapshot.hasError) {
                return const Text('Erreur de chargement des catégories');
              } else {
                return const Center(child: CircularProgressIndicator());
              }
            },
          );
        },
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

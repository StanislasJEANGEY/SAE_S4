import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:flutter_markdown/flutter_markdown.dart';
import 'package:intl/intl.dart';
import 'package:minipress/models/articles.dart';
import 'package:minipress/providers/minipress_provider.dart';
import 'package:minipress/screens/article_details_page.dart';
import 'package:provider/provider.dart';

class ArticleListPage extends StatelessWidget {
  const ArticleListPage({Key? key});

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
            hint: const Text(
              'Trier par ordre',
            ), // Texte par défaut affiché sur le bouton
            // isExpanded: true,
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
                    return Card(
                      elevation: 2.0,
                      margin: const EdgeInsets.symmetric(
                        horizontal: 16.0,
                        vertical: 8.0,
                      ),
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(8.0),
                      ),
                      child: ListTile(
                        title: Text(
                          snapshot.data![index].titre,
                          style: TextStyle(fontWeight: FontWeight.bold),
                        ),
                        subtitle: Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            SizedBox(height: 8.0),
                            MarkdownBody(
                              data: utf8.decode(
                                snapshot.data![index].resume.codeUnits,
                              ),
                            ),
                            SizedBox(height: 8.0),
                            Row(
                              children: [
                                Icon(
                                  Icons.calendar_today,
                                  size: 16.0,
                                ),
                                SizedBox(width: 4.0),
                                Text(
                                  DateFormat('dd/MM/yyyy à HH:mm').format(
                                    snapshot.data![index].dateCreation,
                                  ),
                                  style: TextStyle(fontSize: 14.0),
                                ),
                              ],
                            ),
                            SizedBox(height: 8.0),
                            Text('Publié: ${snapshot.data![index].publie == 1 ? 'Oui' : 'Non'}'),
                          ],
                        ),
                        onTap: () => displayArticleDetails(
                          context,
                          snapshot.data![index],
                        ),
                      ),
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

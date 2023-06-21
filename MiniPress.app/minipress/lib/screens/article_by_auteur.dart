import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:flutter_markdown/flutter_markdown.dart';
import 'package:minipress/models/articles.dart';
import 'package:minipress/models/auteurs.dart';
import 'package:minipress/providers/minipress_provider.dart';
import 'package:minipress/screens/article_details_page.dart';
import 'package:provider/provider.dart';
import 'package:intl/intl.dart';

class ArticleByAuteurPage extends StatefulWidget {
  const ArticleByAuteurPage({Key? key, required this.auteur}) : super(key: key);

  final Auteurs auteur;

  @override
  _ArticleByAuteurPageState createState() => _ArticleByAuteurPageState();
}

class _ArticleByAuteurPageState extends State<ArticleByAuteurPage> {
  String? selectedValue;

  void displayArticleDetails(BuildContext context, Articles article) {
    // Afficher les détails de l'article sélectionné
    Navigator.push(
      context,
      MaterialPageRoute(
        builder: (context) => ArticleDetailsPage(article: article),
      ),
    );
  }

  Future<List<Articles>> sortArticles(String value, context) async {
    List<Articles> articles =
        await Provider.of<MinipressProvider>(context, listen: false)
            .getArticles();
    if (value == '1') {
      articles.sort((a, b) => a.dateCreation.compareTo(b.dateCreation));
    } else if (value == '2') {
      articles.sort((a, b) => b.dateCreation.compareTo(a.dateCreation));
    }
    return articles;
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Liste des articles'),
        actions: [
          DropdownButton<String>(
            value: selectedValue,
            items: const [
              DropdownMenuItem<String>(
                value: '0',
                child: Text('Aucun'),
              ),
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
              setState(() {
                selectedValue = value;
              });
              sortArticles(value!, context);
            },
            hint: const Text(
              'Trier par ordre',
            ),
          ),
        ],
      ),
      body: Consumer<MinipressProvider>(
        builder: (context, minipressProvider, child) {
          return FutureBuilder<List<Articles>>(
            future: minipressProvider.getArticles(),
            builder: (context, snapshot) {
              if (snapshot.hasData) {
                List<Articles> articles = snapshot.data!;
                if (selectedValue == '1') {
                  articles
                      .sort((a, b) => a.dateCreation.compareTo(b.dateCreation));
                } else if (selectedValue == '2') {
                  articles
                      .sort((a, b) => b.dateCreation.compareTo(a.dateCreation));
                }
                return ListView.builder(
                  itemCount: articles.length,
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
                          articles[index].titre,
                          style: const TextStyle(fontWeight: FontWeight.bold),
                        ),
                        subtitle: Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            const SizedBox(height: 8.0),
                            MarkdownBody(
                              data: utf8.decode(
                                articles[index].resume.codeUnits,
                              ),
                            ),
                            const SizedBox(height: 8.0),
                            Row(
                              children: [
                                const Icon(
                                  Icons.calendar_today,
                                  size: 16.0,
                                ),
                                const SizedBox(width: 4.0),
                                Text(
                                  DateFormat('dd/MM/yyyy à HH:mm').format(
                                    articles[index].dateCreation,
                                  ),
                                  style: const TextStyle(fontSize: 14.0),
                                ),
                              ],
                            ),
                            const SizedBox(height: 8.0),
                            Text(
                                'Publié: ${articles[index].publie == 1 ? 'Oui' : 'Non'}'),
                          ],
                        ),
                        onTap: () => displayArticleDetails(
                          context,
                          articles[index],
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
}

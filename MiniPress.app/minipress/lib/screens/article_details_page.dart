import 'dart:convert';
import 'package:flutter_markdown/flutter_markdown.dart';
import 'package:flutter/material.dart';
import 'package:intl/intl.dart';
import 'package:minipress/models/articles.dart';
import 'package:minipress/providers/minipress_provider.dart';
import 'package:provider/provider.dart';

class ArticleDetailsPage extends StatelessWidget {
  const ArticleDetailsPage({Key? key, required this.article}) : super(key: key);

  final Articles article;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          title: Text(article.titre),
        ),
        body: Consumer<MinipressProvider>(
            builder: (context, minipressProvider, child) {
          return FutureBuilder<Articles>(
            future: minipressProvider.getArticleById(article.id!),
            builder: (context, snapshot) {
              if (snapshot.hasData) {
                final decodedContenu = utf8.decode(snapshot.data!.contenu.codeUnits);
                final decodedResume = utf8.decode(snapshot.data!.resume.codeUnits);
                return ListView(
                  padding: EdgeInsets.all(16.0),
                  children: [
                    Card(
                      elevation: 2.0,
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(8.0),
                      ),
                      child: ListTile(
                        title: Text(
                          snapshot.data!.titre,
                          style: TextStyle(fontWeight: FontWeight.bold),
                        ),
                        subtitle: Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            SizedBox(height: 8.0),
                            MarkdownBody(data: decodedResume),
                            SizedBox(height: 8.0),
                            Row(
                              children: [
                                Icon(Icons.calendar_today, size: 16.0),
                                SizedBox(width: 4.0),
                                Text(
                                  DateFormat('dd/MM/yyyy à HH:mm')
                                      .format(snapshot.data!.dateCreation),
                                  style: TextStyle(fontSize: 14.0),
                                ),
                              ],
                            ),
                            SizedBox(height: 8.0),
                            MarkdownBody(data: decodedContenu),
                            Text('Image URL: ${snapshot.data!.imageUrl}'),
                            Text('Catégorie ID: ${snapshot.data!.categorieId}'),
                            Text('Auteur ID: ${snapshot.data!.auteurId}'),
                            Text(
                                'Publié: ${snapshot.data!.publie == 1 ? 'Oui' : 'Non'}'),
                          ],
                        ),
                    ),
                )],
                );
              } else if (snapshot.hasError) {
                return const Text('Erreur de chargement des articles');
              } else {
                return const Center(child: CircularProgressIndicator());
              }
            },
          );
        }));
  }
}

import 'dart:convert';
import 'package:flutter_markdown/flutter_markdown.dart';
import 'package:flutter/material.dart';
import 'package:intl/intl.dart';
import 'package:minipress/models/articles.dart';
import 'package:minipress/models/auteurs.dart';
import 'package:minipress/providers/minipress_provider.dart';
import 'package:provider/provider.dart';

class ArticleDetailsPage extends StatelessWidget {
  const ArticleDetailsPage({Key? key, required this.article}) : super(key: key);

  final Articles article;

  //fonction pour récupérer l'auteur de l'article, si l'id que j'ai dans l'article est égal à l'id de l'auteur, je retourne l'auteur. Pour récupérer la liste des auteurs, j'utilise ma fonction getAuteurs() de mon provider
  Future<Auteurs?> getAuteurByArticleId(BuildContext context) async {
    final minipressProvider = Provider.of<MinipressProvider>(context, listen: false);
    final auteurs = await minipressProvider.getAuteurs();
    return auteurs.firstWhere((auteur) => auteur.id == article.auteurId);
  }
  

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
                final auteur = getAuteurByArticleId(context);
                final decodedContenu =
                    utf8.decode(snapshot.data!.contenu.codeUnits);
                final decodedResume =
                    utf8.decode(snapshot.data!.resume.codeUnits);
                return ListView(
                  padding: const EdgeInsets.all(16.0),
                  children: [
                    Card(
                      elevation: 2.0,
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(8.0),
                      ),
                      child: ListTile(
                        title: Text(
                          snapshot.data!.titre,
                          style: const TextStyle(fontWeight: FontWeight.bold),
                        ),
                        subtitle: Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            const SizedBox(height: 8.0),
                            MarkdownBody(data: decodedResume),
                            const SizedBox(height: 8.0),
                            MarkdownBody(data: decodedContenu),
                            const SizedBox(height: 8.0),
                            Row(
                              children: [
                                const Icon(Icons.calendar_today, size: 16.0),
                                const SizedBox(width: 4.0),
                                Text(
                                  DateFormat('dd/MM/yyyy à HH:mm')
                                      .format(snapshot.data!.dateCreation),
                                  style: const TextStyle(fontSize: 14.0),
                                ),
                              ],
                            ),
                            Text('Image URL: ${snapshot.data!.imageUrl}'),
                            FutureBuilder<Auteurs?>(
                              future: auteur,
                              builder: (context, snapshot) {
                                if (snapshot.hasData) {
                                  return Text('Auteur: ${snapshot.data!.nom}');
                                } else if (snapshot.hasError) {
                                  return const Text('Erreur de chargement de l\'auteur');
                                } else {
                                  return const Center(child: CircularProgressIndicator());
                                }
                              },
                            ),
                            Text(
                                'Publié: ${snapshot.data!.publie == 1 ? 'Oui' : 'Non'}'),
                          ],
                        ),
                      ),
                    )
                  ],
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

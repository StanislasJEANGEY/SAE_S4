import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:minipress/models/articles.dart';
import 'package:minipress/providers/minipress_provider.dart';
import 'package:minipress/screens/article_details_page.dart';
import 'package:provider/provider.dart';
import 'package:intl/intl.dart';
import 'package:html_unescape/html_unescape.dart';

class ArticleListPage extends StatelessWidget {
  const ArticleListPage({super.key});

  // articles.sort((a, b) => b.dateCreation.compareTo(a.dateCreation));

  @override
  Widget build(BuildContext context) {
    final unescape = HtmlUnescape();
    return Scaffold(
        appBar: AppBar(
          title: const Text('Liste des articles'),
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
                        subtitle: Text(utf8
                            .decode(snapshot.data![index].resume.codeUnits)),
                        trailing: Row(
                          mainAxisSize: MainAxisSize.min,
                          children: [
                            Text(
                              DateFormat('dd/MM/yyyy à HH:mm')
                                  .format(snapshot.data![index].dateCreation),
                            ),
                            const SizedBox(
                                width:
                                    10), // Espacement entre la date et la case à cocher
                            Checkbox(
                              value: snapshot.data![index].publie == 1,
                              onChanged: null,
                              activeColor:
                                  Colors.green, // Couleur de la case cochée
                              checkColor: Colors.white, // Couleur de la coche
                            ),
                          ],
                        ),
                        onTap: () => displayArticleDetails(
                            context, snapshot.data![index]),
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

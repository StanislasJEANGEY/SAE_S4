import 'package:flutter/material.dart';
import 'package:minipress/models/auteurs.dart';
import 'package:minipress/providers/minipress_provider.dart';
import 'package:minipress/screens/article_by_auteur.dart';
import 'package:provider/provider.dart';

class AuteurListPage extends StatelessWidget {
  const AuteurListPage({Key? key}) : super(key: key);

  @override
Widget build(BuildContext context) {
  return Scaffold(
    appBar: AppBar(
      title: const Text('Liste des auteurs'),
    ),
    body: Consumer<MinipressProvider>(
      builder: (context, minipressProvider, child) {
        return FutureBuilder<List<Auteurs>>(
          future: minipressProvider.getAuteurs(),
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
                      title: Text(snapshot.data![index].nom),
                      onTap: () => displayArticlesByAuthor(
                        context,
                        snapshot.data![index],
                      ),
                    ),
                  );
                },
              );
            } else if (snapshot.hasError) {
              return const Text('Erreur de chargement des auteurs');
            } else {
              return const Center(child: CircularProgressIndicator());
            }
          },
        );
      },
    ),
  );
}

  void displayArticlesByAuthor(BuildContext context, Auteurs auteur) {
    // Afficher les détails de l'article sélectionné
    Navigator.push(
      context,
      MaterialPageRoute(
        builder: (context) => ArticleByAuteurPage(auteur: auteur),
      ),
    );
  }
}

import 'package:flutter/material.dart';
import 'package:minipress/models/auteurs.dart';
import 'package:minipress/models/categories.dart';
import '../models/articles.dart';
import 'minipress_form.dart';

class MinipressMaster extends StatefulWidget {
  MinipressMaster({Key? key}) : super(key: key);

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
        title: const Text('Minipress'),
      ),
      body: ListView.builder(
        itemCount: articles.length,
        itemBuilder: (context, index) {
          return ListTile(
            title: Text(articles[index].titre),
            subtitle: Text(auteurs[index].nom),
            trailing: Text(articles[index].date_creation.toString()),
          );
        },
      ),
      floatingActionButton: FloatingActionButton(
        onPressed: () {
          var result = Navigator.push(
            context,
            MaterialPageRoute(builder: (context) => MinipressForm()),
          );
        },
        child: const Icon(Icons.add),
      ),
    );
  }
}
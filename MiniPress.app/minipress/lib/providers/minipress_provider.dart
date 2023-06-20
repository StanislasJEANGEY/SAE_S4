import 'package:http/http.dart' as http;
import 'package:flutter/material.dart';
import 'package:minipress/models/articles.dart';
import 'dart:convert';

import 'package:minipress/models/categories.dart';

class MinipressProvider extends ChangeNotifier {
  Future<List<Categories>> getCategories() async {
    var url = Uri.parse('http://docketu.iutnc.univ-lorraine.fr:18096/api/categories');
    var response = await http.get(url);

    if (response.statusCode == 200) {
      var jsonData = jsonDecode(response.body) as Map<String, dynamic>;
      List<Categories> categories = [];
      for (var item in jsonData['categories']) {
        var category = Categories.fromJson(item);
        categories.add(category);
      }
      return categories;
    } else {
      throw Exception('Échec de la requête avec le code ${response.statusCode}');
    }
  }

  // Future<List<Articles>> getArticles() async {
  //   var url = Uri.parse('http://docketu.iutnc.univ-lorraine.fr:18086/api/articles');
  //   var response = await http.get(url);

  //   if (response.statusCode == 200) {
  //     var jsonData = jsonDecode(response.body);
  //     List<Articles> articles = [];
  //     for (var item in jsonData) {
  //       articles.add(Articles(item['id'], item['titre'], item['contenu'], item['date'], item['auteur'], item['categorie']));
  //     }
  //     return articles;
  //   } else {
  //     throw Exception('Échec de la requête avec le code ${response.statusCode}');
  //   }
  // }

  // Future<List<Articles>> getArticlesByCategory(int categoryId) async {
  //   var url = Uri.parse('http://docketu.iutnc.univ-lorraine.fr:18086/api/categories/$categoryId/articles');
  //   var response = await http.get(url);

  //   if (response.statusCode == 200) {
  //     var jsonData = jsonDecode(response.body);
  //     List<Articles> articles = [];
  //     for (var item in jsonData) {
  //       var article = Articles.fromJson(item);
  //       articles.add(article);
  //     }
  //     return articles;
  //   } else {
  //     throw Exception('Échec de la requête avec le code ${response.statusCode}');
  //   }
  // }

  // Future<Articles> getArticleById(int articleId) async {
  //   var url = Uri.parse('http://docketu.iutnc.univ-lorraine.fr:18086/api/article/$articleId');
  //   var response = await http.get(url);

  //   if (response.statusCode == 200) {
  //     var jsonData = jsonDecode(response.body);
  //     var article = Articles.fromJson(jsonData);
  //     return article;
  //   } else {
  //     throw Exception('Échec de la requête avec le code ${response.statusCode}');
  //   }
  // }

  // Future<List<Articles>> getArticlesByAuthor(int authorId) async {
  //   var url = Uri.parse('http://docketu.iutnc.univ-lorraine.fr:18086/api/auteur/$authorId/articles');
  //   var response = await http.get(url);

  //   if (response.statusCode == 200) {
  //     var jsonData = jsonDecode(response.body);
  //     List<Articles> articles = [];
  //     for (var item in jsonData) {
  //       var article = Articles.fromJson(item);
  //       articles.add(article);
  //     }
  //     return articles;
  //   } else {
  //     throw Exception('Échec de la requête avec le code ${response.statusCode}');
  //   }
  // }
}

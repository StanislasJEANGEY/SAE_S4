import 'package:http/http.dart' as http;
import 'package:flutter/material.dart';
import 'package:minipress/models/articles.dart';
import 'package:minipress/models/auteurs.dart';
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

  Future<List<Articles>> getArticles() async {
    var url = Uri.parse('http://docketu.iutnc.univ-lorraine.fr:18096/api/articles');
    var response = await http.get(url);

    if (response.statusCode == 200) {
      var jsonData = jsonDecode(response.body) as Map<String, dynamic>;
      List<Articles> articles = [];
      for (var item in jsonData['article']) {
        var article = Articles.fromJson(item);
        articles.add(article);
      }
      return articles;
    } else {
      throw Exception('Échec de la requête avec le code ${response.statusCode}');
    }
  }

  Future<List<Articles>> getArticlesByCategorie(int categoryId) async {
    var url = Uri.parse('http://docketu.iutnc.univ-lorraine.fr:18096/api/categories/$categoryId/articles');
    var response = await http.get(url);

    if (response.statusCode == 200) {
      var jsonData = jsonDecode(response.body) as Map<String, dynamic>;
      List<Articles> articles = [];
      for (var item in jsonData['categories']) {
        var article = Articles.fromJson(item);
        articles.add(article);
      }
      return articles;
    } else {
      throw Exception('Échec de la requête avec le code ${response.statusCode}');
    }
  }

  Future<Articles> getArticleById(int articleId) async {
    var url = Uri.parse('http://docketu.iutnc.univ-lorraine.fr:18096/api/articles/$articleId');
    var response = await http.get(url);

    if (response.statusCode == 200) {
      var jsonData = jsonDecode(response.body) as Map<String, dynamic>;
      var article = Articles.fromJson(jsonData['article']);
      return article;
    } else {
      throw Exception('Échec de la requête avec le code ${response.statusCode}');
    }
  }

  Future<List<Auteurs>> getAuteurs() async {
    var url = Uri.parse('http://docketu.iutnc.univ-lorraine.fr:18096/api/auteurs');
    var response = await http.get(url);

    if (response.statusCode == 200) {
      var jsonData = jsonDecode(response.body) as Map<String, dynamic>;
      List<Auteurs> auteurs = [];
      for (var item in jsonData['auteurs']) {
        var auteur = Auteurs.fromJson(item);
        auteurs.add(auteur);
      }
      return auteurs;
    } else {
      throw Exception('Échec de la requête avec le code ${response.statusCode}');
    }
  }

  Future<List<Articles>> getArticlesByAuthor(int authorId) async {
    var url = Uri.parse('http://docketu.iutnc.univ-lorraine.fr:18096/api/auteurs/$authorId/articles');
    var response = await http.get(url);

    if (response.statusCode == 200) {
      var jsonData = jsonDecode(response.body) as Map<String, dynamic>;
      List<Articles> articles = [];
      for (var item in jsonData['article']) {
        var article = Articles.fromJson(item);
        articles.add(article);
      }
      return articles;
    } else {
      throw Exception('Échec de la requête avec le code ${response.statusCode}');
    }
  }
}

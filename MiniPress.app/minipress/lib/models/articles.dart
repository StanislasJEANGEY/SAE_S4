class Articles {
  int? id;
  String titre;
  String resume;
  String contenu;
  DateTime dateCreation;
  String? imageUrl;
  int? categorieId;
  int? auteurId;
  int publie;

  Articles({this.id, required this.titre, required this.resume, required this.contenu, required this.dateCreation, required this.imageUrl, this.categorieId, this.auteurId, required this.publie});

  factory Articles.fromJson(Map<String, dynamic> json) {
    return Articles(
      id: json['id'],
      titre: json['titre'],
      resume: json['resume'],
      contenu: json['contenu'],
      dateCreation: DateTime.parse(json['date_creation']),
      imageUrl: json['image_url'],
      categorieId: json['categorie_id'],
      auteurId: json['auteur_id'],
      publie: json['publie'],
    );
  }
}
class Articles {
  int? id;
  String titre;
  String resume;
  String contenu;
  DateTime date_creation;
  String image_url;
  int? categorie_id;
  int? auteur_id;
  int publie;

  Articles({this.id, required this.titre, required this.resume, required this.contenu, required this.date_creation, required this.image_url, this.categorie_id, this.auteur_id, required this.publie});

}
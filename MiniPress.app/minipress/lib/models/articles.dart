class Articles {
  int? id;
  String titre;
  String resume;
  String contenu;
  DateTime dateCreation;
  String imageUrl;
  int? categorieId;
  int? auteurId;
  int publie;

  Articles({this.id, required this.titre, required this.resume, required this.contenu, required this.dateCreation, required this.imageUrl, this.categorieId, this.auteurId, required this.publie});

}
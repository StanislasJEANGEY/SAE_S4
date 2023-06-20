class Auteurs {

  int? id;
  String nom;
  int? userId;

  Auteurs({this.id, required this.nom, this.userId});

  factory Auteurs.fromJson(Map<String, dynamic> json) {
    return Auteurs(
      id: json['id'],
      nom: json['nom'],
      userId: json['user_id'],
    );
  }

}
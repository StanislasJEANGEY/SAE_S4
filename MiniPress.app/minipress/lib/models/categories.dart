class Categories {

  int? id;
  String nom;

  Categories({this.id, required this.nom});

  factory Categories.fromJson(Map<String, dynamic> json) {
    return Categories(
      id: json['id'],
      nom: json['nom'],
    );
  }

}
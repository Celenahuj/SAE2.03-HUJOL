0,n: il peut y avoir au minimum 0 film dans une categorie et au maximum n film.
1,n: un film peu appartenir au minimum à 1 catégorie et au maximum à n catégories.

0,n:un film peut être mit en favori par 0 profil au minimum et n profils au maximum
0,n: un profil peut au minimum mettre en favori 0 film et au maximum n films.


Itération 5 : Gestion des utilisateurs
Dans cette cinquième itération, l’objectif est de gérer les utilisateurs. Pour ce faire, j’ai créé une table nommée Profil comportant les attributs suivants :
id_profil: type INT auto-incrémenté. Ce type est adapté pour une clé primaire car il permet d’identifier de manière unique chaque profil tout en assurant une génération automatique.
name : type VARCHAR(150). Ce type est utilisé car les noms des utilisateurs peuvent varier en longueur. Une taille de 150 caractères offre une bonne flexibilité sans trop consommer d’espace.
image : type VARCHAR(150). Ce champ stocke le nom du fichier image associé à un utilisateur. Le VARCHAR est idéal pour ce genre de donnée, car les noms de fichiers sont textuels et de longueur variable.
year : type DATE. Ce type permet de stocker une date de naissance au format standard, facilitant les calculs ultérieurs (âge réel, filtre par âge).

Itération 9 : Gestion des favoris
L’objectif de cette itération est de permettre aux utilisateurs de marquer des films comme favoris. Une nouvelle table Favori a été créée avec les champs suivants :
id_favori : type INT auto-incrémenté. Utilisé ici pour garantir un identifiant unique pour chaque relation “utilisateur-film”.
id_profil : type INT. Ce champ fait référence à un profil existant. Le type INT est cohérent avec l’identifiant de la table Profil.
id : type INT. De même, ce champ référence un film dans la base de données, dont l’identifiant est aussi de type INT.
Le choix de INT pour les clés étrangères permet une cohérence avec les tables référencées et optimise les performances des jointures.

Itération 11 : Mise en avant de films
Pour cette itération, on m’a demandé d’identifier les films mis en avant. Plutôt que de créer une table séparée, j’ai choisi d’ajouter un attribut featured à la table Movie.
featured : type TINYINT, avec une valeur par défaut de 0. Ce type occupe très peu d’espace (1 octet) et est idéal pour stocker un booléen.
Si la valeur est 1, le film est mis en avant ; s’il est 0, il ne l’est pas. Cela permet une gestion simple et rapide via des requêtes conditionnelles.

Itération 14 : Système de notation
Dans cette quatorzième itération, j’ai implémenté un système permettant aux utilisateurs de noter les films. Une table Note a été conçue, structurée de la manière suivante :
id_note : type INT auto-incrémenté. Sert d’identifiant unique pour chaque évaluation.
id_profil : type INT. Référence l’auteur de la note (profil).
id_film : type INT. Référence le film évalué.
note : type DECIMAL(2,1). Ce type a été choisi pour permettre des notes précises avec une valeur à virgule comme 8.5 ou 9.0.
Le choix de DECIMAL(2,1) est parfaitement adapté pour un système de notation sur 10. Cette notation permet de spécifier des notes avec une décimale, tout en garantissant que les valeurs restent dans la plage attendue, soit de 0.0 à 10.0.
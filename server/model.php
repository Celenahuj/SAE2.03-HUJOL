<?php
/**
 * Ce fichier contient toutes les fonctions qui réalisent des opérations
 * sur la base de données, telles que les requêtes SQL pour insérer, 
 * mettre à jour, supprimer ou récupérer des données.
 */

/**
 * Définition des constantes de connexion à la base de données.
 *
 * HOST : Nom d'hôte du serveur de base de données, ici "localhost".
 * DBNAME : Nom de la base de données
 * DBLOGIN : Nom d'utilisateur pour se connecter à la base de données.
 * DBPWD : Mot de passe pour se connecter à la base de données.
 */
define("HOST", "localhost");
define("DBNAME", "hujol3");
define("DBLOGIN", "hujol3");
define("DBPWD", "hujol3");

function getMovie()
{
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);
    // Requête SQL pour récupérer le menu avec des paramètres
    $sql = "select name, image, id from Movie ";
    // Prépare la requête SQL
    $stmt = $cnx->prepare($sql);
    // Lie le paramètre à la valeur
    // Exécute la requête SQL
    $stmt->execute();
    // Récupère les résultats de la requête sous forme d'objets
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $res; // Retourne les résultats
}

function getMovieByAge($age)
{
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);

    // Requête SQL pour récupérer les films filtrés par âge
    $sql = "SELECT name, image, id FROM Movie WHERE min_age <= :age";

    // Prépare la requête SQL
    $stmt = $cnx->prepare($sql);

    // Lie le paramètre d'âge à la valeur de la requête
    $stmt->bindParam(':age', $age, PDO::PARAM_INT);

    // Exécute la requête SQL
    $stmt->execute();

    // Récupère les résultats sous forme d'objets
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);

    return $res; // Retourne les films filtrés
}

function getDetail($id)
{
    $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT Movie.*, Category.name AS category
            FROM Movie
            JOIN Category ON Movie.id_category = Category.id
            WHERE Movie.id = :id";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_OBJ); // un seul film
    return $res;
}

function getMovieCategories($category){
    $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT Movie.id, Movie.name, image
            FROM Movie
            WHERE Movie.id_category = :category";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':category', $category, PDO::PARAM_INT); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $res;
}

function getMovieCategoriesByAge($category, $age){
    $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT Movie.id, Movie.name, image
            FROM Movie
            WHERE Movie.id_category = :category and min_age <= :age";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':category', $category, PDO::PARAM_INT); 
    $stmt->bindParam(':age', $age, PDO::PARAM_INT); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $res;
}


function getAllCategories() {
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    // Requête SQL pour récupérer les noms de toutes les catégories
    $sql = "SELECT id, name FROM Category";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $res;
}

function AddMovie($titre, $annee, $duree, $desc, $real, $cat, $image, $url, $rest) {
    $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);
    $sql = "INSERT INTO Movie (name, year, length, description, director, id_category, image, trailer, min_age) 
            VALUES (:titre, :annee, :duree, :description, :realisateur, :categorie, :image, :url, :restriction)";
    
    $stmt = $cnx->prepare($sql);

    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':annee', $annee);
    $stmt->bindParam(':duree', $duree);
    $stmt->bindParam(':description', $desc);
    $stmt->bindParam(':realisateur', $real);
    $stmt->bindParam(':categorie', $cat);  // Vérifie que `id_category` est bien envoyé
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':url', $url);
    $stmt->bindParam(':restriction', $rest);

    $stmt->execute();
    $res = $stmt->rowCount();
    return $res ;
}

function AddProfilMovie($name, $image, $rest) {
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);

    // Vérifier si un profil avec le même nom existe déjà
    $sql_check = "SELECT id_profil FROM Profil WHERE name = :name";
    $stmt_check = $cnx->prepare($sql_check);
    $stmt_check->bindParam(':name', $name);
    $stmt_check->execute();
    
    $id_profil = $stmt_check->fetchColumn();

    // Si le profil existe déjà, on le met à jour
    if ($id_profil) {
        $sql_update = "UPDATE Profil SET image = :image, year = :rest WHERE id_profil = :id";
        $stmt_update = $cnx->prepare($sql_update);
        $stmt_update->bindParam(':image', $image);
        $stmt_update->bindParam(':rest', $rest);
        $stmt_update->bindParam(':id', $id_profil);
        $stmt_update->execute();

        return 1; // Profil mis à jour
    }

    // Si le profil n'existe pas, on l'ajoute
    $sql_insert = "INSERT INTO Profil (name, image, year) VALUES (:name, :image, :rest)";
    $stmt_insert = $cnx->prepare($sql_insert);

    $stmt_insert->bindParam(':name', $name);
    $stmt_insert->bindParam(':image', $image);
    $stmt_insert->bindParam(':rest', $rest);

    $stmt_insert->execute();
    $res = $stmt_insert->rowCount(); 

    return $res;
}

function getProfils() {
    $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT id_profil, name, image, year FROM Profil";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $res;
}

function getProfil($id) {
    $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT * FROM Profil WHERE id_profil = :id";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}


function addFavori($id_profil, $id_film) {
    $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);
    $sql = "INSERT INTO Favori (id_profil, id) VALUES (:id_profil, :id_film)";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id_profil', $id_profil);
    $stmt->bindParam(':id_film', $id_film);
    return $stmt->execute();
}

function removeFavori($id_profil, $id_film) {
    $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);
    $sql = "DELETE FROM Favori WHERE id_profil = :id_profil AND id = :id_film";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id_profil', $id_profil);
    $stmt->bindParam(':id_film', $id_film);
    return $stmt->execute();
}

function getFavorisByProfil($id_profil) {
    $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT Movie.id, Movie.name, Movie.image
            FROM Favori 
            JOIN Movie ON Favori.id = Movie.id
            WHERE Favori.id_profil = :id_profil";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id_profil', $id_profil);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getFeaturedMovies() {
    $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT id, name, image FROM Movie WHERE featured = 1";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function searchMovies($value)
{
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT Movie.id, Movie.name, Movie.image, Movie.year, Movie.min_age, Movie.description, Movie.featured, Category.name
            FROM Movie
            INNER JOIN Category ON Movie.id_category = Category.id
            WHERE Movie.name LIKE :titre OR Category.name LIKE :titre OR year LIKE :titre";
    
    $stmt = $cnx->prepare($sql);
    $val = '%' . $value . '%';
    $stmt->bindParam(':titre', $val);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    
    return $res;
}

function updateStatus($id, $bool)
{
    $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);
    $sql = "UPDATE Movie SET featured = :bool WHERE id = :id";

    $stmt = $cnx->prepare($sql);
    $stmt->bindValue(':bool', $bool ? 1 : 0, PDO::PARAM_INT);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    return $stmt->execute(); // true si succès, false sinon
}
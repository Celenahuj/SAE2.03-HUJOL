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
    $sql = "select name, image, id from Movie";
    // Prépare la requête SQL
    $stmt = $cnx->prepare($sql);
    // Lie le paramètre à la valeur
    // Exécute la requête SQL
    $stmt->execute();
    // Récupère les résultats de la requête sous forme d'objets
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $res; // Retourne les résultats
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
            JOIN Category ON Movie.id_category = Category.id
            WHERE LOWER(Category.name) = LOWER(:category)";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':category', $category, PDO::PARAM_STR); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $res;
}

function getAllCategories() {
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    // Requête SQL pour récupérer les noms de toutes les catégories
    $sql = "SELECT name FROM Category";
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
    
        $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);
        $sql = "INSERT INTO Profil (name, image, min_age) 
                VALUES (:name, :image, :rest)";
        
        $stmt = $cnx->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':rest', $rest);

        $stmt->execute();
        $res = $stmt->rowCount();
        return $res;

    
}

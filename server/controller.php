<?php

/** ARCHITECTURE PHP SERVEUR  : Rôle du fichier controller.php
 * 
 *  Dans ce fichier, on va définir les fonctions de contrôle qui vont traiter les requêtes HTTP.
 *  Les requêtes HTTP sont interprétées selon la valeur du paramètre 'todo' de la requête (voir script.php)
 *  Pour chaque valeur différente, on déclarera une fonction de contrôle différente.
 * 
 *  Les fonctions de contrôle vont éventuellement lire les paramètres additionnels de la requête, 
 *  les vérifier, puis appeler les fonctions du modèle (model.php) pour effectuer les opérations
 *  nécessaires sur la base de données.
 *  
 *  Si la fonction échoue à traiter la requête, elle retourne false (mauvais paramètres, erreur de connexion à la BDD, etc.)
 *  Sinon elle retourne le résultat de l'opération (des données ou un message) à includre dans la réponse HTTP.
 */

/** Inclusion du fichier model.php
 *  Pour pouvoir utiliser les fonctions qui y sont déclarées et qui permettent
 *  de faire des opérations sur les données stockées en base de données.
 */
require("model.php");

function readmoviesController()
{
    $age = $_REQUEST['age'] ?? null;

    // Si un âge minimum est spécifié, on passe l'âge en paramètre à la fonction du modèle
    if ($age !== null) {
        $movies = getMovieByAge($age);
    } else {
        // Sinon, on récupère tous les films sans filtrage
        $movies = getMovie();
    }
    return $movies;
}

function readProfilsController() {
    return getProfils();
}

function readProfilController() {
    $id = $_REQUEST['id'] ?? null;
    if ($id === null) {
        return false; // ou retourne un message d'erreur explicite
    }

    return getProfil($id);
}

function readdetailController()
{
    $id = $_REQUEST['id'] ?? null;
    if (empty($id)) {
        return false;
    }
    return getDetail($id);
}

function readMovieCategorie()
{
    $category = $_REQUEST['category'] ?? null;
    if (empty($category)) {
        return false;
    }

    $age = $_REQUEST['age'] ?? null;
    if ( $age == null)
        return getMovieCategories($category);
    else
        return getMovieCategoriesByAge($category, $age);
}

function readAllCategories() {
    return getAllCategories();
  }

function addController() {
    $titre = $_REQUEST['name'];
    $annee = $_REQUEST['year'];
    $duree = $_REQUEST['length'];
    $desc = $_REQUEST['description'];
    $real = $_REQUEST['director'];
    $cat = $_REQUEST['id_category']; 
    $image = $_REQUEST['image'];
    $url = $_REQUEST['trailer'];
    $rest = $_REQUEST['min_age'];

    $ok = AddMovie($titre, $annee, $duree, $desc, $real, $cat, $image, $url, $rest);

    if ($ok != 0){
        return "Le film a été ajouté";
    }
    else {
        return "Erreur d'ajout";
    }
}

function addprofilController() {
    $name = $_REQUEST['name'];
    $image = $_REQUEST['image'];
    $rest = $_REQUEST['year'];

    if (empty($name) || empty($image) || empty($rest)) {
        return "Erreur : Tous les champs doivent être remplis.";
    }

    $ok = AddProfilMovie($name, $image, $rest);

    if ($ok == 1) {
        return "Le profil a été mis à jour";
    } elseif ($ok != 0) {
        return "Le profil a été ajouté";
    } else {
        return "Erreur d'ajout";
    }
}

function addFavoriController() {
    $id_profil = $_REQUEST['id_profil'] ?? null;
    $id_film = $_REQUEST['id'] ?? null;

    if (!$id_profil || !$id_film) return "Erreur : infos manquantes";

    $ok = addFavori($id_profil, $id_film);
    return $ok ? "Film ajouté aux favoris !" : "Déjà dans les favoris.";
}

function getFavorisController() {
    $id_profil = $_REQUEST['id_profil'] ?? null;

    if (!$id_profil) return "Erreur : profil manquant";

    return getFavorisByProfil($id_profil);
}


function removeFavoriController() {
    $id_profil = $_REQUEST['id_profil'] ?? null;
    $id_film = $_REQUEST['id'] ?? null;

    if (!$id_profil || !$id_film) return "Erreur : infos manquantes";

    $ok = removeFavori($id_profil, $id_film);
    return $ok ? "Film supprimé des favoris !": "Le film n'était pas dans les favoris.";
}

function getFeaturedMoviesController() {
    return getFeaturedMovies();
}

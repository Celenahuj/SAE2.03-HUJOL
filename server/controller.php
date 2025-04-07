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
$movies = getMovie();
return $movies;
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
    return getMovieCategories($category);
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

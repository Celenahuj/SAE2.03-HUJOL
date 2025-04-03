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

function addController() {
    var_dump($_REQUEST); // Vérifier les valeurs envoyées
    
    $titre = $_REQUEST['name'] ?? null;
    $annee = $_REQUEST['year'] ?? null;
    $duree = $_REQUEST['length'] ?? null;
    $desc = $_REQUEST['description'] ?? null;
    $real = $_REQUEST['director'] ?? null;
    $cat = $_REQUEST['id_category'] ?? null;  // Doit correspondre à une catégorie valide
    $image = $_REQUEST['image'] ?? null;
    $url = $_REQUEST['trailer'] ?? null;
    $rest = $_REQUEST['min_age'] ?? null;

    if (!$titre || !$annee || !$duree || !$desc || !$real || !$cat || !$image || !$url || !$rest) {
        return "Erreur : données manquantes !";
    }

    $ok = AddMovie($titre, $annee, $duree, $desc, $real, $cat, $image, $url, $rest);

    return ($ok) ? "Le film a été ajouté" : "Erreur d'ajout";
}
<?php
use modele\dao\Bdd;
use modele\dao\UtilisateurDAO;

/**
 * Contrôleur monProfil
 * Page d'affichage des caractéristiques d'un utilisateur
 * 
 * Vue contrôlée : vueMonProfil
 * Données GET : 
 * 
 * @version 07/2021 intégration couche modèle objet
 * @version 08/2021 gestion erreurs
 */


Bdd::connecter();

// Récupération des données GET, POST, et SESSION

// Récupération des données utilisées dans la vue 
// creation du menu burger
$menuBurger = array();
$menuBurger[] = array("url"=>"./?action=profil","label"=>"Consulter mon profil");
$menuBurger[] = array("url"=>"./?action=updProfil","label"=>"Modifier mon profil");
$menuBurger[] = array("url"=>"./?action=gestUtil" ,"label"=>"Gestion des utilisateurs");
$menuBurger[] = array("url"=>"./?action=gestCuisine" ,"label"=>"Gestion des types de cuisines");
$menuBurger[] = array("url"=>"./?action=liste","label"=>"Gestion de restaurant");

// Construction de la vue
$titre = "Mon profil";
if (isLoggedOn()){
    // Si un utilisateur est connecté
    // Données spécifiques à la page vueMonProfil
    $idU = getIdULoggedOn();
    $mailU = getMailULoggedOn();
    $util = UtilisateurDAO::getOneById($idU);   
    $mesRestosAimes = $util->getLesRestosAimes();
    $mesTypeCuisinePreferes = $util->getLesTypesCuisinePreferes();
    // Construction de la vue
    require_once "$racine/vue/entete.html.php";
    require_once "$racine/vue/vueMonProfil.php";
 }
else{
    // Si un aucun utilisateur n'est connecté
    // Construction de la vue
    ajouterMessage("Profil : aucun utilisateur n'est connecté");
    require_once "$racine/vue/entete.html.php";
}
require_once "$racine/vue/pied.html.php";

?>
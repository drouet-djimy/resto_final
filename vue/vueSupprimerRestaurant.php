<?php

use modele\dao\Bdd;
use modele\dao\UtilisateurDAO;
use modele_dao\RestoDAO;
/**
 * ----------
 * vueAccueil
 * ----------
 * 
 * * @version 07/2021 par NB : intégration couche modèle objet
 
 * Variables transmises par le contrôleur accueil contenant les données à afficher :
 * ---------------------------------------------------------------------------------  */
/** @var array $listeRestos : tableau d'objets métier de type Resto : les 4 restaurants les mieux notés en moyenne */
/**
 * Variables supplémentaires :  
   ------------------------- */
/** @var Resto  $unResto */
/** @var Photo  $laPhotoPrincipale */
/** @var TypeCuisine  $unTC */
?>
<div id="accroche">Supprimer un restaurant</div>
<div class="container_list">
    <table>
<?php 
    for ($i = 0; $i < count($listeRestos); $i++) { 
        $unResto = $listeRestos[$i];
        ?>
    <tr><td><input type="checkbox" name="lstidR[]" id="resto<?= $i ?>" value="<?= $unResto->getIdR() ?>" >
    <label for="resto<?= $i ?>"><?= $unResto->getNomR() ?></label></td>
    <td><button class="button_delete"><a class="supp" href='./?action=supprimerResto&idR=<?= $unResto->getIdR(); ?>'>Supprimer</a></button></td></tr>
    <?php 
    } ?> </table> </div>



<?php
/**
 * --------------
 * vueListeRestos
 * --------------
 * 
 * @version 07/2021 par NB : intégration couche modèle objet
 * @version 09/2021 par NC : remplace vueResultRecherche
* 
 * Variables transmises par le contrôleur listeRestos ou rechercheresto contenant les données à afficher : 
  ---------------------------------------------------------------------------------------- */
/** @var array $listeRestos les restaurants filtrés */
/**
 * Variables supplémentaires :  
  ------------------------- */
/** @var Resto $unResto */
/** @var array $lesTypesCuisineProposes */
/** @var array $lesPhotos */
/** @var Photo $unePhoto */
/** @var TypeCuisine $unTC */
/** @var util $util */

?>
<h1>Liste des restaurants <button class="ajout_resto"><a href="./?action=formulaireAjoutResto">AJOUTER</button></h1>


<?php
foreach ($listeRestos as $unResto) {
    $lesTypesCuisineProposes = $unResto->getLesTypesCuisineProposes();
    $lesPhotos = $unResto->getLesPhotos();
    ?>
    <div class="card">
        <div class="photoCard">
            <?php
            if (count($lesPhotos) > 0) {
                $unePhoto = $lesPhotos[0];
                ?>
                <img src="photos/<?= $unePhoto->getCheminP() ?>" alt="photo du restaurant" />
                <?php
            }
            ?>

        </div>
        <div class="descrCard">
            <a href="./?action=detail&idR=<?= $unResto->getIdR() ?>"><?= $unResto->getNomR() ?></a>
            <br />
            <?= $unResto->getNumAdr() ?>
            <?= $unResto->getVoieAdr() ?>
            <br />
            <?= $unResto->getCpR() ?>
            <?= $unResto->getVilleR() ?>
        </div>
        <div class="tagCard">
            <ul id="tagFood">
                <?php
                if($util != null) {
                    if($util->getAdminU()==1) { ?>
                        <a href="./?action=formulaireModifierResto&idR=<?= $unResto->getIdR() ?>"><button class="deleteUtil">Modifier</button></a>
                        <a href="./?action=supprimerResto&idR=<?= $unResto->getIdR() ?>"><button class="deleteUtil">Supprimer</button></a>
                        <?php
                    }
                }
                foreach ($lesTypesCuisineProposes as $unTC) {
                    ?>
                    <li class="tag"><span class="tag">#</span><?= $unTC->getLibelleTC() ?></li>
                    <?php
                } ?>
            </ul>
        </div>
    </div>
    <?php
}
?>

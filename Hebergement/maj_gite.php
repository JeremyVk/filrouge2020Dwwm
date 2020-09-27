<?php
include 'header_hebergement.php';
include "config_bdd_gite.php";

// Recuperation des donnes de formulaire
$id_maj = $_POST['id_maj'];
// Requette de recuperation de la ligne de la table correspondante
$req = $bdd->query("SELECT nom, localisation, id FROM gites WHERE id = $id_maj");
// execution de cete requette dans une bouche pour recuperer les donnees dans un tableau
while ($donnees = $req->fetch()) {
    // Enregistrement des données sous forme de variables
    $id_gite = $donnees['id'];
    $nom = $donnees['nom'];
    $localisation = $donnees['localisation'];
    
}
?>
<article class="article article_1">
    <h2>Modification des données</h2>
    <form action="maj_gite_traitement.php" class="form1" method="post">
        <div class="maj_form">
            <div class="input_form">
                
                <input type="hidden" name="id_gite" id="id_gite" readonly value=<?php echo $id_maj ?> >
                <br>

            </div>

            <div class="input_form">
                <label for="nom">Nom du gîte </label>
                <input type="text" name="nom" id="nom_gite" value="<?php echo $nom ?>">
            </div>


            <div class="input_form">
                <label for="localisation"> Localisation du gîte</label>
                <input type="text" name="localisation" id="localisation" value="<?php echo $localisation ?>">
            </div>








            <button type="submit" name="envoyer" class="btn btn-primary"> Mettre à jour</button>
        </div>



    </form>
</article>
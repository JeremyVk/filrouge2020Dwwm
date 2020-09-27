<?php 
include 'config_bdd_gite.php';
include 'functions_gite.php';
// Récupération des données du formulaire
$nom = valid_donnees($_POST['nom']);
$localisation = valid_donnees($_POST['localisation']);
$note = valid_donnees($_POST['note']);

// verification de la reception des données
/*
echo $nom;
echo $localisation;
echo $note;
*/

// Procedure d'enregistrement des données du formulaire dans la bdd
$req = $bdd->prepare("INSERT INTO gites (nom, localisation, note) VALUES (:nom, :localisation, :note)");

if ($req->execute(array(
    'nom' => $nom,
    'localisation' => $localisation,
    'note' => $note,
))){
    echo
    '<div class="alert-succes" role="alert">
        La news a bien été enregistrée<br>
        </div>';
    echo '<a href="gite.php">Retournez à la liste des tableaux</a>';
    
} else{
    echo 'Problème d\'enregistrement';

    // prise en charge des messages d'erreurs
    print_r($req->errorInfo());
}

?>
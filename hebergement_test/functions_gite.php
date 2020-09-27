<?php
function valid_donnees($donnees){
        // Supprime les espaces ou autres caractères en début ou fin de chaine
        $donnees = trim($donnees);
        // Supprime les antislashs d'une chaine
        $donnees = stripslashes($donnees);
        // Convertit les caractères spéciaux en entités HTML
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }
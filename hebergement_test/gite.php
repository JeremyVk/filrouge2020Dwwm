 
<?php 
 include 'header_hebergement.php';
?>
 <div class="main container-fluid">

     <h2>Les Gîtes dans le var</h2>

     <article class="article article_1 container">
         <h2>Le label écogîte<img class="leaf_icon" src="img/leaf.png" alt="feuille"></h2>
         <div class="container art-img"><img src="img/ecogite.jpg" alt=""></div>



         <p>Un hebergement Ecogite est un hébergement labellisé Gites de France conçu ou restauré selon des techniques ou matériaux reconnus comme ayant un faible impact environnemental. <br>
             Il répond à des exigences d'intégration par une architecture en cohérence globale avec l'environnement bâti ou naturel. Il a vocation à contribuer au respect ou à l'amélioration du paysage pré-existant.</p>
         <p><br> La prise en compte de ces critères techniques ne suffit pas: une démarche pédagogique d'écocitoyenneté doit aussi être engagée afin de sensibiliser les hôtes au respect de l'environnement et à sa protection.</p>
         <h2>Quelques gites présents dans le var</h2>

         <!--<table class="table table-bordered table-gite">
             <thead class="thead-light">
                 <th>Nom du gîte</th>
                 <th>Localisation</th>
                 <th>Notation</th>
             </thead>
             <tbody>
                 <tr>
                     <td>Ecogites du bivosque</td>
                     <td>Bivosque</td>
                     <td>
                         <img src="img/mini_leaf.png" alt="Mini logo feuille">
                         <img src="img/mini_leaf.png" alt="Mini logo feuille">
                         <img src="img/mini_leaf.png" alt="Mini logo feuille">
                         <img src="img/mini_leaf.png" alt="Mini logo feuille">
                         <img src="img/mini_leaf.png" alt="Mini logo feuille">
                     </td>
                      https://www.airbnb.fr/rooms/31353425?source_impression_id=p3_1598274342_vYWvmY3lcuxojC2r 
                     </tr>
                 <tr>
                     <td>Gite du var</td>
                     <td>Saint raphael</td>
                     <td>
                         <img src="img/mini_leaf.png" alt="Mini logo feuille">
                         <img src="img/mini_leaf.png" alt="Mini logo feuille">
                         <img src="img/mini_leaf.png" alt="Mini logo feuille">

                     </td>
                 </tr>
             </tbody>
         </table>  -->
         <table class="table table-bordered table-gite">
             <thead class="thead-light">
                 <th>Nom du gîte</th>
                 <th>Localisation</th>
                 <th>Notation</th>
             </thead>

             

                <?php
                include 'config_bdd_gite.php';
                // SELECTIONNE TOUT DANS LA BDD gites
                $req = $bdd->query('SELECT * FROM gites');
                // TANT QU'IL Y A DES DONNEES AFFICHE LES LIGNE PAR LIGNE DANS UN TABLEAU
                while ($donnees = $req->fetch()) {
                    // Enregistrement des données sous forme de variables
                    
                    $nom = $donnees['nom'];
                    $localisation = $donnees['localisation'];
                ?>

                 <tbody>
                     <tr>
                         <?php
                            // VARIABLE NOTE = DONNEES DANS LA TABLE NOTE
                            $note = $donnees['note'];
                            // Ceci est la petite feuille pour la notation 
                            $feuille = '<img src="img/mini_leaf.png" alt="Mini logo feuille">';
                            // MIX ENTRE HTML ET PHP, AFFICHE LES DONNEES DE LA CATEGORIE NOM
                            echo '<td>' . $nom . '</td>';
                            // MIX ENTRE HTML ET PHP, AFFICHE LES DONNEES DE LA CATEGORIE NOM
                            echo '<td>' . $localisation . '</td>';
                            echo '<td>' ?> <?php
                                            //  BOUCLE PERMETTANT D'AFFICHER UNE PETITE FEUILLE POUR CHAQUE INDENTATION DE NOTE
                                            for ($i = 1; $i <= $note; $i++) {
                                                echo $feuille;
                                            }
                                            '</td>';
                                        }
                            
                                            ?>
                     </tr>
                 </tbody>
         </table>

     </article>



     <article class="article article_1 container">
         <h2>Ajoutez vos Ecogites de la région !</h2>
         <p>Tous les Ecogîtes du Var ne sont pas encore répertoriés, aidés nous à compléter notre base de donnée !</p>
         <?php 
            include 'insert_gite.php';
         ?>
                                        
         
     </article>
 </div>

 <?php
    include 'footer.php';
    ?>
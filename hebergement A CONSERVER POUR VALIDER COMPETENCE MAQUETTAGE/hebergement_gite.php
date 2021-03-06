 <?php $url = $_SERVER['PHP_SELF'];

    if (stristr($url, 'terre')) {
        include "header_terre.php";
    } else if (stristr($url, 'mer')) {
        include "header_mer.php";
    } else if (stristr($url, 'hebergement')) {
        include "header_hebergement.php";
    } else if (stristr($url, 'activite')) {
        include "header_activite.php";
    }

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
         <table class="table table-bordered table-gite">
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
                     <!-- https://www.airbnb.fr/rooms/31353425?source_impression_id=p3_1598274342_vYWvmY3lcuxojC2r -->
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
         </table>
     </article>
 </div>

 <?php
    include 'footer.php';
    ?>
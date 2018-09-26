<div class="home-content container">
    <h1 class="title_parts">Votre Panier:</h1>


<?php
    $nombreArticles=0;
    $prixTotal=0;
    echo '<ul>';
    foreach ($tab_panier as $panier){
        $nombreArticles += 1;
        $prixTotal += $panier->get('prix');
        echo '<section>
                <li class="li_modele">
                    <div class="flex">
                       <h2>Article '.$nombreArticles.'</h2>
                       <a href="index.php?action=supprPanier&controller=panier&login='.$_SESSION['login'].'&idPanier='.$panier->get('idPanier').'"><img class="suppr" src="./assets/images/suppr.png" alt="erreur logo"></a>  
                    </div>
                    <img class="logo_marque" src="'.$panier->get('lienPhotoModeleClavier').'" alt="erreur logo">
                    <div class="desc_prod">
                        <h3>Touche Choisie: '.$panier->get('designation').'</h3>
                        <h3>Quantité: '.$panier->get('quantite').' unités</h3>    
                        <h3>Prix Total: '.$panier->get('prix').' €</h3>
                    </div>   
                </li>
            </section>';
    }
    echo '</ul>
    <h2 id="prix_total">Prix total du panier : '.$prixTotal.' € (TTC)</h2>';
?>    
</div>    



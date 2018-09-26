<div class="home-content container">
<?php
    echo '<h1 class="title_parts">Modèles '.$_GET["nomMarque"].'</h1>';
    echo '<ul>';
    foreach ($tab_modele as $modele){  
        echo '
                <li class="li_modele">
                    <a class="lien_modele" href=./index.php?action=read&controller=Modele&idModele='.$modele->get('idModele').'>  
                        <img class="logo_marque" src="'.$modele->get('lienPhotoModeleClavier').'" alt="erreur logo">
                        <div class="list_modeles">
                            <h4>Modèle '.$modele->get('nomModele').'</h4>
                        </div>
                        <div class="priceListModele">
                            <span>Prix '.$modele->get('prix').' € de base</span>
                        </div>           
                    </a>   
                </li>';        
    }
    echo'</ul>';  
?>
</div>
    
 
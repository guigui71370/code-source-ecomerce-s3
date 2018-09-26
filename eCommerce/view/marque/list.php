<div class="home-content container">
    <h1 class="title_parts">Marques de claviers</h1>
<?php
       echo '<ul>';     
       foreach ($tab_marque as $marque){             
           echo '
                <li class="li_marque">
                    <a class="liens_modeles" href=./index.php?action=readAllByMarque&controller=Modele&nomMarque='.$marque->get('nomMarque').'>   
                        <img class="logo_marque" src="'.$marque->get('logo').'" alt="erreur logo">
                        <div class="link_marque">       
                            <span>'.$marque->get('nombreModele').' modèles disponibles</span>
                        </div>    
                    </a>   
                </li>';               
       }
       echo'</ul>';
                
?>                  
</div>
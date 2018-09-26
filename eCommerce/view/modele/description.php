
<div class="home-content container">
<?php
    require File::build_path(array("model","ModelSymbole.php"));
    $tab_symbole = ModelSymbole::selectAll();
     
    echo '
        <div class="flex">
            <div class="desc1">
                <img class="img_desc" src="'.$modele->get('lienPhotoModeleClavier').'" alt="erreur logo">
            </div>
            <div class="desc2">
                <h2 class="padding-bottom-40">Modèle '.$modele->get('nomModele').'</h2>
                <h4 class="padding-bottom-20">Prix de base: '.$modele->get('prix').'€</h4>
                <p class="uppercase_none">'.$modele->get('descriptionModele').'</p>';
     
    if(Session::is_connected()==TRUE) {
       echo '   <form class="padding-bottom-20" action="index.php">  
                    <input class="none" name="action" value="add"> 
                    <input class="none" type="text" name="controller" value="Panier">        
                    <input class="none" type="text" name="login" value="'.$_SESSION["login"].'">
                    <input class="none" type="text" name="lienPhotoModeleClavier" value="'.$modele->get('lienPhotoModeleClavier').'">
                    <input class="none" type="text" name="prix" value="'.$modele->get('prix').'">
                    <label for="designation">Selectionnez votre touche</label>
                    <select name="designation" id="designation>';
                foreach ($tab_symbole as $symbole){  
                     echo '<option value="'.$symbole->get("designation").'">'.$symbole->get("designation").'</option>';
                }
                echo '</select>
                    <div>
                        <label for="quantite">Quantite</label> 
                        <input type="number" name="quantite" id="quantite" placeholder="1" min="1" max="100">
                    </div>
           
                    <input type="submit" value="Ajouter au panier" />
                </form>';
      }
      else{
           echo '<p class="width_50"> 
                    <a href="./index.php?action=needConnexion&controller=Panier">Ajouter au panier</a>';
      }
      echo '</div>
        </div>'            
?>
</div>




<div class="home-content container">
    
        <?php echo $ERROR;?>
    
    <form method="post"  action="<?php echo $action?>">
            <fieldset>
                <legend><?php echo $pagetitle;?> :</legend>
                 <p>
                 <input type='hidden' name='action' value=<?php if($verif==TRUE){echo '\'updated\'';}else{echo '\'created\'';} ?> />
                  <input type='hidden' name='controller' value='utilisateur'>
                   <label for="immat_id">login</label> :
                   <input <?php if($verif==TRUE){echo 'readonly';}else{echo 'required';} ?> type="text" placeholder="Ex : toto" name="login" id="immat_id"  value="<?php echo $login; ?>"/>
                  </p>
                  <p>
                   <label for="coul_id">nom</label> :
                   <input type="text" placeholder="Ex : dupont" name="nom" id="coul_id" required value="<?php echo $nom; ?>"/>
                  </p>
                  <p>
                   <label for="mar_id">prenom</label> :
                   <input type="text" placeholder="Ex : titi" name="prenom" id="mar_id" required value="<?php echo $prenom; ?>"/>
                  </p>
                  <p>
                       <label for="mar_id">mot de passe</label> :
                      <input type="password"   name="mot_de_passe" required >
                  </p>
                  <p>
                      <label for="mar_id">confirmer mot de passe</label> :
                      <input type="password"  name="CDmot_de_passe" required >
                  </p>
                  <p>
                       <label for="mar_id">email</label> :
                       <input type="email"  name="email"    value="<?php echo $email;?>" required  >
                  </p>
                            <?php echo $ok; ?>
                  <p>
                    <input type="submit" value="Envoyer" />
                  </p> 
            </fieldset> 
        </form>
    </div>
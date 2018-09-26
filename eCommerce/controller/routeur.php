<?php


require_once File::build_path(array("controller", "ControllerMarque.php"));
require_once File::build_path(array("controller", "ControllerModele.php"));
require_once File::build_path(array("controller", "ControllerError.php"));
require_once File::build_path(array("controller", "ControllerAccueil.php"));
require_once File::build_path(array("controller", "ControllerUtilisateur.php"));
require_once File::build_path(array("controller", "ControllerPanier.php"));
require_once File::build_path(array("lib","Session.php"));






              if(!Session::is_connected()){
                $_SESSION["footer"]='<li class=""><a href="index.php?action=create&controller=utilisateur">inscription</a></li>';
                $_SESSION["conection"]='<form class="form_connexion" method="post"  action="index.php?action=connected&controller=utilisateur" >
                    <fieldset class="fieldset_connexion">
                        <label for="pseudo"></label><input placeholder="Login" class="input_width" name="login" type="text" id="pseudo" />
                        <label for="motdepasse"></label><input placeholder="Password"class="input_width" type="password" name="motdepasse" id="password" />
                        <input type="submit" value="Ok" />
                    </fieldset>
                    </form>

                    ';
                
                
              }



if (!isset($_GET["action"]) && !isset($_GET["controller"])) { // On part du principe que il y a soit les deux arguments, soit aucun.
        ControllerAccueil::read();
}
else {

    $action=$_GET['action'];
    $nomController=$_GET['controller'];
    
    $class_methods=get_class_methods('Controller'.$nomController); // On récupère 
    
    if($class_methods == NULL) {
        ControllerError::error();
    }
    else {
        $controller="Controller".$nomController;
        if (in_array($action,$class_methods)) {
            $controller::$action();
            
        }
        else {
            $controller::error();
        }       
    }
}




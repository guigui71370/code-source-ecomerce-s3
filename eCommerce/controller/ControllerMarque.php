<?php

require File::build_path(array("model","Modelmarque.php"));

class ControllerMarque{
    
    protected static $object='marque';  
        
    public static function readAll() {
        $tab_marque = ModelMarque::selectAll();
        $view='list';
        $pagetitle='Liste des marques';
        $controller='marque';
        require File::build_path(array("view","view.php"));
    }
        
    public static function readAllAccueil() {
            $tab_marque = ModelMarque::selectAll();
            require File::build_path(array("view","marque","list.php"));
    }
    
    public static function error() {
       $view= 'error';
       $pagetitle='Erreur';
       $controller='marque';
       require File::build_path(array("view","view.php"));
    }
}

?>
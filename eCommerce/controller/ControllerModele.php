<?php

require File::build_path(array("model","ModelModele.php"));

class ControllerModele{
    
    protected static $object='modele';
    
    public static function readAll() {
        $tab_modele = ModelModele::selectAll();
        $view='list';
        $pagetitle='Liste des modèles';
        $controller='modele';
        require File::build_path(array("view","view.php"));
        
    }
    
    public static function readAllByMarque() {
        $tab_modele=ModelModele::readAllByMarque($_GET["nomMarque"]);
        $view='list';
        $pagetitle='Liste des modèles';
        $controller='modele';
        require File::build_path(array("view","view.php"));
    }
    
    public static function read() {
        $modele=ModelModele::select($_GET["idModele"]);
        $view='description';
        $pagetitle='modèle';
        $controller='modele';
        require File::build_path(array("view","view.php"));
    }
    
    public static function error() {
        $view='error';
        $pagetitle='error Modele';
        $controller='modele';
        require File::build_path(array("view","view.php"));
    }
    
    
}

<?php

require File::build_path(array("model","ModelPanier.php"));
require_once File::build_path(array("lib","Session.php"));

class ControllerPanier{
    
    protected static $object='panier';
    
    public static function add() {
       if(Session::is_user($_GET["login"])==TRUE){
        
        ModelPanier::add($_GET["login"], $_GET["lienPhotoModeleClavier"],$_GET["designation"], $_GET["quantite"], $_GET["prix"]);
        $view='ajout';
        $pagetitle='Ajout Panier';
        $controller='panier';
     
       
       } else {
           
        $view='error';
        $pagetitle='Ajout Panier';
        $controller='panier';
        $error="ereur 4017 vous n'avez pas accès a la comande voulus";   
       }
         require File::build_path(array("view","view.php"));
    }
    
    public static function needConnexion() {
        $view='needConnexion';
        $pagetitle='Demande de connexion';
        $controller='panier';
        require File::build_path(array("view","view.php"));
    }
    
    public static function readAllByLogin() {
        $tab_panier=ModelPanier::readAllByLogin();
        $view='list';
        $pagetitle='Votre Panier';
        $controller='panier';
        require File::build_path(array("view","view.php"));
    }
    
    public static function supprPanier() {
         if(Session::is_user($_GET["login"])==TRUE){
        ModelPanier::supprPanier();
        ControllerPanier::readAllByLogin();
        
         }else {
           
        $view='error';
        $pagetitle='Ajout Panier';
        $controller='panier';
        $error="ereur 4017 vous n'avez pas accès a la comande voulus";   
       }
    }

}


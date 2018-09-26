<?php

class ControllerAccueil {
    
    public static function read() {
       $view= 'accueil';
       $pagetitle='Accueil';
       $controller='accueil';
       require File::build_path(array("view","view.php"));        
    }
    
    
}


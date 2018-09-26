<?php

class ControllerError {
    
    
      
    public static function error() {
       $view= 'error';
       $pagetitle='Erreur Controller';
       $controller='error';
       require File::build_path(array("view","view.php"));
    }
    
}


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once  File::build_path(array("model","Model.php"));
class  ModelMarque extends Model{
       private $logo;
       private $nomMarque;
       private $idmarque;
       private $nombreModele;
       protected static $object='marque';
       protected static $primary='idMarque';
       
       
       
       public function __construct($idm=NULL,$nomM=NULL,$logo=NULL,$nombreModele=null) {
          if (!is_null($idm) && !is_null($nomM) && !is_null($logo) && !is_null($nombreModele)) {
           $this->nomMarque=$nomM;
           $this->idmarque=$idm;
           $this->logo=$logo;
           $this->nombreModele=$nombreModele;
          }
           
        }
       
       public function get($champs){
         return  $this->$champs;
       }
       
       
       public function getmarque() {
          
           
           
          return $this->nomMarque;
       }
       
       public function set($champs,$new){
           $this->$champs=$new;
       }
       
}
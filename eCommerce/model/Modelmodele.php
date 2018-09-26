<?php

require_once  File::build_path(array("model","Model.php"));
class  ModelModele extends Model{
    private $idModele;
    private $nomModele;
    private $idMarque;
    private $idType;
    private $lienPhotoModeleClavier;
 
    protected static $object='modele';
    protected static $primary='idModele';


    public function __construct($idModele=NULL,$nomModele=NULL,$idMarque=NULL,$idType=NULL,$lienPhotoModeleClavier=NULL) {
        if(!is_null($idModele) && !is_null($nomModele) && !is_null($idMarque) && !is_null($idType) && !is_null($lienPhotoModeleClavier)) {
            $this->idModele=$idModele;
            $this->nomModele=$nomModele;
            $this->idMarque=$idMarque;
            $this->idType=$idType;
            $this->lienPhotoModeleClavier=$lienPhotoModeleClavier;
        }
    }
    
    //public function __construct($idModele=NULL,$nomModele=NULL,$idMarque=NULL,$nomMarque=NULL,$idType=NULL,$lienPhotoModeleClavier=NULL)
           
    
           public function get($champs){
         return  $this->$champs;
       }
       
       

       
       public function set($champs,$new){
           $this->$champs=$new;
       }
       
     public static function readAllByMarque($nomMarque) {
         $sql="SELECT mo.idModele, mo.nomModele, mo.idMarque, mo.idType, mo.lienPhotoModeleClavier, ma.nomMarque FROM modele mo JOIN marque ma ON ma.idMarque=mo.idMarque WHERE ma.nomMarque='$nomMarque'";
         $req_prep = Model::$pdo->prepare($sql);

         $values = array("nom_tag" => $nomMarque);
         $req_prep->execute($values);

   
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelModele');
        $tab_modele = $req_prep->fetchAll();
        return $tab_modele;
         
     }
     
     
     
     
     
                
                
}
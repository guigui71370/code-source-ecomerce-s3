<?php

require_once  File::build_path(array("model","Model.php"));
class  ModelPanier extends Model{
    private $idPanier;
    private $login;
    private $lienPhotoModeleClavier;
    private $designation;
    private $quantite;
    private $prix;
    
    public function __construct($idPanier=NULL,$login=NULL,$lienPhotoModeleClavier=NULL,$designation=NULL,$quantite=NULL,$prix=NULL) {
        if(!is_null($idPanier) && !is_null($login) && !is_null($lienPhotoModeleClavier) && !is_null($designation) && !is_null($quantite) && !is_null(prix)) {
            $this->idPanier=$idPanier;
            $this->login=$login;
            $this->lienPhotoModeleClavier=$lienPhotoModeleClavier;
            $this->designation=$designation;
            $this->quantite=$quantite;
            $this->prix=$prix;
        }
    }
    public static function add ($login,$lienPhotoModeleClavier,$designation,$quantite,$prix) {
        $prixChange=ModelPanier::ajustPrice($designation,$prix,$quantite);
        $sql="INSERT INTO `panier` VALUES (NULL,:login,:lienPhotoModeleClavier,:designation,:quantite,:prix)";
        $req_prep = Model::$pdo->prepare($sql);

        $values = array("login" => $login,"lienPhotoModeleClavier" => $lienPhotoModeleClavier,"designation" => $designation,"quantite" => $quantite,"prix" => $prixChange);
        $req_prep->execute($values);
    }
    
    public static function ajustPrice($designation,$prix,$quantite) {
        $prixCourant=(int)$prix;
        $quantiteCourante=(int)$quantite;
        if ($designation == "Espace" || $designation =="Enter") {
            $prixCourant=($prixCourant)*2;
        }
        return (($prixCourant)*($quantiteCourante));
     }
     
     public static function readAllByLogin() {
         $login=$_SESSION["login"];
         $sql="SELECT * FROM panier WHERE login='$login'";
         $req_prep = Model::$pdo->prepare($sql);

         $values = array("login" => $login);
         $req_prep->execute($values);

   
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelPanier');
        $tab_panier = $req_prep->fetchAll();
        return $tab_panier;
     }
     
     public static function supprPanier() {
         $idPanier=$_GET["idPanier"];
         $sql="DELETE FROM panier WHERE idPanier=$idPanier";
         $req_prep = Model::$pdo->prepare($sql);

        $values = array("idPanier" => $idPanier);
        $req_prep->execute($values);
         
     }
     
     public function get($champs){
         return  $this->$champs;
     }
       
       

       
       public function set($champs,$new){
           $this->$champs=$new;
       }
    
    /*public static function getByDesignation($designation){
        $sql="SELECT * FROM symbole WHERE designation='$designation'";
         $req_prep = Model::$pdo->prepare($sql);

         $values = array("nom_tag" => $designation);
         $req_prep->execute($values);

   
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelPanier');
        $tab_symb = $req_prep->fetchAll();
        return $tab_symb;
    }*/
}


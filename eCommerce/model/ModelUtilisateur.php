<?php

require_once  File::build_path(array("model","Model.php"));


class ModelUtilisateur extends Model {
    protected static $object='utilisateur';
    protected static $primary='login';
    private $login;
    private $nom;
    private $prenom;
    private $mdp;
    private $admin;
    private $email;
    private $nonce;
    // Getter générique (pas expliqué en TD)
    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    // Setter générique (pas expliqué en TD)
    public function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }

    // un constructeur
    public function __construct($login = NULL, $nom = NULL, $prenom = NULL ,$mdp2=null,$adm=null,$email=null,$nonce=null) {
        if (!is_null($login) && !is_null($nom) && !is_null($prenom) && !is_null($prenom)&& !is_null($adm) && !is_null($email)) {
            $this->login = $login;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->mdp=$mdp2;
            $this->admin=$adm;
            $this->email=$email;
            $this->nonce=$nonce;
            
        }
    }

    // une methode d'affichage.
    /*public function afficher() {
        echo "Utilisateur {$this->prenom} {$this->nom} de login {$this->login}";
    }*/

   /* public static function getAllUtilisateurs() {
        try {
            $pdo = Model::$pdo;
            $sql = "SELECT * from utilisateur";
            $rep = $pdo->query($sql);
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
            return $rep->fetchAll();
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }*/
    
    public function save(){
        $sql="INSERT INTO utilisateur (login, nom, prenom,mdp,email,nonce   ) VALUES (:im,:ma,:co,:md,:email,:nonce)";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
        "im" => $this->login,
        "ma" => $this->nom,
        "co" => $this->prenom,
         "md"=> $this->mdp,
         "email"=> $this->email,
           "nonce"=> $this->nonce
        //nomdutag => valeur, ...
            );
        
        $req_prep->execute($values);
        
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
    }
    
    
    public static function checkPassword($login,$mot_de_passe_chiffre){
        
        $sql = "SELECT * from utilisateur WHERE login=:nom_tag and  mdp=:mdp";
        $req_prep = Model::$pdo->prepare($sql);
        
        $values = array(
        
        "nom_tag" => $login
         ,"mdp"=>$mot_de_passe_chiffre       
        //nomdutag => valeur, ...
    );
         $req_prep->execute($values);
         $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
         $test=$req_prep->fetchAll();
         
         if(count($test)==0){
            
             return false;
         }else{
             return true;
         }
         
         
    }
    
    
    
    
    
     
     public static function checknonce($login){
        
        $sql = "SELECT * from utilisateur WHERE login=:nom_tag and nonce is null";
        $req_prep = Model::$pdo->prepare($sql);
        
        $values = array(
        
        "nom_tag" => $login
         
        //nomdutag => valeur, ...
    );
         $req_prep->execute($values);
         $req_prep->setFetchMode(PDO::FETCH_NUM);
         $test=$req_prep->fetchAll();
          
         
         
         if(count($test)==0){
            
             return false;
         }else{
             return true;
         }
         
         
    }
    public static function checknonce2($login,$nonce){
        $sql = "SELECT * from utilisateur WHERE login=:nom_tag and nonce=:nonce";
        $req_prep = Model::$pdo->prepare($sql);
        
        $values = array(
        
        "nom_tag" => $login,
         "nonce"=> $nonce
        //nomdutag => valeur, ...
        );
         $req_prep->execute($values);
         $req_prep->setFetchMode(PDO::FETCH_NUM);
         $test=$req_prep->fetchAll();
       
         
         
         if(count($test)==0){
            
             return false;
         }else{
             return true;
         }
    }
    
    public static function validation($login){
        $sql= "UPDATE utilisateur SET nonce=DEFAULT WHERE login=:im";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "im" => $login 
        //nomdutag => valeur, ...
         );
         
        $req_prep->execute($values);
        
        
    }
    
    
    
    
        public static function LoginExist($login){
        
        $sql = "SELECT * from utilisateur WHERE login=:nom_tag";
        $req_prep = Model::$pdo->prepare($sql);
        
        $values = array(
        
        "nom_tag" => $login
            
        //nomdutag => valeur, ...
    );
         $req_prep->execute($values);
         $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
         $test=$req_prep->fetchAll();
         
         if(count($test)==0){
            
             return false;
         }else{
             return true;
         }
         
         
    }
}
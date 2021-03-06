<?php
// On inclut les fichiers de classe PHP avec require_once
// pour éviter qu'ils soient inclus plusieurs fois
require File::build_path(array("config","conf.php"));
class Model {
   
  public static $pdo;

  public static function Init(){
    $login = Conf::getLogin();
    $hostname = Conf::getHostname();
    $database_name = Conf::getDatabase();
    $password = Conf::getPassword();
    
    
    // Connexion à la base de données            
    // Le dernier argument sert à ce que toutes les chaines de caractères 
    // en entrée et sortie de MySql soit dans le codage UTF-8
 /* self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password,
                      array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));*/

    // On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
    /*self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/
    
    try {
        self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password,
                      array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

     // On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
          if (Conf::getDebug()) {
             echo $e->getMessage(); // affiche un message d'erreur
         } else {
             echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
         }
        die();
    }
  }
    /*
    try{
      $pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password);
    }catch(PDOExecption $e){
      echo $e -> getMessage(); // affiche un message d'erreur
      die();
    }
  return $pdo;    // variable statique --> syntaxe: Type::$nom_var
  }
  */
  
  
  
  
  
  public static function selectAll(){
        $table_name=static::$object;
        $class_name='Model'. ucfirst($table_name);

        $rep=Model::$pdo->query('select * from '.$table_name);
          
        $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $tab_objet = $rep->fetchAll();
                
        
        
        
        
        
        return $tab_objet;
  }
  
  
  
    public static function select($primary_value) {
        $table_name=static::$object;
        $class_name='Model'. ucfirst($table_name);
        $primary_key= static::$primary;

    $sql = "SELECT * from ".$table_name." WHERE ".$primary_key."=:nom_tag";
    // Préparation de la requête
    

    $req_prep = Model::$pdo->prepare($sql);

    $values = array(
        
        "nom_tag" => $primary_value
        //nomdutag => valeur, ...
    );
    // On donne les valeurs et on exécute la requête	 
    $req_prep->execute($values);
    
    // On récupère les résultats comme précédemment
    $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
    $tab_voit = $req_prep->fetchAll();
    // Attention, si il n'y a pas de résultats, on renvoie false
    if (empty($tab_voit))
        return false;
    
        return $tab_voit[0];
    }
    
    public static function delete($primary){
        $table_name=static::$object;
        $class_name='Model'. ucfirst($table_name);
        $primary_key= static::$primary;
        
        
        
        $sql="DELETE FROM " .$table_name." WHERE ".$table_name.".".$primary_key."= (:im)";
        $req_prep = Model::$pdo->prepare($sql);
        
        $values = array(        
            "im" => $primary
        //nomdutag => valeur, ...
        );
        $req_prep->execute($values);
    }
    
    
    
    
    
    
    public static function update($data){
        $table_name=static::$object;
        $class_name='Model'. ucfirst($table_name);
        $primary_key= static::$primary;   
            
        $sql="UPDATE ".$table_name." SET ";
        foreach ($data as $cle => $valeur){
        	if(isset($data[$cle])){
        		$sql=$sql." ".$cle."=:".$cle.",";

        	}
        	if($cle==$primary_key){
        		$value=$cle;
        	}
        	
        	
        }
        $sql=rtrim($sql,",");
        //$sql=$sql." marque =:ma , couleur=:co";   
        
        $sql=$sql." WHERE ".$table_name.".".$primary_key."=:".$value."; ";
        $req_prep = Model::$pdo->prepare($sql);
      
        $req_prep->execute($data);

       
    }
}
Model::Init();
?>

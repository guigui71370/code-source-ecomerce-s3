<?php
require_once File::build_path(array("controller", "ControllerAccueil.php"));
require File::build_path(array("model","ModelUtilisateur.php"));
require_once File::build_path(array("lib","Security.php"));
require_once File::build_path(array("lib","Session.php"));
require_once  File::build_path(array("model","Modelmarque.php"));


class  ControllerUtilisateur {
    //protected static;
    
    private $mail;
    
    
    public static function readAll() {
        $mot_passe_en_clair = 'apple';
        $mot_passe_chiffre = Security::chiffrer($mot_passe_en_clair);
        
        
        
        
        
        $tab_v = ModelUtilisateur::selectAll();   //appel au modèle pour gerer la BD
      //  require ('../view/utilisateur/list.php');  //"redirige" vers la vue
         $controller='utilisateur';
         $view='list';
         $pagetitle='Liste des utilisateurs';
        require File::build_path(array("view","view.php"));
        
    }
    public static function read(){
        $test=$_GET["login"];
        $user= ModelUtilisateur::select($test);
        if($user==false){
            //require ('../view/voiture/error.php');
             $controller='utilisateur';
            $pagetitle='detail voiture de la voiture';
             $view='error';
            require File::build_path(array("view","view.php"));
        } else {
            //require ('../view/voiture/detail.php');
            $controller='utilisateur';
            $pagetitle='detail de l\'utilsateur '.$test;
            $view='detail';
            require File::build_path(array("view","view.php"));
        }  
    }
    
    public static function delete(){
        $test=$_GET["login"];
       if(Session::is_user($_GET["login"])) {
        
        ModelUtilisateur::delete($test);
        $controller='utilisateur';
        $pagetitle='suprimer une voiture';
        $view='deleted';
        $tab_v= ModelUtilisateur::selectAll();
        session_destroy();
        setcookie(session_name(),'',time()-1);
        require File::build_path(array("view","view.php"));
       }else{
           ControllerAccueil::read();
       }

    }
    
    
    
    
    public static function created(){
       if(Session::is_user("")==FALSE ) {
        $z=filter_var($_POST["email"],FILTER_VALIDATE_EMAIL,FILTER_FLAG_PATH_REQUIRED);
        $oklogin= ModelUtilisateur::LoginExist($_POST['login']);
            if($_POST['mot_de_passe']==$_POST['CDmot_de_passe'] && $z==TRUE && $oklogin==FALSE){
               $nonce= Security::generateRandomHex();
              $v=new ModelUtilisateur($_POST['login'], $_POST['nom'],$_POST['prenom'],Security::chiffrer($_POST['mot_de_passe']),'0',$_POST['email'],$nonce);
              
              $v->save();
              $controller='utilisateur';
              $pagetitle='Utilisateur crée(e)';
              $view='created';
              
              
              
              $lien='http://webinfo.iutmontp.univ-montp2.fr/~decarvalhog/eCommerce/index.php?action=validate&controller=utilisateur&login='.$v->get("login").'&nonce='.$v->get('nonce');
              $mail=ControllerUtilisateur::mailpaterne($lien);
              $to = $v->get("email");
              $subject = 'mail de validation';
              mail($to, $subject, $mail);
                
              $tab_v= ModelUtilisateur::selectAll(); 
              require File::build_path(array("view","view.php"));  
       
            }else{
                 echo 'error';
                $controller='utilisateur';
                $pagetitle='Utilisateur crée(e)';
                $view='update';
                $verif=FALSE;   
               $login="";
               $nom="";
               $prenom="";
               $email="";
               $ok=" ";
               $ERROR=" ";
                
                
                
                
                $ERROR="error";
                 
                require File::build_path(array("view","view.php"));  
               
            }
        
       }
    }   
      
    public static function create(){
        //require ('../view/voiture/create.php');
        if(Session::is_user("")==FALSE) {    
        $pagetitle='inscription';
        $view='update';
         $controller='utilisateur'; 
         $verif=FALSE;   
         $login="";
         $nom="";
         $prenom="";
         $email="";
         $ok=" ";
         $ERROR=" ";
         $action='index.php?action=created&controller=utilisateur';
        require File::build_path(array("view","view.php"));
        }
      }
      

    
    
     public static function update(){
         $test=$_GET["login"];
          if(Session::is_user($_GET["login"]) || Session::is_admin()==TRUE) {
         $v= ModelUtilisateur::select($test);
         $controller='utilisateur';
         $verif=TRUE;
         $login=$v->get('login');
         $nom=$v->get('nom');
         $prenom=$v->get('prenom');
         $email=$v->get('email');
         $pagetitle='modifier un utilisateur';
         $view='update';
         $action='index.php?action=updated&controller=utilisateur';
          $ERROR=" ";
         if(Session::is_admin()==TRUE){
              $ok ='<input type="checkbox" id="subscribeNews" name="admin" value="1">';
         }else{
              $ok=" ";
         }      
         require File::build_path(array("view","view.php"));
          } else {
              ControllerAccueil::read();
          }
          
    }
     
     public static function updated(){
         
         if(Session::is_user($_POST["login"])|| Session::is_admin()==TRUE) {
         
         $z=filter_var($_POST["email"],FILTER_VALIDATE_EMAIL,FILTER_FLAG_PATH_REQUIRED);
         if($_POST['mot_de_passe']==$_POST['CDmot_de_passe'] && $z=TRUE){
             
         
         ModelUtilisateur::update(array("login"=>$_POST['login'],"nom"=>$_POST['nom'],"prenom" =>$_POST['prenom'],"mdp"=>Security::chiffrer($_POST['mot_de_passe']),"admin"=>$_POST['admin'],"email"=>$_POST["email"]));
         

         $controller='utilisateur';
         $pagetitle=' user';
         $view='updated';
         $tab_v= ModelUtilisateur::selectAll();
         require File::build_path(array("view","view.php"));
         }else{
             echo 'error';
             ControllerUtilisateur::update();
         }
         
       } else {
              ControllerAccueil::read();
          }
     }
     
     
     
    public static function  connected(){
         $controller='utilisateur';
         $pagetitle=' user';
         $view='connected';
         $login=$_POST['login'];
         $mot_passe_en_clair=$_POST['motdepasse'];
         $reponc;
         
        
         $mot_passe_chiffre = Security::chiffrer($mot_passe_en_clair);
        
         $test=ModelUtilisateur::checkPassword($login,$mot_passe_chiffre);
         
         if($test==TRUE){
             $ok= ModelUtilisateur::checknonce($login);
             print_r($ok);
             
            if($ok==TRUE){
                print_r($ok);
             $_SESSION['login']=$login; 
             
             

             
            
             $user = ModelUtilisateur::select($_SESSION['login']);
             $_SESSION['admin']=$user->get("admin");
             ControllerUtilisateur::footer();
             $reponc="<p>connexion réussie</p>";
              
         } else {
             $tab_marque = ModelMarque::selectAll();
             $reponc="<p>Veuillez valider votre compte par adresse mail</p>";
         }
         
        } else {
             $reponc="<p>Mot de Passe ou Login incorrect</p>";
             $tab_marque = ModelMarque::selectAll();
        }
        
        require_once File::build_path(array("model","ModelModele.php"));
        $tab_marque = ModelMarque::selectAll();
        
         
          
          require File::build_path(array("view","view.php"));
     }
     public static function deconnect(){
         $_SESSION['login']='';
          ControllerUtilisateur::footer();
         session_destroy();
         setcookie(session_name(),'',time()-1);
         ControllerAccueil::read();
     } 
     
      public static function error(){
            $controller='utilisateur';
            $pagetitle='detail voiture de la voiture';
             $view='error';
            require File::build_path(array("view","view.php"));
      }
     
      
      
      
      
      public static function validate(){
          $ok=ModelUtilisateur::checknonce2($_GET['login'], $_GET['nonce']);
       
          
         
          if($ok==TRUE){
              
              ModelUtilisateur::validation($_GET['login']);
               $controller="accueil";
               $pagetitle="accueil";
                $view="accueil";
                
              
          } 
          else {
              $controller='utilisateur';
              $pagetitle=" lien de validation d'utilisateur incorècte ou iconnu";
              $view='error';
              
          }
          
          require File::build_path(array("view","view.php")); 
          
      }
      
      
      
      public static function mailpaterne($lien){
          
          return  $message = '
            Merci d’avoir crée votre compte utilisateur sur notre site ToucheLand.
            
            Pour pouvoir continuer à naviguer avec votre compte, veuillez le valider ci-dessous :
            '.$lien.'

            En vous souhaitant une bonne visite sur notre site,
            Toute l’équipe de conception.
';
          
      }
      
      public static function footer(){
              if(Session::is_connected()){
                $_SESSION["footer"]='<li class=""><a href="index.php?action=read&controller=utilisateur&login='.$_SESSION['login'].'">profil</a></li>'
                        .'<li class=""><a href="index.php?action=deconnect&controller=utilisateur">logout</a></li>';
                
                $_SESSION["conection"]='<form class="form_connexion" method="get">
                            <a href="index.php?action=readAllByLogin&controller=panier&login='.$_SESSION['login'].'">
                                    <img style="margin-top: -19px" src="http://webinfo.iutmontp.univ-montp2.fr/~decarvalhog/eCommerce/assets/images/ico-panier.png" alt="ToucheLand" />
                            </a>
                      </form>';
                
                if(Session::is_admin()== TRUE){
                           $_SESSION["footer"]= $_SESSION["footer"].'<li class=""><a href="index.php?action=readAll&controller=utilisateur">liste utilisateur</a></li>';
                }
                
                
                
                
                
                }
                else {
             $_SESSION["footer"]='<li class=""><a href="index.php?action=create&controller=utilisateur">inscription</a></li>';
             $_SESSION["conection"]='<form class="form_connexion" method="post"  action="index.php?action=connected&controller=utilisateur" >
                    <fieldset class="fieldset_connexion">
                        <label for="pseudo"></label><input placeholder="Login" class="input_width" name="login" type="text" id="pseudo" />
                        <label for="motdepasse"></label><input placeholder="Password"class="input_width" type="password" name="motdepasse" id="password" />
                        <input type="submit" value="Ok" />
                    </fieldset>
                    </form>

                    ';
            }
      }
      
}

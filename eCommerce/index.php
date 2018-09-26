<?php
//require_once '/home/ann2/decarvalhog/public_html/eCommerce/lib/File.php';
session_set_cookie_params(6000);
session_start();


    $ROOT_FOLDER = __DIR__;
    $DS = DIRECTORY_SEPARATOR;
    require_once $ROOT_FOLDER.$DS."lib".$DS."File.php";
    require File::build_path(Array("controller","routeur.php"));
    
    
    

?>
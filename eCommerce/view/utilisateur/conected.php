<div class="home-content container">
<?php
if($test==true && empty ($ok)){
    echo  $reponc;
    require_once File::build_path(array("view","utilisateur","detail.php"));
}else{
    
    echo $reponc;
    require_once File::build_path(array("view","marque","list.php"));
}
?>
</div>

      
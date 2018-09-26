<div class="home-content container">
<?php
if($test==true && $ok==TRUE){
    echo  $reponc;
    
    require File::build_path(array("view","marque","list.php"));
}else{
    
    echo $reponc;
    require File::build_path(array("view","marque","list.php"));
}
?>
</div>

      
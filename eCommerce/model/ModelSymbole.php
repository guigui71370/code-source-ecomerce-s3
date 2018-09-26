<?php

class ModelSymbole extends Model{
    
    private $idSymbole;
    private $designation;
    private $Localisation;
    
    protected static $object='symbole';
    protected static $primary='idSymbole';
    
    public function __construct($idSymbole = NULL, $designation = NULL, $Localisation = NULL) {
        if (!is_null($idSymbole) && !is_null($designation) && !is_null(Localisation)) {
            $this->idSymbole=$idSymbole;
            $this->designation=$designation;
            $this->Localisation=$Localisation;
        }
        else {
            if (!is_null($idSymbole) && !is_null($designation) && is_null(Localisation)) {
                $this->idSymbole=$idSymbole;
                $this->designation=$designation;
                $this->Localisation="";
            }
        }
    }
    
    
    public function get($attribut) {
        return $this->$attribut;
    }
    
    public function set(){
    }
    
            
}
?>


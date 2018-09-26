<?php

class Security{
    
    
private static $seed = 'zn0MPQH0oiCbB5G';

static public function getSeed() {
   return self::$seed;
}  
  public static function chiffrer($texte_en_clair) {
        $test=Security::getSeed();
      $texte_chiffreniv1 = $test.$texte_en_clair;
       $texte_chiffre = hash('sha256', $texte_chiffreniv1);
         
        return $texte_chiffre;
}


public static function generateRandomHex() {
  // Generate a 32 digits hexadecimal number
  $numbytes = 16; // Because 32 digits hexadecimal = 16 bytes
  $bytes = openssl_random_pseudo_bytes($numbytes); 
  $hex   = bin2hex($bytes);
  return $hex;
}


        
}

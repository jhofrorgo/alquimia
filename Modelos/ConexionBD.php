<?php
class ConexionBD{
    static public function cBD(){
        $bd = new PDO(
        	"mysql:host=localhost;dbname=bar","root","");
        $bd -> exec("set names utf8");

        return $bd;
        
    }
}

?>
<?php

require_once "Controladores/PlantillaC.php";

require_once "Controladores/UsuariosC.php";
require_once "Modelos/UsuariosM.php";

require_once "Controladores/mesasC.php";
require_once "Modelos/mesasM.php";

$plantilla = new Plantilla();
$plantilla -> LLamarPlantilla();
?>
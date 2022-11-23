<?php

require_once "Controladores/PlantillaC.php";

require_once "Controladores/UsuariosC.php";
require_once "Modelos/UsuariosM.php";

require_once "Controladores/mesasC.php";
require_once "Modelos/mesasM.php";

require_once "Controladores/categoriasC.php";
require_once "Modelos/categoriasM.php";

require_once "Controladores/comidasC.php";
require_once "Modelos/comidasM.php";

require_once "Controladores/ordenesC.php";
require_once "Modelos/ordenesM.php";

$plantilla = new Plantilla();
$plantilla -> LLamarPlantilla();
?>
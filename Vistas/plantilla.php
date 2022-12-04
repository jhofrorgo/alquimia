<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Alquimia Software</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://localhost/alquimia/Vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/alquimia/Vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://localhost/alquimia/Vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/alquimia/Vistas/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="http://localhost/alquimia/Vistas/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="http://localhost/alquimia/Vistas/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="http://localhost/alquimia/Vistas/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="http://localhost/alquimia/Vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="http://localhost/alquimia/Vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="http://localhost/alquimia/Vistas/select2/css/select2.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-red-light sidebar-mini login-page">


    <?php

      session_start();
      if(isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true){
        echo '<div class="wrapper"> ';
              include "modulos/cabecera.php";
              include "modulos/menu.php";

              if(isset($_GET["url"])){
                $url = $_GET["url"];
                if($url == "Inicio" || $url == "Salir" || $url == "Perfil" || $url == "Usuarios" || 
                  $url == "Categorias" || $url == "Comidas" || $url == "Editar-Comida" 
                  || $url == "Mesa" || $url == "Orden"){
                  include "modulos/".$url.".php";
                }
              }else{
                include "modulos/Inicio.php";
              }

        echo "</div>";
        //echo '<div class="content-wrapper"></div></div>';
      }else{
        include "modulos/ingresar.php";

      }
    ?>


  

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="http://localhost/alquimia/Vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="http://localhost/alquimia/Vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="http://localhost/alquimia/Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="http://localhost/alquimia/Vistas/bower_components/raphael/raphael.min.js"></script>
<script src="http://localhost/alquimia/Vistas/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="http://localhost/alquimia/Vistas/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="http://localhost/alquimia/Vistas/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="http://localhost/alquimia/Vistas/bower_components/moment/min/moment.min.js"></script>
<script src="http://localhost/alquimia/Vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="http://localhost/alquimia/Vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Slimscroll -->
<script src="http://localhost/alquimia/Vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://localhost/alquimia/Vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/alquimia/Vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="http://localhost/alquimia/Vistas/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://localhost/alquimia/Vistas/dist/js/demo.js"></script>
<script src="http://localhost/alquimia/Vistas/sweetalert2/sweetalert2.all.js"></script>
<script src="http://localhost/alquimia/Vistas/select2/js/select2.js"></script>
<script src="http://localhost/alquimia/Vistas/js/categorias.js"></script>
<script src="http://localhost/alquimia/Vistas/js/comidas.js"></script>
<script src="http://localhost/alquimia/Vistas/js/ordenes.js"></script>
<script src="http://localhost/alquimia/Vistas/js/usuarios.js"></script>
<script src="http://localhost/alquimia/Vistas/js/perfil.js"></script>
<script src="http://localhost/alquimia/Vistas/js/tooltip.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.11/dist/sweetalert2.all.min.js"></script>-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->

</body>
</html>

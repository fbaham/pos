<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de Inventario</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!--==================
  PLUGINS DE CSS
  ===================-->
  <link rel="icon" href="views/img/template/icono-negro.png">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="views/dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Estilos propios -->
  <link rel="stylesheet" href="views\css\styles.css">
  <!--==================
  PLUGINS DE JAVASCRIPT
  ===================-->
  <!-- jQuery 3 -->
  <script src="views/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="views/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="views/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.min.js"></script>

</head>
<!--==================
CUERPO DOCUMENTO
===================-->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">

  <?php
  if(isset($_SESSION["Login"]) && $_SESSION["Login"] == "ok"){
    // Site wrapper
    echo "<div class='wrapper'>";
    include "modules/header.php";

    include "modules/sidebar-menu.php";
    //CONTENIDO
    if(isset($_GET["path"])){
      if($_GET["path"] == "home"||
         $_GET["path"] == "users"||
         $_GET["path"] == "categories"||
         $_GET["path"] == "products"||
         $_GET["path"] == "clients"||
         $_GET["path"] == "sales"||
         $_GET["path"] == "create-sale"||
         $_GET["path"] == "reports"){
        include "modules/".$_GET["path"].".php";
      } else {
        include "modules/404.php";
      }
    } else {
      include "modules/home.php";
    }

    include "modules/footer.php";
    echo "</div>";
    // ./wrapper
  } else {
    include "modules/login.php";
  }
  ?>

  <!-- =============================================== -->



<script type="text/javascript" src="views/js/template.js"></script>
</body>
</html>

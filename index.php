<?php

require_once "controllers/template.controller.php";
require_once "controllers/users.controller.php";
require_once "controllers/categories.controller.php";
require_once "controllers/products.controller.php";
require_once "controllers/clients.controller.php";
require_once "controllers/sales.controller.php";

require_once "controllers/users.model.php";
require_once "controllers/categories.model.php";
require_once "controllers/products.model.php";
require_once "controllers/clients.model.php";
require_once "controllers/sales.model.php";


$template = new ControllerTemplate();
$template -> ctr_template();
?>

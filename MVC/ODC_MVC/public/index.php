<?php
// ( / ) OR ( \ )
define("DS",DIRECTORY_SEPARATOR);
// c:\xampp\htdocs\MVC
define("ROOT",dirname(__DIR__));
define("APP",ROOT.DS."app");
define("CONFIG",APP.DS."config");
define("CORE",APP.DS."core");
define("MODELS",APP.DS."models");
define("VIEW",APP.DS."views");
define("CONTROLLERS",APP.DS."controllers");


require_once("../vendor/autoload.php");

$app = new MVC\core\app();
<?php

session_start();
$_SESSION['usuarioLogin'];
session_destroy();
header("Location: /projeto-horus/www/index.php");
exit();
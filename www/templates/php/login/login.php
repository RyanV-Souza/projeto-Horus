<?php
session_start();
$link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

if(empty($_POST['usuario']) || empty($_POST['senha'])){
    header("Location: /projeto-horus/www/index.php");
    exit();
};

$usuario = mysqli_real_escape_string($link, $_POST['usuario']);
$senha = mysqli_real_escape_string($link, $_POST['senha']);

$query = "select * from tb_usuario where cd_rmUsuario = $usuario and ds_senha = MD5('$senha')";
$result = mysqli_query($link, $query);

$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['usuarioLogin'] = $usuario;
    header('Location: /projeto-horus/www/menuUsuario.php');
    exit();
} else {
    header("Location: /projeto-horus/www/index.php");
    exit();
}
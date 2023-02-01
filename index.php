<?php
include('head.php');
$page = (isset($_GET['pagina']))? $_GET['pagina'] : 'home';
switch ($page) {

    case ('home') : require_once("home.php"); break;

    case ('galeria') : require_once("galeria.php"); break;
    case ('empresa') : require_once("empresa.php"); break;
    case ('contato') : require_once("contato.php"); break;
    case ('servicos') : require_once("servicos.php"); break;
    case ('msg') : require_once("msg.php"); break;


    default: { require_once('home.php'); break; }
}
include('footer.php');
?>
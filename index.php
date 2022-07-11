<?php
//Inicia Sessão:
session_start();
include("includes/conexao.php");
include("classes/ExibeDados.php");
$Exibe = new Exibe();

//Chamando o header do projeto:
include("includes/header.php");

//Chamando o menu do projeto:
include("includes/menu.php");

//Recebe via GET o parametro "page" para chamar a página solicitada:
switch($_GET['page']){

    case 'index':       require_once("pages/inicio.php"); break;
    case 'cadUsuario':  require_once("pages/cadastroUser.php"); break;
    case 'cadCliente':  require_once("pages/cadastroCliente.php"); break;
    case 'intranet':    require_once("pages/intranet.php"); break;

    default: require_once("pages/inicio.php");
}

//Chama o rodapé da página:
include("includes/footer.php");


?>
<?php

include("../includes/conexao.php");
include("../classes/Usuario.php");

$id = $_GET['id'];

$Usuario = new Usuario();

$Usuario->excluirAcesso($id);

echo " <script>alert('Usuário excluído!');window.location.href= '..\?page=intranet';</script> ";
?>
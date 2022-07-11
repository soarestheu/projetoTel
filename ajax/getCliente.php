<?php

include("../includes/conexao.php");
include("../classes/Cliente.php");

$cliente = new Cliente();
$id =   $_REQUEST['id'];
$dados = $cliente->listaClientePorID($id);

echo json_encode($dados);
?>
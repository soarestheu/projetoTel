<?php
include("../functions/functions.php");
include("../includes/conexao.php");
include("../classes/Cliente.php");
$cliente = new Cliente();

$localNasc  =   FILTER_INPUT(INPUT_POST,'estadoNasc');
if($localNasc == 2){
    $localNasc = "Bahia";
}else{
    $localNasc = "São Paulo";
}
$nome       =   FILTER_INPUT(INPUT_POST,'nomeCompleto');
$cpf        =   removeCharEspecial(FILTER_INPUT(INPUT_POST,'cpf'));
$rg         =   removeCharEspecial(FILTER_INPUT(INPUT_POST,'rg'));
$dataNasc   =   trataDataBD(FILTER_INPUT(INPUT_POST,'dataNasc'));
$telefone   =   removeCharEspecial(FILTER_INPUT(INPUT_POST,'telefone'));
$id         =   FILTER_INPUT(INPUT_POST,'idUser');
$dataCad    =   date('Y-m-d H:i:s');

$cadastroNovo = $cliente->cadastraCliente($localNasc,$nome,$cpf,$rg,$dataNasc,$telefone,$id,$dataCad);

 if($cadastroNovo){
    $msg    =   "Cliente cadastrado com sucesso!";
    $page   =   "window.location.href= '..\?page=cadCliente';";
    
}else{
    $msg    =   "Erro ao cadastrar o novo cliente!";
    $page   =   "window.history.back();";
}


echo " <script>alert('$msg');$page</script> ";

?>
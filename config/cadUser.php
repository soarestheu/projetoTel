<?php
include("../classes/Usuario.php");
$cadastro = new Usuario();

$nome   = FILTER_INPUT(INPUT_POST,'nomeCompleto');
$email  = FILTER_INPUT(INPUT_POST,'email');
$senha  = FILTER_INPUT(INPUT_POST,'senha');

$status = $cadastro->cadUser($nome,$email,$senha);
if($status == 1){
    $msg    =   "E-mail já cadastrado!";
}else{
    $msg    =   "Cadastro realizado com sucesso!";
}


echo " <script>alert('$msg');window.location.href= '..\?page=cadUsuario';</script> ";

?>
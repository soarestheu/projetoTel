<?php

class Verifica {

    private $conexao;

    #### Construtor:
    public function __construct(){
        $this->conexao    = new mysqli("127.0.0.1","root","","") or die("Erro de conexão com o Banco de dados");
        $this->conexao->set_charset("utf8");
    }

    ##### funções:

    //Cadastro de usuário no banco de dados:
    public function login($email,$senha){
        $sql    =   $this->conexao->prepare("SELECT id FROM projeto.usuario WHERE ativo =1 AND email = ? AND senha = sha1($senha)");
        $sql->bind_param('s',$email);
        $sql->execute();
        $sql->bind_result($id_);
        $sql->fetch();
        $sql->close();
        if($id_){
            return $id_;
        }else{
            return 0;
        }
    }

}
?>
<?php

class Exibe {

    private $conexao;

    #### Construtor:
    public function __construct(){
        $this->conexao    = new mysqli(_SERV,_USR,_PW,_BD) or die("Erro de conexão com o Banco de dados");
        $this->conexao->set_charset("utf8");
    }

    ##### funções:

    //Retorna os dados do usuário;
    public function dadosUsuario($id){
        
        $sql    =   $this->conexao->prepare("SELECT nome, email FROM projeto.usuario WHERE id = ?");
        $sql->bind_param('d',$id);
        $sql->execute();
        $sql->bind_result($dados['nome'],$dados['email']);
        $sql->fetch();
        $sql->close();
        return $dados;
    }

    public function listaUsuario(){
        $sql    =   $this->conexao->prepare("SELECT id,nome, email, ativo FROM projeto.usuario");
        $sql->execute();
        $sql->bind_result($id_,$nome_,$email_,$ativo_);
        while($sql->fetch()){
            $dados['id'][]          =   $id_;
            $dados['nome'][]        =   $nome_;
            $dados['email'][]       =   $email_;
            $dados['status'][]      =   $ativo_;
        }
        $sql->close();

        return $dados;        
    }
}
?>
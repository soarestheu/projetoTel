<?php

class Usuario {

    private $conexao;

    #### Construtor:
    public function __construct(){
        $this->conexao    = new mysqli(_SERV,_USR,_PW,_BD) or die("Erro de conexão com o Banco de dados");
        $this->conexao->set_charset("utf8");
    }

    ##### funções:

    //Cadastro de usuário no banco de dados:
    public function cadUser($nome,$email,$senha){
        $sql    =   $this->conexao->prepare("SELECT id FROM projeto.usuario WHERE email = ?");
        $sql->bind_param('s',$email);
        $sql->execute();
        $sql->bind_result($id_);
        $sql->fetch();
        $sql->close();
        if($id_){
            return 1;
        }else{
            $sql    =   $this->conexao->prepare("INSERT INTO projeto.usuario (nome,email,senha) 
                                                VALUES (?,?, sha1($senha))");
            $sql->bind_param('ss',$nome,$email);
            $sql->execute();
            $sql->close();
            return 0;
        }
    }
        
    //Atualiza os dados do usuário:
    public function updateUser($id,$nome,$email,$senha=NULL){
        if($senha){
            $this->updateUserSenha($id,$nome,$email,$senha);
        }else{
            $sql = $this->conexao->prepare("UPDATE projeto.usuario SET nome = ?, email = ? WHERE id = ?");
            $sql->bind_param('ssd',$nome,$email,$id);
            $sql->execute();
            $sql->close();
        }
        return 1;
    }
     //Atualiza os dados do usuário:
     public function updateUserSenha($id,$nome,$email,$senha){
        $sql = $this->conexao->prepare("UPDATE projeto.usuario SET nome = ?, email = ?, senha = sha1($senha) WHERE id = ?");
        $sql->bind_param('ssd',$nome,$email,$id);
        $sql->execute();
        $sql->close();
        return 1;
    }

    //Exclusão de Acesso
    public function excluirAcesso($id){
        
        $sql = $this->conexao->prepare("UPDATE projeto.usuario SET ativo = 0 WHERE id = ?");
        $sql->bind_param('d',$id);
        $sql->execute();
        $sql->close();
    }

}

?>
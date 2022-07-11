<?php

class Cliente {

    private $conexao;

    #### Construtor:
    public function __construct(){
        $this->conexao    = mssql_connect(_SERV,_USR,_PW,_BD) or die("Erro de conexão com o Banco de dados");
    }

    ##### funções:

    public function cadastraCliente($localNasc,$nome,$cpf,$rg,$dataNasc,$telefone,$id,$dataCad){
        $sql = $this->conexao = mssql_query("INSERT INTO projeto.clientes(nome,cpf,rg,idUser,dataNascimento,telefone,localNascimento) VALUES ($nome,$cpf,$rg,$id,$dataNasc,$telefone,$localNasc)");
        mssql_execute($sql);
        mssql_close($sql);
    }

    public function listaCliente(){
        $sql = $this->conexao->prepare("SELECT id,nome,cpf,rg,dataNascimento,telefone,localNascimento FROM projeto.clientes");
        $sql->execute();
        $sql->bind_result($id_,$nome_,$cpf_,$rg_,$dataNasc_,$telefone_,$localNasc_);
        while($sql->fetch()){
            $dados['id'][]          =   $id_;
            $dados['nome'][]        =   $nome_;
            $dados['cpf'][]         =   $cpf_;
            $dados['rg'][]          =   $rg_;
            $dados['dataNasc'][]    =   $dataNasc_;
            $dados['telefone'][]    =   $telefone_;
            $dados['localNasc'][]   =   $localNasc_;
        }
        $sql->close();
        
        return $dados;
    }

    public function listaClientePorID($id){
        $sql = $this->conexao->prepare("SELECT id,nome,cpf,rg,dataNascimento,telefone,localNascimento FROM projeto.clientes WHERE id = ?");
        $sql->execute();
        $sql->bind_result($id_,$nome_,$cpf_,$rg_,$dataNasc_,$telefone_,$localNasc_);
        while($sql->fetch()){
            $dados['id']          =   $id_;
            $dados['nome']        =   $nome_;
            $dados['cpf']         =   $cpf_;
            $dados['rg']          =   $rg_;
            $dados['dataNasc']    =   $dataNasc_;
            $dados['telefone']    =   $telefone_;
            $dados['localNasc']   =   $localNasc_;
        }
        $sql->close();
        
        return $dados;
    }
}
?>
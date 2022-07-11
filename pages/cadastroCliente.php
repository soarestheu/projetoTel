<?php
if(!$_SESSION['id']){
    header("Location: ?page=index");
}
include("classes/Cliente.php");
include("functions/functions.php");
$cliente = new Cliente();

$listaCliente = $cliente->listaCliente();
?>
<script>
 $(document).ready(function(){

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
     $("#estadoNasc").on('change',function(){
        var estado = $("#estadoNasc").val();
        if(estado == 1){
            $("#rg").prop('required',true);
            $("#cadastrar").prop('disabled',false);
        }else{
            $("#rg").prop('required',false);
            $(".data").on('focusout',function(){
                var nascimento  = $(".data").val();
                
                var idade = calcularIdade(nascimento);
            
                if(idade < 18){
                    $("#cadastrar").prop('disabled',true);
                }else{
                    $("#cadastrar").prop('disabled',false);
                }
            });
            
            function calcularIdade(aniversario) {
                var nascimento = aniversario.split("/");
                var dataNascimento = new Date(parseInt(nascimento[2], 10),
                parseInt(nascimento[1], 10) - 1,
                parseInt(nascimento[0], 10));

                var diferenca = Date.now() -  dataNascimento.getTime();
                var idade = new Date(diferenca);

                return Math.abs(idade.getUTCFullYear() - 1970);
            }
        }
    });
    $('#clientes').DataTable();
 });
</script>
<div class="row">
   <div class="col-md-4">
    <form action="config/cadCliente.php" method="post">
        <div class="form-group"></div>
        <div class="form-group">
            <label for="estadoNasc">Local de Nascimento:</label>
            <select class="form-control" required id="estadoNasc" name="estadoNasc">
                <option>Selecione</option>
                <option value="1">São Paulo</option>
                <option value="2">Bahia</option>
                
            </select>
        </div>
        <div class="form-group">
            <label for="nomeCompleto">Nome Completo:</label>
            <input type="text" name="nomeCompleto" class="form-control" placeholder="Digite aqui seu nome completo" />
        </div>
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" class="form-control cpf" placeholder="Digite aqui seu CPF">
        </div>
        <div class="form-group">
            <label for="rg">RG:</label>
            <input type="text" name="rg" id="rg" class="form-control rg"  plceholder="Digite aqui seu RG">
        </div>
        <div class="form-group">
            <label for="dataNasc">Data de nascimento:</label>
            <input type="text" name="dataNasc" class="form-control data" required plceholder="Digite aqui sua data de nascimento">
        </div>
        <div class="form-group">
            <label for="telefones">Telefone:</label>
            <input type="text" name="telefone" class="form-control tel" plceholder="Digite aqui sua senha">
            <input type="hidden" name="idUser" value="<?=$_SESSION['id'];?>">
        </div>
        <button type="submit" id="cadastrar" class="btn btn-primary">Cadastrar</button>
    </form>
   </div>
   <div class="col-md-8">
        <table id="clientes" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>Data de Nascimento</th>
                    <th>Telefone</th>
                    <th>Local de Nascimento</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    for($i=0;$i<count($listaCliente['nome']);$i++){ 
                ?>
                    <tr>
                        <td><?=$listaCliente['nome'][$i];?></td>
                        <td><?=$listaCliente['cpf'][$i];?></td>
                        <td><?=$listaCliente['rg'][$i];?></td>
                        <td><?=trataData($listaCliente['dataNasc'][$i]);?></td>
                        <td><?=$listaCliente['telefone'][$i];?></td>
                        <td><?=$listaCliente['localNasc'][$i];?></td>
                        <td>

                        <a href="javascript:" data-toggle="modal" data-target="#Editar" data-toggle="tooltip" 
                        data-id="<?=$listaCliente['id'][$i];?>" data-placement="right">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
   </div>
</div>

<!-- Modal - Resposta para Chamado -->
<div class="modal fade" id="Editar" role="dialog" aria-labelledby="modal" aria-hidden="true">
	<div class="modal-dialog" style="width: 900px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
				<h4 class="modal-title" id="titulo"></h4>
			</div>
			<form role="form" method="post" action="config/atualizaCliente.php" enctype="multipart/form-data">
				<div class="modal-body">			  
                <div class="form-group">
                    <label for="nomeCompleto">Nome Completo:</label>
                    <input type="text" name="nomeCompleto" id="nome" class="form-control" placeholder="Digite aqui seu nome completo" />
                </div>
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" id="cpf" class="form-control cpf" placeholder="Digite aqui seu CPF">
                </div>
                <div class="form-group">
                    <label for="rg">RG:</label>
                    <input type="text" name="rg" id="rg" class="form-control rg"  plceholder="Digite aqui seu RG">
                </div>
                <div class="form-group">
                    <label for="dataNasc">Data de nascimento:</label>
                    <input type="text" name="dataNasc" id="dataNasc" class="form-control data" required plceholder="Digite aqui sua data de nascimento">
                </div>
                <div class="form-group">
                    <label for="telefones">Telefone:</label>
                    <input type="text" name="telefone" id="telefone" class="form-control tel" plceholder="Digite aqui sua senha">
                    <input type="hidden" name="idUser" value="<?=$_SESSION['id'];?>">
                </div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php
if(!$_SESSION['id']){
    header("Location: ?page=index");
}
$usuario    =   $Exibe->dadosUsuario($_SESSION['id']);
$listaUsuario   =   $Exibe->listaUsuario();

?>
<script>
    $(document).ready(function() {
    $('#usuarios').DataTable();
} );
</script>
<div class="row">
   <div class="col-md-6">
    <form action="config/atualizaDados.php" method="post">
        <div class="form-group">
            <label for="nomeCompleto">Nome Completo:</label>
            <input type="text" name="nomeCompleto" value="<?=$usuario['nome'];?>" class="form-control" placeholder="Digite aqui seu nome completo" />
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" class="form-control" placeholder="Digite aqui seu e-mail" value="<?=$usuario['email'];?>">
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" class="form-control" plceholder="Digite aqui sua senha">
            <input type="hidden" name="id" value="<?=$_SESSION['id']?>">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
   </div>
   <div class="col-md-6">
        <table id="usuarios" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nome do Usuario</th>
                    <th>E-mail</th>
                    <th>Excluir</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php 
                    for($i=0;$i<count($listaUsuario['nome']);$i++){ 
                        if($listaUsuario['status'][$i] == 0){$color="red";}else{$color=NULL;}
                ?>
                    <tr style="color:<?=$color;?>">
                        <td><?=$listaUsuario['nome'][$i];?></td>
                        <td><?=$listaUsuario['email'][$i];?></td>
                        <td>
                            <a href="config/excluirUsuario.php?id=<?=$listaUsuario['id'][$i];?>">
                                <span id="excluiAcesso" aria-hidden="true">&times;</span>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
   </div>
</div>
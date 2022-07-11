<?php
session_destroy();
?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card" style="width: 15rem;">
            <div class="card-header">
                Acesso Restrito
            </div>
            <img class="card-img-top" src="img/login.png" alt="Card image cap">
            <div class="card-body">
                <form action="config/login.php" method="post">
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" class="form-control" placeholder="Digite aqui seu e-mail">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" class="form-control" required plceholder="Digite aqui sua senha">
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
            </div>
        </div>
   </div>
</div>
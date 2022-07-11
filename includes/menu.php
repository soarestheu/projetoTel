<header>
    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Projeto</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsProjeto" aria-controls="navbarsProjeto" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a href="?page=index" class="nav-link">
                        Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=cadUsuario" class="nav-link">
                        Cadastro de Usuário
                    </a>
                </li>
                <?php if($_SESSION['id']){ ?>
                        <li class="nav-item">
                            <a href="?page=cadCliente" class="nav-link">
                                Cadastro de Cliente
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=intranet" class="nav-link">
                                Intranet
                            </a>
                        </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</header>
<div class="container-fluid" id="firstDiv">
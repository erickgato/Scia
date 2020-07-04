<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo STYLES; ?>/admin_home.css">
    <link rel="stylesheet" href="<?php echo STYLES; ?>/hamburguers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="<?php echo RESOCS; ?>/images/icons/logo/favicon.png" type="image/x-icon" />
</head>

<body>
    <section>
        <header>
            <nav class="Menu">
                <div class="hammain">
                    <input type="checkbox" id="opmenu">
                    <label for="opmenu">
                        <div class="hamburger hamburger--spin">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </label>
                </div>


                <div class="level">
                    <div class="MenuItem">
                        <input type="checkbox">
                        <i class="fa fa-home home" aria-hidden="true"></i><label for="A1"><a
                                href="homeadmin">Home</a></label>
                    </div>
                    <div class="MenuItem">
                        <input type="checkbox">
                        <i class="fa fa-sign-out home" aria-hidden="true"></i><label><a id="loggout"
                                href="homeadmin">Sair</a></label>
                    </div>
                    <div class="MenuItem">
                        <input type="checkbox" id="A">
                        <i class="fa fa-caret-down arrow" aria-hidden="true"></i><label for="A">Consultar</label>
                        <ul>
                            <li> <a href="ConsultarAluno">ALUNO</a></li>
                            <li><a href="ConsultarResponsavel">RESPONSÁVEL</a></li>
                            <li><a href="ConsultarResponsavel">FUNCIONÁRIO</a></li>
                        </ul>
                    </div>
                    <div class="MenuItem">
                        <input type="checkbox" id="B">
                        <i class="fa fa-caret-down arrow" aria-hidden="true"></i><label for="B">Cadastrar</label>
                        <ul>
                            <li> <a href="CadastrarAluno">ALUNO</a></li>
                            <li><a href="CadastrarResponsavel">RESPONSÁVEL</a></li>
                            <li><a href="ConsultarResponsavel">FUNCIONÁRIO</a></li>
                        </ul>
                    </div>
                    <div class="MenuItem">
                        <input type="checkbox" id="c">
                        <i class="fa fa-caret-down arrow" aria-hidden="true"></i><label for="c">Solicitar</label>
                        <ul>
                            <li> <a href="CadastrarAluno">RELATÓRIO</a></li>
                            <li><a href="ConsultarAluno">AUTORIZAÇÃO</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </section>
    <section>
        <main>
            <div class="Mheader">
                <div class="Mheader content">
                    <h1>Bem Vindo !</h1>
                    <h3>ao sistema de controle interação ambiente</h3>
                </div>

            </div>
            <div class="card-group">
                <div class="card a">
                    <div class="card-content">
                        <h2>192</h2>
                        <span>Alunos</span>
                        <p>liberados hoje</p>
                    </div>
                </div>
                <div class="card b">
                    <div class="card-content">
                            <h2>19</h2>
                            <span>Ocorrências</span>
                            <p>Registradas</p>
                        </div>
                </div>
                <div class="card c">
                    <div class="card-content">
                            <h2>900</h2>
                            <span>Alunos</span>
                            <p>Cadastrados</p>
                        </div>
                </div>
            </div>
            <div class="ListAL">
            </div>
            <div class="OCchart"></div>
        </main>
    </section>
    <section>
        <footer>

        </footer>
    </section>
    <script src="<?php echo RESOCS; ?>/js/AdmMenu.js">
    </script>

</body>

</html>
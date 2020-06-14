<?php
function GerarMenuAdmin(){
    echo 
    '
    <header>
        <label for="menu_resp"></label>
        <nav class="menu">
            <div class="logo" href="#">
                <h1><a href="#">SCIA</a></h1>
            </div>
            <ul class="opcoes">
                <li>
                    <a href="logout.php">LOGOUT</a>
                </li>
                <li><a href="solicitar_auto.php" class="selected">SOLICITAR AUTORIZAÇÃO </a>
                </li>
                <li>
                    <a href="relatorio.php">RELATÓRIO </a>
                </li>
                <li>
                    <a href="#">CADASTRAR </a>
                        <ul class="submenu">
                            <li><a href="CadastrarAluno.php">ALUNO</a></li>
                            <li><a href="CadastrarResponsavel.php">RESPONSAVEL</a></li>
                        </ul>
                </li>
                <li><a href="#">CONSULTAR </a>
                    <ul class="submenu">
                        <li><a href="buscarAluno.php">ALUNO</a></li>
                        <li><a href="CadastrarResponsavel">RESPONSAVEL</a></li>
                    </ul>
                </li>
                
        </ul>
        </nav>    
    </header>

    ';
}
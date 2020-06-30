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
                    <a href="index.php">LOGOUT</a>
                </li>
                
                
                
                <li>
                    <a href="#">CADASTRAR </a>
                        <ul class="submenu">
                            <li><a href="CadastrarAluno">ALUNO</a></li>
                            <li><a href="CadastrarResponsavel">RESPONSAVEL</a></li>
                            <li><a href="CadastrarFuncionario">FUNCIONÁRIO</a></li>
                        </ul>
                </li>
                <li><a href="#">CONSULTAR </a>
                    <ul class="submenu">
                        <li><a href="ConsultarAluno">ALUNO</a></li>
                        <li><a href="ConsultarResponsavel">RESPONSAVEL</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">SOLICITAR</a>
                        <ul class="submenu">
                        <li><a href="relatorio.php">RELATÓRIO </a></li>
                        <li><a href="solicitar_auto.php" class="selected">AUTORIZAÇÃO </a></li>
                        </ul>
                </li>
        </ul>
        </nav>    
    </header>

    ';
}
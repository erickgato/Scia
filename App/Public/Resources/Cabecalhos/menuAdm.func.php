<?php
function GerarMenuAdmin(){
    echo 
    '
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
            <i class="fa fa-home home" aria-hidden="true"></i><label for="A1"><a href="homeadmin">Home</a></label>
        </div>
        <div class="MenuItem">
            <input type="checkbox" id="A">
            <i class="fa fa-caret-down arrow" aria-hidden="true"></i><label for="A">Consultar</label>
            <ul>
                <li> <a href="ConsultarAluno">ALUNO</a></li>
                <li><a href="ConsultarResponsavel">RESPONSÁVEL</a></li>
                <li><a href="ConsultarFuncionario">FUNCIONÁRIO</a></li>
            </ul>
        </div>
        <div class="MenuItem">
            <input type="checkbox" id="B">
            <i class="fa fa-caret-down arrow" aria-hidden="true"></i><label for="B">Cadastrar</label>
            <ul>
                <li> <a href="CadastrarAluno">ALUNO</a></li>
                <li><a href="CadastrarResponsavel">RESPONSÁVEL</a></li>
                <li><a href="CadastFunc">FUNCIONÁRIO</a></li>
            </ul>
        </div>
        <div class="MenuItem">
            <input type="checkbox" id="c">
            <i class="fa fa-caret-down arrow" aria-hidden="true"></i><label for="c">Solicitar</label>
            <ul>
                <li> <a href="Relatorio">RELATÓRIO</a></li>
            </ul>
        </div>
        <div class="MenuItem">
            <input type="checkbox">
            <i class="fa fa-sign-out home" aria-hidden="true"></i><label><a id="loggout" href="index.php">Sair</a></label>
        </div>
    </div>
</nav>
<section class="Horizontal-Wi">
    <span class="logo">
        <h2>SCIA</h2>
    </span>
</section>
    ';
}
<!DOCTYPE html>
<html lang="Pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css"/> 
    <title>Cadastro</title>
</head>
<body class="corpo">
    <header id="header">
<?php
        include_once 'menuAdm.func.php';
        menu(2);
?>
    </header>
    <div id="container">
    <form action="#" method="post">
        <div class="painel">
            <label for="frase_aut_aluno">
                    Cadastro
            </label>
            <div id = "campos_cadastro">
                <label>
                    <p>
                         Tipo
                        <select name="Al_names" class = "input-select" id='tipo'>
                            <option href="#">Aluno</option>
                            <option href="#">Responsável</option>
                            <option href="#">Funcionário</option>
                            <option href="#">Visitante</option>
                            <option href="#">Evento</option>
                        </select>
                    </p>
                    <script>
                    function TipoCadastro() {
                    var x = document.getElementById("tipo").selectedIndex;
                    x.text = 'Aluno';
                    if(opção = 'responsavel'){
                        document.body.innerHTML += '<input id="input-text" type="text" value="" placeholder="Insira o Nome"/>'
                    }
                    }
                    </script>    
                </label>
                <label>
                    <p>
                        Nome
                        <input id="input-text" type="text" value="" placeholder="Insira o Nome"/> 
                    </p>
                </label>
                <label>
                    <p>
                        CPF
                        <input id="input-text" type="text" value="" placeholder="Insira o CPF" pattern=
                        "[0-9]{5}-[0-9]{3}$" title="O CFP precisa ter essa estrutura: 12345-123"/>
                    </p>
                </label>

                <label for="unidade">
                    <p>
                        Data de Nascimento
                        <input id="input-text" type="date" value="" placeholder="CPF do Aluno"/>
                    </p>
                </label>
                <label for="textarea">
                    
                        Endereço
                        <p>
                        <textarea id="textarea" placeholder="Rua..., avenida..., bairro ... "></textarea>
                    </p>
                </label>
                <label>
                    <p>
                        Telefone
                        <input id="input-text" type="tel" value="" placeholder="(41) 12345-6789" pattern=
                        "\([0-9]{2}\) [9]{1}[0-9]{4}-[0-9]{4}$" title="O telefone precisa ter essa estrutura: (DDD) 91234-1234"/>
                    </p>
                </label>      
            </div>
            <input type="submit" class="botao" name="Enviar"/>
        </div>
</form>
</div>
    <footer></footer>
</body>
</html>
<!DOCTYPE html>
<html lang="Pt-Br">
<?php
if (!isset($_SESSION['ADMINLOGGED'])) {
    header("Location: index.php");
}
if (isset($_GET['Cal'])) {
    $S_Alun = DATABASE::JOIN(
        'sc_aluno',
        "WHERE AL.Al_cod = {$_GET['Cal']}",
        "AS AL INNER JOIN sc_unidade AS UN ON AL.Al_codUnidade = UN.Un_cod INNER JOIN sc_responsavel AS RESP on AL.Al_codResponsavel = RESP.Re_cod"
    );
    $Aluno = array(
        "Nome" => $S_Alun[0]['Al_nome'],
        "sobrenome" => $S_Alun[0]['Al_sobrenome'],
        "CPF" => $S_Alun[0]['Al_CPF'],
        "Nascimento" => $S_Alun[0]['Al_nascimento'],
        "Un" => $S_Alun[0]['Al_codUnidade'],
        "RCPF" => $S_Alun[0]['Re_CPF']
    );
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Alunos</title>
    <link rel="stylesheet" href="<?php echo STYLES; ?>Menu.css" />
    <link rel="stylesheet" href="<?php echo STYLES; ?>hamburguers.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo RESOCS; ?>/css/Consultar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--ALERT BOX -->
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <link rel="shortcut icon" href="<?php echo RESOCS; ?>/images/icons/logo/favicon.ico" type="image/x-icon" />
</head>

<body>
    <header>
        <?php
        include_once RESOCS . '/Cabecalhos/menuAdm.func.php';
        GerarMenuAdmin();
        $Alunos = DATABASE::JOIN('sc_aluno', null, "AS AL INNER JOIN sc_unidade AS UN ON AL.Al_codUnidade = UN.Un_cod INNER JOIN sc_responsavel AS RESP on AL.Al_codResponsavel = RESP.Re_cod;");
        $js_Alunos_json = json_encode($Alunos);
        ?>
    </header>

    <main>
        <input type="hidden" value="<?php
                                    if (isset($_GET['Cal'])) {
                                        print $_GET['Cal'];
                                    }
                                    ?>" class="Cid"></input>
        <div class="confirm">
            <span id="message">Qual ação você deseja executar ? </span>
            <a id="closeicns" href="ConsultarAluno"><img src="https://img.icons8.com/metro/26/000000/multiply.png" /></a>
            <section class="flexconfirm">
                <button onclick="Form()" value="edit" id="edit">Editar</button>
                <button onclick="Confirm('Cal')" id="del">Excluir</button>
                <button onclick="Occo(true)" id="RegOco">Ocorrência</button>
            </section>
        </div>
        <!-- Ocorrência -->
        <form action="ConsultarAluno" method="post" id="Focorrencia">
            <div class="painel">
                <a class="CloseForm" href="ConsultarAluno"><img src="https://img.icons8.com/metro/26/000000/multiply.png" /></a>
                <label class="title_register">
                    Registrar Ocorrência
                </label>
                <input type="hidden" value="<?php print($_GET['Cal']); ?>" name="O[id]" />
                <div id="campos_cadastro">
                    <label class="subtitulo">
                        Tipo de Ocorrência
                        <select class="caixa" type="text" value="" name="O[tpoc]">
                            <option value="2">Chegada Tardia</option>
                            <option value="3">Fora de sala</option>
                        </select>

                    </label>
                    <textarea name="O[desc]" cols="4" required rows="4">Digite aqui a observação...</textarea>
                    <input type="submit" class="button" name="O[Enviar]" value="Registrar" />
                </div>
            </div>
        </form>
        <!-- -->
        <form action="ConsultarAluno" method="post" id="form">
            <div class="painel">
                <label class="title_register">
                    Alterar Aluno
                </label>
                <input type="hidden" value="<?php print($_GET['Cal']); ?>" name="A[id]" />
                <div id="campos_cadastro">
                    <label class="subtitulo">
                        Unidade do Aluno
                        <select class="caixa" type="text" value="<?php print($Aluno['Un']); ?>" name="A[unidade]">
                            <option value="1">SESI</option>
                            <option value="2">SENAI</option>
                        </select>

                    </label>
                    <label class="subtitulo">Nome </label><input class="caixa" name="A[name]" type="text" value="<?php print($Aluno['Nome']); ?>" placeholder="Digite o Nome do Aluno" required autofocus />
                    <label class="subtitulo" for="sobrenome">Sobrenome</label><input class="caixa" type="text" value="<?php print($Aluno['sobrenome']); ?>" name="A[sobrenome]" placeholder="Digite o sobrenome do  aluno" required />
                    <label class="subtitulo">
                        Data de Nascimento
                        <input class="caixa" type="date" value="<?php print($Aluno['Nascimento']); ?>" required name="A[nasc]" />
                    </label>
                    <label class="subtitulo">
                        CPF do Aluno</label>
                    <input class="caixa" name="A[CPF]" type="text" value="<?php print($Aluno['CPF']); ?>" placeholder="Digite o CPF do Aluno" required onkeydown="javascript: fMasc( this, mCPF )" maxlength="14" ; />

                    <label class="subtitulo">
                        CPF Responsavel</label>
                    <input class="caixa" name="A[RCPF]" type="text" value="<?php print($Aluno['RCPF']); ?>" placeholder="Digite o CPF do Responsavel" required />

                </div>
                <input type="submit" class="button" name="Enviar" value="Alterar" />
                <button class="button" onclick="Form(false)"> Cancelar </button>
            </div>
        </form>

        <div class="Searchbar">
            <input class="search-txt" type="text" name="search" oninput="Aluno.Filter(value)" placeholder="Search..">
            <div style="display:none;" id="Al_Json"><?php echo $js_Alunos_json; ?></div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Responsavel</th>
                    <th>Unidade</th>
                    <th>DataNascimento</th>
                    <th>CPF</th>
                </tr>
            </thead>
            <tbody class="databody">
            </tbody>
        </table>
        <div class="loading">

            <div class="loader">
                <div class="inner one"></div>
                <div class="inner two"></div>
                <div class="inner three"></div>
            </div>
        </div>


    </main>
    <script src="<?php echo RESOCS; ?>/js/GetData.js">
    </script>
    <script>
        $(document).ready(() => {
            setTimeout(() => {
                $(".loading").hide(600);
            }, 1000);
            
        })
        window.onload = () => {
            Aluno.Filter("");
            
        };
    </script>
    <script src="<?php echo RESOCS; ?>/js/AdmMenu.js">
    </script>
    <script src="<?php echo RESOCS; ?>/js/Edit_del.js"></script>
    <?php
    if (isset($_GET['Cal'])) {
        if (!isset($_GET['act']))
            print '
                <script> ShowDiv(".confirm");</script>
                ';
        else {
            if (DATABASE::DELETE('sc_aluno', 'Al_cod', $_GET['Cal'])) {
                echo "<script>alertify.alert('Excluido!', 'Aluno excluido!',() => {
                        window.location.href = 'ConsultarAluno';
                      });</script>";
            }
        }
    }
    if (isset($_POST['Enviar']) && isset($_POST['A'])) {
        try {
            $IDRESP = DATABASE::SELECT('sc_responsavel', "WHERE Re_CPF = '{$_POST['A']['RCPF']}'");
            if (DATABASE::UPDATE(
                'sc_aluno',
                "Al_cod = {$_POST['A']['id']}",
                ['Al_codUnidade', 'Al_nome', 'Al_sobrenome', 'Al_nascimento', 'Al_CPF', 'Al_codResponsavel'],
                [$_POST['A']['unidade'], $_POST['A']['name'], $_POST['A']['sobrenome'], $_POST['A']['nasc'], $_POST['A']['CPF'], $IDRESP[0]['Re_cod']]
            )) {
                echo "<script>alertify.alert('Alterado!', 'Aluno alterado com sucesso!',() => {
                    window.location.href = 'ConsultarAluno';
                  });</script>";
            }
        } catch (\Throwable $th) {
            echo "<script>alertify.alert('error!', 'Houve uma falha no processo de alteração, por favor contate o desenvolvedor!',() => {
                        alertify.error('Falha');
                      });</script>";
        }
    }
    if (isset($_POST['O'])) {
        try {
            $cpfUser = $_COOKIE['USER']['CPF'];
            $usercod = DATABASE::SELECT('sc_usuario', "WHERE Us_login = '{$cpfUser}'");
            if ($usercod != false) {
                $insert = DATABASE::INSERT('sc_ocorrencia', ['', $usercod[0]['Us_cod'], $_POST['O']['id'], $_POST['O']['tpoc'], $_POST['O']['desc'], DATE('Y-m-d')]);
                if ($insert) {
                    echo "<script>alertify.alert('Inserido!', 'Ocorrência registrada com sucesso!',() => {
                        window.location.href = 'ConsultarAluno';
                      });</script>";
                }
            }
        } catch (\Throwable $e) {
            echo "<script>alertify.alert('error!', 'Houve uma falha no processo registro, por favor contate o desenvolvedor!',() => {
                alertify.error('Falha');
              });</script>";
        }
    }
    ?>
</body>

</html>
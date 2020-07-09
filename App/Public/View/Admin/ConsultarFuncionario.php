<?php
if (!isset($_SESSION['ADMINLOGGED']))
    header("Location: index.php");
$tiposdelog = DATABASE::SELECT('Fu_nome');
if (isset($_GET['Fid'])) {
    $S_RESP = DATABASE::SELECT('sc_funcionario', "WHERE Fu_cod = {$_GET['Fid']}");
    $Funcionario = array(
        "Nome" => $S_RESP[0]['Fu_nome'],
        "CPF" => $S_RESP[0]['Fu_CPF'],
        "Matricula" => $S_RESP[0]['Fu_matricula']
        "Unidade" => $S_RESP[0]['Fu_codUnidade'],
        "tpFuncionario" => $S_RESP[0]['Fu_codtpFuncionario']
    );
}
?>
<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo RESOCS; ?>/css/Consultar.css" />
    <title>Lista de Funcionarios</title>
    <link rel="stylesheet" href="<?php echo STYLES; ?>/Menu.css">
    <link rel="stylesheet" href="<?php echo STYLES; ?>/hamburguers.css">
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

</head>

<body>
    <header>
        <?php
        include_once RESOCS . '/Cabecalhos/menuAdm.func.php';
        GerarMenuAdmin();
        $Funcionarios = DATABASE::JOIN('sc_funcionario', null, "
            AS RESP INNER JOIN sc_tp_logradouro as TPL on 
            RESP.Re_codtpLogradouro = TPL.TL_cod INNER JOIN
            sc_bairro as BAIRRO on RESP.Re_codBairro = BAIRRO.Ba_cod
            ");
        $js_funcionario = json_encode($Funcionarios);
        ?>
    </header>
    <!-- confirm box -->
    <main>
        <input type="hidden" value="<?php
                                    if (isset($_GET['Fid'])) {
                                        print $_GET['Fid'];
                                    }
                                    ?>" class="Cid"></input>
        <div class="confirm">
            <span id="message">Qual ação você deseja executar ? </span>
            <a id="closeicns" href="ConsultarFuncionario"><img src="https://img.icons8.com/metro/26/000000/multiply.png" /></a>
            <section class="flexconfirm">
                <button onclick="Form()" value="edit" id="edit">Editar</button>
                <button onclick="Confirm('Fid')" id="del">Excluir</button>
            </section>
        </div>
        <!--  -->
        <!-- form['edit']  -->
        <form action="ConsultarFuncionario" method="post" id="form">
            <script src="<?php echo RESOCS; ?>/js/estilos.js"></script>
            <div class="painel">
                <label class="title_register">
                    Alterar Funcionario
                </label>
                <div id="campos_cadastro">
                    <label class="subtitulo">Nome do Funcionario</label>
                    <input class="caixa" value="<?php print($Funcionario['Nome']); ?>" type="text" name="F[nome]">
                    <input type="hidden" value="<?php print($_GET['Fid']); ?>" name="F[id]" />
                    <label class="subtitulo">Matricula </label>
                    <input class="caixa" name="F[matricula]" type="text" placeholder="Matricula do Funcionario" value="<?php print($Funcionario['Matricula']); ?>" autofocus />
                    <label class="subtitulo">CPF</label>
                    <input class="caixa" type="text" name="F[CPF]" placeholder="CPF do Funcionario" onkeydown="javascript: fMasc( this, mCPF )" value="<?php print($Funcionario['CPF']); ?>" maxlength="14" required />
                    <label class="subtitulo">Unidade</label> 
                    <select class="caixa" type="text" value="<?php print($Funcionario['Un']); ?>" name="F[Unidade]"> 
                                <option  value="1">SESI</option>
                                <option  value="2">SENAI</option>
                            </select>
                    <label class="subtitulo">Cargo</label>
                    <select class="caixa" type="text" value="<?php print($Funcionario['tp']); ?>" name="F[tpFuncionario]"> 
                                <option  value="1">Coordenador</option>
                                <option  value="2">Monitor</option>
                                <option  value="3">Gerencia</option>
                                <option  value="4">Comercial</option>
                            </select>
                </div>
                <input type="submit" class="button" name="Enviar" />
                <button class="button" onclick="Form(false)"> Cancelar </button>
            </div>
        </form>
        <!-- end form['edit']  -->

        <div class="Searchbar">
            <input class="search-txt" type="text" name="search" oninput="Funcionario.Filter(value)" placeholder="Search..">
            <div style="display:none;" id="resp_Json"><?php echo $js_funcionario; ?></div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Matricula</th>
                    <th>Unidade</th>
                    <th>Cargo</th>
                </tr>
            </thead>
            <tbody class="databody">
            </tbody>
        </table>
    </main>
    <script src="<?php echo RESOCS; ?>/js/GetData.js">
    </script>
    <script>
        window.onload = () => {
            Funcionario.Filter("");
        };
    </script>
    <script src="<?php echo RESOCS; ?>/js/AdmMenu.js">
    </script>
    <script src="<?php echo RESOCS; ?>/js/Edit_del.js">
    </script>
    <?php
    if (isset($_GET['Fid'])) {
        if (!isset($_GET['act']))
            print '
                <script> ShowDiv(".confirm");</script>
                ';
        else {
            $R_CPF = DATABASE::SELECT('sc_funcionario', "where Re_cod={$_GET['Fid']}");
            if (DATABASE::DELETE('sc_usuario', 'Us_login', $R_CPF[0]['Re_CPF'])) {
                if (DATABASE::DELETE('sc_funcionario', 'Fu_cod', $_GET['Fid'])) {
                    echo "<script>alertify.alert('Excluido!', 'Funcionario Excluido!',() => {
                        window.location.href = 'ConsultarFuncionario';
                      });</script>";
                }
            }
        }
    }
    if (isset($_POST['Enviar']) && isset($_POST['F'])) {
        $R_CPF = DATABASE::SELECT('sc_funcionario', "where Fu_cod={$_POST['F']['id']}");
        $id_User = DATABASE::SELECT('sc_usuario', "WHERE Us_login = '{$R_CPF[0]['Fu_CPF']}'");
        if (DATABASE::UPDATE(
            'sc_funcionario',
            "Fu_cod = {$_POST['F']['id']}",
            [
                'Fu_nome', 'Fu_CPF', 'Fu_matricula', 'Fu_codUnidade', 'Fu_codtpFuncionario'
            ],
            [
                $_POST['F']['nome'], $_POST['F']['CPF'], $_POST['F']['matricula'], $_POST['F']['Unidade'],
                $_POST['F']['tpFuncionario']
            ]
        )) {
            if (DATABASE::UPDATE('sc_usuario', "Us_cod = {$id_User[0]['Us_cod']}", ['Us_login'], [$_POST['F']['CPF']]))
                echo "<script>alertify.alert('Alterado!', 'Funcionario Alterado com sucesso!',() => {
                    window.location.href = 'ConsultarFuncionario';
                      });</script>";
        }
    }

    ?>
</body>

</html>
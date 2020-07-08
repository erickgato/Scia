<?php
if (!isset($_SESSION['ADMINLOGGED']))
    header("Location: index.php");
$tiposdelog = DATABASE::SELECT('sc_tp_logradouro');
$bairros = DATABASE::SELECT('sc_bairro');
if (isset($_GET['Rid'])) {
    $S_RESP = DATABASE::SELECT('sc_responsavel', "WHERE Re_cod = {$_GET['Rid']}");
    $Responsavel = array(
        "Nome" => $S_RESP[0]['Re_nome'],
        "RG" => $S_RESP[0]['Re_RG'],
        "CPF" => $S_RESP[0]['Re_CPF'],
        "Nascimento" => $S_RESP[0]['Re_nascimento'],
        "End" => $S_RESP[0]['Re_logradouro'],
        "logcod" => $S_RESP[0]['Re_codtpLogradouro']
    );
}
?>
<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo RESOCS; ?>/css/Consultar.css" />
    <title>Lista Alunos</title>
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
        $Responsaveis = DATABASE::JOIN('sc_responsavel', null, "
            AS RESP INNER JOIN sc_tp_logradouro as TPL on 
            RESP.Re_codtpLogradouro = TPL.TL_cod INNER JOIN
            sc_bairro as BAIRRO on RESP.Re_codBairro = BAIRRO.Ba_cod
            ");
        $js_responsavel = json_encode($Responsaveis);
        ?>
    </header>
    <!-- confirm box -->
    <main>
        <input type="hidden" value="<?php
                                    if (isset($_GET['Rid'])) {
                                        print $_GET['Rid'];
                                    }
                                    ?>" class="Cid"></input>
        <div class="confirm">
            <span id="message">Qual ação você deseja executar ? </span>
            <a id="closeicns" href="ConsultarResponsavel"><img src="https://img.icons8.com/metro/26/000000/multiply.png" /></a>
            <section class="flexconfirm">
                <button onclick="Form()" value="edit" id="edit">Editar</button>
                <button onclick="Confirm('Rid')" id="del">Excluir</button>
            </section>
        </div>
        <!--  -->
        <!-- form['edit']  -->
        <form action="ConsultarResponsavel" method="post" id="form">
            <script src="<?php echo RESOCS; ?>/js/estilos.js"></script>
            <div class="painel">
                <label class="title_register">
                    Alterar Responsavel
                </label>
                <div id="campos_cadastro">
                    <label class="subtitulo">Nome do Responsável</label>
                    <input class="caixa" value="<?php print($Responsavel['Nome']); ?>" type="text" name="R[nome]">
                    <input type="hidden" value="<?php print($_GET['Rid']); ?>" name="R[id]" />
                    <label class="subtitulo">RG </label><input class="caixa" name="R[RG]" type="text" placeholder="RG do Responsável" required maxlength="10" value="<?php print($Responsavel['RG']); ?>" autofocus />
                    <label class="subtitulo">CPF</label><input class="caixa" type="text" name="R[CPF]" placeholder="CPF do Responsável" onkeydown="javascript: fMasc( this, mCPF )" value="<?php print($Responsavel['CPF']); ?>" maxlength="14" required />
                    <label class="subtitulo">Data de Nascimento </label>
                    <input class="caixa" type="date" value="<?php print($Responsavel['Nascimento']); ?>" required name="R[nasc]" />

                    <label class="subtitulo">Endereço</label>
                    <textarea name="R[end]" cols="4" value="" rows="4"><?php print($Responsavel['End']); ?></textarea>

                    <label class="subtitulo">Tipo de logradouro </label>
                    <select class="caixa" type="text" value="" name="R[tlog]">
                        <?php
                        foreach ($tiposdelog as $log) {
                            echo '<option value = "' . $log['TL_cod'] . '">' . $log['TL_nome'] . '</option>';
                        }
                        ?>
                    </select>
                    <label class="subtitulo">Bairro </label>
                    <select class="caixa" type="text" value="" name="R[tcbairro]">
                        <?php foreach ($bairros as $bairro) : ?>
                            <option value="<?php echo $bairro['Ba_cod']; ?>"><?php echo $bairro['Ba_nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" class="button" name="Enviar" />
                <button class="button" onclick="Form(false)"> Cancel </button>
            </div>
        </form>
        <!-- end form['edit']  -->

        <div class="Searchbar">
            <input class="search-txt" type="text" name="search" oninput="Responsavel.Filter(value)" placeholder="Search..">
            <div style="display:none;" id="resp_Json"><?php echo $js_responsavel; ?></div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>RG</th>
                    <th>CPF</th>
                    <th>Idade</th>
                    <th>Endereço</th>
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
            Responsavel.Filter("");
        };
    </script>
    <script src="<?php echo RESOCS; ?>/js/AdmMenu.js">
    </script>
    <script src="<?php echo RESOCS; ?>/js/Edit_del.js">
    </script>
    <?php
    if (isset($_GET['Rid'])) {
        if (!isset($_GET['act']))
            print '
                <script> ShowDiv(".confirm");</script>
                ';
        else {
            $R_CPF = DATABASE::SELECT('sc_responsavel', "where Re_cod={$_GET['Rid']}");
            if (DATABASE::DELETE('sc_usuario', 'Us_login', $R_CPF[0]['Re_CPF'])) {
                if (DATABASE::DELETE('sc_responsavel', 'Re_cod', $_GET['Rid'])) {
                    echo "<script>alertify.alert('Excluido!', 'Responsável Excluidos!',() => {
                        window.location.href = 'ConsultarResponsavel';
                      });</script>";
                }
            }
        }
    }
    if (isset($_POST['Enviar']) && isset($_POST['R'])) {
        $R_CPF = DATABASE::SELECT('sc_responsavel', "where Re_cod={$_POST['R']['id']}");
        $id_User = DATABASE::SELECT('sc_usuario', "WHERE Us_login = '{$R_CPF[0]['Re_CPF']}'");
        if (DATABASE::UPDATE(
            'sc_responsavel',
            "Re_cod = {$_POST['R']['id']}",
            [
                'Re_RG', 'Re_CPF', 'Re_nascimento', 'Re_nome',
                'Re_logradouro', 'Re_codtpLogradouro', 'Re_codBairro'
            ],
            [
                $_POST['R']['RG'], $_POST['R']['CPF'], $_POST['R']['nasc'], $_POST['R']['nome'],
                $_POST['R']['end'], $_POST['R']['tlog'], $_POST['R']['tcbairro']
            ]
        )) {
            if (DATABASE::UPDATE('sc_usuario', "Us_cod = {$id_User[0]['Us_cod']}", ['Us_login'], [$_POST['R']['CPF']]))
                echo "<script>alertify.alert('Alterado!', 'Responsável Alterado com sucesso!',() => {
                    window.location.href = 'ConsultarResponsavel';
                      });</script>";
        }
    }

    ?>
</body>

</html>
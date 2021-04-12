<?php
$link = mysqli_connect("localhost", "root", "", "euax_desafio");

$projetos = mysqli_query($link, "SELECT * FROM projetos");

$atividades = mysqli_query($link, "SELECT * FROM atividades");

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskyMe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="homestyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

</head>

<body>
    <div class="navbar">
        <div class="logo">TaskyMe</div>
        <div class="wrapper-buttons">

            <button type="button" class="btn-tasky" data-bs-toggle="modal" data-bs-target="#criar_tasky" onclick="OpenForm('novoProjeto');" value="cadastra Tasky" />
            Cadastrar Tasky <img class="btn-adicionar" src="https://img.icons8.com/pastel-glyph/2x/plus.png">
            </button>

            <button type="button" class="btn-atividade" data-bs-toggle="modal" data-bs-target="#criar_atividade" onclick="OpenForm('novaAtividade');" value="cadastra Atividade" />
            Cadastrar Atividade <img class="btn-adicionar" src="https://img.icons8.com/pastel-glyph/2x/plus.png">
            </button>
        </div>

        <!-- Modal para tasky -->
        <div class="modal fade" id="criar_tasky" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel" style="color: #000">Nova Tasky</h5>
                    </div>
                    <div class="modal-body modal-cadastro">
                        <form method="post" action="criar_projeto.php" method="POST">
                            <h2>Cadastrar novo projeto</h2>
                            <div class="editInputs-Box">
                                <label for="NomeProjeto">Nome do projeto: </label>
                                <input class="form-control" type="text" name="nome_projeto" required />
                            </div>
                            <div class="editInputs-Box">
                                <label for="DataInicio">Data de início: </label>
                                <input class="form-control" type="date" name="data_inicio" required />
                            </div>
                            <div class="editInputs-Box">
                                <label for="DataFim">Data final: </label>
                                <input class="form-control" type="date" name="data_final" required />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                <input type="submit" name="criar" value="criar" class="btn btn-success">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal para tasky -->
        <div class="modal fade" id="criar_atividade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel" style="color: #000">Nova Atividade</h5>
                    </div>
                    <div class="modal-body modal-cadastro">
                        <form method="post" action="criar_atividade.php" method="POST">
                            <h2>Cadastrar nova atividade</h2>
                            <div class="editInputs-Box">
                                <label for="IDProjeto" class="fomulario_modal">ID do projeto </label>
                                <input class="form-control" type="text" name="id_projeto" required />
                            </div>
                            <div class="editInputs-Box">
                                <label for="NomeAtividade">Nome da atividade: </label>
                                <input class="form-control" type="text" name="nome_atividade" required />
                            </div>
                            <div class="editInputs-Box">
                                <label for="DataInicio">Data de início: </label>
                                <input class="form-control" type="date" name="data_inicio" required />
                            </div>
                            <div class="editInputs-Box">
                                <label for="DataFim">Data final: </label>
                                <input class="form-control" type="date" name="data_final" />
                            </div>
                            <div class="editInputs-Box">
                                <label for="Finalizada" class="fomulario_modal">Finalizada? </label>
                                <input class="form-control" type="text" name="finalizada" placeholder="1=sim, 2=não" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                <input type="submit" name="criar" value="criar" class="btn btn-success">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <main>
        <div class="sidebar">
            <div class="menu-info">
                <ul>
                    <li>Tarefas:     </li>
                    <hr>
                    <li>porcentagem: </li>
                    <hr>
                </ul>
            </div>
            <div class="wrapper-calendar">
                
                <button type="button" class="btn btn-calendar" data-bs-toggle="modal" data-bs-target="#calendar">
                    Calendário
                </button>

                <!-- Modal Calendario -->
                <div class="modal fade" id="calendar" tabindex="-1" aria-labelledby="calendar" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agenda</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <iframe src="https://calendar.google.com/calendar/embed?height=350&amp;wkst=1&amp;bgcolor=%23f2f2f0&amp;ctz=America%2FSao_Paulo&amp;src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;src=cHQuYnJhemlsaWFuI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;color=%2333B679&amp;color=%230B8043&amp;showTitle=0&amp;showTabs=1&amp;showTz=0&amp;showCalendars=0&amp;showPrint=0&amp;showDate=1" style="border-width:0" width="450" height="350" frameborder="0" scrolling="no"></iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Tabela para tasky -->
        <div class="wrapper-list">
            <table class="table-list">
                <thead>
                    <tr>
                        <th>ID Projeto </th>
                        <th>Nome Projeto</th>
                        <th>Data Início </th>
                        <th>Data de fim </th>
                        <th>%completa </th>
                        <th>Atrasados</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Verifica as linhas do mysql e gera novas linhas de informação na tabela -->
                    <?php while ($row = mysqli_fetch_array($projetos)) { ?>
                        <td><?php echo $row['IDProjeto']; ?> </td>
                        <td><?php echo $row['NomeProjeto']; ?> </td>
                        <td><?php echo $row['DataInicio']; ?> </td>
                        <td><?php echo $row['DataFim']; ?> </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>

        </div>

        <!-- Tabela para atividade -->
        <div class="wrapper-list">
            <table class="table-list">
                <thead>
                    <tr>
                        <th>ID Projeto</th>
                        <th>Nome Atividade</th>
                        <th>Data Início </th>
                        <th>Data de fim </th>
                        <th>Finalizado </th>
                        <th>ID ATividade</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Verifica as linhas do mysql e gera novas linhas de informação na tabela -->
                    <?php while ($row = mysqli_fetch_array($atividades)) { ?>
                        <td><?php echo $row['IDProjeto']; ?> </td>
                        <td><?php echo $row['NomeAtividade']; ?> </td>
                        <td><?php echo $row['DataInicio']; ?> </td>
                        <td><?php echo $row['DataFim']; ?> </td>
                        <td><?php echo $row['Finalizada']; ?> </td>
                        <td><?php echo $row['IDAtividade']; ?> </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>

        </div>

    </main>

</body>

<!-- scripts para bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</html>
<?php
    session_start();

    $link = mysqli_connect("localhost", "root", "", "euax_desafio");

    $IDProjeto = $_POST['id_projeto'];
    $NomeAtividade = $_POST['nome_atividade'];
    $DataInicio = $_POST['data_inicio'];
    $DataFim = $_POST['data_final'];
    $Finalizada = $_POST['finalizada'];

    $sql = "INSERT INTO atividades (IDProjeto, NomeAtividade, DataInicio, DataFim, Finalizada, IDAtividade) VALUES ('$IDProjeto', '$NomeAtividade', '$DataInicio', '$DataFim', '$Finalizada', NULL)";
    
    if ($link->query($sql) === TRUE) {
        echo "A atividade foi cadastrada com sucesso";
    } else {
        echo "Ops, ocorreu um erro.
        Error: " . $sql . "<br>" . $link->error;
    }

    header( 'Location:index.php');

    die();

?>
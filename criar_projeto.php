<?php
    session_start();
    
    $link = mysqli_connect("localhost", "root", "", "euax_desafio");

    $NomeProjeto = $_POST['nome_projeto'];
    $DataInicio = $_POST['data_inicio'];
    $DataFim = $_POST['data_final'];

    $sql = "INSERT INTO projetos (IDProjeto, NomeProjeto, DataInicio, DataFim) VALUES (NULL, '$NomeProjeto', '$DataInicio', '$DataFim')";

    if ($link->query($sql) === TRUE) {
    
        echo "A tasky foi cadastrada com sucesso";
    } else {
        echo "Ops, ocorreu um erro.
        Error: " . $sql . "<br>" . $link->error;
    }
    
    header( 'Location:index.php');

    die();

?>
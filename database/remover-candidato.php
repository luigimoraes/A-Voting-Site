<?php
    include("../classes/CandidatoDAO.php");
    
    $cpf = $_POST['deletar'];
    
    $candidato = new CandidatoDAO();
    $candidato->setCpf($cpf);
    
    $candidato->remover();
    header("Location:../candidato.php");
?>
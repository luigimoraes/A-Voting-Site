<?php
    include("../classes/EleitorDAO.php");
    
    $cpf = $_POST['deletar'];
    
    $eleitor = new EleitorDAO();
    $eleitor->setCpf($cpf);
    
    $eleitor->remover();
    header("Location:../eleitor.php");
?>
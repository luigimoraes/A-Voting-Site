<?php
    include('../classes/EleitorDAO.php');
    include('../classes/CandidatoDAO.php');
    
    $nome = $_POST['busca'];
    
    $elei = new EleitorDAO();
    $cand = new CandidatoDAO();
    $elei->setNome($nome);
    $cand->setNome($nome);
    
    if(is_array($elei->busca())){
						header("Location:../view/resultadosBuscaEleitor.php");
				} else if(is_array($cand->busca())){
						header("Location:../view/resultadosBuscaCand.php");
				} else {
						echo "Error 404: not found on DB";
				}
?>
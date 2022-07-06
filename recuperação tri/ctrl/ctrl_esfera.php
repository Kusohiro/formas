<?php
    require_once("../class/class esfera.php");
	$nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $idEsfe = isset($_GET["idEsfe"]) ? $_GET["idEsfe"] : 0;
	$TabE = isset($_POST["TabE"]) ? $_POST["TabE"] : 0;
	$raio = isset($_POST["raio"]) ? $_POST["raio"] : 0;
    $cor = isset($_POST["cor"]) ? $_POST["cor"] : "";
	$esfera = new esfera($idEsfe, $cor, $TabE, $raio);

    if($acao == "excluir"){
        $esfera->excluir();
        header("location:../cad/cad_esfera.php?nome=$nome");
	}

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        
	//	var_dump($esfera);
        if($idEsfe == 0){
            $esfera->insere();
            header("location:../cad/cad_esfera.php?nome=$nome");
        } else{
            $esfera->editar();
            header("location:../cad/cad_esfera.php?nome=$nome");
        }
    }
?>
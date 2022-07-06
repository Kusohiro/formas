<?php
     require_once("../class/class cubo.php");
	$nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $idCube = isset($_GET["idCube"]) ? $_GET["idCube"] : 0;
	$idTab = isset($_POST["idTab"]) ? $_POST["idTab"] : 0;
	$lado = isset($_POST["lado"]) ? $_POST["lado"] : "";
    $cor = isset($_POST["cor"]) ? $_POST["cor"] : "";
	$cubo = new cubo($idCube, $cor, $idTab, $lado);

    if($acao == "excluir"){
        $cubo->excluir();
        header("location:../cad/cad_cubo.php?nome=$nome");
	}

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        
	//	var_dump($cubo);
        if($idCube == 0){
            $cubo->insere();
            header("location:../cad/cad_cubo.php?nome=$nome");
        } else{
            $cubo->editar();
            header("location:../cad/cad_cubo.php?nome=$nome");
        }
    }
?>
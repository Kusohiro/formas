<?php
     require_once("../class/class retangulo.php");
	$nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $idRet = isset($_GET["idRet"]) ? $_GET["idRet"] : 0;
	$idTab = isset($_POST["idTab"]) ? $_POST["idTab"] : 0;
	$base = isset($_POST["base"]) ? $_POST["base"] : "";
	$altura = isset($_POST["altura"]) ? $_POST["altura"] : "";
    $cor = isset($_POST["cor"]) ? $_POST["cor"] : "";
	$retangulo = new retangulo($idRet, $cor, $idTab, $base, $altura);

    if($acao == "excluir"){
        $retangulo->excluir();
        header("location:../cad/cad_retangulo.php?nome=$nome");
	}

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        
	//	var_dump($retangulo);
        if($idRet == 0){
            $retangulo->insere();
            header("location:../cad/cad_retangulo.php?nome=$nome");
        } else{
            $retangulo->editar();
            header("location:../cad/cad_retangulo.php?nome=$nome");
        }
    }
?>
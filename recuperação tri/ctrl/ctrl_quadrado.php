<?php
     require_once("../class/class quadrado.php");
	$nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $idQuad = isset($_GET["idQuad"]) ? $_GET["idQuad"] : 0;
	$idTab = isset($_POST["idTab"]) ? $_POST["idTab"] : 0;
	$lado = isset($_POST["lado"]) ? $_POST["lado"] : "";
    $cor = isset($_POST["cor"]) ? $_POST["cor"] : "";
	$quadrado = new quadrado($idQuad, $cor, $idTab, $lado);

    if($acao == "excluir"){
        $quadrado->excluir();
        header("location:../cad/cad_quadrado.php?nome=$nome");
	}

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        
	//	var_dump($quadrado);
        if($idQuad == 0){
            $quadrado->insere();
            header("location:../cad/cad_quadrado.php?nome=$nome");
        } else{
            $quadrado->editar();
            header("location:../cad/cad_quadrado.php?nome=$nome");
        }
    }
?>
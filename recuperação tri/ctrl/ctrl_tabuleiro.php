<?php
    require_once("../class/class tabuleiro.php");
	$nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    if($acao == "excluir"){
        tabuleiro::excluir($id);
        header("location:../cad/cad_tabuleiro.php?nome=$nome");
	}

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        $lado = isset($_POST["lado"]) ? $_POST["lado"] : "";
	//	var_dump($tabuleiro);
        if($id == 0){
            tabuleiro::insere($id, $lado);
            header("location:../cad/cad_tabuleiro.php?nome=$nome");
        } else{
            tabuleiro::editar($id, $lado);
            header("location:../cad/cad_tabuleiro.php?nome=$nome");
        }
    }
?>
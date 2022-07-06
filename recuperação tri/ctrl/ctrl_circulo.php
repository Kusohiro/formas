<?php
    require_once("../class/class circulo.php");
	$nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $idCirc = isset($_GET["idCirc"]) ? $_GET["idCirc"] : 0;
	$Tab = isset($_POST["Tab"]) ? $_POST["Tab"] : 0;
	$raio = isset($_POST["raio"]) ? $_POST["raio"] : 0;
    $cor = isset($_POST["cor"]) ? $_POST["cor"] : "";
	$circulo = new circulo($idCirc, $cor, $Tab, $raio);

    if($acao == "excluir"){
        $circulo->excluir();
        header("location:../cad/cad_circulo.php?nome=$nome");
	}

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        
	//	var_dump($circulo);
        if($idCirc == 0){
            $circulo->insere();
            header("location:../cad/cad_circulo.php?nome=$nome");
        } else{
            $circulo->editar();
            header("location:../cad/cad_circulo.php?nome=$nome");
        }
    }
?>
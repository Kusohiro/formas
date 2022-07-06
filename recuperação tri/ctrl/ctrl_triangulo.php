<?php
     require_once("../class/class triangulo.php");
	$nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $idTri = isset($_GET["idTri"]) ? $_GET["idTri"] : 0;
	$idTab = isset($_POST["idTab"]) ? $_POST["idTab"] : 0;
	$base = isset($_POST["base"]) ? $_POST["base"] : "";
	$lado2 = isset($_POST["lado2"]) ? $_POST["lado2"] : "";
	$lado1 = isset($_POST["lado1"]) ? $_POST["lado1"] : "";
    $cor = isset($_POST["cor"]) ? $_POST["cor"] : "";
	$triangulo = new triangulo($idTri, $cor, $idTab, $base, $lado2, $lado1);

    if($acao == "excluir"){
        $triangulo->excluir();
        header("location:../cad/cad_triangulo.php?nome=$nome");
	}

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        
		//var_dump($triangulo);
        if($idTri == 0){
            $triangulo->insere();
            header("location:../cad/cad_triangulo.php?nome=$nome");
        } else{
            $triangulo->editar();
            header("location:../cad/cad_triangulo.php?nome=$nome");
        }
    }
?>